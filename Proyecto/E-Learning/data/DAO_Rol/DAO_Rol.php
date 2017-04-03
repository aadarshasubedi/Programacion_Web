<?php

include 'IRol.php';

class DAO_Rol implements IRol {

	private $dtConexion;

    public function __construct($_conexion){
        $this -> dtConexion = $_conexion;                
    }

    public function agregar($rol) {
        try {
            $conn = $this->dtConexion->abrirConexion();  

            $Nombre = $rol->getNombre();

            $stmt = $conn->prepare('CALL pr_agregar_Rol(?)');
            $stmt->bindParam(1, $Nombre, PDO::PARAM_STR);

            $stmt->execute();

            return true;
            $this->conexion->cerrarConexion($conn);
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        } 
    }

    public function modificar($Rol) {
        try {
            $conn = $this->dtConexion->abrirConexion();  

            $Id_Rol = $rol->getId_Rol();
            $Nombre = $rol->getNombre();
            $Estado = $rol->getEstado();

            $stmt = $conn->prepare('CALL pr_modificar_Rol(?,?)');
            $stmt->bindParam(1, $Id_Rol, PDO::PARAM_STR);
            $stmt->bindParam(2, $Nombre, PDO::PARAM_STR);
            $stmt->bindParam(3, $Estado, PDO::PARAM_STR);
       
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

    
    public function consultar($Id_Rol) {
        try {
            $conn = $this->dtConexion->abrirConexion(); 
            $rol = array();   
            $stmt = $conn->prepare('CALL pr_buscarRol(?)'); 
            $stmt->bindParam(1, $Id_Rol, PDO::PARAM_INT);
            $stmt->execute();
            $Rol = $stmt->fetch(PDO::FETCH_ASSOC);  

            $this->dtConexion->cerrarConexion($conn); 
            return $rol;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }        
    }

    public function listar() {
         try {      
             $conn = $this->dtConexion->abrirConexion(); 
             $listaRoles = array(); 
             $stmt = $conn->prepare('CALL pr_listarRol()'); 
             $stmt->execute();
             $listaRoles = $stmt->fetchALL();

             $this->dtConexion->cerrarConexion($conn);
             return $listaRoles;
         } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }        
    }
}
 
?>