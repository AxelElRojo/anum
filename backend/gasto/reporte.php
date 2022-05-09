<?php
require_once('../.includes/db.inc.php');
require_once('../.includes/util.inc.php');
$data = escapeArray($_GET, $db_con);
$stmt = $db_con->prepare('(
	SELECT fecha, cantidad, "Donación" AS concepto FROM donaciones WHERE fecha BETWEEN ? AND ?
)UNION(
	SELECT fecha, cantidad*-1, concepto FROM gasto WHERE fecha BETWEEN ? AND ?
)ORDER BY fecha;');
$stmt->bind_param('ssss', $data['inicio'], $data['fin'], $data['inicio'], $data['fin']);
$stmt->execute();
$res = $stmt->get_result();
unset($data);
$data['transacciones'] = [];
$sum = 0;
while($row = $res->fetch_assoc()){
	array_push($data['transacciones'], $row);
	$sum += $row['cantidad'];
}
$data['total'] = $sum;
header('Content-Type: application/json');
echo json_encode($data);