-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : mar. 03 nov. 2020 à 14:23
-- Version du serveur :  10.3.25-MariaDB-0+deb10u1
-- Version de PHP : 7.3.19-1~deb10u1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `comptes`
--

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

CREATE TABLE `client` (
  `id` int(11) NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `prenom` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `adresse` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ville` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `codeposte` int(11) DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telephone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `commentaire` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `societe` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Structure de la table `codecomptable`
--

CREATE TABLE `codecomptable` (
  `id` int(11) NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `codecomptable`
--

INSERT INTO `codecomptable` (`id`, `type`) VALUES
(1, '100000 - Fonds associatif et réserves'),
(2, '110000 - Report à nouveau'),
(3, '120000 - Résultat de l’exercice'),
(4, '130000 - Subventions d’investissement'),
(5, '150000 - Provisions pour risques et charges'),
(6, '160000 - Emprunts et dettes assimilées'),
(7, '180000 - Comptes de liaison des établissements'),
(8, '190000 - Projet associatif et fonds dédiés'),
(9, '200000 - Immobilisations incorporelles'),
(10, '210000 - Immobilisations corporelles'),
(11, '230000 - Immobilisations en cours'),
(12, '270000 - Autres immobilisations financières'),
(13, '280000 - Amortissements des immobilisations'),
(14, '290000 - Provisions pour dépréciation des immobilisations'),
(15, '310000 - Matières premières et fournitures'),
(16, '320000 - Autres approvisionnements'),
(17, '330000 - En-cours de production de biens'),
(18, '340000 - En-cours de production de services'),
(19, '350000 - Stocks de produits'),
(20, '370000 - Stocks de marchandises'),
(21, '390000 - Provisions pour dépréciation des stocks et en-cours'),
(22, '400000 - Fournisseurs et comptes rattachés'),
(23, '410000 - Usagers et comptes rattachés'),
(24, '420000 - Personnel et compte rattachés'),
(25, '430000 - Sécurité sociale et autres organismes sociaux'),
(26, '440000 - Etat et autres collectivités publiques'),
(27, '445000 - Etat - Taxes sur le chiffre d\'affaires (TVA)'),
(28, '450000 - Confédération, fédération, unions, associations affiliées'),
(29, '460000 - Débiteurs divers et créditeurs divers'),
(30, '470000 - Comptes d’attente'),
(31, '480000 - Comptes de régularisation'),
(32, '490000 - Provisions pour dépréciation des comptes de tiers'),
(33, '500000 - Valeurs mobilières de placement'),
(34, '510000 - Banques, établissements financiers et assimilés'),
(35, '512000 - Banque'),
(36, '530000 - Caisse'),
(37, '540000 - Régies d’avances et accréditifs'),
(38, '580000 - Virement interne'),
(39, '590000 - Provisions pour dépréciation des comptes financiers'),
(40, '600000 - Achats'),
(41, '610000 - Services extérieurs'),
(42, '613000 - Locations'),
(43, '615000 - Entretien et réparations'),
(44, '620000 - Autres services extérieurs'),
(45, '625000 - Déplacements, missions et réceptions'),
(46, '626000 - Frais postaux et frais de télécommunications'),
(47, '627000 - Services bancaires et assimilés'),
(48, '628000 - Frais Divers'),
(49, '628100 - Cotisations (liées à l\'activité économique)'),
(50, '630000 - Impôts, taxes et versements assimilés'),
(51, '640000 - Charges de personnel'),
(52, '641000 - Rémunérations du personnel'),
(53, '645000 - Charges de sécurité sociale et de prévoyance'),
(54, '650000 - Autres charges de gestion courante'),
(55, '660000 - Charges financières'),
(56, '670000 - Charges exceptionnelles'),
(57, '680000 - Dotations aux amortissement'),
(58, '700000 - Ventes de produits finis, prestations de services, marchandises'),
(59, '710000 - Production stockée (ou déstockage)'),
(60, '720000 - Production immobilisée'),
(61, '740000 - Subvention d\'exploitation'),
(62, '750000 - Autres produits de gestion courante'),
(63, '754000 - Collectes et dons'),
(64, '756000 - Cotisations'),
(65, '760000 - Produits financiers'),
(66, '770000 - Produits exceptionnels'),
(67, '780000 - reprises sur amortissements et provisions'),
(68, '790000 - Transferts de charges'),
(69, '791000 - Transferts de charges d\'exploitation'),
(70, '860000 - Répartition par nature de charges'),
(71, '862000 - Prestations'),
(72, '864000 - Personnel bénévole'),
(73, '870000 - Répartition par nature de ressources'),
(74, '870001 - Bénévolat'),
(75, '871000 - Prestations en nature'),
(76, '875000 - Dons en nature');

-- --------------------------------------------------------

--
-- Structure de la table `compte`
--

CREATE TABLE `compte` (
  `id` int(11) NOT NULL,
  `codecompta_id` int(11) DEFAULT NULL,
  `date` date NOT NULL,
  `montant` double NOT NULL,
  `commentaire` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fichier` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `client_id` int(11) DEFAULT NULL,
  `comptable_id` int(11) DEFAULT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `doctrine_migration_versions`
--

CREATE TABLE `doctrine_migration_versions` (
  `version` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `doctrine_migration_versions`
--

INSERT INTO `doctrine_migration_versions` (`version`, `executed_at`, `execution_time`) VALUES
('DoctrineMigrations\\Version20201028101808', '2020-10-28 11:18:28', 64),
('DoctrineMigrations\\Version20201028115439', '2020-10-28 12:54:43', 36),
('DoctrineMigrations\\Version20201028132541', '2020-10-28 14:25:45', 60),
('DoctrineMigrations\\Version20201028210922', '2020-10-28 22:14:08', 32),
('DoctrineMigrations\\Version20201028211323', '2020-10-28 22:14:23', 17),
('DoctrineMigrations\\Version20201101133247', '2020-11-01 14:33:46', 58),
('DoctrineMigrations\\Version20201101135210', '2020-11-01 14:52:14', 33);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `nom`, `email`, `password`) VALUES
(1, 'demo', 'demo@demo.demo', '$argon2id$v=19$m=65536,t=4,p=1$7aUoeZhCSSBkLwnBwmy2BQ$hampV4LGMp3PJ7Xl39Yv5KDqe9VFO7Twh48oniLWdMc');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `codecomptable`
--
ALTER TABLE `codecomptable`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `compte`
--
ALTER TABLE `compte`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_CFF65260AAE6CC3C` (`codecompta_id`),
  ADD KEY `IDX_CFF6526019EB6921` (`client_id`),
  ADD KEY `IDX_CFF65260BA52A149` (`comptable_id`);

--
-- Index pour la table `doctrine_migration_versions`
--
ALTER TABLE `doctrine_migration_versions`
  ADD PRIMARY KEY (`version`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `client`
--
ALTER TABLE `client`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT pour la table `codecomptable`
--
ALTER TABLE `codecomptable`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT pour la table `compte`
--
ALTER TABLE `compte`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `compte`
--
ALTER TABLE `compte`
  ADD CONSTRAINT `FK_CFF6526019EB6921` FOREIGN KEY (`client_id`) REFERENCES `client` (`id`),
  ADD CONSTRAINT `FK_CFF65260AAE6CC3C` FOREIGN KEY (`codecompta_id`) REFERENCES `codecomptable` (`id`),
  ADD CONSTRAINT `FK_CFF65260BA52A149` FOREIGN KEY (`comptable_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
