<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dependencia extends Model
{
    use HasFactory;

    
    protected $fillable = [

        'id_dependencias',
        'costo_interno',
        'costo_externo',
        'total',
        'dependencia',
        'desempeño',
        'id_unidad',



    ];

}



