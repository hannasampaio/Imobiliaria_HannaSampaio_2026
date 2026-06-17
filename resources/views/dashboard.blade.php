@extends('layouts.app')

@section('content')

<style>
    .dash-title { color:#0b1f3a; font-weight:800; }
    .gold-line { width:55px; height:3px; background:#c9a227; border-radius:10px; margin-top:12px; }

    .dash-card {
        background:white;
        border-radius:22px;
        border:1px solid #eef0f3;
        box-shadow:0 12px 35px rgba(0,0,0,.07);
    }

    .stat-icon {
        width:64px;
        height:64px;
        border-radius:50%;
        background:rgba(201,162,39,.13);
        color:#c9a227;
        display:flex;
        align-items:center;
        justify-content:center;
        font-size:30px;
    }

    .chart-box {
        height:280px;
        position:relative;
    }

    .apartment-img {
        width:80px;
        height:62px;
        object-fit:cover;
        border-radius:12px;
    }

    .status-pill {
        padding:6px 14px;
        border-radius:999px;
        font-size:12px;
        font-weight:700;
    }

    .status-disponivel { background:#e6f7ed; color:#198754; }
    .status-vendido { background:#fdeaea; color:#dc3545; }

    .quick-line {
        height:9px;
        border-radius:999px;
        background:#eef0f3;
        overflow:hidden;
    }

    .quick-line span {
        display:block;
        height:100%;
        border-radius:999px;
    }

    .vendas-table th {
        font-size:12px;
        color:#9ca3af;
        text-transform:uppercase;
        padding-bottom:10px;
    }

    .vendas-table td {
        padding:12px 8px;
        border-top:1px solid #f3f4f6;
        vertical-align:middle;
    }
</style>

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
            <i class="bi bi-calendar3" style="color:#c9a227; font-size:24px;"></i>

            <div>
                <strong style="color:#0b1f3a;">
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
                    <h2 class="fw-bold mb-0" style="color:#0b1f3a;">
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
                    <h2 class="fw-bold mb-0" style="color:#0b1f3a;">
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
                    <h2 class="fw-bold mb-0" style="color:#0b1f3a;">
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
                    <h2 class="fw-bold mb-0" style="color:#0b1f3a; font-size:20px;">
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
                <h5 class="fw-bold mb-0" style="color:#0b1f3a;">
                    Evolução do Faturamento
                </h5>

                <span class="badge rounded-pill" style="background:#f5ead0; color:#9b741c;">
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
            <h5 class="fw-bold mb-4" style="color:#0b1f3a;">
                Indicadores rápidos
            </h5>

            <div class="mb-4">
                <div class="d-flex justify-content-between mb-2">
                    <span>Apartamentos Disponíveis</span>
                    <strong class="text-success">{{ $apartamentosDisponiveis }}</strong>
                </div>

                <div class="quick-line">
                    <span style="width: {{ $totalApartamentos > 0 ? ($apartamentosDisponiveis / $totalApartamentos) * 100 : 0 }}%; background:#198754;"></span>
                </div>
            </div>

            <div class="mb-4">
                <div class="d-flex justify-content-between mb-2">
                    <span>Apartamentos Vendidos</span>
                    <strong class="text-danger">{{ $apartamentosVendidos }}</strong>
                </div>

                <div class="quick-line">
                    <span style="width: {{ $totalApartamentos > 0 ? ($apartamentosVendidos / $totalApartamentos) * 100 : 0 }}%; background:#dc3545;"></span>
                </div>
            </div>

            <hr>

            <div class="mb-3">
                <small class="text-muted">Preço Médio</small>
                <h5 class="fw-bold mt-1" style="color:#0b1f3a;">
                    € {{ number_format($precoMedio ?? 0, 2, ',', '.') }}
                </h5>
            </div>

            <div class="mb-3">
                <small class="text-muted">Maior Valor</small>
                <h5 class="fw-bold mt-1" style="color:#198754;">
                    € {{ number_format($precoMaximo ?? 0, 2, ',', '.') }}
                </h5>
            </div>

            <div>
                <small class="text-muted">Menor Valor</small>
                <h5 class="fw-bold mt-1" style="color:#c9a227;">
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
                <h5 class="fw-bold mb-0" style="color:#0b1f3a;">
                    Vendas Recentes
                </h5>

                <a href="{{ route('vendas.index') }}"
                   class="text-decoration-none fw-semibold"
                   style="color:#c9a227;">
                    Ver todas
                </a>
            </div>

            @if($vendasRecentes->isEmpty())

                <div class="text-center py-5">
                    <i class="bi bi-receipt" style="font-size:36px; color:#c9a227;"></i>
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
                                    <strong style="color:#0b1f3a;">
                                        {{ $venda->cliente->nome ?? '-' }}
                                    </strong>
                                </td>

                                <td class="text-muted">
                                    {{ $venda->apartamento->referencia ?? '-' }}
                                </td>

                                <td>
                                    <strong style="color:#c9a227;">
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
                <h5 class="fw-bold mb-0" style="color:#0b1f3a;">
                    Apartamentos em destaque
                </h5>

                <a href="{{ route('apartamentos.index') }}"
                   class="text-decoration-none fw-semibold"
                   style="color:#c9a227;">
                    Ver todos
                </a>
            </div>

            @forelse($apartamentosDestaque as $apartamento)

                <div class="d-flex align-items-center justify-content-between mb-4">

                    <div class="d-flex align-items-center gap-3">
                        @if ($apartamento->fotografia)
                            <img src="{{ asset('storage/' . $apartamento->fotografia) }}"
                                 alt="{{ $apartamento->referencia }}"
                                 class="apartment-img">
                        @else
                            <img src="{{ asset('images/login-bg.png') }}"
                                 alt="Apartamento sem fotografia"
                                 class="apartment-img">
                        @endif

                        <div>
                            <h6 class="fw-bold mb-1" style="color:#0b1f3a;">
                                {{ $apartamento->referencia }}
                            </h6>

                            <small class="text-muted">
                                {{ $apartamento->tipologia }} · {{ $apartamento->area }} m²
                            </small>
                        </div>
                    </div>

                    <div class="text-end">
                        <strong style="color:#c9a227;">
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
                    <i class="bi bi-building" style="font-size:38px; color:#c9a227;"></i>

                    <h6 class="fw-bold mt-3" style="color:#0b1f3a;">
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
    const labels = @json($vendasPorMes->pluck('mes'));
    const receitas = @json($vendasPorMes->pluck('receita'));
    const totais = @json($vendasPorMes->pluck('total'));

    const canvas = document.getElementById('vendasChart');
    const ctx = canvas.getContext('2d');

    const gradient = ctx.createLinearGradient(0, 0, 0, 280);
    gradient.addColorStop(0, 'rgba(201,162,39,.35)');
    gradient.addColorStop(1, 'rgba(201,162,39,0)');

    new Chart(ctx, {
        type: 'line',
        data: {
            labels: labels.length ? labels : ['Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun'],
            datasets: [
                {
                    label: 'Faturamento (€)',
                    data: receitas.length ? receitas : [0, 0, 0, 0, 0, 0],
                    borderColor: '#c9a227',
                    backgroundColor: gradient,
                    borderWidth: 3,
                    fill: true,
                    tension: 0.42,
                    pointRadius: 5,
                    pointHoverRadius: 7,
                    pointBackgroundColor: '#0b1f3a',
                    pointBorderColor: '#ffffff',
                    pointBorderWidth: 2
                }
            ]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,

            plugins: {
                legend: {
                    display: false
                },

                tooltip: {
                    backgroundColor: '#0b1f3a',
                    titleColor: '#ffffff',
                    bodyColor: '#ffffff',
                    padding: 12,
                    cornerRadius: 12,

                    callbacks: {
                        label: function(context) {
                            const index = context.dataIndex;
                            const receita = context.raw ?? 0;
                            const vendas = totais[index] ?? 0;

                            return [
                                'Faturamento: € ' + Number(receita).toLocaleString('pt-PT', {
                                    minimumFractionDigits: 2
                                }),
                                'Vendas: ' + vendas
                            ];
                        }
                    }
                }
            },

            scales: {
                x: {
                    grid: {
                        display: false
                    },
                    ticks: {
                        color: '#6b7280'
                    }
                },

                y: {
                    beginAtZero: true,
                    grid: {
                        color: '#eef0f3'
                    },
                    ticks: {
                        color: '#6b7280',
                        callback: function(value) {
                            return '€ ' + Number(value).toLocaleString('pt-PT');
                        }
                    }
                }
            }
        }
    });
</script>

@endsection
