DROP PROCEDURE IF EXISTS loginUsuario;
DELIMITER $$
CREATE PROCEDURE loginUsuario(IN p_identificacion varchar(30), IN p_Clave varchar(30))
 BEGIN
	SELECT  U.identificacion, U.Nombre, U.Primer_Apellido, U.Segundo_Apellido, R.Nombre AS 'Rol'
	FROM bd_elearning.tb_usuario_rol AS UR
	INNER JOIN bd_elearning.tb_rol AS R ON UR.Id_Rol = R.Id_Rol
	INNER JOIN bd_elearning.tb_usuario AS U ON UR.Id_Usuario = U.Id_Usuario
	WHERE U.Identificacion = p_identificacion AND U.Contraseña = p_Clave;
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
