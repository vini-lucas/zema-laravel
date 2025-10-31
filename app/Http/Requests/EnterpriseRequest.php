<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EnterpriseRequest extends FormRequest
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
        $enterprise = $this->route('enterprise');

        return [
            'name' => 'sometimes|required|unique:enterprises,name,' . ($enterprise ? $enterprise->id : null),
            'website' => 'sometimes|required|unique:enterprises,website,' . ($enterprise ? $enterprise->id : null),
            'status' => 'sometimes|required',
            'email' => 'sometimes|required|email|unique:enterprises,email,' . ($enterprise ? $enterprise->id : null)
        ];
    }
}
