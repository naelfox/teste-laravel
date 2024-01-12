@extends('layouts.base')

@section('title', $title)

@section('content')
    <div class="row">
        <div class="col-md-6">
            <x-back-button></x-back-button>
        </div>
        <div class="col-md-6 text-md-end">
            <h5>{{ $title }} </h5>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Detalhes de {{ $cliente->nome }}
                </div>
                <div class="card-body">
                    <h5 class="card-title"><strong>Nome:</strong> {{ $cliente->nome }}</h5>
                    <p class="card-text"><strong>E-mail:</strong> {{ $cliente->email }}</p>
                    <p class="card-text"><strong>Telefone:</strong> {{ $cliente->telefone  }}</p>
                    <p class="card-text"><strong>Endereço:</strong> {{ $cliente->endereco  }}</p>
                    <p class="card-text"><strong>Criado em:</strong> {{ $cliente->created_at->format('d/m/Y à\s H:i:s') }}</p>
                    <p class="card-text"><strong>Última atualização:</strong> {{ $cliente->updated_at->format('d/m/Y à\s H:i:s') }}</p>


                    <a href="{{ route('clientes.edit', $cliente->id) }}" class="btn btn-primary">Editar</a>
                </div>
            </div>
        </div>
    </div>
@endsection
