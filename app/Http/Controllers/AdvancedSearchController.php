<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Vote;

class AdvancedSearchController extends Controller
{
    public function index(Request $request)
    {
        $votes = Vote::all();
        // TODO: lo lascio, hai visto mai che poi lo usiamo
        // $review_max = Review::select(DB::raw('COUNT(user_id) AS tot'))
        //     ->groupBy('user_id')
        //     ->orderByDesc('tot')
        //     ->pluck('tot')
        //     ->first();

        return view('guest.advsearch.index', compact('votes'));
    }
}
