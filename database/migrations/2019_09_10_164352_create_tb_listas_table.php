<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTbListasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_listas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_user'); 
            $table->integer('id_cuadrante')->nullable();
            $table->string('region')->nullable();
            $table->string('turno')->nullable();
            $table->date('fecha')->nullable();
            $table->time('hora_i')->nullable();
            $table->text('num_elementos')->nullable();
            $table->text('num_patrullas')->nullable();
            $table->string('jefe_sector')->nullable();
            $table->text('jefe_cuadrante')->nullable(); 
            $table->text('archivo_imagen')->nullable(); 
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
        Schema::dropIfExists('tb_listas');
    }
}

