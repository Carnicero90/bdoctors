<?php

namespace App\Http\Controllers;

use App\Sponsorplan;
use Illuminate\Http\Request;
use App\SponsorplanUser;

class SponsorplanController extends Controller
{
    public function index() {
        $all_plans = Sponsorplan::all();
        return view('guest.sponsors.index', compact('all_plans'));
    }
}
