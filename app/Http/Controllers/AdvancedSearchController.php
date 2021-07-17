<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Vote;
use App\Review;
use App\Category;
use Illuminate\Support\Facades\DB;

class AdvancedSearchController extends Controller
{
    public function index(Request $request)
    {
        // review step tendenzialmente mi servira per dividere a seconda del n.ro di recensioni
        $votes = Vote::all();
        $categories = Category::all();
        $review_max = Review::select(DB::raw('COUNT(user_id) AS tot'))
            ->groupBy('user_id')
            ->orderByDesc('tot')
            ->pluck('tot')
            ->first();

        return view('guest.advsearch.index', compact('votes'));
    }
}
