<?php
require_once('../.includes/util.inc.php');
header('Content-Type: application/json');
if(session_exists()){
	session_destroy();
	echo json_encode(array('exito' => true));
}else
	echo json_encode(array('exito' => false));