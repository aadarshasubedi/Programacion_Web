<?php 

	include ("../../domain/dFactory.php");
	include ("../../domain/dRecurso.php");
	include ("../../controller/ctrCargaArchivo/ctrUploadWebServices.php");
	include ("../../controller/ctrCargaArchivo/ctrDownloadWebServices.php");

	session_start();

	class ctrCargaArchivo {

		private $BL_daoRecurso;
		private $factory;

		public function __construct() {
		   $this -> factory = new Factory();
		   $this -> BL_daoRecurso = $this-> factory -> DAO_RecursoFactory();
		}

		public function cargarArchivo(){

			//tipo de formato de archivo que acepta
			$permitidos = array("jpg","jpeg","gif","png","mp3","mp4", "wma");
			$extension = pathinfo($_FILES['file']['name'] , PATHINFO_EXTENSION);

			//pregunta por que tipo de archivo puede subir
			if(    ($_FILES['file']['type'] == 'video/mp4') 
				|| ($_FILES['file']['type'] == 'audio/mp3') 
				|| ($_FILES['file']['type'] == 'audio/wma') 
				|| ($_FILES['file']['type'] == 'image/jpeg') 
				|| ($_FILES['file']['type'] == 'image/jpg') 
				|| ($_FILES['file']['type'] == 'image/gif') 
				|| ($_FILES['file']['type'] == 'image/png') 
				&& ($_FILES['file']['size'] < 20000000000)
				&& in_array($extension, $permitidos)
			) {
				//si no hay error
				if($_FILES['file']['error'] > 0){
					echo "Codigo de error: " . $_FILES['file']['error'];
				} else {

					$localRepo = realpath("cloud/") . "\\";
					$carga = realpath("tempUpload/") . "\\";

					//si existe
					if(file_exists($carga . $_FILES['file']['name'])){
						echo "Archivo " . $_FILES['file']['name'] . " ya existe.";
					} else {
						move_uploaded_file($_FILES['file']['tmp_name'], $carga . $_FILES['file']['name']);

						if(!copy($carga . "\\" . $_FILES['file']['name'], $localRepo . $_FILES['file']['name'])){
							echo "Ocurrio un error en la carga.";
						} else {
							unlink($carga . "\\" . $_FILES['file']['name']);

        					$Id_Tipo_Recurso = $_POST['Id_Tipo_Recurso'];
							$Id_Curso = $_POST['Id_Curso'];
							$Nombre = $_POST['nombre'];
							$Url = $_FILES['file']['name'];
							$Secuencia = $_POST['secuencia'];
							$Semana = $_POST['semana'];
        					$Identificador = $_POST['Identificador'];
        					$this->BL_daoRecurso->recurso($Id_Tipo_Recurso, $Id_Curso, $Secuencia, $Semana, $Nombre, $Identificador, $Url);
							
							//Condicion subida a server
							if($_FILES['file']['type'] == 'video/mp4'){
								$control = new ctrUploadWebServices;
								$control->Subir($_FILES['file']['name'], $Id_Curso, $Identificador, $extension, $_SESSION['Id_Usuario']);
							} else {
								echo "Archivo subido con exito.";
							}							

							//echo "nombre ". $nombreArchivo;
							echo "Archivo guardado con exito.";
						}
					}
				}
			} else {
				echo "Archivo invalido.";
			}
		}

		public function copiarLocal()	{
			$video = $_POST['nombre'];
			$control = new ctrDownloadWebServices;
			if($control->Descargar($video)){
				return true;
			} else {
				return false;
			}
		}

		public function borrarLocal() {
			$video = $_POST['nombre'];
			$rutaTemp = realpath("tempUpload/") . "\\" . $video;

			if(unlink($rutaTemp)){
				echo "borrado";
			} else {
				echo "error";
			}
		}

		public function borrarLocalCloud()	{
			$video = $_POST['nombre'];
			$rutaTemp = realpath("cloud/") . "\\" . $video;

			if(unlink($rutaTemp)){
				echo true;
			} else {
				echo false;
			}
		}
	}

	if($_POST != null){
		$op = $_POST['opcion'];
		$control = new ctrCargaArchivo;

		if($op == 1){
		 	$control->cargarArchivo();
		} else if($op == 2){
		 	$control->copiarLocal();
		} else if($op == 3){
		 	$control->borrarLocal();
		} else if($op == 4){
		 	$control->borrarLocalCloud();
		}
	}
?>