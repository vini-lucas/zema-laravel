<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class Flat extends Model implements Auditable
{
    /** @use HasFactory<\Database\Factories\FlatFactory> */
    use HasFactory;

    use \OwenIt\Auditing\Auditable;

    protected $table = "flats";

    protected $fillable = [
        'name',
        'description',
        'months_guarantee'
    ];

    public function product()
    {
        return $this->hasMany(Product::class);
    }
}
