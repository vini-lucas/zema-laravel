<?php

namespace App\Http\Requests;

use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;

class InssRequest extends FormRequest
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
            'cpf' => 'sometimes|required|not_in:null',
            'name' => 'sometimes|required',
            'date_birth' => 'sometimes|required|date|before_or_equal:' . Carbon::now()->subYears(18)->toDateString() ,
            'literate' => 'sometimes|not_in:null',
            'telephone' => 'sometimes|required'
        ];
    }

    public function messages()
    {
        return [
            'literate.not_in' => 'Informe a alfabetização!',
            'cpf.not_in' => 'Informe o CPF!'
        ];
    }
}
