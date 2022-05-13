var donacion = {};
donacion.alta = (fecha, cantidad, idDonador) => {
	if(!fecha || !cantidad || !idDonador)
		mostrarMensaje('Llenar datos');
	else
		$.ajax({
			url: "http://localhost/anum/backend/donacion/nuevo.php",
			data: {
				fecha: fecha,
				cantidad: cantidad,
				idDonador: idDonador
			},
			method: "POST",
			success : (response) => {
				if(response.exito)
					mostrarMensaje('Registro exitoso');
			},
			error : (request, status, error) => {
				console.log(request.responseText, status, error);
			}
		});
}
donacion.listar = (idElemento, idDonador) => {
	$.ajax({
		url: "http://localhost/anum/backend/donacion/listar.php",
		method: "POST",
		data: {
			idDonador : idDonador
		},
		success : (response) => {
			console.log(response);
			$(`#${idElemento}`).replaceWith(tablaOriginal.clone());
			for (var i = 0; i < response.length; i++) {
				var fecha = $("<td></td>").text(response[i].fecha);
				var cantidad = $("<td></td>").text(response[i].cantidad);
				var row = $("<tr></tr>");
				row.append(fecha);
				row.append(cantidad);
				$(`#${idElemento}`).append(row);
			}
			$('#tabla').show();
		},
		error : (request, status, error) => {
			console.log(request.responseText, status, error);
		}
	});
}
donacion.reporte = (idElemento, inicio, fin) => {
	if(inicio && fin)
		$.ajax({
			url: "http://localhost/anum/backend/gasto/reporte.php",
			method: "POST",
			data: {
				inicio : inicio,
				fin : fin
			},
			success : (response) => {
				var row;
				$(`#${idElemento}`).replaceWith(tablaOriginal.clone());
				for (var i = 0; i < response.transacciones.length; i++) {
					var fecha = $("<td></td>").text(response.transacciones[i].fecha);
					var concepto = $("<td></td>").text(response.transacciones[i].concepto);
					var cantidad = $("<td></td>").text(response.transacciones[i].cantidad);
					row = $("<tr></tr>");
					row.append(fecha);
					row.append(concepto);
					row.append(cantidad);
					$(`#${idElemento}`).append(row);
				}
				row = $("<tr></tr>");
				row.append($('<th></th>').attr('colspan', 2).text('Total'));
				row.append($('<td></td>').text(response.total));
				$(`#${idElemento}`).append(row);
				$('#tabla').show();
			},
			error : (request, status, error) => {
				console.log(request.responseText, status, error);
			}
		});
}