@extends('relatorios.layout')

@section('title', 'Relatório de Apartamentos')

@section('summary')

    <div class="summary-row">
        <span class="label">Documento</span>
        <span>Listagem Geral de Apartamentos</span>
    </div>

    <div class="summary-row">
        <span class="label">Total de apartamentos</span>
        <span>{{ $apartamentos->count() }}</span>
    </div>

@endsection

@section('table-title', 'Apartamentos Registados')

@section('content')

    <table class="data-table">

        <thead>
            <tr>
                <th>Referência</th>
                <th>Tipologia</th>
                <th>Morada</th>
                <th>Área</th>
                <th>Preço</th>
                <th>Estado</th>
            </tr>
        </thead>

        <tbody>

            @foreach ($apartamentos as $apartamento)
                <tr>
                    <td>{{ $apartamento->referencia }}</td>
                    <td>{{ $apartamento->tipologia }}</td>
                    <td>{{ $apartamento->morada }}</td>
                    <td>{{ $apartamento->area }} m²</td>
                    <td>€ {{ number_format($apartamento->preco, 2, ',', '.') }}</td>
                    <td>{{ $apartamento->estado }}</td>
                </tr>
            @endforeach

        </tbody>

    </table>

@endsection
