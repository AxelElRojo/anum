var empleado = {};
empleado.alta = (usuario, nombre, contraseña, correo, area, esAdmin) => {
	if(!usuario || !nombre || !contraseña || !correo || !area)
		mostrarMensaje('Llenar datos');
	else
		$.ajax({
			url: "http://localhost/anum/backend/empleado/nuevo.php",
			data: {
				usuario: usuario,
				nombre: nombre,
				contraseña: contraseña,
				correo: correo,
				area: area,
				esAdmin: esAdmin
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
empleado.listar = (idElemento, tabla = true) => {
	$.ajax({
		url: "http://localhost/anum/backend/empleado/listar.php",
		method: "POST",
		success : (response) => {
			for (var i = 0; i < response.data.length; i++) {
				if(tabla){
					var nombre = $("<td></td>").text(response.data[i].nombre);
					var area = $("<td></td>").text(response.data[i].area);
					var row = $("<tr></tr>");
					row.append(nombre);
					row.append(area);
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
empleado.eliminar = (idEmpleado) => {
	if(!idEmpleado)
		mostrarMensaje("Llenar datos");
	else
		if(confirm("¿Seguro que lo quieres eliminar?")){
			$.ajax({
				url: "http://localhost/anum/backend/empleado/eliminar.php",
				method: "POST",
				data: {
					id: idEmpleado,
				},
				success : ( response ) => {
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
empleado.modificar = (idEmpleado, usuario, nombre, contraseña, correo, area, esAdmin) => {
	if(!idEmpleado || !usuario || !nombre || !correo || !area)
		mostrarMensaje('Llenar datos');
	else
		$.ajax({
			url: "http://localhost/anum/backend/empleado/modificar.php",
			method: "POST",
			data: {
				idEmpleado: idEmpleado,
				usuario: usuario,
				nombre: nombre,
				contraseña: contraseña,
				correo: correo,
				area: area,
				esAdmin: esAdmin
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
empleado.cargar = (idEmpleado) => {
	if(!idEmpleado)
		mostrarMensaje('Llenar datos');
	else
		$.ajax({
			url: "http://localhost/anum/backend/empleado/detalles.php",
			method: "POST",
			data: {
				id: idEmpleado
			},
			success : (response) => {
				$('#usuario').val(response.data[0].usuario);
				$('#nombre').val(response.data[0].nombre);
				$('#correo').val(response.data[0].correo);
				$('#area').val(response.data[0].area);
				$('#esAdmin').val(response.data[0].esAdmin);
				$('#formulario > *').show();
			},
			error : (request, status, error) => {
				console.log(request.responseText, status, error);
			}
	});
}