@extends('layouts.main')


<header class="football">
	@include('layouts.partials.header')

</header>
@section('content')

<!--// KODE BENNER1 START //-->
@include('layouts.partials.banner',["titulo"=>"Tabla de posiciones"])
  <div class="kode-content">
<div class="kode_ply_gallery">
	<div class="container">
		<div class="heading5 black b_2">
			<h4>Tabla de <span>Posiciones</span></h4>
		</div>
		<table class="kode_ply_table">
			<tr class="kode_ply_first">
				<th>Pos</th>
				<th>Equipo</th>
				
				<th>Puntos</th>
				<th>PJ</th>
				<th>DF</th>
				<th>GF</th>
				<th>GC</th>
			</tr>
			@foreach($equipos as $clave =>$equipo)
			<tr class="kode_ply_two">
				<td>{{$clave + 1}}</td>
				<td>{{$equipo->nombre}}</td>
				
				<td>{{$equipo->puntaje()}}</td>
				<td>{{$equipo->partidos_jugados}}</td>
				<td>{{$equipo->diferenciaDeGol}}</td>
				<td>{{$equipo->golesAFavor}}</td>
				<td>{{$equipo->golesEnContra}}</td>
			</tr>
			@endforeach
		</table>				

	</div>
</div>
</div>

@endsection