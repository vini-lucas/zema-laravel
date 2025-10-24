<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BranchModel extends Model
{
    protected $table = "branchs";
    protected $fillable = [
        'cnpj',
        'email',
        'telephone',
        'city',
        'number_identifier'
    ];
}
