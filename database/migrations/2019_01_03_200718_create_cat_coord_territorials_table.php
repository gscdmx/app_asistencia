<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCatCoordTerritorialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cat_coord_territorials', function (Blueprint $table) {
            $table->increments('id');
            $table->string('ct')->nullable();
            $table->string('ct2')->nullable();
            $table->string('sector')->nullable();
            $table->integer('id_alcaldia')->nullable();
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
        Schema::dropIfExists('cat_coord_territorials');
    }
}
