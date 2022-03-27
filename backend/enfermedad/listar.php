<?php
require_once('../.includes/db.inc.php');
require_once('../.includes/util.inc.php');
// $data = escapeArray($_POST, $db_con);
$stmt = $db_con->prepare('SELECT id, nombre, descripcion, tratoEspecial, idAnimal FROM enfermedad WHERE eliminado=0');
// $stmt->bind_param('i', $data['idAnimal']);
$stmt->execute();
$res = $stmt->get_result();
$data = [];
while($row = $res->fetch_assoc())
	array_push($data, $row);
header('Content-Type: application/json');
echo json_encode(array("exito" => $res->num_rows > 0, "data" => $data));