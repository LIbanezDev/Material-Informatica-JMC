<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArchivoTemporalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('archivo_temporals', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombre');           
            $table->text('formato');
            $table->string('tipo_evaluacion')->nullable();
            $table->integer('semestre');
            $table->unsignedBigInteger('numero_asignatura'); // Relación con categorias
            $table->foreign('numero_asignatura')->references('id')->on('asignaturas'); // clave foranea
            $table->integer('subido_por_usuario');
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
        Schema::dropIfExists('archivo_temporals');
    }
}
