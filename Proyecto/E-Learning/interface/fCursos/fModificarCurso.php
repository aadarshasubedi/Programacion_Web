<?php 
	
	$Id_Curso = $_GET['Id_Curso'];
	include ("../../controller/ctrCursos/ctrCursos.php");

	$control = new ctrCursos;
	$lista = $control->consultar($Id_Curso);

	foreach ($lista as $curso){
		$Nombre = $curso->getNombre();
 		$Fecha_Inicio = $curso->getFecha_Inicio();
 		$Fecha_Final = $curso->getFecha_Final();
 		$Id_Profesor = $curso->getId_Profesor();
	}

	$listaProfesores = $control->listarProfesores();
?>

<div class="row slide">

	<div class="col-md-12">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h3 class="panel-title text-center">Formulario para editar un curso.</h3>
			</div>

			<div class="container-fluid">
				<strong>Edite los datos solicitados.</strong>
				<hr>
				<form id="formularioModificarCurso" name="formularioModificarCurso" method="POST" role="form">

					<div class="form-group col-md-12">
						<label class="sr-only" for="Id_Curso">`Codigo del Curso</label>
						<input type="text" class="form-control" id="Id_Curso" name="Id_Curso" placeholder="Codigo del Curso" required disabled value="<?php echo $Id_Curso; ?>">
					</div>

					<div class="form-group col-md-4">
						<label class="sr-only" for="Nombre">Nombre</label>
						<input type="text" class="form-control" id="Nombre" name="Nombre" placeholder="<?php echo $Nombre; ?>" required value="<?php echo $Nombre; ?>">
					</div>

					<div class="form-group col-md-4">
						<label class="sr-only" for="Fecha_Inicio">Fecha Inicio</label>
						<input type="date" class="form-control" id="Fecha_Inicio" name="Fecha_Inicio" placeholder="<?php echo $Fecha_Inicio; ?>" required value="<?php echo $Fecha_Inicio; ?>">
					</div>

					<div class="form-group col-md-4">
						<label class="sr-only" for="Fecha_Final">Fecha Final</label>
						<input type="date" class="form-control" id="Fecha_Final" name="Fecha_Final" placeholder="<?php echo $Fecha_Final; ?>" required value="<?php echo $Fecha_Final; ?>">
					</div>

					<div class="form-group col-md-4">
						<select class="form-control" name="Id_Profesor" id="Id_Profesor">
						<?php foreach ($listaProfesores as $usuario) { ?>
								<option value="<?php echo $usuario->getId_Usuario(); ?>" <?php if($usuario->getId_Usuario() == $Id_Profesor){ echo 'selected'; } ?>><?php echo $usuario->getNombre()." ".$usuario->getPrimer_Apellido()." ".$usuario->getSegundo_Apellido(); ?></option>						
						<?php }	?>
						</select>
					</div>

					<div class="form-group text-center col-md-12">
						<button type="button" class="btn btn-danger" onclick="cargarPagina('../../interface/fCursos/fGestionCursos.php');">Cancelar</button>
						<button type="submit" class="btn btn-primary">Actualizar</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

<script src="../../resourses/js/jsCursos.js"></script>