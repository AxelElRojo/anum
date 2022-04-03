var tratamiento = {};
tratamiento.alta = (duracion, frecuencia, descripcion, idAnimal) => {
	if(!duracion || !frecuencia || !descripcion || !idAnimal)
		mostrarMensaje('Llenar los datos');
	else
		$.ajax({
			url: "http://localhost/anum/backend/tratamiento/nuevo.php",
			data: {
				duracion: duracion,
				frecuencia: frecuencia,
				descripcion: descripcion,
				idAnimal: idAnimal
			},
			method: "POST",
			success : ( response ) => {
				if(response.exito){
					mostrarMensaje('Registro exitoso');
					window.reload();
				}
			},
			error : ( request, status, error ) => {
				console.log(request.responseText, status, error);
			}
	});
};
tratamiento.modificar = (idTratamiento, duracion, frecuencia, descripcion) => {
	if(!idTratamiento || !duracion || !frecuencia || !descripcion)
		mostrarMensaje('Llenar datos');
	else
		$.ajax({
			url: "http://localhost/anum/backend/animal/modificar.php",
			method: "POST",
			data: {
				id: idTratamiento,
				duracion: duracion,
				frecuencia: frecuencia,
				descripcion: descripcion
			},
			success : (response) => {
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
tratamiento.eliminar = (idTratamiento) => {
	if(!idTratamiento)
		mostrarMensaje('Llenar datos');
	else if(confirm("¿Seguro que lo quieres eliminar?")){
		$.ajax({
			url: "http://localhost/anum/backend/tratamiento/eliminar.php",
			method: "POST",
			data: {
				id: idTratamiento,
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
}
tratamiento.listar = (idElemento, idAnimal, tabla = true) => {
	if(!idAnimal)
		mostrarMensaje('Llenar datos');
	else
		$.ajax({
			url: "http://localhost/anum/backend/tratamiento/listar.php",
			method: "POST",
			data : {
				idAnimal : idAnimal
			},
			success : ( response ) => {
				var i;
				if(tabla){
					$("#tabla").replaceWith(tablaOriginal.clone());
					if(response.data.length == 0)
						mostrarMensaje('Sin resultados');
					else{
						for (i = 0; i < response.data.length; i++) {
							var duracion = $("<td></td>").text(response.data[i].duracion);
							var frecuencia = $("<td></td>").text(response.data[i].frecuencia);
							var descripcion = $("<td></td>").text(response.data[i].descripcion);
							var row = $("<tr></tr>");
							row.append(duracion);
							row.append(frecuencia);
							row.append(descripcion);
							$("#tabla").append(row);
						}
						$("#tabla").show();
					}
				}else
					for (i = 0; i < response.data.length; i++){
						var option = $("<option></option>").val(response.data[i].id).text(response.data[i].duracion);
						$(`#${idElemento}`).append(option);
					}
			},
			error : ( request, status, error ) => {
				console.log(request.responseText, status, error);
			}
		});
}
tratamiento.cargar = (idTratamiento) => {
	if(!idTratamiento)
		mostrarMensaje('Llenar datos');
	else
		$.ajax({
			url: "http://localhost/anum/backend/tratamiento/detalles.php",
			method: "POST",
			data: {
				id: idTratamiento
			},
			success : ( response ) => {
				console.log(response);
				$('#duracion').val(response.data[0].duracion);
				$('#frecuencia').val(response.data[0].frecuencia);
				$('#descripcion').val(response.data[0].descripcion);
				$('#formulario > *').show();
			},
			error : ( request, status, error ) => {
				console.log(request.responseText, status, error);
			}
		});
}