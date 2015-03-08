CREATE TABLE IF NOT EXISTS `s174126`.`borrow` (
  `borrow_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Borrow id',
  `film_id` int(11) NOT NULL COMMENT 'Film id',
  `tittle_film` varchar(64) COLLATE utf8_unicode_ci  NOT NULL COMMENT 'Film tittle',
  `user_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL COMMENT 'User_name',
  `status` bool  NOT NULL COMMENT 'Paid status',
  PRIMARY KEY (`borrow_id`),
  UNIQUE KEY `borrow_id` (`borrow_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='borrow datebase';

INSERT INTO `borrow` VALUES (1,13,'The Lord of the Rings: The Fellowship of the Ring','admin',0),(2,21,'Star Wars: Episode III - Revenge of the Sith','admin',0),(3,21,'Star Wars: Episode III - Revenge of the Sith','dragonn',0),(4,33,'Star Trek: The Wrath of Khan','admin',0),(5,33,'Star Trek: The Wrath of Khan','dragonn',0),(6,32,'Star Trek: The Motion Picture','dragonn',0),(7,29,'Watchmen','dragonn',0),(8,13,'The Lord of the Rings: The Fellowship of the Ring','dragonn',0),(9,32,'Star Trek: The Motion Picture','blewicka',0);
