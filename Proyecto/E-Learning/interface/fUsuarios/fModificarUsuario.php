
<?php 
	
	$Id_Usuario = $_GET['Id_Usuario'];
	include ("../../controller/ctrUsuarios/ctrUsuarios.php");

	$control = new ctrUsuarios;
	$lista = $control->consultarModificar($Id_Usuario);

	foreach ($lista as $usuario){
		$Id_Usuario = $usuario->getId_Usuario();
		$Clave = $usuario->getClave();
 		$Nombre = $usuario->getNombre();
 		$Primer_Apellido = $usuario->getPrimer_Apellido();
 		$Segundo_Apellido = $usuario->getSegundo_Apellido();
 		$Id_Genero = $usuario->getId_Genero();
 		$Pais = $usuario->getPais();
 		$Id_Rol = $usuario->getRol();
	}
?>

<div class="row slide">

	<div class="col-md-12">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h3 class="panel-title" style="text-align:center;">Formulario para editar un usuario.</h3>
			</div>

			<div class="container-fluid">
				<strong>Edite los datos requeridos.</strong>
				<hr>
				<form id="formularioModificarUsuario" name="formularioModificarUsuario" method="POST" role="form">

					<div class="form-group col-md-4">
						<label class="sr-only" for="Id_Usuario">Número de Identificación</label>
						<input type="text" class="form-control" id="Id_Usuario" name="Id_Usuario" placeholder="<?php echo $Id_Usuario; ?>" value="<?php echo $Id_Usuario; ?>" disable>
					</div>

					<div class="form-group col-md-4">
						<label class="sr-only" for="Clave">Clave de Acceso</label>
						<input type="text" class="form-control" id="Clave" name="Clave" placeholder="<?php echo $Clave; ?>" value="<?php echo $Clave; ?>" required>
					</div>

					<div class="form-group col-md-4">
						<label class="sr-only" for="Id_Genero">Género:</label>
					    <select class="form-control" name="Id_Genero" id="Id_Genero">
						    <option value="1" <?php if($Id_Genero == 1){ echo 'selected'; } ?>>Masculino</option>
						    <option value="2" <?php if($Id_Genero == 2){ echo 'selected'; } ?>>Femenino</option>
						    <option value="3" <?php if($Id_Genero == 3){ echo 'selected'; } ?>>Otro</option>
					    </select>
					</div>

					<div class="form-group col-md-4">
						<label class="sr-only" for="Nombre">Nombre del Usuario</label>
						<input type="text" class="form-control" id="Nombre" name="Nombre" placeholder="<?php echo $Nombre; ?>" value="<?php echo $Nombre; ?>" required>
					</div>

					<div class="form-group col-md-4">
						<label class="sr-only" for="Primer_Apellido">Primer Apellido</label>
						<input type="text" class="form-control" id="Primer_Apellido" name="Primer_Apellido" placeholder="<?php echo $Primer_Apellido; ?>" value="<?php echo $Primer_Apellido; ?>" required>
					</div>

					<div class="form-group col-md-4">
						<label class="sr-only" for="Segundo_Apellido">Segundo Apellido</label>
						<input type="text" class="form-control" id="Segundo_Apellido" name="Segundo_Apellido" placeholder="<?php echo $Segundo_Apellido; ?>" value="<?php echo $Segundo_Apellido; ?>" required>
					</div>

					<div class="form-group col-md-4">
						<label class="sr-only" for="Pais">País</label>
						<input type="text" class="form-control" id="Pais" name="Pais" placeholder="<?php echo $Pais; ?>" value="<?php echo $Pais; ?>" required>
					</div>
					<div class="form-group col-md-4">
					<label class="sr-only" for="Id_Rol">Tipo Usuario:</label>
					   <select class="form-control" name="Id_Rol" id="Id_Rol">
					   <option value="1" <?php if($Id_Rol == 1){ echo 'selected'; } ?>>Administrador</option>
					   <option value="2" <?php if($Id_Rol == 2){ echo 'selected'; } ?>>Editor</option>
					   <option value="3" <?php if($Id_Rol == 3){ echo 'selected'; } ?>>Moderador</option>
					   <option value="4" <?php if($Id_Rol == 4){ echo 'selected'; } ?>>Profesor</option>
					   <option value="5" <?php if($Id_Rol == 5){ echo 'selected'; } ?>>Estudiante</option>
					   </select>
					</div>					
					<div class="form-group col-md-4"></div>

					<div class="form-group text-center col-md-12">
						<button type="button" class="btn btn-danger" onclick="cargarPagina('../../interface/fUsuarios/fGestionUsuarios.php');">Cancelar</button>
						<button type="submit" class="btn btn-primary">Actualizar</button>
					</div>
				</form>
			</div>
		</div>
	</div>

</div>

<script src="../../resourses/js/jsUsuarios.js"></script>