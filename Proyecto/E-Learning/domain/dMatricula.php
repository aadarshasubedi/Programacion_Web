<?php 
header('Content-Type: text/html; charset=ISO-8859-1');
	
	class dMatricula {

		private $Periodo;
		private $Id_Usuario;
		private $Id_Curso;
		private $Año;
		private $Fecha_Matricula;

		public function __construct(){}

		public function setPeriodo($Periodo) {
			$this->Periodo = $Periodo;
		}

		public function getPeriodo() {
			return $this->Periodo;
		}

		public function setId_Usuario($Id_Usuario) {
			$this->Id_Usuario = $Id_Usuario;
		}

		public function getId_Usuario() {
			return $this->Id_Usuario;
		}

		public function setId_Curso($Id_Curso) {
			$this->Id_Curso = $Id_Curso;
		}

		public function getId_Curso() {
			return $this->Id_Curso;
		}

		public function setAño($Año) {
			$this->Año = $Año;
		}

		public function getAño() {
			return $this->Año;
		}

		public function setFecha_Matricula($Fecha_Matricula) {
			$this->Fecha_Matricula = $Fecha_Matricula;
		}

		public function getFecha_Matricula() {
			return $this->Fecha_Matricula;
		}
	}

?>