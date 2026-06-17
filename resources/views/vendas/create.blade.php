CREATE.INDEX:@extends('layouts.app')

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
            Nova Venda
        </h2>

        <p class="text-muted mb-0">
            Registe uma nova transação imobiliária.
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
            <i class="bi bi-cash-coin"></i>
        </div>

        <h4 class="fw-bold mt-3 mb-1" style="color:#0b1f3a;">
            Registo de Venda
        </h4>

        <small class="text-muted">
            Associe um cliente a um apartamento e conclua a venda.
        </small>

    </div>

    <div class="form-body">

        <div class="info-box">

            <div class="d-flex align-items-center gap-3">

                <i class="bi bi-lightbulb-fill"></i>

                <div>
                    <strong style="color:#0b1f3a;">
                        Dica
                    </strong>

                    <div class="text-muted">
                        Selecione primeiro o cliente e depois o imóvel vendido.
                    </div>
                </div>

            </div>

        </div>

        <form action="{{ route('vendas.store') }}" method="POST">

            @csrf

            <div class="mb-3">

                <label class="form-label">
                    Cliente
                </label>

                <select name="cliente_id" class="form-select">

                    <option value="">
                        Selecione um cliente
                    </option>

                    @foreach($clientes as $cliente)

                        <option value="{{ $cliente->id }}">
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

                    <option value="">
                        Selecione um apartamento
                    </option>

                    @foreach($apartamentos as $apartamento)

                        <option value="{{ $apartamento->id }}">
                            {{ $apartamento->referencia }}
                            -
                            {{ $apartamento->tipologia }}
                            -
                            € {{ number_format($apartamento->preco, 2, ',', '.') }}
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
                        value="{{ date('Y-m-d') }}">

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
                        placeholder="250000">

                </div>

            </div>

            <div class="mb-4">

                <label class="form-label">
                    Observações
                </label>

                <textarea
                    name="observacoes"
                    rows="5"
                    class="form-control"
                    placeholder="Informações adicionais sobre a venda..."></textarea>

            </div>

            <div class="d-flex justify-content-end gap-2">

                <a href="{{ route('vendas.index') }}"
                   class="btn btn-outline-secondary px-4">
                    Cancelar
                </a>

                <button type="submit"
                        class="btn btn-gold px-4">

                    <i class="bi bi-check-circle-fill me-2"></i>

                    Guardar Venda

                </button>

            </div>

        </form>

    </div>

</div>

@endsection
