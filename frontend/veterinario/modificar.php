<?php
require_once('../../backend/.includes/util.inc.php');
if(!session_exists()){
	header('Location: ../index.php');
	die();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Modificar veterinario</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
	<script type="text/javascript" src="../includes/js/app.js"></script>
	<script type="text/javascript" src="../includes/js/veterinario.js"></script>
</head>
<body>
	<?php
		if($_SESSION['admin'])
			echo file_get_contents('../includes/admin_header.html');
		else
			echo file_get_contents('../includes/header.html');
	?>
	<div class="container">
		<h1 class="text-center">Modificación de veterinario</h1>
		<select name="" class="form-control" onchange="veterinario.cargar(this.value)" id="select">
			<option value="" selected disabled>Selecciona un veterinario</option>
		</select>
		<form action="#" id="formulario" method="POST" onsubmit="event.preventDefault();">
			<div class="form-group mb-3">
				<label for="especie">Nombre del veterinario:</label>
				<input type="text" class="form-control" id="nombre">
			</div>
			<div class="form-group mb-3">
				<label for="especie">Correo electrónico:</label>
				<input type="email" class="form-control" id="correo">
			</div>
			<div class="form-group mb-3">
				<label for="especie">Número telefónico:</label>
				<input type="tel" class="form-control" id="telefono">
			</div>
			<div class="form-group mb-3">
				<label for="especie">Dirección del veterinario:</label>
				<input type="text" class="form-control" id="direccion">
			</div>
			<div class="form-group mb-3">
				<label for="especie">Horario del veterinario:</label>
				<input type="text" class="form-control" id="horario">
			</div>
			<button onclick="veterinario.modificar($('#select').val(), $('#nombre').val(), $('#correo').val(), $('#telefono').val(), $('#direccion').val(), $('#horario').val())" class="btn btn-outline-primary">Modificar</button>
			<button onclick="veterinario.eliminar($('#select').val())" class="btn btn-danger">Eliminar</button>
		</form>
	</div>
	<script type="text/javascript">
		$('#formulario > *').hide();
		veterinario.listar('select', false);
	</script>
</body>
</html>