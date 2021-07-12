<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    // TOTEST
    public function index() {
       $users =  DB::table('users')
       ->leftJoin('sponsorplan_users', 'users.id', '=', 'sponsorplan_users.user_id')
       ->groupBy('users.id')
       ->select('users.*', DB::raw('max(sponsorplan_users.end_date) AS current_plan'))
       ->orderByDesc('current_plan')
       ->get();


       
        return $users;
    }

    public function sponsored( $cat = false ) {
  
        // $sponsored_users = User::select('');

    }
}
