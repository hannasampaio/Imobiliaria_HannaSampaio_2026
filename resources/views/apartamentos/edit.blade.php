@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-start mb-4">

    <div>
        <h2 class="page-title mb-1">
            Editar Apartamento
        </h2>

        <p class="text-muted mb-0">
            Atualize os dados do imóvel registado.
        </p>

        <div class="gold-line"></div>
    </div>

    <a href="{{ route('apartamentos.index') }}"
       class="btn btn-outline-primary rounded-3">
        <i class="bi bi-arrow-left me-2"></i>
        Voltar
    </a>

</div>

<div class="form-card">

    <div class="form-header text-center">

        <div class="property-icon">
            <i class="bi bi-pencil-square"></i>
        </div>

        <h4 class="fw-bold mt-3 mb-1" style="color:#0b1f3a;">
            Editar Imóvel
        </h4>

        <small class="text-muted">
            Atualize as informações abaixo.
        </small>

        <div class="property-id">
            {{ $apartamento->referencia }}
        </div>

    </div>

    <div class="form-body">

        <form action="{{ route('apartamentos.update', $apartamento) }}"
              method="POST"
              enctype="multipart/form-data">

            @csrf
            @method('PUT')

            <div class="row">

                <div class="col-md-6 mb-3">
                    <label for="referencia" class="form-label">
                        Referência
                    </label>

                    <input
                        id="referencia"
                        type="text"
                        name="referencia"
                        class="form-control"
                        value="{{ old('referencia', $apartamento->referencia) }}">
                </div>

                <div class="col-md-6 mb-3">
                    <label for="tipologia" class="form-label">
                        Tipologia
                    </label>

                    <select id="tipologia" name="tipologia" class="form-select">

                        <option value="T0" {{ old('tipologia', $apartamento->tipologia) == 'T0' ? 'selected' : '' }}>T0</option>
                        <option value="T1" {{ old('tipologia', $apartamento->tipologia) == 'T1' ? 'selected' : '' }}>T1</option>
                        <option value="T2" {{ old('tipologia', $apartamento->tipologia) == 'T2' ? 'selected' : '' }}>T2</option>
                        <option value="T3" {{ old('tipologia', $apartamento->tipologia) == 'T3' ? 'selected' : '' }}>T3</option>
                        <option value="T4" {{ old('tipologia', $apartamento->tipologia) == 'T4' ? 'selected' : '' }}>T4</option>
                        <option value="T5" {{ old('tipologia', $apartamento->tipologia) == 'T5' ? 'selected' : '' }}>T5</option>

                    </select>
                </div>

            </div>

            <div class="mb-3">
                <label for="morada" class="form-label">
                    Morada
                </label>

                <input
                    id="morada"
                    type="text"
                    name="morada"
                    class="form-control"
                    value="{{ old('morada', $apartamento->morada) }}">
            </div>

            <div class="row">

                <div class="col-md-4 mb-3">
                    <label for="area" class="form-label">
                        Área (m²)
                    </label>

                    <input
                        id="area"
                        type="number"
                        step="0.01"
                        name="area"
                        class="form-control"
                        value="{{ old('area', $apartamento->area) }}">
                </div>

                <div class="col-md-4 mb-3">
                    <label for="preco" class="form-label">
                        Preço (€)
                    </label>

                    <input
                        id="preco"
                        type="number"
                        step="0.01"
                        name="preco"
                        class="form-control"
                        value="{{ old('preco', $apartamento->preco) }}">
                </div>

                <div class="col-md-4 mb-3">
                    <label for="estado" class="form-label">
                        Estado
                    </label>

                    <select id="estado" name="estado" class="form-select">

                        <option value="Disponivel" {{ old('estado', $apartamento->estado) == 'Disponivel' ? 'selected' : '' }}>
                            Disponível
                        </option>

                        <option value="Vendido" {{ old('estado', $apartamento->estado) == 'Vendido' ? 'selected' : '' }}>
                            Vendido
                        </option>

                    </select>
                </div>

            </div>

            <div class="row">

                <div class="col-md-6 mb-4">
                    <label class="form-label">
                        Fotografia Atual
                    </label>

                    @if ($apartamento->fotografia)
                        <img src="{{ asset('storage/' . $apartamento->fotografia) }}"
                             alt="Fotografia do apartamento"
                             class="current-photo">
                    @else
                        <div class="upload-box">
                            <i class="bi bi-image"
                               style="font-size:30px;color:#c9a227;"></i>

                            <p class="text-muted mt-2 mb-0">
                                Sem fotografia registada
                            </p>
                        </div>
                    @endif
                </div>

                <div class="col-md-6 mb-4">
                    <label for="fotografia" class="form-label">
                        Nova Fotografia
                    </label>

                    <div class="upload-box">
                        <i class="bi bi-cloud-arrow-up"
                           style="font-size:30px;color:#c9a227;"></i>

                        <p class="text-muted mt-2 mb-2">
                            Selecione uma nova imagem para substituir a atual.
                        </p>

                        <input
                            id="fotografia"
                            type="file"
                            name="fotografia"
                            class="form-control">
                    </div>
                </div>

            </div>

            <div class="d-flex justify-content-end gap-2">

                <a href="{{ route('apartamentos.index') }}"
                   class="btn btn-outline-secondary px-4">
                    Cancelar
                </a>

                <button type="submit"
                        class="btn btn-gold px-4">

                    <i class="bi bi-check-circle-fill me-2"></i>

                    Atualizar Apartamento

                </button>

            </div>

        </form>

    </div>

</div>

@endsection
