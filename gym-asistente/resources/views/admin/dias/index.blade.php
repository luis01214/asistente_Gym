@extends('layouts.app')

@section('content')
<h1>Días</h1>

<a href="{{ route('dias.create') }}{{ request('semana_id') ? '?semana_id=' . request('semana_id') : '' }}" class="btn btn-success mb-3">+ Nuevo Día</a>

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<table class="table table-bordered">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Grupo Muscular</th>
            <th>Semana</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($dias as $dia)
        <tr>
            <td>{{ $dia->id }}</td>
            <td>{{ $dia->nombre }}</td>
            <td>{{ $dia->grupo_muscular }}</td>
            <td>{{ $dia->semana->titulo ?? 'Sin semana' }}</td>
            <td>
                <a href="{{ route('dias.edit', $dia) }}" class="btn btn-primary btn-sm">Editar</a>
                <form action="{{ route('dias.destroy', $dia) }}" method="POST" class="d-inline" onsubmit="return confirm('¿Eliminar este día?')">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm">Eliminar</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@if(request('semana_id'))
    <a href="{{ route('semanas.index') }}" class="btn btn-secondary mt-3">Volver a Semanas</a>
@endif
@endsection
