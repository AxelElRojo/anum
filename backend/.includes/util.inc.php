<?php
function escapeArray(array $original, mysqli $db_con) : array {
	foreach($original as $key => $value)
		$data[$key] = $db_con->real_escape_string($value);
	return $data;
}
function uploadFile(string $base64_img) : string {
	$data = explode(',', $base64_img);
	$extension = explode('/', mime_content_type($base64_img))[1];
	$filename = $_SERVER['DOCUMENT_ROOT'] . "/img/" . hash('sha256', $data[1]) . '.' . $extension;
	file_put_contents($filename, $data[1]);
	return $filename;
}
function isEmailRegistered(string $email, mysqli $db_con) : bool {
	$stmt = $db_con->prepare('SELECT 1 FROM empleado WHERE correo=?');
	$stmt->bind_param('s', $db_con->real_escape_string($email));
	$stmt->execute();
	$stmt->store_result();
	return $stmt->num_rows() > 0;
}
function session_exists() : bool {
	if(isset($_COOKIE['sess_id']))
		session_id($_COOKIE['sess_id']);
	elseif(isset($_COOKIE['PHPSESSID']))
		session_id($_COOKIE['PHPSESSID']);
	else
		return false;
	session_start();
	return isset($_SESSION['id']);
}