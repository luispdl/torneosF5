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
			<h3 class="box-title">Ingresar un nuevo jugador</h3>
		</div>
		<!-- /.box-header -->
		<!-- form start -->
		<form class="form-horizontal" role="form" method="POST" action="{{ url('admin/jugadores') }}" enctype="multipart/form-data">
			{{ csrf_field() }}
			<div class="box-body">
				<div class="form-group{{ $errors->has('nombre') ? ' has-error' : '' }}">
					<label for="nombre" class="col-lg-2 control-label">Nombre</label>
					<div class="col-lg-10">
						<input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre" value="{{ old('nombre') }}">

					</div>
				</div>
				<div class="form-group" placeholder="Seleccione una categoria...">
                  <label for="posicion" class="col-lg-2 control-label">Puesto</label>
                  <div class="col-lg-10">
	                  <select class="form-control col-lg-10" name="posicion" id="posicion">
							
							<option value="">Seleccione una posicion</option>
	                    	<option value="arquero">Arquero</option>
	                    	<option value="defensor">Defensor</option>
	                    	<option value="delantero">Delantero</option>

	                  </select>
	                 </div>
                </div>  
				<div class="form-group">
					<label for="imagen" class="col-lg-2 control-label">Foto</label>
					<div class="col-lg-6">
						<input type="file" id="imagen" name="imagen" placeholder="Foto">
					</div>
				</div>
				<div class="form-group">
					<label for="capitan" class="col-lg-2 control-label">Capitan</label>
					<div class="col-lg-10">
						<label>
							NO
							<input type="radio" value="0" id="capitan" name="capitan" checked>
						</label>
						<label>
							SI
							<input type="radio" value="1" id="capitan" name="capitan">
						</label>
					</div>

				</div>
				<div class="form-group{{ $errors->has('nombre') ? ' has-error' : '' }}">
					<label for="telefono" class="col-lg-2 control-label">Telefono</label>
					<div class="col-lg-10">
						<input type="text" class="form-control" id="telefono" name="telefono" placeholder="Telefono" value="{{ old('telefono') }}">

					</div>
				</div>

				<input type="hidden" name="equipo_id" value="{{$equipo_id}}">

			</div>                              

			<div class="box-footer">
				<button name="registrar" value="registrar" type="submit" class="btn btn-primary">Guardar jugador</button>
				<button name="agregar" value="agregar" type="submit" class="btn btn-success">Agregar otro jugador</button>
			</div>
		</form>
	</div>
@endsection