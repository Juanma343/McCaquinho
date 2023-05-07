<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Platos extends Model
{
    use HasFactory;
    
    protected $table = 'plato';
    protected $primaryKey = 'id';
    protected $fillable = ['nombre','descripcion', 'precio','url_foto', 'plato_eliminado'];
    public $timestamps = false;
    // por defecto, la clave primaria es id y autoincremental

}