<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Review;

class ReviewController extends Controller
{
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
