@extends('relatorios.layout')

@section('title', 'Relatório de Vendas')

@section('summary')

<div class="summary-row">
    <span class="label">Documento</span>
    <span>Listagem Geral de Vendas</span>
</div>

<div class="summary-row">
    <span class="label">Total de vendas</span>
    <span>{{ $vendas->count() }}</span>
</div>

<div class="summary-row">
    <span class="label">Faturamento total</span>
    <span>€ {{ number_format($vendas->sum('valor_venda'), 2, ',', '.') }}</span>
</div>

@endsection

@section('table-title', 'Vendas Registadas')

@section('content')

<table class="data-table">

    <thead>
        <tr>
            <th>Cliente</th>
            <th>Apartamento</th>
            <th>Data</th>
            <th>Valor</th>
            <th>Observações</th>
        </tr>
    </thead>

    <tbody>

        @foreach ($vendas as $venda)
            <tr>
                <td>{{ $venda->cliente->nome ?? '-' }}</td>
                <td>{{ $venda->apartamento->referencia ?? '-' }}</td>
                <td>{{ \Carbon\Carbon::parse($venda->data_venda)->format('d/m/Y') }}</td>
                <td>€ {{ number_format($venda->valor_venda, 2, ',', '.') }}</td>
                <td>{{ $venda->observacoes ?? 'Sem observações' }}</td>
            </tr>
        @endforeach

    </tbody>

</table>

@endsection
