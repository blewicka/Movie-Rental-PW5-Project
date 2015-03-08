CREATE TABLE IF NOT EXISTS `s174126`.`reviews` (
  `review_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Review id',
  `tittle_film` varchar(64) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Film id',
  `user_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL COMMENT 'User_name',
  `title_review` varchar(64) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Review tittle',
  `review` varchar(500) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Review',
  `points` int(11)  NOT NULL COMMENT 'Points',
  PRIMARY KEY (`review_id`),
  UNIQUE KEY `review_id` (`review_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='film datebase';
