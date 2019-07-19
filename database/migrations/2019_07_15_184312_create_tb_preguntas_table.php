<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTbPreguntasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_preguntas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_user'); 
            $table->integer('id_cuadrante')->nullable();
            $table->string('region')->nullable();
            $table->text('nombre_rjg')->nullable();
            $table->date('fecha')->nullable();
            $table->time('hora_i')->nullable();
            $table->time('hora_f')->nullable();
            $table->string('calle')->nullable();
            $table->string('numero')->nullable();
            $table->string('colonia')->nullable();   
            $table->string('servicio_policia')->nullable();
            $table->string('acudio')->nullable();
            $table->string('conoce_jc')->nullable();
            $table->string('conoce_app')->nullable();          
            $table->string('llamarjefe_respondio')->nullable();
            $table->string('acudio_jefe')->nullable();
            $table->string('tiempo_acudio')->nullable();
            $table->text('nombre')->nullable();
            $table->text('telefono')->nullable();
            $table->string('tiempo_llegada')->nullable();
            $table->string('firma')->nullable();           
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
        Schema::dropIfExists('tb_preguntas');
    }
}
