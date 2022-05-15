<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Alta de empleados</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
	<script type="text/javascript" src="../includes/js/app.js"></script>
	<script type="text/javascript" src="../includes/js/especie.js"></script>
	<script type="text/javascript" src="../includes/js/animal.js"></script>
</head>
<body>
	<?php
		if($_SESSION['admin'])
			echo file_get_contents('../includes/admin_header.html');
		else
			echo file_get_contents('../includes/header.html');
	?>
	<div class="container">
		<h1 class="text-center">Alta de empleados</h1>
		<form action="#" id="formulario" method="POST" onsubmit="event.preventDefault(); empleado.alta($('#usuario').val(), $('#nombre').val(), $('#contraseña').val(), $('#correo').val(), $('#area').val(), $('#esAdmin').attr('checked'))">
			<div class="form-group mb-3">
				<label for="usuario">Nombre de usuario:</label>
				<input type="text" class="form-control" placeholder="Ingresa el nombre de usuario" id="usuario">
			</div>
			<div class="form-group mb-3">
				<label for="nombre">Nombre del empleado:</label>
				<input type="text" class="form-control" placeholder="Ingresa el nombre" id="nombre">
			</div>
			<div class="form-group mb-3">
				<label for="contraseña">Constraseña:</label>
				<input type="password" class="form-control" placeholder="Ingresa la contraseña" id="contraseña">
			</div>
			<div class="form-group mb-3">
				<label for="correo">Correo:</label>
				<input type="email" class="form-control" placeholder="Ingresa el correo" id="correo">
			</div>
			<div class="form-group mb-3">
				<label for="area">Area:</label>
				<input type="text" class="form-control" placeholder="Ingresa el area" id="area">
			</div>
			<div class="form-check">
				<label class="form-check-label" for="esAdmin">
			    Administrador
			  	</label>
			   	<input class="form-check-input" type="checkbox" id="esAdmin">
			</div>
			<button type="submit" class="btn btn-outline-primary">Registrar</button>
		</form>
	</div>
	<script type="text/javascript" src="../includes/js/empleado.js"></script>
</body>
</html>