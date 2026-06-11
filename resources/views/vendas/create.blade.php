@extends('layouts.app')

@section('content')

<h1>Nova Venda</h1>

<form action="{{ route('vendas.store') }}" method="POST">

    @csrf

    <div class="mb-3">
        <label for="cliente_id" class="form-label">Cliente</label>

        <select id="cliente_id" name="cliente_id" class="form-control">

            <option value="">Selecione um cliente</option>

            @foreach($clientes as $cliente)
                <option value="{{ $cliente->id }}">
                    {{ $cliente->nome }}
                </option>
            @endforeach

        </select>
    </div>

    <div class="mb-3">
        <label for="apartamento_id" class="form-label">Apartamento</label>

        <select id="apartamento_id" name="apartamento_id" class="form-control">

            <option value="">Selecione um apartamento</option>

            @foreach($apartamentos as $apartamento)
                <option value="{{ $apartamento->id }}">
                    {{ $apartamento->referencia }}
                    - {{ $apartamento->tipologia }}
                    - € {{ number_format($apartamento->preco, 2, ',', '.') }}
                </option>
            @endforeach

        </select>
    </div>

    <div class="mb-3">
        <label for="data_venda" class="form-label">Data da Venda</label>

        <input
            id="data_venda"
            type="date"
            name="data_venda"
            class="form-control"
            value="{{ date('Y-m-d') }}">
    </div>

    <div class="mb-3">
        <label for="valor_venda" class="form-label">Valor da Venda</label>

        <input
            id="valor_venda"
            type="number"
            step="0.01"
            name="valor_venda"
            class="form-control">
    </div>

    <div class="mb-3">
        <label for="observacoes" class="form-label">Observações</label>

        <textarea
            id="observacoes"
            name="observacoes"
            rows="4"
            class="form-control"></textarea>
    </div>

    <button type="submit" class="btn btn-outline-success">
        Guardar Venda
    </button>

    <a href="{{ route('vendas.index') }}"
       class="btn btn-outline-secondary">
        Voltar
    </a>

</form>

@endsection
