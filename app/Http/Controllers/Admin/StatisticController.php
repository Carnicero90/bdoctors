<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Message;
use App\Review;
use Illuminate\Support\Facades\Auth;

class StatisticController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = Auth::user()->id;
        // TODO: dobbiamo vedere come riordinare i dati di sta query, ma dipende da come funzia chartjs
        $messages = Message::where('user_id', '=', $id)->get();
        
        $reviews = Review::where('user_id', '=', $id)->get();

        $data = [
            'messages' => $messages,
            'reviews' => $reviews
        ];

        return view('admin.statistics.index', $data); 

    }

    // TODO Boh forse questa potrebbe effettivamente servire?
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }
}
