<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alimentarias extends Model
{
    use HasFactory;


    protected $fillable = [

        'id_alimentarias',
        'valor_alimentos',
        'no_alimentos',
        'valor',
        'provenientes',
        'desempeño',
        'id_unidad',

          
    ];
}
