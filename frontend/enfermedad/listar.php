<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Listado de enfermedades</title>
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
		<h1 class="text-center">Listado de enfermedades</h1>
		<select name="" id="select" class="form-control" onchange="cargarEnfermedad()">
			<option value="" selected disabled>Selecciona un animal</option>
		</select>
		<table id="tabla" class="table table-striped table-dark table-bordered table-hover table-sm " hidden>
			<tr>
				<th scope="col" >Nombre</th>
				<th scope="col">Enfermedad</th>
			</tr>
		</table>
	</div>
	<script type="text/javascript">
		const tablaOriginal = $("#tabla").clone();
		$.ajax({
			url: "http://localhost/anum/backend/animal/listar.php",
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
		function cargarEnfermedad()
		{
			$.ajax({
				url: "http://localhost/anum/backend/enfermedad/listar.php",
				method: "POST",
				data: {
					idAnimal: $("#select").val()
				},
				success : ( response ) => {
					$("#tabla").replaceWith(tablaOriginal.clone());
					if(response.data.length == 0)
					{
						alert("sin resultados");
					}
					else
					{
						for (var i = 0; i < response.data.length; i++) 
						{
							var animal = $("<td></td>").text($("#select > option:selected").text());
							var nombre = $("<td></td>").text(response.data[i].nombre);
							var row = $("<tr></tr>");
							row.append(animal);
							row.append(nombre);
							$("#tabla").append(row);
						}
						$("#tabla").attr('hidden', false);
					}
				},
				error : ( request, status, error ) => {
					console.log(request.responseText, status, error);
				}
			});
		}
	</script>
</body>
</html>