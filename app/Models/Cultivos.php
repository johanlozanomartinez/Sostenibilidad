<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cultivos extends Model
{

    public function get()
    {
        $cultivos = Cultivo::get();
        $cultivosArray[''] = 'Selecciona un Cultivo';
        foreach ($cultivos as $cultivo) {
            $cultivosArray[$cultivo->id] = $cultivo->name;
        }
        return $cultivosArray;
    }
}
