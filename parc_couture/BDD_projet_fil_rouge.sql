create database parc_couture;
use parc_couture;

create table utilisateur_connecte(
	id_user int auto_increment primary key not null,
    nom_user varchar (50),
    prenom_user varchar (50),
    mail_user varchar (50),
    rue_user varchar (50),
    cp_user int(5) unsigned zerofill,
    ville_user varchar (50),
    tel_user int(10) unsigned zerofill,
    identifiant_user varchar (50),
    mdp_user varchar (255),
    admin tinyint default 0
);

create table atelier(
	id_atelier int auto_increment primary key not null,
    nom_atelier varchar (50),
    date_atelier varchar(50),
    description_atelier longtext,
    prix_atelier int,
    animateur_atelier varchar (50),
    places_atelier int,
    id_user int,
	CONSTRAINT fk_IdUser 
    FOREIGN KEY (id_user) 
    REFERENCES utilisateur_connecte(id_user)
);

alter table atelier
add constraint fk_IdUser
foreign key (id_user)
references utilisateur_connecte(id_user);

alter table atelier
modify column description_atelier longtext;

create table administrateur(
	id_admin int auto_increment primary key not null,
	nom_admin varchar(50),
    prenom_admin varchar(50),
    mail_admin varchar(50),
    identifiant_admin varchar(50),
    mdp_admin varchar(50),
    id_user int
);

create table commentaire(
	id_commentaire int auto_increment primary key not null,
    contenu_commentaire varchar(50),
    approbation_commentaire bool
);

create table categorie(
	id_categorie int auto_increment primary key not null,
    nom_categorie varchar(50)
);

create table article(
	id_article int auto_increment primary key not null,
    nom_article varchar(50),
    contenu_article varchar(50)
);

create table commande(
	id_commande int auto_increment primary key not null,
    date_commande date,
    reglement_commande bool
);

create table video(
	id_video int auto_increment primary key not null,
    nom_video varchar(50),
    legende_video varchar(50)
);

create table sondage(
	id_sondage int auto_increment primary key not null,
    note_q1_sondage int(1),
    note_q2_sondage varchar (50),
    note_q3_sondage varchar(250),
    note_q4_sondage varchar (50),
    note_q5_sondage varchar(250)
);