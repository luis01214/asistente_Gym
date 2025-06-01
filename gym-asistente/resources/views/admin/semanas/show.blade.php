@foreach ($semana->dias as $dia)
    <h3>{{ $dia->nombre }} - {{ $dia->grupo_muscular }}</h3>

    @if ($dia->ejercicios->isEmpty())
        <p>No hay ejercicios para este día.</p>
    @else
        <ul>
            @foreach ($dia->ejercicios as $ejercicio)
                <li>{{ $ejercicio->nombre }} - Series: {{ $ejercicio->series }} - Repeticiones: {{ $ejercicio->repeticiones }}</li>
            @endforeach
        </ul>
    @endif
@endforeach
