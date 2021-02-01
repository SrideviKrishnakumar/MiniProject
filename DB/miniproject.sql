-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 06, 2020 at 04:45 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `miniproject`
--

-- --------------------------------------------------------

--
-- Table structure for table `actors`
--

CREATE TABLE `actors` (
  `id` int(20) NOT NULL,
  `firstName` varchar(50) NOT NULL,
  `lastName` varchar(50) NOT NULL,
  `nationality` enum('USA','UK','French','German','Japanese') NOT NULL,
  `birthYear` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `actors`
--

INSERT INTO `actors` (`id`, `firstName`, `lastName`, `nationality`, `birthYear`) VALUES
(1, 'Ben', 'Stiller', 'USA', 1965),
(2, 'Bradley', 'Cooper', 'USA', 1975),
(3, 'Zack', 'Galifianakis', 'USA', 1969),
(4, 'Sandra', 'Bullock', 'USA', 1964),
(5, 'Bruce', 'Willis', 'German', 1955),
(6, 'Idina', 'Menzel', 'USA', 1971),
(7, 'Georgie', 'Henley', 'UK', 1995),
(8, 'James', 'McAvoy', 'UK', 1979);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(20) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(1, 'Comedy'),
(2, 'Kids'),
(3, 'Action'),
(4, 'Horror');

-- --------------------------------------------------------

--
-- Table structure for table `movies`
--

CREATE TABLE `movies` (
  `id` int(20) NOT NULL,
  `title` varchar(100) NOT NULL,
  `releaseYear` int(4) NOT NULL,
  `description` varchar(255) NOT NULL,
  `poster` varchar(50) NOT NULL,
  `category_id` int(11) NOT NULL,
  `moviePath` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `movies`
--

INSERT INTO `movies` (`id`, `title`, `releaseYear`, `description`, `poster`, `category_id`, `moviePath`) VALUES
(1, 'Meet the Parents', 2000, 'Greg Focker decides to spend a weekend with his girlfriend\'s parents before proposing to her. However, her father instantly dislikes Greg, which makes his stay far worse than he imagined.', 'images/meetTheParents.jpg', 1, 'movies/meetTheParents.avi'),
(2, 'Meet the Fockers', 2004, 'Greg Focker and his fiancee Pam decide to make their respective parents meet before their wedding. However, the Fockers\' relaxed attitude does not go down well with Pam\'s family.', 'images/meetTheFockers.jpg', 1, 'movies/meetTheFockers.avi'),
(3, 'Hangover', 2009, 'Doug and his three best men go to Las Vegas to celebrate his bachelor party. However, the three best men wake up the next day with a hangover and realise that Doug is missing.', 'images/hangover.jpg', 1, 'movies/hangover.avi'),
(4, 'Ocean\'s 8', 2018, 'Debbie Ocean is released from jail after serving a prison sentence. She assembles a special crew of seven women to steal a diamond necklace, worth 150 million dollars, from the Met Gala.', 'images/oceans8.jpg', 1, 'movies/oceans8.avi'),
(5, 'Die Hard', 1988, 'Hoping to spend Christmas with his estranged wife, detective John McClane arrives in LA. However, he learns about a hostage situation in an office building and his wife is one of the hostages.', 'images/dieHard.jpg', 3, 'movies/dieHard.avi'),
(6, 'Frozen', 2013, 'Anna sets out on a journey with an iceman, Kristoff, and his reindeer, Sven, in order to find her sister, Elsa, who has the power to convert any object or person into ice.', 'images/frozen.jpg', 2, 'movies/frozen.avi'),
(7, 'The Chronicles of Narnia: The Lion, the Witch and the Wardrobe', 2005, 'While playing, Lucy and her siblings find a wardrobe that lands them in a mystical place called Narnia. Here they realise that it was fated and they must now unite with Aslan to defeat an evil queen.', 'images/narnia1.jpg', 2, 'movies/narnia1.avi'),
(8, 'Bird Box', 2018, 'When a mysterious force decimates the population, only one thing is certain -- if you see it, you die. The survivors must now avoid coming face to face with an entity that takes the form of their worst fears. Searching for hope and a new beginning, a ...', 'images/birdBox.jpg', 4, 'movies/birdBox.avi');

-- --------------------------------------------------------

--
-- Table structure for table `movie_actors`
--

CREATE TABLE `movie_actors` (
  `movie_id` int(20) NOT NULL,
  `actors_id` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `movie_actors`
--

INSERT INTO `movie_actors` (`movie_id`, `actors_id`) VALUES
(1, 1),
(2, 1),
(3, 2),
(3, 3),
(4, 4),
(5, 5),
(6, 6),
(7, 7),
(7, 8),
(8, 4);

-- --------------------------------------------------------

--
-- Table structure for table `playlist`
--

CREATE TABLE `playlist` (
  `users_id` int(20) NOT NULL,
  `dateCreated` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `id` int(20) NOT NULL,
  `name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(20) NOT NULL,
  `firstName` varchar(50) NOT NULL,
  `lastName` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(60) NOT NULL,
  `admin` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstName`, `lastName`, `email`, `password`, `admin`) VALUES
(1, 'Add', 'Min', 'admin@is.com', '$2y$10$Kst1hqJSy.UZ4X0RbBgaFOclzSdid3uHOGJ6EdgqdMWfKU/FbBwJ6', 1),
(2, 'Not', 'Admin', 'admin@not.com', '$2y$10$RCDPX35baVsr7nz5x1U4Buxo4cXz8Fmu4kXwJpRzG5GFHH9G6ywUq', 0),
(5, 'Hanz', 'Dieter', 'hanz@dieter.com', '$2y$10$lbEcY29M4787qpd4lCA4N.OC69UoQe7Ut2CPYzH/dTxxtJ7nT7JT.', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_playlist`
--

CREATE TABLE `user_playlist` (
  `movies_id` int(20) NOT NULL,
  `playlist_id` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `actors`
--
ALTER TABLE `actors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `movies`
--
ALTER TABLE `movies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `c_4` (`category_id`);

--
-- Indexes for table `movie_actors`
--
ALTER TABLE `movie_actors`
  ADD KEY `movie_actors_fk0` (`movie_id`),
  ADD KEY `movie_actors_fk1` (`actors_id`);

--
-- Indexes for table `playlist`
--
ALTER TABLE `playlist`
  ADD PRIMARY KEY (`id`),
  ADD KEY `playlist_fk0` (`users_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_playlist`
--
ALTER TABLE `user_playlist`
  ADD KEY `user_playlist_fk0` (`movies_id`),
  ADD KEY `user_playlist_fk1` (`playlist_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `actors`
--
ALTER TABLE `actors`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `movies`
--
ALTER TABLE `movies`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `playlist`
--
ALTER TABLE `playlist`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `movies`
--
ALTER TABLE `movies`
  ADD CONSTRAINT `c_4` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);

--
-- Constraints for table `movie_actors`
--
ALTER TABLE `movie_actors`
  ADD CONSTRAINT `movie_actors_fk0` FOREIGN KEY (`movie_id`) REFERENCES `movies` (`id`),
  ADD CONSTRAINT `movie_actors_fk1` FOREIGN KEY (`actors_id`) REFERENCES `actors` (`id`);

--
-- Constraints for table `playlist`
--
ALTER TABLE `playlist`
  ADD CONSTRAINT `playlist_fk0` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `user_playlist`
--
ALTER TABLE `user_playlist`
  ADD CONSTRAINT `user_playlist_fk0` FOREIGN KEY (`movies_id`) REFERENCES `movies` (`id`),
  ADD CONSTRAINT `user_playlist_fk1` FOREIGN KEY (`playlist_id`) REFERENCES `playlist` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
