<!DOCTYPE html>

<?php 
        
    session_start();

    if($_SESSION){
        $rol = $_SESSION['Rol'];

        if($rol == '1'){
            header("location: ../interface/fAdministrador/indexAdministrador.php");
        } else if($rol == '5') {
            header("location: ../interface/fEstudiante/indexEstudiante.php");
        } else if ($rol == '2') {
            header("location: ../interface/fEditor/indexEditor.php");
        } else if ($rol == '3') {
            header("location: ../interface/fModerador/indexModerador.php");
        } else if ($rol == '4') {
            header("location: ../interface/fProfesor/indexProfesor.php");
        } 
    } else {?>

        <html lang="en">
            <head>
                <title>Proyecto</title>
                <meta charset="utf-8">
                <meta name="viewport" content="width=device-width, initial-scale=1">

                <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
                <link href="../resourses/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
                <link href="../resourses/fonts/Montserrat.css" rel="stylesheet" type="text/css">
                <link href="../resourses/fonts/Lato.css" rel="stylesheet" type="text/css">
                <link href="../resourses/fonts/Entypo.css" rel="stylesheet" type="text/css">
                <link href="../resourses/css/estilos.css" rel="stylesheet" type="text/css">
            </head>
            <body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="60">

                <!-- Menu -->
                <?php include '../interface/complementos/menu.php'; ?>

                <!-- Texto centrado -->
                <?php include '../interface/complementos/textoCentral.php'; ?>

                <!-- Slider -->
                <?php include '../interface/complementos/slider.php'; ?>

                <div class="container">

                    <!-- Informacion de la empresa -->
                    <?php include '../interface/complementos/acercaDe.php'; ?>

                    <!-- Mision y Vision de la empresa -->
                    <?php include '../interface/complementos/misionYvision.php'; ?>

                    <!-- Contactenos -->
                    <?php include '../interface/complementos/contactenos.php'; ?>

                </div>

                <!-- Footer -->
                <?php include '../interface/complementos/footer.php'; ?>

            </body>
            <script src="../resourses/js/jQuery.js"></script>
            <script src="../resourses/bootstrap/js/bootstrap.min.js"></script>            
            <script src="../resourses/js/jquery.validate.min.js"></script>
            <script src="../resourses/js/jsPrincipal.js"></script> 
            <script src="../resourses/js/jsAcciones.js"></script>  
        </html>
<?php } ?>