<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class User extends Model implements Auditable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory;

    use \OwenIt\Auditing\Auditable;

    protected $table = "users";

    protected $fillable = [
        'name',
        'cpf',
        'date_birth',
        'gender',
        'email',
        'telephone',
        'password',
        'status'
    ];

    public function branch()
    {
        return $this->belongsTo(Branch::class);
    }
}
