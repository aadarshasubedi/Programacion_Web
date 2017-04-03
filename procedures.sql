DROP PROCEDURE IF EXISTS pr_loginUsuario;
DELIMITER $$
CREATE PROCEDURE pr_loginUsuario
(
	IN p_Id_Usuario varchar(30), 
	IN p_Clave      varchar(30)
)
 BEGIN
   	START TRANSACTION;
    	SET AUTOCOMMIT = 0;
		SELECT  U.Id_Usuario, 
		        U.Nombre, 
				U.Primer_Apellido, 
				U.Segundo_Apellido, 
				R.Nombre                           'Rol'
		FROM    bd_elearning.tb_usuario_rol         UR
		        INNER JOIN bd_elearning.tb_rol      R ON 
				    (UR.Id_Rol = R.Id_Rol)
		        INNER JOIN bd_elearning.tb_usuario  U ON 
				    (UR.Id_Usuario = U.Id_Usuario)
		WHERE   U.Id_Usuario = p_Id_Usuario         AND 
		        U.Clave = p_Clave;
	COMMIT;
 END $$
DELIMITER ;

DROP PROCEDURE IF EXISTS pr_agregar_Curso;
DELIMITER $$
CREATE PROCEDURE pr_agregar_Curso
(
	IN p_nombre       varchar(30), 
	IN p_Fecha_Inicio date, 
	IN p_Fecha_Final  date
)
 BEGIN
  	START TRANSACTION;
    	SET AUTOCOMMIT = 0;
		INSERT INTO `bd_elearning`.`tb_curso` (`Nombre`, 
		                                       `Duracion`, 
											   `Fecha_Inicio`, 
											   `Fecha_Final`) 
		VALUES (p_nombre, 
		        FLOOR(DATEDIFF(DATE(p_Fecha_Final), DATE(p_Fecha_Inicio))/7), 
				p_Fecha_Inicio, 
				p_Fecha_Final);
	COMMIT;
 END $$
DELIMITER ;

DROP PROCEDURE IF EXISTS pr_actualizarUsuario;
DELIMITER $$
CREATE PROCEDURE pr_actualizarUsuario
(
	IN p_Nombre               VARCHAR(250), 
	IN p_Primer_Apellido      VARCHAR(250), 
	IN p_Segundo_Apellido     VARCHAR(250), 
	IN p_Clave                VARCHAR(30), 
	IN p_Id_Genero            INT(10), 
	IN p_Pais                 VARCHAR(100), 
	IN P_Fecha_Ultimo_Ingreso DATE, 
	IN p_IP                   VARCHAR(20), 
	IN p_SO                   VARCHAR(255), 
	IN p_Navegador            VARCHAR(255), 
	IN p_Lenguaje             VARCHAR(255), 
	IN p_Id_Usuario           INT(10)
)
 BEGIN
 	START TRANSACTION;
    	SET AUTOCOMMIT = 0;
		UPDATE bd_elearning.tb_usuario
		SET    Nombre = p_Nombre, 
			   Primer_Apellido = p_Primer_Apellido, 
			   Segundo_Apellido = p_Segundo_Apellido, 
			   Clave = p_Clave,
			   Id_Genero = p_Id_Genero, 
			   Pais = p_Pais, 
			   Fecha_Ultimo_Ingreso = P_Fecha_Ultimo_Ingreso, 
			   IP = p_IP, 
			   SO = p_SO, 
			   Navegador = p_Navegador, 
			   Lenguaje = p_Lenguaje 
		WHERE  Id_Usuario = p_Id_Usuario;
	COMMIT;
 END $$
DELIMITER ;

/* 
 * INICIA ROLLER 
 */

/* OBTENER INFORMACION USUARIO */
DROP PROCEDURE IF EXISTS pr_obtenerInformacion;
DELIMITER $$
CREATE PROCEDURE pr_obtenerInformacion 
(
	IN pi_IdUsuario INT(11)
)
BEGIN
	START TRANSACTION;
    	SET AUTOCOMMIT = 0;
		SELECT 	A.Id_Usuario,  
				A.Nombre, 
				A.Clave, 
				A.Primer_Apellido, 
				A.Segundo_Apellido, 
				B.Descripcion, 
				A.Pais,
                C.Id_Rol
		FROM	tb_Usuario A 
				INNER JOIN tb_Genero B ON
					(A.Id_Genero = B.Id_Genero)
				INNER JOIN tb_Usuario_Rol C ON
					(A.Id_Usuario = C.Id_Usuario)
		WHERE	A.Id_Usuario = pi_IdUsuario;
	COMMIT;
END $$
DELIMITER ;

/* INSERTAR USUARIO */
DROP PROCEDURE IF EXISTS pr_insertarUsuario;
DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `pr_insertarUsuario`(
	IN p_Id_Usuario           INT(11),
	IN p_Nombre               VARCHAR(250),
	IN p_Primer_Apellido      VARCHAR(45),
	IN p_Segundo_Apellido     VARCHAR(45),
	IN p_Clave                VARCHAR(30),
	IN p_Id_Genero            INT(10),
	IN p_Pais                 VARCHAR(100),
	IN p_Fecha_Ultimo_Ingreso DATE,
	IN p_IP                   VARCHAR(20),
	IN p_SO                   VARCHAR(255),
	IN p_Navegador            VARCHAR(255),
	IN p_Lenguaje             VARCHAR(255),
	IN p_Id_Rol               INT(11)
)
BEGIN
	START TRANSACTION;
    	SET AUTOCOMMIT = 0;
		INSERT INTO tb_Usuario (Id_Usuario, 
		                        Nombre, 
								Primer_Apellido, 
								Segundo_Apellido, 
								Clave, 
								Id_Genero, 
								Pais, 
								Fecha_Ultimo_Ingreso, 
								IP, 
								SO, 
								Navegador, 
								Lenguaje)
		VALUES (p_Id_Usuario, 
		        p_Nombre, 
				p_Primer_Apellido, 
				p_Segundo_Apellido, 
				p_Clave, 
				p_Id_Genero, 
				p_Pais, 
				p_Fecha_Ultimo_Ingreso, 
				p_IP, 
				p_SO, 
				p_Navegador, 
				p_Lenguaje);
		
		INSERT INTO tb_Usuario_Rol(
		            Id_Usuario, 
					Id_Rol, 
					Estado)
		VALUES (p_Id_Usuario, 
		        p_Id_Rol, 1);
	COMMIT;
END $$
DELIMITER ;


/* ELIMINAR USUARIO */
DROP PROCEDURE IF EXISTS pr_eliminarUsuario;
DELIMITER $$
CREATE PROCEDURE pr_eliminarUsuario 
(
	IN p_IdUsuario INT(11)
)

BEGIN
	START TRANSACTION;
    	SET AUTOCOMMIT = 0;
                       
		DELETE FROM bd_elearning.tb_usuario_rol WHERE Id_Usuario = p_IdUsuario;
        
        DELETE FROM bd_elearning.tb_usuario 
        WHERE Id_Usuario = p_IdUsuario;
        
	COMMIT;
END $$
DELIMITER ;

/* 
 * FIN ROLLER 
 */

