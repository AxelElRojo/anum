<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Modificar vacunas</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<script type="text/javascript" src="../js/app.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
	<?php
		echo file_get_contents('../includes/header.html');
	?>
	<div class="container">
		<h1 class="text-center">Modificación de vacunación</h1>
		<select name="" class="form-control" id="select" onchange="cargaVacunacion()">
			<option value="" selected disabled>Selecciona el tipo de vacuna:</option>
		</select>	
		<form action="#" id="formulario" method="POST" onsubmit="event.preventDefault();">
			<div class="form-group mb-3">
				<label for="tipo">Tipo de vacuna:</label>
				<input type="text" class="form-control" placeholder="Ingresa el tipo de vacuna" id="tipo">
			</div>
			<div class="form-group mb-3">
				<label for="marca">Marca:</label>
				<input type="text" class="form-control"id="marca">
			</div>
			<div class="form-group mb-3">
				<label for="fecha">Fecha:</label>
				<input type="date" class="form-control"id="fecha">
			</div>
			<button onclick="modificarVacunacion()"  class="btn btn-outline-primary">Modificar</button>
			<button onclick="eliminarVacunacion()"  class="btn btn-danger">Eliminar</button>
		</form>		
	</div>

	<script type="text/javascript">
		$('#formulario > *').hide(); 
		const tablaOriginal = $("#tabla").clone();
		$.ajax({
			url: "http://localhost/anum/backend/vacunacion/listar.php",
			method: "POST",
			success : ( response ) => {
				for (var i = 0; i < response.data.length; i++) 
				{
					var option = $("<option></option>").val(response.data[i].id).text(response.data[i].tipo);
					$('#select').append(option);
				}
			},
			error : ( request, status, error ) => {
				console.log(request.responseText, status, error);
			}
		});
		$.ajax({
			url: "http://localhost/anum/backend/vacunacion/listar.php",
			method: "POST",
			success : ( response ) => {
				for (var i = 0; i < response.data.length; i++) 
				{
					var option = $("<option></option>").val(response.data[i].id).text(response.data[i].marca);
					$('#marca').append(option);
				}
			},
			error : ( request, status, error ) => {
				console.log(request.responseText, status, error);
			}
		});
		function cargaVacunacion()
		{
			$.ajax({
				url: "http://localhost/anum/backend/vacunacion/detalles.php",
				method: "POST",
				data: {
					id: $('#select').val()
				},
				success : ( response ) => {
					$('#tipo').val(response.data[0].tipo);
					$('#marca').val(response.data[0].marca);
					$('#fecha').val(response.data[0].fecha);
					$('#formulario > *').show();
				},
				error : ( request, status, error ) => {
					console.log(request.responseText, status, error);
				}
			});
		}
		function modificarVacunacion()
		{
			$.ajax({
				url: "http://localhost/anum/backend/vacunacion/modificar.php",
				method: "POST",
				data: {
					id: $('#select').val(),
					marca: $('#marca').val(),
					tipo: $('#tipo').val(),
					fecha: $('#fecha').val()
				},
				success : ( response ) => {
					console.log(response);
					if(response.exito )
					{
						alert("listo");
					}
					else
					{
						alert('nel pastel');
					}
				},
				error : ( request, status, error ) => {
					console.log(request.responseText, status, error);
				}
			});
		}
		function eliminarVacunacion()
		{
			if(confirm("seguro"))
			{
				$.ajax({
					url: "http://localhost/anum/backend/vacunacion/eliminar.php",
					method: "POST",
					data: {
						id: $('#select').val(),
					},
					success : ( response ) => {
						if(response.exito )
						{
							alert("listo");
							location.reload();
						}
					},
					error : ( request, status, error ) => {
						console.log(request.responseText, status, error);
					}
				});
			}
		}
	</script>
</body>
</html>