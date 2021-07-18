<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Vote;

class VoteController extends Controller
{
    /**
     * Ritorna l'elenco dei voti presenti in table votes, ordinati per valore.
     *
     * @return \Illuminate\Contracts\Support\JsonResponse
     */
    public function index() {
        $data = [
            'votes' => Vote::all()
            ->sortBy('value'),
            'success' => true
        ];

        return response()->json($data);
    }
}
