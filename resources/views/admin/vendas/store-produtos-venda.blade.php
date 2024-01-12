@extends('layouts.base')

@section('title', $title)

@section('content')
    <div class="row">
        <div class="col-md-6">
            <a href="{{ route('vendas.index') }}" class="btn btn-primary"><i class="fa-solid fa-chevron-left"></i> Voltar a
                lista</a>
        </div>
        <div class="col-md-6 text-md-end">
            <h5>{{ $title }} </h5>
        </div>
    </div>

    <form action="{{ route('venda.produtos.store', $vendaProduto) }}" method="POST" class="mt-4 w-50 mx-auto">
        @csrf

        <div class="mb-3">
            <label for="produto_id" class="form-label">Produto:</label>
            <select name="produto_id"
                class="form-select @error('produto_id') is-invalid @elseif(isset($vendaProduto->produto_id)) is-valid @enderror">
                <option value="" disabled selected>Selecione um produto</option>
                @foreach ($produtos as $produto)
                    <option value="{{ $produto->id }}"
                        {{ old('produto_id') ?? isset($vendaProduto) && $vendaProduto->produto_id == $produto->id ? 'selected' : '' }}>
                        {{ $produto->nome }}
                    </option>
                @endforeach
            </select>
            @error('produto_id')
                <div class="alert alert-danger py-2 my-2">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="produto_quantidade" class="form-label">Quantidade:</label>
            <input type="number" name="produto_quantidade"
                value="{{ old('produto_quantidade') ?? (isset($vendaProduto) ? $vendaProduto->produto_quantidade : '') }}"
                class="form-control @error('produto_quantidade') is-invalid @elseif(isset($vendaProduto->produto_quantidade)) is-valid @enderror">
            @error('produto_quantidade')
                <div class="alert alert-danger py-2 my-2">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Salvar</button>
    </form>

    <div class="mt-4 w-50 mx-auto">
        @if ($vendaProduto->produto)
            <div class="mt-4">
                <h4>Produtos Cadastrados:</h4>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Produto</th>
                            <th>Quantidade</th>
                            <th>Valor unitário</th>
                            <th>Valor total</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($vendaProduto->produto as $produto)

                            <tr>
                                <td>{{ $produto->nome }}</td>
                                <td>{{ $produto->pivot->produto_quantidade }}</td>
                                <td>{{ "R$" . number_format($produto->preco, 2, ',', '.') }}</td>
                                <td>{{ "R$" . number_format($produto->preco * $produto->pivot->produto_quantidade, 2, ',', '.') }}
                                </td>
                                <td>


                                    <a href="#" data-bs-toggle="modal"
                                        data-bs-target="#modalDelete{{ $loop->iteration }}"><i
                                            class="fa-solid fa-trash"></i> Excluir</a>

                                    <x-modal-delete :route="@route('venda.produtos.destroy', ['venda' => $vendaProduto, 'vendaProduto' => $vendaProduto->vendaProduto])" target="modalDelete{{ $loop->iteration }}"
                                        :item="$produto->nome">

                                        <p>N° Venda: {{ $vendaProduto->id }}</p>
                                        <p>Quantidade: {{ $produto->pivot->produto_quantidade }}</p>


                                    </x-modal-delete>

                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
        <x-alerts></x-alerts>
    </div>

@endsection
