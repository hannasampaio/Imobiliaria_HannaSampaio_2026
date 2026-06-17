<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ApartamentoController;
use App\Http\Controllers\VendaController;
use App\Models\Cliente;
use App\Models\Apartamento;
use App\Models\Venda;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::middleware(['auth', 'verified'])->group(function () {

    Route::get('/dashboard', function () {

        if (Auth::check() && Auth::user()->role === 'cliente') {
            return redirect()->route('apartamentos.index');
        }

        $totalClientes = Cliente::count();
        $totalApartamentos = Apartamento::count();
        $totalVendas = Venda::count();

        $apartamentosDisponiveis = Apartamento::where('estado', 'Disponivel')->count();
        $apartamentosVendidos = Apartamento::where('estado', 'Vendido')->count();

        $precoMedio = Apartamento::avg('preco');
        $precoMaximo = Apartamento::max('preco');
        $precoMinimo = Apartamento::min('preco');

        $apartamentosDestaque = Apartamento::latest()
            ->take(3)
            ->get();

        $faturamentoTotal = Venda::sum('valor_venda');

        $vendasRecentes = Venda::with(['cliente', 'apartamento'])
            ->latest()
            ->take(5)
            ->get();

        $vendasPorMes = collect(range(1, now()->daysInMonth))->map(function ($dia) {
            return [
                'mes' => $dia,

                'total' => Venda::whereDay('data_venda', $dia)
                    ->whereMonth('data_venda', now()->month)
                    ->whereYear('data_venda', now()->year)
                    ->count(),

                'receita' => Venda::whereDay('data_venda', $dia)
                    ->whereMonth('data_venda', now()->month)
                    ->whereYear('data_venda', now()->year)
                    ->sum('valor_venda'),
            ];
        });

        return view('dashboard', compact(
            'totalClientes',
            'totalApartamentos',
            'totalVendas',
            'apartamentosDisponiveis',
            'apartamentosVendidos',
            'precoMedio',
            'precoMaximo',
            'precoMinimo',
            'apartamentosDestaque',
            'faturamentoTotal',
            'vendasRecentes',
            'vendasPorMes'
        ));
    })->name('dashboard');

    Route::resource('clientes', ClienteController::class);
    Route::resource('apartamentos', ApartamentoController::class);
    Route::resource('vendas', VendaController::class);
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
