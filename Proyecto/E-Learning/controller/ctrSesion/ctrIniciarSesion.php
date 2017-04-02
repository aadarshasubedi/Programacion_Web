<?php

	$identificacion = $_POST['identificacion'];
	$clave = $_POST['clave'];
	
	include ("../../data/dtUsuario.php");

	$dtUsuario = new dtUsuario;
		
	session_start();

	$usuario = $dtUsuario->getUsuario($identificacion, $clave);

	if(!$usuario){
		header("location: ../../interface/index.php");
	} else {
		if($usuario['Rol'] == 'Administrador'){
			$_SESSION['Rol'] = $usuario['Rol'];
			
			header("location: ../../interface/fAdministrador/indexAdministrador.php");
		}
	}
?>