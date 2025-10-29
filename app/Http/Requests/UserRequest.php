<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'sometimes|required|min:3',
            'cpf' => 'sometimes|required',
            'date_birth' => 'sometimes|required',
            'gender' => 'sometimes|required',
            'email' => 'sometimes|required',
            'telephone' => 'sometimes|required',
            'password' => 'sometimes|required',
        ];
    }
}
