<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Review;

class ReviewController extends Controller
{
    public function index()
    {

        $user = Auth::user();
        
        $data = [
            "user" => $user
        ];

        return view('admin.reviews.index', $data);
    }

    public function show($id)
    {
        $review = Review::findOrFail($id);
        $user = Auth::user();

        $data = [
            "user" => $user,
            "review" => $review,
        ];

        return view("admin.reviews.show", $data);
    }
}
