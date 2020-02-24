<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePasecoordinadorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pasecoordinadors', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_user'); 
            $table->integer('id_cuadrante')->nullable();
            $table->string('region')->nullable();
            $table->string('nombre')->nullable();
            $table->date('fecha')->nullable();
            $table->time('hora_i')->nullable();
            $table->text('procedencia')->nullable();
            $table->text('asunto')->nullable();
            $table->string('telefono')->nullable();
            $table->string('direccion')->nullable(); 
            $table->text('correo')->nullable(); 
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
        Schema::dropIfExists('pasecoordinadors');
    }
}
