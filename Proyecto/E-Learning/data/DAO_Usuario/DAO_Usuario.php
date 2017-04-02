<?php

include 'IUsuario.php';

class DAO_Usuario implements IUsuario {

	private $dtConexion;

    public function __construct($_conexion){
        $this -> dtConexion = $_conexion;                
    }

    public function agregar($usuario) {
        try {
            $conn = $this->dtConexion->abrirConexion();  

            $Id_Usuario = $usuario->getId_Usuario();
            $Clave = $usuario->getClave();
            $Id_Genero = $usuario->getId_Genero();
            $Nombre = $usuario->getNombre();
            $Primer_Apellido = $usuario->getPrimer_Apellido();
            $Segundo_Apellido = $usuario->getSegundo_Apellido();
            $Pais = $usuario->getPais();
            $Fecha_Ultimo_Ingreso = $usuario->getFecha_Ultimo_Ingreso();
            $IP = $usuario->getDireccion_Ip();
            $SO = $usuario->getSistema_Operativo();
            $Navegador = $usuario->getNavegador();
            $Lenguaje = $usuario->getLenguaje();
            $Rol = $usuario->getRol();

            $stmt = $conn->prepare('CALL pr_insertarUsuario(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)');
            $stmt->bindParam(1, $Id_Usuario, PDO::PARAM_STR); 
            $stmt->bindParam(2, $Nombre, PDO::PARAM_STR);
            $stmt->bindParam(3, $Primer_Apellido, PDO::PARAM_STR);
            $stmt->bindParam(4, $Segundo_Apellido, PDO::PARAM_STR);            
            $stmt->bindParam(5, $Clave, PDO::PARAM_STR);
            $stmt->bindParam(6, $Id_Genero, PDO::PARAM_INT);
            $stmt->bindParam(7, $Pais, PDO::PARAM_STR);
            $stmt->bindParam(8, $Fecha_Ultimo_Ingreso, PDO::PARAM_STR);
            $stmt->bindParam(9, $IP, PDO::PARAM_STR);
            $stmt->bindParam(10, $SO, PDO::PARAM_STR);
            $stmt->bindParam(11, $Navegador, PDO::PARAM_STR);
            $stmt->bindParam(12, $Lenguaje, PDO::PARAM_STR);
            $stmt->bindParam(13, $Rol, PDO::PARAM_INT);
            $stmt->execute();

            return true;
            $this->conexion->cerrarConexion($conn);
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        } 
    }

    public function modificar($usuario) {
        try {
            $conn = $this->dtConexion->abrirConexion();  

            $Id_Usuario = $usuario->getId_Usuario();
            $Nombre = $usuario->getNombre();
            $Primer_Apellido = $usuario->getPrimer_Apellido();
            $Segundo_Apellido = $usuario->getSegundo_Apellido();
            $Clave = $usuario->getClave();
            $Id_Genero = $usuario->getId_Genero();
            $Pais = $usuario->getPais();
            $Fecha_Ultimo_Ingreso = $usuario->getFecha_Ultimo_Ingreso();
            $Direccion_IP = $usuario->getDireccion_Ip();
            $Sistema_Operativo = $usuario->getSistema_Operativo();
            $Navegador = $usuario->getNavegador();
            $Lenguaje = $usuario->getLenguaje();

            $stmt = $conn->prepare('CALL pr_actualizarUsuario(?,?,?,?,?,?,?,?,?,?,?,?)');

            $stmt->bindParam(1, $Nombre, PDO::PARAM_STR);
            $stmt->bindParam(2, $Primer_Apellido, PDO::PARAM_STR);
            $stmt->bindParam(3, $Segundo_Apellido, PDO::PARAM_STR);            
            $stmt->bindParam(4, $Clave, PDO::PARAM_STR);
            $stmt->bindParam(5, $Id_Genero, PDO::PARAM_INT);
            $stmt->bindParam(6, $Pais, PDO::PARAM_STR);
            $stmt->bindParam(7, $Fecha_Ultimo_Ingreso, PDO::PARAM_STR);
            $stmt->bindParam(8, $Direccion_IP, PDO::PARAM_STR);
            $stmt->bindParam(9, $Sistema_Operativo, PDO::PARAM_STR);
            $stmt->bindParam(10, $Navegador, PDO::PARAM_STR);
            $stmt->bindParam(11, $Lenguaje, PDO::PARAM_STR);
            $stmt->bindParam(12, $Id_Usuario, PDO::PARAM_INT);        
            $stmt->execute();

            return true;
            $this->conexion->cerrarConexion($conn);
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    public function eliminar($Id_Usuario) {
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
    }

    public function consultar($Id_Usuario) {
        try {
            $conn = $this->dtConexion->abrirConexion(); 
            $usuario = array();   
            $stmt = $conn->prepare('SELECT * FROM tb_Usuario WHERE Id_Usuario = ?'); 
            $stmt->bindParam(1, $Id_Usuario, PDO::PARAM_INT);
            $stmt->execute();
            $usuario = $stmt->fetch(PDO::FETCH_ASSOC);  

            $this->dtConexion->cerrarConexion($conn); 
            return $usuario;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }        
    }

    public function consultarModificar($Id_Usuario) {
        try {
            $conn = $this->dtConexion->abrirConexion(); 
            $usuario = array();   
            $stmt = $conn->prepare('SELECT * FROM tb_Usuario WHERE Id_Usuario = ?'); 
            $stmt->bindParam(1, $Id_Usuario, PDO::PARAM_INT);
            $stmt->execute();
            $usuario = $stmt->fetchALL();  

            $this->dtConexion->cerrarConexion($conn); 
            return $usuario;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }        
    }

    public function listar() {
        try {      
            $conn = $this->dtConexion->abrirConexion(); 
            $listaUsuarios = array(); 	
            $stmt = $conn->prepare('SELECT Id_Usuario, Nombre, Primer_Apellido, Segundo_Apellido 
                                    FROM tb_Usuario ORDER BY Nombre'); 
            $stmt->execute();
            $listaUsuarios = $stmt->fetchALL();

            $this->dtConexion->cerrarConexion($conn);
            return $listaUsuarios;
        } catch (PDOException $e) {
    		echo $e->getMessage();
            return false;
    	}        
    }
}
 
?>