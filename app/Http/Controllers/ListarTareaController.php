<?php

namespace App\Http\Controllers;

use App\Models\Tarea;
use Illuminate\Http\Request;

class ListarTareaController extends Controller
{
    // Este lo voy a usar para listar las tareas por prioridad y fecha estimada de finalizacion.
    function index(Request $request)
    {
        $tareas = Tarea::query()
            ->where('fechaEstimadaFinalizacion', $request->fecha_fin)
            ->where('idPrioridad', $request->prioridad)
            ->whereHas('empleado', function ($query) use ($request) {
                $query->where('id', $request->empleado_id);
            })
            ->orderBy('idPrioridad', 'asc')
            ->orderBy('fechaEstimadaFinalizacion', 'asc')
            ->get();

        return response()->json([
            'tareas' => $tareas
        ]);
    }
}


