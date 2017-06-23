<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TarjetaXPartido extends Model
{
    protected $table = 'tarjeta_x_partidos';
    protected $fillable = ['jugador_id','partido_id'];

    public function partido(){
    	return $this->belongsTo('App\PartidoXFecha','partido_id');
    }

    public function jugador()
    {
    	return $this->belongsTo('App\Jugador','jugador_id');
    }
}
