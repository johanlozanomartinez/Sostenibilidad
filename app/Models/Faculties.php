<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Faculty;

class Faculties extends Model
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