<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\EditedRecord;
use Illuminate\Http\Request;

class EditedRecordsController extends Controller
{
    public function index($table, $register)
    {
        $alters = EditedRecord::where('table', $table)->where('id_register', $register)->get();
        return view('edited_records.index', ['alters' => $alters, 'table' => $table]);
    }
}
