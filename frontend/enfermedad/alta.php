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
	<title>Alta de enfermedad</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
	<script type="text/javascript" src="../includes/js/app.js"></script>
	<script type="text/javascript" src="../includes/js/animal.js"></script>
	<script type="text/javascript" src="../includes/js/enfermedad.js"></script>
	<script type="text/javascript">
		animal.listar('idAnimal');
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
		<h1 class="text-center">Alta de enfermedad</h1>
		<form action="#" id="formulario" method="POST" onsubmit="event.preventDefault();
			enfermedad.alta($('#nombre').val(), $('#descripcion').val(), $('#idAnimal').val(), $('#tratoEspecial').val())">
			<div class="form-group">
				<label for="nombre">Nombre:</label>
				<input type="text" class="form-control" placeholder="Ingresa el nombre de la enfermedad" id="nombre">
			</div>
			<div class="form-group">
				<label for="descripcion">Descripcion:</label>
				<input type="text" class="form-control" placeholder="Ingresa la descripcion" id="descripcion">
			</div>
			<div class="form-group">
				<label for="tratoEspecial">Trato especial</label>
				<input type="text" class="form-control" placeholder="Ingresa la descripcion" id="tratoEspecial">
			</div>
			<div class="form-group mb-3">
				<label for="idAnimal">Selecciona el animal:</label>
				<select class="form-control" id="idAnimal">
				</select>
			</div> 
			<button type="submit" class="btn btn-outline-primary">Registrar</button>
		</form>
	</div>
</body>
</html>