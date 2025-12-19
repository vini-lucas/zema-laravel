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
            'gender' => 'sometimes|in:masculino,feminino,não_informado',
            'email' => 'sometimes|required|email|unique:users,email,' . ($user ? $user->id : null),
            'telephone' => 'sometimes|required|unique:users,telephone,' . ($user ? $user->id : null),
            'password' => 'sometimes|required|min:6',
            'confirmation_password' => 'sometimes|same:password',
            'level_access_id' => 'sometimes|not_in:null'
        ];
    }

    public function messages(): array
    {
        return [
            'confirmation_password.same' => 'A confirmação de senha não corresponde!',
            'date_birth.required' => 'Informe a data de nascimento!',
            'telephone.required' => 'Informe o telefone!',
            'password.required' => 'Informe a senha!',
            'level_access_id.not_in' => 'Selecione o nível de acesso!'
        ];
    }
}
