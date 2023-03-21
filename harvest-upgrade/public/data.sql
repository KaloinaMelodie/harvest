CREATE TABLE `vulgarisateur` (
  `idVulgarisateur` int PRIMARY KEY AUTO_INCREMENT,
  `login` varchar(255),
  `mdp` timestamp,
  `nom` varchar(255),
  `prenom` varchar(255),
  `idProvince` int,
  `adresse` varchar(255),
  `ddn` date,
  `pdp` varchar(255)
);
INSERT INTO vulgarisateur values(null,"vulg1@harvest.mg","vulg1","Ravo","Tiana",1,"Ambohidratrimo","1988/02/11","vulg1");
INSERT INTO vulgarisateur values(null,"vulg2@harvest.mg","vulg2","Mino","Niaina",1,"Arivonimamo","1992/07/15","vulg2");
INSERT INTO vulgarisateur values(null,"vulg3@harvest.mg","vulg3","Nirina","Rakoto",2,"Belobaka","1981/02/11","vulg3");
INSERT INTO vulgarisateur values(null,"vulg4@harvest.mg","vulg4","Koloina","Lalaina",2,"Marovoay","1982/07/15","vulg4");
INSERT INTO vulgarisateur values(null,"vulg5@harvest.mg","vulg5","Faniry","Tiavo",3,"Toamasina","1995/02/11","vulg5");
INSERT INTO vulgarisateur values(null,"vulg6@harvest.mg","vulg6","Pierre","Rabe",3,"Toamasina","1969/07/15","vulg6");
INSERT INTO vulgarisateur values(null,"vulg7@harvest.mg","vulg7","Rakoto","Tiana",4,"Toliara","1977/02/11","vulg7");
INSERT INTO vulgarisateur values(null,"vulg8@harvest.mg","vulg8","Domoina","Niaina",4,"Toliara","1979/07/15","vulg8");
INSERT INTO vulgarisateur values(null,"vulg9@harvest.mg","vulg9","Sitraka","Rak",5,"Antsiranana","1989/12/03","vulg9");
INSERT INTO vulgarisateur values(null,"vulg10@harvest.mg","vulg10","Lucas","Aro",6,"Fianarantsoa","1995/11/02","vulg10");


CREATE TABLE `localisation_vulgarisateur` (
  `idLocalisation_vulgarisateur` int PRIMARY KEY AUTO_INCREMENT,
  `idVulgarisateur` int,
  `longitude` double,
  `latitude` double,
  `date` date
);

CREATE TABLE `activite` (
  `idActivite` int PRIMARY KEY AUTO_INCREMENT,
  `idVulgarisateur` int,
  `titre` text,
  `activite` text,
  `date` date
);

CREATE TABLE `publications` (
  `idpublications` int PRIMARY KEY AUTO_INCREMENT,
  `idVulgarisateur` int,
  `date` date,
  `photo` varchar(255),
  `texte` text
);

CREATE TABLE `agriculteur` (
  `idAgriculteur` int PRIMARY KEY AUTO_INCREMENT,
  `login` varchar(255),
  `mdp` varchar(255),
  `nom` varchar(255),
  `prenom` varchar(255),
  `adresse` varchar(255),
  `ddn` varchar(255),
  `pdp` varchar(255)
);

CREATE TABLE `appreciation` (
  `idVulgarisateur` int,
  `idAgriculteur` int,
  `note` int,
  `texte` text
);

CREATE TABLE `pays` (
  `idPays` int PRIMARY KEY AUTO_INCREMENT,
  `nomPays` varchar(255)
);

CREATE TABLE `carte` (
  `idPays` int,
  `photo` varchar(255)
);

CREATE TABLE `domaine` (
  `idDomaine` int PRIMARY KEY AUTO_INCREMENT,
  `nomDomaine` varchar(255)
);

CREATE TABLE `relVulgarisateur_domaine` (
  `idVulgarisateur` int,
  `idDomaine` int
);

CREATE TABLE `compteVIP` (
  `idVIP` int PRIMARY KEY AUTO_INCREMENT,
  `login` varchar(255),
  `mdp` varchar(255)
);

CREATE TABLE `chat` (
  `idChat` int PRIMARY KEY AUTO_INCREMENT,
  `idVulgarisateur` int,
  `idAgriculteur` int,
  `texte` text
);

CREATE TABLE `reaction` (
  `idReaction` int PRIMARY KEY AUTO_INCREMENT,
  `photoGIF` varchar(255)
);

CREATE TABLE `reactionpublications` (
  `idpublications` int,
  `idAgriculteur` int,
  `idReaction` int
);

ALTER TABLE `vulgarisateurs` ADD FOREIGN KEY (`idProvince`) REFERENCES `provinces` (`idProvince`);

ALTER TABLE `localisation_vulgarisateur` ADD FOREIGN KEY (`idVulgarisateur`) REFERENCES `vulgarisateur` (`idVulgarisateur`);

ALTER TABLE `activite` ADD FOREIGN KEY (`idVulgarisateur`) REFERENCES `vulgarisateur` (`idVulgarisateur`);

ALTER TABLE `publications` ADD FOREIGN KEY (`idVulgarisateur`) REFERENCES `vulgarisateur` (`idVulgarisateur`);

ALTER TABLE `appreciation` ADD FOREIGN KEY (`idVulgarisateur`) REFERENCES `vulgarisateur` (`idVulgarisateur`);

ALTER TABLE `appreciation` ADD FOREIGN KEY (`idAgriculteur`) REFERENCES `vulgarisateur` (`idVulgarisateur`);

ALTER TABLE `carte` ADD FOREIGN KEY (`idPays`) REFERENCES `pays` (`idPays`);

ALTER TABLE `relVulgarisateur_domaine` ADD FOREIGN KEY (`idVulgarisateur`) REFERENCES `vulgarisateur` (`idVulgarisateur`);

ALTER TABLE `relVulgarisateur_domaine` ADD FOREIGN KEY (`idDomaine`) REFERENCES `domaine` (`idDomaine`);

ALTER TABLE `chat` ADD FOREIGN KEY (`idVulgarisateur`) REFERENCES `vulgarisateur` (`idVulgarisateur`);

ALTER TABLE `chat` ADD FOREIGN KEY (`idAgriculteur`) REFERENCES `agriculteur` (`idAgriculteur`);

ALTER TABLE `reactionpublications` ADD FOREIGN KEY (`idpublications`) REFERENCES `publications` (`idpublications`);

ALTER TABLE `reactionpublications` ADD FOREIGN KEY (`idAgriculteur`) REFERENCES `agriculteur` (`idAgriculteur`);

ALTER TABLE `reactionpublications` ADD FOREIGN KEY (`idReaction`) REFERENCES `reaction` (`idReaction`);


INSERT INTO publications values(null,1,"2021/02/01","pub1","ce publications est un test.");