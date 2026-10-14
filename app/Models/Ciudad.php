<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ciudad extends Model
{
    protected $fillable = [ 'nombre', 'poblacion', 'pais_id']; // Campos que se pueden agregar masivamente
}
