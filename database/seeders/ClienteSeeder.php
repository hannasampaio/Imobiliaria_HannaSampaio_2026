<?php

namespace Database\Seeders;

use App\Models\Cliente;
use Illuminate\Database\Seeder;

class ClienteSeeder extends Seeder
{
    public function run(): void
    {

        for ($i = 1; $i <= 20; $i++) {
            Cliente::create([
                'nome' => 'Cliente ' . $i,
                'email' => 'cliente' . $i . '@email.com',
                'telefone' => '9100000' . str_pad($i, 2, '0', STR_PAD_LEFT),
                'morada' => 'Rua dos Clientes, nº ' . $i,
                'nif' => str_pad((string)(200000000 + $i), 9, '0', STR_PAD_LEFT),
            ]);
        }
    }
}