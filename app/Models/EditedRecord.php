<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EditedRecord extends Model
{
    protected $table = "edited_records";
    protected $casts = [
    'values_before' => 'array',
    'values_after' => 'array',
];

    protected $fillable = [
        'table',
        'id_register',
        'user',
        'values_before',
        'values_after'
    ];
}
