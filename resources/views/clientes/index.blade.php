@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between align-items-start mb-4">

        <div>
            <h2 class="page-title mb-1">
                Clientes
            </h2>

            <p class="text-muted mb-0">
                Gestão completa dos clientes registados na imobiliária.
            </p>

            <div class="gold-line"></div>
        </div>

        <div class="d-flex gap-2">

            <a href="{{ route('relatorios.clientes') }}" target="_blank"
                class="btn btn-outline-primary px-4 py-2 rounded-3 btn-report">
                <i class="bi bi-file-earmark-pdf-fill me-2"></i>
                Relatório PDF
            </a>

            <a href="{{ route('clientes.create') }}" class="btn btn-gold px-4 py-2 rounded-3">
                <i class="bi bi-person-plus-fill me-2"></i>
                Novo Cliente
            </a>
        </div>
    </div>
    <div class="row g-4 mb-4">

        <div class="col-md-4">
            <div class="client-card p-4 h-100">
                <div class="d-flex justify-content-between align-items-center h-100">
                    <div>
                        <small class="text-muted">Total de Clientes</small>
                        <h2 class="fw-bold mt-2 mb-0" style="color:#0b1f3a;">
                            {{ $totalClientes }}
                        </h2>
                    </div>

                    <i class="bi bi-people-fill stat-icon"></i>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="client-card p-4 h-100">
                <div class="d-flex justify-content-between align-items-center h-100">
                    <div>
                        <small class="text-muted">Novos este mês</small>
                        <h2 class="fw-bold mt-2 mb-0" style="color:#0b1f3a;">
                            {{ $clientesEsteMes }}
                        </h2>
                    </div>

                    <i class="bi bi-person-plus-fill stat-icon"></i>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="client-card p-4 h-100">
                <div class="d-flex flex-column justify-content-center h-100">
                    <small class="text-muted">Último Cliente</small>

                    <h5 class="fw-bold mt-2 mb-1" style="color:#0b1f3a;">
                        {{ $ultimoCliente->nome ?? 'Sem clientes' }}
                    </h5>

                    <small class="text-muted">Registado recentemente</small>
                </div>
            </div>
        </div>

    </div>
    <div class="client-card p-4 mb-4">

        <form method="GET" action="{{ route('clientes.index') }}" class="row g-3 align-items-end">

            <div class="col-md-6">
                <label class="form-label fw-semibold" style="color:#0b1f3a;">
                    Pesquisar Cliente
                </label>

                <input type="text" name="pesquisa" class="form-control" placeholder="Nome, email, telefone ou NIF"
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

                    <option value="antigos" {{ request('ordenar') == 'antigos' ? 'selected' : '' }}>
                        Mais antigos
                    </option>

                    <option value="nome_az" {{ request('ordenar') == 'nome_az' ? 'selected' : '' }}>
                        Nome A-Z
                    </option>

                    <option value="nome_za" {{ request('ordenar') == 'nome_za' ? 'selected' : '' }}>
                        Nome Z-A
                    </option>
                </select>
            </div>

            <div class="col-md-2">
                <div class="d-grid gap-2">

                    <button type="submit" class="btn btn-outline-primary rounded-3">
                        <i class="bi bi-search me-1"></i>
                        Filtrar
                    </button>

                    <a href="{{ route('clientes.index') }}" class="btn btn-outline-secondary rounded-3">
                        <i class="bi bi-x-circle me-1"></i>
                        Limpar
                    </a>

                </div>
            </div>

        </form>

    </div>

    <div class="client-card">

        <div class="p-4 border-bottom d-flex justify-content-between align-items-center">
            <div>
                <h5 class="fw-bold mb-1" style="color:#0b1f3a;">
                    Lista de Clientes
                </h5>

                <small class="text-muted">
                    Consulte, edite ou remova clientes do sistema.
                </small>
            </div>

            <span class="badge rounded-pill" style="background:#f5ead0; color:#9b741c;">
                Gestão de Clientes
            </span>
        </div>

        <div class="table-responsive">

            <table class="table table-premium align-middle">

                <thead>
                    <tr>
                        <th>Cliente</th>
                        <th>Email</th>
                        <th>Telefone</th>
                        <th>NIF</th>
                        <th class="text-end">Ações</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse($clientes as $cliente)
                        <tr>
                            <td>
                                <div class="d-flex align-items-center gap-3">
                                    <div class="client-avatar">
                                        {{ strtoupper(substr($cliente->nome, 0, 1)) }}
                                    </div>

                                    <div>
                                        <strong style="color:#0b1f3a;">
                                            {{ $cliente->nome }}
                                        </strong>

                                        <br>

                                        <small class="text-muted">
                                            Cliente #{{ $cliente->id }}
                                        </small>
                                    </div>
                                </div>
                            </td>

                            <td>
                                <span class="text-muted">
                                    {{ $cliente->email }}
                                </span>
                            </td>

                            <td>
                                <span class="text-muted">
                                    {{ $cliente->telefone }}
                                </span>
                            </td>

                            <td>
                                <span class="badge rounded-pill"
                                    style="background:#f8fafc; color:#0b1f3a; border:1px solid #eef0f3;">
                                    {{ $cliente->nif }}
                                </span>
                            </td>

                            <td class="text-end">

                                <a href="{{ route('clientes.show', $cliente) }}" class="action-btn view" title="Ver">
                                    <i class="bi bi-eye-fill"></i>
                                </a>

                                <a href="{{ route('clientes.edit', $cliente) }}" class="action-btn edit ms-1"
                                    title="Editar">
                                    <i class="bi bi-pencil-fill"></i>
                                </a>

                                @if (Auth::user()->role === 'admin')
                                    <form action="{{ route('clientes.destroy', $cliente) }}" method="POST"
                                        class="d-inline delete-form"
                                        data-title="Eliminar Cliente"
                                        data-text="Tem a certeza que pretende eliminar este cliente?">

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
                            <td colspan="5">
                                <div class="empty-state">
                                    <i class="bi bi-person-x"></i>

                                    <h5 class="fw-bold mt-3" style="color:#0b1f3a;">
                                        Nenhum cliente encontrado
                                    </h5>

                                    <p class="text-muted mb-3">
                                        Comece por cadastrar o primeiro cliente da imobiliária.
                                    </p>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>

            </table>

            <div class="p-4">
                {{ $clientes->links() }}
            </div>

        </div>

    </div>
@endsection
