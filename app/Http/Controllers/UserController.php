<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

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
        //
    }

    /**
     * Mostra gli utenti premium del nostro sito, ordinati per media recensioni
     * TODO: magari valutiamo anche in base al n.ro di recensioni?
     * TODO: spostala poi in api, quando avremo un index pubblico
     *
     * @return \Illuminate\Http\Response
     */
    public function sponsoredIndex()
    {
        $sponsored_users = User::select('users.*')
        ->rightJoin('sponsorplan_users', 'users.id', '=', 'sponsorplan_users.user_id');
    }
}
