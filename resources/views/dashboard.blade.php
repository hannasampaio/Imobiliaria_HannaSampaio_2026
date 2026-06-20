@extends('layouts.app')

@section('content')

<div class="d-flex justify-content-between align-items-start mb-4">
    <div>
        <h2 class="dash-title mb-1">
            Bem-vinda de volta, {{ Auth::user()->name }}!
        </h2>
        <p class="text-muted mb-0">
            Aqui está o resumo geral da imobiliária.
        </p>
        <div class="gold-line"></div>
    </div>

    <div class="dash-card px-4 py-3 d-none d-md-block">
        <div class="d-flex align-items-center gap-3">
            <i class="bi bi-calendar3" style="color: var(--gold); font-size: 24px;"></i>
            <div>
                <strong style="color: var(--navy);">
                    {{ now()->format('d/m/Y') }}
                </strong>
                <br>
                <small class="text-muted">
                    {{ now()->format('H:i') }}
                </small>
            </div>
        </div>
    </div>
</div>

<div class="row g-4 mb-4">
    <div class="col-md-3">
        <div class="dash-card p-4 h-100">
            <div class="d-flex align-items-center gap-3">
                <div class="stat-icon">
                    <i class="bi bi-people-fill"></i>
                </div>
                <div>
                    <h2 class="fw-bold mb-0" style="color: var(--navy);">
                        {{ $totalClientes }}
                    </h2>
                    <p class="mb-1">Clientes</p>
                    <small class="text-muted">registados</small>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="dash-card p-4 h-100">
            <div class="d-flex align-items-center gap-3">
                <div class="stat-icon">
                    <i class="bi bi-buildings-fill"></i>
                </div>
                <div>
                    <h2 class="fw-bold mb-0" style="color: var(--navy);">
                        {{ $totalApartamentos }}
                    </h2>
                    <p class="mb-1">Apartamentos</p>
                    <small class="text-muted">imóveis registados</small>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="dash-card p-4 h-100">
            <div class="d-flex align-items-center gap-3">
                <div class="stat-icon">
                    <i class="bi bi-cash-coin"></i>
                </div>
                <div>
                    <h2 class="fw-bold mb-0" style="color: var(--navy);">
                        {{ $totalVendas }}
                    </h2>
                    <p class="mb-1">Vendas</p>
                    <small class="text-muted">realizadas</small>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="dash-card p-4 h-100">
            <div class="d-flex align-items-center gap-3">
                <div class="stat-icon">
                    <i class="bi bi-wallet2"></i>
                </div>
                <div>
                    <h2 class="fw-bold mb-0" style="color: var(--navy); font-size: 20px;">
                        € {{ number_format($faturamentoTotal ?? 0, 2, ',', '.') }}
                    </h2>
                    <p class="mb-1">Faturamento</p>
                    <small class="text-muted">total vendido</small>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row g-4 mb-4">
    <div class="col-lg-8">
        <div class="dash-card p-4 h-100">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h5 class="fw-bold mb-0" style="color: var(--navy);">
                    Evolução do Faturamento
                </h5>
                <span class="badge rounded-pill" style="background: #f5ead0; color: #9b741c;">
                    {{ now()->translatedFormat('F Y') }}
                </span>
            </div>
            <div class="chart-box">
                <canvas id="vendasChart"></canvas>
            </div>
        </div>
    </div>

    <div class="col-lg-4">
        <div class="dash-card p-4 h-100">
            <h5 class="fw-bold mb-4" style="color: var(--navy);">
                Indicadores rápidos
            </h5>

            <div class="mb-4">
                <div class="d-flex justify-content-between mb-2">
                    <span>Apartamentos Disponíveis</span>
                    <strong class="text-success">{{ $apartamentosDisponiveis }}</strong>
                </div>
                <div class="quick-line">
                    <span style="width: {{ $totalApartamentos > 0 ? ($apartamentosDisponiveis / $totalApartamentos) * 100 : 0 }}%; background: #198754;"></span>
                </div>
            </div>

            <div class="mb-4">
                <div class="d-flex justify-content-between mb-2">
                    <span>Apartamentos Vendidos</span>
                    <strong class="text-danger">{{ $apartamentosVendidos }}</strong>
                </div>
                <div class="quick-line">
                    <span style="width: {{ $totalApartamentos > 0 ? ($apartamentosVendidos / $totalApartamentos) * 100 : 0 }}%; background: var(--error);"></span>
                </div>
            </div>

            <hr>

            <div class="mb-3">
                <small class="text-muted">Preço Médio</small>
                <h5 class="fw-bold mt-1" style="color: var(--navy);">
                    € {{ number_format($precoMedio ?? 0, 2, ',', '.') }}
                </h5>
            </div>

            <div class="mb-3">
                <small class="text-muted">Maior Valor</small>
                <h5 class="fw-bold mt-1" style="color: #198754;">
                    € {{ number_format($precoMaximo ?? 0, 2, ',', '.') }}
                </h5>
            </div>

            <div>
                <small class="text-muted">Menor Valor</small>
                <h5 class="fw-bold mt-1" style="color: var(--gold);">
                    € {{ number_format($precoMinimo ?? 0, 2, ',', '.') }}
                </h5>
            </div>
        </div>
    </div>
</div>

<div class="row g-4">
    <div class="col-lg-7">
        <div class="dash-card p-4">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h5 class="fw-bold mb-0" style="color: var(--navy);">
                    Vendas Recentes
                </h5>
                <a href="{{ route('vendas.index') }}" class="text-decoration-none fw-semibold" style="color: var(--gold);">
                    Ver todas
                </a>
            </div>

            @if($vendasRecentes->isEmpty())
                <div class="text-center py-5">
                    <i class="bi bi-receipt" style="font-size: 36px; color: var(--gold);"></i>
                    <p class="text-muted mt-3 mb-0">
                        Nenhuma venda registada ainda.
                    </p>
                </div>
            @else
                <table class="table vendas-table mb-0">
                    <thead>
                        <tr>
                            <th>Cliente</th>
                            <th>Apartamento</th>
                            <th>Valor</th>
                            <th>Estado</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($vendasRecentes as $venda)
                            <tr>
                                <td>
                                    <strong style="color: var(--navy);">
                                        {{ $venda->cliente->nome ?? '-' }}
                                    </strong>
                                </td>
                                <td class="text-muted">
                                    {{ $venda->apartamento->referencia ?? '-' }}
                                </td>
                                <td>
                                    <strong style="color: var(--gold);">
                                        € {{ number_format($venda->valor_venda ?? 0, 2, ',', '.') }}
                                    </strong>
                                </td>
                                <td>
                                    <span class="status-pill status-vendido">
                                        Vendido
                                    </span>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>

    <div class="col-lg-5">
        <div class="dash-card p-4">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h5 class="fw-bold mb-0" style="color: var(--navy);">
                    Apartamentos em destaque
                </h5>
                <a href="{{ route('apartamentos.index') }}" class="text-decoration-none fw-semibold" style="color: var(--gold);">
                    Ver todos
                </a>
            </div>

            @forelse($apartamentosDestaque as $apartamento)
                <div class="d-flex align-items-center justify-content-between mb-4">
                    <div class="d-flex align-items-center gap-3">
                        @if ($apartamento->fotografia)
                            <img src="{{ asset('storage/' . $apartamento->fotografia) }}" alt="{{ $apartamento->referencia }}" class="apartment-img">
                        @else
                            <img src="{{ asset('images/login-bg.png') }}" alt="Apartamento sem fotografia" class="apartment-img">
                        @endif

                        <div>
                            <h6 class="fw-bold mb-1" style="color: var(--navy);">
                                {{ $apartamento->referencia }}
                            </h6>
                            <small class="text-muted">
                                {{ $apartamento->tipologia }} · {{ $apartamento->area }} m²
                            </small>
                        </div>
                    </div>

                    <div class="text-end">
                        <strong style="color: var(--gold);">
                            € {{ number_format($apartamento->preco, 2, ',', '.') }}
                        </strong>
                        <br>
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
                </div>
            @empty
                <div class="text-center py-4">
                    <i class="bi bi-building" style="font-size: 38px; color: var(--gold);"></i>
                    <h6 class="fw-bold mt-3" style="color: var(--navy);">
                        Nenhum apartamento em destaque
                    </h6>
                    <p class="text-muted mb-3">
                        Cadastre imóveis para aparecerem nesta área.
                    </p>
                </div>
            @endforelse
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js"></script>
<script>
    window.HannaDashboardChart = {
        labels: @json($vendasPorMes->pluck('mes')),
        receitas: @json($vendasPorMes->pluck('receita')),
        totais: @json($vendasPorMes->pluck('total'))
    };
</script>

<script src="{{ asset('js/hanna-dashboard.js') }}"></script>

@endsection