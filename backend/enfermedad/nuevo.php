<?php
require_once('../includes/db.inc.php');
require_once('../includes/util.inc.php');
$data = escapeArray($_POST, $db_con);
$stmt = $db_con->prepare('INSERT INTO enfermedad(nombre, tratoEspecial, descripcion, idAnimal) VALUES(?,?,?,?)');
$stmt->bind_param('sssi', $data['nombre'], $data['tratoEspecial'], $data['descripcion'], $data['idAnimal']);
$stmt->execute();
header('Content-Type: application/json');
echo json_encode(array('exito' => $stmt->affected_rows == 1));