<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profesor extends Model
{
    protected $fillable = ['nombre', 'apellido', 'email', 'area_especializacion'];

    public function cursos()
    {
        return $this->hasMany(Curso::class);
    }
}
