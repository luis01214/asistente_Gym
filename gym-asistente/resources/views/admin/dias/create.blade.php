@extends('layouts.app')

@section('content')
<h1>Crear Nuevo Día</h1>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('dias.store') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label for="nombre" class="form-label">Nombre del Día</label>
        <input type="text" class="form-control" id="nombre" name="nombre" value="{{ old('nombre') }}" required>
    </div>

    <div class="mb-3">
        <label for="grupo_muscular" class="form-label">Grupo Muscular</label>
        <input type="text" class="form-control" id="grupo_muscular" name="grupo_muscular" value="{{ old('grupo_muscular') }}" required>
    </div>

    <div class="mb-3">
        <label for="semana_id" class="form-label">Semana</label>
        <select name="semana_id" id="semana_id" class="form-select" required>
            <option value="">Selecciona una semana</option>
            @foreach($semanas as $semana)
                <option value="{{ $semana->id }}" {{ old('semana_id', request('semana_id')) == $semana->id ? 'selected' : '' }}>{{ $semana->titulo }}</option>
            @endforeach
        </select>
    </div>

    <button type="submit" class="btn btn-primary">Guardar</button>
    <a href="{{ url()->previous() }}" class="btn btn-secondary">Cancelar</a>
</form>
@endsection
