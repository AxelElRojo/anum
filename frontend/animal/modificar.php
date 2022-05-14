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
	<title>Modificar animales</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
	<script type="text/javascript" src="../includes/js/app.js"></script>
	<script type="text/javascript" src="../includes/js/animal.js"></script>
	<script type="text/javascript" src="../includes/js/especie.js"></script>
</head>
<body>
	<?php
		echo file_get_contents('../includes/header.html');
	?>
	<div class="container">
		<h1 class="text-center">Modificación de animales</h1>
		<select name="" class="form-control" id="select" onchange="animal.cargar(this.value)">
			<option value="" selected disabled>Selecciona un animal</option>
		</select>
		<form action="#" id="formulario" method="POST" onsubmit="event.preventDefault();">
			<div class="form-group mb-3">
				<label for="nombre">Nombre del animal:</label>
				<input type="text" class="form-control" placeholder="ingresa el nombre" id="nombre">
			</div>
			<div class="form-group mb-3">
				<label for="edad">Edad:</label>
				<input type="number" min="0" class="form-control" id="edad">
			</div>
			<div class="form-group mb-3">
				<label for="especie">Elige la especie</label>
				<select class="form-control" id="especie">
				</select>
			</div>
			<!-- <div class="form-group mb-3">
				<label for="contacto">contacto:</label>
				<input type="number" min="0" class="form-control" id="contacto">
			</div> -->
			<!-- 
			<div class="form-group mb-3">
				<label>agrega foto del animal</label>
				<input type="file" id="foto" oninput="encodeImgtoBase64()">
			</div> -->
			<button onclick="
				animal.modificar($('#select').val(), $('#nombre').val(), $('#edad').val(), $('#especie').val())"
				class="btn btn-outline-primary">Modificar
			</button>
			<button onclick="
				animal.eliminar($('#select').val())" class="btn btn-danger">Eliminar
			</button>
		</form>
	</div>
	<script type="text/javascript">
		$('#formulario > *').hide(); 
		const tablaOriginal = $("#tabla").clone();
		animal.listar({}, 'select', false);
		especie.listar('especie');
	</script>
</body>
</html>