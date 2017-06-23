<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jugador;
use Illuminate\Support\Facades\DB;

class TarjetaController extends Controller
{
    public function index($torneo_id)
    {

    	$jugadores = Jugador::orderBy('equipo_id','ASC')->get();
		return view('tarjetas')->with('jugadores',$jugadores);  
    }
}
