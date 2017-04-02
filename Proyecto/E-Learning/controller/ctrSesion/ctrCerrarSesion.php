<?php
	session_start();
	
	if($_SESSION['Rol']){
		session_destroy();
		header("location: ../../interface/index.php");
	}else{
		header("location: ../../interface/index.php");
	}
?>