-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 12, 2024 at 09:14 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `resort`
--

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `feedback_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `message` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`feedback_id`, `name`, `email`, `phone`, `subject`, `message`) VALUES
(1, 'test', 'df@gmail.com', '12313114', 'sdvsdv', 'fvv'),
(2, 'Sinthiya', 'sinthiya@gmail.com', '8088847325', 'stay', 'Unforgettable experience  with the combination of breathtaking scenery, luxurious accommodations, and impeccable service made it a truly unforgettable getaway. ');

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `gallery_id` int(11) NOT NULL,
  `image` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`gallery_id`, `image`, `status`) VALUES
(1, '1712641223.jpg', 'Active'),
(2, '1712661439.jpg', 'Active'),
(4, '1712641323.jpg', 'Active'),
(5, '1712640769.webp', 'Active'),
(11, '1712661546.jpg', 'Active'),
(12, '1712661566.jpg', 'Active'),
(13, '1712661460.jpg', 'Active'),
(14, '1712640980.jpeg', 'Active'),
(15, '1712661715.jpg', 'Active'),
(16, '1712661606.jpg', 'Active'),
(17, '1712661730.jpg', 'Active'),
(18, '1712661654.png', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `order_no` varchar(50) NOT NULL,
  `room_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `address` varchar(500) NOT NULL,
  `adhar_no` varchar(50) NOT NULL,
  `id_proof` varchar(500) NOT NULL,
  `check_in` date NOT NULL,
  `check_out` date NOT NULL,
  `status` varchar(50) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `order_no`, `room_id`, `user_id`, `name`, `phone`, `address`, `adhar_no`, `id_proof`, `check_in`, `check_out`, `status`, `date`) VALUES
(1, '10001', 2, 0, '', '0', '', '', '', '2024-03-26', '2024-03-27', 'Booked', '2024-03-23'),
(4, 'ORD4453', 3, 2, '', '0', '', '', '', '2024-03-27', '2024-03-28', 'Canceled', '2024-03-24'),
(5, 'ORD5812', 2, 2, '', '0', '', '', '', '2024-03-30', '2024-03-31', 'Canceled', '2024-03-25'),
(6, 'ORD2226', 2, 2, '', '0', '', '', '', '2024-04-09', '2024-04-11', 'Booked', '2024-04-08'),
(7, 'ORD4179', 8, 1, '', '0', '', '', '', '2024-04-10', '2024-04-12', 'Booked', '2024-04-09'),
(8, 'ORD5197', 7, 1, '', '0', '', '', '', '2024-04-13', '2024-04-14', 'Booked', '2024-04-10'),
(9, 'ORD7820', 8, 1, '', '0', '', '', '', '2024-05-20', '2024-05-22', 'Booked', '2024-04-10'),
(10, 'ORD9425', 6, 2, '', '0', '', '', '', '2024-05-12', '2023-05-14', 'Booked', '2024-04-11'),
(11, 'ORD6799', 6, 2, '', '0', '', '', '', '2024-05-12', '2024-05-14', 'Booked', '2024-04-11'),
(12, 'ORD7156', 6, 2, '', '0', '', '', '', '2024-04-20', '2024-04-25', 'Booked', '2024-04-11'),
(13, 'ORD9560', 6, 1, '', '0', '', '', '', '2024-04-07', '2024-04-11', 'Booked', '2024-04-11'),
(14, 'ORD7452', 6, 1, '', '0', '', '', '', '2024-04-13', '2024-04-14', 'Booked', '2024-04-11'),
(15, 'ORD1335', 6, 2, 'Jason', '7845784578', 'mangalore', '454545454545', '1712898620.webp', '2024-05-02', '2024-05-03', 'Booked', '2024-04-12');

-- --------------------------------------------------------

--
-- Table structure for table `packages`
--

CREATE TABLE `packages` (
  `package_id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `image` varchar(500) NOT NULL,
  `description` varchar(600) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `packages`
--

INSERT INTO `packages` (`package_id`, `title`, `image`, `description`) VALUES
(1, 'TREKKING', '1712735096.jpg', 'We offer a captivating blend of natural beauty, from lush green hills and cascading waterfalls to sprawling coffee estates. Amidst this breathtaking scenery, travelers find a sense of awe and wonder, humbled by the majesty of the natural world.'),
(4, 'DINING HALL', '1712762800.jpg', 'Offers a delightful culinary experience, blending local flavors with global cuisines, served in picturesque settings amidst the serene surroundings.  We offer not just a meal but a culinary journey, allowing guests to immerse themselves in the flavors of the region while enjoying the natural beauty that surrounds them.'),
(5, 'CAMP FIRE', '1712763007.jpg', 'Offering guests a cozy and atmospheric setting to gather around, socialize, and enjoy the warmth of a crackling fire under the starlit sky by experiencing scenic location and  live music or entertainment'),
(6, 'INDOOR GAMES', '1712763487.jpg', 'We offer a variety of indoor games to ensure guests have an enjoyable time even when guests not exploring the outdoors. \r\n Such as Table tennis,Carrom,Chess,Card games these games cater to a wide range of interests , ensuring that guests have plenty of options for entertainment during their stay at Misty River.'),
(7, 'OUTDOOR GAMES', '1712764118.jpeg', 'We often boast a plethora of outdoor games and activities, taking advantage of pleasant climate .For thrill-seekers, we organize adventure activities such as zip-lining, rappelling, or rock climbing.By offering guests an exhilarating way to experience the rugged terrain and scenic beauty.'),
(8, 'MULTI-UTILITY POOL', '1712824340.jpg', 'Offering a versatile aquatic experience that ensures the overall stay of the guest at the resort.');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `payment_id` int(11) NOT NULL,
  `payment_no` varchar(50) NOT NULL,
  `order_no` varchar(50) NOT NULL,
  `user_id` int(11) NOT NULL,
  `card_no` varchar(50) NOT NULL,
  `card_exp_month` varchar(50) NOT NULL,
  `card_exp_year` year(4) NOT NULL,
  `cvv` varchar(50) NOT NULL,
  `amount` varchar(50) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`payment_id`, `payment_no`, `order_no`, `user_id`, `card_no`, `card_exp_month`, `card_exp_year`, `cvv`, `amount`, `date`) VALUES
(1, 'PMT9209', 'ORD4453', 2, '7894561237894561', '10', '2032', '123', '', '2024-03-24'),
(2, 'PMT0489', 'ORD5812', 2, '7894561234568868', '01', '2025', '111', '', '2024-03-25'),
(3, 'PMT6358', 'ORD2226', 2, '98877654321', '04', '2025', '876', '', '2024-04-08'),
(4, 'PMT7661', 'ORD4179', 1, '5678', '08', '2030', '234', '', '2024-04-09'),
(5, 'PMT3070', 'ORD5197', 1, '8876663421009', '10', '2033', '789', '', '2024-04-10'),
(6, 'PMT6307', 'ORD7820', 1, '90067543219', '06', '2028', '345', '', '2024-04-10'),
(7, 'PMT9484', 'ORD9425', 2, '345678998856', '08', '2034', '678', '', '2024-04-11'),
(8, 'PMT6580', 'ORD6799', 2, '9876', '01', '2024', '122', '', '2024-04-11'),
(9, 'PMT5054', 'ORD7156', 2, '12345678', '08', '2027', '123', '', '2024-04-11'),
(10, 'PMT8240', 'ORD9560', 1, '123456', '09', '2026', '123', '', '2024-04-11'),
(11, 'PMT4884', 'ORD7452', 1, '65432', '08', '2032', '123', '', '2024-04-11'),
(12, 'PMT9709', 'ORD1335', 2, '1245787878787878', '10', '2033', '121', '3500', '2024-04-12');

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE `room` (
  `room_id` int(11) NOT NULL,
  `room_no` varchar(50) NOT NULL,
  `image1` varchar(50) NOT NULL,
  `image2` varchar(50) NOT NULL,
  `image3` varchar(50) NOT NULL,
  `image4` varchar(50) NOT NULL,
  `image5` varchar(50) NOT NULL,
  `description` varchar(500) NOT NULL,
  `price` varchar(25) NOT NULL,
  `type` varchar(25) NOT NULL,
  `no_of_bed` varchar(25) NOT NULL,
  `no_of_people` varchar(25) NOT NULL,
  `bathroom` varchar(25) NOT NULL,
  `status` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `room`
--

INSERT INTO `room` (`room_id`, `room_no`, `image1`, `image2`, `image3`, `image4`, `image5`, `description`, `price`, `type`, `no_of_bed`, `no_of_people`, `bathroom`, `status`) VALUES
(6, '001', '1712666414_1.webp', '1712654261_2.jpg', '1712654261_3.jpg', '1712654261_4.jpg', '1712654261_5.jpg', 'Cottage House', '3500', 'AC', '2', '4', 'Yes', 'Active'),
(7, '002', '1712666732_1.jpg', '1712666732_2.jpg', '1712666732_3.jpg', '1712666732_4.jpg', '1712666732_5.jpg', 'Wooden Tree-House', '3200', 'Non AC', '1', '2', 'Yes', 'Active'),
(8, '003', '1712667342_1.webp', '1712667342_2.jpg', '1712667342_3.webp', '1712667342_4.jpg', '1712667342_5.jpg', 'Villas', '4000', 'AC', '1', '2', 'Yes', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `password` varchar(25) NOT NULL,
  `user_type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_name`, `email`, `phone`, `password`, `user_type`) VALUES
(1, 'Admin', 'admin@gmail.com', '7894561231', '12', 'Admin'),
(2, 'mahesh', 'customer@gmail.com', '4512457845', '34', 'Customer'),
(3, 'abc', 'customerr@gmail.com', '8088847325', '1234', 'Customer');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`feedback_id`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`gallery_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `packages`
--
ALTER TABLE `packages`
  ADD PRIMARY KEY (`package_id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`room_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `feedback_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `gallery_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `packages`
--
ALTER TABLE `packages`
  MODIFY `package_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `room`
--
ALTER TABLE `room`
  MODIFY `room_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
