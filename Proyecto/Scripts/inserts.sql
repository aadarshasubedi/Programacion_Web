INSERT INTO `bd_elearning`.`tb_tipo_recurso` (`Nombre`) VALUES ('Sección');
INSERT INTO `bd_elearning`.`tb_tipo_recurso` (`Nombre`) VALUES ('Etiqueta');
INSERT INTO `bd_elearning`.`tb_tipo_recurso` (`Nombre`) VALUES ('Texto');
INSERT INTO `bd_elearning`.`tb_tipo_recurso` (`Nombre`) VALUES ('Enlace');


INSERT INTO `bd_elearning`.`tb_curso` (`Nombre`, `Duracion`, `Fecha_Inicio`, `Fecha_Final`,`Id_Profesor`) 
VALUES ('Espanol', '17', '2017-02-06', '2017-06-01',4);

INSERT INTO `bd_elearning`.`tb_curso` (`Nombre`, `Duracion`, `Fecha_Inicio`, `Fecha_Final`,`Id_Profesor`) 
VALUES ('Ingles', '17', '2017-02-06', '2017-06-01',4);

INSERT INTO `bd_elearning`.`tb_curso` (`Nombre`, `Duracion`, `Fecha_Inicio`, `Fecha_Final`,`Id_Profesor`) 
VALUES ('Matematica', '17', '2017-02-06', '2017-06-01',4);

INSERT INTO `bd_elearning`.`tb_curso` (`Nombre`, `Duracion`, `Fecha_Inicio`, `Fecha_Final`,`Id_Profesor`) 
VALUES ('Programacion 1', '17', '2017-02-06', '2017-06-01',4);

INSERT INTO `bd_elearning`.`tb_curso` (`Nombre`, `Duracion`, `Fecha_Inicio`, `Fecha_Final`,`Id_Profesor`) 
VALUES ('Bases de datos 1', '17', '2017-02-06', '2017-06-01',4);


INSERT INTO `bd_elearning`.`tb_genero` (`Id_Genero`, `Descripcion`) VALUES ('1', 'Masculino');
INSERT INTO `bd_elearning`.`tb_genero` (`Id_Genero`, `Descripcion`) VALUES ('2', 'Femenino');
INSERT INTO `bd_elearning`.`tb_genero` (`Id_Genero`, `Descripcion`) VALUES ('3', 'Otro');


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


INSERT INTO `bd_elearning`.`tb_usuario` (`Id_Usuario`, `Nombre`, `Primer_Apellido`, `Segundo_Apellido`, `Clave`, `Id_Genero`, `Pais`, `Fecha_Ultimo_Ingreso`, `IP`, `SO`, `Navegador`, `Lenguaje`) 
VALUES ('1', 'Osvaldo', 'Aguero', 'Perez', '1', '1', 'Costa Rica', '2017-01-01', '1.1.1.1', 'Windows', 'Explorer', 'L1');
INSERT INTO `bd_elearning`.`tb_usuario` (`Id_Usuario`, `Nombre`, `Primer_Apellido`, `Segundo_Apellido`, `Clave`, `Id_Genero`, `Pais`, `Fecha_Ultimo_Ingreso`, `IP`, `SO`, `Navegador`, `Lenguaje`) 
VALUES ('2', 'Roller', 'Zuniga', 'Solano', '2', '1', 'Costa Rica', '2017-01-01', '1.1.1.1', 'Windows', 'Explorer', 'L1');
INSERT INTO `bd_elearning`.`tb_usuario` (`Id_Usuario`, `Nombre`, `Primer_Apellido`, `Segundo_Apellido`, `Clave`, `Id_Genero`, `Pais`, `Fecha_Ultimo_Ingreso`, `IP`, `SO`, `Navegador`, `Lenguaje`) 
VALUES ('3', 'Jeanca', 'Saborio', 'Ugalde', '3', '1', 'Costa Rica', '2017-01-01', '1.1.1.1', 'Windows', 'Explorer', 'L1');
INSERT INTO `bd_elearning`.`tb_usuario` (`Id_Usuario`, `Nombre`, `Primer_Apellido`, `Segundo_Apellido`, `Clave`, `Id_Genero`, `Pais`, `Fecha_Ultimo_Ingreso`, `IP`, `SO`, `Navegador`, `Lenguaje`) 
VALUES ('4', 'Antonio', 'Solis', 'Solis', '4', '1', 'Costa Rica', '2017-01-01', '1.1.1.1', 'Windows', 'Explorer', 'L1');
INSERT INTO `bd_elearning`.`tb_usuario` (`Id_Usuario`, `Nombre`, `Primer_Apellido`, `Segundo_Apellido`, `Clave`, `Id_Genero`, `Pais`, `Fecha_Ultimo_Ingreso`, `IP`, `SO`, `Navegador`, `Lenguaje`) 
VALUES ('5', 'Fernando', 'Chacon', 'Chacon', '5', '1', 'Costa Rica', '2017-01-01', '1.1.1.1', 'Windows', 'Explorer', 'L1');

INSERT INTO `bd_elearning`.`tb_usuario_rol` (`Id_Usuario_Rol`, `Id_Usuario`, `Id_Rol`, `Estado`) 
VALUES ('1', '1', '1',  1);
INSERT INTO `bd_elearning`.`tb_usuario_rol` (`Id_Usuario_Rol`, `Id_Usuario`, `Id_Rol`, `Estado`) 
VALUES ('2', '2', '2',  1);
INSERT INTO `bd_elearning`.`tb_usuario_rol` (`Id_Usuario_Rol`, `Id_Usuario`, `Id_Rol`, `Estado`) 
VALUES ('3', '3', '3',  1);
INSERT INTO `bd_elearning`.`tb_usuario_rol` (`Id_Usuario_Rol`, `Id_Usuario`, `Id_Rol`, `Estado`) 
VALUES ('4', '4', '4',  1);
INSERT INTO `bd_elearning`.`tb_usuario_rol` (`Id_Usuario_Rol`, `Id_Usuario`, `Id_Rol`, `Estado`) 
VALUES ('5', '5', '5',  1);


INSERT INTO `bd_elearning`.`tb_curso_usuario` (`Id_Curso_Usuario`, `Id_Curso`, `Id_Usuario`) 
VALUES ('1', '1', '4');

INSERT INTO `bd_elearning`.`tb_curso_usuario` (`Id_Curso_Usuario`, `Id_Curso`, `Id_Usuario`) 
VALUES ('2', '2', '1');