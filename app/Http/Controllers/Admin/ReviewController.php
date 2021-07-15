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

        $reviews = Review::where('user_id', '=', Auth::user()->id)
        ->orderByDesc('created_at')
        ->get();
        $user = Auth::user();
        //TODO: questo non serve, direi, tanto effettivamente Auth:user lo richiami direttamente dalla pagina, no?

        $data = [
            "user" => $user,
            'reviews' => $reviews
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
