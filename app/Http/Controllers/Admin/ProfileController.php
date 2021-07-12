<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index()
    {
        $profile = Auth::user()->userDetails;
        
        return view('admin.profile', compact('profile'));
    }
}
