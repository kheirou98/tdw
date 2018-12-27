CREATE DATABASE tdw;
USE tdw;
CREATE TABLE typeFormation
(
    id int primary key AUTO_INCREMENT,
    nom varchar(30) UNIQUE,
    volumeHorraire int,
    prixht real,
    taux real
);

CREATE TABLE formation
(
    id int primary key AUTO_INCREMENT,
    nom varchar(30) UNIQUE,
    typeFormationId int,
    foreign key (typeFormationId) references type_formation(id)
);

insert into typeFormation (id,nom,volumeHorraire,prixht,taux) values (1,"Bureautique",12,9000,17);
insert into typeFormation (id,nom,volumeHorraire,prixht,taux) values (2,"Infographie",14,12000,17);
insert into typeFormation (id,nom,volumeHorraire,prixht,taux) values (3,"Langues",10,12000,0);
insert into typeFormation (id,nom,volumeHorraire,prixht,taux) values (4,"Management",12,22000,19);
insert into typeFormation (id,nom,volumeHorraire,prixht,taux) values (5,"Comptabilité",12,15000,19);
insert into formation (nom,typeFormationId) values ("Word",1);
insert into formation (nom,typeFormationId) values ("Excel",1);
insert into formation (nom,typeFormationId) values ("Powerpoint",1);
insert into formation (nom,typeFormationId) values ("Francais",3);
insert into formation (nom,typeFormationId) values ("Anglais",3);


