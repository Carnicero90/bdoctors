<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Message;
use Illuminate\Support\Carbon;
use App\User;

class MessageController extends Controller
{
    public function store(Request $request, $id) {
        
        // TOTEST
        $request->validate($this->getValidationRules());
        
        $form_data = $request->all();
        $message = new Message();
        $message->fill($form_data);
        $message->message_date = new Carbon();
        $message->user_id = $id;
        $message->save();

        // con back facciamo il redirect sulla stessa pagina
        // return back()->with("success", "Recensione salvata correttamente");
        return redirect()->route("send-message", ['id' => $message->id])->with("success", "Messaggio inviato correttamente");
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
            'terms-conditions' => 'required',

            // TOREMEMBER SCOMMENTARE
            // 'user_id' => 'required | exists:users,id',
            // TOTEST
            // 'service_number' => 'required_without: text',
            // 'text' => 'required without: service_number | string'
        ];
    }
}
