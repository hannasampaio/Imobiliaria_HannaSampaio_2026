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
                $q->where('nome', 'like', "%{$pesquisa}%")
                    ->orWhere('email', 'like', "%{$pesquisa}%")
                    ->orWhere('telefone', 'like', "%{$pesquisa}%")
                    ->orWhere('nif', 'like', "%{$pesquisa}%");
            });
        }

        switch ($request->get('ordenar')) {

            case 'antigos':
                $query->orderBy('id');
                break;

            case 'nome_az':
                $query->orderBy('nome');
                break;

            case 'nome_za':
                $query->orderByDesc('nome');
                break;

            default:
                $query->orderByDesc('id');
        }

        $clientes = $query->paginate(8)->withQueryString();

        $totalClientes = Cliente::count();

        $clientesEsteMes = Cliente::whereMonth('created_at', now()->month)
            ->whereYear('created_at', now()->year)
            ->count();

        $ultimoCliente = Cliente::latest()->first();

        return view('clientes.index', compact(
            'clientes',
            'totalClientes',
            'clientesEsteMes',
            'ultimoCliente'
        ));
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
