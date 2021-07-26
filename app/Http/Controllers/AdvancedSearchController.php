<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Vote;

class AdvancedSearchController extends Controller
{
    public function index(Request $request)
    {
        $votes = Vote::all();

        return view('guest.advsearch.index', compact('votes'));
    }
}
