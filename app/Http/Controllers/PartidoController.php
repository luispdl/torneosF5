<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PartidoXFecha;
use App\Equipo;
use App\Zona;
use App\Fecha;
use App\Torneo;
use App\Jugador;
use App\GolesXPartido;
use App\TarjetaXPartido;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

class PartidoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($zona_id)
    {

        $route = Route::current();
        $cantidad_equipos = count(Equipo::where('zona_id',$zona_id)->get());
        $cantidad_paginas = $cantidad_equipos/2*3;

        $partidos = DB::table('partido_x_fechas')
        ->join('equipos as e1','equipo1_id','=','e1.id')
        ->join('equipos as e2','equipo2_id','=','e2.id')
        ->join('fechas','fechas.id','=','fecha_id')
        ->where('e1.zona_id','=',$zona_id)
        ->where('e2.zona_id','=',$zona_id)
        ->select('partido_x_fechas.id as id','fecha_id','fechas.nombre as fecha','e1.nombre as equipo1','e1.id as equipo1_id','e1.escudo as equipo1_escudo','e2.nombre as equipo2','e2.id as equipo2_id','e2.escudo as equipo2_escudo')
        ->distinct()->orderBy('fecha_id','ASC')->paginate($cantidad_paginas);

        

        $cantidad_fechas = $cantidad_equipos - 1;

        $equipos = Equipo::all();
        
        if($route->uri=='admin/partidos/{zona_id}'){
            return view('admin.partidos.index')->with('partidos',$partidos)->with('cantidad_equipos',$cantidad_equipos)->with('equipos',$equipos);    
        } else {
            if($route->uri=='fixture/{zona_id}'){
                return view('fixture')->with('partidos',$partidos)->with('cantidad_equipos',$cantidad_equipos)->with('equipos',$equipos);
            }
        }
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function fixture($torneo_id){
        $zonas = Zona::where('torneo_id',$torneo_id)->get();
        $fixture = array();
        $cantidad_equipos = count($zonas["0"]->equipos()->get());
        $torneo_id = $zonas["0"]->torneo["id"];
        $cantidad_fechas = $cantidad_equipos -1;

        for ($i=0; $i < $cantidad_fechas; $i++) { 
            $fecha = new Fecha();
            $fecha->nombre = "Fecha ". ($i+1);
            $fecha->torneo_id = $torneo_id;
            $fecha->save();
        }

           // Generate the fixtures using the cyclic algorithm.
        $partidosXFecha = $cantidad_equipos / 2;
        $rounds = array();
        $fechas = Fecha::all();
        for ($i = 0; $i < $cantidad_fechas; $i++) {
            $rounds[$i] = array();
        }
        $partidos =array();
        foreach ($zonas as $key => $zona) {
            $round= 0;
            foreach ($fechas as $key => $fecha) {
                 # code...
                for ($match = 0; $match < $partidosXFecha; $match++) {
                    $home = ($round + $match) % ($cantidad_equipos - 1);
                    $away = ($cantidad_equipos - 1 - $match + $round) % ($cantidad_equipos - 1);
                    // Last team stays in the same place while the others
                    // rotate around it.
                    if ($match == 0) {
                        $away = $cantidad_equipos - 1;
                    }
                    $rounds[$round][$match][] = $zona->equipos()->get()[$home]["id"];
                    $rounds[$round][$match][] = $zona->equipos()->get()[$away]["id"];
                    $partido = new PartidoXFecha();
                    $partido->fecha_id = $fecha->id;
                    $partido->equipo1_id = $zona->equipos()->get()[$home]["id"];
                    $partido->equipo2_id = $zona->equipos()->get()[$away]["id"];

                    $partido->save();

                }

                $round++;

                
            }

            $partidos[]= $rounds;
        }

        return redirect('admin/torneos');
       
    }

    public function resultados($partido_id,$equipo1_id,$equipo2_id)
    {
        $equipo1 = Equipo::find($equipo1_id);
        $equipo2 = Equipo::find($equipo2_id);
        $jugadores1 = Jugador::where('equipo_id',$equipo1_id)->get();
        $jugadores2 = Jugador::where('equipo_id',$equipo2_id)->get();

        return view('admin.partidos.resultados',['jugadores1'=>$jugadores1,'equipo1'=>$equipo1,'equipo2'=>$equipo2,'jugadores2'=>$jugadores2,'partido_id'=>$partido_id]);
    }



    public function guardar(Request $request){
        foreach ($request->all() as $key => $registro) {
            $claves = explode('_',$key);
            if($claves[0]=='goles'){
                $goles_x_partido = new GolesXPartido();
                $goles_x_partido->jugador_id = $claves[1];
                $goles_x_partido->cantidad= $registro;
                $goles_x_partido->partido_id = $request->partido_id;
                $goles_x_partido->save();
            }

            if($claves[0]=='tarjeta'){
                if($registro !="no"){

                    $tarjeta_x_partido = new TarjetaXPartido();
                    $tarjeta_x_partido->jugador_id = $claves[1];
                    $tarjeta_x_partido->tipo = $registro;
                    $tarjeta_x_partido->partido_id = $request->partido_id;

                    $tarjeta_x_partido->save(); 
                }  

            }

            $partido = PartidoXFecha::find($request->partido_id);
            $partido->figura_id = $request->figura_id;
            $partido->save();
            
        }
        $partido = PartidoXFecha::find($request->partido_id);
        $partido->jugado = true;
        $partido->save();
        
        return redirect('admin/torneos');
    }

    public function posiciones($zona_id)
    {
        $route = Route::current();
        $zona = Zona::find($zona_id);
        $posiciones = $zona->posiciones();


        if($route->uri == "admin/posiciones/{zona_id}"){
            return view('admin.partidos.posiciones')->with('equipos',$posiciones);
        } else {
            if($route->uri == "posiciones/{zona_id}"){
                return view('posiciones')->with('equipos',$posiciones);
            }
        }
        
    }

}
