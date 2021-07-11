<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Message;

class MessageController extends Controller
{
    public function destroy($user_id, $message_id)
    {
        if( Auth::id() == $user_id) {
            $message_to_delete = Message::find($message_id);
            $message_to_delete->delete();
        }
    }
}
