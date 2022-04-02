
use VAIKSASI;

create TABLE Utilisateur (
    idUser int not null AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(150)NOT NULL,
    prenom varchar(150) NOT NULL,
    email VARCHAR(150) NOT NULL UNIQUE,
    contact varchar(20) NOT NULL UNIQUE,
    sexe varchar(2) not null default 'M',
    dateDeNaissance date not null ,
    adresse varchar(250) not null,
        CIN varchar(250) not null
);
create TABLE Connexion(
    idConnexion int not null AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(150) NOT NULL UNIQUE,
    contact varchar(20) NOT NULL UNIQUE,
    mdp varchar(250) NOT NULL
);
insert into Connexion VALUES (null,'koto@gmail.com','0323232232',sha1('bobo'));
create table BqUtilisateur (
    idBQU int not null AUTO_INCREMENT PRIMARY KEY,
    idUser int NOT NULL,
    montant float not null default 0,
    retrait float not null default 0,
    depot float not null default 0,
    dateUp date not null,
    foreign KEY(idUser) REFERENCES Utilisateur(idUser)
);
alter table BqUtilisateur modify column dateUp DATETIME;
create TABLE compteBQ(
    idBQ int not null AUTO_INCREMENT PRIMARY KEY,
    montant float not null default 0,
    depot float not null default 0,
    dateUp date not null
);
create table TypeAnnonces (
    idTypeA int not null AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(100) not null UNIQUE
);
create table CategorieVoitures (
    idCategories int not null AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(100) not NULL unique
);
create table ProduitsVoiture (
    idProduitsV int not null AUTO_INCREMENT PRIMARY KEY,
    idUser int NOT NULL,
    idType int not null,
    idCategorie int not null ,
    nom varchar(150) not null,
    anne int not null,
    places int not null,
    descriptionPlus varchar(250) not null ,
    prix float not null ,
    disponibilite int not null DEFAULT 1,
    foreign KEY(idUser) REFERENCES Utilisateur(idUser),
    foreign key(idType) REFERENCES TypeAnnonces(idTypeA),
    foreign key(idCategorie) REFERENCES CategorieVoitures(idCategories)
);
create table imageProduit(
    id int not null auto_increment primary key ,
    idProduitsV int not null,
    pathImage varchar(250) not null,
    foreign key(idProduitsV) REFERENCES ProduitsVoiture(idProduitsV)
);

create table Panier (
    idUser int NOT NULL,
    idProduitsV int NOT NULL,
    prixAchat float not null ,
    valider int not null DEFAULT 0,
    foreign KEY(idUser) REFERENCES Utilisateur(idUser),
    foreign KEY(idProduitsV) REFERENCES ProduitsVoiture(idProduitsV)
);
alter TABLE Panier add nombre int default 1;
alter TABLE Panier MODIFY column idProduits int not null unique;

insert into typeAnnonces values(null,'vente');
insert into typeAnnonces values(null,'location');

insert into categorievoitures values(null,'citadine');
insert into categorievoitures values(null,'coupé');
insert into categorievoitures values(null,'berline');
insert into categorievoitures values(null,'break');
insert into categorievoitures values(null,'SUV');
insert into categorievoitures values(null,'Monospace');
insert into categorievoitures values(null,'Cabriolet');

insert into utilisateur values(null,'rakoto','jean','koto@gmail.com','0323232232','M','2001-12-12','ivato','000000000000');
insert into utilisateur values(null,'alfred','von','al@gmail.com','03231616598','M','2001-12-12','ivato','000000000000');
insert into utilisateur values(null,'Bat','Man','bat@gmail.com','03333333333','M','2001-12-12','ivato','000000000000');
insert into utilisateur values(null,'Rob','Bin','Rob@gmail.com','0343433434','M','2001-12-12','ivato','000000000000');



insert into produitsVoiture values(null,'1','1','1','Hyundai Atos','2007','5','Fiara tsara kely sady mitsitsy mety tsara ho ana madama','18000000','1');
insert into produitsVoiture values(null,'1','2','2','peugeot 504 coupé','1973','4','Voiture de collection tsara be. Devoir tsisy, papiers à jour tsara tonga dia mande.','15000000','1');
insert into produitsVoiture values(null,'2','1','3','peugeot 504','1973','5','Fiara mbola tsara fa amidy fotsiny satri mibahana tanàna','5000000','1');
insert into produitsVoiture values(null,'3','1','4','404 familial','1970','8','Natao ho an fianakaviana','3000000','1');
insert into produitsVoiture values(null,'4','2','5','VW Touareg','2009','5','Ho anao nahazo vola tao am Antares, ito misy touareg tonga d tsara be.','20000000','1');
insert into produitsVoiture values(null,'3','2','6','renault espace','2003','7','Voiture familiale pour toute la famille.','7000000','1');
insert into produitsVoiture values(null,'4','2','7','BMW Z4','2003','2','Voiture sportive, faible kilometrage','60000000','1');

insert into imageProduit values(null,'1','atos1.jpg');
insert into imageProduit values(null,'1','atos2.jpg');
insert into imageProduit values(null,'2','504.jpg');
insert into imageProduit values(null,'2','5042.jpg');
insert into imageProduit values(null,'4','404fam1.jpg');
insert into imageProduit values(null,'4','404fam2.jpg');
insert into imageProduit values(null,'3','504tsotra1.jpg');
insert into imageProduit values(null,'3','504tsotra2.jpg');
insert into imageProduit values(null,'5','touareg1.jpg');
insert into imageProduit values(null,'5','touareg2.jpg');
insert into imageProduit values(null,'6','espace1.jpg');
insert into imageProduit values(null,'6','espace2.jpg');
insert into imageProduit values(null,'7','z41.jpg');
insert into imageProduit values(null,'7','z42.jpg');


create or replace view carDetails as select ProduitsVoiture.*,imageProduit.id as idImg,imageProduit.pathImage as imgName,typeAnnonces.nom as annonce,Utilisateur.nom as nomProprio,categorievoitures.nom as categorie from ProduitsVoiture,imageProduit,Utilisateur,typeAnnonces,categorievoitures
 where ProduitsVoiture.idUser=Utilisateur.idUser
    and ProduitsVoiture.idType=typeAnnonces.idTypeA
    and ProduitsVoiture.idCategorie=categorievoitures.idCategories
    and ProduitsVoiture.idProduitsV=imageProduit.idProduitsV
    and ProduitsVoiture.disponibilite=1
     group by ProduitsVoiture.idProduitsV;


create table CodePayement(
    idCodePayement int NOT NULL auto_increment primary key,
    idUser int Not Null,
    validationCode varchar(16),
    montantVerse int,
    foreign key(idUser) references Utilisateur(idUser)
);


/*Triggers */

Delimiter $$

create Trigger after_BqUtilisateur_update
before update
on BqUtilisateur for each row
begin
    New.dateUp = now();
end$$

Delimiter ;

create view produitDetail as  select pathImage,produitsVoiture.idProduitsV,Utilisateur.idUser,Utilisateur.nom as nomUser,Utilisateur.prenom as prenomUser,idType,idCategorie,ProduitsVoiture.nom as nomVoiture,anne,places,descriptionPlus,prix,disponibilite,CategorieVoitures.nom as nomCategorie from ProduitsVoiture join imageProduit on imageProduit.idProduitsV=ProduitsVoiture.idProduitsV join Utilisateur on Utilisateur.idUser=ProduitsVoiture.idUser join CategorieVoitures on CategorieVoitures.idCategories=ProduitsVoiture.idCategorie where disponibilite=1 group by produitsVoiture.idproduitsv;

create table imageUtilisateur(
    id int not null auto_increment primary key ,
    idUser int,
    image VARCHAR(200),
    foreign KEY(idUser) REFERENCES Utilisateur(idUser)
);

insert into imageUtilisateur values(null,1,'Capture.png');

create view imagePerso as
    select Utilisateur.idUser as idUser,nom,prenom,email,contact,sexe,dateDeNaissance,adresse,image from Utilisateur
        join imageUtilisateur on Utilisateur.idUser=imageUtilisateur.idUser;

Create view statistique as SELECT ProduitsVoiture.idProduitsV,ProduitsVoiture.idUser,ProduitsVoiture.idType,ProduitsVoiture.idCategorie,ProduitsVoiture.nom as nomVoiture,ProduitsVoiture.anne,ProduitsVoiture.places,ProduitsVoiture.descriptionPlus,ProduitsVoiture.disponibilite,CategorieVoitures.nom as nomCategorie,TypeAnnonces.nom as nomTypeAnnonces,Panier.prixAchat,Panier.valider 
                from ProduitsVoiture join CategorieVoitures on ProduitsVoiture.idCategorie=CategorieVoitures.idCategories 
                join TypeAnnonces on ProduitsVoiture.idType=TypeAnnonces.idTypeA 
                join Panier on ProduitsVoiture.idProduitsV=Panier.idProduitsV;

insert into Panier values(1,1,18000000,0,2);
insert into Panier values(1,2,15000000,0,2);
insert into Panier values(1,3,5000000,0,2);
