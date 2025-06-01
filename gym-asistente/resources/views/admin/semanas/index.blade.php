@extends('layouts.app')

@section('content')
<h1>Semanas</h1>

<a href="{{ route('semanas.create') }}" class="btn btn-success mb-3">+ Nueva Semana</a>

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<table class="table table-bordered">
    <thead>
        <tr>
            <th>ID</th>
            <th>Título</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($semanas as $semana)
        <tr>
            <td>{{ $semana->id }}</td>
            <td>{{ $semana->titulo }}</td>
            <td>
                <a href="{{ route('semanas.edit', $semana) }}" class="btn btn-primary btn-sm">Editar</a>
                <form action="{{ route('semanas.destroy', $semana) }}" method="POST" class="d-inline" onsubmit="return confirm('¿Eliminar esta semana?')">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm">Eliminar</button>
                </form>
                <a href="{{ url('admin/dias?semana_id='.$semana->id) }}" class="btn btn-info btn-sm">Ver Días</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
