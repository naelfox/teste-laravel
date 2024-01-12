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

    <form action="{{ isset($venda) ? route('vendas.update', $venda->id) : route('vendas.store') }}" method="POST"
        class="mt-4 w-50 mx-auto">
        @csrf
        @isset($venda)
            @method('PUT')
        @endisset

        <div class="mb-3">
            <label for="cliente_id" class="form-label">Cliente:</label>
            <select name="cliente_id"
                class="form-select @error('cliente_id') is-invalid @elseif(isset($venda->cliente_id)) is-valid @enderror">
                <option value="" disabled selected>Selecione um cliente</option>
                @foreach ($clientes as $cliente)
                    <option value="{{ $cliente->id }}"
                        {{ old('cliente_id') ?? isset($venda) && $venda->cliente_id == $cliente->id ? 'selected' : '' }}>
                        {{ $cliente->nome }}
                    </option>
                @endforeach
            </select>
            @error('cliente_id')
                <div class="alert alert-danger py-2 my-2">{{ $message }}</div>
            @enderror
        </div>






        <button type="submit" class="btn btn-primary">Salvar e Próximo</button>
    </form>



@endsection
