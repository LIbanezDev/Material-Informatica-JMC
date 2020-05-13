<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Asignatura extends Model
{
    public function users(){
        return $this->belongsToMany(User::class); // Muchos a muchos
    }
}
