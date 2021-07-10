<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
// use Illuminate\Http\Request;

use App\Vote;

class VoteController extends Controller
{
    /**
     * Ritorna la lista dei voti in formato json, ordinati per value (crescente).
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {

        $votes = Vote::all()->sortBy('value');

        $data = [
            'votes' => $votes,
            // TOASK: la voglio sta roba nella risposta?
            'success' => true
        ];

        return response()->json($data);
    }
}
