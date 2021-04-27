<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Calidades extends Model
{
    use HasFactory;


   
    protected $fillable = [

        'id_calidades',
        'valor',
        'desempeño',
        'id_unidad',
        'id_caracteristicas',



    ];






}
