<script src="../../js/jsRoles.js"></script>

<?php 
	
	$Id_Rol = $_GET['Id_Rol'];
	include ("../../controller/ctrRoles/ctrRoles.php");

	$control = new ctrRoles;
	$lista = $control->consultar($Id_Rol);

	foreach ($lista as $rol){
		$Nombre = $rol->getNombre();
 		$Estado = $rol->getEstado();
	}
?>

<div class="row slide">

	<div class="col-md-12">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h3 class="panel-title text-center">Formulario para editar un rol.</h3>
			</div>

			<div class="container-fluid">
				<strong>Edite los datos solicitados.</strong>
				<hr>
				<form id="formularioModificarRol" name="formularioModificarRol" method="POST" role="form">

					<div class="form-group col-md-12">
						<label class="sr-only" for="Id_Rol">`Codigo del rol</label>
						<input type="text" class="form-control" id="Id_Rol" name="Id_Rol" placeholder="Codigo del rol" required disabled value="<?php echo $Id_Rol; ?>">
					</div>

					<div class="form-group col-md-4">
						<label class="sr-only" for="Nombre">Nombre</label>
						<input type="text" class="form-control" id="Nombre" name="Nombre" placeholder="<?php echo $Nombre; ?>" required value="<?php echo $Nombre; ?>">
					</div>

					<!--div class="form-group col-md-4">
						<label class="sr-only" for="Estado">Estado</label>
						<input type="text" class="form-control" id="Estado" name="Estado" placeholder="<?php echo $Estado; ?>" required value="<?php echo $Estado; ?>">
					</div-->

					<div class="form-group text-center col-md-12">
						<button type="button" class="btn btn-danger" onclick="cargarPagina('../../interface/fRoles/fGestionRoles.php');">Cancelar</button>
						<button type="submit" class="btn btn-primary">Actualizar</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>