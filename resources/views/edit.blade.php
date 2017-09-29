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
		{!! Form::model( $mueble, ["route"=>["mueble.update", $mueble->id], "method"=>"PUT", "files"=>true]) !!}
			<div class="form-group row">
				{!! Form::label("path", "Seleccionar archivo", ["col-form-label col-md-2"]) !!}
				<div class="col-md-10">
					{{-- Para cambiar la ruta de donde se almacenarán archivos, se debe de modificar
					el archivo /config/filesystems.php ...dicha ruta está en la línea 48-49 --}}
					{!! Form::file("path", ["class"=>"form-control"]) !!}
				</div>
			</div>
			{!! Form::submit("Actualizar", ["class"=>"btn btn-success float-right"]) !!}
			<a href="{{ URL::to("mueble") }}" class="btn btn-outline-secondary float-right mr-3">Volver</a>
		{!! Form::close() !!}
	</div>


</body>
</html>