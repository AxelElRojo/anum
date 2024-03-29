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
	<title>Alta de animal</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
	<script type="text/javascript" src="../includes/js/app.js"></script>
	<script type="text/javascript" src="../includes/js/especie.js"></script>
	<script type="text/javascript" src="../includes/js/contacto.js"></script>
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
		<h1 class="text-center">Reporte de animal</h1>
		<div class="form-group mb-3">
			<label for="especie">Elige el animal</label>
			<select class="form-control" id="animal" onchange="animal.reporte(this.value);">
				<option value="" selected disabled>Elige un animal</option>
			</select>
		</div>
		<table id="tabla" class="table table-striped table-dark table-bordered table-hover table-sm text-center">
			<tr>
				<th colspan="3">Acerca del animal</th>
			</tr>
			<tr>
				<th>Nombre</th>
				<th>Especie</th>
				<th>Edad</th>
			</tr>
		</table>
	</div>
</body>
<script>
	animal.listar({}, 'animal', false);
</script>
</html>