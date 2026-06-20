<?php

namespace Database\Seeders;

use App\Models\Apartamento;
use Illuminate\Database\Seeder;

class ApartamentoSeeder extends Seeder
{
    public function run(): void
    {

        $apartamentos = [
            ['T1', 'Rua das Flores, Braga', 65, 145000, 'apt01.png'],
            ['T2', 'Avenida Central, Braga', 85, 210000, 'apt02.png'],
            ['T3', 'Rua de São Vicente, Braga', 110, 295000, 'apt03.png'],
            ['T2', 'Rua do Sol, Porto', 90, 250000, 'apt04.png'],
            ['T4', 'Avenida da Liberdade, Lisboa', 150, 520000, 'apt05.png'],
            ['T1', 'Rua Nova, Guimarães', 60, 135000, 'apt06.png'],
            ['T3', 'Rua do Parque, Braga', 120, 330000, 'apt07.png'],
            ['T2', 'Rua das Oliveiras, Aveiro', 88, 230000, 'apt08.png'],
            ['T3', 'Rua do Mar, Matosinhos', 115, 390000, 'apt09.png'],
            ['T2', 'Rua Monte Verde, Braga', 95, 260000, 'apt10.png'],
        ];

        foreach ($apartamentos as $index => $apt) {
            Apartamento::create([
                'referencia' => 'APT' . str_pad($index + 1, 3, '0', STR_PAD_LEFT),
                'tipologia' => $apt[0],
                'morada' => $apt[1],
                'area' => $apt[2],
                'preco' => $apt[3],
                'fotografia' => 'apartamentos/' . $apt[4],
                'estado' => 'Disponivel',
            ]);
        }
    }
}