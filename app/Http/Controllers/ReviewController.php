<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Review;
use App\Vote;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;

class ReviewController extends Controller
{
    public function create($id)
    {
        $user = User::findOrFail($id);
        $votes = Vote::all();

        //Passo il model review riferito all'id dello user selezionato
        $reviews = Review::where('user_id', '=', $user->id)
            ->get();


        $data = [
            'votes' => $votes,
            'user' => $user,
            'reviews' => $reviews
        ];

        return view("guest.bards.review", $data);
    }

    public function store(Request $request, $id)
    {
        // tentativo di impedire di inviarsi recensioni da soli, di fatto un utente puo sloggarsi e inviarsene 400
        if (Auth::user()) {
            if (Auth::user()->id == $id) {
                return redirect()->route('profile', ['id' => Auth::user()->id])->with('errors', 'Non puoi inviarti recensioni da solo!');
            }
        }


        $request->validate($this->getValidationRules());

        $form_data = $request->all();

        $review = new Review();
        $review->fill($form_data);
        $review->user_id = $id;
        $review->send_date = Carbon::now();

        // Prendo l'input dalla select
        $service_received = $request->input('service_received');

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
            "terms-conditions" => "accepted",
        ];
    }
}
