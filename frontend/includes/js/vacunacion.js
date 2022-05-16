var vacunacion = {};
vacunacion.alta = (tipo, marca, fecha, idAnimal) => {
	if(!tipo || !marca || !fecha || !idAnimal)
		mostrarMensaje("Llenar datos");
	else
		$.ajax({
			url: "http://localhost/anum/backend/vacunacion/nuevo.php",
			data: {
				tipo: tipo,
				marca: marca,
				fecha: fecha,
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
}
vacunacion.callback = (args) => {
	if(!args.tipo || !args.marca || !args.fecha || !args.idAnimal || !args.idGasto)
		console.log(args);
	else
		$.ajax({
			url: "http://localhost/anum/backend/vacunacion/nuevo.php",
			data: {
				tipo: args.tipo,
				marca: args.marca,
				fecha: args.fecha,
				idAnimal: args.idAnimal,
				idGasto: args.idGasto
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
vacunacion.listar = (idElemento, idAnimal, tabla = true) => {
	if(!idAnimal)
		mostrarMensaje('Llenar datos');
	else
		$.ajax({
			url: "http://localhost/anum/backend/vacunacion/listar.php",
			method: "POST",
			data : {
				idAnimal : idAnimal
			},
			success : (response) => {
				var i;
				console.log(response);
				if(tabla){
					$(`#${idElemento}`).replaceWith(tablaOriginal.clone());
					if(response.data.length == 0)
						mostrarMensaje('Sin resultados');
					else{
						for(i=0; i < response.data.length; i++){
							var tipo = $("<td></td>").text(response.data[i].tipo);
							var marca = $("<td></td>").text(response.data[i].marca);
							var fecha = $("<td></td>").text(response.data[i].fecha);
							var row = $("<tr></tr>");
							row.append(tipo);
							row.append(marca);
							row.append(fecha);
							$(`#${idElemento}`).append(row);
						}
						$(`#${idElemento}`).attr('hidden', false);
					}
				}else
					for(i = 0; i < response.data.length; i++){
						var option = $("<option></option>").val(response.data[i].id).text(response.data[i].tipo);
						$(`#${idElemento}`).append(option);
					}
			},
			error : ( request, status, error ) => {
				console.log(request.responseText, status, error);
			}
	});
}
vacunacion.eliminar = (idAnimal) => {
	if(!idAnimal)
		mostrarMensaje('Llenar datos');
	else if(confirm("¿Seguro que quieres eliminar?")){
		$.ajax({
			url: "http://localhost/anum/backend/vacunacion/eliminar.php",
			method: "POST",
			data: {
				id: idAnimal,
			},
			success : (response) => {
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
vacunacion.cargar = (idAnimal) => {
	if(!idAnimal)
		mostrarMensaje('Llenar datos');
	else
		$.ajax({
			url: "http://localhost/anum/backend/vacunacion/detalles.php",
			method: "POST",
			data: {
				id: idAnimal
			},
			success : (response) => {
				$('#tipo').val(response.data[0].tipo);
				$('#marca').val(response.data[0].marca);
				$('#fecha').val(response.data[0].fecha);
				$('#formulario > *').show();
			},
			error : ( request, status, error ) => {
				console.log(request.responseText, status, error);
			}
		});
}
vacunacion.modificar = (idVacunacion, marca, tipo, fecha) => {
	if(!idVacunacion || !marca || !tipo || !fecha)
		mostrarMensaje('Llenar datos');
	else
		$.ajax({
			url: "http://localhost/anum/backend/vacunacion/modificar.php",
			method: "POST",
			data: {
				id: idVacunacion,
				marca: marca,
				tipo: tipo,
				fecha: fecha
			},
			success : (response) => {
				console.log(response);
				if(response.exito){
					mostrarMensaje('Modificación exitosa');
				}else{
					mostrarMensaje('Modificación fallida');
				}
			},
			error : ( request, status, error ) => {
				console.log(request.responseText, status, error);
			}
		});
}