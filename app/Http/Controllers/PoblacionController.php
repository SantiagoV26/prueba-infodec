<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pais;
use App\Models\Ciudad;
/** 
 * 
 * Controlador para manejar la lógica relacionada con la población, incluyendo países y ciudades.
 */
class PoblacionController extends Controller
{
    public function index(){
        // Obtener paises 
        $paises = Pais::all();
        return view('poblacion.index', compact('paises'));
    }

    public function getCiudades($pais_id){
        // Obtener ciudades
        $ciudades = Ciudad::where('pais_id', $pais_id)
            ->orderBy('poblacion', 'desc') // Ordenar por población de mayor a menor
            ->get();

        return response()->json($ciudades);
    }
}
