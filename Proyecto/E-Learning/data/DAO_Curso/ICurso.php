<?php

interface ICurso {
    public function agregar($usuario);
    public function eliminar($Id_Usuario);
    public function modificar($usuario);
    public function consultar($Id_Usuario);
    public function listar();
}

?>