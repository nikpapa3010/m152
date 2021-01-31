-- -----------------------------------------------------
-- Schema MEP
-- -----------------------------------------------------
DROP SCHEMA IF EXISTS `MEP`;

-- -----------------------------------------------------
-- Schema MEP
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `MEP` DEFAULT CHARACTER SET utf8 ;
USE `MEP`;

-- -----------------------------------------------------
-- Table `Usertype`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `Usertype` ;

CREATE TABLE IF NOT EXISTS `Usertype` (
  `UsertypeID` INT NOT NULL AUTO_INCREMENT,
  `Usertype` ENUM("User", "Admin") NOT NULL,
  PRIMARY KEY (`UsertypeID`));

CREATE UNIQUE INDEX `Usertype_UNIQUE` ON `Usertype` (`Usertype` ASC);


-- -----------------------------------------------------
-- Table `User`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `User` ;

CREATE TABLE IF NOT EXISTS `User` (
  `UserID` INT NOT NULL AUTO_INCREMENT,
  `Username` VARCHAR(50) NOT NULL,
  `Email` VARCHAR(50) NOT NULL,
  `Password` VARCHAR(50) NOT NULL,
  `Profilbild` BLOB NULL,
  `UsertypeID` INT NOT NULL,
  `MailingList` TINYINT NOT NULL,
  PRIMARY KEY (`UserID`),
  CONSTRAINT `fk_User_Usertype`
    FOREIGN KEY (`UsertypeID`)
    REFERENCES `Usertype` (`UsertypeID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);

CREATE INDEX `fk_User_Usertype_idx` ON `User` (`UsertypeID` ASC);

CREATE UNIQUE INDEX `Username_UNIQUE` ON `User` (`Username` ASC);

CREATE UNIQUE INDEX `Email_UNIQUE` ON `User` (`Email` ASC);


-- -----------------------------------------------------
-- Table `Artikel`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `Artikel` ;

CREATE TABLE IF NOT EXISTS `Artikel` (
  `ArtikelID` INT NOT NULL AUTO_INCREMENT,
  `Title` VARCHAR(50) NOT NULL,
  `Text` LONGTEXT NOT NULL,
  `Date` DATETIME NOT NULL,
  `UserID` INT NOT NULL,
  PRIMARY KEY (`ArtikelID`),
  CONSTRAINT `fk_Artikel_User`
    FOREIGN KEY (`UserID`)
    REFERENCES `User` (`UserID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);

CREATE INDEX `fk_Artikel_User_idx` ON `Artikel` (`UserID` ASC);

CREATE INDEX `idx_ArtTitle` USING BTREE ON `Artikel` (`Title`);


-- -----------------------------------------------------
-- Table `Video`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `Video` ;

CREATE TABLE IF NOT EXISTS `Video` (
  `VideoID` INT NOT NULL AUTO_INCREMENT,
  `VideoName` VARCHAR(50) NOT NULL,
  `VideoDesc` VARCHAR(100) NOT NULL,
  `Video` BLOB NOT NULL,
  PRIMARY KEY (`VideoID`));


-- -----------------------------------------------------
-- Table `Projekt`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `Projekt` ;

CREATE TABLE IF NOT EXISTS `Projekt` (
  `ProjektID` INT NOT NULL AUTO_INCREMENT,
  `Projektname` VARCHAR(50) NOT NULL,
  `Synopsis` VARCHAR(250) NOT NULL,
  `VideoID` INT NULL,
  PRIMARY KEY (`ProjektID`),
  CONSTRAINT `fk_Projekt_Video`
    FOREIGN KEY (`VideoID`)
    REFERENCES `Video` (`VideoID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);

CREATE UNIQUE INDEX `Projektname_UNIQUE` ON `Projekt` (`Projektname` ASC);

CREATE INDEX `fk_Projekt_Video_idx` ON `Projekt` (`VideoID` ASC);
