<?php 
	
	include ("../../domain/dFactory.php");
	include ("../../domain/dRol.php");

	class ctrRoles {

		private $BL_daoRol;
		private $factory;

		public function __construct() {
		   $this -> factory = new Factory();
		   $this -> BL_daoRol = $this-> factory -> DAO_RolFactory();
		}

		public function agregar(){
			$dRol = new dRol;

	 		$dRol->setNombre($_POST['Nombre']);
		 	
		 	if($this->BL_daoRol->agregar($dRol)){
	      		echo 'Se ha ingresado el rol correctamente.';
	      	} else {
	      		echo 'Se ha producido un error al ingresar el rol.';
	      	}
		}

		public function eliminar(){
					
		}

		public function modificar(){
			$dRol = new dRol;

			$dRol->setId_Rol($_POST['Id_Rol']);
	 		$dRol->setNombre($_POST['Nombre']);
	 		//$dRol->setEstado($_POST['Estado']);
		 	
		 	if($this->BL_daoRol->modificar($dRol)){
	      		echo 'Se ha modificado el rol correctamente.';
	      	} else {
	      		echo 'Se ha producido un error al modificar el rol.';
	      	}
		}

		public function consultar($Id_Rol){
			$lista = array();
		 	$valor = $this->BL_daoRol->consultar($Id_Rol);

			foreach ($valor as $value) {
		 		$dRol = new dRol;

		 		$dRol->setId_Rol($value['Id_Rol']);
		 		$dRol->setNombre($value['Nombre']);
		 		$dRol->setEstado($value['Estado']);

		 		array_push($lista, $dRol);
		 	}

		 	return $lista;
		}

		public function listar(){

		 	$lista = array();
		 	$valor = $this -> BL_daoRol -> listar();

		 	foreach ($valor as $value) {
		 		$dRol = new dRol;

		 		$dRol->setId_Rol($value['Id_Rol']);
		 		$dRol->setNombre($value['Nombre']);
		 		$dRol->setEstado($value['Estado']);

		 		array_push($lista, $dRol);
		 	}

		 	return $lista;
		}
	}

	if($_POST != null){
		$op = $_POST['opcion'];
		$control = new ctrRoles;

		if($op == 1){
		 	$control->agregar();
		} else if($op == 2){
		 	$control->eliminar();
		} else if($op == 3){
		 	$control->modificar();
		} else if($op == 4){
		 	$control->consultar();
		} 
	}
?>