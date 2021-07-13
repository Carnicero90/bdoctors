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
    // TOTEST
    public function index()
    {
        $users =  DB::table('users')
            ->leftJoin('sponsorplan_users', 'users.id', '=', 'sponsorplan_users.user_id')
            ->groupBy('users.id')
            ->select('users.*', DB::raw('max(sponsorplan_users.end_date) AS current_plan'))
            ->orderByDesc('current_plan')
            ->get();



        return $users;
    }

    public function sponsored($cat = false)
    {

        // $sponsored_users = User::select('');

    }
    // Funzione in cui testo roba, tanto per avere un post in cui stampare a schermo
    public function test($category = 5)
    {
        // TODO: rimuovi enddate
        $cat_users = User::select('users.id', 'users.name', 'users.lastname', 'users.email', DB::raw('MAX(sponsorplan_users.end_date)'), DB::raw('AVG(votes.value) as avg_vote',))
        ->leftJoin('sponsorplan_users', 'users.id', '=', 'sponsorplan_users.user_id')
        ->leftJoin('category_user', 'users.id', '=', 'category_user.user_id')
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
