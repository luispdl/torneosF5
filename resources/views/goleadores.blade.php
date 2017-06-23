@extends('layouts.main')

<header class="football">
	
	@include('layouts.partials.header')
</header>

@section('content')

@include('layouts.partials.banner',["titulo"=>"Goleadores"])

  <div class="kode-content">
<div class="kode_ply_gallery">
	<div class="container">
		<div class="heading5 black b_2">
			<h4>Tabla de <span>Goleadores</span></h4>
		</div>
		<table class="kode_ply_table">
			<tr class="kode_ply_first">
				<th>Posicion</th>
				<th>Nombre del jugador</th>
				<th>Goles</th>
				<th>Equipo</th>
			</tr>
			@foreach($jugadores as $clave =>$jugador)
			<tr class="kode_ply_two">
				<td>{{$clave + 1}}</td>
				<td>{{$jugador->nombre_jugador}}</td>
				<td>{{$jugador->goles}}</td>
				<td>{{$jugador->nombre_equipo}}</td>
			</tr>
			@endforeach
		</table>				
		<div class="kode_blog_pagination"> {{$jugadores->links()}} </div>
	</div>
</div>
</div>

@endsection