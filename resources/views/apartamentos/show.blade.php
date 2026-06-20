@extends('layouts.app')

@section('content')
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
