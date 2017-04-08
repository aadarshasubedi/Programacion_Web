<?php 
	
	include ("../../domain/dFactory.php");
	include ("../../domain/dCurso.php");

	class ctrCursos {

		private $BL_daoCurso;
		private $factory;

		public function __construct() {
		   $this -> factory = new Factory();
		   $this -> BL_daoCurso = $this-> factory -> DAO_CursoFactory();
		}

		public function agregar(){
			$dCurso = new dCurso;

	 		$dCurso->setNombre($_POST['Nombre']);
	 		$dCurso->setFecha_Inicio($_POST['Fecha_Inicio']);		 		
	 		$dCurso->setFecha_Final($_POST['Fecha_Final']);
		 	
		 	if($this->BL_daoCurso->agregar($dCurso)){
	      		echo 'Se ha ingresado el curso correctamente.';
	      	} else {
	      		echo 'Se ha producido un error al ingresar el curso.';
	      	}
		}

		public function eliminar(){
					
		}

		public function modificar(){
			$dCurso = new dCurso;

			$dCurso->setId_Curso($_POST['Id_Curso']);
	 		$dCurso->setNombre($_POST['Nombre']);
	 		$dCurso->setFecha_Inicio($_POST['Fecha_Inicio']);		 		
	 		$dCurso->setFecha_Final($_POST['Fecha_Final']);
		 	
		 	if($this->BL_daoCurso->modificar($dCurso)){
	      		echo 'Se ha modificado el curso correctamente.';
	      	} else {
	      		echo 'Se ha producido un error al modificar el curso.';
	      	}
		}

		public function consultar($Id_Curso){
			$lista = array();
		 	$valor = $this->BL_daoCurso->consultar($Id_Curso);

			foreach ($valor as $value) {
		 		$dCurso = new dCurso;

		 		$dCurso->setId_Curso($value['Id_Curso']);
		 		$dCurso->setNombre($value['Nombre']);
		 		$dCurso->setDuracion($value['Duracion']);
		 		$dCurso->setFecha_Inicio($value['Fecha_Inicio']);		 		
		 		$dCurso->setFecha_Final($value['Fecha_Final']);

		 		array_push($lista, $dCurso);
		 	}

		 	return $lista;
		}

		public function listar(){

		 	$lista = array();
		 	$valor = $this -> BL_daoCurso -> listar();

		 	foreach ($valor as $value) {
		 		$dCurso = new dCurso;

		 		$dCurso->setId_Curso($value['Id_Curso']);
		 		$dCurso->setNombre($value['Nombre']);
		 		$dCurso->setDuracion($value['Duracion']);
		 		$dCurso->setFecha_Inicio($value['Fecha_Inicio']);		 		
		 		$dCurso->setFecha_Final($value['Fecha_Final']);

		 		array_push($lista, $dCurso);
		 	}

		 	return $lista;
		}
	}

	if($_POST != null){
		$op = $_POST['opcion'];
		$control = new ctrCursos;

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