<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agua extends Model
{
    use HasFactory;

    
    
    protected $table='agua';



    protected $fillable = [


        

        'id_agua',
        'disponibilidad_agua',
        'capacidad_recarga',
        'desempeño_disponibilidad',
        'desempeño_capacidad',
        'promedio_desempeño',
        'id_unidad',


    ];
}
