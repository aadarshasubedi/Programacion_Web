<div class="row slide">

	<div class="col-md-12">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h3 class="panel-title text-center">Formulario para agregar un rol.</h3>
			</div>

			<div class="container-fluid">
				<strong>Ingrese los datos solicitados.</strong>
				<hr>
				<form id="formularioRol" name="formularioRol" method="POST" role="form">

					<div class="form-group col-md-4">
						<label class="sr-only" for="Nombre">Nombre</label>
						<input type="text" class="form-control" id="Nombre" name="Nombre" placeholder="Nombre del Rol" required>
					</div>

					<div class="form-group text-center col-md-12">
						<button type="button" class="btn btn-danger" onclick="cargarPagina('../../interface/fRoles/fGestionRoles.php');">Cancelar</button>
						<button type="submit" class="btn btn-primary">Agregar</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

<script src="../../resourses/js/jsRoles.js"></script>