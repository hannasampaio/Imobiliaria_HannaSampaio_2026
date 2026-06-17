<?php

namespace App\Http\Controllers;

use App\Models\Apartamento;
use App\Models\Cliente;
use App\Models\Venda;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VendaController extends Controller
{
    public function index(Request $request)
    {
        $query = Venda::with(['cliente', 'apartamento']);

        if ($request->filled('pesquisa')) {
            $pesquisa = $request->pesquisa;

            $query->where(function ($q) use ($pesquisa) {
                $q->whereHas('cliente', function ($cliente) use ($pesquisa) {
                    $cliente->where('nome', 'like', '%' . $pesquisa . '%');
                })
                    ->orWhereHas('apartamento', function ($apartamento) use ($pesquisa) {
                        $apartamento->where('referencia', 'like', '%' . $pesquisa . '%');
                    })
                    ->orWhere('data_venda', 'like', '%' . $pesquisa . '%')
                    ->orWhere('valor_venda', 'like', '%' . $pesquisa . '%');
            });
        }

        $ordenar = $request->get('ordenar', 'recentes');

        if ($ordenar === 'antigas') {
            $query->orderBy('data_venda', 'asc');
        } elseif ($ordenar === 'maior_valor') {
            $query->orderBy('valor_venda', 'desc');
        } elseif ($ordenar === 'menor_valor') {
            $query->orderBy('valor_venda', 'asc');
        } else {
            $query->orderBy('data_venda', 'desc');
        }

        $vendas = $query->paginate(8)->withQueryString();

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
        if (Auth::user()->role !== 'admin') {
            abort(403, 'Acesso não autorizado.');
        }

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
