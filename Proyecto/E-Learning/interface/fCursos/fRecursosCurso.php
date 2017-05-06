<script src="../../resourses/js/jsRecurso.js"></script>

<?php 
	header('Content-Type: text/html; charset=UTF-8');

	$Id_Curso = $_GET['Id_Curso'];
	include ("../../controller/ctrCursos/ctrCursos.php");
	$controlCursos = new ctrCursos();
	$lista = $controlCursos->consultar($Id_Curso);
	foreach ($lista as $curso){
		$Nombre = $curso->getNombre();
		$Duracion = $curso->getDuracion();
 		$Fecha_Inicio = $curso->getFecha_Inicio();
 		$Fecha_Final = $curso->getFecha_Final();
	}

	$listaRecursos = $controlCursos->consultarRecursos($Id_Curso);
	//$listaTiposRecursos = $controlCursos->consultarTiposRecursos();

	//include ("../../controller/ctrRecursos/ctrRecursos.php");
	//$controlRecursos = new ctrRecursos();

?>

<style>
	span.ui-icon.ui-icon-pencil{
		float: right;
	}

	.sinPunto {
		list-style: none;
	}

	.sinEstilo {
		padding: 5px;
		/*height: 50px;*/
		border-style: none;
		background-color: transparent;
	}
</style>

	<!-- Modal -->
	<div id="modalRecurso" class="modal fade" role="dialog">
		<div class="modal-dialog">

			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Configuracion Recurso</h4>
				</div>
				<div class="modal-body">
					<form id="formModalRecurso" method="post">
						<label for="nombreEtiqueta">Nombre</label>
						<input type="text" id="nombreEtiqueta" name="nombreEtiqueta">
					</form>
				</div>
				<div class="modal-footer">
					<button type="submit" id="btnSubmitModal" class="btn btn-success">Guardar</button>        
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
			</div>

		</div>
	</div>
	<!--Fin Modal -->

<div class="container" style="width: 100%; margin: auto;">
	<h1><?php echo $Nombre ?></h1>

	<table>
		<tr>
			<td><strong>Codigo Curso: </strong></td>
			<td id="Id_Curso"><?php echo $Id_Curso ?></td>
		</tr>
		<tr>
			<td><strong>Fecha de Inicio: </strong></td>
			<td><?php echo $Fecha_Inicio ?></td>
		</tr>
		<tr>
			<td><strong>Fecha de Finalizacion: </strong></td>
			<td><?php echo $Fecha_Final ?></td>
		</tr>
	</table>
	<div class="text-right">
		<input value="Guardar Configuraci&oacute;n" class="btn btn-success" type="button" onclick="guardarConfigurarion();" name="btnGuardar">
		<button type="button" class="btn btn-danger" onclick="cargarPagina('../../interface/fCursos/fGestionCursos.php');">Cancelar</button>
	</div>

	<hr>

	<div class="col-md-3">
		<strong>Tipo de Recursos</strong>
		<ul id="sortable" class="connectedSortable">
		  <li class="ui-state-default sinEstilo" value="1" id="1"><span class="ui-icon ui-icon-arrowthick-2-n-s"></span>
		  	<strong>Seccion!</strong>
		  </li>
		  <li class="ui-state-default sinEstilo" value="1" id="2"><span class="ui-icon ui-icon-arrowthick-2-n-s"></span>
		  	<strong>No hay Clases!</strong>
		  </li>
		  <li class="ui-state-default sinEstilo" value="1" id="3"><span class="ui-icon ui-icon-arrowthick-2-n-s"></span>
			<input type="text" id="seccion" placeholder="Texto" style="width: 150px;"/>
		  </li>
		  <li class="ui-state-default sinEstilo" value="1" id="4"><span class="ui-icon ui-icon-arrowthick-2-n-s"></span>
			<a href="#" style="color: blue">Libro Programacion Web</a>
		  </li>
		</ul>
		<hr>
		<strong>Opciones Recurso</strong>
		<div class="text-center" >
  			<button class="btn btn-danger" id="trash" style="width: 200px;"><span class="glyphicon glyphicon-trash"></span></button>
  		</div>
  		<br>
	</div>
	<div class="col-md-9">

		<?php for ($i = 1; $i <= $Duracion; $i++) { ?>
		<div class="alert alert-info">
			<div id="semana<?php echo $i; ?>" class="connectedSortable SortableSemanas" style="width: 250px;">
				<strong class="ui" id ="s<?php echo $i; ?>">Semana #<?php echo $i ?></strong> 
				<?php 
					foreach ($listaRecursos as $recurso) {
						if($recurso->getSemana() == $i){ ?>
							<li class="ui-state-default sinEstilo" value="0" id="<?php echo $recurso->getId_Tipo_Recurso()?>" identificador="<?php echo $recurso->getIdentificador()?>" onclick="prueba(this);"><span data-hover="tooltip" title="Configuracion" data-toggle="modal" data-target="#modalRecurso" class="ui-icon ui-icon-pencil"></span>
				<?php 	if($recurso->getId_Tipo_Recurso() == 1){ ?>
							<strong Id="tituloSeccion"><?php echo $recurso->getNombre()?></strong>
				<?php } else if($recurso->getId_Tipo_Recurso() == 2){ ?>
							<strong id="tituloEtiqueta"><?php echo $recurso->getNombre()?></strong>
				<?php } else if($recurso->getId_Tipo_Recurso() == 3){ ?>
							<input type="text" id="seccion" placeholder="Texto" style="width: 150px;"/>
				<?php } else if($recurso->getId_Tipo_Recurso() == 4){ ?>
							<a href="#" style="color: blue"><?php echo $recurso->getNombre()?></a>
							 </li>
				<?php } 
						} 
					} 
				?>

			</div>
		</div> 	
		<?php } ?>	   

	</div>

</div>
