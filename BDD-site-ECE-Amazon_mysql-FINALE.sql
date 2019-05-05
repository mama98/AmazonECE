CREATE TABLE `Vetements` (
	`id_vetement` INT NOT NULL,
	`taille` varchar(255) NOT NULL DEFAULT 'Taille Unique',
	`couleur` varchar(255) NOT NULL DEFAULT 'Unique',
	`sexe` varchar(255) NOT NULL DEFAULT 'Non spécifié',
	PRIMARY KEY (`id_vetement`)
);

CREATE TABLE `Items` (
	`id_item` INT NOT NULL AUTO_INCREMENT,
	`nom_item` varchar(255) NOT NULL,
	`prix_item` varchar(255) NOT NULL,
	`categorie` INT(4) NOT NULL,
	`numero_vendeur` INT NOT NULL,
	`quantite` INT,
	`description_item` varchar(255) NOT NULL,
	`photo_list` varchar(255),
	`video_name` varchar(255),
	`nb_vendu` INT,
	PRIMARY KEY (`id_item`)
);

CREATE TABLE `Livres` (
	`id_livre` INT NOT NULL,
	`auteur` varchar(255) NOT NULL,
	`annee` INT(4) NOT NULL,
	`edition` varchar(255) NOT NULL,
	PRIMARY KEY (`id_livre`)
);

CREATE TABLE `Utilisateur` (
	`id_utilisateur` INT NOT NULL AUTO_INCREMENT,
	`prenom_utilisateur` varchar(255) NOT NULL,
	`nom_utilisateur` varchar(255) NOT NULL,
	`email_utilisateur` varchar(255) NOT NULL UNIQUE,
	`login_utilisateur` varchar(255) NOT NULL UNIQUE,
	`mdp_utilisateur` varchar(255) NOT NULL,
	PRIMARY KEY (`id_utilisateur`)
);

CREATE TABLE `Vendeur` (
	`id_vendeur` INT NOT NULL,
	`IBAN_vendeur` varchar(27) NOT NULL,
	`photo_vendeur` varchar(255),
	`fond_vendeur` varchar(255),
	PRIMARY KEY (`id_vendeur`)
);

CREATE TABLE `Acheteur` (
	`id_acheteur` INT NOT NULL,
	`nom_acheteur` varchar(255) NOT NULL,
	`prenom_acheteur` varchar(255) NOT NULL,
	`adresseL1_acheteur` varchar(255) NOT NULL,
	`adresseL2_acheteur` varchar(255),
	`ville` varchar(255) NOT NULL,
	`codePostal` INT(5) NOT NULL,
	`pays` varchar(255) NOT NULL,
	`numTel` INT NOT NULL,
	`typeCarte` varchar(255) NOT NULL,
	`numCarte` INT(16) NOT NULL,
	`nomCarte` varchar(255) NOT NULL,
	`dateMois` INT NOT NULL,
	`dateAnnee` INT NOT NULL,
	`codeSecurite` INT(4) NOT NULL,
	PRIMARY KEY (`id_acheteur`)
);

CREATE TABLE `Musique` (
	`id_musique` INT NOT NULL,
	`auteur` varchar(255) NOT NULL,
	`annee` INT NOT NULL,
	`type` varchar(255) NOT NULL,
	PRIMARY KEY (`id_musique`)
);

CREATE TABLE `Sports_Loisirs` (
	`id_sportsLoisirs` INT NOT NULL,
	`typeSport` varchar(255) NOT NULL,
	`typeLoisirs` varchar(255) NOT NULL,
	PRIMARY KEY (`id_sportsLoisirs`)
);

CREATE TABLE `Panier` (
	`id_acheteur` INT NOT NULL,
	`id_item` INT NOT NULL,
	`quantite_voulu` INT NOT NULL,
	PRIMARY KEY (`id_acheteur`,`id_item`)
);

ALTER TABLE `Vetements` ENGINE = INNODB; 
ALTER TABLE `Livres` ENGINE = INNODB; 
ALTER TABLE `Vendeur` ENGINE = INNODB; 
ALTER TABLE `Acheteur` ENGINE = INNODB; 
ALTER TABLE `Musique` ENGINE = INNODB; 
ALTER TABLE `Sports_Loisirs` ENGINE = INNODB; 
ALTER TABLE `Panier` ENGINE = INNODB; 
ALTER TABLE `Items` ENGINE = INNODB; 
ALTER TABLE `Utilisateur` ENGINE = INNODB; 

ALTER TABLE `Vetements` ADD CONSTRAINT `Vetements_fk0` FOREIGN KEY (`id_vetement`) REFERENCES `Items`(`id_item`);

ALTER TABLE `Items` ADD CONSTRAINT `Items_fk0` FOREIGN KEY (`numero_vendeur`) REFERENCES `Vendeur`(`id_vendeur`);

ALTER TABLE `Livres` ADD CONSTRAINT `Livres_fk0` FOREIGN KEY (`id_livre`) REFERENCES `Items`(`id_item`);

ALTER TABLE `Vendeur` ADD CONSTRAINT `Vendeur_fk0` FOREIGN KEY (`id_vendeur`) REFERENCES `Utilisateur`(`id_utilisateur`);

ALTER TABLE `Acheteur` ADD CONSTRAINT `Acheteur_fk0` FOREIGN KEY (`id_acheteur`) REFERENCES `Utilisateur`(`id_utilisateur`);

ALTER TABLE `Musique` ADD CONSTRAINT `Musique_fk0` FOREIGN KEY (`id_musique`) REFERENCES `Items`(`id_item`);

ALTER TABLE `Sports_Loisirs` ADD CONSTRAINT `Sports_Loisirs_fk0` FOREIGN KEY (`id_sportsLoisirs`) REFERENCES `Items`(`id_item`);

ALTER TABLE `Panier` ADD CONSTRAINT `Panier_fk0` FOREIGN KEY (`id_acheteur`) REFERENCES `Acheteur`(`id_acheteur`);

ALTER TABLE `Panier` ADD CONSTRAINT `Panier_fk1` FOREIGN KEY (`id_item`) REFERENCES `Items`(`id_item`);

INSERT INTO Utilisateur(id_utilisateur, prenom_utilisateur, nom_utilisateur, email_utilisateur, login_utilisateur, mdp_utilisateur)
		VALUES (1, 'Neo', 'Admin', 'admin@edu.ece.fr', 'admin', 'admin');
INSERT INTO Vendeur(id_vendeur, IBAN_vendeur, photo_vendeur, fond_vendeur)
		VALUES (1, 'admin', 'admin.png', 'admin.png');
