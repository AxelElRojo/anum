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
			success : ( response ) => {
				if(response.exito)
					mostrarMensaje('Registro exitoso');
			},
			error : ( request, status, error ) => {
				console.log(request.responseText, status, error);
			}
		});
}
donacion.listar = (idElemento) => {
	$.ajax({
		url: "http://localhost/anum/backend/donacion/listar.php",
		method: "POST",
		success : ( response ) => {
			for (var i = 0; i < response.data.length; i++) {
				var fecha = $("<td></td>").text(response.data[i].fecha);
				var cantidad = $("<td></td>").text(response.data[i].cantidad);
				var donador = $("<td></td>").text($("#donador > option:selected").text());
				var row = $("<tr></tr>");
				row.append(fecha);
				row.append(cantidad);
				row.append(donador);
				$(`#${idElemento}`).append(row);
			}
		},
		error : ( request, status, error ) => {
			console.log(request.responseText, status, error);
		}
	});
}