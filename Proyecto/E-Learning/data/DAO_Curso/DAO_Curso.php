<?php

include 'ICurso.php';

class DAO_Curso implements ICurso {

	private $dtConexion;

    public function __construct($_conexion){
        $this -> dtConexion = $_conexion;                
    }

    public function agregar($curso) {
        try {
            $conn = $this->dtConexion->abrirConexion();  

            $Nombre = $curso->getNombre();
            $Fecha_Inicio = $curso->getFecha_Inicio();
            $Fecha_Final = $curso->getFecha_Final();

            $stmt = $conn->prepare('CALL pr_agregar_Curso(?,?,?)');
            $stmt->bindParam(1, $Nombre, PDO::PARAM_STR);
            $stmt->bindParam(2, $Fecha_Inicio, PDO::PARAM_STR);
            $stmt->bindParam(3, $Fecha_Final, PDO::PARAM_STR);

            $stmt->execute();

            return true;
            $this->conexion->cerrarConexion($conn);
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        } 
    }

    public function modificar($curso) {
        try {
            $conn = $this->dtConexion->abrirConexion();  

            $Id_Curso = $curso->getId_Curso();
            $Nombre = $curso->getNombre();
            $Fecha_Inicio = $curso->getFecha_Inicio();
            $Fecha_Final = $curso->getFecha_Final();

            $stmt = $conn->prepare('CALL pr_modificar_Curso(?,?,?,?)');
            $stmt->bindParam(1, $Id_Curso, PDO::PARAM_STR);
            $stmt->bindParam(2, $Nombre, PDO::PARAM_STR);
            $stmt->bindParam(3, $Fecha_Inicio, PDO::PARAM_STR);
            $stmt->bindParam(4, $Fecha_Final, PDO::PARAM_STR);
       
            $stmt->execute();

            return true;
            $this->conexion->cerrarConexion($conn);
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    //EN PROCESO, TODAVIA NO IMPLEMENTADO PORQUE HAY QUE ELIMINAR PRIMERO EN TODAS LAS TABLAS QUE TIENE RELACION
    /*public function eliminar($Id_Usuario) {
        try {
            $conn = $this->dtConexion->abrirConexion();
            $stmt = $conn->prepare('CALL pr_eliminarUsuario(?)'); 
            $stmt->bindParam(1, $Id_Usuario, PDO::PARAM_INT);  
            $stmt->execute();    

            $this->dtConexion->cerrarConexion($conn);
            return true;     
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }*/

    
    public function consultar($Id_Curso) {
        try {
            $conn = $this->dtConexion->abrirConexion(); 
            $curso = array();   
            $stmt = $conn->prepare('CALL pr_buscarCurso(?)'); 
            $stmt->bindParam(1, $Id_Curso, PDO::PARAM_INT);
            $stmt->execute();
            $curso = $stmt->fetchALL();  

            $this->dtConexion->cerrarConexion($conn); 
            return $curso;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }        
    }

    public function listar() {
        try {      
            $conn = $this->dtConexion->abrirConexion(); 
            $listaCursos = array(); 
            $stmt = $conn->prepare('CALL pr_listarCurso()'); 
            $stmt->execute();
            $listaCursos = $stmt->fetchALL();

            $this->dtConexion->cerrarConexion($conn);
            return $listaCursos;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }        
    }

    public function cursosEstudiantes($Id_Usuario){
        try{
            $conn = $this->dtConexion->abrirConexion(); 
            $listaCursosEstudiante = array(); 

            $stmt = $conn->prepare('CALL pr_CursosEstudiante(?)'); 
            $stmt->bindParam(1, $Id_Usuario, PDO::PARAM_INT);
            $stmt->execute();
            $listaCursosEstudiante = $stmt->fetchALL();

            $this->dtConexion->cerrarConexion($conn);
            return $listaCursosEstudiante; 
        } catch(PDOException $e){
            echo $e->getMessage();
            return false;
        }
    }

    public function listarCursos($Id_Usuario){
        try{
            $conn = $this->dtConexion->abrirConexion(); 
            $listaCursosEstudiante = array(); 

            $stmt = $conn->prepare('CALL pr_listaMatricula(?)'); 
            $stmt->bindParam(1, $Id_Usuario, PDO::PARAM_INT);
            $stmt->execute();
            $listaCursosEstudiante = $stmt->fetchALL();

            $this->dtConexion->cerrarConexion($conn);
            return $listaCursosEstudiante; 
        } catch(PDOException $e){
            echo $e->getMessage();
            return false;
        }
    }

    public function consultarExistenciaCurso($curso){
        try {
            $conn = $this->dtConexion->abrirConexion(); 
            $nombre = $curso->getNombre();
            $fecha_Inicio = $curso->getFecha_Inicio();
            $fecha_Final = $curso->getFecha_Final();
            $validacion = array();   

            $stmt = $conn->prepare('SELECT Id_Curso FROM bd_elearning.tb_curso WHERE Nombre = ? AND Fecha_Inicio = ? AND Fecha_Final = ?'); 
            $stmt->bindParam(1, $nombre, PDO::PARAM_STR);
            $stmt->bindParam(2, $fecha_Inicio, PDO::PARAM_INT);
            $stmt->bindParam(3, $fecha_Final, PDO::PARAM_INT);
            $stmt->execute();
            $validacion = $stmt->fetchALL();  

            $this->dtConexion->cerrarConexion($conn); 
            return $validacion;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        } 
    }
    
}
 
?>