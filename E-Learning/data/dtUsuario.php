<?php

include ("dtConexion.php");

class dtUsuario{

	private $dtConexion;

	public function __construct(){
		$this -> dtConexion = dtConexion::getInstance();
	}

	function getUsuario($Identificacion, $Clave){
		
		try {
			$conn = $this->dtConexion->abrirConexion(); 
			$usuario = array();   
			$stmt = $conn->prepare('CALL pr_loginUsuario(?,?)'); 
			$stmt->bindParam(1, $Identificacion, PDO::PARAM_STR);
			$stmt->bindParam(2, $Clave, PDO::PARAM_STR);
			$stmt->execute();
			$usuario = $stmt->fetch(PDO::FETCH_ASSOC);  
			$this->dtConexion->cerrarConexion($conn); 
			return $usuario;
		} catch (PDOException $e) {
			echo $e->getMessage();
			return false;
		} 
	}
}

?>