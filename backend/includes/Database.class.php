<?php
require_once('db_constants.inc.php');
class Database{
	private $pdo;
	private $stmt;
	private $id;
	public function __construct(array $options = []){
		$default_options = [
			PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
			PDO::ATTR_EMULATE_PREPARES => false,
			PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
		];
		$options = array_replace($default_options, $options);
		$dsn = 'mysql:host='. DB_HOST . ';dbname='. DB_NAME . ';port=' . DB_PORT . ';charset=utf8';
		try{
			$this->pdo = new \PDO($dsn, DB_USER, DB_PASS, $options);
		}catch(\PDOException $e){
			throw new \PDOException($e->getMessage(), (int)$e->getCode());
		}
	}
	public function execute(string $sql, array $params = NULL, bool $saveID = false) : bool{
		$this->stmt = $this->pdo->prepare($sql);
		$res = $this->stmt->execute($params);
		if($saveID)
			$this->id = $this->pdo->lastInsertId();
		return $res;
	}
	public function get_results() : array{
		$arr = [];
		while($row = $this->stmt->fetch())
			array_push($arr, $row);
		return $arr;
	}
	public function get_last_id() : int{
		return $this->id;
	}
}