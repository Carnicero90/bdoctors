<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Review;
use App\Vote;
use App\User;
use Illuminate\Support\Carbon;

class ReviewController extends Controller
{
    public function create($id)
    {
        $user = User::findOrFail($id);
        $votes = Vote::all();


        $data = [
            'votes' => $votes,
            'user' => $user,
        ];

        return view("guest.bards.review", $data);
    }

    public function store(Request $request, $id)
    {

        $request->validate($this->getValidationRules());

        $form_data = $request->all();

        $review = new Review();
        $review->fill($form_data);
        $review->user_id = $id;
        $review->save();

        // con back() facciamo il redirect sulla stessa pagina, esempio:
        // return back()->with("success", "Recensione salvata correttamente");
        return redirect()->route("profile", ['id' => $id])->with("success", "Recensione salvata correttamente");
    }

    private function getValidationRules()
    {
        return [
            "author_name" => "required|string|max:255",
            "author_email" => "required|email|max:255",
            "content" => "nullable|required|string|max:5000",
            "vote_id" => "required|exists:votes,id",
            "terms-conditions" => "required",
        ];
    }
}
