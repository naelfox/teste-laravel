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
                    Detalhes da venda n° {{ $venda->id }}
                </div>
                <div class="card-body">
                    <h5 class="card-title"><strong>Número:</strong> {{ $venda->id }}</h5>
                    <p class="card-text"><strong>Cliente:</strong> {{ $venda->cliente->nome }}</p>
                    <p class="card-text"><strong>Produtos:</strong>
                    <ol class="list-group list-group-numbered">

                        @php
                            $total = 0;
                        @endphp

                        @foreach ($venda->produtos as $produto)
                            <li class="list-group-item d-flex justify-content-between align-items-start">
                                <div class="ms-2 me-auto">
                                    <div class="fw-bold">{{ $produto->nome }} <span class="badge bg-warning rounded-pill">R$
                                            {{ number_format($produto->preco, 2, ',', '.') }}</span>
                                    </div>
                                    Quantidade: {{ $produto->pivot->produto_quantidade }}
                                </div>

                            </li>

                            @php
                                $total += $produto->preco * $produto->pivot->produto_quantidade;
                            @endphp
                        @endforeach


                    </ol>
                    </p>


                    <p class="card-text"><strong>Valor total:</strong> R$ {{ number_format($total, 2, ',', '.') }}</p>

                    <p class="card-text"><strong>Criado em:</strong> {{ $venda->created_at->format('d/m/Y à\s H:i:s') }}</p>
                    <p class="card-text"><strong>Última atualização:</strong>
                        {{ $venda->updated_at->format('d/m/Y à\s H:i:s') }}</p>


                    <a href="{{ route('vendas.edit', $venda->id) }}" class="btn btn-primary">Editar</a>
                </div>
            </div>
        </div>
    </div>
@endsection
