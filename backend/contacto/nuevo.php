<?php
require_once('../includes/db.inc.php');
require_once('../includes/util.inc.php');
$data = escapeArray($_POST, $db_con);
$stmt = $db_con->prepare('INSERT INTO contacto(nombre, correo, telefono) VALUES(?,?,?)');
$stmt->bind_param('sss', $data['nombre'], $data['correo'], $data['telefono']);
$stmt->execute();
header('Content-Type: application/json');
echo json_encode(array('exito' => $stmt->affected_rows));