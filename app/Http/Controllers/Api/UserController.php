<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use App\Category;

class UserController extends Controller
{
    /**
     * Ritorna l'elenco di tutti gli utenti del sito, ordinati in base alla media voti,
     * mostrando per primi gli utenti premium.
     *
     * @return \Illuminate\Contracts\Support\JsonResponse
     */
    public function index(Request $request)
    {
        // TODO: test, da rimouvere
        $user = $request->name;
        // TOASK: probabilmente risulta un poco ripetitivo, no? Potrei fare un'unica funzia con un parametro opzionale, ma mi sembrava meno ordinato
        // TODO: rimuovi da tutti la data di scadenza dell'abbonamento (ora ci serve per test)
        // comunque sto sbagliando qualcosa.
        // TODO: rifalla parzialmente
        $users =  User::select([
            'users.id', //lascio che magari poi serve come riferimento per un eventuale metodo di ricerca dettagliata del singolo user
            'users.name',
            'users.lastname',
            'users.email',
            DB::raw('max(sponsorplan_users.end_date) AS current_plan'),
            DB::raw('avg(votes.value) as avg_vote')
        ])
             ->where('users.name', 'LIKE', '%' . $user . '%')
             ->orWhere('users.lastname', 'LIKE', '%' . $user . '%')

            ->leftJoin('sponsorplan_users', 'users.id', '=', 'sponsorplan_users.user_id')
            ->leftJoin('reviews', 'users.id', '=', 'reviews.user_id')
            ->leftJoin('votes', 'reviews.vote_id', '=', 'votes.id')
            ->groupBy('users.id')
            ->orderByDesc('current_plan')
            // TODO: test
            // TODO: endtest
            ->get();

        $data = [
            'users' => $users,
            'success' => true
        ];

        return response()->json($data);
    }

    public function sponsoredUsers()
    {
        $sponsored_users = User::select('users.*', DB::raw('avg(votes.value) as avg_vote'))
            ->rightJoin('sponsorplan_users', 'users.id', '=', 'sponsorplan_users.user_id')
            ->groupBy('users.id')
            ->leftJoin('reviews', 'users.id', '=', 'reviews.user_id')
            ->leftJoin('votes', 'reviews.vote_id', '=', 'votes.id')
            ->orderByDesc(DB::raw('max(sponsorplan_users.end_date)'))
            ->orderByDesc('avg_vote')
            ->get();

        return response()->json($sponsored_users);
    }
    // Funzione in cui testo roba, tanto per avere un post in cui stampare a schermo
    public function users(Request $request)
    {
        // TODO: test
        $category = $request['category'];
        // TODO: rimuovi enddate
        $cat_users = User::select('users.id', 'users.name', 'users.lastname', 'users.email', DB::raw('MAX(sponsorplan_users.end_date)'), DB::raw('AVG(votes.value) as avg_vote',))
            ->leftJoin('sponsorplan_users', 'users.id', '=', 'sponsorplan_users.user_id')
            ->leftJoin('category_user', 'users.id', '=', 'category_user.user_id')
            // TODO: bozza, da rifare
            ->where('category_id', '=', $category)
            ->groupBy('users.id')
            ->leftJoin('reviews', 'users.id', '=', 'reviews.user_id')
            ->leftJoin('votes', 'reviews.vote_id', '=', 'votes.id')
            ->orderByDesc(DB::raw('MAX(sponsorplan_users.end_date)'))
            ->orderByDesc('avg_vote')
            ->get();

        return response()->json($cat_users);
        // TODO Funzione momentaneamente qua, poi andra nelle api, una volta che avremo un index con vue.
        $sponsored_users = User::select('users.*', DB::raw('avg(votes.value) as avg_vote'))
            ->leftJoin('sponsorplan_users', 'users.id', '=', 'sponsorplan_users.user_id')
            ->groupBy('users.id')
            ->leftJoin('reviews', 'users.id', '=', 'reviews.user_id')
            ->leftJoin('votes', 'reviews.vote_id', '=', 'votes.id')
            ->orderByDesc(DB::raw('max(sponsorplan_users.end_date)'))
            ->orderByDesc('avg_vote')
            ->get();

        return response()->json($sponsored_users);
        // return User::select('id')->pluck('id')->toArray();
        // $sponsored_users = User::select('users.*', DB::raw('avg(votes.value) as avg_vote'))
        // ->rightJoin('sponsorplan_users', 'users.id', '=', 'sponsorplan_users.user_id')
        // ->where('sponsorplan_users.end_date', '>', Carbon::now())
        // ->groupBy('users.id')
        // ->leftJoin('reviews', 'users.id', '=', 'reviews.user_id')
        // ->leftJoin('votes', 'reviews.vote_id', '=', 'votes.id')
        // ->orderByDesc('avg_vote')
        // ->get();
        // return $sponsored_users;
        // $users = User::all();
        // $categories = Category::select('id')->pluck('id')->toArray();
        // dd($categories);
        // foreach ($users as $user) {
        //     $user->categories()->attach($categories[array_rand($categories)]);
        // };
    }
}
