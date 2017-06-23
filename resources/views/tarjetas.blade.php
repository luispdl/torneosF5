@extends('layouts.main')


<header class="football">
	@include('layouts.partials.header')

</header>
@section('content')

@include('layouts.partials.banner',["titulo"=>"Tarjetas"])

<div class="kode-content">
	<div class="kode_ply_gallery">
		<div class="container">
			<div class="heading5 black b_2">
				<h4>Tabla de <span>Posiciones</span></h4>
			</div>
			<table class="kode_ply_table">
				<tr class="kode_ply_first">
					<th>Posicion</th>
					<th>Nombre</th>	
					<th>Equipo</th>
					<th>T. Amarillas</th>
					<th>T. Azul</th>
					<th>T. Roja</th>
				</tr>
				@foreach($jugadores as $clave =>$jugador)
				<tr class="kode_ply_two">
					<td>{{$clave + 1}}</td>
					<td>{{$jugador->nombre}}</td>
					<td>{{$jugador->equipo->nombre}}</td>
					<td>{{$jugador->tarjetasAmarilla()}}</td>
					<td>{{$jugador->tarjetasAzul()}}</td>
					<td>{{$jugador->tarjetasRoja()}}</td>

				</tr>
				@endforeach
			</table>				

		</div>
	</div>
</div>

@endsection