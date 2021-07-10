<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;

class UserController extends Controller
{
    // TODO: migliora il commento alla funzia
    /**
     * Ritorna la lista degli user.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    // TOTEST
    public function index()
    {
        $users =  DB::table('users')
            ->leftJoin('sponsorplan_users', 'users.id', '=', 'sponsorplan_users.user_id')
            ->groupBy('users.id')
            ->select('users.*', DB::raw('max(sponsorplan_users.end_date) AS current_plan'))
            ->orderByDesc('current_plan')
            ->get();
        // TOTEST
        return User::select('users.id', 'users.name', 'users.lastname', DB::raw('max(sponsorplan_users.end_date) AS current_plan'))
            ->leftJoin('sponsorplan_users', 'users.id', '=', 'sponsorplan_users.user_id')
            ->groupBy('users.id')
            ->orderByDesc('current_plan')
            ->get();
        $data = [
            'users' => $users,
            // TOASK: la voglio sta roba nella risposta?
            'succes' => true
        ];

        return response()->json($data);
    }
}
