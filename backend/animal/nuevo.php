<?php
require_once('../.includes/db.inc.php');
require_once('../.includes/util.inc.php');
$data = escapeArray($_POST, $db_con);
$stmt = $db_con->prepare('INSERT into animal(nombre, edad, idEspecie, idContacto) VALUES(?,?,?,?)');
$stmt->bind_param('siii', $data['nombre'], $data['edad'], $data['idEspecie'], $data['idContacto']);
$stmt->execute();
header('Content-Type: application/json');
if($stmt->affected_rows == 1)
	echo json_encode(array("exito" => true, "id" => $stmt->insert_id));
else
	echo json_encode(array("exito" => false));