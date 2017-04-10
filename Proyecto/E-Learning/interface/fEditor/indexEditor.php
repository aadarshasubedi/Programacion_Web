<!DOCTYPE html>

<?php
	session_start();

	if(!$_SESSION){
		header("location: ../../interface/index.php");
	} else {
		$rol = $_SESSION['Rol'];

		if($rol == 'Administrador'){
            header("location: ../../interface/fAdministrador/indexAdministrador.php");
        } else if ($rol == 'Estudiante') {
            header("location: ../../interface/fEstudiante/indexEstudiante.php");
        } else if ($rol == 'Moderador') {
            header("location: ../../interface/fModerador/indexModerador.php");
        } else if ($rol == 'Profesor') {
            header("location: ../../interface/fProfesor/indexProfesor.php");
        }  else if ($rol == 'Editor') {
            //
        } else {
            header("location: ../../interface/index.php");
        }
	}
?>

<html lang="en">
  <head>
    <title>Editor</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="../../js/bootstrap/css/bootstrap.min.css">
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="../../js/fonts/Montserrat.css" rel="stylesheet" type="text/css">
    <link href="../../js/fonts/Lato.css" rel="stylesheet" type="text/css">
    <link href="../../js/fonts/Entypo.css" rel="stylesheet" type="text/css">
    <script src="../../js/jQuery.js"></script>
    <script src="../../js/bootstrap/js/bootstrap.min.js"></script>
    
    <link rel="stylesheet" href="../../js/css/estilos.css">
    <script src="../../js/jquery.validate.min.js"></script>    
    <script src="../../js/jsPrincipal.js"></script> 
    <script src="../../js/jsAcciones.js"></script>  
  </head>
  <body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="60">
    
    <!-- Menu -->
    <?php include '../../interface/complementos/menuEditor.php'; ?>
    
    <!-- Contenedor -->
    <div id="contenedor" class="container-fluid" style="width: 90%; margin: auto; margin-top: 20px;">
        <div class="slide">
            <h1 class="text-center"><b>E-Learning Editor</b></h1>
            <p class="text-justify"><i>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sequi possimus animi esse corporis non eum voluptas dolorum quisquam itaque, pariatur, aut dolor vel culpa quam placeat, ea qui nulla eligendi tenetur nemo nobis minus fuga accusamus. Iste, unde, soluta delectus mollitia, itaque saepe aperiam ullam facere alias officiis iure architecto!</i></p>   
            <p class="text-justify"><i>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eos tenetur velit obcaecati a quam libero error incidunt voluptatibus neque, in quae aut! Labore atque illum mollitia consequatur veritatis quidem id ipsum cumque nemo quisquam, necessitatibus aliquam, error voluptate et inciduntollitia, itaque saepe aperiam ullam.</i></p> 
        </div>
    </div>

    <!-- Footer -->
    <?php include '../../interface/complementos/footer.php'; ?>

  </body>
</html>