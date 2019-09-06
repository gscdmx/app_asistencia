<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTbAgendasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_agendas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_user'); 
            $table->integer('id_cuadrante')->nullable();
            $table->string('region')->nullable();
            $table->date('fecha')->nullable();
            $table->time('hora_i')->nullable();
            $table->time('hora_f')->nullable();
            $table->string('duracion')->nullable();      
            $table->string('nombre_activad')->nullable();                  
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
        Schema::dropIfExists('tb_agendas');
    }
}
