<?php

namespace App\Http\Controllers;

use App\Models\Tarea;
use Illuminate\Http\Request;

class ListarTareaController extends Controller
{
    // Este lo voy a usar para listar las tareas por prioridad y fecha estimada de finalizacion.
    function index(Request $request)
    {
        $tareas = Tarea::select('idPrioridad', 'fechaEstimadaFinalizacion')
        ->orderBy('idPrioridad', 'desc')
        ->get();
        $data = ['data' => $tareas];
        return response()->json($data);
    }
}


