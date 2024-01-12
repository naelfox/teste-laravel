<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProdutoRequest extends FormRequest
{


    public function rules()
    {

        return [
            'nome' =>  'required|between:3,128',
            'descricao' =>  'required|between:3,2000',
            'preco' => 'required|regex:/^[\d\.,]+$/'
        ];
    }

    public function messages()
    {
        return [
            'nome.required' => 'O campo Nome é obrigatório',
            'descricao.required' => 'Descrição é obrigatório',
            'preco.required' => 'É necessário ao menos algum valor',
            'preco.regex' => 'O campo preço possui caracteres inválidos',
            'between' => 'É preciso ter entre :min a :max caracteres',
        ];
    }
}
