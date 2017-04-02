<?php

class dtConexion {

	private	$serverName;
	private	$userName;
	private	$password;
	private	$dbName;
	private static $instancia;

	private function __construct() {
	    $this -> serverName = "localhost";
	    $this -> userName = "root";
	    $this -> password = "1234";
	    $this -> dbName = "bd_elearning";	    
  	}

  	public static function getInstance() {
		if (!self::$instancia instanceof self) {
	    	self::$instancia = new self;
	    }
	    return self::$instancia;
   	}

	public function abrirConexion(){

		try{

			$conn = new PDO("mysql:host=$this->serverName;dbname=$this->dbName", $this->userName, $this->password);
    		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		}catch(PDOException $e) {
    		echo "Error: " . $e->getMessage();
    		die();
    	}

		return $conn;
	}

	public function cerrarConexion($conn){
		try {
			$conn = null;	
		} catch (PDOException $e) {
			echo $e->getMessage();	
			die();
		}
	}
}

?>

