<?php



use Illuminate\Database\Migrations\Migration;

use Illuminate\Database\Schema\Blueprint;



class CreateFechasTable extends Migration

{

    /**
     * Run the migrations.
     *
     * @return void
     */

    public function up()

    {

        Schema::create('fechas', function (Blueprint $table) {

            $table->increments('id');
            $table->time('Entrada');
            $table->time('Salida');
            $table->integer('evento_id')->unsigned();
            $table->foreign('evento_id')->references('id')->on('eventos')->onDelete('CASCADE');
            $table->integer('espaciofisico_id')->unsigned();
            $table->foreign('espaciofisico_id')->references('id')->on('espacio_fisicos');
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
        Schema::drop('fechas');
    }
}