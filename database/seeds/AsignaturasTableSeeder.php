<?php

use Illuminate\Database\Seeder;
use App\Asignatura;
use App\Semestre;

class AsignaturasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    
        $asignatura = new Asignatura();
        $asignatura->nombre = "Elementos de la Matemática";
        $asignatura->semestre = 1;
        $asignatura->save();

        $asignatura = new Asignatura();
        $asignatura->nombre = "Inglés I";
        $asignatura->semestre = 1;
        $asignatura->save();

        $asignatura = new Asignatura();
        $asignatura->nombre = "Educación Física";
        $asignatura->semestre = 1;
        $asignatura->save();

        $asignatura = new Asignatura();
        $asignatura->nombre = "Análisis de Sistemas de Información";
        $asignatura->semestre = 1;
        $asignatura->save();

        $asignatura = new Asignatura();
        $asignatura->nombre = "Programación";
        $asignatura->semestre = 1;
        $asignatura->save();

        $asignatura = new Asignatura();
        $asignatura->nombre = "Introducción a la Informática y Computación";
        $asignatura->semestre = 1;
        $asignatura->save();

        // Semestre 2
        $asignatura = new Asignatura();
        $asignatura->nombre = "Matemática Aplicada";
        $asignatura->semestre = 2;
        $asignatura->save();

        $asignatura = new Asignatura();
        $asignatura->nombre = "Inglés II";
        $asignatura->semestre = 2;
        $asignatura->save();

        $asignatura = new Asignatura();
        $asignatura->nombre = "Análisis y Diseño Orientado a Objeto";
        $asignatura->semestre = 2;
        $asignatura->save();

        $asignatura = new Asignatura();
        $asignatura->nombre = "Diseño de Sistemas de Información";
        $asignatura->semestre = 2;
        $asignatura->save();

        $asignatura = new Asignatura();
        $asignatura->nombre = "Estructuras de Datos";
        $asignatura->semestre = 2;
        $asignatura->save();

        $asignatura = new Asignatura();
        $asignatura->nombre = "Programación Orientada a Evento";
        $asignatura->semestre = 2;
        $asignatura->save();

        // Semestre 3
        $asignatura = new Asignatura();
        $asignatura->nombre = "Taller de Sistemas de Información I";
        $asignatura->semestre = 3;
        $asignatura->save();

        $asignatura = new Asignatura();
        $asignatura->nombre = "Inglés III";
        $asignatura->semestre = 3;
        $asignatura->save();

        $asignatura = new Asignatura();
        $asignatura->nombre = "Programación Orientada a Objeto";
        $asignatura->semestre = 3;
        $asignatura->save();

        $asignatura = new Asignatura();
        $asignatura->nombre = "Diseño y Programación Orientada a la Web";
        $asignatura->semestre = 3;
        $asignatura->save();

        $asignatura = new Asignatura();
        $asignatura->nombre = "Bases de Datos";
        $asignatura->semestre = 3;
        $asignatura->save();

        $asignatura = new Asignatura();
        $asignatura->nombre = "Arquitectura y organización de Computadores";
        $asignatura->semestre = 3;
        $asignatura->save();

        $asignatura = new Asignatura();
        $asignatura->nombre = "Taller de Sistemas de Información II";
        $asignatura->semestre = 4;
        $asignatura->save();

        $asignatura = new Asignatura();
        $asignatura->nombre = "Humanidades";
        $asignatura->semestre = 4;
        $asignatura->save();

        $asignatura = new Asignatura();
        $asignatura->nombre = "Desarrollo de Aplicaciones Móviles";
        $asignatura->semestre = 4;
        $asignatura->save();

        $asignatura = new Asignatura();
        $asignatura->nombre = "Taller de desarrollo de Software";
        $asignatura->semestre = 4;
        $asignatura->save();

        $asignatura = new Asignatura();
        $asignatura->nombre = "Sistemas Operativos";
        $asignatura->semestre = 4;
        $asignatura->save();       
    }
}
