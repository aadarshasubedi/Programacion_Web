<?php 

	include ("../../domain/dFactory.php");
	include ("../../domain/dCurso.php");
	include ("../../domain/dRecurso.php");
	include ("../../domain/dUsuario.php");

	class ctrCursos {

		private $BL_daoCurso;
		private $BL_daoRecurso;
		private $BL_daoUsuario;
		private $factory;

		public function __construct() {
		   $this -> factory = new Factory();
		   $this -> BL_daoCurso = $this-> factory -> DAO_CursoFactory();
		   $this -> BL_daoRecurso = $this-> factory -> DAO_RecursoFactory();
		   $this -> BL_daoUsuario = $this-> factory -> DAO_UsuarioFactory();
		}

		public function agregar(){
			$dCurso = new dCurso;

			$año = date('Y');
	 		$dCurso->setNombre($_POST['Nombre']);
	 		$dCurso->setFecha_Inicio($_POST['Fecha_Inicio']);
	 		$dCurso->setFecha_Final($_POST['Fecha_Final']);
	 		$dCurso->setId_Profesor($_POST['Id_Profesor']);
		 	
		 	if($this->BL_daoCurso->consultarExistenciaCurso($dCurso)){
		 		echo 'Ya existe dicho curso en el periodo seleccionado.';
		 	}
		 	else{
		 		if($this->BL_daoCurso->agregar($dCurso)){
		      		echo 'Se ha ingresado el curso correctamente.';
		      	} else {
		      		echo 'Se ha producido un error al ingresar el curso.';
		      	}
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
	 		$dCurso->setId_Profesor($_POST['Id_Profesor']);
		 	
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
		 		$dCurso->setId_Profesor($value['Id_Profesor']);

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

		public function consultarRecursos($Id_Curso){

		 	$lista = array();
		 	$valor = $this -> BL_daoRecurso -> consultar($Id_Curso);

		 	foreach ($valor as $value) {
		 		$dRecurso = new dRecurso;

		 		$dRecurso->setId_Tipo_Recurso($value['Id_Tipo_Recurso']);
		 		$dRecurso->setId_Curso($value['Id_Curso']);
		 		$dRecurso->setSemana($value['Semana']);
		 		$dRecurso->setSecuencia($value['Secuencia']);
		 		$dRecurso->setId_Tipo_Recurso($value['Id_Tipo_Recurso']);
		 		$dRecurso->setIdentificador($value['Identificador']);
		 		$dRecurso->setNombre($value['Nombre']);
		 		$dRecurso->setUrl($value['Url']);

		 		array_push($lista, $dRecurso);
		 	}

		 	return $lista;
		}

		public function cursosEstudiante($Id_Usuario){

			$lista = array();
		 	$valor = $this -> BL_daoCurso -> cursosEstudiantes($Id_Usuario);

		 	foreach ($valor as $value) {
		 		$dCurso = new dCurso;

		 		$dCurso->setId_Curso($value['Id_Curso']);
		 		$dCurso->setNombre($value['Nombre']);

		 		array_push($lista, $dCurso);
		 	}

		 	return $lista;
		}

		public function listarProfesores(){

		 	$lista = array();
		 	$valor = $this -> BL_daoUsuario -> listarProfesores();

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

		public function listaCursosProfesor($Id_Usuario){
			$lista = array();
		 	$valor = $this -> BL_daoCurso -> listaCursosProfesor($Id_Usuario);

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

		public function listaCursosEditor($Id_Usuario){
			$lista = array();
		 	$valor = $this -> BL_daoCurso -> listaCursosEditor($Id_Usuario);

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