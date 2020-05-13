<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Archivo extends Model
{
    public function asignatura(){ 
        return $this->belongsTo(Asignatura::class); //Pertenece a una asignatura.
    }
}
