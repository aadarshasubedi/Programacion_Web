<?php

include ('../../data/dtConexion.php');
include ('../../data/DAO_Usuario/DAO_Usuario.php');
include ('../../data/DAO_Curso/DAO_Curso.php');
include ('../../data/DAO_Rol/DAO_Rol.php');
include ('../../data/DAO_Matricula/DAO_Matricula.php');

class Factory {

	private $dtConexion;
	private $BL_daoUsuario;
	private $BL_daoCurso;
	private $BL_daoRol;
	private $BL_daoMatricula;

	public function __construct(){
		$this -> dtConexion = dtConexion::getInstance();
		$this -> BL_daoUsuario = new DAO_Usuario($this -> dtConexion);
		$this -> BL_daoCurso = new DAO_Curso($this -> dtConexion);
		$this -> BL_daoRol = new DAO_Rol($this -> dtConexion);
		$this -> BL_daoMatricula = new DAO_Matricula($this -> dtConexion);
	}

	public function DAO_UsuarioFactory(){
		return $this -> BL_daoUsuario;
	}

	public function DAO_CursoFactory(){
		return $this -> BL_daoCurso;
	}

	public function DAO_RolFactory(){
		return $this -> BL_daoRol;
	}	

	public function DAO_MatriculaFactory(){
		return $this -> BL_daoMatricula;
	}	
}

?>