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

        .sales-card {
            background: white;
            border-radius: 22px;
            border: 1px solid #eef0f3;
            box-shadow: 0 12px 35px rgba(0, 0, 0, .07);
            overflow: hidden;
        }

        .sales-icon {
            width: 46px;
            height: 46px;
            border-radius: 14px;
            background: rgba(201, 162, 39, .13);
            color: #c9a227;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 21px;
        }

        .form-control,
        .form-select {
            border-radius: 12px;
            border: 1px solid #dbe2ea;
            padding: 12px 14px;
        }

        .form-control:focus,
        .form-select:focus {
            border-color: #c9a227;
            box-shadow: 0 0 0 .15rem rgba(201, 162, 39, .20);
        }

        .table-premium {
            margin-bottom: 0;
        }

        .table-premium thead th {
            background: #f8fafc;
            color: #6b7280;
            font-size: 13px;
            text-transform: uppercase;
            letter-spacing: .4px;
            border-bottom: 1px solid #eef0f3;
            padding: 16px;
        }

        .table-premium tbody td {
            padding: 18px 16px;
            vertical-align: middle;
            border-bottom: 1px solid #f1f3f5;
        }

        .table-premium tbody tr:hover {
            background: #fbfcfd;
        }

        .sale-badge {
            background: #f5ead0;
            color: #9b741c;
            padding: 7px 14px;
            border-radius: 999px;
            font-size: 13px;
            font-weight: 700;
        }

        .action-btn {
            width: 34px;
            height: 34px;
            border-radius: 10px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            text-decoration: none;
            border: 1px solid #e5e7eb;
            background: white;
            transition: .2s;
        }

        .action-btn.view {
            color: #0b1f3a;
        }

        .action-btn.edit {
            color: #c9a227;
        }

        .action-btn.delete {
            color: #dc3545;
        }

        .action-btn:hover {
            background: #f8fafc;
            transform: translateY(-1px);
        }

        .empty-state {
            text-align: center;
            padding: 60px 20px;
        }

        .empty-state i {
            font-size: 44px;
            color: #c9a227;
        }
    </style>

    <div class="d-flex justify-content-between align-items-start mb-4">

        <div>
            <h2 class="page-title mb-1">
                Vendas
            </h2>

            <p class="text-muted mb-0">
                Gestão das transações realizadas pela imobiliária.
            </p>

            <div class="gold-line"></div>
        </div>

        <div class="d-flex gap-2">

            <a href="{{ route('relatorios.vendas') }}" target="_blank" class="btn btn-report px-4 py-2 rounded-3">
                <i class="bi bi-file-earmark-pdf-fill me-2"></i>
                Relatório PDF
            </a>

            <a href="{{ route('vendas.create') }}" class="btn btn-gold px-4 py-2 rounded-3">
                <i class="bi bi-plus-circle-fill me-2"></i>
                Nova Venda
            </a>

        </div>

    </div>
    <div class="row g-4 mb-4">

        <div class="col-md-4">
            <div class="sales-card p-4 h-100">
                <div class="d-flex justify-content-between align-items-center h-100">
                    <div>
                        <small class="text-muted">Total de Vendas</small>

                        <h2 class="fw-bold mt-2 mb-0" style="color:#0b1f3a;">
                            {{ $totalVendas }}
                        </h2>
                    </div>

                    <i class="bi bi-receipt-cutoff" style="font-size:42px;color:#c9a227;"></i>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="sales-card p-4 h-100">
                <div class="d-flex justify-content-between align-items-center h-100">
                    <div>
                        <small class="text-muted">Faturamento Total</small>

                        <h4 class="fw-bold mt-2 mb-0" style="color:#0b1f3a;">
                            € {{ number_format($faturamentoTotal ?? 0, 2, ',', '.') }}
                        </h4>
                    </div>

                    <i class="bi bi-wallet2" style="font-size:42px;color:#c9a227;"></i>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="sales-card p-4 h-100">
                <div class="d-flex justify-content-between align-items-center h-100">
                    <div>
                        <small class="text-muted">Última Venda Registada</small>

                        <h4 class="fw-bold mt-2 mb-1" style="color:#0b1f3a;">
                            {{ $ultimaVenda->apartamento->referencia ?? 'Sem vendas' }}
                        </h4>

                        <small class="text-muted">
                            {{ $ultimaVenda->cliente->nome ?? '' }}
                        </small>
                    </div>

                    <i class="bi bi-cash-coin" style="font-size:42px;color:#c9a227;"></i>
                </div>
            </div>
        </div>

    </div>

    <div class="sales-card p-4 mb-4">

        <form method="GET" action="{{ route('vendas.index') }}" class="row g-3 align-items-end">

            <div class="col-md-6">
                <label class="form-label fw-semibold" style="color:#0b1f3a;">
                    Pesquisar Venda
                </label>

                <input type="text" name="pesquisa" class="form-control" placeholder="Cliente, apartamento, data ou valor"
                    value="{{ request('pesquisa') }}">
            </div>

            <div class="col-md-4">
                <label class="form-label fw-semibold" style="color:#0b1f3a;">
                    Ordenar por
                </label>

                <select name="ordenar" class="form-select">

                    <option value="recentes" {{ request('ordenar') == 'recentes' ? 'selected' : '' }}>
                        Mais recentes
                    </option>

                    <option value="antigas" {{ request('ordenar') == 'antigas' ? 'selected' : '' }}>
                        Mais antigas
                    </option>

                    <option value="maior_valor" {{ request('ordenar') == 'maior_valor' ? 'selected' : '' }}>
                        Maior valor
                    </option>

                    <option value="menor_valor" {{ request('ordenar') == 'menor_valor' ? 'selected' : '' }}>
                        Menor valor
                    </option>

                </select>
            </div>

            <div class="col-md-2">
                <div class="d-grid gap-2">

                    <button type="submit" class="btn btn-outline-primary rounded-3">
                        <i class="bi bi-search me-1"></i>
                        Filtrar
                    </button>

                    <a href="{{ route('vendas.index') }}" class="btn btn-outline-secondary rounded-3">
                        <i class="bi bi-x-circle me-1"></i>
                        Limpar
                    </a>

                </div>
            </div>

        </form>

    </div>

    <div class="sales-card">

        <div class="p-4 border-bottom d-flex justify-content-between align-items-center">

            <div>
                <h5 class="fw-bold mb-1" style="color:#0b1f3a;">
                    Lista de Vendas
                </h5>

                <small class="text-muted">
                    Consulte, edite ou remova transações do sistema.
                </small>
            </div>

            <span class="badge rounded-pill" style="background:#f5ead0; color:#9b741c;">
                Transações
            </span>

        </div>

        <div class="table-responsive">

            <table class="table table-premium align-middle">

                <thead>
                    <tr>
                        <th>Venda</th>
                        <th>Cliente</th>
                        <th>Apartamento</th>
                        <th>Data</th>
                        <th>Valor</th>
                        <th class="text-end">Ações</th>
                    </tr>
                </thead>

                <tbody>

                    @forelse($vendas as $venda)
                        <tr>
                            <td>
                                <div class="d-flex align-items-center gap-3">
                                    <div class="sales-icon">
                                        <i class="bi bi-receipt"></i>
                                    </div>

                                    <div>
                                        <strong style="color:#0b1f3a;">
                                            Venda #{{ $venda->id }}
                                        </strong>

                                        <br>

                                        <small class="text-muted">
                                            Registo de transação
                                        </small>
                                    </div>
                                </div>
                            </td>

                            <td>
                                <strong style="color:#0b1f3a;">
                                    {{ $venda->cliente->nome }}
                                </strong>
                            </td>

                            <td>
                                <span class="sale-badge">
                                    {{ $venda->apartamento->referencia }}
                                </span>
                            </td>

                            <td>
                                <span class="text-muted">
                                    {{ \Carbon\Carbon::parse($venda->data_venda)->format('d/m/Y') }}
                                </span>
                            </td>

                            <td>
                                <strong style="color:#c9a227;">
                                    € {{ number_format($venda->valor_venda, 2, ',', '.') }}
                                </strong>
                            </td>

                            <td class="text-end">

                                <a href="{{ route('vendas.show', $venda) }}" class="action-btn view" title="Ver">
                                    <i class="bi bi-eye-fill"></i>
                                </a>

                                <a href="{{ route('vendas.edit', $venda) }}" class="action-btn edit ms-1" title="Editar">
                                    <i class="bi bi-pencil-fill"></i>
                                </a>

                                @if (Auth::user()->role === 'admin')
                                    <form action="{{ route('vendas.destroy', $venda) }}" method="POST" class="d-inline delete-form">

                                        @csrf
                                        @method('DELETE')

                                        <button type="submit" class="action-btn delete ms-1" title="Apagar">
                                            <i class="bi bi-trash-fill"></i>
                                        </button>

                                    </form>
                                @endif

                            </td>
                        </tr>

                    @empty

                        <tr>
                            <td colspan="6">
                                <div class="empty-state">
                                    <i class="bi bi-receipt-cutoff"></i>

                                    <h5 class="fw-bold mt-3" style="color:#0b1f3a;">
                                        Nenhuma venda encontrada
                                    </h5>

                                    <p class="text-muted mb-3">
                                        Tente alterar a pesquisa ou registe uma nova venda.
                                    </p>
                                </div>
                            </td>
                        </tr>
                    @endforelse

                </tbody>

            </table>

            <div class="p-4">
                {{ $vendas->links() }}
            </div>

        </div>

    </div>
@endsection
