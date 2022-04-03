var enfermedad = {};
enfermedad.alta = (nombre, descripcion, idAnimal, tratoEspecial) => {
	if(!nombre || !descripcion || !idAnimal || !tratoEspecial)
		mostrarMensaje('Llenar los datos');
	else
		$.ajax({
			url: "http://localhost/anum/backend/enfermedad/nuevo.php",
			data: {
				nombre: nombre,
				tratoEspecial: tratoEspecial,
				descripcion: descripcion,
				idAnimal: idAnimal
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
enfermedad.listar = (idElemento, idAnimal, tabla = true) => {
	if(!idAnimal)
		mostrarMensaje('Llenar datos');
	else
		$.ajax({
			url: "http://localhost/anum/backend/enfermedad/listar.php",
			method: "POST",
			data : {
				idAnimal : idAnimal
			},
			success : ( response ) => {
				for (var i = 0; i < response.data.length; i++){
					if(tabla){
						var nombre = $("<td></td>").text(response.data[i].nombre);
						var descripcion = $("<td></td>").text(response.data[i].descripcion);
						if(response.data[i].curada)
							var curada = $("<td></td>").text('Sí');
						else
							var curada = $("<td></td>").text('No');
						var row = $("<tr></tr>");
						row.append(nombre);
						row.append(descripcion);
						row.append(curada);
						$(`#${idElemento}`).append(row);
						$(`#${idElemento}`).attr('hidden', false);
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
enfermedad.eliminar = (idEnfermedad) => {
	if(confirm('¿Seguro de que lo quieres eliminar?')){
		$.ajax({
			url: "http://localhost/anum/backend/enfermedad/eliminar.php",
			method: "POST",
			data: {
				id: idEnfermedad,
			},
			success : ( response ) => {
				if(response.exito){
					mostrarMensaje('Eliminación exitosa');
					location.reload();
				}
			},
			error : ( request, status, error ) => {
				console.log(request.responseText, status, error);
			}
		});
	}
}
enfermedad.cargar = (idEnfermedad) => {
	if(!idEnfermedad)
		mostrarMensaje('Llenar datos');
	else
		$.ajax({
			url: "http://localhost/anum/backend/enfermedad/detalles.php",
			method: "POST",
			data: {
				id: idEnfermedad
			},
			success : ( response ) => {
				$('#nombre').val(response.data[0].nombre);
				$('#tratoEspecial').val(response.data[0].tratoEspecial);
				$('#descripcion').val(response.data[0].descripcion);
				$('#curada')[0].checked = response.data[0].curada;
				$('#formulario > *').show();
			},
			error : ( request, status, error ) => {
				console.log(request.responseText, status, error);
			}
	});
}
enfermedad.modificar = (idEnfermedad, nombre, tratoEspecial, descripcion, curada) => {
	if(!idEnfermedad || !nombre || !tratoEspecial || !descripcion)
		mostrarMensaje('Llenar datos');
	else
		$.ajax({
			url: "http://localhost/anum/backend/enfermedad/modificar.php",
			method: "POST",
			data: {
				id: idEnfermedad,
				nombre: nombre,
				tratoEspecial: tratoEspecial,
				descripcion: descripcion,
				curada: curada
			},
			success : (response) => {
				if(response.exito)
					mostrarMensaje('Modificación exitosa');
				else
					mostrarMensaje('Modificación fallida');
				
			},
			error : ( request, status, error ) => {
				console.log(request.responseText, status, error);
			}
		});
}