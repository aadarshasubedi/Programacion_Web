<!-- Menu --> 

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
              <li><a href="#"><span class="glyphicon glyphicon-pencil"></span> Editar</a></li>
              <li><a href="#" title="Cerrar Sesión" onclick="cerrarSesion();"><span class="glyphicon glyphicon-log-out"></span> Salir</a></li>
            </ul>
          </li>
        </ul>

        <ul class="nav navbar-nav navbar-right">
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Cursos<b class="caret"></b>
            </a>
            <ul class="dropdown-menu" style="background-color: #23819C;">
              <li><a href="#">Curso #1</a></li>
              <li><a href="#">Curso #2</a></li>
              <li><a href="#">Curso #3</a></li>
              <li><a href="#">Curso #4</a></li>
            </ul>
          </li>
        </ul>

      </div>
    </div>
  </nav>