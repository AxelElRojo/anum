<?php
require_once('../includes/db.inc.php');
require_once('../includes/util.inc.php');
$data = escapeArray($_POST, $db_con);
$stmt = $db_con->prepare('SELECT id, duracion, frecuencia, descripcion FROM tratamiento WHERE idAnimal=? AND eliminado=0');
$stmt->bind_param('i', $data['idAnimal']);
$stmt->execute();
$res = $stmt->get_result();
$data = [];
while($row = $res->fetch_assoc())
	array_push($data, $row);
header('Content-Type: application/json');
echo json_encode($data);