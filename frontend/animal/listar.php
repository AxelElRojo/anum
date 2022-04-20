<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Lista de animales</title>
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
		<h1 class="text-center">Listado de animales</h1>
		<table id="tabla" class="table table-striped table-dark table-bordered table-hover table-sm">
			<tr>
				<th scope="col">Nombre</th>
				<th scope="col">Edad</th>
				<th scope="col">Especie</th>
			</tr>
		</table>

	<script type="text/javascript">
		var especies = {};
		$.ajax({
			url: "http://localhost/anum/backend/especie/listar.php",
			method: "POST",
			success : ( response ) => {
				for (var i = 0; i < response.data.length; i++){
					especies[response.data[i].id] = response.data[i].nombre;
				}
			},
			error : ( request, status, error ) => {
				console.log(request.responseText, status, error);
			}
		});
		animal.listar(especies);
	</script>
</body>
</html>