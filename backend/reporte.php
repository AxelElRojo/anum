<?php
require_once('./.includes/db.inc.php');
header('Content-Type: application/json');
$data['mensual'] = [];
$stmt = $db_con->prepare('SELECT 
	(SELECT COUNT(*) FROM animal WHERE eliminado=0) AS animales,
	(SELECT COUNT(*) FROM donador WHERE eliminado=0) AS donadores,
	(SELECT COUNT(*) FROM veterinario WHERE eliminado=0) AS veterinarios'
);
$stmt->execute();
$res = $stmt->get_result();
$row = $res->fetch_assoc();
foreach($row as $key => $value)
	$data['totales'][$key] = $value;
$month_before = date('Y-m-d', strtotime('-1 month'));
$today = date('Y-m-d', strtotime('today'));
$stmt = $db_con->prepare('SELECT COUNT(*) AS cantidad, SUM(cantidad)*-1 AS total, "gasto" AS tipo FROM gasto WHERE fecha BETWEEN ? AND ?
	UNION
	SELECT COUNT(*) AS cantidad, SUM(cantidad) AS total, "donacion" AS tipo FROM donaciones WHERE fecha BETWEEN ? AND ?'
);
$stmt->bind_param('ssss', $month_before, $today, $month_before, $today);
$stmt->execute();
$res = $stmt->get_result();
$data['mensual']['total'] = 0;
while($row = $res->fetch_assoc()){
	$data['mensual'][$row['tipo']] = $row;
	unset($data['mensual'][$row['tipo']]['tipo']);
	$data['mensual']['total'] += $row['total'];
}
echo json_encode($data);