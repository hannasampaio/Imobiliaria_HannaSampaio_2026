@extends('layouts.app')

@section('content')

<style>
    .page-title {
        color: #0b1f3a;
        font-weight: 800;
    }

    .gold-line {
        width: 55px;
        height: 3px;
        background: #c9a227;
        border-radius: 10px;
        margin-top: 10px;
    }

    .form-card {
        background: white;
        border-radius: 22px;
        border: 1px solid #eef0f3;
        box-shadow: 0 12px 35px rgba(0,0,0,.07);
        overflow: hidden;
    }

    .form-header {
        padding: 24px 30px;
        border-bottom: 1px solid #eef0f3;
    }

    .form-body {
        padding: 30px;
    }

    .form-label {
        font-weight: 600;
        color: #0b1f3a;
    }

    .form-control {
        border-radius: 12px;
        border: 1px solid #dbe2ea;
        padding: 12px 14px;
    }

    .form-control:focus {
        border-color: #c9a227;
        box-shadow: 0 0 0 .15rem rgba(201,162,39,.20);
    }

    .client-icon {
        width: 70px;
        height: 70px;
        border-radius: 50%;
        background: rgba(201,162,39,.12);
        color: #c9a227;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 32px;
        margin: auto;
    }

    .client-id {
        display: inline-block;
        margin-top: 10px;
        background: #f5ead0;
        color: #9b741c;
        padding: 6px 14px;
        border-radius: 999px;
        font-size: 13px;
        font-weight: 600;
    }
</style>

<div class="d-flex justify-content-between align-items-start mb-4">

<div>
    <h2 class="page-title mb-1">
        Editar Cliente
    </h2>

    <p class="text-muted mb-0">
        Atualize as informações do cliente.
    </p>

    <div class="gold-line"></div>
</div>

<a href="{{ route('clientes.index') }}"
   class="btn btn-outline-primary rounded-3">
    <i class="bi bi-arrow-left me-2"></i>
    Voltar
</a>

</div>

<div class="form-card">

<div class="form-header">

    <div class="text-center">

        <div class="client-icon">
            <i class="bi bi-pencil-square"></i>
        </div>

        <h4 class="fw-bold mt-3 mb-1" style="color:#0b1f3a;">
            Editar Cliente
        </h4>

        <small class="text-muted">
            Atualize os dados abaixo.
        </small>

        <div class="client-id">
            Cliente #{{ $cliente->id }}
        </div>

    </div>

</div>

<div class="form-body">

    <form action="{{ route('clientes.update', $cliente) }}" method="POST">

        @csrf
        @method('PUT')

        <div class="row">

            <div class="col-md-6 mb-3">
                <label for="nome" class="form-label">
                    Nome Completo
                </label>

                <input
                    id="nome"
                    type="text"
                    name="nome"
                    class="form-control"
                    value="{{ old('nome', $cliente->nome) }}">
            </div>

            <div class="col-md-6 mb-3">
                <label for="email" class="form-label">
                    Email
                </label>

                <input
                    id="email"
                    type="email"
                    name="email"
                    class="form-control"
                    value="{{ old('email', $cliente->email) }}">
            </div>

        </div>

        <div class="row">

            <div class="col-md-6 mb-3">
                <label for="telefone" class="form-label">
                    Telefone
                </label>

                <input
                    id="telefone"
                    type="text"
                    name="telefone"
                    class="form-control"
                    value="{{ old('telefone', $cliente->telefone) }}">
            </div>

            <div class="col-md-6 mb-3">
                <label for="nif" class="form-label">
                    NIF
                </label>

                <input
                    id="nif"
                    type="text"
                    name="nif"
                    class="form-control"
                    value="{{ old('nif', $cliente->nif) }}">
            </div>

        </div>

        <div class="mb-4">
            <label for="morada" class="form-label">
                Morada
            </label>

            <input
                id="morada"
                type="text"
                name="morada"
                class="form-control"
                value="{{ old('morada', $cliente->morada) }}">
        </div>

        <div class="d-flex justify-content-end gap-2">

            <a href="{{ route('clientes.index') }}"
               class="btn btn-outline-secondary px-4">
                Cancelar
            </a>

            <button type="submit"
                    class="btn btn-gold px-4">
                <i class="bi bi-check-circle-fill me-2"></i>
                Atualizar Cliente
            </button>

        </div>

    </form>

</div>
```

</div>

@endsection
