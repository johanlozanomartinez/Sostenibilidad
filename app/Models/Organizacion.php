<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Organizacion extends Model
{
    use HasFactory;


    protected $fillable = [

        'id_participacion',
        'asociacion_municipio',
        'asociacion_participa',
        'participacion',
        'desempeño',
        'id_unidad',



    ];
}
