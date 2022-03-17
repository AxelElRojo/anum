<?php
require_once('../includes/db.inc.php');
require_once('../includes/util.inc.php');
$data = escapeArray($_POST, $db_con);
$stmt = $db_con->prepare('UPDATE enfermedad SET nombre=?, tratoEspecial=?, descripcion=?, idAnimal=? WHERE id=?');
$stmt->bind_param('sssii', $data['nombre'], $data['tratoEspecial'], $data['descripcion'], $data['idAnimal'], $data['id']);
$stmt->execute();
header('Content-Type: application/json');
echo json_encode(array('exito' => $stmt->affected_rows == 1));