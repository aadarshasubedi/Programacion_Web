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
			$_SESSION['Id_Usuario'] = $usuario['Id_Usuario'];
			$_SESSION['Nombre'] = $usuario['Nombre'];
			
			header("location: ../../interface/fAdministrador/indexAdministrador.php");

		} else if($usuario['Rol'] == 'Estudiante'){

			$_SESSION['Rol'] = $usuario['Rol'];
			$_SESSION['Id_Usuario'] = $usuario['Id_Usuario'];
			$_SESSION['Nombre'] = $usuario['Nombre'];
				
			header("location: ../../interface/fEstudiante/indexEstudiante.php");

		}
	}
?>