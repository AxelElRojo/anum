<?php
require_once('../.includes/db.inc.php');
require_once('../.includes/util.inc.php');
$data = escapeArray($_POST, $db_con);
$stmt = $db_con->prepare('UPDATE donador nombre=?, rfc=?, correo=? WHERE id=?');
$stmt->bind_param('sssi', $data['nombre'], $data['rfc'], $data['correo'], $data['id']);
$stmt->execute();
header('Content-Type: application/json');
echo json_encode(array('exito' => $stmt->affected_rows == 1));