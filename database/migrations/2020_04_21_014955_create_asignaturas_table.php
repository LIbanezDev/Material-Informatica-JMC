<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAsignaturasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('asignaturas', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('sigla')->unique();
            $table->integer('creditos');
            $table->integer('horas_practicas');
            $table->integer('horas_teoricas');
            $table->integer('dia_bloque'); // formato "1-7:dia _ 1-17:bloque"
            $table->string('profesor');     
            $table->text('departamento');
            $table->integer('semestre');
            $table->string('imagen');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('asignaturas');
    }
}
