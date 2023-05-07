<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reserva extends Model
{
    use HasFactory;
    protected $table = 'reserva';
    protected $primaryKey = 'id';
    protected $fillable = ['nombre','telefono', 'num_comensales','mesas', 'timestamp', 'observaciones'];
    public $timestamps = false;
}