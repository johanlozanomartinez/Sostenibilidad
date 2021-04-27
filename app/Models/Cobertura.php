<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cobertura extends Model
{
    use HasFactory;


     
    protected $table='cobertura';



    protected $fillable = [

        'id_cobertura',
        'agricola',
        'pecuaria',
        'forestal',
        'totalarea',
        'coberturaAgricola',
        'coberturaPecuaria',
        'coberturaForestal',
        'ponderadoAgricola',
        'ponderadoPecuaria',
        'ponderadoForestal',
        'coberturaVegetal',
        'Desempeño',
        'id_unidad',
    ];
}