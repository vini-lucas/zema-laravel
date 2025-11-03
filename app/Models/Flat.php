<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Flat extends Model
{
    /** @use HasFactory<\Database\Factories\FlatFactory> */
    use HasFactory;

    protected $table = "flats";

    protected $fillable = [
        'name',
        'description',
        'months_guarantee'
    ];
}
