<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Profile;

class ProfileController extends Controller
{

    /**
     * Mostra il profilo dell'utente registrato
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $profile = Auth::user()->profile;

        return view('admin.profile', compact('profile'));
    }
    /**
     * Crea il profilo dell'utente, se già esistente ne aggiorna le informazioni
     *
     * @param Request $request 
     * @return \Illuminate\Http\Response
     */
    public function createOrUpdate(Request $request)
    {
        // TODO aggiungi caricamento pic
        $request->validate(
            [
                'self_description' => 'string | max:500',
                'work_address' => 'string | max:100',
                'phone_number' => 'digits_between:5,15'
            ]
            );
        $data = $request->all();

        $profile = Profile::updateOrCreate(
            ['user_id' => Auth::user()->id],
            ['self_description' => $data['self_description'],
            'work_address' => $data['work_address'],
            'phone_number' => $data['phone_number'],]
        );
        $profile->save();
        return redirect()->route("admin.profile-index")->with("success", "Profilo modificato correttamente");
    }
}
