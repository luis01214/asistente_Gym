<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Semana;
use App\Models\Dia;
use App\Models\Ejercicio;

class SemanaSeeder extends Seeder
{
    public function run(): void
    {
        $semana = Semana::create([
            'titulo' => 'Semana 1',
        ]);

        $dias = [
            'Lunes' => 'Pecho',
            'Martes' => 'Espalda',
            'Miércoles' => 'Piernas',
            'Jueves' => 'Hombros',
            'Viernes' => 'Brazos',
        ];

        foreach ($dias as $nombre => $grupo) {
            $dia = Dia::create([
                'semana_id' => $semana->id,
                'nombre' => $nombre,
                'grupo_muscular' => $grupo,
            ]);

            // Agregamos ejercicios por día
            for ($i = 1; $i <= 3; $i++) {
                Ejercicio::create([
                    'dia_id' => $dia->id,
                    'nombre' => "Ejercicio $i de $grupo",
                    'series' => rand(3, 5),
                    'repeticiones' => rand(10, 15),
                    'descanso' => '60 seg',
                    'nivel' => json_encode([
                        'principiante' => '2 series',
                        'intermedio' => '3 series',
                        'avanzado' => '4 series'
                    ]),
                    'video_url' => 'https://www.youtube.com/watch?v=dQw4w9WgXcQ',
                ]);
            }
        }
    }
}
