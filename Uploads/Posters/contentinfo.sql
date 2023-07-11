-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 11, 2023 at 10:32 PM
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
-- Database: `imbd`
--

-- --------------------------------------------------------

--
-- Table structure for table `contentinfo`
--

CREATE TABLE `contentinfo` (
  `ContentID` int(11) NOT NULL,
  `UserID` int(255) NOT NULL,
  `ContentTitle` varchar(40) NOT NULL,
  `ContentDescription` varchar(2000) NOT NULL,
  `Category` varchar(40) NOT NULL,
  `ReleaseDate` varchar(40) NOT NULL,
  `Poster` varchar(100) NOT NULL,
  `Trailer` varchar(500) NOT NULL,
  `Price` double NOT NULL,
  `DownloadLink` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contentinfo`
--

INSERT INTO `contentinfo` (`ContentID`, `UserID`, `ContentTitle`, `ContentDescription`, `Category`, `ReleaseDate`, `Poster`, `Trailer`, `Price`, `DownloadLink`) VALUES
(1, 1, 'Spiderman: Across The Spider Verse', 'Spider-Man: Into the Spider-Verse is a 2018 American computer-animated superhero film featuring the Marvel Comics character Miles Morales / Spider-Man', 'Movie', '19/01/2023', 'Uploads/Posters/across_the_spider-verse.jpg', 'Uploads/Trailers/MORBIUS - Official Trailer (HD).mp4', 200, 'youtube.com/download'),
(2, 2, 'Among Us: Who is the Impostor', 'among us is a very sus game.', 'Anime', '19/07/2023', 'Uploads/Posters/Among_Us_poster.png', 'Uploads/Trailers/AMONGUS official trailer.mp4', 400, 'youtube.com/download'),
(3, 3, 'Breaking Bad', 'Set in Albuquerque, New Mexico, between 2008 and 2010, Breaking Bad follows Walter White, a struggling, frustrated high school chemistry teacher who transforms into a ruthless kingpin in the local methamphetamine drug trade, driven to financially provide for his family after being diagnosed with inoperable lung cancer', 'TV Show', '27/11/2009', 'Uploads/Posters/BreakingBad.png', 'Uploads/Trailers/Breaking Bad Trailer (First Season).mp4', 500, 'youtube.com/downloads'),
(4, 3, 'Morbius: It\'s Morbing Time', 'Michael Morbius is a biochemist-turned-bloodsucker. After years of experimentation to eliminate his rare blood disease, Morbius gained a cure… and an acute case of vampirism. The side effects? Enhanced senses, an aversion to light, and an insatiable thirst for blood.', 'Movie', '27/11/2021', 'Uploads/Posters/morbius.jpg', 'Uploads/Trailers/MORBIUS - Official Trailer (HD).mp4', 350, 'youtube.com/morbius'),
(5, 3, 'Better Call Saul', 'Better Call Saul follows the transformation of Jimmy McGill, a former con artist who is trying to become a respectable lawyer, into the personality of the flamboyant criminal lawyer Saul', 'TV Show', '27/11/2009', 'Uploads/Posters/bettercallsaul.jpg', 'Uploads/Trailers/bettercallsaul.mp4', 700, 'youtube.com/BreakingBad'),
(6, 3, 'JoJo\'s Bizarre Adventure', 'JoJo\'s Bizarre Adventure also known as JoJo\'s Bizarre Adventure: The Animation, is a Japanese anime television series produced by David Production', 'Anime', '27/12/2021', 'Uploads/Posters/jojo.png', 'Uploads/Trailers/jojo.mp4', 400, 'youtube.com/jojo');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contentinfo`
--
ALTER TABLE `contentinfo`
  ADD PRIMARY KEY (`ContentID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contentinfo`
--
ALTER TABLE `contentinfo`
  MODIFY `ContentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
