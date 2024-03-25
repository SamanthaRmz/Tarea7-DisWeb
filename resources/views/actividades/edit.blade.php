@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Editar Actividad</h1>
        <form action="{{ route('materias.actividades.update', [$materia->id, $actividad->id]) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="tipo">Tipo de Actividad</label>
                <input type="text" name="tipo" id="tipo" class="form-control" value="{{ $actividad->tipo }}" required>
            </div>
            <div class="form-group">
                <label for="calificacion">Calificación</label>
                <input type="number" name="calificacion" id="calificacion" class="form-control" value="{{ $actividad->calificacion }}" required>
            </div>
            <div class="form-group">
                <label for="fecha">Fecha</label>
                <input type="date" name="fecha" id="fecha" class="form-control" value="{{ $actividad->fecha }}" required>
            </div>
            <!-- Agrega más campos según sea necesario -->
            <button type="submit" class="btn btn-primary">Guardar Cambios</button>
            <button type="button" class="btn btn-secondary" onclick="window.history.back();">Cancelar</button>
        </form>
    </div>
@endsection
