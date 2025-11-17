<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $nameInt = Auth::user()->name;
        $nameIntArray = explode(' ', $nameInt);
        $name = $nameIntArray[0];
        return view('dashboard.index', ['name' => $name]);
    }
}
