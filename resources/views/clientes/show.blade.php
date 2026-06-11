@extends('layouts.app')

@section('content')

<h1>Detalhes do Cliente</h1>

<div class="card">
    <div class="card-body">

        <p><strong>ID:</strong> {{ $cliente->id }}</p>

        <p><strong>Nome:</strong> {{ $cliente->nome }}</p>

        <p><strong>Email:</strong> {{ $cliente->email }}</p>

        <p><strong>Telefone:</strong> {{ $cliente->telefone }}</p>

        <p><strong>Morada:</strong> {{ $cliente->morada }}</p>

        <p><strong>NIF:</strong> {{ $cliente->nif }}</p>

        <a href="{{ route('clientes.index') }}"
           class="btn btn-outline-secondary">
            Voltar
        </a>

    </div>
</div>

@endsection
