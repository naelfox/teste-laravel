@extends('layouts.base')

@section('title', $title)

@section('content')
    <div class="container">
        <h1>{{ $title }} </h1>
        <x-alerts></x-alerts>
        <a href="{{ route('clientes.create') }}" class="btn btn-primary">Cadastrar novo</a>
        <x-table>
            <x-slot:head>
                <th></th>
                <th>Nome</th>
                <th>E-mail</th>
                <th>Telefone</th>
                <th>Endereço</th>
                <th>Data de Criação	</th>
                <th>Ações</th>
            </x-slot:head>

            <x-slot:body>
                @foreach ($clientes as $cliente)
                    <tr>
                        <td><a href="{{ route('clientes.show', $cliente) }}"><i class="fa-regular fa-eye"></i></a></td>
                        <td>{{ $cliente->nome }}</td>
                        <td>{{ $cliente->email }}</td>
                        <td>{{ $cliente->telefone }}</td>
                        <td>{{ $cliente->endereco }}</td>
                        <td>{{ $cliente->created_at->format('d/m/Y à\s H:i:s') }}</td>
                        <td>
                            <a href="{{ route('clientes.edit', $cliente) }}"><i class="fa-solid fa-pen"></i> Editar</a>
                            <a href="#" data-bs-toggle="modal" data-bs-target="#modalDelete{{ $loop->iteration }}"><i
                                    class="fa-solid fa-trash"></i> Excluir</a>

                            <x-modal-delete :route="@route('clientes.destroy', $cliente)" target="modalDelete{{ $loop->iteration }}" :item="$cliente->nome">

                                <p>Nome: {{ $cliente->nome }}</p>
                                <p>Email: {{ $cliente->email }}</p>
                                <p>Telefone: {{ $cliente->telefone }}</p>
                            </x-modal-delete>



                        </td>
                    </tr>
                @endforeach
            </x-slot:body>

        </x-table>


        {{ $clientes->links() }}
    </div>
@endsection
