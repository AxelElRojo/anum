var gasto = {};
gasto.alta = (concepto, fecha, cantidad, callback = null, args = {}) => {
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
				if(callback){
					args.idGasto = response.id;
					callback(args);
				}else if(response.exito)
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
			for (var i = 0; i < response.length; i++) {
				if(tabla){
					var concepto = $("<td></td>").text(response[i].concepto);
					var fecha = $("<td></td>").text(response[i].fecha);
					var cantidad = $("<td></td>").text(response[i].cantidad);
					var row = $("<tr></tr>");
					row.append(concepto);
					row.append(fecha);
					row.append(cantidad);
					$(`#${idElemento}`).append(row);
				}else{
					var option = $("<option></option>").val(response[i].id).text(response[i].nombre);
					$(`#${idElemento}`).append(option);
				}
			}
		},
		error : ( request, status, error ) => {
			console.log(request.responseText, status, error);
		}
	});
};