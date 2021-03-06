<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Message;
use Illuminate\Support\Carbon;
use App\User;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{
    public function store(Request $request, $id) {
        // verifica che utente con id == $id esista
        $user = User::findOrFail($id);

        // verifica che ( utente con id == $id ) != utente loggato
        if (Auth::user()) {
            if (Auth::user()->id == $user->id) {
                return redirect()->route('profile', ['id' => Auth::user()->id])->with('errors', 'Non puoi inviarti messaggi da solo!');
            }
        }
        
        $request->validate($this->getValidationRules());

        $form_data = $request->all();
        $message = new Message();
        $message->fill($form_data);
        $message->message_date = Carbon::now();
        $message->user_id = $id;
        $message->to_show = true;
        $message->save();

        // con back facciamo il redirect sulla stessa pagina
        // return back()->with("success", "Recensione salvata correttamente");
        return redirect()->route("profile", ['id' => $id])->with("success", "Messaggio inviato correttamente, appena possibile riceverai una risposta");
    }

    public function create($id) {
        $user = User::findOrFail($id);
        return view ('guest.bards.message', compact('user'));
    }
    // TOSAY: non necessario sia funzione, va bene normale proprieta'
    private function getValidationRules() {
        return [
            'author_name' => 'required|string',
            'author_email' => 'required|email',
            'terms-conditions' => 'accepted',

            // TOREMEMBER SCOMMENTARE
            // TOTEST
            // 'service_number' => 'required_without: text',
            // 'text' => 'required without: service_number | string'
        ];
    }
}
