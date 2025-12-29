-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : lun. 29 déc. 2025 à 18:14
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
-- Base de données : `fage_bdd`
--

-- --------------------------------------------------------

--
-- Structure de la table `actualite`
--

CREATE TABLE `actualite` (
  `id_actu` int(11) NOT NULL,
  `titre` varchar(255) NOT NULL,
  `contenu` text NOT NULL,
  `image_url` varchar(255) DEFAULT NULL,
  `date_publication` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `actualite`
--

INSERT INTO `actualite` (`id_actu`, `titre`, `contenu`, `image_url`, `date_publication`) VALUES
(11, 'Les AGORAé : La solidarité au cœur des campus', 'Face à la précarité étudiante grandissante, le réseau de la FAGE continue de développer ses épiceries solidaires : les AGORAé. Bien plus que de l\'aide alimentaire, ces lieux sont de véritables espaces de vie et d\'échange pour rompre l\'isolement social.\r\n\r\nEn cette rentrée 2025, nous comptons ouvrir 5 nouvelles structures sur le territoire. L\'objectif est simple : permettre à chaque étudiant de se nourrir sainement sans sacrifier sa réussite scolaire. Nous rappelons que l\'accès est ouvert sur dossier pour tous les étudiants en difficulté. N\'hésitez pas à vous rapprocher de votre association locale pour en savoir plus.', 'https://images.unsplash.com/photo-1593113598332-cd288d649433?q=80&w=1000&auto=format&fit=crop', '2025-12-26 12:53:09'),
(12, 'Coût de la rentrée 2025 : La FAGE tire la sonnette d\'alarme', 'Comme chaque année, la FAGE publie son indicateur du coût de la rentrée. Le constat est sans appel : les frais de vie courante (logement, alimentation, transports) ont augmenté de 4% par rapport à l\'année dernière.\r\n\r\nCette inflation pèse lourdement sur les boursiers comme sur les étudiants non-boursiers. Nous demandons au gouvernement une réforme structurelle des bourses et un gel des loyers Crous. La FAGE rencontrera le ministère de l\'Enseignement Supérieur la semaine prochaine pour porter ces revendications et défendre votre pouvoir d\'achat. Restez mobilisés !', 'https://images.unsplash.com/photo-1523240795612-9a054b0db644?q=80&w=1000&auto=format&fit=crop', '2025-12-26 12:53:40'),
(13, 'Élections étudiantes : Prenez le pouvoir sur votre avenir !', 'Voter, c\'est faire entendre sa voix. Les élections des représentants étudiants aux conseils centraux (CA, CFVU) approchent à grands pas. C\'est le moment de choisir ceux qui porteront vos projets pédagogiques et écologiques au sein de l\'université.\r\n\r\nLa FAGE et ses associations locales présentent des listes engagées pour une université plus inclusive, plus verte et plus démocratique. Ne laissez pas les autres décider à votre place. Retrouvez les dates de scrutin de votre établissement sur notre site et allez voter !', 'https://images.unsplash.com/photo-1541829070764-84a7d30dd3f3?q=80&w=1000&auto=format&fit=crop', '2025-12-26 12:54:08'),
(15, 'Semaine du Bien-être : La santé mentale avant tout', 'Le stress des examens ne doit pas être une fatalité. La FAGE lance sa grande campagne de sensibilisation sur la santé mentale des jeunes. Au programme : ateliers de sophrologie, groupes de parole et distribution de guides pratiques sur tous les campus partenaires. Prenez soin de vous, votre réussite en dépend.', 'https://www.paho.org/sites/default/files/styles/max_650x650/public/2025-04/2024wellness-week-web-banner-frparaweb.jpg?itok=xmZQAcpq', '2025-12-28 11:21:38'),
(16, 'ransition Écologique : Les étudiants s’engagent', 'Face à l’urgence climatique, les associations étudiantes passent à l’action. Ce mois-ci, nous mettons en lumière les initiatives locales : friperies solidaires, jardins partagés sur les campus et ateliers \"Zéro Déchet\". Rejoignez le mouvement et découvrez comment agir à votre échelle pour un campus plus vert.', 'https://www.anciela.info/wp-content/uploads/2022/03/couv-FB-rencontre-EEA.png', '2025-12-28 11:22:15'),
(17, 'Sport Universitaire : Les inscriptions sont ouvertes !', 'Envie de décompresser après les cours ? Le service des sports de l’université, en partenariat avec la FAGE, ouvre ses inscriptions pour le semestre. Football, Danse, Escalade ou Yoga... il y en a pour tous les goûts. Le sport est un vecteur de lien social et de réussite universitaire. N’attendez plus pour prendre votre licence !', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR0AOdAwdxx-VI7V5RCBn7EWJ3A_lXDAuo1dg&s', '2025-12-28 11:22:46');

-- --------------------------------------------------------

--
-- Structure de la table `benevole`
--

CREATE TABLE `benevole` (
  `id_benevole` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mot_de_passe` varchar(255) NOT NULL,
  `role` enum('admin','responsable','benevole') DEFAULT 'benevole',
  `date_creation` datetime DEFAULT current_timestamp(),
  `id_mission` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `benevoles`
--

CREATE TABLE `benevoles` (
  `id_benevole` int(11) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `prenom` varchar(100) NOT NULL,
  `email` varchar(150) NOT NULL,
  `mot_de_passe` varchar(255) NOT NULL,
  `role` varchar(50) DEFAULT 'benevole',
  `id_mission` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `benevoles`
--

INSERT INTO `benevoles` (`id_benevole`, `nom`, `prenom`, `email`, `mot_de_passe`, `role`, `id_mission`) VALUES
(1, 'Patron', 'Admin', 'admin@fage.fr', 'admin', 'admin', NULL),
(2, 'Dupont', 'Jean', 'jean@test.fr', '1234', 'benevole', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `missions`
--

CREATE TABLE `missions` (
  `id_mission` int(11) NOT NULL,
  `titre` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `lieu` varchar(100) DEFAULT NULL,
  `date_mission` datetime NOT NULL,
  `nb_benevoles_requis` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `missions`
--

INSERT INTO `missions` (`id_mission`, `titre`, `description`, `lieu`, `date_mission`, `nb_benevoles_requis`) VALUES
(6, 'Collecte Alimentaire', 'Nous avons besoin de bras pour notre grande distribution mensuelle ! Vos missions : Accueillir les étudiants bénéficiaires. Aider à la constitution des paniers (fruits, légumes, produits secs). Servir le café et discuter pour briser l&amp;#039;isolement. Bonne humeur obligatoire\r\n\r\n', 'Paris 15', '2026-01-14 10:30:00', 10);

-- --------------------------------------------------------

--
-- Structure de la table `newsletter`
--

CREATE TABLE `newsletter` (
  `id_inscrit` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `organisation` varchar(100) DEFAULT NULL,
  `date_inscription` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `newsletter`
--

INSERT INTO `newsletter` (`id_inscrit`, `nom`, `prenom`, `email`, `organisation`, `date_inscription`) VALUES
(8, 'Mebaley Kahel', 'Ethan', 'ethanmkp@gmail.com', 'IUT Paris Rive de Seine', '2025-12-26 14:08:40'),
(9, 'Rawsowski', 'Bob', 'BobRawsowski@gmail.com', 'Sorbonne université', '2025-12-26 14:09:28');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `actualite`
--
ALTER TABLE `actualite`
  ADD PRIMARY KEY (`id_actu`);

--
-- Index pour la table `benevole`
--
ALTER TABLE `benevole`
  ADD PRIMARY KEY (`id_benevole`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Index pour la table `benevoles`
--
ALTER TABLE `benevoles`
  ADD PRIMARY KEY (`id_benevole`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Index pour la table `missions`
--
ALTER TABLE `missions`
  ADD PRIMARY KEY (`id_mission`);

--
-- Index pour la table `newsletter`
--
ALTER TABLE `newsletter`
  ADD PRIMARY KEY (`id_inscrit`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `actualite`
--
ALTER TABLE `actualite`
  MODIFY `id_actu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT pour la table `benevole`
--
ALTER TABLE `benevole`
  MODIFY `id_benevole` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `benevoles`
--
ALTER TABLE `benevoles`
  MODIFY `id_benevole` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `missions`
--
ALTER TABLE `missions`
  MODIFY `id_mission` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `newsletter`
--
ALTER TABLE `newsletter`
  MODIFY `id_inscrit` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
