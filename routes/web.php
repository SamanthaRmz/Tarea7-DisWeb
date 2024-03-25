<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MateriaController;


Route::get('/', function () {
    return redirect()->route('materias.index');
});

//Redirige la ruta raíz a la lista de materias
Route::redirect('/', '/materias');

//Define las rutas para el CRUD de materias
Route::resource('materias', MateriaController::class);
Route::get('/materias/{materia}/actividades/create', [MateriaController::class, 'createActividad'])->name('materias.actividades.create');
Route::post('/materias/{materia}/actividades', [MateriaController::class, 'storeActividad'])->name('materias.actividades.store');
Route::get('/materias/{materia}/actividades/{actividad}/edit', [MateriaController::class, 'editActividad'])->name('materias.actividades.edit');
Route::put('/materias/{materia}/actividades/{actividad}', [MateriaController::class, 'updateActividad'])->name('materias.actividades.update');
Route::delete('/materias/{materia}/actividades/{actividad}', [MateriaController::class, 'destroyActividad'])->name('materias.actividades.destroy');
Route::get('/materias/{materia}', [MateriaController::class, 'show'])->name('materias.show');