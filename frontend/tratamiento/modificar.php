<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Modificar tratamiento</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
	<script type="text/javascript" src="../includes/js/app.js"></script>
	<script type="text/javascript" src="../includes/js/animal.js"></script>
	<script type="text/javascript" src="../includes/js/tratamiento.js"></script>
</head>
<body>
	<?php
		echo file_get_contents('../includes/header.html');
	?>
	<div class="container">
		<h1 class="text-center">Modificación de tratamiento</h1>
		<select class="form-control" id="animal" onchange="tratamiento.listar('select', this.value, false)">
			<option value="" selected disabled>Selecciona un animal</option>
		</select>
		<select class="form-control" id="select" onchange="tratamiento.cargar(this.value)">
			<option value="" selected disabled>Selecciona un tratamiento</option>
		</select>
		<form action="#" id="formulario" method="POST" onsubmit="event.preventDefault()">
			<div class="form-group mb-3">
				<label for="duracion">Duración:</label>
				<input type="text" class="form-control" placeholder="duracion" id="duracion">
			</div>
			<div class="form-group mb-3">
				<label for="frecuencia">Frecuencia:</label>
				<input type="text" class="form-control" id="frecuencia">
			</div>
			<div class="form-group mb-3">
				<label for="frecuencia">Descripción:</label>
				<input type="text" class="form-control" id="descripcion">
			</div>
			<button onclick="tratamiento.modificar($('#select').val(), $('#duracion').val(), $('#frecuencia').val(), $('#descripcion').val())" class="btn btn-outline-primary">Modificar</button>
			<button onclick="tratamiento.eliminar($('#select').val())" class="btn btn-danger">Eliminar</button>
		</form>
	</div>
	<script type="text/javascript">
		$('#formulario > *').hide();
		animal.listar({}, 'animal', false);
		const tablaOriginal = $("#tabla").clone();
	</script>
</body>
</html>