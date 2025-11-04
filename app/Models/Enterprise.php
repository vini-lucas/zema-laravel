<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class Enterprise extends Model implements Auditable
{
    /** @use HasFactory<\Database\Factories\EnterpriseFactory> */
    use HasFactory;

    use \OwenIt\Auditing\Auditable;

    protected $table = "enterprises";

    protected $fillable = [
        'name',
        'cnpj',
        'email',
        'website',
        'status',
        'telephone',
        'logo'
    ];
}
