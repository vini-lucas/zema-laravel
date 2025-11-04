<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BranchRequest extends FormRequest
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
       $branch = $this->route('branch');

        return [
            'cnpj' => 'sometimes|required|unique:branches,cnpj,' . ($branch ? $branch->id : null),
            'telephone' => 'sometimes|required|unique:branches,telephone,' . ($branch ? $branch->id : null),
            'city' => 'sometimes|required',
            'number_identifier' => 'sometimes|required',
            'email' => 'sometimes|required|email|unique:branches,email,' . ($branch ? $branch->id : null)
        ];
    }
}
