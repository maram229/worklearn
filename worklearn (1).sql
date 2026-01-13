-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mar. 18 mars 2025 à 15:46
-- Version du serveur : 10.4.32-MariaDB
-- Version de PHP : 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `worklearn`
--

-- --------------------------------------------------------

--
-- Structure de la table `employes`
--

CREATE TABLE `employes` (
  `id` int(11) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `prenom` varchar(100) NOT NULL,
  `poste` varchar(100) NOT NULL,
  `service` varchar(100) NOT NULL,
  `telephone` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `formations` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `employes`
--

INSERT INTO `employes` (`id`, `nom`, `prenom`, `poste`, `service`, `telephone`, `email`, `formations`) VALUES
(3, 'sami', 'abid', 'technicien supérieure', 'Administrative et Financière', '25036558', 'abidsami@gamil.com', 'comptabilité et finance '),
(7, 'Salim', 'mouamed', 'responsable de bureau d\'ordre', 'Appui aux Associations et Coopératives', '95729840', 'mouhamedsalim11@gmail.com', 'Gestion de projet'),
(9, 'Chedli', 'morad', 'ingenieure', 'Planification et de Suivi des Projets', '25729840', 'Chedlimourad41@gmail.com', 'création d’une entreprise'),
(10, 'Amin', 'mouamed', 'ingenieure', 'Formation et de Communication', '21729840', 'maramsayhi41@gmail.com', 'Formation en Cybersécurité'),
(11, 'Selmi', 'malek', 'secritaire', 'direction des affaires adminestratives et financiéres', '55729840', 'malekselmi13@gmail.com', 'Secrétariat Bureautique'),
(12, 'morad', 'mariem', 'ingenieure', 'direction des etudes et de marketing', '21765908', 'mariemmourad@gmail.com', 'Commerce International'),
(14, 'Tlili', 'Chams', 'Ingenieur', 'Formation et de Communication', '94899503', 'tlilichamseddine@gmail.com', 'Sécurité informatique'),
(15, 'chedli', 'ali', 'responsable de l\'appui et de la promotion de l\'investissement', 'Appui aux Investissements', '94899503', 'maramsayhi31@gmail.com', 'Analyse Financière'),
(17, 'mariem', 'tester', 'secritaire', 'Marketing', '219949897', 'mariem@gmail.com', 'secritarit\r\nsecuriter ');

-- --------------------------------------------------------

--
-- Structure de la table `formations`
--

CREATE TABLE `formations` (
  `id` int(11) NOT NULL,
  `titre` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `formateur` varchar(100) NOT NULL,
  `catégorie` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `formations`
--

INSERT INTO `formations` (`id`, `titre`, `description`, `formateur`, `catégorie`) VALUES
(1, 'Réparation de cartes électroniques', 'Formation à la réparation de cartes électroniques.', 'Mourad hamem', 'Formations Métiers'),
(2, 'Gestion de projet', 'Formation en gestion de projet pour les managers', 'Amin abidi', 'Finance'),
(3, 'Marketing Digital', 'Formation pour apprendre les bases du marketing digital', 'Ali Semi', 'Formations Métiers'),
(4, 'Électricité Industrielle', 'Formation en installation et maintenance électrique industrielle', 'Monji aloui', 'Formations Métiers'),
(5, 'Assistant Médical', 'Formation en assistance médicale pour les étudiants en communication', 'Sami wefi', 'Assistant et Secrétariat'),
(6, 'Assistant Administratif', 'Formation en gestion administrative', 'Amir Jeleb', 'Assistant et Secrétariat'),
(7, 'Secrétariat Bureautique', 'Formation en gestion de bureau et outils bureautiques', 'Amir Mourad', 'Assistant et Secrétariat'),
(8, 'Comptabilité et finance', 'Formation en comptabilité et finance pour une année complète', 'Amira sali', 'Comptabilité'),
(9, 'Comptabilité Avancée', 'Formation avancée en comptabilité et gestion financière', 'abid sahli', 'Comptabilité'),
(10, 'Analyse Financière', 'Formation pour comprendre et interpréter les états financiers', 'Salwa mbarek', 'Comptabilité'),
(11, 'Formation en Python', 'Apprenez Python pour le développement web et data science', 'Arij majri', 'Informatique'),
(12, 'Informatique Avancée pour les Entreprises', 'Formation sur l’utilisation des outils informatiques pour améliorer l’efficacité et la gestion des entreprises.', 'majid aayed', 'Informatique'),
(13, 'Formation en Cybersécurité', 'Apprenez les bonnes pratiques de sécurité informatique pour protéger les systèmes et les données.', 'abd ilkader ', 'Informatique'),
(14, 'Développement Web Full Stack', 'Apprenez à créer des applications web complètes', 'salah moumen', 'Informatique'),
(15, 'Graphisme et Design', 'Formation sur la création graphique', 'Safi ali', 'Design'),
(16, 'UI/UX Design', 'Formation sur la conception d’interfaces utilisateur modernes', 'Amin jeli', 'Design'),
(17, 'Animation 2D et 3D', 'Apprenez à créer des animations professionnelles', 'Sami sami', 'Design'),
(18, 'Commerce International', 'Formation en commerce et gestion internationale', 'Abir chedli', 'Commerce'),
(19, 'Stratégie de Vente et Négociation', 'Apprenez à optimiser vos ventes et négocier efficacement', 'samira hasni', 'Commerce'),
(20, 'e-commerce et Dropshipping', 'Formation pour créer et gérer un business en ligne', 'Ali ', 'Commerce'),
(21, 'Développement Durable', 'Apprenez les concepts du développement durable appliqués à différents secteurs.', 'assia ghanem', 'Environnement'),
(22, 'Gestion des Déchets et Recyclage', 'Formation sur les techniques modernes de gestion des déchets.', 'mariem selm', 'Environnement'),
(23, 'Énergies Renouvelables', 'Formation sur les énergies vertes et leur utilisation', 'mouhamed ali', 'Environnement'),
(25, 'Gestion de Startups', 'Apprenez les fondamentaux pour développer une startup', 'chayma mourad', 'Entrepreneuriat'),
(26, 'Levée de Fonds et Business Plan', 'Formation sur les stratégies de financement et la création d’un business plan', 'assil chafia', 'Entrepreneuriat'),
(27, 'Gestion des Ressources Humaines', 'Formation sur la gestion des talents, le recrutement et la gestion des conflits en entreprise.', 'sayef omran', 'Ressources Humaines'),
(28, 'Psychologie du Travail', 'Formation sur le bien-être des employés et la gestion du stress', 'rania amir', 'Ressources Humaines'),
(29, 'Recrutement et Stratégies RH', 'Formation sur les nouvelles méthodes de recrutement et gestion RH', 'fatma izahra', 'Ressources Humaines'),
(30, 'Leadership et Management', 'Développez vos compétences en leadership et apprenez à gérer des équipes de manière efficace.', 'Amal bouganem', 'Management'),
(31, 'Gestion du Temps et Productivité', 'Apprenez à organiser votre travail efficacement', 'amir bouzid', 'Management'),
(32, 'Gestion des Conflits', 'Formation pour apprendre à gérer et résoudre les conflits en entreprise', 'samira jbeli', 'Management'),
(33, 'Communication Interculturelle', 'Apprenez à gérer les différences culturelles et à améliorer la communication dans des environnements internationaux.', 'iyed aamri', 'Communication'),
(34, 'Prise de Parole en Public', 'Développez vos compétences en communication orale', 'hadeoui adem', 'Communication'),
(35, 'Rédaction Professionnelle', 'Formation pour améliorer la rédaction de documents professionnels', 'amin garsali', 'Communication'),
(36, 'Gestion de la Qualité', 'Formation sur les normes ISO et les pratiques de gestion de la qualité dans les entreprises.', 'chames heji', 'Qualité');

-- --------------------------------------------------------

--
-- Structure de la table `formations_utilisateurs`
--

CREATE TABLE `formations_utilisateurs` (
  `id` int(11) NOT NULL,
  `id_formations` int(11) NOT NULL,
  `id_utilisateurs` int(11) NOT NULL,
  `statut` enum('en attente','acceptée','refusée') DEFAULT 'en attente',
  `date_demande` datetime DEFAULT current_timestamp(),
  `date_debut` date DEFAULT NULL,
  `date_fin` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `formations_utilisateurs`
--

INSERT INTO `formations_utilisateurs` (`id`, `id_formations`, `id_utilisateurs`, `statut`, `date_demande`, `date_debut`, `date_fin`) VALUES
(8, 13, 32, 'acceptée', '2025-02-25 20:04:46', NULL, NULL),
(9, 11, 32, 'refusée', '2025-02-25 20:51:29', NULL, NULL),
(10, 11, 35, 'refusée', '2025-03-02 12:34:49', NULL, NULL),
(11, 18, 37, 'acceptée', '2025-03-11 10:49:28', NULL, NULL),
(12, 11, 38, 'en attente', '2025-03-17 14:38:16', NULL, NULL),
(13, 5, 40, 'refusée', '2025-03-18 15:34:00', NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `notifications`
--

CREATE TABLE `notifications` (
  `id` int(11) NOT NULL,
  `id_utilisateur` int(11) NOT NULL,
  `contenu` text NOT NULL,
  `date_creation` timestamp NOT NULL DEFAULT current_timestamp(),
  `statut` enum('non lue','lue') DEFAULT 'non lue'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `rapports`
--

CREATE TABLE `rapports` (
  `id` int(11) NOT NULL,
  `titre` varchar(255) NOT NULL,
  `contenu` text NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `rapports`
--

INSERT INTO `rapports` (`id`, `titre`, `contenu`, `date`) VALUES
(1, 'rapport du formation du angular', 'aaaaaaza', '2025-03-18 12:47:04'),
(2, 'rapport du formation du angular', 'ggggggggggggggggggg', '2025-03-18 13:08:29'),
(3, 'Gestion de Projet', '*Sujets Importants\nCycle de vie du projet\n*Planification\nGestion des risques\n*Participants\nali\nmouhamed\njihen\natef', '2025-03-18 13:11:04'),
(5, 'rapport du formation du angular', 'eqzrstdyfgui', '2025-03-18 15:34:57');

-- --------------------------------------------------------

--
-- Structure de la table `services`
--

CREATE TABLE `services` (
  `id` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `services`
--

INSERT INTO `services` (`id`, `nom`) VALUES
(1, 'Administrative et Financière'),
(2, 'Partenariats et de Coopération'),
(3, 'Etudes et de Développement Stratégique '),
(4, 'Formation et de Communication'),
(5, 'Appui aux Associations et Coopératives'),
(6, ' Affaires Juridiques '),
(7, 'Planification et de Suivi des Projets'),
(8, 'Appui aux Investissements'),
(9, 'Communication et Relations Publiques'),
(10, 'Coopération Internationale');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

CREATE TABLE `utilisateurs` (
  `id` int(11) NOT NULL,
  `nom` varchar(100) DEFAULT NULL,
  `prenom` varchar(100) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `role` enum('admin','employe') NOT NULL,
  `poste` varchar(100) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `telephone` varchar(20) DEFAULT NULL,
  `service_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id`, `nom`, `prenom`, `password`, `role`, `poste`, `email`, `telephone`, `service_id`) VALUES
(13, 'sayhi', 'maram', '$2y$10$HVgyxjZzuWFEr1joarbCMeufgMLimVno.Dy3Y5nqh8SeXtXjZZ3Ru', 'admin', NULL, NULL, NULL, NULL),
(32, 'abidi', 'aya', NULL, 'employe', NULL, 'ayaabidi@gmail.com', '25675897', 6),
(33, 'slimen', 'omar', '$2y$10$b8uVUiJilIYqmgisX1tYhOuWoSbii5KoHU.O/8H/WzuTB3yfWnvWW', 'employe', NULL, NULL, NULL, NULL),
(34, 'rabia', 'seli', '$2y$10$DXvXKUZ3YZsD94njXviyxeVR/4NLaluZYvcedw8vXrINlI.G26Us2', 'employe', NULL, NULL, NULL, NULL),
(35, 'rabia', 'seli', NULL, 'admin', NULL, 'rabia@gmail.com', '54342789', NULL),
(36, 'Testeur', 'test', '$2y$10$5akkC8wrNKGjrQBd5h0dGeBJ2gQjtIG1MPERZakk36GipjF7QOVJG', 'employe', NULL, NULL, NULL, NULL),
(37, 'Testeur', 'test', NULL, 'admin', NULL, 'test@gmail.com', '25036558', NULL),
(38, 'slimen', 'omar', NULL, 'admin', NULL, 'slimenomar@gmail.com', '21654786', NULL),
(39, 'aze', 'ftyyyr', '$2y$10$c0SdoBVx9hoW4lC7w6uOfeojrvN/j6mV7g4OE8//QFVF.iC16W34G', 'employe', NULL, NULL, NULL, NULL),
(40, 'aze', 'ftyyyr', NULL, 'admin', NULL, 'ftyyyr@gmail.com', '25036558', NULL);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `employes`
--
ALTER TABLE `employes`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `formations`
--
ALTER TABLE `formations`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `formations_utilisateurs`
--
ALTER TABLE `formations_utilisateurs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_participation` (`id_formations`,`id_utilisateurs`),
  ADD KEY `id_utilisateurs` (`id_utilisateurs`);

--
-- Index pour la table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_utilisateur` (`id_utilisateur`);

--
-- Index pour la table `rapports`
--
ALTER TABLE `rapports`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `service_id` (`service_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `employes`
--
ALTER TABLE `employes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT pour la table `formations`
--
ALTER TABLE `formations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT pour la table `formations_utilisateurs`
--
ALTER TABLE `formations_utilisateurs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT pour la table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `rapports`
--
ALTER TABLE `rapports`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `formations_utilisateurs`
--
ALTER TABLE `formations_utilisateurs`
  ADD CONSTRAINT `formations_utilisateurs_ibfk_1` FOREIGN KEY (`id_formations`) REFERENCES `formations` (`id`),
  ADD CONSTRAINT `formations_utilisateurs_ibfk_2` FOREIGN KEY (`id_utilisateurs`) REFERENCES `utilisateurs` (`id`);

--
-- Contraintes pour la table `notifications`
--
ALTER TABLE `notifications`
  ADD CONSTRAINT `notifications_ibfk_1` FOREIGN KEY (`id_utilisateur`) REFERENCES `utilisateurs` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD CONSTRAINT `utilisateurs_ibfk_1` FOREIGN KEY (`service_id`) REFERENCES `services` (`id`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
