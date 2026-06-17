<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClienteController extends Controller
{
    public function index(Request $request)
{
    $query = Cliente::query();

    if ($request->filled('pesquisa')) {
        $pesquisa = $request->pesquisa;

        $query->where(function ($q) use ($pesquisa) {
            $q->where('nome', 'like', '%' . $pesquisa . '%')
                ->orWhere('email', 'like', '%' . $pesquisa . '%')
                ->orWhere('telefone', 'like', '%' . $pesquisa . '%')
                ->orWhere('nif', 'like', '%' . $pesquisa . '%');
        });
    }

    $ordenar = $request->get('ordenar', 'recentes');

    if ($ordenar === 'nome_az') {
        $query->orderBy('nome', 'asc');
    } elseif ($ordenar === 'nome_za') {
        $query->orderBy('nome', 'desc');
    } elseif ($ordenar === 'antigos') {
        $query->orderBy('id', 'asc');
    } else {
        $query->orderBy('id', 'desc');
    }
    
    $clientes = $query->paginate(8)->withQueryString();

    return view('clientes.index', compact('clientes'));
}

    public function create()
    {
        return view('clientes.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome'      => 'required|string|max:255',
            'email'     => 'required|email|unique:clientes,email',
            'telefone'  => 'required|string|max:20',
            'morada'    => 'required|string|max:255',
            'nif'       => 'required|string|size:9|unique:clientes,nif',
        ]);

        Cliente::create($request->all());

        return redirect()
            ->route('clientes.index')
            ->with('success', 'Cliente criado com sucesso!');
    }

    public function show(Cliente $cliente)
    {
        return view('clientes.show', compact('cliente'));
    }

    public function edit(Cliente $cliente)
    {
        return view('clientes.edit', compact('cliente'));
    }

    public function update(Request $request, Cliente $cliente)
    {
        $request->validate([
            'nome'      => 'required|string|max:255',
            'email'     => 'required|email|unique:clientes,email,' . $cliente->id,
            'telefone'  => 'required|string|max:20',
            'morada'    => 'required|string|max:255',
            'nif'       => 'required|string|size:9|unique:clientes,nif,' . $cliente->id,
        ]);

        $cliente->update($request->all());

        return redirect()
            ->route('clientes.index')
            ->with('success', 'Cliente atualizado com sucesso!');
    }

    public function destroy(Cliente $cliente)
    {
        if (Auth::user()->role !== 'admin') {
            abort(403, 'Acesso não autorizado.');
        }

        $cliente->delete();

        return redirect()
            ->route('clientes.index')
            ->with('success', 'Cliente apagado com sucesso!');
    }
}
