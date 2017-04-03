<?php

interface IRol {
    public function agregar($rol);
    public function eliminar($Id_Rol);
    public function modificar($rol);
    public function consultar($Id_Rol);
    public function listar();
}

?>