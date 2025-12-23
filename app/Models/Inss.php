<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class Inss extends Model implements Auditable
{
    /** @use HasFactory<\Database\Factories\InssFactory> */
    use HasFactory;

    use \OwenIt\Auditing\Auditable;

    protected $table = "inss";

    protected $fillable = [
        'cpf',
        'name',
        'date_birth',
        'naturalness',
        'literate',
        'telephone',
        'mother',
        'father',
        'bank',
        'agency',
        'account',
        'type_loan',
        'value',
        'term',
        'value_portion',
        'bank_typed',
        'promoter',
        'link',
        'internship',
        'possession',
        'situation',
        'observation',
        'instruction',
        'user_id',
        'enterprise_id',
        'branch_id',
        'seller_cpf'
    ];
}
