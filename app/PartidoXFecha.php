<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PartidoXFecha extends Model
{
    protected $table = 'partido_x_fechas';
    protected $fillable = ['fecha_id','equipo1_id','equipo2_id','figura_id'];

    public function equipo1()
    {
    	return $this->belongsTo('App\Equipo','equipo1_id');
    }

    public function equipo2()
    {
    	return $this->belongsTo('App\Equipo','equipo2_id');
    }

    public function fecha()
    {
    	return $this->belongsTo('App\Fecha','fecha_id');
    }

    public function figura()
    {
    	return $this->belongsTo('App\Jugador','figura_id');
    }

    public function tarjetas_x_partido()
    {
    	return $this->hasMany('App\PartidoXFecha','partido_id');
    }

    public function goles()
    {
    	return $this->hasMany('App\GolesXPartido','partido_id');
    }
}
