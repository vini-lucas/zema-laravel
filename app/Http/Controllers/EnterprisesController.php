<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EnterprisesController extends Controller
{
    // Alistamento das empresas
    public function index()
    {
        return view('enterprises.index');
    }
}
