<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTbCuestionariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_cuestionarios', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_user');
            $table->text('direccion')->nullable();
            $table->string('colonia')->nullable();
            $table->integer('id_cuadrante')->nullable();
            $table->string('servicio_policia')->nullable();
            $table->string('hace_cuanto')->nullable();
            $table->text('motivo')->nullable();
            $table->string('medio_llamo_policia')->nullable();
            $table->string('contestaron')->nullable();
            $table->string('veces_en_llamar')->nullable();
            $table->string('tiempo_contestar')->nullable();
            $table->string('tiempo_llegada')->nullable();
            $table->string('atencion')->nullable();
            $table->text('resolvio_problema')->nullable();
            $table->string('conoce_cuadrante')->nullable();
            $table->string('conoce_jc')->nullable();
            $table->text('califica_seguridad_calle')->nullable();
            $table->string('realizo_denuncia')->nullable();
            $table->text('descripcion_denuncia')->nullable();
            $table->text('comentarios')->nullable();
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
        Schema::dropIfExists('tb_cuestionarios');
    }
}
