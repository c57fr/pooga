-- --------------------------------------------------------
-- Hôte :                        localhost
-- Version du serveur:           5.7.18 - MySQL Community Server (GPL)
-- SE du serveur:                Win64
-- HeidiSQL Version:             9.5.0.5196
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Export de la structure de la table pooga. blog_articles
CREATE TABLE IF NOT EXISTS `blog_articles` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `titre` varchar(255) DEFAULT NULL,
  `contenu` longtext,
  `date` datetime DEFAULT NULL,
  `categorie_id` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Export de données de la table pooga.blog_articles : ~4 rows (environ)
/*!40000 ALTER TABLE blog_posts DISABLE KEYS */;
INSERT INTO blog_posts (`id`, `titre`, `contenu`, `date`, `categorie_id`) VALUES
	(1, 'Mon titre 1', 'Lorem 1 ipsum dolor sit amet, consectetur adipisicing elit. Adipisci amet at aut corporis dicta dolor\n 		earum, eligendi eum id maiores minima nam nobis nulla officiis quis, recusandae, temporibus ut voluptatem.', '2018-02-14 05:02:24', 1),
	(2, 'Mon titre 2', 'Lorem 2 ipsum dolor sit amet, consectetur adipisicing elit. Adipisci amet at aut corporis dicta dolor\n 		earum, eligendi eum id maiores minima nam nobis nulla officiis quis, recusandae, temporibus ut voluptatem.', '2018-02-14 05:02:30', 2),
	(3, 'Mon titre 3', 'Lorem 3 ipsum dolor sit amet, consectetur adipisicing elit. Adipisci amet at aut corporis dicta dolor\n 		earum, eligendi eum id maiores minima nam nobis nulla officiis quis, recusandae, temporibus ut voluptatem.', '2018-02-14 05:02:35', 2),
	(4, 'Mon titre 4', 'Lorem 4 ipsum dolor sit amet, consectetur adipisicing elit. Adipisci amet at aut corporis dicta dolor\n 		earum, eligendi eum id maiores minima nam nobis nulla officiis quis, recusandae, temporibus ut voluptatem.', '2018-02-14 05:02:40', 2);
/*!40000 ALTER TABLE blog_posts ENABLE KEYS */;

-- Export de la structure de la table pooga. blog_categories
CREATE TABLE IF NOT EXISTS `blog_categories` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `categorie` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Export de données de la table pooga.blog_categories : ~0 rows (environ)
/*!40000 ALTER TABLE `blog_categories` DISABLE KEYS */;
INSERT INTO `blog_categories` (`id`, `categorie`) VALUES
	(1, 'Piscine'),
	(2, 'Longboard');
/*!40000 ALTER TABLE `blog_categories` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
