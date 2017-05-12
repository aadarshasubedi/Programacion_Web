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
	<div class="col-md-12">

		<?php for ($i = 1; $i <= $Duracion; $i++) { ?>
		<div class="alert alert-info">
			<div id="semana<?php echo $i; ?>" class="connectedSortable SortableSemanas" style="width: 250px;">
				<strong class="ui" id ="s<?php echo $i; ?>">Semana #<?php echo $i ?></strong> 
				<?php 
					foreach ($listaRecursos as $recurso) {
						if($recurso->getSemana() == $i){ ?>
							<li class="ui-state-default sinEstilo" value="0" id="<?php echo $recurso->getId_Tipo_Recurso()?>" identificador="<?php echo $recurso->getIdentificador()?>" Url="<?php echo $recurso->getUrl()?>" onclick="guardaTempRecursoSelected(this);"><span data-hover="tooltip" title="Configuracion" onclick="abrirModal();" class="ui-icon ui-icon-pencil"></span>
				<?php 	if($recurso->getId_Tipo_Recurso() == 1){ ?>
							<strong Id="tituloSeccion"><?php echo $recurso->getNombre()?></strong>
				<?php } else if($recurso->getId_Tipo_Recurso() == 2){ ?>
							<strong id="tituloEtiqueta"><?php echo $recurso->getNombre()?></strong>
				<?php } else if($recurso->getId_Tipo_Recurso() == 3){ ?>
							<input type="text" id="seccion" placeholder="Texto" style="width: 150px;"/>
				<?php } else if($recurso->getId_Tipo_Recurso() == 4){ ?>
							<a href="#" onclick="reproducir('<?php echo $recurso->getNombre()?>','<?php echo $recurso->getUrl()?>');" style="color: blue"><?php echo $recurso->getNombre()?></a>
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

<div id="modalVideo" class="modal fade" data-backdrop="static" role="dialog">
	<div class="modal-dialog">

		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 id="title" class="modal-title"></h4>
			</div>
			<div class="modal-body">
				<video id="video" src="" width="100%" height="100%" controls loop preload="auto" ></video>
			</div>
		</div>

	</div>
</div>