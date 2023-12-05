<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    protected $fillable = ['nombre_curso', 'codigo_curso', 'profesor_id'];

    public function profesor()
    {
        return $this->belongsTo(Profesor::class);
    }

    public function matriculas()
    {
        return $this->hasMany(Matricula::class);
    }
}
