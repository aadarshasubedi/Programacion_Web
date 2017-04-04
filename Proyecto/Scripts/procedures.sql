/*Agregar Tipos de Recursos*/
INSERT INTO `bd_elearning`.`tb_tipo_recurso` (`Nombre`) VALUES ('Sección');
INSERT INTO `bd_elearning`.`tb_tipo_recurso` (`Nombre`) VALUES ('Etiqueta');
INSERT INTO `bd_elearning`.`tb_tipo_recurso` (`Nombre`) VALUES ('Texto');
INSERT INTO `bd_elearning`.`tb_tipo_recurso` (`Nombre`) VALUES ('Enlace');

/*Agregar Cursos*/
INSERT INTO `bd_elearning`.`tb_curso` (`Nombre`, `Duracion`, `Fecha_Inicio`, `Fecha_Final`) 
VALUES ('Español', '0', '2017-02-06', '2017-06-01');

/*Agregar Genero*/
INSERT INTO `bd_elearning`.`tb_genero` (`Id_Genero`, `Descripcion`) VALUES ('1', 'Masculino');
INSERT INTO `bd_elearning`.`tb_genero` (`Id_Genero`, `Descripcion`) VALUES ('2', 'Femenino');

/*Agregar Roles*/
INSERT INTO `bd_elearning`.`tb_rol` (`Id_Rol`, `Nombre`, `Estado`) 
VALUES ('1', 'Administrador', 1);

INSERT INTO `bd_elearning`.`tb_rol` (`Id_Rol`, `Nombre`, `Estado`) 
VALUES ('2', 'Editor', 1);

INSERT INTO `bd_elearning`.`tb_rol` (`Id_Rol`, `Nombre`, `Estado`) 
VALUES ('3', 'Moderador', 1);

INSERT INTO `bd_elearning`.`tb_rol` (`Id_Rol`, `Nombre`, `Estado`) 
VALUES ('4', 'Profesor', 1);

INSERT INTO `bd_elearning`.`tb_rol` (`Id_Rol`, `Nombre`, `Estado`) 
VALUES ('5', 'Estudiante', 1);

/*Agregar Usuarios*/
INSERT INTO `bd_elearning`.`tb_usuario` (`Id_Usuario`, `Nombre`, `Primer_Apellido`, `Segundo_Apellido`, `Clave`, `Id_Genero`, `Pais`, `Fecha_Ultimo_Ingreso`, `IP`, `SO`, `Navegador`, `Lenguaje`) 
VALUES ('1', 'Osvaldo', 'Aguero', 'Perez', '1', '1', 'Costa Rica', '2017-01-01', '1.1.1.1', 'Windows', 'Explorer', 'L1');

/*Asociar Usuarios con Roles*/
INSERT INTO `bd_elearning`.`tb_usuario_rol` (`Id_Usuario_Rol`, `Id_Usuario`, `Id_Rol`, `Estado`) 
VALUES ('1', '1', '1',  1);


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

DROP PROCEDURE IF EXISTS pr_modificar_Curso;
DELIMITER $$
CREATE PROCEDURE pr_modificar_Curso
(
	IN p_Id_Curso     INT(10), 
	IN p_Nombre       VARCHAR(30), 
	IN p_Fecha_Inicio DATE, 
	IN p_Fecha_Final  DATE
)
 BEGIN
  	START TRANSACTION;
    	SET AUTOCOMMIT = 0;
		UPDATE bd_elearning.tb_curso
		SET    Nombre = p_Nombre,
               Duracion = FLOOR(DATEDIFF(DATE(p_Fecha_Final), DATE(p_Fecha_Inicio))/7),
               Fecha_Inicio = p_Fecha_Inicio,
               Fecha_Final = p_Fecha_Final
		WHERE  Id_Curso = p_Id_Curso;
	COMMIT;
 END $$
DELIMITER ;

DROP PROCEDURE IF EXISTS pr_listarCurso;
DELIMITER $$
CREATE PROCEDURE pr_listarCurso()

BEGIN
	START TRANSACTION;
    	SET AUTOCOMMIT = 0;
                       
		SELECT Id_Curso, Nombre, Duracion, Fecha_Inicio, Fecha_Final 
        FROM bd_elearning.tb_curso;
                        
	COMMIT;
END $$
DELIMITER ;


DROP PROCEDURE IF EXISTS pr_buscarCurso;
DELIMITER $$
CREATE PROCEDURE pr_buscarCurso
(
	IN p_Id_Curso INT(10)
)
BEGIN
	START TRANSACTION;
    	SET AUTOCOMMIT = 0;
                       
		SELECT Id_Curso, Nombre, Duracion, Fecha_Inicio, Fecha_Final 
        FROM bd_elearning.tb_curso WHERE Id_Curso = p_Id_Curso;
                        
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
	IN p_Fecha_Ultimo_Ingreso DATE, 
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
			   Fecha_Ultimo_Ingreso = p_Fecha_Ultimo_Ingreso, 
			   IP = p_IP, 
			   SO = p_SO, 
			   Navegador = p_Navegador, 
			   Lenguaje = p_Lenguaje 
		WHERE  Id_Usuario = p_Id_Usuario;
	COMMIT;
 END $$
DELIMITER ;

/* Rol */
DROP PROCEDURE IF EXISTS pr_agregar_Rol;
DELIMITER $$
CREATE PROCEDURE pr_agregar_Rol
(
	IN p_nombre varchar(30)
)
 BEGIN
  	START TRANSACTION;
    	SET AUTOCOMMIT = 0;
		INSERT INTO `bd_elearning`.`tb_rol` (`Nombre`) VALUES (p_nombre);
	COMMIT;
 END $$
DELIMITER ;


DROP PROCEDURE IF EXISTS pr_modificar_Rol;
DELIMITER $$
CREATE PROCEDURE pr_modificar_Rol
( 
	IN p_Id_Rol INT(10),
	IN p_Nombre VARCHAR(30)/*,
	IN p_Estado  BIT(1)*/
)
 BEGIN
  	START TRANSACTION;
    	SET AUTOCOMMIT = 0;
		UPDATE bd_elearning.tb_rol
		SET    Nombre = p_Nombre/*,
               Estado = p_Estado*/
		WHERE  Id_Rol = p_Id_Rol;
	COMMIT;
 END $$
DELIMITER ;

DROP PROCEDURE IF EXISTS pr_listarRol;
DELIMITER $$
CREATE PROCEDURE pr_listarRol()

BEGIN
	START TRANSACTION;
    	SET AUTOCOMMIT = 0;
                       
		SELECT Id_Rol, Nombre, Estado FROM bd_elearning.tb_rol;
                        
	COMMIT;
END $$
DELIMITER ;


DROP PROCEDURE IF EXISTS pr_buscarRol;
DELIMITER $$
CREATE PROCEDURE pr_buscarRol
(
	IN p_Id_Rol INT(10)
)
BEGIN
	START TRANSACTION;
    	SET AUTOCOMMIT = 0;
                       
		SELECT Id_Rol, Nombre, Estado FROM bd_elearning.tb_rol WHERE Id_Rol = p_Id_Rol;
                        
	COMMIT;
END $$
DELIMITER ;

/* Rol */

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

