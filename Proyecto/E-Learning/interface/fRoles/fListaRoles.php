<?php
	header('Content-Type: text/html; charset=UTF-8');

	include ("../../controller/ctrRoles/ctrRoles.php");

	$control = new ctrRoles;
	$lista = $control->listar();
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
        <table id="tableRoles">
            <thead>
                <th class="text-center" data-field="Codigo" data-sortable="true">Codigo</th>
            	<th class="text-center" data-field="Nombre" data-sortable="true">Nombre</th>
            	<th class="text-center" data-field="operate" data-formatter="operateFormatter" data-events="operateEvents">Opciones</th>
            </thead>
            <tbody>
                <?php 

                    foreach ($lista as $rol){
		
						echo "<tr>";
						echo 	"<td>".$rol->getId_Rol()."</td>";
						echo 	"<td>".$rol->getNombre()."</td>";
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
					<strong>Ups!</strong> No se han encontrado roles registrados.
				</div>
			';
		}
	 ?>
</div>