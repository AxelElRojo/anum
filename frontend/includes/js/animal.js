var animal = {};
animal.alta = (nombre, edad, idEspecie, idContacto) => {
	if(!nombre || !edad || !idEspecie || !idContacto)
		mostrarMensaje("Llenar datos completos");
	else
		$.ajax({
			url: "http://localhost/anum/backend/animal/nuevo.php",
			data: {
				nombre: nombre,
				edad: edad,
				idEspecie: idEspecie,
				idContacto: idContacto
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
animal.listar = (especies, idElemento, tabla = true) => {
	$.ajax({
		url: "http://localhost/anum/backend/animal/listar.php",
		method: "POST",
		success : (response) => {
			for (var i = 0; i < response.data.length; i++) {
				if(tabla){
					var nombre = $("<td></td>").text(response.data[i].nombre);
					var edad = $("<td></td>").text(response.data[i].edad);
					var especie = $("<td></td>").text(especies[response.data[i].idEspecie]);
					var row = $("<tr></tr>");
					row.append(nombre);
					row.append(edad);
					row.append(especie);
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
animal.eliminar = (idAnimal) => {
	if(!idAnimal)
		mostrarMensaje("Llenar datos");
	else
		if(confirm("¿Seguro que lo quieres eliminar?")){
			$.ajax({
				url: "http://localhost/anum/backend/animal/eliminar.php",
				method: "POST",
				data: {
					id: idAnimal,
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
animal.modificar = (idAnimal, nombre, edad, idEspecie, idContacto) => {
	if(!idAnimal || !nombre || !edad || !idEspecie || !idContacto)
		mostrarMensaje('Llenar datos');
	else
		$.ajax({
			url: "http://localhost/anum/backend/animal/modificar.php",
			method: "POST",
			data: {
				id: idAnimal,
				nombre: nombre,
				edad: edad,
				idEspecie: idEspecie,
				idContacto: idContacto
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
animal.cargar = (idAnimal) => {
	if(!idAnimal)
		mostrarMensaje('Llenar datos');
	else
		$.ajax({
			url: "http://localhost/anum/backend/animal/detalles.php",
			method: "POST",
			data: {
				id: idAnimal
			},
			success : (response) => {
				$('#edad').val(response.data[0].edad);
				$('#nombre').val(response.data[0].nombre);
				$(`#especie > option[value=${response.data[0].idEspecie}]`).attr("selected", true);
				$(`#contacto > option[value=${response.data[0].idContacto}]`).attr("selected", true);
				$('#formulario > *').show();
			},
			error : (request, status, error) => {
				console.log(request.responseText, status, error);
			}
	});
}