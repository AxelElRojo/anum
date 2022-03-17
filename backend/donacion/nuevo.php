<?php
require_once('../.includes/db.inc.php');
require_once('../.includes/util.inc.php');
$data = escapeArray($_POST, $db_con);
$stmt = $db_con->prepare('INSERT INTO donaciones(fecha, cantidad, idDonador) VALUES(?,?,?)');
$stmt->bind_param('sdi', $data['fecha'], $data['cantidad'], $data['idDonador']);
$stmt->execute();
header('Content-Type: application/json');
echo json_encode(array('exito' => $stmt->affected_rows == 1));