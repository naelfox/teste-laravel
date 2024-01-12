@extends('layouts.base')

@section('title', $title)

@section('content')
    <div class="row">
        <div class="col-md-6">
            <a href="{{ route('clientes.index') }}" class="btn btn-primary"><i class="fa-solid fa-chevron-left"></i> Voltar a lista</a>
        </div>
        <div class="col-md-6 text-md-end">
            <h5>{{ $title }} </h5>
        </div>
    </div>

    <form action="{{ isset($cliente) ? route('clientes.update', $cliente->id) : route('clientes.store') }}" method="POST"
        class="mt-4 w-50 mx-auto">
        @csrf
        @isset($cliente)
            @method('PUT')
        @endisset

        <div class="mb-3">
            <label for="nome" class="form-label">Nome:</label>

            <input type="text" name="nome" value="{{ old('nome') ?? (isset($cliente) ? $cliente->nome : '') }}"
                class="form-control @error('nome') is-invalid @elseif(isset($cliente->nome))  is-valid @enderror"  placeholder="de 3 até 128 caracteres" >

            @error('nome')
                <div class="alert alert-danger py-2 my-2">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">E-mail:</label>

            <input type="text" name="email" value="{{ old('email') ?? (isset($cliente) ? $cliente->email : '') }}"
                class="form-control @error('email') is-invalid   @elseif(isset($cliente->email))   is-valid @enderror"  placeholder="exemplo@email.com">

            @error('email')
                <div class="alert alert-danger py-2 my-2">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="telefone" class="form-label">Telefone:</label>

            <input type="text" name="telefone" value="{{ old('telefone') ?? (isset($cliente) ? $cliente->telefone : '') }}"
                class="form-control @error('telefone') is-invalid  @elseif(isset($cliente->telefone))   is-valid @enderror"  placeholder="Telefone com DDD">

            @error('telefone')
                <div class="alert alert-danger py-2 my-2">{{ $message }}</div>
            @enderror
        </div>



        <div class="mb-3">
            <label for="endereco" class="form-label">Endereço:</label>
            <textarea name="endereco" class="form-control @error('endereco') is-invalid  @elseif(isset($cliente->endereco))   is-valid @enderror"  placeholder="de 3 até 2000 caracteres">{{ old('endereco') ?? (isset($cliente->endereco) ? $cliente->endereco : '') }}</textarea>
            @error('endereco')
                <div class="alert alert-danger py-2 my-2">{{ $message }}</div>
            @enderror
        </div>


        <button type="submit" class="btn btn-primary">Salvar</button>
    </form>





@endsection
