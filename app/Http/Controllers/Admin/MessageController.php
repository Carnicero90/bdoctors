<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Message;

class MessageController extends Controller
{
    /**
     * Ritorna view con elenco messaggi ricevuti dall'utente loggato
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $messages = Message::where('user_id', '=', Auth::user()->id)
        ->orderByDesc('message_date')
        ->where('to_show', '=', 1)
        ->get();
        $user = Auth::user();
        //TODO: questo non serve, direi, tanto effettivamente Auth:user lo richiami direttamente dalla pagina, no?

        $data = [
            "user" => $user,
            'messages' => $messages
        ];
        return view('admin.messages.index', $data);
    }
    /**
     * Mostra singolo messaggio, cercati per id
     * 
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $message = Message::findOrFail($id);
        $user = Auth::user();

        $data = [
            "user" => $user,
            "message" => $message,
        ];

        return view("admin.messages.show", $data);
    }

    public function hide($id)
    {
        $message = Message::findOrFail($id);
        
        if ($message->user_id == Auth::user()->id) {
            $data = [
                'to_show' => false
            ];
            
            $message->update(
                $data
            );
            $message->save();
        }

        return redirect()->route("admin.messages")->with("success", "Messaggio cancellato!");
    }
}
