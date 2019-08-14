<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTbMinisteriosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_ministerios', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_user'); 
            $table->string('mp_visitado')->nullable();
            $table->date('fecha')->nullable();
            $table->time('hora_i')->nullable();
            $table->time('hora_f')->nullable();
            $table->string('ciudadanos_esperando')->nullable();
            $table->string('cuantos')->nullable();
            $table->string('tiempo')->nullable();
            $table->string('desalentando_policia')->nullable();
            $table->string('desalentado_servidor')->nullable();
            $table->string('trato')->nullable();
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
        Schema::dropIfExists('tb_ministerios');
    }
}
