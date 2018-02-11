<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreApplication extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'value' => 'required',
            'expected' => 'required',
            'type' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'value.required' => "Digite o valor Aplicado. Este campo e obrigatorio",
            'expected.required' => "Digite o rendimento esperado. Este campo e obrigatorio",
            'type.required' => "Digite um numero da sua conta. Este campo e obrigatorio.",
        ];
    }
}
