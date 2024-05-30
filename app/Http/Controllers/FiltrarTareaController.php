<?php

namespace App\Http\Tarea;

use App\Models\Tarea;
use Illuminate\Http\Request;

class FiltrarTareaController extends Controller
{
    function index(Request $request)
    {
        $query = Tarea::query();

        // Filtrar por fecha estimada de finalización
        if ($request->has('fecha_fin')) {
            $query->where('fechaEstimadaFinalizacion', $request->fecha_fin);
        }

        // Filtrar por prioridad
        if ($request->has('prioridad')) {
            $query->where('idPrioridad', $request->prioridad);
        }

        // Filtrar por empleado responsable
        if ($request->has('empleado_id')) {
            $query->whereHas('empleado', function ($q) use ($request) {
                $q->where('id', $request->empleado_id);
            });
        }

        // Filtrar por título o descripción
        if ($request->has('busqueda')) {
            $query->where(function ($q) use ($request) {
                $q->where('titulo', 'like', '%' . $request->busqueda . '%')
                  ->orWhere('descripcion', 'like', '%' . $request->busqueda . '%');
            });
        }

        $tareas = $query->orderBy('idPrioridad', 'asc')
                        ->orderBy('fechaEstimadaFinalizacion', 'asc')
                        ->get();

        return response()->json([
            'tareas' => $tareas
        ]);
    }
}