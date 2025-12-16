<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class Product extends Model implements Auditable
{
    /** @use HasFactory<\Database\Factories\ProductFactory> */
    use HasFactory;

    use \OwenIt\Auditing\Auditable;

    protected $fillable = [
        'enterprise_id',
        'description',
        'flat_id',
        'months_guarantee',
        'factory_price',
        'enterprise_name',
        'branch',
        'user'
    ];

    protected $table = 'products';

    public function flat()
    {
        return $this->belongsTo(Flat::class);
    }

    public function enterprise()
    {
        return $this->belongsTo(Enterprise::class);
    }
}
