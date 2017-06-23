<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Equipo;

class Zona extends Model
{
    protected $table = 'zonas';
    protected $fillable = ['nombre','torneo_id'];

    public function torneo()
    {
    	return $this->belongsTo('App\Torneo','torneo_id');
    }
    public function equipos()
    {
    	return $this->hasMany('App\Equipo','zona_id');
    }

    public function posiciones()
    {
        $equipos = Equipo::where('zona_id',$this->id)->get();

        foreach ($equipos as $key => $equipo) {
            $equipo->puntaje = $equipo->puntaje();
            $equipo->golesAFavor = $equipo->golesAFavor();
            $equipo->golesEnContra = $equipo->golesEnContra();
            $equipo->diferenciaDeGol = $equipo->diferenciaDeGol();
            $equipo->partidos_jugados = $equipo->partidosJugados();
            $equipos_aux[] = $equipo;
        }
        if(isset($equipos_aux)){
            usort($equipos_aux,function($a,$b){
                if ($b->puntaje == $a->puntaje){
                    if($b->diferenciaDeGol == $a->diferenciaDeGol){
                        return $b->golesAFavor - $a->golesAFavor;
                    } else {
                        return $b->diferenciaDeGol -$a->diferenciaDeGol;    
                    }
                    
                } else{
                    return $b->puntaje - $a->puntaje;    
                }
                
            });
        }

        return $equipos_aux;
    }
    
}
