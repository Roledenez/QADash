-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 11, 2015 at 05:18 AM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `testorsdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `charts`
--

CREATE TABLE IF NOT EXISTS `charts` (
  `pid` int(11) NOT NULL,
  `Pname` varchar(100) DEFAULT NULL,
  `year` int(11) DEFAULT NULL,
  `month` varchar(100) DEFAULT NULL,
  `failedTC` int(11) DEFAULT NULL,
  `passedTC` int(11) DEFAULT NULL,
  `prority` int(11) DEFAULT NULL,
  `sevierity` int(11) DEFAULT NULL,
  `issues` int(11) DEFAULT NULL,
  `testcases` int(11) DEFAULT NULL,
  `totalhours` int(11) DEFAULT NULL,
  `spentours` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `charts`
--

INSERT INTO `charts` (`pid`, `Pname`, `year`, `month`, `failedTC`, `passedTC`, `prority`, `sevierity`, `issues`, `testcases`, `totalhours`, `spentours`) VALUES
(1, 'QA dashboard', 2014, 'Jan', 5, 4, 0, 0, 130, 185, 1440, 1420),
(1, 'NTM', 2014, 'Feb', 8, 5, 0, 0, 12, 150, 2840, 2920),
(1, 'KR', 2014, 'Mar', 8, 20, 0, 0, 20, 162, 3960, 3951),
(1, 'RDM', 2014, 'Apr', 40, 2, 0, 0, 52, 164, 1520, 1526),
(1, 'KT Innovation', 2014, 'May', 46, 12, 0, 0, 45, 162, 1960, 1360),
(1, 'OS Innovation', 2014, 'Jun', 29, 7, 0, 0, 93, 240, 1963, 1682),
(1, 'QTT', 2014, 'Jul', 49, 2, 0, 0, 57, 130, 1860, 1861),
(1, 'AA', 2014, 'Aug', 16, 12, 0, 0, 27, 86, 1760, 1796),
(1, 'NTFC', 2014, 'Sep', 46, 6, 0, 0, 16, 132, 1800, 1850),
(1, 'SEWE', 2014, 'Oct', 16, 21, 0, 0, 12, 160, 3690, 3694),
(1, 'LDM', 2014, 'Nov', 19, 3, 0, 0, 126, 240, 3900, 3960),
(1, 'YUC', 2014, 'Dec', 27, 4, 0, 0, 123, 264, 1500, 1680),
(1, 'QA dashboard', 2014, 'Jan', 5, 4, 0, 0, 130, 185, 1440, 1420),
(1, 'NTM', 2014, 'Feb', 8, 5, 0, 0, 12, 150, 2840, 2920),
(1, 'KR', 2014, 'Mar', 8, 20, 0, 0, 20, 162, 3960, 3951),
(1, 'RDM', 2014, 'Apr', 40, 2, 0, 0, 52, 164, 1520, 1526),
(1, 'KT Innovation', 2014, 'May', 46, 12, 0, 0, 45, 162, 1960, 1360),
(1, 'OS Innovation', 2014, 'Jun', 29, 7, 0, 0, 93, 240, 1963, 1682),
(1, 'QTT', 2014, 'Jul', 49, 2, 0, 0, 57, 130, 1860, 1861),
(1, 'AA', 2014, 'Aug', 16, 12, 0, 0, 27, 86, 1760, 1796),
(1, 'NTFC', 2014, 'Sep', 46, 6, 0, 0, 16, 132, 1800, 1850),
(1, 'SEWE', 2014, 'Oct', 16, 21, 0, 0, 12, 160, 3690, 3694),
(1, 'LDM', 2014, 'Nov', 19, 3, 0, 0, 126, 240, 3900, 3960),
(1, 'YUC', 2014, 'Dec', 27, 4, 0, 0, 123, 264, 1500, 1680);

-- --------------------------------------------------------

--
-- Table structure for table `chats`
--

CREATE TABLE IF NOT EXISTS `chats` (
`chat_id` int(11) NOT NULL,
  `chat_topic` varchar(200) NOT NULL,
  `chatted_by` int(11) NOT NULL,
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `chats`
--

INSERT INTO `chats` (`chat_id`, `chat_topic`, `chatted_by`, `create_date`) VALUES
(1, 'codeignitor', 1, '2015-09-01 18:55:40');

-- --------------------------------------------------------

--
-- Table structure for table `chat_messages`
--

CREATE TABLE IF NOT EXISTS `chat_messages` (
  `chat_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `chat_message_content` varchar(10000) NOT NULL,
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
`chat_message_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `chat_messages`
--

INSERT INTO `chat_messages` (`chat_id`, `user_id`, `chat_message_content`, `create_date`, `chat_message_id`) VALUES
(4, 4, 'test msg', '2015-09-02 06:42:15', 1),
(2, 2, 'hi', '2015-09-02 06:42:53', 2),
(2, 1, 'test massage for chat', '2015-09-02 06:44:56', 3),
(2, 1, 'hihihi', '2015-09-05 05:24:16', 4),
(2, 1, 'Hi, This is a test chat message from Sasika', '2015-09-05 05:25:11', 5),
(1, 1, 'hi tst ', '2015-09-05 05:37:57', 6),
(1, 2, 'fixed', '2015-09-05 05:40:35', 7),
(1, 2, 'test', '2015-09-07 04:57:15', 8),
(1, 2, 'tt', '2015-09-07 05:18:01', 9),
(1, 15, 'ff', '2015-09-07 05:18:07', 10);

-- --------------------------------------------------------

--
-- Table structure for table `issue`
--

CREATE TABLE IF NOT EXISTS `issue` (
  `issue_id` int(11) NOT NULL,
  `project_id` varchar(500) NOT NULL,
  `member_id` int(11) NOT NULL,
  `testcase_id` int(11) NOT NULL,
  `description` varchar(500) NOT NULL,
  `prioriry_id` int(11) NOT NULL,
  `severity_id` int(11) NOT NULL,
  `status` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `issue`
--

INSERT INTO `issue` (`issue_id`, `project_id`, `member_id`, `testcase_id`, `description`, `prioriry_id`, `severity_id`, `status`) VALUES
(1, '1', 1, 1, 'yhlgu', 1, 1, 'open');

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE IF NOT EXISTS `member` (
`member_id` int(11) NOT NULL,
  `email` varchar(500) NOT NULL,
  `firstName` varchar(500) NOT NULL,
  `lastName` varchar(500) NOT NULL,
  `role` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`member_id`, `email`, `firstName`, `lastName`, `role`) VALUES
(1, 'abc@gmail.com', 'abc', 'abc', 'QA Engineer'),
(2, 'chathu@gmail.com', 'Chtahuri', 'Gamage', 'QAEngineer');

-- --------------------------------------------------------

--
-- Table structure for table `priority`
--

CREATE TABLE IF NOT EXISTS `priority` (
  `priority_id` int(11) NOT NULL,
  `name` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `priority`
--

INSERT INTO `priority` (`priority_id`, `name`) VALUES
(1, 'high');

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

CREATE TABLE IF NOT EXISTS `project` (
  `project_id` varchar(500) NOT NULL,
  `name` varchar(500) NOT NULL,
  `description` varchar(500) NOT NULL,
  `starting_date` date NOT NULL,
  `ending_date` date NOT NULL,
  `status` varchar(500) NOT NULL,
  `prority_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `project`
--

INSERT INTO `project` (`project_id`, `name`, `description`, `starting_date`, `ending_date`, `status`, `prority_id`) VALUES
('1', 'Project 1', 'This is project 1', '2015-07-01', '2015-07-31', 'open', 1),
('2', 'Project 2 ', 'This is project 2', '2015-08-03', '2015-07-22', 'closed ', 1);

-- --------------------------------------------------------

--
-- Table structure for table `project_member`
--

CREATE TABLE IF NOT EXISTS `project_member` (
  `project_id` varchar(500) NOT NULL,
  `member_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `project_member`
--

INSERT INTO `project_member` (`project_id`, `member_id`) VALUES
('1', 1),
('1', 2);

-- --------------------------------------------------------

--
-- Table structure for table `project_requests`
--

CREATE TABLE IF NOT EXISTS `project_requests` (
`id` int(11) NOT NULL,
  `month` varchar(100) DEFAULT NULL,
  `wordpress` int(11) DEFAULT NULL,
  `codeigniter` int(11) DEFAULT NULL,
  `highcharts` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `project_requests`
--

INSERT INTO `project_requests` (`id`, `month`, `wordpress`, `codeigniter`, `highcharts`) VALUES
(1, 'Jan', 4, 5, 7),
(2, 'Feb', 55, 2, 8),
(3, 'Mar', 6, 3, 9),
(4, 'Apr', 2, 6, 6),
(5, 'May', 5, 7, 7),
(6, 'Jun', 7, 1, 10),
(7, 'Jul', 2, 2, 9),
(8, 'Aug', 1, 6, 7),
(9, 'Sep', 6, 6, 6),
(10, 'Oct', 7, 4, 9),
(11, 'Nov', 3, 6, 8),
(12, 'Dec', 4, 3, 4);

-- --------------------------------------------------------

--
-- Table structure for table `severity`
--

CREATE TABLE IF NOT EXISTS `severity` (
  `severity_id` int(11) NOT NULL,
  `name` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `testcase`
--

CREATE TABLE IF NOT EXISTS `testcase` (
  `testcase_id` int(11) NOT NULL,
  `testsuites_id` int(11) NOT NULL,
  `description` varchar(500) NOT NULL,
  `status` varchar(100) NOT NULL,
  `pass` int(11) NOT NULL,
  `member_id` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `testcase`
--

INSERT INTO `testcase` (`testcase_id`, `testsuites_id`, `description`, `status`, `pass`, `member_id`) VALUES
(1, 1, 'This is testcase 1', 'open', 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `testcase_step`
--

CREATE TABLE IF NOT EXISTS `testcase_step` (
  `testcase_id` int(11) NOT NULL,
  `steps` varchar(1000) NOT NULL,
  `no_of_substeps` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `testsuites`
--

CREATE TABLE IF NOT EXISTS `testsuites` (
  `testsuites_id` int(11) NOT NULL,
  `project_id` varchar(500) NOT NULL,
  `name` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `testsuites`
--

INSERT INTO `testsuites` (`testsuites_id`, `project_id`, `name`) VALUES
(1, '1', 'Test suite 1');

-- --------------------------------------------------------

--
-- Table structure for table `time_entries`
--

CREATE TABLE IF NOT EXISTS `time_entries` (
`time_entries_id` int(11) NOT NULL,
  `project_id` varchar(500) NOT NULL,
  `member_id` int(11) NOT NULL,
  `issue_id` int(11) NOT NULL,
  `assigned_hours` float NOT NULL,
  `spent_hours` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`users_id` int(11) NOT NULL,
  `uername` varchar(500) NOT NULL,
  `firstName` varchar(500) NOT NULL,
  `lastName` varchar(500) NOT NULL,
  `password` varchar(250) NOT NULL,
  `email` varchar(500) NOT NULL,
  `role` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`users_id`, `uername`, `firstName`, `lastName`, `password`, `email`, `role`) VALUES
(1, 'admin', 'a', 'a', '0f8ce93d9a568a5276482de8a4242dd4d234145b9cc83fdfb3bbc772981732d9c06233dcf0e6afdc157cbbcb734309c5a757dea2c9793a0ff85859cbbd3edfe9', 'f@f.com', 'intern'),
(2, 'admin', 'Roledene', 'JKS', '0081669985595f6a226f608e47a69e6e072c889f275b5a35bea5b2c41dea999de2ebc53ada08f31afe3e362dbc5806e5b3b15f0bce0b2cd04e9547ea5f0e4edb', 'admin@admin.com', 'admin'),
(3, 'Binalie', 'Binalie', 'Ravinga', 'AEE71079C5104F2E429802F324D8CF3AA1BC68D4034B58D6888EDE94B60D61E24E0BB961078264C2F8D7366247543295E0CBC9E5738CE11E76B9FAA7EFB07071', 'manager@gmail.com', 'manager'),
(4, 'chathu', 'Chathuri', 'Gamage', 'abc', 'chathu@gmail.com', 'QA Engineer'),
(6, 'hi', 'hi', 'hi', 'hi', 'hi@gmail.com', 'hi'),
(7, 'dd', 'dd', 'dd', 'dd', 'sroledenez@gmail.com', 'dd'),
(13, 'test', 'test', 'test', '027947c075a0fa0dedd3549bb79c6b3649d520be4f1e49e0bef85a87c0b0b71e0eb5f0fb58e6757b4860b6e6374af9fc61c4444f74dc5c77ce0e08784764bcf4', 'test@test.co', 'admin'),
(15, 'en@en.com', 'en', 'en', '0081669985595f6a226f608e47a69e6e072c889f275b5a35bea5b2c41dea999de2ebc53ada08f31afe3e362dbc5806e5b3b15f0bce0b2cd04e9547ea5f0e4edb', 'en@en.com', 'engineer'),
(16, 'intern', 'intern', 'intern', 'e870f4d5b2bce9dd2a28db91ac3b807d7cd71dc9e6800c5102edc9df048ed2defe415cfc09045ce3cd64ccb9305fc12e0401e3d8da5dbccadff440b5adda0bcb', 'i@i.com', 'intern'),
(17, 'testest', 'test', 'test', '7fc6159ee29d7014f331092df242faee60e91f564fc5bb62b61d4e62672f1fc95333bb04afa72ab43198fecd4cb8fd9cafa0e95a37e577a14b66d664b717d0bb', 't@t.com', 'admin'),
(18, 'e', 'e', 'e', '6176cd9ed4c79829d678036a48ec89d410527613c37358e2b65b00a8675c66bae758c99e357b9d7323a7b6e325b1e1f4892914310a9ac2e83d2238436a6fcc2d', 'e@e.com', 'engineer'),
(19, 'f', 'f', 'f', '35b1b27025014a6df37d8e1958ca2532fe7135fe487dfe411a8a8447f154cae2167386202bdfa0bdf41e6a974f3dfe0020d46157e0b76150946ad9fdd4bef392', 'ff@f.com', 'admin'),
(22, 'lak.kosh', 'Lakna', 'A', 'b6a6cd0c1e706a9b6f8429a5ae7ae91ba9fd0d388f1c5935b86a73bf8b33f033467d8b3f9bc48b407806f55080db8f63435f039ad48fdd13c6b41a520656a3f5', 'lak.kosh@gmail.com', 'admin'),
(23, 'new', 'Lakini', 'Lakini', '20028e897e04d963ca36fb372690e3136c12d42e34e0b7bd2d7a85ba3654a4dfcadd6288171f065f95e258e7ff60fa26bfc7bdd0c82fc6f6e6d08b7969ec84f5', 'n@n.com', 'manager');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chats`
--
ALTER TABLE `chats`
 ADD PRIMARY KEY (`chat_id`);

--
-- Indexes for table `chat_messages`
--
ALTER TABLE `chat_messages`
 ADD PRIMARY KEY (`chat_message_id`);

--
-- Indexes for table `issue`
--
ALTER TABLE `issue`
 ADD PRIMARY KEY (`issue_id`), ADD KEY `fk_pt1` (`project_id`), ADD KEY `fk_pt2` (`member_id`), ADD KEY `fk_pt3` (`testcase_id`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
 ADD PRIMARY KEY (`member_id`);

--
-- Indexes for table `priority`
--
ALTER TABLE `priority`
 ADD PRIMARY KEY (`priority_id`);

--
-- Indexes for table `project`
--
ALTER TABLE `project`
 ADD PRIMARY KEY (`project_id`), ADD KEY `fk_p` (`prority_id`);

--
-- Indexes for table `project_member`
--
ALTER TABLE `project_member`
 ADD PRIMARY KEY (`project_id`,`member_id`), ADD KEY `fk_m2` (`member_id`);

--
-- Indexes for table `project_requests`
--
ALTER TABLE `project_requests`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `severity`
--
ALTER TABLE `severity`
 ADD PRIMARY KEY (`severity_id`);

--
-- Indexes for table `testcase`
--
ALTER TABLE `testcase`
 ADD PRIMARY KEY (`testcase_id`), ADD KEY `fk_test1` (`testsuites_id`);

--
-- Indexes for table `testcase_step`
--
ALTER TABLE `testcase_step`
 ADD PRIMARY KEY (`testcase_id`);

--
-- Indexes for table `testsuites`
--
ALTER TABLE `testsuites`
 ADD PRIMARY KEY (`testsuites_id`), ADD KEY `fk_te1` (`project_id`);

--
-- Indexes for table `time_entries`
--
ALTER TABLE `time_entries`
 ADD PRIMARY KEY (`time_entries_id`), ADD KEY `fk_pm1` (`project_id`), ADD KEY `fk_pm2` (`member_id`), ADD KEY `fk_pm3` (`issue_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`users_id`), ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chats`
--
ALTER TABLE `chats`
MODIFY `chat_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `chat_messages`
--
ALTER TABLE `chat_messages`
MODIFY `chat_message_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
MODIFY `member_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `project_requests`
--
ALTER TABLE `project_requests`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `time_entries`
--
ALTER TABLE `time_entries`
MODIFY `time_entries_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `users_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=24;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `issue`
--
ALTER TABLE `issue`
ADD CONSTRAINT `fk_pt1` FOREIGN KEY (`project_id`) REFERENCES `project` (`project_id`),
ADD CONSTRAINT `fk_pt2` FOREIGN KEY (`member_id`) REFERENCES `member` (`member_id`),
ADD CONSTRAINT `fk_pt3` FOREIGN KEY (`testcase_id`) REFERENCES `testcase` (`testcase_id`);

--
-- Constraints for table `project`
--
ALTER TABLE `project`
ADD CONSTRAINT `fk_p` FOREIGN KEY (`prority_id`) REFERENCES `priority` (`priority_id`);

--
-- Constraints for table `project_member`
--
ALTER TABLE `project_member`
ADD CONSTRAINT `fk_m1` FOREIGN KEY (`project_id`) REFERENCES `project` (`project_id`),
ADD CONSTRAINT `fk_m2` FOREIGN KEY (`member_id`) REFERENCES `member` (`member_id`);

--
-- Constraints for table `testcase`
--
ALTER TABLE `testcase`
ADD CONSTRAINT `fk_test1` FOREIGN KEY (`testsuites_id`) REFERENCES `testsuites` (`testsuites_id`);

--
-- Constraints for table `testcase_step`
--
ALTER TABLE `testcase_step`
ADD CONSTRAINT `fk_tt1` FOREIGN KEY (`testcase_id`) REFERENCES `testcase` (`testcase_id`);

--
-- Constraints for table `testsuites`
--
ALTER TABLE `testsuites`
ADD CONSTRAINT `fk_te1` FOREIGN KEY (`project_id`) REFERENCES `project` (`project_id`);

--
-- Constraints for table `time_entries`
--
ALTER TABLE `time_entries`
ADD CONSTRAINT `fk_pm1` FOREIGN KEY (`project_id`) REFERENCES `project` (`project_id`),
ADD CONSTRAINT `fk_pm2` FOREIGN KEY (`member_id`) REFERENCES `member` (`member_id`),
ADD CONSTRAINT `fk_pm3` FOREIGN KEY (`issue_id`) REFERENCES `issue` (`issue_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
