@extends('layouts.main')

<header class="football-header">
	@include('layouts.partials.header')
</header>

@section('content')
	@include('layouts.partials.banner',["titulo"=>"Fixture"])
<!--// KODE BENNER1 END //-->

		
<div class="kode_fixture_wraper">

	<div class="container">

		<div class="row">
			<div class="col-md-9">
			<div class="text-center"> {{$partidos->links()}} </div>
				@foreach ($partidos as $key => $partido)
					@if($key%($cantidad_equipos/2)==0 && ($key!=0))
						</ul>
						</div>
					@endif
		@if($key%($cantidad_equipos/2)==0)
		<div class="ftb-tabs-wrap wrap_3">
			<div class="ftb_tabs_drop">
				<h5>{{$partido->fecha}}</h5>
				<div class="btn-group" role="group" aria-label="...">
					<div class="btn-group" role="group">
						<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							Liga italiana
						</button>

					</div>
				</div>
			</div>
			<ul class="ftb-main-table table_2">
				@endif

				<!--// MAIN TABS TABLE //-->

				<li>

					<div class="ftb-compitatev tev_2">
						<table>
							<td class="team1">
								<div class="compitatev-team1">
									<img src="{{asset('img/equipos/'. $partido->equipo1_escudo)}}" alt="">
									<a href="#">{{$partido->equipo1}}</a>
								</div>
							</td>
							<td class="team">
								<div class="visible-xs-block">
									<span><i>{{$equipos->find($partido->equipo1_id)->golesDelPartido($partido->id)}} - {{$equipos->find($partido->equipo2_id)->golesDelPartido($partido->id)}}</i></span>
								</div>
								<div class="compitatev-team1">
									<span class="ftb-venue venue_2"><i>{{$equipos->find($partido->equipo1_id)->golesDelPartido($partido->id)}} - {{$equipos->find($partido->equipo2_id)->golesDelPartido($partido->id)}}</i></span>
								</div>
							</td>
							<td class="team"> 
								<div class="compitatev-team1 compitatev-team2">
									<a href="#">{{$partido->equipo2}}</a>
									<img src="{{asset('img/equipos/'. $partido->equipo2_escudo)}}" alt="">
								</div>
							</td>
						</table>
					</div>

				</li>


				@endforeach
			</ul>
		</div>

		<!--// MAIN TABS TABLE //-->  

		<div class="text-center"> {{$partidos->links()}} </div>
	</div>

</div>
</div>
</div>	

@endsection