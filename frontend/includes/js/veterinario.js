var veterinario = {};
veterinario.alta = (nombre, correo, telefono, direccion, horario) => {
	if(!nombre || !correo || !telefono || !direccion || !horario)
		mostrarMensaje('Llenar datos');
	else
		$.ajax({
			url: "http://localhost/anum/backend/veterinario/nuevo.php",
			data: {
				nombre: nombre,
				correo: correo,
				telefono: telefono,
				direccion: direccion,
				horario: horario
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
veterinario.listar = (idElemento, tabla = true) => {
	$.ajax({
		url: "http://localhost/anum/backend/veterinario/listar.php",
		method: "POST",
		success : (response) => {
			for (var i = 0; i < response.data.length; i++) {
				if(tabla){
					var nombre = $("<td></td>").text(response.data[i].nombre);
					var telefono = $("<td></td>").text(response.data[i].telefono);
					var direccion = $("<td></td>").text(response.data[i].direccion);
					var row = $("<tr></tr>");
					row.append(nombre);
					row.append(telefono);
					row.append(direccion);
					$(`#${idElemento}`).append(row);
				}else{
					var option = $("<option></option>").val(response.data[i].id).text(response.data[i].nombre);
					$(`#${idElemento}`).append(option);
				}
			}
		},
		error : (request, status, error) => {
			console.log(request.responseText, status, error);
		}
	});
}
veterinario.eliminar = (idVeterinario) => {
	if(!idVeterinario)
		mostrarMensaje("Llenar datos");
	else
		if(confirm("¿Seguro que lo quieres eliminar?")){
			$.ajax({
				url: "http://localhost/anum/backend/veterinario/eliminar.php",
				method: "POST",
				data: {
					id: idVeterinario,
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
veterinario.modificar = (idVeterinario, nombre, correo, telefono, direccion, horario) => {
	if(!idVeterinario || !nombre || !correo || !telefono || !direccion || !horario)
		mostrarMensaje('Llenar datos');
	else
		$.ajax({
			url: "http://localhost/anum/backend/veterinario/modificar.php",
			method: "POST",
			data: {
				id: idVeterinario,
				nombre: nombre,
				correo: correo,
				telefono: telefono,
				direccion: direccion,
				horario: horario
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
veterinario.cargar = (idVeterinario) => {
	if(!idAnimal)
		mostrarMensaje('Llenar datos');
	else
		$.ajax({
			url: "http://localhost/anum/backend/veterinario/detalles.php",
			method: "POST",
			data: {
				id: idVeterinario
			},
			success : ( response ) => {
				$('#nombre').val(response.data[0].nombre);
				$('#correo').val(response.data[0].correo);
				$('#telefono').val(response.data[0].telefono);
				$('#direccion').val(response.data[0].direccion);
				$('#horario').val(response.data[0].horario);
				$('#formulario > *').show();
			},
			error : ( request, status, error ) => {
				console.log(request.responseText, status, error);
			}
	});
}