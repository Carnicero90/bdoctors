<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Message;
use App\User;

class MessageController extends Controller
{
    public function index(Request $request)
    {
        // TODO: non sicuro pericoloso, da chiedere
        $user = User::findOrFail($request['id']);
        if (!isset($request['password']) || $user->password != $request['password']) {
            abort('403', 'Accesso non autorizzato');
        }
        return $user->messages()->get();
    }
}
