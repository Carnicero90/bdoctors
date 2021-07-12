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
        // TODO aggiungi validazione
        $data = $request->all();

        $profile = UserDetail::updateOrCreate(
            ['user_id' => Auth::user()->id],
            [$data]
        );
    }

    public function update(Request $request)
    {
        $data = $request->all();
        $profile = UserDetail::where('user_id', '=', Auth::user()->id)->first();
        $profile->update($data);
        dd($profile);
        $profile->save();
    }
}
