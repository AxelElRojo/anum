<?php
require_once('../.includes/db.inc.php');
require_once('../.includes/util.inc.php');
$id = $db_con->real_escape_string($_POST['idDonador']);
$stmt = $db_con->prepare('SELECT id, fecha, cantidad, idDonador FROM donaciones WHERE eliminado=0 AND idDonador=?');
$stmt->bind_param('i', $id);
$stmt->execute();
$data = [];
$res = $stmt->get_result();
while($row = $res->fetch_assoc())
	array_push($data, $row);
header('Content-Type: application/json');
echo json_encode($data);