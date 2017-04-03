<?php 
header('Content-Type: text/html; charset=ISO-8859-1');
	
	class dRol {

		private $Id_Rol;
		private $Nombre;
		private $Estado;


		public function __construct(){}

		public function setId_Rol($Id_Rol) {
			$this->Id_Rol = $Id_Rol;
		}

		public function getId_Rol() {
			return $this->Id_Rol;
		}

		public function setNombre($Nombre) {
			$this->Nombre = $Nombre;
		}

		public function getNombre() {
			return $this->Nombre;
		}

		public function setEstado($Estado) {
			$this->Estado = $Estado;
		}

		public function getEstado() {
			return $this->Estado;
		}

	}

?>