@extends('layouts.base')

@section('title', $title)

@section('content')
    <div class="row">
        <div class="col-md-6">
            <a href="{{ route('produtos.index') }}" class="btn btn-primary"><i class="fa-solid fa-chevron-left"></i> Voltar a lista</a>
        </div>
        <div class="col-md-6 text-md-end">
            <h5>{{ $title }} </h5>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Detalhes de {{ $produto->nome }}
                </div>
                <div class="card-body">
                    <h5 class="card-title"><strong>Nome:</strong> {{ $produto->nome }}</h5>
                    <p class="card-text"><strong>Descrição:</strong> {{ $produto->descricao }}</p>
                    <p class="card-text"><strong>Preço:</strong> R$ {{ number_format($produto->preco, 2, ',', '.') }}</p>
                    {{-- <p class="card-text"><strong>Quantidade em Estoque:</strong> {{ $produto->quantidade_estoque }}</p> --}}
                    <p class="card-text"><strong>Criado em:</strong> {{ $produto->created_at->format('d/m/Y à\s H:i:s') }}</p>
                    <p class="card-text"><strong>Última atualização:</strong> {{ $produto->updated_at->format('d/m/Y à\s H:i:s') }}</p>


                    <a href="{{ route('produtos.edit', $produto->id) }}" class="btn btn-primary">Editar</a>
                </div>
            </div>
        </div>
    </div>
@endsection
