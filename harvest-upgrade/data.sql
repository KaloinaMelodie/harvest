drop database harvest;
create database harvest;
\c harvest
CREATE TABLE vulgarisateurs (
  idVulgarisateur serial PRIMARY KEY,
  idDomaine int,
  login varchar(255),
  mdp varchar(255),
  parcoursAcademique text,
  formation text,
  experiencePro text,
  nom varchar(255),
  prenom varchar(255),
  adresse varchar(255),
  ddn date,
  pdp varchar(255),
  contact varchar(50)
);


CREATE TABLE localisation_vulgarisateurs (
  idLocalisation_vulgarisateur serial PRIMARY KEY,
  idVulgarisateur int,
  longitude double precision,
  latitude double precision,
  date date
);

CREATE TABLE activites (
  idActivite serial PRIMARY KEY,
  idVulgarisateur int,
  titre text,
  activite text,
  date date
);

CREATE TABLE publications (
  idPublication serial PRIMARY KEY,
  idVulgarisateur int,
  date date,
  photo varchar(255),
  texte text
);

CREATE TABLE agriculteurs (
  idAgriculteur serial PRIMARY KEY,
  login varchar(255),
  mdp varchar(255),
  nom varchar(255),
  prenom varchar(255),
  adresse varchar(255),
  ddn varchar(255),
  pdp varchar(255),
  contact varchar(255)
);


CREATE TABLE appreciations (
  idVulgarisateur int,
  idAgriculteur int,
  note int,
  texte text
);

CREATE TABLE pays (
  idPays serial PRIMARY KEY,
  nomPays varchar(255)
);

CREATE TABLE cartes (
  idPays int,
  photo varchar(255)
);

CREATE TABLE domaines (
  idDomaine serial PRIMARY KEY,
  nomDomaine varchar(255)
);

CREATE TABLE relVulgarisateur_domaines (
  idVulgarisateur int,
  idDomaine int
);

CREATE TABLE vips (
  idVIP serial PRIMARY KEY,
  login varchar(255),
  mdp varchar(255)
);

CREATE TABLE chats (
  idChat serial PRIMARY KEY,
  idVulgarisateur int,
  idAgriculteur int,
  texte text,
  sender char(1)
);

CREATE TABLE reactions (
  idReaction serial PRIMARY KEY,
  photoGIF varchar(255)
);

CREATE TABLE reactionPublications (
  idPublication int,
  idAgriculteur int,
  idReaction int
);


ALTER TABLE vulgarisateurs ADD FOREIGN KEY (idDomaine) REFERENCES domaines (idDomaine);

ALTER TABLE localisation_vulgarisateurs ADD FOREIGN KEY (idVulgarisateur) REFERENCES vulgarisateurs (idVulgarisateur);

ALTER TABLE activites ADD FOREIGN KEY (idVulgarisateur) REFERENCES vulgarisateurs (idVulgarisateur);

ALTER TABLE publications ADD FOREIGN KEY (idVulgarisateur) REFERENCES vulgarisateurs (idVulgarisateur);

ALTER TABLE appreciations ADD FOREIGN KEY (idVulgarisateur) REFERENCES vulgarisateurs (idVulgarisateur);

ALTER TABLE appreciations ADD FOREIGN KEY (idAgriculteur) REFERENCES vulgarisateurs (idVulgarisateur);

ALTER TABLE cartes ADD FOREIGN KEY (idPays) REFERENCES pays (idPays);

ALTER TABLE relVulgarisateur_domaines ADD FOREIGN KEY (idVulgarisateur) REFERENCES vulgarisateurs (idVulgarisateur);

ALTER TABLE relVulgarisateur_domaines ADD FOREIGN KEY (idDomaine) REFERENCES domaines (idDomaine);

ALTER TABLE chats ADD FOREIGN KEY (idVulgarisateur) REFERENCES vulgarisateurs (idVulgarisateur);

ALTER TABLE chats ADD FOREIGN KEY (idAgriculteur) REFERENCES agriculteurs (idAgriculteur);

ALTER TABLE reactionPublications ADD FOREIGN KEY (idPublication) REFERENCES publications (idPublication);

ALTER TABLE reactionPublications ADD FOREIGN KEY (idAgriculteur) REFERENCES agriculteurs (idAgriculteur);

ALTER TABLE reactionPublications ADD FOREIGN KEY (idReaction) REFERENCES reactions (idReaction);

select  max(lv.idLocalisation_vulgarisateur), v.idVulgarisateur, lv.longitude, lv.latitude, v.nom, v.prenom, v.contact, d.nomDomaine
        from localisation_vulgarisateurs lv
        join relVulgarisateur_domaines rvd on rvd.idVulgarisateur=lv.idVulgarisateur
        join domaines d on d.idDomaine=rvd.idDomaine
        join vulgarisateurs v on v.idVulgarisateur=lv.idVulgarisateur
        group by v.idVulgarisateur, lv.longitude, lv.latitude, v.nom, v.prenom, v.contact, d.nomDomaine;

insert into domaines values (default, 'Elevage'),
                            (default, 'Peche'),
                            (default, 'Culture');

INSERT INTO vips values (default, 'vip@vip.vip', 'vip');

INSERT INTO vulgarisateurs values (default,1,'vulg1@harvest.mg','vulg1','IT University','Hackathon','ioT','Nirina','Rabe','Ambovombe','1978-01-01','avatar.png', '+261 34 46 456 14'),
                                  (default,1,'vulg2@harvest.mg','vulg2','IT University','Hackathon','ioT','Rakoto','Jean','Analakely','1960-02-02','logo.png', '+261 76 46 237 67'),
                                  (default,2,'vulg3@harvest.mg','vulg3','IT University','Hackathon','ioT','John','Gasy','Anosy','1988-03-03','person_1.png', '+261 34 97 672 81'),
                                  (default,2,'vulg4@harvest.mg','vulg4','IT University','Hackathon','ioT','Niry','Lova','Antany','1981-04-04','person_2.png', '+261 34 87 783 57'),
                                  (default,2,'vulg5@harvest.mg','vulg5','IT University','Hackathon','ioT','Vony','Ny','Andrano','1992-05-05','person_3.png', '+261 34 45 741 27'),
                                  (default,3,'vulg6@harvest.mg','vulg6','IT University','Hackathon','ioT','Rabe','Nia','Andrano','1992-05-05','person_4.png', '+261 34 45 741 27'),
                                  (default,1,'vulg7@harvest.mg','vulg7','IT University','Hackathon','ioT','Koto','Be','Ambovombe','1978-01-01','person_profile.png', '+261 34 46 456 14'),
                                  (default,1,'vulg8@harvest.mg','vulg8','IT University','Hackathon','ioT','Soa','Ny','Analakely','1960-02-02','profile.png', '+261 76 46 237 67'),
                                  (default,2,'vulg9@harvest.mg','vulg9','IT University','Hackathon','ioT','Eric','Manuel','Anosy','1988-03-03','avatar.png', '+261 34 97 672 81'),
                                  (default,2,'vulg10@harvest.mg','vulg10','IT University','Hackathon','ioT','Avo','Tiana','Antany','1981-04-04','avatar.png', '+261 34 87 783 57'),
                                  (default,2,'vulg11@harvest.mg','vulg11','IT University','Hackathon','ioT','Aro','Rova','Andrano','1992-05-05','avatar.png', '+261 34 45 741 27'),
                                  (default,3,'vulg12@harvest.mg','vulg12','IT University','Hackathon','ioT','Tojo','Rojo','Andrano','1992-05-05','avatar.png', '+261 34 45 741 27');

INSERT INTO localisation_vulgarisateurs values  (default, 1, 47, -18, '2021-05-16');
INSERT INTO localisation_vulgarisateurs values  (default, 2, 46, -19, '2021-05-16');
 INSERT INTO localisation_vulgarisateurs values (default, 3, 48, -20, '2021-05-16');
 INSERT INTO localisation_vulgarisateurs values (default, 4, 46, -17, '2021-05-16');
INSERT INTO localisation_vulgarisateurs values  (default, 5, 47, -16, '2021-05-16');
 INSERT INTO localisation_vulgarisateurs values (default, 6, 48, -21, '2021-05-16');
 INSERT INTO localisation_vulgarisateurs values (default, 7, 46, -20, '2021-05-16');
INSERT INTO localisation_vulgarisateurs values  (default, 8, 47, -19, '2021-05-16');
 INSERT INTO localisation_vulgarisateurs values (default, 9, 48, -18, '2021-05-16');
INSERT INTO localisation_vulgarisateurs values  (default, 10, 46, -21, '2021-05-16');
 INSERT INTO localisation_vulgarisateurs values (default, 11, 48, -16, '2021-05-16');
                                               

insert into agriculteurs values (default,'agr1@harvest.mg','agr1','agriculteur1','agriculteur1','agr1','1998-01-01','avatar.png','+2613212345'),
                                (default,'agr2@harvest.mg','agr2','agriculteur2','agriculteur2','agr2','1998-01-01','avatar.png','+2613212345'),
                                (default,'agr3@harvest.mg','agr3','agriculteur3','agriculteur3','agr3','1998-01-01','avatar.png','+2613212345'),
                                (default,'agr4@harvest.mg','agr4','agriculteur4','agriculteur4','agr4','1998-01-01','avatar.png','+2613212345'),
                                (default,'agr5@harvest.mg','agr5','agriculteur5','agriculteur5','agr5','1998-01-01','avatar.png','+2613212345');

  insert into relVulgarisateur_domaines values  (1, 1),
                                                (2, 2),
                                                (3, 3),
                                                (4, 1),
                                                (5, 2),
                                                (6, 3),
                                                (7, 1),
                                                (8, 2),
                                                (9, 3),
                                                (10, 1),
                                                (11, 2),
                                                (12, 3);

insert into domaines values (default,'horiculture'),
                            (default,'pisciculture'),
                            (default,'viticulture');

insert into chats values  (default, 1, 1, 'texte lorem impsum', 'v'),
                          (default, 1, 1, 'texte 1 lorem impsum', 'a'),
                          (default, 3, 1, 'text1 sd f sdf dasf asd fasd f sd f', 'v'),
                          (default, 3, 1, 'text1 1 sd f sdf dasf asd fasd f sd f', 'a'),
                          (default, 3, 2, 'text2 sd f sdf dasf asd fasd f sd f', 'v'),
                          (default, 3, 2, 'text2 2 sd f sdf dasf asd fasd f sd f', 'a'),
                          (default, 3, 3, 'text3 sd f sdf dasf asd fasd f sd f', 'v'),
                          (default, 3, 3, 'text3 3 sd f sdf dasf asd fasd f sd f', 'a'),
                          (default, 3, 4, 'text4 sd f sdf dasf asd fasd f sd f', 'v'),
                          (default, 3, 4, 'text4 4 sd f sdf dasf asd fasd f sd f', 'a'),
                          (default, 3, 5, 'text5 sd f sdf dasf asd fasd f sd f', 'v'),
                          (default, 3, 5, 'text5 5 sd f sdf dasf asd fasd f sd f', 'a');

select  *
        from Vulgarisateurs v
        where v.idVulgarisateur=1;

select  lv.longitude as longitude,lv.latitude as latitude
        from localisation_vulgarisateurs lv
        join Vulgarisateurs v on lv.idVulgarisateur = v.idVulgarisateur 
        where v.idVulgarisateur=1;

select  v.idVulgarisateur as idVulgarisateur, nom, prenom, adresse, contact, pdp, login, lv.longitude as longitude,lv.latitude as latitude
        from Vulgarisateurs v
        join localisation_vulgarisateurs lv on lv.idVulgarisateur = v.idVulgarisateur 
        where v.idVulgarisateur=1;