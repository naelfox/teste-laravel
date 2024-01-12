<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VendaProdutoRequest extends FormRequest
{


    public function rules()
    {
        return [
            'produto_id' => [
                'required',
                'integer',
                'exists:produtos,id',
            ],
            'produto_quantidade' => [
                'required',
                'integer',
                'between:1,5000',
            ],
        ];
    }

    public function messages()
    {
        return [
            'produto_id.required' => 'O campo produto é obrigatório.',
            'produto_id.integer' => 'O campo produto deve ser um número inteiro.',
            'produto_id.exists' => 'O produto selecionado não existe na nossa base de dados.',
            'produto_quantidade.required' => 'O campo quantidade é obrigatório.',
            'produto_quantidade.integer' => 'O campo quantidade deve ser um número inteiro.',
            'produto_quantidade.between' => 'A quantidade deve estar no intervalo de :min a :max.',
        ];
    }

}
