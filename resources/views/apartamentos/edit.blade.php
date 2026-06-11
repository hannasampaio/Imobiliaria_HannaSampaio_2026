@extends('layouts.app')

@section('content')
    <h1>Editar Apartamento</h1>

    <form action="{{ route('apartamentos.update', $apartamento) }}" method="POST" enctype="multipart/form-data">

        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="referencia" class="form-label">Referência</label>
            <input id="referencia" type="text" name="referencia" class="form-control"
                value="{{ old('referencia', $apartamento->referencia) }}">
        </div>

        <div class="mb-3">
            <label for="tipologia" class="form-label">Tipologia</label>

            <select id="tipologia" name="tipologia" class="form-control">

                <option value="T0" {{ $apartamento->tipologia == 'T0' ? 'selected' : '' }}>T0</option>
                <option value="T1" {{ $apartamento->tipologia == 'T1' ? 'selected' : '' }}>T1</option>
                <option value="T2" {{ $apartamento->tipologia == 'T2' ? 'selected' : '' }}>T2</option>
                <option value="T3" {{ $apartamento->tipologia == 'T3' ? 'selected' : '' }}>T3</option>
                <option value="T4" {{ $apartamento->tipologia == 'T4' ? 'selected' : '' }}>T4</option>
                <option value="T5" {{ $apartamento->tipologia == 'T5' ? 'selected' : '' }}>T5</option>

            </select>
        </div>

        <div class="mb-3">
            <label for="morada" class="form-label">Morada</label>
            <input id="morada" type="text" name="morada" class="form-control"
                value="{{ old('morada', $apartamento->morada) }}">
        </div>

        <div class="mb-3">
            <label for="area" class="form-label">Área (m²)</label>
            <input id="area" type="number" step="0.01" name="area" class="form-control"
                value="{{ old('area', $apartamento->area) }}">
        </div>

        <div class="mb-3">
            <label for="preco" class="form-label">Preço (€)</label>
            <input id="preco" type="number" step="0.01" name="preco" class="form-control"
                value="{{ old('preco', $apartamento->preco) }}">
        </div>

        @if ($apartamento->fotografia)
            <div class="mb-3">
                <p class="form-label fw-bold">Fotografia Atual</p>

                <div>
                    <img src="{{ asset('storage/' . $apartamento->fotografia) }}" alt="Fotografia do apartamento"
                        class="img-thumbnail" style="max-width: 250px;">
                </div>
            </div>
        @endif

        <div class="mb-3">
            <label for="fotografia" class="form-label">Nova Fotografia</label>
            <input id="fotografia" type="file" name="fotografia" class="form-control">
        </div>

        <div class="mb-3">
            <label for="estado" class="form-label">Estado</label>

            <select id="estado" name="estado" class="form-control">

                <option value="Disponivel" {{ $apartamento->estado == 'Disponivel' ? 'selected' : '' }}>
                    Disponível
                </option>

                <option value="Vendido" {{ $apartamento->estado == 'Vendido' ? 'selected' : '' }}>
                    Vendido
                </option>

            </select>
        </div>

        <button type="submit" class="btn btn-outline-success">
            Atualizar
        </button>

        <a href="{{ route('apartamentos.index') }}" class="btn btn-outline-secondary">
            Voltar
        </a>

    </form>
@endsection
