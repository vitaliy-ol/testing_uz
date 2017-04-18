# Host: 127.0.0.1  (Version 5.5.50)
# Date: 2017-04-15 00:20:11
# Generator: MySQL-Front 5.4  (Build 4.5)
# Internet: http://www.mysqlfront.de/

/*!40101 SET NAMES utf8 */;

#
# Structure for table "answer_test"
#

DROP TABLE IF EXISTS `answer_test`;
CREATE TABLE `answer_test` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `quest_id` int(11) DEFAULT NULL,
  `text` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# Data for table "answer_test"
#

INSERT INTO `answer_test` VALUES (1,1,'За деньги'),(2,1,'Просто так'),(3,1,'Заставили, суки('),(4,1,'Нам нужен диплом'),(5,2,'100$'),(6,2,'2500грн'),(7,2,'200$'),(8,2,'0грн'),(9,3,'Солнце'),(10,3,'Луна'),(11,3,'Поезд'),(12,3,'Пиво)');

#
# Structure for table "quest_test"
#

DROP TABLE IF EXISTS `quest_test`;
CREATE TABLE `quest_test` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `test_id` int(11) DEFAULT NULL,
  `text` text,
  `true_answer` int(11) DEFAULT NULL,
  `img_url` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# Data for table "quest_test"
#

INSERT INTO `quest_test` VALUES (1,1,'Зачем мы делаем этот бред?',4,NULL),(2,1,'Какая у меня зарплата?',6,NULL),(3,1,'Что на картинке?',11,'images/test-images/test-img-1.jpg');

#
# Structure for table "test_keys"
#

DROP TABLE IF EXISTS `test_keys`;
CREATE TABLE `test_keys` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `test_key` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

#
# Data for table "test_keys"
#

INSERT INTO `test_keys` VALUES (1,'827ccb0eea8a706c4c34a16891f84e7b');

#
# Structure for table "test_s"
#

DROP TABLE IF EXISTS `test_s`;
CREATE TABLE `test_s` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) DEFAULT NULL,
  `time` int(11) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# Data for table "test_s"
#

INSERT INTO `test_s` VALUES (1,'ШН',30);

#
# Structure for table "user_test"
#

DROP TABLE IF EXISTS `user_test`;
CREATE TABLE `user_test` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `full_name` varchar(255) DEFAULT NULL,
  `data_born` varchar(20) DEFAULT NULL,
  `railways` varchar(100) DEFAULT NULL,
  `distation` varchar(10) DEFAULT NULL,
  `distantion_full` varchar(255) DEFAULT NULL,
  `position` varchar(10) DEFAULT NULL,
  `date_fix` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `result_test` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

#
# Data for table "user_test"
#

INSERT INTO `user_test` VALUES (1,'Подольский Влад Денисович','05.05.1995','Львівська залізниця','ШЧ','23112','ШН','2017-04-15 00:17:52',NULL);
