@extends('admin.layouts.main')

@section('content')
	@if(count($errors) > 0)
		<div class="alert alert-danger" role="alert">
			<ul>					
			@foreach($errors->all() as $error)
				<li>{{ $error }}</li>
			@endforeach
			</ul>
		</div>
	@endif

	<div class="box box-primary">
		<div class="box-header with-border">
			<h3 class="box-title">Editar el equipo {{$equipo->nombre}}</h3>
		</div>
		<!-- /.box-header -->
		<!-- form start -->
		<form class="form-horizontal" role="form" method="POST" action="{{ url('admin/equipos',$equipo) }}">
			<input type="hidden" name="_method" value="PUT">
    		<input type="hidden" name="_token" value="{{ csrf_token() }}">
			<div class="box-body">
				<div class="form-group{{ $errors->has('nombre') ? ' has-error' : '' }}">
					<label for="nombre" class="col-lg-2 control-label">Nombre</label>
					<div class="col-lg-10">
						<input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre equipo" value="{{ $equipo->nombre }}">

					</div>
				</div> 
				<div class="form-group">
					
					<label for="escudo" class="col-lg-2 control-label">Escudo</label>
					<div class="col-lg-6">
						<input type="file" id="escudo" name="escudo" placeholder="Escudo">
					</div>
					<div class="col-lg-3">
						<img class="img-thumbnail" src="{{asset('img/equipos/'.$equipo->escudo)}}">
					</div>
				</div>
				<div class="form-group">
				
					<label for="foto" class="col-lg-2 control-label">Foto</label>
					<div class="col-lg-6">
						<input type="file" id="foto" name="foto" placeholder="Foto">
					</div>
					<div class="col-lg-3">
						<img class="img-thumbnail" src="{{asset('img/equipos/fiorentina.jpg')}}">
					</div>
				</div>        
				<input type="hidden" name="zona_id" value="{{$equipo->zona["id"]}}">                   
			</div>                              

			<div class="box-footer">
				<button type="submit" class="btn btn-primary">Actualizar</button>
				<button type="reset" class="btn btn-primary">Reiniciar formulario</button>
			</div>
		</form>

	</div>
@endsection