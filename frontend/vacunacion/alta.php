<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Alta de vacunación</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<script type="text/javascript" src="../js/app.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
	<script type="text/javascript">
		$.ajax({
			url: "http://localhost/anum/backend/animal/listar.php",
			method: "POST",
			success : ( response ) => {
				var select = $('#idAnimal');
				for (var i = 0; i < response.data.length; i++) 
				{
					var option = $("<option></option>").val(response.data[i].id).text(response.data[i].nombre);
					$('#idAnimal').append(option);
				}
			},
			error : ( request, status, error ) => {
				console.log(request.responseText, status, error);
			}
		});
	</script>
</head>
<body>
	<?php
		echo file_get_contents('../includes/header.html');
	?>
	<div class="container">
		<h1 class="text-center">Alta de vacunación</h1>
		<form action="#" id="formulario" method="POST" onsubmit="event.preventDefault(); altaVacunacion()">
			<div class="form-group">
				<label for="tipo">Tipo de vacuna:</label>
				<input type="text" class="form-control" placeholder="Ingresa el tipo" id="tipo">
			</div>
			<div class="form-group">
				<label for="marca">Marca:</label>
				<input type="text" class="form-control" placeholder="Ingresa la marca" id="marca">
			</div>
			<div class="form-group">
				<label for="fecha">Fecha:</label>
				<input type="date" class="form-control" placeholder="Ingresa la fecha" id="fecha">
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