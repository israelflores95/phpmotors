-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: mysql:3306
-- Generation Time: Jul 17, 2021 at 07:45 PM
-- Server version: 8.0.25
-- PHP Version: 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `phpmotors`
--

-- --------------------------------------------------------

--
-- Table structure for table `carclassification`
--

CREATE TABLE `carclassification` (
  `classificationId` int NOT NULL,
  `classificationName` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `carclassification`
--

INSERT INTO `carclassification` (`classificationId`, `classificationName`) VALUES
(1, 'SUV'),
(2, 'Classic'),
(3, 'Sports'),
(4, 'Trucks'),
(5, 'Used'),
(25, 'Motorcycle');

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `clientId` int UNSIGNED NOT NULL,
  `clientFirstname` varchar(15) NOT NULL,
  `clientLastname` varchar(25) NOT NULL,
  `clientEmail` varchar(40) NOT NULL,
  `clientPassword` varchar(255) NOT NULL,
  `clientLevel` enum('1','2','3') NOT NULL DEFAULT '1',
  `comment` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`clientId`, `clientFirstname`, `clientLastname`, `clientEmail`, `clientPassword`, `clientLevel`, `comment`) VALUES
(28, 'Admin', 'User', 'admin@cse340.net', '$2y$10$K3W1JqSeLrL2KhTqQnSAZ.ijqb7P2DxlxFa2yVexph3o7Pm28Freu', '3', NULL),
(29, 'Israel', 'Flores', 'israel@flores.com', '$2y$10$HOnjgU6S./.Sva.d2PmgmOXieKZkxTLR.8urDhLT8MsIQIMW9WJCi', '1', NULL),
(30, 'shelly', 'flores', 'shell@flores.com', '$2y$10$6o1bU9.wiJhvF/W7Zs3tf.j32pxJgE1K/M1aiEDwxGIz.aToa25wi', '1', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `imgId` int UNSIGNED NOT NULL,
  `invId` int UNSIGNED NOT NULL,
  `imgName` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `imgPath` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `imgDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `imgPrimary` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`imgId`, `invId`, `imgName`, `imgPath`, `imgDate`, `imgPrimary`) VALUES
(23, 9, 'crwn-vic.jpg', '/phpmotors/images/vehicles/crwn-vic.jpg', '2021-07-02 03:09:18', 1),
(24, 9, 'crwn-vic-tn.jpg', '/phpmotors/images/vehicles/crwn-vic-tn.jpg', '2021-07-02 03:09:19', 1),
(27, 11, 'escalade.jpg', '/phpmotors/images/vehicles/escalade.jpg', '2021-07-02 03:10:32', 1),
(28, 11, 'escalade-tn.jpg', '/phpmotors/images/vehicles/escalade-tn.jpg', '2021-07-02 03:10:32', 1),
(29, 12, 'hummer.jpg', '/phpmotors/images/vehicles/hummer.jpg', '2021-07-02 03:10:41', 1),
(30, 12, 'hummer-tn.jpg', '/phpmotors/images/vehicles/hummer-tn.jpg', '2021-07-02 03:10:42', 1),
(31, 13, 'aerocar.jpg', '/phpmotors/images/vehicles/aerocar.jpg', '2021-07-02 03:11:39', 1),
(32, 13, 'aerocar-tn.jpg', '/phpmotors/images/vehicles/aerocar-tn.jpg', '2021-07-02 03:11:41', 1),
(33, 14, 'van.jpg', '/phpmotors/images/vehicles/van.jpg', '2021-07-02 03:11:55', 1),
(34, 14, 'van-tn.jpg', '/phpmotors/images/vehicles/van-tn.jpg', '2021-07-02 03:11:56', 1),
(36, 27, 'no-image-tn.png', '/phpmotors/images/vehicles/no-image-tn.png', '2021-07-02 03:12:30', 1),
(41, 4, 'monster-truck.jpg', '/phpmotors/images/vehicles/monster-truck.jpg', '2021-07-02 03:13:16', 1),
(42, 4, 'monster-truck-tn.jpg', '/phpmotors/images/vehicles/monster-truck-tn.jpg', '2021-07-02 03:13:17', 1),
(43, 5, 'mechanic.jpg', '/phpmotors/images/vehicles/mechanic.jpg', '2021-07-02 03:13:33', 1),
(44, 5, 'mechanic-tn.jpg', '/phpmotors/images/vehicles/mechanic-tn.jpg', '2021-07-02 03:13:33', 1),
(47, 7, 'mystery-van.jpg', '/phpmotors/images/vehicles/mystery-van.jpg', '2021-07-02 03:14:04', 1),
(48, 7, 'mystery-van-tn.jpg', '/phpmotors/images/vehicles/mystery-van-tn.jpg', '2021-07-02 03:14:04', 1),
(49, 8, 'fire-truck.jpg', '/phpmotors/images/vehicles/fire-truck.jpg', '2021-07-02 03:14:31', 1),
(50, 8, 'fire-truck-tn.jpg', '/phpmotors/images/vehicles/fire-truck-tn.jpg', '2021-07-02 03:14:31', 1),
(51, 28, 'delorean.jpg', '/phpmotors/images/vehicles/delorean.jpg', '2021-07-02 03:27:09', 1),
(52, 28, 'delorean-tn.jpg', '/phpmotors/images/vehicles/delorean-tn.jpg', '2021-07-02 03:27:10', 1),
(56, 10, 'camaro2-tn.jpg', '/phpmotors/images/vehicles/camaro2-tn.jpg', '2021-07-02 03:33:19', 0),
(59, 1, 'wrangler.jpg', '/phpmotors/images/vehicles/wrangler.jpg', '2021-07-02 18:01:02', 1),
(60, 1, 'wrangler-tn.jpg', '/phpmotors/images/vehicles/wrangler-tn.jpg', '2021-07-02 18:01:02', 1),
(61, 3, 'adventador.jpg', '/phpmotors/images/vehicles/adventador.jpg', '2021-07-02 18:01:56', 1),
(62, 3, 'adventador-tn.jpg', '/phpmotors/images/vehicles/adventador-tn.jpg', '2021-07-02 18:01:57', 1),
(65, 1, 'jeep-wrangler-2.jpg', '/phpmotors/images/vehicles/jeep-wrangler-2.jpg', '2021-07-02 18:25:10', 0),
(66, 1, 'jeep-wrangler-2-tn.jpg', '/phpmotors/images/vehicles/jeep-wrangler-2-tn.jpg', '2021-07-02 18:25:12', 0),
(67, 10, 'camaro.jpg', '/phpmotors/images/vehicles/camaro.jpg', '2021-07-07 02:47:15', 1),
(68, 10, 'camaro-tn.jpg', '/phpmotors/images/vehicles/camaro-tn.jpg', '2021-07-07 02:47:15', 1),
(69, 10, 'camaro2.jpg', '/phpmotors/images/vehicles/camaro2.jpg', '2021-07-07 02:47:41', 0),
(70, 10, 'camaro2-tn.jpg', '/phpmotors/images/vehicles/camaro2-tn.jpg', '2021-07-07 02:47:41', 0),
(71, 29, 'sbs.png', '/phpmotors/images/vehicles/sbs.png', '2021-07-15 19:18:02', 1),
(72, 29, 'sbs-tn.png', '/phpmotors/images/vehicles/sbs-tn.png', '2021-07-15 19:18:02', 1),
(73, 29, 'bobber.jfif', '/phpmotors/images/vehicles/bobber.jfif', '2021-07-15 19:19:10', 0),
(74, 29, 'bobber-tn.jfif', '/phpmotors/images/vehicles/bobber-tn.jfif', '2021-07-15 19:19:12', 0);

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

CREATE TABLE `inventory` (
  `invId` int UNSIGNED NOT NULL,
  `invMake` varchar(30) NOT NULL,
  `invModel` varchar(30) NOT NULL,
  `invDescription` text,
  `invImage` varchar(50) NOT NULL,
  `invThumbnail` varchar(50) NOT NULL,
  `invPrice` decimal(10,0) NOT NULL,
  `invStock` smallint NOT NULL,
  `invColor` varchar(20) NOT NULL,
  `classificationId` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `inventory`
--

INSERT INTO `inventory` (`invId`, `invMake`, `invModel`, `invDescription`, `invImage`, `invThumbnail`, `invPrice`, `invStock`, `invColor`, `classificationId`) VALUES
(1, 'Jeep ', 'Wrangler', 'The Jeep Wrangler is small and compact with enough power to get you where you want to go. Its great for everyday driving as well as offroading weather that be on the the rocks or in the mud!', '/phpmotors/images/vehicles/wrangler.jpg', '/phpmotors/images/vehicles/wrangler-tn.jpg', '28045', 4, 'Orange', 1),
(3, 'Lamborghini', 'Adventador', 'This V-12 engine packs a punch in this sporty car. Make sure you wear your seatbelt and obey all traffic laws. ', '/phpmotors/images/vehicles/adventador.jpg', '/phpmotors/images/vehicles/adventador-tn.jpg', '500000', 1, 'Black', 3),
(4, 'Monster', 'Truck', 'Most trucks are for working, this one is for fun. this beast comes with 60in tires giving you tracktions needed to jump and roll in the mud.', '/phpmotors/images/vehicles/monster-truck.jpg', '/phpmotors/images/vehicles/monster-truck-tn.jpg', '150000', 3, 'purple', 4),
(5, 'Mechanic', 'Special', 'Not sure where this car came from. however with a little tlc it will run as good a new.', '/phpmotors/images/vehicles/mechanic.jpg', '/phpmotors/images/vehicles/mechanic-tn.jpg', '100', 200, 'Rust', 5),
(7, 'Mystery', 'Machine', 'Scooby and the gang always found luck in solving their mysteries because of there 4 wheel drive Mystery Machine. This Van will help you do whatever job you are required to with a success rate of 100%.', '/phpmotors/images/vehicles/mystery-van.jpg', '/phpmotors/images/vehicles/mystery-van-tn.jpg', '10000', 12, 'Green', 1),
(8, 'Spartan', 'Fire Truck', 'Emergencies happen often. Be prepared with this Spartan fire truck. Comes complete with 1000 ft. of hose and a 1000 gallon tank.', '/phpmotors/images/vehicles/fire-truck.jpg', '/phpmotors/images/vehicles/fire-truck-tn.jpg', '50000', 2, 'Red', 4),
(9, 'Ford', 'Crown Victoria', 'After the police force updated their fleet these cars are now available to the public! These cars come equiped with the siren which is convenient for college students running late to class.', '/phpmotors/images/vehicles/crwn-vic.jpg', '/phpmotors/images/vehicles/crwn-vic-tn.jpg', '10000', 5, 'White', 5),
(10, 'Chevy', 'Camaro', 'If you want to look cool this is the ar you need! This car has great performance at an affordable price. Own it today!', '/phpmotors/images/vehicles/camaro.jpg', '/phpmotors/images/vehicles/camaro-tn.jpg', '25000', 10, 'Silver', 3),
(11, 'Cadilac', 'Escalade', 'This stylin car is great for any occasion from going to the beach to meeting the president. The luxurious inside makes this car a home away from home.', '/phpmotors/images/vehicles/escalade.jpg', '/phpmotors/images/vehicles/escalade-tn.jpg', '75195', 4, 'Black', 1),
(12, 'GM', 'Hummer', 'Do you have 6 kids and like to go offroading? The Hummer gives you the small interiors with an engine to get you out of any muddy or rocky situation.', '/phpmotors/images/vehicles/hummer.jpg', '/phpmotors/images/vehicles/hummer-tn.jpg', '58800', 5, 'Yellow', 5),
(13, 'Aerocar International', 'Aerocar', 'Are you sick of rushhour trafic? This car converts into an airplane to get you where you are going fast. Only 6 of these were made, get them while they last!', '/phpmotors/images/vehicles/aerocar.jpg', '/phpmotors/images/vehicles/aerocar-tn.jpg', '1000000', 6, 'Red', 2),
(14, 'FBI', 'Survalence Van', 'do you like police shows? You\'ll feel right at home driving this van, come complete with survalence equipments for and extra fee of $2,000 a month. ', '/phpmotors/images/vehicles/van.jpg', '/phpmotors/images/vehicles/van-tn.jpg', '20000', 1, 'Green', 1),
(27, 'Toyota', 'Hotdog Stand', 'testing enhancement 5', '/phpmotors/images/vehicles/no-image.png', '/phpmotors/images/vehicles/no-image-tn.png', '156', 1, 'Red', 4),
(28, 'DMC', 'DeLorean', 'A sweet car with cool doors...Did I mention it can go back in time?', '/phpmotors/images/vehicles/delorean.jpg', '/phpmotors/images/vehicles/delorean-tn.jpg', '80000', 1, 'gray', 3),
(29, 'Indian', 'Scout Bobber Sixty', 'Sweet blacked out motorcycle, this is ideal for the beginner rider', '/phpmotors/images/vehicles/sbs.png', '/phpmotors/images/vehicles/sbs', '9000', 15, 'black', 25);

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `reviewId` int UNSIGNED NOT NULL,
  `reviewText` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `reviewDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `InvId` int UNSIGNED NOT NULL,
  `clientId` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`reviewId`, `reviewText`, `reviewDate`, `InvId`, `clientId`) VALUES
(3, 'test review', '2021-07-14 22:56:08', 1, 28),
(4, 'Sweet fire Truck! nothing better for spraying some zombies.', '2021-07-14 22:58:22', 8, 28),
(5, 'Super fast and awesome', '2021-07-15 12:44:29', 3, 28),
(7, 'sweet car that rides low..its pretty cool!', '2021-07-15 12:57:39', 10, 28),
(8, 'Great bike for a new rider! And it looks fantastic!', '2021-07-15 13:52:22', 29, 28),
(9, 'Awesome bike to modify and really make your own!', '2021-07-15 13:52:58', 29, 28),
(10, 'That thing is a death trap! ', '2021-07-15 14:11:41', 29, 30),
(12, 'Cool black car', '2021-07-15 20:57:47', 10, 28),
(18, 'Nothing will stop this truck! It just keeps going and going!', '2021-07-16 12:16:31', 4, 28),
(19, 'Final Project review! This fire truck is awesome. It sprays lots of water!', '2021-07-16 15:00:56', 8, 30),
(20, 'cool review', '2021-07-16 15:23:33', 7, 30),
(21, 'Basic car gets you there.', '2021-07-16 15:25:25', 9, 30),
(22, 'Great car!', '2021-07-16 15:49:21', 9, 30),
(23, 'I like back to the future!', '2021-07-17 13:41:49', 28, 29),
(24, 'Great big car! Very spacious.', '2021-07-17 13:42:36', 12, 29);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `carclassification`
--
ALTER TABLE `carclassification`
  ADD PRIMARY KEY (`classificationId`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`clientId`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`imgId`),
  ADD KEY `invId` (`invId`);

--
-- Indexes for table `inventory`
--
ALTER TABLE `inventory`
  ADD PRIMARY KEY (`invId`),
  ADD KEY `classificationId` (`classificationId`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`reviewId`),
  ADD KEY `FK_reviews_clients` (`clientId`),
  ADD KEY `FK_reviews_inventory` (`InvId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `carclassification`
--
ALTER TABLE `carclassification`
  MODIFY `classificationId` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `clientId` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `imgId` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT for table `inventory`
--
ALTER TABLE `inventory`
  MODIFY `invId` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `reviewId` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `images`
--
ALTER TABLE `images`
  ADD CONSTRAINT `FK_inv_images` FOREIGN KEY (`invId`) REFERENCES `inventory` (`invId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `inventory`
--
ALTER TABLE `inventory`
  ADD CONSTRAINT `inventory_ibfk_1` FOREIGN KEY (`classificationId`) REFERENCES `carclassification` (`classificationId`);

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `FK_reviews_clients` FOREIGN KEY (`clientId`) REFERENCES `clients` (`clientId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_reviews_inventory` FOREIGN KEY (`InvId`) REFERENCES `inventory` (`invId`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
