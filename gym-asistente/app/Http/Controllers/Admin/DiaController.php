<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Dia;
use App\Models\Semana;
use Illuminate\Http\Request;

class DiaController extends Controller
{
    public function index(Request $request)
    {
        $query = Dia::with('semana');

        if ($request->has('semana_id')) {
            $query->where('semana_id', $request->semana_id);
        }

        $dias = $query->get();

        return view('admin.dias.index', compact('dias'));
    }

    public function create(Request $request)
    {
        $semanas = Semana::all();
        return view('admin.dias.create', [
            'semanas' => $semanas,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'grupo_muscular' => 'required|string|max:255',
            'semana_id' => 'required|exists:semanas,id',
        ]);

        Dia::create($request->all());

        return redirect()->route('dias.index', ['semana_id' => $request->semana_id])
                         ->with('success', 'Día creado correctamente.');
    }

    public function edit(Dia $dia)
    {
        $semanas = Semana::all();
        return view('admin.dias.edit', compact('dia', 'semanas'));
    }

    public function update(Request $request, Dia $dia)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'grupo_muscular' => 'required|string|max:255',
            'semana_id' => 'required|exists:semanas,id',
        ]);

        $dia->update($request->all());

        return redirect()->route('dias.index', ['semana_id' => $dia->semana_id])
                         ->with('success', 'Día actualizado correctamente.');
    }

    public function destroy(Dia $dia)
    {
        $semanaId = $dia->semana_id;
        $dia->delete();

        return redirect()->route('dias.index', ['semana_id' => $semanaId])
                         ->with('success', 'Día eliminado correctamente.');
    }
}
