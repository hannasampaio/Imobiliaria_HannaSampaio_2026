@extends('layouts.app')

@section('content')

<style>
    .page-title {
        color: #0b1f3a;
        font-weight: 800;
    }

    .gold-line {
        width: 55px;
        height: 3px;
        background: #c9a227;
        border-radius: 10px;
        margin-top: 10px;
    }

    .form-card {
        background: white;
        border-radius: 22px;
        border: 1px solid #eef0f3;
        box-shadow: 0 12px 35px rgba(0,0,0,.07);
        overflow: hidden;
    }

    .form-header {
        padding: 30px;
        border-bottom: 1px solid #eef0f3;
    }

    .form-body {
        padding: 30px;
    }

    .property-icon {
        width: 80px;
        height: 80px;
        border-radius: 50%;
        background: rgba(201,162,39,.12);
        color: #c9a227;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 34px;
        margin: auto;
    }

    .form-label {
        font-weight: 600;
        color: #0b1f3a;
    }

    .form-control,
    .form-select {
        border-radius: 12px;
        border: 1px solid #dbe2ea;
        padding: 12px 14px;
    }

    .form-control:focus,
    .form-select:focus {
        border-color: #c9a227;
        box-shadow: 0 0 0 .15rem rgba(201,162,39,.20);
    }

    .upload-box {
        border: 2px dashed #dbe2ea;
        border-radius: 16px;
        padding: 25px;
        text-align: center;
        background: #fafbfd;
    }
</style>

<div class="d-flex justify-content-between align-items-start mb-4">


<div>
    <h2 class="page-title mb-1">
        Novo Apartamento
    </h2>

    <p class="text-muted mb-0">
        Registe um novo imóvel na plataforma.
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
        <i class="bi bi-building-add"></i>
    </div>

    <h4 class="fw-bold mt-3 mb-1" style="color:#0b1f3a;">
        Registo de Apartamento
    </h4>

    <small class="text-muted">
        Preencha os dados do imóvel.
    </small>

</div>

<div class="form-body">

    <form action="{{ route('apartamentos.store') }}"
          method="POST"
          enctype="multipart/form-data">

        @csrf

        <div class="row">

            <div class="col-md-6 mb-3">

                <label class="form-label">
                    Referência
                </label>

                <input
                    type="text"
                    name="referencia"
                    class="form-control"
                    value="{{ old('referencia') }}"
                    placeholder="Ex: AP-001">

            </div>

            <div class="col-md-6 mb-3">

                <label class="form-label">
                    Tipologia
                </label>

                <select name="tipologia" class="form-select">

                    <option value="">
                        Selecione...
                    </option>

                    <option value="T0">T0</option>
                    <option value="T1">T1</option>
                    <option value="T2">T2</option>
                    <option value="T3">T3</option>
                    <option value="T4">T4</option>
                    <option value="T5">T5</option>

                </select>

            </div>

        </div>

        <div class="mb-3">

            <label class="form-label">
                Morada
            </label>

            <input
                type="text"
                name="morada"
                class="form-control"
                value="{{ old('morada') }}"
                placeholder="Rua, número e localidade">

        </div>

        <div class="row">

            <div class="col-md-6 mb-3">

                <label class="form-label">
                    Área (m²)
                </label>

                <input
                    type="number"
                    step="0.01"
                    name="area"
                    class="form-control"
                    value="{{ old('area') }}"
                    placeholder="120">

            </div>

            <div class="col-md-6 mb-3">

                <label class="form-label">
                    Preço (€)
                </label>

                <input
                    type="number"
                    step="0.01"
                    name="preco"
                    class="form-control"
                    value="{{ old('preco') }}"
                    placeholder="250000">

            </div>

        </div>

        <div class="row">

            <div class="col-md-6 mb-4">

                <label class="form-label">
                    Estado
                </label>

                <select name="estado" class="form-select">

                    <option value="Disponivel">
                        Disponível
                    </option>

                    <option value="Vendido">
                        Vendido
                    </option>

                </select>

            </div>

            <div class="col-md-6 mb-4">

    <label class="form-label fw-semibold">
        Fotografia do Imóvel
    </label>

    <div class="input-group">

        <span class="input-group-text"
              style="background:#f8f5eb;color:#c9a227;">
            <i class="bi bi-image"></i>
        </span>

        <input
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

                Guardar Apartamento

            </button>

        </div>

    </form>

</div>


</div>

@endsection
