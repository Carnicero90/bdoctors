<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Vote;

class VoteController extends Controller
{
    public function index() {
        $data = [
            'votes' => Vote::all()
            ->sortBy('value'),
            'success' => true
        ];

        return response()->json($data);
    }
}
