
<script src="../../js/jsUsuarios.js"></script>

<?php 
	header('Content-Type: text/html; charset=UTF-8');
	include("../../controller/ctrRoles/ctrRoles.php");

	$control = new ctrRoles();
	$listar = $control->listar();
 ?>

<div class="row slide">

	<div class="col-md-12">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h3 class="panel-title" style="text-align:center;">Formulario para agregar un usuario.</h3>
			</div>

			<div class="container-fluid">
				<strong>Ingrese los datos solicitados.</strong>
				<hr>
				<form id="formularioUsuario" name="formularioUsuario" method="POST" role="form">
					<div class="form-group col-md-4">
						<label class="sr-only" for="Id_Usuario">Numero de Identificacion</label>
						<input type="text" class="form-control" id="Id_Usuario" name="Id_Usuario" placeholder="Identificacion de Usuario" required>
					</div>

					<div class="form-group col-md-4">
						<label class="sr-only" for="Clave">Clave de Acceso</label>
						<input type="password" class="form-control" id="Clave" name="Clave" placeholder="Clave del Usuario" required>
					</div>

					<div class="form-group col-md-4">
						<label class="sr-only" for="Id_Genero">Genero:</label>
						<select class="form-control" name="Id_Genero" id="Id_Genero">
							<option value="1">Masculino</option>
							<option value="2">Femenino</option>
							<option value="3">Otro</option>
						</select>
					</div>

					<div class="form-group col-md-4">
						<label class="sr-only" for="Nombre">Nombre del Usuario</label>
						<input type="text" class="form-control" id="Nombre" name="Nombre" placeholder="Nombre del Usuario" required>
					</div>

					<div class="form-group col-md-4">
						<label class="sr-only" for="Primer_Apellido">Primer Apellido</label>
						<input type="text" class="form-control" id="Primer_Apellido" name="Primer_Apellido" placeholder="Primer Apellido" required>
					</div>

					<div class="form-group col-md-4">
						<label class="sr-only" for="Segundo_Apellido">Segundo Apellido</label>
						<input type="text" class="form-control" id="Segundo_Apellido" name="Segundo_Apellido" placeholder="Segundo Apellido" required>
					</div>

					<div class="form-group col-md-4">
						<label class="sr-only" for="Pais">Pais</label>
						<input type="text" class="form-control" id="Pais" name="Pais" placeholder="Pais" required>
					</div>
					<div class="form-group col-md-4">
					<label class="sr-only" for="Id_Rol">Tipo Usuario:</label>
					   <select class="form-control" name="Id_Rol" id="Id_Rol">
					   	<?php 
					   		foreach ($listar as $val) {
					   			echo "<option value=\"".$val->getId_Rol()."\">".$val->getNombre()."</option>";
					   		}
					   	 ?>
					   </select>
					</div>
						<div class="form-group col-md-4"></div>

						<div class="form-group">

						</div>

						<div class="form-group text-center col-md-12">
							<button type="button" class="btn btn-danger" onclick="cargarPagina('../../interface/fUsuarios/fGestionUsuarios.php');">Cancelar</button>
							<button type="submit" class="btn btn-primary">Agregar</button>
						</div>
					</form>
				</div>
			</div>
		</div>

	</div>