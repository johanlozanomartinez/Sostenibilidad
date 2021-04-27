<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Semillas extends Model
{
    use HasFactory;



    
    protected $fillable = [
        
        'id_semillas',
        'semilla_local',
        'semilla_comercial',
        'total_semillas',
        'indice_semillas',
        'desempeño',       
    ];
}
