var contacto = {};
contacto.alta = (nombre, correo, telefono) => {
	if(!nombre || !correo || !telefono)
		mostrarMensaje('Llenar datos');
	else
		$.ajax({
			url: "http://localhost/anum/backend/contacto/nuevo.php",
			data: {
				nombre: nombre,
				correo: correo,
				telefono: telefono
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
contacto.listar = (idElemento, tabla = true) => {
	$.ajax({
		url: "http://localhost/anum/backend/contacto/listar.php",
		method: "POST",
		success : ( response ) => {
			for (var i = 0; i < response.data.length; i++) {
				if(tabla){
					var nombre = $("<td></td>").text(response.data[i].nombre);
					var correo = $("<td></td>").text(response.data[i].correo);
					var telefono = $("<td></td>").text(response.data[i].telefono);
					var row = $("<tr></tr>");
					row.append(nombre);
					row.append(correo);
					row.append(telefono);
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
}
contacto.modificar = (idContacto, nombre, correo, telefono) => {
	if(!idContacto || !nombre || !correo || !telefono)
		mostrarMensaje('Llenar datos');
	else
		$.ajax({
			url: "http://localhost/anum/backend/contacto/modificar.php",
			method: "POST",
			data: {
				id: idContacto,
				nombre: nombre,
				correo: correo,
				telefono: telefono
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
contacto.cargar = (idContacto) => {
	if(!idContacto)
		mostrarMensaje('Llenar datos');
	else
		$.ajax({
			url: "http://localhost/anum/backend/contacto/detalles.php",
			method: "POST",
			data: {
				id: idContacto
			},
			success : ( response ) => {
				$('#correo').val(response.data[0].nombre);
				$('#telefono').val(response.data[0].telefono);
				$('#correo').val(response.data[0].correo);
				$('#formulario > *').show();
			},
			error : ( request, status, error ) => {
				console.log(request.responseText, status, error);
			}
	});
}
animal.eliminar = (idContacto) => {
	if(!idContacto)
		mostrarMensaje("Llenar datos");
	else
		if(confirm("¿Seguro que lo quieres eliminar?")){
			$.ajax({
				url: "http://localhost/anum/backend/contacto/eliminar.php",
				method: "POST",
				data: {
					id: idContacto,
				},
				success : ( response ) => {
					if(response.exito ){
						mostrarMensaje("Eliminación exitosa");
						location.reload();
					}
				},
				error : ( request, status, error ) => {
					console.log(request.responseText, status, error);
				}
			});
		}
}