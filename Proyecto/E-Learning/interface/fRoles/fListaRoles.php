<?php
	header('Content-Type: text/html; charset=UTF-8');

	include ("../../controller/ctrRoles/ctrRoles.php");

	$control = new ctrRoles;
	$lista = $control->listar();
?>
<div class="col-md-12 slide">
	<?php 
	if($lista){
	?>
	<div class="table-responsive">					
		<table class="table table-hover">
			<thead>
				<tr>
					<th><p>Codigo</p></th>
					<th><p>Nombre</p></th>
					<th colspan="2" class="text-center"><p>Opciones</p></th>
				</tr>
			</thead>
			<tbody>
				<?php 					
					foreach ($lista as $rol){
					
						echo "<tr>";
						echo 	"<td>".$rol->getId_Rol()."</td>";
						echo 	"<td>".$rol->getNombre()."</td>";

						/*echo 	"<td style=\"text-align:center;\"><button class=\"btn btn-danger\" type=\"button\" onclick=\"modalEliminarrol('".$rol->getId_rol()."')\"><span class='glyphicon glyphicon-trash'></span> Eliminar</button></td>";*/
						echo 	"<td style=\"text-align:center;\"><button class=\"btn btn-success\" type=\"button\" onclick=\"paginaModificarRol('".$rol->getId_Rol()."')\"><span class='glyphicon glyphicon-pencil'></span> Modificar</button></td>";
						echo "</tr>";
						
					}
				?>
			</tbody>
		</table>				
	</div>

	<?php 
		} else {
			echo 
			'
				<div class="alert alert-warning">
					<strong>Ups!</strong> No se han encontrado roles registrados.
				</div>
			';
		}
	 ?>
</div>