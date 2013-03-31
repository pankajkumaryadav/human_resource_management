-- phpMyAdmin SQL Dump
-- version 2.9.2
-- http://www.phpmyadmin.net
-- 
-- Host: localhost
-- Generation Time: Mar 11, 2013 at 08:09 AM
-- Server version: 5.0.27
-- PHP Version: 5.2.1
-- 
-- Database: `human_resource_management`
-- 

-- --------------------------------------------------------

-- 
-- Table structure for table `candidate_verification`
-- 

CREATE TABLE `candidate_verification` (
  `id` tinyint(3) NOT NULL auto_increment COMMENT 'verification unique id',
  `user_id` int(11) NOT NULL COMMENT 'user id',
  `verification_code` varchar(25) NOT NULL COMMENT 'verification code',
  PRIMARY KEY  (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- 
-- Dumping data for table `candidate_verification`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `candidates`
-- 

CREATE TABLE `candidates` (
  `id` int(11) NOT NULL auto_increment COMMENT 'candidate unique id',
  `first_name` varchar(20) NOT NULL COMMENT 'candidate first name',
  `middle_name` varchar(20) NOT NULL COMMENT 'candidate middle name',
  `last_name` varchar(20) NOT NULL COMMENT 'candidate last name',
  `dob` date NOT NULL COMMENT 'candidate date of birth ',
  `permanent_address` varchar(255) NOT NULL COMMENT 'candidate permanent address',
  `temporary_address` varchar(255) NOT NULL COMMENT 'candidate temporary address',
  `gender` tinyint(3) NOT NULL COMMENT 'candidate gender ''male,''female''',
  `mobile_number` char(15) NOT NULL COMMENT 'candidate mobile number',
  `emergency_number` char(15) NOT NULL COMMENT 'candidate emergency contact number',
  `marital_status` tinyint(3) NOT NULL COMMENT 'candidate marital status',
  `other_course` varchar(100) default NULL COMMENT 'candidate other courses detail if any',
  `resume` varchar(110) NOT NULL COMMENT 'location of candidate''s resume',
  `photo` varchar(110) NOT NULL COMMENT 'location of candidate''s photo',
  `select_status` tinyint(3) NOT NULL COMMENT 'candidate selection status ''selected'',''rejected'',pending''',
  `other_degree` varchar(30) default NULL COMMENT 'candidate other degree description if any',
  `10th_percent` float(2,2) NOT NULL COMMENT 'candidate 10th percentage',
  `12th_percent` float(2,2) NOT NULL COMMENT 'candidate 12th percentage',
  `grad_percent` float(2,2) NOT NULL COMMENT 'candidate graduation percentage',
  `post_grad_percent` float(2,2) NOT NULL COMMENT 'candidate post graduation pecentage',
  `experience` text NOT NULL COMMENT 'experience of the candidate',
  `user_id` int(11) NOT NULL COMMENT 'candidate user id from users table',
  PRIMARY KEY  (`id`),
  KEY `user_id` (`user_id`),
  KEY `gender` (`gender`),
  KEY `marital_status` (`marital_status`),
  KEY `select_status` (`select_status`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='record of all the candidates applied for job post' AUTO_INCREMENT=2 ;

-- 
-- Dumping data for table `candidates`
-- 

INSERT INTO `candidates` (`id`, `first_name`, `middle_name`, `last_name`, `dob`, `permanent_address`, `temporary_address`, `gender`, `mobile_number`, `emergency_number`, `marital_status`, `other_course`, `resume`, `photo`, `select_status`, `other_degree`, `10th_percent`, `12th_percent`, `grad_percent`, `post_grad_percent`, `experience`, `user_id`) VALUES 
(1, ' Pankaj', 'Kumar', 'Yadav', '1988-09-21', 'JNU', 'JNU', 4, '1234567890', '1234567890', 7, NULL, '', '', 12, NULL, 0.99, 0.99, 0.99, 0.99, '', 7);

-- --------------------------------------------------------

-- 
-- Table structure for table `code_master`
-- 

CREATE TABLE `code_master` (
  `id` tinyint(3) NOT NULL auto_increment COMMENT 'code master unique id',
  `code_name` varchar(20) NOT NULL COMMENT 'code master field name ',
  `code_value` varchar(20) NOT NULL COMMENT 'code values ',
  `status` enum('0','1') NOT NULL default '0' COMMENT 'status of the code master fields ''0''  active ''1'' inactive',
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='code master table' AUTO_INCREMENT=28 ;

-- 
-- Dumping data for table `code_master`
-- 

INSERT INTO `code_master` (`id`, `code_name`, `code_value`, `status`) VALUES 
(1, 'user_type', 'admin', '0'),
(2, 'user_type', 'employee', '0'),
(3, 'user_type', 'candidate', '0'),
(4, 'gender', 'Male', '0'),
(5, 'gender', 'Female', '0'),
(6, 'marital_status', 'Single', '0'),
(7, 'marital_status', 'Married', '0'),
(8, 'marital_status', 'Separated/Divorced', '0'),
(9, 'marital_status', 'Widowed', '0'),
(10, 'select_status', 'Selected', '0'),
(11, 'select_status', 'Rejected', '0'),
(12, 'select_status', 'Pending', '0'),
(13, 'designation', 'Software Engineer', '0'),
(14, 'designation', 'Manager', '0'),
(15, 'designation', 'Project Manager', '0'),
(16, 'designation', 'Assistant', '0'),
(17, 'designation', 'Tester', '0'),
(18, 'designation', 'Accountant', '0'),
(19, 'designation', 'Receptionist', '0'),
(20, 'grievance_category', 'IT', '0'),
(21, 'grievance_category', 'Stationary', '0'),
(22, 'grievance_category', 'Salary', '0'),
(23, 'grievance_category', 'Canteen', '0'),
(24, 'grievance_category', 'Cab Facility', '0'),
(25, 'grievance_category', 'others', '0'),
(26, 'leave_category', 'cl', '0'),
(27, 'leave_category', 'el', '0');

-- --------------------------------------------------------

-- 
-- Table structure for table `departments`
-- 

CREATE TABLE `departments` (
  `id` int(11) NOT NULL auto_increment COMMENT 'department unique id ',
  `department_name` varchar(20) NOT NULL COMMENT 'department name ',
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='record of all the departments' AUTO_INCREMENT=9 ;

-- 
-- Dumping data for table `departments`
-- 

INSERT INTO `departments` (`id`, `department_name`) VALUES 
(1, 'IT'),
(2, 'HR '),
(3, 'Finance'),
(4, 'Testing'),
(5, 'Develpoment'),
(6, 'Accounts'),
(7, 'Sales'),
(8, 'Marketing');

-- --------------------------------------------------------

-- 
-- Table structure for table `employee_edit_details`
-- 

CREATE TABLE `employee_edit_details` (
  `id` int(11) NOT NULL auto_increment COMMENT 'temporary employee record id',
  `employee_id` int(11) NOT NULL COMMENT 'employees unique id referring from employees table ',
  `first_name` varchar(20) NOT NULL COMMENT 'employee first name',
  `middle_name` varchar(20) NOT NULL COMMENT 'employee middle name',
  `last_name` varchar(20) NOT NULL COMMENT 'employee last name',
  `permanent_address` varchar(30) NOT NULL COMMENT 'employee permanent address',
  `temporary_address` varchar(30) NOT NULL COMMENT 'employee temporary address',
  `mobile_number` char(15) NOT NULL COMMENT 'employee mobile number',
  `emergency_number` char(15) NOT NULL COMMENT 'employee emergency contact number',
  `marital_status` tinyint(3) NOT NULL COMMENT 'employee marital status',
  `update_status` enum('0','1') NOT NULL default '0' COMMENT 'employee update status ''0'' not updated ''1'' updated ',
  PRIMARY KEY  (`id`),
  KEY `employee_id` (`employee_id`),
  KEY `marital_status` (`marital_status`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='record of all the employees of the company' AUTO_INCREMENT=1 ;

-- 
-- Dumping data for table `employee_edit_details`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `employees`
-- 

CREATE TABLE `employees` (
  `id` int(11) NOT NULL auto_increment COMMENT 'employees unique id',
  `first_name` varchar(20) NOT NULL COMMENT 'employee first name',
  `middle_name` varchar(20) NOT NULL COMMENT 'employee middle name',
  `last_name` varchar(20) NOT NULL COMMENT 'employee last name',
  `dob` date NOT NULL COMMENT 'employee date of birth',
  `permanent_address` varchar(255) NOT NULL COMMENT 'employee permanent address',
  `temporary_address` varchar(255) NOT NULL COMMENT 'employee temporary address',
  `gender` tinyint(3) NOT NULL COMMENT 'employee gender ''male,''female''',
  `mobile_number` char(15) NOT NULL COMMENT 'employee mobile number',
  `emergency_number` char(15) NOT NULL COMMENT 'employee emergency contact number',
  `marital_status` tinyint(3) NOT NULL COMMENT 'employee marital status',
  `recent_qualification` varchar(10) NOT NULL COMMENT 'employee recent qualification',
  `salary` decimal(10,2) NOT NULL COMMENT 'employee salary',
  `department_id` int(11) NOT NULL COMMENT 'department unique id ',
  `hire_date` date NOT NULL COMMENT 'employee hire date',
  `termination_date` date default NULL COMMENT 'employee termination date',
  `retire_date` date default NULL COMMENT 'employee retirement date',
  `account_number` char(20) NOT NULL COMMENT 'employee account number',
  `user_id` int(11) NOT NULL COMMENT 'employee user id from users table',
  `designation` tinyint(3) NOT NULL COMMENT 'employee designation',
  PRIMARY KEY  (`id`),
  UNIQUE KEY `account_number` (`account_number`),
  KEY `department_id` (`department_id`),
  KEY `user_id` (`user_id`),
  KEY `marital_status` (`marital_status`),
  KEY `gender` (`gender`),
  KEY `designation` (`designation`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='record of all the employees of the company' AUTO_INCREMENT=4 ;

-- 
-- Dumping data for table `employees`
-- 

INSERT INTO `employees` (`id`, `first_name`, `middle_name`, `last_name`, `dob`, `permanent_address`, `temporary_address`, `gender`, `mobile_number`, `emergency_number`, `marital_status`, `recent_qualification`, `salary`, `department_id`, `hire_date`, `termination_date`, `retire_date`, `account_number`, `user_id`, `designation`) VALUES 
(1, 'Deepika', '', 'Solanki', '1990-09-30', 'WZ-697, New-Delhi,Delhi-110045', 'WZ-697, New-Delhi,Delhi-110045', 5, '8285719957', '9891014902', 6, 'MCA', '17000.00', 1, '2013-01-16', NULL, NULL, '31244325346456', 4, 13),
(2, 'Megha', '', 'Sahni', '1990-09-30', '2984 ,Ranjeet Nagar, New Delhi 110008', '2984 ,Ranjeet Nagar, New Delhi 110008', 5, '9811541165', '9310809098', 6, 'MCA', '17000.00', 1, '2013-01-16', NULL, NULL, '654635235424', 5, 13),
(3, 'Jasleen', 'Kaur', '', '1990-02-10', 'D-60,2nd Floor,Fateh Nagar,Jail Road,New Delhi,110018', 'D-60,2nd Floor,Fateh Nagar,Jail Road,New Delhi,110018', 5, '9868626889', '9810471472', 6, 'MCA', '99999999.99', 1, '2013-03-13', NULL, NULL, '11111333333', 6, 13);

-- --------------------------------------------------------

-- 
-- Table structure for table `grievances`
-- 

CREATE TABLE `grievances` (
  `id` int(11) NOT NULL auto_increment COMMENT 'grievance unique id',
  `employee_id` int(11) NOT NULL COMMENT 'employee unique id',
  `text` text NOT NULL COMMENT 'grievance text',
  `grievance_category` tinyint(3) NOT NULL COMMENT 'grievance category',
  `grievance_time` datetime NOT NULL COMMENT 'grievance date and time',
  `checked_time` datetime NOT NULL COMMENT 'grievance checked time',
  `response` text NOT NULL COMMENT 'grievance response text',
  `status` enum('0','1','2') NOT NULL default '0' COMMENT 'grievance status ''0'' pending reply ''1''  resolved ''2'' forwarded',
  `forwarded_from` varchar(30) NOT NULL COMMENT 'grievance handlers email id',
  PRIMARY KEY  (`id`),
  KEY `employee_id` (`employee_id`),
  KEY `grievance_category` (`grievance_category`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='record of  the complaints and request of employee' AUTO_INCREMENT=6 ;

-- 
-- Dumping data for table `grievances`
-- 

INSERT INTO `grievances` (`id`, `employee_id`, `text`, `grievance_category`, `grievance_time`, `checked_time`, `response`, `status`, `forwarded_from`) VALUES 
(1, 3, 'stationary is never supplied on time', 21, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '0', ''),
(2, 2, 'pc not working', 20, '2013-03-07 00:00:00', '2013-03-08 00:00:00', 'we will solve the problem', '1', ''),
(3, 2, 'notepad required', 21, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'collect from reception', '1', ''),
(4, 2, 'plz provide cab facility from noida city centre', 24, '2013-03-11 16:11:59', '0000-00-00 00:00:00', '', '0', ''),
(5, 3, 'bad food', 23, '2013-03-11 07:56:01', '0000-00-00 00:00:00', '', '0', '');

-- --------------------------------------------------------

-- 
-- Table structure for table `job_candidate`
-- 

CREATE TABLE `job_candidate` (
  `id` int(11) NOT NULL auto_increment,
  `candidate_id` int(11) NOT NULL COMMENT 'candidate unique id',
  `job_id` int(11) NOT NULL COMMENT 'job unique id',
  `submission_date` datetime NOT NULL COMMENT 'Date of application submission',
  `select_status` tinyint(3) NOT NULL COMMENT 'candidate selection status ''selected'',''rejected'',pending''  for the job',
  PRIMARY KEY  (`id`),
  KEY `candidate_id` (`candidate_id`),
  KEY `job_id` (`job_id`),
  KEY `select_status` (`select_status`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='record of candidate applied for which job and also their sel' AUTO_INCREMENT=1 ;

-- 
-- Dumping data for table `job_candidate`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `job_details`
-- 

CREATE TABLE `job_details` (
  `id` int(11) NOT NULL auto_increment COMMENT 'job unique id',
  `designation` tinyint(3) NOT NULL COMMENT 'job designation',
  `no_of_vacancies` smallint(6) NOT NULL COMMENT 'number of vacancies for the job',
  `criteria` text NOT NULL COMMENT 'job eligibility criteria',
  `offered_salary` decimal(10,2) NOT NULL COMMENT 'salary to be offered',
  `last_submission_date` datetime NOT NULL COMMENT 'last date of submission of applicaiton',
  `status` enum('0','1') NOT NULL default '0' COMMENT 'job status ''0'' opening ''1'' closed',
  PRIMARY KEY  (`id`),
  KEY `designation` (`designation`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- 
-- Dumping data for table `job_details`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `leave_applied`
-- 

CREATE TABLE `leave_applied` (
  `id` int(11) NOT NULL auto_increment COMMENT 'leave applied unique id',
  `employee_id` int(11) NOT NULL COMMENT 'employee unique id',
  `leave_category` tinyint(3) NOT NULL COMMENT 'leave category',
  `reason` text NOT NULL COMMENT 'leave reason',
  `applied_date` datetime NOT NULL COMMENT 'leave application date',
  `date_from` date NOT NULL COMMENT 'leave starting date',
  `till_date` date NOT NULL COMMENT 'leave ending date',
  `total_hours` float(2,2) default NULL COMMENT 'hours of leave',
  `status` enum('0','1') NOT NULL default '0' COMMENT 'leave status ''0'' not approved ''1'' approved',
  PRIMARY KEY  (`id`),
  KEY `employee_id` (`employee_id`),
  KEY `leave_category` (`leave_category`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='record of leave applications from employees' AUTO_INCREMENT=1 ;

-- 
-- Dumping data for table `leave_applied`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `leave_remaining`
-- 

CREATE TABLE `leave_remaining` (
  `id` int(11) NOT NULL auto_increment,
  `employee_id` int(11) NOT NULL COMMENT 'employee unique id',
  `remaining_cl` smallint(2) NOT NULL COMMENT 'remaining cl leaves',
  `remaining_el` smallint(2) NOT NULL COMMENT 'remaining el leaves',
  PRIMARY KEY  (`id`),
  KEY `employee_id` (`employee_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='remaining leave details of all the employees' AUTO_INCREMENT=1 ;

-- 
-- Dumping data for table `leave_remaining`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `payroll`
-- 

CREATE TABLE `payroll` (
  `id` int(11) NOT NULL auto_increment COMMENT 'payroll unique id',
  `employee_id` int(11) NOT NULL COMMENT 'employee unique id',
  `other` int(11) default NULL,
  PRIMARY KEY  (`id`),
  KEY `employee_id` (`employee_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- 
-- Dumping data for table `payroll`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `users`
-- 

CREATE TABLE `users` (
  `id` int(11) NOT NULL auto_increment COMMENT 'user unique id',
  `email_id` varchar(150) NOT NULL COMMENT 'user email id',
  `password` char(35) NOT NULL COMMENT 'user password',
  `user_type` tinyint(3) NOT NULL COMMENT 'user category',
  `status` enum('0','1') NOT NULL default '0' COMMENT 'user status ''0''active ''1''inactive ',
  PRIMARY KEY  (`id`),
  KEY `user_type` (`user_type`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

-- 
-- Dumping data for table `users`
-- 

INSERT INTO `users` (`id`, `email_id`, `password`, `user_type`, `status`) VALUES 
(1, 'admin@admin.com', 'admin', 1, '0'),
(2, 'candy@candy.com', 'candy', 3, '0'),
(3, 'employee@employee.com', 'employee', 2, '0'),
(4, 'deepika@employee.com', 'deepika', 2, '0'),
(5, 'megha@employee.com', 'megha', 2, '0'),
(6, 'jasleen@employee.com', 'jasleen', 2, '0'),
(7, 'pankaj@employee.com', 'pankaj', 3, '0');

-- 
-- Constraints for dumped tables
-- 

-- 
-- Constraints for table `candidate_verification`
-- 
ALTER TABLE `candidate_verification`
  ADD CONSTRAINT `candidate_verification_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

-- 
-- Constraints for table `candidates`
-- 
ALTER TABLE `candidates`
  ADD CONSTRAINT `candidates_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `candidates_ibfk_2` FOREIGN KEY (`gender`) REFERENCES `code_master` (`id`),
  ADD CONSTRAINT `candidates_ibfk_3` FOREIGN KEY (`marital_status`) REFERENCES `code_master` (`id`),
  ADD CONSTRAINT `candidates_ibfk_4` FOREIGN KEY (`select_status`) REFERENCES `code_master` (`id`);

-- 
-- Constraints for table `employee_edit_details`
-- 
ALTER TABLE `employee_edit_details`
  ADD CONSTRAINT `employee_edit_details_ibfk_1` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `employee_edit_details_ibfk_2` FOREIGN KEY (`marital_status`) REFERENCES `code_master` (`id`);

-- 
-- Constraints for table `employees`
-- 
ALTER TABLE `employees`
  ADD CONSTRAINT `employees_ibfk_1` FOREIGN KEY (`department_id`) REFERENCES `departments` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `employees_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `employees_ibfk_3` FOREIGN KEY (`marital_status`) REFERENCES `code_master` (`id`),
  ADD CONSTRAINT `employees_ibfk_4` FOREIGN KEY (`gender`) REFERENCES `code_master` (`id`),
  ADD CONSTRAINT `employees_ibfk_5` FOREIGN KEY (`designation`) REFERENCES `code_master` (`id`),
  ADD CONSTRAINT `employees_ibfk_6` FOREIGN KEY (`designation`) REFERENCES `code_master` (`id`);

-- 
-- Constraints for table `grievances`
-- 
ALTER TABLE `grievances`
  ADD CONSTRAINT `grievances_ibfk_1` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `grievances_ibfk_2` FOREIGN KEY (`grievance_category`) REFERENCES `code_master` (`id`);

-- 
-- Constraints for table `job_candidate`
-- 
ALTER TABLE `job_candidate`
  ADD CONSTRAINT `job_candidate_ibfk_1` FOREIGN KEY (`candidate_id`) REFERENCES `candidates` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `job_candidate_ibfk_2` FOREIGN KEY (`job_id`) REFERENCES `job_details` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `job_candidate_ibfk_3` FOREIGN KEY (`select_status`) REFERENCES `code_master` (`id`);

-- 
-- Constraints for table `job_details`
-- 
ALTER TABLE `job_details`
  ADD CONSTRAINT `job_details_ibfk_1` FOREIGN KEY (`designation`) REFERENCES `code_master` (`id`);

-- 
-- Constraints for table `leave_applied`
-- 
ALTER TABLE `leave_applied`
  ADD CONSTRAINT `leave_applied_ibfk_1` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `leave_applied_ibfk_2` FOREIGN KEY (`leave_category`) REFERENCES `code_master` (`id`);

-- 
-- Constraints for table `leave_remaining`
-- 
ALTER TABLE `leave_remaining`
  ADD CONSTRAINT `leave_remaining_ibfk_1` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

-- 
-- Constraints for table `payroll`
-- 
ALTER TABLE `payroll`
  ADD CONSTRAINT `payroll_ibfk_1` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`id`);

-- 
-- Constraints for table `users`
-- 
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`user_type`) REFERENCES `code_master` (`id`);
