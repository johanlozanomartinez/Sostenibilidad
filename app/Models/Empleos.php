<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empleos extends Model
{
    use HasFactory;

    
    protected $fillable = [

        'id_empleos',
        'empleo_familias',
        'empleo_externos',
        'total_empleos',
        'empleoFamiliar',
        'desempeño',
        
        


    ];
}
