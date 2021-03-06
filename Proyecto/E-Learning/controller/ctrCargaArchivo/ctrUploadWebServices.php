
<?php

class ctrUploadWebServices {

	public function Subir($nombre, $Id_Curso, $Identificador, $extension, $Id_Usuario){
		//le da tiempo de espera en caso de que el archivo sea muy grande
		set_time_limit(300);

		/*Aqui debemos invocar el servicio web al cual debemos conectarnos
		debemos agregar la ruta del servicio*/
		$client = new SoapClient("http://localhost:8084/FileRepositoryWS/FileTransferImpl?wsdl");
		//cargamos la ruta del repositorio. Normalmente, esta ruta solo la conoce el servidor, pero es para probar la subida de prueba
		$localRepo = realpath("cloud/") . "\\";
		//Le dice cual es el nombre del archivo que tiene en el repositorio
		$filename = $nombre; 
		$fileRoot = $localRepo . $filename; 
		//obtiene el archivo y lo transforma a bytes
		$contents = file_get_contents($fileRoot);

		/*invocamos al metodo consultar que ofrece el wsdl, y le mandamos los parametros correspondientes
		podemos hacerlo mediante un array*/
		if($client->upload(array('arg0' => $filename, 'arg1' => $contents, 'arg2' => $Id_Curso, 'arg3' => $Identificador,'arg4' => $extension, 'arg5' => $Id_Usuario))){
			unlink($fileRoot);
			echo "Archivo subido con exito.";
		} else {
			echo "Error";
		}
	}
	
}

?>