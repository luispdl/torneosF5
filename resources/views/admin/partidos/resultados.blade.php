@extends('admin.layouts.main')
@section('css')

<link rel="stylesheet" href="{{asset('adminPlugin/plugins/iCheck/all.css')}}">

@endsection

@section('content')


	<div class="box box-primary">
		<div class="box-header with-border">
			<h1 class="box-title">{{$equipo1->nombre}}: <span id="goles1"></span></h1>
		</div>
		<!-- /.box-header -->
		<!-- form start -->
		<form class="form-horizontal" role="form" method="POST" action="{{ url('admin/partidos/resultados') }}">
			{{ csrf_field() }}
			<div class="box-body">
				<div class="form-group text-center"> 
					<label for="goles" class="col-lg-2 control-label">Jugador</label>

					<label  class="col-lg-2 control-label">Goles</label>
					<label  class="col-lg-2 control-label text-center">Tarjetas</label>
					<label  class="col-lg-1 control-label text-center"></label>
					<label  class="col-lg-2 control-label text-center">Figura</label>
				</div>



					

			@foreach($jugadores1 as $jugador1)

				<div class="form-group jugadores{{ $errors->has('nombre') ? ' has-error' : '' }}">

						<label for="goles" class="col-lg-2 control-label">{{$jugador1->nombre}}</label>
						<div class="col-lg-2">

							<input type="number" class="form-control goles1" id="goles" name="{{'goles_' . $jugador1->id}}" placeholder="" value="0">

						</div>
						<div class="col-lg-1">
							<input type="radio" class="flat-grey" id="{{"tarjeta" . $jugador1->id}}" name="{{"tarjeta_" . $jugador1->id}}" value="no" checked>

						</div>
						<div class="col-lg-1">
							<input type="radio" class="flat-yellow" id="{{"tarjeta" . $jugador1->id}}" name="{{"tarjeta_" . $jugador1->id}}" value="amarilla">
						</div>
						<div class="col-lg-1">
							<input type="radio" class="flat-blue" id="{{"tarjeta" . $jugador1->id}}" name="{{"tarjeta_" . $jugador1->id}}" value="azul">

						</div>
						<div class="col-lg-1">
							<input type="radio" class="flat-red" id="{{"tarjeta" . $jugador1->id}}" name="{{"tarjeta_" . $jugador1->id}}" value="roja">

						</div>

						<div class="col-lg-2 text-center">
							<label>
                  				<input type="radio" class="minimal" name="figura_id" value="{{$jugador1->id}}">
                			</label>
						</div>
				</div>  
			@endforeach

				<input type="hidden" name="partido_id" value="{{$partido_id}}">
				<a href="{{url('admin/jugadores/create/'.$equipo1->id)}}" class="btn btn-success">Agregar un nuevo jugador</a>

			</div>

			<div class="box-header with-border">
				<h1 class="box-title">{{$equipo2->nombre}}:<span id="goles2"></span></h1>
			</div>   
			<div class="box-body">
				<div class="form-group text-center"> 
					<label for="goles" class="col-lg-2 control-label">Jugador</label>

					<label  class="col-lg-2 control-label">Goles</label>
					<label  class="col-lg-2 control-label text-center">Tarjetas</label>

				</div>



					

			@foreach($jugadores2 as $jugador2)

				<div class="form-group{{ $errors->has('nombre') ? ' has-error' : '' }}">
					<label for="goles" class="col-lg-2 control-label">{{$jugador2->nombre}}</label>
					<div class="col-lg-2">

						<input type="number" class="form-control goles2" id="goles" name="{{'goles_' . $jugador2->id}}" placeholder="" value="0">

					</div>
					<div class="col-lg-1">
						<input type="radio" class="flat-grey" id="{{"tarjeta" . $jugador2->id}}" name="{{"tarjeta_" . $jugador2->id}}" value="no" checked>

					</div>
					<div class="col-lg-1">
						<input type="radio" class="flat-yellow" id="{{"tarjeta" . $jugador2->id}}" name="{{"tarjeta_" . $jugador2->id}}" value="amarilla">

					</div>
					<div class="col-lg-1">
						<input type="radio" class="flat-blue" id="{{"tarjeta" . $jugador2->id}}" name="{{"tarjeta_" . $jugador2->id}}" value="azul">

					</div>
					<div class="col-lg-1">
						<input type="radio" class="flat-red" id="{{"tarjeta" . $jugador2->id}}" name="{{"tarjeta_" . $jugador2->id}}" value="roja">

					</div>
					<div class="col-lg-2 text-center">
						<label>
                  			<input type="radio" class="minimal" name="figura_id" value="{{$jugador2->id}}">
                		</label>
					</div>
				</div>  
			@endforeach

				<input type="hidden" name=partido_id" value="{{$partido_id}}">
				<a href="{{url('admin/jugadores/create/'.$equipo2->id)}}" class="btn btn-success">Agregar un nuevo jugador</a>

			</div>                           

			<div class="box-footer">
				<button value="registrar" type="submit" class="btn btn-primary">Guardar</button>
			</div>
		</form>
	</div>


@endsection

@section('script')
<!-- iCheck 1.0.1 -->
<script src="{{asset('adminPlugin/plugins/iCheck/icheck.min.js')}}"></script>
<script>
  $(function () {
  	 $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
      checkboxClass: 'icheckbox_minimal-blue',
      radioClass: 'iradio_minimal-blue'
    });

  	 $('input[type="checkbox"].flat-blue, input[type="radio"].flat-blue').iCheck({
      checkboxClass: 'icheckbox_flat-blue',
      radioClass: 'iradio_flat-blue'
    });

  	    //Red color scheme for iCheck
    $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
      checkboxClass: 'icheckbox_flat-red',
      radioClass: 'iradio_flat-red'
    });
        //Red color scheme for iCheck
    $('input[type="checkbox"].flat-yellow, input[type="radio"].flat-yellow').iCheck({
      checkboxClass: 'icheckbox_flat-yellow',
      radioClass: 'iradio_flat-yellow'
    });
        //Red color scheme for iCheck
    $('input[type="checkbox"].flat-grey, input[type="radio"].flat-grey').iCheck({
      checkboxClass: 'icheckbox_flat-grey',
      radioClass: 'iradio_flat-grey'
    });
  })
 </script>
 <script src="{{ asset('js/goles.js')}}">
 </script>

@endsection