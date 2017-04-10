<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="../../js/jsCursos.js"></script>

<div id="datos">
  <?php 
    session_start();
    if($_SESSION['Rol'] == 'Administrador'){
  ?>
	<button type="button" class="btn btn-primary" onclick="cargarPaginaDatos('../../interface/fCursos/fInsertarCurso.php');">Nuevo Curso</button>
	<?php } ?>
</div>

<p><hr></p>

<div id="lista">		
 	<?php
		include ("../../interface/fCursos/fListaCursos.php");
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
        <button type="button" id="eliminarC" class="btn btn-default" data-dismiss="modal">Aceptar</button>
      </div>
    </div>

  </div>
</div>