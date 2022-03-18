<?php
require_once('../.includes/db.inc.php');
require_once('../.includes/util.inc.php');
$data = escapeArray($_POST, $db_con);
$data['esAdmin'] = filter_var($data['esAdmin'], FILTER_VALIDATE_BOOLEAN);
$data['contraseña'] = password_hash($data['contraseña'], PASSWORD_BCRYPT);
$stmt = $db_con->prepare('INSERT INTO empleado(usuario, nombre, contraseña, correo, area, esAdmin) VALUES(?,?,?,?,?,?)');
$stmt->bind_param('sssssi', $data['usuario'], $data['nombre'], $data['contraseña'], $data['correo'], $data['area'], $data['esAdmin']);
$stmt->execute();
header('Content-Type: application/json');
echo json_encode(array("exito" => $stmt->affected_rows));