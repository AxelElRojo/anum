<?php
require_once('../.includes/db.inc.php');
require_once('../.includes/util.inc.php');
$data = escapeArray($_POST, $db_con);
$stmt = $db_con->prepare('SELECT id, nombre, contraseña FROM empleado WHERE correo=? OR usuario=? LIMIT 1');
$stmt->bind_param('ss', $data['correo'], $data['correo']);
$stmt->execute();
$res = $stmt->get_result();
$row = $res->fetch_assoc();
header('Content-Type: application/json');
if(password_verify($data['contraseña'], $row['contraseña'])){
	session_start();
	$sess_id = session_id();
	$_SESSION['id'] = $row['id'];
	$_SESSION['nombre'] = $row['nombre'];
	session_commit();
	setcookie('sess_id', $sess_id, strtotime('+1 month'));
	echo json_encode(array('exito' => true));
}else{
	echo json_encode(array('exito' => false));
}