<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Torneo;
use App\Jugador;
use App\Equipo;
use App\Zona;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Route;
use Illuminate\Pagination\LengthAwarePaginator;

class TorneoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $torneos = Torneo::orderBy('created_at','DESC')->paginate(5);
        return view('admin.torneos.index')->with('torneos',$torneos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.torneos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $torneo = new Torneo($request->all());
        $torneo->save();

        flash('El torneo '. $torneo->nombre . " ha sido agregado con exito!");

        return redirect('admin/torneos');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $torneo = Torneo::find($id);
        return view('admin.torneos.edit')->with('torneo',$torneo);

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
        $torneo = Torneo::find($id);
        $torneo->fill($request->all());
        $torneo->save();

         flash('El torneo '. $torneo->nombre . ' ha sido editado con exito','warning');

        return redirect('admin/torneos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $torneo = Torneo::find($id);
        $torneo->delete();

        flash('El  torneo'. $torneo->nombre . " ha sido borrado con exito!",'danger');

        return redirect('admin/torneos');
    
    }

    public function goleadores($id)
    {
        $route = Route::current();

        $jugadores = DB::select('select j.nombre as nombre_jugador, sum(cantidad) as goles, e.nombre as nombre_equipo from jugadores j
                    inner join equipos e on e.id = j.equipo_id
                    inner join zonas z on z.id = e.zona_id
                    inner join torneos t on t.id = z.torneo_id
                    inner join goles_x_partidos g on j.id = g.jugador_id
                    where t.id = ?
                    group by j.nombre, e.nombre
                    order by sum(cantidad) DESC',[$id]);

        $currentPage = LengthAwarePaginator::resolveCurrentPage();

        $col = new Collection($jugadores);
        $perPage = 20;
        $currentPageSearchResults = $col->slice(($currentPage - 1) * $perPage, $perPage)->all();

        $jugadores = new LengthAwarePaginator ( $currentPageSearchResults ,   count ( $col ) ,   $perPage);


        if($route->uri=='admin/goleadores/{torneo_id}') {
            $jugadores->setPath("$id");
            return view('admin.torneos.goleadores')->with('jugadores',$jugadores);
        } else {
            if($route->uri =='goleadores/{torneo_id}'){
                $jugadores->setPath("$id");
                return view('goleadores')->with('jugadores',$jugadores);
            }
        }

        
        
    }

    public function valla($torneo_id)
    {

        $zonas = Zona::where('torneo_id',$torneo_id)->pluck('id');
        $equipos = Equipo::whereIn('zona_id',$zonas)->get();
        $equipos = $equipos->sortBy(function($equipo, $clave){
            return $equipo->golesEnContra();
        });


        return view('valla')->with('equipos',$equipos);

    }
}
