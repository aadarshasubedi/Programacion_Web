<?php 
	
	include ("../../domain/dFactory.php");
	include ("../../domain/dRecurso.php");

	class ctrRecursos {

		private $BL_daoRecurso;
		private $factory;

		public function __construct() {
		   $this -> factory = new Factory();
		   $this -> BL_daoRecurso = $this-> factory -> DAO_RecursoFactory();
		}		

		public function guardarRecurso(){
			if (isset($_POST['semana'])){
				$semana = $_POST['semana'];
				$Id_Curso = $_POST['curso']; 

				 foreach ($semana as $key) {
				 	$secuencia = 0;
				 	$key["IdSemana"] = str_replace('semana', '', $key["IdSemana"]);
				 	echo $key["IdSemana"]."\n";
				 	foreach($key["recurso"] as $recurso){
				 		//secuencia por cada recurso
				 		//echo $recurso["Rec_Identificador"]."\n";
				 		//echo $recurso["Rec_IdTipo"]."\n";
				 		//echo $recurso["Rec_Nombre"]."\n\n";
				 		//echo "Seguiente Recurso"."\n\n";
				 		$this->BL_daoRecurso->recurso($recurso["Rec_IdTipo"], $Id_Curso, $secuencia, $key["IdSemana"], $recurso["Rec_Nombre"],$recurso["Rec_Identificador"],$recurso["Rec_Url"]);
				 		$secuencia++;
				 	}
				}
			}
		}

		public function consultar(){

		 	$lista = array();
		 	$valor = $this -> BL_daoRecurso -> consultar();

		 	foreach ($valor as $value) {
		 		$dRecurso = new dRecurso;

		 		$dRecurso->setId_Tipo_Recurso($value['Id_Tipo_Recurso']);
		 		$dRecurso->setId_Curso($value['Id_Curso']);
		 		$dRecurso->setSemana($value['Semana']);
		 		$dRecurso->setSecuencia($value['Secuencia']);
		 		$dRecurso->setId_Tipo_Recurso($value['Id_Tipo_Recurso']);

		 		array_push($lista, $dRecurso);
		 	}

		 	return $lista;
		}

		public function totalSemanas(){
			$Id_Curso = $_POST['Id_Curso']; 
			$semanas = $this -> BL_daoRecurso -> totalSemanas($Id_Curso);

			echo $semanas;
		}

		public function eliminarRecurso(){
			if (isset($_POST['IdentificadorRecurso'])){
				$IdentificadorRecurso = $_POST['IdentificadorRecurso'];
				$result = $this -> BL_daoRecurso -> eliminarRecurso($IdentificadorRecurso);
				echo $result;
			}
		}

		public function obtieneIdentificador(){
				$result = $this -> BL_daoRecurso -> obtieneIdentificador();
				echo $result;
		}

		public function guardaIdentificador(){
				if (isset($_POST['Identificador'])){
				$Identificador = $_POST['Identificador'];
				$result = $this -> BL_daoRecurso -> guardaIdentificador($Identificador);
				echo $result;
				}
		}		

	}

	if($_POST != null){
		$op = $_POST['opcion'];
		$control = new ctrRecursos;

		if($op == 1){
		 	$control->guardarRecurso();
		} else if($op == 2){
		 	$control->totalSemanas();
		} else if($op == 3){
		 	$control->eliminarRecurso();
		} else if($op == 4){
		 	$control->obtieneIdentificador();
		} else if($op == 5){
		 	$control->guardaIdentificador();
		} 
	}
?>