<!DOCTYPE html>

<?php
	session_start();

	if(!$_SESSION){
		header("location: ../../interface/index.php");
	} else {
		$rol = $_SESSION['Rol'];

		if($rol == '1'){
            header("location: ../../interface/fAdministrador/indexAdministrador.php");
        } else if ($rol == '2') {
            header("location: ../../interface/fEditor/indexEditor.php");
        } else if ($rol == '3') {
            header("location: ../../interface/fModerador/indexModerador.php");
        } else if ($rol == '4') {
            header("location: ../../interface/fProfesor/indexProfesor.php");
        } else if ($rol == '5') {
            //
        } else {
            header("location: ../../interface/index.php");
        }
	}
?>

<html lang="en">
    <head>
        <title>Estudiante</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
        <link href="../../resourses/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <link href="../../resourses/fonts/Montserrat.css" rel="stylesheet" type="text/css">
        <link href="../../resourses/fonts/Lato.css" rel="stylesheet" type="text/css">
        <link href="../../resourses/fonts/Entypo.css" rel="stylesheet" type="text/css">
        <link href="../../resourses/css/estilos.css" rel="stylesheet" type="text/css"> 
    </head>
    <body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="60">

        <!-- Menu -->
        <?php include '../../interface/complementos/menuStudent.php'; ?>

        <!-- Contenedor -->
        <div id="contenedor" class="container-fluid" style="width: 90%; margin: auto; margin-top: 40px;">
            <div class="slide">
                <h1 class="text-center"><b>E-Learning Student</b></h1>
                <p class="text-justify"><i>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sequi possimus animi esse corporis non eum voluptas dolorum quisquam itaque, pariatur, aut dolor vel culpa quam placeat, ea qui nulla eligendi tenetur nemo nobis minus fuga accusamus. Iste, unde, soluta delectus mollitia, itaque saepe aperiam ullam facere alias officiis iure architecto!</i></p>   
                <p class="text-justify"><i>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eos tenetur velit obcaecati a quam libero error incidunt voluptatibus neque, in quae aut! Labore atque illum mollitia consequatur veritatis quidem id ipsum cumque nemo quisquam, necessitatibus aliquam, error voluptate et inciduntollitia, itaque saepe aperiam ullam.</i></p> 
            </div>
        </div>

        <!-- Footer -->
        <?php include '../../interface/complementos/footer.php'; ?>

    </body>
    <script src="../../resourses/js/jQuery.js"></script>
    <script src="../../resourses/bootstrap/js/bootstrap.min.js"></script>            
    <script src="../../resourses/js/jquery.validate.min.js"></script>
    <script src="../../resourses/bootstrap/js/bootstrap-table.js"></script>
    <script src="../../resourses/js/jsPrincipal.js"></script> 
    <script src="../../resourses/js/jsAcciones.js"></script> 
</html>