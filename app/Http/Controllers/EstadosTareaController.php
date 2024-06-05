<?php

namespace App\Http\Controllers;

use App\Models\Tarea;
use Illuminate\Http\Request;

class EstadosTareaController extends Controller
{
    // Este lo usé para agrupar las tareas por estado.
    function index(Request $request)
    {
        $tareas = Tarea::all();
        $tareasAgrupadas = $tareas->groupBy('idEstado');
        $data = ['data' => $tareasAgrupadas];
        return response()->json($data);
    }
}