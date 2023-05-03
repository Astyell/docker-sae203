-- Cas      : Pokemon
-- Auteur   : LEBARON Alizéa, DUFOUR Marc, BONDU Justine, NJANJA Ashanti
-- Date     : Vendredi 02 Mai 2023

CREATE DATABASE pkmn;

DROP TABLE IF EXISTS EtreType;
DROP TABLE IF EXISTS PKMN_EGG;
DROP TABLE IF EXISTS Pokemon;
DROP TABLE IF EXISTS Types;
DROP TABLE IF EXISTS Oeuf;


CREATE TABLE Pokemon
(
   PKMN_ID INT AUTO_INCREMENT,
   PKMN_Nom_FR VARCHAR(100) ,
   PKMN_Evolution BOOLEAN default 1,
   PKMN_Legendaire BOOLEAN,
   PKMN_Taille FLOAT,
   PKMN_Poids FLOAT,
   PKMN_Sprite TEXT,
   PKMN_Couleur VARCHAR(50) ,
   PRIMARY KEY(PKMN_ID)
);

CREATE TABLE Types
(
   Types_ID INT AUTO_INCREMENT,
   Types_Nom_FR VARCHAR(50) ,
   PRIMARY KEY(Types_ID)
);

CREATE TABLE Oeuf
(
   EGG_ID INT AUTO_INCREMENT,
   EGG_Nom_FR VARCHAR(50),
   PRIMARY KEY(EGG_ID)
);

CREATE TABLE EtreType
(
   PKMN_ID INT,
   Types_ID INT,
   PRIMARY KEY(PKMN_ID, Types_ID),
   FOREIGN KEY(PKMN_ID) REFERENCES Pokemon(PKMN_ID),
   FOREIGN KEY(Types_ID) REFERENCES Types(Types_ID)
);

CREATE TABLE PKMN_EGG
(
   EGG_ID INT,
   PKMN_ID INT,
   PRIMARY KEY(EGG_ID, PKMN_ID),
   FOREIGN KEY(PKMN_ID) REFERENCES Pokemon(PKMN_ID),
   FOREIGN KEY(EGG_ID) REFERENCES Oeuf(EGG_ID)
);