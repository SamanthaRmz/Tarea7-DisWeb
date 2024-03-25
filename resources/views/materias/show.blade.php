@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Detalles de la materia: {{ $materia->nombre }}</h1>
        
        <!-- Mostrar descripción de la materia -->
        <p>{{ $materia->descripcion }}</p>
        
        <!-- Sección de actividades calificables -->
        <div class="actividades-section">
            <h2>Actividades Calificables</h2>
            <!-- Botón para agregar actividad -->
            <button onclick="window.location='{{ route('materias.actividades.create', $materia->id) }}'" class="btn btn-success">Agregar Actividad</button>
            <ul>
            @if ($actividadesCalificables->isNotEmpty())
                @foreach($actividadesCalificables as $actividad)
                    <li>
                        <strong>Tipo:</strong> {{ $actividad->tipo }} <br>
                        <strong>Calificación:</strong> {{ $actividad->calificacion }} <br>
                        <strong>Fecha de entrega:</strong> {{ $actividad->fecha }} <br>
                        <!-- Botones para editar y eliminar esta actividad -->
                        <button onclick="window.location='{{ route('materias.actividades.edit', [$materia->id, $actividad->id]) }}'" class="btn btn-primary">Editar</button>
                        <form action="{{ route('materias.actividades.destroy', [$materia->id, $actividad->id]) }}" method="POST" style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro de que deseas eliminar esta actividad?')">Eliminar</button>
                        </form>
                    </li>
                @endforeach
                @else
                    <p>No hay actividades calificables asociadas a esta materia.</p>
                @endif
            </ul>
        </div>
        
        <!-- Botones para regresar, editar, eliminar -->
        <div class="buttons-section">
            <button type="button" class="btn btn-secondary" onclick="window.location='{{ route("materias.index") }}';">Regresar</button>
            <button onclick="window.location='{{ route('materias.edit', $materia->id) }}'" class="btn btn-primary">Editar Materia</button>
            <form action="{{ route('materias.destroy', $materia->id) }}" method="POST" style="display: inline-block;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro de que deseas eliminar esta materia?')">Eliminar</button>
            </form>
        </div>
    </div>
@endsection
