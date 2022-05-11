<?php
require_once('../backend/.includes/util.inc.php');
header('Content-Type: application/json');
if(session_exists()){
	header('Location: menu.php');
	die();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Inicio de sesión</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<script src="./includes/js/app.js"></script>
</head>
<body>
	<div class="container col-md-4 col-md-offset-4">
		<h1 class="text-center">Fundación Anum: Control Interno</h1>
		<h4 class="text-center">Inicio de sesión</h4>
		<form method="POST" onsubmit="event.preventDefault(); login();">
			<div class="mb-3">
				<input type="email" class="form-control" id="correo" placeholder='Correo electrónico o Usuario' aria-describedby="emailHelp">
			</div>
			<div class="mb-3">
				<input type="password" class="form-control" id="contraseña" placeholder="Contraseña">
			</div>
			<div class="text-center">
				<button type="submit" class="btn btn-success btn-lg">Entrar</button>
			</div>
		</form>
	</div>
</body>
</html>