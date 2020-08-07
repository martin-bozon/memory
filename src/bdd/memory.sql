-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  jeu. 06 août 2020 à 14:05
-- Version du serveur :  10.4.10-MariaDB
-- Version de PHP :  7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `memory`
--
CREATE DATABASE IF NOT EXISTS `memory` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `memory`;

-- --------------------------------------------------------

--
-- Structure de la table `card`
--

DROP TABLE IF EXISTS `card`;
CREATE TABLE IF NOT EXISTS `card` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `image_path` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=148 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `card`
--

INSERT INTO `card` (`id`, `image_path`) VALUES
(1, 'src/images/paires/RiotX_ChampionList_aatrox (1).jpg'),
(2, 'src/images/paires/RiotX_ChampionList_ahri.jpg'),
(3, 'src/images/paires/RiotX_ChampionList_akali.jpg'),
(4, 'src/images/paires/RiotX_ChampionList_alistar.jpg'),
(5, 'src/images/paires/RiotX_ChampionList_amumu.jpg'),
(6, 'src/images/paires/RiotX_ChampionList_anivia.jpg'),
(7, 'src/images/paires/RiotX_ChampionList_annie.jpg'),
(8, 'src/images/paires/RiotX_ChampionList_ashe.jpg'),
(9, 'src/images/paires/RiotX_ChampionList_aurelionsol.jpg'),
(10, 'src/images/paires/RiotX_ChampionList_azir.jpg'),
(11, 'src/images/paires/RiotX_ChampionList_bard.jpg'),
(12, 'src/images/paires/RiotX_ChampionList_blitzcrank.jpg'),
(13, 'src/images/paires/RiotX_ChampionList_brand.jpg'),
(14, 'src/images/paires/RiotX_ChampionList_braum.jpg'),
(15, 'src/images/paires/RiotX_ChampionList_caitlyn.jpg'),
(16, 'src/images/paires/RiotX_ChampionList_camille.jpg'),
(17, 'src/images/paires/RiotX_ChampionList_cassiopeia.jpg'),
(18, 'src/images/paires/RiotX_ChampionList_chogath.jpg'),
(19, 'src/images/paires/RiotX_ChampionList_corki.jpg'),
(20, 'src/images/paires/RiotX_ChampionList_darius.jpg'),
(21, 'src/images/paires/RiotX_ChampionList_diana.jpg'),
(22, 'src/images/paires/RiotX_ChampionList_draven.jpg'),
(23, 'src/images/paires/RiotX_ChampionList_drmundo.jpg'),
(24, 'src/images/paires/RiotX_ChampionList_ekko.jpg'),
(25, 'src/images/paires/RiotX_ChampionList_elise.jpg'),
(26, 'src/images/paires/RiotX_ChampionList_evelynn.jpg'),
(27, 'src/images/paires/RiotX_ChampionList_ezreal.jpg'),
(28, 'src/images/paires/RiotX_ChampionList_fiddlesticks.jpg'),
(29, 'src/images/paires/RiotX_ChampionList_fiora.jpg'),
(30, 'src/images/paires/RiotX_ChampionList_fizz.jpg'),
(31, 'src/images/paires/RiotX_ChampionList_galio.jpg'),
(32, 'src/images/paires/RiotX_ChampionList_gangplank.jpg'),
(33, 'src/images/paires/RiotX_ChampionList_garen.jpg'),
(34, 'src/images/paires/RiotX_ChampionList_gnar.jpg'),
(35, 'src/images/paires/RiotX_ChampionList_gragas.jpg'),
(36, 'src/images/paires/RiotX_ChampionList_graves-cigar.jpg'),
(37, 'src/images/paires/RiotX_ChampionList_hecarim.jpg'),
(38, 'src/images/paires/RiotX_ChampionList_heimerdinger.jpg'),
(39, 'src/images/paires/RiotX_ChampionList_ialiyah.jpg'),
(40, 'src/images/paires/RiotX_ChampionList_illaoi.jpg'),
(41, 'src/images/paires/RiotX_ChampionList_irelia.jpg'),
(42, 'src/images/paires/RiotX_ChampionList_ivern.jpg'),
(43, 'src/images/paires/RiotX_ChampionList_janna.jpg'),
(44, 'src/images/paires/RiotX_ChampionList_jarvaniv.jpg'),
(45, 'src/images/paires/RiotX_ChampionList_jax.jpg'),
(46, 'src/images/paires/RiotX_ChampionList_jayce.jpg'),
(47, 'src/images/paires/RiotX_ChampionList_jhin.jpg'),
(48, 'src/images/paires/RiotX_ChampionList_jinx.jpg'),
(49, 'src/images/paires/RiotX_ChampionList_kaisa.jpg'),
(50, 'src/images/paires/RiotX_ChampionList_kalista.jpg'),
(51, 'src/images/paires/RiotX_ChampionList_karma.jpg'),
(52, 'src/images/paires/RiotX_ChampionList_karthus.jpg'),
(53, 'src/images/paires/RiotX_ChampionList_kassadin.jpg'),
(55, 'src/images/paires/RiotX_ChampionList_katarina.jpg'),
(56, 'src/images/paires/RiotX_ChampionList_kayle.jpg'),
(57, 'src/images/paires/RiotX_ChampionList_kayn.jpg'),
(58, 'src/images/paires/RiotX_ChampionList_kennen.jpg'),
(59, 'src/images/paires/RiotX_ChampionList_khazix.jpg'),
(60, 'src/images/paires/RiotX_ChampionList_kindred.jpg'),
(61, 'src/images/paires/RiotX_ChampionList_kled.jpg'),
(62, 'src/images/paires/RiotX_ChampionList_kogmaw.jpg'),
(63, 'src/images/paires/RiotX_ChampionList_leblanc.jpg'),
(64, 'src/images/paires/RiotX_ChampionList_leesin.jpg'),
(65, 'src/images/paires/RiotX_ChampionList_leona.jpg'),
(66, 'src/images/paires/RiotX_ChampionList_lissandra.jpg'),
(67, 'src/images/paires/RiotX_ChampionList_lucian.jpg'),
(68, 'src/images/paires/RiotX_ChampionList_lulu.jpg'),
(69, 'src/images/paires/RiotX_ChampionList_lux.jpg'),
(70, 'src/images/paires/RiotX_ChampionList_malaphite.jpg'),
(71, 'src/images/paires/RiotX_ChampionList_malzahar.jpg'),
(72, 'src/images/paires/RiotX_ChampionList_maokai.jpg'),
(73, 'src/images/paires/RiotX_ChampionList_masteryi.jpg'),
(74, 'src/images/paires/RiotX_ChampionList_missfortune.jpg'),
(75, 'src/images/paires/RiotX_ChampionList_monkeyking.jpg'),
(76, 'src/images/paires/RiotX_ChampionList_mordekaiser.jpg'),
(77, 'src/images/paires/RiotX_ChampionList_morgana.jpg'),
(78, 'src/images/paires/RiotX_ChampionList_nami.jpg'),
(79, 'src/images/paires/RiotX_ChampionList_nasus.jpg'),
(80, 'src/images/paires/RiotX_ChampionList_nautilus.jpg'),
(81, 'src/images/paires/RiotX_ChampionList_neeko.jpg'),
(82, 'src/images/paires/RiotX_ChampionList_nidalee.jpg'),
(83, 'src/images/paires/RiotX_ChampionList_nocturne.jpg'),
(84, 'src/images/paires/RiotX_ChampionList_nunu.jpg'),
(85, 'src/images/paires/RiotX_ChampionList_olaf.jpg'),
(86, 'src/images/paires/RiotX_ChampionList_orianna.jpg'),
(87, 'src/images/paires/RiotX_ChampionList_ornn.jpg'),
(88, 'src/images/paires/RiotX_ChampionList_pantheon.jpg'),
(89, 'src/images/paires/RiotX_ChampionList_poppy.jpg'),
(90, 'src/images/paires/RiotX_ChampionList_pyke.jpg'),
(91, 'src/images/paires/RiotX_ChampionList_qiyana.jpg'),
(92, 'src/images/paires/RiotX_ChampionList_quinn.jpg'),
(93, 'src/images/paires/RiotX_ChampionList_rakan.jpg'),
(94, 'src/images/paires/RiotX_ChampionList_rammus.jpg'),
(95, 'src/images/paires/RiotX_ChampionList_reksai.jpg'),
(96, 'src/images/paires/RiotX_ChampionList_renekton.jpg'),
(97, 'src/images/paires/RiotX_ChampionList_rengar.jpg'),
(98, 'src/images/paires/RiotX_ChampionList_riven.jpg'),
(99, 'src/images/paires/RiotX_ChampionList_rumble.jpg'),
(100, 'src/images/paires/RiotX_ChampionList_ryze.jpg'),
(101, 'src/images/paires/RiotX_ChampionList_sejuani.jpg'),
(102, 'src/images/paires/RiotX_ChampionList_senna.jpg'),
(103, 'src/images/paires/RiotX_ChampionList_shaco.jpg'),
(104, 'src/images/paires/RiotX_ChampionList_shen.jpg'),
(105, 'src/images/paires/RiotX_ChampionList_shyvana.jpg'),
(106, 'src/images/paires/RiotX_ChampionList_singed.jpg'),
(107, 'src/images/paires/RiotX_ChampionList_sion.jpg'),
(108, 'src/images/paires/RiotX_ChampionList_sivir.jpg'),
(109, 'src/images/paires/RiotX_ChampionList_skarner.jpg'),
(110, 'src/images/paires/RiotX_ChampionList_sona.jpg'),
(111, 'src/images/paires/RiotX_ChampionList_soraka.jpg'),
(112, 'src/images/paires/RiotX_ChampionList_swain.jpg'),
(113, 'src/images/paires/RiotX_ChampionList_sylas.jpg'),
(114, 'src/images/paires/RiotX_ChampionList_syndra.jpg'),
(115, 'src/images/paires/RiotX_ChampionList_tahmkench.jpg'),
(116, 'src/images/paires/RiotX_ChampionList_talon.jpg'),
(117, 'src/images/paires/RiotX_ChampionList_taric.jpg'),
(118, 'src/images/paires/RiotX_ChampionList_teemo.jpg'),
(119, 'src/images/paires/RiotX_ChampionList_thresh.jpg'),
(120, 'src/images/paires/RiotX_ChampionList_tristana.jpg'),
(121, 'src/images/paires/RiotX_ChampionList_trundle.jpg'),
(122, 'src/images/paires/RiotX_ChampionList_tryndamere.jpg'),
(123, 'src/images/paires/RiotX_ChampionList_twistedfate.jpg'),
(124, 'src/images/paires/RiotX_ChampionList_twitch.jpg'),
(125, 'src/images/paires/RiotX_ChampionList_udyr.jpg'),
(126, 'src/images/paires/RiotX_ChampionList_urgot.jpg'),
(127, 'src/images/paires/RiotX_ChampionList_varus.jpg'),
(128, 'src/images/paires/RiotX_ChampionList_vayne.jpg'),
(129, 'src/images/paires/RiotX_ChampionList_veigar.jpg'),
(130, 'src/images/paires/RiotX_ChampionList_velkoz.jpg'),
(131, 'src/images/paires/RiotX_ChampionList_vi.jpg'),
(132, 'src/images/paires/RiotX_ChampionList_viktor.jpg'),
(133, 'src/images/paires/RiotX_ChampionList_vladimir.jpg'),
(134, 'src/images/paires/RiotX_ChampionList_warwick.jpg'),
(135, 'src/images/paires/RiotX_ChampionList_xayah.jpg'),
(136, 'src/images/paires/RiotX_ChampionList_xeratth.jpg'),
(137, 'src/images/paires/RiotX_ChampionList_xinzhao.jpg'),
(138, 'src/images/paires/RiotX_ChampionList_yasuo.jpg'),
(139, 'src/images/paires/RiotX_ChampionList_yorick.jpg'),
(141, 'src/images/paires/RiotX_ChampionList_yuumi.jpg'),
(142, 'src/images/paires/RiotX_ChampionList_zac.jpg'),
(143, 'src/images/paires/RiotX_ChampionList_zed.jpg'),
(144, 'src/images/paires/RiotX_ChampionList_ziggs.jpg'),
(145, 'src/images/paires/RiotX_ChampionList_zilean.jpg'),
(146, 'src/images/paires/RiotX_ChampionList_zoe.jpg'),
(147, 'src/images/paires/RiotX_ChampionList_zyra.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `score`
--

DROP TABLE IF EXISTS `score`;
CREATE TABLE IF NOT EXISTS `score` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `temps` varchar(255) NOT NULL,
  `nb_coups` int(11) NOT NULL,
  `nb_paires` int(11) NOT NULL,
  `score` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_user` (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=50 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `score`
--

INSERT INTO `score` (`id`, `temps`, `nb_coups`, `nb_paires`, `score`, `id_user`) VALUES
(1, '55.255701', 22, 5, 247, 1),
(2, '31.640133', 24, 7, 695, 2),
(3, '15.181869', 12, 3, 597, 2),
(4, '14.125821', 10, 3, 698, 2),
(5, '16.21847', 12, 4, 772, 2),
(6, '10.245521', 8, 3, 846, 2),
(7, '15.321958', 12, 4, 783, 2),
(8, '55.490723', 40, 10, 573, 2),
(9, '14.753316', 12, 4, 791, 2),
(10, '13.549291', 12, 4, 806, 2),
(11, '12.703688', 10, 4, 879, 2),
(12, '12.096883', 10, 4, 899, 2),
(13, '17.515104', 14, 5, 845, 2),
(14, '8.659349', 6, 3, 956, 2),
(15, '15.654304', 12, 3, 639, 2),
(16, '11.296685', 8, 3, 845, 2),
(17, '12.172934', 10, 3, 764, 2),
(18, '13.714977', 10, 3, 738, 2),
(19, '11.875879', 10, 3, 769, 2),
(20, '13.098166', 10, 3, 749, 2),
(21, '12.826743', 10, 4, 890, 2),
(22, '12.126736', 10, 3, 765, 2),
(23, '13.330169', 10, 3, 745, 2),
(24, '10.023654', 8, 3, 866, 2),
(25, '13.560068', 10, 3, 741, 3),
(26, '16.076129', 12, 3, 632, 3),
(27, '9.428269', 8, 3, 876, 3),
(28, '10.30227', 8, 3, 861, 3),
(29, '7.83432', 6, 3, 969, 3),
(30, '13.174746', 10, 4, 885, 3),
(31, '31.989023', 22, 7, 758, 3),
(32, '34.843694', 24, 7, 708, 3),
(33, '30.035508', 22, 7, 771, 3),
(34, '26.239462', 20, 7, 827, 3),
(35, '26.92349', 20, 7, 822, 3),
(36, '31.087088', 24, 7, 735, 3),
(37, '27.258653', 22, 7, 791, 3),
(38, '25.922406', 20, 6, 751, 3),
(39, '32.020759', 26, 7, 700, 3),
(40, '9.259016', 8, 3, 879, 3),
(41, '8.682886', 8, 3, 888, 3),
(42, '11.108671', 10, 3, 782, 3),
(43, '11.881196', 10, 3, 769, 3),
(44, '7.824439', 8, 3, 903, 3),
(45, '9.068817', 8, 3, 882, 3),
(46, '6.162965', 6, 3, 997, 3),
(47, '5.482007', 6, 3, 1009, 3),
(48, '9.078208', 10, 3, 816, 3),
(49, '9.801281', 8, 3, 870, 3);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

DROP TABLE IF EXISTS `utilisateurs`;
CREATE TABLE IF NOT EXISTS `utilisateurs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `is_admin` int(11) DEFAULT NULL,
  `remember_token` varchar(255) DEFAULT NULL,
  `score_total` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id`, `username`, `password`, `is_admin`, `remember_token`, `score_total`) VALUES
(1, 'admin', '$2y$10$IC0bqOddvUpyl6vXX/BEReXVR1zBNjGZLUTfzyq7PecliqGGUBxGa', 1, 'HVKw0mJKGAtgWA3Wuf5wDqNJafNWu0ZQkJyaMSGT3LLO5R852DdngfDRz33uW4bA5uR8wubwOOcAr4hu2WqpYe8Ix6xMi3U7i0r7fc3nzvy0gQvhsWRY29jWVCQbLSogACi9iR7hjwAldIc85f2bUjt7ZAA73OqNbVHuUdCWrofD2RSzrcKb91Lsm44rMaSvqXAkkvwX1tFQ3qgtNckDrtJodoUZflZLFSvqZaSvHlEM9RnakR5pHcIXa8', 247),
(2, 'martin', '$2y$10$mpAus0DByX42b9L9RU.gHu/pGD.B8nmVzeuDA2AxhHk1VqE/pXP7W', NULL, NULL, 17910),
(3, 'Jose', '$2y$10$EN9PNsBi7GC/1xZAP3xe6.lqrFZCm4lhiBrxmhgNZd0QVzThtmvXe', NULL, NULL, 20622);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `score`
--
ALTER TABLE `score`
  ADD CONSTRAINT `User` FOREIGN KEY (`id_user`) REFERENCES `utilisateurs` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
