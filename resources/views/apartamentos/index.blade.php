@extends('layouts.app')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-3">
    <h1>Apartamentos</h1>

    <a href="{{ route('apartamentos.create') }}"
       class="btn btn-outline-primary">
        Novo Apartamento
    </a>
</div>

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

                <a href="{{ route('apartamentos.show', $apartamento) }}"
                   class="btn btn-info btn-sm">
                    Ver
                </a>

                <a href="{{ route('apartamentos.edit', $apartamento) }}"
                   class="btn btn-warning btn-sm">
                    Editar
                </a>

                <form action="{{ route('apartamentos.destroy', $apartamento) }}"
                      method="POST"
                      style="display:inline">

                    @csrf
                    @method('DELETE')

                    <button type="submit"
                            class="btn btn-danger btn-sm">
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
