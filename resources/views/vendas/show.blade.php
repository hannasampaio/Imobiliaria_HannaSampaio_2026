@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-start mb-4">

    <div>
        <h2 class="page-title mb-1">
            Detalhes da Venda
        </h2>

        <p class="text-muted mb-0">
            Resumo completo da transação realizada.
        </p>

        <div class="gold-line"></div>
    </div>

    <div class="d-flex gap-2">

        <a href="{{ route('vendas.edit', $venda) }}"
           class="btn btn-gold">
            <i class="bi bi-pencil-fill me-2"></i>
            Editar
        </a>

        <a href="{{ route('vendas.index') }}"
           class="btn btn-outline-primary">
            <i class="bi bi-arrow-left me-2"></i>
            Voltar
        </a>

    </div>

</div>

<div class="sale-card">

    <div class="sale-header">

        <div class="row align-items-center">

            <div class="col-lg-8">

                <h2>
                    Venda Concluída
                </h2>

                <p class="mb-0 opacity-75">
                    Registo oficial da transação imobiliária.
                </p>

                <div class="sale-number">
                    Venda #{{ $venda->id }}
                </div>

            </div>

            <div class="col-lg-4 text-lg-end mt-3 mt-lg-0">

                <i class="bi bi-cash-stack"
                   style="font-size:60px;color:#c9a227;"></i>

            </div>

        </div>

    </div>

    <div class="p-4">

        <div class="value-box">

            <small class="text-muted">
                Valor da Transação
            </small>

            <h1>
                € {{ number_format($venda->valor_venda, 2, ',', '.') }}
            </h1>

        </div>

        <div class="row g-4 mt-2">

            <div class="col-md-6">

                <div class="info-card">

                    <div class="info-label">
                        Cliente
                    </div>

                    <div class="info-value">
                        <i class="bi bi-person-fill me-2"
                           style="color:#c9a227;"></i>

                        {{ $venda->cliente->nome }}
                    </div>

                </div>

            </div>

            <div class="col-md-6">

                <div class="info-card">

                    <div class="info-label">
                        Data da Venda
                    </div>

                    <div class="info-value">
                        <i class="bi bi-calendar-event me-2"
                           style="color:#c9a227;"></i>

                        {{ \Carbon\Carbon::parse($venda->data_venda)->format('d/m/Y') }}
                    </div>

                </div>

            </div>

            <div class="col-12">

                <div class="info-card">

                    <div class="info-label">
                        Apartamento Vendido
                    </div>

                    <div class="info-value">
                        <i class="bi bi-building me-2"
                           style="color:#c9a227;"></i>

                        {{ $venda->apartamento->referencia }}
                        -
                        {{ $venda->apartamento->tipologia }}
                    </div>

                </div>

            </div>

        </div>

        <div class="mt-4">

            <div class="obs-card">

                <div class="info-label mb-2">
                    Observações
                </div>

                <div style="color:#0b1f3a;">

                    {{ $venda->observacoes ?: 'Sem observações registadas.' }}

                </div>

            </div>

        </div>

    </div>

</div>

@endsection
