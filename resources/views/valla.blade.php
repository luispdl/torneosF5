@extends('layouts.main')

<header class="football">
	
	@include('layouts.partials.header')
</header>

@section('content')

@include('layouts.partials.banner',["titulo"=>"Valla Menos Vencida"])

  <div class="kode-content">
<div class="kode_ply_gallery">
	<div class="container">
		<div class="heading5 black b_2">
			<h4>Tabla de <span>Valla Menos Vencida</span></h4>
		</div>
		<table class="kode_ply_table">
			<tr class="kode_ply_first">
				<th>Posicion</th>
				<th>Nombre del arquero</th>
				<th>Goles en contra</th>
				<th>Equipo</th>
			</tr><?php $indice = 1; ?>
			@foreach($equipos as $clave =>$equipo)
			<tr class="kode_ply_two">
				<td>{{$indice}}</td>
				<?php $indice++; ?>
				<td>{{$equipo->arquero()->nombre}}</td>
				<td>{{$equipo->golesEnContra()}}</td>
				<td>{{$equipo->nombre}}</td>
			</tr>
			@endforeach
		</table>				
	</div>
</div>
</div>

@endsection