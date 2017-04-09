<?php

interface IRecurso {    
    public function recurso($Tipo_Recurso, $Id_Curso,  $Secuencia, $Semana, $Opcion);
    public function consultar($Id_Recurso);
}

?>