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

        $reviews = Review::where('user_id', '=', $user->id)
        ->orderByDesc('send_date')
        ->get();

        $data = [
            "user" => $user,
            'reviews' => $reviews
        ];
        return view('admin.reviews.index', $data);
    }

    public function show($id)
    {
        $user = Auth::user();

        $review = Review::findOrFail($id);

        if($review->user_id != $user->id)
        {
            abort(403, 'Accesso non autorizzato');
        }

        $data = [
            "user" => $user,
            "review" => $review,
        ];

        return view("admin.reviews.show", $data);
    }
}
