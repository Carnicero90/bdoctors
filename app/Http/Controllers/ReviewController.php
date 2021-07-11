<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Review;
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
        $review->user_id = 103;
        $review->save();

        return redirect()->route("send-review")->with("success", "Recensione salvata correttamente");

        // con back facciamo il redirect sulla stessa pagina
        // return back()->with("success", "Recensione salvata correttamente");
    }

    private function getValidationRules() {
        return [
            "author_name" => "required|string|max:255",
            "author_email" => "required|email|max:255",
            "content" => "nullable|required|string|max:5000",
            "vote_id" => "required|exists:votes,id",
        ];
    }
}