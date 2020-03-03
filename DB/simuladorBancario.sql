-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema simuladorBancario
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema simuladorBancario
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `simuladorBancario` DEFAULT CHARACTER SET utf8 ;
USE `simuladorBancario` ;

-- -----------------------------------------------------
-- Table `simuladorBancario`.`Transacciones`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `simuladorBancario`.`Transacciones` (
  `idTransaccion` INT NOT NULL,
  `iduserTransfer` INT NOT NULL,
  `monto` DOUBLE NOT NULL,
  `user_iduser` INT NOT NULL,
  PRIMARY KEY (`idTransaccion`, `user_iduser`),
  INDEX `fk_Transacciones_user_idx` (`user_iduser` ASC) VISIBLE,
  CONSTRAINT `fk_Transacciones_user`
    FOREIGN KEY (`user_iduser`)
    REFERENCES `simuladorBancario`.`user` (`iduser`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `simuladorBancario`.`user`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `simuladorBancario`.`user` (
  `iduser` INT NOT NULL,
  `nombre` VARCHAR(45) NOT NULL,
  `email` VARCHAR(45) NOT NULL,
  `telefono` VARCHAR(15) NOT NULL,
  `password` VARCHAR(45) NOT NULL,
  `saldo` DOUBLE NOT NULL,
  PRIMARY KEY (`iduser`),
  CONSTRAINT `fk_user_transfer`
    FOREIGN KEY (`iduser`)
    REFERENCES `simuladorBancario`.`Transacciones` (`user_iduser`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `simuladorBancario`.`correos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `simuladorBancario`.`correos` (
  `idcorreos` INT NOT NULL,
  `password` VARCHAR(45) NOT NULL,
  `user_iduser` INT NOT NULL,
  PRIMARY KEY (`idcorreos`, `user_iduser`),
  INDEX `fk_correos_user1_idx` (`user_iduser` ASC) VISIBLE,
  CONSTRAINT `fk_correos_user1`
    FOREIGN KEY (`user_iduser`)
    REFERENCES `simuladorBancario`.`user` (`iduser`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `simuladorBancario`.`transacciones`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `simuladorBancario`.`transacciones` (
  `idtransaccion` INT NOT NULL,
  `iduserTrannfer` INT NOT NULL,
  `monto` DOUBLE NOT NULL,
  `user_iduser` INT NOT NULL,
  PRIMARY KEY (`idtransaccion`, `user_iduser`),
  INDEX `fk_transacciones_user1_idx` (`user_iduser` ASC) VISIBLE,
  CONSTRAINT `fk_transacciones_user1`
    FOREIGN KEY (`user_iduser`)
    REFERENCES `simuladorBancario`.`user` (`iduser`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
