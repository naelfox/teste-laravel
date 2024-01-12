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

    <form action="{{ isset($produto) ? route('produtos.update', $produto->id) : route('produtos.store') }}" method="POST"
        class="mt-4 w-50 mx-auto">
        @csrf
        @isset($produto)
            @method('PUT')
        @endisset

        <div class="mb-3">
            <label for="nome" class="form-label">Nome:</label>
            <input type="text" name="nome" value="{{ old('nome') ?? (isset($produto) ? $produto->nome : '') }}"
                class="form-control @error('nome') is-invalid @elseif(isset($produto->nome)) is-valid @enderror"  placeholder="de 3 até 128 caracteres" >

            @error('nome')
                <div class="alert alert-danger py-2 my-2">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="descricao" class="form-label">Descrição:</label>
            <textarea name="descricao" class="form-control @error('descricao') is-invalid @elseif(isset($produto->descricao)) is-valid @enderror"  placeholder="de 3 até 2000 caracteres">{{ old('descricao') ?? (isset($produto->descricao) ? $produto->descricao : '') }}</textarea>
            @error('descricao')
                <div class="alert alert-danger py-2 my-2">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="preco" class="form-label">Preço:</label>
            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">R$</span>
                <input type="text" name="preco"
                    value="{{ old('preco') ?? (isset($produto->preco) ? number_format($produto->preco, 2, ',', '.') : '') }}"
                    class="form-control format @error('preco') is-invalid @elseif(isset($produto->preco)) is-valid @enderror" step="0.01" aria-describedby="basic-addon1">
                @error('preco')
                    <div class="alert alert-danger py-2 my-2">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Salvar</button>
    </form>

    @push('scripts')
        <script>
            // formatar visualização para usuario em BRL
            document.addEventListener('input', function(event) {
                if (event.target.matches('input.format')) {
                    let value = event.target.value.replace(/\D/g, '');

                    if (value) {
                        value = (parseInt(value) / 100).toLocaleString('pt-BR', {
                            style: 'decimal',
                            minimumFractionDigits: 2,
                            maximumFractionDigits: 2
                        });
                        value = value.replace('R$', '');
                        event.target.value = value;
                    }
                }
            });
        </script>
    @endpush



@endsection
