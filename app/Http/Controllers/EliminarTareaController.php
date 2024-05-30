<?php

namespace App\Http\Controllers;

use App\Models\Tarea;
use Illuminate\Http\Request;

class EliminarTareaController extends Controller
{
    // Este lo uso para eliminar las tareas (Si no se encuentra la tarea mandará el error 404).
    function destroy($id)
    {
        $tarea = Tarea::find($id);
        if (empty($tarea)) {
            $data = ['data' => 'No se encuentra registrada la tarea'];
            return response()->json($data, 404);
        }
        $tarea->delete();
        $data = ['data' => 'Datos eliminados'];
        return response()->json($data);
    }
}