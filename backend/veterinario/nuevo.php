<?php
require_once('../.includes/db.inc.php');
require_once('../.includes/util.inc.php');
$data = escapeArray($_POST, $db_con);
$stmt = $db_con->prepare('INSERT INTO veterinario(nombre, correo, telefono, direccion, horario) VALUES(?,?,?,?,?)');
$stmt->bind_param('sssss', $data['nombre'], $data['correo'], $data['telefono'], $data['direccion'], $data['horario']);
$stmt->execute();
header('Content-Type: application/json');
echo json_encode(array('exito' => $stmt->affected_rows == 1));