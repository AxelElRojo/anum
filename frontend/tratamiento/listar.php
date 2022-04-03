<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Lista de tratamientos</title>
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
		<h1 class="text-center">Listado de tratamientos</h1>
		<select id="animal" class="form-control" onchange="tratamiento.listar('tabla', this.value)">
			<option value="" selected disabled>Selecciona un animal</option>
		</select>
		<table id="tabla" class="table table-striped table-dark table-bordered table-hover table-sm">
			<tr>
				<th scope="col">Duración</th>
				<th scope="col">Frecuencia</th>
				<th scope="col">Descripción</th>
			</tr>
		</table>
	<script>
		const tablaOriginal = $("#tabla").clone();
	</script>
</body>
</html>