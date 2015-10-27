-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 27, 2015 at 06:16 AM
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
(1, 'KT Innovation', 2014, 'Jan', 5, 4, 0, 0, 13, 20, 1500, 1100),
(1, 'QA dashboard', 2014, 'Feb', 8, 5, 0, 0, 28, 30, 1060, 1280),
(1, 'OS Innovation', 2014, 'Mar', 8, 20, 0, 0, 27, 40, 1080, 1960),
(1, 'Hot Bug Fix', 2014, 'Dec', 27, 4, 0, 0, 42, 37, 5800, 4600);

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
`chat_message_id` int(11) NOT NULL,
  `read` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `chat_messages`
--

INSERT INTO `chat_messages` (`chat_id`, `user_id`, `chat_message_content`, `create_date`, `chat_message_id`, `read`) VALUES
(1, 1, 'test message', '2015-09-12 19:52:08', 33, 0),
(1, 2, 'Hi', '2015-09-13 07:44:56', 37, 0),
(1, 15, 'Hi, Roledene', '2015-09-13 07:45:06', 38, 0),
(1, 1, 'ish', '2015-09-13 17:25:39', 39, 0),
(1, 6, 'hellojio', '2015-09-13 17:28:45', 40, 0),
(1, 1, 'jggt', '2015-09-13 17:28:54', 41, 0),
(1, 1, 'Hi there', '2015-10-27 05:13:48', 42, 0);

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
(1, '1', 1, 1, 'yhlgu', 1, 1, 'open'),
(2, '1', 7, 2, 'bgdbfgn', 2, 1, 'open'),
(3, '2', 7, 4, 'davdv', 3, 1, 'open');

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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`member_id`, `email`, `firstName`, `lastName`, `role`) VALUES
(1, 'abc@gmail.com', 'abc', 'abc', 'QA Engineer'),
(2, 'chathu@gmail.com', 'Chtahuri', 'Gamage', 'QAEngineer'),
(7, 'shan@shan.com', 'shan', 'shan', 'engineer');

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE IF NOT EXISTS `notifications` (
`id` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `projectId` int(11) NOT NULL,
  `title` varchar(500) NOT NULL,
  `notification` varchar(5000) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` varchar(500) NOT NULL,
  `read` tinyint(1) NOT NULL DEFAULT '0',
  `navigate_url` varchar(500) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `userId`, `projectId`, `title`, `notification`, `time`, `status`, `read`, `navigate_url`) VALUES
(1, 1, 1, 'testNofiyTitle', 'this is a test nofiticaion', '2015-10-25 06:57:31', 'created', 0, 'http://localhost:82/QADash/public_html/engineer/notification/getUnreadNotifications'),
(2, 2, 1, 'testNofiyTitle', 'this is a test nofiticaion', '2015-10-25 07:19:11', 'created', 0, 'http://localhost:82/QADash/public_html/engineer/notification/getUnreadNotifications'),
(3, 1, 2, 'testNofiyTitle', 'this is a test nofiticaion', '2015-10-25 07:19:20', 'created', 0, 'http://localhost:82/QADash/public_html/engineer/notification/getUnreadNotifications'),
(4, 1, 1, 'testNofiyTitle', 'this is a test nofiticaion', '2015-10-25 07:35:55', 'created', 0, 'http://localhost:82/QADash/public_html/engineer/notification/getUnreadNotifications');

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
  `progress` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `project`
--

INSERT INTO `project` (`project_id`, `name`, `description`, `starting_date`, `ending_date`, `status`, `prority_id`, `totalhours`, `spentours`, `progress`) VALUES
('01', 'g', 'ged', '2015-10-20', '2015-10-21', 'ged', 1, NULL, NULL, NULL),
('011', 'ii', 'i8', '2015-09-28', '2015-10-21', 'open', 1, NULL, NULL, NULL),
('012', 'gf', 'gf', '2015-10-08', '2015-10-14', 'open', 2, NULL, NULL, NULL),
('1', 'KT Innovation', 'Project for innovation of industry', '2015-07-01', '2015-07-31', 'open', 1, 1500, 1100, 30),
('2', 'QA dashboard', 'Quality assuarance handling based system', '2015-08-03', '2015-07-22', 'closed ', 1, 1060, 1280, 65),
('3', 'OS Innovation', 'Operating system inovation based system', '2015-09-01', '2015-09-24', 'open', 1, 1680, 1960, 90),
('4', 'Hot Bug Fix', 'Project for bug fixing', '2015-09-02', '2015-11-19', 'open', 2, 5800, 4600, 79),
('da', 'dadav', 'dv', '2015-10-21', '2015-10-27', 'open', 1, NULL, NULL, NULL),
('dbb', 'd', 'b', '2015-10-20', '2015-10-06', 'open', 1, NULL, NULL, NULL),
('fv', 'fv', 'b', '2015-10-19', '2015-10-07', 'open', 1, NULL, NULL, NULL),
('v', 'hg', 'hg', '2015-10-21', '2015-10-13', 'hg', 1, NULL, NULL, NULL),
('y', 'yn', 'nt', '2015-10-19', '2015-10-07', 'nt', 1, NULL, NULL, NULL);

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
('3', 1),
('1', 2),
('01', 5),
('01', 7),
('01', 8);

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
  `description` varchar(2000) NOT NULL,
  `starting_date` date NOT NULL,
  `ending_date` date NOT NULL,
  `status` varchar(500) NOT NULL,
  `prority_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `project_sprint`
--

INSERT INTO `project_sprint` (`sprint_id`, `project_id`, `name`, `description`, `starting_date`, `ending_date`, `status`, `prority_id`) VALUES
(1, '1', 'Sprint 1', 'Go to the Backlog of your board to prioritise the issues in your backlog and allocate them to sprints. You can click a sprint''s name to view the issues belonging to that sprint.', '2015-07-01', '2015-07-31', 'open', 1),
(2, '1', 'Sprint 2 ', 'The key to understanding the difference between LMS and other computer education terms is to understand the systemic nature of LMS. LMS is the framework that handles all aspects of the learning process. An LMS is the infrastructure that delivers and manages instructional content, identifies and assesses individual and organizational learning or training goals, tracks the progress towards meeting those goals, and collects and presents data for supervising the learning process of the organization as a whole.[4] A Learning Management System delivers content but also handles registering for courses, course administration, skills gap analysis, tracking, and reporting', '2015-08-03', '2015-07-22', 'closed ', 1),
(3, '2', 'Sprint 1', 'Go to the Backlog of your board to prioritise the issues in your backlog and allocate them to sprints. You can click a sprint''s name to view the issues belonging to that sprint.', '2015-07-01', '2015-07-31', 'open', 1),
(4, '1', 'Sprint 3', 'Note that failed projects, and projects running over budget, are not necessarily the sole fault of the employees or businesses creating the software. In some cases, problems may be due partly to problems with the purchasing organisation, including poor requirements, over-ambitious requirements, unnecessary requirements, poor contract drafting, poor contract management, poor end-user training, or poor operational management.', '2015-07-14', '2015-11-25', 'open', 2);

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
  `testcase_code` varchar(30) NOT NULL,
  `testsuites_id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `description` varchar(500) NOT NULL,
  `status` varchar(100) DEFAULT NULL,
  `psb_status` varchar(200) DEFAULT NULL,
  `open` int(11) DEFAULT NULL,
  `pass` int(11) DEFAULT NULL,
  `member_id` varchar(10) DEFAULT NULL,
  `prority_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `testcase`
--

INSERT INTO `testcase` (`testcase_id`, `testcase_code`, `testsuites_id`, `title`, `description`, `status`, `psb_status`, `open`, `pass`, `member_id`, `prority_id`) VALUES
(11, 'jh,', 15, 'h,j', 'hj', NULL, 'Review Passed', 1, 1, '7', 1),
(12, 'nh ', 15, 'h', 'hng', NULL, 'Review Passed', 0, 0, '7', 1),
(13, 'h', 16, 'v vc', 'hj', NULL, 'Assigned To Review', 1, 1, NULL, 1),
(14, '012', 19, 'kuyl', 'ily', NULL, NULL, NULL, NULL, NULL, 1),
(15, 'my', 20, 'kt', 'tk', NULL, NULL, NULL, NULL, NULL, 1),
(16, 'fd', 20, 'fv', 'fv', NULL, NULL, NULL, NULL, NULL, 1),
(17, 'ewf', 15, 'few', 'fw', NULL, 'Review Passed', NULL, NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `testcase_step`
--

CREATE TABLE IF NOT EXISTS `testcase_step` (
`testcaseStep_id` int(11) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `expectedResult` varchar(500) NOT NULL,
  `testcase_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `testcase_step`
--

INSERT INTO `testcase_step` (`testcaseStep_id`, `description`, `expectedResult`, `testcase_id`) VALUES
(7, 'gf ', 'bv', 12),
(8, 'df', 'ds', 13),
(9, 'thty', 'yth', 14),
(11, 'yhm', 'gh,', 11);

-- --------------------------------------------------------

--
-- Table structure for table `testsuites`
--

CREATE TABLE IF NOT EXISTS `testsuites` (
`testsuites_id` int(11) NOT NULL,
  `testsuites_code` varchar(30) NOT NULL,
  `project_id` varchar(500) NOT NULL,
  `name` varchar(500) NOT NULL,
  `assignedToReview` int(11) DEFAULT NULL,
  `reviewed` int(11) DEFAULT NULL,
  `Priority` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `testsuites`
--

INSERT INTO `testsuites` (`testsuites_id`, `testsuites_code`, `project_id`, `name`, `assignedToReview`, `reviewed`, `Priority`) VALUES
(15, '011', '01', 'hh', 7, 1, 1),
(16, 'ff', 'v', 'g', NULL, NULL, 1),
(17, 'fd', 'y', 'dg', NULL, NULL, 1),
(18, 'vfs', 'dbb', 'fv', NULL, NULL, 2),
(19, '01', '012', 'ikli', NULL, NULL, 1),
(20, 'ui', '011', 'ui', NULL, NULL, 2),
(21, 'f', '01', 'e', 2, NULL, 1),
(22, 'fggg', '01', 'gf', 2, NULL, 1);

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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `time_entries`
--

INSERT INTO `time_entries` (`time_entries_id`, `project_id`, `member_id`, `issue_id`, `assigned_hours`, `spent_hours`) VALUES
(1, '1', 7, 1, 120, 150),
(2, '2', 7, 2, 150, 170),
(3, '3', 7, 2, 250, 246);

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
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`users_id`, `uername`, `firstName`, `lastName`, `password`, `email`, `role`) VALUES
(1, 'admin', 'admin', 'admin', 'AEE71079C5104F2E429802F324D8CF3AA1BC68D4034B58D6888EDE94B60D61E24E0BB961078264C2F8D7366247543295E0CBC9E5738CE11E76B9FAA7EFB07071', 'admin@admin.com', 'admin'),
(2, 'admin', 'admin', 'admin', 'admin', 'admin', 'admin'),
(3, 'Binalie', 'Binalie', 'Ravinga', '1', 'binalie@gmail.com', 'a'),
(4, 'chathu', 'Chathuri', 'Gamage', 'abc', 'chathu@gmail.com', 'manager'),
(5, 'sasika', 'sasika', 'sasika', '0da6e682b1f8691bd5e89449a6b20219ef19d03d25d475c7a383c13a38c059e39707d82eb5e898aa17c32c44acd173affaaf1ad4d5d1c888bc86b2009e1fa272', 'sasika@gmail.com', 'engineer'),
(6, 'pm@pm.com', 'ish', 'ish', '1e265773220449710e061c3d39e517a6c9c15f06e466c2207610e0ab02395464a9b8d945ff35c4d78fc9ab945525cf013904da644c7171b3b7c6f440161a2e6c', 'pm@pm.com', 'manager'),
(7, 'qa@qa.com', 'shan', 'shan', '0ee9611d0a40d13cb2ff4db4773056619478f295b91da6bd45a15fbcb6b3910b02a7b834cd21567483751512a367cdb79786005d1e2335400327648e927819bc', 'qa@qa.com', 'engineer'),
(8, 'shh', 'shh', 'sh', '128e71f78b0d562615278b5c8c15605b92fe40fae22e671823645714fb495183b946b65fea32825a50ebdb7002991217387574128731628579e2c72e63bee45e', 'qa2@qa.com', 'engineer');

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
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
 ADD PRIMARY KEY (`id`);

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
 ADD PRIMARY KEY (`testcaseStep_id`);

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
-- AUTO_INCREMENT for table `chats`
--
ALTER TABLE `chats`
MODIFY `chat_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `chat_messages`
--
ALTER TABLE `chat_messages`
MODIFY `chat_message_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=43;
--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
MODIFY `member_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `project_requests`
--
ALTER TABLE `project_requests`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `project_sprint`
--
ALTER TABLE `project_sprint`
MODIFY `sprint_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `testcase`
--
ALTER TABLE `testcase`
MODIFY `testcase_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `testcase_step`
--
ALTER TABLE `testcase_step`
MODIFY `testcaseStep_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `testsuites`
--
ALTER TABLE `testsuites`
MODIFY `testsuites_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `time_entries`
--
ALTER TABLE `time_entries`
MODIFY `time_entries_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `users_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
