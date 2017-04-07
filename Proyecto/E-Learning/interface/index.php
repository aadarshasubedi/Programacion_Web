<!DOCTYPE html>

<?php 
        
    session_start();

    if($_SESSION){
        $rol = $_SESSION['Rol'];

        if($rol == 'Administrador'){
            header("location: ../interface/fAdministrador/indexAdministrador.php");
        } else if($rol == 'Estudiante') {
            header("location: ../interface/fEstudiante/indexEstudiante.php");
        }
    } else {?>

        <html lang="en">
          <head>
            <title>Proyecto</title>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">

            <link rel="stylesheet" href="../js/bootstrap/css/bootstrap.min.css">
            <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
            <link href="../js/fonts/Montserrat.css" rel="stylesheet" type="text/css">
            <link href="../js/fonts/Lato.css" rel="stylesheet" type="text/css">
            <link href="../js/fonts/Entypo.css" rel="stylesheet" type="text/css">
            <script src="../js/jQuery.js"></script>
            <script src="../js/bootstrap/js/bootstrap.min.js"></script>
            
            <link rel="stylesheet" href="../js/css/estilos.css">
            <script src="../js/jquery.validate.min.js"></script>
            <script src="../js/jsPrincipal.js"></script> 
            <script src="../js/jsAcciones.js"></script>  
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
        </html>
<?php } ?>