<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GolesXPartido extends Model
{
    protected $table = 'goles_x_partidos';
    protected $fillable = ['jugador_id','cantidad','partido_id'];

    public function jugadores()
    {
    	return $this->belongsTo('App\Jugador','jugador_id');
    }

    public function partido()
    {	
    	return $this->belongsTo('App\PartidoXFecha','partido_id');
    }

}
