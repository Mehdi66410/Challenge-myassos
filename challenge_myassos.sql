-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le :  mar. 28 nov. 2017 à 18:39
-- Version du serveur :  5.7.20
-- Version de PHP :  7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `cakephp_site`
--

-- --------------------------------------------------------

--
-- Structure de la table `acteurs`
--

CREATE TABLE `acteurs` (
  `id_acteur` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `date_naissance` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `acteurs`
--

INSERT INTO `acteurs` (`id_acteur`, `nom`, `prenom`, `date_naissance`) VALUES
(1, 'Reynolds', 'Ryan', '1976-10-24'),
(2, 'Bale', 'Christian', '1974-01-30'),
(3, 'Travolta', 'John', '1954-01-18'),
(4, 'Cruise', 'Tom', '1962-07-03'),
(5, 'Pitt', 'Brad', '1963-12-18'),
(6, 'Neeson', 'Liam', '1952-06-07');

-- --------------------------------------------------------

--
-- Structure de la table `favoris`
--

CREATE TABLE `favoris` (
  `id_favoris` int(20) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_film` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `films`
--

CREATE TABLE `films` (
  `id_film` int(11) NOT NULL,
  `titre` varchar(255) NOT NULL,
  `id_acteur` int(11) NOT NULL,
  `genre` varchar(255) NOT NULL,
  `date_sortie` date NOT NULL,
  `duree` int(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `films`
--

INSERT INTO `films` (`id_film`, `titre`, `id_acteur`, `genre`, `date_sortie`, `duree`) VALUES
(1, 'Deadpool', 1, 'Super-héros', '2016-02-10', 108),
(2, 'The Dark Knight', 2, 'Super-héro', '2008-07-18', 152),
(3, 'Pulp Fiction', 3, 'Crime', '1994-10-14', 154),
(4, 'Greese', 3, 'Danse', '1978-06-17', 110),
(5, 'Top Gun', 4, 'Action', '1986-05-16', 110),
(6, 'Mission Impossible 2', 4, 'Action', '2000-05-24', 123),
(7, 'Fight Club', 5, 'Action', '1999-10-15', 139),
(8, 'L\'étrange histoire de Benjamin Button', 5, 'Drame', '2008-12-25', 166),
(9, 'La liste de Schindler', 6, 'Drame', '1994-02-04', 195),
(10, 'Taken', 6, 'Action', '2009-01-30', 93);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `password` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id_user`, `password`, `username`, `nom`, `prenom`) VALUES
(1, '$2y$10$AiZWYmQhq5zbWc/LoH7Kp.GuJr.CXV.fD6rqhQUt9HPFHSKcPsoGq', 'admin', 'my_assos', 'my_assos'),
(21, '$2y$10$4uFBVkdJ23YiCDWkD8Ywlu4rZqRggsE50R8y0PLJZnIEsJVPPu5nW', 'Toto', 'toto', 'toto');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `acteurs`
--
ALTER TABLE `acteurs`
  ADD PRIMARY KEY (`id_acteur`);

--
-- Index pour la table `favoris`
--
ALTER TABLE `favoris`
  ADD PRIMARY KEY (`id_favoris`),
  ADD KEY `fk_foreign_id_user` (`id_user`),
  ADD KEY `fk_foreign_id_film` (`id_film`);

--
-- Index pour la table `films`
--
ALTER TABLE `films`
  ADD PRIMARY KEY (`id_film`),
  ADD KEY `fk_foreign_id_acteur` (`id_acteur`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `acteurs`
--
ALTER TABLE `acteurs`
  MODIFY `id_acteur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `favoris`
--
ALTER TABLE `favoris`
  MODIFY `id_favoris` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=128;

--
-- AUTO_INCREMENT pour la table `films`
--
ALTER TABLE `films`
  MODIFY `id_film` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `favoris`
--
ALTER TABLE `favoris`
  ADD CONSTRAINT `fk_foreign_id_film` FOREIGN KEY (`id_film`) REFERENCES `films` (`id_film`),
  ADD CONSTRAINT `fk_foreign_id_user` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`);

--
-- Contraintes pour la table `films`
--
ALTER TABLE `films`
  ADD CONSTRAINT `fk_foreign_id_acteur` FOREIGN KEY (`id_acteur`) REFERENCES `acteurs` (`id_acteur`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
