
-- ----------------------------------------------------------
-- CPNV
-- Auteur	:	Mathias Groux
-- Date		:	12.05.2022
-- Résumé	:	Database to manage and book the fileds
-- ----------------------------------------------------------



-- ------------------------------------------------------------
--         Script MySQL.
-- ------------------------------------------------------------
DROP DATABASE IF EXISTS `db_fields`;
CREATE DATABASE IF NOT EXISTS `db_fields` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `db_fields`;



-- ------------------------------------------------------------
--  Table: fields
-- ------------------------------------------------------------

CREATE TABLE fields(
        id      Int  Auto_increment  NOT NULL ,
        name    Varchar (20) NOT NULL ,
        width   Varchar (3) NOT NULL ,
        length  Varchar (3) NOT NULL ,
        comment Varchar (255) NOT NULL
	,CONSTRAINT fields_PK PRIMARY KEY (id)
)ENGINE=InnoDB;


-- ------------------------------------------------------------
--  Table: users
-- ------------------------------------------------------------

CREATE TABLE users(
        id             Int  Auto_increment  NOT NULL ,
        surname        Varchar (40) NOT NULL ,
        firstname      Varchar (40) NOT NULL ,
        pseudo         Varchar (40) NOT NULL ,
        phoneNumber    Varchar (15) NOT NULL ,
        email          Varchar (100) NOT NULL ,
        password       Varchar (25) NOT NULL ,
        admin          Bool NOT NULL ,
        userActivated  Bool NOT NULL ,
        adminActivated Bool NOT NULL
	,CONSTRAINT users_PK PRIMARY KEY (id)
)ENGINE=InnoDB;


-- ------------------------------------------------------------
--  Table: news
-- ------------------------------------------------------------

CREATE TABLE news(
        id          Int  Auto_increment  NOT NULL ,
        title       Varchar (20) NOT NULL ,
        Information Varchar (255) NOT NULL ,
        date        Date NOT NULL
	,CONSTRAINT news_PK PRIMARY KEY (id)
)ENGINE=InnoDB;


-- ------------------------------------------------------------
--  Table: teams
-- ------------------------------------------------------------

CREATE TABLE teams(
        id       Int  Auto_increment  NOT NULL ,
        name     Varchar (40) NOT NULL ,
        id_users Int
	,CONSTRAINT teams_PK PRIMARY KEY (id)

	,CONSTRAINT teams_users_FK FOREIGN KEY (id_users) REFERENCES users(id)
)ENGINE=InnoDB;


-- ------------------------------------------------------------
--  Table: books
-- ------------------------------------------------------------

CREATE TABLE books(
        id            Int NOT NULL ,
        id_users      Int NOT NULL ,
        dateTime      Datetime NOT NULL ,
        idLocalTeam   TinyINT NOT NULL ,
        idVisitorTeam TinyINT NOT NULL
	,CONSTRAINT books_PK PRIMARY KEY (id,id_users)

	,CONSTRAINT books_fields_FK FOREIGN KEY (id) REFERENCES fields(id)
	,CONSTRAINT books_users0_FK FOREIGN KEY (id_users) REFERENCES users(id)
)ENGINE=InnoDB;

