<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    // TOTEST
    public function index() {
       $users =  DB::table('users')
       ->leftJoin('sponsorplan_users', 'users.id', '=', 'sponsorplan_users.user_id')
       ->get();
        return $users;
    }
}
