<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    /** @use HasFactory<\Database\Factories\BranchFactory> */
    use HasFactory;

    protected $table = "branches";
    protected $fillable = [
        'cnpj',
        'email',
        'telephone',
        'city',
        'number_identifier'
    ];
}
