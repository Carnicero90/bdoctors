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
        $user = User::find($request['id']);
        $data = [];
        $success = true;
        if (!$user) {
            $data = [
                'error_code' => 1,
                'error_message' => 'Record non presente nel nostro database',
            ];
            $success = false;
        } elseif (!isset($request['password']) || $user->password != $request['password']) {
            $data = [
                'error_code' => 2,
                'error_message' => 'Tentativo di accesso non autorizzato',
            ];
            $success = false;
        } else {
            $data = $user->messages;
        }

        return response()->json(compact('data', 'success'));
    }

    public function show(Request $request)
    {
    }
    public function destroy()
    {
        
    }
}
