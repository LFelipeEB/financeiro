<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Lang;

class StoreAccount extends FormRequest
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
            'bank_id' => "required",
            'category_id' => "required",
            'account' => "required",
            'agency' => "required",
        ];
    }

    public function messages()
    {
        return [
            'bank_id.required' => "Selecione o Banco, ele e um requisito.",
            'category_id.required' => "Selecione o Tipo da Conta, ela e um requisito.",
            'account.required' => "Digite um numero da sua conta. Este campo e obrigatorio",
            'agency.required' => "Digite um numero da sua agencia. Este campo e obrigatorio",
        ];
    }
}
