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
	<title>Alta de donación</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
	<script type="text/javascript" src="../includes/js/app.js"></script>
	<script type="text/javascript" src="../includes/js/donador.js"></script>
	<script type="text/javascript" src="../includes/js/donacion.js"></script>
</head>
<body>
	<?php
		if($_SESSION['admin'])
			echo file_get_contents('../includes/admin_header.html');
		else
			echo file_get_contents('../includes/header.html');
	?>
	<div class="container">
		<h1 class="text-center">Alta de donación</h1>
		<form action="#" id="formulario" method="POST" onsubmit="event.preventDefault(); donacion.alta($('#fecha').val(), $('#cantidad').val(), $('#donador').val())">
			<div class="form-group mb-3">
				<label for="donador">Donador:</label>
				<select class="form-control" id='donador'>
					<option selected disabled value=''>Selecciona un donador</option>
				</select>
			<label for="cantidad">Cantidad:</label>
			<div class="input-group mb-3">
				<div class="input-group-prepend">
					<span class="input-group-text">MXN</span>
				</div>
				<input class="form-control" type="number" id="cantidad" step="0.01" min="0"/>
			</div>
				<label for="fecha">Fecha:</label>
				<input class="form-control" type="date" id="fecha"/>
			</div>
			<button type="submit" class="btn btn-outline-primary">Registrar</button>
		</form>
	</div>
	<script>
		donador.listar('donador', false);
		let fecha = new Date();
		$('#fecha').val(fecha.toISOString().split('T')[0]);
	</script>
</body>
</html>