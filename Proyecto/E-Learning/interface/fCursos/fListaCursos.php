<?php
	header('Content-Type: text/html; charset=UTF-8');

	include ("../../controller/ctrCursos/ctrCursos.php");

	$control = new ctrCursos;
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
					<th><p>Codigo</p></th>
					<th><p>Nombre</p></th>
					<th><p>Duracion Semanas</p></th>
					<th><p>Fecha Inicio</p></th>
					<th><p>Fecha Final</p></th>
					<th colspan="3" class="text-center"><p>Opciones</p></th>
				</tr>
			</thead>
			<tbody>
				<?php 					
					foreach ($lista as $curso){
					
						echo "<tr>";
						echo 	"<td>".$curso->getId_Curso()."</td>";
						echo 	"<td>".$curso->getNombre()."</td>";
						echo 	"<td>".$curso->getDuracion()."</td>";
						echo 	"<td>".$curso->getFecha_Inicio()."</td>";
						echo 	"<td>".$curso->getFecha_Final()."</td>";

						/*echo 	"<td style=\"text-align:center;\"><button class=\"btn btn-danger\" type=\"button\" onclick=\"modalEliminarCurso('".$curso->getId_Curso()."')\"><span class='glyphicon glyphicon-trash'></span> Eliminar</button></td>";*/
						echo 	"<td style=\"text-align:center;\"><button class=\"btn btn-success\" type=\"button\" onclick=\"paginaModificarCurso('".$curso->getId_Curso()."')\"><span class='glyphicon glyphicon-pencil'></span> Modificar</button></td>";
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
					<strong>Ups!</strong> No se han encontrado Cursos registrados.
				</div>
			';
		}
	 ?>
</div>