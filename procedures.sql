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

--Agregar Usuarios
INSERT INTO `BD_Elearning`.`tb_Usuario` (`Identificacion`, `Nombre`, `Primer_Apellido`, `Segundo_Apellido`, `Clave`, `Id_Genero`, `Pais`, `Fecha_Ultimo_Ingreso`, `IP`, `SO`, `Navegador`, `Lenguaje`) 
VALUES ('1', 'Osvaldo', 'Aguero', 'Perez', '1', '1', 'Costa Rica', '2017-01-01', '1.1.1.1', 'Windows', 'Explorer', 'L1');


--Asociar Usuarios con Roles
INSERT INTO `bd_elearning`.`tb_usuario_rol` (`Id_Usuario_Rol`, `Id_Usuario`, `Id_Rol`, `Estado`) 
VALUES ('1', '1', '1',  1);
