@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Editar Materia</h1>
        <form action="{{ route('materias.update', $materia->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="nombre">Nombre</label>
                <input type="text" name="nombre" id="nombre" class="form-control" value="{{ $materia->nombre }}" required>
            </div>
            <div class="form-group">
                <label for="descripcion">Descripción</label>
                <textarea name="descripcion" id="descripcion" class="form-control" required>{{ $materia->descripcion }}</textarea>
            </div>
            <button type="submit" class="btn btn-primary">Guardar Cambios</button>
            <button type="button" class="btn btn-secondary" onclick="window.history.back();">Cancelar</button>
        </form>
    </div>
@endsection
