<?php

namespace App\Http\Controllers;

use App\Models\Tarea;
use Illuminate\Http\Request;

class ActualizarTareaController extends Controller
{
    // Lo usaré para actualizar los registros.
    function update($id, Request $request)
    {
        $datos = $request->all();
        $tarea = Tarea::find($id);
        $tarea->titulo = $datos['titulo'];
        $tarea->descripcion = $datos['descripcion'];
        $tarea->idEstado = $datos['estado'];
        $tarea->fechaEstimadaFinalizacion = $datos['fecha estimada de finalizacion'];
        $tarea->creadorTarea = $datos['creador de la tarea'];
        $tarea->idEmpleado = $datos['responsable de la tarea'];
        $tarea->idPrioridad = $datos['prioridad'];
        $tarea->observaciones = $datos['observaciones'];
        $tarea->save();
        $data = ['data' => $tarea];
        return response()->json($data);
    }
}



