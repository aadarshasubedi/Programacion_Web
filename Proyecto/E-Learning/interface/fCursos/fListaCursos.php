<?php
	header('Content-Type: text/html; charset=UTF-8');

	include ("../../controller/ctrCursos/ctrCursos.php");

	$Id_Rol = $_SESSION['Rol'];
	$Id_Usuario = $_SESSION['Id_Usuario'];

	$control = new ctrCursos;

	if($Id_Rol == 4){
		$lista = $control->listaCursosProfesor($Id_Usuario);
	} else {
		$lista = $control->listar();
	}
?>

<style>
	.pagination {
		margin: 0px 0px;
	}

	.pagination a {
		margin: 0px 5px;
	    border-radius: 5px;
	}
</style>

<div class="col-md-12 slide">
	<?php 
	if($lista){
	?>
	
	<div class="col-md-12">                    
        <table id="tableCursos">
            <thead>
                <th class="text-center" data-field="Codigo" data-sortable="true">Codigo</th>
            	<th class="text-center" data-field="Nombre" data-sortable="true">Nombre</th>
            	<th class="text-center" data-field="Duracion" data-sortable="true">Duracion</th>
            	<th class="text-center" data-field="Fecha_Inicio" data-sortable="true">Fecha Inicio</th>
            	<th class="text-center" data-field="Fecha_Final" data-sortable="true">Fecha Final</th>
            	<th class="text-center" data-field="operate" data-formatter="operateFormatter" data-events="operateEvents">Opciones</th>
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
						echo "</tr>";
					
					}

                ?>
            </tbody>
        </table>          
        <hr>
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