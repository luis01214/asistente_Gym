@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-end mb-3">
    <a href="{{ url('/semanas') }}" class="btn btn-primary">📆 Ver semana completa</a>
</div>

@if ($dia)
    <div class="card">
        <div class="card-header">
            <h4>{{ $dia->nombre }} - {{ $dia->grupo_muscular }}</h4>
        </div>
        <div class="card-body">
            @foreach ($dia->ejercicios as $ej)
                <div class="mb-3">
                    <h5>{{ $ej->nombre }}</h5>
                    <p>Series: {{ $ej->series }}</p>
                    <p>Repeticiones: {{ $ej->repeticiones }}</p>
                    <p>Descanso: {{ $ej->descanso }}</p>
                    @if ($ej->video_url)
                        <a href="{{ $ej->video_url }}" target="_blank">🎥 Ver video</a>
                    @endif
                    <hr>
                </div>
            @endforeach
        </div>
    </div>
@else
    <div class="alert alert-warning">
        No hay actividades cargadas para el día de hoy.
    </div>
@endif
@endsection
