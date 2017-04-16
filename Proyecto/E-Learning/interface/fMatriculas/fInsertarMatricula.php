<script src="../../resourses/js/jsMatricula.js"></script>

<?php
	session_start();
	header('Content-Type: text/html; charset=UTF-8');

	include ("../../controller/ctrMatriculas/ctrMatriculas.php");

	$control = new ctrMatriculas;
	$Id_Usuario = $_SESSION['Id_Usuario'];
	$listaUsuarios = $control->listarUsuario($Id_Usuario);

?>

<div class="row slide">

	<div class="col-md-12">
		<?php 
			if($listaUsuarios){
		?>
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h3 class="panel-title" style="text-align:center;">Formulario para matricular un usuario.</h3>
			</div>

			<div class="container-fluid">
				<strong>Ingrese los datos solicitados.</strong>
				<hr>
				<form id="formularioMatricula" name="formularioMatricula" method="POST" role="form">

					<div class="form-group col-md-6">
						<label for="Id_Usuario">Identificacion de usuario:</label>
						<select class="form-control" onchange="getValorSelect(this);"  name="Id_Usuario" id="Id_Usuario">
						<option value="#" selected disabled>Seleccione una Opción</option>
						<?php 
							foreach ($listaUsuarios as $usuario) {
								echo "<option value=\"".$usuario->getId_Usuario()."\">".$usuario->getNombre()." ".$usuario->getPrimer_Apellido()." ".$usuario->getSegundo_Apellido()."</option>";
							}
						 ?>
						</select>
					</div>

					<div class="form-group col-md-6">
					<label for="Id_Curso">Curso:</label>
					<select class="form-control" name="Id_Curso" id="Id_Curso">
						<option value="#" selected disabled>Seleccione una Opción</option>
					</select>
					</div>

					<div class="form-group text-center col-md-12">
						<button type="button" class="btn btn-danger" onclick="cargarPagina('../../interface/index.php');">Cancelar</button>
						<button type="submit" class="btn btn-primary">Agregar</button>
					</div>
				</form>
			</div>
		</div>
			<?php 
				} else {
					echo 
					'
						<div class="alert alert-warning">
							<strong>Ups!</strong> No se han encontrado Usuarios o Cursos registrados.
						</div>
					';
				}
			 ?>
	</div>

</div>