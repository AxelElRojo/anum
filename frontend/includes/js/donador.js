var donador = {};
donador.alta = (nombre, rfc, correo) => {
	if(!nombre || !rfc || !correo)
		mostrarMensaje("Llenar datos completos");
	else
		$.ajax({
			url: "http://localhost/anum/backend/donador/nuevo.php",
			data: {
				nombre: nombre,
				rfc: rfc,
				correo: correo
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
donador.eliminar = (idDonador) => {
	if(!idDonador)
		mostrarMensaje("Llenar datos");
	else
		if(confirm("¿Seguro que lo quieres eliminar?")){
			$.ajax({
				url: "http://localhost/anum/backend/donador/eliminar.php",
				method: "POST",
				data: {
					id: idDonador,
				},
				success : (response) => {
					if(response.exito){
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
donador.modificar = (idDonador, nombre, rfc, correo) => {
	if(!idDonador || !nombre || !rfc || !correo)
		mostrarMensaje('Llenar datos');
	else
		$.ajax({
			url: "http://localhost/anum/backend/donador/modificar.php",
			method: "POST",
			data: {
				id: idDonador,
				nombre: nombre,
				rfc: rfc,
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
donador.cargar = (idDonador) => {
	if(!idDonador)
		mostrarMensaje('Llenar datos');
	else
		$.ajax({
			url: "http://localhost/anum/backend/donador/detalles.php",
			method: "POST",
			data: {
				id: idDonador
			},
			success : (response) => {
				$('#rfc').val(response.data[0].rfc);
				$('#nombre').val(response.data[0].nombre);
				$('#correo').val(response.data[0].correo);
				$('#formulario > *').show();
			},
			error : (request, status, error) => {
				console.log(request.responseText, status, error);
			}
    	});
}