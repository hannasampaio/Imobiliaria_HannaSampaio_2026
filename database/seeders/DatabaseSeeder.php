<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Venda;
use App\Models\Apartamento;
use App\Models\Cliente;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        Venda::truncate();
        Apartamento::truncate();
        Cliente::truncate();
        User::truncate();

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $this->call([
            UserSeeder::class,
            ClienteSeeder::class,
            ApartamentoSeeder::class,
            VendaSeeder::class,
        ]);
    }
}