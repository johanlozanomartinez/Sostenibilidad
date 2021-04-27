<?php

namespace App\Services;

use App\Cultivo;

class Cultivos
{
    public function get()
    {
        $cultivos = Cultivos::get();
        $cultivosArray[''] = 'Selecciona un cultivo';
        foreach ($cultivos as $cultivo) {
            $cultivosArray[$cultivo->id] = $cultivo->name;
        }
        return $cultivosArray;
    }
}