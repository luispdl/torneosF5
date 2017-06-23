<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Jugador extends Model
{
    protected $table = 'jugadores';
    protected $fillable = ['nombre','foto','telefono','equipo_id','posicion','capitan'];

    public function goles_x_partidos()
    {
    	return $this->hasMany('App\GolesXPartido','jugador_id');
    }

    public function partidos_x_fechas()
    {
    	return $this->hasMany('App\PartidoXFecha','figura_id');
    }

    public function tarjetas()
    {
        return $this->hasMany('App\TarjetaXPartido','jugador_id');
    }

    public function equipo()
    {
        return $this->belongsTo('App\Equipo','equipo_id');
    }

    public function goles()
    {
        $goles = \App\GolesXPartido::where('jugador_id',$this->id)->sum('cantidad');
        return $goles;
    }

    public function tarjetasAmarilla()
    {
        $tarjetas = DB::select('select count(t.id) as tarjetas from tarjeta_x_partidos t
            inner join jugadores j on j.id = t.jugador_id
            where j.id = ? and t.tipo = "amarilla";',[$this->id]);

        return !empty($tarjetas) ? $tarjetas[0]->tarjetas : 0;
        

    }

    public function tarjetasRoja()
    {
        $tarjetas = DB::select('select count(t.id) as tarjetas from tarjeta_x_partidos t
            inner join jugadores j on j.id = t.jugador_id
            where j.id = ? and t.tipo = "roja";',[$this->id]);

        return !empty($tarjetas) ? $tarjetas[0]->tarjetas : 0;

    }

    public function tarjetasAzul()
    {
        $tarjetas = DB::select('select count(t.id) as tarjetas from tarjeta_x_partidos t
            inner join jugadores j on j.id = t.jugador_id
            where j.id = ? and t.tipo = "azul";',[$this->id]);

        return !empty($tarjetas) ? $tarjetas[0]->tarjetas : 0;
    }
}
