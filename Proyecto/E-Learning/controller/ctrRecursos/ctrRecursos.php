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
			$list_order = $_POST['list_order'];
			$Id_Curso = $_POST['curso']; 

			$list = explode(',' , $list_order);
			$secuencia = 1;
			$semana = str_replace('s', '', $list[0]);

			for ($i=0; $i < count($list); $i++) { 
				$this->BL_daoRecurso->recurso($list[$i], $Id_Curso, $secuencia, $semana, $i);
				if($i > 0){
					$secuencia++;
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
	}

	if($_POST != null){
		$op = $_POST['opcion'];
		$control = new ctrRecursos;

		if($op == 1){
		 	$control->guardarRecurso();
		} 
	}
?>