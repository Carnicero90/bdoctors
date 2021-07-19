<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Message;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Ritorna view della dashboard dell'utente registrato
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $user = Auth::user();
        $messages = Message::where('user_id', '=', $user->id)
            ->where('to_show', '=', 1)
            ->orderByDesc('message_date')
            ->limit(5)
            ->get();

        $data = [
            "user" => $user
        ];

        return view('admin.dashboard', compact('user', 'messages'));
    }
}
