<?php
require_once('../includes/db.inc.php');
require_once('../includes/util.inc.php');
$stmt = $db_con->prepare('SELECT id, nombre FROM animal WHERE eliminado=0');
$stmt->execute();
$res = $stmt->get_result();
$data = [];
while($row = $res->fetch_assoc())
	array_push($data, $row);
header('Content-Type: application/json');
echo json_encode(array("exito" => $res->num_rows > 0, "data" => $data));