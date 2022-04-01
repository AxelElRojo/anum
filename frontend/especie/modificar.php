<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Modificar especie</title>
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
		<h1 class="text-center">Modificación de especies</h1>
		<select name="" class="form-control" onchange="prepararInput()" id="select">
			<option value="" selected disabled>Selecciona una especie</option>
		</select>
		<form action="#" id="formulario" method="POST" onsubmit="event.preventDefault();">
			<div class="form-group mb-3">
				<label for="nombre">Nombre de la especie:</label>
				<input type="text" class="form-control" placeholder="Ingresa la especie" id="nombre">
			</div>
			<button onclick="modificarEspecie()"  class="btn btn-outline-primary">Modificar</button>
			<button onclick="eliminarEspecie()"  class="btn btn-danger">Eliminar</button>
		</form>		
	</div>
	<script type="text/javascript">
		$('#formulario > *').hide(); 
		const tablaOriginal = $("#tabla").clone();
		$.ajax({
			url: "http://localhost/anum/backend/especie/listar.php",
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
		function prepararInput(){
			var texto = $("#select > option:selected").text();
			$("#nombre").val(texto);
			$("#formulario > *").show();
		}
		function modificarEspecie()
		{
			$.ajax({
				url: "http://localhost/anum/backend/especie/modificar.php",
				method: "POST",
				data: {
					id: $('#select').val(),
					nombre: $('#nombre').val()
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
		function eliminarEspecie()
		{
			if(confirm("seguro"))
			{
				$.ajax({
					url: "http://localhost/anum/backend/animal/eliminar.php",
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