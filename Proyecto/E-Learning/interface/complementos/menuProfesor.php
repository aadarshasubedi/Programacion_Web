<!-- Menu -->
  <nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">

      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="glyphicon glyphicon-menu-hamburger"></span>                     
      </button>
      
      <div class="navbar-header">
        <a class="navbar-brand" href="#" onclick="home();">PROFESOR.: E-LEARNING</a>
      </div>

      <div class="collapse navbar-collapse" id="myNavbar">
        <ul class="nav navbar-nav navbar-right">
          
          <li><a href="#" title="Módulo de Cursos" onclick="cargarPagina('../../interface/fCursos/fGestionCursos.php');">Cursos</a></li>          
          
          <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">Perfil
            <span class="glyphicon glyphicon-user"></span></a>
            <ul class="dropdown-menu" style="background-color: #23819C;">
              <li><a href="#"><span class="glyphicon glyphicon-pencil"></span> Editar</a></li>
              <li><a href="#" title="Cerrar Sesión" onclick="cerrarSesion();"><span class="glyphicon glyphicon-log-out"></span> Salir</a></li>
            </ul>
          </li>
        </ul>
      </div>

    </div>
  </nav>