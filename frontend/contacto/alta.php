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
	<title>Alta de contactos</title>
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
		<h1 class="text-center">Alta de contactos</h1>
		<form action="#" id="formulario" method="POST" onsubmit="event.preventDefault(); contacto.alta($('#nombre').val(), $('#correo').val(), $('#telefono').val())">
			<div class="form-group mb-3">
				<label for="nombre">Nombre del contacto:</label>
				<input type="text" class="form-control" id="nombre">
			</div>
			<div class="form-group mb-3">
				<label for="correo">Correo:</label>
				<input type="email" class="form-control" id="correo">
			</div>
			<div class="form-group mb-3">
				<label for="telefono">Telefono:</label>
				<input type="tel" class="form-control" id="telefono">
			</div>
			<button type="submit" class="btn btn-outline-primary">Registrar</button>
		</form>
	</div>
	<script type="text/javascript" src="../includes/js/contacto.js"></script>
</body>
</html>