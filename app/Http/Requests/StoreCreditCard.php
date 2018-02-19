<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCreditCard extends FormRequest
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
            'account_id' => "required",
            'good_true' => "required|min:4|max:6",
            'printed_name' => "required|max:255",
            'number' => "required|max:16|min:16",
            'brand' => "required",
            'limit' => "required",
            'maturity' => "required",
            'closure' => "required",
        ];
    }

    public function messages()
    {
        return [
            'account_id.required' => "Selecione uma de suas contas, ela e um requisito.",
            'good_true.required' => "Digite a data de vencimento do seu cartao. Este campo e obrigatorio.",
            'good_true.min' => "A data deve ter no minimo 4 caracteres",
            'good_true.max' => "A data deve ter no maximo 6 caracteres",
            'printed_name.required' => "Digite o nome impresso no cartao. Este campo e obrigatorio.",
            'printed_name.max' => "Nome impresso no cartao nao deve ser maior que 255 caracteres",
            'number.required' => "Digite o numero do cartao. Este campo e obrigatorio",
            'number.max' => "O cartao tem exatamente 16 numero. Verifique o numero digitado.",
            'number.min' => "O cartao tem exatamente 16 numero. Verifique o numero digitado.",
            'brand.required' => "Digite a Bandeira do seu cartao. Este campo e obrigatorio",
            'limit.required' => "Digite o limite do seu cartao. Este campo e obrigatorio",
            'maturity.required' => "Digite a Data de VENCIMENTO do seu cartao. Este campo e obrigatorio",
            'closure.required' => "Digite a Data de FECHAMENTO DA FATURA do seu cartao. Este campo e obrigatorio",
        ];
    }
}
