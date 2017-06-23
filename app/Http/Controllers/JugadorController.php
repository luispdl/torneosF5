<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jugador;
use App\Equipo;
use Image;

class JugadorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($equipo_id)
    {
        $jugadores = Jugador::where('equipo_id',$equipo_id)->paginate(20);
        $equipo = Equipo::find($equipo_id);
        return view('admin.jugadores.index')->with('jugadores',$jugadores)->with('equipo',$equipo);
    }

    public function all()
    {
        $jugadores = Jugador::orderBy('equipo_id')->paginate(20);
        return view('admin.jugadores.all')->with('jugadores',$jugadores);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($equipo_id)
    {
        return view('admin.jugadores.create')->with('equipo_id',$equipo_id);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $jugador = new Jugador($request->all());
        if($request->file('imagen')){
            $file = $request->file('imagen');
            $nombre = 'torneo_' . time() . "." .$file->getClientOriginalExtension();
            $path = public_path() . "/img/jugadores/"; 
            $file->move($path, $nombre);
            $jugador->foto = $nombre;
        }
        

        $jugador->save();      
        if ($request->input("registrar")) {
            flash('El jugador '. $jugador->nombre . " ha sido agregado con exito!");
            return redirect('admin/jugadores/' . $request->equipo_id);
        } else {
            if ($request->input('agregar')) {
                return redirect('admin/jugadores/create/'.$request->equipo_id);
            }
        }
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
        $jugador = Jugador::find($id);
        return view('admin.jugadores.edit')->with('jugador',$jugador);
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
        $jugador = Jugador::find($id);
        $jugador->fill($request->all());
        $jugador->save();

        flash('El jugador '. $jugador->nombre . ' ha sido editado con exito','warning');

        return redirect('admin/jugadores/'. $jugador->equipo["id"]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $jugador = Jugador::find($id);
        $jugador->delete();

        flash('El jugador '. $jugador->nombre . ' ha sido borrado con exito','danger');

        return redirect('admin/jugadores/'. $jugador->equipo["id"]);

    }
}
