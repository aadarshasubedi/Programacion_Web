
CREATE TABLE tb_Usuario_Rol(
	Id_Usuario_Rol int NOT NULL AUTO_INCREMENT,
	Id_Usuario int NOT NULL,
	Id_Rol int NOT NULL,
	Estado bit NOT NULL,

	CONSTRAINT pk_Usuario_Rol PRIMARY KEY (Id_Usuario_Rol),
	--CONSTRAINT fk_Usuario_Rol FOREIGN KEY (Id_Usuario) REFERENCES tb_Usuario(Id_Usuario),
	--CONSTRAINT fk_Usuario_Rol FOREIGN KEY (Id_Rol) REFERENCES tb_Rol(Id_Rol)

);

CREATE TABLE tb_Curso_Rol(
	Id_Curso_Rol int NOT NULL AUTO_INCREMENT,
	Id_Rol int NOT NULL,
	Id_Curso int NOT NULL,

	CONSTRAINT pk_Curso_Rol PRIMARY KEY (Id_Curso_Rol),
	--CONSTRAINT fk_Curso_Rol1 FOREIGN KEY (Id_Rol) REFERENCES tb_Rol(Id_Rol),
	--CONSTRAINT fk_Curso_Rol2 FOREIGN KEY (Id_Curso) REFERENCES tb_Curso(Id_Curso)
);

CREATE TABLE tb_Rol(
	Id_Rol int NOT NULL AUTO_INCREMENT,
	Nombre varchar(30) NOT NULL,
	Estado bit NOT NULL,

	CONSTRAINT pk_Rol PRIMARY KEY (Id_Rol)
);

CREATE TABLE tb_Recurso_Rol(
	Id_Recurso_Rol int NOT NULL AUTO_INCREMENT,
	Id_Recurso int NOT NULL,
	Id_Rol int NOT NULL,
	Estado bit NOT NULL,

	CONSTRAINT pk_Recurso_Rol PRIMARY KEY (Id_Recurso_Rol),
	--CONSTRAINT fk_Recurso_Rol1 FOREIGN KEY (Id_Recurso) REFERENCES tb_Recurso(Id_Recurso),
	--CONSTRAINT fk_Recurso_Rol2 FOREIGN KEY (Id_Rol) REFERENCES tb_Rol(Id_Rol)
);

CREATE TABLE tb_Tipo_Recurso(
	Id_Tipo_Recurso int NOT NULL AUTO_INCREMENT,
	Nombre varchar(30) NOT NULL,

	CONSTRAINT pk_Tipo_Recurso PRIMARY KEY (Id_Tipo_Recurso)
);
