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
	<title>Alta de gastos</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
	<script type="text/javascript" src="../includes/js/app.js"></script>
	<script type="text/javascript" src="../includes/js/gasto.js"></script>
</head>
<body>
	<?php
		echo file_get_contents('../includes/header.html');
	?>
	<div class="container">
		<h1 class="text-center">Alta de gastos</h1>
		<form action="#" id="formulario" method="POST" onsubmit="event.preventDefault(); gasto.alta($('#concepto').val(), $('#fecha').val(), $('#cantidad').val())">
			<div class="form-group mb-3">
				<label for="concepto">Concepto:</label>
				<input type="text" class="form-control" id="concepto">
			</div>
			<div class="form-group mb-3">
				<label for="fecha">Fecha:</label>
				<input type="date" class="form-control" id="fecha">
			</div>
			<label for="cantidad">Cantidad:</label>
			<div class="input-group mb-3">
				<div class="input-group-prepend">
					<span class="input-group-text">MXN</span>
				</div>
				<input class="form-control" type="number" id="cantidad" step="0.01" min="0"/>
			</div>
			<button type="submit" class="btn btn-outline-primary">Registrar</button>
			</form>
		</div>
	</body>
	<script>
		let fecha = new Date();
		$('#fecha').val(fecha.toISOString().split('T')[0]);
	</script>
	</html>
</div>