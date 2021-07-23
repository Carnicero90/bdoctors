<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Review;

class ReviewController extends Controller
{
    /**
     * Ritorna l'elenco di tutte le recensioni dell'utente selezionato
     * @param id int
     *
     * @return \Illuminate\Contracts\Support\JsonResponse
     */
    public function show($id)
    {
        $data = [
            'reviews' => Review::select('reviews.*', 'votes.value')
                ->where('user_id', '=', $id)
                ->leftJoin('votes', 'vote_id', '=', 'votes.id')
                ->orderByDesc('send_date')
                ->get(),
            'succes' => true
        ];
        return $data;
    }
}
