<div class="logo-wrap2">
	<div class="container">
		<div class="logo logo-3">
			<a href="#"><img src="{{asset('template/images/logo2.jpg')}}" alt=""></a>
		</div>
		<!--// SPB TICKER //-->
		<div class="spb-ticker spb-ticker2">
			<span>New:</span>
			<ul class="top_slider_bxslider">
				<li>
					<div class="ticker-dec">
						<a href="#">Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet. Aenean soquis bibendum auctor, entum feugiat,</a>
					</div>
				</li>
				<li>
					<div class="ticker-dec">
						<a href="#">Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet. Aenean soquis bibendum auctor, entum feugiat,</a>
					</div>
				</li>
			</ul>
		</div>
		<!--// SPB TICKER //-->
	</div>
</div>

<div class="nav4">
	<div class="container">
		<ul class="kode_nave">
		<li><a href="{{url('/')}}">Inicio</a></li>
			<li><a href="#">Acerca de</a>
				<ul class="dl-submenu">
					<li><a href="#">Reglamento del torneo</a></li>
					<li><a href="#">Sistema del torneo</a></li>
					<li><a href="single-player.html">Premios</a></li>
				</ul>
			</li>
			<li><a href="#">Fixture</a>
				<ul class="dl-submenu">
					@foreach($zonas as $zona)
						<li><a href="{{url('fixture/'.$zona->id)}}">{{$zona->nombre}}</a></li>
					@endforeach
				</ul>	  
			</li>
			<li><a href="#">Tablas de posiciones</a>
				<ul>
					@foreach($zonas as $zona)
						<li><a href="{{url('posiciones/'.$zona->id)}}">{{$zona->nombre}}</a></li>
					@endforeach
				</ul>
			</li>
			<li><a href="#">Estadisticas</a>
				<ul class="dl-submenu">
					<li><a href="{{url('goleadores/1')}}">Goleadores</a></li>
					<li><a href="{{url('valla/1')}}">Valla menos vencida</a></li>
					<li><a href="single-player.html">Tarjetas</a></li>
					<li><a href="#">Figuras de cada partido</a></li>
					<li><a href="#">Fair Play</a></li>
				</ul>
			</li>

			<li><a href="{{url('equipos')}}">Equipos</a>

			</li>
			<li><a href="contact-us.html">Contactanos</a></li>
		</ul>
		<!--DL Menu Start-->
		<div id="kode-responsive-navigation" class="dl-menuwrapper">
			<button class="dl-trigger">Open Menu</button>
			<ul class="dl-menu">
		<li><a href="{{url('/')}}">Inicio</a></li>
			<li><a href="#">Acerca de</a>
				<ul class="dl-submenu">
					<li><a href="#">Reglamento del torneo</a></li>
					<li><a href="#">Sistema del torneo</a></li>
					<li><a href="single-player.html">Premios</a></li>
				</ul>
			</li>
			<li><a href="#">Fixture</a>
				<ul class="dl-submenu">
					@foreach($zonas as $zona)
						<li><a href="{{url('fixture/'.$zona->id)}}">{{$zona->nombre}}</a></li>
					@endforeach
				</ul>	  
			</li>
			<li><a href="#">Tablas de posiciones</a>
				<ul class="dl-submenu">
					@foreach($zonas as $zona)
						<li><a href="{{url('posiciones/'.$zona->id)}}">{{$zona->nombre}}</a></li>
					@endforeach
				</ul>
			</li>
			<li><a href="#">Estadisticas</a>
				<ul class="dl-submenu">
					<li><a href="{{url('goleadores/1')}}">Goleadores</a></li>
					<li><a href="#">Valla menos vencida</a></li>
					<li><a href="single-player.html">Tarjetas</a></li>
					<li><a href="#">Figuras de cada partido</a></li>
					<li><a href="#">Fair Play</a></li>
				</ul>
			</li>

			<li><a href="{{url('equipos')}}">Equipos</a>

			</li>
			<li><a href="contact-us.html">Contactanos</a></li>
		</ul>
		</div>

	</div>
</div>