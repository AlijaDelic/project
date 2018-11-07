-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 06, 2018 at 02:25 PM
-- Server version: 5.7.21
-- PHP Version: 5.6.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `recept`
--

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

DROP TABLE IF EXISTS `articles`;
CREATE TABLE IF NOT EXISTS `articles` (
  `article_id` int(11) NOT NULL AUTO_INCREMENT,
  `recipe_id` int(11) NOT NULL,
  `ingridian_id` int(11) NOT NULL,
  `amount` varchar(45) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`article_id`),
  KEY `fk_recipes_articles_idx` (`recipe_id`),
  KEY `fk_ingridians_articles_idx` (`ingridian_id`)
) ENGINE=InnoDB AUTO_INCREMENT=132 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`article_id`, `recipe_id`, `ingridian_id`, `amount`) VALUES
(82, 209, 1, '40 dag'),
(83, 209, 2, '20 dag'),
(84, 209, 9, '17 dag'),
(85, 209, 3, '2'),
(86, 209, 4, '6 zlica'),
(87, 209, 5, '1 zlica'),
(88, 209, 6, '1 kg'),
(89, 209, 7, '4 zlice'),
(90, 209, 8, '1/2 vrecice'),
(91, 209, 9, '15 dg'),
(102, 212, 10, '250 g'),
(103, 212, 11, '2-3 žlice'),
(104, 212, 12, '200 ml'),
(105, 212, 13, '100 g'),
(106, 212, 14, '500 g'),
(107, 212, 15, '80 g'),
(108, 212, 16, '1 žličica'),
(109, 212, 17, '100 g'),
(110, 212, 18, '1-2 žlice'),
(111, 212, 19, '1'),
(112, 215, 9, '100g'),
(113, 215, 20, '1 vrecica'),
(114, 215, 21, '100 g'),
(115, 215, 22, '1 vrecica'),
(116, 215, 23, '40 g'),
(117, 215, 24, '100 g'),
(118, 215, 25, '100 ml'),
(119, 215, 26, '2'),
(120, 215, 26, '3 zlice'),
(121, 215, 27, '40 g'),
(122, 215, 28, '100 g'),
(123, 216, 32, '1'),
(124, 216, 33, '3 zlice'),
(125, 216, 34, '2 cesnja'),
(126, 216, 35, 'malo'),
(127, 216, 36, '1/2 vezice'),
(128, 216, 37, '200 g'),
(129, 216, 38, 'oko 1 kg'),
(130, 216, 39, '100 g'),
(131, 216, 40, '3 zlice');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `category_id` int(11) NOT NULL AUTO_INCREMENT,
  `category_name` varchar(45) NOT NULL,
  PRIMARY KEY (`category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `category_name`) VALUES
(1, 'Slatko'),
(2, 'Slano');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

DROP TABLE IF EXISTS `comments`;
CREATE TABLE IF NOT EXISTS `comments` (
  `comment_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `content` varchar(1024) NOT NULL,
  `recipe_id` int(11) NOT NULL,
  PRIMARY KEY (`comment_id`),
  KEY `user_id_idx` (`user_id`),
  KEY `article_id_idx` (`recipe_id`)
) ENGINE=InnoDB AUTO_INCREMENT=66 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `user_id`, `content`, `recipe_id`) VALUES
(5, 51, 'asdasdasdadsasd', 215),
(6, 51, 'qweqweadsa sd', 215),
(13, 51, 'qweqweadsa sd', 215),
(14, 51, 'qweqweadsa sd', 215),
(15, 51, 'qweqweadsa sd', 215),
(16, 51, 'qweqweadsa sd', 215),
(17, 51, 'qweqweadsa sd', 215),
(22, 52, 'qweqweadsa sd', 215),
(30, 52, 'qweqweadsa sd', 215),
(31, 52, 'qweqweadsa sd', 215),
(34, 52, 'qweqweadsa sd', 215),
(35, 48, 'asdasdasd', 215),
(36, 52, 'qweqweadsa sd', 215),
(37, 52, 'qweqweadsa sd', 215),
(38, 52, 'qweqweadsa sd', 215),
(39, 52, 'qweqweadsa sd', 215),
(40, 52, 'qweqweadsa sd', 215),
(41, 52, 'qweqweadsa sd', 215),
(42, 52, 'qweqweadsa sd', 215),
(43, 52, 'qweqweadsa sd', 215),
(44, 52, 'qweqweadsa sd', 215),
(45, 52, 'qweqweadsa sd', 215),
(46, 52, 'qweqweadsa sd', 215),
(47, 52, 'qweqweadsa sd', 215),
(48, 52, 'qweqweadsa sd', 215),
(49, 52, 'qweqweadsa sd', 215),
(50, 52, 'qweqweadsa sd', 215),
(51, 52, 'qweqweadsa sd', 215),
(52, 52, 'qweqweadsa sd', 215),
(53, 52, 'qweqweadsa sd', 215),
(54, 52, 'qweqweadsa sd', 215),
(55, 52, 'qweqweadsa sd', 215),
(56, 52, 'qweqweadsa sd', 215),
(57, 52, 'qweqweadsa sd', 215),
(58, 52, 'qweqweadsa sd', 215),
(59, 52, 'qweqweadsa sd', 215),
(60, 52, 'qweqweadsa sd', 215),
(61, 52, 'qweqweadsa sd', 215),
(62, 48, '123132', 215),
(63, 52, 'qweqweadsa sd', 215),
(64, 52, 'qweqweadsa sd', 215),
(65, 48, '123132', 215);

-- --------------------------------------------------------

--
-- Table structure for table `ingridians`
--

DROP TABLE IF EXISTS `ingridians`;
CREATE TABLE IF NOT EXISTS `ingridians` (
  `ingridian_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`ingridian_id`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `ingridians`
--

INSERT INTO `ingridians` (`ingridian_id`, `name`) VALUES
(1, 'brasna'),
(2, 'masti'),
(3, 'jaja'),
(4, 'mlijeka'),
(5, 'sode bikarbone'),
(6, 'kiselih jabuka'),
(7, 'griza'),
(8, 'cimeta'),
(9, 'secera'),
(10, 'čokoladnih (tamnih) prhkih keksa'),
(11, 'vode'),
(12, 'slatkog vrhnja'),
(13, 'čokolade (70 % kakaa)'),
(14, 'kremastog sira (mascarpone)'),
(15, 'šećera u prahu'),
(16, 'Kakaa u prahu Dolcela'),
(17, 'Džema aronija Podravka'),
(18, 'voćnog likera'),
(19, 'Za ukrašavanje: Šlag pjena Dolcel'),
(20, 'Vanilin šećera Dolcela'),
(21, 'Pšeničnog oštrog brašna Podravka'),
(22, 'Praška za pecivo Dolcela'),
(23, 'Pšenične krupice Podravka'),
(24, 'maka'),
(25, 'ulja'),
(26, 'naribane jabuke'),
(27, 'maslaca'),
(28, 'čokolade'),
(29, 'krompir'),
(30, 'Luk'),
(31, 'Suho meso'),
(32, 'poriluk'),
(33, 'maslinovo ulje'),
(34, 'cesnjak'),
(35, 'sol'),
(36, 'persun'),
(37, 'Pecena paprika'),
(38, 'teletina (u komadu)'),
(39, 'panko mrvica'),
(40, 'hren');

-- --------------------------------------------------------

--
-- Table structure for table `recipes`
--

DROP TABLE IF EXISTS `recipes`;
CREATE TABLE IF NOT EXISTS `recipes` (
  `recipe_id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(256) COLLATE utf8_bin NOT NULL,
  `subtitle` varchar(256) COLLATE utf8_bin NOT NULL,
  `category_id` int(11) NOT NULL,
  `date` timestamp(6) NOT NULL,
  `content` varchar(2048) COLLATE utf8_bin NOT NULL,
  `image` varchar(45) CHARACTER SET latin1 NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`recipe_id`),
  KEY `category_id_idx` (`category_id`),
  KEY `FK_users_recipes_idx` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=217 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `recipes`
--

INSERT INTO `recipes` (`recipe_id`, `title`, `subtitle`, `category_id`, `date`, `content`, `image`, `user_id`) VALUES
(209, 'Pita od jabuka', 'Pita od jabuka', 1, '2018-11-01 12:54:31.254325', '<h3>Priprema:</h3><ul><li>Brasno i mast stavite u dublju zdjelu i dlanovima trljajte da postane krupicasto. Dodajte secer, 1 jaje, 1 zumance, mlijeko i sodu bikarbonu, pa umijesite.</li><li>Stavite ga u frizider na jedno 1/2 sata. Zatim ga podijelite na dva dijela. Jedan dio razvaljajte na pobrasnjenoj dasci i prebacite u namascen i pobrasnjen pleh.</li><li>Zatim stavite nadjev od naribanih jabuka, pospite grizom, cimetom i secerom</li></ul><p>&nbsp;</p><ul><li>Odozgo stavite drugi dio razvaljanog tijesta. Premazite bjelancem i pecite na srednjoj temperaturi oko 40 min.</li><li>Pecenu posuti secerom u prahu i ohladjenu narezati na kocke.</li></ul><p>Posluzivanje</p><p>U tijesto se moze dodati i 1-2 zlice kiselog vrhnja (a onda toliko oduzmite masti).</p>', 'Pita-od-jabuka.jpg', 48),
(212, 'Cheese cake (Slatki kolac od sira)', 'Cheese cake (Slatki kolac od sira)', 1, '2018-11-01 12:59:17.000000', '<h3>Priprema:</h3><p>Za podlogu:</p><ul><li>Papirom za pečenje obložite tepsiju (30x18 cm) i dodatno namastite.</li></ul><p>&nbsp;</p><ul><li>Kekse sameljite, dodajte otopljeni maslac i miješajte da dobijete jednoličnu smjesu.</li><li>Dodajte malo vode (rastresite), smjesu stavite u tepsiju i utisnite tako da dobijete podlogu. Stavite u hladnjak na 1 sat da se podloga učvrsti</li></ul><p>Za kremu:</p><ul><li>Odozgo stavite drugi dio razvaljanog tijesta. Premazite bjelancem i pecite na srednjoj temperaturi oko 40 min Čokoladu natrgajte na kockice pa je zajedno sa 100 ml slatkog vrhnja stavite u posudu i na vodenu kupelj da se otopi.</li><li>U drugoj posudi sir i 100 ml vrhnja miješajte da dobijete homogenu smjesu.</li></ul><p>&nbsp;</p><ul><li>Umiješajte jedno po jedno jaje, šećer pomiješan s kakaom i na kraju smjesu čokolade i džem od aronije.</li><li>Kremu nanesite na podlogu od keksa i pecite u pećnici zagrijanoj na 170 °C 40 minuta.</li><li>Zatim pećnicu isključite, a kolač ostavite da se ohladi u pećnici oko 1 sat. Nakon toga kolač ohladite u hladnjaku nekoliko sati.</li></ul><p><br>&nbsp;</p><p>Za umak:</p><ul><li>Džem zagrijte, dodajte liker i vode po potrebi da dobijete željenu gustoću umaka.</li></ul><p>Za ukrašavanje:</p><ul><li>Šlag pripremite tako da sadržaj vrećice stavite u hladnu vodu i miješajte električnom miješalicom do željene gustoće.</li></ul><p><br>&nbsp;</p><p>Posluživanje:</p><ul><li>Kolač poslužite ukrašen šlagom i s umakom od aronije.</li></ul>', 'chese_cake.jpg', 48),
(215, 'Pita sa makom', 'Pita sa makom', 1, '2018-11-01 13:06:38.000000', '<h3>Priprema:</h3><ul><li>Jaja pjenasto izmiješajte sa šećerom i vanilin šećerom.</li></ul><p>&nbsp;</p><ul><li>Dodajte brašno pomiješano s praškom za pecivo, pšeničnu krupicu, mak koji ste prethodno samljeli, ulje, jabuke, mlijeko i sve zajedno dobro izmiješajte.</li></ul><p>&nbsp;</p><ul><li>Pripremljenu smjesu izlijte u namašćenu i pobrašnjenu tepsiju (20×30 cm).</li></ul><p>&nbsp;</p><ul><li>Pecite u zagrijanoj pećnici na 180°C oko 30 minuta.</li></ul><p>&nbsp;</p><ul><li>Na laganoj vatri rastopite maslac. Maslac maknite s vatre i umiješajte natrganu čokoladu.</li></ul><p>&nbsp;</p><ul><li>Pripremljenu glazuru prelijte preko ohlađenog kolača.</li></ul><p>&nbsp;</p><p>Posluživanje</p><ul><li>Kolač poslužite narezan na kocke.</li></ul>', 'kolac-sa-makom.jpg', 48),
(216, 'Hrskava rolada', 'Maštovita mesna rolada osmišljena za posebna slavlja oduševiti će kombinacijom začina, sira i hrena. ', 2, '2018-11-06 14:23:13.000000', '<h2>Priprema</h2><ol><li>1.</li></ol><p>Poriluk sitno narežite i stavite na zagrijano maslinovo ulje u tavi. Popecite poriluk da uvene, a zatim dodajte protisnuti češnjak, maknite s vatre, posolite, popaprite i umiješajte sitno narezani peršin. Papriku isperite i odvojite da dobijete ploške.</p><ol><li>2.</li></ol><p>Meso oblikujte u veliki odrezak (neka bude duži, a uži) i potucite da bude iste debljine. Odrezak stavite na podlogu pa lagano posolite i pospite mljevenim crnim paprom.</p><ol><li>3.</li></ol><p>Po njemu rasporedite ploške paprike (ostavite rub mesa bez nadjeva) te preko njih ploške sira. Rasporedite pripremljeni poriluk i meso savijte u tanju roladu.</p><ol><li>4.</li></ol><p>Krušnim mrvicama dodajte ružmarin, peršin, hren, maslinovo ulje, sol i mljeveni papar. Smjesu dobro promiješajte. Roladu premažite maslinovim uljem i obložite pripremljenom smjesom.</p><ol><li>5.</li></ol><p>Na nekoliko mjesta čačkalicom pričvrstite meso da se tijekom pečenja ne odmota. Pripazite da kora ostane ravnomjerno nanesena.</p><ol><li>6.</li></ol><h3>Savjet</h3><p>Umjesto teletine možete upotrijebiti veće pureće odreske.</p><p>Roladu stavite u nauljenu posudu za pečenje i pecite oko 50 minuta u pećnici zagrijanoj na 180 °C. Korica će dobiti zlatnorumenu boju.</p>', '4ad848d420266ec3397e3e44499e895d_view_l.jpg', 48);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
CREATE TABLE IF NOT EXISTS `roles` (
  `role_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  PRIMARY KEY (`role_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`role_id`, `name`) VALUES
(1, 'admin'),
(2, 'visitor');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `role_id` int(11) NOT NULL,
  `username` varchar(45) COLLATE utf8_bin NOT NULL,
  `password` varchar(45) CHARACTER SET latin1 NOT NULL,
  `name` varchar(45) COLLATE utf8_bin NOT NULL,
  `s_name` varchar(45) COLLATE utf8_bin NOT NULL,
  `email` varchar(45) CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`user_id`),
  KEY `role_id` (`role_id`)
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `role_id`, `username`, `password`, `name`, `s_name`, `email`) VALUES
(48, 1, 'Administrator', '81dc9bdb52d04dc20036dbd8313ed055', 'Admin', 'Admin', 'admin@g.com'),
(50, 2, 'Alija', '81dc9bdb52d04dc20036dbd8313ed055', 'asdada', 'adsasd', 'asdasd'),
(52, 1, 'Deksida', 'df5ee893e7bf079846e26dae3941e935', 'Deksida', 'Delić', 'asdkljk@gmal.com');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `articles`
--
ALTER TABLE `articles`
  ADD CONSTRAINT `FK_ingridians_articles` FOREIGN KEY (`ingridian_id`) REFERENCES `ingridians` (`ingridian_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FK_recipes_articles` FOREIGN KEY (`recipe_id`) REFERENCES `recipes` (`recipe_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `article_id` FOREIGN KEY (`recipe_id`) REFERENCES `recipes` (`recipe_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `recipes`
--
ALTER TABLE `recipes`
  ADD CONSTRAINT `FK_users_recipes` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `category_id` FOREIGN KEY (`category_id`) REFERENCES `categories` (`category_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `role_id` FOREIGN KEY (`role_id`) REFERENCES `roles` (`role_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
