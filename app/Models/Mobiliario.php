<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mobiliario extends Model
{
    use HasFactory;
    protected $table = 'mobiliario';
    protected $primaryKey = 'id';
    protected $fillable = ['mesas_maximas','mesas_disponibles'];
    public $timestamps = false;
}