<?php
require_once('../.includes/db.inc.php');
require_once('../.includes/util.inc.php');
$data = escapeArray($_POST, $db_con);
$stmt = $db_con->prepare('UPDATE vacunacion SET tipo=?, marca=?, fecha=?, WHERE id=?');
$stmt->bind_param('sssiii', $data['tipo'], $data['marca'], $data['fecha'], $data['id']);
$stmt->execute();
header('Content-Type: application/json');
echo json_encode(array("exito" => $stmt->affected_rows));