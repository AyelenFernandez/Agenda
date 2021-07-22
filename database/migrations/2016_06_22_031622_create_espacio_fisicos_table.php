<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateEspacioFisicosTable extends Migration

{

    /**
     * Run the migrations.
     *
     * @return void
     */

    public function up()

    {
        Schema::create('espacio_fisicos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('esp_fisico');
            $table->string('ubicacion');
            $table->integer('capacidad');
            $table->text('recursos');
            $table->boolean('estado')->default('1');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()

    {
        Schema::drop('espacio_fisicos');
    }
}