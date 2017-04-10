<?php 
	
	include ("../../domain/dFactory.php");
	include ("../../domain/dMatricula.php");
	include ("../../domain/dUsuario.php");
	include ("../../domain/dCurso.php");

	class ctrMatriculas {

		private $BL_daoMatricula;
		private $factory;

		public function __construct() {
		   $this -> factory = new Factory();
		   $this -> BL_daoMatricula = $this-> factory -> DAO_MatriculaFactory();
		   $this -> BL_daoUsuario = $this-> factory -> DAO_UsuarioFactory();
		   $this -> BL_daoCurso = $this-> factory -> DAO_CursoFactory();
		}

		public function agregar(){

			$matricula = new dMatricula;

			$periodo = explode("-", $_POST['Id_Curso']);

			$matricula->setPeriodo($periodo[1]);
	      	$matricula->setId_Usuario($_POST['Id_Usuario']);
	      	$matricula->setId_Curso($periodo[0]);
	      	$matricula->setAño(date('Y-m-d'));
	      	$matricula->setFecha_Matricula(date('Y-m-d H:i:s'));
		 	
		 	if($this->BL_daoMatricula->validarInsercion($matricula->getId_Usuario(), $matricula->getId_Curso())){
		 			if($this->BL_daoMatricula->agregar($matricula)){
			      		echo 'Se ha matriculado correctamente.';
			      	} else {
			      		echo 'Se ha producido un error al matricular.';
			      	}
		 	}
		 	else{
		 		echo "Dicho Usuario ya esta registrado al Curso seleccionado";
		 	}
		}

		public function listarUsuario($Id_Usuario){

		 	$lista = array();
		 	$valor = $this -> BL_daoUsuario -> listar($Id_Usuario);

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

		public function listarCurso(){

			$Id_Usuario = $_POST['usuario'];

		 	$lista = $this -> BL_daoCurso -> listarCursos($Id_Usuario);

			echo json_encode($lista);
		}		

	}

	if($_POST != null){
		$op = $_POST['opcion'];
		$control = new ctrMatriculas;

		if($op == 1){
		 	$control->agregar();
		} else if($op == 2){
		 	$control->eliminar();
		} else if($op == 3){
		 	$control->modificar();
		} else if($op == 4){
		 	$control->consultar();
		}  else if($op == 5){
		 	$control->listarCurso();
		}
	}
?>