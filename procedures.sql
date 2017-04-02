DROP PROCEDURE IF EXISTS loginUsuario;
DELIMITER $$
CREATE PROCEDURE loginUsuario(IN p_identificacion varchar(30), IN p_Clave varchar(30))
 BEGIN
	SELECT  U.identificacion, U.Nombre, U.Primer_Apellido, U.Segundo_Apellido, R.Nombre AS 'Rol'
	FROM bd_elearning.tb_usuario_rol AS UR
	INNER JOIN bd_elearning.tb_rol AS R ON UR.Id_Rol = R.Id_Rol
	INNER JOIN bd_elearning.tb_usuario AS U ON UR.Id_Usuario = U.Id_Usuario
	WHERE U.Identificacion = p_identificacion AND U.Clave = p_Clave;
 END $$
DELIMITER ;

DROP PROCEDURE IF EXISTS agregar_Curso;
DELIMITER $$
CREATE PROCEDURE agregar_Curso(IN p_nombre varchar(30), IN p_Fecha_Inicio date, IN p_Fecha_Final date, IN p_estado bit)
 BEGIN
	INSERT INTO `bd_elearning`.`tb_curso` (`Nombre`, `Duracion`, `Fecha_Inicio`, `Fecha_Final`, `Estado`) 
	VALUES (p_nombre, FLOOR(DATEDIFF(DATE(p_Fecha_Final), DATE(p_Fecha_Inicio))/7), p_Fecha_Inicio, p_Fecha_Final, p_estado);
 END $$
DELIMITER ;




--Agregar Cursos
INSERT INTO `bd_elearning`.`tb_curso` (`Nombre`, `Duracion`, `Fecha_Inicio`, `Fecha_Final`, `Estado`) 
VALUES ('Español', '0', '2017-02-06', '2017-06-01', 1);

INSERT INTO `bd_elearning`.`tb_curso` (`Nombre`, `Duracion`, `Fecha_Inicio`, `Fecha_Final`, `Estado`) 
VALUES ('Inglés', '0', '2017-02-06', '2017-06-01', 1);

--Agregar Genero
INSERT INTO `bd_elearning`.`tb_genero` (`Id_Genero`, `Descripcion`) VALUES ('1', 'Masculino');
INSERT INTO `bd_elearning`.`tb_genero` (`Id_Genero`, `Descripcion`) VALUES ('2', 'Femenino');

--Agregar Roles
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

<<<<<<< HEAD

/* 
 * INICIA ROLLER 
 */

/* OBTENER INFORMACION USUARIO */
DROP PROCEDURE IF EXISTS sp_obtenetInformacion;
DELIMITER $$
CREATE PROCEDURE sp_obtenetInformacion 
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
DROP PROCEDURE IF EXISTS sp_insertarUsuario;
DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_insertarUsuario`(
	IN pi_Id_Usuario INT(11),
	IN pi_Nombre VARCHAR(250),
	IN pi_Primer_Apellido VARCHAR(45),
	IN pi_Segundo_Apellido VARCHAR(45),
	IN pi_Clave VARCHAR(30),
	IN pi_Id_Genero INT(10),
	IN pi_Pais VARCHAR(100),
	IN pi_Fecha_Ultimo_Ingreso DATE,
	IN pi_IP VARCHAR(20),
	IN pi_SO VARCHAR(255),
	IN pi_Navegador VARCHAR(255),
	IN pi_Lenguaje VARCHAR(255),
	IN pi_Id_Rol INT(11)
)
BEGIN
	START TRANSACTION;
    	SET AUTOCOMMIT = 0;
		INSERT INTO tb_Usuario (Id_Usuario, Nombre, Primer_Apellido, Segundo_Apellido, Clave, Id_Genero, Pais, Fecha_Ultimo_Ingreso, IP, SO, Navegador, Lenguaje)
		VALUES (pi_Id_Usuario, pi_Nombre, pi_Primer_Apellido, pi_Segundo_Apellido, pi_Clave, pi_Id_Genero, pi_Pais, pi_Fecha_Ultimo_Ingreso, pi_IP, pi_SO, pi_Navegador, pi_Lenguaje);
		
		INSERT INTO tb_Usuario_Rol (Id_Usuario, Id_Rol, Estado)
		VALUES (pi_Id_Usuario, pi_Id_Rol, 1);
	COMMIT;
END $$
DELIMITER ;

/* ELIMINAR USUARIO */
DROP PROCEDURE IF EXISTS sp_eliminarUsuario;
DELIMITER $$
CREATE PROCEDURE sp_eliminarUsuario 
(
	IN pi_IdUsuario INT(11)
)
BEGIN
	START TRANSACTION;
    	SET AUTOCOMMIT = 0;
		DELETE 
		FROM	tb_Usuario
		WHERE	Id_Usuario = pi_IdUsuario;
	COMMIT;
END $$
DELIMITER ;

/* 
 * FIN ROLLER 
 */
=======
--Agregar Usuarios
INSERT INTO `BD_Elearning`.`tb_Usuario` (`Identificacion`, `Nombre`, `Primer_Apellido`, `Segundo_Apellido`, `Clave`, `Id_Genero`, `Pais`, `Fecha_Ultimo_Ingreso`, `IP`, `SO`, `Navegador`, `Lenguaje`) 
VALUES ('1', 'Osvaldo', 'Aguero', 'Perez', '1', '1', 'Costa Rica', '2017-01-01', '1.1.1.1', 'Windows', 'Explorer', 'L1');


--Asociar Usuarios con Roles
INSERT INTO `bd_elearning`.`tb_usuario_rol` (`Id_Usuario_Rol`, `Id_Usuario`, `Id_Rol`, `Estado`) 
VALUES ('1', '1', '1',  1);
>>>>>>> origin/master
