@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1>Apartamentos</h1>

        <a href="{{ route('apartamentos.create') }}" class="btn btn-outline-primary">
            Novo Apartamento
        </a>
    </div>
    <form method="GET" action="{{ route('apartamentos.index') }}" class="row g-3 mb-4">

        <div class="col-md-4">
            <input type="text" name="pesquisa" class="form-control" placeholder="Pesquisar referência, tipologia ou morada"
                value="{{ request('pesquisa') }}">
        </div>

        <div class="col-md-3">
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
            <button type="submit" class="btn btn-primary w-100">
                Pesquisar
            </button>
        </div>

    </form>
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Referência</th>
                <th>Tipologia</th>
                <th>Área</th>
                <th>Preço</th>
                <th>Estado</th>
                <th>Ações</th>
            </tr>
        </thead>

        <tbody>

            @forelse($apartamentos as $apartamento)
                <tr>
                    <td>{{ $apartamento->id }}</td>
                    <td>{{ $apartamento->referencia }}</td>
                    <td>{{ $apartamento->tipologia }}</td>
                    <td>{{ $apartamento->area }} m²</td>
                    <td>€ {{ number_format($apartamento->preco, 2, ',', '.') }}</td>
                    <td>{{ $apartamento->estado }}</td>

                    <td>

                        <a href="{{ route('apartamentos.show', $apartamento) }}" class="btn btn-info btn-sm">
                            Ver
                        </a>

                        <a href="{{ route('apartamentos.edit', $apartamento) }}" class="btn btn-warning btn-sm">
                            Editar
                        </a>

                        <form action="{{ route('apartamentos.destroy', $apartamento) }}" method="POST"
                            style="display:inline">

                            @csrf
                            @method('DELETE')

                            <button type="submit" class="btn btn-danger btn-sm">
                                Apagar
                            </button>

                        </form>

                    </td>
                </tr>

            @empty

                <tr>
                    <td colspan="7" class="text-center">
                        Nenhum apartamento encontrado.
                    </td>
                </tr>
            @endforelse

        </tbody>

    </table>
@endsection
