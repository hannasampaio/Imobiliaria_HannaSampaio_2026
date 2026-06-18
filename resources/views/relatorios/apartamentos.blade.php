<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8">
    <title>Relatório de Apartamentos</title>

    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            color: #1f2937;
            font-size: 12px;
            margin: 30px;
        }

        .header {
            background: #0b1f3a;
            color: white;
            border-bottom: 6px solid #c9a227;
            border-radius: 8px;
            padding: 20px 25px;
        }

        .header-table {
            width: 100%;
            border-collapse: collapse;
        }

        .header-table td {
            border: none;
            vertical-align: middle;
        }

        .logo {
            width: 105px;
            background: white;
            padding: 8px;
            border-radius: 12px;
        }

        .title {
            font-size: 28px;
            font-weight: bold;
            margin: 0;
            text-align: right;
        }

        .subtitle {
            font-size: 14px;
            margin-top: 6px;
            color: #e5e7eb;
            text-align: right;
        }

        .date {
            margin-top: 8px;
            font-size: 11px;
            color: #f1f5f9;
            text-align: right;
        }

        .summary {
            margin-top: 25px;
            background: #f8fafc;
            border-left: 5px solid #c9a227;
            padding: 15px 18px;
            border-radius: 6px;
        }

        .summary table {
            width: 100%;
            border-collapse: collapse;
        }

        .summary td {
            border: none;
            padding: 4px 0;
        }

        .label {
            font-weight: bold;
            color: #0b1f3a;
            width: 170px;
        }

        .table-title {
            margin-top: 28px;
            margin-bottom: 10px;
            font-size: 16px;
            font-weight: bold;
            color: #0b1f3a;
        }

        .data-table {
            width: 100%;
            border-collapse: collapse;
        }

        .data-table th {
            background: #0b1f3a;
            color: white;
            padding: 10px;
            text-align: left;
            font-size: 10px;
        }

        .data-table td {
            padding: 9px;
            border-bottom: 1px solid #e5e7eb;
            font-size: 10px;
        }

        .data-table tr:nth-child(even) {
            background: #f8fafc;
        }

        .footer {
            position: fixed;
            bottom: 18px;
            left: 30px;
            right: 30px;
            border-top: 1px solid #d1d5db;
            padding-top: 8px;
            font-size: 10px;
            color: #6b7280;
            text-align: center;
        }

        .footer strong {
            color: #0b1f3a;
        }
    </style>
</head>

<body>

    <div class="header">
        <table class="header-table">
            <tr>
                <td width="28%">
                    <img src="{{ public_path('images/logo.png') }}" class="logo">
                </td>
                <td>
                    <div class="title">Relatório de Apartamentos</div>
                    <div class="subtitle">Sistema de Gestão Imobiliária</div>
                </td>
            </tr>
        </table>
    </div>

    <div class="summary">
        <table>
            <tr>
                <td class="label">Documento</td>
                <td>Listagem Geral de Apartamentos</td>
            </tr>
            <tr>
                <td class="label">Total de imóveis</td>
                <td>{{ $apartamentos->count() }}</td>
            </tr>
        </table>
    </div>

    <div class="table-title">Apartamentos Registados</div>

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

    <div class="footer">
        <strong>Hanna Imobiliária</strong><br>
        Sistema de Gestão Imobiliária • Emitido por {{ Auth::user()->name }}  ({{ ucfirst(Auth::user()->role) }}) • {{ now()->format('d/m/Y H:i') }}
    </div>

</body>

</html>
