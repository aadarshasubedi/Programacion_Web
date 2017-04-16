
<?php
	session_start();
	header('Content-Type: text/html; charset=UTF-8');

	include ("../../controller/ctrUsuarios/ctrUsuarios.php");

	$control = new ctrUsuarios;
	$Id_Usuario = $_SESSION['Id_Usuario'];
	$lista = $control->listar($Id_Usuario);
?>

<style>
	.pagination {
		margin: 0px 0px;
	}
</style>

<div class="col-md-12 slide">
	<?php 
	if($lista){
	?>

	<div class="col-md-12">                    
        <table id="tableUsuarios">
            <thead>
                <th class="text-center" data-field="Identificacion" data-sortable="true">Identificacion</th>
            	<th class="text-center" data-field="Nombre" data-sortable="true">Nombre</th>
            	<th class="text-center" data-field="operate" data-formatter="operateFormatter" data-events="operateEvents">Opciones</th>
            </thead>
            <tbody>
                <?php 

                    foreach ($lista as $usuario){
		
						echo "<tr>";
						echo 	"<td>".$usuario->getId_Usuario()."</td>";
						echo 	"<td class=\"text-left\">".$usuario->getNombre()." ".$usuario->getPrimer_Apellido()." ".$usuario->getSegundo_Apellido()."</td>";
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
					<strong>Ups!</strong> No se han encontrado Usuarios registrados.
				</div>
			';
		}
	 ?>
</div>