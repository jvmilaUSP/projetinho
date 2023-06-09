-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------

DROP DATABASE IF EXISTS jalotou; 
CREATE DATABASE jalotou;
USE jalotou;
CREATE TABLE IF NOT EXISTS `usuario` (
  `idusuario` INT NOT NULL AUTO_INCREMENT,
  `login` VARCHAR(45) NOT NULL,
  `senha` VARCHAR(45) NOT NULL,
  `nome` VARCHAR(90) NOT NULL,
  `tel` VARCHAR(20),
  `cpf` VARCHAR(20) NOT NULL,
  PRIMARY KEY (`idusuario`),
  UNIQUE INDEX `idusuario_UNIQUE` (`idusuario` ASC),
  UNIQUE INDEX `login_UNIQUE` (`login` ASC)
) ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `mydb`.`estabelecimento`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `estabelecimento` (
  `idestabelecimento` INT NOT NULL,
  `nome` VARCHAR(90) NOT NULL,
  `endereco` VARCHAR(100) NOT NULL,
  `cnpj` VARCHAR(30) NOT NULL,
  `tel` VARCHAR(20) NOT NULL,
  `estabelecimento_idestabelecimento` INT,
  PRIMARY KEY (`idestabelecimento`),
  UNIQUE INDEX `idestabelecimento_UNIQUE` (`idestabelecimento` ASC),
  INDEX `fk_usuario_estabelecimento_idx` (`estabelecimento_idestabelecimento` ASC),
  CONSTRAINT `fk_usuario_estabelecimento`
    FOREIGN KEY (`estabelecimento_idestabelecimento`)
    REFERENCES `usuario` (`idusuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION
) ENGINE = InnoDB;



-- -----------------------------------------------------
-- Table `mydb`.`usuario`
-- -----------------------------------------------------




-- -----------------------------------------------------
-- Table `mydb`.`andar`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `andar` (
  `idandar` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(45) NOT NULL,
  `estabelecimento_idestabelecimento` INT NOT NULL,
  PRIMARY KEY (`idandar`),
  INDEX `fk_andar_estabelecimento1_idx` (`estabelecimento_idestabelecimento` ASC) ,
  CONSTRAINT `fk_andar_estabelecimento1`
    FOREIGN KEY (`estabelecimento_idestabelecimento`)
    REFERENCES `estabelecimento` (`idestabelecimento`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`setor`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `setor` (
  `idsetor` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(45) NOT NULL,
  `descricao` VARCHAR(80) NULL,
  `palavrachave` VARCHAR(80) NULL,
  `link` VARCHAR(200) NULL,
  `indice` FLOAT NULL,
  `foto` MEDIUMBLOB NULL,
  `andar_idandar` INT NOT NULL,
  PRIMARY KEY (`idsetor`),
  INDEX `fk_setor_andar1_idx` (`andar_idandar` ASC) ,
  CONSTRAINT `fk_setor_andar1`
    FOREIGN KEY (`andar_idandar`)
    REFERENCES `andar` (`idandar`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;




-- -----------------------------------------------------
-- Table `mydb`.`adm`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `adm` (
  `idadm` INT  NOT NULL AUTO_INCREMENT,
  `login` VARCHAR(45) NOT NULL,
  `senha` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idadm`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`categoria`
-- -----------------------------------------------------



-- -----------------------------------------------------
-- Table `mydb`.`sensor`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sensor` (
  `idsensor` INT  NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(30) NOT NULL,
  `setor_idsetor` INT NOT NULL,
  PRIMARY KEY (`idsensor`),
  INDEX `fk_sensor_setor1_idx` (`setor_idsetor` ASC),
  CONSTRAINT `fk_sensor_setor1`
    FOREIGN KEY (`setor_idsetor`)
    REFERENCES `setor` (`idsetor`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`leitor`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `leitor` (
  `idleitor` INT  NOT NULL AUTO_INCREMENT,
  `ruido` FLOAT NOT NULL,
  `horasensor` DATETIME NOT NULL,
  `sensor_idsensor` INT  NOT NULL,
  PRIMARY KEY (`idleitor`),
  INDEX `fk_leitor_sensor1_idx` (`sensor_idsensor` ASC) ,
  CONSTRAINT `fk_leitor_sensor1`
    FOREIGN KEY (`sensor_idsensor`)
    REFERENCES `sensor` (`idsensor`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;


INSERT into adm (idadm,login,senha) VALUES (1,adm,12320);
