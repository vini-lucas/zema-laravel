<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        // Captura o parâmetro da rota, ou seja, se a rota possuir "/{user}" então captura o ID do registro, se não possuir parâmetro (ex.: em formulários post - cadastrar) retorna null
        $user = $this->route('user');
        
        return [
            'name' => 'sometimes|required|min:3',
            'cpf' => 'sometimes|required|unique:users,cpf,' . ($user ? $user->id : null),
            'date_birth' => 'sometimes|required',
            'gender' => 'sometimes|required',
            'email' => 'sometimes|required|email|unique:users,email,' . ($user ? $user->id : null),
            'telephone' => 'sometimes|required|unique:users,telephone,' . ($user ? $user->id : null),
            'password' => 'sometimes|required|min:6'
        ];
    }
}
