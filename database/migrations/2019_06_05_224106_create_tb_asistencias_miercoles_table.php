<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTbAsistenciasMiercolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_asistencias_miercoles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('id_ct')->nullable();
            $table->string('se_realizo')->nullable();
            $table->string('no_motivo')->nullable();
            $table->date('fecha')->nullable();
            $table->time('hora_i')->nullable();
            $table->time('hora_f')->nullable();
            $table->text('jg')->nullable();
            $table->text('mp')->nullable();
            $table->text('jsp')->nullable();
            $table->text('jspi')->nullable();
            $table->text('jc')->nullable();
            $table->text('ml')->nullable();
            $table->text('representante_alcaldia')->nullable();
            $table->text('otro')->nullable();
            $table->text('ins')->nullable();
             $table->text('vecino')->nullable();
            $table->integer('user_registro')->nullable();
            

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
        Schema::dropIfExists('tb_asistencias_miercoles');
    }
}
