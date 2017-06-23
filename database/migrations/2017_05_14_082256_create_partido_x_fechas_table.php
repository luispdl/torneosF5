<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePartidoXFechasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('partido_x_fechas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('fecha_id')->unsigned();
            $table->foreign('fecha_id')->references('id')->on('fechas');
            $table->integer('equipo1_id')->unsigned();
            $table->foreign('equipo1_id')->references('id')->on('equipos')->onDelete('cascade'); 
            $table->integer('equipo2_id')->unsigned();
            $table->foreign('equipo2_id')->references('id')->on('equipos')->onDelete('cascade');
            $table->integer('figura_id')->unsigned()->nullable();
            $table->foreign('figura_id')->references('id')->on('jugadores')->onDelete('cascade');
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
        Schema::dropIfExists('partido_x_fechas');
    }
}
