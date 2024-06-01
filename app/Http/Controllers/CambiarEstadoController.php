<?php

namespace App\Http\Controllers;

use App\Models\Tarea;
use Illuminate\Http\Request;

class CambiarEstadoController extends Controller
{
    // Lo usaré para actualizar los estados.
    function update($id, Request $request)
    {
        $datos = $request->all();
        $tarea = Tarea::find($id);
        $tarea->idEstado = $datos['idEstado'];
        $tarea->save();
        $data = ['data' => $tarea];
        return response()->json($data);
    }
}
