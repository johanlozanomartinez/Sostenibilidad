<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Riquezas extends Model
{
    use HasFactory;


     
    protected $fillable = [

        'id_riquezas',
        'cantidad',
        'abundancia',
        'log',
        'pi',
        'biodiversidad',
        'id_unidad',
        'id_especies',



    ];
}


