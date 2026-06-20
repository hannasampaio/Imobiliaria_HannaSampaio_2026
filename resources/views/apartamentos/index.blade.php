@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between align-items-start mb-4">

        <div>
            <h2 class="page-title mb-1">
                @if (Auth::user()->role === 'cliente')
                    Apartamentos Disponíveis
                @else
                    Apartamentos
                @endif
            </h2>

            <p class="text-muted mb-0">
                @if (Auth::user()->role === 'cliente')
                    Consulte os imóveis atualmente disponíveis.
                @else
                    Gestão dos imóveis disponíveis e vendidos da imobiliária.
                @endif
            </p>

            <div class="gold-line"></div>
        </div>

        @if (Auth::user()->role !== 'cliente')
            <div class="d-flex gap-2">

                <a href="{{ route('relatorios.apartamentos') }}" target="_blank" class="btn btn-report px-4 py-2 rounded-3">
                    <i class="bi bi-file-earmark-pdf-fill me-2"></i>
                    Relatório PDF
                </a>

                <a href="{{ route('apartamentos.create') }}" class="btn btn-gold px-4 py-2 rounded-3">
                    <i class="bi bi-building-add me-2"></i>
                    Novo Apartamento
                </a>

            </div>
        @endif

    </div>
    <div class="row g-4 mb-4">

        <div class="col-md-4">

            <div class="property-card p-4 h-100">

                <div class="d-flex justify-content-between align-items-center">

                    <div>

                        <small class="text-muted">
                            Total de Apartamentos
                        </small>

                        <h2 class="fw-bold mt-2 mb-0" style="color:#0b1f3a;">
                            {{ $totalApartamentos }}
                        </h2>

                    </div>

                    <i class="bi bi-buildings stat-icon"></i>

                </div>

            </div>

        </div>

        <div class="col-md-4">

            <div class="property-card p-4 h-100">

                <div class="d-flex justify-content-between align-items-center">

                    <div>

                        <small class="text-muted">
                            Apartamentos Disponíveis
                        </small>

                        <h2 class="fw-bold mt-2 mb-0" style="color:#0b1f3a;">
                            {{ $apartamentosDisponiveis }}
                        </h2>

                    </div>

                    <i class="bi bi-house-check-fill stat-icon"></i>

                </div>

            </div>

        </div>

        <div class="col-md-4">

            <div class="property-card p-4 h-100">

                <div class="d-flex justify-content-between align-items-center">

                    <div>

                        <small class="text-muted">
                            Último Apartamento Registado
                        </small>

                        <h4 class="fw-bold mt-3 mb-0" style="color:#0b1f3a;">
                            {{ $ultimoApartamento->referencia ?? '-' }}
                        </h4>

                    </div>

                    <i class="bi bi-house-fill stat-icon"></i>

                </div>

            </div>

        </div>

    </div>

    <div class="filter-card mb-4">

        <form method="GET" action="{{ route('apartamentos.index') }}" class="row g-3 align-items-end">

            <div class="col-md-4">
                <label class="form-label fw-semibold" style="color:#0b1f3a;">
                    Pesquisa
                </label>

                <input type="text" name="pesquisa" class="form-control" placeholder="Referência, tipologia ou morada"
                    value="{{ request('pesquisa') }}">
            </div>

            <div class="col-md-3">
                <label class="form-label fw-semibold" style="color:#0b1f3a;">
                    Ordenar por
                </label>

                <select name="ordenar_por" class="form-select">
                    <option value="id" {{ request('ordenar_por') == 'id' ? 'selected' : '' }}>
                        ID
                    </option>

                    <option value="tipologia" {{ request('ordenar_por') == 'tipologia' ? 'selected' : '' }}>
                        Tipologia
                    </option>

                    <option value="area" {{ request('ordenar_por') == 'area' ? 'selected' : '' }}>
                        Área
                    </option>

                    <option value="preco" {{ request('ordenar_por') == 'preco' ? 'selected' : '' }}>
                        Preço
                    </option>
                </select>
            </div>

            <div class="col-md-3">
                <label class="form-label fw-semibold" style="color:#0b1f3a;">
                    Direção
                </label>

                <select name="direcao" class="form-select">
                    <option value="asc" {{ request('direcao') == 'asc' ? 'selected' : '' }}>
                        Crescente
                    </option>

                    <option value="desc" {{ request('direcao') == 'desc' ? 'selected' : '' }}>
                        Decrescente
                    </option>
                </select>
            </div>

            <div class="col-md-2">
                <div class="d-grid gap-2">

                    <button type="submit" class="btn btn-outline-primary rounded-3">
                        <i class="bi bi-search me-1"></i>
                        Filtrar
                    </button>

                    <a href="{{ route('apartamentos.index') }}" class="btn btn-outline-secondary rounded-3">
                        <i class="bi bi-x-circle me-1"></i>
                        Limpar
                    </a>

                </div>
            </div>

        </form>

    </div>

    <div class="property-card">

        <div class="p-4 border-bottom d-flex justify-content-between align-items-center">

            <div>
                <h5 class="fw-bold mb-1" style="color:#0b1f3a;">
                    @if (Auth::user()->role === 'cliente')
                        Imóveis Disponíveis
                    @else
                        Lista de Apartamentos
                    @endif
                </h5>

                <small class="text-muted">
                    @if (Auth::user()->role === 'cliente')
                        Veja os apartamentos disponíveis para consulta.
                    @else
                        Consulte, edite ou remova imóveis do sistema.
                    @endif
                </small>
            </div>

            <span class="badge rounded-pill" style="background:#f5ead0; color:#9b741c;">
                Imóveis
            </span>

        </div>

        <div class="table-responsive">

            <table class="table table-premium align-middle">

                <thead>
                    <tr>
                        <th>Imóvel</th>
                        <th>Tipologia</th>
                        <th>Área</th>
                        <th>Preço</th>
                        <th>Estado</th>
                        <th class="text-end">Ações</th>
                    </tr>
                </thead>

                <tbody>

                    @forelse($apartamentos as $apartamento)
                        <tr>
                            <td>
                                <div class="d-flex align-items-center gap-3">

                                    @if ($apartamento->fotografia)
                                        <img src="{{ asset('storage/' . $apartamento->fotografia) }}"
                                            alt="Fotografia do apartamento" class="property-thumb">
                                    @else
                                        <img src="{{ asset('images/login-bg.png') }}" alt="Fotografia de imóvel"
                                            class="property-thumb">
                                    @endif

                                    <div>
                                        <strong style="color:#0b1f3a;">
                                            {{ $apartamento->referencia }}
                                        </strong>

                                        <br>

                                        <small class="text-muted">
                                            {{ $apartamento->morada }}
                                        </small>
                                    </div>
                                </div>
                            </td>

                            <td>
                                <span class="text-muted">
                                    {{ $apartamento->tipologia }}
                                </span>
                            </td>

                            <td>
                                <span class="text-muted">
                                    {{ $apartamento->area }} m²
                                </span>
                            </td>

                            <td>
                                <strong style="color:#c9a227;">
                                    € {{ number_format($apartamento->preco, 2, ',', '.') }}
                                </strong>
                            </td>

                            <td>
                                @if ($apartamento->estado == 'Disponivel')
                                    <span class="status-pill status-disponivel">
                                        Disponível
                                    </span>
                                @else
                                    <span class="status-pill status-vendido">
                                        Vendido
                                    </span>
                                @endif
                            </td>

                            <td class="text-end">

                                <a href="{{ route('apartamentos.show', $apartamento) }}" class="action-btn view"
                                    title="Ver">
                                    <i class="bi bi-eye-fill"></i>
                                </a>

                                @if (Auth::user()->role !== 'cliente')
                                    <a href="{{ route('apartamentos.edit', $apartamento) }}" class="action-btn edit ms-1"
                                        title="Editar">
                                        <i class="bi bi-pencil-fill"></i>
                                    </a>

                                    @if (Auth::user()->role === 'admin')
                                        <form action="{{ route('apartamentos.destroy', $apartamento) }}" method="POST"
                                            class="d-inline delete-form" data-title="Eliminar Apartamento"
                                            data-text="Tem a certeza que pretende eliminar este apartamento?">

                                            @csrf
                                            @method('DELETE')

                                            <button type="submit" class="action-btn delete ms-1" title="Apagar">
                                                <i class="bi bi-trash-fill"></i>
                                            </button>

                                        </form>
                                    @endif
                                @endif

                            </td>
                        </tr>

                    @empty

                        <tr>
                            <td colspan="6">
                                <div class="empty-state">
                                    <i class="bi bi-building-x"></i>

                                    <h5 class="fw-bold mt-3" style="color:#0b1f3a;">
                                        Nenhum apartamento encontrado
                                    </h5>

                                    <p class="text-muted mb-3">
                                        @if (Auth::user()->role === 'cliente')
                                            De momento não existem apartamentos disponíveis.
                                        @else
                                            Comece por cadastrar o primeiro imóvel da imobiliária.
                                        @endif
                                    </p>
                                </div>
                            </td>
                        </tr>
                    @endforelse

                </tbody>

            </table>

            <div class="p-4">
                {{ $apartamentos->links() }}
            </div>

        </div>

    </div>

@endsection
