<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::firstOrCreate(
            [
                'email' => 'hannasampaio@imobiliariahanna.com',
            ],
            [
                'name' => 'Hanna',
                'password' => Hash::make('123456789'),
                'role' => 'admin',
            ]
        );

        User::firstOrCreate(
            [
                'email' => 'vendedor@imobiliariahanna.com',
            ],
            [
                'name' => 'Vendedor',
                'password' => Hash::make('987654321'),
                'role' => 'vendedor',
            ]
        );
    }
}