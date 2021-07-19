<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

class StatisticController extends Controller
{
    public function index()
    {
        return view('admin.statistics.index'); 
    }
}