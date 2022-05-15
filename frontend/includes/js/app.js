function mostrarMensaje(message){
	alert(message);
}
function login(){
	$.ajax({
		method : "POST",
		url : "http://localhost/anum/backend/empleado/login.php",
		data : {
			correo : $('#correo').val(),
			contraseña : $('#contraseña').val()
		},
		success : (response) => {
			if(response.exito)
				location.reload();
			else
				mostrarMensaje('Usuario o contraseña incorrectos');
		},
		error : (request, status, error) => {
			console.log(request.responseText, status, error);
		}
	});
}
function logout(){
	$.ajax({
		method : "POST",
		url : "http://localhost/anum/backend/empleado/logout.php",
		success : (response) => {
			if(response.exito)
				location.reload();
			else
				mostrarMensaje('Error cerrando sesión: Es posible que no haya una sesión iniciada');
		},
		error : (request, status, error) => {
			console.log(request.responseText, status, error);
		}
	});
}