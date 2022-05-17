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
	<title>Alta de tratamiento</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
	<script type="text/javascript" src="../includes/js/app.js"></script>
	<script type="text/javascript" src="../includes/js/animal.js"></script>
	<script type="text/javascript" src="../includes/js/tratamiento.js"></script>
	<script type="text/javascript" src="../includes/js/gasto.js"></script>
	<script type="text/javascript">
		animal.listar({}, 'animal', false);
		function wrapper(){
			gasto.alta(`${$('#descripcion').val()} de ${$('#animal option:selected').text()}`, $('#fecha').val(), $('#precio').val(), tratamiento.callback, {
				duracion: $('#duracion').val(),
				frecuencia: $('#frecuencia').val(),
				descripcion: $('#descripcion').val(),
				idAnimal: $('#animal').val()
			});
		}
	</script>
</head>
<body>
	<?php
		if($_SESSION['admin'])
			echo file_get_contents('../includes/admin_header.html');
		else
			echo file_get_contents('../includes/header.html');
	?>
	<div class="container">
		<h1 class="text-center">Alta de tratamiento</h1>
		<form id="formulario" method="POST" onsubmit="event.preventDefault(); wrapper()">
			<div class="form-group mb-3">
				<label for="animal">Selecciona el animal:</label>
				<select class="form-control" id="animal">
				</select>
			</div>
			<div class="form-group">
				<label for="duracion">Duración:</label>
				<input type="text" class="form-control" id="duracion">
			</div>
			<div class="form-group">
				<label for="frecuencia">Frecuencia:</label>
				<input type="text" class="form-control" id="frecuencia">
			</div>
			<div class="form-group">
				<label for="fecha">Descripción:</label>
				<input type="text" class="form-control" id="descripcion">
			</div>
			<div class="form-group">
				<label for="fecha">Fecha:</label>
				<input type="date" class="form-control" id="fecha">
			</div>
			<label for="precio">Costo:</label>
			<div class="input-group mb-3">
				<div class="input-group-prepend">
					<span class="input-group-text">MXN</span>
				</div>
				<input class="form-control" type="number" id="precio" step="0.01" min="0"/>
			</div>
			<button type="submit" class="btn btn-outline-primary">Enviar</button>
		</form>
	</div>
</body>
</html>