@extends('admin.layouts.main')

@section('content')


	<div class="box">
		<div class="box-header">
			<h3 class="box-title">Tabla de posiciones</h3>
		</div>
	<!-- /.box-header -->
		<div class="box-body">
			<table id="example2" class="table table-bordered table-hover">
				<thead>
					<tr>
						<th>Posicion</th>
						<th>Nombre del jugador</th>
						<th>Goles</th>
						<th>Equipo</th>
					</tr>
				</thead>
				<tbody>
					@foreach($jugadores as $clave =>$jugador)
					<tr>
						<td>{{$clave + 1}}</td>
						<td>{{$jugador->nombre_jugador}}</td>
						<td>{{$jugador->goles}}</td>
						<td>{{$jugador->nombre_equipo}}</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
		<!-- /.box-body -->
	</div>
	<!-- /.box -->


@endsection