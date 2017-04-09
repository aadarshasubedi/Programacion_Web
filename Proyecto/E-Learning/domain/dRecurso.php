<?php 
header('Content-Type: text/html; charset=ISO-8859-1');
	
	class dRecurso {

		private $Id_Recurso;
		private $Id_Tipo_Recurso;
		private $Id_Curso;
		private $Recurso_Padre;
		private $Nombre;
		private $Url;
		private $Visible;
		private $Secuencia;
		private $Notas;
		private $Estado;
		private $Semana;


		public function __construct(){}

		public function setId_Recurso($Id_Recurso) {
			$this->Id_Recurso = $Id_Recurso;
		}

		public function getId_Recurso() {
			return $this->Id_Recurso;
		}

		public function setId_Tipo_Recurso($Id_Tipo_Recurso) {
			$this->Id_Tipo_Recurso = $Id_Tipo_Recurso;
		}

		public function getId_Tipo_Recurso() {
			return $this->Id_Tipo_Recurso;
		}		

		public function setId_Curso($Id_Curso) {
			$this->Id_Curso = $Id_Curso;
		}

		public function getId_Curso() {
			return $this->Id_Curso;
		}

		public function setRecurso_Padre($Recurso_Padre) {
			$this->Recurso_Padre = $Recurso_Padre;
		}

		public function getRecurso_Padre() {
			return $this->Recurso_Padre;
		}		

		public function setNombre($Nombre) {
			$this->Nombre = $Nombre;
		}

		public function getNombre() {
			return $this->Nombre;
		}

		public function setUrl($Url) {
			$this->Url = $Url;
		}

		public function getUrl() {
			return $this->Url;
		}

		public function setVisible($Visible) {
			$this->Visible = $Visible;
		}

		public function getVisible() {
			return $this->Visible;
		}

		public function setSecuencia($Secuencia) {
			$this->Secuencia = $Secuencia;
		}

		public function getSecuencia() {
			return $this->Secuencia;
		}

		public function setNotas($Notas) {
			$this->Notas = $Notas;
		}

		public function getNotas() {
			return $this->Notas;
		}		

		public function setEstado($Estado) {
			$this->Estado = $Estado;
		}

		public function getEstado() {
			return $this->Estado;
		}

		public function setSemana($Semana) {
			$this->Semana = $Semana;
		}

		public function getSemana() {
			return $this->Semana;
		}			
	}

?>