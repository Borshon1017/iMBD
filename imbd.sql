-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 17, 2023 at 02:02 AM
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
-- Table structure for table `commentinfo`
--

CREATE TABLE `commentinfo` (
  `CommentID` int(11) NOT NULL,
  `UserID` int(255) NOT NULL,
  `ContentID` int(255) NOT NULL,
  `Username` varchar(40) NOT NULL,
  `Comment` varchar(2000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `contentinfo`
--

CREATE TABLE `contentinfo` (
  `ContentID` int(11) NOT NULL,
  `UserID` int(255) NOT NULL,
  `ContentTitle` varchar(40) NOT NULL,
  `ContentDescription` varchar(2000) NOT NULL,
  `Director` varchar(40) NOT NULL,
  `Cast` varchar(40) NOT NULL,
  `Category` varchar(40) NOT NULL,
  `ReleaseDate` varchar(40) NOT NULL,
  `Poster` varchar(100) NOT NULL,
  `Trailer` varchar(500) NOT NULL,
  `Price` double NOT NULL,
  `DownloadLink` varchar(500) NOT NULL,
  `Status` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contentinfo`
--

INSERT INTO `contentinfo` (`ContentID`, `UserID`, `ContentTitle`, `ContentDescription`, `Director`, `Cast`, `Category`, `ReleaseDate`, `Poster`, `Trailer`, `Price`, `DownloadLink`, `Status`) VALUES
(1, 2, 'Death Note', 'In Tokyo, a disaffected high school student named Light Yagami finds the \"Death Note\", a mysterious black notebook that can end anyone as long as the writer knows both the target\'s true name and face. Initially disbelieving, Light quickly considers the renewed possibilities of such an ability at his disposal and annihilates high-profile Japanese criminals then targets international criminals. Five days after discovering the notebook, Light is visited by Ryuk, a \"shinigami\" and the Death Note\'s previous owner. Ryuk, invisible to anyone who has not touched the notebook, reveals that he dropped the notebook into the human world out of boredom and is amused by Light\'s actions.', 'Rian', 'Borshon', 'Anime', '19/01/2023', 'Uploads/Posters/deathnote.jpg', 'Uploads/Trailers/Death Note - OFFICIAL TRAILER.mp4', 500, 'https://kayoanime.com/death-no-seasonecial-1080p-dual-audio/', 'Inactive'),
(2, 2, 'The Last Ship', 'Naval Destroyer Nathan James is sent on what they\'re told is a research mission in the Arctic. Accompanying them is scientist, Rachel Scott. After a few months in the Arctic while Scott is on the ice doing research, some men attack them. They get back to the ship and the Commander, Tom Chandler asks the doctor what\'s going on. She says that a deadly disease broke out a few months ago. At first, they thought it was contained but they had no cure. They felt that the cure was in the Arctic which why she\'s here. But she has since received word that it has now spread to most of the globe. Chandler tries to call the President but learns the President and Vice President are dead and the US government might not have long to survive. The current President tells him that the Nathan James was not in the hot zone so he and his crew are OK. But now it\'s up to them to safeguard Scott because she holds the key to the planet\'s survival. But there are those who want the cure too and they will do whatever they have to, to get it. So they keep going and trying to find supplies and what they need so Scott can make the cure.', 'Ratul', 'Tamal', 'TV Show', '19/07/2023', 'Uploads/Posters/thelastship.jpg', 'Uploads/Trailers/The Last Ship Season 5 Trailer (HD).mp4', 500, 'https://84.46.254.230/the-last-note-2017/', 'Inactive'),
(3, 2, 'Breaking Bad', 'Set in Albuquerque, New Mexico, between 2008 and 2010, Breaking Bad follows Walter White, a struggling, frustrated high school chemistry teacher who transforms into a ruthless kingpin in the local methamphetamine drug trade, driven to financially provide for his family after being diagnosed with inoperable lung cancer', 'Ferdaus', 'Rakib', 'TV Show', '27/11/2009', 'Uploads/Posters/BreakingBad.png', 'Uploads/Trailers/Breaking Bad Trailer (First Season).mp4', 500, 'youtube.com/downloads', 'Inactive'),
(4, 2, 'Morbius: It\'s Morbing Time', 'Michael Morbius is a biochemist-turned-bloodsucker. After years of experimentation to eliminate his rare blood disease, Morbius gained a cure… and an acute case of vampirism. The side effects? Enhanced senses, an aversion to light, and an insatiable thirst for blood.', 'Rayhan', 'Nasir', 'Movie', '27/11/2021', 'Uploads/Posters/morbius.jpg', 'Uploads/Trailers/MORBIUS - Official Trailer (HD).mp4', 350, 'youtube.com/morbius', 'Inactive'),
(5, 2, 'Better Call Saul', 'Better Call Saul follows the transformation of Jimmy McGill, a former con artist who is trying to become a respectable lawyer, into the personality of the flamboyant criminal lawyer Saul.', 'Shofiq', 'Alfaz', 'TV Show', '27/11/2009', 'Uploads/Posters/bettercallsaul.jpg', 'Uploads/Trailers/Better Call Saul - Series Trailer [HD] - Netflix_2.mp4', 700, 'youtube.com/BreakingBad', 'Inactive'),
(6, 2, 'JoJo\'s Bizarre Adventure', 'JoJo\'s Bizarre Adventure also known as JoJo\'s Bizarre Adventure: The Animation, is a Japanese anime television series produced by David Production', 'Nadim', 'Sabbir', 'Anime', '27/12/2021', 'Uploads/Posters/jojo.png', 'Uploads/Trailers/JoJo’s Bizarre Adventure STONE OCEAN - Official Trailer - Netflix.mp4', 400, 'youtube.com/jojo', 'Inactive'),
(7, 2, 'Among Us : Last One Alive', 'Among Us is a multiplayer game where 10 players get dropped into an alien spaceship, sky headquarters or planet base, where each player is designated with a private role of either a “crewmate” and an “impostor.” This is an online multiplayer social deduction game, and a player can either be a crewmate or an imposter. One can play the game online or on local WiFi with their select friends.', 'Rian', 'Sazid', 'Movie', '2023-07-20', 'Uploads/Posters/Among_Us_poster.png', 'Uploads/Among Us Trailer.mp4', 500, 'google.com', 'Inactive'),
(8, 2, 'Attack On Titan', 'The story of Attack on Titan centers on a civilization inside three circular walls. According to the knowledge propagated locally, it is the last surviving vestige of human civilization. Its inhabitants, known as Eldians, have been led to believe that over one hundred years ago, humanity was driven to the brink of extinction after the emergence of humanoid giants called Titans, who attack and eat humans on sight. The last remnants of humanity retreated behind three concentric walls and enjoyed roughly a century of peace. Within the walls, the thought of venturing outside is strongly frowned upon and discouraged. To combat Titans, the country\'s military employs Vertical Maneuvering Equipment (VME), also called Omni-Directional Maneuvering Gear (ODM Gear): a set of waist-mounted grappling hooks and gas-powered propulsion enabling immense mobility in three dimensions. Swords made of ultrahard steel are used in conjunction with the gear, and eventually rocket launcher-like weapons called Thunder Spears are also developed.', 'Rian', 'Borshon', 'Anime', '19/01/2002', 'Uploads/Posters/81dH7-pkjiL.jpg', 'Uploads/Trailers/Attack on Titan Final Season THE FINAL CHAPTERS Special 2 - OFFICIAL TRAILER.mp4', 500, 'youtube.com', 'Inactive'),
(9, 2, 'Spiderman: Across The Spider Verse', 'On Earth-65, Gwen Stacy lives with her father, police captain George, who is unaware that she is Spider-Woman. Years prior, Gwen accidentally caused the death of her best friend Peter Parker while he was rampaging as the Lizard, and police have been hunting her ever since. One night, Gwen encounters a version of the Vulture from an Italian Renaissance-themed alternate universe. Spider-People Miguel O\'Hara and Jess Drew arrive using portal-generating watches and help Gwen neutralize the Vulture. Gwen reveals her identity to George; distraught, he attempts to arrest her. Miguel grants Gwen membership into his Spider-Society and she escapes with him and Jess.', 'Fardin', 'Ashraf', 'Movie', '19/03/2017', 'Uploads/Posters/across_the_spider-verse.jpg', 'Uploads/Trailers/SPIDER-MAN- INTO THE SPIDER-VERSE - Official Trailer (HD).mp4', 500, 'google.com', 'Inactive');

-- --------------------------------------------------------

--
-- Table structure for table `discussion`
--

CREATE TABLE `discussion` (
  `DiscussionID` int(11) NOT NULL,
  `DiscussionTitle` varchar(100) NOT NULL,
  `DiscussionDescription` varchar(2000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `discussion`
--

INSERT INTO `discussion` (`DiscussionID`, `DiscussionTitle`, `DiscussionDescription`) VALUES
(1, 'Shakib Khan er priotoma kemon laglo bondhura?', 'Eid e shakib khaner notun blockbuster hit porinita??? kemon holo comment kore janate bhulben na.');

-- --------------------------------------------------------

--
-- Table structure for table `discussioncomment`
--

CREATE TABLE `discussioncomment` (
  `DiscussionCommentID` int(11) NOT NULL,
  `DiscussionID` int(255) NOT NULL,
  `UserID` int(255) NOT NULL,
  `Username` varchar(40) NOT NULL,
  `DiscussionComment` varchar(2000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `helpline`
--

CREATE TABLE `helpline` (
  `HelplineID` int(11) NOT NULL,
  `Sender` varchar(40) NOT NULL,
  `Receiver` varchar(40) NOT NULL,
  `Message` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `paymentinfo`
--

CREATE TABLE `paymentinfo` (
  `PaymentID` int(11) NOT NULL,
  `UserID` int(255) NOT NULL,
  `Username` varchar(40) NOT NULL,
  `ContentTitle` varchar(40) NOT NULL,
  `Price` double NOT NULL,
  `PurchaseDate` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `poll`
--

CREATE TABLE `poll` (
  `PollID` int(11) NOT NULL,
  `PollTitle` varchar(100) NOT NULL,
  `OptionOne` varchar(40) NOT NULL,
  `OptionTwo` varchar(40) NOT NULL,
  `OptionThree` varchar(40) NOT NULL,
  `OptionFour` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `poll`
--

INSERT INTO `poll` (`PollID`, `PollTitle`, `OptionOne`, `OptionTwo`, `OptionThree`, `OptionFour`) VALUES
(1, 'Will we be able to finish this project on Time?', 'Yes', 'No', 'Maybe', 'Do not wanna answer');

-- --------------------------------------------------------

--
-- Table structure for table `pollvotes`
--

CREATE TABLE `pollvotes` (
  `PollVoteID` int(11) NOT NULL,
  `PollID` int(255) NOT NULL,
  `UserID` int(255) NOT NULL,
  `Vote` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ratingreview`
--

CREATE TABLE `ratingreview` (
  `RatingReviewID` int(11) NOT NULL,
  `UserID` int(255) NOT NULL,
  `ContentID` int(255) NOT NULL,
  `Rating` varchar(40) NOT NULL,
  `Review` varchar(2000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `userinfo`
--

CREATE TABLE `userinfo` (
  `UserID` int(11) NOT NULL,
  `Fullname` varchar(40) NOT NULL,
  `Username` varchar(40) NOT NULL,
  `Phone` varchar(15) NOT NULL,
  `Email` varchar(40) NOT NULL,
  `Password` varchar(40) NOT NULL,
  `ProfilePicture` varchar(2000) NOT NULL,
  `Role` varchar(20) NOT NULL,
  `Status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `userinfo`
--

INSERT INTO `userinfo` (`UserID`, `Fullname`, `Username`, `Phone`, `Email`, `Password`, `ProfilePicture`, `Role`, `Status`) VALUES
(1, 'Tanvir Hasan Tamal', 'tanvirh103', '01534103985', 'tanvirh103@gmail.com', '12345678', 'Uploads/Images/default_pfp.jpg', 'Administrator', 'Active'),
(2, 'Borshon Alfred Gomes', 'borshon1017', '0171389335', 'borshongomez@gmail.com', '12345678', 'Uploads/Images/default_pfp.jpg', 'Content Writer', 'Active'),
(3, 'Ferdous Sazid', 'ferdoussazid', '01911816035', 'ferdoussazid2015@gmail.com', '12345678', 'Uploads/Images/default_pfp.jpg', 'Critic', 'Active'),
(4, 'Rianul Amin Rian', 'ppsppspsspss', '01402246680', 'ppsppspsspss@gmail.com', '12345678', 'Uploads/Images/default_pfp.jpg', 'General User', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `watchlist`
--

CREATE TABLE `watchlist` (
  `WatchListID` int(11) NOT NULL,
  `ContentID` int(255) NOT NULL,
  `UserID` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `commentinfo`
--
ALTER TABLE `commentinfo`
  ADD PRIMARY KEY (`CommentID`);

--
-- Indexes for table `contentinfo`
--
ALTER TABLE `contentinfo`
  ADD PRIMARY KEY (`ContentID`);

--
-- Indexes for table `discussion`
--
ALTER TABLE `discussion`
  ADD PRIMARY KEY (`DiscussionID`);

--
-- Indexes for table `discussioncomment`
--
ALTER TABLE `discussioncomment`
  ADD PRIMARY KEY (`DiscussionCommentID`);

--
-- Indexes for table `helpline`
--
ALTER TABLE `helpline`
  ADD PRIMARY KEY (`HelplineID`);

--
-- Indexes for table `paymentinfo`
--
ALTER TABLE `paymentinfo`
  ADD PRIMARY KEY (`PaymentID`);

--
-- Indexes for table `poll`
--
ALTER TABLE `poll`
  ADD PRIMARY KEY (`PollID`);

--
-- Indexes for table `pollvotes`
--
ALTER TABLE `pollvotes`
  ADD PRIMARY KEY (`PollVoteID`);

--
-- Indexes for table `ratingreview`
--
ALTER TABLE `ratingreview`
  ADD PRIMARY KEY (`RatingReviewID`);

--
-- Indexes for table `userinfo`
--
ALTER TABLE `userinfo`
  ADD PRIMARY KEY (`UserID`),
  ADD UNIQUE KEY `Email` (`Email`);

--
-- Indexes for table `watchlist`
--
ALTER TABLE `watchlist`
  ADD PRIMARY KEY (`WatchListID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `commentinfo`
--
ALTER TABLE `commentinfo`
  MODIFY `CommentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `contentinfo`
--
ALTER TABLE `contentinfo`
  MODIFY `ContentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `discussion`
--
ALTER TABLE `discussion`
  MODIFY `DiscussionID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `discussioncomment`
--
ALTER TABLE `discussioncomment`
  MODIFY `DiscussionCommentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `helpline`
--
ALTER TABLE `helpline`
  MODIFY `HelplineID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `paymentinfo`
--
ALTER TABLE `paymentinfo`
  MODIFY `PaymentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `poll`
--
ALTER TABLE `poll`
  MODIFY `PollID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pollvotes`
--
ALTER TABLE `pollvotes`
  MODIFY `PollVoteID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `ratingreview`
--
ALTER TABLE `ratingreview`
  MODIFY `RatingReviewID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `userinfo`
--
ALTER TABLE `userinfo`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `watchlist`
--
ALTER TABLE `watchlist`
  MODIFY `WatchListID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
