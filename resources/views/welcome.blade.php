@extends('layouts.app')

@section('content')
    <div class="p-5 mb-5 rounded-4 text-white" style="background: linear-gradient(135deg, #0b1f3a, #163b63);">
        <div class="row align-items-center">

            <div class="col-md-7">
                <h1 class="display-5 fw-bold">
                    Hanna Imobiliária
                </h1>

                <p class="lead mt-3">
                    Sistema de Gestão de Clientes, Apartamentos e Vendas numa única plataforma.
                </p>

                <div class="mt-4">
                    <a href="{{ route('apartamentos.index') }}" class="btn btn-gold btn-lg me-2">
                        Gerir Apartamentos
                    </a>

                    <a href="{{ route('clientes.index') }}" class="btn btn-outline-light btn-lg">
                        Gerir Clientes
                    </a>
                </div>
            </div>

            <div class="col-md-5 text-center mt-4 mt-md-0">
                <div class="bg-white text-dark rounded-4 p-4 shadow">
                    <h5 class="text-muted">
                        Resumo do Sistema
                    </h5>

                    <h2 class="fw-bold">
                        {{ $totalApartamentos }}
                    </h2>

                    <p class="mb-0">
                        apartamentos registados
                    </p>
                </div>
            </div>

        </div>
    </div>

    <div class="row mb-5">

        <div class="col-md-4 mb-3">
            <div class="card border-0 shadow h-100 rounded-4">
                <div class="card-body">
                    <p class="text-muted mb-1">Clientes</p>

                    <h2 class="fw-bold" style="color:#0b1f3a;">
                        {{ $totalClientes }}
                    </h2>

                    <p class="mb-0">
                        clientes registados no sistema
                    </p>
                </div>
            </div>
        </div>

        <div class="col-md-4 mb-3">
            <div class="card border-0 shadow h-100 rounded-4">
                <div class="card-body">
                    <p class="text-muted mb-1">Apartamentos</p>

                    <h2 class="fw-bold" style="color:#0b1f3a;">
                        {{ $totalApartamentos }}
                    </h2>

                    <p class="mb-0">
                        imóveis disponíveis e vendidos
                    </p>
                </div>
            </div>
        </div>

        <div class="col-md-4 mb-3">
            <div class="card border-0 shadow h-100 rounded-4">
                <div class="card-body">
                    <p class="text-muted mb-1">Vendas</p>

                    <h2 class="fw-bold" style="color:#0b1f3a;">
                        {{ $totalVendas }}
                    </h2>

                    <p class="mb-0">
                        vendas registadas com sucesso
                    </p>
                </div>
            </div>
        </div>

    </div>

    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="fw-bold mb-1">
                Últimos Apartamentos Registados
            </h2>

            <p class="text-muted mb-0">
                Registos recentes disponíveis no sistema.
            </p>
        </div>

        <a href="{{ route('apartamentos.index') }}" class="btn btn-outline-primary">
            Ver Todos
        </a>
    </div>

    <div class="row">

        @forelse($apartamentosDestaque as $apartamento)
            <div class="col-md-4 mb-4">
                <div class="card h-100 shadow border-0 rounded-4 overflow-hidden">

                    @if ($apartamento->fotografia)
                        <img src="{{ asset('storage/' . $apartamento->fotografia) }}" alt="Fotografia do apartamento"
                            class="card-img-top" style="height:280px; object-fit:cover;">
                    @else
                        <img src="https://images.unsplash.com/photo-1560518883-ce09059eeffa?w=900"
                            alt="Fotografia de imóvel moderno" class="card-img-top" style="height:280px; object-fit:cover;">
                    @endif

                    <div class="card-body">

                        <div class="d-flex justify-content-between align-items-start mb-2">
                            <h5 class="fw-bold mb-0">
                                {{ $apartamento->referencia }}
                            </h5>

                            @if ($apartamento->estado == 'Disponivel')
                                <span class="badge rounded-pill bg-success">
                                    Disponível
                                </span>
                            @else
                                <span class="badge rounded-pill bg-danger">
                                    Vendido
                                </span>
                            @endif
                        </div>

                        <p class="text-muted mb-1">
                            {{ $apartamento->tipologia }} · {{ $apartamento->area }} m²
                        </p>

                        <p class="mb-3 text-muted">
                            📍 {{ $apartamento->morada }}
                        </p>

                        <h4 class="fw-bold" style="color:#0b1f3a;">
                            € {{ number_format($apartamento->preco, 2, ',', '.') }}
                        </h4>

                    </div>

                    <div class="card-footer bg-white border-0 p-3">
                        <a href="{{ route('apartamentos.show', $apartamento) }}" class="btn btn-outline-primary w-100">
                            Consultar Registo
                        </a>
                    </div>

                </div>
            </div>

        @empty

            <div class="col-12">
                <div class="alert alert-info">
                    Nenhum apartamento registado.
                </div>
            </div>
        @endforelse

        <h3 class="fw-bold mb-4 mt-5">
            Resumo Operacional
        </h3>

        <div class="row">

            <div class="col-md-4 mb-3">
                <div class="card border-0 shadow rounded-4 h-100">
                    <div class="card-body">
                        <p class="text-muted mb-1">Preço Médio</p>

                        <h3 class="fw-bold" style="color:#0b1f3a;">
                            € {{ number_format($precoMedio ?? 0, 2, ',', '.') }}
                        </h3>

                        <p class="mb-0">
                            média dos apartamentos registados
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-md-4 mb-3">
                <div class="card border-0 shadow rounded-4 h-100">
                    <div class="card-body">
                        <p class="text-muted mb-1">Preço Mais Alto</p>

                        <h3 class="fw-bold" style="color:#0b1f3a;">
                            € {{ number_format($precoMaximo ?? 0, 2, ',', '.') }}
                        </h3>

                        <p class="mb-0">
                            imóvel com maior valor registado
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-md-4 mb-3">
                <div class="card border-0 shadow rounded-4 h-100">
                    <div class="card-body">
                        <p class="text-muted mb-1">Preço Mais Baixo</p>

                        <h3 class="fw-bold" style="color:#0b1f3a;">
                            € {{ number_format($precoMinimo ?? 0, 2, ',', '.') }}
                        </h3>

                        <p class="mb-0">
                            imóvel com menor valor registado
                        </p>
                    </div>
                </div>
            </div>

        </div>

        <div class="row mt-3">

            <div class="col-md-6 mb-3">
                <div class="card border-0 shadow rounded-4 h-100">
                    <div class="card-body">
                        <p class="text-muted mb-1">Apartamentos Disponíveis</p>

                        <h3 class="fw-bold text-success">
                            {{ $apartamentosDisponiveis }}
                        </h3>

                        <div class="progress mt-3" style="height: 10px;">
                            <div class="progress-bar bg-success"
                                style="width: {{ $totalApartamentos > 0 ? ($apartamentosDisponiveis / $totalApartamentos) * 100 : 0 }}%">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6 mb-3">
                <div class="card border-0 shadow rounded-4 h-100">
                    <div class="card-body">
                        <p class="text-muted mb-1">Apartamentos Vendidos</p>

                        <h3 class="fw-bold text-danger">
                            {{ $apartamentosVendidos }}
                        </h3>

                        <div class="progress mt-3" style="height: 10px;">
                            <div class="progress-bar bg-danger"
                                style="width: {{ $totalApartamentos > 0 ? ($apartamentosVendidos / $totalApartamentos) * 100 : 0 }}%">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    @endsection
