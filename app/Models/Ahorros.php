<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ahorros extends Model
{
    use HasFactory;

    protected $fillable = [

        'id_ahorros',
        'sin_prestamo',
        'con_prestamo',
        'total',
        'costo_cubierto',
        'desempeño',
        'id_unidad',


          
    ];
}
