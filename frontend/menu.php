<?php
require_once('../backend/.includes/util.inc.php');
if(!session_exists()){
	header('Location: index.php');
	die();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Menú principal</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/chart.js@3.7.1/dist/chart.min.js"></script>
	<script src="./includes/js/app.js"></script>
</head>
<body>
	<?php
		if($_SESSION['admin'])
			echo file_get_contents('./includes/admin_header.html');
		else
			echo file_get_contents('./includes/header.html');
	?>
	<canvas id="grafico" height="50" width="150"></canvas>
</body>
<script>
	const ctx = document.getElementById('grafico').getContext('2d');
	$.ajax({
		method: "POST",
		url: "http://localhost/anum/backend/reporte.php",
		success: (response) => {
			const myChart = new Chart(ctx, {
				type: 'bar',
				data: {
					labels: ['Donaciones $MXN', 'Gastos $MXN', 'Ahorros $MXN'],
					datasets: [{
						data: [response.mensual.donacion.total, response.mensual.gasto.total, response.mensual.total],
						backgroundColor: [
							'rgba(86, 240, 86, 0.2)',
							'rgba(255, 99, 132, 0.2)',
							'rgba(54, 162, 235, 0.2)',
						],
						borderColor: [
							'rgba(86, 240, 86, 1)',
							'rgba(255, 99, 132, 1)',
							'rgba(54, 162, 235, 1)',
						],
						borderWidth: 1
					}]
				},
				options: {
					responsive: true,
					scales: {
						y: {
							beginAtZero: true
						}
					},
					plugins: {
						title: {
							display: true,
							text: 'Donaciones y gastos en el último mes',
						},
						legend: {
							display: false
						}
					}
				}
			});
		},
		error : (request, status, error) => {
			console.log(request.responseText, status, error);
		}
	})
</script>
</html>