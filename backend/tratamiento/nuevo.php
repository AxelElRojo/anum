<?php
require_once('../.includes/db.inc.php');
require_once('../.includes/util.inc.php');
$data = escapeArray($_POST, $db_con);
$stmt = $db_con->prepare('INSERT INTO tratamiento(duracion, frecuencia, descripcion, idAnimal) VALUES(?,?,?,?)');
$stmt->bind_param('sssi', $data['duracion'], $data['frecuencia'], $data['descripcion'], $data['idAnimal']);
$stmt->execute();
header('Content-Type: application/json');
if($stmt->affected_rows == 1)
	echo json_encode(array("exito" => true, "id" => $stmt->insert_id));
else
	echo json_encode(array("exito" => false));