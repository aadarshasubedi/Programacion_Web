<?php 
header('Content-Type: text/html; charset=ISO-8859-1');
	
	class dUsuario {

		private $Id_Curso;
		private $Nombre;
		private $Duracion;
		private $Fecha_Inicio;
		private $Fecha_Final;


		public function __construct(){}

		public function setId_Curso($Id_Curso) {
			$this->Id_Curso = $Id_Curso;
		}

		public function getId_Curso() {
			return $this->Id_Curso;
		}

		public function setNombre($Nombre) {
			$this->Nombre = $Nombre;
		}

		public function getNombre() {
			return $this->Nombre;
		}

		public function setDuracion($Duracion) {
			$this->Duracion = $Duracion;
		}

		public function getDuracion() {
			return $this->Duracion;
		}

		public function setFecha_Inicio($Fecha_Inicio) {
			$this->Fecha_Inicio = $Fecha_Inicio;
		}

		public function getFecha_Inicio() {
			return $this->Fecha_Inicio;
		}

		public function setFecha_Final($Fecha_Final) {
			$this->Fecha_Final = $Fecha_Final;
		}

		public function getFecha_Final() {
			return $this->Fecha_Final;
		}
	}

?>