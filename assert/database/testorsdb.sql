-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 13, 2015 at 06:37 PM
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
`chat_message_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `chat_messages`
--

INSERT INTO `chat_messages` (`chat_id`, `user_id`, `chat_message_content`, `create_date`, `chat_message_id`) VALUES
(1, 1, 'test message', '2015-09-12 19:52:08', 33),
(1, 2, 'Hi', '2015-09-13 07:44:56', 37),
(1, 15, 'Hi, Roledene', '2015-09-13 07:45:06', 38);

-- --------------------------------------------------------

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
('1', 'KT Innovation', 'Project for innovation of industry', '2015-07-01', '2015-07-31', 'open', 1, 1500, 1100, 30),
('2', 'QA dashboard', 'Quality assuarance handling based system', '2015-08-03', '2015-07-22', 'closed ', 1, 1060, 1280, 65),
('3', 'OS Innovation', 'Operating system inovation based system', '2015-09-01', '2015-09-24', 'open', 1, 1680, 1960, 90),
('4', 'Hot Bug Fix', 'Project for bug fixing', '2015-09-02', '2015-11-19', 'open', 2, 5800, 4600, 79);

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
('2', 1),
('3', 1),
('1', 2),
('1', 7);

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
  `testsuites_id` int(11) NOT NULL,
  `description` varchar(500) NOT NULL,
  `status` varchar(100) NOT NULL,
  `psb_status` varchar(200) NOT NULL,
  `pass` int(11) NOT NULL,
  `member_id` varchar(10) NOT NULL,
  `prority_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `testcase`
--

INSERT INTO `testcase` (`testcase_id`, `testsuites_id`, `description`, `status`, `psb_status`, `pass`, `member_id`, `prority_id`) VALUES
(1, 1, 'This is testcase 1', '0', 'passed', 1, '7', 2),
(2, 1, 'This is test case 2', '1', 'failed', 1, '7', 1),
(3, 1, 'This is test case 3', '0', 'failed', 0, '7', 2),
(4, 1, 'This is test case 4', '0', 'passed', 1, '7', 1),
(5, 1, 'This is test case 5', '0', 'failed', 1, '7', 1),
(6, 2, 'm h', '0', 'passed', 1, '7', 1),
(7, 2, 'gdnf', '1', 'failed', 2, '2', 2),
(8, 3, 'fc jckkcc', '1', 'failed', 1, '7', 3),
(9, 3, 'jghgjhhjvgjcfhcghvhjgvgg', '1', 'failed', 2, '2', 1),
(10, 1, 'test case 10', '1', 'in progress', 2, '2', 2),
(11, 2, 'd gn gfnfznnzfgn fznf n', '1', 'in progress', 1, '7', 3);

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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

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
(7, 'qa@qa.com', 'shan', 'shan', '0ee9611d0a40d13cb2ff4db4773056619478f295b91da6bd45a15fbcb6b3910b02a7b834cd21567483751512a367cdb79786005d1e2335400327648e927819bc', 'qa@qa.com', 'engineer');

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

ALTER TABLE `chats`
MODIFY `chat_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `chat_messages`
--
ALTER TABLE `chat_messages`
MODIFY `chat_message_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `member_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
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
-- AUTO_INCREMENT for table `time_entries`
--
ALTER TABLE `time_entries`
  MODIFY `time_entries_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `users_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- Constraints for dumped tables
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
