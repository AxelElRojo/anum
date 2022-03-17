<?php
require_once('../.includes/db.inc.php');
require_once('../.includes/util.inc.php');
$id = $db_con->real_escape_string($_POST['id']);
$stmt = $db_con->prepare('SELECT * FROM animal WHERE eliminado=0 AND id=?');
$stmt->bind_param('i', $id);
$stmt->execute();
$res = $stmt->get_result();
$data = [];
while($row = $res->fetch_assoc())
	array_push($data, $row);
header('Content-Type: application/json');
echo json_encode(array("exito" => $res->num_rows > 0, "data" => $data));