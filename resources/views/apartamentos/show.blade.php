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

    .property-card {
        background: white;
        border-radius: 24px;
        overflow: hidden;
        border: 1px solid #eef0f3;
        box-shadow: 0 15px 40px rgba(0,0,0,.08);
    }

    .property-image {
        width: 100%;
        height: 420px;
        object-fit: cover;
    }

    .property-body {
        padding: 30px;
    }

    .price-box {
        background: linear-gradient(135deg, #0b1f3a, #163b63);
        color: white;
        padding: 25px;
        border-radius: 20px;
        text-align: center;
    }

    .price-box h2 {
        margin: 0;
        color: #c9a227;
        font-weight: 800;
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
        margin-bottom: 6px;
    }

    .info-value {
        color: #0b1f3a;
        font-size: 17px;
        font-weight: 700;
    }

    .status-pill {
        padding: 8px 16px;
        border-radius: 999px;
        font-weight: 700;
        font-size: 13px;
    }

    .status-disponivel {
        background: #e8f7ee;
        color: #198754;
    }

    .status-vendido {
        background: #fdeaea;
        color: #dc3545;
    }
</style>

<div class="d-flex justify-content-between align-items-start mb-4">

    <div>
        <h2 class="page-title mb-1">
            Detalhes do Apartamento
        </h2>

        <p class="text-muted mb-0">
            Informação completa do imóvel.
        </p>

        <div class="gold-line"></div>
    </div>

    <div class="d-flex gap-2">

        <a href="{{ route('apartamentos.edit', $apartamento) }}"
           class="btn btn-gold">
            <i class="bi bi-pencil-fill me-2"></i>
            Editar
        </a>

        <a href="{{ route('apartamentos.index') }}"
           class="btn btn-outline-primary">
            <i class="bi bi-arrow-left me-2"></i>
            Voltar
        </a>

    </div>

</div>

<div class="property-card">

    @if ($apartamento->fotografia)

        <img src="{{ asset('storage/' . $apartamento->fotografia) }}"
             alt="Fotografia do apartamento"
             class="property-image">

    @else

        <img src="{{ asset('images/login-bg.png') }}"
             alt="Imóvel"
             class="property-image">

    @endif

    <div class="property-body">

        <div class="row">

            <div class="col-lg-8">

                <div class="d-flex justify-content-between align-items-start mb-4">

                    <div>

                        <h2 class="fw-bold mb-1" style="color:#0b1f3a;">
                            {{ $apartamento->referencia }}
                        </h2>

                        <p class="text-muted mb-0">
                            {{ $apartamento->morada }}
                        </p>

                    </div>

                    @if ($apartamento->estado == 'Disponivel')

                        <span class="status-pill status-disponivel">
                            Disponível
                        </span>

                    @else

                        <span class="status-pill status-vendido">
                            Vendido
                        </span>

                    @endif

                </div>

                <div class="row g-3">

                    <div class="col-md-6">

                        <div class="info-card">

                            <div class="info-label">
                                Referência
                            </div>

                            <div class="info-value">
                                {{ $apartamento->referencia }}
                            </div>

                        </div>

                    </div>

                    <div class="col-md-6">

                        <div class="info-card">

                            <div class="info-label">
                                Tipologia
                            </div>

                            <div class="info-value">
                                {{ $apartamento->tipologia }}
                            </div>

                        </div>

                    </div>

                    <div class="col-md-6">

                        <div class="info-card">

                            <div class="info-label">
                                Área
                            </div>

                            <div class="info-value">
                                {{ $apartamento->area }} m²
                            </div>

                        </div>

                    </div>

                    <div class="col-md-6">

                        <div class="info-card">

                            <div class="info-label">
                                ID do Imóvel
                            </div>

                            <div class="info-value">
                                #{{ $apartamento->id }}
                            </div>

                        </div>

                    </div>

                    <div class="col-12">

                        <div class="info-card">

                            <div class="info-label">
                                Morada Completa
                            </div>

                            <div class="info-value">
                                {{ $apartamento->morada }}
                            </div>

                        </div>

                    </div>

                </div>

            </div>

            <div class="col-lg-4">

                <div class="price-box">

                    <small>Valor do Imóvel</small>

                    <h2>
                        € {{ number_format($apartamento->preco, 2, ',', '.') }}
                    </h2>

                </div>

                <div class="mt-3 d-grid gap-2">

                    <a href="{{ route('apartamentos.edit', $apartamento) }}"
                       class="btn btn-gold">

                        <i class="bi bi-pencil-square me-2"></i>

                        Editar Imóvel

                    </a>

                    <a href="{{ route('apartamentos.index') }}"
                       class="btn btn-outline-primary">

                        <i class="bi bi-buildings me-2"></i>

                        Ver Todos

                    </a>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection
