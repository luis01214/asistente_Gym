@extends('layouts.app')

@section('content')
<h1>Editar Día</h1>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('dias.update', $dia) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label for="nombre" class="form-label">Nombre del Día</label>
        <input type="text" class="form-control" id="nombre" name="nombre" value="{{ old('nombre', $dia->nombre) }}" required>
    </div>

    <div class="mb-3">
        <label for="grupo_muscular" class="form-label">Grupo Muscular</label>
        <input type="text" class="form-control" id="grupo_muscular" name="grupo_muscular" value="{{ old('grupo_muscular', $dia->grupo_muscular) }}" required>
    </div>

    <div class="mb-3">
        <label for="semana_id" class="form-label">Semana</label>
        <select name="semana_id" id="semana_id" class="form-select" required>
            <option value="">Selecciona una semana</option>
            @foreach($semanas as $semana)
                <option value="{{ $semana->id }}" {{ old('semana_id', $dia->semana_id) == $semana->id ? 'selected' : '' }}>{{ $semana->titulo }}</option>
            @endforeach
        </select>
    </div>

    <hr>
    <h4>Ejercicios existentes</h4>

    @foreach ($dia->ejercicios as $i => $ejercicio)
        <div class="mb-3 border p-3 rounded bg-light">
            <input type="hidden" name="ejercicios[{{ $i }}][id]" value="{{ $ejercicio->id }}">

            <div class="mb-2">
                <label class="form-label">Nombre</label>
                <input type="text" class="form-control" name="ejercicios[{{ $i }}][nombre]" value="{{ $ejercicio->nombre }}" required>
            </div>

            <div class="mb-2">
                <label class="form-label">Series</label>
                <input type="text" class="form-control" name="ejercicios[{{ $i }}][series]" value="{{ $ejercicio->series }}">
            </div>

            <div class="mb-2">
                <label class="form-label">Repeticiones</label>
                <input type="text" class="form-control" name="ejercicios[{{ $i }}][repeticiones]" value="{{ $ejercicio->repeticiones }}">
            </div>
        </div>
    @endforeach

    <hr>
    <h4>Agregar nuevos ejercicios</h4>

    @for ($j = 0; $j < 3; $j++)
        <div class="mb-3 border p-3 rounded">
            <div class="mb-2">
                <label class="form-label">Nombre</label>
                <input type="text" class="form-control" name="nuevos_ejercicios[{{ $j }}][nombre]" placeholder="Nombre del ejercicio">
            </div>

            <div class="mb-2">
                <label class="form-label">Series</label>
                <input type="text" class="form-control" name="nuevos_ejercicios[{{ $j }}][series]" placeholder="Series">
            </div>

            <div class="mb-2">
                <label class="form-label">Repeticiones</label>
                <input type="text" class="form-control" name="nuevos_ejercicios[{{ $j }}][repeticiones]" placeholder="Repeticiones">
            </div>
        </div>
    @endfor

    <button type="submit" class="btn btn-primary">Actualizar</button>
    <a href="{{ url()->previous() }}" class="btn btn-secondary">Cancelar</a>
</form>
@endsection
