<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class BranchModel extends Model
{
    protected $fillable = [
        'cnpj',
        'email',
        'telephone',
        'city',
        'number_identifier'
    ];
}
