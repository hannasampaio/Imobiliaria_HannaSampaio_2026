<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Apartamento;
use App\Models\Venda;
use Barryvdh\DomPDF\Facade\Pdf;

class RelatorioController extends Controller
{
    public function clientes()
    {
        $clientes = Cliente::orderBy('nome')->get();

        $pdf = Pdf::loadView('relatorios.clientes', compact('clientes'));

        return $pdf->stream('clientes.pdf');
    }

    public function apartamentos()
    {
        $apartamentos = Apartamento::orderBy('referencia')->get();

        $pdf = Pdf::loadView('relatorios.apartamentos', compact('apartamentos'));

        return $pdf->stream('apartamentos.pdf');
    }

    public function vendas()
    {
        $vendas = Venda::with(['cliente', 'apartamento'])
            ->orderBy('data_venda', 'desc')
            ->get();

        $pdf = Pdf::loadView('relatorios.vendas', compact('vendas'));

        return $pdf->stream('vendas.pdf');
    }
}
