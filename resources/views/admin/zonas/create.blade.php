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
			<h3 class="box-title">Ingresar una nueva zona</h3>
		</div>
		<!-- /.box-header -->
		<!-- form start -->
		<form class="form-horizontal" role="form" method="POST" action="{{ url('admin/zonas') }}">
			{{ csrf_field() }}
			<div class="box-body">
				<div class="form-group{{ $errors->has('nombre') ? ' has-error' : '' }}">
					<label for="nombre" class="col-lg-2 control-label">Nombre</label>
					<div class="col-lg-10">
						<input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre" value="{{ old('name') }}">

					</div>
				</div>  

				<input type="hidden" name="torneo_id" value="{{$torneo_id}}">

			</div>                              

			<div class="box-footer">
				<button type="submit" class="btn btn-primary">Registrar</button>
				<button type="reset" class="btn btn-primary">Reiniciar formulario</button>
			</div>
		</form>
	</div>
@endsection