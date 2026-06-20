@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-start mb-4">


<div>
    <h2 class="page-title mb-1">
        Detalhes do Cliente
    </h2>

    <p class="text-muted mb-0">
        Informação completa do cliente registado.
    </p>

    <div class="gold-line"></div>
</div>

<div class="d-flex gap-2">

    <a href="{{ route('clientes.edit', $cliente) }}"
       class="btn btn-gold">
        <i class="bi bi-pencil-fill me-2"></i>
        Editar
    </a>

    <a href="{{ route('clientes.index') }}"
       class="btn btn-outline-primary">
        <i class="bi bi-arrow-left me-2"></i>
        Voltar
    </a>

</div>

</div>

<div class="profile-card">

<div class="profile-header">

    <div class="profile-avatar">
        {{ strtoupper(substr($cliente->nome, 0, 1)) }}
    </div>

    <h3 class="fw-bold mt-4 mb-1" style="color:#0b1f3a;">
        {{ $cliente->nome }}
    </h3>

    <p class="text-muted mb-3">
        Cliente registado na plataforma
    </p>

    <span class="client-badge">
        Cliente #{{ $cliente->id }}
    </span>

</div>

<div class="p-4">

    <div class="row g-4">

        <div class="col-md-6">
            <div class="info-card">

                <div class="info-label">
                    Email
                </div>

                <div class="info-value">
                    <i class="bi bi-envelope-fill me-2"
                       style="color:#c9a227;"></i>

                    {{ $cliente->email }}
                </div>

            </div>
        </div>

        <div class="col-md-6">
            <div class="info-card">

                <div class="info-label">
                    Telefone
                </div>

                <div class="info-value">
                    <i class="bi bi-telephone-fill me-2"
                       style="color:#c9a227;"></i>

                    {{ $cliente->telefone }}
                </div>

            </div>
        </div>

        <div class="col-md-6">
            <div class="info-card">

                <div class="info-label">
                    NIF
                </div>

                <div class="info-value">
                    <i class="bi bi-credit-card-fill me-2"
                       style="color:#c9a227;"></i>

                    {{ $cliente->nif }}
                </div>

            </div>
        </div>

        <div class="col-md-6">
            <div class="info-card">

                <div class="info-label">
                    Identificador
                </div>

                <div class="info-value">
                    <i class="bi bi-hash me-2"
                       style="color:#c9a227;"></i>

                    {{ $cliente->id }}
                </div>

            </div>
        </div>

        <div class="col-12">
            <div class="info-card">

                <div class="info-label">
                    Morada
                </div>

                <div class="info-value">
                    <i class="bi bi-geo-alt-fill me-2"
                       style="color:#c9a227;"></i>

                    {{ $cliente->morada }}
                </div>

            </div>
        </div>

    </div>

</div>

</div>

@endsection
