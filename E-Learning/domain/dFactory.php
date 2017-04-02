<?php

include ('../../data/dtConexion.php');
include ('../../data/DAO_Usuario/DAO_Usuario.php');

class Factory {

	private $dtConexion;
	private $BL_daoUsuario;

	public function __construct(){
		$this -> dtConexion = dtConexion::getInstance();
		$this -> BL_daoUsuario = new DAO_Usuario($this -> dtConexion);
	}

	public function DAO_UsuarioFactory(){
		return $this -> BL_daoUsuario;
	}
}

?>