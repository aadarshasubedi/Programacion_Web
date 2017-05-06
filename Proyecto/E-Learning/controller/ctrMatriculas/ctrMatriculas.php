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

			$id_Curso = $_POST['Id_Curso'];
			$curso = $this->BL_daoCurso->consultar($id_Curso);
			$fecha_Inicio = date_create_from_format('Y-m-d', $curso[0]['Fecha_Inicio']);
			$fecha_Final = date_create_from_format('Y-m-d', $curso[0]['Fecha_Final']);

			$diferencia = $fecha_Inicio->diff($fecha_Final);
			$periodo = ( $diferencia->y * 12 ) + $diferencia->m;
			
			$matricula->setPeriodo($periodo);
	      	$matricula->setId_Usuario($_POST['Id_Usuario']);
	      	$matricula->setId_Curso($id_Curso);
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
		 	$valor = $this -> BL_daoUsuario -> listarMatricula();

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