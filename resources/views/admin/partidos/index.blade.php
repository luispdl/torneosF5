@extends('admin.layouts.main')

@section('content')
<div class="box-body table-responsive no-padding">
  <table class="table table-striped">

  @foreach ($partidos as $key => $partido)

    @if($key%($cantidad_equipos/2)==0)
      <tr>
        <td></td>

        <td><h3><strong>{{$partido->fecha}}</strong></h3></td>
        <td></td>

        <td></td>
      </tr>
      
    @endif
    <tr>
      <td>{{$partido->equipo1}} </td>


      <td>
        <strong style="margin-right: 20px">{{$equipos->find($partido->equipo1_id)->golesDelPartido($partido->id)}}</strong> -  
        <strong style="margin-left: 20px">{{$equipos->find($partido->equipo2_id)->golesDelPartido($partido->id)}}</strong>
      </td>
      <td>{{$partido->equipo2}}</td>
      <td>
        <a href="{{ url('admin/partidos/resultados/'.$partido->id.'/'.$partido->equipo1_id .'/'. $partido->equipo2_id  )}}" title = 'Fixture' href="#" class="btn btn-primary" onclick= "">
           Resultado</span>
        </a>
      </td>
    </tr>

  @endforeach
  </table>
  <div class="text-center"> {{$partidos->links()}} </div>
  </div> 
@endsection