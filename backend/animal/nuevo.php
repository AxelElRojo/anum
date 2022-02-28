<?php
require_once('../includes/db.inc.php');
require_once('../includes/util.inc.php');
$data = escapeArray($_POST, $db_con);
$dir_pic = uploadFile($_POST['foto']);
$stmt = $db_con->prepare('INSERT into animal(nombre, edad, foto, idEspecie) VALUES(?,?,?,?)');
$stmt->bind_param('sisi', $data['nombre'], $data['edad'], $dir_pic, $data['especie']);
$stmt->execute();
header('Content-Type: application/json');
if($stmt->affected_rows == 1)
	echo json_encode(array("exito" => true, "id" => $stmt->insert_id));
else
	echo json_encode(array("exito" => false));