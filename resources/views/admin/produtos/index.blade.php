@extends('layouts.base')

@section('title', $title)

@section('content')
    <div class="container">
        <h1>{{ $title }} </h1>
        <x-alerts></x-alerts>
        <a href="{{ route('produtos.create') }}" class="btn btn-primary">Cadastrar novo</a>
        <x-table>
            <x-slot:head>
                <th></th>
                <th>Nome</th>
                <th>Descrição</th>
                <th>Preço</th>
                <th>Data de Criação</th>
                <th>Ações</th>
            </x-slot:head>

            <x-slot:body>
                @foreach ($produtos as $produto)
                    <tr>
                        <td><a href="{{ route('produtos.show', $produto) }}"><i class="fa-regular fa-eye"></i></a></td>
                        <td>{{ $produto->nome }}</td>
                        <td>{{ $produto->descricao }}</td>
                        <td>{{ "R$ " . number_format($produto->preco, 2, ',', '.') }}</td>
                        <td>{{ $produto->created_at->format('d/m/Y à\s H:i:s') }}</td>
                        <td>
                            <a href="{{ route('produtos.edit', $produto) }}"><i class="fa-solid fa-pen"></i> Editar</a>
                            <a href="#" data-bs-toggle="modal" data-bs-target="#modalDelete{{ $loop->iteration }}"><i
                                    class="fa-solid fa-trash"></i> Excluir</a>

                            <x-modal-delete :route="@route('produtos.destroy', $produto)" target="modalDelete{{ $loop->iteration }}" :item="$produto->nome">

                                <p>Nome: {{ $produto->nome }}</p>
                                <p>Descrição: {{ $produto->descricao }}</p>
                                <p>Valor: {{ "R$ " . number_format($produto->preco, 2, ',', '.') }}</p>
                            </x-modal-delete>



                        </td>
                    </tr>
                @endforeach
            </x-slot:body>

        </x-table>


        {{ $produtos->links() }}
    </div>
@endsection
