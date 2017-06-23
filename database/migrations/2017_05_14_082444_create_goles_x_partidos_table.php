<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGolesXPartidosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('goles_x_partidos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('jugador_id')->unsigned();
            $table->foreign('jugador_id')->references('id')->on('jugadores')->onDelete('cascade');
            $table->integer('cantidad');
            $table->integer('partido_id')->unsigned();
            $table->foreign('partido_id')->references('id')->on('partido_x_fechas')->onDelete('cascade');
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
        Schema::dropIfExists('goles_x_partidos');
    }
}
