<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Unidad extends Model
{
    use HasFactory;


    protected $table='unidad';


    protected $fillable = [
        
        'nombre_representante',
        'nombre_finca',
        'municipio',
        'vereda',
        'celular',
        'ingresos',
        'Egresos',
    ];
}
