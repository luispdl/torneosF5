@extends('admin.layouts.main')

@section('content')

	<h1 class="text-center">Jugadores</h1>

	<div class="row">
        <div class="col-xs-12">
          <div class="box">
           @include('flash::message')
            <div class="box-header">
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                <tr>
                  <th>ID</th>
                  <th>Nombre</th>
                  <th>Equipo</th>
                  <th>Zona</th>
                  <th>Torneo</th>
                </tr>
                @foreach($jugadores as $jugador)
                  <tr>
                  	
  	                  <td>{{ $jugador->id}}</td>
  	                  <td>{{ $jugador->nombre}}</td>
                      <td>{{ $jugador->equipo["nombre"]}}</td>
                      <td>{{ $jugador->equipo->zona["nombre"]}}</td>
                      <td>{{ $jugador->equipo->zona->torneo["nombre"]}}</td>
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