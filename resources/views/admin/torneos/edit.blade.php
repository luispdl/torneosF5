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
			<h3 class="box-title">Editar el torneo {{$torneo->nombre}}</h3>
		</div>
		<!-- /.box-header -->
		<!-- form start -->
		<form class="form-horizontal" role="form" method="POST" action="{{ url('admin/torneos',$torneo) }}">
			<input type="hidden" name="_method" value="PUT">
    		<input type="hidden" name="_token" value="{{ csrf_token() }}">
			<div class="box-body">
				<div class="form-group{{ $errors->has('nombre') ? ' has-error' : '' }}">
					<label for="nombre" class="col-lg-2 control-label">Nombre</label>
					<div class="col-lg-10">
						<input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre completo" value="{{ $torneo->nombre }}">

					</div>
				</div>  
				<div class="form-group{{ $errors->has('inicio') ? ' has-error' : '' }}">
					<label for="inicio" class="col-lg-2 control-label">Fecha de inicio</label>
					<div class="col-lg-10">
						<input type="date" class="form-control" id="inicio" name="inicio" placeholder="Fecha de inicio" value="{{ $torneo->inicio }}">

					</div>
				</div> 
				<div class="form-group{{ $errors->has('fin') ? ' has-error' : '' }}">
					<label for="fin" class="col-lg-2 control-label">Fecha de fin</label>
					<div class="col-lg-10">
						<input type="date" class="form-control" id="fin" name="fin" placeholder="Fecha de fin" value="{{ $torneo->fin }}">

					</div>
				</div>        
				<input type="hidden" name="imagen" value="imagen">                   
			</div>                              

			<div class="box-footer">
				<button type="submit" class="btn btn-primary">Actualizar</button>
				<button type="reset" class="btn btn-primary">Reiniciar formulario</button>
			</div>
		</form>

	</div>
@endsection