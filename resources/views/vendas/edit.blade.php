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

    .sale-icon {
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

    .sale-id {
        display: inline-block;
        margin-top: 10px;
        background: #f5ead0;
        color: #9b741c;
        padding: 6px 14px;
        border-radius: 999px;
        font-size: 13px;
        font-weight: 600;
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

    .info-box {
        background: #fafbfd;
        border: 1px solid #eef0f3;
        border-radius: 16px;
        padding: 18px;
        margin-bottom: 25px;
    }

    .info-box i {
        color: #c9a227;
        font-size: 22px;
    }
</style>

<div class="d-flex justify-content-between align-items-start mb-4">

    <div>
        <h2 class="page-title mb-1">
            Editar Venda
        </h2>

        <p class="text-muted mb-0">
            Atualize os dados da transação.
        </p>

        <div class="gold-line"></div>
    </div>

    <a href="{{ route('vendas.index') }}"
       class="btn btn-outline-primary rounded-3">
        <i class="bi bi-arrow-left me-2"></i>
        Voltar
    </a>

</div>

<div class="form-card">

    <div class="form-header text-center">

        <div class="sale-icon">
            <i class="bi bi-pencil-square"></i>
        </div>

        <h4 class="fw-bold mt-3 mb-1" style="color:#0b1f3a;">
            Editar Venda
        </h4>

        <small class="text-muted">
            Atualize as informações abaixo.
        </small>

        <div class="sale-id">
            Venda #{{ $venda->id }}
        </div>

    </div>

    <div class="form-body">

        <div class="info-box">

            <div class="d-flex align-items-center gap-3">

                <i class="bi bi-cash-coin"></i>

                <div>
                    <strong style="color:#0b1f3a;">
                        Transação Registada
                    </strong>

                    <div class="text-muted">
                        Atualize os dados da venda sempre que necessário.
                    </div>

                </div>

            </div>

        </div>

        <form action="{{ route('vendas.update', $venda) }}"
              method="POST">

            @csrf
            @method('PUT')

            <div class="mb-3">

                <label class="form-label">
                    Cliente
                </label>

                <select name="cliente_id" class="form-select">

                    @foreach($clientes as $cliente)

                        <option value="{{ $cliente->id }}"
                            {{ old('cliente_id', $venda->cliente_id) == $cliente->id ? 'selected' : '' }}>

                            {{ $cliente->nome }}

                        </option>

                    @endforeach

                </select>

            </div>

            <div class="mb-3">

                <label class="form-label">
                    Apartamento
                </label>

                <select name="apartamento_id" class="form-select">

                    @foreach($apartamentos as $apartamento)

                        <option value="{{ $apartamento->id }}"
                            {{ old('apartamento_id', $venda->apartamento_id) == $apartamento->id ? 'selected' : '' }}>

                            {{ $apartamento->referencia }}
                            -
                            {{ $apartamento->tipologia }}

                        </option>

                    @endforeach

                </select>

            </div>

            <div class="row">

                <div class="col-md-6 mb-3">

                    <label class="form-label">
                        Data da Venda
                    </label>

                    <input
                        type="date"
                        name="data_venda"
                        class="form-control"
                        value="{{ old('data_venda', $venda->data_venda) }}">

                </div>

                <div class="col-md-6 mb-3">

                    <label class="form-label">
                        Valor da Venda (€)
                    </label>

                    <input
                        type="number"
                        step="0.01"
                        name="valor_venda"
                        class="form-control"
                        value="{{ old('valor_venda', $venda->valor_venda) }}">

                </div>

            </div>

            <div class="mb-4">

                <label class="form-label">
                    Observações
                </label>

                <textarea
                    name="observacoes"
                    rows="5"
                    class="form-control">{{ old('observacoes', $venda->observacoes) }}</textarea>

            </div>

            <div class="d-flex justify-content-end gap-2">

                <a href="{{ route('vendas.index') }}"
                   class="btn btn-outline-secondary px-4">
                    Cancelar
                </a>

                <button type="submit"
                        class="btn btn-gold px-4">

                    <i class="bi bi-check-circle-fill me-2"></i>

                    Atualizar Venda

                </button>

            </div>

        </form>

    </div>

</div>

@endsection
