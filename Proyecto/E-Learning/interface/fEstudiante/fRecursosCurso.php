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

	$listaRecursos = $control->consultarRecursos($Id_Curso);

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
	<hr>
	<div class="col-md-12">

		<?php for ($i = 1; $i <= $Duracion; $i++) { ?>
		<div class="alert alert-info">
			<div style="width: 250px;">
				<strong id ="s<?php echo $i; ?>">Semana #<?php echo $i ?></strong> 

				<?php 
					foreach ($listaRecursos as $recurso) {
						if($recurso->getSemana() == $i){
							if($recurso->getId_Tipo_Recurso() == 1){ ?>
								
								<li class="sinEstilo" value="0" id="1">
								  	<strong>Seccion!</strong>
							  	</li>

				<?php		} else if($recurso->getId_Tipo_Recurso() == 2){ ?>
								
								<li class="sinEstilo" value="0" id="2">
								  	<span>No hay Clases!</span>
							  	</li>

				<?php		} else if($recurso->getId_Tipo_Recurso() == 3){ ?>
								
								<li class="sinEstilo" value="0" id="3">
									<input type="text" id="seccion" placeholder="Texto" style="width: 150px;"/>
							  	</li>

				<?php		} else if($recurso->getId_Tipo_Recurso() == 4){ ?>
								<li class="sinEstilo" value="0" id="4">
									<a href="#" style="color: blue">Libro Programacion Web</a>
							    </li>
				<?php		} 
						} 
					} 
				?>

			</div>
		</div> 	
		<?php } ?>	   

	</div>
</div>