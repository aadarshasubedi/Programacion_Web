
<?php
	header('Content-Type: text/html; charset=UTF-8');

	include ("../../controller/ctrUsuarios/ctrUsuarios.php");

	$control = new ctrUsuarios;
	$lista = $control->listar();
?>
<div class="col-md-12">
	<?php 
	if($lista){
	?>
	<div class="table-responsive">					
		<table class="table table-hover">
			<thead>
				<tr>
					<th><p>Identificacion</p></th>
					<th><p>Nombre Completo</p></th>
					<th colspan="3" style="text-align:center;"><p>Opciones</p></th>
				</tr>
			</thead>
			<tbody>
				<?php 					
					foreach ($lista as $usuario){
					
						echo "<tr>";
						echo 	"<td>".$usuario->getId_Usuario()."</td>";
						echo 	"<td>".$usuario->getNombre()." ".$usuario->getPrimer_Apellido()." ".$usuario->getSegundo_Apellido()."</td>";

						echo 	"<td style=\"text-align:center;\"><button class=\"btn btn-info\" type=\"button\" onclick=\"infoUsuario('".$usuario->getId_Usuario()."')\"><span class='glyphicon glyphicon-list-alt'></span> Ver</button></td>";
						echo 	"<td style=\"text-align:center;\"><button class=\"btn btn-danger\" type=\"button\" onclick=\"modalEliminarUsuario('".$usuario->getId_Usuario()."')\"><span class='glyphicon glyphicon-trash'></span> Eliminar</button></td>";
						echo 	"<td style=\"text-align:center;\"><button class=\"btn btn-success\" type=\"button\" onclick=\"paginaModificarUsuario('".$usuario->getId_Usuario()."')\"><span class='glyphicon glyphicon-pencil'></span> Modificar</button></td>";
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
					<strong>Ups!</strong> No se han encontrado Usuarios registrados.
				</div>
			';
		}
	 ?>
</div>