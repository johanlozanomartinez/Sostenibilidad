<?php

namespace App\Models\permission\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;



    protected $fillable = [
        'name','slug','description','full-access',

    ];

    public function users(){
        return $this->belongsToMany('App\Models\User')->withTimestamps();

    }
}
