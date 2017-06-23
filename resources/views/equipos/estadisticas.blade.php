@extends('layouts.main')

<header class="footbal">
	@include('layouts.partials.header')
</header>

@section('content')
	@include('layouts.partials.banner',["titulo"=>'Equipos - '. $equipo->nombre])

	<!--// KODE BLOG WRAPER START //-->
	<div class="kode_blog_wraper">
		<div class="container">
			<div class="row">
				<div class="col-md-2"></div>
				<div class="col-md-8">
					<div class="kode_detail_row">
						<!-- KODE DETAIL FIG START -->
						<div class="kode_detail_fig">
							<figure>
								@if($equipo->foto)
									<img src="{{asset('img/equipos/' .$equipo->foto)}}" alt="">
								@else
									<img src="{{asset('img/equipos/no_image.png')}}" alt="">
								@endif
							</figure>
							<div class="heading5 black margin">
					  			<h4>{{$equipo->nombre}} está en el puesto<span> {{$equipo->posicion()}}</span>.</h4>
							</div>

						</div>
						<!-- KODE DETAIL FIG END -->

					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-1"></div>
				<div class="col-md-10">
					<table class="kode_ply_table">
							<tr class="kode_ply_first">
								<th>Posicion</th>
								<th>Nombre del jugador</th>
								<th>Goles</th>
								<th>Tarjetas Amarilla</th>
								<th>Tarjetas Azul</th>
								<th>Tarjetas Roja</th>
							</tr>
							@foreach($jugadores as $clave =>$jugador)
							<tr class="kode_ply_two">
								<td>{{$jugador->posicion}}</td>
								<td>{{$jugador->nombre}}</td>
								<td>{{$jugador->goles()}}</td>
								<td>{{$jugador->tarjetasAmarilla()}}</td>
								<td>{{$jugador->tarjetasAzul()}}</td>
								<td>{{$jugador->tarjetasRoja()}}</td>
							</tr>
							@endforeach
						</table>	
				</div>
			</div>
		</div>
	</div>
	<!--// KODE BLOG WRAPER END //-->
@endsection