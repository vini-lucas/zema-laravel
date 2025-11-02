<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'store' => 'sometimes|required|not_in:null',
            'description' => 'sometimes|required',
            'flat' => 'sometimes|required|not_in:null',
            'months_guarantee' => 'sometimes|required',
            'factory_price' => 'sometimes|required'
        ];
    }

    public function messages()
    {
        return [
            'store.not_in' => 'Informe a loja!',
            'flat.not_in' => 'Informe o plano!',
            'description.required' => 'Informe a descrição!',
            'months_guarantee.required' => 'Informe a quantidade de meses de garantia!',
            'factory_price.required' => 'Informe o preço de fábrica!',
        ];
    }
}
