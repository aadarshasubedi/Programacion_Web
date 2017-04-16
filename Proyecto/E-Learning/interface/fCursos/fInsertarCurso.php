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

					<div class="form-group col-md-6">
						<label class="sr-only" for="Nombre">Nombre</label>
						<input type="text" class="form-control" id="Nombre" name="Nombre" placeholder="Nombre del Curso" required>
					</div>

					<div class="form-group col-md-6">
						<label class="sr-only" for="Periodo">Periodo</label>
						<select class="form-control" name="Periodo" id="Periodo">
							<option value="1">I Ciclo</option>
							<option value="2">II Ciclo</option>
						</select>
					</div>

					<div class="form-group text-center col-md-12">
						<button type="button" class="btn btn-danger" onclick="cargarPagina('../../interface/fCursos/fGestionCursos.php');">Cancelar</button>
						<button type="submit" onclick="agregarCurso();" class="btn btn-primary">Agregar</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

<script src="../../resourses/js/jsCursos.js"></script>