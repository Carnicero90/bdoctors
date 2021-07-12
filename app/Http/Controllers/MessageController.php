<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Message;
use Illuminate\Support\Carbon;

class MessageController extends Controller
{
    public function store(Request $request) {
        
        // TOTEST
        $request->validate($this->getValidationRules());
        
        $form_data = $request->all();
        $message = new Message();
        $message->fill($form_data);
        $message->message_date = new Carbon();
        // TEST
        $message->user_id = 1;
        // END TEST
        $message->save();

        // con back facciamo il redirect sulla stessa pagina
        // return back()->with("success", "Recensione salvata correttamente");
        return redirect()->route("send-message")->with("success", "Messaggio inviato correttamente");
    }

    public function show() {
        return view ('guest.bards.message');
    }

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
