@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Agregar Actividad</h1>
        <form action="{{ route('materias.actividades.store', $materia->id) }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="tipo">Tipo de Actividad</label>
                <input type="text" name="tipo" id="tipo" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="calificacion">Calificación</label>
                <input type="number" name="calificacion" id="calificacion" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="fecha">Fecha</label>
                <input type="date" name="fecha" id="fecha" class="form-control" required>
            </div>
            <!-- Puedes agregar más campos según sea necesario -->
            <button type="submit" class="btn btn-primary">Agregar Actividad</button>
            <button type="button" class="btn btn-secondary" onclick="window.history.back();">Cancelar</button>
        </form>
    </div>
@endsection
