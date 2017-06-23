<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Equipo;
use App\Jugador;

class EstadisticaEquipoController extends Controller
{
    public function index()
    {
    	$equipos = Equipo::all();
    	return view('equipos.index')->with('equipos',$equipos);
    }

    public function show($id){
    	$equipo = Equipo::find($id);
    	$jugadores = Jugador::where('equipo_id',$id)->get();
    	return view('equipos.estadisticas')->with("equipo",$equipo)->with('jugadores',$jugadores);
    }
}
