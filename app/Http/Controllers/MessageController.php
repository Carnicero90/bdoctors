<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Message;
use Illuminate\Support\Carbon;

class MessageController extends Controller
{
    public function store(Request $request) {
        // TOTEST
        $request->validate([
            'author_name' => 'required | string',
            'author_email' => 'required | email',
            'user_id' => 'required | exists:users,id',
            // TOTEST
            // 'service_number' => 'required_without: text',
            // 'text' => 'required without: service_number | string'
        ]);
        $form_data = $request->all();
        $message = new Message();
        $message->fill($form_data);
        $message->message_date = new Carbon();
        $message->save();
    }
}
