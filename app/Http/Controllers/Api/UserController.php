<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Hamcrest\Arrays\IsArray;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    /**
     * Ritorna l'elenco degli utenti premium
     *
     * @return \Illuminate\Contracts\Support\JsonResponse
     */

    public function sponsoredUsers()
    {
        $sponsored_users = User::select(
            'users.*',
            'profiles.pic',
            DB::raw('avg(votes.value) as avg_vote')
        )
            ->rightJoin('sponsorplan_users', 'sponsorplan_users.user_id', '=', 'users.id')
            ->leftJoin('profiles', 'users.id', '=', 'profiles.user_id')
            ->where('sponsorplan_users.success', '=', '1')
            ->where('sponsorplan_users.end_date', '>', Carbon::now())
            ->groupBy('users.id')
            ->leftJoin('reviews', 'users.id', '=', 'reviews.user_id')
            ->leftJoin('votes', 'reviews.vote_id', '=', 'votes.id')
            ->orderByDesc('avg_vote')

            ->orderByDesc(DB::raw('max(sponsorplan_users.end_date)'))
            ->get();

        return response()->json($sponsored_users);
    }
    /**
     * Ritorna l'elenco degli utenti il cui nome o cognome corrispondono a
     * $request['name'], appartenenti a categoria = $request['cat'], qualora
     * sia stata specificata.
     *
     * @return \Illuminate\Contracts\Support\JsonResponse
     */

    public function users(Request $request) // TODO magari rinomina
    {
        $user = $request['name'];
        $category = $request['cat'];
        $users =  User::select([
            'users.id',
            'users.name',
            'users.lastname',
            'profiles.pic',

            DB::raw('MAX(category_user.category_id) AS cat'),
            DB::raw('MAX(success) AS sponsored'),
            DB::raw('AVG(votes.value) AS avg_vote'),
            DB::raw("CONCAT(users.name, ' ', users.lastname) AS user_fullname"),
            DB::raw("COUNT(reviews.id) as nmb_reviews")
        ])

            ->rightJoin('category_user', 'users.id', '=', 'category_user.user_id')
            ->where(function ($q) use ($user) {
                $q->where('users.name', 'LIKE', '%' . $user . '%')
                    ->orWhere('users.lastname', 'LIKE', '%' . $user . '%');
            })
            // ->whereRaw("concat(users.name, ' ', users.lastname) like '%?%'", [$user])

            ->leftJoin('profiles', 'users.id', '=', 'profiles.user_id')
            ->leftJoin('reviews', 'users.id', '=', 'reviews.user_id')
            ->leftJoin('votes', 'reviews.vote_id', '=', 'votes.id')
            ->groupBy('users.id')
            ->leftJoin('sponsorplan_users', function ($join) {
                $join->on('sponsorplan_users.user_id', '=', 'users.id')
                    ->where('sponsorplan_users.success', '=', '1')
                    ->where('sponsorplan_users.end_date', '>', Carbon::now());
            })
            ->orderByDesc('sponsored')
            ->orderByDesc('avg_vote');

        if ($category) {
            if (is_array($category)) {
                $users = $users->where(function ($q) use ($category) {
                    foreach($category as $field) {
                        $q->orWhere('category_user.category_id', '=', $field);
                    }
                });
            }
            else {
                $users = $users->where([['category_user.category_id', '=', $category]]);
            }
 
        }

        // TODO: salvi users 400 volte, trova una soluz non da rincoglionito (tipo in if else in un where)
        $users = $users->get();

        $data = [
            'users' => $users,
            'success' => true
        ];
        return response()->json($data);
    }
}
