<?php
require_once('../.includes/db.inc.php');
require_once('../.includes/util.inc.php');
$id = $db_con->real_escape_string($_GET['idAnimal']);

$stmt = $db_con->prepare('SELECT animal.*, especie.nombre AS especie FROM animal JOIN especie ON animal.idEspecie = especie.id WHERE animal.id=?');
$stmt->bind_param('i', $id);
$stmt->execute();
$res = $stmt->get_result();
$data['animal'] = $res->fetch_assoc();

$stmt = $db_con->prepare('SELECT * FROM enfermedad WHERE idAnimal=?');
$stmt->bind_param('i', $id);
$stmt->execute();
$res = $stmt->get_result();
$data['enfermedades'] = [];
while($row = $res->fetch_assoc())
	array_push($data['enfermedades'], $row);

$stmt = $db_con->prepare('SELECT * FROM vacunacion WHERE idAnimal=?');
$stmt->bind_param('i', $id);
$stmt->execute();
$res = $stmt->get_result();
$data['vacunas'] = [];
while($row = $res->fetch_assoc())
	array_push($data['vacunas'], $row);

$stmt = $db_con->prepare('SELECT * FROM tratamiento WHERE idAnimal=?');
$stmt->bind_param('i', $id);
$stmt->execute();
$res = $stmt->get_result();
$data['tratamientos'] = [];
while($row = $res->fetch_assoc())
	array_push($data['tratamientos'], $row);

header('Content-Type: application/json');
echo json_encode($data);