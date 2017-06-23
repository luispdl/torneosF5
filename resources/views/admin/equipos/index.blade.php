@extends('admin.layouts.main')

@section('content')

	<h1 class="text-center">Equipos</h1>

	<div class="row">
        <div class="col-xs-12">
          <div class="box">
           @include('flash::message')
            <div class="box-header">
              <h3 class="box-title"><a href="{{url('admin/equipos/create/'.$zona_id)}}" class="btn btn-success">Registrar nuevo equipo</a></h3> 
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                <tr>
                  <th>ID</th>
                  <th>Nombre</th>
                </tr>
                @foreach($equipos as $equipo)
                  <tr>
                  	
  	                  <td>{{ $equipo->id}}</td>
  	                  <td>{{ $equipo->nombre}}</td>
  	                  <td>
                        <a href="{{ url('admin/equipos/'. $equipo->id .'/edit')}}" title = 'Editar' class="btn btn-warning"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>
                        <a href="{{ url('admin/equipos/' . $equipo->id . '/destroy')}}" title = 'Eliminar' href="#" class="btn btn-danger" onclick=  ""><span class="glyphicon glyphicon-remove-sign" aria-hidden="true"></span></a>
                        <a href="{{ url('admin/jugadores/' . $equipo->id )}}" title = 'Equipos' href="#" class="btn btn-primary" onclick= "">
                          Jugadores <i class="fa fa-users" aria-hidden="true"></i>
                        </a>
                      </td>
                    </tr>
	            @endforeach
                
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
          <div class="text-center"> {{$equipos->links()}} </div>
        </div>
      </div>

@endsection