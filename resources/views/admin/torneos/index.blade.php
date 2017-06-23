@extends('admin.layouts.main')

@section('content')

	<h1 class="text-center">Torneos</h1>

	<div class="row">
        <div class="col-xs-12">
          <div class="box">
           @include('flash::message')
            <div class="box-header">
              <h3 class="box-title"><a href="{{url('admin/torneos/create')}}" class="btn btn-success">Registrar nuevo torneo</a></h3> 
              <div class="box-tools">
                <div class="input-group input-group-sm" style="width: 150px;">
                  <input type="text" name="table_search" class="form-control pull-right" placeholder="Search">

                  <div class="input-group-btn">
                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                  </div>
                </div>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                <tr>
                  <th>ID</th>
                  <th>Nombre</th>
                  <th>Fecha de Inicio</th>
                  <th>Fecha de Fin</th>
                </tr>
                @foreach($torneos as $torneo)
                  <tr>
                  	
  	                  <td>{{ $torneo->id}}</td>
  	                  <td>{{ $torneo->nombre}}</td>
  	                  <td>{{ $torneo->inicio}}</td>
  	                  <td>{{ $torneo->fin}}</td>
  	                  <td>
                        <a href="{{ url('admin/torneos/'. $torneo->id .'/edit')}}" title = 'Editar' class="btn btn-warning"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>
                        <a href="{{ url('admin/torneos/' . $torneo->id . '/destroy')}}" title = 'Eliminar' href="#" class="btn btn-danger" onclick=  ""><span class="glyphicon glyphicon-remove-sign" aria-hidden="true"></span></a>
                        <a href="{{ url('admin/zonas/' . $torneo->id )}}" title = 'Zonas' href="#" class="btn btn-primary" onclick= "">Zonas</a>
                        <a href="{{ url('admin/torneos/fixture/' . $torneo->id )}}" title = 'Fixture' href="#" class="btn btn-success" onclick= "">Armar Fixture</a>
                        <a href="{{ url('admin/goleadores/' . $torneo->id )}}" title = 'Fixture' href="#" class="btn btn-info" onclick= "">Goleadores</a>
                      </td>
                    </tr>
	            @endforeach
                
              </table>
              <div class="text-center"> {{$torneos->links()}} </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      </div>

@endsection