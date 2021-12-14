<?php
/**
* 
*/
class DB
{

	private static $pdo;
	private $host = "localhost";
	private $user = "root";
	private $pass = "";
	public  $db;
	
	public function __construct($db="")
	{
		if ($db == "") {
			die("Ocorreu um erro ao verificar o banco de dados, tente novamente mais tarde.");
		} else {
			$this->db = $db;

			if (!isset(self::$pdo)) {
				try {
					$opcoes = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES UTF8', PDO::ATTR_PERSISTENT => TRUE);
					self::$pdo = new PDO("mysql:host=".$this->host."; dbname=".$this->db."; charset=utf8;", $this->user, $this->pass, $opcoes);
				} catch (PDOException $e) {
					die("Erro: " . $e->getMessage());
				}
			}
		}
	}

	public function listar($column,$parameters="") {

		$sql = "SELECT * FROM ".$column." ".$parameters;

		try{
			$stm = self::$pdo->prepare($sql);
			$stm->execute();
			return $stm->fetchAll(PDO::FETCH_OBJ);
		} catch (PDOException $e) {
			die("Erro: " . $e->getMessage());
		}
	}

	public function atualizar($array='',$table="",$id="")
	{
		$count = count($array);
		$sql_v = "";
		foreach ($array as $key => $value) {
			$sql_v .= " `".$key."` = '".$value."',";
		}

		$sql = "UPDATE `".$table."` SET ".substr($sql_v, 0, -1)." WHERE id = '".$id."'";

		try{
			$stm = self::$pdo->prepare($sql);
			if($stm->execute()){return true;} else {return false;}
			// return $stm->fetchAll(PDO::FETCH_OBJ);
		} catch (PDOException $e) {
			die("Erro: " . $e->getMessage());
		}
	}

	public function cadastrar($array='',$table="")
	{
		$array_count = count($array);
		$i1 = 1;
		foreach ($array as $key => $value) {
			if (isset($ind1) && isset($ind2)) {
				if ($i1 == $array_count) {
					$ind1 .= "`".$key."`";
					$ind2 .= "'".$value."'";
				}	else {
					$ind1 .= "`".$key."`, ";
					$ind2 .= "'".$value."',";
				}
			} else {
				if ($i1 == $array_count) {
					$ind1 = "`".$key."`";
					$ind2 = "'".$value."'";
				}	else {
					$ind1 = "`".$key."`, ";
					$ind2 = "'".$value."',";
				}
			}
			$i1++;
		}
		$sql = "INSERT INTO `".$table."` (".$ind1.") VALUES (".$ind2.")";

		try{
			$stm = self::$pdo->prepare($sql);
			if($stm->execute()){return true;} else {return false;}
			// return $stm->fetchAll(PDO::FETCH_OBJ);
		} catch (PDOException $e) {
			die("Erro: " . $e->getMessage());
		}
	}
}