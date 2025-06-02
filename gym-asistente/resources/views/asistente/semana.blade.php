@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-end mb-3">
    <a href="{{ url('/') }}" class="btn btn-secondary">📅 Ver solo hoy</a>
</div>

<h2 class="mb-4">{{ $semana->titulo }}</h2>

@foreach ($semana->dias as $dia)
    <div class="card mb-4">
        <div class="card-header">
            <strong>{{ $dia->nombre }}</strong> - {{ $dia->grupo_muscular }}
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
@endforeach
@endsection
