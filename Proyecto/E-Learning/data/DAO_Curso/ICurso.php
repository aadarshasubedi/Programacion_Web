<?php

interface ICurso {
    public function agregar($curso);
    //public function eliminar($Id_Curso);
    public function modificar($curso);
    public function consultar($Id_Curso);
    public function listar();
    public function recurso($Tipo_Recurso, $Id_Curso,  $Secuencia, $Semana);
}

?>