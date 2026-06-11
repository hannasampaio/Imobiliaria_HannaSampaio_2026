@extends('layouts.app')

@section('content')

<h1>Novo Cliente</h1>

<form action="{{ route('clientes.store') }}" method="POST">

    @csrf

    <div class="mb-3">
        <label for="nome" class="form-label">Nome</label>
        <input id="nome" type="text" name="nome" class="form-control" value="{{ old('nome') }}">
    </div>

    <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input id="email" type="email" name="email" class="form-control" value="{{ old('email') }}">
    </div>

    <div class="mb-3">
        <label for="telefone" class="form-label">Telefone</label>
        <input id="telefone" type="text" name="telefone" class="form-control" value="{{ old('telefone') }}">
    </div>

    <div class="mb-3">
        <label for="morada" class="form-label">Morada</label>
        <input id="morada" type="text" name="morada" class="form-control" value="{{ old('morada') }}">
    </div>

    <div class="mb-3">
        <label for="nif" class="form-label">NIF</label>
        <input id="nif" type="text" name="nif" class="form-control" value="{{ old('nif') }}">
    </div>

    <button type="submit" class="btn btn-outline-success">
        Guardar
    </button>

    <a href="{{ route('clientes.index') }}" class="btn btn-outline-secondary">
        Voltar
    </a>

</form>

@endsection
