@extends('layouts.app')

@section('content')

<h1>Editar Cliente</h1>

<form action="{{ route('clientes.update', $cliente) }}" method="POST">

    @csrf
    @method('PUT')

    <div class="mb-3">
        <label for="nome" class="form-label">Nome</label>
        <input id="nome" type="text" name="nome" class="form-control" value="{{ old('nome', $cliente->nome) }}">
    </div>

    <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input id="email" type="email" name="email" class="form-control" value="{{ old('email', $cliente->email) }}">
    </div>

    <div class="mb-3">
        <label for="telefone" class="form-label">Telefone</label>
        <input id="telefone" type="text" name="telefone" class="form-control" value="{{ old('telefone', $cliente->telefone) }}">
    </div>

    <div class="mb-3">
        <label for="morada" class="form-label">Morada</label>
        <input id="morada" type="text" name="morada" class="form-control" value="{{ old('morada', $cliente->morada) }}">
    </div>

    <div class="mb-3">
        <label for="nif" class="form-label">NIF</label>
        <input id="nif" type="text" name="nif" class="form-control" value="{{ old('nif', $cliente->nif) }}">
    </div>

    <button type="submit" class="btn btn-outline-success">
        Atualizar
    </button>

    <a href="{{ route('clientes.index') }}" class="btn btn-outline-secondary">
        Voltar
    </a>

</form>

@endsection
