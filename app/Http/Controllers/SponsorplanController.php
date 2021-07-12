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
        $sponsorPlan = Sponsorplan::where('slug', '=', $slug)->first();
        if (!$sponsorPlan) {
            abort('404');
        }
        $data = [
            'sponsorPlan' => $sponsorPlan
        ];
        return view('admin.sponsors.show', $data);
    }
    

}
