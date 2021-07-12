<?php

namespace App\Http\Controllers;

use App\Sponsorplan;
use Illuminate\Http\Request;

class SponsorplanController extends Controller
{
    public function index()
    {
        $all_plans = Sponsorplan::all();
        return view('admin.sponsors.index', compact('all_plans'));
    }

    public function show($slug)
    {
        $sponsor_plan = Sponsorplan::where('slug', '=', $slug)->get();

        if (!$sponsor_plan) {
            abort('404');
        }
        return view('admin.sponsors.show', compact($sponsor_plan));
    }
}
