<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Equipo;
use Image;

class EquipoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($zona_id)
    {
        $equipos = Equipo::where('zona_id',$zona_id)->paginate(20);
        return view('admin.equipos.index')->with('equipos',$equipos)->with('zona_id',$zona_id);
    }

    public function all()
    {
        $equipos = Equipo::orderBy('id','ASC')->paginate(20);
        return view('admin.equipos.all')->with('equipos',$equipos);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($zona_id)
    {
        return view('admin.equipos.create')->with('zona_id',$zona_id);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $equipo = new Equipo($request->all());
        if($request->file('escudo')){
            $file = $request->file('escudo');
            $escudo = Image::make($file->getRealPath())->resize(180,180);
            $nombre = 'torneo_' . time() . "." .$file->getClientOriginalExtension();
            $path = public_path() . "/img/equipos/"; 
            $escudo->save($path . $nombre);
            $equipo->escudo = $nombre;
        }

        if($request->file('foto')){
            $file = $request->file('foto');
            $foto = Image::make($file->getRealPath())->resize(571,371);
            $nombre = 'torneo_' . (time() + 1). "." .$file->getClientOriginalExtension();
            $path = public_path() . "/img/equipos/"; 
            $foto->save($path . $nombre);
            $equipo->foto = $nombre;
        }

        $equipo->save();

        flash('El equipo '. $equipo->nombre . " ha sido agregado con exito!");

        return redirect('admin/equipos/' . $equipo->zona["id"]);
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
        $equipo = Equipo::find($id);
        return view('admin.equipos.edit')->with('equipo',$equipo);
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
        $equipo = Equipo::find($id);
        $equipo->fill($request->all());
        if($request->file('escudo')){
            $file = $request->file('escudo');
            $escudo = Image::make($file->getRealPath())->resize(180,180);
            $nombre = 'torneo_' . time() . "." .$file->getClientOriginalExtension();
            $path = public_path() . "/img/equipos/"; 
            $escudo->save($path . $nombre);
            $equipo->escudo = $nombre;
        }

        if($request->file('foto')){
            $file = $request->file('foto');
            $foto = Image::make($file->getRealPath())->resize(571,371);
            $nombre = 'torneo_' . (time() + 1). "." .$file->getClientOriginalExtension();
            $path = public_path() . "/img/equipos/"; 
            $foto->save($path . $nombre);
            $equipo->foto = $nombre;
        }
        $equipo->save();

        flash('El equipo '. $equipo->nombre . ' ha sido editado con exito','warning');

        return redirect('admin/equipos/'. $equipo->zona["id"]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $equipo = Equipo::find($id);
        $equipo->delete();

        flash('El equipo '. $equipo->nombre . " ha sido borrado con exito!",'danger');

        return redirect('admin/equipos/'. $equipo->zona["id"]);
    }
}
