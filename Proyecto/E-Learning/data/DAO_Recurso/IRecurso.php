<?php

interface IRecurso {    
    public function recurso($Tipo_Recurso, $Id_Curso,  $Secuencia, $Semana, $nombreRecurso, $Identificador);
    public function consultar($Id_Curso);
    public function totalSemanas($Id_Curso);
}

?>