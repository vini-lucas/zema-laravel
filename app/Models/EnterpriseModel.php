<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class EnterpriseModel extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    protected $table = "enterprises";

    /**
     * Se o nome da coluna não estiver na função abaixo não será possível manipular a respectiva coluna
     */
    protected $fillable = [
        'name',
        'cnpj',
        'email',
        'telephone'
    ];
}
