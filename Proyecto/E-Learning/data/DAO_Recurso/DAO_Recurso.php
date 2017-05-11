<?php

include 'IRecurso.php';

class DAO_Recurso implements IRecurso {

    private $dtConexion;

    public function __construct($_conexion){
        $this -> dtConexion = $_conexion;                
    }

    public function recurso($Tipo_Recurso, $Id_Curso,  $Secuencia, $Semana, $nombreRecurso, $Identificador, $URL){
        try {
            $conn = $this->dtConexion->abrirConexion();  

            $Recurso_Padre = null; 
            $Visible = 1;
            $Notas = "asd";

            $stmt = $conn->prepare('CALL pr_agregar_actualizar_recurso(?,?,?,?,?,?,?,?,?,?)');
            $stmt->bindParam(1, $Tipo_Recurso, PDO::PARAM_INT);
            $stmt->bindParam(2, $Id_Curso, PDO::PARAM_INT);
            $stmt->bindParam(3, $Recurso_Padre, PDO::PARAM_INT);
            $stmt->bindParam(4, $nombreRecurso, PDO::PARAM_STR);
            $stmt->bindParam(5, $URL, PDO::PARAM_STR);
            $stmt->bindParam(6, $Visible, PDO::PARAM_INT);
            $stmt->bindParam(7, $Secuencia, PDO::PARAM_INT);
            $stmt->bindParam(8, $Notas, PDO::PARAM_STR);
            $stmt->bindParam(9, $Semana, PDO::PARAM_INT);
            $stmt->bindParam(10, $Identificador, PDO::PARAM_INT);

            $stmt->execute();

            return true;
            $this->conexion->cerrarConexion($conn);
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        } 
    }

    public function consultar($Id_Curso) {
        try {
            $conn = $this->dtConexion->abrirConexion(); 
            $recurso = array();   
            $stmt = $conn->prepare('CALL pr_obtener_recursos_cursos(?)'); 
            $stmt->bindParam(1, $Id_Curso, PDO::PARAM_INT);
            $stmt->execute();
            $recurso = $stmt->fetchALL();  

            $this->dtConexion->cerrarConexion($conn); 
            return $recurso;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }        
    }

    public function totalSemanas($Id_Curso){
        try {
            $conn = $this->dtConexion->abrirConexion(); 
            $result = array();   
            $stmt = $conn->prepare('CALL pr_obtener_totalSemanas(?)'); 
            $stmt->bindParam(1, $Id_Curso, PDO::PARAM_INT);
            $stmt->execute();
            $result = $stmt->fetch();  

            $this->dtConexion->cerrarConexion($conn); 

            return $result['Duracion'];
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }  
    }

    public function eliminarRecurso($IdentificadorRecurso) {
         try {
            $conn = $this->dtConexion->abrirConexion();   
            $stmt = $conn->prepare('CALL pr_eliminar_recurso(?)'); 
            $stmt->bindParam(1, $IdentificadorRecurso, PDO::PARAM_INT);
            $result = $stmt->execute();  

            $this->dtConexion->cerrarConexion($conn); 
            return $result;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }         
    }
}
 
?>