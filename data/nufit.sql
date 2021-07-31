-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 14, 2019 at 11:46 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nufit`
--

-- --------------------------------------------------------

--
-- Table structure for table `authors`
--

CREATE TABLE `authors` (
  `IdAuthor` int(11) NOT NULL,
  `Description` text NOT NULL,
  `Path` text NOT NULL,
  `Ime` varchar(255) NOT NULL,
  `Prezime` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `authors`
--

INSERT INTO `authors` (`IdAuthor`, `Description`, `Path`, `Ime`, `Prezime`) VALUES
(1, 'The author of this website is Marko Vukojević, index number 204/17, who is currently in the second year of the Internet Technologies studies at the school of Informational and Communicational Technologies. This site was made as part of the required schoolwork for the Web Programming II class.', '../../assets/images/author.jpg', 'Marko', 'Vukojević');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `IdContact` int(11) NOT NULL,
  `ContactName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`IdContact`, `ContactName`) VALUES
(3, 'Email: nu.fit@nufit.cz'),
(1, 'Facebook'),
(2, 'Instagram'),
(4, 'Phone 1: 033/456 778'),
(5, 'Phone 2: 033/456 779');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `IdCustomers` int(11) NOT NULL,
  `Path` varchar(255) NOT NULL,
  `Alt` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`IdCustomers`, `Path`, `Alt`) VALUES
(1, 'assets/images/customer1.jpg', 'Customer 1'),
(2, 'assets/images/customer2.jpg', 'Customer 2'),
(3, 'assets/images/customer3.jpg', 'Customer 3'),
(4, 'assets/images/customer4.jpg', 'Customer 4'),
(5, 'assets/images/customer5.jpg', 'Customer 5'),
(6, 'assets/images/customer6.jpg', 'Customer 6'),
(7, 'assets/images/customer7.jpg', 'Customer 7'),
(8, 'assets/images/customer8.jpg', 'Customer 8');

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE `menus` (
  `IdMenu` int(11) NOT NULL,
  `MenuName` varchar(255) NOT NULL,
  `MenuEx` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`IdMenu`, `MenuName`, `MenuEx`) VALUES
(1, 'index', 'php'),
(2, 'products', 'php'),
(3, 'cart', 'php'),
(4, 'author', 'php'),
(5, 'contact', 'php'),
(6, 'admin', 'php'),
(7, 'survey', 'php'),
(8, 'documentation', 'pdf');

-- --------------------------------------------------------

--
-- Table structure for table `polls`
--

CREATE TABLE `polls` (
  `IdPoll` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `polls`
--

INSERT INTO `polls` (`IdPoll`, `Name`) VALUES
(3, 'Category'),
(1, 'Label'),
(2, 'Services');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `Id` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Label` varchar(255) NOT NULL,
  `Rating` int(11) NOT NULL,
  `Description` text NOT NULL,
  `Category` varchar(255) NOT NULL,
  `PriceNew` int(11) NOT NULL,
  `PriceOld` int(11) NOT NULL,
  `Path` text NOT NULL,
  `Alt` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`Id`, `Name`, `Label`, `Rating`, `Description`, `Category`, `PriceNew`, `PriceOld`, `Path`, `Alt`) VALUES
(1, 'Back Extension Bench', 'Steelborn', 6, 'A back extension bench for higher intensity training.', 'Stationary', 250, 0, '../../assets/images/products/Back Extension Bench.jpg', 'author'),
(2, 'Basic Bench', 'Steelborn', 6, 'A basic bench for barbell training.', 'Stationary', 190, 0, '../../assets/images/products/Basic Bench.jpg', 'Basic Bench'),
(3, 'Crunch Bench', 'Steelborn', 4, 'A crunch bench for ab and core strength training.', 'Stationary', 200, 0, '../../assets/images/products/Crunch Bench.jpg', 'Crunch Bench'),
(4, 'Dumbell 70kg Set', 'Steelborn', 5, 'A set of 4 dumbells weighing 70kg total.', 'Weights', 80, 0, '../../assets/images/products/Dumbell 70kg set.jpg', 'Dumbell 70kg set'),
(5, 'Dumbells 10kg Set', 'Steelborn', 5, 'A set of two rubber covered dumbells weighing 10kg each.', 'Weights', 40, 0, '../../assets/images/products/Dumbells 10kg.jpg', 'Dumbells 10kg'),
(6, 'Dumbells 20kg Set', 'Steelborn', 6, 'A set of two metal grip dumbells weighing 20kg each.', 'Weights', 60, 0, '../../assets/images/products/Dumbells 20kg.jpg', 'Dumbells 20kg'),
(7, 'Dumbells 35kg Set', 'Steelborn', 3, 'A set of two metal grip dumbells weighing 35kg each.', 'Weights', 80, 0, '../../assets/images/products/Dumbells 35kg.jpg', 'Dumbells 35kg'),
(8, 'Exercise Ball', 'Steelborn', 6, 'A rubber inflatable exercise ball for various exercises.', 'Accessories', 27, 0, '../../assets/images/products/Exercise Ball.jpg', 'Exercise Ball'),
(9, 'FlexStrider Trainer', 'Steelborn', 6, 'A running trainer for cardio exercises.', 'Cardio', 215, 0, '../../assets/images/products/FlexStrider Trainer.jpg', 'FlexStrider Trainer'),
(10, 'FS6 Cross-Trainer', 'Steelborn', 6, 'A cross-walk cardio trainer for high intensity exercises.', 'Cardio', 240, 0, '../../assets/images/products/FS6 Cross-Trainer.jpg', 'FS6 Cross-Trainer'),
(11, 'G4 Platinum Station', 'Steelborn', 4, 'An extremly high quality all-purpose gym station.', 'Stationary', 330, 360, '../../assets/images/products/G4 Platinum Station.jpg', 'G4 Platinum Station'),
(12, 'G4 Station', 'Steelborn', 5, 'A gym station for upper and lower body exercises.', 'Stationary', 280, 300, '../../assets/images/products/G4 Station.jpg', 'G4 Station'),
(13, 'G7 Home Gym', 'Steelborn', 5, 'A home station gym for upper body exercises.', 'Stationary', 245, 0, '../../assets/images/products/G7 Home Gym.jpg', 'G7 Home Gym'),
(14, 'Four-Way Station', 'Hammer', 6, 'A 4 way upper body exercise station.', 'Stationary', 260, 0, '../../assets/images/products/Hammer 4-Way Station.jpg', 'Hammer 4-Way Station'),
(15, 'Colorful 50kg Plates', 'Hammer', 6, 'A set of 4 colorful weight plates weighing 50kg total.', 'Weights', 55, 0, '../../assets/images/products/Hammer Colorful 50kg Plates.jpg', 'Hammer Colorful 50kg Plates'),
(16, 'Dip & Chin Station', 'Hammer', 4, '\"A gym station for dips and chins.', 'Stationary', 205, 0, '../../assets/images/products/Hammer Dip&Chin Station.jpg', 'Hammer Dip & Chin Station'),
(17, 'Barbell 7kg Lifting Bar', 'Hammer', 6, 'A 7kg lifting bar for barbells.', 'Accessories', 25, 30, '../../assets/images/products/Hammer Lifting Bar.jpg', 'Hammer Lifting Bar'),
(18, 'Olympic Plate 90kg Pack', 'Hammer', 3, 'A set of 4 olympic free-weight plates weighing 90kg total.', 'Weights', 70, 0, '../../assets/images/products/Hammer Olympic Plate 90kg Pack.jpg', 'Hammer Olympic Plate 90kg Pack.jpg'),
(19, 'Rubber Plate 80kg Pack', 'Hammer', 6, 'A set of 4 free-weight plates weighing 80kg total.', 'Weights', 60, 0, '../../assets/images/products/Hammer Rubber Plate 80kg Pack.jpg', 'Hammer Rubber Plate 80kg Pack'),
(20, 'Seated Station', 'Hammer', 6, 'A seated gym station for back and arm exercises.', 'Stationary', 170, 190, '../../assets/images/products/Hammer Seated Station.jpg', 'Hammer Seated Station'),
(21, 'Smith Machine', 'Hammer', 5, 'A smith machine for squatting exercises.', 'Stationary', 210, 230, '../../assets/images/products/Hammer Smith Machine.jpg', 'Hammer Smith Machine'),
(22, 'Barbell 10kg Curl Bar', 'Hammer', 5, 'A curl bar for barbells weighing 10kg.', 'Accessories', 35, 40, '../../assets/images/products/Hammer Strength Curl Bar.jpg', 'Barbell 10kg Curl Bar'),
(23, 'Tibia Flexion', 'Hammer', 6, 'A small gym station for tibia exercises.', 'Stationary', 140, 145, '../../assets/images/products/Hammer Tibia Flexion.jpg', 'Hammer Tibia Flexion'),
(24, 'Barbell 12kg Training Bar', 'Hammer', 4, 'A metal training bar for barbells weighing 12kg.', 'Accessories', 40, 0, '../../assets/images/products/Hammer Training Bar.jpg', 'Hammer Training Bar'),
(25, 'Urethane Olympic 120kg Pack', 'Hammer', 6, 'A set of 4 olympic free-weight plates weighing 120kg total.', 'Weights', 95, 110, '../../assets/images/products/Hammer Urethane Olympic 120kg pack.jpg', 'Hammer Urethane Olympic 120kg Pack'),
(26, 'Urethane 60kg Pack', 'Hammer', 6, 'A set of 4 free-weight plates weighing 60kg total.', 'Weights', 50, 0, '../../assets/images/products/Hammer Urethane Plates 60kg Pack.jpg', 'Hammer Urethane Plates 60kg Pack'),
(27, 'Indoor Cycler', 'Steelborn', 6, 'An indoors cardio cycler bike.', 'Cardio', 130, 0, '../../assets/images/products/Indoor Cycler.jpg', 'Indoor Cycler'),
(28, 'Lifecycle Bike', 'Steelborn', 6, 'A high intensity cardio bike.', 'Cardio', 150, 0, '../../assets/images/products/Lifecycle Bike.jpg', 'Lifecycle Bike'),
(29, 'Lock Jaw Clamps', 'Steelborn', 5, 'High durability and resiliance clamps for weight bars.', 'Accessories', 25, 30, '../../assets/images/products/Lock Jaw Clamps.jpg', 'Lock Jaw CLamps'),
(30, 'Multi Adjustable Bench', 'Steelborn', 6, 'An all purpose bench with multi-adjustable functionality.', 'Stationary', 170, 0, '../../assets/images/products/Multi Adjustable Bench.jpg', 'Mutli Adjustable Bench'),
(31, 'Olympic Clamps', 'Hammer', 6, 'Olympic level clamps for weight bars.', 'Accessories', 20, 0, '../../assets/images/products/Olympic Clamps.jpg', 'Olympic Clamps'),
(32, 'Platinum Lifecycle Bike', 'Steelborn', 4, 'A platinum quality high-intensity cardio bike.', 'Cardio', 160, 0, '../../assets/images/products/Platinum Lifecycle Bike.jpg', 'Platinum Lifecycle Bike'),
(33, 'Platinum Treadmill', 'Steelborn', 2, 'A platinum quality high-intensity treadmill.', 'Cardio', 180, 0, '../../assets/images/products/Platinum Treadmill.jpg', 'Platinum Treadmill'),
(34, 'Premium Matt', 'Hammer', 6, 'A premium-quality matt for yoga and general exercises.', 'Accessories', 33, 40, '../../assets/images/products/Premium Matt.jpg', 'Premium Matt'),
(35, 'Row GX Trainer', 'Steelborn', 6, 'A GX-class rowing trainer for high-intensity cardio exercises.', 'Cardio', 280, 0, '../../assets/images/products/Row GX Trainer.jpg', 'Row GX Trainer'),
(36, 'Spring Clamps', 'Hammer', 6, 'Regular metal spring clamps for barbells.', 'Accessories', 15, 20, '../../assets/images/products/Spring Clamps.jpg', 'Spring Clamps'),
(37, 'Stretch Matt', 'Hammer', 6, 'A rubber stretch matt for general exercises.', 'Accessories', 30, 0, '../../assets/images/products/Stretch Matt.jpg', 'Stretch Matt'),
(38, 'T5 Treadmill', 'Hammer', 1, 'A T5-class treadmill for regular running exercises.', 'Cardio', 160, 0, '../../assets/images/products/T5 Treadmill.jpg', 'T5 Treadmill'),
(39, 'Yoga Matt', 'Steelborn', 6, 'A rubber stretchy math for yoga.', 'Accessories', 27, 35, '../../assets/images/products/Yoga Matt.jpg', 'Yoga Matt');

-- --------------------------------------------------------

--
-- Table structure for table `profileimages`
--

CREATE TABLE `profileimages` (
  `IdImage` int(11) NOT NULL,
  `Path` text NOT NULL,
  `Alt` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `profileimages`
--

INSERT INTO `profileimages` (`IdImage`, `Path`, `Alt`) VALUES
(1, 'assets/images/1560471070marc.jpg', 'marc'),
(2, 'assets/images/1560541715card-profile2-square.jpg', 'card-profile2-square'),
(3, 'assets/images/1560547104card-profile1-square.jpg', 'card-profile1-square');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `IdRole` int(11) NOT NULL,
  `RoleName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`IdRole`, `RoleName`) VALUES
(1, 'Administrator'),
(2, 'User');

-- --------------------------------------------------------

--
-- Table structure for table `sent`
--

CREATE TABLE `sent` (
  `Id` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Surname` varchar(255) NOT NULL,
  `Num` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Gender` varchar(255) NOT NULL,
  `Text` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sent`
--

INSERT INTO `sent` (`Id`, `Name`, `Surname`, `Num`, `Email`, `Gender`, `Text`) VALUES
(1, 'Stevan', 'Jovanovic', '066123123', 'aaa@gmail.com', 'Male', 'AAAAAAaaaaaa'),
(2, 'Milena', 'Stojanovic', '0665551233', 'mistoj@gmail.com', 'Female', 'Ovo je kontakt recenica o stvarima.'),
(3, 'Ivana', 'Milovic', '063333333', 'ada@gmail.com', 'Female', 'aaaaaa'),
(4, 'Milorad', 'Miloradovic', '0664437877', 'milorad@gmail.com', 'Male', 'Zdravo ja sam milorad i imam utiske');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `IdStaff` int(11) NOT NULL,
  `Text` varchar(255) NOT NULL,
  `Path` varchar(255) NOT NULL,
  `Alt` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`IdStaff`, `Text`, `Path`, `Alt`) VALUES
(1, 'Pyotr Stigrovski, CEO & Founder', 'assets/images/member1.jpg', 'Pyotr Stigrovski'),
(2, 'Josip Vladimski, Supply Manager', 'assets/images/member2.jpg', 'Josip Vladimski'),
(3, 'Olga Byokov, Marketing Manager', 'assets/images/member3.jpg', 'Olga Byokov'),
(4, 'Borz Brezhov, Outreach Manager', 'assets/images/member4.jpg', 'Borz Brezhov');

-- --------------------------------------------------------

--
-- Table structure for table `userpoll`
--

CREATE TABLE `userpoll` (
  `IdUserPoll` int(11) NOT NULL,
  `IdUser` int(11) NOT NULL,
  `IdPoll` int(11) NOT NULL,
  `VoteOption` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `userpoll`
--

INSERT INTO `userpoll` (`IdUserPoll`, `IdUser`, `IdPoll`, `VoteOption`) VALUES
(1, 1, 1, 'Hammer'),
(2, 1, 2, 'Bad'),
(3, 1, 3, 'Weights'),
(4, 2, 1, 'Steelborn'),
(5, 2, 2, 'Good'),
(6, 2, 3, 'Stationary'),
(7, 3, 1, 'Hammer'),
(8, 3, 2, 'Good'),
(9, 3, 3, 'Accessories'),
(10, 4, 1, 'Hammer'),
(11, 4, 2, 'Good'),
(12, 4, 3, 'Cardio'),
(13, 5, 1, 'Hammer'),
(14, 5, 2, 'Bad'),
(15, 5, 3, 'Weights'),
(16, 14, 1, 'Steelborn'),
(17, 14, 2, 'Great'),
(18, 14, 3, 'Cardio'),
(19, 15, 3, 'Weights'),
(20, 15, 2, 'Great'),
(21, 15, 1, 'Steelborn');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `Id` int(11) NOT NULL,
  `Username` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `IdRole` int(11) NOT NULL,
  `IdImage` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`Id`, `Username`, `Email`, `Password`, `IdRole`, `IdImage`) VALUES
(1, 'Admin', 'admin@gmail.com', '3d0ac1572b7da108ea5e90e26aecebc0', 1, 1),
(2, 'r4nd0mp3rs0n', 'randomperson@gmail.com', '4e3fb121194e9803bd84db47c09d0fb9', 2, 2),
(3, 'here2buy', 'here2buy@gmail.com', '4db3495f8824c7e1aa4d8c8462d97c9e', 2, NULL),
(4, 'anotherUSER2', 'anotheruser@gmail.com', '2b9e6f089e42d217ab019ed536e123bc', 2, NULL),
(5, 'username', 'username@gmail.com', '2ac9cb7dc02b3c0083eb70898e549b63', 2, NULL),
(10, 'Roooo', 'rooo@gmail.com', '0c7f9a569ae1ebeeaa8271114ecae67c', 2, NULL),
(11, 'test', 'test@gmail.com', '910886c74bbe091e7cf4526ac34b806b', 2, NULL),
(13, 'usernamea', 'eemail@gmail.com', 'a4f48d3b80ff4d47b7632ad2d0e7e18e', 2, NULL),
(14, 'glasac', 'glasac@gmail.com', '997303b6ea87d9e0042abf07e7261c12', 2, NULL),
(15, 'hohoho', 'hohoho@gmail.com', '784e490fc129ef332d1788d093d2ddf1', 2, NULL),
(16, 'Logovanje', 'marko.vukojevic.204.17@ict.edu.rs', '0b3372cc4e7f6c5b1d03975fdd5f94ce', 2, NULL),
(17, 'InsUsTest', 'insustest@gmail.com', '400886a75f6d37b959351d8e2434338e', 2, NULL),
(18, 'Korisnik2019', 'korisnik2019@gmail.com', 'badba47bec75c143ed63ec758e68e13f', 2, 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `authors`
--
ALTER TABLE `authors`
  ADD PRIMARY KEY (`IdAuthor`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`IdContact`),
  ADD UNIQUE KEY `ContactName` (`ContactName`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`IdCustomers`),
  ADD UNIQUE KEY `Path` (`Path`),
  ADD UNIQUE KEY `Alt` (`Alt`);

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`IdMenu`),
  ADD UNIQUE KEY `MenuName` (`MenuName`);

--
-- Indexes for table `polls`
--
ALTER TABLE `polls`
  ADD PRIMARY KEY (`IdPoll`),
  ADD UNIQUE KEY `Name` (`Name`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `profileimages`
--
ALTER TABLE `profileimages`
  ADD PRIMARY KEY (`IdImage`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`IdRole`),
  ADD UNIQUE KEY `RoleName` (`RoleName`);

--
-- Indexes for table `sent`
--
ALTER TABLE `sent`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`IdStaff`),
  ADD UNIQUE KEY `Text` (`Text`),
  ADD UNIQUE KEY `Path` (`Path`),
  ADD UNIQUE KEY `Alt` (`Alt`);

--
-- Indexes for table `userpoll`
--
ALTER TABLE `userpoll`
  ADD PRIMARY KEY (`IdUserPoll`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`Id`),
  ADD UNIQUE KEY `Username` (`Username`),
  ADD UNIQUE KEY `Email` (`Email`),
  ADD UNIQUE KEY `IdImage` (`IdImage`),
  ADD KEY `IdRole` (`IdRole`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `authors`
--
ALTER TABLE `authors`
  MODIFY `IdAuthor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `IdContact` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `IdCustomers` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `IdMenu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `polls`
--
ALTER TABLE `polls`
  MODIFY `IdPoll` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `profileimages`
--
ALTER TABLE `profileimages`
  MODIFY `IdImage` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `IdRole` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sent`
--
ALTER TABLE `sent`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `IdStaff` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `userpoll`
--
ALTER TABLE `userpoll`
  MODIFY `IdUserPoll` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`IdRole`) REFERENCES `roles` (`IdRole`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
