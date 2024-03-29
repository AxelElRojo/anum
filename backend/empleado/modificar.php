<?php
require_once('../.includes/db.inc.php');
require_once('../.includes/util.inc.php');
$data = escapeArray($_POST, $db_con);
$data['esAdmin'] = filter_var($data['esAdmin'], FILTER_VALIDATE_BOOLEAN);
if($data['contraseña'] != ""){
	$data['contraseña'] = password_hash($data['contraseña'], PASSWORD_BCRYPT);
	$stmt = $db_con->prepare('UPDATE empleado SET usuario=?, nombre=?, contraseña=?, correo=?, area=?, esAdmin=? WHERE id=?');
	$stmt->bind_param('sssssii', $data['usuario'], $data['nombre'], $data['contraseña'], $data['correo'], $data['area'], $data['esAdmin'], $data['idEmpleado']);
}else{
	$stmt = $db_con->prepare('UPDATE empleado SET usuario=?, nombre=?, correo=?, area=?, esAdmin=? WHERE id=?');
	$stmt->bind_param('ssssii', $data['usuario'], $data['nombre'], $data['correo'], $data['area'], $data['esAdmin'], $data['idEmpleado']);
}
$stmt->execute();
header('Content-Type: application/json');
echo json_encode(array('exito' => $stmt->affected_rows == 1));