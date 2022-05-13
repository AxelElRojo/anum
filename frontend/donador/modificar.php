<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Modificar donador</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
	<script type="text/javascript" src="../includes/js/app.js"></script>
	<script type="text/javascript" src="../includes/js/donador.js"></script>
</head>
<body>
	<?php
		echo file_get_contents('../includes/header.html');
	?>
	<div class="container">
		<h1 class="text-center">Modificación de especies</h1>
		<select name="" class="form-control" onchange="donador.cargar(this.value)" id="select">
			<option value="" selected disabled>Selecciona una especie</option>
		</select>
		<form action="#" id="formulario" method="POST" onsubmit="event.preventDefault();">
			<div class="form-group mb-3">
				<label for="nombre">Nombre del donador:</label>
				<input type="text" class="form-control" id="nombre">
				<label for="rfc">RFC:</label>
				<input type="text" class="form-control" id="rfc">
				<label for="especie">Correo del donador:</label>
				<input type="email" class="form-control" id="correo">
			</div>
			<button onclick="donador.modificar($('#select').val(), $('#nombre').val(), $('#rfc').val(), $('#correo').val())" class="btn btn-outline-primary">Modificar</button>
			<button onclick="donador.eliminar($('#select').val())" class="btn btn-danger">Eliminar</button>
		</form>
	</div>
	<script type="text/javascript">
		$('#formulario > *').hide(); 
		donador.listar('select', false);
	</script>
</body>
</html>