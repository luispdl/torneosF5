@extends('layouts.main')

<header class="football">
	@include('layouts.partials.header')
</header>


@section('content')	
@include('layouts.partials.banner',["titulo"=>"Equipos"])

<div class="kode_ply_gallery">
	<div class="container">
		<div class="heading5 black b_2">
		<h4>Elegir un <span>Equipo</span></h4>
		</div>

		<div class="kode-ply-list">
			
				@foreach($equipos as $i => $equipo)
					@if(($i%12)==0)
						<div>
							<ul class="kode_ply_galery_list">
					@endif
					<a class="col-xs-3 col-md-3" href="{{url('equipos/estadisticas/'. $equipo->id)}}">
						<li class="text-center">
							<strong>{{$equipo->nombre}}</strong>
							<figure> 
								<img src="{{asset('img/equipos/'. $equipo->escudo)}}" alt="">

							</figure>					
						</li>
					</a>
					@if(($i%12)==11)
						
							</ul>
						</div>
					@endif
				@endforeach						
		</div>	
	</div>
</div>



@endsection