<?php

namespace App\Http\Controllers;

use App\Models\Apartamento;
use Illuminate\Http\Request;

class ApartamentoController extends Controller
{
    public function index()
    {
        $apartamentos = Apartamento::orderBy('id', 'desc')->get();

        return view('apartamentos.index', compact('apartamentos'));
    }

    public function create()
    {
        return view('apartamentos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'referencia' => 'required|string|max:100|unique:apartamentos,referencia',
            'tipologia' => 'required|string|max:20',
            'morada' => 'required|string|max:255',
            'area' => 'required|numeric|min:1',
            'preco' => 'required|numeric|min:1',
            'fotografia' => 'nullable|image|mimes:jpg,jpeg,png|max:10240',
            'estado' => 'required|in:Disponivel,Vendido',
        ]);

        $dados = $request->all();

        if ($request->hasFile('fotografia')) {
            $dados['fotografia'] = $request->file('fotografia')->store('apartamentos', 'public');
        }

        Apartamento::create($dados);

        return redirect()
            ->route('apartamentos.index')
            ->with('success', 'Apartamento criado com sucesso!');
    }

    public function show(Apartamento $apartamento)
    {
        return view('apartamentos.show', compact('apartamento'));
    }

    public function edit(Apartamento $apartamento)
    {
        return view('apartamentos.edit', compact('apartamento'));
    }

    public function update(Request $request, Apartamento $apartamento)
    {
        $request->validate([
            'referencia' => 'required|string|max:100|unique:apartamentos,referencia,' . $apartamento->id,
            'tipologia' => 'required|string|max:20',
            'morada' => 'required|string|max:255',
            'area' => 'required|numeric|min:1',
            'preco' => 'required|numeric|min:1',
            'fotografia' => 'nullable|image|mimes:jpg,jpeg,png|max:10240',
            'estado' => 'required|in:Disponivel,Vendido',
        ]);

        $dados = $request->all();

        if ($request->hasFile('fotografia')) {
            $dados['fotografia'] = $request->file('fotografia')->store('apartamentos', 'public');
        }

        $apartamento->update($dados);

        return redirect()
            ->route('apartamentos.index')
            ->with('success', 'Apartamento atualizado com sucesso!');
    }

    public function destroy(Apartamento $apartamento)
    {
        $apartamento->delete();

        return redirect()
            ->route('apartamentos.index')
            ->with('success', 'Apartamento apagado com sucesso!');
    }
}
