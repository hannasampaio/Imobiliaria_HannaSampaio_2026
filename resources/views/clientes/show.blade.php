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

    .profile-card {
        background: white;
        border-radius: 22px;
        border: 1px solid #eef0f3;
        box-shadow: 0 12px 35px rgba(0,0,0,.07);
        overflow: hidden;
    }

    .profile-header {
        padding: 40px;
        text-align: center;
        border-bottom: 1px solid #eef0f3;
    }

    .profile-avatar {
        width: 110px;
        height: 110px;
        border-radius: 50%;
        background: rgba(201,162,39,.12);
        color: #0b1f3a;
        border: 3px solid #c9a227;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 42px;
        font-weight: 800;
        margin: auto;
    }

    .info-card {
        background: #fafbfd;
        border: 1px solid #eef0f3;
        border-radius: 16px;
        padding: 18px;
        height: 100%;
    }

    .info-label {
        color: #6b7280;
        font-size: 13px;
        text-transform: uppercase;
        letter-spacing: .5px;
        margin-bottom: 6px;
    }

    .info-value {
        color: #0b1f3a;
        font-weight: 700;
        font-size: 16px;
    }

    .client-badge {
        background: #f5ead0;
        color: #9b741c;
        padding: 8px 16px;
        border-radius: 999px;
        font-size: 13px;
        font-weight: 600;
    }
</style>

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
