-- MySQL Script generated by MySQL Workbench
-- 03/08/17 23:00:48
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema bd_elearning
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema bd_elearning
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `bd_elearning` DEFAULT CHARACTER SET latin1 ;
USE `bd_elearning` ;

-- -----------------------------------------------------
-- Table `bd_elearning`.`tb_Genero`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `bd_elearning`.`tb_Genero` ;

CREATE TABLE IF NOT EXISTS `bd_elearning`.`tb_Genero` (
  `Id_Genero` INT(11) NOT NULL AUTO_INCREMENT,
  `Descripcion` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`Id_Genero`))
ENGINE = InnoDB
AUTO_INCREMENT = 1
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `bd_elearning`.`tb_Usuario`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `bd_elearning`.`tb_Usuario` ;

CREATE TABLE IF NOT EXISTS `bd_elearning`.`tb_Usuario` (
  `Id_Usuario` INT(10) NOT NULL,
  `Nombre` VARCHAR(250) NOT NULL,
  `Primer_Apellido` VARCHAR(250) NOT NULL,
  `Segundo_Apellido` VARCHAR(250) NOT NULL,
  `Clave` VARCHAR(30) NOT NULL,
  `Id_Genero` INT(10) NOT NULL,
  `Pais` VARCHAR(100) NOT NULL,
  `Fecha_Ultimo_Ingreso` DATE NOT NULL,
  `IP` VARCHAR(12) NOT NULL,
  `SO` VARCHAR(10) NOT NULL,
  `Navegador` VARCHAR(20) NOT NULL,
  `Lenguaje` VARCHAR(10) NOT NULL,
  PRIMARY KEY (`Id_Usuario`),
  INDEX `fk_tb_Usuario_01_idx` (`Id_Genero` ASC),
  CONSTRAINT `fk_tb_Usuario_tb_Genero`
    FOREIGN KEY (`Id_Genero`)
    REFERENCES `bd_elearning`.`tb_Genero` (`Id_Genero`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 1
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `bd_elearning`.`tb_Tipo_Colaboracion`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `bd_elearning`.`tb_Tipo_Colaboracion` ;

CREATE TABLE IF NOT EXISTS `bd_elearning`.`tb_Tipo_Colaboracion` (
  `Id_Tipo_Colaboracion` INT(11) NOT NULL AUTO_INCREMENT,
  `Nombre` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`Id_Tipo_Colaboracion`))
ENGINE = InnoDB
AUTO_INCREMENT = 1
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `bd_elearning`.`tb_Curso`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `bd_elearning`.`tb_Curso` ;

CREATE TABLE IF NOT EXISTS `bd_elearning`.`tb_Curso` (
  `Id_Curso` INT(10) NOT NULL AUTO_INCREMENT,
  `Nombre` VARCHAR(30) NOT NULL,
  `Duracion` INT(10) NOT NULL,
  `Fecha_Inicio` DATE NOT NULL,
  `Fecha_Final` DATE NOT NULL,
  `Estado` BIT NOT NULL DEFAULT 1,
  PRIMARY KEY (`Id_Curso`))
ENGINE = InnoDB
AUTO_INCREMENT = 1
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `bd_elearning`.`tb_Tarea`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `bd_elearning`.`tb_Tarea` ;

CREATE TABLE IF NOT EXISTS `bd_elearning`.`tb_Tarea` (
  `Id_Tarea` INT NOT NULL AUTO_INCREMENT,
  `Id_Curso` INT NOT NULL,
  `Descripcion` VARCHAR(300) NOT NULL,
  `Calificacion` INT NOT NULL,
  `Fecha_Creacion` DATE NOT NULL,
  `Fecha_Entrega` DATE NOT NULL,
  `Puntaje` INT NOT NULL,
  PRIMARY KEY (`Id_Tarea`),
  INDEX `fk_tb_Tarea_tb_Curso_idx` (`Id_Curso` ASC),
  CONSTRAINT `fk_tb_Tarea_tb_Curso`
    FOREIGN KEY (`Id_Curso`)
    REFERENCES `bd_elearning`.`tb_Curso` (`Id_Curso`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 1
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `bd_elearning`.`tb_Colaboracion`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `bd_elearning`.`tb_Colaboracion` ;

CREATE TABLE IF NOT EXISTS `bd_elearning`.`tb_Colaboracion` (
  `Id_Colaboracion` INT(11) NOT NULL AUTO_INCREMENT,
  `Id_Usuario` INT(11) NOT NULL,
  `Id_Tipo_Colaboracion` INT(11) NOT NULL,
  `Id_Tarea` INT(11) NOT NULL,
  `Fecha_Creacion` DATE NOT NULL,
  `Fecha_Modificacion` DATE NOT NULL,
  `Contenido` VARCHAR(45) NOT NULL,
  `Colaboracion_Padre` VARCHAR(45) NOT NULL,
  `Visible` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`Id_Colaboracion`),
  INDEX `fk_tb_Colaboracion_01_idx` (`Id_Usuario` ASC),
  INDEX `fk_tb_Colaboracion_02_idx` (`Id_Tipo_Colaboracion` ASC),
  INDEX `fk_tb_Colaboracion_tb_Tarea_idx` (`Id_Tarea` ASC),
  CONSTRAINT `fk_tb_Colaboracion_tb_Usuario`
    FOREIGN KEY (`Id_Usuario`)
    REFERENCES `bd_elearning`.`tb_Usuario` (`Id_Usuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tb_Colaboracion_tb_Tipo_Colaboracion`
    FOREIGN KEY (`Id_Tipo_Colaboracion`)
    REFERENCES `bd_elearning`.`tb_Tipo_Colaboracion` (`Id_Tipo_Colaboracion`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tb_Colaboracion_tb_Tarea`
    FOREIGN KEY (`Id_Tarea`)
    REFERENCES `bd_elearning`.`tb_Tarea` (`Id_Tarea`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 1
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `bd_elearning`.`tb_Matricula`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `bd_elearning`.`tb_Matricula` ;

CREATE TABLE IF NOT EXISTS `bd_elearning`.`tb_Matricula` (
  `Id_Matricula` INT(10) NOT NULL AUTO_INCREMENT,
  `Periodo` INT(10) NOT NULL,
  `Id_Usuario` INT(10) NOT NULL,
  `Id_Curso` INT(10) NOT NULL,
  `Anio` DATE NOT NULL,
  `Fecha_Matricula` DATETIME NOT NULL,
  PRIMARY KEY (`Id_Matricula`),
  INDEX `fk_tb_Matricula_tb_Usuario_idx` (`Id_Usuario` ASC),
  INDEX `fk_tb_Matricula_tb_Curso_idx` (`Id_Curso` ASC),
  CONSTRAINT `fk_tb_Matricula_tb_Usuario`
    FOREIGN KEY (`Id_Usuario`)
    REFERENCES `bd_elearning`.`tb_Usuario` (`Id_Usuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tb_Matricula_tb_Curso`
    FOREIGN KEY (`Id_Curso`)
    REFERENCES `bd_elearning`.`tb_Curso` (`Id_Curso`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 1
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `bd_elearning`.`tb_Semana`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `bd_elearning`.`tb_Semana` ;

CREATE TABLE IF NOT EXISTS `bd_elearning`.`tb_Semana` (
  `Id_Semana` INT(10) NOT NULL AUTO_INCREMENT,
  `Tema` VARCHAR(30) NOT NULL,
  `Visible` BIT NOT NULL,
  `Id_Curso` INT(10) NOT NULL,
  `Estado` BIT NOT NULL DEFAULT 1,
  PRIMARY KEY (`Id_Semana`),
  INDEX `fk_tb_Semana_tb_Curso_idx` (`Id_Curso` ASC),
  CONSTRAINT `fk_tb_Semana_tb_Curso`
    FOREIGN KEY (`Id_Curso`)
    REFERENCES `bd_elearning`.`tb_Curso` (`Id_Curso`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 1
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `bd_elearning`.`tb_Tipo_Recurso`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `bd_elearning`.`tb_Tipo_Recurso` ;

CREATE TABLE IF NOT EXISTS `bd_elearning`.`tb_Tipo_Recurso` (
  `Id_Tipo_Recurso` INT(10) NOT NULL AUTO_INCREMENT,
  `Nombre` VARCHAR(100) NOT NULL,
  PRIMARY KEY (`Id_Tipo_Recurso`));


-- -----------------------------------------------------
-- Table `bd_elearning`.`tb_recurso`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `bd_elearning`.`tb_recurso` ;

CREATE TABLE IF NOT EXISTS `bd_elearning`.`tb_recurso` (
  `Id_Recurso` INT(10) NOT NULL AUTO_INCREMENT,
  `Id_Tipo_Recurso` INT(10) NOT NULL,
  `Id_Curso` INT(10) NOT NULL,
  `Recurso_Padre` INT(10),
  `Nombre` VARCHAR(30) NOT NULL,
  `Url` VARCHAR(255),
  `Visible` INT(10) NOT NULL,
  `Secuencia` INT(10) NOT NULL,
  `Notas` VARCHAR(100),
  `Estado` BIT(1) NOT NULL DEFAULT b'1',
  `Semana` INT(10) NOT NULL,
  PRIMARY KEY (`Id_Recurso`),
  INDEX `fk_tb_Recurso_tb_Recurso_Padre_idx` (`Recurso_Padre` ASC),
  INDEX `fk_tb_Recurso_tb_Tipo_Recurso_idx` (`Id_Tipo_Recurso` ASC),
  INDEX `fk_tb_Recurso_tb_Curso_idx` (`Id_Curso` ASC),
  CONSTRAINT `fk_tb_Recurso_tb_Tipo_Recurso`
    FOREIGN KEY (`Id_Tipo_Recurso`)
    REFERENCES `bd_elearning`.`tb_tipo_recurso` (`Id_Tipo_Recurso`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tb_Recurso_tb_Recurso_Padre`
    FOREIGN KEY (`Recurso_Padre`)
    REFERENCES `bd_elearning`.`tb_recurso` (`Id_Recurso`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tb_Recurso_tb_Curso`
    FOREIGN KEY (`Id_Curso`)
    REFERENCES `bd_elearning`.`tb_Curso` (`Id_Curso`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `bd_elearning`.`tb_Rol`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `bd_elearning`.`tb_Rol` ;

CREATE TABLE IF NOT EXISTS `bd_elearning`.`tb_Rol` (
  `Id_Rol` INT(10) NOT NULL AUTO_INCREMENT,
  `Nombre` VARCHAR(30) NOT NULL,
  `Estado` BIT NOT NULL DEFAULT 1, 
  PRIMARY KEY (`Id_Rol`))
ENGINE = InnoDB
AUTO_INCREMENT = 1
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `bd_elearning`.`tb_Usuario_Rol`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `bd_elearning`.`tb_Usuario_Rol` ;

CREATE TABLE IF NOT EXISTS `bd_elearning`.`tb_Usuario_Rol` (
  `Id_Usuario_Rol` INT(10) NOT NULL AUTO_INCREMENT,
  `Id_Usuario` INT(10) NOT NULL,
  `Id_Rol` INT(10) NOT NULL,
  `Estado` BIT NOT NULL DEFAULT 1,
  PRIMARY KEY (`Id_Usuario_Rol`),
  INDEX `fk_tb_Usuario_Rol_01_idx` (`Id_Usuario` ASC),
  INDEX `fk_tb_Usuario_Rol_tb_Rol_idx` (`Id_Rol` ASC),
  CONSTRAINT `fk_tb_Usuario_Rol_tb_Usuario`
    FOREIGN KEY (`Id_Usuario`)
    REFERENCES `bd_elearning`.`tb_Usuario` (`Id_Usuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tb_Usuario_Rol_tb_Rol`
    FOREIGN KEY (`Id_Rol`)
    REFERENCES `bd_elearning`.`tb_Rol` (`Id_Rol`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 1
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `bd_elearning`.`tb_Curso_Rol`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `bd_elearning`.`tb_Curso_Rol` ;

CREATE TABLE IF NOT EXISTS `bd_elearning`.`tb_Curso_Rol` (
  `Id_Curso_Rol` INT(10) NOT NULL AUTO_INCREMENT,
  `Id_Rol` INT(10) NOT NULL,
  `Id_Curso` INT(10) NOT NULL,
  PRIMARY KEY (`Id_Curso_Rol`),
  INDEX `fk_tb_Curso_Rol_tb_Rol_idx` (`Id_Rol` ASC),
  INDEX `fk_tb_Curso_Rol_tb_Curso_idx` (`Id_Curso` ASC),
  CONSTRAINT `fk_tb_Curso_Rol_tb_Rol`
    FOREIGN KEY (`Id_Rol`)
    REFERENCES `bd_elearning`.`tb_Rol` (`Id_Rol`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tb_Curso_Rol_tb_Curso`
    FOREIGN KEY (`Id_Curso`)
    REFERENCES `bd_elearning`.`tb_Curso` (`Id_Curso`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 1
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `bd_elearning`.`tb_Recurso_Rol`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `bd_elearning`.`tb_Recurso_Rol` ;

CREATE TABLE IF NOT EXISTS `bd_elearning`.`tb_Recurso_Rol` (
  `Id_Recurso_Rol` INT(10) NOT NULL AUTO_INCREMENT,
  `Id_Recurso` INT(10) NOT NULL,
  `Id_Rol` INT(10) NOT NULL,
  `Estado` BIT NOT NULL DEFAULT 1,
  PRIMARY KEY (`Id_Recurso_Rol`),
  INDEX `fk_tb_Recurso_Rol_tb_Recurso_idx` (`Id_Recurso` ASC),
  INDEX `fk_tb_Recurso_Rol_tb_Rol_idx` (`Id_Rol` ASC),
  CONSTRAINT `fk_tb_Recurso_Rol_tb_Recurso`
    FOREIGN KEY (`Id_Recurso`)
    REFERENCES `bd_elearning`.`tb_Recurso` (`Id_Recurso`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tb_Recurso_Rol_tb_Rol`
    FOREIGN KEY (`Id_Rol`)
    REFERENCES `bd_elearning`.`tb_Rol` (`Id_Rol`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);


-- -----------------------------------------------------
-- Table `bd_elearning`.`tb_Curso_Usuario`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `bd_elearning`.`tb_Curso_Usuario` ;

CREATE TABLE IF NOT EXISTS `bd_elearning`.`tb_Curso_Usuario` (
  `Id_Curso_Usuario` INT(10) NOT NULL,
  `Id_Curso` INT(10) NOT NULL,
  `Id_Usuario` INT(10) NOT NULL,
  PRIMARY KEY (`Id_Curso_Usuario`),
  INDEX `fk_tb_Curso_Usuario_tb_Curso_idx` (`Id_Curso` ASC),
  INDEX `fk_tb_Curso_Usuario_tb_Usuario_idx` (`Id_Usuario` ASC),
  CONSTRAINT `fk_tb_Curso_Usuario_tb_Curso`
    FOREIGN KEY (`Id_Curso`)
    REFERENCES `bd_elearning`.`tb_Curso` (`Id_Curso`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tb_Curso_Usuario_tb_Usuario`
    FOREIGN KEY (`Id_Usuario`)
    REFERENCES `bd_elearning`.`tb_Usuario` (`Id_Usuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
