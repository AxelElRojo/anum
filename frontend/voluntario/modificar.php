<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Modificar voluntario</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
	<script type="text/javascript" src="../includes/js/app.js"></script>
	<script type="text/javascript" src="../includes/js/voluntario.js"></script>
</head>
<body>
	<?php
		echo file_get_contents('../includes/header.html');
	?>
	<div class="container">
		<h1 class="text-center">Modificación de voluntarios</h1>
		<select name="" class="form-control" onchange="voluntario.cargar(this.value)" id="select">
			<option value="" selected disabled>Selecciona un voluntario</option>
		</select>
		<form id="formulario" method="POST" onsubmit="event.preventDefault();">
			<div class="form-group mb-3">
				<label for="nombre">Nombre del voluntario:</label>
				<input type="text" class="form-control" id="nombre">
			</div>
			<div class="form-group mb-3">
				<label for="correo">Correo electrónico:</label>
				<input type="email" class="form-control" id="correo">
			</div>
			<button onclick="voluntario.modificar($('#select').val(), $('#nombre').val(), $('#correo').val())" class="btn btn-outline-primary">Modificar</button>
			<button onclick="voluntario.eliminar($('#select').val())" class="btn btn-danger">Eliminar</button>
		</form>
	</div>
	<script type="text/javascript">
		$('#formulario > *').hide(); 
		voluntario.listar('select', false);
	</script>
</body>
</html>