@extends('relatorios.layout')

@section('title', 'Relatório de Clientes')

@section('summary')
    <div class="summary-row">
        <span class="label">Documento</span>
        <span>Listagem Geral de Clientes</span>
    </div>

    <div class="summary-row">
        <span class="label">Total de clientes</span>
        <span>{{ $clientes->count() }}</span>
    </div>
@endsection

@section('table-title', 'Clientes Registados')

@section('content')
    <table class="data-table">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Email</th>
                <th>Telefone</th>
                <th>NIF</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($clientes as $cliente)
                <tr>
                    <td>{{ $cliente->nome }}</td>
                    <td>{{ $cliente->email }}</td>
                    <td>{{ $cliente->telefone }}</td>
                    <td>{{ $cliente->nif }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
