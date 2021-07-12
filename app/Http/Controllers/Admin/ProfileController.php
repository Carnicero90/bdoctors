<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\UserDetail;

class ProfileController extends Controller
{
    public function index()
    {
        $profile = Auth::user()->userDetails;

        return view('admin.profile', compact('profile'));
    }

    public function store(Request $request)
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

        $profile = UserDetail::updateOrCreate(
            ['user_id' => Auth::user()->id],
            ['self_description' => $data['self_description'],
            'work_address' => $data['work_address'],
            'phone_number' => $data['phone_number'],]
        );
        $profile->save();
        return redirect()->route("admin.profile-index")->with("success", "Profilo modificato correttamente");
    }
}
