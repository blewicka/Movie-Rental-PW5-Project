-- MySQL dump 10.13  Distrib 5.5.40, for debian-linux-gnu (x86_64)
--
-- Host: sbazy.uek.krakow.pl    Database: s174126
-- ------------------------------------------------------
-- Server version	5.5.41-0ubuntu0.12.04.1-log

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `borrow`
--

DROP TABLE IF EXISTS `borrow`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `borrow` (
  `borrow_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Borrow id',
  `film_id` int(11) NOT NULL COMMENT 'Film id',
  `tittle_film` varchar(64) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Film tittle',
  `user_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL COMMENT 'User_name',
  `status` tinyint(1) NOT NULL COMMENT 'Paid status',
  PRIMARY KEY (`borrow_id`),
  UNIQUE KEY `borrow_id` (`borrow_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='borrow datebase';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `borrow`
--

LOCK TABLES `borrow` WRITE;
/*!40000 ALTER TABLE `borrow` DISABLE KEYS */;
INSERT INTO `borrow` VALUES (1,13,'The Lord of the Rings: The Fellowship of the Ring','admin',1),(2,21,'Star Wars: Episode III - Revenge of the Sith','admin',1),(3,21,'Star Wars: Episode III - Revenge of the Sith','dragonn',0),(4,33,'Star Trek: The Wrath of Khan','admin',0),(5,33,'Star Trek: The Wrath of Khan','dragonn',0),(6,32,'Star Trek: The Motion Picture','dragonn',0),(7,29,'Watchmen','dragonn',0),(8,13,'The Lord of the Rings: The Fellowship of the Ring','dragonn',0),(9,32,'Star Trek: The Motion Picture','blewicka',1),(10,27,'Life of Brian','blewicka',0);
/*!40000 ALTER TABLE `borrow` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `films`
--

DROP TABLE IF EXISTS `films`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `films` (
  `film_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'auto incrementing film_id of each film, unique index',
  `tittle_film` varchar(64) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Film tittle unique',
  `description_film` varchar(500) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Film description',
  `image_film` varchar(64) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Image name',
  `actors_film` varchar(500) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Film actors',
  `pay_film` varchar(64) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Film pay',
  `borowed` int(11) NOT NULL COMMENT 'Borrowed count',
  `reviews` int(11) NOT NULL COMMENT 'Reviews count',
  PRIMARY KEY (`film_id`),
  UNIQUE KEY `tittle_film` (`tittle_film`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='film datebase';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `films`
--

LOCK TABLES `films` WRITE;
/*!40000 ALTER TABLE `films` DISABLE KEYS */;
INSERT INTO `films` VALUES (13,'The Lord of the Rings: The Fellowship of the Ring','A meek hobbit of the Shire and eight companions set out on a journey to Mount Doom to destroy the One Ring and the dark lord Sauron.','The Lord of the Rings: The Fellowship of the Ring','Elijah Wood - Frodo Baggins\r\nSean Astin - Samwise \"Sam\" Gamgee       \r\nBilly Boyd - Peregrin \"Pippin\" Took       \r\nDominic Monaghan - Meriadok \"Merry\" Brandybuck','2.99',2,0),(14,'The Lord of the Rings: The Two Towers','While Frodo and Sam edge closer to Mordor with the help of the shifty Gollum, the divided fellowship makes a stand against Sauron\'s new ally, Saruman, and his hordes of Isengard.','The Lord of the Rings: The Two Towers','Elijah Wood - Frodo Baggins\r\nSean Astin - Samwise \"Sam\" Gamgee   \r\nBilly Boyd - Peregrin \"Pippin\" Took       \r\nDominic Monaghan - Meriadok \"Merry\" Brandybuck','2.99',0,0),(15,'The Lord of the Rings: The Return of the King','Gandalf and Aragorn lead the World of Men against Sauron\'s army to draw his gaze from Frodo and Sam as they approach Mount Doom with the One Ring.','The Lord of the Rings: The Return of the King','Elijah Wood - Frodo Baggins\r\nSean Astin - Samwise \"Sam\" Gamgee   \r\nBilly Boyd - Peregrin \"Pippin\" Took       \r\nDominic Monaghan - Meriadok \"Merry\" Brandybuck','2.99',0,0),(16,'The Matrix','A computer hacker learns from mysterious rebels about the true nature of his reality and his role in the war against its controllers.','The Matrix','Keanu Reeves - Neo\r\nLaurence Fishburne - Morfeusz\r\nCarrie-Anne Moss - Trinity\r\nHugo Weaving - Agent Smith','1.99',0,0),(17,'The Matrix Reloaded','Neo and the rebel leaders estimate that they have 72 hours until 250,000 probes discover Zion and destroy it and its inhabitants. During this, Neo must decide how he can save Trinity from a dark fate in his dreams.','The Matrix Reloaded','Keanu Reeves - Neo\r\nLaurence Fishburne - Morfeusz\r\nCarrie-Anne Moss - Trinity\r\nHugo Weaving - Agent Smith','1.99',0,0),(18,'The Matrix Revolutions','The human city of Zion defends itself against the massive invasion of the machines as Neo fights to end the war at another front while also opposing the rogue Agent Smith.','The Matrix Revolutions','Keanu Reeves - Neo\r\nLaurence Fishburne - Morfeusz\r\nCarrie-Anne Moss - Trinity\r\nHugo Weaving - Agent Smith','1.99',0,0),(19,'Star Wars: Episode I - The Phantom Menace','Two Jedi Knights escape a hostile blockade to find allies and come across a young boy who may bring balance to the Force, but the long dormant Sith resurface to reclaim their old glory.','Star Wars: Episode I - The Phantom Menace','Ewan McGregor - Obi-Wan Kenobi\r\nNatalie Portman - Padme\r\nIan McDiarmid - Senator Palpatine','3.99',0,0),(20,'Star Wars: Episode II - Attack of the Clones','Ten years after initially meeting, Anakin Skywalker shares a forbidden romance with Padmé, while Obi-Wan investigates an assassination attempt on the Senator and discovers a secret clone army crafted for the Jedi.','Star Wars: Episode II - Attack of the Clones','Ewan McGregor - Obi-Wan Kenobi\r\nNatalie Portman - Padme\r\nIan McDiarmid - Senator Palpatine','3.99',0,0),(21,'Star Wars: Episode III - Revenge of the Sith','As the Clone Wars near an end, the Sith Lord Darth Sidious steps out of the shadows, at which time Anakin succumbs to his emotions, becoming Darth Vader and putting his relationships with Obi-Wan and Padme at risk.','Star Wars: Episode III - Revenge of the Sith','Ewan McGregor - Obi-Wan Kenobi\r\nNatalie Portman - Padme\r\nIan McDiarmid - Senator Palpatine','0.99',2,0),(22,'Star Trek','The brash James T. Kirk tries to live up to his father\'s legacy with Mr. Spock keeping him in check as a vengeful, time-traveling Romulan creates black holes to destroy the Federation one planet at a time.','Star Trek','Chris Pine jako James T. Kirk\r\nZachary Quinto jako Spock\r\nEric Bana jako Nero','2.99',0,0),(23,'Star Trek Into Darkness','After the crew of the Enterprise find an unstoppable force of terror from within their own organization, Captain Kirk leads a manhunt to a war-zone world to capture a one-man weapon of mass destruction.','Star Trek Into Darkness','Chris Pine jako James T. Kirk\r\nZachary Quinto jako Spock\r\nBenedict Cumberbatch jako Khan','2.99',0,3),(24,'Star Wars: Episode VI - Return of the Jedi','After rescuing Han Solo from the palace of Jabba the Hutt, the rebels attempt to destroy the second Death Star, while Luke struggles to make Vader shake off of the dark side of the Force.','Star Wars: Episode VI - Return of the Jedi','Mike Hamill - Luke Skywalker\r\nHarrison Ford - Han Solo\r\nCarrie Fisher - Leia','2.99',0,0),(25,'Monty Python and the Holy Grail','King Arthur and his knights embark on a low-budget search for the Grail, encountering many very silly obstacles.','Monty Python and the Holy Grail','John Cleese\r\nNeil Innes\r\nYerry Jones\r\nMichael Palin\r\nTerry Gilliam\r\nEric Idle','1.99',0,1),(26,'The Meaning of Life','The comedy team takes a look at life in all its stages in their own uniquely silly way.','The Meaning of Life','John Cleese\r\nNeil Innes\r\nYerry Jones\r\nMichael Palin\r\nTerry Gilliam\r\nEric Idle','1.99',0,0),(27,'Life of Brian','Brian is born on the original Christmas, in the stable next door. He spends his life being mistaken for a messiah.','Life of Brian','John Cleese\r\nNeil Innes\r\nYerry Jones\r\nMichael Palin\r\nTerry Gilliam\r\nEric Idle','1.99',1,0),(28,'Monty Python Live at the Hollywood Bowl','The Monty Python troupe perform a combination of classic sketches and new material at the Hollywood Bowl.','Monty Python Live at the Hollywood Bowl','John Cleese\r\nNeil Innes\r\nYerry Jones\r\nMichael Palin\r\nTerry Gilliam\r\nEric Idle','0.99',0,0),(29,'Watchmen','In an alternate 1985 where former superheroes exist, the murder of a colleague sends active vigilante Rorschach into his own sprawling investigation, uncovering something that could completely change the course of history as we know it.','Watchmen','Malin Åkerman - Laurie Jupiter\r\nBilly Crudup - Dr Manhattan\r\nMatthew Goode - Adrian Veidt\r\nWalter Kovacs - Rorschach','3.99',1,0),(30,'The Boondock Saints','Fraternal twins set out to rid Boston of the evil men operating there while being tracked down by an FBI agent.','The Boondock Saints','Willem Dafoe - Paul Smecker\r\nSean Patrick Flanery - Conner MacManus\r\nNorman Reedus - Murphy MacManus','1.99',0,0),(31,'The Boondock Saints II: All Saints Day','The MacManus brothers are living a quiet life in Ireland with their father, but when they learn that their beloved priest has been killed by mob forces, they go back to Boston to bring justice to those responsible and avenge the priest.','The Boondock Saints II: All Saints Day','Willem Dafoe - Paul Smecker\r\nSean Patrick Flanery - Conner MacManus\r\nNorman Reedus - Murphy MacManus','1.99',0,0),(32,'Star Trek: The Motion Picture','When an alien spacecraft of enormous power is spotted approaching Earth, Admiral Kirk resumes command of the Starship Enterprise in order to intercept, examine and hopefully stop the intruder.','Star Trek: The Motion Picture','William Shatner - Kirk\r\nLeonard Nimoy - Spock\r\nDeforst KElley - Dr. McCoy','2.99',2,0),(33,'Star Trek: The Wrath of Khan','With the assistance of the Enterprise crew, Admiral Kirk must stop an old nemesis, Khan Noonien Singh, from using his son\'s life-generating device, the Genesis Device, as the ultimate weapon.','Star Trek: The Wrath of Khan','William Shatner - Kirk\r\nLeonard Nimoy - Spock\r\nDeforst KElley - Dr. McCoy','2.99',2,1);
/*!40000 ALTER TABLE `films` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `reviews`
--

DROP TABLE IF EXISTS `reviews`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `reviews` (
  `review_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Review id',
  `tittle_film` varchar(64) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Film id',
  `user_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL COMMENT 'User_name',
  `title_review` varchar(64) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Review tittle',
  `review` varchar(500) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Review',
  `points` int(11) NOT NULL COMMENT 'Points',
  PRIMARY KEY (`review_id`),
  UNIQUE KEY `review_id` (`review_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='film datebase';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reviews`
--

LOCK TABLES `reviews` WRITE;
/*!40000 ALTER TABLE `reviews` DISABLE KEYS */;
INSERT INTO `reviews` VALUES (1,'Star Trek Into Darkness','admin','The second contact','Although the title is quite dark, there is no gloomy Star Trek there. J.J. Ambrams still preers light than darkness, and the great fun of wathcing a movie. In his space there\'s a lot of action, fun, and interpersonal chain reactions!',10),(2,'Star Trek Into Darkness','dragonn',' The second contact','Although the title is quite dark, there is no gloomy Star Trek there. J.J. Ambrams still preers light than darkness, and the great fun of wathcing a movie. In his space there\'s a lot of action, fun, and interpersonal chain reactions!\r\n',7),(3,'Star Trek Into Darkness','dragonn1','The second contact','Although the title is quite dark, there is no gloomy Star Trek there. J.J. Ambrams still preers light than darkness, and the great fun of wathcing a movie. In his space there\'s a lot of action, fun, and interpersonal chain reactions!\r\n',8),(4,'Star Trek: The Wrath of Khan','dragonn1','Love it!','Great music by Jerry Goldsmith. Enterprise looks extraordinary.',9),(5,'Monty Python and the Holy Grail','dragonn1','Amazing!','It\'s the first movie of this series which is not a compilations of funny scetches. It contains extraordinary humor and it\'s absurd attacks all the time. It i not possible to go through this movie and not laugh',7);
/*!40000 ALTER TABLE `reviews` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'auto incrementing user_id of each user, unique index',
  `user_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL COMMENT 'user''s name, unique',
  `user_password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'user''s password in salted and hashed format',
  `user_email` varchar(64) COLLATE utf8_unicode_ci NOT NULL COMMENT 'user''s email, unique',
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `user_name` (`user_name`),
  UNIQUE KEY `user_email` (`user_email`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='user data';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'admin','$2y$10$Wm1m5AVZRiAxv4FQqunjtOSqwbeYCh7LwqcQQRbcZ1yFh.MvztYQS','admin@op.pl'),(2,'dragonn','$2y$10$VAf3hZpZBy0v7B5u4NHEO.E4hS5.lMYR74Nq9gUMuOyg.X3mfGQye','dragonn@op.pl'),(3,'dragonn1','$2y$10$iAqNEncez/FRGh9vd7rjj.DcPQHE5BqOuvi/gxvx1n/qQneDNoufy','dragonn1@op.pl'),(4,'blewicka','$2y$10$AiApokenTAgSVT5eBkuma.S9qizSg1q8zQanoMEuQqj7E/8OCrXIu','aisab.lewicka@gmail.com');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2015-03-08 18:02:05
