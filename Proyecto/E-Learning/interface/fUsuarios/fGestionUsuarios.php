
<div id="datos">
	<button type="button" class="btn btn-primary" onclick="cargarPaginaDatos('../../interface/fUsuarios/fInsertarUsuario.php');">Nuevo Usuario</button>
</div>

<p><hr></p>

<div id="lista">		
 	<?php
		include ("../../interface/fUsuarios/fListaUsuarios.php");
  ?>		
</div>

<div id="informativo" class="modal fade" data-backdrop="static" data-keyboard="false" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Enhorabuena</h4>
      </div>
      <div class="modal-body">
        <div id="mensaje"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" onclick="" data-dismiss="modal">Aceptar</button>
      </div>
    </div>

  </div>
</div>

<div id="eliminar" class="modal fade" data-backdrop="static" data-keyboard="false" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Alerta</h4>
      </div>
      <div class="modal-body">
        <div id="mensajeEliminar"></div>
      </div>
      <div class="modal-footer">      
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
        <button type="button" id="eliminarU" class="btn btn-default" data-dismiss="modal">Aceptar</button>
      </div>
    </div>

  </div>
</div>

<?php include ("../../interface/fUsuarios/fInformacionUsuario.php"); ?>

<script src="../../resourses/js/jsUsuarios.js"></script>