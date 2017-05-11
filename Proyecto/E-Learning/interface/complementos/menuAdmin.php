<!-- Menu -->
  <nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">

      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="glyphicon glyphicon-menu-hamburger"></span>                     
      </button>
      
      <div class="navbar-header">
        <a class="navbar-brand" href="#" onclick="home();">ADMIN.: E-LEARNING</a>
      </div>

      <div class="collapse navbar-collapse" id="myNavbar">
        <ul class="nav navbar-nav navbar-right">
          
          <li><a href="#" title="Módulo de Usuarios" onclick="cargarPagina('../../interface/fUsuarios/fGestionUsuarios.php');">Usuarios</a></li>
          <li><a href="#" title="Módulo de Roles" onclick="cargarPagina('../../interface/fRoles/fGestionRoles.php');">Roles</a></li>
          <li><a href="#" title="Módulo de Cursos" onclick="cargarPagina('../../interface/fCursos/fGestionCursos.php');">Cursos</a></li>          
          <li><a href="#" title="Módulo de Matrícula" onclick="cargarPagina('../../interface/fMatriculas/fGestionMatriculas.php');">Matrícula</a></li>

          <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">Perfil
            <span class="glyphicon glyphicon-user"></span></a>
            <ul class="dropdown-menu" style="background-color: #23819C;">
              <li><a href="#" title="Editar Perfil" onclick="cargarPagina('../../interface/fUsuarios/fModificarUsuarioLogin.php');"><span class="glyphicon glyphicon-pencil"></span> Editar</a></li>
              <li><a href="#" title="Cerrar Sesión" onclick="cerrarSesion();"><span class="glyphicon glyphicon-log-out"></span> Salir</a></li>
            </ul>
          </li>
        </ul>
      </div>

    </div>
  </nav>

  