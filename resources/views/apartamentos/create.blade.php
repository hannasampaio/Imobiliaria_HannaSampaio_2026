@extends('layouts.app')

@section('content')

<h1>Novo Apartamento</h1>

<form action="{{ route('apartamentos.store') }}" method="POST" enctype="multipart/form-data">

    @csrf

    <div class="mb-3">
        <label for="referencia" class="form-label">Referência</label>
        <input id="referencia" type="text" name="referencia" class="form-control" value="{{ old('referencia') }}">
    </div>

    <div class="mb-3">
        <label for="tipologia" class="form-label">Tipologia</label>
        <select id="tipologia" name="tipologia" class="form-control">
            <option value="">Selecione...</option>
            <option value="T0">T0</option>
            <option value="T1">T1</option>
            <option value="T2">T2</option>
            <option value="T3">T3</option>
            <option value="T4">T4</option>
            <option value="T5">T5</option>
        </select>
    </div>

    <div class="mb-3">
        <label for="morada" class="form-label">Morada</label>
        <input id="morada" type="text" name="morada" class="form-control" value="{{ old('morada') }}">
    </div>

    <div class="mb-3">
        <label for="area" class="form-label">Área (m²)</label>
        <input id="area" type="number" step="0.01" name="area" class="form-control" value="{{ old('area') }}">
    </div>

    <div class="mb-3">
        <label for="preco" class="form-label">Preço (€)</label>
        <input id="preco" type="number" step="0.01" name="preco" class="form-control" value="{{ old('preco') }}">
    </div>

    <div class="mb-3">
        <label for="fotografia" class="form-label">Fotografia</label>
        <input id="fotografia" type="file" name="fotografia" class="form-control">
    </div>

    <div class="mb-3">
        <label for="estado" class="form-label">Estado</label>
        <select id="estado" name="estado" class="form-control">
            <option value="Disponivel">Disponível</option>
            <option value="Vendido">Vendido</option>
        </select>
    </div>

    <button type="submit" class="btn btn-outline-success">
        Guardar
    </button>

    <a href="{{ route('apartamentos.index') }}" class="btn btn-outline-secondary">
        Voltar
    </a>

</form>

@endsection
