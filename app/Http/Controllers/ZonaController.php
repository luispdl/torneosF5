<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Zona;

class ZonaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($torneo_id)
    {
        $zonas = Zona::where('torneo_id',$torneo_id)->get();
        return view('admin.zonas.index')->with('zonas',$zonas)->with('torneo_id',$torneo_id);
    }

    public function all(){
        $zonas = Zona::all();
        return view('admin.zonas.all')->with('zonas',$zonas);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($torneo_id)
    {
        
        return view('admin.zonas.create')->with('torneo_id',$torneo_id);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $zona = new Zona($request->all());
        $zona->save();

        flash('La zona '. $zona->nombre . " ha sido agregado con exito!");

        return redirect('admin/zonas/' . $zona->torneo["id"]);
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
        $zona = Zona::find($id);
        return view('admin.zonas.edit')->with('zona',$zona);
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
        $zona = Zona::find($id);
        $zona->fill($request->all());
        $zona->save();

        flash('La zona '. $zona->nombre . ' ha sido editado con exito','warning');

        return redirect('admin/zonas/'. $zona->torneo["id"]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $zona = Zona::find($id);
        $zona->delete();

        flash('La zona '. $zona->nombre . " ha sido borrado con exito!",'danger');

        return redirect('admin/zonas/'. $zona->torneo["id"]);
    }
}
