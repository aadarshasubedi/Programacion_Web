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
				R.Id_Rol                           'Rol'
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
	IN p_Fecha_Final  date,
	IN p_Id_Profesor  INT(10) 
)
 BEGIN
  	START TRANSACTION;
    	SET AUTOCOMMIT = 0;
		INSERT INTO `bd_elearning`.`tb_curso` (`Nombre`, 
		                                       `Duracion`, 
											   `Fecha_Inicio`, 
											   `Fecha_Final`,
											   `Id_Profesor`) 
		VALUES (p_nombre, 
		        FLOOR(DATEDIFF(DATE(p_Fecha_Final), DATE(p_Fecha_Inicio))/7), 
				p_Fecha_Inicio, 
				p_Fecha_Final,
				p_Id_Profesor);
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
	IN p_Fecha_Final  DATE,
	IN p_Id_Profesor  INT(10)
)
 BEGIN
  	START TRANSACTION;
    	SET AUTOCOMMIT = 0;
		UPDATE bd_elearning.tb_curso
		SET    Nombre = p_Nombre,
               Duracion = FLOOR(DATEDIFF(DATE(p_Fecha_Final), DATE(p_Fecha_Inicio))/7),
               Fecha_Inicio = p_Fecha_Inicio,
               Fecha_Final = p_Fecha_Final,
			   Id_Profesor = p_Id_Profesor
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
                       
		SELECT 	C.Id_Curso, 
				C.Nombre, 
				C.Duracion, 
				C.Fecha_Inicio, 
				C.Fecha_Final,
				C.Id_Profesor
        FROM 	tb_curso C
		WHERE 	Id_Curso = p_Id_Curso;
                        
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
	IN p_Id_Usuario           INT(10),
	IN p_Id_Rol           	  INT(10)
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
		
		UPDATE bd_elearning.tb_usuario_rol
        SET	   Id_Rol = p_Id_Rol
        WHERE  Id_Usuario = p_Id_Usuario;
	COMMIT;
 END $$
DELIMITER ;

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
                       
		SELECT Id_Rol, Nombre FROM bd_elearning.tb_rol;
                        
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
				A.Id_Genero,
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

DROP PROCEDURE IF EXISTS pr_insertarMatricula;
DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `pr_insertarMatricula`(
	IN p_Periodo              INT(10),
	IN p_Id_Usuario           INT(10),
	IN p_Id_Curso             INT(10),
	IN p_Año                    DATE,
	IN p_Fecha_Matricula      DATETIME
)
BEGIN
	START TRANSACTION;
    	SET AUTOCOMMIT = 0;
		INSERT INTO tb_Matricula (Periodo,
								Id_Usuario, 		                         
								Id_Curso, 
								Anio, 
								Fecha_Matricula)
		VALUES (p_Periodo,
				p_Id_Usuario, 		                         
				p_Id_Curso, 
				p_Año, 
				p_Fecha_Matricula);
				
		INSERT INTO	tb_Curso_Usuario (	Id_Usuario, 		                         
										Id_Curso)
		VALUES	(	p_Id_Usuario, 		                         
					p_Id_Curso );
		
	COMMIT;
END $$
DELIMITER ;

DROP PROCEDURE IF EXISTS pr_agregar_actualizar_recurso;
DELIMITER $$
CREATE PROCEDURE pr_agregar_actualizar_recurso
(
	IN p_Id_Tipo_Recurso	INT(10),
	IN p_Id_Curso			INT(10),
	IN p_Recurso_Padre		INT(10),
	IN p_Nombre				VARCHAR(30),
	IN p_URL				VARCHAR(255),
	IN p_Visible			INT(10),
	IN p_Secuencia			INT(10),
	IN p_Notas				VARCHAR(100),
	IN p_Semana				INT(10),
	IN p_Opcion				INT(10)
)
 BEGIN
	
  	START TRANSACTION;
    	SET AUTOCOMMIT = 0;
		
		IF (p_Opcion = 0) 
			THEN 
			
				UPDATE 	tb_Recurso 
				SET		Estado = 0
				WHERE	Id_Curso = p_Id_Curso
						AND Semana = p_Semana;
						
			ELSE IF EXISTS (	SELECT	1
								FROM 	tb_Recurso
								WHERE 	Id_Curso = p_Id_Curso
										AND Id_Tipo_Recurso = p_Id_Tipo_Recurso
										AND Semana = p_Semana 
										AND Estado = 0 ) 
				THEN 
				
					UPDATE 	tb_Recurso 
					SET		Estado = 1,
							Semana = p_Semana,
							Secuencia = p_Secuencia
					WHERE	Id_Curso = p_Id_Curso
							AND Id_Tipo_Recurso = p_Id_Tipo_Recurso
							AND Semana = p_Semana;
				
				ELSE IF NOT EXISTS (	SELECT	1
									FROM 	tb_Recurso
									WHERE 	Id_Curso = p_Id_Curso
										AND Id_Tipo_Recurso = p_Id_Tipo_Recurso
										AND Semana = p_Semana 
										AND Estado = 1 )
					THEN
						
						INSERT INTO `bd_elearning`.`tb_Recurso` (`Id_Tipo_Recurso`, 
														 `Id_Curso`, 
														 `Recurso_Padre`, 
														 `Nombre`,
														 `URL`,
														 `Visible`,
														 `Secuencia`,
														 `Notas`,
														 `Semana`
														 ) 
						VALUES (p_Id_Tipo_Recurso,
								p_Id_Curso,	
								p_Recurso_Padre,
								p_Nombre,			
								p_URL,			
								p_Visible,		
								p_Secuencia,	
								p_Notas,			
								p_Semana);
				END IF;
			END IF;
		END IF;
				
	COMMIT;
END $$
DELIMITER ;

DROP PROCEDURE IF EXISTS pr_obtener_recursos_cursos;
DELIMITER $$
CREATE PROCEDURE pr_obtener_recursos_cursos
(
	IN p_Id_Curso			INT(10)
)
 BEGIN
	
  	START TRANSACTION;
    	SET AUTOCOMMIT = 0;
		
		SELECT	Id_Recurso,
				Id_Curso,
				Semana, 
				Secuencia,
				Id_Tipo_Recurso,
				Identificador,
                Nombre,
				Url
				
		FROM	tb_Recurso
		
		WHERE 	Id_Curso = p_Id_Curso
				AND Estado = 1
		
		ORDER BY Semana, Secuencia;
				
	COMMIT;
END $$
DELIMITER ;


DROP PROCEDURE IF EXISTS pr_CursosEstudiante;
DELIMITER $$
CREATE PROCEDURE pr_CursosEstudiante
(
	IN p_Id_Usuario   INT(10)
)
BEGIN
	START TRANSACTION;
    	SET AUTOCOMMIT = 0;
                       
		SELECT  C.Id_Curso, C.Nombre
        FROM    bd_elearning.tb_curso_usuario              CU 
				INNER JOIN bd_elearning.tb_usuario         U ON
                           (CU.Id_Usuario = U.Id_Usuario)
                INNER JOIN bd_elearning.tb_curso           C ON
                           (CU.Id_Curso = C.Id_Curso)
		WHERE U.Id_Usuario = p_Id_Usuario;
                        
	COMMIT;
END $$
DELIMITER ;

DROP PROCEDURE IF EXISTS pr_listaMatricula;
DELIMITER $$
CREATE PROCEDURE pr_listaMatricula
(
	IN p_Id_Usuario   INT(10)
)
BEGIN
	START TRANSACTION;
    	SET AUTOCOMMIT = 0;
                       
SELECT  Id_Curso, Nombre 
FROM    bd_elearning.tb_curso 
WHERE   Id_Curso NOT IN ( SELECT     C.Id_Curso
                          FROM       bd_elearning.tb_curso            C
				          INNER JOIN bd_elearning.tb_curso_usuario CU ON
									(CU.Id_Curso = C.Id_Curso)
		                   WHERE CU.Id_Usuario = p_Id_Usuario);
                        
	COMMIT;
END $$
DELIMITER ;

DROP PROCEDURE IF EXISTS pr_listarUsuariosMatricula;
DELIMITER $$
CREATE PROCEDURE pr_listarUsuariosMatricula
(
	
)
BEGIN
	START TRANSACTION;
    	SET AUTOCOMMIT = 0;
                       
		SELECT  U.Id_Usuario, U.Nombre, U.Primer_Apellido, U.Segundo_Apellido 
		FROM    tb_Usuario U 
				INNER JOIN tb_Usuario_Rol UR ON
					U.Id_Usuario = UR.Id_Usuario
		WHERE   UR.Id_Usuario <> 1 
		ORDER BY Nombre;
                        
	COMMIT;
END $$
DELIMITER ;

DROP PROCEDURE IF EXISTS pr_listarUsuarios;
DELIMITER $$
CREATE PROCEDURE pr_listarUsuarios
(
	IN p_Id_Usuario   INT(10)
)
BEGIN
	START TRANSACTION;
    	SET AUTOCOMMIT = 0;
                       
		SELECT 	Id_Usuario, Nombre, Primer_Apellido, Segundo_Apellido 
		FROM 	tb_Usuario 
		WHERE 	Id_Usuario <> p_Id_Usuario
		ORDER BY Nombre;
                        
	COMMIT;
END $$
DELIMITER ;

DROP PROCEDURE IF EXISTS pr_listarProfesores;
DELIMITER $$
CREATE PROCEDURE pr_listarProfesores
(
	
)
BEGIN
	START TRANSACTION;
    	SET AUTOCOMMIT = 0;
                       
		SELECT  U.Id_Usuario, U.Nombre, U.Primer_Apellido, U.Segundo_Apellido 
		FROM    tb_Usuario U 
				INNER JOIN tb_Usuario_Rol UR ON
					U.Id_Usuario = UR.Id_Usuario
		WHERE   UR.Id_Rol = 4 
		ORDER BY Nombre;
                        
	COMMIT;
END $$
DELIMITER ;

DROP PROCEDURE IF EXISTS pr_agregar_actualizar_recurso;
DELIMITER $$
CREATE PROCEDURE pr_agregar_actualizar_recurso(
	IN p_Id_Tipo_Recurso	INT(10),
	IN p_Id_Curso			INT(10),
	IN p_Recurso_Padre		INT(10),
	IN p_Nombre				VARCHAR(30),
	IN p_URL				VARCHAR(255),
	IN p_Visible			INT(10),
	IN p_Secuencia			INT(10),
	IN p_Notas				VARCHAR(100),
	IN p_Semana				INT(10),
	IN p_Identificador		INT
)
BEGIN
	
  	START TRANSACTION;
    	SET AUTOCOMMIT = 0;
        
		IF EXISTS (	SELECT	1
								FROM 	tb_Recurso
								WHERE 	Id_Curso = p_Id_Curso
										AND Id_Tipo_Recurso = p_Id_Tipo_Recurso
										AND Semana = p_Semana 
                                        AND Identificador = p_Identificador
										AND Estado = 0 ) THEN
			
					UPDATE 	tb_Recurso 
					SET		Estado = 1,
							Secuencia = p_Secuencia,
                            Notas = p_Notas,
                            Url = p_Url,
                            Nombre = p_Nombre
					WHERE	Id_Curso = p_Id_Curso
							AND Id_Tipo_Recurso = p_Id_Tipo_Recurso
							AND Semana = p_Semana
                            AND Identificador = p_Identificador
                            AND	Estado = 0 ;
                            
		ELSE IF EXISTS ( SELECT	1
								FROM 	tb_Recurso
								WHERE 	Id_Curso = p_Id_Curso
										AND Id_Tipo_Recurso = p_Id_Tipo_Recurso 
                                        AND Identificador = p_Identificador
                                        AND Estado = 1) THEN
					UPDATE 	tb_Recurso 
					SET		Semana = p_Semana,
							Secuencia = p_Secuencia,
                            Notas = p_Notas,
                            Url = p_Url,
                            Nombre = p_Nombre
							WHERE 	Id_Curso = p_Id_Curso
									AND Id_Tipo_Recurso = p_Id_Tipo_Recurso 
									AND Identificador = p_Identificador
									AND Estado = 1;
		ELSE 
				INSERT INTO `bd_elearning`.`tb_Recurso` (`Id_Tipo_Recurso`, 
														 `Id_Curso`, 
														 `Recurso_Padre`, 
														 `Nombre`,
														 `URL`,
														 `Visible`,
														 `Secuencia`,
														 `Notas`,
														 `Semana`,
                                                         `Identificador`
														 ) 
						VALUES (p_Id_Tipo_Recurso,
								p_Id_Curso,	
								p_Recurso_Padre,
								p_Nombre,			
								p_URL,			
								p_Visible,		
								p_Secuencia,	
								p_Notas,			
								p_Semana,
                                p_Identificador);
				END IF;
			END IF;
	COMMIT;
END $$
DELIMITER ;

DROP PROCEDURE IF EXISTS pr_obtener_totalSemanas;
DELIMITER $$
CREATE PROCEDURE pr_obtener_totalSemanas
(
	IN p_Id_Curso INT(10)
)
BEGIN
	START TRANSACTION;
    	SET AUTOCOMMIT = 0;
                       
		SELECT Duracion
        FROM bd_elearning.tb_curso 
        WHERE Id_Curso = p_Id_Curso;
                        
	COMMIT;
END $$
DELIMITER ;

DROP PROCEDURE IF EXISTS pr_eliminar_recurso;
DELIMITER $$
CREATE PROCEDURE pr_eliminar_recurso
(
	IN p_Identificador INT(10)
)
BEGIN
	START TRANSACTION;
    	SET AUTOCOMMIT = 0;
                       
		UPDATE bd_elearning.tb_recurso
        SET Estado = 0
        WHERE Identificador = p_Identificador;
                        
	COMMIT;
END $$
DELIMITER ;

DROP PROCEDURE IF EXISTS pr_listaCursosProfesor;
DELIMITER $$
CREATE PROCEDURE pr_listaCursosProfesor
(
	IN p_Id_Usuario   INT(10)
)

BEGIN
	START TRANSACTION;
    	SET AUTOCOMMIT = 0;
                       
		SELECT 	Id_Curso, Nombre, Duracion, Fecha_Inicio, Fecha_Final 
        FROM 	tb_curso
		WHERE	Id_Profesor = p_Id_Usuario;
                        
	COMMIT;
END $$
DELIMITER ;

DROP PROCEDURE IF EXISTS bd_elearning.pr_Obtener_Identificador;
DELIMITER $$
CREATE PROCEDURE bd_elearning.pr_Obtener_Identificador()
BEGIN

  START TRANSACTION;
   	SET AUTOCOMMIT = 0;
       
       IF EXISTS(SELECT 1 FROM bd_elearning.tb_identificador_recurso) 
       THEN
SELECT Identificador FROM bd_elearning.tb_identificador_recurso ORDER BY Identificador DESC LIMIT 1 ;
ELSE
SELECT IFNULL(count(Identificador), 0) As 'Identificador' FROM bd_elearning.tb_identificador_recurso;
END IF;
COMMIT;
END $$
DELIMITER ;

DROP PROCEDURE IF EXISTS bd_elearning.pr_Guardar_Identificador;
DELIMITER $$
CREATE PROCEDURE bd_elearning.pr_Guardar_Identificador(
	IN p_Identificador INT(10)
)
BEGIN

  START TRANSACTION;
   	SET AUTOCOMMIT = 0;
       
       INSERT INTO bd_elearning.tb_identificador_recurso(Identificador) values(p_Identificador);
COMMIT;
END $$
DELIMITER ;

DROP PROCEDURE IF EXISTS pr_listaCursosEditor;
DELIMITER $$
CREATE PROCEDURE pr_listaCursosEditor
(
	IN p_Id_Usuario   INT(10)
)

BEGIN
	START TRANSACTION;
    	SET AUTOCOMMIT = 0;
                       
		SELECT 	C.Id_Curso, C.Nombre, C.Duracion, C.Fecha_Inicio, C.Fecha_Final 
        FROM 	tb_curso C INNER JOIN tb_curso_usuario CU ON
        C.Id_Curso = CU.Id_Curso
		WHERE	CU.Id_Usuario = p_Id_Usuario;
                        
	COMMIT;
END $$
DELIMITER ;