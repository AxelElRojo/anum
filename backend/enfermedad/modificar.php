<?php
require_once('../.includes/db.inc.php');
require_once('../.includes/util.inc.php');
$data = escapeArray($_POST, $db_con);
$data['curada'] = filter_var($data['curada'], FILTER_VALIDATE_BOOLEAN);
$stmt = $db_con->prepare('UPDATE enfermedad SET nombre=?, tratoEspecial=?, descripcion=?, curada=? WHERE id=?');
$stmt->bind_param('sssii', $data['nombre'], $data['tratoEspecial'], $data['descripcion'], $data['curada'], $data['id']);
$stmt->execute();
header('Content-Type: application/json');
echo json_encode(array('exito' => $stmt->affected_rows == 1));