<?php

include ('../../data/dtConexion.php');
include ('../../data/DAO_Usuario/DAO_Usuario.php');
include ('../../data/DAO_Curso/DAO_Curso.php');
include ('../../data/DAO_Rol/DAO_Rol.php');
include ('../../data/DAO_Matricula/DAO_Matricula.php');
include ('../../data/DAO_Recurso/DAO_Recurso.php');

class Factory {

	private $dtConexion;
	private $BL_daoUsuario;
	private $BL_daoCurso;
	private $BL_daoRol;
	private $BL_daoMatricula;
	private $BL_daoRecurso;

	public function __construct(){
		$this -> dtConexion = dtConexion::getInstance();
		$this -> BL_daoUsuario = new DAO_Usuario($this -> dtConexion);
		$this -> BL_daoCurso = new DAO_Curso($this -> dtConexion);
		$this -> BL_daoRol = new DAO_Rol($this -> dtConexion);
		$this -> BL_daoMatricula = new DAO_Matricula($this -> dtConexion);
		$this -> BL_daoRecurso = new DAO_Recurso($this -> dtConexion);
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

	public function DAO_RecursoFactory(){
		return $this -> BL_daoRecurso;
	}
}

?>