var gasto = {};
gasto.alta = (concepto, fecha, cantidad) => {
	if(!concepto || !fecha || !cantidad)
		mostrarMensaje('Llenar datos');
	else
		$.ajax({
			url: "http://localhost/anum/backend/gasto/nuevo.php",
			data: {
				concepto: concepto,
				fecha: fecha,
				cantidad: cantidad
			},
			method: "POST",
			success : (response) => {
				if(response.exito)
					mostrarMensaje('Registro exitoso');
			},
			error : ( request, status, error ) => {
				console.log(request.responseText, status, error);
			}
		});
}
gasto.listar = (idElemento, tabla = true) => {
	$.ajax({
		url: "http://localhost/anum/backend/gasto/listar.php",
		method: "POST",
		success : ( response ) => {
			for (var i = 0; i < response.data.length; i++) {
				if(tabla){
					var concepto = $("<td></td>").text(response.data[i].concepto);
					var fecha = $("<td></td>").text(response.data[i].fecha);
					var cantidad = $("<td></td>").text(response.data[i].cantidad);
					var row = $("<tr></tr>");
					row.append(concepto);
					row.append(fecha);
					row.append(cantidad);
					$(`#${idElemento}`).append(row);
				}else{
					var option = $("<option></option>").val(response.data[i].id).text(response.data[i].nombre);
					$(`#${idElemento}`).append(option);
				}
			}
		},
		error : ( request, status, error ) => {
			console.log(request.responseText, status, error);
		}
	});
};