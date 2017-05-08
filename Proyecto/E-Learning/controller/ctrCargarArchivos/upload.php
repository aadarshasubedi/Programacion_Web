<?php 

	include ("../../domain/dFactory.php");
	include ("../../domain/dRecurso.php");


	class Archivo
	{
		
		private $BL_daoRecurso;
		private $factory;

		public function __construct() {
		   $this -> factory = new Factory();
		   $this -> BL_daoRecurso = $this-> factory -> DAO_RecursoFactory();
		}

		public function subidaArchivo(){


			if (isset($_POST['archivo'])){
				//$archivo = $_POST['archivo'];
				//$file = $archivo.archivo;
			}

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
					echo "Codigo de error: " . $_FILES['file']['error'] . "<br/>";
				} else {
					//información del archivo
					/*echo "Carga: " . $_FILES['file']['name'] . "<br/>";
					echo "Tipo: " . $_FILES['file']['type'] . "<br/>";
					echo "Tamaño: " . ($_FILES['file']['size'] / 1024) . "Kb <br/>";
					echo "Temporal: " . $_FILES['file']['tmp_name'] . "<br/>";*/

					$localRepo = realpath("cloud/") . "\\";
					$carga = realpath("tempUpload/") . "\\";

					//si existe
					if(file_exists($carga . $_FILES['file']['name'])){
						echo "Archivo " . $_FILES['file']['name'] . " ya existe!";
					} else {
						move_uploaded_file($_FILES['file']['tmp_name'], $carga . $_FILES['file']['name']);
						//echo "Almacenado en: " . realpath($_SERVER["DOCUMENT_ROOT"]) . "\\" . $carga . $_FILES['file']['name'];
						echo "Almacenado en: " . $carga . $_FILES['file']['name'] . "<br/>";

						if(!copy($carga . "\\" . $_FILES['file']['name'], $localRepo . $_FILES['file']['name'])){
							echo "Ocurrio un error en la carga.";
						} else {
							unlink($carga . "\\" . $_FILES['file']['name']);
							//guardarArchivo($archivo);
							echo "Copiado con exito!";
						}
					}
				}
			} else {
				echo "Archivo invalido!";
			}
		}

		/*public function guardarArchivo($archivo){
			if($this->BL_daoRecurso)
		}*/

	}

	if($_POST != null){
		$op = $_POST['opcion'];
		$control = new Archivo;

		if($op == 1){
			$control->subidaArchivo();
		}
	}
	
?>