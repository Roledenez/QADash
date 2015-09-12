-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 10, 2015 at 08:10 PM
-- Server version: 5.6.24
-- PHP Version: 5.5.24

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
(1, 'YUC', 2014, 'Dec', 27, 4, 0, 0, 123, 264, 1500, 1680);

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
(1, 'high'),
(2, 'Medium'),
(3, 'low');

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
  `prority_id` int(11) NOT NULL,
  `totalhours` int(11) DEFAULT NULL,
  `spentours` int(11) DEFAULT NULL,
  `progress` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `project`
--

INSERT INTO `project` (`project_id`, `name`, `description`, `starting_date`, `ending_date`, `status`, `prority_id`, `totalhours`, `spentours`, `progress`) VALUES
('1', 'Project 1', 'This is project 1', '2015-07-01', '2015-07-31', 'open', 1, 1500, 1100, 30),
('2', 'Project 2 ', 'This is project 2', '2015-08-03', '2015-07-22', 'closed ', 1, 1060, 1280, 65),
('3', 'Project3', 'fvffavfdvfadvfdvdf', '2015-09-01', '2015-09-24', 'open', 1, 1680, 1960, 90);

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
('2', 1),
('3', 1),
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
-- Table structure for table `project_sprint`
--

CREATE TABLE IF NOT EXISTS `project_sprint` (
  `sprint_id` int(11) NOT NULL,
  `project_id` varchar(500) NOT NULL,
  `name` varchar(500) NOT NULL,
  `description` varchar(500) NOT NULL,
  `starting_date` date NOT NULL,
  `ending_date` date NOT NULL,
  `status` varchar(500) NOT NULL,
  `prority_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `project_sprint`
--

INSERT INTO `project_sprint` (`sprint_id`, `project_id`, `name`, `description`, `starting_date`, `ending_date`, `status`, `prority_id`) VALUES
(1, '1', 'Sprint 1', 'Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles,\n                      weebly ning heekya handango imeem plugg dopplr jibjab, movity\n                      jajah plickers sifteo edmodo ifttt zimbra. Babblely odeo kaboodle\n                      quora plaxo ideeli hulu weebly balihoo...', '2015-07-01', '2015-07-31', 'open', 1),
(2, '1', 'Sprint 2 ', 'This is Sprint 2', '2015-08-03', '2015-07-22', 'closed ', 1),
(3, '2', 'Sprint 1', 'This is Sprint 1', '2015-07-01', '2015-07-31', 'open', 1);

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
  `member_id` varchar(10) NOT NULL,
  `prority_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `testcase`
--

INSERT INTO `testcase` (`testcase_id`, `testsuites_id`, `description`, `status`, `pass`, `member_id`, `prority_id`) VALUES
(1, 1, 'This is testcase 1', 'passed', 1, '1', 2),
(2, 1, 'This is test case 2', 'failed', 1, '1', 1),
(3, 1, 'This is test case 3', 'failed', 0, '1', 2),
(4, 1, 'This is test case 4', 'passed', 1, '1', 1),
(5, 1, 'This is test case 5', 'failed', 1, '1', 1),
(6, 2, 'm h', 'passed', 1, '1', 1),
(7, 2, 'gdnf', 'failed', 2, '2', 2),
(8, 3, 'fc jckkcc', 'failed', 1, '1', 3),
(9, 3, 'jghgjhhjvgjcfhcghvhjgvgg', 'failed', 2, '2', 1),
(10, 1, 'test case 10', 'in progress', 2, '2', 2),
(11, 2, 'd gn gfnfznnzfgn fznf n', 'in progress', 1, '1', 3);

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
(1, '1', 'Test suite 1'),
(2, '2', 'bdgc'),
(3, '1', 'TestSuit 3');

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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `time_entries`
--

INSERT INTO `time_entries` (`time_entries_id`, `project_id`, `member_id`, `issue_id`, `assigned_hours`, `spent_hours`) VALUES
(1, '1', 1, 1, 120, 150);

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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`users_id`, `uername`, `firstName`, `lastName`, `password`, `email`, `role`) VALUES
(1, 'admin', 'admin', 'admin', 'AEE71079C5104F2E429802F324D8CF3AA1BC68D4034B58D6888EDE94B60D61E24E0BB961078264C2F8D7366247543295E0CBC9E5738CE11E76B9FAA7EFB07071', 'admin@admin.com', 'admin'),
(2, 'admin', 'admin', 'admin', 'admin', 'admin', 'admin'),
(3, 'Binalie', 'Binalie', 'Ravinga', '1', 'binalie@gmail.com', 'a'),
(4, 'chathu', 'Chathuri', 'Gamage', 'abc', 'chathu@gmail.com', 'manager');

--
-- Indexes for dumped tables
--

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
-- Indexes for table `project_sprint`
--
ALTER TABLE `project_sprint`
  ADD PRIMARY KEY (`sprint_id`), ADD KEY `fk_sp1` (`prority_id`), ADD KEY `fk_sp2` (`project_id`);

--
-- Indexes for table `severity`
--
ALTER TABLE `severity`
  ADD PRIMARY KEY (`severity_id`);

--
-- Indexes for table `testcase`
--
ALTER TABLE `testcase`
  ADD PRIMARY KEY (`testcase_id`), ADD KEY `fk_test1` (`testsuites_id`), ADD KEY `fk_test2` (`prority_id`);

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
  ADD PRIMARY KEY (`users_id`);

--
-- AUTO_INCREMENT for dumped tables
--

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
-- AUTO_INCREMENT for table `project_sprint`
--
ALTER TABLE `project_sprint`
  MODIFY `sprint_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `time_entries`
--
ALTER TABLE `time_entries`
  MODIFY `time_entries_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `users_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
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
-- Constraints for table `project_sprint`
--
ALTER TABLE `project_sprint`
ADD CONSTRAINT `fk_sp1` FOREIGN KEY (`prority_id`) REFERENCES `priority` (`priority_id`),
ADD CONSTRAINT `fk_sp2` FOREIGN KEY (`project_id`) REFERENCES `project` (`project_id`);

--
-- Constraints for table `testcase`
--
ALTER TABLE `testcase`
ADD CONSTRAINT `fk_test1` FOREIGN KEY (`testsuites_id`) REFERENCES `testsuites` (`testsuites_id`),
ADD CONSTRAINT `fk_test2` FOREIGN KEY (`prority_id`) REFERENCES `priority` (`priority_id`);

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
