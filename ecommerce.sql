-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 04, 2017 at 05:34 PM
-- Server version: 5.5.54
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `ecommerce`
--
CREATE DATABASE IF NOT EXISTS `ecommerce` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `ecommerce`;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_address`
--

DROP TABLE IF EXISTS `tbl_address`;
CREATE TABLE IF NOT EXISTS `tbl_address` (
  `address_id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_id` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `address` varchar(60) DEFAULT NULL,
  `town` varchar(30) DEFAULT NULL,
  `city` varchar(20) DEFAULT NULL,
  `postcode` char(8) DEFAULT NULL,
  PRIMARY KEY (`address_id`),
  KEY `fk_tbl_address_tbl_customer_idx` (`customer_id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_address`
--

INSERT INTO `tbl_address` (`address_id`, `customer_id`, `name`, `address`, `town`, `city`, `postcode`) VALUES
(4, 1, 'Old House', '52 Belton Way', 'Bow', 'London', 'E3 4BB'),
(9, 1, 'Test', '123 Test Road', 'Test TOWN', 'Test CITY', 'EC1V 0HB'),
(12, 14, 'Test', '123 Test Road', 'Test TOWN', 'Test CITY', 'EC1V 0HB');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_car`
--

DROP TABLE IF EXISTS `tbl_car`;
CREATE TABLE IF NOT EXISTS `tbl_car` (
  `car_id` int(11) NOT NULL AUTO_INCREMENT,
  `make_id` int(11) NOT NULL,
  `model` varchar(45) DEFAULT NULL,
  `description` text NOT NULL,
  `image_url` varchar(45) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `price` decimal(9,2) DEFAULT NULL,
  `stock` tinyint(2) NOT NULL,
  `body_shape` enum('Convertible','Coupe','Hatchback','Saloon','SUV') DEFAULT NULL,
  `top_speed` smallint(3) DEFAULT NULL,
  `horse_power` smallint(4) DEFAULT NULL,
  `torque` smallint(4) DEFAULT NULL,
  `transmission` enum('Automatic','Manual','Semi-Automatic') DEFAULT NULL,
  `fuel_type` enum('Diesel','Electric','Petrol') DEFAULT NULL,
  `doors` tinyint(1) DEFAULT NULL,
  `emissions` smallint(3) DEFAULT NULL,
  `air_conditioning` tinyint(1) DEFAULT '0',
  `antilock_braking_system` tinyint(1) DEFAULT '0',
  `automatic_headlamps` tinyint(1) DEFAULT '0',
  `brake_assist` tinyint(1) DEFAULT '0',
  `cd_player` tinyint(1) DEFAULT '0',
  `central_locking` tinyint(1) DEFAULT '0',
  `crash_sensor` tinyint(1) DEFAULT '0',
  `driver_airbag` tinyint(1) DEFAULT '0',
  `engine_check_warning` tinyint(1) DEFAULT '0',
  `leather_seats` tinyint(1) DEFAULT '0',
  `passenger_airbag` tinyint(1) DEFAULT '0',
  `power_door_locks` tinyint(1) DEFAULT '0',
  `power_steering` tinyint(1) DEFAULT '0',
  `power_windows` tinyint(1) DEFAULT '0',
  `engine_type` varchar(45) DEFAULT NULL,
  `fuel_capacity` tinyint(2) DEFAULT NULL,
  `seating_capacity` tinyint(1) DEFAULT NULL,
  `no_of_cylinders` tinyint(2) DEFAULT NULL,
  PRIMARY KEY (`car_id`),
  KEY `fk_tbl_car_tbl_make1_idx` (`make_id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_car`
--

INSERT INTO `tbl_car` (`car_id`, `make_id`, `model`, `description`, `image_url`, `price`, `stock`, `body_shape`, `top_speed`, `horse_power`, `torque`, `transmission`, `fuel_type`, `doors`, `emissions`, `air_conditioning`, `antilock_braking_system`, `automatic_headlamps`, `brake_assist`, `cd_player`, `central_locking`, `crash_sensor`, `driver_airbag`, `engine_check_warning`, `leather_seats`, `passenger_airbag`, `power_door_locks`, `power_steering`, `power_windows`, `engine_type`, `fuel_capacity`, `seating_capacity`, `no_of_cylinders`) VALUES
(1, 1, 'R8', '<p>Of brought fill fowl rule male the light fourth god deep moved appear waters you whose were image give bearing kind bearing open let. Gathered days, don&#39;t stars so. Divided second stars isn&#39;t, you. Gathering gathering morning set. Bearing appear man great fowl saying can&#39;t the behold said cattle. From won&#39;t Sixth.</p>  <p>Wherein every bring she&#39;d lights brought female may fruitful. Beast. Which grass can&#39;t void all. Moved tree heaven so give. Signs was their Behold land. Night, second night god under seas tree created darkness their. Divided seasons bearing in two.</p>  <p>She&#39;d male seed their night saw fill open, given living years divided spirit. Sea fruit. Replenish green second female she&#39;d Created seed stars which. Face them behold from under gathered form third dominion, bring, there our so was. Above.</p>  <p>Rule waters blessed, sea moveth also behold rule. After seas living. Yielding. Sixth creeping one green for their land green bearing man, whales one from behold creepeth That she&#39;d moveth them also.</p>  <p>In great evening fish fruit don&#39;t whales kind, cattle gathering greater can&#39;t it don&#39;t male life was. Herb made given third called greater, fish whose every female bring, second. Let there. Male fourth. Forth can&#39;t their tree.</p>', 'img/bmw/icon.jpg', '120665.00', 37, 'Coupe', 205, 540, 550, 'Manual', 'Petrol', 2, 25, 1, 1, 0, 1, 1, 0, 1, 1, 1, 0, 1, 1, 0, 1, '4.2 L FSI V8', 45, 2, 8),
(2, 4, '3 Series', '<p>Of brought fill fowl rule male the light fourth god deep moved appear waters you whose were image give bearing kind bearing open let. Gathered days, don&#39;t stars so. Divided second stars isn&#39;t, you. Gathering gathering morning set. Bearing appear man great fowl saying can&#39;t the behold said cattle. From won&#39;t Sixth.</p>  <p>Wherein every bring she&#39;d lights brought female may fruitful. Beast. Which grass can&#39;t void all. Moved tree heaven so give. Signs was their Behold land. Night, second night god under seas tree created darkness their. Divided seasons bearing in two.</p>  <p>She&#39;d male seed their night saw fill open, given living years divided spirit. Sea fruit. Replenish green second female she&#39;d Created seed stars which. Face them behold from under gathered form third dominion, bring, there our so was. Above.</p>  <p>Rule waters blessed, sea moveth also behold rule. After seas living. Yielding. Sixth creeping one green for their land green bearing man, whales one from behold creepeth That she&#39;d moveth them also.</p>  <p>In great evening fish fruit don&#39;t whales kind, cattle gathering greater can&#39;t it don&#39;t male life was. Herb made given third called greater, fish whose every female bring, second. Let there. Male fourth. Forth can&#39;t their tree.</p>', 'img/bmw/icon.jpg', '24800.00', 68, 'Saloon', 155, 350, 600, 'Automatic', 'Diesel', 4, 50, 1, 1, 0, 1, 0, 1, 1, 1, 0, 1, 1, 1, 0, 1, 'V8 Supercharged', 40, 5, 6),
(3, 8, 'Mustang', '<p>Of brought fill fowl rule male the light fourth god deep moved appear waters you whose were image give bearing kind bearing open let. Gathered days, don&#39;t stars so. Divided second stars isn&#39;t, you. Gathering gathering morning set. Bearing appear man great fowl saying can&#39;t the behold said cattle. From won&#39;t Sixth.</p>  <p>Wherein every bring she&#39;d lights brought female may fruitful. Beast. Which grass can&#39;t void all. Moved tree heaven so give. Signs was their Behold land. Night, second night god under seas tree created darkness their. Divided seasons bearing in two.</p>  <p>She&#39;d male seed their night saw fill open, given living years divided spirit. Sea fruit. Replenish green second female she&#39;d Created seed stars which. Face them behold from under gathered form third dominion, bring, there our so was. Above.</p>  <p>Rule waters blessed, sea moveth also behold rule. After seas living. Yielding. Sixth creeping one green for their land green bearing man, whales one from behold creepeth That she&#39;d moveth them also.</p>  <p>In great evening fish fruit don&#39;t whales kind, cattle gathering greater can&#39;t it don&#39;t male life was. Herb made given third called greater, fish whose every female bring, second. Let there. Male fourth. Forth can&#39;t their tree.</p>', 'img/bmw/icon.jpg', '35000.00', 65, 'Coupe', 160, 350, 400, 'Manual', 'Diesel', 2, 30, 0, 1, 1, 0, 0, 1, 0, 0, 1, 1, 0, 0, 1, 0, 'TDCI V8 Diesel', 50, 2, 8),
(9, 2, 'DB9', '<p>Of brought fill fowl rule male the light fourth god deep moved appear waters you whose were image give bearing kind bearing open let. Gathered days, don&#39;t stars so. Divided second stars isn&#39;t, you. Gathering gathering morning set. Bearing appear man great fowl saying can&#39;t the behold said cattle. From won&#39;t Sixth.</p>  <p>Wherein every bring she&#39;d lights brought female may fruitful. Beast. Which grass can&#39;t void all. Moved tree heaven so give. Signs was their Behold land. Night, second night god under seas tree created darkness their. Divided seasons bearing in two.</p>  <p>She&#39;d male seed their night saw fill open, given living years divided spirit. Sea fruit. Replenish green second female she&#39;d Created seed stars which. Face them behold from under gathered form third dominion, bring, there our so was. Above.</p>  <p>Rule waters blessed, sea moveth also behold rule. After seas living. Yielding. Sixth creeping one green for their land green bearing man, whales one from behold creepeth That she&#39;d moveth them also.</p>  <p>In great evening fish fruit don&#39;t whales kind, cattle gathering greater can&#39;t it don&#39;t male life was. Herb made given third called greater, fish whose every female bring, second. Let there. Male fourth. Forth can&#39;t their tree.</p>', 'img/bmw/icon.jpg', '126000.00', 34, 'Coupe', 183, 564, 569, 'Manual', 'Diesel', 2, 325, 1, 1, 0, 1, 1, 0, 1, 1, 1, 0, 1, 0, 0, 1, '6.0L V12', 78, 2, 4),
(10, 3, 'Continental GT', '<p>Of brought fill fowl rule male the light fourth god deep moved appear waters you whose were image give bearing kind bearing open let. Gathered days, don&#39;t stars so. Divided second stars isn&#39;t, you. Gathering gathering morning set. Bearing appear man great fowl saying can&#39;t the behold said cattle. From won&#39;t Sixth.</p>  <p>Wherein every bring she&#39;d lights brought female may fruitful. Beast. Which grass can&#39;t void all. Moved tree heaven so give. Signs was their Behold land. Night, second night god under seas tree created darkness their. Divided seasons bearing in two.</p>  <p>She&#39;d male seed their night saw fill open, given living years divided spirit. Sea fruit. Replenish green second female she&#39;d Created seed stars which. Face them behold from under gathered form third dominion, bring, there our so was. Above.</p>  <p>Rule waters blessed, sea moveth also behold rule. After seas living. Yielding. Sixth creeping one green for their land green bearing man, whales one from behold creepeth That she&#39;d moveth them also.</p>  <p>In great evening fish fruit don&#39;t whales kind, cattle gathering greater can&#39;t it don&#39;t male life was. Herb made given third called greater, fish whose every female bring, second. Let there. Male fourth. Forth can&#39;t their tree.</p>', 'img/bmw/icon.jpg', '140300.00', 0, 'Coupe', 198, 582, 720, 'Automatic', 'Petrol', 4, 330, 1, 1, 1, 1, 1, 0, 1, 1, 1, 0, 1, 0, 1, 0, '6.0L W12', 90, 5, 8),
(16, 5, 'Veyron', '<p>Of brought fill fowl rule male the light fourth god deep moved appear waters you whose were image give bearing kind bearing open let. Gathered days, don&#39;t stars so. Divided second stars isn&#39;t, you. Gathering gathering morning set. Bearing appear man great fowl saying can&#39;t the behold said cattle. From won&#39;t Sixth.</p>  <p>Wherein every bring she&#39;d lights brought female may fruitful. Beast. Which grass can&#39;t void all. Moved tree heaven so give. Signs was their Behold land. Night, second night god under seas tree created darkness their. Divided seasons bearing in two.</p>  <p>She&#39;d male seed their night saw fill open, given living years divided spirit. Sea fruit. Replenish green second female she&#39;d Created seed stars which. Face them behold from under gathered form third dominion, bring, there our so was. Above.</p>  <p>Rule waters blessed, sea moveth also behold rule. After seas living. Yielding. Sixth creeping one green for their land green bearing man, whales one from behold creepeth That she&#39;d moveth them also.</p>  <p>In great evening fish fruit don&#39;t whales kind, cattle gathering greater can&#39;t it don&#39;t male life was. Herb made given third called greater, fish whose every female bring, second. Let there. Male fourth. Forth can&#39;t their tree.</p>', 'img/bmw/icon.jpg', '1400000.00', 7, 'Coupe', 253, 1200, 1500, 'Manual', 'Diesel', 2, 596, 1, 0, 0, 1, 1, 0, 0, 1, 1, 0, 1, 1, 0, 0, 'W16', 99, 2, 16),
(17, 6, 'Camaro', '<p>Of brought fill fowl rule male the light fourth god deep moved appear waters you whose were image give bearing kind bearing open let. Gathered days, don&#39;t stars so. Divided second stars isn&#39;t, you. Gathering gathering morning set. Bearing appear man great fowl saying can&#39;t the behold said cattle. From won&#39;t Sixth.</p>  <p>Wherein every bring she&#39;d lights brought female may fruitful. Beast. Which grass can&#39;t void all. Moved tree heaven so give. Signs was their Behold land. Night, second night god under seas tree created darkness their. Divided seasons bearing in two.</p>  <p>She&#39;d male seed their night saw fill open, given living years divided spirit. Sea fruit. Replenish green second female she&#39;d Created seed stars which. Face them behold from under gathered form third dominion, bring, there our so was. Above.</p>  <p>Rule waters blessed, sea moveth also behold rule. After seas living. Yielding. Sixth creeping one green for their land green bearing man, whales one from behold creepeth That she&#39;d moveth them also.</p>  <p>In great evening fish fruit don&#39;t whales kind, cattle gathering greater can&#39;t it don&#39;t male life was. Herb made given third called greater, fish whose every female bring, second. Let there. Male fourth. Forth can&#39;t their tree.</p>', 'img/bmw/icon.jpg', '30645.00', 0, 'Coupe', 184, 580, 598, 'Semi-Automatic', 'Diesel', 2, 252, 1, 0, 0, 1, 1, 1, 0, 0, 1, 0, 1, 0, 0, 1, '6.2L V8', 72, 2, 4),
(18, 7, '488 Spider', '<p>Of brought fill fowl rule male the light fourth god deep moved appear waters you whose were image give bearing kind bearing open let. Gathered days, don&#39;t stars so. Divided second stars isn&#39;t, you. Gathering gathering morning set. Bearing appear man great fowl saying can&#39;t the behold said cattle. From won&#39;t Sixth.</p>  <p>Wherein every bring she&#39;d lights brought female may fruitful. Beast. Which grass can&#39;t void all. Moved tree heaven so give. Signs was their Behold land. Night, second night god under seas tree created darkness their. Divided seasons bearing in two.</p>  <p>She&#39;d male seed their night saw fill open, given living years divided spirit. Sea fruit. Replenish green second female she&#39;d Created seed stars which. Face them behold from under gathered form third dominion, bring, there our so was. Above.</p>  <p>Rule waters blessed, sea moveth also behold rule. After seas living. Yielding. Sixth creeping one green for their land green bearing man, whales one from behold creepeth That she&#39;d moveth them also.</p>  <p>In great evening fish fruit don&#39;t whales kind, cattle gathering greater can&#39;t it don&#39;t male life was. Herb made given third called greater, fish whose every female bring, second. Let there. Male fourth. Forth can&#39;t their tree.</p>', 'img/bmw/icon.jpg', '203236.00', 23, 'Coupe', 202, 661, 561, 'Manual', 'Petrol', 2, 260, 0, 1, 1, 0, 0, 1, 1, 1, 0, 1, 1, 0, 1, 1, '3.9L V8', 78, 2, 12),
(19, 9, 'XF', '<p>Of brought fill fowl rule male the light fourth god deep moved appear waters you whose were image give bearing kind bearing open let. Gathered days, don&#39;t stars so. Divided second stars isn&#39;t, you. Gathering gathering morning set. Bearing appear man great fowl saying can&#39;t the behold said cattle. From won&#39;t Sixth.</p>  <p>Wherein every bring she&#39;d lights brought female may fruitful. Beast. Which grass can&#39;t void all. Moved tree heaven so give. Signs was their Behold land. Night, second night god under seas tree created darkness their. Divided seasons bearing in two.</p>  <p>She&#39;d male seed their night saw fill open, given living years divided spirit. Sea fruit. Replenish green second female she&#39;d Created seed stars which. Face them behold from under gathered form third dominion, bring, there our so was. Above.</p>  <p>Rule waters blessed, sea moveth also behold rule. After seas living. Yielding. Sixth creeping one green for their land green bearing man, whales one from behold creepeth That she&#39;d moveth them also.</p>  <p>In great evening fish fruit don&#39;t whales kind, cattle gathering greater can&#39;t it don&#39;t male life was. Herb made given third called greater, fish whose every female bring, second. Let there. Male fourth. Forth can&#39;t their tree.</p>', 'img/bmw/icon.jpg', '31780.00', 69, 'Saloon', 132, 380, 430, 'Automatic', 'Diesel', 4, 104, 0, 0, 0, 0, 0, 1, 1, 0, 0, 0, 0, 0, 1, 0, 'Supercharged 3.0L V6', 65, 5, 4),
(20, 10, 'Agera R', '<p>Of brought fill fowl rule male the light fourth god deep moved appear waters you whose were image give bearing kind bearing open let. Gathered days, don&#39;t stars so. Divided second stars isn&#39;t, you. Gathering gathering morning set. Bearing appear man great fowl saying can&#39;t the behold said cattle. From won&#39;t Sixth.</p>  <p>Wherein every bring she&#39;d lights brought female may fruitful. Beast. Which grass can&#39;t void all. Moved tree heaven so give. Signs was their Behold land. Night, second night god under seas tree created darkness their. Divided seasons bearing in two.</p>  <p>She&#39;d male seed their night saw fill open, given living years divided spirit. Sea fruit. Replenish green second female she&#39;d Created seed stars which. Face them behold from under gathered form third dominion, bring, there our so was. Above.</p>  <p>Rule waters blessed, sea moveth also behold rule. After seas living. Yielding. Sixth creeping one green for their land green bearing man, whales one from behold creepeth That she&#39;d moveth them also.</p>  <p>In great evening fish fruit don&#39;t whales kind, cattle gathering greater can&#39;t it don&#39;t male life was. Herb made given third called greater, fish whose every female bring, second. Let there. Male fourth. Forth can&#39;t their tree.</p>', 'img/bmw/icon.jpg', '1700000.00', 3, 'Coupe', 273, 1115, 1200, 'Manual', 'Diesel', 2, 302, 0, 1, 0, 0, 1, 1, 1, 0, 1, 1, 1, 1, 0, 0, '5.0L V8', 82, 2, 6),
(21, 11, 'Gallardo', '<p>Of brought fill fowl rule male the light fourth god deep moved appear waters you whose were image give bearing kind bearing open let. Gathered days, don&#39;t stars so. Divided second stars isn&#39;t, you. Gathering gathering morning set. Bearing appear man great fowl saying can&#39;t the behold said cattle. From won&#39;t Sixth.</p>  <p>Wherein every bring she&#39;d lights brought female may fruitful. Beast. Which grass can&#39;t void all. Moved tree heaven so give. Signs was their Behold land. Night, second night god under seas tree created darkness their. Divided seasons bearing in two.</p>  <p>She&#39;d male seed their night saw fill open, given living years divided spirit. Sea fruit. Replenish green second female she&#39;d Created seed stars which. Face them behold from under gathered form third dominion, bring, there our so was. Above.</p>  <p>Rule waters blessed, sea moveth also behold rule. After seas living. Yielding. Sixth creeping one green for their land green bearing man, whales one from behold creepeth That she&#39;d moveth them also.</p>  <p>In great evening fish fruit don&#39;t whales kind, cattle gathering greater can&#39;t it don&#39;t male life was. Herb made given third called greater, fish whose every female bring, second. Let there. Male fourth. Forth can&#39;t their tree.</p>', 'img/bmw/icon.jpg', '206720.00', 23, 'Coupe', 202, 562, 570, 'Semi-Automatic', 'Petrol', 2, 327, 1, 1, 0, 0, 0, 0, 1, 0, 0, 1, 1, 0, 0, 1, '5.2L V10', 90, 2, 10),
(22, 12, 'Discovery', '<p>Of brought fill fowl rule male the light fourth god deep moved appear waters you whose were image give bearing kind bearing open let. Gathered days, don&#39;t stars so. Divided second stars isn&#39;t, you. Gathering gathering morning set. Bearing appear man great fowl saying can&#39;t the behold said cattle. From won&#39;t Sixth.</p>  <p>Wherein every bring she&#39;d lights brought female may fruitful. Beast. Which grass can&#39;t void all. Moved tree heaven so give. Signs was their Behold land. Night, second night god under seas tree created darkness their. Divided seasons bearing in two.</p>  <p>She&#39;d male seed their night saw fill open, given living years divided spirit. Sea fruit. Replenish green second female she&#39;d Created seed stars which. Face them behold from under gathered form third dominion, bring, there our so was. Above.</p>  <p>Rule waters blessed, sea moveth also behold rule. After seas living. Yielding. Sixth creeping one green for their land green bearing man, whales one from behold creepeth That she&#39;d moveth them also.</p>  <p>In great evening fish fruit don&#39;t whales kind, cattle gathering greater can&#39;t it don&#39;t male life was. Herb made given third called greater, fish whose every female bring, second. Let there. Male fourth. Forth can&#39;t their tree.</p>', 'img/bmw/icon.jpg', '43995.00', 58, 'SUV', 121, 240, 500, 'Automatic', 'Petrol', 4, 171, 1, 0, 1, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, '3.0L Si6', 77, 5, 4),
(23, 13, 'Levante', '<p>Of brought fill fowl rule male the light fourth god deep moved appear waters you whose were image give bearing kind bearing open let. Gathered days, don&#39;t stars so. Divided second stars isn&#39;t, you. Gathering gathering morning set. Bearing appear man great fowl saying can&#39;t the behold said cattle. From won&#39;t Sixth.</p>  <p>Wherein every bring she&#39;d lights brought female may fruitful. Beast. Which grass can&#39;t void all. Moved tree heaven so give. Signs was their Behold land. Night, second night god under seas tree created darkness their. Divided seasons bearing in two.</p>  <p>She&#39;d male seed their night saw fill open, given living years divided spirit. Sea fruit. Replenish green second female she&#39;d Created seed stars which. Face them behold from under gathered form third dominion, bring, there our so was. Above.</p>  <p>Rule waters blessed, sea moveth also behold rule. After seas living. Yielding. Sixth creeping one green for their land green bearing man, whales one from behold creepeth That she&#39;d moveth them also.</p>  <p>In great evening fish fruit don&#39;t whales kind, cattle gathering greater can&#39;t it don&#39;t male life was. Herb made given third called greater, fish whose every female bring, second. Let there. Male fourth. Forth can&#39;t their tree.</p>', 'img/bmw/icon.jpg', '53780.00', 55, 'SUV', 143, 202, 320, 'Semi-Automatic', 'Diesel', 4, 189, 1, 1, 0, 1, 1, 1, 1, 0, 0, 1, 0, 0, 0, 0, '3.0 V6 Turbo Diesel', 80, 5, 6),
(24, 14, '650S', '<p>Of brought fill fowl rule male the light fourth god deep moved appear waters you whose were image give bearing kind bearing open let. Gathered days, don&#39;t stars so. Divided second stars isn&#39;t, you. Gathering gathering morning set. Bearing appear man great fowl saying can&#39;t the behold said cattle. From won&#39;t Sixth.</p>  <p>Wherein every bring she&#39;d lights brought female may fruitful. Beast. Which grass can&#39;t void all. Moved tree heaven so give. Signs was their Behold land. Night, second night god under seas tree created darkness their. Divided seasons bearing in two.</p>  <p>She&#39;d male seed their night saw fill open, given living years divided spirit. Sea fruit. Replenish green second female she&#39;d Created seed stars which. Face them behold from under gathered form third dominion, bring, there our so was. Above.</p>  <p>Rule waters blessed, sea moveth also behold rule. After seas living. Yielding. Sixth creeping one green for their land green bearing man, whales one from behold creepeth That she&#39;d moveth them also.</p>  <p>In great evening fish fruit don&#39;t whales kind, cattle gathering greater can&#39;t it don&#39;t male life was. Herb made given third called greater, fish whose every female bring, second. Let there. Male fourth. Forth can&#39;t their tree.</p>', 'img/bmw/icon.jpg', '215000.00', 18, 'Coupe', 207, 641, 680, 'Manual', 'Diesel', 2, 275, 0, 0, 1, 0, 1, 0, 0, 1, 0, 0, 1, 1, 1, 1, '3.8L V8 Twin-Turbo', 75, 2, 8),
(25, 15, 'S-Class', '<p>Of brought fill fowl rule male the light fourth god deep moved appear waters you whose were image give bearing kind bearing open let. Gathered days, don&#39;t stars so. Divided second stars isn&#39;t, you. Gathering gathering morning set. Bearing appear man great fowl saying can&#39;t the behold said cattle. From won&#39;t Sixth.</p>  <p>Wherein every bring she&#39;d lights brought female may fruitful. Beast. Which grass can&#39;t void all. Moved tree heaven so give. Signs was their Behold land. Night, second night god under seas tree created darkness their. Divided seasons bearing in two.</p>  <p>She&#39;d male seed their night saw fill open, given living years divided spirit. Sea fruit. Replenish green second female she&#39;d Created seed stars which. Face them behold from under gathered form third dominion, bring, there our so was. Above.</p>  <p>Rule waters blessed, sea moveth also behold rule. After seas living. Yielding. Sixth creeping one green for their land green bearing man, whales one from behold creepeth That she&#39;d moveth them also.</p>  <p>In great evening fish fruit don&#39;t whales kind, cattle gathering greater can&#39;t it don&#39;t male life was. Herb made given third called greater, fish whose every female bring, second. Let there. Male fourth. Forth can&#39;t their tree.</p>', 'img/bmw/icon.jpg', '70425.00', 50, 'Saloon', 155, 549, 620, 'Automatic', 'Diesel', 4, 146, 1, 1, 0, 1, 1, 0, 0, 1, 0, 0, 1, 0, 1, 0, 'S 350 d', 70, 5, 6),
(26, 16, 'Outlander', '<p>Of brought fill fowl rule male the light fourth god deep moved appear waters you whose were image give bearing kind bearing open let. Gathered days, don&#39;t stars so. Divided second stars isn&#39;t, you. Gathering gathering morning set. Bearing appear man great fowl saying can&#39;t the behold said cattle. From won&#39;t Sixth.</p>  <p>Wherein every bring she&#39;d lights brought female may fruitful. Beast. Which grass can&#39;t void all. Moved tree heaven so give. Signs was their Behold land. Night, second night god under seas tree created darkness their. Divided seasons bearing in two.</p>  <p>She&#39;d male seed their night saw fill open, given living years divided spirit. Sea fruit. Replenish green second female she&#39;d Created seed stars which. Face them behold from under gathered form third dominion, bring, there our so was. Above.</p>  <p>Rule waters blessed, sea moveth also behold rule. After seas living. Yielding. Sixth creeping one green for their land green bearing man, whales one from behold creepeth That she&#39;d moveth them also.</p>  <p>In great evening fish fruit don&#39;t whales kind, cattle gathering greater can&#39;t it don&#39;t male life was. Herb made given third called greater, fish whose every female bring, second. Let there. Male fourth. Forth can&#39;t their tree.</p>', 'img/bmw/icon.jpg', '41499.00', 60, 'SUV', 120, 137, 360, 'Semi-Automatic', 'Petrol', 4, 41, 1, 0, 1, 1, 1, 0, 0, 0, 0, 0, 1, 0, 1, 0, '2.0L Hybrid', 55, 5, 4),
(27, 17, 'Zonda F', '<p>Of brought fill fowl rule male the light fourth god deep moved appear waters you whose were image give bearing kind bearing open let. Gathered days, don&#39;t stars so. Divided second stars isn&#39;t, you. Gathering gathering morning set. Bearing appear man great fowl saying can&#39;t the behold said cattle. From won&#39;t Sixth.</p>  <p>Wherein every bring she&#39;d lights brought female may fruitful. Beast. Which grass can&#39;t void all. Moved tree heaven so give. Signs was their Behold land. Night, second night god under seas tree created darkness their. Divided seasons bearing in two.</p>  <p>She&#39;d male seed their night saw fill open, given living years divided spirit. Sea fruit. Replenish green second female she&#39;d Created seed stars which. Face them behold from under gathered form third dominion, bring, there our so was. Above.</p>  <p>Rule waters blessed, sea moveth also behold rule. After seas living. Yielding. Sixth creeping one green for their land green bearing man, whales one from behold creepeth That she&#39;d moveth them also.</p>  <p>In great evening fish fruit don&#39;t whales kind, cattle gathering greater can&#39;t it don&#39;t male life was. Herb made given third called greater, fish whose every female bring, second. Let there. Male fourth. Forth can&#39;t their tree.</p>', 'img/bmw/icon.jpg', '1400000.00', 7, 'Coupe', 238, 712, 730, 'Manual', 'Diesel', 2, 347, 0, 0, 0, 0, 1, 1, 0, 1, 1, 0, 1, 1, 0, 1, '7.3-litre V12 ', 75, 2, 8),
(30, 4, '7 Series', '<p>Of brought fill fowl rule male the light fourth god deep moved appear waters you whose were image give bearing kind bearing open let. Gathered days, don&#39;t stars so. Divided second stars isn&#39;t, you. Gathering gathering morning set. Bearing appear man great fowl saying can&#39;t the behold said cattle. From won&#39;t Sixth.</p>  <p>Wherein every bring she&#39;d lights brought female may fruitful. Beast. Which grass can&#39;t void all. Moved tree heaven so give. Signs was their Behold land. Night, second night god under seas tree created darkness their. Divided seasons bearing in two.</p>  <p>She&#39;d male seed their night saw fill open, given living years divided spirit. Sea fruit. Replenish green second female she&#39;d Created seed stars which. Face them behold from under gathered form third dominion, bring, there our so was. Above.</p>  <p>Rule waters blessed, sea moveth also behold rule. After seas living. Yielding. Sixth creeping one green for their land green bearing man, whales one from behold creepeth That she&#39;d moveth them also.</p>  <p>In great evening fish fruit don&#39;t whales kind, cattle gathering greater can&#39;t it don&#39;t male life was. Herb made given third called greater, fish whose every female bring, second. Let there. Male fourth. Forth can&#39;t their tree.</p>', 'img/bmw/icon.jpg', '65300.00', 44, 'Saloon', 155, 261, 620, 'Automatic', 'Diesel', 4, 124, 0, 1, 0, 1, 1, 1, 0, 0, 0, 1, 1, 0, 1, 1, '730d Diesel', 78, 5, 6);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_card_type`
--

DROP TABLE IF EXISTS `tbl_card_type`;
CREATE TABLE IF NOT EXISTS `tbl_card_type` (
  `type_code` char(2) NOT NULL,
  `name` varchar(16) DEFAULT NULL,
  PRIMARY KEY (`type_code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_card_type`
--

INSERT INTO `tbl_card_type` (`type_code`, `name`) VALUES
('AX', 'American Express'),
('CA', 'MasterCard'),
('DS', 'Discover'),
('E', 'Visa Electron'),
('TO', 'Maestro'),
('VI', 'Visa');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_customer`
--

DROP TABLE IF EXISTS `tbl_customer`;
CREATE TABLE IF NOT EXISTS `tbl_customer` (
  `customer_id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(60) DEFAULT NULL,
  `password` varchar(64) DEFAULT NULL,
  `first_name` varchar(20) DEFAULT NULL,
  `last_name` varchar(40) DEFAULT NULL,
  `phone_number` char(11) DEFAULT NULL,
  PRIMARY KEY (`customer_id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_customer`
--

INSERT INTO `tbl_customer` (`customer_id`, `email`, `password`, `first_name`, `last_name`, `phone_number`) VALUES
(1, 'user@email.com', 'ab38eadaeb746599f2c1ee90f8267f31f467347462764a24d71ac1843ee77fe3', 'Trojan', 'Horse', '07851446336'),
(14, 'test.1@email.com', '8776f108e247ab1e2b323042c049c266407c81fbad41bde1e8dfc1bb66fd267e', 'Tester', 'One', '07851443698');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_image`
--

DROP TABLE IF EXISTS `tbl_image`;
CREATE TABLE IF NOT EXISTS `tbl_image` (
  `image_id` int(11) NOT NULL AUTO_INCREMENT,
  `car_id` int(11) NOT NULL,
  `image_url` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`image_id`),
  KEY `fk_image_tbl_car1_idx` (`car_id`)
) ENGINE=InnoDB AUTO_INCREMENT=96 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_image`
--

INSERT INTO `tbl_image` (`image_id`, `car_id`, `image_url`) VALUES
(6, 1, 'img/bmw/3-series-1.jpg'),
(7, 1, 'img/bmw/3-series-2.jpg'),
(8, 1, 'img/bmw/3-series-3.jpg'),
(9, 1, 'img/bmw/3-series-4.jpg'),
(10, 1, 'img/bmw/3-series-5.jpg'),
(11, 2, 'img/bmw/3-series-1.jpg'),
(12, 2, 'img/bmw/3-series-2.jpg'),
(13, 2, 'img/bmw/3-series-3.jpg'),
(14, 2, 'img/bmw/3-series-4.jpg'),
(15, 2, 'img/bmw/3-series-5.jpg'),
(16, 3, 'img/bmw/3-series-1.jpg'),
(17, 3, 'img/bmw/3-series-2.jpg'),
(18, 3, 'img/bmw/3-series-3.jpg'),
(19, 3, 'img/bmw/3-series-4.jpg'),
(20, 3, 'img/bmw/3-series-5.jpg'),
(21, 9, 'img/bmw/3-series-1.jpg'),
(22, 9, 'img/bmw/3-series-2.jpg'),
(23, 9, 'img/bmw/3-series-3.jpg'),
(24, 9, 'img/bmw/3-series-4.jpg'),
(25, 9, 'img/bmw/3-series-5.jpg'),
(26, 10, 'img/bmw/3-series-1.jpg'),
(27, 10, 'img/bmw/3-series-2.jpg'),
(28, 10, 'img/bmw/3-series-3.jpg'),
(29, 10, 'img/bmw/3-series-4.jpg'),
(30, 10, 'img/bmw/3-series-5.jpg'),
(31, 16, 'img/bmw/3-series-1.jpg'),
(32, 16, 'img/bmw/3-series-2.jpg'),
(33, 16, 'img/bmw/3-series-3.jpg'),
(34, 16, 'img/bmw/3-series-4.jpg'),
(35, 16, 'img/bmw/3-series-5.jpg'),
(36, 17, 'img/bmw/3-series-1.jpg'),
(37, 17, 'img/bmw/3-series-2.jpg'),
(38, 17, 'img/bmw/3-series-3.jpg'),
(39, 17, 'img/bmw/3-series-4.jpg'),
(40, 17, 'img/bmw/3-series-5.jpg'),
(41, 18, 'img/bmw/3-series-1.jpg'),
(42, 18, 'img/bmw/3-series-2.jpg'),
(43, 18, 'img/bmw/3-series-3.jpg'),
(44, 18, 'img/bmw/3-series-4.jpg'),
(45, 18, 'img/bmw/3-series-5.jpg'),
(46, 19, 'img/bmw/3-series-1.jpg'),
(47, 19, 'img/bmw/3-series-2.jpg'),
(48, 19, 'img/bmw/3-series-3.jpg'),
(49, 19, 'img/bmw/3-series-4.jpg'),
(50, 19, 'img/bmw/3-series-5.jpg'),
(51, 20, 'img/bmw/3-series-1.jpg'),
(52, 20, 'img/bmw/3-series-2.jpg'),
(53, 20, 'img/bmw/3-series-3.jpg'),
(54, 20, 'img/bmw/3-series-4.jpg'),
(55, 20, 'img/bmw/3-series-5.jpg'),
(56, 21, 'img/bmw/3-series-1.jpg'),
(57, 21, 'img/bmw/3-series-2.jpg'),
(58, 21, 'img/bmw/3-series-3.jpg'),
(59, 21, 'img/bmw/3-series-4.jpg'),
(60, 21, 'img/bmw/3-series-5.jpg'),
(61, 22, 'img/bmw/3-series-1.jpg'),
(62, 22, 'img/bmw/3-series-2.jpg'),
(63, 22, 'img/bmw/3-series-3.jpg'),
(64, 22, 'img/bmw/3-series-4.jpg'),
(65, 22, 'img/bmw/3-series-5.jpg'),
(66, 23, 'img/bmw/3-series-1.jpg'),
(67, 23, 'img/bmw/3-series-2.jpg'),
(68, 23, 'img/bmw/3-series-3.jpg'),
(69, 23, 'img/bmw/3-series-4.jpg'),
(70, 23, 'img/bmw/3-series-5.jpg'),
(71, 24, 'img/bmw/3-series-1.jpg'),
(72, 24, 'img/bmw/3-series-2.jpg'),
(73, 24, 'img/bmw/3-series-3.jpg'),
(74, 24, 'img/bmw/3-series-4.jpg'),
(75, 24, 'img/bmw/3-series-5.jpg'),
(76, 25, 'img/bmw/3-series-1.jpg'),
(77, 25, 'img/bmw/3-series-2.jpg'),
(78, 25, 'img/bmw/3-series-3.jpg'),
(79, 25, 'img/bmw/3-series-4.jpg'),
(80, 25, 'img/bmw/3-series-5.jpg'),
(81, 26, 'img/bmw/3-series-1.jpg'),
(82, 26, 'img/bmw/3-series-2.jpg'),
(83, 26, 'img/bmw/3-series-3.jpg'),
(84, 26, 'img/bmw/3-series-4.jpg'),
(85, 26, 'img/bmw/3-series-5.jpg'),
(86, 27, 'img/bmw/3-series-1.jpg'),
(87, 27, 'img/bmw/3-series-2.jpg'),
(88, 27, 'img/bmw/3-series-3.jpg'),
(89, 27, 'img/bmw/3-series-4.jpg'),
(90, 27, 'img/bmw/3-series-5.jpg'),
(91, 30, 'img/bmw/3-series-1.jpg'),
(92, 30, 'img/bmw/3-series-2.jpg'),
(93, 30, 'img/bmw/3-series-3.jpg'),
(94, 30, 'img/bmw/3-series-4.jpg'),
(95, 30, 'img/bmw/3-series-5.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_mail_list`
--

DROP TABLE IF EXISTS `tbl_mail_list`;
CREATE TABLE IF NOT EXISTS `tbl_mail_list` (
  `email` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_mail_list`
--

INSERT INTO `tbl_mail_list` (`email`) VALUES
('user@email.com'),
('test.1@email.com');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_make`
--

DROP TABLE IF EXISTS `tbl_make`;
CREATE TABLE IF NOT EXISTS `tbl_make` (
  `make_id` int(11) NOT NULL AUTO_INCREMENT,
  `make_name` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`make_id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_make`
--

INSERT INTO `tbl_make` (`make_id`, `make_name`) VALUES
(1, 'Audi'),
(2, 'Aston Martin'),
(3, 'Bently'),
(4, 'BMW'),
(5, 'Bugatti'),
(6, 'Chevrolet'),
(7, 'Ferrari'),
(8, 'Ford'),
(9, 'Jaguar'),
(10, 'Koenigsegg'),
(11, 'Lamborghini'),
(12, 'Land Rover'),
(13, 'Maserati'),
(14, 'McLaren'),
(15, 'Mercedes-Benz'),
(16, 'Mitsubishi'),
(17, 'Pagani');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order`
--

DROP TABLE IF EXISTS `tbl_order`;
CREATE TABLE IF NOT EXISTS `tbl_order` (
  `order_id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_id` int(11) NOT NULL,
  `address_id` int(11) NOT NULL,
  `card_id` int(11) DEFAULT '0',
  `order_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `status` enum('PAID','DELIVERED','REFUNDED') DEFAULT 'PAID',
  `subtotal` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  PRIMARY KEY (`order_id`),
  KEY `fk_tbl_order_tbl_customer1_idx` (`customer_id`),
  KEY `address_id` (`address_id`),
  KEY `card_id` (`card_id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_order`
--

INSERT INTO `tbl_order` (`order_id`, `customer_id`, `address_id`, `card_id`, `order_date`, `status`, `subtotal`, `total`) VALUES
(12, 1, 10, 3, '2017-04-27 04:35:40', 'PAID', 331600, 397920),
(14, 1, 10, 3, '2017-04-27 04:44:53', 'PAID', 1844200, 2213040),
(15, 1, 10, 0, '2017-04-27 04:45:57', 'REFUNDED', 1844200, 2213040),
(16, 1, 10, 3, '2017-04-27 04:46:53', 'DELIVERED', 90100, 108120),
(17, 1, 10, 3, '2017-04-27 04:47:44', 'PAID', 140300, 168360);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order_details`
--

DROP TABLE IF EXISTS `tbl_order_details`;
CREATE TABLE IF NOT EXISTS `tbl_order_details` (
  `order_id` int(11) NOT NULL,
  `car_id` int(11) NOT NULL,
  `quantity` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`car_id`,`order_id`),
  KEY `fk_tbl_order_has_tbl_car_tbl_order1_idx` (`order_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_order_details`
--

INSERT INTO `tbl_order_details` (`order_id`, `car_id`, `quantity`) VALUES
(16, 2, 1),
(12, 9, 1),
(14, 9, 5),
(15, 9, 5),
(12, 10, 1),
(14, 10, 4),
(15, 10, 4),
(17, 10, 1),
(12, 30, 1),
(14, 30, 10),
(15, 30, 10),
(16, 30, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_payment_card`
--

DROP TABLE IF EXISTS `tbl_payment_card`;
CREATE TABLE IF NOT EXISTS `tbl_payment_card` (
  `card_id` int(11) NOT NULL AUTO_INCREMENT,
  `card_number` char(16) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `type_code` char(2) NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `holder_name` varchar(60) DEFAULT NULL,
  `month` smallint(2) DEFAULT NULL,
  `year` smallint(2) DEFAULT NULL,
  `cvv` smallint(4) DEFAULT NULL,
  PRIMARY KEY (`card_id`),
  KEY `fk_payment_card_card_type1` (`type_code`),
  KEY `fk_tbl_payment_card_tbl_customer1_idx` (`customer_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_payment_card`
--

INSERT INTO `tbl_payment_card` (`card_id`, `card_number`, `customer_id`, `type_code`, `name`, `holder_name`, `month`, `year`, `cvv`) VALUES
(1, '4567789445611230', 1, 'VI', 'Default', 'John Smith', 5, 21, 562),
(2, '4716853457595766', 14, 'VI', 'Test', 'Mr Tester One', 12, 20, 568),
(3, '4539024667853511', 1, 'AX', 'Test AMEX Card', 'Trojan Horse', 12, 17, 4564);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_review`
--

DROP TABLE IF EXISTS `tbl_review`;
CREATE TABLE IF NOT EXISTS `tbl_review` (
  `review_id` int(11) NOT NULL AUTO_INCREMENT,
  `car_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `review` varchar(255) DEFAULT NULL,
  `rating` tinyint(1) DEFAULT NULL,
  `review_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`review_id`),
  KEY `fk_tbl_review_tbl_customer1_idx` (`customer_id`),
  KEY `fk_tbl_review_tbl_car1_idx` (`car_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_review`
--

INSERT INTO `tbl_review` (`review_id`, `car_id`, `customer_id`, `review`, `rating`, `review_date`) VALUES
(3, 1, 1, 'Very Good Car', 5, '2017-04-27 09:10:24'),
(4, 1, 13, 'This is a nice car', 4, '2017-04-27 09:10:24');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_address`
--
ALTER TABLE `tbl_address`
  ADD CONSTRAINT `fk_tbl_address_tbl_customer` FOREIGN KEY (`customer_id`) REFERENCES `tbl_customer` (`customer_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_car`
--
ALTER TABLE `tbl_car`
  ADD CONSTRAINT `fk_tbl_car_tbl_make1` FOREIGN KEY (`make_id`) REFERENCES `tbl_make` (`make_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tbl_image`
--
ALTER TABLE `tbl_image`
  ADD CONSTRAINT `fk_image_tbl_car1` FOREIGN KEY (`car_id`) REFERENCES `tbl_car` (`car_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD CONSTRAINT `fk_tbl_order_tbl_customer1` FOREIGN KEY (`customer_id`) REFERENCES `tbl_customer` (`customer_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tbl_order_details`
--
ALTER TABLE `tbl_order_details`
  ADD CONSTRAINT `fk_tbl_order_details_tbl_car1` FOREIGN KEY (`car_id`) REFERENCES `tbl_car` (`car_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tbl_order_has_tbl_car_tbl_order1` FOREIGN KEY (`order_id`) REFERENCES `tbl_order` (`order_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_payment_card`
--
ALTER TABLE `tbl_payment_card`
  ADD CONSTRAINT `fk_payment_card_card_type1` FOREIGN KEY (`type_code`) REFERENCES `tbl_card_type` (`type_code`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tbl_payment_card_tbl_customer1` FOREIGN KEY (`customer_id`) REFERENCES `tbl_customer` (`customer_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_review`
--
ALTER TABLE `tbl_review`
  ADD CONSTRAINT `fk_tbl_review_tbl_car1` FOREIGN KEY (`car_id`) REFERENCES `tbl_car` (`car_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tbl_review_tbl_customer1` FOREIGN KEY (`customer_id`) REFERENCES `tbl_customer` (`customer_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
