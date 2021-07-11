<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Vote;

class ReviewController extends Controller
{
    public function show()
    {
        $votes = Vote::all();

        $data = [
            "votes" => $votes
        ];

        return view("guest.bards.review", $data);
    }

    public function store(Request $request) {

        $request->validate($this->getValidationRules());

        $form_data = $request->all();

        $review = new Review();
        $review->fill($form_data);
        $review->save();

        return redirect()->route("guest.bards.review");
    }

    private function getValidationRules() {
        return [
            "author_name" => "required|max:255",
            "author_email" => "required|max:255",
            "content" => "nullable|required|max:5000",
            "vote" => "required|exists:votes,id",
        ];
    }
}
