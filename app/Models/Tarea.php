<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tarea extends Model{
    protected $table = 'tareas';
    //public $timestamps = true; // se deja en true el timestamps para que me muestre la fecha y hora en la que se crea el registro.
}