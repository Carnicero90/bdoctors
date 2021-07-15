<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Review;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)

    {
        $user = User::findOrFail($id);
        $reviews = Review::where('user_id', '=', $user->id)->get();

        
        $data = [
            'user' => $user,
            'reviews' => $reviews
        ];

        return view('guest.bards.show', $data);
    }

    /**
     * Mostra gli utenti premium del nostro sito, ordinati per media recensioni
     * TODO: spostala poi in api, quando avremo un index pubblico
     *
     * @return \Illuminate\Http\Response
     */
    public function sponsoredIndex()
    {
        // TODO Funzione momentaneamente qua, poi andra nelle api, una volta che avremo un index con vue.
        $sponsored_users = User::select('users.*', DB::raw('avg(votes.value) as avg_vote'))
        ->rightJoin('sponsorplan_users', 'users.id', '=', 'sponsorplan_users.user_id')
        ->where('sponsorplan_users.end_date', '>', Carbon::now())
        ->groupBy('users.id')
        ->leftJoin('reviews', 'users.id', '=', 'reviews.user_id')
        ->leftJoin('votes', 'reviews.vote_id', '=', 'votes.id')
        ->orderByDesc('avg_vote')
        ->limit(5)
        ->get();
    }
}
