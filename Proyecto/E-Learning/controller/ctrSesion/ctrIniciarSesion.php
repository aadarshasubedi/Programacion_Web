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
		if($usuario['Rol'] == '1'){

			$_SESSION['Rol'] = $usuario['Rol'];
			$_SESSION['Id_Usuario'] = $usuario['Id_Usuario'];
			$_SESSION['Nombre'] = $usuario['Nombre'];
			
			header("location: ../../interface/fAdministrador/indexAdministrador.php");

		} else if($usuario['Rol'] == '5'){

			$_SESSION['Rol'] = $usuario['Rol'];
			$_SESSION['Id_Usuario'] = $usuario['Id_Usuario'];
			$_SESSION['Nombre'] = $usuario['Nombre'];
				
			header("location: ../../interface/fEstudiante/indexEstudiante.php");

		} else if($usuario['Rol'] == '2'){

			$_SESSION['Rol'] = $usuario['Rol'];
			$_SESSION['Id_Usuario'] = $usuario['Id_Usuario'];
			$_SESSION['Nombre'] = $usuario['Nombre'];
				
			header("location: ../../interface/fEditor/indexEditor.php");

		} else if($usuario['Rol'] == '3'){

			$_SESSION['Rol'] = $usuario['Rol'];
			$_SESSION['Id_Usuario'] = $usuario['Id_Usuario'];
			$_SESSION['Nombre'] = $usuario['Nombre'];
				
			header("location: ../../interface/fModerador/indexModerador.php");

		} else if($usuario['Rol'] == '4'){

			$_SESSION['Rol'] = $usuario['Rol'];
			$_SESSION['Id_Usuario'] = $usuario['Id_Usuario'];
			$_SESSION['Nombre'] = $usuario['Nombre'];
				
			header("location: ../../interface/fProfesor/indexProfesor.php");

		}
	}
?>