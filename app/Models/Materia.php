<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Materia extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'nombre',
        'descripcion',
    ];

    public function actividadesCalificables()
    {
        return $this->hasMany(ActividadCalificable::class);
    }
}