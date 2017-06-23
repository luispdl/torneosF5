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
			<h3 class="box-title">Ingresar un nuevo equipo</h3>
		</div>
		<!-- /.box-header -->
		<!-- form start -->
		<form class="form-horizontal" role="form" method="POST" action="{{ url('admin/equipos') }}" enctype="multipart/form-data">
			{{ csrf_field() }}
			<div class="box-body">
				<div class="form-group{{ $errors->has('nombre') ? ' has-error' : '' }}">
					<label for="nombre" class="col-lg-2 control-label">Nombre</label>
					<div class="col-lg-10">
						<input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre" value="{{ old('name') }}">

					</div>
				</div> 
				<div class="form-group">
					<label for="escudo" class="col-lg-2 control-label">Escudo</label>
					<div class="col-lg-6">
						<input type="file" id="escudo" name="escudo" placeholder="Escudo">
					</div>
				</div>
				<div class="form-group">
					<label for="foto" class="col-lg-2 control-label">Foto</label>
					<div class="col-lg-6">
						<input type="file" id="foto" name="foto" placeholder="Foto">
					</div>
				</div> 

				<input type="hidden" name="zona_id" value="{{$zona_id}}">

			</div>                              

			<div class="box-footer">
				<button type="submit" class="btn btn-primary">Guardar equipo</button>
				<button type="reset" class="btn btn-primary">Reiniciar formulario</button>
			</div>
		</form>
	</div>
@endsection