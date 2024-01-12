@extends('layouts.base')

@section('title', $title)

@section('content')
    <div class="container">
        <h1>{{ $title }} </h1>
        <x-alerts></x-alerts>
        <a href="{{ route('vendas.create') }}" class="btn btn-primary">Cadastrar novo</a>
        <x-table>
            <x-slot:head>
                <th></th>
                <th>N° Venda</th>
                <th>Cliente</th>
                <th>Produtos Solicitados</th>
                <th>Data do Pedido</th>
                <th>Ações</th>
            </x-slot:head>

            <x-slot:body>

                @foreach ($vendas as $venda)
                    <tr>


                        <td><a href="{{ route('vendas.show', $venda) }}"><i class="fa-regular fa-eye"></i></a></td>
                        <td>#{{ $venda->id }}</td>
                        <td>{{ $venda->cliente->nome }}</td>
                        <td>{{ $venda->venda_produtos_count }}</td>
                        <td>{{ $venda->created_at->format('d/m/Y à\s H:i:s') }}</td>
                        <td>
                            <a href="{{ route('vendas.edit', $venda) }}"><i class="fa-solid fa-pen"></i> Editar</a>
                            <a href="#" data-bs-toggle="modal" data-bs-target="#modalDelete{{ $loop->iteration }}"><i
                                    class="fa-solid fa-trash"></i> Excluir</a>

                            <x-modal-delete :route="@route('vendas.destroy', $venda)" target="modalDelete{{ $loop->iteration }}" :item="$venda->nome">

                                <p>N° Venda: {{ $venda->id }}</p>
                                <p>Pedido do cliente: {{ $venda->produto_id }}</p>
                                <p>Produtos: {{ $venda->produto_id }}</p>
                            </x-modal-delete>



                        </td>
                    </tr>
                @endforeach
            </x-slot:body>

        </x-table>


        {{ $vendas->links() }}
    </div>
@endsection
