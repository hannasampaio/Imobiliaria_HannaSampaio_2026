@extends('layouts.app')

@section('content')

<h1>Detalhes da Venda</h1>

<div class="card">
    <div class="card-body">

        <p><strong>ID:</strong> {{ $venda->id }}</p>

        <p><strong>Cliente:</strong> {{ $venda->cliente->nome }}</p>

        <p><strong>Apartamento:</strong> {{ $venda->apartamento->referencia }} - {{ $venda->apartamento->tipologia }}</p>

        <p><strong>Data da Venda:</strong> {{ \Carbon\Carbon::parse($venda->data_venda)->format('d/m/Y') }}</p>

        <p><strong>Valor da Venda:</strong> € {{ number_format($venda->valor_venda, 2, ',', '.') }}</p>

        <p><strong>Observações:</strong> {{ $venda->observacoes ?? 'Sem observações' }}</p>

        <a href="{{ route('vendas.index') }}" class="btn btn-outline-secondary">
            Voltar
        </a>

    </div>
</div>

@endsection
