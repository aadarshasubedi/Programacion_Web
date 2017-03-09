CREATE TABLE tb_Curso
(
Id_Curso int NOT NULL AUTO_INCREMENT,
Nombre varchar(30) NOT NULL,
Duracion int NOT NULL,
Fecha_Inicio Date NOT NULL,
Fecha_Final Date NOT NULL,
CONSTRAINT pk_Curso PRIMARY KEY (Id_Curso)
);

CREATE TABLE tb_Tarea
(
Id_Tarea int NOT NULL AUTO_INCREMENT,
Id_Curso int NOT NULL,
Descripcion varchar(300) NOT NULL,
Calificacion int NOT NULL,
Fecha_Creacion Date NOT NULL,
Fecha_Entrega Date NOT NULL,
Puntaje int NOT NULL,
CONSTRAINT pk_Tarea PRIMARY KEY (Id_Tarea),
CONSTRAINT fk_Tarea_Curso FOREIGN KEY (Id_Curso) REFERENCES tb_Curso (Id_Curso)
);

CREATE TABLE tb_Semana
(
Id_Semana int NOT NULL AUTO_INCREMENT,
Id_Curso int NOT NULL,
Fecha_Inicio Date NOT NULL,
Fecha_Final Date NOT NULL,
CONSTRAINT pk_Semana PRIMARY KEY (Id_Semana),
CONSTRAINT fk_Semana_Curso FOREIGN KEY (Id_Curso) REFERENCES tb_Curso (Id_Curso)
);

CREATE TABLE tb_Recurso
(
Id_Recurso int NOT NULL AUTO_INCREMENT,
Id_Tipo_Recurso int NOT NULL,
Recurso_Padre int NOT NULL,
Nombre varchar(30) NOT NULL,
Url varchar(50) NOT NULL,
Visible bit NOT NULL,
Secuencia int NOT NULL,
Notas float NOT NULL,
Estado bit NOT NULL,
Semana int NOT NULL,
CONSTRAINT pk_Recurso PRIMARY KEY (Id_Recurso),
CONSTRAINT fk_Recurso_Tipo_Recurso FOREIGN KEY (Id_Tipo_Recurso) REFERENCES tb_Tipo_Recurso (Id_Tipo_Recurso),
CONSTRAINT fk_Recurso_Padre FOREIGN KEY (Recurso_Padre) REFERENCES tb_Recurso (Id_Recurso)
);