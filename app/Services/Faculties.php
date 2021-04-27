<?php

namespace App\Services;

use App\Faculty;

class Faculties
{
    public function get()
    {
        $faculties = Faculty::get();
        $facultiesArray[''] = 'Selecciona una facultad';
        foreach ($faculties as $faculty) {
            $facultiesArray[$faculty->id] = $faculty->name;
        }
        return $facultiesArray;
    }
}