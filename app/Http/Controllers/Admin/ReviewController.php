<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    public function index()
    {

        $user = Auth::user();
        
        $data = [
            "user" => $user
        ];

        return view('admin.reviews', $data);
    }
}
