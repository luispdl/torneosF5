<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\Jugador;

class Equipo extends Model
{

	protected $table = 'equipos';
	protected $fillable = ['nombre','escudo','fecha','zona_id'];

    public function jugadores()
    {
    	return $this->hasMany('App\Jugador','equipo_id');
    }

    public function partidos_x_fecha_equipo1()
    {
    	return $this->hasMany('App\PartidoXFecha','equipo1_id');
    }

    public function partidos_x_fecha_equipo2()
    {
    	return $this->hasMany('App\PartidoXFecha','equipo2_id');
    }

    public function zona()
    {
    	return $this->belongsTo('App\Zona','zona_id');
    }

    public function puntaje()
    {

        return $puntaje = $this->partidosGanados()*2 + $this->partidosEmpatados();

    }

    public function partidosGanados()
    {
        $partidos_ganados = 0;

        $partidos_con_goles = DB::table('goles_x_partidos')->select('partido_id')->distinct()
        ->join('jugadores','jugadores.id','=','goles_x_partidos.jugador_id')
        ->where('jugadores.equipo_id','=',$this->id)->get();

        foreach ($partidos_con_goles as $key => $partido) {
            $equipo1[] = DB::select('select * from partido_x_fechas where id=? 
                and (equipo1_id =? or equipo2_id=?)',[$partido->partido_id,$this->id,$this->id]);
        }
        if(isset($equipo1)){
            foreach ($equipo1 as $key => $eq) {

               $goles[] =  DB::select('select * from (select sum(cantidad) as goles1,g.partido_id from goles_x_partidos g
                inner join partido_x_fechas p on g.partido_id = p.id
                inner join jugadores j on j.id = g.jugador_id
                inner join equipos e1 on e1.id = p.equipo1_id
                inner join equipos e2 on e2.id = p.equipo2_id
                where g.partido_id = ? and j.equipo_id = ? group by g.partido_id) as t1 
                inner join (select sum(cantidad) as goles2, g.partido_id from goles_x_partidos g
                inner join partido_x_fechas p on g.partido_id = p.id
                inner join jugadores j on j.id = g.jugador_id
                inner join equipos e1 on e1.id = p.equipo1_id
                inner join equipos e2 on e2.id = p.equipo2_id
                and j.equipo_id != ? group by g.partido_id) as t2 on t1.partido_id = t2.partido_id;'
                ,[$eq[0]->id,$this->id,$this->id]);
            }


            foreach ($goles as $key => $gol) {
                if($gol[0]->goles1>$gol[0]->goles2){
                    $partidos_ganados++; 
                } 
            }
        }
        return $partidos_ganados;
    }

    public function partidosPerdidos()
    {
        $partidos_perdidos = 0;

        $partidos_con_goles = DB::table('goles_x_partidos')->select('partido_id')->distinct()
        ->join('jugadores','jugadores.id','=','goles_x_partidos.jugador_id')
        ->where('jugadores.equipo_id','=',$this->id)->get();

        foreach ($partidos_con_goles as $key => $partido) {
            $equipo1[] = DB::select('select * from partido_x_fechas where id=? 
                and (equipo1_id =? or equipo2_id=?)',[$partido->partido_id,$this->id,$this->id]);
        }
        if(isset($equipo1)){
            foreach ($equipo1 as $key => $eq) {

               $goles[] =  DB::select('select * from (select sum(cantidad) as goles1,g.partido_id from goles_x_partidos g
                inner join partido_x_fechas p on g.partido_id = p.id
                inner join jugadores j on j.id = g.jugador_id
                inner join equipos e1 on e1.id = p.equipo1_id
                inner join equipos e2 on e2.id = p.equipo2_id
                where g.partido_id = ? and j.equipo_id = ? group by g.partido_id) as t1 
                inner join (select sum(cantidad) as goles2, g.partido_id from goles_x_partidos g
                inner join partido_x_fechas p on g.partido_id = p.id
                inner join jugadores j on j.id = g.jugador_id
                inner join equipos e1 on e1.id = p.equipo1_id
                inner join equipos e2 on e2.id = p.equipo2_id
                and j.equipo_id != ? group by g.partido_id) as t2 on t1.partido_id = t2.partido_id;'
                ,[$eq[0]->id,$this->id,$this->id]);
            }


            foreach ($goles as $key => $gol) {
                if($gol[0]->goles1<$gol[0]->goles2){
                    $partidos_perdidos++; 
                } 
            }
        }

        return $partidos_perdidos;
    }

    public function partidosEmpatados()
    {
        $partidos_empatados = 0;

        $partidos_con_goles = DB::table('goles_x_partidos')->select('partido_id')->distinct()
        ->join('jugadores','jugadores.id','=','goles_x_partidos.jugador_id')
        ->where('jugadores.equipo_id','=',$this->id)->get();

        foreach ($partidos_con_goles as $key => $partido) {
            $equipo1[] = DB::select('select * from partido_x_fechas where id=? 
                and (equipo1_id =? or equipo2_id=?)',[$partido->partido_id,$this->id,$this->id]);
        }
        if(isset($equipo1)){
            foreach ($equipo1 as $key => $eq) {

               $goles[] =  DB::select('select * from (select sum(cantidad) as goles1,g.partido_id from goles_x_partidos g
                inner join partido_x_fechas p on g.partido_id = p.id
                inner join jugadores j on j.id = g.jugador_id
                inner join equipos e1 on e1.id = p.equipo1_id
                inner join equipos e2 on e2.id = p.equipo2_id
                where g.partido_id = ? and j.equipo_id = ? group by g.partido_id) as t1 
                inner join (select sum(cantidad) as goles2, g.partido_id from goles_x_partidos g
                inner join partido_x_fechas p on g.partido_id = p.id
                inner join jugadores j on j.id = g.jugador_id
                inner join equipos e1 on e1.id = p.equipo1_id
                inner join equipos e2 on e2.id = p.equipo2_id
                and j.equipo_id != ? group by g.partido_id) as t2 on t1.partido_id = t2.partido_id;'
                ,[$eq[0]->id,$this->id,$this->id]);
            }


            foreach ($goles as $key => $gol) {
                if($gol[0]->goles1==$gol[0]->goles2){
                    $partidos_empatados++; 
                } 
            }
        }

        return $partidos_empatados;
    }

    public function golesAFavor()
    {

        $cantidad_goles = DB::select('select sum(cantidad) as goles from goles_x_partidos g
            inner join jugadores j on j.id = g.jugador_id
            inner join equipos e on j.equipo_id = e.id
            where e.id = ?',[$this->id]);

        if(empty($cantidad_goles) or !isset($cantidad_goles[0]->goles)){
            return 0;
        }
        return (int) $cantidad_goles[0]->goles;

    }

    public function golesEnContra()
    {

        $cantidad_goles = DB::select('select sum(cantidad) as goles from goles_x_partidos g 
            inner join partido_x_fechas p on g.partido_id = p.id
            inner join equipos e on p.equipo1_id = e.id or p.equipo2_id = e.id
            inner join jugadores j on j.id = g.jugador_id
            where j.equipo_id !=? and (e.id = ? )
            group by e.id',[$this->id,$this->id]);


        return !empty($cantidad_goles) ? (int)$cantidad_goles[0]->goles : 0;
        
    }

    public function diferenciaDeGol()
    {
        return $this->golesAFavor() - $this->golesEnContra();
    }

    public function golesDelPartido($partido_id)
    {
        $cantidad_goles = DB::select('select sum(cantidad) as goles from goles_x_partidos g
            inner join jugadores j on j.id= g.jugador_id
            where g.partido_id = ?
            and j.equipo_id = ?;',[$partido_id,$this->id]);

       return !empty($cantidad_goles) ? $cantidad_goles[0]->goles : 0;
    }

    public function partidosJugados()
    {
        $cantidad_de_partidos = DB::select('select count(*) as cant_partidos from partido_x_fechas p
            inner join equipos e on e.id = p.equipo1_id or e.id = p.equipo2_id
            where e.id = ? and jugado = 1;',[$this->id]);

        return $cantidad_de_partidos[0]->cant_partidos;
    }

    public function posicion()
    {
        $zona = Zona::find($this->zona_id);
        $equipos = $zona->posiciones();
        foreach ($equipos as $key => $equipo) {
            if($equipo->nombre == $this->nombre){
                return ($key + 1);
            }
        }
    }

    public function arquero()
    {
        $arquero = Jugador::where('posicion','arquero')->where('equipo_id',$this->id)->first();
        return $arquero;
    }
}
