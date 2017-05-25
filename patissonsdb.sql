-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Client :  127.0.0.1
-- Généré le :  Sam 20 Mai 2017 à 23:01
-- Version du serveur :  5.7.14
-- Version de PHP :  7.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `patissonsdb`
--

-- --------------------------------------------------------

--
-- Structure de la table `annonce`
--

CREATE TABLE `annonce` (
  `idAnnonce` int(11) NOT NULL,
  `titreAnnonce` varchar(64) NOT NULL,
  `texteAnnonce` text NOT NULL,
  `qteAnnonce` varchar(32) NOT NULL,
  `lotAnnonce` varchar(16) NOT NULL,
  `prixAnnonce` varchar(8) NOT NULL,
  `photo1Annonce` varchar(64) NOT NULL,
  `photo2Annonce` varchar(64) NOT NULL,
  `photo3Annonce` varchar(64) NOT NULL,
  `photo4Annonce` varchar(64) NOT NULL,
  `editeurAnnonce` int(11) NOT NULL,
  `validiteAnnonce` int(11) NOT NULL,
  `datePublicationAnnonce` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `annonce`
--

INSERT INTO `annonce` (`idAnnonce`, `titreAnnonce`, `texteAnnonce`, `qteAnnonce`, `lotAnnonce`, `prixAnnonce`, `photo1Annonce`, `photo2Annonce`, `photo3Annonce`, `photo4Annonce`, `editeurAnnonce`, `validiteAnnonce`, `datePublicationAnnonce`) VALUES
(1, 'Macarons au chocolat blanc', 'Magnifiques macarons au chocolat blanc.\r\nNe contiennent que des bonnes choses ! \r\n', 'Sur demande', '16 Macarons', '4', 'J15M05A2017C25R4437.jpg', 'J15M05A2017C25R1684.jpg', 'J15M05A2017C25R6173.jpg', 'J15M05A2017C25R8135.jpg', 26, 1, '2017-05-18'),
(2, 'Kougelhopf sucré aux raisins', 'Je vous propose des Kougelhopf sucré aux raisins, saupoudré de sucre glace.\r\nCuit dans un moule en terre.\r\nPossibilité d\'en faire d\'autres sur demande. ', 'Sur demande', '1', '4', 'J16M05A2017C25R3256.jpg', 'J16M05A2017C25R4256.jpg.JPG', 'J16M05A2017C25R7412.jpg', 'J16M05A2017C25R7856.jpg.jpg', 25, 1, '2017-05-18'),
(3, 'Moelleux au chocolat', 'Je vous propose des moelleux au chocolat.\r\nPossibilité de décoration sur mesure pour anniversaire par exemple.', 'Sur demande', '1', '8', 'J16M05A2017H11M24S38C25R7646.jpg', 'J16M05A2017H11M24S38C25R6346.jpg', '', '', 25, 1, '2017-05-18');

-- --------------------------------------------------------

--
-- Structure de la table `interet`
--

CREATE TABLE `interet` (
  `idInteret` int(11) NOT NULL,
  `nomInteret` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `interet`
--

INSERT INTO `interet` (`idInteret`, `nomInteret`) VALUES
(0, 'Achat'),
(1, 'Vente'),
(2, 'AchatVente');

-- --------------------------------------------------------

--
-- Structure de la table `note`
--

CREATE TABLE `note` (
  `idNote` int(11) NOT NULL,
  `codeNote` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `note`
--

INSERT INTO `note` (`idNote`, `codeNote`) VALUES
(1, 1),
(2, 2),
(3, 3),
(4, 4),
(5, 5);

-- --------------------------------------------------------

--
-- Structure de la table `recette`
--

CREATE TABLE `recette` (
  `idRecette` int(11) NOT NULL,
  `titreRecette` varchar(64) NOT NULL,
  `texteRecette` text NOT NULL,
  `IngredientsRecette` text NOT NULL,
  `photo1Recette` varchar(64) NOT NULL,
  `photo2Recette` varchar(64) NOT NULL,
  `photo3Recette` varchar(64) NOT NULL,
  `photo4Recette` varchar(64) NOT NULL,
  `dateRecette` date NOT NULL,
  `editeurRecette` int(11) NOT NULL,
  `couleurRecette` varchar(16) NOT NULL,
  `coutRecette` varchar(32) NOT NULL,
  `difficulteRecette` varchar(32) NOT NULL,
  `noteRecette` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `recette`
--

INSERT INTO `recette` (`idRecette`, `titreRecette`, `texteRecette`, `IngredientsRecette`, `photo1Recette`, `photo2Recette`, `photo3Recette`, `photo4Recette`, `dateRecette`, `editeurRecette`, `couleurRecette`, `coutRecette`, `difficulteRecette`, `noteRecette`) VALUES
(1, 'MACARONS AU CHOCOLAT BLANC', '1. Mettez les 35g de crème et le miel dans une casserole et portez à ébullition avant de verser sur le chocolat blanc haché.\r\nMélangez bien et ajoutez les 100g de crème bien froide, mélangez à nouveau tout doucement, sans fouetter. Recouvrez de film alimentaire et placez au frais au moins 3h.\r\n\r\n2. Réalisez l\'appareil à macarons selon la méthode choisie en incorporant le colorant alimentaire dans les blancs d’œufs montés en neige.\r\n\r\n3. Mettez l\'appareil dans la poche et dressez les macarons en dôme sur le tapis de cuisson posé sur une plaque de four. Tapez la plaque 2 à 3 fois sur le plan de travail pour chasser les bulles d\'air et laissez croûter 20 min.\r\n\r\n4. Faites cuire 20 min a 120°C (th.4).\r\nLaissez-les refroidir complètement avant de les détacher. Montez la ganache comme une chantilly avant d\'en garnir les macarons.', 'Recette coques initiales.\r\n+ 80g chocolat blanc\r\n+ 35g de crème liquide\r\n+ 100g de crème liquide froide\r\n+ 1 cuil. à café de miel', 'macaronsauchocolatblanc030520170001P1.jpg', 'macaronsauchocolatblanc030520170001P2.jpg', 'macaronsauchocolatblanc030520170001P3.jpg', 'macaronsauchocolatblanc030520170001P4.jpg', '2017-05-03', 25, '#c0392b', '12', 'Moyenne', 4),
(2, 'moelleux au chocolat', 'faire fondre le chocolat.\r\nAjouter le beurre en morceaux peu à peu et l\'incorporer pour obtenir un crème bien lisse.\r\nMettre la farine et le sucre glace dans un saladier. Ajouter les oeufs entiers et mélanger jusqu\'à obtention d\'une émulsion homogène.\r\nVerser le mélange chocolat-beurre sur cette préparation. Mélanger.\r\nBeurrer et fariner 6 moules individuels ou un grand moule.\r\nVerser la préparation et mettre à four chaud (200°C) - 10 min pour les petits gâteaux, 15 pour le grand.\r\nServir tiède avec une crème anglaise (le centre doit être coulant) ou servir froid nappé de ganache au chocolat.', '- 250 g de chocolat\r\n- 175 g de beurre\r\n- 125 g de sucre glace\r\n- 75 g de farine\r\n- 5 oeufs', 'moelleux-au-chocolatXXXX.jpg', '', '', '', '2017-05-17', 25, '#9b59b6', '6', 'Facile', 5),
(3, 'Fraisier', 'Préparation de la recette :\r\n\r\nPrévoir 6 h de réfrigération.\r\nPréchauffez le four à thermostat 6 (180°C).\r\nBattez les oeufs entiers avec le sucre dans un saladier. Placez le saladier dans un bain-marie modéré et continuez de fouetter le mélange jusqu\'à ce qu\'il triple de volume. Retirez du feu et continuez de battre jusqu\'à refroidissement.\r\nIncorporez la farine et le beurre fondu. Versez dans un moule carré, beurré et fariné. Enfournez et laissez cuire 25 à 30mn.\r\nDémoulez la génoise tiède sur une grill.\r\nPortez le lait à ébullition. Battez les jaunes d\'oeufs et le sucre jusqu\'à blanchiment du mélange, puis incorporez la maïzena. Délayez avec le lait, transvasez la crème dans une casserole à fond épais.\r\nPortez à ébullition et remuez 1mn.\r\nHors du feu, incorporez le tiers du beurre coupé en morceaux avec la moitié du kirsch. Saupoudrez de sucre glace et laissez refroidir cette crème pâtissière.\r\nBattez au robot le reste du beurre en pommade, puis ajoutez peu à peu la crème pâtissière froide.\r\nBattez jusqu\'à ce que le mélange soit lisse et homogène, puis faites-le raffermir 15 mn au frais.\r\nLavez, séchez et équeutez les fraises. Réservez 5 cuillères à soupe de crème pour la finition.\r\nDécoupez la génoise en deux dans le sens de l\'épaisseur. Imbibez-la de sirop mélangé à 2 cuillères à soupe d\'eau et au reste de kirsch.\r\nPosez un des carrés sur un plat, masquez-le de crème et posez les plus grosses fraises sur le bord, la pointe vers le haut.\r\nContinuez à garnir l\'intérieur de fraises et couvrez-les de crème.\r\nPosez le deuxième carré de biscuit et tartinez le dessus avec le reste de crème.\r\nPlacez le gâteau au frais, au moins 6 heures.\r\nAvec un couteau tranchant, coupez le tour du fraisier à la verticale, à 1cm de bord.\r\nAbaissez la pâte d\'amande rose sue 2mm et recouvrez-en le dessus du fraisier.\r\nDécorez de fraises des bois, de framboises et de feuilles en pâte d\'amande verte et rose.\r\nservez le fraisier entier ou en parts.', 'Pour la génoise :\r\n- 5 oeufs\r\n- 125 g de sucre\r\n- 30 g de farine\r\n- 70 g de maïzena\r\n- 1/2 sachet de levure\r\n- 1 pincée de sel\r\n\r\nPour la garniture :\r\n- 35 cl de lait\r\n- 4 jaunes d\'oeufs\r\n- 27 g de maïzena\r\n- 50 g de sucre\r\n- 150 g de beurre\r\n- 500 g de grosses fraises\r\n- 12 fraises des bois (pour la décoration)\r\n- quelques framboises (pour la décoration)\r\n- 200 g de pâte d\'amande rose\r\n- quelques feuilles en pâte d\'amande verte\r\n- 10 cl de sirop de sucre de canne\r\n- 4 cuillères à soupe de kirsch\r\n- sucre glace', '4085a645-587a-4f41-bcc5-4bfb49ab46eb_normal.jpg', '', '', '', '2017-05-17', 25, '#d35400', '11', 'Moyenne', 4),
(4, 'Galette des rois', 'Temps de préparation : 15 minutes\r\nTemps de cuisson : 40 minutes\r\n\r\nPréparation de la recette :\r\n\r\nPréchauffer le four à 210°C (thermostat 7).\r\n\r\nDisposer une pâte dans un moule à tarte, la piquer avec 1 fourchette.\r\n\r\nMélanger dans un saladier tous les ingrédients (poudre d\'amandes, sucre, oeuf, beurre mou et extrait d\'amande amère).\r\n\r\nEtaler la préparation sur la pâte, y mettre la fève (sur un bord, pour minimiser les chances de tomber dessus en coupant la galette!).\r\n\r\nRefermer la galette avec la seconde pâte et bien souder les bords.\r\n\r\nA l\'aide d\'un couteau, décorer la pâte en y traçant des dessins et dorer au jaune d\'oeuf (dilué dans un peu d\'eau). \r\n\r\nPercer le dessus de petits trous pour laisser l\'air s\'échapper, sinon elle risque de gonfler et de se dessécher.\r\n\r\nEnfourner pendant 30 minutes environ (surveiller la cuisson dès 25 minutes, mais ne pas hésiter à laisser jusqu\'à 40 minutes si nécessaire).', '\r\nIngrédients (pour 6 personnes) :\r\n- 2 pâtes feuilletées\r\n- 100 g de poudre d\'amandes\r\n- 75 g de sucre semoule\r\n- 1 oeuf\r\n- 50 g de beurre mou\r\n- quelques gouttes d\'extrait d\'amande amère\r\n- 1 jaune d\'oeuf pour dorer\r\n- 1 fève !', '3e21388b-099e-4e97-ad4c-cf474914ec4d_normal.jpg', '', '', '', '2017-05-17', 25, '#c0392b', '5', 'Facile', 5);

-- --------------------------------------------------------

--
-- Structure de la table `sexe`
--

CREATE TABLE `sexe` (
  `idSexe` int(11) NOT NULL,
  `nomSexe` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `sexe`
--

INSERT INTO `sexe` (`idSexe`, `nomSexe`) VALUES
(0, 'homme'),
(1, 'femme');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `idUtilisateur` int(11) NOT NULL,
  `identifiantUtilisateur` varchar(64) NOT NULL,
  `nomUtilisateur` varchar(64) NOT NULL,
  `PrenomUtilisateur` varchar(64) NOT NULL,
  `emailUtilisateur` varchar(128) NOT NULL,
  `telUtilisateur` varchar(13) NOT NULL,
  `passUtilisateur` varchar(64) NOT NULL,
  `rueUtilisateur` varchar(64) NOT NULL,
  `cpUtilisateur` varchar(64) NOT NULL,
  `villeUtilisateur` varchar(64) NOT NULL,
  `interetUtilisateur` int(11) NOT NULL,
  `sexeUtilisateur` int(11) NOT NULL,
  `dateInscriptionUtilisateur` date NOT NULL,
  `dateNaissanceUtilisateur` date NOT NULL,
  `longUtilisateur` double NOT NULL,
  `latUtilisateur` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `utilisateur`
--

INSERT INTO `utilisateur` (`idUtilisateur`, `identifiantUtilisateur`, `nomUtilisateur`, `PrenomUtilisateur`, `emailUtilisateur`, `telUtilisateur`, `passUtilisateur`, `rueUtilisateur`, `cpUtilisateur`, `villeUtilisateur`, `interetUtilisateur`, `sexeUtilisateur`, `dateInscriptionUtilisateur`, `dateNaissanceUtilisateur`, `longUtilisateur`, `latUtilisateur`) VALUES
(25, 'Datacube', 'STRIEBIG', 'Benjamin', 'benjamin.striebig@hotmail.fr', '0695735755', '81dc9bdb52d04dc20036dbd8313ed055', '6 Allée des Cèdres', '68500', 'Guebwiller', 2, 0, '2017-05-02', '1997-08-07', 7.202625, 47.901924),
(26, 'PremierUtilisateur', 'Premier', 'Utilisateur', 'premier.utilisateur@hotmail.fr', '0695735755', '1234', 'Rue des utilisateurs', '68500', 'Guebwiller', 0, 0, '2017-05-16', '1997-08-07', 7.35535, 48.073672),
(29, 'sdfsdf', 'sdfsdf', 'sdfsdf', 'sdfsdf@df.fr', '0695735755', '075cbe10bebe0e355ad7a4dd18a4fab1', '6 Allée des Cèdres', '68000', 'Guebwiller', 2, 0, '2017-05-19', '2017-03-19', 7.209336, 47.911586);

-- --------------------------------------------------------

--
-- Structure de la table `validiteannonce`
--

CREATE TABLE `validiteannonce` (
  `idValidite` int(11) NOT NULL,
  `codeValidite` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `validiteannonce`
--

INSERT INTO `validiteannonce` (`idValidite`, `codeValidite`) VALUES
(0, 0),
(1, 1);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `annonce`
--
ALTER TABLE `annonce`
  ADD PRIMARY KEY (`idAnnonce`),
  ADD KEY `editeurAnnonce` (`editeurAnnonce`),
  ADD KEY `validiteAnnonce` (`validiteAnnonce`);

--
-- Index pour la table `interet`
--
ALTER TABLE `interet`
  ADD PRIMARY KEY (`idInteret`);

--
-- Index pour la table `note`
--
ALTER TABLE `note`
  ADD PRIMARY KEY (`idNote`);

--
-- Index pour la table `recette`
--
ALTER TABLE `recette`
  ADD PRIMARY KEY (`idRecette`),
  ADD KEY `editeurRecette` (`editeurRecette`),
  ADD KEY `noteRecette` (`noteRecette`);

--
-- Index pour la table `sexe`
--
ALTER TABLE `sexe`
  ADD PRIMARY KEY (`idSexe`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`idUtilisateur`),
  ADD KEY `interetUtilisateur` (`interetUtilisateur`),
  ADD KEY `sexeUtilisateur` (`sexeUtilisateur`);

--
-- Index pour la table `validiteannonce`
--
ALTER TABLE `validiteannonce`
  ADD PRIMARY KEY (`idValidite`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `annonce`
--
ALTER TABLE `annonce`
  MODIFY `idAnnonce` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `interet`
--
ALTER TABLE `interet`
  MODIFY `idInteret` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `note`
--
ALTER TABLE `note`
  MODIFY `idNote` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT pour la table `recette`
--
ALTER TABLE `recette`
  MODIFY `idRecette` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `sexe`
--
ALTER TABLE `sexe`
  MODIFY `idSexe` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `idUtilisateur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `annonce`
--
ALTER TABLE `annonce`
  ADD CONSTRAINT `annonce_ibfk_1` FOREIGN KEY (`editeurAnnonce`) REFERENCES `utilisateur` (`idUtilisateur`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `annonce_ibfk_2` FOREIGN KEY (`validiteAnnonce`) REFERENCES `validiteannonce` (`idValidite`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `recette`
--
ALTER TABLE `recette`
  ADD CONSTRAINT `recette_ibfk_1` FOREIGN KEY (`editeurRecette`) REFERENCES `utilisateur` (`idUtilisateur`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `recette_ibfk_2` FOREIGN KEY (`noteRecette`) REFERENCES `note` (`idNote`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD CONSTRAINT `utilisateur_ibfk_1` FOREIGN KEY (`interetUtilisateur`) REFERENCES `interet` (`idInteret`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `utilisateur_ibfk_2` FOREIGN KEY (`sexeUtilisateur`) REFERENCES `sexe` (`idSexe`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
