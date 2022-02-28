<?php
function escapeArray(array $original, mysqli $db_con) : array {
	foreach($original as $key => $value)
		$data[$key] = $db_con->real_escape_string($value);
	return $data;
}
function uploadFile(string $base64_img) : string{
	$data = explode(',', $base64_img);
	$filename = $_SERVER['DOCUMENT_ROOT'] . "/img/" . hash('sha256', $data[1]) . '.' . substr($data[0], 11, strpos($data[0], ';') - 11);
	file_put_contents($filename, $data[0]);
	return $filename;
}