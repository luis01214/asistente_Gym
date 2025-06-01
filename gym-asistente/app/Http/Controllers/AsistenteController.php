<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dia;
use App\Models\Semana;

class AsistenteController extends Controller
{
    public function hoy($nivel = 'intermedio')
    {
        $hoy = ucfirst(now()->locale('es')->dayName); // Lunes, Martes, etc.
        $dia = Dia::with('ejercicios')->where('nombre', $hoy)->first();

        if (!$dia) {
            return response()->json(['mensaje' => 'No hay actividades para hoy']);
        }

        return response()->json([
            'dia' => $dia->nombre,
            'grupo_muscular' => $dia->grupo_muscular,
            'ejercicios' => $dia->ejercicios->map(function ($e) use ($nivel) {
                return [
                    'nombre' => $e->nombre,
                    'series' => $e->series,
                    'repeticiones' => $e->repeticiones,
                    'descanso' => $e->descanso,
                    'instruccion_nivel' => $e->nivel[$nivel] ?? null,
                    'video_url' => $e->video_url
                ];
            }),
        ]);
    }
    public function vista(Request $request)
    {
        $nivel = $request->query('nivel', 'intermedio');
        $hoy = ucfirst(now()->locale('es')->dayName);
        $dia = \App\Models\Dia::with('ejercicios')->where('nombre', $hoy)->first();

        return view('asistente.hoy', [
            'dia' => $dia,
            'nivel' => $nivel
        ]);
    }
    public function verSemanas()
    {
        $semanas = Semana::all();
        return view('asistente.semanas', compact('semanas'));
    }

    public function verSemana($id)
    {
        $semana = Semana::with('dias.ejercicios')->findOrFail($id);
        return view('asistente.semana', compact('semana'));
    }
    public function verDia()
    {
         $hoy = now()->format('l'); // Ej: Monday, Tuesday, etc.

        // Traducción si tus datos están en español
        $dias = [
            'Monday' => 'Lunes',
            'Tuesday' => 'Martes',
            'Wednesday' => 'Miércoles',
            'Thursday' => 'Jueves',
            'Friday' => 'Viernes',
            'Saturday' => 'Sábado',
            'Sunday' => 'Domingo',
        ];

        $nombreDia = $dias[$hoy] ?? $hoy;

        $dia = Dia::with('ejercicios')->where('nombre', $nombreDia)->first();

        return view('asistente.hoy', compact('dia'));
    }
}
