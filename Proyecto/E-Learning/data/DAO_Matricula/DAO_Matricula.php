<?php

include 'IMatricula.php';

class DAO_Matricula implements IMatricula {

    private $dtConexion;

    public function __construct($_conexion){
        $this -> dtConexion = $_conexion;                
    }

    public function agregar($matricula) {
        try {
            $conn = $this->dtConexion->abrirConexion();  

            $Periodo = $matricula->getPeriodo();
            $Id_Usuario = $matricula->getId_Usuario();
            $Id_Curso = $matricula->getId_Curso();
            $Año = $matricula->getAño();
            $Fecha_Matricula = $matricula->getFecha_Matricula();

            $stmt = $conn->prepare('CALL pr_insertarMatricula(?,?,?,?,?)');
            $stmt->bindParam(1, $Periodo, PDO::PARAM_INT);
            $stmt->bindParam(2, $Id_Usuario, PDO::PARAM_INT);
            $stmt->bindParam(3, $Id_Curso, PDO::PARAM_INT);
            $stmt->bindParam(4, $Año, PDO::PARAM_STR);
            $stmt->bindParam(5, $Fecha_Matricula, PDO::PARAM_STR);

            $stmt->execute();

            return true;
            $this->conexion->cerrarConexion($conn);
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        } 
    }

    public function validarInsercion($Id_Usuario, $Id_Curso) {
        try {
            $conn = $this->dtConexion->abrirConexion();  

            $stmt = $conn->prepare('SELECT Id_Matricula FROM tb_matricula WHERE Id_Usuario = ? AND Id_Curso = ?');
            $stmt->bindParam(1, $Id_Usuario, PDO::PARAM_INT);
            $stmt->bindParam(2, $Id_Curso, PDO::PARAM_INT);
            $stmt->execute();
            $val = $stmt->fetchALL();

            if($val)
                return false;
            else
                return true;
            $this->conexion->cerrarConexion($conn);
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        } 
    }

}
 
?>