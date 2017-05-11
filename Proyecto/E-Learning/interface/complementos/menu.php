<!-- Menu -->

  <nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
      <div class="navbar-header">

        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
          <span class="icon-bar"></span>                     
        </button>

        <a class="navbar-brand" href="#myPage">E-LEARNING</a>
      </div>

      <div class="collapse navbar-collapse" id="myNavbar">
        <ul class="nav navbar-nav navbar-right">
          <li><a href="#acercaDe">Acerca de</a></li>
          <li><a href="#misionYvision">Misión / Visión</a></li>
          <li><a href="#contactenos">Contáctenos</a></li>
          <li><a href="#modalLogin" id="mLogin"><span class="glyphicon glyphicon-log-in"></span> Ingresar</a></li>
        </ul>
      </div>

    </div>
  </nav>

  <!-- Modal content-->
  <div class="modal fade" id="modalLogin" role="dialog" data-backdrop="static" data-keyboard="false" >
    <div class="modal-dialog modal-sm">    
      <div class="modal-content">

        <div class="modal-header" style="background-color: #23819C;">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title" style="color: #fff;">Iniciar Sesión</h4>
        </div>

        <form id="formIniciarSesion" name="formIniciarSesion" method="POST" role="form">
          <div class="modal-body">          
            <div class="input-group" style="width: 90%; margin: auto;">
              <span class="input-group-addon">User</span>
              <input id="identificacion" name="identificacion" type="text" class="form-control" placeholder="Identificación" required="" title="Identificación de Usuario">
            </div>
            <br>
            <div class="input-group" style="width: 90%; margin: auto;">
              <span class="input-group-addon">Pass</span>
              <input id="clave" name="clave" type="password" class="form-control" placeholder="Contraseña" required="" title="Contraseña de Usuario">
            </div>
            <br>
            <div class="input-group" style="margin: auto;">
              <button type="submit" class="btn btn-default">Ingresar al sistema</button>
            </div>
            <br>
              <a href="#">¿Olvidó su contraseña?</a>
            <hr>
          </div>
        </form>

      </div>      
    </div>
  </div>