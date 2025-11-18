<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use OwenIt\Auditing\Contracts\Auditable;

class User extends Authenticatable implements Auditable
{
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
        'status_id',
        'branch_id',
        'level_access_id'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function branch()
    {
        return $this->belongsTo(Branch::class);
    }

    public function enterprise()
    {
        return $this->belongsTo(Enterprise::class);
    }
}
