<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ApartamentoController;
use App\Http\Controllers\VendaController;

Route::get('/', function () {
    return redirect()->route('clientes.index');
});

Route::resource('clientes', ClienteController::class);
Route::resource('apartamentos', ApartamentoController::class);
Route::resource('vendas', VendaController::class);
