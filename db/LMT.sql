-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 07, 2017 at 11:49 AM
-- Server version: 5.7.19-0ubuntu0.16.04.1
-- PHP Version: 7.0.15-0ubuntu0.16.04.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `LMT`
--

-- --------------------------------------------------------

--
-- Stand-in structure for view `commision_summary_by_date`
--
CREATE TABLE `commision_summary_by_date` (
`total` decimal(32,0)
,`send_date` date
,`sending_branch` varchar(50)
);

-- --------------------------------------------------------

--
-- Table structure for table `tbloperation`
--

CREATE TABLE `tbloperation` (
  `operation_id` int(11) NOT NULL,
  `operation_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbloperation`
--

INSERT INTO `tbloperation` (`operation_id`, `operation_name`) VALUES
(1, 'Updated');

-- --------------------------------------------------------

--
-- Table structure for table `tbloperationlog`
--

CREATE TABLE `tbloperationlog` (
  `operation_log_id` int(11) NOT NULL,
  `fk_operation_id` int(11) NOT NULL,
  `created_by` varchar(50) NOT NULL,
  `created_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_branchs`
--

CREATE TABLE `tbl_branchs` (
  `branch_id` int(11) NOT NULL,
  `branch_name` varchar(50) NOT NULL,
  `branch_code` varchar(50) NOT NULL,
  `remark` varchar(250) NOT NULL,
  `b_status` varchar(50) NOT NULL,
  `b_created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_branchs`
--

INSERT INTO `tbl_branchs` (`branch_id`, `branch_name`, `branch_code`, `remark`, `b_status`, `b_created_at`) VALUES
(4, 'Goday', 'god', 'test', 'active', '2017-07-25 23:38:33'),
(5, 'Jijiga', 'jij', 'Test', 'active', '2017-07-26 06:37:31'),
(6, 'Addis Abeba', 'aa', 'test', 'active', '2017-07-28 08:03:41');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_payments`
--

CREATE TABLE `tbl_payments` (
  `payment_id` int(11) NOT NULL,
  `fk_transfer_id` int(11) NOT NULL,
  `p_branch` varchar(50) NOT NULL,
  `p_created_by` int(11) NOT NULL,
  `p_created_at` datetime NOT NULL,
  `p_updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_payments`
--

INSERT INTO `tbl_payments` (`payment_id`, `fk_transfer_id`, `p_branch`, `p_created_by`, `p_created_at`, `p_updated_at`) VALUES
(3, 17, 'Jijiga', 14, '2017-08-07 21:47:47', '2017-08-07 21:47:47'),
(4, 18, 'Goday', 13, '2017-08-07 22:06:07', '2017-08-07 22:06:07');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_rate_setting`
--

CREATE TABLE `tbl_rate_setting` (
  `rat_id` int(11) NOT NULL,
  `rate_value` float NOT NULL,
  `r_created_at` datetime NOT NULL,
  `r_updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_rate_setting`
--

INSERT INTO `tbl_rate_setting` (`rat_id`, `rate_value`, `r_created_at`, `r_updated_at`) VALUES
(1, 0.05, '2017-07-21 11:00:00', '2017-07-28 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sender_profile`
--

CREATE TABLE `tbl_sender_profile` (
  `sender_id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `middle_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `sender_gender` varchar(50) NOT NULL,
  `sender_kebele` varchar(50) NOT NULL,
  `sender_tel` varchar(50) NOT NULL,
  `sender_id_no` varchar(50) NOT NULL,
  `sender_house_number` varchar(50) NOT NULL,
  `sp_created_at` datetime NOT NULL,
  `sp_updated_at` datetime NOT NULL,
  `sp_user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_sender_profile`
--

INSERT INTO `tbl_sender_profile` (`sender_id`, `first_name`, `middle_name`, `last_name`, `sender_gender`, `sender_kebele`, `sender_tel`, `sender_id_no`, `sender_house_number`, `sp_created_at`, `sp_updated_at`, `sp_user_id`) VALUES
(128, 'YONAS', 'GEBREMARIAM', 'ENGIDA', 'Male', '01919', '0930015100', '', '', '2017-08-03 20:56:48', '0000-00-00 00:00:00', 13),
(129, 'Haile', 'KEbede', 'Gbre', 'Male', '', '09300151001', '', '', '2017-08-03 22:04:24', '0000-00-00 00:00:00', 14);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_transfer_money`
--

CREATE TABLE `tbl_transfer_money` (
  `transfer_money_id` int(11) NOT NULL,
  `fk_sender_id` int(11) NOT NULL,
  `rcvr_fname` varchar(50) NOT NULL,
  `rcvr_mname` varchar(50) NOT NULL,
  `rcvr_lname` varchar(50) NOT NULL,
  `rcvr_gender` varchar(50) NOT NULL,
  `rcvr_house_number` varchar(50) NOT NULL,
  `rcvr_kebele` varchar(50) NOT NULL,
  `rcvr_tel` varchar(50) NOT NULL,
  `rcvr_id_no` varchar(50) NOT NULL,
  `secuirity_code` varchar(50) NOT NULL,
  `amount` decimal(10,0) NOT NULL,
  `net_amount` decimal(10,0) NOT NULL,
  `rate` double NOT NULL,
  `commision_amount` decimal(10,0) NOT NULL,
  `purpose` varchar(50) NOT NULL,
  `receiving_branch` varchar(50) NOT NULL,
  `sending_branch` varchar(50) NOT NULL,
  `send_date` datetime NOT NULL,
  `sending_staff` varchar(50) NOT NULL,
  `approver` varchar(50) NOT NULL,
  `tm_created_at` datetime NOT NULL,
  `tm_updated_at` datetime NOT NULL,
  `tm_user_id` int(11) NOT NULL,
  `tm_status` varchar(50) NOT NULL,
  `t_aproved_by` varchar(50) NOT NULL,
  `aprover_id` int(11) NOT NULL,
  `t_aproved_at` datetime NOT NULL,
  `aprove_status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_transfer_money`
--

INSERT INTO `tbl_transfer_money` (`transfer_money_id`, `fk_sender_id`, `rcvr_fname`, `rcvr_mname`, `rcvr_lname`, `rcvr_gender`, `rcvr_house_number`, `rcvr_kebele`, `rcvr_tel`, `rcvr_id_no`, `secuirity_code`, `amount`, `net_amount`, `rate`, `commision_amount`, `purpose`, `receiving_branch`, `sending_branch`, `send_date`, `sending_staff`, `approver`, `tm_created_at`, `tm_updated_at`, `tm_user_id`, `tm_status`, `t_aproved_by`, `aprover_id`, `t_aproved_at`, `aprove_status`) VALUES
(17, 128, 'ABEBE', 'KEBEDE', 'ENGIDA', 'Male', '', '', '091120409876', '', 'god1857133267', '1000', '1000', 0.05, '50', 'Family Support', 'Jijiga', 'Goday', '2017-08-07 20:59:38', '13', 'approver', '2017-08-07 20:59:38', '0000-00-00 00:00:00', 13, 'paid', 'a', 13, '2017-08-03 21:47:17', 'aprove'),
(18, 129, 'ABEBE', 'KEBEDE', 'ENGIDA', 'Male', '', '', '09300161900', '', 'jij2069750477', '300', '285', 0.05, '15', 'Family Support', 'Goday', 'Jijiga', '2017-08-07 22:04:24', '14', 'approver', '2017-08-07 22:04:24', '0000-00-00 00:00:00', 14, 'paid', 'Yonas', 14, '2017-08-03 22:04:39', 'aprove'),
(19, 128, 'ABEBE', 'KEBEDE', 'ENGIDA', 'Male', '', '', '09300161900', '', 'god311432434', '474857484', '474857484', 0.05, '23742874', 'Family Support', 'Jijiga', 'Goday', '2017-08-07 22:08:08', '13', 'approver', '2017-08-07 22:08:08', '0000-00-00 00:00:00', 13, 'unpaid', 'a', 13, '2017-08-03 22:08:58', 'aprove'),
(20, 128, 'fkjkfg', 'fkf', 'fgkf', 'Female', '', '0018jm', '09300161900', '', 'god1612808429', '200', '190', 0.05, '10', 'Family Support', 'Goday', 'Goday', '2017-08-07 18:32:09', '13', 'approver', '2017-08-07 18:32:09', '0000-00-00 00:00:00', 13, 'unpaid', '', 0, '0000-00-00 00:00:00', 'notaprove');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `user_id` int(11) NOT NULL,
  `staff_id` varchar(50) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `tel` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `u_branch` int(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  `u_created_at` datetime NOT NULL,
  `u_updated_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`user_id`, `staff_id`, `first_name`, `last_name`, `user_name`, `password`, `tel`, `email`, `u_branch`, `status`, `u_created_at`, `u_updated_at`) VALUES
(12, '8940', 'YONAS', 'Engida', 'Yonas3', 'dc06698f0e2e75751545455899adccc3', '0930015100', 'yengida@gmail.com', 5, 'inactive', '2017-07-26 07:08:50', 2017),
(13, '5o4o4', 'YONAS', 'dsdksc', 'a', 'dc06698f0e2e75751545455899adccc3', '0930015100', 'yengida@gmail.com', 4, 'active', '2017-07-26 07:46:19', 2017),
(14, '9040', 'YONAS', 'ENgida', 'Yonas', 'dc06698f0e2e75751545455899adccc3', '0930015100', 'yengida@gmail.com', 5, 'active', '2017-07-26 07:47:51', 2017),
(15, '89401', 'YONAS', 'ENgida', 'Yonas2', 'dc06698f0e2e75751545455899adccc3', '0930015100', 'yengida@gmail.com', 6, 'active', '2017-07-26 08:17:57', 2017),
(16, '009101', 'GEBREMARIAM', 'KEBEDE', 'user2', 'dc06698f0e2e75751545455899adccc3', '0930015100', 'yengida@gmail.com', 4, 'inactive', '2017-07-26 22:11:20', 2017);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_commision_summary`
--
CREATE TABLE `view_commision_summary` (
`tota_commision` decimal(32,0)
,`sending_branch` varchar(50)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_payments`
--
CREATE TABLE `view_payments` (
`payment_id` int(11)
,`fk_transfer_id` int(11)
,`p_branch` varchar(50)
,`p_created_by` int(11)
,`p_created_at` date
,`p_updated_at` datetime
,`transfer_money_id` int(11)
,`fk_sender_id` int(11)
,`rcvr_fname` varchar(50)
,`rcvr_mname` varchar(50)
,`rcvr_lname` varchar(50)
,`rcvr_gender` varchar(50)
,`rcvr_house_number` varchar(50)
,`rcvr_kebele` varchar(50)
,`rcvr_tel` varchar(50)
,`rcvr_id_no` varchar(50)
,`secuirity_code` varchar(50)
,`amount` decimal(10,0)
,`rate` double
,`commision_amount` decimal(10,0)
,`purpose` varchar(50)
,`receiving_branch` varchar(50)
,`sending_branch` varchar(50)
,`send_date` datetime
,`sending_staff` varchar(50)
,`approver` varchar(50)
,`tm_created_at` datetime
,`tm_updated_at` datetime
,`tm_user_id` int(11)
,`tm_status` varchar(50)
,`sender_id` int(11)
,`first_name` varchar(50)
,`middle_name` varchar(50)
,`last_name` varchar(50)
,`sender_gender` varchar(50)
,`sender_kebele` varchar(50)
,`sender_tel` varchar(50)
,`sender_id_no` varchar(50)
,`sender_house_number` varchar(50)
,`sp_created_at` datetime
,`sp_updated_at` datetime
,`sp_user_id` int(11)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_payment_summary`
--
CREATE TABLE `view_payment_summary` (
`total_payment` decimal(32,0)
,`receiving_branch` varchar(50)
,`payment_date` date
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_summary_report`
--
CREATE TABLE `view_summary_report` (
`total` decimal(32,0)
,`tm_status` varchar(50)
,`receiving_branch` varchar(50)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_today_receive`
--
CREATE TABLE `view_today_receive` (
`receiving_branch` varchar(50)
,`receive_total` decimal(32,0)
,`Total_reciever` bigint(21)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_today_transfer`
--
CREATE TABLE `view_today_transfer` (
`sending_branch` varchar(50)
,`send_total` decimal(32,0)
,`commision` decimal(32,0)
,`Total_Sender` bigint(21)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_transfer_detial`
--
CREATE TABLE `view_transfer_detial` (
`sender_id` int(11)
,`first_name` varchar(50)
,`middle_name` varchar(50)
,`last_name` varchar(50)
,`sender_gender` varchar(50)
,`sender_kebele` varchar(50)
,`sender_tel` varchar(50)
,`sender_id_no` varchar(50)
,`sender_house_number` varchar(50)
,`sp_created_at` datetime
,`sp_updated_at` datetime
,`sp_user_id` int(11)
,`transfer_money_id` int(11)
,`fk_sender_id` int(11)
,`rcvr_fname` varchar(50)
,`rcvr_mname` varchar(50)
,`rcvr_lname` varchar(50)
,`rcvr_gender` varchar(50)
,`rcvr_house_number` varchar(50)
,`rcvr_kebele` varchar(50)
,`rcvr_tel` varchar(50)
,`sending_branch` varchar(50)
,`rcvr_id_no` varchar(50)
,`secuirity_code` varchar(50)
,`amount` decimal(10,0)
,`rate` double
,`commision_amount` decimal(10,0)
,`purpose` varchar(50)
,`receiving_branch` varchar(50)
,`tm_status` varchar(50)
,`send_date` datetime
,`sending_staff` varchar(50)
,`approver` varchar(50)
,`tm_created_at` date
,`tm_updated_at` datetime
,`tm_user_id` int(11)
,`aprove_status` varchar(50)
,`t_aproved_at` datetime
,`aprover_id` int(11)
,`net_amount` decimal(10,0)
,`t_aproved_by` varchar(50)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_transfer_summary_by_date`
--
CREATE TABLE `view_transfer_summary_by_date` (
`total` decimal(32,0)
,`receiving_branch` varchar(50)
,`sending_branch` varchar(50)
,`status` varchar(50)
,`send_date` date
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_users`
--
CREATE TABLE `view_users` (
`user_id` int(11)
,`first_name` varchar(50)
,`last_name` varchar(50)
,`staff_id` varchar(50)
,`user_name` varchar(50)
,`password` varchar(50)
,`tel` varchar(50)
,`email` varchar(50)
,`u_branch` int(50)
,`status` varchar(50)
,`u_created_at` datetime
,`u_updated_at` int(11)
,`branch_id` int(11)
,`branch_name` varchar(50)
,`branch_code` varchar(50)
,`remark` varchar(250)
);

-- --------------------------------------------------------

--
-- Structure for view `commision_summary_by_date`
--
DROP TABLE IF EXISTS `commision_summary_by_date`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `commision_summary_by_date`  AS  select sum(`tbl_transfer_money`.`commision_amount`) AS `total`,cast(`tbl_transfer_money`.`send_date` as date) AS `send_date`,`tbl_transfer_money`.`sending_branch` AS `sending_branch` from `tbl_transfer_money` group by `tbl_transfer_money`.`sending_branch`,cast(`tbl_transfer_money`.`send_date` as date) ;

-- --------------------------------------------------------

--
-- Structure for view `view_commision_summary`
--
DROP TABLE IF EXISTS `view_commision_summary`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_commision_summary`  AS  select sum(`tbl_transfer_money`.`commision_amount`) AS `tota_commision`,`tbl_transfer_money`.`sending_branch` AS `sending_branch` from `tbl_transfer_money` group by `tbl_transfer_money`.`sending_branch` ;

-- --------------------------------------------------------

--
-- Structure for view `view_payments`
--
DROP TABLE IF EXISTS `view_payments`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_payments`  AS  select `tbl_payments`.`payment_id` AS `payment_id`,`tbl_payments`.`fk_transfer_id` AS `fk_transfer_id`,`tbl_payments`.`p_branch` AS `p_branch`,`tbl_payments`.`p_created_by` AS `p_created_by`,cast(`tbl_payments`.`p_created_at` as date) AS `p_created_at`,`tbl_payments`.`p_updated_at` AS `p_updated_at`,`tbl_transfer_money`.`transfer_money_id` AS `transfer_money_id`,`tbl_transfer_money`.`fk_sender_id` AS `fk_sender_id`,`tbl_transfer_money`.`rcvr_fname` AS `rcvr_fname`,`tbl_transfer_money`.`rcvr_mname` AS `rcvr_mname`,`tbl_transfer_money`.`rcvr_lname` AS `rcvr_lname`,`tbl_transfer_money`.`rcvr_gender` AS `rcvr_gender`,`tbl_transfer_money`.`rcvr_house_number` AS `rcvr_house_number`,`tbl_transfer_money`.`rcvr_kebele` AS `rcvr_kebele`,`tbl_transfer_money`.`rcvr_tel` AS `rcvr_tel`,`tbl_transfer_money`.`rcvr_id_no` AS `rcvr_id_no`,`tbl_transfer_money`.`secuirity_code` AS `secuirity_code`,`tbl_transfer_money`.`net_amount` AS `amount`,`tbl_transfer_money`.`rate` AS `rate`,`tbl_transfer_money`.`commision_amount` AS `commision_amount`,`tbl_transfer_money`.`purpose` AS `purpose`,`tbl_transfer_money`.`receiving_branch` AS `receiving_branch`,`tbl_transfer_money`.`sending_branch` AS `sending_branch`,`tbl_transfer_money`.`send_date` AS `send_date`,`tbl_transfer_money`.`sending_staff` AS `sending_staff`,`tbl_transfer_money`.`approver` AS `approver`,`tbl_transfer_money`.`tm_created_at` AS `tm_created_at`,`tbl_transfer_money`.`tm_updated_at` AS `tm_updated_at`,`tbl_transfer_money`.`tm_user_id` AS `tm_user_id`,`tbl_transfer_money`.`tm_status` AS `tm_status`,`tbl_sender_profile`.`sender_id` AS `sender_id`,`tbl_sender_profile`.`first_name` AS `first_name`,`tbl_sender_profile`.`middle_name` AS `middle_name`,`tbl_sender_profile`.`last_name` AS `last_name`,`tbl_sender_profile`.`sender_gender` AS `sender_gender`,`tbl_sender_profile`.`sender_kebele` AS `sender_kebele`,`tbl_sender_profile`.`sender_tel` AS `sender_tel`,`tbl_sender_profile`.`sender_id_no` AS `sender_id_no`,`tbl_sender_profile`.`sender_house_number` AS `sender_house_number`,`tbl_sender_profile`.`sp_created_at` AS `sp_created_at`,`tbl_sender_profile`.`sp_updated_at` AS `sp_updated_at`,`tbl_sender_profile`.`sp_user_id` AS `sp_user_id` from ((`tbl_payments` join `tbl_transfer_money`) join `tbl_sender_profile`) where ((`tbl_payments`.`fk_transfer_id` = `tbl_transfer_money`.`transfer_money_id`) and (`tbl_transfer_money`.`fk_sender_id` = `tbl_sender_profile`.`sender_id`)) ;

-- --------------------------------------------------------

--
-- Structure for view `view_payment_summary`
--
DROP TABLE IF EXISTS `view_payment_summary`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_payment_summary`  AS  select sum(`view_payments`.`amount`) AS `total_payment`,`view_payments`.`receiving_branch` AS `receiving_branch`,cast(`view_payments`.`p_created_at` as date) AS `payment_date` from `view_payments` group by `view_payments`.`receiving_branch`,cast(`view_payments`.`p_created_at` as date) ;

-- --------------------------------------------------------

--
-- Structure for view `view_summary_report`
--
DROP TABLE IF EXISTS `view_summary_report`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_summary_report`  AS  select sum(`view_transfer_detial`.`net_amount`) AS `total`,`view_transfer_detial`.`tm_status` AS `tm_status`,`view_transfer_detial`.`receiving_branch` AS `receiving_branch` from `view_transfer_detial` group by `view_transfer_detial`.`tm_status`,`view_transfer_detial`.`receiving_branch` ;

-- --------------------------------------------------------

--
-- Structure for view `view_today_receive`
--
DROP TABLE IF EXISTS `view_today_receive`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_today_receive`  AS  select `view_transfer_detial`.`receiving_branch` AS `receiving_branch`,sum(`view_transfer_detial`.`net_amount`) AS `receive_total`,count(`view_transfer_detial`.`rcvr_fname`) AS `Total_reciever` from `view_transfer_detial` where ((`view_transfer_detial`.`tm_created_at` = cast(now() as date)) and (`view_transfer_detial`.`tm_status` = 'paid')) group by `view_transfer_detial`.`receiving_branch` ;

-- --------------------------------------------------------

--
-- Structure for view `view_today_transfer`
--
DROP TABLE IF EXISTS `view_today_transfer`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_today_transfer`  AS  select `view_transfer_detial`.`sending_branch` AS `sending_branch`,sum(`view_transfer_detial`.`net_amount`) AS `send_total`,sum(`view_transfer_detial`.`commision_amount`) AS `commision`,count(`view_transfer_detial`.`first_name`) AS `Total_Sender` from `view_transfer_detial` where (`view_transfer_detial`.`tm_created_at` = cast(now() as date)) group by `view_transfer_detial`.`sending_branch` ;

-- --------------------------------------------------------

--
-- Structure for view `view_transfer_detial`
--
DROP TABLE IF EXISTS `view_transfer_detial`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_transfer_detial`  AS  select `tbl_sender_profile`.`sender_id` AS `sender_id`,`tbl_sender_profile`.`first_name` AS `first_name`,`tbl_sender_profile`.`middle_name` AS `middle_name`,`tbl_sender_profile`.`last_name` AS `last_name`,`tbl_sender_profile`.`sender_gender` AS `sender_gender`,`tbl_sender_profile`.`sender_kebele` AS `sender_kebele`,`tbl_sender_profile`.`sender_tel` AS `sender_tel`,`tbl_sender_profile`.`sender_id_no` AS `sender_id_no`,`tbl_sender_profile`.`sender_house_number` AS `sender_house_number`,`tbl_sender_profile`.`sp_created_at` AS `sp_created_at`,`tbl_sender_profile`.`sp_updated_at` AS `sp_updated_at`,`tbl_sender_profile`.`sp_user_id` AS `sp_user_id`,`tbl_transfer_money`.`transfer_money_id` AS `transfer_money_id`,`tbl_transfer_money`.`fk_sender_id` AS `fk_sender_id`,`tbl_transfer_money`.`rcvr_fname` AS `rcvr_fname`,`tbl_transfer_money`.`rcvr_mname` AS `rcvr_mname`,`tbl_transfer_money`.`rcvr_lname` AS `rcvr_lname`,`tbl_transfer_money`.`rcvr_gender` AS `rcvr_gender`,`tbl_transfer_money`.`rcvr_house_number` AS `rcvr_house_number`,`tbl_transfer_money`.`rcvr_kebele` AS `rcvr_kebele`,`tbl_transfer_money`.`rcvr_tel` AS `rcvr_tel`,`tbl_transfer_money`.`sending_branch` AS `sending_branch`,`tbl_transfer_money`.`rcvr_id_no` AS `rcvr_id_no`,`tbl_transfer_money`.`secuirity_code` AS `secuirity_code`,`tbl_transfer_money`.`amount` AS `amount`,`tbl_transfer_money`.`rate` AS `rate`,`tbl_transfer_money`.`commision_amount` AS `commision_amount`,`tbl_transfer_money`.`purpose` AS `purpose`,`tbl_transfer_money`.`receiving_branch` AS `receiving_branch`,`tbl_transfer_money`.`tm_status` AS `tm_status`,`tbl_transfer_money`.`send_date` AS `send_date`,`tbl_transfer_money`.`sending_staff` AS `sending_staff`,`tbl_transfer_money`.`approver` AS `approver`,cast(`tbl_transfer_money`.`tm_created_at` as date) AS `tm_created_at`,`tbl_transfer_money`.`tm_updated_at` AS `tm_updated_at`,`tbl_transfer_money`.`tm_user_id` AS `tm_user_id`,`tbl_transfer_money`.`aprove_status` AS `aprove_status`,`tbl_transfer_money`.`t_aproved_at` AS `t_aproved_at`,`tbl_transfer_money`.`aprover_id` AS `aprover_id`,`tbl_transfer_money`.`net_amount` AS `net_amount`,`tbl_transfer_money`.`t_aproved_by` AS `t_aproved_by` from (`tbl_sender_profile` join `tbl_transfer_money`) where (`tbl_sender_profile`.`sender_id` = `tbl_transfer_money`.`fk_sender_id`) order by `tbl_transfer_money`.`send_date` desc ;

-- --------------------------------------------------------

--
-- Structure for view `view_transfer_summary_by_date`
--
DROP TABLE IF EXISTS `view_transfer_summary_by_date`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_transfer_summary_by_date`  AS  select sum(`tbl_transfer_money`.`net_amount`) AS `total`,`tbl_transfer_money`.`receiving_branch` AS `receiving_branch`,`tbl_transfer_money`.`sending_branch` AS `sending_branch`,`tbl_transfer_money`.`tm_status` AS `status`,cast(`tbl_transfer_money`.`send_date` as date) AS `send_date` from `tbl_transfer_money` group by `tbl_transfer_money`.`tm_status`,cast(`tbl_transfer_money`.`send_date` as date),`tbl_transfer_money`.`receiving_branch`,`tbl_transfer_money`.`sending_branch` ;

-- --------------------------------------------------------

--
-- Structure for view `view_users`
--
DROP TABLE IF EXISTS `view_users`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_users`  AS  select `tbl_users`.`user_id` AS `user_id`,`tbl_users`.`first_name` AS `first_name`,`tbl_users`.`last_name` AS `last_name`,`tbl_users`.`staff_id` AS `staff_id`,`tbl_users`.`user_name` AS `user_name`,`tbl_users`.`password` AS `password`,`tbl_users`.`tel` AS `tel`,`tbl_users`.`email` AS `email`,`tbl_users`.`u_branch` AS `u_branch`,`tbl_users`.`status` AS `status`,`tbl_users`.`u_created_at` AS `u_created_at`,`tbl_users`.`u_updated_at` AS `u_updated_at`,`tbl_branchs`.`branch_id` AS `branch_id`,`tbl_branchs`.`branch_name` AS `branch_name`,`tbl_branchs`.`branch_code` AS `branch_code`,`tbl_branchs`.`remark` AS `remark` from (`tbl_users` join `tbl_branchs`) where (`tbl_branchs`.`branch_id` = `tbl_users`.`u_branch`) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbloperation`
--
ALTER TABLE `tbloperation`
  ADD PRIMARY KEY (`operation_id`);

--
-- Indexes for table `tbloperationlog`
--
ALTER TABLE `tbloperationlog`
  ADD PRIMARY KEY (`operation_log_id`,`fk_operation_id`),
  ADD KEY `tbloperationlog_ibfk_1` (`fk_operation_id`);

--
-- Indexes for table `tbl_branchs`
--
ALTER TABLE `tbl_branchs`
  ADD PRIMARY KEY (`branch_id`);

--
-- Indexes for table `tbl_payments`
--
ALTER TABLE `tbl_payments`
  ADD PRIMARY KEY (`payment_id`,`fk_transfer_id`,`p_created_by`),
  ADD KEY `fk_transfer_id` (`fk_transfer_id`),
  ADD KEY `p_created_by` (`p_created_by`);

--
-- Indexes for table `tbl_rate_setting`
--
ALTER TABLE `tbl_rate_setting`
  ADD PRIMARY KEY (`rat_id`);

--
-- Indexes for table `tbl_sender_profile`
--
ALTER TABLE `tbl_sender_profile`
  ADD PRIMARY KEY (`sender_id`);

--
-- Indexes for table `tbl_transfer_money`
--
ALTER TABLE `tbl_transfer_money`
  ADD PRIMARY KEY (`transfer_money_id`,`fk_sender_id`,`tm_user_id`),
  ADD KEY `fk_sender_id` (`fk_sender_id`),
  ADD KEY `tm_user_id` (`tm_user_id`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`user_id`,`u_branch`),
  ADD KEY `u_branch` (`u_branch`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbloperation`
--
ALTER TABLE `tbloperation`
  MODIFY `operation_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbloperationlog`
--
ALTER TABLE `tbloperationlog`
  MODIFY `operation_log_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_branchs`
--
ALTER TABLE `tbl_branchs`
  MODIFY `branch_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `tbl_payments`
--
ALTER TABLE `tbl_payments`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tbl_rate_setting`
--
ALTER TABLE `tbl_rate_setting`
  MODIFY `rat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_sender_profile`
--
ALTER TABLE `tbl_sender_profile`
  MODIFY `sender_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=130;
--
-- AUTO_INCREMENT for table `tbl_transfer_money`
--
ALTER TABLE `tbl_transfer_money`
  MODIFY `transfer_money_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbloperationlog`
--
ALTER TABLE `tbloperationlog`
  ADD CONSTRAINT `tbloperationlog_ibfk_1` FOREIGN KEY (`fk_operation_id`) REFERENCES `tbloperation` (`operation_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_payments`
--
ALTER TABLE `tbl_payments`
  ADD CONSTRAINT `tbl_payments_ibfk_1` FOREIGN KEY (`fk_transfer_id`) REFERENCES `tbl_transfer_money` (`transfer_money_id`),
  ADD CONSTRAINT `tbl_payments_ibfk_2` FOREIGN KEY (`p_created_by`) REFERENCES `tbl_users` (`user_id`);

--
-- Constraints for table `tbl_transfer_money`
--
ALTER TABLE `tbl_transfer_money`
  ADD CONSTRAINT `tbl_transfer_money_ibfk_1` FOREIGN KEY (`fk_sender_id`) REFERENCES `tbl_sender_profile` (`sender_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_transfer_money_ibfk_2` FOREIGN KEY (`tm_user_id`) REFERENCES `tbl_users` (`user_id`);

--
-- Constraints for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD CONSTRAINT `tbl_users_ibfk_1` FOREIGN KEY (`u_branch`) REFERENCES `tbl_branchs` (`branch_id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
