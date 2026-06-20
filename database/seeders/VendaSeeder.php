<?php

namespace Database\Seeders;

use App\Models\Apartamento;
use App\Models\Cliente;
use App\Models\Venda;
use Illuminate\Database\Seeder;

class VendaSeeder extends Seeder
{
    public function run(): void
    {

        $vendas = [
            [1, 1, '2026-06-03', 145000],
            [2, 2, '2026-06-07', 210000],
            [3, 3, '2026-06-12', 295000],
            [4, 4, '2026-06-17', 250000],
            [5, 5, '2026-06-22', 520000],
            [6, 6, '2026-06-28', 135000],
        ];

        foreach ($vendas as $venda) {
            Venda::create([
                'cliente_id' => $venda[0],
                'apartamento_id' => $venda[1],
                'data_venda' => $venda[2],
                'valor_venda' => $venda[3],
                'observacoes' => 'Venda registada automaticamente pelo seeder.',
            ]);

            Apartamento::where('id', $venda[1])->update([
                'estado' => 'Vendido'
            ]);
        }
    }
}