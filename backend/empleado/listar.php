<?php
require_once('../.includes/db.inc.php');
$stmt = $db_con->prepare('SELECT id, nombre, area FROM empleado WHERE eliminado=0');
$stmt->execute();
$res = $stmt->get_result();
$data = [];
while($row = $res->fetch_assoc())
	array_push($data, $row);
header('Content-Type: application/json');
echo json_encode($data);