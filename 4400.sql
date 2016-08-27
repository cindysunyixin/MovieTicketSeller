-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 25, 2016 at 07:30 PM
-- Server version: 5.5.49-0ubuntu0.14.04.1
-- PHP Version: 7.0.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `4400`
--

-- --------------------------------------------------------

--
-- Table structure for table `movie`
--

CREATE TABLE IF NOT EXISTS `movie` (
  `name` varchar(50) NOT NULL,
  `release_data` date NOT NULL,
  `level` varchar(20) NOT NULL,
  `duration` varchar(20) NOT NULL,
  `type` varchar(20) NOT NULL,
  `rating` float NOT NULL,
  `num_of_rating` float NOT NULL,
  `avai_until` date NOT NULL,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `movie`
--

INSERT INTO `movie` (`name`, `release_data`, `level`, `duration`, `type`, `rating`, `num_of_rating`, `avai_until`) VALUES
('Bad Moms', '2016-07-29', 'R', '101 min', 'Comedy', 0, 0, '2016-08-31'),
('Captain America: Civil War', '2016-05-06', 'PG-13', '147 min', 'Science fiction', 4, 3, '2016-06-30'),
('Deadpool', '2016-05-11', 'R', '108 min', 'Science fiction', 4.67, 3, '2016-07-13'),
('Finding Dory', '2016-06-17', 'PG', '105 min', 'Adventure', 4.66667, 3, '2016-07-31'),
('Ghostbusters', '2016-07-15', 'PG-13', '117 min', 'Science fiction', 4.25, 4, '2016-08-15'),
('Ice Age: Collision Course', '2016-07-22', 'PG', '100 min', 'Science fiction film', 3.5, 2, '2016-08-22'),
('Inside Out', '2016-06-19', 'PG', '102 min', 'Fantasy/Comedy', 4.5, 2, '2015-07-19'),
('Jason Bourne', '2016-07-29', 'PG-13', '123 min', 'Thriller/Action', 0, 0, '2016-08-31'),
('Lights Out', '2016-07-22', 'PG-13', '81 min', 'Horror', 3, 3, '2016-08-22'),
('Star Trek Beyond', '2016-07-22', 'PG-13', '122 min', 'Fantasy/Science fict', 3.5, 2, '2016-08-22'),
('Suicide Squad', '2016-08-05', 'PG-13', '130 min', 'Fantasy/Crime', 0, 0, '2016-09-06'),
('The Legend of Tarzan', '2016-07-01', 'PG', '110 min ', 'Action/Adventure', 3, 1, '2016-08-31'),
('The Martian', '2016-05-12', 'PG-13', '144 min', 'Science fiction', 4, 2, '2016-07-11'),
('The Secret Life of Pets', '2016-07-08', 'PG', '90 min', 'Comedy/Animation', 4, 3, '2016-08-08'),
('Zootopia', '2016-03-03', 'PG', '108 min', 'Animation, Action, A', 4, 4, '2016-07-31');

-- --------------------------------------------------------

--
-- Table structure for table `movie_overview`
--

CREATE TABLE IF NOT EXISTS `movie_overview` (
  `name` varchar(50) NOT NULL,
  `synopsis` varchar(256) NOT NULL,
  `cast` varchar(128) NOT NULL,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `movie_overview`
--

INSERT INTO `movie_overview` (`name`, `synopsis`, `cast`) VALUES
('Bad Moms', 'When three overworked and under-appreciated moms are pushed beyond their limits, they ditch their conventional responsibilities for a jolt of long overdue freedom, fun, and comedic self-indulgence.', 'Mila Kunis, Kathryn Hahn, Kristen Bell'),
('Captain America: Civil War', 'Political interference in the Avengers'' activities causes a rift between former allies Captain America and Iron Man.', 'Chris Evans, Robert Downey Jr., Scarlett Johansson'),
('Deadpool', 'A former Special Forces operative turned mercenary is subjected to a rogue experiment that leaves him with accelerated healing powers, adopting the alter ego Deadpool.', 'Ryan Reynolds, Morena Baccarin, T.J. Miller'),
('Finding Dory', 'The friendly-but-forgetful blue tang fish begins a search for her long-lost parents, and everyone learns a few things about the real meaning of family along the way.', 'Ellen DeGeneres, Albert Brooks, Ed O''Neill'),
('Ghostbusters', 'Following a ghost invasion of Manhattan, paranormal enthusiasts Erin Gilbert and Abby Yates, nuclear engineer Jillian Holtzmann, and subway worker Patty Tolan band together to stop the otherworldly threat.', 'Melissa McCarthy, Kristen Wiig, Kate McKinnon'),
('Ice Age: Collision Course', 'Manny, Diego, and Sid join up with Buck to fend off a meteor strike that would destroy the world.', 'Ray Romano, Denis Leary, John Leguizamo'),
('Inside Out', 'After young Riley is uprooted from her Midwest life and moved to San Francisco, her emotions - Joy, Fear, Anger, Disgust and Sadness - conflict on how best to navigate a new city, house, and school.', 'Amy Poehler, Bill Hader, Lewis Black'),
('Jason Bourne', 'Jason Bourne, now remembering who he truly is, tries to uncover hidden truths about his past.', 'Matt Damon, Tommy Lee Jones, Alicia Vikander'),
('Star Trek Beyond', 'The USS Enterprise crew explores the furthest reaches of uncharted space, where they encounter a new ruthless enemy who puts them and everything the Federation stands for to the test.', 'Chris Pine, Zachary Quinto, Karl Urban'),
('Suicide Squad', 'A secret government agency recruits imprisoned supervillains to execute dangerous black ops missions in exchange for clemency.', 'Margot Robbie, Cara Delevingne, Jared Leto'),
('The Legend of Tarzan', 'Tarzan, having acclimated to life in London, is called back to his former home in the jungle to investigate the activities at a mining encampment.', 'Alexander Skarsgård, Rory J. Saper, Christian Stevens'),
('The Martian', 'An astronaut becomes stranded on Mars after his team assume him dead, and must rely on his ingenuity to find a way to signal to Earth that he is alive.', 'Matt Damon, Jessica Chastain, Kristen Wiig'),
('The Secret Life of Pets', 'A terrier named Max''s quiet life is upended when his owner takes in Duke, a stray, who Max instantly dislikes.', 'Louis C.K., Eric Stonestreet, Kevin Hart'),
('Zootopia', 'In a city of anthropomorphic animals, a rookie bunny cop and a cynical con artist fox must work together to uncover a conspiracy.', 'Ginnifer Goodwin, Jason Bateman, Idris Elba');

-- --------------------------------------------------------

--
-- Table structure for table `movie_time`
--

CREATE TABLE IF NOT EXISTS `movie_time` (
  `movie_name` varchar(50) NOT NULL,
  `theater_name` varchar(50) NOT NULL,
  `movie_time` varchar(128) NOT NULL,
  `date` date NOT NULL,
  `ticket_price` varchar(16) NOT NULL,
  `same_schedule` int(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`movie_name`,`theater_name`,`date`),
  KEY `theater_name` (`theater_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `movie_time`
--

INSERT INTO `movie_time` (`movie_name`, `theater_name`, `movie_time`, `date`, `ticket_price`, `same_schedule`) VALUES
('Finding Dory', 'AMC1', '9:40AM, 1:40PM, 4:30PM, 6:40PM, 8:40PM', '2016-07-23', '11.54', 1),
('Finding Dory', 'AMC3', '10:40AM, 12:50PM, 3:30PM, 6:20PM, 8:40PM', '2016-07-23', '11.54', 1),
('Finding Dory', 'AMC4', '11:40AM, 1:30PM, 4:20PM, 7:40PM, 9:50PM', '2016-07-23', '11.54', 1),
('Finding Dory', 'Regal Cinemas Atlantic Station 18 ', '11:40AM, 1:20PM, 4:40PM, 7:50PM, 9:10PM', '2016-07-23', '11.54', 1),
('Finding Dory', 'Regal Cinemas Hollywood 24 @ North I-85', '1:20PM, 4:40PM, 7:10PM, 9:10PM, 11:20PM', '2016-07-23', '11.54', 1),
('Ghostbusters', 'AMC1', '9:40AM, 11:20PM, 3:30PM, 5:40PM, 9:20PM', '2016-07-23', '11.54', 1),
('Ghostbusters', 'AMC4', '1:30PM, 4:20PM, 7:40PM, 9:50PM, 11:30PM', '2016-07-23', '11.54', 1),
('Ghostbusters', 'Regal Cinemas Atlantic Station 18 ', '1:20PM, 4:40PM, 7:10PM, 9:10PM, 11:20PM', '2016-07-23', '11.54', 1),
('Ghostbusters', 'Regal Cinemas Hollywood 24 @ North I-85', '11:20AM, 2:40PM, 7:10PM, 9:10PM, 11:00PM', '2016-07-23', '11.54', 1),
('Ice Age: Collision Course', 'AMC1', '11:40AM, 1:00PM, 4:50PM, 7:10PM, 9:40PM', '2016-07-23', '11.54', 1),
('Ice Age: Collision Course', 'AMC3', '3:30PM, 6:20PM, 8:40PM, 10:20PM', '2016-07-23', '11.54', 1),
('Ice Age: Collision Course', 'Regal Cinemas Hollywood 24 @ North I-85', '10:55AM, 3:20PM, 7:10PM, 9:20PM, 11:10PM', '2016-07-23', '11.54', 1),
('Inside Out', 'AMC1', '10:11AM, 12:40PM, 3:50PM, 5:50PM, 9:30PM', '2016-07-23', '11.54', 1),
('Star Trek Beyond', 'AMC1', '10:40AM, 1:20PM, 4:100PM, 6:40PM, 8:40PM', '2016-07-23', '11.54', 1),
('Star Trek Beyond', 'AMC2', '11:20AM, 4:30PM, 8:20PM', '2016-07-23', '11.54', 1),
('Star Trek Beyond', 'AMC3', '10:40AM, 3:30PM, 6:20PM, 8:40PM', '2016-07-23', '11.54', 1),
('Star Trek Beyond', 'Regal Cinemas Atlantic Station 18 ', '11:40AM, 1:20PM, 4:40PM, 7:50PM, 9:10PM', '2016-07-23', '11.54', 1),
('The Legend of Tarzan', 'AMC1', '9:40AM, 1:40PM, 4:30PM, 6:40PM, 8:40PM', '2016-07-23', '11.54', 1),
('The Legend of Tarzan', 'AMC2', '10:19AM, 11:20AM, 2:20PM, 4:30PM, 8:20PM', '2016-07-23', '11.54', 1),
('The Legend of Tarzan', 'Regal Cinemas Atlantic Station 18 ', '11:40AM, 1:20PM, 4:40PM, 7:50PM, 10:10PM', '2016-07-23', '11.54', 1),
('The Martian', 'AMC4', '11:40AM, 1:30PM, 4:20PM, 7:40PM, 9:50PM, 10:50PM', '2016-07-23', '11.54', 1),
('The Secret Life of Pets', 'AMC1', '9:40AM, 1:40PM, 4:30PM, 6:40PM, 8:40PM', '2016-07-23', '11.54', 1),
('The Secret Life of Pets', 'AMC2', '10:20AM, 1:30PM, ,3:20PM, 5:40PM, 8:40PM', '2016-07-23', '11.54', 1),
('The Secret Life of Pets', 'AMC3', '10:40AM, 12:50PM, 3:30PM, 6:20PM', '2016-07-23', '11.54', 1),
('The Secret Life of Pets', 'Regal Cinemas Atlantic Station 18 ', '11:40AM, 1:20PM, 4:40PM, 7:10PM, 9:50PM', '2016-07-23', '11.54', 1),
('Zootopia', 'AMC1', '9:40AM, 1:40PM, 4:30PM, 6:40PM, 8:40PM', '2016-07-23', '11.54', 1),
('Zootopia', 'AMC2', '10:40AM, 12:50PM, 3:30PM, 6:20PM, 8:40PM', '2016-07-23', '11.54', 1),
('Zootopia', 'AMC4', '11:40AM, 1:30PM, 4:20PM, 7:40PM, 9:10PM', '2016-07-23', '11.54', 1),
('Zootopia', 'Regal Cinemas Atlantic Station 18 ', '11:40AM, 1:20PM, 4:40PM, 7:50PM, 9:10PM', '2016-07-23', '11.54', 1),
('Zootopia', 'Regal Cinemas Hollywood 24 @ North I-85', '5:20PM, 7:10PM, 9:10PM, 10:50PM', '2016-07-23', '11.54', 1);

-- --------------------------------------------------------

--
-- Table structure for table `order_detail`
--

CREATE TABLE IF NOT EXISTS `order_detail` (
  `id` varchar(64) NOT NULL,
  `movie_name` varchar(50) NOT NULL,
  `level` varchar(20) NOT NULL,
  `duration` varchar(20) NOT NULL,
  `date` datetime NOT NULL,
  `price` varchar(32) NOT NULL,
  `theater_name` varchar(50) NOT NULL,
  `theater_address` varchar(128) NOT NULL,
  `num_of_ticket` varchar(32) NOT NULL,
  `total_price` double NOT NULL,
  `payment` varchar(128) NOT NULL,
  `userid` int(32) DEFAULT NULL,
  `status` varchar(32) DEFAULT NULL,
  `refund` double NOT NULL,
  PRIMARY KEY (`id`),
  KEY `movie_name` (`movie_name`),
  KEY `userid` (`userid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `order_detail`
--

INSERT INTO `order_detail` (`id`, `movie_name`, `level`, `duration`, `date`, `price`, `theater_name`, `theater_address`, `num_of_ticket`, `total_price`, `payment`, `userid`, `status`, `refund`) VALUES
('5791233b759ddfg1', 'Inside Out', 'PG', '102 min ', '2016-06-30 21:40:00', '11.54', 'AMC1', '111 Peachtree St,30031, Atlanta, GA', 'Adult: 4, Child: 0, Senior: 0', 46.16, 'a:4:{s:4:"name";s:3:"hhh";s:6:"number";s:16:"6666666666666666";s:3:"cvv";s:3:"666";s:10:"expiration";s:7:"2016-08";}', 19, 'Complete', 0),
('57913r759ddfgg1', 'Deadpool', 'R', '108 min ', '2016-07-01 16:40:00', '11.54', 'AMC1', '111 Peachtree St,30031, Atlanta, GA', 'Adult: 3, Child: 0, Senior: 0', 34.62, 'a:4:{s:4:"name";s:3:"hhh";s:6:"number";s:16:"6666666666666666";s:3:"cvv";s:3:"666";s:10:"expiration";s:7:"2016-08";}', 11, 'Complete', 0),
('579213213b759ddfg1', 'Inside Out', 'PG', '102 min ', '2016-06-30 21:40:00', '11.54', 'AMC1', '111 Peachtree St,30031, Atlanta, GA', 'Adult: 2, Child: 0, Senior: 0', 23.08, 'a:4:{s:4:"name";s:3:"hhh";s:6:"number";s:16:"6666666666666666";s:3:"cvv";s:3:"666";s:10:"expiration";s:7:"2016-08";}', 25, 'Complete', 0),
('579213213b75ddfg1', 'Inside Out', 'PG', '102 min ', '2016-06-30 21:40:00', '11.54', 'AMC1', '111 Peachtree St,30031, Atlanta, GA', 'Adult: 1, Child: 0, Senior: 0', 11.54, 'a:4:{s:4:"name";s:3:"hhh";s:6:"number";s:16:"6666666666666666";s:3:"cvv";s:3:"666";s:10:"expiration";s:7:"2016-08";}', 21, 'Complete', 0),
('579572a3ca2b6', 'Star Trek Beyond', 'PG-13', '122 min', '2016-07-31 16:40:00', '11.54', 'Regal Cinemas Atlantic Station 18 ', '261 19th St NW #1250,30363, Atlanta, GA', 'Adult: 7, Child: 0, Senior: 0', 80.78, 'a:4:{s:4:"name";s:10:"Rayni Wang";s:6:"number";s:16:"1234567891234567";s:3:"cvv";s:3:"123";s:10:"expiration";s:7:"2021-01";}', 2, 'Cancelled', 75.78),
('579573084bbd4', 'Finding Dory', 'PG', '105 min', '2016-07-25 09:40:00', '11.54', 'AMC1', '111 Peachtree St,30031, Atlanta, GA, , ', 'Adult: 1, Child: 2, Senior: 2', 46.16, 'a:4:{s:6:"number";s:16:"1234567891234567";s:4:"name";s:10:"Rayni Wang";s:3:"cvv";s:3:"123";s:10:"expiration";s:10:"2021-01-01";}', 2, 'Complete', 0),
('5795735421229', 'Ghostbusters', 'PG-13', '117 min', '2016-07-27 19:10:00', '11.54', 'Regal Cinemas Atlantic Station 18 ', '261 19th St NW #1250,30363, Atlanta, GA, , ', 'Adult: 5, Child: 0, Senior: 1', 66.932, 'a:4:{s:4:"name";s:4:"dfsf";s:6:"number";s:16:"1234567897654321";s:3:"cvv";s:3:"456";s:10:"expiration";s:7:"2019-01";}', 2, 'Unused', 0),
('5795737cc6485', 'Ice Age: Collision Course', 'PG', '100 min', '2016-07-26 18:20:00', '11.54', 'AMC3', '4486 Veterans Memorial Blvd, 70006, New Orlean, LA, , ', 'Adult: 1, Child: 0, Senior: 0', 11.54, 'a:4:{s:6:"number";s:16:"1234567891234567";s:4:"name";s:10:"Rayni Wang";s:3:"cvv";s:3:"123";s:10:"expiration";s:10:"2021-01-01";}', 2, 'Cancelled', 6.54),
('579573b3724e1', 'The Secret Life of Pets', 'PG', '90 min', '2016-07-25 13:40:00', '11.54', 'AMC1', '111 Peachtree St,30031, Atlanta, GA, , ', 'Adult: 0, Child: 0, Senior: 2', 18.464, 'a:4:{s:4:"name";s:5:"hjhjg";s:6:"number";s:16:"1234567891343543";s:3:"cvv";s:3:"343";s:10:"expiration";s:7:"2016-02";}', 2, 'Complete', 0),
('579573e373477', 'Zootopia', 'PG', '108 min', '2016-07-25 12:50:00', '11.54', 'AMC2', '112 Main St,14226, Buffalo, NY', 'Adult: 2, Child: 2, Senior: 2', 57.7, 'a:4:{s:4:"name";s:7:"ytian71";s:6:"number";s:16:"0000111122223333";s:3:"cvv";s:3:"359";s:10:"expiration";s:7:"2016-01";}', 3, 'Complete', 0),
('579574168192a', 'The Secret Life of Pets', 'PG', '90 min', '2016-07-27 13:40:00', '11.54', 'AMC1', '111 Peachtree St,30031, Atlanta, GA', 'Adult: 2, Child: 0, Senior: 0', 23.08, 'a:4:{s:4:"name";s:3:"ere";s:6:"number";s:16:"1212123242424242";s:3:"cvv";s:3:"232";s:10:"expiration";s:7:"2017-01";}', 4, 'Complete', 0),
('5795743edb4f8', 'Star Trek Beyond', 'PG-13', '122 min', '2016-07-25 16:30:00', '11.54', 'AMC2', '112 Main St,14226, Buffalo, NY', 'Adult: 6, Child: 2, Senior: 0', 85.396, 'a:4:{s:4:"name";s:6:"wewewe";s:6:"number";s:16:"2324325464646464";s:3:"cvv";s:3:"456";s:10:"expiration";s:7:"2019-12";}', 4, 'Cancelled', 80.396),
('5795744d3c5e8', 'Ghostbusters', 'PG-13', '117 min', '2016-07-28 23:00:00', '11.54', 'Regal Cinemas Hollywood 24 @ North I-85', '3265 NE Expy NE, Chamblee,30341, Atlanta, GA', 'Adult: 1, Child: 1, Senior: 0', 19.618, 'a:4:{s:4:"name";s:7:"ytian71";s:6:"number";s:16:"0000111122223333";s:3:"cvv";s:3:"319";s:10:"expiration";s:7:"2016-01";}', 3, 'Unused', 0),
('579574742e528', 'Zootopia', 'PG', '108 min', '2016-07-29 13:20:00', '11.54', 'Regal Cinemas Atlantic Station 18 ', '261 19th St NW #1250,30363, Atlanta, GA', 'Adult: 5, Child: 0, Senior: 3', 85.396, 'a:4:{s:4:"name";s:5:"fgfgf";s:6:"number";s:16:"3434355676784544";s:3:"cvv";s:3:"454";s:10:"expiration";s:7:"2016-07";}', 4, 'Unused', 0),
('579574a6b4b39', 'The Secret Life of Pets', 'PG', '90 min', '2016-07-28 15:30:00', '11.54', 'AMC3', '4486 Veterans Memorial Blvd, 70006, New Orlean, LA', 'Adult: 1, Child: 0, Senior: 0', 11.54, 'a:4:{s:6:"number";s:16:"2324325464646464";s:4:"name";s:6:"wewewe";s:3:"cvv";s:3:"456";s:10:"expiration";s:10:"2019-12-01";}', 4, 'Unused', 0),
('579575267ae53', 'The Legend of Tarzan', 'PG', '110 min ', '2016-07-26 13:20:00', '11.54', 'Regal Cinemas Atlantic Station 18 ', '261 19th St NW #1250,30363, Atlanta, GA', 'Adult: 2, Child: 0, Senior: 0', 23.08, 'a:4:{s:4:"name";s:3:"jjj";s:6:"number";s:16:"4556756756765555";s:3:"cvv";s:3:"555";s:10:"expiration";s:7:"2017-01";}', 5, 'Unused', 0),
('5795754f1f6d0', 'Ghostbusters', 'PG-13', '117 min', '2016-07-27 19:10:00', '11.54', 'Regal Cinemas Hollywood 24 @ North I-85', '3265 NE Expy NE, Chamblee,30341, Atlanta, GA', 'Adult: 4, Child: 2, Senior: 0', 62.316, 'a:4:{s:4:"name";s:6:"ffffff";s:6:"number";s:16:"5555555555555555";s:3:"cvv";s:3:"555";s:10:"expiration";s:7:"2018-02";}', 5, 'Unused', 0),
('57957574167d7', 'Zootopia', 'PG', '108 min', '2016-07-27 12:50:00', '11.54', 'AMC2', '112 Main St,14226, Buffalo, NY', 'Adult: 1, Child: 0, Senior: 1', 20.772, 'a:4:{s:4:"name";s:3:"rra";s:6:"number";s:16:"6666666666666666";s:3:"cvv";s:3:"666";s:10:"expiration";s:7:"2017-01";}', 5, 'Cancelled', 15.772),
('579575a10a2dc', 'Lights Out', 'PG-13', '81 min', '2016-07-27 16:20:00', '11.54', 'Regal Cinemas Hollywood 24 @ North I-85', '3265 NE Expy NE, Chamblee,30341, Atlanta, GA, , ', 'Adult: 1, Child: 0, Senior: 0', 11.54, 'a:4:{s:6:"number";s:16:"4556756756765555";s:4:"name";s:3:"jjj";s:3:"cvv";s:3:"555";s:10:"expiration";s:10:"2017-01-01";}', 5, 'Unused', 0),
('579575fe3575e', 'Ghostbusters', 'PG-13', '117 min', '2016-07-26 23:20:00', '11.54', 'AMC1', '111 Peachtree St,30031, Atlanta, GA', 'Adult: 1, Child: 0, Senior: 0', 11.54, 'a:4:{s:4:"name";s:3:"uuu";s:6:"number";s:16:"4444444444444444";s:3:"cvv";s:3:"899";s:10:"expiration";s:7:"2018-01";}', 6, 'Unused', 0),
('5795762dd6233', 'The Legend of Tarzan', 'PG', '110 min ', '2016-07-27 16:30:00', '11.54', 'AMC2', '112 Main St,14226, Buffalo, NY', 'Adult: 1, Child: 0, Senior: 0', 11.54, 'a:4:{s:4:"name";s:7:"ytian71";s:6:"number";s:16:"1111999922228888";s:3:"cvv";s:3:"123";s:10:"expiration";s:7:"2017-01";}', 3, 'Unused', 0),
('57957651975b3', 'Lights Out', 'PG-13', '81 min', '2016-07-25 12:50:00', '11.54', 'Regal Cinemas Hollywood 24 @ North I-85', '3265 NE Expy NE, Chamblee,30341, Atlanta, GA', 'Adult: 3, Child: 3, Senior: 0', 58.854, 'a:4:{s:4:"name";s:3:"ppp";s:6:"number";s:16:"6666666666666666";s:3:"cvv";s:3:"745";s:10:"expiration";s:7:"2018-05";}', 6, 'Cancelled', 53.854),
('579576771837f', 'Finding Dory', 'PG', '105 min', '2016-07-25 09:40:00', '11.54', 'AMC1', '111 Peachtree St,30031, Atlanta, GA, , ', 'Adult: 2, Child: 0, Senior: 0', 23.08, 'a:4:{s:6:"number";s:16:"4444444444444444";s:4:"name";s:3:"uuu";s:3:"cvv";s:3:"899";s:10:"expiration";s:10:"2018-01-01";}', 6, 'Complete', 0),
('579576a832071', 'The Legend of Tarzan', 'PG', '110 min ', '2016-07-27 11:40:00', '11.54', 'Regal Cinemas Atlantic Station 18 ', '261 19th St NW #1250,30363, Atlanta, GA', 'Adult: 12, Child: 10, Senior: 5', 265.42, 'a:4:{s:4:"name";s:7:"ytian71";s:6:"number";s:16:"9999888877776666";s:3:"cvv";s:3:"214";s:10:"expiration";s:7:"2020-09";}', 3, 'Unused', 0),
('579576dec37c1', 'Star Trek Beyond', 'PG-13', '122 min', '2016-07-29 20:20:00', '11.54', 'AMC2', '112 Main St,14226, Buffalo, NY', 'Adult: 1, Child: 0, Senior: 0', 11.54, 'a:4:{s:4:"name";s:7:"ytian71";s:6:"number";s:16:"6666888844442222";s:3:"cvv";s:3:"457";s:10:"expiration";s:7:"2018-01";}', 3, 'Unused', 0),
('5795776a6f304', 'Finding Dory', 'PG', '105 min', '2016-07-26 13:30:00', '11.54', 'AMC4', '1910 Wells Rd,32073, Orange Park, FL', 'Adult: 0, Child: 2, Senior: 2', 34.62, 'a:4:{s:6:"number";s:16:"1111999922228888";s:4:"name";s:7:"ytian71";s:3:"cvv";s:3:"123";s:10:"expiration";s:10:"2017-01-01";}', 3, 'Unused', 0),
('579579327920e', 'The Secret Life of Pets', 'PG', '90 min', '2016-07-22 12:50:00', '11.54', 'AMC3', '4486 Veterans Memorial Blvd, 70006, New Orlean, LA', 'Adult: 1, Child: 1, Senior: 1', 28.85, 'a:4:{s:4:"name";s:7:"ytian71";s:6:"number";s:16:"6666888866668888";s:3:"cvv";s:3:"679";s:10:"expiration";s:7:"2018-01";}', 3, 'Complete', 0),
('57957a4048225', 'Zootopia', 'PG', '108 min', '2016-07-27 11:40:00', '11.54', 'AMC4', '1910 Wells Rd,32073, Orange Park, FL', 'Adult: 3, Child: 6, Senior: 0', 83.088, 'a:4:{s:6:"number";s:16:"0000111122223333";s:4:"name";s:7:"ytian71";s:3:"cvv";s:3:"319";s:10:"expiration";s:10:"2016-01-01";}', 3, 'Unused', 0),
('57957b8a7aa27', 'Ice Age: Collision Course', 'PG', '100 min', '2016-07-30 18:20:00', '11.54', 'AMC3', '4486 Veterans Memorial Blvd, 70006, New Orlean, LA', 'Adult: 2, Child: 2, Senior: 1', 48.468, 'a:4:{s:4:"name";s:7:"ytian72";s:6:"number";s:16:"5555666677778888";s:3:"cvv";s:3:"325";s:10:"expiration";s:7:"2017-01";}', 10, 'Unused', 0),
('57957b8a8ba0b', 'Star Trek Beyond', 'PG-13', '122 min', '2016-07-12 13:20:00', '11.54', 'Regal Cinemas Atlantic Station 18 ', '261 19th St NW #1250,30363, Atlanta, GA', 'Adult: 1, Child: 0, Senior: 0', 11.54, 'a:4:{s:4:"name";s:3:"ytu";s:6:"number";s:16:"2546877777777777";s:3:"cvv";s:3:"156";s:10:"expiration";s:7:"2019-01";}', 9, 'Complete', 0),
('57957be004e03', 'Ice Age: Collision Course', 'PG', '100 min', '2016-07-26 15:20:00', '11.54', 'Regal Cinemas Hollywood 24 @ North I-85', '3265 NE Expy NE, Chamblee,30341, Atlanta, GA', 'Adult: 3, Child: 1, Senior: 1', 51.93, 'a:4:{s:4:"name";s:7:"ytian72";s:6:"number";s:16:"6666777788880000";s:3:"cvv";s:3:"756";s:10:"expiration";s:7:"2018-01";}', 10, 'Cancelled', 46.93),
('57957c26ea422', 'Finding Dory', 'PG', '105 min', '2016-07-26 09:40:00', '11.54', 'AMC1', '111 Peachtree St,30031, Atlanta, GA', 'Adult: 3, Child: 0, Senior: 2', 53.084, 'a:4:{s:4:"name";s:3:"ere";s:6:"number";s:16:"8888888888888888";s:3:"cvv";s:3:"888";s:10:"expiration";s:7:"2018-01";}', 9, 'Cancelled', 48.084),
('57957c4327b97', 'Star Trek Beyond', 'PG-13', '122 min', '2016-07-28 16:30:00', '11.54', 'AMC2', '112 Main St,14226, Buffalo, NY', 'Adult: 2, Child: 2, Senior: 2', 57.7, 'a:4:{s:4:"name";s:7:"ytian72";s:6:"number";s:16:"1111222233334444";s:3:"cvv";s:3:"436";s:10:"expiration";s:7:"2018-01";}', 10, 'Unused', 0),
('57957c5d29562', 'Finding Dory', 'PG', '105 min', '2016-07-19 11:40:00', '11.54', 'AMC4', '1910 Wells Rd,32073, Orange Park, FL', 'Adult: 3, Child: 0, Senior: 0', 34.62, 'a:4:{s:4:"name";s:7:"wang yu";s:6:"number";s:16:"7772222222222222";s:3:"cvv";s:3:"456";s:10:"expiration";s:7:"2020-12";}', 9, 'Complete', 0),
('57957c93ca5b1', 'Finding Dory', 'PG', '105 min', '2016-07-28 13:20:00', '11.54', 'Regal Cinemas Hollywood 24 @ North I-85', '3265 NE Expy NE, Chamblee,30341, Atlanta, GA, , ', 'Adult: 5, Child: 3, Senior: 0', 81.934, 'a:4:{s:4:"name";s:7:"ytian72";s:6:"number";s:16:"0000111199992222";s:3:"cvv";s:3:"325";s:10:"expiration";s:7:"2018-01";}', 10, 'Unused', 0),
('57957cb57ddfe', 'Ghostbusters', 'PG-13', '117 min', '2016-07-13 13:30:00', '11.54', 'AMC4', '1910 Wells Rd,32073, Orange Park, FL, , ', 'Adult: 2, Child: 0, Senior: 0', 23.08, 'a:4:{s:6:"number";s:16:"2546877777777777";s:4:"name";s:3:"ytu";s:3:"cvv";s:3:"156";s:10:"expiration";s:10:"2019-01-01";}', 9, 'Complete', 0),
('57957cc392d68', 'Ghostbusters', 'PG-13', '117 min', '2016-07-28 14:40:00', '11.54', 'Regal Cinemas Hollywood 24 @ North I-85', '3265 NE Expy NE, Chamblee,30341, Atlanta, GA', 'Adult: 4, Child: 0, Senior: 0', 46.16, 'a:4:{s:6:"number";s:16:"0000111199992222";s:4:"name";s:7:"ytian72";s:3:"cvv";s:3:"325";s:10:"expiration";s:10:"2018-01-01";}', 10, 'Unused', 0),
('57957d23f3d51', 'Lights Out', 'PG-13', '81 min', '2016-07-27 14:40:00', '11.54', 'AMC1', '111 Peachtree St,30031, Atlanta, GA', 'Adult: 2, Child: 2, Senior: 2', 57.7, 'a:4:{s:6:"number";s:16:"0000111199992222";s:4:"name";s:7:"ytian72";s:3:"cvv";s:3:"325";s:10:"expiration";s:10:"2018-01-01";}', 10, 'Unused', 0),
('57957ed5cfbd2', 'Finding Dory', 'PG', '105 min', '2016-07-24 19:00:00', '11.54', 'AMC1', '111 Peachtree St,30031, Atlanta, GA, , ', 'Adult: 1, Child: 0, Senior: 0', 11.54, 'N;', 11, 'Cancelled', 6.54),
('579580ec11953', 'The Legend of Tarzan', 'PG', '110 min ', '2016-07-25 19:00:00', '11.54', 'AMC1', '111 Peachtree St,30031, Atlanta, GA', 'Adult: 1, Child: 1, Senior: 0', 19.618, 'a:4:{s:6:"number";s:16:"1111222233334444";s:4:"name";s:7:"ytian72";s:3:"cvv";s:3:"436";s:10:"expiration";s:10:"2018-01-01";}', 10, 'Cancelled', 14.618),
('579581ad5124c', 'Ghostbusters', 'PG-13', '117 min', '2016-07-22 15:30:00', '11.54', 'AMC1', '111 Peachtree St,30031, Atlanta, GA, , ', 'Adult: 1, Child: 1, Senior: 0', 19.618, 'a:4:{s:4:"name";s:10:"Yoyo Zhang";s:6:"number";s:16:"1111222233334444";s:3:"cvv";s:3:"123";s:10:"expiration";s:7:"2017-05";}', 11, 'Complete', 0),
('57958235345e1', 'Ice Age: Collision Course', 'PG', '100 min', '2016-07-23 13:00:00', '11.54', 'AMC1', '111 Peachtree St,30031, Atlanta, GA', 'Adult: 1, Child: 0, Senior: 0', 11.54, 'a:4:{s:6:"number";s:16:"1111222233334444";s:4:"name";s:10:"Yoyo Zhang";s:3:"cvv";s:3:"123";s:10:"expiration";s:10:"2017-05-01";}', 11, 'Complete', 0),
('5795831d9ec5f', 'Zootopia', 'PG', '108 min', '2016-07-12 10:40:00', '11.54', 'AMC2', '112 Main St,14226, Buffalo, NY', 'Adult: 3, Child: 0, Senior: 0', 34.62, 'a:4:{s:4:"name";s:10:"Yoyo Chang";s:6:"number";s:16:"1112222233344434";s:3:"cvv";s:3:"889";s:10:"expiration";s:7:"2016-08";}', 13, 'Complete', 0),
('579583acd32b7', 'Zootopia', 'PG', '108 min', '2016-07-25 12:50:00', '11.54', 'AMC2', '112 Main St,14226, Buffalo, NY, , ', 'Adult: 1, Child: 0, Senior: 0', 11.54, 'a:4:{s:4:"name";s:10:"Yoyo Chang";s:6:"number";s:16:"1234111122223333";s:3:"cvv";s:3:"333";s:10:"expiration";s:7:"2017-03";}', 13, 'Cancelled', 6.54),
('5795841796973', 'Lights Out', 'PG-13', '81 min', '2016-07-26 16:20:00', '11.54', 'Regal Cinemas Hollywood 24 @ North I-85', '3265 NE Expy NE, Chamblee,30341, Atlanta, GA', 'Adult: 5, Child: 0, Senior: 0', 57.7, 'a:4:{s:6:"number";s:16:"0000111199992222";s:4:"name";s:7:"ytian72";s:3:"cvv";s:3:"325";s:10:"expiration";s:10:"2018-01-01";}', 10, 'Unused', 0),
('579584b854439', 'Star Trek Beyond', 'PG-13', '122 min', '2016-07-28 15:30:00', '11.54', 'AMC3', '4486 Veterans Memorial Blvd, 70006, New Orlean, LA', 'Adult: 1, Child: 1, Senior: 1', 28.85, 'a:4:{s:6:"number";s:16:"6666777788880000";s:4:"name";s:7:"ytian72";s:3:"cvv";s:3:"756";s:10:"expiration";s:10:"2018-01-01";}', 10, 'Unused', 0),
('579584cdc472c', 'The Legend of Tarzan', 'PG', '110 min ', '2016-07-29 16:30:00', '11.54', 'AMC2', '112 Main St,14226, Buffalo, NY, , ', 'Adult: 2, Child: 2, Senior: 0', 39.236, 'a:4:{s:6:"number";s:16:"5555666677778888";s:4:"name";s:7:"ytian72";s:3:"cvv";s:3:"325";s:10:"expiration";s:10:"2017-01-01";}', 10, 'Unused', 0),
('579584f73bea9', 'The Secret Life of Pets', 'PG', '90 min', '2016-07-28 15:30:00', '11.54', 'AMC3', '4486 Veterans Memorial Blvd, 70006, New Orlean, LA, , ', 'Adult: 5, Child: 0, Senior: 0', 57.7, 'a:4:{s:4:"name";s:7:"ytian72";s:6:"number";s:16:"1242141241241241";s:3:"cvv";s:3:"234";s:10:"expiration";s:7:"2018-02";}', 10, 'Unused', 0),
('579585186a6af', 'Zootopia', 'PG', '108 min', '2016-07-28 13:20:00', '11.54', 'Regal Cinemas Atlantic Station 18 ', '261 19th St NW #1250,30363, Atlanta, GA', 'Adult: 10, Child: 0, Senior: 0', 115.4, 'a:4:{s:4:"name";s:7:"ytian72";s:6:"number";s:16:"3346458768945769";s:3:"cvv";s:3:"235";s:10:"expiration";s:7:"2021-02";}', 10, 'Unused', 0),
('579585700a666', 'The Secret Life of Pets', 'PG', '90 min', '2016-07-28 20:40:00', '11.54', 'AMC1', '111 Peachtree St,30031, Atlanta, GA, , ', 'Adult: 3, Child: 0, Senior: 0', 34.62, 'a:4:{s:6:"number";s:16:"3346458768945769";s:4:"name";s:7:"ytian72";s:3:"cvv";s:3:"235";s:10:"expiration";s:10:"2021-02-01";}', 10, 'Cancelled', 29.62),
('5795859db7895', 'Zootopia', 'PG', '108 min', '2016-07-26 12:50:00', '11.54', 'AMC2', '112 Main St,14226, Buffalo, NY, , ', 'Adult: 2, Child: 1, Senior: 1', 40.39, 'a:4:{s:6:"number";s:16:"1112222233344434";s:4:"name";s:10:"Yoyo Chang";s:3:"cvv";s:3:"889";s:10:"expiration";s:10:"2016-08-01";}', 13, 'Unused', 0),
('579585a193b27', 'Lights Out', 'PG-13', '81 min', '2016-05-13 19:50:00', '11.54', 'Regal Cinemas Hollywood 24 @ North I-85', '3265 NE Expy NE, Chamblee,30341, Atlanta, GA', 'Adult: 3, Child: 0, Senior: 0', 34.62, 'a:4:{s:4:"name";s:7:"ytian73";s:6:"number";s:16:"3458349534987591";s:3:"cvv";s:3:"475";s:10:"expiration";s:7:"2019-03";}', 14, 'Complete', 0),
('579585aas193b27', 'Lights Out', 'PG-13', '81 min', '2016-05-13 19:50:00', '11.54', 'Regal Cinemas Hollywood 24 @ North I-85', '3265 NE Expy NE, Chamblee,30341, Atlanta, GA', 'Adult: 3, Child: 0, Senior: 0', 34.62, 'a:4:{s:4:"name";s:7:"ytian73";s:6:"number";s:16:"3458349534987591";s:3:"cvv";s:3:"475";s:10:"expiration";s:7:"2019-03";}', 1, 'Cancelled', 0),
('5795868a46055', 'Ice Age: Collision Course', 'PG', '100 min', '2016-07-27 15:30:00', '11.54', 'AMC3', '4486 Veterans Memorial Blvd, 70006, New Orlean, LA', 'Adult: 3, Child: 0, Senior: 0', 34.62, 'a:4:{s:4:"name";s:7:"ytian74";s:6:"number";s:16:"3453418318924191";s:3:"cvv";s:3:"234";s:10:"expiration";s:7:"2018-01";}', 15, 'Unused', 0),
('579586b269885', 'Finding Dory', 'PG', '105 min', '2016-07-27 19:10:00', '11.54', 'Regal Cinemas Hollywood 24 @ North I-85', '3265 NE Expy NE, Chamblee,30341, Atlanta, GA', 'Adult: 0, Child: 4, Senior: 0', 32.312, 'a:4:{s:4:"name";s:7:"ytian74";s:6:"number";s:16:"1284719274912875";s:3:"cvv";s:3:"436";s:10:"expiration";s:7:"2018-01";}', 15, 'Cancelled', 27.312),
('5795870352b3f', 'The Secret Life of Pets', 'PG', '90 min', '2016-06-28 17:40:00', '11.54', 'AMC2', '112 Main St,14226, Buffalo, NY', 'Adult: 0, Child: 0, Senior: 6', 55.392, 'a:4:{s:6:"number";s:16:"1284719274912875";s:4:"name";s:7:"ytian74";s:3:"cvv";s:3:"436";s:10:"expiration";s:10:"2018-01-01";}', 15, 'Complete', 0),
('579588c23ba1b', 'The Secret Life of Pets', 'PG', '90 min', '2016-07-26 13:20:00', '11.54', 'Regal Cinemas Atlantic Station 18 ', '261 19th St NW #1250,30363, Atlanta, GA', 'Adult: 2, Child: 1, Senior: 0', 31.158, 'a:4:{s:6:"number";s:16:"1111222233334444";s:4:"name";s:10:"Yoyo Zhang";s:3:"cvv";s:3:"123";s:10:"expiration";s:10:"2017-05-01";}', 11, 'Unused', 0),
('57958b9ac3d68', 'Lights Out', 'PG-13', '81 min', '2016-07-26 14:40:00', '11.54', 'AMC1', '111 Peachtree St,30031, Atlanta, GA, , ', 'Adult: 3, Child: 0, Senior: 0', 34.62, 'a:4:{s:6:"number";s:16:"1111222233334444";s:4:"name";s:10:"Yoyo Zhang";s:3:"cvv";s:3:"123";s:10:"expiration";s:10:"2017-05-01";}', 11, 'Unused', 0),
('57958bced1d92', 'Star Trek Beyond', 'PG-13', '122 min', '2016-07-27 19:00:00', '11.54', 'AMC1', '111 Peachtree St,30031, Atlanta, GA, , ', 'Adult: 0, Child: 1, Senior: 2', 26.542, 'a:4:{s:6:"number";s:16:"1111222233334444";s:4:"name";s:10:"Yoyo Zhang";s:3:"cvv";s:3:"123";s:10:"expiration";s:10:"2017-05-01";}', 11, 'Unused', 0),
('57958befb36f5', 'The Legend of Tarzan', 'PG', '110 min ', '2016-07-27 11:40:00', '11.54', 'Regal Cinemas Atlantic Station 18 ', '261 19th St NW #1250,30363, Atlanta, GA, , ', 'Adult: 2, Child: 0, Senior: 0', 23.08, 'a:4:{s:6:"number";s:16:"1111222233334444";s:4:"name";s:10:"Yoyo Zhang";s:3:"cvv";s:3:"123";s:10:"expiration";s:10:"2017-05-01";}', 11, 'Unused', 0),
('57958c0aa6e72', 'Zootopia', 'PG', '108 min', '2016-07-25 16:30:00', '11.54', 'AMC1', '111 Peachtree St,30031, Atlanta, GA, , ', 'Adult: 2, Child: 0, Senior: 0', 23.08, 'a:4:{s:6:"number";s:16:"1111222233334444";s:4:"name";s:10:"Yoyo Zhang";s:3:"cvv";s:3:"123";s:10:"expiration";s:10:"2017-05-01";}', 11, 'Unused', 0),
('57958c7ee3aa4', 'Ghostbusters', 'PG-13', '117 min', '2016-07-25 13:30:00', '11.54', 'AMC4', '1910 Wells Rd,32073, Orange Park, FL', 'Adult: 2, Child: 0, Senior: 0', 23.08, 'a:4:{s:4:"name";s:6:"yoyo z";s:6:"number";s:16:"2222444433335555";s:3:"cvv";s:3:"221";s:10:"expiration";s:7:"2016-10";}', 18, 'Complete', 0),
('57958d1328f00', 'Zootopia', 'PG', '108 min', '2016-07-25 10:40:00', '11.54', 'AMC2', '112 Main St,14226, Buffalo, NY', 'Adult: 2, Child: 3, Senior: 0', 47.314, 'a:4:{s:4:"name";s:8:"JJ Zhang";s:6:"number";s:16:"2342353452356223";s:3:"cvv";s:3:"234";s:10:"expiration";s:7:"2017-01";}', 19, 'Complete', 0),
('57958d2d995a3', 'Star Trek Beyond', 'PG-13', '122 min', '2016-07-25 11:20:00', '11.54', 'AMC2', '112 Main St,14226, Buffalo, NY, , ', 'Adult: 1, Child: 0, Senior: 0', 11.54, 'a:4:{s:6:"number";s:16:"2342353452356223";s:4:"name";s:8:"JJ Zhang";s:3:"cvv";s:3:"234";s:10:"expiration";s:10:"2017-01-01";}', 19, 'Complete', 0),
('57958d8cc6791', 'Star Trek Beyond', 'PG-13', '122 min', '2016-07-28 13:20:00', '11.54', 'Regal Cinemas Atlantic Station 18 ', '261 19th St NW #1250,30363, Atlanta, GA', 'Adult: 2, Child: 0, Senior: 0', 23.08, 'a:4:{s:6:"number";s:16:"2342353452356223";s:4:"name";s:8:"JJ Zhang";s:3:"cvv";s:3:"234";s:10:"expiration";s:10:"2017-01-01";}', 19, 'Unused', 0),
('5795973aeb4a3', 'Zootopia', 'PG', '108 min', '2016-05-04 21:10:00', '11.54', 'Regal Cinemas Hollywood 24 @ North I-85', '3265 NE Expy NE, Chamblee,30341, Atlanta, GA', 'Adult: 2, Child: 0, Senior: 0', 23.08, 'a:4:{s:4:"name";s:7:"ytian70";s:6:"number";s:16:"1298741265192412";s:3:"cvv";s:3:"325";s:10:"expiration";s:7:"2018-02";}', 1, 'Complete', 0),
('57959797d6675', 'Zootopia', 'PG', '108 min', '2016-07-25 20:40:00', '11.54', 'AMC1', '111 Peachtree St,30031, Atlanta, GA, , ', 'Adult: 4, Child: 2, Senior: 2', 80.78, 'a:4:{s:4:"name";s:7:"ytian70";s:6:"number";s:16:"5127846218648216";s:3:"cvv";s:3:"756";s:10:"expiration";s:7:"2018-01";}', 1, 'Cancelled', 75.78),
('579597ba776ed', 'The Secret Life of Pets', 'PG', '90 min', '2016-07-06 13:30:00', '11.54', 'AMC2', '112 Main St,14226, Buffalo, NY', 'Adult: 4, Child: 0, Senior: 0', 46.16, 'a:4:{s:4:"name";s:7:"ytian70";s:6:"number";s:16:"3568172361278361";s:3:"cvv";s:3:"214";s:10:"expiration";s:7:"2018-02";}', 1, 'Complete', 0),
('579597dd51fc6', 'The Secret Life of Pets', 'PG', '90 min', '2016-07-26 10:40:00', '11.54', 'AMC3', '4486 Veterans Memorial Blvd, 70006, New Orlean, LA', 'Adult: 0, Child: 3, Senior: 0', 24.234, 'a:4:{s:4:"name";s:7:"ytian70";s:6:"number";s:16:"3253821638712378";s:3:"cvv";s:3:"324";s:10:"expiration";s:7:"2018-04";}', 1, 'Unused', 0),
('5795981dc66c1', 'The Legend of Tarzan', 'PG', '110 min ', '2016-06-01 11:20:00', '11.54', 'AMC2', '112 Main St,14226, Buffalo, NY, , ', 'Adult: 2, Child: 1, Senior: 0', 31.158, 'a:4:{s:4:"name";s:7:"ytian70";s:6:"number";s:16:"4658124372189312";s:3:"cvv";s:3:"353";s:10:"expiration";s:7:"2018-02";}', 1, 'Complete', 0),
('579598491eaa4', 'The Legend of Tarzan', 'PG', '110 min ', '2016-07-27 16:40:00', '11.54', 'Regal Cinemas Atlantic Station 18 ', '261 19th St NW #1250,30363, Atlanta, GA', 'Adult: 2, Child: 0, Senior: 0', 23.08, 'a:4:{s:6:"number";s:16:"4658124372189312";s:4:"name";s:7:"ytian70";s:3:"cvv";s:3:"353";s:10:"expiration";s:10:"2018-02-01";}', 1, 'Unused', 0),
('5795986749bf4', 'Star Trek Beyond', 'PG-13', '122 min', '2016-07-07 13:20:00', '11.54', 'Regal Cinemas Atlantic Station 18 ', '261 19th St NW #1250,30363, Atlanta, GA', 'Adult: 3, Child: 2, Senior: 3', 78.472, 'a:4:{s:6:"number";s:16:"4658124372189312";s:4:"name";s:7:"ytian70";s:3:"cvv";s:3:"353";s:10:"expiration";s:10:"2018-02-01";}', 1, 'Complete', 0),
('579598931fb21', 'Star Trek Beyond', 'PG-13', '122 min', '2016-07-27 15:30:00', '11.54', 'AMC3', '4486 Veterans Memorial Blvd, 70006, New Orlean, LA', 'Adult: 4, Child: 5, Senior: 0', 86.55, 'a:4:{s:6:"number";s:16:"1298741265192412";s:4:"name";s:7:"ytian70";s:3:"cvv";s:3:"325";s:10:"expiration";s:10:"2018-02-01";}', 1, 'Unused', 0),
('579598ad7573a', 'Lights Out', 'PG-13', '81 min', '2016-07-03 12:50:00', '11.54', 'Regal Cinemas Hollywood 24 @ North I-85', '3265 NE Expy NE, Chamblee,30341, Atlanta, GA', 'Adult: 3, Child: 0, Senior: 0', 34.62, 'a:4:{s:6:"number";s:16:"1298741265192412";s:4:"name";s:7:"ytian70";s:3:"cvv";s:3:"325";s:10:"expiration";s:10:"2018-02-01";}', 1, 'Complete', 0),
('579598c71b978', 'Lights Out', 'PG-13', '81 min', '2016-07-30 16:30:00', '11.54', 'AMC1', '111 Peachtree St,30031, Atlanta, GA, , ', 'Adult: 1, Child: 1, Senior: 0', 19.618, 'a:4:{s:6:"number";s:16:"3253821638712378";s:4:"name";s:7:"ytian70";s:3:"cvv";s:3:"324";s:10:"expiration";s:10:"2018-04-01";}', 1, 'Unused', 0),
('579598dd09dc4', 'Ice Age: Collision Course', 'PG', '100 min', '2016-06-30 15:20:00', '11.54', 'Regal Cinemas Hollywood 24 @ North I-85', '3265 NE Expy NE, Chamblee,30341, Atlanta, GA', 'Adult: 0, Child: 3, Senior: 2', 42.698, 'a:4:{s:6:"number";s:16:"3568172361278361";s:4:"name";s:7:"ytian70";s:3:"cvv";s:3:"214";s:10:"expiration";s:10:"2018-02-01";}', 1, 'Complete', 0),
('579599180ffd7', 'Ice Age: Collision Course', 'PG', '100 min', '2016-07-29 20:40:00', '11.54', 'AMC3', '4486 Veterans Memorial Blvd, 70006, New Orlean, LA, , ', 'Adult: 2, Child: 2, Senior: 2', 57.7, 'a:4:{s:6:"number";s:16:"5127846218648216";s:4:"name";s:7:"ytian70";s:3:"cvv";s:3:"756";s:10:"expiration";s:10:"2018-01-01";}', 1, 'Unused', 0),
('5795994fa04ac', 'Ghostbusters', 'PG-13', '117 min', '2016-07-01 21:50:00', '11.54', 'AMC4', '1910 Wells Rd,32073, Orange Park, FL', 'Adult: 2, Child: 1, Senior: 1', 40.39, 'a:4:{s:6:"number";s:16:"4658124372189312";s:4:"name";s:7:"ytian70";s:3:"cvv";s:3:"353";s:10:"expiration";s:10:"2018-02-01";}', 1, 'Complete', 0),
('5795996a047ad', 'Ghostbusters', 'PG-13', '117 min', '2016-07-31 19:40:00', '11.54', 'AMC4', '1910 Wells Rd,32073, Orange Park, FL, , ', 'Adult: 0, Child: 0, Senior: 4', 36.928, 'a:4:{s:6:"number";s:16:"5127846218648216";s:4:"name";s:7:"ytian70";s:3:"cvv";s:3:"756";s:10:"expiration";s:10:"2018-01-01";}', 1, 'Unused', 0),
('57959988559a3', 'Finding Dory', 'PG', '105 min', '2016-06-28 13:20:00', '11.54', 'Regal Cinemas Atlantic Station 18 ', '261 19th St NW #1250,30363, Atlanta, GA, , ', 'Adult: 2, Child: 0, Senior: 0', 23.08, 'a:4:{s:6:"number";s:16:"3568172361278361";s:4:"name";s:7:"ytian70";s:3:"cvv";s:3:"214";s:10:"expiration";s:10:"2018-02-01";}', 1, 'Complete', 0),
('579599abbf58e', 'Finding Dory', 'PG', '105 min', '2016-07-27 13:40:00', '11.54', 'AMC1', '111 Peachtree St,30031, Atlanta, GA, , ', 'Adult: 1, Child: 0, Senior: 0', 11.54, 'a:4:{s:6:"number";s:16:"3568172361278361";s:4:"name";s:7:"ytian70";s:3:"cvv";s:3:"214";s:10:"expiration";s:10:"2018-02-01";}', 1, 'Unused', 0),
('579633r759ddfgg1', 'Deadpool', 'R', '108 min ', '2016-06-17 13:40:00', '11.54', 'AMC1', '111 Peachtree St,30031, Atlanta, GA', 'Adult: 1, Child: 0, Senior: 0', 11.54, 'a:4:{s:4:"name";s:3:"hhh";s:6:"number";s:16:"6666666666666666";s:3:"cvv";s:3:"666";s:10:"expiration";s:7:"2016-08";}', 19, 'Complete', 0),
('57963a1233099', 'Zootopia', 'PG', '108 min', '2016-07-27 13:20:00', '11.54', 'Regal Cinemas Atlantic Station 18 ', '261 19th St NW #1250,30363, Atlanta, GA', 'Adult: 1, Child: 0, Senior: 0', 11.54, 'a:4:{s:4:"name";s:13:"Cindy (Yixin)";s:6:"number";s:16:"1234567890123456";s:3:"cvv";s:3:"123";s:10:"expiration";s:7:"2016-08";}', 12, 'Unused', 0),
('57963b759ddf5rb', 'Captain America: Civil War', 'PG-13', '147 min ', '2016-06-15 13:40:00', '11.54', 'AMC1', '111 Peachtree St,30031, Atlanta, GA', 'Adult: 2, Child: 0, Senior: 0', 23.08, 'a:4:{s:4:"name";s:3:"hhh";s:6:"number";s:16:"6666666666666666";s:3:"cvv";s:3:"666";s:10:"expiration";s:7:"2016-08";}', 19, 'Complete', 0),
('57963b759ddf7', 'The Legend of Tarzan', 'PG', '110 min ', '2016-07-29 13:40:00', '11.54', 'AMC1', '111 Peachtree St,30031, Atlanta, GA', 'Adult: 2, Child: 0, Senior: 0', 23.08, 'a:4:{s:4:"name";s:3:"hhh";s:6:"number";s:16:"6666666666666666";s:3:"cvv";s:3:"666";s:10:"expiration";s:7:"2016-08";}', 24, 'Unused', 0),
('57963b759ddfg1', 'Captain America: Civil War', 'PG-13', '147 min ', '2016-06-15 13:40:00', '11.54', 'AMC1', '111 Peachtree St,30031, Atlanta, GA', 'Adult: 2, Child: 0, Senior: 0', 23.08, 'a:4:{s:4:"name";s:3:"hhh";s:6:"number";s:16:"6666666666666666";s:3:"cvv";s:3:"666";s:10:"expiration";s:7:"2016-08";}', 25, 'Complete', 0),
('57963b75vb9caddfg1', 'The Martian', 'PG-13', '144 min ', '2016-06-26 21:40:00', '11.54', 'AMC1', '111 Peachtree St,30031, Atlanta, GA', 'Adult: 1, Child: 0, Senior: 0', 115.4, 'a:4:{s:4:"name";s:3:"hhh";s:6:"number";s:16:"6666666666666666";s:3:"cvv";s:3:"666";s:10:"expiration";s:7:"2016-08";}', 19, 'Complete', 0),
('57963b75vb9ddfg1', 'The Martian', 'PG-13', '144 min ', '2016-07-09 19:40:00', '11.54', 'AMC1', '111 Peachtree St,30031, Atlanta, GA', 'Adult: 2, Child: 0, Senior: 0', 23.08, 'a:4:{s:4:"name";s:3:"hhh";s:6:"number";s:16:"6666666666666666";s:3:"cvv";s:3:"666";s:10:"expiration";s:7:"2016-08";}', 25, 'Complete', 0),
('5796618cab0df', 'Ghostbusters', 'PG-13', '117 min', '2016-07-26 19:10:00', '11.54', 'Regal Cinemas Hollywood 24 @ North I-85', '3265 NE Expy NE, Chamblee,30341, Atlanta, GA', 'Adult: 1, Child: 2, Senior: 1', 36.928, 'a:4:{s:6:"number";s:16:"1298741265192412";s:4:"name";s:7:"ytian70";s:3:"cvv";s:3:"325";s:10:"expiration";s:10:"2018-02-01";}', 1, 'Cancelled', 31.928),
('5796620a32f5d', 'The Secret Life of Pets', 'PG', '90 min', '2016-07-27 16:30:00', '11.54', 'AMC1', '111 Peachtree St,30031, Atlanta, GA', 'Adult: 5, Child: 0, Senior: 0', 57.7, 'a:4:{s:4:"name";s:7:"ytian70";s:6:"number";s:16:"1298741265192412";s:3:"cvv";s:3:"543";s:10:"expiration";s:7:"2019-03";}', 1, 'Unused', 0),
('57966260b1b14', 'The Legend of Tarzan', 'PG', '110 min ', '2016-07-27 16:30:00', '11.54', 'AMC1', '111 Peachtree St,30031, Atlanta, GA, , ', 'Adult: 1, Child: 0, Senior: 0', 11.54, 'a:4:{s:4:"name";s:7:"ytain70";s:6:"number";s:16:"1298741265192412";s:3:"cvv";s:3:"444";s:10:"expiration";s:7:"2018-03";}', 1, 'Cancelled', 6.54);

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE IF NOT EXISTS `review` (
  `id` int(32) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(50) NOT NULL,
  `movie_name` varchar(50) NOT NULL,
  `title` varchar(32) NOT NULL,
  `rating` int(5) NOT NULL,
  `comment` varchar(128) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_name` (`user_name`),
  KEY `movie_name` (`movie_name`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=34 ;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`id`, `user_name`, `movie_name`, `title`, `rating`, `comment`) VALUES
(2, 'rooni6', 'Star Trek Beyond', 'nice', 4, 'good movie'),
(3, 'rooni6', 'Finding Dory', 'Love the movie', 5, 'I love the movie! Really cute!'),
(4, 'rooni6', 'Ghostbusters', 'Funny movie', 5, 'The movie is really funny! Good for friends to watch it together!'),
(5, 'yoyo', 'Finding Dory', 'So cute!', 5, 'Love it! I cried...'),
(6, 'yoyo', 'Ghostbusters', 'Good laugh', 4, 'I love Chris Hemsworth!!!'),
(7, 'ytian73', 'Lights Out', 'Lights Out', 1, ''),
(8, 'ytian73', 'Lights Out', 'review2', 5, 'review2'),
(9, 'yoyo2', 'Zootopia', 'Awesome!!', 4, 'Zootopia excels on so many levels that it stands with the finest of the Disney classics'),
(10, 'ytian74', 'The Secret Life of Pets', 'Very Good', 5, 'Very Good'),
(11, 'ytian74', 'The Secret Life of Pets', 'I do''t like that', 2, ''),
(12, 'yoyo', 'Ice Age: Collision Course', 'Average', 3, 'Not as good as previous ones'),
(13, 'yoyo', 'Ghostbusters', 'Fun moview', 5, 'These women are having fun just being together and getting to don matching jumpsuits and whale on undead spirits, and their evid'),
(14, 'yoyo', 'The Secret Life of Pets', 'good', 5, 'Has no room for filler or flab to its story, providing a brisk and hilarious adventure with a genuine sense of emotion to it.'),
(15, 'yoyo', 'Ghostbusters', 'Not special', 3, 'As is so often the case with special-effects-heavy movies, the character comedy quickly gets trampled by the effects (in this ca'),
(16, 'yoyo', 'Star Trek Beyond', 'Not good enough', 3, 'Star Trek Beyond is a Star Trek movie, although not an especially good one.'),
(17, 'yoyo', 'The Legend of Tarzan', 'Average', 3, 'Didn''t enjoy it very much.'),
(18, 'yoyo', 'Lights Out', 'All right', 3, 'An all right movie.'),
(19, 'yoyo', 'Finding Dory', 'Cute and emotional', 4, 'Disney did a good job!!'),
(20, 'yoyo', 'Ice Age: Collision Course', 'Not bad', 4, 'I was expecting more'),
(22, 'yoyo', 'Deadpool', 'So funny', 5, 'Ryan Reynold is everthing!!!'),
(23, 'yoyo5', 'Captain America: Civil War', 'awesome', 5, 'Nerdgasmmmmmmmmm! And Marisa Tomei on the sidelines!!!'),
(24, 'yoyo5', 'Captain America: Civil War', 'excellent', 4, 'Excellent action and plot. One of the better movies of the Marvel series'),
(25, 'yoyo5', 'Inside Out', 'Original!', 5, 'One of the most original things you''ll see all season, and all year.'),
(26, 'yoyo5', 'The Martian', 'love si-fi!', 4, 'the most sicense a si-fi moviegets'),
(27, 'yoyo4', 'Captain America: Civil War', 'meh', 3, 'It has all the action, giggles and personalities from your favourite characters to make this mpvie amazing. However there was so'),
(28, 'yoyo4', 'Deadpool', 'FUN!!', 5, 'Go see it people!!'),
(29, 'yoyo4', 'Inside Out', 'simple but good', 4, 'Such a simple movie with lot to learn.'),
(30, 'yoyo4', 'The Martian', 'Great!', 4, 'Matt Damon at his best!'),
(31, 'yoyo', 'Deadpool', 'yeah!!', 4, 'Great comedy and action!'),
(32, 'ytian70', 'Zootopia', '123', 4, '123'),
(33, 'ytian70', 'Zootopia', 'wqwr', 2, '');

-- --------------------------------------------------------

--
-- Table structure for table `saved_card`
--

CREATE TABLE IF NOT EXISTS `saved_card` (
  `number` varchar(32) NOT NULL,
  `name` varchar(32) NOT NULL,
  `cvv` decimal(3,0) NOT NULL,
  `expiration` date NOT NULL,
  `userid` int(32) NOT NULL,
  PRIMARY KEY (`number`,`userid`),
  KEY `userid` (`userid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `saved_card`
--

INSERT INTO `saved_card` (`number`, `name`, `cvv`, `expiration`, `userid`) VALUES
('0000111122223333', 'ytian71', '319', '2016-01-01', 3),
('0000111199992222', 'ytian72', '325', '2018-01-01', 10),
('1111222233334444', 'ytian72', '436', '2018-01-01', 10),
('1111222233334444', 'Yoyo Zhang', '123', '2017-05-01', 11),
('1111999922228888', 'ytian71', '123', '2017-01-01', 3),
('1112222233344434', 'Yoyo Chang', '889', '2016-08-01', 13),
('1212123242424242', 'ere', '232', '2017-01-01', 4),
('1234111122223333', 'Yoyo Chang', '333', '2017-03-01', 13),
('1234567890123456', 'Cindy (Yixin)', '123', '2016-08-01', 12),
('1234567891234567', 'Rayni Wang', '123', '2021-01-01', 2),
('1234567891343543', 'hjhjg', '343', '2016-02-01', 2),
('1234567897654321', 'dfsf', '456', '2019-01-01', 2),
('1242141241241241', 'ytian72', '234', '2018-02-01', 10),
('1284719274912875', 'ytian74', '436', '2018-01-01', 15),
('2222444433335555', 'yoyo z', '221', '2016-10-01', 18),
('2324325464646464', 'wewewe', '456', '2019-12-01', 4),
('2342353452356223', 'JJ Zhang', '234', '2017-01-01', 19),
('2546877777777777', 'ytu', '156', '2019-01-01', 9),
('3253821638712378', 'ytian70', '324', '2018-04-01', 1),
('3346458768945769', 'ytian72', '235', '2021-02-01', 10),
('3434355676784544', 'fgfgf', '454', '2016-07-01', 4),
('4444444444444444', 'uuu', '899', '2018-01-01', 6),
('4556756756765555', 'jjj', '555', '2017-01-01', 5),
('4658124372189312', 'ytian70', '353', '2018-02-01', 1),
('5127846218648216', 'ytian70', '756', '2018-01-01', 1),
('5555555555555555', 'ffffff', '555', '2018-02-01', 5),
('5555555555555555', 'ty', '763', '2017-04-01', 6),
('5555666677778888', 'ytian72', '325', '2017-01-01', 10),
('6666666666666666', 'rra', '666', '2017-01-01', 5),
('6666666666666666', 'ppp', '745', '2018-05-01', 6),
('6666666666666666', 'hhh', '666', '2016-08-01', 24),
('6666777788880000', 'ytian72', '756', '2018-01-01', 10),
('6666888844442222', 'ytian71', '457', '2018-01-01', 3),
('6666888866668888', 'ytian71', '679', '2018-01-01', 3),
('7772222222222222', 'wang yu', '456', '2020-12-01', 9),
('8888888888888888', 'ere', '888', '2018-01-01', 9),
('9999888877776666', 'ytian71', '214', '2020-09-01', 3);

-- --------------------------------------------------------

--
-- Table structure for table `saved_theater`
--

CREATE TABLE IF NOT EXISTS `saved_theater` (
  `name` varchar(50) NOT NULL DEFAULT '',
  `address` varchar(128) DEFAULT NULL,
  `userid` int(32) NOT NULL DEFAULT '0',
  `movie_name` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`name`,`userid`),
  KEY `userid` (`userid`),
  KEY `movie_name` (`movie_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `saved_theater`
--

INSERT INTO `saved_theater` (`name`, `address`, `userid`, `movie_name`) VALUES
('AMC1', '111 Peachtree St,30031, Atlanta, GA', 2, NULL),
('AMC1', '111 Peachtree St,30031, Atlanta, GA', 5, NULL),
('AMC1', '111 Peachtree St,30031, Atlanta, GA', 6, NULL),
('AMC1', '111 Peachtree St,30031, Atlanta, GA', 9, NULL),
('AMC1', '111 Peachtree St,30031, Atlanta, GA', 10, NULL),
('AMC1', '111 Peachtree St,30031, Atlanta, GA', 11, NULL),
('AMC1', '111 Peachtree St,30031, Atlanta, GA', 24, NULL),
('AMC2', '112 Main St,14226, Buffalo, NY', 1, NULL),
('AMC2', '112 Main St,14226, Buffalo, NY', 2, NULL),
('AMC2', '112 Main St,14226, Buffalo, NY', 3, NULL),
('AMC2', '112 Main St,14226, Buffalo, NY', 4, NULL),
('AMC2', '112 Main St,14226, Buffalo, NY', 5, NULL),
('AMC2', '112 Main St,14226, Buffalo, NY', 6, NULL),
('AMC2', '112 Main St,14226, Buffalo, NY', 10, NULL),
('AMC2', '112 Main St,14226, Buffalo, NY', 13, NULL),
('AMC2', '112 Main St,14226, Buffalo, NY', 15, NULL),
('AMC2', '112 Main St,14226, Buffalo, NY', 19, NULL),
('AMC3', '4486 Veterans Memorial Blvd, 70006, New Orlean, LA', 1, NULL),
('AMC3', '4486 Veterans Memorial Blvd, 70006, New Orlean, LA', 2, NULL),
('AMC3', '4486 Veterans Memorial Blvd, 70006, New Orlean, LA', 3, NULL),
('AMC3', '4486 Veterans Memorial Blvd, 70006, New Orlean, LA', 4, NULL),
('AMC3', '4486 Veterans Memorial Blvd, 70006, New Orlean, LA', 10, NULL),
('AMC3', '4486 Veterans Memorial Blvd, 70006, New Orlean, LA', 15, NULL),
('AMC4', '1910 Wells Rd,32073, Orange Park, FL', 1, NULL),
('AMC4', '1910 Wells Rd,32073, Orange Park, FL', 3, NULL),
('AMC4', '1910 Wells Rd,32073, Orange Park, FL', 9, NULL),
('Regal Cinemas Atlantic Station 18 ', '261 19th St NW #1250,30363, Atlanta, GA', 1, NULL),
('Regal Cinemas Atlantic Station 18 ', '261 19th St NW #1250,30363, Atlanta, GA', 2, NULL),
('Regal Cinemas Atlantic Station 18 ', '261 19th St NW #1250,30363, Atlanta, GA', 3, NULL),
('Regal Cinemas Atlantic Station 18 ', '261 19th St NW #1250,30363, Atlanta, GA', 4, NULL),
('Regal Cinemas Atlantic Station 18 ', '261 19th St NW #1250,30363, Atlanta, GA', 9, NULL),
('Regal Cinemas Atlantic Station 18 ', '261 19th St NW #1250,30363, Atlanta, GA', 11, NULL),
('Regal Cinemas Atlantic Station 18 ', '261 19th St NW #1250,30363, Atlanta, GA', 12, NULL),
('Regal Cinemas Atlantic Station 18 ', '261 19th St NW #1250,30363, Atlanta, GA', 19, NULL),
('Regal Cinemas Hollywood 24 @ North I-85', '3265 NE Expy NE, Chamblee,30341, Atlanta, GA', 1, NULL),
('Regal Cinemas Hollywood 24 @ North I-85', '3265 NE Expy NE, Chamblee,30341, Atlanta, GA', 3, NULL),
('Regal Cinemas Hollywood 24 @ North I-85', '3265 NE Expy NE, Chamblee,30341, Atlanta, GA', 5, NULL),
('Regal Cinemas Hollywood 24 @ North I-85', '3265 NE Expy NE, Chamblee,30341, Atlanta, GA', 6, NULL),
('Regal Cinemas Hollywood 24 @ North I-85', '3265 NE Expy NE, Chamblee,30341, Atlanta, GA', 10, NULL),
('Regal Cinemas Hollywood 24 @ North I-85', '3265 NE Expy NE, Chamblee,30341, Atlanta, GA', 14, NULL),
('Regal Cinemas Hollywood 24 @ North I-85', '3265 NE Expy NE, Chamblee,30341, Atlanta, GA', 15, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `session`
--

CREATE TABLE IF NOT EXISTS `session` (
  `sessionid` varchar(32) NOT NULL,
  `sessionuserid` int(32) NOT NULL,
  `sessionpassword` varchar(50) NOT NULL,
  `sessionemail` varchar(50) NOT NULL,
  `sessiongroupid` int(32) NOT NULL,
  `sessionmodifytime` varchar(32) NOT NULL,
  `sessionstatus` int(4) NOT NULL,
  PRIMARY KEY (`sessionid`,`sessionuserid`),
  KEY `sessionuserid` (`sessionuserid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `session`
--

INSERT INTO `session` (`sessionid`, `sessionuserid`, `sessionpassword`, `sessionemail`, `sessiongroupid`, `sessionmodifytime`, `sessionstatus`) VALUES
('1sl8bcecqs4pti4i7b4tt5daf2', 2, '827ccb0eea8a706c4c34a16891f84e7b', 'rayni@gmail.com', 1, '1469411833', 0),
('1sl8bcecqs4pti4i7b4tt5daf2', 4, '827ccb0eea8a706c4c34a16891f84e7b', 'rayni1@gmail.com', 1, '1469417791', 1),
('1sl8bcecqs4pti4i7b4tt5daf2', 5, 'e10adc3949ba59abbe56e057f20f883e', 'rayni2@gmail.com', 1, '1469412610', 0),
('1sl8bcecqs4pti4i7b4tt5daf2', 6, '827ccb0eea8a706c4c34a16891f84e7b', 'rayni3@gmail.com', 1, '1469412832', 0),
('1sl8bcecqs4pti4i7b4tt5daf2', 7, '962012d09b8170d912f0669f6d7d9d07', 'rayni4@gmail.com', 1, '1469413017', 0),
('1sl8bcecqs4pti4i7b4tt5daf2', 8, 'fcea920f7412b5da7be0cf42b8c93759', 'raynim@gmail.com', 2, '1469413055', 0),
('1sl8bcecqs4pti4i7b4tt5daf2', 9, 'e10adc3949ba59abbe56e057f20f883e', 'rooni6@gmail.com', 1, '1469413640', 1),
('77mevjhm0rpbnghh5id9l81o06', 11, '6547436690a26a399603a7096e876a2d', 'yoyo@gmail.com', 1, '1469468976', 0),
('77mevjhm0rpbnghh5id9l81o06', 13, 'd1aaf4767a3c10a473407a4e47b02da6', 'yoyo2@gmail.com', 1, '1469416137', 0),
('77mevjhm0rpbnghh5id9l81o06', 18, '6547436690a26a399603a7096e876a2d', 'yoyo3@gmail.com', 1, '1469418573', 0),
('77mevjhm0rpbnghh5id9l81o06', 19, '6547436690a26a399603a7096e876a2d', 'yoyo4@gmail.com', 1, '1469469083', 0),
('77mevjhm0rpbnghh5id9l81o06', 20, '6547436690a26a399603a7096e876a2d', 'yoyom@gmail.com', 2, '1469418962', 0),
('77mevjhm0rpbnghh5id9l81o06', 23, '6547436690a26a399603a7096e876a2d', 'yoyom2@hotmail.com', 2, '1469463240', 0),
('77mevjhm0rpbnghh5id9l81o06', 25, '6547436690a26a399603a7096e876a2d', 'yoyo5@gmail.com', 1, '1469469158', 1),
('a3d8gktt2lkvb0g2ukqu9hqv73', 1, 'e10adc3949ba59abbe56e057f20f883e', 'ytian70@163.com', 1, '1469474498', 0),
('a3d8gktt2lkvb0g2ukqu9hqv73', 2, '827ccb0eea8a706c4c34a16891f84e7b', 'rayni@gmail.com', 1, '1469474292', 0),
('a3d8gktt2lkvb0g2ukqu9hqv73', 3, 'e10adc3949ba59abbe56e057f20f883e', 'ytian71@163.com', 1, '1469412242', 0),
('a3d8gktt2lkvb0g2ukqu9hqv73', 10, 'e10adc3949ba59abbe56e057f20f883e', 'ytian72@163.com', 1, '1469474666', 0),
('a3d8gktt2lkvb0g2ukqu9hqv73', 14, 'e10adc3949ba59abbe56e057f20f883e', 'ytian73@163.com', 1, '1469416834', 0),
('a3d8gktt2lkvb0g2ukqu9hqv73', 15, 'e10adc3949ba59abbe56e057f20f883e', 'ytian74@163.com', 1, '1469417065', 0),
('a3d8gktt2lkvb0g2ukqu9hqv73', 17, 'e10adc3949ba59abbe56e057f20f883e', 'ytian75@163.com', 2, '1469474720', 0),
('a3d8gktt2lkvb0g2ukqu9hqv73', 20, '6547436690a26a399603a7096e876a2d', 'yoyom@gmail.com', 2, '1469474353', 0),
('a3d8gktt2lkvb0g2ukqu9hqv73', 22, 'cf18ad7acc750c13a8c0f8005aa2205e', 'cs4400@gatech.edu', 2, '1469461900', 0),
('a3d8gktt2lkvb0g2ukqu9hqv73', 23, '6547436690a26a399603a7096e876a2d', 'yoyom2@hotmail.com', 2, '1469472650', 0),
('a3d8gktt2lkvb0g2ukqu9hqv73', 27, '900150983cd24fb0d6963f7d28e17f72', 'abc@abc.com', 1, '1469472908', 0),
('a3d8gktt2lkvb0g2ukqu9hqv73', 28, '47bce5c74f589f4867dbd57e9ca9f808', 'yoyom@gmail.com', 2, '1469472985', 0),
('cridghgdfe306tvas0c0tnrmb0', 12, 'dcffc23ae975bcb024f7c4f1db21240c', 'sun955967@gmail.com', 1, '1469462964', 0),
('cridghgdfe306tvas0c0tnrmb0', 24, '414c7ad55625f289003613764448a055', '123@123.com', 1, '1469463249', 1),
('jf13es5v5bblpev72h5grj5s95', 21, 'dcffc23ae975bcb024f7c4f1db21240c', 'wosha@163.com', 1, '1469459040', 1),
('oq6dvj7n1vi7iamvf32694gp15', 12, 'dcffc23ae975bcb024f7c4f1db21240c', 'sun955967@gmail.com', 1, '1469419860', 1),
('urne62qvud6usraclcm1csq316', 10, 'e10adc3949ba59abbe56e057f20f883e', 'ytian72@163.com', 1, '1469415476', 0),
('v8jr51o3cuciuau2vkisvopjv5', 11, '6547436690a26a399603a7096e876a2d', 'yoyo@gmail.com', 1, '1469414922', 1);

-- --------------------------------------------------------

--
-- Table structure for table `system`
--

CREATE TABLE IF NOT EXISTS `system` (
  `cancellationFee` varchar(10) NOT NULL,
  `manager_password` varchar(50) NOT NULL,
  `senior_discount` varchar(10) NOT NULL,
  `child_discount` varchar(10) NOT NULL,
  PRIMARY KEY (`cancellationFee`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `system`
--

INSERT INTO `system` (`cancellationFee`, `manager_password`, `senior_discount`, `child_discount`) VALUES
('5', '123456', '0.8', '0.7');

-- --------------------------------------------------------

--
-- Table structure for table `theater`
--

CREATE TABLE IF NOT EXISTS `theater` (
  `name` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `state` varchar(10) NOT NULL,
  `address` varchar(128) NOT NULL,
  `movie_name` varchar(50) NOT NULL,
  PRIMARY KEY (`name`,`movie_name`),
  KEY `movie_name` (`movie_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `theater`
--

INSERT INTO `theater` (`name`, `city`, `state`, `address`, `movie_name`) VALUES
('AMC1', 'Atlanta', 'GA', '111 Peachtree St,30031', 'Finding Dory'),
('AMC1', 'Atlanta', 'GA', '111 Peachtree St,30031', 'Ghostbusters'),
('AMC1', 'Atlanta', 'GA', '111 Peachtree St,30031', 'Ice Age: Collision Course'),
('AMC1', 'Atlanta', 'GA', '111 Peachtree St,30031', 'Lights Out'),
('AMC1', 'Atlanta', 'GA', '111 Peachtree St,30031', 'Star Trek Beyond'),
('AMC1', 'Atlanta', 'GA', '111 Peachtree St,30031', 'The Legend of Tarzan'),
('AMC1', 'Atlanta', 'GA', '111 Peachtree St,30031', 'The Secret Life of Pets'),
('AMC1', 'Atlanta', 'GA', '111 Peachtree St,30031', 'Zootopia'),
('AMC2', 'Buffalo', 'NY', '112 Main St,14226', 'Star Trek Beyond'),
('AMC2', 'Buffalo', 'NY', '112 Main St,14226', 'The Legend of Tarzan'),
('AMC2', 'Buffalo', 'NY', '112 Main St,14226', 'The Secret Life of Pets'),
('AMC2', 'Buffalo', 'NY', '112 Main St,14226', 'Zootopia'),
('AMC3', 'New Orlean', 'LA', '4486 Veterans Memorial Blvd, 70006', 'Finding Dory'),
('AMC3', 'New Orlean', 'LA', '4486 Veterans Memorial Blvd, 70006', 'Ice Age: Collision Course'),
('AMC3', 'New Orlean', 'LA', '4486 Veterans Memorial Blvd, 70006', 'Star Trek Beyond'),
('AMC3', 'New Orlean', 'LA', '4486 Veterans Memorial Blvd, 70006', 'The Secret Life of Pets'),
('AMC3', 'New Orlean', 'LA', '4486 Veterans Memorial Blvd, 70006', 'Zootopia'),
('AMC4', 'Orange Park', 'FL', '1910 Wells Rd,32073', 'Finding Dory'),
('AMC4', 'Orange Park', 'FL', '1910 Wells Rd,32073', 'Ghostbusters'),
('AMC4', 'Orange Park', 'FL', '1910 Wells Rd,32073', 'Inside Out'),
('AMC4', 'Orange Park', 'FL', '1910 Wells Rd,32073', 'The Martian'),
('AMC4', 'Orange Park', 'FL', '1910 Wells Rd,32073', 'Zootopia'),
('Regal Cinemas Atlantic Station 18 ', 'Atlanta', 'GA', '261 19th St NW #1250,30363', 'Star Trek Beyond'),
('Regal Cinemas Atlantic Station 18 ', 'Atlanta', 'GA', '261 19th St NW #1250,30363', 'The Legend of Tarzan'),
('Regal Cinemas Atlantic Station 18 ', 'Atlanta', 'GA', '261 19th St NW #1250,30363', 'The Secret Life of Pets'),
('Regal Cinemas Atlantic Station 18 ', 'Atlanta', 'GA', '261 19th St NW #1250,30363', 'Zootopia'),
('Regal Cinemas Hollywood 24 @ North I-85', 'Atlanta', 'GA', '3265 NE Expy NE, Chamblee,30341', 'Finding Dory'),
('Regal Cinemas Hollywood 24 @ North I-85', 'Atlanta', 'GA', '3265 NE Expy NE, Chamblee,30341', 'Ghostbusters'),
('Regal Cinemas Hollywood 24 @ North I-85', 'Atlanta', 'GA', '3265 NE Expy NE, Chamblee,30341', 'Ice Age: Collision Course'),
('Regal Cinemas Hollywood 24 @ North I-85', 'Atlanta', 'GA', '3265 NE Expy NE, Chamblee,30341', 'Lights Out'),
('Regal Cinemas Hollywood 24 @ North I-85', 'Atlanta', 'GA', '3265 NE Expy NE, Chamblee,30341', 'Zootopia');

-- --------------------------------------------------------

--
-- Table structure for table `theater_list`
--

CREATE TABLE IF NOT EXISTS `theater_list` (
  `name` varchar(50) NOT NULL,
  `state` varchar(10) NOT NULL,
  `city` varchar(50) NOT NULL,
  `address` varchar(128) NOT NULL,
  PRIMARY KEY (`name`,`state`,`city`,`address`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `theater_list`
--

INSERT INTO `theater_list` (`name`, `state`, `city`, `address`) VALUES
('AMC1', 'GA', 'Atlanta', '111 Peachtree St,30031'),
('AMC2', 'NY', 'Buffalo', '112 Main St,14226'),
('AMC3', 'LA', 'New Orlean', '4486 Veterans Memorial Blvd, 70006'),
('AMC4', 'FL', 'Orange Park', '1910 Wells Rd,32073'),
('Regal Cinemas Atlantic Station 18 ', 'GA', 'Atlanta', '261 19th St NW #1250,30363'),
('Regal Cinemas Hollywood 24 @ North I-85', 'GA', 'Atlanta', '3265 NE Expy NE, Chamblee,30341');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `userid` int(32) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `usergroupid` int(32) NOT NULL,
  PRIMARY KEY (`userid`),
  UNIQUE KEY `username` (`username`),
  KEY `usergroupid` (`usergroupid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=29 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userid`, `username`, `password`, `email`, `usergroupid`) VALUES
(1, 'ytian70', 'e10adc3949ba59abbe56e057f20f883e', 'ytian70@163.com', 1),
(2, 'rayni', '827ccb0eea8a706c4c34a16891f84e7b', 'rayni@gmail.com', 1),
(3, 'ytian71', 'e10adc3949ba59abbe56e057f20f883e', 'ytian71@163.com', 1),
(4, 'rayni1', '827ccb0eea8a706c4c34a16891f84e7b', 'rayni1@gmail.com', 1),
(5, 'rayni2', 'e10adc3949ba59abbe56e057f20f883e', 'rayni2@gmail.com', 1),
(6, 'rayni3', '827ccb0eea8a706c4c34a16891f84e7b', 'rayni3@gmail.com', 1),
(7, 'rayni4', '962012d09b8170d912f0669f6d7d9d07', 'rayni4@gmail.com', 1),
(8, 'raynim', 'fcea920f7412b5da7be0cf42b8c93759', 'raynim@gmail.com', 2),
(9, 'rooni6', 'e10adc3949ba59abbe56e057f20f883e', 'rooni6@gmail.com', 1),
(10, 'ytian72', 'e10adc3949ba59abbe56e057f20f883e', 'ytian72@163.com', 1),
(11, 'yoyo', '6547436690a26a399603a7096e876a2d', 'yoyo@gmail.com', 1),
(12, 'sunyixin', 'dcffc23ae975bcb024f7c4f1db21240c', 'sun955967@gmail.com', 1),
(13, 'yoyo2', 'd1aaf4767a3c10a473407a4e47b02da6', 'yoyo2@gmail.com', 1),
(14, 'ytian73', 'e10adc3949ba59abbe56e057f20f883e', 'ytian73@163.com', 1),
(15, 'ytian74', 'e10adc3949ba59abbe56e057f20f883e', 'ytian74@163.com', 1),
(17, 'ytian75', 'e10adc3949ba59abbe56e057f20f883e', 'ytian75@163.com', 2),
(18, 'yoyo3', '6547436690a26a399603a7096e876a2d', 'yoyo3@gmail.com', 1),
(19, 'yoyo4', '6547436690a26a399603a7096e876a2d', 'yoyo4@gmail.com', 1),
(20, 'yoyom', '6547436690a26a399603a7096e876a2d', 'yoyom@gmail.com', 2),
(21, 'woshishabi', 'dcffc23ae975bcb024f7c4f1db21240c', 'wosha@163.com', 1),
(22, 'cs4400', 'cf18ad7acc750c13a8c0f8005aa2205e', 'cs4400@gatech.edu', 2),
(23, 'yoyom2', '6547436690a26a399603a7096e876a2d', 'yoyom2@hotmail.com', 2),
(24, 'wobaichi', '414c7ad55625f289003613764448a055', '123@123.com', 1),
(25, 'yoyo5', '6547436690a26a399603a7096e876a2d', 'yoyo5@gmail.com', 1),
(27, 'abc', '900150983cd24fb0d6963f7d28e17f72', 'abc@abc.com', 1),
(28, 'aaa', '47bce5c74f589f4867dbd57e9ca9f808', 'yoyom@gmail.com', 2);

-- --------------------------------------------------------

--
-- Table structure for table `user_group`
--

CREATE TABLE IF NOT EXISTS `user_group` (
  `groupid` int(32) NOT NULL,
  `role` varchar(32) NOT NULL,
  PRIMARY KEY (`groupid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_group`
--

INSERT INTO `user_group` (`groupid`, `role`) VALUES
(1, 'customer'),
(2, 'manager');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `movie_overview`
--
ALTER TABLE `movie_overview`
  ADD CONSTRAINT `movie_overview_ibfk_1` FOREIGN KEY (`name`) REFERENCES `movie` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `movie_overview_ibfk_2` FOREIGN KEY (`name`) REFERENCES `movie` (`name`);

--
-- Constraints for table `movie_time`
--
ALTER TABLE `movie_time`
  ADD CONSTRAINT `movie_time_ibfk_1` FOREIGN KEY (`theater_name`) REFERENCES `theater` (`name`) ON UPDATE CASCADE,
  ADD CONSTRAINT `movie_time_ibfk_2` FOREIGN KEY (`movie_name`) REFERENCES `movie` (`name`) ON UPDATE CASCADE,
  ADD CONSTRAINT `movie_time_ibfk_3` FOREIGN KEY (`movie_name`) REFERENCES `movie` (`name`);

--
-- Constraints for table `order_detail`
--
ALTER TABLE `order_detail`
  ADD CONSTRAINT `order_detail_ibfk_1` FOREIGN KEY (`movie_name`) REFERENCES `movie` (`name`) ON UPDATE CASCADE,
  ADD CONSTRAINT `order_detail_ibfk_2` FOREIGN KEY (`userid`) REFERENCES `user` (`userid`) ON UPDATE CASCADE;

--
-- Constraints for table `review`
--
ALTER TABLE `review`
  ADD CONSTRAINT `review_ibfk_1` FOREIGN KEY (`user_name`) REFERENCES `user` (`username`) ON UPDATE CASCADE,
  ADD CONSTRAINT `review_ibfk_2` FOREIGN KEY (`movie_name`) REFERENCES `movie` (`name`) ON DELETE CASCADE;

--
-- Constraints for table `saved_card`
--
ALTER TABLE `saved_card`
  ADD CONSTRAINT `saved_card_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `user` (`userid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `saved_theater`
--
ALTER TABLE `saved_theater`
  ADD CONSTRAINT `saved_theater_ibfk_3` FOREIGN KEY (`movie_name`) REFERENCES `movie` (`name`),
  ADD CONSTRAINT `saved_theater_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `user` (`userid`) ON UPDATE CASCADE,
  ADD CONSTRAINT `saved_theater_ibfk_2` FOREIGN KEY (`name`) REFERENCES `theater` (`name`) ON UPDATE CASCADE;

--
-- Constraints for table `session`
--
ALTER TABLE `session`
  ADD CONSTRAINT `session_ibfk_1` FOREIGN KEY (`sessionuserid`) REFERENCES `user` (`userid`) ON UPDATE CASCADE;

--
-- Constraints for table `theater`
--
ALTER TABLE `theater`
  ADD CONSTRAINT `theater_ibfk_2` FOREIGN KEY (`name`) REFERENCES `theater_list` (`name`),
  ADD CONSTRAINT `theater_ibfk_1` FOREIGN KEY (`movie_name`) REFERENCES `movie` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`usergroupid`) REFERENCES `user_group` (`groupid`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
