<?php

namespace App\Http\Controllers;
use App\User;
use App\Review;

class UserController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::findOrFail($id);
        $reviews = Review::where('user_id', '=', $user->id)
            ->orderByDesc('created_at')
            ->get();

        $data = [
            'user' => $user,
            'reviews' => $reviews
        ];

        return view('guest.bards.show', $data);
    }
}
