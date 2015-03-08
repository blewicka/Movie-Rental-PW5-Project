CREATE TABLE IF NOT EXISTS `s174126`.`films` (
  `film_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'auto incrementing film_id of each film, unique index',
  `tittle_film` varchar(64) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Film tittle unique',
  `description_film` varchar(500) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Film description',
  `image_film` varchar(64) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Image name',
  `actors_film` varchar(500) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Film actors',
  `pay_film` varchar(64) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Film pay',
  `borowed` int(11)  NOT NULL COMMENT 'Borrowed count',
  `reviews` int(11)  NOT NULL COMMENT 'Reviews count',
  PRIMARY KEY (`film_id`),
  UNIQUE KEY `tittle_film` (`tittle_film`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='film datebase';
