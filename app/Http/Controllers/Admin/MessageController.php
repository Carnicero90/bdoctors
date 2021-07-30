<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Message;

class MessageController extends Controller
{
    /**
     * Ritorna view con elenco messaggi ricevuti dall'utente loggato, in ordine cronologico decrescente
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {

        $user = Auth::user();
            
        $messages = Message::where('user_id', '=', $user->id)
            ->orderByDesc('message_date')
            ->where('to_show', '=', 1)
            ->get();

        $numb_mess_to_read = DB::table('messages')
            ->where('user_id', '=', $user->id)
            ->where('to_read', '>', 0)
            ->count('*');

        $data = [
            "user" => $user,
            'messages' => $messages,
            'numb_mess_to_read' => $numb_mess_to_read,
        ];

        return view('admin.messages.index', $data);
    }

    /**
     * Mostra singolo messaggio, cercati per id
     * 
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {

        $message = Message::findOrFail($id);

        $user = Auth::user();

        if ($message->user_id != $user->id) {
            abort(403, 'Accesso non autorizzato');
        }

        // se il messaggio è da leggere
        if ($message->to_read) {
            $message->to_read = false;
            $message->update();
        }

        $data = [
            "user" => $user,
            "message" => $message,
        ];

        return view("admin.messages.show", $data);
    }

    /**
     * Nasconde il messaggio e reindirizza ad index
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function hide($id) {
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
