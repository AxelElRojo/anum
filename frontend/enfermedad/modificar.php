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
	<title>Modificación de enfermedad</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
	<script type="text/javascript" src="../includes/js/app.js"></script>
	<script type="text/javascript" src="../includes/js/animal.js"></script>
	<script type="text/javascript" src="../includes/js/enfermedad.js"></script>
</head>
<body>
	<?php
		if($_SESSION['admin'])
			echo file_get_contents('../includes/admin_header.html');
		else
			echo file_get_contents('../includes/header.html');
	?>
	<div class="container">
		<h1 class="text-center">Modificación de enfermedad</h1>
		<select name="" class="form-control" id="animal" onchange="enfermedad.listar('select', this.value, false)">
			<option value="" selected disabled>Selecciona un animal</option>
		</select>
		<select name="" class="form-control" id="select" oninput="enfermedad.cargar(this.value)">
			<option value="" selected disabled>Selecciona una enfermedad</option>
		</select>
		<form action="#" id="formulario" method="POST" onsubmit="event.preventDefault();">
			<div class="form-group mb-3">
				<label for="nombre">Nombre de la enfermdad:</label>
				<input type="text" class="form-control" id="nombre">
			</div>
			<div class="form-group mb-3">
				<label for="descripcion">Descripcion:</label>
				<input type="text" min="0" class="form-control" id="descripcion">
			</div>
			<div class="form-group mb-3">
				<label for="tratoEspecial">Trato especial:</label>
				<input type="text" class="form-control" id="tratoEspecial">
			</div>
			<div class="form-check">
				<input class="form-check-input" type="checkbox" id="curada">
				<label class="form-check-label" for="curada">
					Enfermedad curada
				</label>
			</div>
			<button onclick="enfermedad.modificar($('#select').val(), $('#nombre').val(), $('#tratoEspecial').val(), $('#descripcion').val(), $('#curada')[0].checked)" class="btn btn-outline-primary">Modificar</button>
			<button onclick="enfermedad.eliminar($('#select').val())" class="btn btn-danger">Eliminar</button>
		</form>
	</div>
	<script type="text/javascript">
		$('#formulario > *').hide();
		const tablaOriginal = $("#tabla").clone();
		animal.listar({}, 'animal', false);
	</script>
</body>
</html>