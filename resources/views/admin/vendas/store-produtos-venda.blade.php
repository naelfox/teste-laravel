@extends('layouts.base')

@section('title', $title)

@section('content')
    <div class="row">
        <div class="col-md-6">
            <x-back-button :route="@route('vendas.index')"></x-back-button>
        </div>
        <div class="col-md-6 text-md-end">
            <h5>{{ $title }} </h5>
        </div>
    </div>

    <form action="{{ route('venda.produtos.store', $venda) }}" method="POST" class="mt-4 w-50 mx-auto">
        @csrf


        <div class="mb-3">
            <label for="produto_id" class="form-label">Produto:</label>
            <select name="produto_id"
                class="form-select @error('produto_id') is-invalid @elseif(isset($venda->produto_id)) is-valid @enderror">
                <option value="" disabled selected>Selecione um produto</option>
                @foreach ($produtos as $produto)
                    <option value="{{ $produto->id }}"
                        {{ old('produto_id') ?? isset($venda) && $venda->produto_id == $produto->id ? 'selected' : '' }}>
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
                value="{{ old('produto_quantidade') ?? (isset($venda) ? $venda->produto_quantidade : '') }}"
                class="form-control @error('produto_quantidade') is-invalid @elseif(isset($venda->produto_quantidade)) is-valid @enderror">
            @error('produto_quantidade')
                <div class="alert alert-danger py-2 my-2">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Incluir</button>
    </form>

    <div class="mt-4 w-50 mx-auto">
        @isset($venda->produtos)
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
                        @php
                            $total = 0;
                        @endphp

                        @foreach ($venda->produtos as $produto)
                            <tr>
                                <td>{{ $produto->nome }}</td>
                                <td>{{ $produto->pivot->produto_quantidade }}</td>
                                <td>{{ "R$" . number_format($produto->preco, 2, ',', '.') }}</td>
                                <td>{{ "R$" . number_format($produto->preco * $produto->pivot->produto_quantidade, 2, ',', '.') }}
                                </td>
                                <td>


                                    <a href="#" data-bs-toggle="modal"
                                        data-bs-target="#modalDelete{{ $loop->iteration }}"><i class="fa-solid fa-trash"></i>
                                        Excluir</a>

                                    <x-modal-delete :route="@route('venda.produtos.destroy', ['venda' => $venda, 'produto' => $produto->id])" target="modalDelete{{ $loop->iteration }}"
                                        :item="$produto->nome">

                                        <p>N° Venda: {{ $venda->id }}</p>
                                        <p>Quantidade: {{ $produto->pivot->produto_quantidade }}</p>


                                    </x-modal-delete>

                                </td>
                            </tr>
                            @php
                                $total += $produto->preco * $produto->pivot->produto_quantidade;
                            @endphp
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="3"><strong>Total:</strong></td>
                            <td><strong>{{ "R$" . number_format($total, 2, ',', '.') }}</strong></td>
                            <td></td>
                        </tr>
                    </tfoot>
                </table>
            </div>
            <a type="submit" href="{{ route('vendas.index') }}" class="btn btn-primary">Finalizar</a>
        @endisset
        <x-alerts></x-alerts>
    </div>

@endsection
