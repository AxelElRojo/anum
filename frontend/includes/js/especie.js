var especie = {};
especie.alta = (nombre) => {
	if(!nombre)
		mostrarMensaje('Llenar los datos');
	else
		$.ajax({
			url: "http://localhost/anum/backend/especie/nuevo.php",
			data: {
				nombre: especie
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
};
especie.listar = (idElemento, tabla = true) => {
	$.ajax({
		url: "http://localhost/anum/backend/especie/listar.php",
		method: "POST",
		success : ( response ) => {
			for (var i = 0; i < response.data.length; i++) {
				if(tabla){
					var nombre = $("<td></td>").val(response.data[i].nombre).text(response.data[i].nombre);
					var row = $("<tr></tr>");
					row.append(nombre);
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
especie.modificar = (idEspecie, nombre) => {
	$.ajax({
		url: "http://localhost/anum/backend/especie/modificar.php",
		method: "POST",
		data: {
			id: idEspecie,
			nombre: nombre
		},
		success : ( response ) => {
			console.log(response);
			if(response.exito)
				mostrarMensaje('Registro exitoso');
			else
				mostrarMensaje('Registro fallido');
		},
		error : ( request, status, error ) => {
			console.log(request.responseText, status, error);
		}
	});
}
especie.eliminar = (idEspecie) => {
	if(!idEspecie)
		mostrarMensaje('Llenar datos');
	else if(confirm("seguro"))
		$.ajax({
			url: "http://localhost/anum/backend/animal/eliminar.php",
			method: "POST",
			data: {
				id: idEspecie,
			},
			success : (response) => {
				if(response.exito){
					mostrarMensaje('Registro exitoso');
					location.reload();
				}
			},
			error : ( request, status, error ) => {
				console.log(request.responseText, status, error);
			}
		});
}