<?php 
	
	include ("../../domain/dFactory.php");
	include ("../../domain/dUsuario.php");

	class ctrUsuarios {

		private $BL_daoUsuario;
		private $factory;

		public function __construct() {
		   $this -> factory = new Factory();
		   $this -> BL_daoUsuario = $this-> factory -> DAO_UsuarioFactory();
		}

		public function agregar(){

			$usuario = new dUsuario;

			$usuario->setId_Usuario($_POST['Id_Usuario']);
	      	$usuario->setClave($_POST['Clave']);
	      	$usuario->setId_Genero($_POST['Id_Genero']);
	      	$usuario->setNombre($_POST['Nombre']);
	      	$usuario->setPrimer_Apellido($_POST['Primer_Apellido']);
	      	$usuario->setSegundo_Apellido($_POST['Segundo_Apellido']);
	      	$usuario->setPais($_POST['Pais']);
	      	$usuario->setFecha_Ultimo_Ingreso(date('Y-m-d H:i:s'));
	      	$usuario->setDireccion_Ip('-');
	      	$usuario->setSistema_Operativo('-');
	      	$usuario->setNavegador('-');
	      	$usuario->setLenguaje('-');
	      	$usuario->setRol($_POST['Id_Rol']);
		 	
		 	if($this->BL_daoUsuario->agregar($usuario)){
	      		echo 'Se ha ingresado el usuario correctamente.';
	      	} else {
	      		echo 'Se ha producido un error al ingresar el usuario.';
	      	}
		}

		public function eliminar(){
			$Id_Usuario = $_GET['Id_Usuario'];
			
			if($this->BL_daoUsuario->eliminar($Id_Usuario)){		
				echo 'Usuario eliminado correctamente.';
			}else{
				echo 'Se ha producido un error al eliminar el usuario.';
			}			
		}

		public function modificar(){
			$usuario = new dUsuario;

	      	$usuario->setId_Usuario($_POST['Id_Usuario']);
	      	$usuario->setClave($_POST['Clave']);
	      	$usuario->setId_Genero($_POST['Id_Genero']);
	      	$usuario->setNombre($_POST['Nombre']);
	      	$usuario->setPrimer_Apellido($_POST['Primer_Apellido']);
	      	$usuario->setSegundo_Apellido($_POST['Segundo_Apellido']);
	      	$usuario->setPais($_POST['Pais']);
	      	$usuario->setFecha_Ultimo_Ingreso(date('Y-m-d H:i:s'));
	      	$usuario->setDireccion_Ip($_SERVER['REMOTE_ADDR']);
	      	$usuario->setSistema_Operativo(PHP_OS);
	      	$usuario->setNavegador($_SERVER['HTTP_USER_AGENT']);
	      	$usuario->setLenguaje($_SERVER["HTTP_ACCEPT_LANGUAGE"]);
	      	$usuario->setRol($_POST['Id_Rol']);
		 	
		 	if($this->BL_daoUsuario->modificar($usuario)){
	      		echo 'Se ha modificado el usuario correctamente.';
	      	} else {
	      		echo 'Se ha producido un error al modificar el usuario.';
	      	}
		}

		public function consultar(){
			$Id_Usuario = $_GET['Id_Usuario'];

		 	$valor = $this->BL_daoUsuario->consultar($Id_Usuario);

			echo "[".json_encode($valor)."]";
		}

		public function consultarModificar($Id_Usuario){

			$lista = array();
		 	$valor = $this->BL_daoUsuario->consultarModificar($Id_Usuario);

			foreach ($valor as $value) {
		 		$dUsuario = new dUsuario;

		 		$dUsuario->setId_Usuario($value['Id_Usuario']);
		 		$dUsuario->setClave($value['Clave']);
		 		$dUsuario->setNombre($value['Nombre']);
		 		$dUsuario->setPrimer_Apellido($value['Primer_Apellido']);
		 		$dUsuario->setSegundo_Apellido($value['Segundo_Apellido']);
		 		$dUsuario->setId_Genero($value['Id_Genero']);
		 		$dUsuario->setPais($value['Pais']);
		 		$dUsuario->setRol($value['Id_Rol']);

		 		array_push($lista, $dUsuario);
		 	}

		 	return $lista;
		}

		public function listar(){

		 	$lista = array();
		 	$valor = $this -> BL_daoUsuario -> listar();

		 	foreach ($valor as $value) {
		 		$dUsuario = new dUsuario;

		 		$dUsuario->setId_Usuario($value['Id_Usuario']);
		 		$dUsuario->setNombre($value['Nombre']);
		 		$dUsuario->setPrimer_Apellido($value['Primer_Apellido']);
		 		$dUsuario->setSegundo_Apellido($value['Segundo_Apellido']);

		 		array_push($lista, $dUsuario);
		 	}

		 	return $lista;
		}
	}

	if($_POST != null){
		$op = $_POST['opcion'];
		$control = new ctrUsuarios;

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