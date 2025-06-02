@extends('layouts.app')

@section('content')
<div class="container">
    <h2>📆 Semanas disponibles</h2>
    <ul class="list-group">
        @foreach ($semanas as $semana)
            <li class="list-group-item">
                <a href="{{ url('/semana/'.$semana->id) }}">{{ $semana->titulo }}</a>
            </li>
        @endforeach
    </ul>
</div>
@endsection
