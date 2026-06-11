@extends('layouts.app')

@section('content')

<h1>Editar Venda</h1>

<form action="{{ route('vendas.update', $venda) }}" method="POST">

    @csrf
    @method('PUT')

    <div class="mb-3">
        <label for="cliente_id" class="form-label">Cliente</label>
        <select id="cliente_id" name="cliente_id" class="form-control">
            @foreach($clientes as $cliente)
                <option value="{{ $cliente->id }}" {{ $venda->cliente_id == $cliente->id ? 'selected' : '' }}>
                    {{ $cliente->nome }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label for="apartamento_id" class="form-label">Apartamento</label>
        <select id="apartamento_id" name="apartamento_id" class="form-control">
            @foreach($apartamentos as $apartamento)
                <option value="{{ $apartamento->id }}" {{ $venda->apartamento_id == $apartamento->id ? 'selected' : '' }}>
                    {{ $apartamento->referencia }} - {{ $apartamento->tipologia }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label for="data_venda" class="form-label">Data da Venda</label>
        <input id="data_venda" type="date" name="data_venda" class="form-control" value="{{ old('data_venda', $venda->data_venda) }}">
    </div>

    <div class="mb-3">
        <label for="valor_venda" class="form-label">Valor da Venda</label>
        <input id="valor_venda" type="number" step="0.01" name="valor_venda" class="form-control" value="{{ old('valor_venda', $venda->valor_venda) }}">
    </div>

    <div class="mb-3">
        <label for="observacoes" class="form-label">Observações</label>
        <textarea id="observacoes" name="observacoes" rows="4" class="form-control">{{ old('observacoes', $venda->observacoes) }}</textarea>
    </div>

    <button type="submit" class="btn btn-outline-success">
        Atualizar
    </button>

    <a href="{{ route('vendas.index') }}" class="btn btn-outline-secondary">
        Voltar
    </a>

</form>

@endsection
