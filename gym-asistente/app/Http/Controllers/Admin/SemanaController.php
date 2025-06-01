<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Semana;
use Illuminate\Http\Request;

class SemanaController extends Controller
{
    public function index()
    {
        $semanas = Semana::all();
        return view('admin.semanas.index', compact('semanas'));
    }

    public function create()
    {
        return view('admin.semanas.create');
    }

    public function store(Request $request)
    {
        $request->validate(['titulo' => 'required|string|max:255']);
        Semana::create($request->all());
        return redirect()->route('semanas.index')->with('success', 'Semana creada.');
    }

    public function edit(Semana $semana)
    {
        return view('admin.semanas.edit', compact('semana'));
    }

    public function update(Request $request, Semana $semana)
    {
        $request->validate(['titulo' => 'required|string|max:255']);
        $semana->update($request->all());
        return redirect()->route('semanas.index')->with('success', 'Semana actualizada.');
    }

    public function destroy(Semana $semana)
    {
        $semana->delete();
        return redirect()->route('semanas.index')->with('success', 'Semana eliminada.');
    }
}
