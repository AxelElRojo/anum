<?php
require_once('../.includes/db.inc.php');
require_once('../.includes/util.inc.php');
$data = escapeArray($_POST, $db_con);
$stmt = $db_con->prepare('INSERT INTO vacunacion(tipo, marca, fecha, idAnimal, idGasto) VALUES(?,?,?,?,?)');
$stmt->bind_param('sssii', $data['tipo'], $data['marca'], $data['fecha'], $data['idAnimal'], $data['idGasto']);
$stmt->execute();
header('Content-Type: application/json');
if($stmt->affected_rows == 1)
	echo json_encode(array("exito" => true, "id" => $stmt->insert_id));
else
	echo json_encode(array("exito" => false));