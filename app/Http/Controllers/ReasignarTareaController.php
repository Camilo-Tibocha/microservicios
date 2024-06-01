<?php

namespace App\Http\Controllers;

use App\Models\Tarea;
use Illuminate\Http\Request;

class ReasignarTareaController extends Controller
{
    // Lo usaré para reasignar la tarea a otro responsable.
    function update($id, Request $request)
    {
        $datos = $request->all();
        $tarea = Tarea::find($id);
        $tarea->idEmpleado = $datos['responsable de la tarea'];
        $tarea->save();
        $data = ['data' => $tarea];
        return response()->json($data);
    }
}