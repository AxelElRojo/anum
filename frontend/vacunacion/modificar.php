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
	<title>Modificar vacunas</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
	<script type="text/javascript" src="../includes/js/app.js"></script>
	<script type="text/javascript" src="../includes/js/animal.js"></script>
	<script type="text/javascript" src="../includes/js/vacunacion.js"></script>
</head>
<body>
	<?php
		if($_SESSION['admin'])
			echo file_get_contents('../includes/admin_header.html');
		else
			echo file_get_contents('../includes/header.html');
	?>
	<div class="container">
		<h1 class="text-center">Modificación de vacunación</h1>
		<select class="form-control" id="animal" onchange="vacunacion.listar('select', this.value, false)">
			<option value="" selected disabled>Selecciona el animal:</option>
		</select>
		<select class="form-control" id="select" onchange="vacunacion.cargar(this.value)">
			<option value="" selected disabled>Selecciona la vacuna:</option>
		</select>
		<form action="#" id="formulario" method="POST" onsubmit="event.preventDefault();">
			<div class="form-group mb-3">
				<label for="tipo">Tipo de vacuna:</label>
				<input type="text" class="form-control" id="tipo">
			</div>
			<div class="form-group mb-3">
				<label for="marca">Marca:</label>
				<input type="text" class="form-control"id="marca">
			</div>
			<div class="form-group mb-3">
				<label for="fecha">Fecha:</label>
				<input type="date" class="form-control"id="fecha">
			</div>
			<button onclick="vacunacion.modificar($('#select').val(), $('#marca').val(), $('#tipo').val(), $('#fecha').val())" class="btn btn-outline-primary">Modificar</button>
			<button onclick="vacunacion.eliminar($('#select').val())" class="btn btn-danger">Eliminar</button>
		</form>
	</div>
	<script type="text/javascript">
		$('#formulario > *').hide(); 
		const tablaOriginal = $("#tabla").clone();
		animal.listar({}, 'animal', false);
	</script>
</body>
</html>