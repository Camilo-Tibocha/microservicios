<?php

namespace App\Http\Controllers;

use App\Models\Tarea;
use Illuminate\Http\Request;

class FiltrarTareaController extends Controller
{
    function index(Request $request)
    {
        $tareas = Tarea::select('fechaEstimadaFinalizacion', 'idPrioridad', 'idEmpleado', 'titulo', 'descripcion')->get();
        $data = ['data' => $tareas];
        return response()->json($data);
    }
}