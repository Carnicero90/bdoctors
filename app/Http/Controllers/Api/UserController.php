<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Review;
use App\Message;
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

            DB::raw('avg(votes.value) as avg_vote'),
            DB::raw('MAX(success) AS sponsored'),

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
     * $request['name'], appartenenti a categorie = $request['cat'], qualora
     * siano state specificate.
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
            DB::raw("COUNT(reviews.id) AS nmb_reviews")
        ])
            ->rightJoin('category_user', 'users.id', '=', 'category_user.user_id')
            ->where(DB::raw("concat_ws(' ', users.name, users.lastname)"), 'LIKE', '%' . $user . '%')

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
                if(is_array($category)) {
                    $users = $users->whereIn('category_user.category_id', $category)->get();
                }
                else {
                    $users = $users->where('category_user.category_id', '=', $category)->get();
                }
            }
            else {
                $users = $users->get();
            }

        $data = [
            'users' => $users,
            'success' => true
        ];
        return response()->json($data);
    }

    public function stats(Request $request) {
        $user_id = $request->id;
        $year_ago  = Carbon::now()->subMonths(12)->firstOfMonth();
        // dd($year_ago);
       $messages = Message::select(DB::raw('COUNT(id) AS tot'), DB::raw('DATE_FORMAT(message_date, "%Y-%m") AS date'))
       ->where('user_id', '=', $user_id)
       ->where('message_date', '>', $year_ago)
       ->groupBy('date')
       ->orderBy('date')

       ->get();

       $reviews = Review::select(DB::raw('COUNT(reviews.id) AS tot'), DB::raw('AVG(votes.value) AS avg_vote'), DB::raw('DATE_FORMAT(send_date, "%Y-%m") AS date'))
       ->where('user_id', '=', $user_id)
       ->where('send_date', '>', $year_ago)
       ->leftJoin('votes', 'reviews.vote_id', '=', 'votes.id')
       ->groupBy('date')
       ->orderBy('date')
       
       ->get();

       $data = [
           'messages' => $messages,
           'reviews' => $reviews,
           'succes' => true
       ];
        return $data;
    }
}