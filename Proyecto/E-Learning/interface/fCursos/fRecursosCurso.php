
<script src="../../js/jsCursos.js"></script>

<?php 
	header('Content-Type: text/html; charset=UTF-8');

	$Id_Curso = $_GET['Id_Curso'];
	include ("../../controller/ctrCursos/ctrCursos.php");

	$control = new ctrCursos;
	$lista = $control->consultar($Id_Curso);

	foreach ($lista as $curso){
		$Nombre = $curso->getNombre();
		$Duracion = $curso->getDuracion();
 		$Fecha_Inicio = $curso->getFecha_Inicio();
 		$Fecha_Final = $curso->getFecha_Final();
	}
?>

<div class="container slide" style="width: 100%; margin: auto;">
	<h1><?php echo $Nombre ?></h1>

	<table>
		<tr>
			<td><strong>Fecha de Inicio: </strong></td>
			<td><?php echo $Fecha_Inicio ?></td>
		</tr>
		<tr>
			<td><strong>Fecha de Finalización: </strong></td>
			<td><?php echo $Fecha_Final ?></td>
		</tr>
	</table>

	<hr>

	<div class="col-md-2">
		<strong>Tipo de Recursos</strong>
		<ul id="sortable" class="connectedSortable">
		  <li class="ui-state-default" value="1"><span class="ui-icon ui-icon-arrowthick-2-n-s"></span>Seccion</li>
		  <li class="ui-state-default" value="1"><span class="ui-icon ui-icon-arrowthick-2-n-s"></span>Etiqueta</li>
		  <li class="ui-state-default" value="1"><span class="ui-icon ui-icon-arrowthick-2-n-s"></span>Texto</li>
		  <li class="ui-state-default" value="1"><span class="ui-icon ui-icon-arrowthick-2-n-s"></span>Enlace</li>
		</ul>
		<hr>
		<strong>ELiminar Recurso</strong>
		<div>
  			<button class="btn btn-danger" id="trash" class="text-center" style="width: 100%;"><span class="glyphicon glyphicon-trash"></span></button>
  		</div>
  		<br>
	</div>
	<div class="col-md-10">
	
		<?php for ($i = 1; $i <= 3; $i++) { ?>
			<div class="alert alert-info">
			  	<strong>Semana #<?php echo $i ?></strong>
			</div>
			<div style="width: 200px;">
				<ul id="sortable1" class="connectedSortable">
					<li><strong class="ui-state-default ui-state-disabled">Recursos</strong></li>
		  		</ul>
	  		</div>	  		
		<?php } ?>	    
		
	</div>
</div>

