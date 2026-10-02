<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vehiculo extends Model
{
    protected $fillable = [
        'marca',
        'placa',
        'color',
        'modelo',
        'fecha_compra',
        'accidente',
    ];
}