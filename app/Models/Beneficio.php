<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Beneficio extends Model
{
    use HasFactory;




    
    protected $table='beneficio';



    protected $fillable = [

        'id_beneficio',
        'ingreso',
        'Egresos',
        'vpningresos',
        'vpnegresos',
        'BC',
        'Desempeño',
        'id_unidad',


    ];
}
