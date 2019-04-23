<?php
class Database {

	//atributs prive
	private $PDOInstance = null;
	private static $instance = null;

	//constantes
	const _DATABASE = 'poodb';
	const _HOST = 'localhost';
	const _USERNAME = 'root';
	const _PASSWORD = 'root';

	//constructeur
	private function __construct()
	{
		$this->PDOInstance = new PDO('mysql:dbname='.self::_DATABASE.';host'.self::_HOST,self::_USERNAME ,self::_PASSWORD);
		$this->PDOInstance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
	}

	//method qui appelle mon instance
	public static function getInstance()
	{
		if(is_null(self::$instance))
		{
			self::$instance = new Database();
		}
		return self::$instance;
	}

	//method qui retourne mon instance
	public function query($query)
	{
		return $this->PDOInstance->query($query);
	}
}