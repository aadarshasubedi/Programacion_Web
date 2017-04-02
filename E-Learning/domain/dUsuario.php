<?php 
header('Content-Type: text/html; charset=ISO-8859-1');
	
	class dUsuario {

		private $Id_Usuario;
		private $Clave;
		private $Nombre;
		private $Primer_Apellido;
		private $Segundo_Apellido;
		private $Pais;
		private $Id_Genero;
		private $Fecha_Ultimo_Ingreso;
		private $Direccion_Ip;
		private $Sistema_Operativo;
		private $Navegador;
		private $Lenguaje;
		private $Rol;

		public function __construct(){}

		public function setId_Usuario($Id_Usuario) {
			$this->Id_Usuario = $Id_Usuario;
		}

		public function getId_Usuario() {
			return $this->Id_Usuario;
		}

		public function setClave($Clave) {
			$this->Clave = $Clave;
		}

		public function getClave() {
			return $this->Clave;
		}

		public function setNombre($Nombre) {
			$this->Nombre = $Nombre;
		}

		public function getNombre() {
			return $this->Nombre;
		}

		public function setPrimer_Apellido($Primer_Apellido) {
			$this->Primer_Apellido = $Primer_Apellido;
		}

		public function getPrimer_Apellido() {
			return $this->Primer_Apellido;
		}

		public function setSegundo_Apellido($Segundo_Apellido) {
			$this->Segundo_Apellido = $Segundo_Apellido;
		}

		public function getSegundo_Apellido() {
			return $this->Segundo_Apellido;
		}

		public function setPais($Pais) {
			$this->Pais = $Pais;
		}

		public function getPais() {
			return $this->Pais;
		}

		public function setId_Genero($Id_Genero) {
			$this->Id_Genero = $Id_Genero;
		}

		public function getId_Genero() {
			return $this->Id_Genero;
		}

		public function setFecha_Ultimo_Ingreso($Fecha_Ultimo_Ingreso) {
			$this->Fecha_Ultimo_Ingreso = $Fecha_Ultimo_Ingreso;
		}

		public function getFecha_Ultimo_Ingreso() {
			return $this->Fecha_Ultimo_Ingreso;
		}

		public function setDireccion_Ip($Direccion_Ip) {
			$this->Direccion_Ip = $Direccion_Ip;
		}

		public function getDireccion_Ip() {
			return $this->Direccion_Ip;
		}

		public function setSistema_Operativo($Sistema_Operativo) {
			$this->Sistema_Operativo = $Sistema_Operativo;
		}

		public function getSistema_Operativo() {
			return $this->Sistema_Operativo;
		}

		public function setNavegador($Navegador) {
			$this->Navegador = $Navegador;
		}

		public function getNavegador() {
			return $this->Navegador;
		}

		public function setLenguaje($Lenguaje) {
			$this->Lenguaje = $Lenguaje;
		}

		public function getLenguaje() {
			return $this->Lenguaje;
		}

		public function setRol($Rol) {
			$this->Rol = $Rol;
		}

		public function getRol() {
			return $this->Rol;
		}
	}

?>