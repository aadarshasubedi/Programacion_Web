<!-- Menu --> 

<?php
  header('Content-Type: text/html; charset=UTF-8');

  include ("../../controller/ctrCursos/ctrCursos.php");

  $Id_Usuario = $_SESSION['Id_Usuario'];

  $control = new ctrCursos;
  $lista = $control->cursosEstudiante($Id_Usuario);

?>

<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container">

    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
      <span class="glyphicon glyphicon-menu-hamburger"></span>                     
    </button>

    <div class="navbar-header">
      <a class="navbar-brand" href="#" onclick="home();">STUDENT.: E-LEARNING</a>
    </div>

    <div class="collapse navbar-collapse" id="myNavbar">

      <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">Perfil
          <span class="glyphicon glyphicon-user"></span></a>
          <ul class="dropdown-menu" style="background-color: #23819C;">
            <li><a href="#" title="Editar Perfil" onclick="cargarPagina('../../interface/fUsuarios/fModificarUsuarioLogin.php');"><span class="glyphicon glyphicon-pencil"></span> Editar</a></li>
            <li><a href="#" title="Cerrar Sesión" onclick="cerrarSesion();"><span class="glyphicon glyphicon-log-out"></span> Salir</a></li>
          </ul>
        </li>
      </ul>

      <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Cursos<b class="caret"></b>
          </a>
          <ul class="dropdown-menu" style="background-color: #23819C;">
            
            <?php foreach ($lista as $curso) { ?>            
                    <li><a href="#" onclick="cargarCursoEstudiante(<?php echo $curso->getId_Curso(); ?>);"><?php echo $curso->getNombre(); ?></a></li>
            <?php } ?>

          </ul>
        </li>
      </ul>

    </div>
  </div>
</nav>

<script src="../../resourses/js/jsCursos.js"></script>