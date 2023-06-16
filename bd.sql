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

-- -----------------------------------------------------
-- Table `mydb`.`estabelecimento`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `estabelecimento` (
  `idestabelecimento` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(90) NOT NULL,
  `endereco` VARCHAR(100) NOT NULL,
  `cnpj` VARCHAR(30) NOT NULL,
  `tel` VARCHAR(20) NOT NULL,
  PRIMARY KEY (`idestabelecimento`),
  UNIQUE INDEX `idestabelecimento_UNIQUE` (`idestabelecimento` ASC) VISIBLE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`usuario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `usuario` (
  `idusuario` INT NOT NULL AUTO_INCREMENT,
  `login` VARCHAR(45) NOT NULL,
  `senha` VARCHAR(45) NOT NULL,
  `nome` VARCHAR(90) NOT NULL,
  `tel` VARCHAR(20),
  `cpf` VARCHAR(20) NOT NULL,
  `estabelecimento_idestabelecimento` INT,
  PRIMARY KEY (`idusuario`),
  UNIQUE INDEX `idusuario_UNIQUE` (`idusuario` ASC) VISIBLE,
  UNIQUE INDEX `login_UNIQUE` (`login` ASC) VISIBLE,
  UNIQUE INDEX `senha_UNIQUE` (`senha` ASC) VISIBLE,
  INDEX `fk_usuario_estabelecimento_idx` (`estabelecimento_idestabelecimento` ASC) VISIBLE,
  CONSTRAINT `fk_usuario_estabelecimento`
    FOREIGN KEY (`estabelecimento_idestabelecimento`)
    REFERENCES `mydb`.`estabelecimento` (`idestabelecimento`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`andar`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `andar` (
  `idandar` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(45) NOT NULL,
  `estabelecimento_idestabelecimento` INT NOT NULL,
  PRIMARY KEY (`idandar`, `estabelecimento_idestabelecimento`),
  UNIQUE INDEX `idandar_UNIQUE` (`idandar` ASC) VISIBLE,
  INDEX `fk_andar_estabelecimento1_idx` (`estabelecimento_idestabelecimento` ASC) VISIBLE,
  CONSTRAINT `fk_andar_estabelecimento1`
    FOREIGN KEY (`estabelecimento_idestabelecimento`)
    REFERENCES `mydb`.`estabelecimento` (`idestabelecimento`)
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
  `link` VARCHAR(80) NULL,
  `indice` FLOAT NOT NULL,
  `foto` MEDIUMBLOB NULL,
  `localizacao` VARCHAR(45) NULL,
  `andar_idandar` INT NOT NULL,
  `andar_estabelecimento_idestabelecimento` INT NOT NULL,
  PRIMARY KEY (`idsetor`, `andar_idandar`, `andar_estabelecimento_idestabelecimento`),
  UNIQUE INDEX `idsetor_UNIQUE` (`idsetor` ASC) VISIBLE,
  INDEX `fk_setor_andar1_idx` (`andar_idandar` ASC, `andar_estabelecimento_idestabelecimento` ASC) VISIBLE,
  CONSTRAINT `fk_setor_andar1`
    FOREIGN KEY (`andar_idandar` , `andar_estabelecimento_idestabelecimento`)
    REFERENCES `mydb`.`andar` (`idandar` , `estabelecimento_idestabelecimento`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`adm`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `adm` (
  `idadm` INT UNSIGNED NOT NULL,
  `login` VARCHAR(45) NOT NULL,
  `senha` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idadm`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`categoria`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `categoria` (
  `idcategoria` INT UNSIGNED NOT NULL,
  `nome` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idcategoria`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`sensor`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sensor` (
  `idsensor` INT UNSIGNED NOT NULL,
  `nome` VARCHAR(30) NOT NULL,
  `setor_idsetor` INT NOT NULL,
  `setor_andar_idandar` INT NOT NULL,
  `setor_andar_estabelecimento_idestabelecimento` INT NOT NULL,
  PRIMARY KEY (`idsensor`, `setor_idsetor`, `setor_andar_idandar`, `setor_andar_estabelecimento_idestabelecimento`),
  INDEX `fk_sensor_setor1_idx` (`setor_idsetor` ASC, `setor_andar_idandar` ASC, `setor_andar_estabelecimento_idestabelecimento` ASC) VISIBLE,
  CONSTRAINT `fk_sensor_setor1`
    FOREIGN KEY (`setor_idsetor` , `setor_andar_idandar` , `setor_andar_estabelecimento_idestabelecimento`)
    REFERENCES `mydb`.`setor` (`idsetor` , `andar_idandar` , `andar_estabelecimento_idestabelecimento`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`leitor`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `leitor` (
  `idleitor` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `ruido` FLOAT NOT NULL,
  `horasensor` DATETIME NOT NULL,
  `sensor_idsensor` INT UNSIGNED NOT NULL,
  `sensor_setor_idsetor` INT NOT NULL,
  `sensor_setor_andar_idandar` INT NOT NULL,
  `sensor_setor_andar_estabelecimento_idestabelecimento` INT NOT NULL,
  PRIMARY KEY (`idleitor`, `sensor_idsensor`, `sensor_setor_idsetor`, `sensor_setor_andar_idandar`, `sensor_setor_andar_estabelecimento_idestabelecimento`),
  INDEX `fk_leitor_sensor1_idx` (`sensor_idsensor` ASC, `sensor_setor_idsetor` ASC, `sensor_setor_andar_idandar` ASC, `sensor_setor_andar_estabelecimento_idestabelecimento` ASC) VISIBLE,
  CONSTRAINT `fk_leitor_sensor1`
    FOREIGN KEY (`sensor_idsensor` , `sensor_setor_idsetor` , `sensor_setor_andar_idandar` , `sensor_setor_andar_estabelecimento_idestabelecimento`)
    REFERENCES `mydb`.`sensor` (`idsensor` , `setor_idsetor` , `setor_andar_idandar` , `setor_andar_estabelecimento_idestabelecimento`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
