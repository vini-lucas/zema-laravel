<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LevelAccess extends Model
{
    protected $table = "levels_access";
    protected $fillable = [
        'name',
        'description'
    ];

    public function user()
    {
        return $this->hasMany(User::class);
    }

}
