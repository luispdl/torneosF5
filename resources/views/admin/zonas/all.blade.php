@extends('admin.layouts.main')

@section('content')

	<h1 class="text-center">Zonas</h1>

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
                  <th>Torneo</th>
                </tr>
                @foreach($zonas as $zona)
                  <tr>
                  	
  	                  <td>{{ $zona->id}}</td>
  	                  <td>{{ $zona->nombre}}</td>
                      <td>{{ $zona->torneo["nombre"]}}</td>
  	                  <td>
                        <a href="{{ url('admin/zonas/'. $zona->id .'/edit')}}" title = 'Editar' class="btn btn-warning"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>
                        <a href="{{ url('admin/zonas/' . $zona->id . '/destroy')}}" title = 'Eliminar' href="#" class="btn btn-danger" onclick=  ""><span class="glyphicon glyphicon-remove-sign" aria-hidden="true"></span></a>
                        <a href="{{ url('admin/partidos/' . $zona->id )}}" title = 'Fixture' href="#" class="btn btn-primary" onclick= "">
                          Fixture <i class="fa fa-calendar" aria-hidden="true"></i></span>
                        </a>
                        <a href="{{ url('admin/equipos/' . $zona->id )}}" title = 'Equipos' href="#" class="btn btn-success" onclick= "">
                          Equipos <i class="fa fa-flag-checkered" aria-hidden="true"></i></span>
                        </a>
                        <a href="{{ url('admin/posiciones/' . $zona->id )}}" title = 'Equipos' href="#" class="btn btn-success" onclick= "">
                          Tabla de posiciones</i></span>
                        </a>
                      </td>
                    </tr>
	            @endforeach
                
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      </div>

@endsection