<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Modificación de enfermedad</title>
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
		<h1 class="text-center">Modificación de enfermedad</h1>
		<select name="" class="form-control" id="select" onchange="cargaEnfermedad()">
			<option value="" selected disabled>Selecciona una enfermedad</option>
		</select>	
		<form action="#" id="formulario" method="POST" onsubmit="event.preventDefault();">
			<div class="form-group mb-3">
				<label for="nombre">Nombre de la enfermdad:</label>
				<input type="text" class="form-control" placeholder="Ingresa el nombre" id="nombre">
			</div>
			<div class="form-group mb-3">
				<label for="descripcion">Descripcion:</label>
				<input type="text" min="0" class="form-control" id="descripcion">
			</div>
			<div class="form-group mb-3">
				<label for="tratoEspecial">Trato especial:</label>
				<input type="text" class="form-control" id="tratoEspecial">
			</div>
			<button onclick="modificarEnfermedad()"  class="btn btn-outline-primary">Modificar</button>
			<button onclick="eliminarEnfermedad()"  class="btn btn-danger">Eliminar</button>
		</form>		
	</div>

	<script type="text/javascript">
		$('#formulario > *').hide(); 
		const tablaOriginal = $("#tabla").clone();
		$.ajax({
			url: "http://localhost/anum/backend/enfermedad/listar.php",
			method: "POST",
			success : ( response ) => {
				for (var i = 0; i < response.data.length; i++) 
				{
					var option = $("<option></option>").val(response.data[i].id).text(response.data[i].nombre);
					$('#select').append(option);
				}
			},
			error : ( request, status, error ) => {
				console.log(request.responseText, status, error);
			}
		});
		function cargaEnfermedad()
		{
			$.ajax({
				url: "http://localhost/anum/backend/enfermedad/detalles.php",
				method: "POST",
				data: {
					id: $('#select').val()
				},
				success : ( response ) => {
					console.log(response.data[0]);
					$('#nombre').val(response.data[0].nombre);
					$('#tratoEspecial').val(response.data[0].tratoEspecial);
					$('#descripcion').val(response.data[0].descripcion);
					$('#formulario > *').show();
				},
				error : ( request, status, error ) => {
					console.log(request.responseText, status, error);
				}
			});
		}
		function modificarEnfermedad()
		{
			$.ajax({
				url: "http://localhost/anum/backend/animal/modificar.php",
				method: "POST",
				data: {
					id: $('#select').val(),
					nombre: $('#nombre').val(),
					tratoEspecial: $('#tratoEspecial').val(),
					descripcion: $('#descripcion').val()
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
		function eliminarEnfermedad()
		{
			if(confirm("seguro"))
			{
				$.ajax({
					url: "http://localhost/anum/backend/enfermedad/eliminar.php",
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