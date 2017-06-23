@extends('admin.layouts.main')

@section('content')


	<div class="box">
		<div class="box-header">
			<h3 class="box-title">Tabla de posiciones Zona 1</h3>
		</div>
	<!-- /.box-header -->
		<div class="box-body">
			<table id="example2" class="table table-bordered table-hover">
				<thead>
					<tr>
						<th>Posicion</th>
						<th>Equipo</th>
						<th>Partidos jugados</th>
						<th>Puntos(s)</th>
						<th>DF</th>
						<th>GF</th>
						<th>GC</th>
					</tr>
				</thead>
				<tbody>
					@foreach($equipos as $clave =>$equipo)
					<tr>
						<td>{{$clave + 1}}</td>
						<td>{{$equipo->nombre}}</td>
						<td>{{$equipo->partidos_jugados}}</td>
						<td>{{$equipo->puntaje()}}</td>
						<td>{{$equipo->diferenciaDeGol}}</td>
						<td>{{$equipo->golesAFavor}}</td>
						<td>{{$equipo->golesEnContra}}</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
		<!-- /.box-body -->
	</div>
	<!-- /.box -->


@endsection