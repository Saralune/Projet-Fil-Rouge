create database parc_couture;
use parc_couture;

create table utilisateur_connecte(
	id_utilisateur int auto_increment primary key not null,
    nom_utilisateur varchar (50),
    prenom_utilisateur varchar (50),
    mail_utilisateur varchar (50),
    rue_utilisateur varchar (50),
    code_postal_utilisateur varchar (50),
    ville_utilisateur varchar (50),
    telephone_utilisateur int,
    identifiant_utilisateur varchar (50),
    mdp_utilisateur varchar (50)
);

create table administrateur(
	id_admin int auto_increment primary key not null,
	nom_admin varchar(50),
    prenom_admin varchar(50),
    mail_admin varchar(50),
    identifiant_admin varchar(50),
    mdp_admin varchar(50)
);

create table atelier(
	id_atelier int auto_increment primary key not null,
    nom_atelier varchar(50),
    date_atelier varchar(50),
    animateur_atelier varchar(50),
    prix_atelier int
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