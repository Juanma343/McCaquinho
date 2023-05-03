<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Platos extends Model
{
    use HasFactory;

    protected $table = "plato"; // por defecto toma el nombre de la base de datos del nombre de la clase. En este caso lo sobreescribimos
    
    // por defecto, la clave primaria es id y autoincremental

}
