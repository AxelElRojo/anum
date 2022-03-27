<?php
require_once('../.includes/db.inc.php');
require_once('../.includes/util.inc.php');
<<<<<<< HEAD
$data = escapeArray($_POST, $db_con);
$stmt = $db_con->prepare('SELECT id, tipo, marca FROM vacunacion WHERE eliminado=0 AND idAnimal=?');
$stmt->bind_param('i', $data['idAnimal']);
=======
// $data = escapeArray($_POST, $db_con);
$stmt = $db_con->prepare('SELECT id, tipo, marca FROM vacunacion WHERE eliminado=0');
// $stmt->bind_param('i', $data['idAnimal']);
>>>>>>> 4ea6ecd43b03975e96e757489393b30009bea14c
$stmt->execute();
$res = $stmt->get_result();
$data = [];
while($row = $res->fetch_assoc())
	array_push($data, $row);
header('Content-Type: application/json');
echo json_encode(array("exito" => $res->num_rows, "data" => $data));