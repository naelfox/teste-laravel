<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClienteRequest extends FormRequest
{
    public function rules()
    {

        $id = isset($this->cliente->id) ? ',' . $this->cliente->id : '';


        return [
            'nome' =>  'required|between:3,128',
            'email' =>  'required|email|unique:clientes,email' . $id,
            'telefone' =>  'required|between:3,128',
            'endereco' =>  'required|between:3,2000',
        ];
    }

    public function messages()
    {
        return [
            'nome.required' => 'O campo Nome é obrigatório',
            'email.unique' => 'O e-mail ":input" já existe nos registros',
            'email.required' => 'É necessário informar um E-mail',
            'email' => 'O e-mail informado ":input" é inválido',
            'telefone.required' => 'É necessário informar o :attribute',
            'endereco.required' => 'É necessário informar um endereço',
            'between' => 'É preciso ter entre :min a :max caracteres',
        ];
    }
}
