<?php
require_once('../.includes/db.inc.php');
require_once('../.includes/util.inc.php');
$data = escapeArray($_POST, $db_con);
$stmt = $db_con->prepare('UPDATE veterinario SET nombre=?, correo=?, telefono=?, direccion=?, horario=? WHERE id=?');
$stmt->bind_param('sssssi', $data['nombre'], $data['correo'], $data['telefono'], $data['direccion'], $data['horario'], $data['id']);
$stmt->execute();
header('Content-Type: application/json');
echo json_encode(array('exito' => $stmt->affected_rows == 1));