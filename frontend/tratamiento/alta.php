<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Alta de tratamiento</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
	<script type="text/javascript" src="../includes/js/app.js"></script>
	<script type="text/javascript" src="../includes/js/animal.js"></script>
	<script type="text/javascript" src="../includes/js/tratamiento.js"></script>
	<script type="text/javascript">
		animal.listar({}, 'animal', false);
	</script>
</head>
<body>
	<?php
		echo file_get_contents('../includes/header.html');
	?>
	<div class="container">
		<h1 class="text-center">Alta de tratamiento</h1>
		<form id="formulario" method="POST" onsubmit="event.preventDefault(); tratamiento.alta($('#duracion').val(), $('#frecuencia').val(), $('#descripcion').val(), $('#idAnimal').val())">
			<div class="form-group">
				<label for="duracion">Duracion:</label>
				<input type="text" class="form-control" placeholder="Ingresa la duracion del tratamiento" id="duracion">
			</div>
			<div class="form-group">
				<label for="frecuencia">Frecuencia:</label>
				<input type="text" class="form-control" placeholder="Ingresa la frecuencia" id="frecuencia">
			</div>
			<div class="form-group">
				<label for="fecha">Descripcion:</label>
				<input type="text" class="form-control" placeholder="Ingresa la descripcion" id="descripcion">
			</div>
			<div class="form-group mb-3">
				<label for="idAnimal">Selecciona el animal:</label>
				<select class="form-control" id="animal">
				</select>
			</div> 
			<button type="submit" class="btn btn-outline-primary">Enviar</button>
		</form>
	</div>
</body>
</html>