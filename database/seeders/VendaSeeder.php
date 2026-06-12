<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VendaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
{
    \App\Models\Venda::create([
        'cliente_id' => 1,
        'apartamento_id' => 1,
        'data_venda' => now(),
        'valor_venda' => 180000,
        'observacoes' => 'Venda de exemplo criada pelo seeder.',
    ]);

    \App\Models\Apartamento::where('id', 1)
        ->update([
            'estado' => 'Vendido',
        ]);
}
}
