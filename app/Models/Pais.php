<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pais extends Model
{
    protected $table = 'pais'; // Nombre de la tabla en la base de datos
    protected $fillable = ['nombre', 'idioma']; // Campos que se pueden agregar masivamente
}
