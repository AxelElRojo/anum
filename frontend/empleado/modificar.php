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
	<title>Modificar empleados</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
	<script type="text/javascript" src="../includes/js/app.js"></script>
	<script type="text/javascript" src="../includes/js/especie.js"></script>
	<script type="text/javascript" src="../includes/js/empleado.js"></script>
</head>
<body>
	<?php
		if($_SESSION['admin'])
			echo file_get_contents('../includes/admin_header.html');
		else
			echo file_get_contents('../includes/header.html');
	?>
	<div class="container">
		<h1 class="text-center">Modificación de empleados</h1>
		<select name="" class="form-control" id="select" onchange="empleado.cargar(this.value)">
			<option value="" selected disabled>Selecciona un empleado</option>
		</select>
		<form action="#" id="formulario" method="POST" onsubmit="event.preventDefault();">
			<div class="form-group mb-3">
				<label for="usuario">Nombre de usuario:</label>
				<input type="text" class="form-control" id="usuario">
			</div>
			<div class="form-group mb-3">
				<label for="nombre">Nombre del empleado:</label>
				<input type="text" class="form-control" id="nombre">
			</div>
			<div class="form-group mb-3">
				<label for="correo">Correo:</label>
				<input type="email" class="form-control" id="correo">
			</div>
			<div class="form-group mb-3">
				<label for="contraseña">Constraseña:</label>
				<input type="password" class="form-control" id="contraseña">
			</div>
			<div class="form-group mb-3">
				<label for="area">Area:</label>
				<input type="text" class="form-control" id="area">
			</div>
			<div class="form-check">
				<label class="form-check-label" for="esAdmin">¿Hacer administrador? </label>
				<input class="form-check-input" type="checkbox" id="esAdmin">
			</div>
			<button onclick="
			empleado.modificar($('#select').val(), $('#usuario').val(), $('#nombre').val(), $('#contraseña').val(), $('#correo').val() , $('#area').val(), $('#esAdmin').prop('checked'))"
			class="btn btn-outline-primary">Modificar
		</button>
		<button onclick="
		empleado.eliminar($('#select').val())" class="btn btn-danger">Eliminar
	</button>
	</form>
	</div>
	<script type="text/javascript">
		$('#formulario > *').hide();
		empleado.listar('select', false);
	</script>
</body>
</html>