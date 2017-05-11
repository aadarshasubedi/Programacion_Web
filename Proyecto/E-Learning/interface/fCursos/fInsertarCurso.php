<?php
	header('Content-Type: text/html; charset=UTF-8');

	include ("../../controller/ctrUsuarios/ctrUsuarios.php");

	$control = new ctrUsuarios;
	$listaProfesores = $control->listarProfesores();

?>

<div class="row slide">

	<div class="col-md-12">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h3 class="panel-title text-center">Formulario para agregar un curso.</h3>
			</div>

			<div class="container-fluid">
				<strong>Ingrese los datos solicitados.</strong>
				<hr>
				<form id="formularioCurso" name="formularioCurso" method="POST" role="form">

					<div class="form-group col-md-4">
						<label class="sr-only" for="Nombre">Nombre</label>
						<input type="text" class="form-control" id="Nombre" name="Nombre" placeholder="Nombre del Curso" required>
					</div>

					<div class="form-group col-md-4">
						<label class="sr-only" for="Fecha_Inicio">Fecha Inicio</label>
						<input type="date" class="form-control" id="Fecha_Inicio" name="Fecha_Inicio" placeholder="Fecha de Inicio" required>
					</div>

					<div class="form-group col-md-4">
						<label class="sr-only" for="Fecha_Final">Fecha Final</label>
						<input type="date" class="form-control" id="Fecha_Final" name="Fecha_Final" placeholder="Fecha Finalizacion" required>
					</div>

					<div class="form-group col-md-4">
						<select class="form-control" name="Id_Profesor" id="Id_Profesor">
						<option value="#" selected disabled>Seleccione un Profesor</option>
						<?php 
							foreach ($listaProfesores as $usuario) {
								echo "<option value=\"".$usuario->getId_Usuario()."\">".$usuario->getNombre()." ".$usuario->getPrimer_Apellido()." ".$usuario->getSegundo_Apellido()."</option>";
							}
						 ?>
						</select>
					</div>

					<div class="form-group text-center col-md-12">
						<button type="button" class="btn btn-danger" onclick="cargarPagina('../../interface/fCursos/fGestionCursos.php');">Cancelar</button>
						<button type="submit" class="btn btn-primary">Agregar</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

<script src="../../resourses/js/jsCursos.js"></script>