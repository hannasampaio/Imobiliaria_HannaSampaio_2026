<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ApartamentoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Apartamento::insert([
            [
                'referencia' => 'APT001',
                'tipologia' => 'T2',
                'morada' => 'Rua de Braga',
                'area' => 85,
                'preco' => 185000,
                'estado' => 'Disponivel',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'referencia' => 'APT002',
                'tipologia' => 'T3',
                'morada' => 'Avenida Central',
                'area' => 120,
                'preco' => 275000,
                'estado' => 'Disponivel',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
