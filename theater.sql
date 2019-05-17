-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 05, 2019 at 06:08 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.1.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `theater`
--

-- --------------------------------------------------------

--
-- Table structure for table `movie`
--

CREATE TABLE `movie` (
  `id` int(10) NOT NULL,
  `year` varchar(10) NOT NULL,
  `name` varchar(100) NOT NULL,
  `timeline` varchar(20) NOT NULL,
  `director` varchar(50) NOT NULL,
  `rate` int(5) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `image` varchar(1000) NOT NULL,
  `cover` varchar(100) NOT NULL,
  `trailer` varchar(1000) NOT NULL,
  `link` varchar(1000) NOT NULL,
  `type` int(5) NOT NULL,
  `category` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `movie`
--

INSERT INTO `movie` (`id`, `year`, `name`, `timeline`, `director`, `rate`, `description`, `image`, `cover`, `trailer`, `link`, `type`, `category`) VALUES
(1, '2019', 'Captain Marvel', '123 phÃºt', 'Walt Disney Pictures, Marvel Studios, Animal Logic', 5, 'Láº¥y bá»‘i cáº£nh nhá»¯ng nÄƒm 90s, Captain Marvel lÃ  má»™t cuá»™c phiÃªu lÆ°u hoÃ n toÃ n má»›i Ä‘áº¿n vá»›i má»™t thá»i ká»³ chÆ°a tá»«ng xuáº¥t hiá»‡n trong vÅ© trá»¥ Ä‘iá»‡n áº£nh Marvel. Bá»™ phim ká»ƒ vá» con Ä‘Æ°á»ng trá»Ÿ thÃ nh siÃªu anh hÃ¹ng máº¡nh máº½ nháº¥t vÅ© trá»¥ cá»§a Carol Danvers.', '../images/poster.medium.jpg', '../images/Captain-Marvel-Movie-Thanos-Black-Order-Theory.jpg', 'https://www.youtube.com/embed/6ZfuNTqbHE8', '../videos/', 0, 'HÃ nh Ä‘á»™ng, phiÃªu lÆ°u, viá»…n tÆ°á»Ÿng, phim chiáº¿u ráº¡p'),
(2, '2018', 'Avenger Infinity War', '149 phÃºt', 'Walt Disney Pictures, Marvel Studios, Animal Logic', 5, 'Sau chuyáº¿n hÃ nh trÃ¬nh Ä‘á»™c nháº¥t vÃ´ nhá»‹ khÃ´ng ngá»«ng má»Ÿ rá»™ng vÃ  phÃ¡t triá»ƒn vá»¥ trÅ© Ä‘iá»‡n áº£nh Marvel, bá»™ phim Avengers: Cuá»™c Chiáº¿n VÃ´ Cá»±c sáº½ mang Ä‘áº¿n mÃ n áº£nh tráº­n chiáº¿n cuá»‘i cÃ¹ng khá»‘c liá»‡t nháº¥t má»i thá»i Ä‘áº¡i.  ', '../images/poster.medium (1).jpg', '../images/Avengers-3-Trailer-Countdown-Release-Date-Infinity-War.jpg', 'https://www.youtube.com/embed/6ZfuNTqbHE8', '../videos/', 0, 'HÃ nh Ä‘á»™ng, phiÃªu lÆ°u, viá»…n tÆ°á»Ÿng, phim chiáº¿u ráº¡p'),
(3, '2019', 'Fairy Tale', 'TrÃªn 40 táº­p', 'Ishihira Shinji', 5, 'MÃ¹a cuá»‘i cÃ¹ng cá»§a Fairy Tail.', '../images/poster.medium (2).jpg', '../images/108_fairy-tail2-thumb_1000x562.jpg', 'https://www.youtube.com/embed/AtlsjFlcRZ0', '../videos/fairytail.mp4', 0, 'Viá»…n tÆ°á»Ÿng, hoáº¡t hÃ¬nh, phiÃªu lÆ°u, hÃ i hÆ°á»›c, tÃ¬nh cáº£m.');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(20) NOT NULL,
  `username` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `type` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `email`, `type`) VALUES
(1, 'admin', '12345', 'doduythinh.1999@gmail.com', 0),
(3, 'ThinhDo', '123456', '', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `movie`
--
ALTER TABLE `movie`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `movie`
--
ALTER TABLE `movie`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
