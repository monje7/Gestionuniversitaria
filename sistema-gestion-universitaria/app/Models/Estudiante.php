<?php



namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Estudiante extends Model
{
    protected $fillable = ['nombre', 'apellido', 'email', 'fecha_nacimiento'];

    public function matriculas()
    {
        return $this->hasMany(Matricula::class);
    }
}
