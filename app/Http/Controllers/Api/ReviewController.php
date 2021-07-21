<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Review;

class ReviewController extends Controller
{
    public function show($id) {
        $data = [
            'reviews' => Review::where('user_id', '=', $id)->get(),
            'succes' => true ];
        return $data;
    }
}
