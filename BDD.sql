-- --------------------------------------------------------
-- Hôte :                        127.0.0.1
-- Version du serveur:           5.7.26 - MySQL Community Server (GPL)
-- SE du serveur:                Win64
-- HeidiSQL Version:             10.1.0.5464
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Listage de la structure de la base pour wise
CREATE DATABASE IF NOT EXISTS `wise` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `wise`;

-- Listage de la structure de la table wise. action
CREATE TABLE IF NOT EXISTS `action` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `rythme_formation` varchar(3000) COLLATE latin1_general_ci NOT NULL,
  `niveaux_entree_obligatoire` int(11) NOT NULL,
  `modalite_alternance` varchar(3000) COLLATE latin1_general_ci NOT NULL,
  `modalite_enseignement` int(11) NOT NULL,
  `conditions_specifiques` varchar(3000) COLLATE latin1_general_ci NOT NULL,
  `possibilites_prises_charge` int(11) NOT NULL,
  `lieu_formation` int(11) NOT NULL,
  `modalite_entrees_sorties` int(11) NOT NULL,
  `formation` int(11) NOT NULL,
  `restauration` varchar(250) COLLATE latin1_general_ci DEFAULT NULL,
  `hebergement` varchar(250) COLLATE latin1_general_ci DEFAULT NULL,
  `transport` varchar(250) COLLATE latin1_general_ci DEFAULT NULL,
  `acces_handicapes` varchar(250) COLLATE latin1_general_ci DEFAULT NULL,
  `langue_formation` varchar(2) COLLATE latin1_general_ci DEFAULT NULL,
  `modalite_recrutement` varchar(3000) COLLATE latin1_general_ci NOT NULL,
  `modalite_pedagogique` varchar(200) COLLATE latin1_general_ci NOT NULL,
  `frais_restant` varchar(200) COLLATE latin1_general_ci DEFAULT NULL,
  `prix_total_ttc` int(11) NOT NULL,
  `duree_indicative` varchar(150) COLLATE latin1_general_ci DEFAULT NULL,
  `nombre_heures_centre` int(11) DEFAULT NULL,
  `nombre_heures_entreprise` int(11) DEFAULT NULL,
  `nombre_heures_total` int(11) DEFAULT NULL,
  `conditions_prise_charge` varchar(600) COLLATE latin1_general_ci NOT NULL,
  `conventionnement` int(11) DEFAULT NULL,
  `duree_conventionnee` int(11) DEFAULT NULL,
  `organisme_formateur` int(11) DEFAULT NULL,
  `financement_formation` varchar(45) COLLATE latin1_general_ci DEFAULT NULL,
  `nombre_places` int(11) DEFAULT NULL,
  `moyens_pedagogiques` varchar(45) COLLATE latin1_general_ci DEFAULT NULL,
  `responsable_enseignement` int(11) DEFAULT NULL,
  `heures_cours` float DEFAULT NULL,
  `heures_td` float DEFAULT NULL,
  `heures_tp_tuteur` float DEFAULT NULL,
  `heures_tp_non_tuteur` float DEFAULT NULL,
  `user_created` int(11) DEFAULT NULL,
  `user_updated` int(11) DEFAULT NULL,
  `date_created` date DEFAULT NULL,
  `date_updated` date DEFAULT NULL,
  `deleted` enum('1','0') COLLATE latin1_general_ci DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `FK_action_dict_boolean` (`niveaux_entree_obligatoire`),
  KEY `FK_action_dict_modalites_enseignement` (`modalite_enseignement`),
  KEY `FK_action_dict_boolean_2` (`possibilites_prises_charge`),
  KEY `FK_action_coordonnees` (`lieu_formation`),
  KEY `FK_action_dict_modalites_es` (`modalite_entrees_sorties`),
  KEY `FK_action_dict_boolean_3` (`conventionnement`),
  KEY `FK_action_organisme_formateur` (`organisme_formateur`),
  KEY `FK_action_coordonnees_2` (`responsable_enseignement`),
  KEY `FK_action_user` (`user_created`),
  KEY `FK_action_user_2` (`user_updated`),
  KEY `FK_action_formation` (`formation`),
  CONSTRAINT `FK_action_coordonnees` FOREIGN KEY (`lieu_formation`) REFERENCES `coordonnees` (`id`),
  CONSTRAINT `FK_action_coordonnees_2` FOREIGN KEY (`responsable_enseignement`) REFERENCES `coordonnees` (`id`),
  CONSTRAINT `FK_action_dict_boolean` FOREIGN KEY (`niveaux_entree_obligatoire`) REFERENCES `dict_boolean` (`id`),
  CONSTRAINT `FK_action_dict_boolean_2` FOREIGN KEY (`possibilites_prises_charge`) REFERENCES `dict_boolean` (`id`),
  CONSTRAINT `FK_action_dict_boolean_3` FOREIGN KEY (`conventionnement`) REFERENCES `dict_boolean` (`id`),
  CONSTRAINT `FK_action_dict_modalites_enseignement` FOREIGN KEY (`modalite_enseignement`) REFERENCES `dict_modalites_enseignement` (`id`),
  CONSTRAINT `FK_action_dict_modalites_es` FOREIGN KEY (`modalite_entrees_sorties`) REFERENCES `dict_modalites_es` (`id`),
  CONSTRAINT `FK_action_formation` FOREIGN KEY (`formation`) REFERENCES `formation` (`id`),
  CONSTRAINT `FK_action_organisme_formateur` FOREIGN KEY (`organisme_formateur`) REFERENCES `organisme_formateur` (`id`),
  CONSTRAINT `FK_action_user` FOREIGN KEY (`user_created`) REFERENCES `user` (`id`),
  CONSTRAINT `FK_action_user_2` FOREIGN KEY (`user_updated`) REFERENCES `user` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- Listage des données de la table wise.action : ~0 rows (environ)
DELETE FROM `action`;
/*!40000 ALTER TABLE `action` DISABLE KEYS */;
/*!40000 ALTER TABLE `action` ENABLE KEYS */;

-- Listage de la structure de la table wise. action_code
CREATE TABLE IF NOT EXISTS `action_code` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_code` int(11) DEFAULT '0',
  `id_action` int(11) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `FK_action_code_code` (`id_code`),
  KEY `FK_action_code_action` (`id_action`),
  CONSTRAINT `FK_action_code_action` FOREIGN KEY (`id_action`) REFERENCES `action` (`id`),
  CONSTRAINT `FK_action_code_code` FOREIGN KEY (`id_code`) REFERENCES `code` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- Listage des données de la table wise.action_code : ~0 rows (environ)
DELETE FROM `action_code`;
/*!40000 ALTER TABLE `action_code` DISABLE KEYS */;
/*!40000 ALTER TABLE `action_code` ENABLE KEYS */;

-- Listage de la structure de la table wise. action_organisme_financeur
CREATE TABLE IF NOT EXISTS `action_organisme_financeur` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_action` int(11) DEFAULT NULL,
  `id_organisme_financeur` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_action_organisme_financeur_action` (`id_action`),
  KEY `FK_action_organisme_financeur_organisme_financeur` (`id_organisme_financeur`),
  CONSTRAINT `FK_action_organisme_financeur_action` FOREIGN KEY (`id_action`) REFERENCES `action` (`id`),
  CONSTRAINT `FK_action_organisme_financeur_organisme_financeur` FOREIGN KEY (`id_organisme_financeur`) REFERENCES `organisme_financeur` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- Listage des données de la table wise.action_organisme_financeur : ~0 rows (environ)
DELETE FROM `action_organisme_financeur`;
/*!40000 ALTER TABLE `action_organisme_financeur` DISABLE KEYS */;
/*!40000 ALTER TABLE `action_organisme_financeur` ENABLE KEYS */;

-- Listage de la structure de la table wise. adresse
CREATE TABLE IF NOT EXISTS `adresse` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ligne 1` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `ligne 2` varchar(50) COLLATE latin1_general_ci DEFAULT NULL,
  `ligne 3` varchar(50) COLLATE latin1_general_ci DEFAULT NULL,
  `ligne 4` varchar(50) COLLATE latin1_general_ci DEFAULT NULL,
  `code_postal` int(11) DEFAULT NULL,
  `ville` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `departement` int(11) DEFAULT NULL,
  `code_INSEE_commune` int(11) DEFAULT NULL,
  `code_INSEE_canton` int(11) DEFAULT NULL,
  `region` int(11) DEFAULT NULL,
  `pays` int(11) DEFAULT NULL,
  `geolocalisation-latitude` varchar(30) COLLATE latin1_general_ci DEFAULT NULL,
  `geolocalisation-longitude` varchar(30) COLLATE latin1_general_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- Listage des données de la table wise.adresse : ~0 rows (environ)
DELETE FROM `adresse`;
/*!40000 ALTER TABLE `adresse` DISABLE KEYS */;
/*!40000 ALTER TABLE `adresse` ENABLE KEYS */;

-- Listage de la structure de la table wise. certification
CREATE TABLE IF NOT EXISTS `certification` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code_RNCP` int(11) DEFAULT NULL,
  `code_certif` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_certification_code` (`code_RNCP`),
  KEY `FK_certification_code_2` (`code_certif`),
  CONSTRAINT `FK_certification_code` FOREIGN KEY (`code_RNCP`) REFERENCES `code` (`id`),
  CONSTRAINT `FK_certification_code_2` FOREIGN KEY (`code_certif`) REFERENCES `code` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- Listage des données de la table wise.certification : ~0 rows (environ)
DELETE FROM `certification`;
/*!40000 ALTER TABLE `certification` DISABLE KEYS */;
/*!40000 ALTER TABLE `certification` ENABLE KEYS */;

-- Listage de la structure de la table wise. code
CREATE TABLE IF NOT EXISTS `code` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `value` varchar(5) COLLATE latin1_general_ci DEFAULT NULL,
  `type` enum('NSF','ROME','FORMACODE','RNCP','CERTIFINFO') COLLATE latin1_general_ci DEFAULT NULL,
  `attributs` varchar(3000) COLLATE latin1_general_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- Listage des données de la table wise.code : ~0 rows (environ)
DELETE FROM `code`;
/*!40000 ALTER TABLE `code` DISABLE KEYS */;
/*!40000 ALTER TABLE `code` ENABLE KEYS */;

-- Listage de la structure de la table wise. coordonnees
CREATE TABLE IF NOT EXISTS `coordonnees` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `civilite` varchar(150) COLLATE latin1_general_ci DEFAULT NULL,
  `nom` varchar(50) COLLATE latin1_general_ci DEFAULT NULL,
  `prenom` varchar(50) COLLATE latin1_general_ci DEFAULT NULL,
  `adresse` int(11) DEFAULT NULL,
  `tel_fixe` varchar(25) COLLATE latin1_general_ci DEFAULT NULL,
  `portable` varchar(25) COLLATE latin1_general_ci DEFAULT NULL,
  `fax` varchar(25) COLLATE latin1_general_ci DEFAULT NULL,
  `email` varchar(45) COLLATE latin1_general_ci DEFAULT NULL,
  `web` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_coordonnees_adresse` (`adresse`),
  CONSTRAINT `FK_coordonnees_adresse` FOREIGN KEY (`adresse`) REFERENCES `adresse` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- Listage des données de la table wise.coordonnees : ~6 rows (environ)
DELETE FROM `coordonnees`;
/*!40000 ALTER TABLE `coordonnees` DISABLE KEYS */;
INSERT INTO `coordonnees` (`id`, `civilite`, `nom`, `prenom`, `adresse`, `tel_fixe`, `portable`, `fax`, `email`, `web`) VALUES
	(1, NULL, 'Jean-Pierre', 'Berger', NULL, NULL, NULL, NULL, 'jp.berger@gmail.com', NULL),
	(2, NULL, 'Luc', 'Besson', NULL, NULL, NULL, NULL, 'luc.besson@gmail.com', NULL),
	(3, NULL, 'Patrick', 'Richard', NULL, NULL, NULL, NULL, NULL, NULL),
	(4, NULL, 'Olivier', 'DuMoulin', NULL, NULL, NULL, NULL, NULL, NULL),
	(5, NULL, 'Loic', 'Barbier', NULL, NULL, NULL, NULL, NULL, NULL),
	(6, NULL, 'Graves', 'Willsonn', NULL, NULL, NULL, NULL, NULL, NULL);
/*!40000 ALTER TABLE `coordonnees` ENABLE KEYS */;

-- Listage de la structure de la table wise. dict_ais
CREATE TABLE IF NOT EXISTS `dict_ais` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `val` varchar(50) COLLATE latin1_general_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- Listage des données de la table wise.dict_ais : ~2 rows (environ)
DELETE FROM `dict_ais`;
/*!40000 ALTER TABLE `dict_ais` DISABLE KEYS */;
INSERT INTO `dict_ais` (`id`, `val`) VALUES
	(1, 'Code(s) obsolète(s)'),
	(2, 'Perfectionnement, élargissement des compétences');
/*!40000 ALTER TABLE `dict_ais` ENABLE KEYS */;

-- Listage de la structure de la table wise. dict_boolean
CREATE TABLE IF NOT EXISTS `dict_boolean` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `val` varchar(50) COLLATE latin1_general_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- Listage des données de la table wise.dict_boolean : ~2 rows (environ)
DELETE FROM `dict_boolean`;
/*!40000 ALTER TABLE `dict_boolean` DISABLE KEYS */;
INSERT INTO `dict_boolean` (`id`, `val`) VALUES
	(1, 'non'),
	(2, 'oui');
/*!40000 ALTER TABLE `dict_boolean` ENABLE KEYS */;

-- Listage de la structure de la table wise. dict_etat_recrutement
CREATE TABLE IF NOT EXISTS `dict_etat_recrutement` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `val` varchar(50) COLLATE latin1_general_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- Listage des données de la table wise.dict_etat_recrutement : ~3 rows (environ)
DELETE FROM `dict_etat_recrutement`;
/*!40000 ALTER TABLE `dict_etat_recrutement` DISABLE KEYS */;
INSERT INTO `dict_etat_recrutement` (`id`, `val`) VALUES
	(1, 'ouvert'),
	(2, 'fermé'),
	(3, 'suspendu');
/*!40000 ALTER TABLE `dict_etat_recrutement` ENABLE KEYS */;

-- Listage de la structure de la table wise. dict_financeurs
CREATE TABLE IF NOT EXISTS `dict_financeurs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `val` varchar(50) COLLATE latin1_general_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=55 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- Listage des données de la table wise.dict_financeurs : ~18 rows (environ)
DELETE FROM `dict_financeurs`;
/*!40000 ALTER TABLE `dict_financeurs` DISABLE KEYS */;
INSERT INTO `dict_financeurs` (`id`, `val`) VALUES
	(1, 'Autre'),
	(2, 'Code(s) obsolète(s)'),
	(3, 'Collectivité territoriale - Conseil régional'),
	(4, 'Fonds européens - FSE'),
	(5, 'Pôle emploi'),
	(6, 'Entreprise'),
	(7, 'ACSÉ (anciennement FASILD)'),
	(8, 'AGEFIPH'),
	(9, 'Collectivité territoriale - Conseil général'),
	(10, 'Collectivité territoriale - Commune'),
	(11, 'Bénéficiaire de l’action'),
	(12, 'Etat - Ministère chargé de l’emploi'),
	(13, 'Etat - Ministère de l’éducation nationale'),
	(14, 'Etat - Autre'),
	(15, 'Fonds européens - Autre'),
	(16, 'Collectivité territoriale - Autre'),
	(17, 'OPCA'),
	(18, 'OPACIF');
/*!40000 ALTER TABLE `dict_financeurs` ENABLE KEYS */;

-- Listage de la structure de la table wise. dict_modalites_enseignement
CREATE TABLE IF NOT EXISTS `dict_modalites_enseignement` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `val` varchar(50) COLLATE latin1_general_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- Listage des données de la table wise.dict_modalites_enseignement : ~3 rows (environ)
DELETE FROM `dict_modalites_enseignement`;
/*!40000 ALTER TABLE `dict_modalites_enseignement` DISABLE KEYS */;
INSERT INTO `dict_modalites_enseignement` (`id`, `val`) VALUES
	(1, 'formation entièrement présentielle'),
	(2, 'formation mixte'),
	(3, 'formation entierèment à distance');
/*!40000 ALTER TABLE `dict_modalites_enseignement` ENABLE KEYS */;

-- Listage de la structure de la table wise. dict_modalites_es
CREATE TABLE IF NOT EXISTS `dict_modalites_es` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `val` varchar(50) COLLATE latin1_general_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- Listage des données de la table wise.dict_modalites_es : ~2 rows (environ)
DELETE FROM `dict_modalites_es`;
/*!40000 ALTER TABLE `dict_modalites_es` DISABLE KEYS */;
INSERT INTO `dict_modalites_es` (`id`, `val`) VALUES
	(1, 'entrées/sorties à dates fixes'),
	(2, 'entrées/sorties permanentes');
/*!40000 ALTER TABLE `dict_modalites_es` ENABLE KEYS */;

-- Listage de la structure de la table wise. dict_niveaux
CREATE TABLE IF NOT EXISTS `dict_niveaux` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `val` varchar(150) COLLATE latin1_general_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- Listage des données de la table wise.dict_niveaux : ~7 rows (environ)
DELETE FROM `dict_niveaux`;
/*!40000 ALTER TABLE `dict_niveaux` DISABLE KEYS */;
INSERT INTO `dict_niveaux` (`id`, `val`) VALUES
	(1, 'information non communiquée'),
	(2, 'sans niveau spécifique'),
	(3, 'niveau VI (illettrisme, analphabétisme)'),
	(4, 'niveau V bis (préqualification)'),
	(5, 'niveau V (CAP, BEP, CFPA du premier degré)'),
	(6, 'niveau IV (BP, BT, baccalauréat professionnel ou technologique)'),
	(7, 'niveau III (BTS, DUT)');
/*!40000 ALTER TABLE `dict_niveaux` ENABLE KEYS */;

-- Listage de la structure de la table wise. dict_perimetre_recrutement
CREATE TABLE IF NOT EXISTS `dict_perimetre_recrutement` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `val` varchar(50) COLLATE latin1_general_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- Listage des données de la table wise.dict_perimetre_recrutement : ~7 rows (environ)
DELETE FROM `dict_perimetre_recrutement`;
/*!40000 ALTER TABLE `dict_perimetre_recrutement` DISABLE KEYS */;
INSERT INTO `dict_perimetre_recrutement` (`id`, `val`) VALUES
	(1, 'Autres'),
	(2, 'Commune'),
	(3, 'Département'),
	(4, 'Région'),
	(5, 'Interrégion'),
	(6, 'Pays'),
	(7, 'International');
/*!40000 ALTER TABLE `dict_perimetre_recrutement` ENABLE KEYS */;

-- Listage de la structure de la table wise. dict_type_module
CREATE TABLE IF NOT EXISTS `dict_type_module` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `val` varchar(50) COLLATE latin1_general_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- Listage des données de la table wise.dict_type_module : ~3 rows (environ)
DELETE FROM `dict_type_module`;
/*!40000 ALTER TABLE `dict_type_module` DISABLE KEYS */;
INSERT INTO `dict_type_module` (`id`, `val`) VALUES
	(1, 'information inconnue'),
	(2, 'obligatoire'),
	(3, 'personnalisable');
/*!40000 ALTER TABLE `dict_type_module` ENABLE KEYS */;

-- Listage de la structure de la table wise. dict_type_parcours
CREATE TABLE IF NOT EXISTS `dict_type_parcours` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `val` varchar(50) COLLATE latin1_general_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- Listage des données de la table wise.dict_type_parcours : ~4 rows (environ)
DELETE FROM `dict_type_parcours`;
/*!40000 ALTER TABLE `dict_type_parcours` DISABLE KEYS */;
INSERT INTO `dict_type_parcours` (`id`, `val`) VALUES
	(1, 'en groupe (non personnalisable)'),
	(2, 'individualisé'),
	(3, 'modularisé'),
	(4, 'mixte');
/*!40000 ALTER TABLE `dict_type_parcours` ENABLE KEYS */;

-- Listage de la structure de la table wise. dict_type_positionnement
CREATE TABLE IF NOT EXISTS `dict_type_positionnement` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `val` varchar(50) COLLATE latin1_general_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- Listage des données de la table wise.dict_type_positionnement : ~2 rows (environ)
DELETE FROM `dict_type_positionnement`;
/*!40000 ALTER TABLE `dict_type_positionnement` DISABLE KEYS */;
INSERT INTO `dict_type_positionnement` (`id`, `val`) VALUES
	(1, 'réglementaire'),
	(2, 'pédagogique');
/*!40000 ALTER TABLE `dict_type_positionnement` ENABLE KEYS */;

-- Listage de la structure de la table wise. domaine_formation
CREATE TABLE IF NOT EXISTS `domaine_formation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code_FORMACODE` int(11) DEFAULT NULL,
  `code_VSF` int(11) DEFAULT NULL,
  `code_ROME` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- Listage des données de la table wise.domaine_formation : ~0 rows (environ)
DELETE FROM `domaine_formation`;
/*!40000 ALTER TABLE `domaine_formation` DISABLE KEYS */;
/*!40000 ALTER TABLE `domaine_formation` ENABLE KEYS */;

-- Listage de la structure de la table wise. domaine_formation_code
CREATE TABLE IF NOT EXISTS `domaine_formation_code` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `domaine_formation` int(11) NOT NULL,
  `code` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_domaine_formation_code_code` (`code`),
  KEY `FK_domaine_formation_code_domaine_formation` (`domaine_formation`),
  CONSTRAINT `FK_domaine_formation_code_code` FOREIGN KEY (`code`) REFERENCES `code` (`id`),
  CONSTRAINT `FK_domaine_formation_code_domaine_formation` FOREIGN KEY (`domaine_formation`) REFERENCES `domaine_formation` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- Listage des données de la table wise.domaine_formation_code : ~0 rows (environ)
DELETE FROM `domaine_formation_code`;
/*!40000 ALTER TABLE `domaine_formation_code` DISABLE KEYS */;
/*!40000 ALTER TABLE `domaine_formation_code` ENABLE KEYS */;

-- Listage de la structure de la table wise. formation
CREATE TABLE IF NOT EXISTS `formation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `domaine_formation` int(11) DEFAULT NULL,
  `objectif_formation` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `intitule_formation` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `resultats_attendus` varchar(3000) COLLATE latin1_general_ci DEFAULT NULL,
  `contenu_formation` varchar(3000) COLLATE latin1_general_ci DEFAULT NULL,
  `certifiante` int(11) DEFAULT NULL,
  `contact_formation` int(11) DEFAULT NULL,
  `parcours_formation` int(11) DEFAULT NULL,
  `code_niveau_entree` int(11) DEFAULT NULL,
  `code_niveau_sortie` int(11) DEFAULT NULL,
  `url_formation` int(11) DEFAULT NULL,
  `organisme_formation_responsable` int(11) DEFAULT NULL,
  `sous_modules` int(11) DEFAULT NULL,
  `modules_prerequis` int(11) DEFAULT NULL,
  `eligibilite_cpf` varchar(45) COLLATE latin1_general_ci DEFAULT NULL,
  `validation` varchar(45) COLLATE latin1_general_ci DEFAULT NULL,
  `deleted` enum('1','0') COLLATE latin1_general_ci DEFAULT '0',
  `user_created` int(11) DEFAULT NULL,
  `user_updated` int(11) DEFAULT NULL,
  `date_created` date DEFAULT NULL,
  `date_updated` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_formation_dict_boolean` (`certifiante`),
  KEY `FK_formation_coordonnees` (`contact_formation`),
  KEY `FK_formation_dict_type_parcours` (`parcours_formation`),
  KEY `FK_formation_dict_niveaux` (`code_niveau_entree`),
  KEY `FK_formation_dict_niveaux_2` (`code_niveau_sortie`),
  KEY `FK_formation_organisme_formation_responsable` (`organisme_formation_responsable`),
  KEY `FK_formation_domaine_formation` (`domaine_formation`),
  KEY `FK_formation_sous_modules` (`sous_modules`),
  KEY `FK_formation_modules_prerequis` (`modules_prerequis`),
  KEY `FK_formation_url_formation` (`url_formation`),
  KEY `FK_formation_user` (`user_created`),
  KEY `FK_formation_user_2` (`user_updated`),
  CONSTRAINT `FK_formation_coordonnees` FOREIGN KEY (`contact_formation`) REFERENCES `coordonnees` (`id`),
  CONSTRAINT `FK_formation_dict_boolean` FOREIGN KEY (`certifiante`) REFERENCES `dict_boolean` (`id`),
  CONSTRAINT `FK_formation_dict_niveaux` FOREIGN KEY (`code_niveau_entree`) REFERENCES `dict_niveaux` (`id`),
  CONSTRAINT `FK_formation_dict_niveaux_2` FOREIGN KEY (`code_niveau_sortie`) REFERENCES `dict_niveaux` (`id`),
  CONSTRAINT `FK_formation_dict_type_parcours` FOREIGN KEY (`parcours_formation`) REFERENCES `dict_type_parcours` (`id`),
  CONSTRAINT `FK_formation_domaine_formation` FOREIGN KEY (`domaine_formation`) REFERENCES `domaine_formation` (`id`),
  CONSTRAINT `FK_formation_modules_prerequis` FOREIGN KEY (`modules_prerequis`) REFERENCES `modules_prerequis` (`id`),
  CONSTRAINT `FK_formation_organisme_formation_responsable` FOREIGN KEY (`organisme_formation_responsable`) REFERENCES `organisme_formation_responsable` (`id`),
  CONSTRAINT `FK_formation_sous_modules` FOREIGN KEY (`sous_modules`) REFERENCES `sous_modules` (`id`),
  CONSTRAINT `FK_formation_url_formation` FOREIGN KEY (`url_formation`) REFERENCES `url_formation` (`id_formation`),
  CONSTRAINT `FK_formation_user` FOREIGN KEY (`user_created`) REFERENCES `user` (`id`),
  CONSTRAINT `FK_formation_user_2` FOREIGN KEY (`user_updated`) REFERENCES `user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- Listage des données de la table wise.formation : ~6 rows (environ)
DELETE FROM `formation`;
/*!40000 ALTER TABLE `formation` DISABLE KEYS */;
INSERT INTO `formation` (`id`, `domaine_formation`, `objectif_formation`, `intitule_formation`, `resultats_attendus`, `contenu_formation`, `certifiante`, `contact_formation`, `parcours_formation`, `code_niveau_entree`, `code_niveau_sortie`, `url_formation`, `organisme_formation_responsable`, `sous_modules`, `modules_prerequis`, `eligibilite_cpf`, `validation`, `deleted`, `user_created`, `user_updated`, `date_created`, `date_updated`) VALUES
	(4, NULL, 'L\'objectif de la formation numéro 1 est de ...', 'Formation numéro 1', 'Les résultats attendu de la formation numéro 1 sont ...', 'Le contenu de la formation 1 est ...', 2, 1, 4, 2, 6, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, NULL, NULL, NULL),
	(5, NULL, 'L\'objectif de la formation numéro 2 est de ...', 'Formation numéro 2', 'Les résultats attendu de la formation numéro 2 sont ...', 'Le contenu de la formation 2 est ...', 1, 2, 4, 2, 2, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, NULL, NULL, NULL),
	(6, NULL, 'L\'objectif de la formation numéro 3 est de ...', 'Formation numéro 3', 'Les résultats attendu de la formation numéro 3 sont ...', 'Le contenu de la formation 3 est ...', 1, 3, 2, 2, 2, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, NULL, NULL, NULL),
	(7, NULL, 'L\'objectif de la formation numéro 4 est de ...', 'Formation numéro 4', 'Les résultats attendu de la formation numéro 4 sont ...', 'Le contenu de la formation 4 est ...', 2, 3, 4, 6, 2, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, NULL, NULL, NULL),
	(8, NULL, 'L\'objectif de la formation numéro 5 est de ...', 'Formation numéro 5', 'Les résultats attendu de la formation numéro 5 sont ...', 'Le contenu de la formation 5 est ...', 2, 4, 3, NULL, 7, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, NULL, NULL, NULL),
	(9, NULL, 'L\'objectif de la formation numéro 6 est de ...', 'Formation numéro 6', 'Les résultats attendu de la formation numéro 6 sont ...', 'Le contenu de la formation 3 est ...', 1, 5, 4, 7, 2, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, NULL, NULL, NULL);
/*!40000 ALTER TABLE `formation` ENABLE KEYS */;

-- Listage de la structure de la table wise. formation_certification
CREATE TABLE IF NOT EXISTS `formation_certification` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_certification` int(11) DEFAULT '0',
  `id_formation` int(11) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `FK__certification` (`id_certification`),
  KEY `FK__formation` (`id_formation`),
  CONSTRAINT `FK__certification` FOREIGN KEY (`id_certification`) REFERENCES `certification` (`id`),
  CONSTRAINT `FK__formation` FOREIGN KEY (`id_formation`) REFERENCES `formation` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- Listage des données de la table wise.formation_certification : ~0 rows (environ)
DELETE FROM `formation_certification`;
/*!40000 ALTER TABLE `formation_certification` DISABLE KEYS */;
/*!40000 ALTER TABLE `formation_certification` ENABLE KEYS */;

-- Listage de la structure de la table wise. modules_prerequis
CREATE TABLE IF NOT EXISTS `modules_prerequis` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- Listage des données de la table wise.modules_prerequis : ~0 rows (environ)
DELETE FROM `modules_prerequis`;
/*!40000 ALTER TABLE `modules_prerequis` DISABLE KEYS */;
/*!40000 ALTER TABLE `modules_prerequis` ENABLE KEYS */;

-- Listage de la structure de la table wise. modules_prerequis_reference
CREATE TABLE IF NOT EXISTS `modules_prerequis_reference` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_reference` int(11) NOT NULL,
  `id_modules_prerequis` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_modules_prerequis_reference_reference_module` (`id_reference`),
  KEY `FK_modules_prerequis_reference_modules_prerequis` (`id_modules_prerequis`),
  CONSTRAINT `FK_modules_prerequis_reference_modules_prerequis` FOREIGN KEY (`id_modules_prerequis`) REFERENCES `modules_prerequis` (`id`),
  CONSTRAINT `FK_modules_prerequis_reference_reference_module` FOREIGN KEY (`id_reference`) REFERENCES `reference_module` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- Listage des données de la table wise.modules_prerequis_reference : ~0 rows (environ)
DELETE FROM `modules_prerequis_reference`;
/*!40000 ALTER TABLE `modules_prerequis_reference` DISABLE KEYS */;
/*!40000 ALTER TABLE `modules_prerequis_reference` ENABLE KEYS */;

-- Listage de la structure de la table wise. organisme_financeur
CREATE TABLE IF NOT EXISTS `organisme_financeur` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code_financeurs` int(11) DEFAULT NULL,
  `nombre_places_finances` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_organisme_financeur_dict_financeurs` (`code_financeurs`),
  CONSTRAINT `FK_organisme_financeur_dict_financeurs` FOREIGN KEY (`code_financeurs`) REFERENCES `dict_financeurs` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- Listage des données de la table wise.organisme_financeur : ~0 rows (environ)
DELETE FROM `organisme_financeur`;
/*!40000 ALTER TABLE `organisme_financeur` DISABLE KEYS */;
/*!40000 ALTER TABLE `organisme_financeur` ENABLE KEYS */;

-- Listage de la structure de la table wise. organisme_formateur
CREATE TABLE IF NOT EXISTS `organisme_formateur` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `SIRET_formateur` varchar(14) COLLATE latin1_general_ci NOT NULL,
  `raison_sociale_formateur` varchar(250) COLLATE latin1_general_ci DEFAULT NULL,
  `contact_formateur` int(11) DEFAULT NULL,
  `potentiel` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_organisme_formateur_coordonnees` (`contact_formateur`),
  CONSTRAINT `FK_organisme_formateur_coordonnees` FOREIGN KEY (`contact_formateur`) REFERENCES `coordonnees` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- Listage des données de la table wise.organisme_formateur : ~0 rows (environ)
DELETE FROM `organisme_formateur`;
/*!40000 ALTER TABLE `organisme_formateur` DISABLE KEYS */;
/*!40000 ALTER TABLE `organisme_formateur` ENABLE KEYS */;

-- Listage de la structure de la table wise. organisme_formation_responsable
CREATE TABLE IF NOT EXISTS `organisme_formation_responsable` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `numero_activite` varchar(11) COLLATE latin1_general_ci DEFAULT NULL,
  `SIRET_organisme_formation` varchar(14) COLLATE latin1_general_ci DEFAULT NULL,
  `nom_organisme` varchar(250) COLLATE latin1_general_ci NOT NULL,
  `raison_sociale` varchar(250) COLLATE latin1_general_ci NOT NULL,
  `coordonnees_organisme` int(11) DEFAULT NULL,
  `contact_organisme` int(11) DEFAULT NULL,
  `renseignements_specifiques` varchar(3000) COLLATE latin1_general_ci DEFAULT NULL,
  `agreement_data_doc` varchar(45) COLLATE latin1_general_ci DEFAULT NULL,
  `user_created` int(11) DEFAULT NULL,
  `user_updated` int(11) DEFAULT NULL,
  `creation_date` date DEFAULT NULL,
  `creation_updated` date DEFAULT NULL,
  `deleted` tinyint(4) DEFAULT NULL,
  `attributs` varchar(600) COLLATE latin1_general_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_organisme_formation_responsable_coordonnees` (`coordonnees_organisme`),
  KEY `FK_organisme_formation_responsable_coordonnees_2` (`contact_organisme`),
  KEY `FK_organisme_formation_responsable_user` (`user_created`),
  KEY `FK_organisme_formation_responsable_user_2` (`user_updated`),
  CONSTRAINT `FK_organisme_formation_responsable_coordonnees` FOREIGN KEY (`coordonnees_organisme`) REFERENCES `coordonnees` (`id`),
  CONSTRAINT `FK_organisme_formation_responsable_coordonnees_2` FOREIGN KEY (`contact_organisme`) REFERENCES `coordonnees` (`id`),
  CONSTRAINT `FK_organisme_formation_responsable_user` FOREIGN KEY (`user_created`) REFERENCES `user` (`id`),
  CONSTRAINT `FK_organisme_formation_responsable_user_2` FOREIGN KEY (`user_updated`) REFERENCES `user` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- Listage des données de la table wise.organisme_formation_responsable : ~0 rows (environ)
DELETE FROM `organisme_formation_responsable`;
/*!40000 ALTER TABLE `organisme_formation_responsable` DISABLE KEYS */;
/*!40000 ALTER TABLE `organisme_formation_responsable` ENABLE KEYS */;

-- Listage de la structure de la table wise. periode
CREATE TABLE IF NOT EXISTS `periode` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `début` date DEFAULT NULL,
  `fin` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- Listage des données de la table wise.periode : ~0 rows (environ)
DELETE FROM `periode`;
/*!40000 ALTER TABLE `periode` DISABLE KEYS */;
/*!40000 ALTER TABLE `periode` ENABLE KEYS */;

-- Listage de la structure de la table wise. potentiel
CREATE TABLE IF NOT EXISTS `potentiel` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code_FORMACODE` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- Listage des données de la table wise.potentiel : ~0 rows (environ)
DELETE FROM `potentiel`;
/*!40000 ALTER TABLE `potentiel` DISABLE KEYS */;
/*!40000 ALTER TABLE `potentiel` ENABLE KEYS */;

-- Listage de la structure de la table wise. reference_module
CREATE TABLE IF NOT EXISTS `reference_module` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `reference_module` varchar(3000) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- Listage des données de la table wise.reference_module : ~0 rows (environ)
DELETE FROM `reference_module`;
/*!40000 ALTER TABLE `reference_module` DISABLE KEYS */;
/*!40000 ALTER TABLE `reference_module` ENABLE KEYS */;

-- Listage de la structure de la table wise. session
CREATE TABLE IF NOT EXISTS `session` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `periode` int(11) DEFAULT NULL,
  `adresse_inscription` int(11) DEFAULT NULL,
  `periode_inscription` int(11) DEFAULT NULL,
  `user_created` int(11) DEFAULT NULL,
  `user_updated` int(11) DEFAULT NULL,
  `date_created` date DEFAULT NULL,
  `date_updated` date DEFAULT NULL,
  `deleted` tinyint(4) DEFAULT NULL,
  `attributs` varchar(600) COLLATE latin1_general_ci DEFAULT NULL,
  `action` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_session_periode` (`periode`),
  KEY `FK_session_adresse` (`adresse_inscription`),
  KEY `FK_session_periode_2` (`periode_inscription`),
  KEY `FK_session_user` (`user_created`),
  KEY `FK_session_user_2` (`user_updated`),
  KEY `FK_session_action` (`action`),
  CONSTRAINT `FK_session_action` FOREIGN KEY (`action`) REFERENCES `action` (`id`),
  CONSTRAINT `FK_session_adresse` FOREIGN KEY (`adresse_inscription`) REFERENCES `adresse` (`id`),
  CONSTRAINT `FK_session_periode` FOREIGN KEY (`periode`) REFERENCES `periode` (`id`),
  CONSTRAINT `FK_session_periode_2` FOREIGN KEY (`periode_inscription`) REFERENCES `periode` (`id`),
  CONSTRAINT `FK_session_user` FOREIGN KEY (`user_created`) REFERENCES `user` (`id`),
  CONSTRAINT `FK_session_user_2` FOREIGN KEY (`user_updated`) REFERENCES `user` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- Listage des données de la table wise.session : ~0 rows (environ)
DELETE FROM `session`;
/*!40000 ALTER TABLE `session` DISABLE KEYS */;
/*!40000 ALTER TABLE `session` ENABLE KEYS */;

-- Listage de la structure de la table wise. sous_module
CREATE TABLE IF NOT EXISTS `sous_module` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sous_modules` int(11) NOT NULL,
  `reference_module` int(11) DEFAULT NULL,
  `type_module` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_sous_module_sous_modules` (`sous_modules`),
  KEY `FK_sous_module_reference_module` (`reference_module`),
  KEY `FK_sous_module_dict_type_module` (`type_module`),
  CONSTRAINT `FK_sous_module_dict_type_module` FOREIGN KEY (`type_module`) REFERENCES `dict_type_module` (`id`),
  CONSTRAINT `FK_sous_module_reference_module` FOREIGN KEY (`reference_module`) REFERENCES `reference_module` (`id`),
  CONSTRAINT `FK_sous_module_sous_modules` FOREIGN KEY (`sous_modules`) REFERENCES `sous_modules` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- Listage des données de la table wise.sous_module : ~0 rows (environ)
DELETE FROM `sous_module`;
/*!40000 ALTER TABLE `sous_module` DISABLE KEYS */;
/*!40000 ALTER TABLE `sous_module` ENABLE KEYS */;

-- Listage de la structure de la table wise. sous_modules
CREATE TABLE IF NOT EXISTS `sous_modules` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- Listage des données de la table wise.sous_modules : ~0 rows (environ)
DELETE FROM `sous_modules`;
/*!40000 ALTER TABLE `sous_modules` DISABLE KEYS */;
/*!40000 ALTER TABLE `sous_modules` ENABLE KEYS */;

-- Listage de la structure de la table wise. url
CREATE TABLE IF NOT EXISTS `url` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `url` varchar(400) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- Listage des données de la table wise.url : ~0 rows (environ)
DELETE FROM `url`;
/*!40000 ALTER TABLE `url` DISABLE KEYS */;
/*!40000 ALTER TABLE `url` ENABLE KEYS */;

-- Listage de la structure de la table wise. url_formation
CREATE TABLE IF NOT EXISTS `url_formation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_formation` int(11) NOT NULL,
  `id_url` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK__url_id_formation` (`id_formation`),
  KEY `FK__formation_id_url` (`id_url`),
  CONSTRAINT `FK__formation_id_url` FOREIGN KEY (`id_url`) REFERENCES `url` (`id`),
  CONSTRAINT `FK__url_id_formation` FOREIGN KEY (`id_formation`) REFERENCES `formation` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- Listage des données de la table wise.url_formation : ~0 rows (environ)
DELETE FROM `url_formation`;
/*!40000 ALTER TABLE `url_formation` DISABLE KEYS */;
/*!40000 ALTER TABLE `url_formation` ENABLE KEYS */;

-- Listage de la structure de la table wise. user
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(200) COLLATE latin1_general_ci DEFAULT NULL,
  `password` varchar(200) COLLATE latin1_general_ci DEFAULT NULL,
  `status` varchar(200) COLLATE latin1_general_ci DEFAULT NULL,
  `token_code` varchar(200) COLLATE latin1_general_ci DEFAULT NULL,
  `deleted` varchar(100) COLLATE latin1_general_ci DEFAULT NULL,
  `user_created` int(11) DEFAULT NULL,
  `user_updated` int(11) DEFAULT NULL,
  `id_role` int(11) DEFAULT NULL,
  `creation_date` date DEFAULT NULL,
  `creation_update` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_user_user` (`user_created`),
  KEY `FK_user_user_2` (`user_updated`),
  KEY `FK_user_user_role` (`id_role`),
  CONSTRAINT `FK_user_user` FOREIGN KEY (`user_created`) REFERENCES `user` (`id`),
  CONSTRAINT `FK_user_user_2` FOREIGN KEY (`user_updated`) REFERENCES `user` (`id`),
  CONSTRAINT `FK_user_user_role` FOREIGN KEY (`id_role`) REFERENCES `user_role` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- Listage des données de la table wise.user : ~1 rows (environ)
DELETE FROM `user`;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` (`id`, `email`, `password`, `status`, `token_code`, `deleted`, `user_created`, `user_updated`, `id_role`, `creation_date`, `creation_update`) VALUES
	(1, 'test@test.fr', 'test', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
/*!40000 ALTER TABLE `user` ENABLE KEYS */;

-- Listage de la structure de la table wise. user_role
CREATE TABLE IF NOT EXISTS `user_role` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `libelle` varchar(100) COLLATE latin1_general_ci DEFAULT NULL,
  `deleted` varchar(100) COLLATE latin1_general_ci DEFAULT NULL,
  `user_created` int(11) DEFAULT NULL,
  `user_updated` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_user_role_user` (`user_created`),
  KEY `FK_user_role_user_2` (`user_updated`),
  CONSTRAINT `FK_user_role_user` FOREIGN KEY (`user_created`) REFERENCES `user` (`id`),
  CONSTRAINT `FK_user_role_user_2` FOREIGN KEY (`user_updated`) REFERENCES `user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- Listage des données de la table wise.user_role : ~4 rows (environ)
DELETE FROM `user_role`;
/*!40000 ALTER TABLE `user_role` DISABLE KEYS */;
INSERT INTO `user_role` (`id`, `libelle`, `deleted`, `user_created`, `user_updated`) VALUES
	(1, 'Utilisateur', NULL, NULL, NULL),
	(2, 'Administrateur', NULL, NULL, NULL),
	(3, 'Etablissement', NULL, NULL, NULL),
	(4, 'Partenaire', NULL, NULL, NULL);
/*!40000 ALTER TABLE `user_role` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
