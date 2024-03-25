<?php

namespace App\Http\Controllers;
use App\Models\ActividadCalificable; 
use App\Models\Materia;
use Illuminate\Http\Request;

class MateriaController extends Controller {
    /**
     * Display a listing of the resource.
     */
    public function index() {
        $materias = Materia::all();
        return view('materias.index', compact('materias'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() {
        $materia = new Materia(); //Crear una nueva instancia de Materia
        return view('materias.create', compact('materia'));    
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) {
        $request->validate([
            'nombre' => 'required|string|max:255',
        ]);
    
        $data = $request->except('_token');
        Materia::create($data);
    
        return redirect()->route('materias.index')
                         ->with('success', 'Materia creada exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Materia $materia) {
        //Recupera las actividades calificables relacionadas con esta materia
        $actividadesCalificables = $materia->actividadesCalificables;

        //Pasa las actividades calificables a la vista
        return view('materias.show', compact('materia', 'actividadesCalificables'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Materia $materia) {
        return view('materias.edit', compact('materia'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Materia $materia) {
        $request->validate([
            'nombre' => 'required|string|max:255',
        ]);
    
        $materia->update($request->all());
    
        // Redirigir al usuario a la vista de detalles de la materia
        return redirect()->route('materias.show', $materia->id)->with('success', 'Materia actualizada exitosamente.');
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Materia $materia) {
        $materia->delete();

        return redirect()->route('materias.index')
                         ->with('success', 'Materia eliminada exitosamente.');
    }

    public function createActividad(Materia $materia) {
        return view('actividades.create', ['materia' => $materia]);
    }       

    public function storeActividad(Request $request, Materia $materia) {
        $request->validate([
            'tipo' => 'required',
            'calificacion' => 'required|numeric',
            'fecha' => 'required|date',
        ]);

        $actividad = new ActividadCalificable([
            'tipo' => $request->tipo,
            'calificacion' => $request->calificacion,
            'fecha' => $request->fecha,
        ]);

        $materia->actividadesCalificables()->save($actividad);

        return redirect()->route('materias.show', $materia->id)->with('success', 'Actividad creada exitosamente.');
    }

    public function editActividad(Materia $materia, ActividadCalificable $actividad) {
        return view('actividades.edit', compact('materia', 'actividad'));
    }
    
    public function updateActividad(Request $request, Materia $materia, ActividadCalificable $actividad) {
        $request->validate([
            'tipo' => 'required',
            'calificacion' => 'required|numeric',
            'fecha' => 'required|date',
        ]);

        $actividad->update([
            'tipo' => $request->tipo,
            'calificacion' => $request->calificacion,
            'fecha' => $request->fecha,
        ]);

        return redirect()->route('materias.show', $materia->id)->with('success', 'Actividad actualizada exitosamente.');
    }

    public function destroyActividad(Materia $materia, ActividadCalificable $actividad) {
        $actividad->delete();

        return redirect()->route('materias.show', $materia->id)->with('success', 'Actividad eliminada exitosamente.');
    }

}