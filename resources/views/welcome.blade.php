<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Prueba archivos</title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
{{-- Bootstrap --}}
	{!! Html::style("https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css") !!}
	{{-- Custom styles --}}
	{!! Html::style("assets/css/custom.css") !!}

	{{-- Font Awesome --}}
	{!! Html::script("https://use.fontawesome.com/5b97f125c2.js") !!}
	{{-- jQuery --}}
	{!! Html::script("https://code.jquery.com/jquery-3.2.1.slim.min.js") !!}
	{{-- Bootstrap 4 - Popper --}}
	{!! Html::script("https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js") !!}
	{{-- Bootstrap 4 --}}
	{!! Html::script("https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js") !!}
	{{-- Custom JS --}}
	{!! Html::script("assets/js/script.js") !!}
</head>
<body>
	<div class="container">
		{!! Form::open(["route"=>"mueble.store", "method"=>"POST", "files"=>true]) !!}
			<div class="form-group row">
				{!! Form::label("path", "Seleccionar archivo", ["col-form-label col-md-2"]) !!}
				<div class="col-md-10">
					{{-- Para cambiar la ruta de donde se almacenarán archivos, se debe de modificar
					el archivo /config/filesystems.php ...dicha ruta está en la línea 48-49 --}}
					{!! Form::file("path", ["class"=>"form-control"]) !!}
				</div>
			</div>
			{!! Form::submit("Subir archivo", ["class"=>"btn btn-primary float-right"]) !!}
		{!! Form::close() !!}
		
		<div class="table-responsive">
			<table class="table table-striped">
				<thead>
					<tr>
						<th>Archivo</th>
						<th>Vista previa</th>
						<th>Acciones</th>
					</tr>
				</thead>
				<tbody>
					@if( $muebles==null )
						<tr>
							<td colspan="3" class="text-center">No hay registros.</td>
						</tr>
					@else
						@foreach( $muebles as $mueble )
							<tr>
								<td>{{ $mueble->path }}</td>
								<td>
									<img class="img-fluid" src="muebles/{{ $mueble->path }}" alt="{{ $mueble->path }}" style="max-width: 250px;">
								</td>
								<td>
									{!! link_to_route("mueble.edit", $title="Editar", $parameter=$mueble->id, $attributes=["class"=>"btn btn-primary"]) !!}
								</td>
							</tr>
						@endforeach
					@endif
				</tbody>
			</table>
		</div>
	</div>


</body>
</html>