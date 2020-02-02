# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 192.168.1.7 (MySQL 5.7.28)
# Database: school
# Generation Time: 2019-12-30 21:44:07 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table banner_category
# ------------------------------------------------------------

DROP TABLE IF EXISTS `banner_category`;

CREATE TABLE `banner_category` (
  `banner_cat_id` int(11) NOT NULL AUTO_INCREMENT,
  `banner_cat_name` varchar(30) NOT NULL,
  PRIMARY KEY (`banner_cat_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `banner_category` WRITE;
/*!40000 ALTER TABLE `banner_category` DISABLE KEYS */;

INSERT INTO `banner_category` (`banner_cat_id`, `banner_cat_name`)
VALUES
	(1,'Academics'),
	(2,'Admission'),
	(3,'Curriculum'),
	(4,'About '),
	(5,'Contact');

/*!40000 ALTER TABLE `banner_category` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table banners
# ------------------------------------------------------------

DROP TABLE IF EXISTS `banners`;

CREATE TABLE `banners` (
  `banner_id` int(11) NOT NULL AUTO_INCREMENT,
  `banner_title` varchar(50) NOT NULL,
  `banner_subtitle` varchar(50) NOT NULL,
  `banner_image` varchar(255) NOT NULL,
  `banner_cat_id` int(11) NOT NULL,
  PRIMARY KEY (`banner_id`),
  KEY `banner_cat_id` (`banner_cat_id`),
  CONSTRAINT `banners_ibfk_1` FOREIGN KEY (`banner_cat_id`) REFERENCES `banner_category` (`banner_cat_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `banners` WRITE;
/*!40000 ALTER TABLE `banners` DISABLE KEYS */;

INSERT INTO `banners` (`banner_id`, `banner_title`, `banner_subtitle`, `banner_image`, `banner_cat_id`)
VALUES
	(1,'SCHOLASTICA SCHOOL','Providing excellent education since 1977','Banner-1506496555-14266.jpg',1),
	(2,'SCHOLASTICA SCHOOL','Providing excellent education since 1977','Banner-1506223262-26565.jpg',2),
	(3,'SCHOLASTICA SCHOOL','Providing excellent education since 1977','academic-banner.jpg',3),
	(4,'SCHOLASTICA SCHOOL','Providing excellent education since 1977','academic-banner.jpg',4),
	(5,'SCHOLASTICA SCHOOL','Providing excellent education since 1977','academic-banner.jpg',5);

/*!40000 ALTER TABLE `banners` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table comments
# ------------------------------------------------------------

DROP TABLE IF EXISTS `comments`;

CREATE TABLE `comments` (
  `comment_id` int(11) NOT NULL AUTO_INCREMENT,
  `comment_name` varchar(50) NOT NULL,
  `comment_email` varchar(100) NOT NULL,
  `comment_subject` varchar(100) NOT NULL,
  `massage` text NOT NULL,
  PRIMARY KEY (`comment_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `comments` WRITE;
/*!40000 ALTER TABLE `comments` DISABLE KEYS */;

INSERT INTO `comments` (`comment_id`, `comment_name`, `comment_email`, `comment_subject`, `massage`)
VALUES
	(1,'Shahriar Hosen',' hosen.shahriar.cse@gmail.com','test','test massage'),
	(2,'Shahriar Hosen',' hosen.shahriar.cse@gmail.com','test','test massage 2'),
	(3,'shahriar',' hosen.shahriar.cse@gmail.com','subject','Good job'),
	(4,'shahriar',' hosen.shahriar.cse@gmail.com','subject','Good job'),
	(5,'shahriar',' hosen.shahriar.cse@gmail.com','test','test massage now'),
	(6,'shahriar',' hosen.shahriar.cse@gmail.com','subject','hello php');

/*!40000 ALTER TABLE `comments` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table footer_info
# ------------------------------------------------------------

DROP TABLE IF EXISTS `footer_info`;

CREATE TABLE `footer_info` (
  `finfo_id` int(11) NOT NULL AUTO_INCREMENT,
  `finfo_title` varchar(30) NOT NULL,
  `finfo_address_one` varchar(255) NOT NULL,
  `finfo_address_two` varchar(255) NOT NULL,
  `finfo_address_three` varchar(255) NOT NULL,
  `finfo_address_four` varchar(255) NOT NULL,
  `finfo_image` varchar(255) NOT NULL,
  `finfo_cat_id` int(11) NOT NULL,
  PRIMARY KEY (`finfo_id`),
  KEY `finfo_cat_id` (`finfo_cat_id`),
  CONSTRAINT `footer_info_ibfk_1` FOREIGN KEY (`finfo_cat_id`) REFERENCES `footer_info_category` (`finfo_cat_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `footer_info` WRITE;
/*!40000 ALTER TABLE `footer_info` DISABLE KEYS */;

INSERT INTO `footer_info` (`finfo_id`, `finfo_title`, `finfo_address_one`, `finfo_address_two`, `finfo_address_three`, `finfo_address_four`, `finfo_image`, `finfo_cat_id`)
VALUES
	(1,'Central Office:','Ascent Group House 3/D, Road 2/A, Block J,Baridhara,','<span>Tele: 8860147,8860132,8819500,</span><span>8815222,8856019-20 &amp; 9887277</span>','<span>Fax: (+88 02) 8813141</span> <span> Email: info@scholasticabd.com</span>','\n  ','footer-1506497508-59367.',1),
	(2,'Campus Address:','<span>Senior campus,Uttara, Plot 2,</span>\n                           <span>Road 8 &amp; 9, Sector 1,</span>\n                           <span>Uttara Model Town,</span>\n                           <span>Dhaka 1230</span>','<span>Junior campus,Uttara, Plot 1, Road </span><span>21, Sector 4, Uttara Model Town,</span> Dhaka 1230','<span>Senior Campus,Mirpur, Plot 2/B-2,</span> <span> 2/C line one, Section 13, Mirpur,</span> Dhaka 1216','','',2),
	(3,'Campus Address:','<span>Junior campus,Dhanmondi, Plot 78,Road 8/A, Mirza Golam Hafiz Road,<span><span>Dhanmondi R/A, Dhaka 1209</span>','<span>Junior campus,Gulshan, Plot lot NE(D)3,Gulshan Avenue,North,Shaheed </span><span>Major , Najmul Haque Sarak,Gulshan 2, Dhaka 1212</span>','','','footer-1577741576-94710.png',2),
	(4,'Associate School of:','','','','','footer-1577741795-50569.png',3),
	(5,'Member of:','Dhaka International Schools Association (DISA)               Bangladesh Private English Medium Schools Forum','','','','footer-1577740221-98610.png',4);

/*!40000 ALTER TABLE `footer_info` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table footer_info_category
# ------------------------------------------------------------

DROP TABLE IF EXISTS `footer_info_category`;

CREATE TABLE `footer_info_category` (
  `finfo_cat_id` int(11) NOT NULL AUTO_INCREMENT,
  `finfo_cat_name` varchar(30) NOT NULL,
  PRIMARY KEY (`finfo_cat_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `footer_info_category` WRITE;
/*!40000 ALTER TABLE `footer_info_category` DISABLE KEYS */;

INSERT INTO `footer_info_category` (`finfo_cat_id`, `finfo_cat_name`)
VALUES
	(1,'Central Office'),
	(2,'Campus Address'),
	(3,'Associate School '),
	(4,'Member of:');

/*!40000 ALTER TABLE `footer_info_category` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table gallery
# ------------------------------------------------------------

DROP TABLE IF EXISTS `gallery`;

CREATE TABLE `gallery` (
  `pslide_id` int(11) NOT NULL AUTO_INCREMENT,
  `pslide_title` varchar(100) NOT NULL,
  `pslide_details` text NOT NULL,
  `pslide_btn_text` varchar(20) NOT NULL,
  `pslide_btn_url` varchar(50) NOT NULL,
  `pslide_image` varchar(255) NOT NULL,
  PRIMARY KEY (`pslide_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `gallery` WRITE;
/*!40000 ALTER TABLE `gallery` DISABLE KEYS */;

INSERT INTO `gallery` (`pslide_id`, `pslide_title`, `pslide_details`, `pslide_btn_text`, `pslide_btn_url`, `pslide_image`)
VALUES
	(1,'Student Affairs Unit','Scholastica team from Senior campus, Mirpur achieved third position at the Kokomo Dhaka Metropolitan  Senior campus, Mirpur achieved third position.','Read More','#','gallery-1577739017-41665.jpg'),
	(2,'Student Affairs Unit','Scholastica team from Senior campus, Mirpur achieved third position at the Kokomo Dhaka Metropolitan  Senior campus, Mirpur achieved third position.','Read More','#','gallery-1577738458-92330.jpg'),
	(3,'Student Affairs Unit','Scholastica team from Senior campus, Mirpur achieved third position at the Kokomo Dhaka Metropolitan  Senior campus, Mirpur achieved third .','Read More','#','gallery-1577738755-59612.jpg'),
	(4,'Student Affairs Unit','Scholastica team from Senior campus, Mirpur achieved third position at the Kokomo Dhaka Metropolitan  Senior campus, Mirpur achieved third .','Read More','#','gallery-1577738782-72906.jpg');

/*!40000 ALTER TABLE `gallery` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table menu
# ------------------------------------------------------------

DROP TABLE IF EXISTS `menu`;

CREATE TABLE `menu` (
  `menu_id` int(11) NOT NULL AUTO_INCREMENT,
  `menu_text` varchar(20) NOT NULL,
  `menu_url` varchar(50) NOT NULL,
  `menu_class` varchar(20) NOT NULL,
  `menu_html_id` varchar(20) NOT NULL,
  `menu_fa_class` varchar(20) NOT NULL,
  PRIMARY KEY (`menu_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



# Dump of table news
# ------------------------------------------------------------

DROP TABLE IF EXISTS `news`;

CREATE TABLE `news` (
  `news_id` int(11) NOT NULL AUTO_INCREMENT,
  `news_title` varchar(50) NOT NULL,
  `news_subtitle` varchar(50) NOT NULL,
  `news_summary` varchar(255) DEFAULT NULL,
  `news_details` text NOT NULL,
  `news_btn_text` varchar(20) NOT NULL,
  `news_btn_url` varchar(100) NOT NULL,
  `news_image` varchar(255) NOT NULL,
  `news_slider_image` varchar(120) DEFAULT NULL,
  `news_banner_image` varchar(120) DEFAULT NULL,
  `news_date` date NOT NULL,
  `news_cat_id` int(11) NOT NULL,
  PRIMARY KEY (`news_id`),
  KEY `news_cat_id` (`news_cat_id`),
  CONSTRAINT `news_ibfk_1` FOREIGN KEY (`news_cat_id`) REFERENCES `news_category` (`news_cat_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `news` WRITE;
/*!40000 ALTER TABLE `news` DISABLE KEYS */;

INSERT INTO `news` (`news_id`, `news_title`, `news_subtitle`, `news_summary`, `news_details`, `news_btn_text`, `news_btn_url`, `news_image`, `news_slider_image`, `news_banner_image`, `news_date`, `news_cat_id`)
VALUES
	(1,'Modern Computer Lab','Modern Computer Lab','We have set up a brand new modern computer lab','<p>\r\nBenreilly earthquake, asgardian skrulls medusa exiles toxin. Daredevil boomboom magik mistyknight exiles mentor lilith, skreet urich smasher jackpot abomb. Juggernaut jigsaw ink vision kronos blackwidow warmachine janefoster. Gladiator asgardian husk blink cuckoos arcade? Crossbones unionjack spot daken spot inhumans giantman natasha magneto deathstrike cable. Arcade zemo johnnystorm phalanx hyperion, valkyrie ezekiel bug lockheed prism bishop fisk?\r\n</p>\r\n<p>\r\nDust miracleman manthing redskull! Nightcrawler moonknight snowbird blastaar giantman caretaker korath osborn echo aurora pixie invaders firebrand! Nickfury ironman scourge stryker mongoose bullseye chameleon warmachine. Tusk, korath bob ezekiel angel. Typhoidmary kitty taskmaster exiles tchalla hankpym dazzler zemo drax. Sentry tombstone batroc angela, hellion humantorch stature jimmywoo. Redhulk x-51 aurora screwball. Sif?\r\n</p>\r\n<p>\r\nHulk zemo mistyknight ilyana arnim kitty wiccan. Hammerhead steverogers natasha odin! Johnnyblaze wendigo wasp avengers boomboom annihilus hydra jigsaw gideon carnage namor. Danvers firebird, moonknight mayparker shield. Batroc korg deathbird shang-chi menace natasha morph x-men gladiator nitro howard. Lizard frankenstein banshee vanisher suestorm tusk captainbritain harrier miek dormammu arnim. Defenders abomb cable kang bullseye yellowjacket. Scarletwitch moonknight spider-man, constrictor maestro vision nova mentallo magus lilith. Hyperion quasar tigra hellion gideon giantman toro chameleon ezekiel valkyrie madthinker! Osborn maelstrom yellowjacket contessa howard warbird wendigo genis-vell diablo flatman ka-zar madthinker. Aim, hulkling uatu hercules azazel constrictor bob kang jessicajones calypso ghostrider riptide arcade. Frankcastle mephisto punisher msmarvel betaray greengoblin elixir mandarin paladin amora rocketraccoon pyro. Captainbritain enchantress arcade ezekiel kingcobra azazel.\r\n</p>\r\n<p>\r\nHulk zemo mistyknight ilyana arnim kitty wiccan. Hammerhead steverogers natasha odin! Johnnyblaze wendigo wasp avengers boomboom annihilus hydra jigsaw gideon carnage namor. Danvers firebird, moonknight mayparker shield. Batroc korg deathbird shang-chi menace natasha morph x-men gladiator nitro howard. Lizard frankenstein banshee vanisher suestorm tusk captainbritain harrier miek dormammu arnim. Defenders abomb cable kang bullseye yellowjacket. Scarletwitch moonknight spider-man, constrictor maestro vision nova mentallo magus lilith. Hyperion quasar tigra hellion gideon giantman toro chameleon ezekiel valkyrie madthinker! Osborn maelstrom yellowjacket contessa howard warbird wendigo genis-vell diablo flatman ka-zar madthinker. Aim, hulkling uatu hercules azazel constrictor bob kang jessicajones calypso ghostrider riptide arcade. Frankcastle mephisto punisher msmarvel betaray greengoblin elixir mandarin paladin amora rocketraccoon pyro. Captainbritain enchantress arcade ezekiel kingcobra azazel.\r\n</p>','Learn more','#','latest-news-1577726906-185156.jpg','latest-news-1577726906-594469.png','latest-news-1577726906-376094.png','2017-09-18',1),
	(2,'Book Fair','Book Fair Festival','Book fair at campus','\r\n<p>Benreilly earthquake, asgardian skrulls medusa exiles toxin. Daredevil boomboom magik mistyknight exiles mentor lilith, skreet urich smasher jackpot abomb. Juggernaut jigsaw ink vision kronos blackwidow warmachine janefoster. Gladiator asgardian husk blink cuckoos arcade? Crossbones unionjack spot daken spot inhumans giantman natasha magneto deathstrike cable. Arcade zemo johnnystorm phalanx hyperion, valkyrie ezekiel bug lockheed prism bishop fisk?</p>\r\n\r\n\r\n<p>Dust miracleman manthing redskull! Nightcrawler moonknight snowbird blastaar giantman caretaker korath osborn echo aurora pixie invaders firebrand! Nickfury ironman scourge stryker mongoose bullseye chameleon warmachine. Tusk, korath bob ezekiel angel. Typhoidmary kitty taskmaster exiles tchalla hankpym dazzler zemo drax. Sentry tombstone batroc angela, hellion humantorch stature jimmywoo. Redhulk x-51 aurora screwball. Sif?</p>\r\n\r\n\r\n<p>Hulk zemo mistyknight ilyana arnim kitty wiccan. Hammerhead steverogers natasha odin! Johnnyblaze wendigo wasp avengers boomboom annihilus hydra jigsaw gideon carnage namor. Danvers firebird, moonknight mayparker shield. Batroc korg deathbird shang-chi menace natasha morph x-men gladiator nitro howard. Lizard frankenstein banshee vanisher suestorm tusk captainbritain harrier miek dormammu arnim. Defenders abomb cable kang bullseye yellowjacket. Scarletwitch moonknight spider-man, constrictor maestro vision nova mentallo magus lilith. Hyperion quasar tigra hellion gideon giantman toro chameleon ezekiel valkyrie madthinker! Osborn maelstrom yellowjacket contessa howard warbird wendigo genis-vell diablo flatman ka-zar madthinker. Aim, hulkling uatu hercules azazel constrictor bob kang jessicajones calypso ghostrider riptide arcade. Frankcastle mephisto punisher msmarvel betaray greengoblin elixir mandarin paladin amora rocketraccoon pyro. Captainbritain enchantress arcade ezekiel kingcobra azazel.</p>\r\n','Learn more','#','latest-news-1577724814-167723.jpg','latest-news-1577724814-13983.png','latest-news-1577724814-235671.png','2017-09-20',1),
	(3,'Student Sports','Intra-schools competition','Schoolistica performs really well in competition','\r\n<p>Benreilly earthquake, asgardian skrulls medusa exiles toxin. Daredevil boomboom magik mistyknight exiles mentor lilith, skreet urich smasher jackpot abomb. Juggernaut jigsaw ink vision kronos blackwidow warmachine janefoster. Gladiator asgardian husk blink cuckoos arcade? Crossbones unionjack spot daken spot inhumans giantman natasha magneto deathstrike cable. Arcade zemo johnnystorm phalanx hyperion, valkyrie ezekiel bug lockheed prism bishop fisk?</p>\r\n\r\n\r\n<p>Dust miracleman manthing redskull! Nightcrawler moonknight snowbird blastaar giantman caretaker korath osborn echo aurora pixie invaders firebrand! Nickfury ironman scourge stryker mongoose bullseye chameleon warmachine. Tusk, korath bob ezekiel angel. Typhoidmary kitty taskmaster exiles tchalla hankpym dazzler zemo drax. Sentry tombstone batroc angela, hellion humantorch stature jimmywoo. Redhulk x-51 aurora screwball. Sif?</p>\r\n\r\n\r\n<p>Hulk zemo mistyknight ilyana arnim kitty wiccan. Hammerhead steverogers natasha odin! Johnnyblaze wendigo wasp avengers boomboom annihilus hydra jigsaw gideon carnage namor. Danvers firebird, moonknight mayparker shield. Batroc korg deathbird shang-chi menace natasha morph x-men gladiator nitro howard. Lizard frankenstein banshee vanisher suestorm tusk captainbritain harrier miek dormammu arnim. Defenders abomb cable kang bullseye yellowjacket. Scarletwitch moonknight spider-man, constrictor maestro vision nova mentallo magus lilith. Hyperion quasar tigra hellion gideon giantman toro chameleon ezekiel valkyrie madthinker! Osborn maelstrom yellowjacket contessa howard warbird wendigo genis-vell diablo flatman ka-zar madthinker. Aim, hulkling uatu hercules azazel constrictor bob kang jessicajones calypso ghostrider riptide arcade. Frankcastle mephisto punisher msmarvel betaray greengoblin elixir mandarin paladin amora rocketraccoon pyro. Captainbritain enchantress arcade ezekiel kingcobra azazel.</p>','Learn more','#','latest-news-1577722855-11819.jpg','latest-news-1577722855-333115.png','latest-news-1577722855-745601.png','2017-09-20',1),
	(5,'','',NULL,'Ten Scholastica students were awarded for achieving highest marks in different subjects in the world and in the  awarded for achieving highest ...','','','',NULL,NULL,'2017-03-06',2),
	(6,'','',NULL,'Ten Scholastica students were awarded for achieving highest marks in different subjects in the world and in the  awarded for achieving highest ...','','','',NULL,NULL,'2017-03-06',2),
	(7,'','',NULL,'Ten Scholastica students were awarded for achieving highest marks in different subjects in the world and in the  awarded for achieving highest ...','','','',NULL,NULL,'2017-03-06',2),
	(8,'','',NULL,'Ten Scholastica students were awarded for achieving highest marks in different subjects in the world and in the  awarded for achieving highest ...','','','',NULL,NULL,'2017-03-06',2),
	(9,'','',NULL,'Ten Scholastica students were awarded for achieving highest marks in different subjects in the world and in the  ...','','','latest-event-1577731868-64590.jpg',NULL,NULL,'2017-09-20',3),
	(10,'','',NULL,'Ten Scholastica students were awarded for achieving highest marks in different subjects in the world and in the  ...','','','latest-event-1577731880-92230.jpg',NULL,NULL,'2017-09-20',3),
	(11,'','',NULL,'Ten Scholastica students were awarded for achieving highest marks in different subjects in the world and in the  ...','','','latest-event-1577731888-1132.jpg',NULL,NULL,'2017-09-20',3),
	(12,'','',NULL,'Ten Scholastica students were awarded for achieving highest marks in different subjects in the world and in the  ...','','','latest-event-1577731897-14082.jpg',NULL,NULL,'2017-09-20',3),
	(18,'Martial Arts','Students Karate Club','','<p>Benreilly earthquake, asgardian skrulls medusa exiles toxin. Daredevil boomboom magik mistyknight exiles mentor lilith, skreet urich smasher jackpot abomb. Juggernaut jigsaw ink vision kronos blackwidow warmachine janefoster. Gladiator asgardian husk blink cuckoos arcade? Crossbones unionjack spot daken spot inhumans giantman natasha magneto deathstrike cable. Arcade zemo johnnystorm phalanx hyperion, valkyrie ezekiel bug lockheed prism bishop fisk?</p>\r\n\r\n\r\n<p>Dust miracleman manthing redskull! Nightcrawler moonknight snowbird blastaar giantman caretaker korath osborn echo aurora pixie invaders firebrand! Nickfury ironman scourge stryker mongoose bullseye chameleon warmachine. Tusk, korath bob ezekiel angel. Typhoidmary kitty taskmaster exiles tchalla hankpym dazzler zemo drax. Sentry tombstone batroc angela, hellion humantorch stature jimmywoo. Redhulk x-51 aurora screwball. Sif?</p>\r\n\r\n\r\n<p>Hulk zemo mistyknight ilyana arnim kitty wiccan. Hammerhead steverogers natasha odin! Johnnyblaze wendigo wasp avengers boomboom annihilus hydra jigsaw gideon carnage namor. Danvers firebird, moonknight mayparker shield. Batroc korg deathbird shang-chi menace natasha morph x-men gladiator nitro howard. Lizard frankenstein banshee vanisher suestorm tusk captainbritain harrier miek dormammu arnim. Defenders abomb cable kang bullseye yellowjacket. Scarletwitch moonknight spider-man, constrictor maestro vision nova mentallo magus lilith. Hyperion quasar tigra hellion gideon giantman toro chameleon ezekiel valkyrie madthinker! Osborn maelstrom yellowjacket contessa howard warbird wendigo genis-vell diablo flatman ka-zar madthinker. Aim, hulkling uatu hercules azazel constrictor bob kang jessicajones calypso ghostrider riptide arcade. Frankcastle mephisto punisher msmarvel betaray greengoblin elixir mandarin paladin amora rocketraccoon pyro. Captainbritain enchantress arcade ezekiel kingcobra azazel.</p>\r\n','Read More','#','latest-news-1577719720-819092.jpg','latest-news-1577719720-470983.png','latest-news-1577719720-628742.png','2019-12-30',1),
	(23,'','',NULL,'Ten Scholastica students were awarded for achieving highest marks in different subjects in the world and in the  awarded for achieving highest.','','','',NULL,NULL,'2017-06-06',2),
	(24,'','',NULL,'Ten Scholastica students were awarded for achieving highest marks in different subjects in the world and in the  ... ...','','','latest-event-1577735475-540649.jpg','latest-event-1577735262-100906.jpg',NULL,'2017-09-12',3),
	(25,'Student Magazine 2020','Parents News','Parents should not take their children out of school or abroad during term time','\r\n<p>Benreilly earthquake, asgardian skrulls medusa exiles toxin. Daredevil boomboom magik mistyknight exiles mentor lilith, skreet urich smasher jackpot abomb. Juggernaut jigsaw ink vision kronos blackwidow warmachine janefoster. Gladiator asgardian husk blink cuckoos arcade? Crossbones unionjack spot daken spot inhumans giantman natasha magneto deathstrike cable. Arcade zemo johnnystorm phalanx hyperion, valkyrie ezekiel bug lockheed prism bishop fisk?</p>\r\n\r\n\r\n<p>Dust miracleman manthing redskull! Nightcrawler moonknight snowbird blastaar giantman caretaker korath osborn echo aurora pixie invaders firebrand! Nickfury ironman scourge stryker mongoose bullseye chameleon warmachine. Tusk, korath bob ezekiel angel. Typhoidmary kitty taskmaster exiles tchalla hankpym dazzler zemo drax. Sentry tombstone batroc angela, hellion humantorch stature jimmywoo. Redhulk x-51 aurora screwball. Sif?</p>\r\n\r\n\r\n<p>Hulk zemo mistyknight ilyana arnim kitty wiccan. Hammerhead steverogers natasha odin! Johnnyblaze wendigo wasp avengers boomboom annihilus hydra jigsaw gideon carnage namor. Danvers firebird, moonknight mayparker shield. Batroc korg deathbird shang-chi menace natasha morph x-men gladiator nitro howard. Lizard frankenstein banshee vanisher suestorm tusk captainbritain harrier miek dormammu arnim. Defenders abomb cable kang bullseye yellowjacket. Scarletwitch moonknight spider-man, constrictor maestro vision nova mentallo magus lilith. Hyperion quasar tigra hellion gideon giantman toro chameleon ezekiel valkyrie madthinker! Osborn maelstrom yellowjacket contessa howard warbird wendigo genis-vell diablo flatman ka-zar madthinker. Aim, hulkling uatu hercules azazel constrictor bob kang jessicajones calypso ghostrider riptide arcade. Frankcastle mephisto punisher msmarvel betaray greengoblin elixir mandarin paladin amora rocketraccoon pyro. Captainbritain enchantress arcade ezekiel kingcobra azazel.</p>\r\n','Read More','','latest-news-1577714187-370757.jpg','latest-news-1577716077-773707.png','latest-news-1577715984-785569.png','2019-12-30',1);

/*!40000 ALTER TABLE `news` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table news_category
# ------------------------------------------------------------

DROP TABLE IF EXISTS `news_category`;

CREATE TABLE `news_category` (
  `news_cat_id` int(11) NOT NULL AUTO_INCREMENT,
  `news_cat_name` varchar(30) NOT NULL,
  PRIMARY KEY (`news_cat_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `news_category` WRITE;
/*!40000 ALTER TABLE `news_category` DISABLE KEYS */;

INSERT INTO `news_category` (`news_cat_id`, `news_cat_name`)
VALUES
	(1,'Latest News'),
	(2,'Announcements'),
	(3,'Upcoming Events');

/*!40000 ALTER TABLE `news_category` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table post_category
# ------------------------------------------------------------

DROP TABLE IF EXISTS `post_category`;

CREATE TABLE `post_category` (
  `post_cat_id` int(11) NOT NULL AUTO_INCREMENT,
  `post_cat_name` varchar(30) NOT NULL,
  PRIMARY KEY (`post_cat_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `post_category` WRITE;
/*!40000 ALTER TABLE `post_category` DISABLE KEYS */;

INSERT INTO `post_category` (`post_cat_id`, `post_cat_name`)
VALUES
	(1,'Home'),
	(2,'Academics'),
	(3,'Admission'),
	(4,'Curriculum'),
	(5,'About Us');

/*!40000 ALTER TABLE `post_category` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table posts
# ------------------------------------------------------------

DROP TABLE IF EXISTS `posts`;

CREATE TABLE `posts` (
  `post_id` int(11) NOT NULL AUTO_INCREMENT,
  `post_title` varchar(100) CHARACTER SET utf8 NOT NULL,
  `post_subtitle` varchar(100) CHARACTER SET utf8 NOT NULL,
  `post_details` longtext CHARACTER SET utf8 NOT NULL,
  `post_btn_txt` varchar(20) CHARACTER SET utf8 NOT NULL,
  `post_btn_url` varchar(100) CHARACTER SET utf8 NOT NULL,
  `post_date` datetime NOT NULL,
  `post_image` varchar(255) CHARACTER SET utf8 NOT NULL,
  `post_cat_id` int(11) NOT NULL,
  PRIMARY KEY (`post_id`),
  KEY `post_cat_id` (`post_cat_id`),
  CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`post_cat_id`) REFERENCES `post_category` (`post_cat_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `posts` WRITE;
/*!40000 ALTER TABLE `posts` DISABLE KEYS */;

INSERT INTO `posts` (`post_id`, `post_title`, `post_subtitle`, `post_details`, `post_btn_txt`, `post_btn_url`, `post_date`, `post_image`, `post_cat_id`)
VALUES
	(1,'Welcome to','SCHOLASTICA SCHOOL','Scholastica was established in 1977 by Mrs. Yasmeen Murshed. It was founded with a mission to provide a balanced and well-rounded education for all our students, using English as the primary medium of instruction but placing equal emphasis on Bangla. Scholastica\'s mission is to build curious, knowledgeable and caring young individuals, who will be equipped to tackle head-on the challenges of our modern-day \"global village\". They will aspire to become responsible citizens, who will embrace and respect people from other cultures and walks of life.','Read More','#','2017-09-20 11:18:21','',1),
	(2,'Academics','','<p>Scholastica is one of the largest private English-medium schools in Bangladesh, offering pre-school to A\' Level classes of an international standard. It offers a complete school-leaving course using English as the medium of instruction. We emphasize equal proficiency in Bangla as a necessary prerequisite for a well-rounded education for Bangladeshi students.</p>\n                        <p>Scholastica\'s curriculum has been designed to reflect the specific needs of Bangladeshi students keeping in mind their heritage, culture and national identity. </p>\n                        <p>The school has designed a comprehensive curriculum for all classes leading to the University of Cambridge \nInternational Examinations Ordinary and Advanced Level General Certificate of Education courses which are \ntaught in Classes IX to XII. These examinations are administered by the British Council, Dhaka. </p>\n','','','2017-09-13 00:00:00','Latest-news-1506502687-95822.jpg',2),
	(3,'Admission in Scholastica','','<p>The admissions process in Scholastica is very transparent. Anyone is welcome to apply without any reference. Absolutely no donations are accepted; only published fees are required. </p>\n                        <p>During the admissions process, interviews are held by a panel of senior management, not a single individual. The interview panel is a team of qualified individuals from Scholastica\'s senior management. All decisions for admission are made through a committee, not by any one individual.</p>\n                        <p>No external agents/agencies are appointed or involved in the admissions process; the Admissions Office is the only point of contact for all admissions-related applications and inquiries. No Ascent Group personnel have a role in the admissions process except those in the Admissions Office and on the interview and selection panel. </p>\n                        \n                         <p>During the admissions process, interviews are held by a panel of senior management, not a single individual. The interview panel is a team of qualified individuals from Scholastica\'s senior management. All decisions for admission are made through a committee, not by any one individual.</p>','','','2017-09-06 00:00:00','Latest-news-1506497161-31393.jpg',3),
	(4,'Our Curriculum','','<p>Scholastica provides a complete school-leaving course of study, from pre-school to the A\' Levels. We have developed our own curriculum; it aims to deliver a holistic education program combining the core competencies of the national and the British curricula. The comprehensive curriculum designed for the elementary, secondary and high school classes ultimately leads to the University of Cambridge International Examinations Ordinary and Advanced Level General Certificate of Education exams, taught in the high school. These examinations are \nconducted under the auspices of the British Council, Dhaka. </p>','','','2017-09-11 00:00:00','',4),
	(5,'Junior School','','<p>\n                       In the Junior school, from Playgroup to Kindergarten II, we encourage children to observe their surroundings, think independently, ask questions and freely express themselves without fear or inhibition, thereby honing their observation, listening, verbal and comprehension skills. We create an environment that is conducive to oral participation and expression so that each individual is able to interpret and respond to all forms of external stimuli.. </p>\n                        <p>Students gradually develop a love of learning just by handling everyday objects and utilizing their own five senses. They start to identify letters and develop a love of reading. They also grow in confidence and are eventually able to independently hold their pencils and develop their writing skills.</p>','','','2017-09-20 00:00:00','',4),
	(6,'Middle School','','<p>From Class I onwards, our curriculum exposes students to more subjects in a formal classroom setting. The curriculum focuses on developing numeracy, literacy and an understanding of the environment and our surroundings. Learning in these classes is designed to develop positive attitudes. Students learn not only from their texts but also from their surroundings. We encourage the little observers to open their eyes, to look around and acquire knowledge from their friends, their teachers and elders, and their environment. Students build key skills and explore concepts in language (both English and Bangla), maths, science, Islamiat/moral science, art, physical education, music and drama. When they enter Class III, they also start to study social studieshistory, geography and Bangladesh studies. </p>','','','2017-09-19 00:00:00','',4),
	(7,'About Us','','<p>                     Scholastica\'s mission is to develop curious, knowledgeable and caring young individuals, who will be equipped to tackle head-on the challenges of our modern-day \"global village.\" They will aspire to become responsible and productive citizens, who will contribute to their communities, and embrace and respect people from other cultures and walks of life. </p>\n                        <p>Scholastica was established in 1977 by Mrs. Yasmeen Murshed. It was founded to provide a balanced and well-rounded education for students, using English as the primary medium of instruction but placing equal emphasis on Bangla. </p>\n                        <p>The customized curriculum builds the knowledge, skills and attitudes that students need to succeed in their academic and professional careers after school. Students are encouraged to challenge themselves, their peers and their teachers in a setting that gives them confidence and builds their skills to think independently. </p>','','','2017-09-20 00:00:00','About-news-1506497413-50968.jpg',5),
	(8,'High School','','      <h6>\n                       Scholastica\'s O\' Level program encourages students to engage, invent, manage and compete - equipping them for eventual success in the public examinations under Cambridge International Examinations. Years of experience teaching the O\' Levels has allowed us to understand the needs of the international examinations board - our mock results very closely mirror the actual results of our students. </h6>','','','2017-09-06 00:00:00','',4);

/*!40000 ALTER TABLE `posts` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table sliders
# ------------------------------------------------------------

DROP TABLE IF EXISTS `sliders`;

CREATE TABLE `sliders` (
  `slide_id` int(11) NOT NULL AUTO_INCREMENT,
  `slide_title` varchar(100) NOT NULL,
  `slide_subtitle` varchar(100) NOT NULL,
  `slide_description` text NOT NULL,
  `slide_btn_text` varchar(25) NOT NULL,
  `slide_btn_url` varchar(50) NOT NULL,
  `slide_image` varchar(255) NOT NULL,
  `active_slider` int(11) NOT NULL,
  PRIMARY KEY (`slide_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `sliders` WRITE;
/*!40000 ALTER TABLE `sliders` DISABLE KEYS */;

INSERT INTO `sliders` (`slide_id`, `slide_title`, `slide_subtitle`, `slide_description`, `slide_btn_text`, `slide_btn_url`, `slide_image`, `active_slider`)
VALUES
	(1,'Career and Technical Education','','Enter as much criteria on the left as you wish, or click an area on the map below to begin your search in a particular borough. To find your zoned school, enter your home address below.','Read More','#','slide-1577736612-78272.jpg',1),
	(2,'Kindergarten Offer Letters','','Providing excellent education since 1977 .Scholastica was established in 1977 by Mrs. Yasmeen Murshed. Scholastica was established in 1977 by Mrs. Yasmeen Murshed.....','Read More','#','slide-1577736580-31041.jpg',0),
	(3,'Elementary Schools','click an area on the map below to begin.','click an area on the map below to begin your search in a particular borough. To find your zoned school, enter your enter your home address below.','Read More','#','slide-1577736513-31080.jpg',0),
	(4,'Career and Technical Education','','ough. To find your zoned school, enter your enter your home address below.','Read More','#','slide-1577736534-52789.jpg',0);

/*!40000 ALTER TABLE `sliders` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table social
# ------------------------------------------------------------

DROP TABLE IF EXISTS `social`;

CREATE TABLE `social` (
  `social_id` int(11) NOT NULL AUTO_INCREMENT,
  `social_fa_class` varchar(20) NOT NULL,
  `social_link` varchar(50) NOT NULL,
  PRIMARY KEY (`social_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `social` WRITE;
/*!40000 ALTER TABLE `social` DISABLE KEYS */;

INSERT INTO `social` (`social_id`, `social_fa_class`, `social_link`)
VALUES
	(1,'facebook','https://www.facebook.com/'),
	(2,'twitter','https://twitter.com/'),
	(3,'google-plus','https://plus.google.com/'),
	(4,'linkedin','https://www.linkedin.com/'),
	(5,'pinterest-p','https://www.pinterest.com/'),
	(6,'youtube','https://www.youtube.com/');

/*!40000 ALTER TABLE `social` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table tbl_user
# ------------------------------------------------------------

DROP TABLE IF EXISTS `tbl_user`;

CREATE TABLE `tbl_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `phone` varchar(25) NOT NULL,
  `email` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `role_id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `role_id` (`role_id`),
  CONSTRAINT `tbl_user_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `tbl_user_role` (`role_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `tbl_user` WRITE;
/*!40000 ALTER TABLE `tbl_user` DISABLE KEYS */;

INSERT INTO `tbl_user` (`id`, `name`, `phone`, `email`, `username`, `password`, `role_id`, `image`)
VALUES
	(3,'Md. Shahriar Hosen','01710835653','hosen.shahriar.cse@gmail.com','shahriarcse','3974a091dc68cf81999741ce1ab92bf3',1,'User-1506409700-4535459.png'),
	(4,'superadmin','01710835653','hosen.shahriar.cse@gmail.com','superadmin','17c4520f6cfd1ab53d8745e84681eb49',1,'User-1506949222-7395891.png'),
	(12,'admin','+8801710835653','hosen.shahriar.cse@gmail.com','admin','21232f297a57a5a743894a0e4a801fc3',2,'User-1506951787-8150210.png');

/*!40000 ALTER TABLE `tbl_user` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table tbl_user_role
# ------------------------------------------------------------

DROP TABLE IF EXISTS `tbl_user_role`;

CREATE TABLE `tbl_user_role` (
  `role_id` int(11) NOT NULL AUTO_INCREMENT,
  `role_name` varchar(25) NOT NULL,
  PRIMARY KEY (`role_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `tbl_user_role` WRITE;
/*!40000 ALTER TABLE `tbl_user_role` DISABLE KEYS */;

INSERT INTO `tbl_user_role` (`role_id`, `role_name`)
VALUES
	(1,'Super Admin'),
	(2,'Admin'),
	(3,'Author'),
	(4,'Edithor'),
	(5,'Subscriber');

/*!40000 ALTER TABLE `tbl_user_role` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
