<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VendaRequest extends FormRequest
{


    public function rules()
    {
        return [
            'cliente_id' => [
                'required',
                'integer',
                'exists:clientes,id',
            ],
        ];
    }

    public function messages()
    {
        return [
            'cliente_id.required' => 'O campo cliente é obrigatório.',
            'cliente_id.integer' => 'O campo cliente deve ser um número inteiro.',
            'cliente_id.exists' => 'O cliente selecionado não existe na nossa base de dados.',
        ];
    }
}
