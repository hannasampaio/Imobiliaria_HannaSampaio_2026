<?php

namespace App\Http\Controllers;

use App\Models\Apartamento;
use App\Models\Cliente;
use App\Models\Venda;
use Illuminate\Http\Request;

class VendaController extends Controller
{
    public function index()
    {
        $vendas = Venda::with(['cliente', 'apartamento'])
            ->orderBy('id', 'desc')
            ->get();

        return view('vendas.index', compact('vendas'));
    }

    public function create()
    {
        $clientes = Cliente::orderBy('nome')->get();

        $apartamentos = Apartamento::where('estado', 'Disponivel')
            ->orderBy('referencia')
            ->get();

        return view('vendas.create', compact('clientes', 'apartamentos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'cliente_id' => 'required|exists:clientes,id',
            'apartamento_id' => 'required|exists:apartamentos,id|unique:vendas,apartamento_id',
            'data_venda' => 'required|date',
            'valor_venda' => 'required|numeric|min:1',
            'observacoes' => 'nullable|string',
        ]);

        $apartamento = Apartamento::findOrFail($request->apartamento_id);

        if ($apartamento->estado === 'Vendido') {
            return redirect()
                ->back()
                ->withInput()
                ->withErrors(['apartamento_id' => 'Este apartamento já foi vendido.']);
        }

        Venda::create($request->all());

        $apartamento->update([
            'estado' => 'Vendido',
        ]);

        return redirect()
            ->route('vendas.index')
            ->with('success', 'Venda registada com sucesso!');
    }

    public function show(Venda $venda)
    {
        $venda->load(['cliente', 'apartamento']);

        return view('vendas.show', compact('venda'));
    }

    public function edit(Venda $venda)
    {
        $clientes = Cliente::orderBy('nome')->get();

        $apartamentos = Apartamento::where('estado', 'Disponivel')
            ->orWhere('id', $venda->apartamento_id)
            ->orderBy('referencia')
            ->get();

        return view('vendas.edit', compact('venda', 'clientes', 'apartamentos'));
    }

    public function update(Request $request, Venda $venda)
    {
        $request->validate([
            'cliente_id' => 'required|exists:clientes,id',
            'apartamento_id' => 'required|exists:apartamentos,id|unique:vendas,apartamento_id,' . $venda->id,
            'data_venda' => 'required|date',
            'valor_venda' => 'required|numeric|min:1',
            'observacoes' => 'nullable|string',
        ]);

        $apartamentoAntigo = $venda->apartamento;

        $apartamentoNovo = Apartamento::findOrFail($request->apartamento_id);

        if ($apartamentoNovo->estado === 'Vendido' && $apartamentoNovo->id !== $venda->apartamento_id) {
            return redirect()
                ->back()
                ->withInput()
                ->withErrors(['apartamento_id' => 'Este apartamento já foi vendido.']);
        }

        $venda->update($request->all());

        if ($apartamentoAntigo && $apartamentoAntigo->id !== $apartamentoNovo->id) {
            $apartamentoAntigo->update([
                'estado' => 'Disponivel',
            ]);
        }

        $apartamentoNovo->update([
            'estado' => 'Vendido',
        ]);

        return redirect()
            ->route('vendas.index')
            ->with('success', 'Venda atualizada com sucesso!');
    }

    public function destroy(Venda $venda)
    {
        $apartamento = $venda->apartamento;

        $venda->delete();

        if ($apartamento) {
            $apartamento->update([
                'estado' => 'Disponivel',
            ]);
        }

        return redirect()
            ->route('vendas.index')
            ->with('success', 'Venda apagada com sucesso!');
    }
}
