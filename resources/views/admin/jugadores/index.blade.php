@extends('admin.layouts.main')

@section('content')

	<h1 class="text-center">Jugadores del equipo {{$equipo->nombre}}</h1>

	<div class="row">
        <div class="col-xs-12">
          <div class="box">
           @include('flash::message')
            <div class="box-header">
              <h3 class="box-title"><a href="{{url('admin/jugadores/create/'.$equipo->id)}}" class="btn btn-success">Registrar un nuevo jugador</a></h3> 
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                <tr>
                  <th>ID</th>
                  <th>Nombre</th>
                  <th>Posicion</th>
                  <th>Goles<i class="fa fa-futbol-o" aria-hidden="true"></i></th>
                  <th><span class="label label-warning" style="font-size: 100%">Tarjetas amarillas</span></th>
                  <th><span class="label label-primary" style="font-size: 100%"> Tarjetas azules </span></th>
                  <th><span class="label label-danger" style="font-size: 100%">Tarjetas rojas</span></th>
                </tr>
                @foreach($jugadores as $jugador)
                  <tr>
                  	
  	                  <td>{{ $jugador->id}}</td>
  	                  <td>{{ $jugador->nombre}}</td>
                      <td>{{ $jugador->posicion}}</td>
                      <td>{{ $jugador->goles()}}</td>
                      <td>{{ $jugador->tarjetasAmarilla()}}</td>
                      <td>{{ $jugador->tarjetasAzul()}}</td>
                      <td>{{ $jugador->tarjetasRoja()}}</td>
  	                  <td>
                        <a href="{{ url('admin/jugadores/'. $jugador->id .'/edit')}}" title = 'Editar' class="btn btn-warning"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>
                        <a href="{{ url('admin/jugadores/' . $jugador->id . '/destroy')}}" title = 'Eliminar' href="#" class="btn btn-danger" onclick=  ""><span class="glyphicon glyphicon-remove-sign" aria-hidden="true"></span></a>
                      </td>
                    </tr>
	            @endforeach
                
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
          <div class="text-center"> {{$jugadores->links()}} </div>
        </div>
      </div>

@endsection