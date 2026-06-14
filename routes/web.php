<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ApartamentoController;
use App\Http\Controllers\VendaController;
use App\Models\Cliente;
use App\Models\Apartamento;
use App\Models\Venda;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'verified'])->group(function () {

    Route::get('/', function () {
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

        return view('welcome', compact(
            'totalClientes',
            'totalApartamentos',
            'totalVendas',
            'apartamentosDisponiveis',
            'apartamentosVendidos',
            'precoMedio',
            'precoMaximo',
            'precoMinimo',
            'apartamentosDestaque'
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

require __DIR__.'/auth.php';
