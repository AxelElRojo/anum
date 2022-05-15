<?php
require_once('../.includes/db.inc.php');
require_once('../.includes/util.inc.php');
$data = escapeArray($_POST, $db_con);
$stmt = $db_con->prepare('UPDATE animal SET nombre=?, edad=? idEspecie=?, idContacto=? WHERE id=?');
$stmt->bind_param('siiii', $data['nombre'], $data['edad'], $dir_pic, $data['idEspecie'], $data['idContacto'], $data['id']);
$stmt->execute();
header('Content-Type: application/json');
echo json_encode(array("exito" => $stmt->affected_rows == 1));