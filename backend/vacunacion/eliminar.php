<?php
require_once('../.includes/db.inc.php');
require_once('../.includes/util.inc.php');
$id = $db_con->real_escape_string($_POST['id']);
$stmt = $db_con->prepare('UPDATE vacunacion SET eliminado=1 WHERE id=?');
$stmt->bind_param('i', $id);
$stmt->execute();
header('Content-Type: application/json');
echo json_encode(array("exito" => $stmt->affected_rows));