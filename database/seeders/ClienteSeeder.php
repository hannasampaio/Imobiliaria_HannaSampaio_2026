<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ClienteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Cliente::insert([
            [
                'nome' => 'Maria Silva',
                'email' => 'maria@email.com',
                'telefone' => '912345678',
                'morada' => 'Braga',
                'nif' => '123456789',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nome' => 'João Costa',
                'email' => 'joao@email.com',
                'telefone' => '913456789',
                'morada' => 'Porto',
                'nif' => '987654321',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
