@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Listado de Materias</h1>
        <button onclick="window.location='{{ route('materias.create') }}'" class="btn btn-primary">Agregar Materia</button>
        <ul>
            @foreach($materias as $materia)
                <li><a href="{{ route('materias.show', $materia->id) }}">{{ $materia->nombre }}</a></li>
            @endforeach
        </ul>
    </div>
@endsection