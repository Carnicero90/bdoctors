<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Message;

class MessageController extends Controller
{
    public function index()
    {

        $user = Auth::user();
        
        $data = [
            "user" => $user
        ];

        return view('admin.messages.index', $data);
    }

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

    public function destroy($id)
    {
        $message = Message::find($id);
        $message->delete();

        return redirect()->route("admin.messages")->with("success", "Messaggio cancellato!");
    }
}