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

        .client-card {
            background: white;
            border-radius: 22px;
            border: 1px solid #eef0f3;
            box-shadow: 0 12px 35px rgba(0, 0, 0, .07);
            overflow: hidden;
        }

        .client-avatar {
            width: 44px;
            height: 44px;
            border-radius: 50%;
            background: rgba(201, 162, 39, .16);
            color: #0b1f3a;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 800;
            border: 1px solid rgba(201, 162, 39, .35);
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
                Clientes
            </h2>

            <p class="text-muted mb-0">
                Gestão completa dos clientes registados na imobiliária.
            </p>

            <div class="gold-line"></div>
        </div>

        <a href="{{ route('clientes.create') }}" class="btn btn-gold px-4 py-2 rounded-3">
            <i class="bi bi-person-plus-fill me-2"></i>
            Novo Cliente
        </a>

    </div>

    <div class="row g-4 mb-4">

        <div class="col-md-4">
            <div class="client-card p-4">
                <div class="d-flex align-items-center gap-3">
                    <div class="client-avatar">
                        <i class="bi bi-people-fill"></i>
                    </div>

                    <div>
                        <h3 class="fw-bold mb-0" style="color:#0b1f3a;">
                            {{ $clientes->count() }}
                        </h3>

                        <small class="text-muted">
                            clientes listados
                        </small>
                    </div>
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
                <button type="submit" class="btn btn-outline-primary w-100 py-2 rounded-3">
                    <i class="bi bi-search me-1"></i>
                    Filtrar
                </button>
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
                                        class="d-inline">

                                        @csrf
                                        @method('DELETE')

                                        <button type="submit" class="action-btn delete ms-1" title="Apagar"
                                            onclick="return confirm('Tem certeza que deseja apagar este cliente?')">
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
