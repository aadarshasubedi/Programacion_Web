<?php

class ctrDownloadWebServices {

	public function Descargar($nombre){
		//le da tiempo de espera en caso de que el archivo sea muy grande
		set_time_limit(300);

		/*Aqui debemos invocar el servicio web al cual debemos conectarnos
		debemos agregar la ruta del servicio*/
		$client = new SoapClient("http://localhost:8084/FileRepositoryWS/FileTransferImpl?wsdl");

		//Le dice cual es el nombre del archivo que tiene en el repositorio
		$filename = $nombre; 

		//luego llamamos al de descarga
		$resultado = $client->download(array('arg0' => $filename));

		$arregloBytes;
		//Se obtien el arreglo de byte
		foreach ($resultado as $object) {
			$arregloBytes = $object;
		} 

		//Carpeta para cargar
		$carga = realpath("tempUpload/") . "\\" . $filename;

		//Escritura archivo en carpeta
		if(file_put_contents($carga, $arregloBytes)){
			return true;
		} else {
			return false;
		}
	}
	
}

?>