@extends('layouts.app')

@section('content')

<h1>Detalhes do Apartamento</h1>

<div class="card">
    <div class="card-body">

        @if ($apartamento->fotografia)
            <div class="mb-3">
                <img src="{{ asset('storage/' . $apartamento->fotografia) }}"
                     alt="Fotografia do apartamento"
                     class="img-fluid rounded"
                     style="max-width: 500px;">
            </div>
        @endif

        <p><strong>ID:</strong> {{ $apartamento->id }}</p>
        <p><strong>Referência:</strong> {{ $apartamento->referencia }}</p>
        <p><strong>Tipologia:</strong> {{ $apartamento->tipologia }}</p>
        <p><strong>Morada:</strong> {{ $apartamento->morada }}</p>
        <p><strong>Área:</strong> {{ $apartamento->area }} m²</p>
        <p><strong>Preço:</strong> € {{ number_format($apartamento->preco, 2, ',', '.') }}</p>
        <p><strong>Estado:</strong> {{ $apartamento->estado }}</p>

        <a href="{{ route('apartamentos.index') }}" class="btn btn-outline-secondary">
            Voltar
        </a>

    </div>
</div>

@endsection
