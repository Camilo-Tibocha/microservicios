<?php

namespace App\Http\Controllers;

use App\Models\Tarea;
use Illuminate\Http\Request;

class TareaController extends Controller
{
    // function show($id)
    // {
    //     $tarea = Tarea::find($id);
    //     $data = ['data' => $contacto];
    //     return response()->json($data);
    // }

    // Lo usaré para crear tareas.
    function store(Request $request)
    {
        $datos = $request->all();
        
        $tarea = new Tarea();
        $tarea->titulo = $datos['titulo'];
        $tarea->descripcion = $datos['descripcion'];
        // $tarea->created_at = $datos['fecha de creacion'];
        // $tarea->updated_at = $datos['fecha de modificacion'];
        $tarea->idEstado = $datos['idEstado'];
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