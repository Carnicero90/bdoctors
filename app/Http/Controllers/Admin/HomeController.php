<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Message;
use App\Review;
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

        $reviews = Review::where('user_id', '=', $user->id)
            ->orderByDesc('send_date')
            ->limit(5)
            ->get();

        return view('admin.dashboard', compact('user', 'messages', 'reviews'));
    }
}
