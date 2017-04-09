
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

<style>
	.sinPunto {
		list-style: none;
	}

	.sinEstilo {
		height: 50px;
		border-style: none;
		background-color: transparent;
	}
</style>

<div class="container slide" style="width: 100%; margin: auto;">
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

	<hr>

	<div class="col-md-4">
		<strong>Tipo de Recursos</strong>
		<ul id="sortable" class="connectedSortable">
		  <li class="ui-state-default sinEstilo" id="1"><span class="ui-icon ui-icon-arrowthick-2-n-s"></span>
		  	<strong>Seccion!</strong>
		  </li>
		  <li class="ui-state-default sinEstilo" id="2"><span class="ui-icon ui-icon-arrowthick-2-n-s"></span>
		  	<span>No hay Clases!</span>
		  </li>
		  <li class="ui-state-default sinEstilo" id="3"><span class="ui-icon ui-icon-arrowthick-2-n-s"></span>
			<input type="text" id="seccion" placeholder="Texto"/>
		  </li>
		  <li class="ui-state-default sinEstilo" id="4"><span class="ui-icon ui-icon-arrowthick-2-n-s"></span>
			<a href="#" style="color: blue">Libro Programacion Web</a>
		  </li>
		</ul>
		<hr>
		<strong>Opciones Recurso</strong>
		<div>
  			<button class="btn btn-primary" class="text-center" style="width: 100%;"><span class="glyphicon glyphicon-save"></span></button><br><br>
  			<button class="btn btn-danger" id="trash" class="text-center" style="width: 100%;"><span class="glyphicon glyphicon-trash"></span></button>
  		</div>
  		<br>
	</div>
	<div class="col-md-8">

		<?php for ($i = 1; $i <= 4; $i++) { ?>
		<div class="alert alert-info">
			<div id="sortable1" class="connectedSortable SortableSemanas">
				<strong id ="<?php echo $i; ?>">Semana #<?php echo $i ?></strong>
			</div>
		</div> 	
		<?php } ?>	   

	</div>
</div>

