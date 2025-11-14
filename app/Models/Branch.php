<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class Branch extends Model implements Auditable
{
    /** @use HasFactory<\Database\Factories\BranchFactory> */
    use HasFactory;

    use \OwenIt\Auditing\Auditable;

    protected $table = "branches";
    protected $fillable = [
        'cnpj',
        'email',
        'telephone',
        'city',
        'enterprise_id'
    ];

    public function user()
    {
        return $this->hasMany(User::class);
    }

    public function enterprise()
    {
        return $this->belongsTo(Enterprise::class);
    }
}
