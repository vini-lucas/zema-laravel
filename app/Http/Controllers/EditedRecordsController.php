<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EditedRecordsController extends Controller
{
    public function index()
    {
        return view('edited_records.index');
    }
}
