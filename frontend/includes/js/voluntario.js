var voluntario = {};
voluntario.alta = (nombre, correo) => {
	if(!nombre || !correo)
		mostrarMensaje("Llenar datos completos");
	else
		$.ajax({
			url: "http://localhost/anum/backend/voluntario/nuevo.php",
			data: {
				nombre: nombre,
				correo: correo
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
voluntario.listar = (idElemento, tabla = true) => {
	$.ajax({
		url: "http://localhost/anum/backend/voluntario/listar.php",
		method: "POST",
		success : (response) => {
			for (var i = 0; i < response.length; i++) {
				if(tabla){
					var nombre = $("<td></td>").text(response[i].nombre);
					var correo = $("<td></td>").text(response[i].correo);
					var row = $("<tr></tr>");
					row.append(nombre);
					row.append(correo);
					$(`#${idElemento}`).append(row);
				}else{
					var option = $("<option></option>").val(response[i].id).text(response[i].nombre);
					$(`#${idElemento}`).append(option);
				}
			}
		},
		error : (request, status, error) => {
			console.log(request.responseText, status, error);
		}
	});
}
voluntario.eliminar = (idVoluntario) => {
	if(!idVoluntario)
		mostrarMensaje("Llenar datos");
	else
		if(confirm("¿Seguro que lo quieres eliminar?")){
			$.ajax({
				url: "http://localhost/anum/backend/voluntario/eliminar.php",
				method: "POST",
				data: {
					id: idVoluntario,
				},
				success : (response) => {
					if(response.exito ){
						mostrarMensaje("Eliminación exitosa");
						location.reload();
					}
				},
				error : (request, status, error) => {
					console.log(request.responseText, status, error);
				}
			});
		}
}
voluntario.modificar = (idVoluntario, nombre, correo) => {
	if(!idVoluntario || !nombre || !correo)
		mostrarMensaje('Llenar datos');
	else
		$.ajax({
			url: "http://localhost/anum/backend/voluntario/modificar.php",
			method: "POST",
			data: {
				id: idVoluntario,
				nombre: nombre,
				correo: correo
			},
			success : (response) => {
				console.log(response);
				if(response.exito){
					mostrarMensaje('Registro exitoso');
					location.reload();
				}else{
					mostrarMensaje('Registro fallido');
					location.reload();
				}
			},
			error : (request, status, error) => {
				console.log(request.responseText, status, error);
			}
		});
}
voluntario.cargar = (idVoluntario) => {
	if(!idVoluntario)
		mostrarMensaje('Llenar datos');
	else
		$.ajax({
			url: "http://localhost/anum/backend/voluntario/detalles.php",
			method: "POST",
			data: {
				id: idVoluntario
			},
			success : (response) => {
                $('#nombre').val(response[0].nombre);
				$('#correo').val(response[0].correo);
				$('#formulario > *').show();
			},
			error : (request, status, error) => {
				console.log(request.responseText, status, error);
			}
	});
}