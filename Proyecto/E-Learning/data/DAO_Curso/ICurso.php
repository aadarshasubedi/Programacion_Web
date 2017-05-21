<?php

interface ICurso {
    public function agregar($curso);
    //public function eliminar($Id_Curso);
    public function modificar($curso);
    public function consultar($Id_Curso);
    public function listar();
    public function cursosEstudiantes($Id_Usuario);
    public function listarCursos($Id_Usuario);
    public function consultarExistenciaCurso($curso);
    public function listaCursosProfesor($Id_Usuario);
    public function listaCursosEditor($Id_Usuario);
}

?>