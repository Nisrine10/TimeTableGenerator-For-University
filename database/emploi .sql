-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mer. 31 mai 2023 à 22:17
-- Version du serveur : 10.4.27-MariaDB
-- Version de PHP : 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `emploi`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `identifiant` varchar(50) NOT NULL,
  `mdp_admin` varchar(50) NOT NULL,
  `email_admin` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`id_admin`, `identifiant`, `mdp_admin`, `email_admin`) VALUES
(1, 'admin1', 'password1', 'admin1@example.com'),
(2, 'admin2', 'password2', 'admin2@example.com');

-- --------------------------------------------------------

--
-- Structure de la table `appartient`
--

CREATE TABLE `appartient` (
  `id_module` int(11) NOT NULL,
  `id_filiere` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `appartient`
--

INSERT INTO `appartient` (`id_module`, `id_filiere`) VALUES
(1, 1),
(2, 2);

-- --------------------------------------------------------

--
-- Structure de la table `class`
--

CREATE TABLE `class` (
  `id_class` int(11) NOT NULL,
  `nom_class` varchar(50) NOT NULL,
  `niveau` varchar(50) NOT NULL,
  `annee_scolaire` varchar(50) NOT NULL,
  `id_filiere` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `class`
--

INSERT INTO `class` (`id_class`, `nom_class`, `niveau`, `annee_scolaire`, `id_filiere`) VALUES
(1, 'Class A', '1', '2023-2024', 1),
(2, 'Class B', '2', '2023-2024', 1),
(3, 'Class C', '1', '2023-2024', 2),
(4, 'Class D', '2', '2023-2024', 2);

-- --------------------------------------------------------

--
-- Structure de la table `concerner`
--

CREATE TABLE `concerner` (
  `id_seance` int(11) NOT NULL,
  `id_planning` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `concerner`
--

INSERT INTO `concerner` (`id_seance`, `id_planning`) VALUES
(58, 1),
(60, 1),
(73, 1),
(75, 1),
(81, 1),
(83, 1),
(84, 1),
(85, 1),
(86, 1),
(88, 1),
(93, 1),
(95, 1),
(97, 1);

-- --------------------------------------------------------

--
-- Structure de la table `concerngroupe`
--

CREATE TABLE `concerngroupe` (
  `id` int(11) NOT NULL,
  `id_seance` int(11) DEFAULT NULL,
  `id_group` int(11) DEFAULT NULL,
  `id_class` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `concerngroupe`
--

INSERT INTO `concerngroupe` (`id`, `id_seance`, `id_group`, `id_class`) VALUES
(1, 83, 1, 2),
(2, 84, 1, 1),
(3, 85, 2, 1),
(4, 86, 2, 1),
(5, 86, 3, 2),
(6, 88, 1, 1),
(7, 88, 1, 1),
(8, 88, 1, 1),
(9, 88, 1, 1),
(10, 88, 1, 1),
(11, 93, 1, 1),
(12, 93, 1, 1),
(13, 95, 1, 1),
(14, 95, 4, 2),
(15, 97, 4, 2),
(16, 97, 4, 2),
(17, 97, 4, 2),
(18, 97, 4, 2),
(19, 97, 4, 2);

-- --------------------------------------------------------

--
-- Structure de la table `demande`
--

CREATE TABLE `demande` (
  `id_demande` int(11) NOT NULL,
  `contenu` varchar(50) NOT NULL,
  `statut_demande` varchar(50) NOT NULL DEFAULT 'En cours',
  `id_enseignant` int(11) NOT NULL,
  `Heure_Coursa` time(6) NOT NULL,
  `Module` varchar(50) NOT NULL,
  `Date_Report` date NOT NULL,
  `Date_Coursa` date NOT NULL,
  `Heure_Report` time(6) NOT NULL,
  `id_admin` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `disponibilite`
--

CREATE TABLE `disponibilite` (
  `id_dispo` int(11) NOT NULL,
  `MONDAY` int(11) DEFAULT NULL,
  `TUESDAY` int(11) DEFAULT NULL,
  `WEDNESDAY` int(11) DEFAULT NULL,
  `THURSDAY` int(11) DEFAULT NULL,
  `FRIDAY` int(11) DEFAULT NULL,
  `SATURDAY` int(11) DEFAULT NULL,
  `SUNDAY` int(11) DEFAULT NULL,
  `id_enseignant` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `disponibilite`
--

INSERT INTO `disponibilite` (`id_dispo`, `MONDAY`, `TUESDAY`, `WEDNESDAY`, `THURSDAY`, `FRIDAY`, `SATURDAY`, `SUNDAY`, `id_enseignant`) VALUES
(4, 1, 3, 2, 1, 2, 1, 2, 1);

-- --------------------------------------------------------

--
-- Structure de la table `disponibilite_salle`
--

CREATE TABLE `disponibilite_salle` (
  `id_dispo_salle` int(11) NOT NULL,
  `date_dispo_salle` varchar(40) NOT NULL,
  `semaine_dispo_salle` int(11) NOT NULL,
  `id_salle_salle` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `disponibilite_salle`
--

INSERT INTO `disponibilite_salle` (`id_dispo_salle`, `date_dispo_salle`, `semaine_dispo_salle`, `id_salle_salle`) VALUES
(1, '10:00-12:00|THURSDAY', 1, 1),
(2, '10:00-12:00|MONDAY', 1, 2),
(3, '8:00-10:00|SATURDAY', 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `element_module`
--

CREATE TABLE `element_module` (
  `id_element_module` int(11) NOT NULL,
  `nom_element_module` varchar(50) NOT NULL,
  `volume_horaire` varchar(50) NOT NULL,
  `coefficient` varchar(50) NOT NULL,
  `id_module` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `element_module`
--

INSERT INTO `element_module` (`id_element_module`, `nom_element_module`, `volume_horaire`, `coefficient`, `id_module`) VALUES
(1, 'Element 1', '60', '2', 1),
(2, 'Element 2', '90', '3', 2);

-- --------------------------------------------------------

--
-- Structure de la table `enseignant`
--

CREATE TABLE `enseignant` (
  `id_enseignant` int(11) NOT NULL,
  `nom_enseignant` varchar(50) NOT NULL,
  `email_enseignant` varchar(50) NOT NULL,
  `adresse` varchar(50) NOT NULL,
  `telephone` varchar(50) NOT NULL,
  `statut_enseignant` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `enseignant`
--

INSERT INTO `enseignant` (`id_enseignant`, `nom_enseignant`, `email_enseignant`, `adresse`, `telephone`, `statut_enseignant`, `password`) VALUES
(1, 'Professor 1', 'prof1@example.com', '789 Road', '555-1234', 'Full-time', 'password'),
(2, 'Professor 2', 'prof2@example.com', '321 Lane', '555-5678', 'Part-time', 'password');

-- --------------------------------------------------------

--
-- Structure de la table `enseigne`
--

CREATE TABLE `enseigne` (
  `id_element_module` int(11) NOT NULL,
  `id_enseignant` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `enseigne`
--

INSERT INTO `enseigne` (`id_element_module`, `id_enseignant`) VALUES
(1, 1),
(2, 2);

-- --------------------------------------------------------

--
-- Structure de la table `est_plannifier`
--

CREATE TABLE `est_plannifier` (
  `id_seance` int(11) NOT NULL,
  `id_element_module` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `est_plannifier`
--

INSERT INTO `est_plannifier` (`id_seance`, `id_element_module`) VALUES
(58, 1),
(60, 1),
(73, 2),
(75, 1),
(75, 2),
(81, 1),
(83, 1),
(84, 1),
(85, 1),
(86, 1),
(88, 1),
(93, 1),
(95, 1),
(97, 1);

-- --------------------------------------------------------

--
-- Structure de la table `etudiant`
--

CREATE TABLE `etudiant` (
  `id_etudiant` int(11) NOT NULL,
  `nom_etudiant` varchar(50) NOT NULL,
  `prenom_etudiant` varchar(50) NOT NULL,
  `email_etudiant` varchar(50) NOT NULL,
  `mdp_etudiant` varchar(50) NOT NULL,
  `adresse` varchar(50) NOT NULL,
  `naissance` varchar(50) NOT NULL,
  `telephone` varchar(50) NOT NULL,
  `id_group` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `etudiant`
--

INSERT INTO `etudiant` (`id_etudiant`, `nom_etudiant`, `prenom_etudiant`, `email_etudiant`, `mdp_etudiant`, `adresse`, `naissance`, `telephone`, `id_group`) VALUES
(1, 'John', 'Doe', 'john.doe@example.com', 'password', '123 Street', '2000-01-01', '123456789', 1),
(2, 'Jane', 'Smith', 'jane.smith@example.com', 'password', '456 Avenue', '2000-02-02', '987654321', 2);

-- --------------------------------------------------------

--
-- Structure de la table `filiere`
--

CREATE TABLE `filiere` (
  `id_filiere` int(11) NOT NULL,
  `chef_filiere` varchar(50) NOT NULL,
  `nom_filiere` varchar(50) NOT NULL,
  `nom_faculte` varchar(50) NOT NULL,
  `nbr_annee` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `filiere`
--

INSERT INTO `filiere` (`id_filiere`, `chef_filiere`, `nom_filiere`, `nom_faculte`, `nbr_annee`) VALUES
(1, 'John Doe', 'Computer Science', 'Faculty of Science', '4'),
(2, 'Jane Smith', 'Mathematics', 'Faculty of Science', '3'),
(3, 'Alice Johnson', 'Physics', 'Faculty of Science', '3');

-- --------------------------------------------------------

--
-- Structure de la table `groupe`
--

CREATE TABLE `groupe` (
  `id_group` int(11) NOT NULL,
  `nom_group` varchar(50) NOT NULL,
  `id_class` int(11) NOT NULL,
  `id_planning` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `groupe`
--

INSERT INTO `groupe` (`id_group`, `nom_group`, `id_class`, `id_planning`) VALUES
(1, 'Group 1', 1, 1),
(2, 'Group 2', 1, 2),
(3, 'Group 1', 2, 1),
(4, 'Group 2', 2, 1);

-- --------------------------------------------------------

--
-- Structure de la table `horaire`
--

CREATE TABLE `horaire` (
  `id_horaire` int(11) NOT NULL,
  `nom_horaire` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `horaire`
--

INSERT INTO `horaire` (`id_horaire`, `nom_horaire`) VALUES
(1, 'AM'),
(2, 'PM'),
(3, 'AM/PM');

-- --------------------------------------------------------

--
-- Structure de la table `module`
--

CREATE TABLE `module` (
  `id_module` int(11) NOT NULL,
  `nom_module` varchar(50) NOT NULL,
  `semestre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `module`
--

INSERT INTO `module` (`id_module`, `nom_module`, `semestre`) VALUES
(1, 'Module 1', 'Semester 1'),
(2, 'Module 2', 'Semester 2');

-- --------------------------------------------------------

--
-- Structure de la table `notifications`
--

CREATE TABLE `notifications` (
  `id_notification` int(11) NOT NULL,
  `id_seance` int(11) DEFAULT NULL,
  `id_enseignant` int(11) DEFAULT NULL,
  `id_group` int(11) DEFAULT NULL,
  `type_seance` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `planning`
--

CREATE TABLE `planning` (
  `id_planning` int(11) NOT NULL,
  `nom_planning` varchar(50) NOT NULL,
  `id_admin` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `planning`
--

INSERT INTO `planning` (`id_planning`, `nom_planning`, `id_admin`) VALUES
(1, 'Planning 1', 1),
(2, 'Planning 2', 2);

-- --------------------------------------------------------

--
-- Structure de la table `salle`
--

CREATE TABLE `salle` (
  `id_salle` int(11) NOT NULL,
  `num_salle` varchar(50) NOT NULL,
  `capacite` int(11) NOT NULL,
  `etage_salle` varchar(50) NOT NULL,
  `campus` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `salle`
--

INSERT INTO `salle` (`id_salle`, `num_salle`, `capacite`, `etage_salle`, `campus`) VALUES
(1, '101', 30, '1st Floor', 'Main Campus'),
(2, '201', 50, '2nd Floor', 'Main Campus');

-- --------------------------------------------------------

--
-- Structure de la table `seance`
--

CREATE TABLE `seance` (
  `id_seance` int(11) NOT NULL,
  `date_seance` varchar(50) NOT NULL,
  `debut_seance` varchar(50) NOT NULL,
  `fin_seance` varchar(50) NOT NULL,
  `commentaire_seance` varchar(50) NOT NULL,
  `statut_seance` varchar(50) NOT NULL,
  `id_salle` int(11) NOT NULL,
  `id_semaine` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `seance`
--

INSERT INTO `seance` (`id_seance`, `date_seance`, `debut_seance`, `fin_seance`, `commentaire_seance`, `statut_seance`, `id_salle`, `id_semaine`) VALUES
(58, '2023-11-06', '8:00', '10:00', '8:00-10:00|MONDAY', 'Normal', 2, 2),
(60, '2023-11-07', '10:00', '12:00', '10:00-12:00|TUESDAY', 'Normal', 1, 2),
(73, '2023-11-07', '10:00', '12:00', '10:00-12:00|TUESDAY', 'Rattrapage', 1, 1),
(75, '2023-11-08', '10:00', '12:00', '10:00-12:00|WEDNESDAY', 'Rattrapage', 1, 1),
(81, '2023-11-07', '8:00', '10:00', '8:00-10:00|TUESDAY', 'Normal', 1, 2),
(83, '2023-11-06', '10:00', '12:00', '10:00-12:00|MONDAY', 'Normal', 1, 2),
(84, '2023-11-06', '8:00', '10:00', '8:00-10:00|MONDAY', 'Annuler', 1, 1),
(85, '2023-11-07', '8:00', '10:00', '8:00-10:00|TUESDAY', 'Normal', 2, 1),
(86, '2023-11-09', '10:00', '12:00', '10:00-12:00|THURSDAY', 'Normal', 2, 1),
(88, '2023-11-09', '8:00', '10:00', '8:00-10:00|THURSDAY', 'Normal', 1, 1),
(93, '2023-11-06', '14:00', '16:00', '14:00-16:00|MONDAY', 'Normal', 1, 1),
(95, '2023-11-06', '10:00', '12:00', '10:00-12:00|MONDAY', 'Normal', 1, 1),
(97, '2023-11-11', '8:00', '10:00', '8:00-10:00|SATURDAY', 'Normal', 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `semaine`
--

CREATE TABLE `semaine` (
  `id_semaine` int(11) NOT NULL,
  `date_debut` varchar(30) NOT NULL,
  `date_fin` varchar(30) NOT NULL,
  `commentaire` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `semaine`
--

INSERT INTO `semaine` (`id_semaine`, `date_debut`, `date_fin`, `commentaire`) VALUES
(1, '2023-01-01', '2023-01-07', NULL),
(2, '2023-01-08', '2023-01-14', NULL),
(3, '2023-01-15', '2023-01-21', NULL),
(4, '2023-01-22', '2023-01-28', NULL),
(5, '2023-01-29', '2023-02-04', NULL),
(6, '2023-02-05', '2023-02-11', NULL),
(7, '2023-02-12', '2023-02-18', NULL),
(8, '2023-02-19', '2023-02-25', NULL),
(9, '2023-02-26', '2023-03-04', NULL),
(10, '2023-03-05', '2023-03-11', NULL),
(11, '2023-10-08', '2023-10-14', NULL),
(12, '2023-10-15', '2023-10-21', NULL),
(13, '2023-10-22', '2023-10-28', NULL),
(14, '2023-10-29', '2023-11-04', NULL),
(15, '2023-11-05', '2023-11-11', NULL);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Index pour la table `appartient`
--
ALTER TABLE `appartient`
  ADD PRIMARY KEY (`id_module`,`id_filiere`),
  ADD KEY `Appartient__module0_FK` (`id_filiere`);

--
-- Index pour la table `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`id_class`),
  ADD KEY `class__filiere_FK` (`id_filiere`);

--
-- Index pour la table `concerner`
--
ALTER TABLE `concerner`
  ADD PRIMARY KEY (`id_seance`,`id_planning`),
  ADD KEY `concerner__planning0_FK` (`id_planning`);

--
-- Index pour la table `concerngroupe`
--
ALTER TABLE `concerngroupe`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_seance` (`id_seance`),
  ADD KEY `id_group` (`id_group`),
  ADD KEY `id_class` (`id_class`);

--
-- Index pour la table `demande`
--
ALTER TABLE `demande`
  ADD PRIMARY KEY (`id_demande`),
  ADD KEY `_demande__enseignant_FK` (`id_enseignant`),
  ADD KEY `_demande__admin_FK` (`id_admin`);

--
-- Index pour la table `disponibilite`
--
ALTER TABLE `disponibilite`
  ADD PRIMARY KEY (`id_dispo`),
  ADD KEY `disponiblite_enseignant_FK` (`id_enseignant`),
  ADD KEY `lundi` (`MONDAY`),
  ADD KEY `mardi` (`TUESDAY`),
  ADD KEY `mercredi` (`WEDNESDAY`),
  ADD KEY `jeudi` (`THURSDAY`),
  ADD KEY `vendredi` (`FRIDAY`),
  ADD KEY `samedi` (`SATURDAY`),
  ADD KEY `dimanche` (`SUNDAY`);

--
-- Index pour la table `disponibilite_salle`
--
ALTER TABLE `disponibilite_salle`
  ADD PRIMARY KEY (`id_dispo_salle`),
  ADD KEY `id_salle` (`id_salle_salle`);

--
-- Index pour la table `element_module`
--
ALTER TABLE `element_module`
  ADD PRIMARY KEY (`id_element_module`),
  ADD KEY `element_module__module_FK` (`id_module`);

--
-- Index pour la table `enseignant`
--
ALTER TABLE `enseignant`
  ADD PRIMARY KEY (`id_enseignant`);

--
-- Index pour la table `enseigne`
--
ALTER TABLE `enseigne`
  ADD PRIMARY KEY (`id_element_module`,`id_enseignant`),
  ADD KEY `enseigne_enseignant_FK` (`id_enseignant`);

--
-- Index pour la table `est_plannifier`
--
ALTER TABLE `est_plannifier`
  ADD PRIMARY KEY (`id_seance`,`id_element_module`),
  ADD KEY `est_plannifier__element_module0_FK` (`id_element_module`);

--
-- Index pour la table `etudiant`
--
ALTER TABLE `etudiant`
  ADD PRIMARY KEY (`id_etudiant`),
  ADD KEY `etudiant__groupe0_FK` (`id_group`);

--
-- Index pour la table `filiere`
--
ALTER TABLE `filiere`
  ADD PRIMARY KEY (`id_filiere`);

--
-- Index pour la table `groupe`
--
ALTER TABLE `groupe`
  ADD PRIMARY KEY (`id_group`),
  ADD KEY `groupe__class_FK` (`id_class`),
  ADD KEY `id_planning` (`id_planning`);

--
-- Index pour la table `horaire`
--
ALTER TABLE `horaire`
  ADD PRIMARY KEY (`id_horaire`);

--
-- Index pour la table `module`
--
ALTER TABLE `module`
  ADD PRIMARY KEY (`id_module`);

--
-- Index pour la table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id_notification`),
  ADD UNIQUE KEY `unique_seance_type` (`id_seance`,`type_seance`),
  ADD KEY `id_enseignant` (`id_enseignant`),
  ADD KEY `id_group` (`id_group`);

--
-- Index pour la table `planning`
--
ALTER TABLE `planning`
  ADD PRIMARY KEY (`id_planning`),
  ADD KEY `planning__admin_FK` (`id_admin`);

--
-- Index pour la table `salle`
--
ALTER TABLE `salle`
  ADD PRIMARY KEY (`id_salle`);

--
-- Index pour la table `seance`

--
ALTER TABLE `seance`
  ADD PRIMARY KEY (`id_seance`),
  ADD UNIQUE KEY `unique_id_commentaire_semaine` (`id_semaine`,`commentaire_seance`),
  ADD KEY `seance__salle_FK` (`id_salle`),
  ADD KEY `fk_semaine` (`id_semaine`);

--
-- Index pour la table `semaine`
--
ALTER TABLE `semaine`
  ADD PRIMARY KEY (`id_semaine`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `class`
--
ALTER TABLE `class`
  MODIFY `id_class` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `concerngroupe`
--
ALTER TABLE `concerngroupe`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT pour la table `demande`
--
ALTER TABLE `demande`
  MODIFY `id_demande` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `disponibilite`
--
ALTER TABLE `disponibilite`
  MODIFY `id_dispo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `disponibilite_salle`
--
ALTER TABLE `disponibilite_salle`
  MODIFY `id_dispo_salle` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `element_module`
--
ALTER TABLE `element_module`
  MODIFY `id_element_module` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `enseignant`
--
ALTER TABLE `enseignant`
  MODIFY `id_enseignant` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `etudiant`
--
ALTER TABLE `etudiant`
  MODIFY `id_etudiant` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `filiere`
--
ALTER TABLE `filiere`
  MODIFY `id_filiere` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `groupe`
--
ALTER TABLE `groupe`
  MODIFY `id_group` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `horaire`
--
ALTER TABLE `horaire`
  MODIFY `id_horaire` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `module`
--
ALTER TABLE `module`
  MODIFY `id_module` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `planning`
--
ALTER TABLE `planning`
  MODIFY `id_planning` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `salle`
--
ALTER TABLE `salle`
  MODIFY `id_salle` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `seance`
--
ALTER TABLE `seance`
  MODIFY `id_seance` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- AUTO_INCREMENT pour la table `semaine`
--
ALTER TABLE `semaine`
  MODIFY `id_semaine` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `appartient`
--
ALTER TABLE `appartient`
  ADD CONSTRAINT `Appartient__module0_FK` FOREIGN KEY (`id_filiere`) REFERENCES `filiere` (`id_filiere`),
  ADD CONSTRAINT `Appartient_class_FK` FOREIGN KEY (`id_module`) REFERENCES `module` (`id_module`);

--
-- Contraintes pour la table `class`
--
ALTER TABLE `class`
  ADD CONSTRAINT `class__filiere_FK` FOREIGN KEY (`id_filiere`) REFERENCES `filiere` (`id_filiere`);

--
-- Contraintes pour la table `concerner`
--
ALTER TABLE `concerner`
  ADD CONSTRAINT `concerner__planning0_FK` FOREIGN KEY (`id_planning`) REFERENCES `planning` (`id_planning`),
  ADD CONSTRAINT `concerner__seance_FK` FOREIGN KEY (`id_seance`) REFERENCES `seance` (`id_seance`);

--
-- Contraintes pour la table `concerngroupe`
--
ALTER TABLE `concerngroupe`
  ADD CONSTRAINT `concerngroupe_ibfk_1` FOREIGN KEY (`id_seance`) REFERENCES `seance` (`id_seance`),
  ADD CONSTRAINT `concerngroupe_ibfk_2` FOREIGN KEY (`id_group`) REFERENCES `groupe` (`id_group`),
  ADD CONSTRAINT `concerngroupe_ibfk_3` FOREIGN KEY (`id_class`) REFERENCES `class` (`id_class`);

--
-- Contraintes pour la table `demande`
--
ALTER TABLE `demande`
  ADD CONSTRAINT `_demande__admin0_FK` FOREIGN KEY (`id_admin`) REFERENCES `admin` (`id_admin`),
  ADD CONSTRAINT `_demande__enseignant_FK` FOREIGN KEY (`id_enseignant`) REFERENCES `enseignant` (`id_enseignant`);

--
-- Contraintes pour la table `disponibilite`
--
ALTER TABLE `disponibilite`
  ADD CONSTRAINT `disponibilite_ibfk_1` FOREIGN KEY (`MONDAY`) REFERENCES `horaire` (`id_horaire`),
  ADD CONSTRAINT `disponibilite_ibfk_2` FOREIGN KEY (`TUESDAY`) REFERENCES `horaire` (`id_horaire`),
  ADD CONSTRAINT `disponibilite_ibfk_3` FOREIGN KEY (`WEDNESDAY`) REFERENCES `horaire` (`id_horaire`),
  ADD CONSTRAINT `disponibilite_ibfk_4` FOREIGN KEY (`THURSDAY`) REFERENCES `horaire` (`id_horaire`),
  ADD CONSTRAINT `disponibilite_ibfk_5` FOREIGN KEY (`FRIDAY`) REFERENCES `horaire` (`id_horaire`),
  ADD CONSTRAINT `disponibilite_ibfk_6` FOREIGN KEY (`SATURDAY`) REFERENCES `horaire` (`id_horaire`),
  ADD CONSTRAINT `disponibilite_ibfk_7` FOREIGN KEY (`SUNDAY`) REFERENCES `horaire` (`id_horaire`),
  ADD CONSTRAINT `disponiblite_enseignant_FK` FOREIGN KEY (`id_enseignant`) REFERENCES `enseignant` (`id_enseignant`);

--
-- Contraintes pour la table `disponibilite_salle`
--
ALTER TABLE `disponibilite_salle`
  ADD CONSTRAINT `disponibilite_salle_ibfk_1` FOREIGN KEY (`id_salle_salle`) REFERENCES `salle` (`id_salle`);

--
-- Contraintes pour la table `element_module`
--
ALTER TABLE `element_module`
  ADD CONSTRAINT `element_module__module_FK` FOREIGN KEY (`id_module`) REFERENCES `module` (`id_module`);

--
-- Contraintes pour la table `enseigne`
--
ALTER TABLE `enseigne`
  ADD CONSTRAINT `enseigne__element_module_FK` FOREIGN KEY (`id_element_module`) REFERENCES `element_module` (`id_element_module`),
  ADD CONSTRAINT `enseigne_enseignant0_FK` FOREIGN KEY (`id_enseignant`) REFERENCES `enseignant` (`id_enseignant`);

--
-- Contraintes pour la table `est_plannifier`
--
ALTER TABLE `est_plannifier`
  ADD CONSTRAINT `est_plannifier__element_module0_FK` FOREIGN KEY (`id_element_module`) REFERENCES `element_module` (`id_element_module`),
  ADD CONSTRAINT `est_plannifier__seance_FK` FOREIGN KEY (`id_seance`) REFERENCES `seance` (`id_seance`);

--
-- Contraintes pour la table `etudiant`
--
ALTER TABLE `etudiant`
  ADD CONSTRAINT `etudiant__groupe0_FK` FOREIGN KEY (`id_group`) REFERENCES `groupe` (`id_group`);

--
-- Contraintes pour la table `groupe`
--
ALTER TABLE `groupe`
  ADD CONSTRAINT `groupe__class_FK` FOREIGN KEY (`id_class`) REFERENCES `class` (`id_class`),
  ADD CONSTRAINT `id_planning` FOREIGN KEY (`id_planning`) REFERENCES `planning` (`id_planning`);

--
-- Contraintes pour la table `notifications`
--
ALTER TABLE `notifications`
  ADD CONSTRAINT `notifications_ibfk_1` FOREIGN KEY (`id_seance`) REFERENCES `seance` (`id_seance`),
  ADD CONSTRAINT `notifications_ibfk_2` FOREIGN KEY (`id_enseignant`) REFERENCES `enseignant` (`id_enseignant`),
  ADD CONSTRAINT `notifications_ibfk_3` FOREIGN KEY (`id_group`) REFERENCES `groupe` (`id_group`);

--
-- Contraintes pour la table `planning`
--
ALTER TABLE `planning`
  ADD CONSTRAINT `planning__admin_FK` FOREIGN KEY (`id_admin`) REFERENCES `admin` (`id_admin`);

--


--
-- Contraintes pour la table `seance`
--
ALTER TABLE `seance`
  ADD CONSTRAINT `fk_semaine` FOREIGN KEY (`id_semaine`) REFERENCES `semaine` (`id_semaine`),
  ADD CONSTRAINT `seance__salle_FK` FOREIGN KEY (`id_salle`) REFERENCES `salle` (`id_salle`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;