@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Agregar Materia</h1>
        <form action="{{ route('materias.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="nombre">Nombre</label>
                <input type="text" name="nombre" id="nombre" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="descripcion">Descripción</label>
                <textarea name="descripcion" id="descripcion" class="form-control" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Aceptar</button>
            <button type="button" class="btn btn-secondary" onclick="window.history.back();">Cancelar</button>
        </form>
    </div>
@endsection
