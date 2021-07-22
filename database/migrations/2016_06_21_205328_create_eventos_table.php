<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateEventosTable extends Migration

{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()

    {
        Schema::create('eventos', function (Blueprint $table) {

            $table->increments('id');
            $table->string('evento');
            $table->string('organizador');
            $table->date('fecha');
            $table->string('estado')->default('activo');
            $table->string('color');
            $table->string('apellidonombre');
            $table->string('email');
            $table->string('telefono');
            $table->text('objetivos');
            $table->text('destinatarios');
            $table->integer('asistentes');
            $table->boolean('catering')->default('0');
            $table->string('log');
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
        Schema::drop('eventos');
    }
}