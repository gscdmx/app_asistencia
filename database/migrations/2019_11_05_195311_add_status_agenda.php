<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddStatusAgenda extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //SE REALIZA MIGRACION A UNA TABLA EXISTENTE AGREGANDO LOS CAMPOS QUE SE DESEEN 
         Schema::table('tb_agendas', function (Blueprint $table) {
            $table->boolean('status')->default('true');
        });


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
