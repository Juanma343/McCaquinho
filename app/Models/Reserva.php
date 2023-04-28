<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reserva extends Model
{
    use HasFactory;
    protected $table = 'reserva';
    protected $fila = ['id','nombre', 'telefono', 'num_comensales', 'fecha', 'observaciones'];
}
