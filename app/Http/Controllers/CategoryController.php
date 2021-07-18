<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\User;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public function index() {

        $categories = Category::all();

        $data = [
            "categories" => $categories
        ];

        return view("guest.categories.index", $data);
    }

    public function show($slug) {

        $category = Category::where("slug", "=", $slug)->first();

        if (!$category) {
            abort("404");
        }
        // TODO: sta roba e' fondamentalmente uguale a UserController

        $category_users = User::select('users.*', DB::raw('avg(votes.value) as avg_vote'), DB::raw('avg(success) as sponsored'), 'profiles.pic')
        ->leftJoin('category_user', 'users.id', '=', 'category_user.user_id')
        ->where('category_user.category_id', '=', $category->id)
        ->leftJoin('profiles', 'profiles.user_id', '=', 'users.id')
        ->leftJoin('sponsorplan_users', function ($join) {
            $join->on('sponsorplan_users.user_id', '=', 'users.id')
                ->where('sponsorplan_users.success', '=', '1')
                ->where('sponsorplan_users.end_date', '>', Carbon::now());
        })
        ->orderByDesc('sponsored')
        ->groupBy('users.id')
        ->leftJoin('reviews', 'users.id', '=', 'reviews.user_id')
        ->leftJoin('votes', 'reviews.vote_id', '=', 'votes.id')
        ->orderByDesc('avg_vote')
        ->get();

        $data = [
            "category" => $category,
            "category_users" => $category_users
        ];

        return view("guest.categories.show", $data);
    }
}