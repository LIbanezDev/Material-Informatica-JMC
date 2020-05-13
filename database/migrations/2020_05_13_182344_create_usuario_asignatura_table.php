<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsuarioAsignaturaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuario_asignatura', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('asignatura_id'); // Relación con libros
            $table->foreign('asignatura_id')->references('id')->on('asignaturas'); // clave foranea
            $table->unsignedBigInteger('user_id'); // Relación con etiquetas
            $table->foreign('user_id')->references('id')->on('users'); // clave foranea
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
        Schema::dropIfExists('usuario_asignatura');
    }
}
