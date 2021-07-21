<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Message;
use App\Review;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use App\SponsorplanUser;

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
        $user->sponsored =  $user->sponsorplanUsers->where('end_date', '>', Carbon::now())->where('success', '=', 1)->first();
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
