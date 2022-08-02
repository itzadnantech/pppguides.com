-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 02, 2022 at 01:39 AM
-- Server version: 10.3.34-MariaDB-cll-lve
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `webxiyjk_pppguidesdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `activitytable`
--

CREATE TABLE `activitytable` (
  `activity_id` int(11) NOT NULL,
  `cust_id` int(11) NOT NULL,
  `email` varchar(150) NOT NULL,
  `ipaddress` varchar(255) NOT NULL,
  `activitydate` date NOT NULL,
  `activitytime` time NOT NULL,
  `activitytype` varchar(200) NOT NULL,
  `activitydetail` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `activitytable`
--

INSERT INTO `activitytable` (`activity_id`, `cust_id`, `email`, `ipaddress`, `activitydate`, `activitytime`, `activitytype`, `activitydetail`) VALUES
(349, 0, 'admin@gmail.com', '39.45.196.75', '2020-10-29', '15:37:55', 'PromoCode-Updated', NULL),
(348, 0, 'admin@gmail.com', '39.45.196.75', '2020-10-29', '14:59:58', 'Login', NULL),
(347, 1005, 'admin@gmail.com', '39.45.196.75', '2020-10-29', '13:18:10', 'Forgiveness-Check', NULL),
(346, 1005, 'admin@gmail.com', '39.45.196.75', '2020-10-29', '13:12:03', 'Forgiveness-Check', NULL),
(345, 0, 'admin@gmail.com', '39.45.196.75', '2020-10-29', '13:11:16', 'Login', NULL),
(344, 0, 'admin@gmail.com', '39.45.196.75', '2020-10-29', '09:26:36', 'customInvoice-Generated', NULL),
(343, 0, 'admin@gmail.com', '39.45.196.75', '2020-10-29', '09:21:14', 'customInvoice-Generated', NULL),
(342, 0, 'admin@gmail.com', '39.45.196.75', '2020-10-29', '09:19:50', 'customInvoice-Generated', NULL),
(341, 0, 'admin@gmail.com', '39.45.154.125', '2020-10-29', '08:59:54', 'customInvoice-Generated', NULL),
(340, 0, 'admin@gmail.com', '39.45.154.125', '2020-10-29', '08:59:29', 'Login', NULL),
(339, 0, 'admin@gmail.com', '39.45.154.125', '2020-10-29', '08:31:07', 'Login', NULL),
(338, 0, 'admin@gmail.com', '39.45.154.125', '2020-10-29', '07:57:54', 'customInvoice-Generated', NULL),
(337, 0, 'admin@gmail.com', '39.45.154.125', '2020-10-29', '07:57:40', 'Login', NULL),
(336, 0, 'admin@gmail.com', '39.45.56.119', '2020-10-29', '06:58:40', 'customInvoice-Generated', NULL),
(335, 0, 'admin@gmail.com', '39.45.56.119', '2020-10-29', '06:51:21', 'Login', NULL),
(334, 0, 'admin@gmail.com', '39.45.56.119', '2020-10-29', '05:30:00', 'Login', NULL),
(333, 1005, 'user@gmail.com', '39.45.56.119', '2020-10-29', '05:29:55', 'Logout', NULL),
(332, 1005, 'user@gmail.com', '39.45.56.119', '2020-10-29', '05:17:22', 'Login', NULL),
(331, 1005, 'user@gmail.com', '39.45.56.119', '2020-10-29', '04:37:36', 'Login', NULL),
(330, 0, 'admin@gmail.com', '39.45.56.119', '2020-10-28', '15:57:43', 'Logout', NULL),
(329, 0, 'admin@gmail.com', '39.45.56.119', '2020-10-28', '15:53:03', 'Login', NULL),
(328, 1005, 'user@gmail.com', '39.45.56.119', '2020-10-28', '15:52:59', 'Logout', NULL),
(327, 1005, 'user@gmail.com', '39.45.56.119', '2020-10-28', '15:52:53', 'Login', NULL),
(326, 0, 'admin@gmail.com', '39.45.56.119', '2020-10-28', '15:22:34', 'Login', NULL),
(325, 1005, 'user@gmail.com', '39.45.56.119', '2020-10-28', '15:22:30', 'Logout', NULL),
(324, 1005, 'user@gmail.com', '39.45.56.119', '2020-10-28', '15:04:55', 'Forgiveness-Check', NULL),
(323, 1005, 'user@gmail.com', '39.45.56.119', '2020-10-28', '15:04:48', 'Login', NULL),
(322, 1005, 'user@gmail.com', '51.36.95.20', '2020-10-28', '13:32:20', 'Logout', NULL),
(321, 1005, 'user@gmail.com', '51.36.95.20', '2020-10-28', '13:31:16', 'Forgiveness-Check', NULL),
(320, 1005, 'user@gmail.com', '51.36.95.20', '2020-10-28', '13:31:10', 'Login', NULL),
(319, 0, 'admin@gmail.com', '39.45.56.119', '2020-10-28', '03:33:47', 'Login', NULL),
(318, 1005, 'user@gmail.com', '39.45.56.119', '2020-10-28', '03:33:44', 'Logout', NULL),
(317, 1010, 'abubkr.akram@gmail.com', '39.45.56.119', '2020-10-28', '03:18:51', 'Forgiveness-Excel-Import', NULL),
(316, 1010, 'abubkr.akram@gmail.com', '39.45.56.119', '2020-10-28', '03:18:36', 'Forgiveness-Excel-Import', NULL),
(315, 1010, 'abubkr.akram@gmail.com', '39.45.56.119', '2020-10-28', '03:18:23', 'Forgiveness-Excel-Import', NULL),
(314, 1010, 'abubkr.akram@gmail.com', '39.45.56.119', '2020-10-28', '03:17:29', 'Forgiveness-Excel-Import', NULL),
(313, 1010, 'abubkr.akram@gmail.com', '39.45.56.119', '2020-10-28', '03:16:58', 'Forgiveness-3508-SchedA', NULL),
(312, 1010, 'abubkr.akram@gmail.com', '39.45.56.119', '2020-10-28', '03:15:55', 'Forgiveness-Check', NULL),
(311, 1008, 'abubkr.akram@gmail.com', '39.45.56.119', '2020-10-28', '03:15:37', 'Forgiveness-Check', NULL),
(310, 1015, 'abubkr.akram@gmail.com', '39.45.56.119', '2020-10-28', '03:15:21', 'Login', NULL),
(309, 1005, 'user@gmail.com', '39.45.56.119', '2020-10-28', '03:14:36', 'Forgiveness-Check', NULL),
(308, 1005, 'user@gmail.com', '39.45.56.119', '2020-10-28', '03:14:00', 'Forgiveness-Excel-Import', NULL),
(307, 1005, 'user@gmail.com', '39.45.56.119', '2020-10-28', '03:13:50', 'Forgiveness-Excel-Import', NULL),
(306, 1005, 'user@gmail.com', '39.45.56.119', '2020-10-28', '03:13:39', 'Forgiveness-Excel-Import', NULL),
(305, 1005, 'user@gmail.com', '39.45.56.119', '2020-10-28', '03:13:23', 'Forgiveness-Excel-Import', NULL),
(304, 1005, 'user@gmail.com', '39.45.56.119', '2020-10-28', '03:03:37', 'Forgiveness-Excel-Import', NULL),
(303, 1005, 'user@gmail.com', '39.45.56.119', '2020-10-28', '03:03:26', 'Forgiveness-Excel-Import', NULL),
(302, 1005, 'user@gmail.com', '39.45.56.119', '2020-10-28', '03:03:15', 'Forgiveness-Excel-Import', NULL),
(301, 1005, 'user@gmail.com', '39.45.56.119', '2020-10-28', '03:02:42', 'Forgiveness-Excel-Import', NULL),
(300, 1005, 'user@gmail.com', '39.45.56.119', '2020-10-28', '02:40:51', 'Forgiveness-Check', NULL),
(299, 1005, 'user@gmail.com', '39.45.56.119', '2020-10-28', '02:40:04', 'Login', NULL),
(298, 1005, 'user@gmail.com', '39.45.56.119', '2020-10-27', '19:05:27', 'Login', NULL),
(297, 1005, 'user@gmail.com', '39.45.56.119', '2020-10-27', '18:58:43', 'Logout', NULL),
(296, 1005, 'user@gmail.com', '39.45.56.119', '2020-10-27', '18:55:49', 'Login', NULL),
(295, 1005, 'user@gmail.com', '39.45.56.119', '2020-10-27', '18:28:30', 'Logout', NULL),
(294, 1005, 'user@gmail.com', '39.45.56.119', '2020-10-27', '18:27:31', 'Forgiveness-Check', NULL),
(293, 1005, 'user@gmail.com', '39.45.56.119', '2020-10-27', '18:27:24', 'Login', NULL),
(292, 1005, 'user@gmail.com', '51.36.95.20', '2020-10-27', '17:12:20', 'Logout', NULL),
(291, 1005, 'user@gmail.com', '51.36.95.20', '2020-10-27', '17:11:05', 'Forgiveness-Check', NULL),
(290, 1005, 'user@gmail.com', '51.36.95.20', '2020-10-27', '17:11:02', 'Login', NULL),
(289, 1005, 'user@gmail.com', '39.45.56.119', '2020-10-27', '15:58:47', 'Forgiveness-Check', NULL),
(288, 1005, 'user@gmail.com', '51.36.95.20', '2020-10-27', '15:44:10', 'Logout', NULL),
(287, 1005, 'user@gmail.com', '39.45.56.119', '2020-10-27', '15:37:35', 'Forgiveness-Excel-Import', NULL),
(286, 1005, 'user@gmail.com', '39.45.56.119', '2020-10-27', '15:37:14', 'Forgiveness-Excel-Import', NULL),
(285, 1005, 'user@gmail.com', '39.45.56.119', '2020-10-27', '15:36:53', 'Forgiveness-Excel-Import', NULL),
(284, 1005, 'user@gmail.com', '51.36.95.20', '2020-10-27', '15:24:03', 'Forgiveness-Check', NULL),
(283, 1005, 'user@gmail.com', '39.45.56.119', '2020-10-27', '15:24:03', 'Forgiveness-Check', NULL),
(282, 1005, 'user@gmail.com', '51.36.95.20', '2020-10-27', '15:24:00', 'Forgiveness-Check', NULL),
(281, 1005, 'user@gmail.com', '51.36.95.20', '2020-10-27', '15:23:54', 'Login', NULL),
(280, 1005, 'user@gmail.com', '39.45.56.119', '2020-10-27', '15:19:57', 'Forgiveness-Check', NULL),
(279, 1005, 'user@gmail.com', '39.45.56.119', '2020-10-27', '15:19:42', 'Forgiveness-Excel-Import', NULL),
(278, 1005, 'user@gmail.com', '39.45.56.119', '2020-10-27', '15:19:28', 'Forgiveness-Excel-Import', NULL),
(277, 1005, 'user@gmail.com', '39.45.56.119', '2020-10-27', '15:19:15', 'Forgiveness-Excel-Import', NULL),
(276, 1005, 'user@gmail.com', '39.45.56.119', '2020-10-27', '15:19:00', 'Forgiveness-Excel-Import', NULL),
(275, 1005, 'user@gmail.com', '39.45.56.119', '2020-10-27', '15:18:38', 'Forgiveness-Excel-Import', NULL),
(274, 1005, 'user@gmail.com', '39.45.56.119', '2020-10-27', '15:18:27', 'Forgiveness-Check', NULL),
(273, 1005, 'user@gmail.com', '39.45.56.119', '2020-10-27', '15:18:22', 'Login', NULL),
(272, 1005, 'user@gmail.com', '39.45.56.119', '2020-10-27', '14:47:11', 'Login', NULL),
(271, 0, 'admin@gmail.com', '39.45.254.230', '2020-10-27', '09:05:50', 'Login', NULL),
(270, 1005, 'user@gmail.com', '39.45.254.230', '2020-10-27', '09:05:45', 'Logout', NULL),
(269, 1005, 'user@gmail.com', '39.45.254.230', '2020-10-27', '09:04:58', 'Forgiveness-Check', NULL),
(268, 1005, 'user@gmail.com', '39.45.254.230', '2020-10-27', '09:04:47', 'Login', NULL),
(267, 0, 'admin@gmail.com', '39.45.243.157', '2020-10-27', '05:58:42', 'customInvoice-Generated', NULL),
(266, 0, 'admin@gmail.com', '39.45.243.157', '2020-10-27', '05:49:57', 'ReferenceId-SalesId-Updated', NULL),
(265, 0, 'admin@gmail.com', '39.45.243.157', '2020-10-27', '05:49:19', 'PromoCode-Generated', NULL),
(264, 0, 'admin@gmail.com', '39.45.243.157', '2020-10-27', '05:48:42', 'NewUser-Created', NULL),
(263, 0, 'admin@gmail.com', '39.45.243.157', '2020-10-27', '05:16:06', 'Login', NULL),
(262, 0, 'admin@gmail.com', '39.45.243.157', '2020-10-27', '04:58:38', 'Logout', NULL),
(350, 0, 'admin@gmail.com', '39.45.196.75', '2020-10-29', '16:20:11', 'Login', NULL),
(351, 1005, 'admin@gmail.com', '39.45.196.75', '2020-10-29', '16:35:31', 'Forgiveness-Check', NULL),
(352, 1005, 'admin@gmail.com', '39.45.196.75', '2020-10-29', '16:51:00', 'Forgiveness-Excel-Import', NULL),
(353, 1005, 'admin@gmail.com', '39.45.196.75', '2020-10-29', '16:51:11', 'Forgiveness-Excel-Import', NULL),
(354, 1005, 'admin@gmail.com', '39.45.196.75', '2020-10-29', '16:54:58', 'Logout', NULL),
(355, 0, 'admin@gmail.com', '39.45.196.75', '2020-10-29', '16:55:02', 'Login', NULL),
(356, 0, 'admin@gmail.com', '39.45.196.75', '2020-10-29', '17:44:34', 'Login', NULL),
(357, 0, 'admin@gmail.com', '39.45.196.75', '2020-10-29', '18:03:57', 'Logout', ''),
(358, 0, 'admin@gmail.com', '39.45.196.75', '2020-10-29', '18:04:13', 'Login', NULL),
(359, 0, 'admin@gmail.com', '39.45.196.75', '2020-10-29', '18:16:58', 'Logout', ''),
(360, 1005, 'user@gmail.com', '39.45.196.75', '2020-10-29', '18:17:02', 'Login', NULL),
(361, 1005, 'user@gmail.com', '39.45.196.75', '2020-10-29', '18:18:50', 'Logout', NULL),
(362, 1005, 'user@gmail.com', '39.45.196.75', '2020-10-29', '18:30:01', 'Login', NULL),
(363, 1005, 'user@gmail.com', '39.45.196.75', '2020-10-30', '04:41:13', 'Login', NULL),
(364, 1005, 'user@gmail.com', '39.45.196.75', '2020-10-30', '05:35:35', 'Login', NULL),
(365, 1005, 'user@gmail.com', '39.45.196.75', '2020-10-30', '05:36:03', 'Logout', NULL),
(366, 0, 'admin@gmail.com', '39.45.196.75', '2020-10-30', '05:36:07', 'Login', NULL),
(367, 0, 'admin@gmail.com', '39.45.196.75', '2020-10-30', '07:18:30', 'Logout', ''),
(368, 1005, 'user@gmail.com', '39.45.196.75', '2020-10-30', '07:18:35', 'Login', NULL),
(369, 1005, 'user@gmail.com', '39.45.196.75', '2020-10-30', '07:18:37', 'Forgiveness-Check', NULL),
(370, 1005, 'user@gmail.com', '39.45.196.75', '2020-10-30', '08:03:13', 'Forgiveness-3508-SchedA', NULL),
(371, 1005, 'user@gmail.com', '39.45.196.75', '2020-10-30', '16:53:31', 'Login', NULL),
(372, 1005, 'user@gmail.com', '39.45.196.75', '2020-10-30', '17:27:25', 'Forgiveness-Check', NULL),
(373, 1005, 'user@gmail.com', '39.45.196.75', '2020-10-30', '17:30:11', 'Forgiveness-Check', NULL),
(374, 1005, 'user@gmail.com', '39.45.196.75', '2020-10-30', '17:44:41', 'Forgiveness-Excel-Import', NULL),
(375, 1005, 'user@gmail.com', '39.45.196.75', '2020-10-30', '17:45:25', 'Forgiveness-Excel-Import', NULL),
(376, 1005, 'user@gmail.com', '39.45.196.75', '2020-10-30', '17:46:11', 'Forgiveness-3508-SchedA', NULL),
(377, 1005, 'user@gmail.com', '39.45.196.75', '2020-10-30', '17:46:58', 'Forgiveness-3508-SchedA', NULL),
(378, 1005, 'user@gmail.com', '39.45.196.75', '2020-10-30', '17:47:05', 'Forgiveness-3508-SchedA', NULL),
(379, 1005, 'user@gmail.com', '39.45.196.75', '2020-10-30', '17:49:41', 'Forgiveness-Excel-Import', NULL),
(380, 1005, 'user@gmail.com', '39.45.196.75', '2020-10-30', '17:50:16', 'Forgiveness-Excel-Import', NULL),
(381, 1005, 'user@gmail.com', '39.45.196.75', '2020-10-30', '17:50:27', 'Forgiveness-Excel-Import', NULL),
(382, 1005, 'user@gmail.com', '39.45.196.75', '2020-10-30', '17:50:41', 'Forgiveness-Excel-Import', NULL),
(383, 1005, 'user@gmail.com', '39.45.196.75', '2020-10-30', '17:51:02', 'Forgiveness-3508-SchedA', NULL),
(384, 1005, 'user@gmail.com', '39.45.196.75', '2020-10-30', '18:00:14', 'Forgiveness-3508-SchedA', NULL),
(385, 1005, 'user@gmail.com', '39.45.196.75', '2020-10-30', '18:40:42', 'Login', NULL),
(386, 1005, 'user@gmail.com', '39.45.196.75', '2020-10-30', '18:40:45', 'Login', NULL),
(387, 1005, 'user@gmail.com', '39.45.196.75', '2020-10-30', '18:42:18', 'Forgiveness-Check', NULL),
(388, 1005, 'user@gmail.com', '39.45.196.75', '2020-10-30', '18:44:59', 'Forgiveness-3508-SchedA', NULL),
(389, 1005, 'user@gmail.com', '39.45.196.75', '2020-10-30', '18:51:01', 'Forgiveness-3508-SchedA', NULL),
(390, 1005, 'user@gmail.com', '39.45.196.75', '2020-10-31', '15:02:29', 'Login', NULL),
(391, 1005, 'user@gmail.com', '39.45.196.75', '2020-10-31', '15:02:38', 'Logout', NULL),
(392, 1005, 'user@gmail.com', '39.45.196.75', '2020-10-31', '15:02:44', 'Login', NULL),
(393, 1005, 'user@gmail.com', '39.45.196.75', '2020-10-31', '16:07:29', 'Login', NULL),
(394, 1005, 'user@gmail.com', '39.45.196.75', '2020-10-31', '16:07:32', 'Forgiveness-Check', NULL),
(395, 1005, 'user@gmail.com', '39.45.196.75', '2020-10-31', '17:28:11', 'Forgiveness-Excel-Import', NULL),
(396, 1005, 'user@gmail.com', '39.45.196.75', '2020-10-31', '17:29:18', 'Forgiveness-Excel-Import', NULL),
(397, 1005, 'user@gmail.com', '39.45.196.75', '2020-10-31', '17:29:36', 'Forgiveness-Excel-Import', NULL),
(398, 1005, 'user@gmail.com', '39.45.196.75', '2020-10-31', '17:29:50', 'Forgiveness-Excel-Import', NULL),
(399, 1005, 'user@gmail.com', '39.45.196.75', '2020-10-31', '17:31:21', 'Forgiveness-3508-SchedA', NULL),
(400, 1005, 'user@gmail.com', '39.45.196.75', '2020-10-31', '17:33:18', 'Forgiveness-3508-SchedA', NULL),
(401, 1005, 'user@gmail.com', '39.45.196.75', '2020-10-31', '17:36:46', 'Forgiveness-3508-SchedA', NULL),
(402, 1005, 'user@gmail.com', '39.45.196.75', '2020-10-31', '17:43:57', 'Forgiveness-3508-SchedA', NULL),
(403, 1005, 'user@gmail.com', '39.45.196.75', '2020-10-31', '17:51:08', 'Forgiveness-Excel-Import', NULL),
(404, 1005, 'user@gmail.com', '39.45.196.75', '2020-10-31', '17:51:30', 'Forgiveness-Excel-Import', NULL),
(405, 1005, 'user@gmail.com', '39.45.196.75', '2020-10-31', '17:51:44', 'Forgiveness-Excel-Import', NULL),
(406, 1005, 'user@gmail.com', '39.45.196.75', '2020-10-31', '17:51:54', 'Forgiveness-Excel-Import', NULL),
(407, 1005, 'user@gmail.com', '39.45.196.75', '2020-10-31', '17:52:23', 'Forgiveness-3508-SchedA', NULL),
(408, 1005, 'user@gmail.com', '39.45.196.75', '2020-10-31', '18:00:55', 'Forgiveness-3508-SchedA', NULL),
(409, 1005, 'user@gmail.com', '39.45.196.75', '2020-10-31', '18:03:07', 'Forgiveness-3508-SchedA', NULL),
(410, 1005, 'user@gmail.com', '39.45.196.75', '2020-10-31', '18:03:46', 'Forgiveness-3508-SchedA', NULL),
(411, 1005, 'user@gmail.com', '39.45.196.75', '2020-10-31', '18:04:33', 'Forgiveness-3508-SchedA', NULL),
(412, 1005, 'user@gmail.com', '39.45.196.75', '2020-10-31', '18:05:10', 'Forgiveness-3508-SchedA', NULL),
(413, 1005, 'user@gmail.com', '39.45.196.75', '2020-10-31', '18:07:51', 'Forgiveness-3508-SchedA', NULL),
(414, 1005, 'user@gmail.com', '39.45.196.75', '2020-10-31', '18:10:39', 'Forgiveness-3508-SchedA', NULL),
(415, 1005, 'user@gmail.com', '39.45.196.75', '2020-10-31', '18:11:31', 'Forgiveness-3508-SchedA', NULL),
(416, 1005, 'user@gmail.com', '39.45.196.75', '2020-10-31', '18:14:51', 'Forgiveness-3508-SchedA', NULL),
(417, 1005, 'user@gmail.com', '39.45.196.75', '2020-10-31', '18:18:48', 'Forgiveness-3508-SchedA', NULL),
(418, 1005, 'user@gmail.com', '39.45.196.75', '2020-10-31', '18:20:35', 'Forgiveness-3508-SchedA', NULL),
(419, 1005, 'user@gmail.com', '39.45.196.75', '2020-10-31', '18:20:56', 'Forgiveness-3508-SchedA', NULL),
(420, 1005, 'user@gmail.com', '39.45.241.233', '2020-11-02', '12:54:23', 'Login', NULL),
(421, 1005, 'user@gmail.com', '39.45.241.233', '2020-11-02', '12:58:41', 'Forgiveness-Check', NULL),
(422, 1005, 'user@gmail.com', '39.45.241.233', '2020-11-02', '13:32:30', 'Login', NULL),
(423, 1005, 'user@gmail.com', '39.45.241.233', '2020-11-02', '13:32:57', 'Forgiveness-Check', NULL),
(424, 1005, 'user@gmail.com', '39.45.241.233', '2020-11-02', '16:03:56', 'Login', NULL),
(425, 1005, 'user@gmail.com', '39.45.241.233', '2020-11-02', '17:47:46', 'Login', NULL),
(426, 1005, 'user@gmail.com', '39.45.241.233', '2020-11-02', '17:47:49', 'Forgiveness-Check', NULL),
(427, 1005, 'user@gmail.com', '39.45.241.233', '2020-11-02', '18:32:14', 'Login', NULL),
(428, 1005, 'user@gmail.com', '39.45.241.233', '2020-11-02', '18:32:20', 'Forgiveness-Check', NULL),
(429, 1005, 'user@gmail.com', '39.45.241.233', '2020-11-03', '03:30:36', 'Login', NULL),
(430, 1005, 'user@gmail.com', '39.45.241.233', '2020-11-03', '03:30:39', 'Forgiveness-Check', NULL),
(431, 1005, 'user@gmail.com', '39.45.241.233', '2020-11-03', '03:41:43', 'Login', NULL),
(432, 1005, 'user@gmail.com', '39.45.241.233', '2020-11-03', '03:44:43', 'Logout', NULL),
(433, 1005, 'user@gmail.com', '39.45.241.233', '2020-11-03', '04:39:38', 'Login', NULL),
(434, 1005, 'user@gmail.com', '39.45.241.233', '2020-11-03', '05:50:10', 'Login', NULL),
(435, 1005, 'user@gmail.com', '39.45.241.233', '2020-11-03', '05:50:13', 'Forgiveness-Check', NULL),
(436, 1005, 'user@gmail.com', '39.45.241.233', '2020-11-03', '06:22:57', 'Login', NULL),
(437, 1005, 'user@gmail.com', '39.45.241.233', '2020-11-03', '06:23:14', 'Forgiveness-Check', NULL),
(438, 1005, 'user@gmail.com', '39.45.241.233', '2020-11-03', '08:11:49', 'Login', NULL),
(439, 1005, 'user@gmail.com', '39.45.241.233', '2020-11-03', '08:13:47', 'Login', NULL),
(440, 1005, 'user@gmail.com', '39.45.241.233', '2020-11-03', '08:14:10', 'Forgiveness-Check', NULL),
(441, 1005, 'user@gmail.com', '39.45.241.233', '2020-11-03', '08:14:34', 'Forgiveness-3508-SchedA', NULL),
(442, 1005, 'user@gmail.com', '39.45.241.233', '2020-11-03', '08:41:29', 'Forgiveness-3508-SchedA', NULL),
(443, 1005, 'user@gmail.com', '39.45.241.233', '2020-11-03', '09:57:36', 'Login', NULL),
(444, 1005, 'user@gmail.com', '39.45.241.233', '2020-11-03', '09:57:40', 'Forgiveness-Check', NULL),
(445, 1005, 'user@gmail.com', '39.45.241.233', '2020-11-03', '12:40:23', 'Login', NULL),
(446, 1005, 'user@gmail.com', '39.45.241.233', '2020-11-03', '12:40:27', 'Forgiveness-Check', NULL),
(447, 1005, 'user@gmail.com', '39.45.241.233', '2020-11-03', '13:04:17', 'Forgiveness-Check', NULL),
(448, 1005, 'user@gmail.com', '39.45.241.233', '2020-11-03', '14:31:47', 'Login', NULL),
(449, 1005, 'user@gmail.com', '39.45.241.233', '2020-11-03', '14:31:49', 'Forgiveness-Check', NULL),
(450, 1005, 'user@gmail.com', '39.45.241.233', '2020-11-03', '16:14:22', 'Login', NULL),
(451, 1005, 'user@gmail.com', '39.45.241.233', '2020-11-03', '16:14:40', 'Forgiveness-Check', NULL),
(452, 1005, 'user@gmail.com', '39.45.241.233', '2020-11-03', '16:14:50', 'Forgiveness-Check', NULL),
(453, 1005, 'user@gmail.com', '39.45.241.233', '2020-11-03', '17:38:55', 'Forgiveness-Check', NULL),
(454, 1005, 'user@gmail.com', '39.45.142.2', '2020-11-04', '16:16:13', 'Login', NULL),
(455, 1005, 'user@gmail.com', '39.45.142.2', '2020-11-04', '16:54:34', 'Forgiveness-Check', NULL),
(456, 1005, 'user@gmail.com', '39.45.142.2', '2020-11-04', '16:54:55', 'Forgiveness-Excel-Import', NULL),
(457, 1005, 'user@gmail.com', '39.45.142.2', '2020-11-05', '04:26:21', 'Login', NULL),
(458, 1005, 'user@gmail.com', '39.45.142.2', '2020-11-05', '04:26:35', 'Forgiveness-Check', NULL),
(459, 1005, 'user@gmail.com', '39.45.142.2', '2020-11-05', '04:26:43', 'Forgiveness-Excel-Import', NULL),
(460, 1005, 'user@gmail.com', '39.45.215.3', '2020-11-05', '06:32:55', 'Login', NULL),
(461, 1005, 'user@gmail.com', '39.45.215.3', '2020-11-05', '06:33:02', 'Forgiveness-Check', NULL),
(462, 1005, 'user@gmail.com', '39.45.215.3', '2020-11-05', '06:33:10', 'Forgiveness-Excel-Import', NULL),
(463, 1005, 'user@gmail.com', '39.45.215.3', '2020-11-05', '06:59:54', 'Forgiveness-Excel-Import', NULL),
(464, 1005, 'user@gmail.com', '39.45.215.3', '2020-11-05', '07:00:13', 'Forgiveness-Excel-Import', NULL),
(465, 1005, 'user@gmail.com', '39.45.215.3', '2020-11-05', '07:00:18', 'Forgiveness-Excel-Import', NULL),
(466, 1005, 'user@gmail.com', '39.45.215.3', '2020-11-05', '07:01:54', 'Forgiveness-Excel-Import', NULL),
(467, 1005, 'user@gmail.com', '39.45.215.3', '2020-11-05', '08:25:09', 'Login', NULL),
(468, 1005, 'user@gmail.com', '39.45.215.3', '2020-11-05', '08:25:12', 'Forgiveness-Check', NULL),
(469, 1005, 'user@gmail.com', '39.45.215.3', '2020-11-05', '08:25:47', 'Forgiveness-Excel-Import', NULL),
(470, 1005, 'user@gmail.com', '39.45.131.192', '2020-11-05', '15:20:13', 'Login', NULL),
(471, 1005, 'user@gmail.com', '39.45.131.192', '2020-11-05', '15:20:17', 'Forgiveness-Check', NULL),
(472, 1005, 'user@gmail.com', '39.45.131.192', '2020-11-05', '15:20:42', 'Forgiveness-Excel-Import', NULL),
(473, 1005, 'user@gmail.com', '39.45.131.192', '2020-11-05', '15:30:26', 'Forgiveness-Excel-Import', NULL),
(474, 1005, 'user@gmail.com', '39.45.131.192', '2020-11-05', '15:43:32', 'Forgiveness-Excel-Import', NULL),
(475, 1005, 'user@gmail.com', '39.45.131.192', '2020-11-05', '16:06:23', 'Forgiveness-Excel-Import', NULL),
(476, 1005, 'user@gmail.com', '39.45.131.192', '2020-11-05', '16:07:13', 'Forgiveness-Excel-Import', NULL),
(477, 1005, 'user@gmail.com', '39.45.131.192', '2020-11-05', '16:08:43', 'Forgiveness-Excel-Import', NULL),
(478, 1005, 'user@gmail.com', '39.45.131.192', '2020-11-05', '16:10:41', 'Forgiveness-Excel-Import', NULL),
(479, 1005, 'user@gmail.com', '39.45.131.192', '2020-11-05', '16:49:58', 'Login', NULL),
(480, 1005, 'user@gmail.com', '39.45.131.192', '2020-11-05', '16:50:02', 'Forgiveness-Check', NULL),
(481, 1005, 'user@gmail.com', '39.45.50.190', '2020-11-05', '18:20:08', 'Login', NULL),
(482, 1005, 'user@gmail.com', '39.45.50.190', '2020-11-05', '18:20:15', 'Forgiveness-Check', NULL),
(483, 1005, 'user@gmail.com', '39.45.50.190', '2020-11-05', '18:20:32', 'Forgiveness-Excel-Import', NULL),
(484, 1005, 'user@gmail.com', '39.45.50.190', '2020-11-05', '18:22:03', 'Forgiveness-Excel-Import', NULL),
(485, 1005, 'user@gmail.com', '39.45.50.190', '2020-11-05', '18:22:18', 'Forgiveness-Excel-Import', NULL),
(486, 1005, 'user@gmail.com', '39.45.50.190', '2020-11-05', '18:22:38', 'Forgiveness-Excel-Import', NULL),
(487, 1005, 'user@gmail.com', '39.45.50.190', '2020-11-05', '18:47:29', 'Login', NULL),
(488, 1005, 'user@gmail.com', '39.45.50.190', '2020-11-05', '18:47:39', 'Forgiveness-Check', NULL),
(489, 1005, 'user@gmail.com', '39.45.185.246', '2020-11-07', '08:18:30', 'Login', NULL),
(490, 1005, 'user@gmail.com', '39.45.185.246', '2020-11-07', '08:18:33', 'Forgiveness-Check', NULL),
(491, 1005, 'user@gmail.com', '39.45.185.246', '2020-11-07', '08:47:20', 'Forgiveness-3508-SchedA', NULL),
(492, 1005, 'user@gmail.com', '39.45.185.246', '2020-11-07', '09:20:28', 'NonPayroll-Save', NULL),
(493, 0, 'admin@gmail.com', '39.45.185.246', '2020-11-07', '09:23:55', 'Login', NULL),
(494, 1005, 'user@gmail.com', '39.45.185.246', '2020-11-07', '10:23:52', 'Login', NULL),
(495, 0, 'admin@gmail.com', '39.45.185.246', '2020-11-07', '18:05:11', 'Login', NULL),
(496, 0, 'admin@gmail.com', '39.45.185.246', '2020-11-07', '18:05:31', 'Logout', ''),
(497, 1015, 'abubkr.akram@gmail.com', '39.45.185.246', '2020-11-07', '18:05:55', 'Login', NULL),
(498, 1005, 'user@gmail.com', '39.45.185.246', '2020-11-08', '18:47:35', 'Login', NULL),
(499, 1005, 'user@gmail.com', '39.45.185.246', '2020-11-08', '18:49:41', 'Forgiveness-Check', NULL),
(500, 1005, 'user@gmail.com', '39.45.185.246', '2020-11-08', '19:03:51', 'Forgiveness-Excel-Import', NULL),
(501, 1005, 'user@gmail.com', '39.45.185.246', '2020-11-08', '19:04:30', 'Forgiveness-Excel-Import', NULL),
(502, 1005, 'user@gmail.com', '39.45.185.246', '2020-11-08', '19:04:42', 'Forgiveness-Excel-Import', NULL),
(503, 1005, 'user@gmail.com', '39.45.26.173', '2020-11-09', '09:29:28', 'Login', NULL),
(504, 0, 'admin@gmail.com', '39.45.26.173', '2020-11-09', '17:42:44', 'Login', NULL),
(505, 0, 'admin@gmail.com', '39.45.26.173', '2020-11-09', '17:52:49', 'Login', NULL),
(506, 1005, 'user@gmail.com', '39.45.53.206', '2020-11-10', '16:32:48', 'Login', NULL),
(507, 1005, 'user@gmail.com', '39.45.154.42', '2020-11-13', '10:46:29', 'Login', NULL),
(508, 1005, 'user@gmail.com', '39.45.154.42', '2020-11-13', '10:46:29', 'Login', NULL),
(509, 1005, 'user@gmail.com', '39.45.154.42', '2020-11-13', '10:46:40', 'Forgiveness-Check', NULL),
(510, 1005, 'user@gmail.com', '39.45.154.42', '2020-11-13', '10:47:22', 'Forgiveness-Check', NULL),
(511, 1005, 'user@gmail.com', '39.41.202.108', '2020-11-13', '11:10:24', 'Login', NULL),
(512, 1005, 'user@gmail.com', '39.41.202.108', '2020-11-13', '11:10:28', 'Forgiveness-Check', NULL),
(513, 1005, 'user@gmail.com', '39.41.202.108', '2020-11-13', '11:33:47', 'Login', NULL),
(514, 1005, 'user@gmail.com', '39.41.202.108', '2020-11-13', '11:34:08', 'Login', NULL),
(515, 1005, 'user@gmail.com', '39.41.202.108', '2020-11-13', '11:34:16', 'Login', NULL),
(516, 1005, 'user@gmail.com', '39.41.202.108', '2020-11-13', '11:34:24', 'Login', NULL),
(517, 1005, 'user@gmail.com', '39.41.202.108', '2020-11-13', '11:34:44', 'Login', NULL),
(518, 1005, 'user@gmail.com', '39.41.202.108', '2020-11-13', '11:34:45', 'Login', NULL),
(519, 1005, 'user@gmail.com', '39.41.202.108', '2020-11-13', '11:35:32', 'Login', NULL),
(520, 1005, 'user@gmail.com', '39.41.202.108', '2020-11-13', '11:36:41', 'Login', NULL),
(521, 1005, 'user@gmail.com', '39.41.202.108', '2020-11-13', '11:36:42', 'Login', NULL),
(522, 1005, 'user@gmail.com', '39.41.202.108', '2020-11-13', '11:36:46', 'Login', NULL),
(523, 1005, 'user@gmail.com', '39.41.202.108', '2020-11-13', '11:36:47', 'Login', NULL),
(524, 1005, 'user@gmail.com', '39.41.202.108', '2020-11-13', '11:36:48', 'Login', NULL),
(525, 1005, 'user@gmail.com', '39.41.202.108', '2020-11-13', '11:36:49', 'Login', NULL),
(526, 1005, 'user@gmail.com', '39.41.202.108', '2020-11-13', '11:36:49', 'Login', NULL),
(527, 1005, 'user@gmail.com', '39.41.202.108', '2020-11-13', '11:36:49', 'Login', NULL),
(528, 1005, 'user@gmail.com', '39.41.202.108', '2020-11-13', '11:36:50', 'Login', NULL),
(529, 1005, 'user@gmail.com', '39.41.202.108', '2020-11-13', '11:36:50', 'Login', NULL),
(530, 1005, 'user@gmail.com', '39.41.202.108', '2020-11-13', '11:37:00', 'Forgiveness-Check', NULL),
(531, 1005, 'user@gmail.com', '39.41.202.108', '2020-11-13', '17:20:58', 'Login', NULL),
(532, 1005, 'user@gmail.com', '39.41.202.108', '2020-11-13', '17:21:01', 'Forgiveness-Check', NULL),
(533, 1005, 'user@gmail.com', '39.41.202.108', '2020-11-13', '19:32:05', 'Login', NULL),
(534, 1005, 'user@gmail.com', '39.41.202.108', '2020-11-13', '19:32:10', 'Forgiveness-Check', NULL),
(535, 1005, 'user@gmail.com', '39.45.154.143', '2020-11-14', '17:04:57', 'Login', NULL),
(536, 1005, 'user@gmail.com', '39.45.154.143', '2020-11-14', '17:05:01', 'Forgiveness-Check', NULL),
(537, 1005, 'user@gmail.com', '39.41.207.146', '2020-11-16', '06:35:55', 'Login', NULL),
(538, 1005, 'user@gmail.com', '39.41.207.146', '2020-11-16', '06:36:06', 'Forgiveness-Check', NULL),
(539, 1005, 'user@gmail.com', '39.41.207.146', '2020-11-16', '08:47:17', 'Login', NULL),
(540, 1005, 'user@gmail.com', '39.41.207.146', '2020-11-16', '08:47:36', 'Forgiveness-Check', NULL),
(541, 1005, 'user@gmail.com', '39.41.207.146', '2020-11-16', '09:11:40', 'Login', NULL),
(542, 1005, 'user@gmail.com', '39.41.207.146', '2020-11-16', '09:11:48', 'Forgiveness-Check', NULL),
(543, 0, 'admin@gmail.com', '198.16.74.45', '2020-11-17', '16:26:39', 'Login', NULL),
(544, 1008, 'admin@gmail.com', '198.16.74.45', '2020-11-17', '16:29:55', 'Forgiveness-Check', NULL),
(545, 1008, 'admin@gmail.com', '198.16.74.45', '2020-11-17', '16:37:06', 'Forgiveness-Check', NULL),
(546, 1005, 'user@gmail.com', '39.45.240.25', '2020-11-18', '05:23:03', 'Login', NULL),
(547, 1005, 'user@gmail.com', '39.45.240.25', '2020-11-18', '05:23:15', 'Forgiveness-Check', NULL),
(548, 1005, 'user@gmail.com', '39.45.176.190', '2020-11-23', '12:04:18', 'Login', NULL),
(549, 1005, 'user@gmail.com', '39.45.159.7', '2020-12-01', '17:25:07', 'Login', NULL),
(550, 1005, 'user@gmail.com', '39.45.159.7', '2020-12-01', '17:26:06', 'Logout', NULL),
(551, 1005, 'user@gmail.com', '39.45.159.7', '2020-12-01', '17:36:24', 'Login', NULL),
(552, 1005, 'user@gmail.com', '39.45.159.7', '2020-12-01', '17:36:40', 'Logout', NULL),
(553, 1017, '', '', '0000-00-00', '00:00:00', '', NULL),
(554, 1018, '', '', '0000-00-00', '00:00:00', '', NULL),
(555, 1019, '', '', '0000-00-00', '00:00:00', '', NULL),
(556, 0, 'admin@gmail.com', '50.7.142.179', '2020-12-09', '16:14:34', 'Login', NULL),
(557, 0, 'admin@gmail.com', '50.7.142.179', '2020-12-09', '16:26:10', 'Logout', ''),
(558, 0, 'admin@gmail.com', '50.7.142.179', '2020-12-09', '16:26:37', 'Login', NULL),
(559, 1005, 'admin@gmail.com', '50.7.142.179', '2020-12-09', '16:28:43', 'Forgiveness-Check', NULL),
(560, 1005, 'user@gmail.com', '39.45.144.136', '2020-12-12', '13:58:17', 'Login', NULL),
(561, 1005, 'user@gmail.com', '39.45.144.136', '2020-12-12', '13:58:35', 'Forgiveness-Check', NULL),
(562, 1005, 'user@gmail.com', '39.41.243.178', '2020-12-13', '17:02:33', 'Login', NULL),
(563, 1005, 'user@gmail.com', '39.41.243.178', '2020-12-13', '17:02:49', 'Forgiveness-Check', NULL),
(564, 1005, 'user@gmail.com', '39.45.16.93', '2020-12-16', '10:14:45', 'Login', NULL),
(565, 1005, 'user@gmail.com', '39.45.16.93', '2020-12-16', '10:15:01', 'Forgiveness-Check', NULL),
(566, 1005, 'user@gmail.com', '39.45.16.93', '2020-12-16', '10:18:30', 'Upgrade-Plan', NULL),
(567, 1005, 'user@gmail.com', '119.158.120.116', '2020-12-23', '14:18:24', 'Login', NULL),
(568, 1005, 'user@gmail.com', '119.158.120.116', '2020-12-23', '14:18:33', 'Forgiveness-Check', NULL),
(569, 1005, 'user@gmail.com', '39.41.197.250', '2020-12-29', '05:57:16', 'Login', NULL),
(570, 1005, 'user@gmail.com', '39.41.197.250', '2020-12-29', '12:16:49', 'Login', NULL),
(571, 1005, 'user@gmail.com', '39.45.213.51', '2020-12-31', '12:58:47', 'Login', NULL),
(572, 1005, 'user@gmail.com', '39.45.213.51', '2020-12-31', '13:35:19', 'Login', NULL),
(573, 1005, 'user@gmail.com', '39.45.213.51', '2020-12-31', '13:35:50', 'Logout', NULL),
(574, 1005, 'user@gmail.com', '39.45.213.51', '2020-12-31', '13:36:41', 'Login', NULL),
(575, 1005, 'user@gmail.com', '39.45.213.51', '2020-12-31', '13:39:49', 'companyInfo-Upload', NULL),
(576, 1005, 'user@gmail.com', '39.45.213.51', '2020-12-31', '13:43:55', 'Owner-Save', NULL),
(577, 1005, 'user@gmail.com', '39.45.213.51', '2020-12-31', '13:46:23', 'Loan-Save', NULL),
(578, 0, 'admin@gmail.com', '39.45.213.51', '2020-12-31', '13:48:50', 'Login', NULL),
(579, 1005, 'user@gmail.com', '39.45.213.51', '2020-12-31', '18:36:13', 'Login', NULL),
(580, 1005, 'user@gmail.com', '39.45.213.51', '2021-01-01', '04:51:46', 'Login', NULL),
(581, 1005, 'user@gmail.com', '198.16.76.69', '2021-01-02', '21:53:55', 'Login', NULL),
(582, 1005, 'user@gmail.com', '198.16.76.69', '2021-01-02', '21:54:17', 'Logout', NULL),
(583, 1005, 'user@gmail.com', '198.16.76.69', '2021-01-02', '21:58:06', 'Login', NULL),
(584, 1005, 'user@gmail.com', '198.16.76.69', '2021-01-02', '21:58:37', 'Forgiveness-Check', NULL),
(585, 1005, 'user@gmail.com', '198.16.76.69', '2021-01-02', '21:58:47', 'Logout', NULL),
(586, 1005, 'user@gmail.com', '198.16.76.69', '2021-01-02', '21:58:56', 'Login', NULL),
(587, 1005, 'user@gmail.com', '39.41.156.174', '2021-01-11', '17:26:14', 'Login', NULL),
(588, 1005, 'user@gmail.com', '39.45.62.48', '2021-01-13', '05:31:23', 'Login', NULL),
(589, 1005, 'user@gmail.com', '39.45.62.48', '2021-01-13', '05:31:50', 'Logout', NULL),
(590, 0, 'admin@gmail.com', '39.45.62.48', '2021-01-13', '05:31:56', 'Login', NULL),
(591, 0, 'admin@gmail.com', '39.45.62.48', '2021-01-13', '05:33:21', 'customInvoice-Updated', '5'),
(592, 1005, 'user@gmail.com', '119.158.105.35', '2021-01-14', '09:21:21', 'Login', NULL),
(593, 0, 'admin@gmail.com', '39.45.236.4', '2021-01-25', '17:46:44', 'Login', NULL),
(594, 0, 'admin@gmail.com', '119.158.60.35', '2021-02-01', '05:25:08', 'Login', NULL),
(595, 0, 'admin@gmail.com', '119.158.60.35', '2021-02-01', '05:26:47', 'Logout', ''),
(596, 1005, 'user@gmail.com', '119.158.60.35', '2021-02-01', '05:27:26', 'Login', NULL),
(597, 1005, 'user@gmail.com', '119.158.60.35', '2021-02-01', '08:07:03', 'Login', NULL),
(598, 0, 'admin@gmail.com', '39.41.232.215', '2021-02-03', '12:50:46', 'Login', NULL),
(599, 1005, 'user@gmail.com', '39.45.207.112', '2021-02-16', '04:24:23', 'Login', NULL),
(600, 1005, 'user@gmail.com', '39.45.207.112', '2021-02-16', '04:25:48', 'Company-Save', NULL),
(601, 1005, 'user@gmail.com', '39.45.207.112', '2021-02-16', '07:29:01', 'Login', NULL),
(602, 1005, 'user@gmail.com', '39.45.207.112', '2021-02-16', '07:29:08', 'Company-Save', NULL),
(603, 1005, 'user@gmail.com', '39.45.207.112', '2021-02-16', '07:33:37', 'Logout', NULL),
(604, 0, 'admin@gmail.com', '39.45.207.112', '2021-02-16', '07:33:43', 'Login', NULL),
(605, 1005, 'user@gmail.com', '39.45.207.112', '2021-02-16', '09:22:05', 'Login', NULL),
(606, 1005, 'user@gmail.com', '39.45.46.61', '2021-02-19', '04:20:19', 'Login', NULL),
(607, 1005, 'user@gmail.com', '39.45.46.61', '2021-02-19', '04:23:50', 'companyInfo-Upload', NULL),
(608, 1005, 'user@gmail.com', '39.41.227.73', '2021-02-19', '05:50:31', 'Login', NULL),
(609, 1005, 'user@gmail.com', '39.41.227.73', '2021-02-19', '05:56:06', 'Owner-Save', NULL),
(610, 1005, 'user@gmail.com', '39.45.156.99', '2021-02-22', '04:42:07', 'Login', NULL),
(611, 0, 'admin@gmail.com', '39.45.156.99', '2021-02-22', '04:46:44', 'Login', NULL),
(612, 1005, 'user@gmail.com', '39.45.156.99', '2021-02-22', '04:51:41', 'Login', NULL),
(613, 0, 'user@gmail.com', '39.45.156.99', '2021-02-22', '04:51:59', 'Logout', ''),
(614, 1005, 'user@gmail.com', '111.88.29.115', '2021-02-22', '10:29:09', 'Login', NULL),
(615, 0, 'admin@gmail.com', '39.41.227.73', '2021-02-23', '09:14:36', 'Login', NULL),
(616, 0, 'admin@gmail.com', '39.41.227.73', '2021-02-23', '09:15:03', 'Login', NULL),
(617, 1005, 'user@gmail.com', '119.158.109.81', '2021-02-26', '20:56:00', 'Login', NULL),
(618, 0, 'admin@gmail.com', '39.41.194.129', '2021-02-27', '14:14:10', 'Login', NULL),
(619, 0, 'admin@gmail.com', '198.16.66.195', '2021-03-03', '04:11:41', 'Login', NULL),
(620, 0, 'admin@gmail.com', '198.16.66.195', '2021-03-03', '04:11:41', 'Login', NULL),
(621, 0, 'admin@gmail.com', '198.16.66.195', '2021-03-03', '04:12:01', 'Logout', ''),
(622, 1005, 'user@gmail.com', '198.16.66.195', '2021-03-03', '04:13:40', 'Login', NULL),
(623, 0, 'admin@gmail.com', '198.16.70.53', '2021-03-05', '07:33:46', 'Login', NULL),
(624, 1005, 'user@gmail.com', '39.45.159.144', '2021-04-14', '06:02:17', 'Login', NULL),
(625, 1005, 'user@gmail.com', '182.189.144.190', '2021-04-14', '06:04:31', 'Login', NULL),
(626, 1005, 'user@gmail.com', '182.189.144.190', '2021-04-14', '07:14:03', 'Login', NULL),
(627, 1005, 'user@gmail.com', '182.189.144.190', '2021-04-14', '07:16:01', 'Forgiveness-Check', NULL),
(628, 1005, 'user@gmail.com', '119.158.51.179', '2021-04-14', '10:04:57', 'Login', NULL),
(629, 1005, 'user@gmail.com', '119.158.62.116', '2021-04-15', '08:53:48', 'Login', NULL),
(630, 1005, 'user@gmail.com', '119.158.62.116', '2021-04-15', '08:59:39', 'Forgiveness-Check', NULL),
(631, 1005, 'user@gmail.com', '119.158.62.116', '2021-04-15', '09:01:21', 'Logout', NULL),
(632, 1005, 'user@gmail.com', '119.158.62.116', '2021-04-15', '09:01:37', 'Login', NULL),
(633, 0, 'admin@gmail.com', '39.45.159.144', '2021-04-23', '06:21:30', 'Login', NULL),
(634, 1005, 'user@gmail.com', '39.41.196.124', '2021-05-03', '19:36:00', 'Login', NULL),
(635, 1005, 'user@gmail.com', '39.41.196.124', '2021-05-03', '19:36:01', 'Login', NULL),
(636, 1005, 'user@gmail.com', '39.41.134.161', '2021-05-06', '06:09:26', 'Login', NULL),
(637, 1005, 'user@gmail.com', '39.41.134.161', '2021-05-06', '07:41:19', 'Login', NULL),
(638, 1005, 'user@gmail.com', '39.41.134.161', '2021-05-06', '07:42:13', 'Logout', NULL),
(639, 0, 'admin@gmail.com', '39.41.134.161', '2021-05-06', '07:42:40', 'Login', NULL),
(640, 1005, 'user@gmail.com', '39.45.152.250', '2021-05-12', '06:49:12', 'Login', NULL),
(641, 0, 'admin@gmail.com', '39.41.238.25', '2021-05-12', '09:09:27', 'Login', NULL),
(642, 1005, 'user@gmail.com', '76.85.96.168', '2021-05-12', '16:51:10', 'Login', NULL),
(643, 0, 'admin@gmail.com', '76.85.96.168', '2021-05-12', '19:39:43', 'Login', NULL),
(644, 0, 'admin@gmail.com', '76.85.96.168', '2021-05-12', '19:46:17', 'customInvoice-Generated', '28'),
(645, 0, 'admin@gmail.com', '76.85.96.168', '2021-05-12', '19:59:49', 'SalesId-Updated', ''),
(646, 0, 'admin@gmail.com', '76.85.96.168', '2021-05-12', '20:00:43', 'SalesId-Updated', ''),
(647, 1005, 'user@gmail.com', '76.85.96.168', '2021-05-12', '20:01:52', 'Login', NULL),
(648, 1005, 'user@gmail.com', '76.85.96.168', '2021-05-12', '20:03:23', 'Forgiveness-Check', NULL),
(649, 1005, 'user@gmail.com', '76.85.96.168', '2021-05-12', '20:07:24', 'Loan-Save', NULL),
(650, 1005, 'user@gmail.com', '76.85.96.168', '2021-05-12', '20:09:38', 'Forgiveness-Check', NULL),
(651, 0, 'admin@gmail.com', '39.33.141.43', '2021-05-19', '06:11:41', 'Login', NULL),
(652, 0, 'admin@gmail.com', '39.33.141.43', '2021-05-19', '06:20:59', 'Logout', ''),
(653, 0, 'admin@gmail.com', '76.85.102.116', '2021-05-20', '18:08:17', 'Login', NULL),
(654, 1005, 'user@gmail.com', '39.45.29.219', '2021-05-22', '09:29:57', 'Login', NULL),
(655, 1005, 'user@gmail.com', '39.45.29.219', '2021-05-22', '09:30:11', 'Company-Save', NULL),
(656, 0, 'admin@gmail.com', '39.41.154.209', '2021-05-24', '05:02:38', 'Login', NULL),
(657, 0, 'admin@gmail.com', '39.33.179.39', '2021-05-24', '05:09:34', 'Login', NULL),
(658, 1005, 'user@gmail.com', '39.45.29.219', '2021-05-24', '05:11:22', 'Login', NULL),
(659, 0, 'admin@gmail.com', '39.33.179.39', '2021-05-24', '05:29:00', 'Logout', ''),
(660, 0, 'admin@gmail.com', '39.41.154.209', '2021-05-24', '06:32:34', 'Login', NULL),
(661, 0, 'admin@gmail.com', '39.41.154.209', '2021-05-24', '08:17:45', 'Login', NULL),
(662, 0, 'admin@gmail.com', '39.41.154.209', '2021-05-24', '12:30:11', 'Login', NULL),
(663, 0, 'admin@gmail.com', '39.41.154.209', '2021-05-24', '12:31:08', 'customInvoice-Updated', '12'),
(664, 0, 'admin@gmail.com', '39.41.154.209', '2021-05-24', '12:31:12', 'customInvoice-Updated', '12'),
(665, 0, 'admin@gmail.com', '39.41.154.209', '2021-05-24', '12:37:45', 'ExcelFile-Exported', ''),
(666, 1005, 'user@gmail.com', '65.122.125.94', '2021-05-28', '15:25:22', 'Login', NULL),
(667, 0, 'admin@gmail.com', '65.122.125.94', '2021-05-28', '15:28:36', 'Login', NULL),
(668, 1020, '', '', '0000-00-00', '00:00:00', '', NULL),
(669, 0, 'admin@gmail.com', '65.122.125.94', '2021-05-28', '15:40:23', 'Login', NULL),
(670, 0, 'admin@gmail.com', '27.34.17.10', '2021-05-28', '15:43:03', 'Login', NULL),
(671, 0, 'admin@gmail.com', '65.122.125.94', '2021-05-28', '16:23:24', 'PromoCode-Updated', '42342'),
(672, 1005, 'user@gmail.com', '39.41.157.108', '2021-05-31', '10:05:09', 'Login', NULL),
(673, 1005, 'user@gmail.com', '39.41.157.108', '2021-05-31', '10:05:12', 'Login', NULL),
(674, 0, 'admin@gmail.com', '182.182.252.150', '2021-05-31', '11:07:17', 'Login', NULL),
(675, 0, 'admin@gmail.com', '182.182.252.150', '2021-05-31', '11:07:32', 'Logout', ''),
(676, 1005, 'user@gmail.com', '182.182.252.150', '2021-05-31', '11:07:40', 'Login', NULL),
(677, 1005, 'user@gmail.com', '182.182.252.150', '2021-05-31', '11:54:19', 'Login', NULL),
(678, 1005, 'user@gmail.com', '39.41.226.162', '2021-06-01', '06:21:14', 'Login', NULL),
(679, 1005, 'user@gmail.com', '39.41.226.162', '2021-06-01', '06:34:06', 'Forgiveness-Check', NULL),
(680, 1005, 'user@gmail.com', '182.182.192.53', '2021-06-01', '07:44:20', 'Login', NULL),
(681, 1005, 'user@gmail.com', '39.41.226.162', '2021-06-01', '08:13:09', 'Login', NULL),
(682, 1005, 'user@gmail.com', '39.41.226.162', '2021-06-01', '08:13:11', 'Login', NULL),
(683, 1005, 'user@gmail.com', '43.245.11.110', '2021-06-01', '10:21:22', 'Login', NULL),
(684, 1005, 'user@gmail.com', '43.245.11.110', '2021-06-01', '10:21:25', 'Forgiveness-Check', NULL),
(685, 1005, 'user@gmail.com', '43.245.11.110', '2021-06-01', '10:21:28', 'Forgiveness-Check', NULL),
(686, 0, 'admin@gmail.com', '39.41.226.162', '2021-06-01', '11:32:51', 'Login', NULL),
(687, 1005, 'user@gmail.com', '39.41.161.113', '2021-06-03', '05:43:53', 'Login', NULL),
(688, 1005, 'user@gmail.com', '182.182.210.45', '2021-06-03', '07:37:27', 'Login', NULL),
(689, 0, 'admin@gmail.com', '39.45.167.245', '2021-07-27', '06:23:50', 'Login', NULL),
(690, 1005, 'user@gmail.com', '50.7.142.179', '2021-07-27', '06:42:52', 'Login', NULL),
(691, 1005, 'user@gmail.com', '50.7.142.179', '2021-07-27', '10:14:09', 'Login', NULL),
(692, 1005, 'user@gmail.com', '50.7.142.179', '2021-07-27', '10:16:29', 'Logout', NULL),
(693, 1005, 'user@gmail.com', '50.7.142.179', '2021-07-27', '10:17:28', 'Login', NULL),
(694, 1005, 'user@gmail.com', '39.45.227.75', '2021-09-16', '06:22:14', 'Login', NULL),
(695, 0, 'admin@gmail.com', '39.45.176.253', '2022-02-14', '08:34:39', 'Login', NULL),
(696, 1005, 'user@gmail.com', '39.45.135.21', '2022-04-04', '07:00:29', 'Login', NULL),
(697, 1005, 'user@gmail.com', '39.45.135.21', '2022-04-04', '07:04:11', 'Logout', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `companytable`
--

CREATE TABLE `companytable` (
  `cust_id` int(10) NOT NULL,
  `sales_id` varchar(10) DEFAULT NULL,
  `entity_type` varchar(30) DEFAULT NULL,
  `business_name` varchar(255) DEFAULT NULL,
  `trade_name` varchar(100) DEFAULT NULL,
  `ein` varchar(15) DEFAULT NULL,
  `ssn` varchar(15) DEFAULT NULL,
  `street_address1` varchar(255) DEFAULT NULL,
  `street_address2` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `state` varchar(10) DEFAULT NULL,
  `zip` varchar(10) DEFAULT NULL,
  `seasonalbusiness` varchar(11) NOT NULL,
  `franchisebusiness` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `companytable`
--

INSERT INTO `companytable` (`cust_id`, `sales_id`, `entity_type`, `business_name`, `trade_name`, `ein`, `ssn`, `street_address1`, `street_address2`, `city`, `state`, `zip`, `seasonalbusiness`, `franchisebusiness`) VALUES
(1005, '123456234', 'Self-Employed/Sole Proprietor', 'abk inc.', 'qqqqqqq', '22-2222222', '222-22-2222', 'dfasfasfa', 'adfafa', 'dfaf', 'IN', 'adsfa', 'Yes', 'Yes'),
(1006, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', ''),
(1008, NULL, 'S-Corp', 'DWM', '', '11-1111111', '', 'qqq', '', 'qqqqq', 'AR', '22222', 'Yes', 'Yes'),
(1009, NULL, 'S-Corp', 'aaa', '', '11-1111111', '', '1111111111111', '', 'Lah', 'CO', '123__', 'Yes', 'Yes'),
(1010, NULL, 'Partnership', 'aaa', '', '11-1111111', '', '1111111111111', '', 'Lah', 'CO', '123__', 'Yes', 'Yes'),
(1015, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', ''),
(1016, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', ''),
(1017, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', ''),
(1018, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', ''),
(1019, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', ''),
(1020, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', ''),
(1074, '4343343', 'S-Corp', 'aaa', '', '22-2222222', '', '1111111111111', '', 'Lah', 'CO', '123__', 'Yes', 'No'),
(1075, '0', NULL, 'abc', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', ''),
(1076, '1234523', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', ''),
(1077, '0', NULL, 'fdad4534535', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', ''),
(1078, '0', 'S-Corp', 'aaa', '', '11-1111111', '', '11111111', '1111111111111', '11111', 'CO', '123__', 'Yes', 'No'),
(1079, '1234', 'S-Corp', 'aaa', 'aaa', '3_-_______', '3__-__-____', 'aaa', '', 'aa', 'LA', 'a____', 'Yes', 'Yes'),
(1080, '12345', 'S-Corp', 'XYZ', '', '45-_______', '', 'dfsfsd', '', 'sadasd', 'LA', '33___', 'No', 'Yes'),
(1081, '0', 'S-Corp', 'AB @ AB.com', '', '21-3213213', '', '1', '', 'fd', 'AL', '12121', 'No', 'No'),
(1086, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', ''),
(1088, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', ''),
(1109, '0', NULL, 'abc', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', ''),
(1110, '3412412', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', ''),
(1111, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', ''),
(1114, '43e4', NULL, 'abc', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', ''),
(1116, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', ''),
(1117, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', ''),
(1123, NULL, NULL, 'adsfa', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', ''),
(1124, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', ''),
(1126, '3412412121', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', ''),
(1131, '123alpha', 'C-Corp', 'DWM', '', '11-1111111', '', 'shs', 'sjsj', 'sjsj', 'DC', '11111', 'Yes', 'No'),
(1132, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', ''),
(1133, NULL, 'Partnership', '122', '', '11-1111111', '', '1111111', '1', '111111111111', 'AZ', '1____', 'Yes', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `custominvoicetable`
--

CREATE TABLE `custominvoicetable` (
  `invoice_id` int(11) NOT NULL,
  `cust_id` int(11) NOT NULL,
  `reference_id` int(11) NOT NULL,
  `reference_email` varchar(100) NOT NULL,
  `amount` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `current_date` date NOT NULL,
  `due_date` date NOT NULL,
  `status` varchar(50) NOT NULL DEFAULT 'pending'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `custominvoicetable`
--

INSERT INTO `custominvoicetable` (`invoice_id`, `cust_id`, `reference_id`, `reference_email`, `amount`, `description`, `current_date`, `due_date`, `status`) VALUES
(5, 1005, 0, '', '3554.00', '', '2020-10-15', '2020-10-21', 'pending'),
(6, 1005, 0, '', '2500', '', '2020-10-15', '2020-10-21', 'pending'),
(7, 1005, 0, '', '2500.00', '', '2020-10-15', '2020-10-23', 'paid'),
(8, 1005, 0, '', '1200.00', '', '2020-10-15', '2020-10-15', 'paid'),
(9, 1005, 0, '', '251.00', '', '2020-10-16', '2020-10-29', 'paid'),
(10, 25, 0, 'admin@gmail.com', '333.00', '', '2020-10-16', '2020-10-28', 'pending'),
(11, 1005, 0, 'user@gmail.com', '35000.00', 'For call support', '2020-10-16', '2020-10-23', 'paid'),
(12, 1010, 0, 'admin2@gmail.com', '1000.00', '', '2020-10-17', '2020-10-08', 'pending'),
(13, 1010, 0, 'i171028@nu.edu.pk', '1000.00', '', '2020-10-17', '2020-10-31', 'paid'),
(14, 1010, 0, 'admin3@gmail.com', '2000.00', '', '2020-10-17', '2020-10-30', 'pending'),
(15, 1010, 0, 'admin3@gmail.com', '10000.00', '', '2020-10-17', '2020-10-23', 'pending'),
(16, 1005, 0, 'admin@gmail.com', '3544.00', '', '2020-10-27', '2020-10-31', 'pending'),
(17, 1005, 0, 'admin@gmail.com', '23423.00', '', '2020-10-27', '2020-10-29', 'pending'),
(18, 1005, 0, 'admin@gmail.com', '3423.00', 'sdasdfa', '2020-10-29', '2020-11-04', 'pending'),
(19, 1005, 0, 'admin@gmail.com', '3423.00', 'sdasdfa', '2020-10-29', '2020-11-04', 'pending'),
(20, 1005, 0, 'admin@gmail.com', '3423.00', 'sdasdfa', '2020-10-29', '2020-11-04', 'pending'),
(21, 1005, 0, 'admin@gmail.com', '34242.00', 'dfaasf', '2020-10-29', '2020-10-31', 'pending'),
(22, 1005, 0, 'admin@gmail.com', '34242.00', 'dfaasf', '2020-10-29', '2020-10-31', 'pending'),
(23, 1005, 0, 'admin@gmail.com', '342.00', 'fdafa', '2020-10-29', '2020-10-31', 'pending'),
(24, 1005, 0, 'admin@gmail.com', '3242342.00', 'fasdfasfaf', '2020-10-29', '2020-10-29', 'pending'),
(25, 1005, 0, 'admin@gmail.com', '345234.00', 'dgsdgsdf', '2020-10-29', '2020-10-30', 'pending'),
(26, 1005, 0, 'admin@gmail.com', '3242141.00', 'dfasfasf', '2020-10-29', '2020-11-25', 'pending'),
(27, 1005, 0, 'admin@gmail.com', '3452345.00', 'sdfdfgsdg', '2020-10-29', '2020-11-27', 'pending'),
(28, 1005, 0, 'admin@gmail.com', '5453453.00', '', '2021-05-12', '2021-05-19', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `filestable`
--

CREATE TABLE `filestable` (
  `file_id` int(11) NOT NULL,
  `cust_id` int(255) NOT NULL,
  `group_id` varchar(50) NOT NULL,
  `filetype` varchar(255) NOT NULL,
  `filedescription` varchar(255) DEFAULT NULL,
  `filename` varchar(255) NOT NULL,
  `date_time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `filestable`
--

INSERT INTO `filestable` (`file_id`, `cust_id`, `group_id`, `filetype`, `filedescription`, `filename`, `date_time`) VALUES
(1, 1081, 'payrollCost', 'SPayroll Report - 2020 Year-to-Date', 'test', '1081/15996656335 hands USA.jpg', '2020-09-09 08:33:53'),
(4, 1005, 'companyInfo', 'EIN/TIN proof', '', '1005/1603534369SAMPLE-Company-Name1 2020 ADP Payroll Summary 0925.xlsx', '2020-10-24 03:12:49'),
(5, 1005, 'companyInfo', 'EIN/TIN proof', '', '1005/1603534433SAMPLE-Company-Name1 2020 ADP Payroll Summary 0925.xlsx', '2020-10-24 03:13:53'),
(6, 1005, 'companyInfo', 'EIN/TIN proof', '', '1005/1609421989OCR TEST CASES.docx', '2020-12-31 06:39:49');

-- --------------------------------------------------------

--
-- Table structure for table `loantable`
--

CREATE TABLE `loantable` (
  `cust_id` int(10) NOT NULL,
  `sba` varchar(35) DEFAULT NULL,
  `loan_number` varchar(35) DEFAULT NULL,
  `loan_amount` double DEFAULT NULL,
  `bank_name` varchar(50) DEFAULT NULL,
  `disbursement_date` date DEFAULT NULL,
  `eidl_amount` double DEFAULT 0,
  `Eidl_app_number` varchar(20) DEFAULT NULL,
  `eidl_loan_date` date DEFAULT NULL,
  `eidl_grant_amount` double DEFAULT NULL,
  `eidl_grant_app_num` varchar(70) DEFAULT NULL,
  `edit_grant_date` date DEFAULT NULL,
  `loantime_employees` float DEFAULT NULL,
  `forgivenesstime_employees` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `loantable`
--

INSERT INTO `loantable` (`cust_id`, `sba`, `loan_number`, `loan_amount`, `bank_name`, `disbursement_date`, `eidl_amount`, `Eidl_app_number`, `eidl_loan_date`, `eidl_grant_amount`, `eidl_grant_app_num`, `edit_grant_date`, `loantime_employees`, `forgivenesstime_employees`) VALUES
(1005, '1234567890', '3345353', 25564564, '0asdfaasd', '2020-06-03', 34007, '1234567890', '2020-08-11', 30000, '12', '2020-08-26', 40, 38),
(1006, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(1008, NULL, NULL, 10000, '', '2020-07-01', 0, NULL, NULL, NULL, NULL, NULL, 40, 38),
(1009, '', '0', 1000, 'Delta', '2020-08-07', 0, '', '0000-00-00', 0, '0', '0000-00-00', 40, 38),
(1010, '', '0', 10000, '', '2020-08-07', 0, '', '0000-00-00', 0, '0', '0000-00-00', 100, 100),
(1015, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(1016, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(1017, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(1018, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(1019, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(1020, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(1074, '', '0', 27000, '', '2020-08-01', 0, '', '0000-00-00', 0, '0', '0000-00-00', 40, 38),
(1075, NULL, NULL, 2222, 'asdfa', '2020-07-24', 0, NULL, NULL, NULL, NULL, NULL, 78, 78),
(1076, '', '0', 0, '', '2020-08-01', 0, '', '0000-00-00', 0, '0', '0000-00-00', 0, 0),
(1077, NULL, NULL, 200000, 'asfaf', '2020-08-07', 0, NULL, NULL, NULL, NULL, NULL, 45.54, 76.76),
(1078, '', '0', 1000, '', '2020-06-17', 100, '', '2020-09-01', 200, '0', '2020-09-02', 10, 8),
(1079, '', '', 10000, 'aaa', '2020-08-07', 0, '', '0000-00-00', 0, '', '0000-00-00', 0, 0),
(1080, '', '0', 12000, '', '2020-06-01', 1, '', '0000-00-00', 0, '0', '0000-00-00', 20, 10),
(1081, '', '0', 25000, '', '2020-06-02', 0, '', '0000-00-00', 0, '0', '0000-00-00', 10, 9),
(1086, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(1088, '3334444444', '23423', 25000, 'asdfa', '2020-08-05', 0, '', '0000-00-00', 0, '0', '0000-00-00', 35, 35),
(1109, NULL, NULL, 1231, 'asdfa', '2020-08-05', 0, NULL, NULL, NULL, NULL, NULL, 34, 34),
(1110, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(1111, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(1114, NULL, NULL, 20000, '', '2020-08-05', 0, NULL, NULL, NULL, NULL, NULL, 25, 25),
(1116, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(1117, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(1123, NULL, NULL, 234234, '', '2020-07-23', 0, NULL, NULL, NULL, NULL, NULL, 34, 34),
(1124, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(1126, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(1131, '', '0', 1200, '', '2020-06-16', 0, '', '0000-00-00', 0, '0', '0000-00-00', 40, 38),
(1132, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(1133, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `nonpayrolltable`
--

CREATE TABLE `nonpayrolltable` (
  `nonpayroll_id` int(11) NOT NULL,
  `cust_id` int(11) NOT NULL,
  `rent_payee` varchar(255) DEFAULT NULL,
  `rent_amount` varchar(255) DEFAULT '0',
  `rent_month` varchar(255) DEFAULT NULL,
  `rent_date` varchar(255) DEFAULT NULL,
  `mortgage_payee` varchar(255) DEFAULT NULL,
  `mortgage_amount` varchar(255) DEFAULT '0',
  `mortgage_month` varchar(255) DEFAULT NULL,
  `mortgage_date` varchar(255) DEFAULT NULL,
  `utility_payee` varchar(255) DEFAULT NULL,
  `utility_amount` varchar(255) DEFAULT '0',
  `utility_type` varchar(255) DEFAULT NULL,
  `utility_month` varchar(255) DEFAULT NULL,
  `utility_date` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `nonpayrolltable`
--

INSERT INTO `nonpayrolltable` (`nonpayroll_id`, `cust_id`, `rent_payee`, `rent_amount`, `rent_month`, `rent_date`, `mortgage_payee`, `mortgage_amount`, `mortgage_month`, `mortgage_date`, `utility_payee`, `utility_amount`, `utility_type`, `utility_month`, `utility_date`) VALUES
(8, 1005, 'aaa', '100.00', '2020-06', '2020-03-07', 'aaa', '0.00', '2020-08', '2020-09-01', 'Scrapy Junk Car Removal', '0.00', 'Water', '2020-08', '2020-09-01'),
(72, 1074, '1111', '1.1111111111111112e+31', '2020-09', '2020-09-01', '', '0.00', '', '', '', '0.00', '', '', ''),
(73, 1075, NULL, '0', NULL, NULL, NULL, '0', NULL, NULL, NULL, '0', NULL, NULL, NULL),
(74, 1076, 'a', '1000.00', '2020-09', '2020-09-01', '', '0.00', '', '', '', '0.00', '', '', ''),
(75, 1077, NULL, '0', NULL, NULL, NULL, '0', NULL, NULL, NULL, '0', NULL, NULL, NULL),
(76, 1078, NULL, '0', NULL, NULL, NULL, '0', NULL, NULL, NULL, '0', NULL, NULL, NULL),
(77, 1079, '', '0.00', '', '', '~vv', '0.00~000', '~2020-03', '~2020-09-09', 'qqqqqq', '0.00', '', '', ''),
(78, 1080, '', '1000.00', '2020-02', '2020-09-08', '', '1000.00', '2020-07', '', 'ere', '1000.00', 'Electric', '2020-02', '2020-08-30'),
(79, 1081, NULL, '0', NULL, NULL, NULL, '0', NULL, NULL, NULL, '0', NULL, NULL, NULL),
(80, 1086, NULL, '0', NULL, NULL, NULL, '0', NULL, NULL, NULL, '0', NULL, NULL, NULL),
(81, 1088, NULL, '0', NULL, NULL, NULL, '0', NULL, NULL, NULL, '0', NULL, NULL, NULL),
(82, 1109, NULL, '0', NULL, NULL, NULL, '0', NULL, NULL, NULL, '0', NULL, NULL, NULL),
(83, 1110, NULL, '0', NULL, NULL, NULL, '0', NULL, NULL, NULL, '0', NULL, NULL, NULL),
(84, 1111, NULL, '0', NULL, NULL, NULL, '0', NULL, NULL, NULL, '0', NULL, NULL, NULL),
(85, 1114, NULL, '0', NULL, NULL, NULL, '0', NULL, NULL, NULL, '0', NULL, NULL, NULL),
(86, 1116, NULL, '0', NULL, NULL, NULL, '0', NULL, NULL, NULL, '0', NULL, NULL, NULL),
(87, 1117, NULL, '0', NULL, NULL, NULL, '0', NULL, NULL, NULL, '0', NULL, NULL, NULL),
(88, 1123, NULL, '0', NULL, NULL, NULL, '0', NULL, NULL, NULL, '0', NULL, NULL, NULL),
(89, 1124, NULL, '0', NULL, NULL, NULL, '0', NULL, NULL, NULL, '0', NULL, NULL, NULL),
(91, 1126, NULL, '0', NULL, NULL, NULL, '0', NULL, NULL, NULL, '0', NULL, NULL, NULL),
(92, 1131, NULL, '0', NULL, NULL, NULL, '0', NULL, NULL, NULL, '0', NULL, NULL, NULL),
(93, 1132, NULL, '0', NULL, NULL, NULL, '0', NULL, NULL, NULL, '0', NULL, NULL, NULL),
(94, 1133, NULL, '0', NULL, NULL, NULL, '0', NULL, NULL, NULL, '0', NULL, NULL, NULL),
(95, 1006, NULL, '0', NULL, NULL, NULL, '0', NULL, NULL, NULL, '0', NULL, NULL, NULL),
(96, 1008, NULL, '0', NULL, NULL, NULL, '0', NULL, NULL, NULL, '0', NULL, NULL, NULL),
(97, 1009, 'aaa', '1111.00', '2020-10', '2020-10-20', '', '0.00', '', '', '', '0.00', '', '', ''),
(98, 1010, NULL, '0', NULL, NULL, NULL, '0', NULL, NULL, NULL, '0', NULL, NULL, NULL),
(99, 1015, NULL, '0', NULL, NULL, NULL, '0', NULL, NULL, NULL, '0', NULL, NULL, NULL),
(100, 1016, NULL, '0', NULL, NULL, NULL, '0', NULL, NULL, NULL, '0', NULL, NULL, NULL),
(101, 1017, NULL, '0', NULL, NULL, NULL, '0', NULL, NULL, NULL, '0', NULL, NULL, NULL),
(102, 1018, NULL, '0', NULL, NULL, NULL, '0', NULL, NULL, NULL, '0', NULL, NULL, NULL),
(103, 1019, NULL, '0', NULL, NULL, NULL, '0', NULL, NULL, NULL, '0', NULL, NULL, NULL),
(104, 1020, NULL, '0', NULL, NULL, NULL, '0', NULL, NULL, NULL, '0', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ownertable`
--

CREATE TABLE `ownertable` (
  `cust_id` int(10) NOT NULL,
  `owner_count` int(4) DEFAULT NULL,
  `first_name` text DEFAULT NULL,
  `middle_initial` varchar(255) DEFAULT NULL,
  `last_name` text DEFAULT NULL,
  `title` text DEFAULT NULL,
  `ownership_percentage` varchar(255) DEFAULT NULL,
  `owner2019_pay` varchar(255) DEFAULT '0',
  `email` text DEFAULT NULL,
  `landline_phone` varchar(255) DEFAULT NULL,
  `landline_extension` varchar(255) DEFAULT NULL,
  `mobile_phone` varchar(255) DEFAULT NULL,
  `mobile_carrier` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ownertable`
--

INSERT INTO `ownertable` (`cust_id`, `owner_count`, `first_name`, `middle_initial`, `last_name`, `title`, `ownership_percentage`, `owner2019_pay`, `email`, `landline_phone`, `landline_extension`, `mobile_phone`, `mobile_carrier`) VALUES
(1005, 5, 'Junk Car~fsadfa~Abu bakker~Arslan', 'R~d~u~', 'Mississauga~daffda~akram~Zulfiqar', 'eeeeeee~adfafa~eeeeeee~Developer', '48~44.99~2~0.1', '160944.00~10239.15~0.00~5000.00', 'user@gmail.com~abubkr.akram@gmail.com~abubkr.akram@gmail.com~arslanzulfiqar01@gmail.com', '647-484-6934~033-250-6306~647-484-6998~111-111-1111', '44444~~44444~', '333-333-3333~333-333-3333~647-484-6998~111-111-1111', 'Verizon~Sprint~Verizon~'),
(1006, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL),
(1008, 2, 'Shaoor', '', 'SIddique', 'CEO', '20', '1000.00', 'shaoor@gmail.com', '111-111-1111', '', '111-111-1111', ''),
(1009, 1, 'Shaoor', '', 'SIddique', 'CEO', '12', '1111.00', 'shaoor1@gmail.com', '111-111-1111', '', '111-111-1111', ''),
(1010, 1, 'Shaoor', '', 'SIddique', 'CEO', '10', '1111.00', 'i171028@nu.edu.pk', '111-111-1111', '11111', '222-222-2222', ''),
(1015, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL),
(1016, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL),
(1017, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL),
(1018, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL),
(1019, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL),
(1020, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL),
(1074, 2, 'Shaoor~abu', '~', 'SIddique~akram', 'CEO~ceo', '30~20', '0.00~1500.00', 'pak_beta@gmail.com~abu@gmail.com', '111-111-1111~222-222-2222', '~', '222-222-2222~111-111-1111', '~'),
(1075, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL),
(1076, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL),
(1077, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL),
(1078, 2, 'Shaoor 3rd 444', '', 'q', 'CEO', '12', '12222.00', 'pak_alpha1@gmail.com', '111-111-1111', '', '222-222-2222', 'Sprint'),
(1079, 1, 'hoor', '', 'nisa', 'aaa', '100', '100000.00', 'hoorunnisaa@gmail.com', '33_-___-____', '3____', '3__-___-____', 'AT&T'),
(1080, 3, 'Sikandar~Abu bakker~sfaf', '~u~a', 'ali~akram~fasdfas', 'Abc~asdfasfda~adsfa', '20~45~1', '52000.00~104.00~52.00', 'joni@gmail.com~abubkr.akram@gmail.com~adf@gmail.com', '344-___-____~647-973-6534~233-333-3333', '~44444~33333', '4__-___-____~647-973-6534~333-333-3333', '~AT&T~Sprint'),
(1081, 2, 'Fn~D', '~', 'Ln~G', 'CEO~pre', '90~10', '26000.00~104.00', 'ab@ab.com~bc@bc.com', '113-123-2132~213-123-1232', '~', '342-423-4324~223-423-4234', '~'),
(1086, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL),
(1088, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL),
(1109, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL),
(1110, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL),
(1111, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL),
(1114, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL),
(1116, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL),
(1117, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL),
(1123, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL),
(1124, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL),
(1126, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL),
(1131, 2, 'Shaoor', '', 'SIddique', 'CEO', '20', '101111.00', 'shaoor_whole1@gmail.com', '111-111-1111', '', '111-111-1111', ''),
(1132, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL),
(1133, 1, '1111', '', 'siss', '11111111', '10', '100.00', 'alpha_4@gmail.com', '11_-___-____', '', '111-111-1111', 'Verizon');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `txn_id` int(11) NOT NULL,
  `PaymentMethod` varchar(50) NOT NULL,
  `PayerStatus` varchar(50) NOT NULL,
  `PayerMail` int(100) NOT NULL,
  `Total` decimal(19,2) NOT NULL,
  `SubTotal` decimal(19,2) NOT NULL,
  `Tax` decimal(19,2) NOT NULL,
  `Payment_state` varchar(50) NOT NULL,
  `CreateTime` varchar(50) NOT NULL,
  `UpdateTime` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `paymenttable`
--

CREATE TABLE `paymenttable` (
  `id` int(11) NOT NULL,
  `cust_id` int(11) DEFAULT NULL,
  `product_id` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `buyer_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `buyer_email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `discount` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `card_number` varchar(25) COLLATE utf8_unicode_ci DEFAULT NULL,
  `card_exp_month` varchar(2) COLLATE utf8_unicode_ci NOT NULL,
  `card_exp_year` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `paid_amount` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `paid_amount_currency` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `txn_id` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `payment_status` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `user_ip` varchar(24) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `paymenttable`
--

INSERT INTO `paymenttable` (`id`, `cust_id`, `product_id`, `buyer_name`, `buyer_email`, `discount`, `card_number`, `card_exp_month`, `card_exp_year`, `paid_amount`, `paid_amount_currency`, `txn_id`, `payment_status`, `created`, `user_ip`) VALUES
(1, 1080, '3', 'Abu bakker usman akram', 'abubkr.akram@gmail.com', NULL, '************4242', '12', '2021', '1762.22', 'usd', 'txn_1HOomEDlIKHarw4uFhVLNQUS', 'succeeded', '2020-09-07 11:09:14', ''),
(2, 1074, '3', 'shaoor', 'i171028@nu.edu.pk', NULL, '************4242', '12', '2025', '878.9', 'usd', 'txn_1HPAOWDlIKHarw4uxY6IYxtC', 'succeeded', '2020-09-08 10:14:13', ''),
(3, 1110, '3', 'Dinesh Gulati', 'dgulati2@gmail.com', NULL, '************4242', '10', '2022', '1008.8', 'usd', 'txn_1HPBfqDlIKHarw4uNzMNN5T0', 'succeeded', '2020-09-08 11:36:11', ''),
(4, 1076, '2', 'Abu bakker usman akram', 'abubkr.akram@gmail.com', NULL, '************4242', '12', '2021', '1018.6', 'usd', 'txn_1HPLb8DlIKHarw4uiH2FhNPz', 'succeeded', '2020-09-08 22:11:58', ''),
(5, NULL, '3', 'Abu bakker usman akram', 'abubkr.akram@gmail.com', NULL, '************4242', '12', '2021', '250', 'usd', 'txn_1HPM0oDlIKHarw4ue6hhAV9A', 'succeeded', '2020-09-08 22:38:30', ''),
(6, NULL, '4', 'Abu bakker usman akram', 'abubkr.akram@gmail.com', NULL, '************4242', '12', '2021', '550', 'usd', 'txn_1HPM1WDlIKHarw4uS3rX9I1Q', 'succeeded', '2020-09-08 22:39:14', ''),
(7, NULL, '3', 'Abu bakker usman akram', 'abubkr.akram@gmail.com', NULL, '************4242', '12', '2021', '1268.6', 'usd', 'txn_1HPM8oDlIKHarw4uGel71ac9', 'succeeded', '2020-09-08 22:46:48', ''),
(8, NULL, '4', 'Abu bakker usman akram', 'abubkr.akram@gmail.com', NULL, '************4242', '12', '2021', '550', 'usd', 'txn_1HPRexDlIKHarw4uGnhkUifh', 'succeeded', '2020-09-09 04:40:19', ''),
(9, NULL, '5', 'Abu bakker usman akram', 'abubkr.akram@gmail.com', NULL, '************4242', '12', '2021', '2.1', 'usd', 'txn_1HPRjdDlIKHarw4u60F3hcxG', 'succeeded', '2020-09-09 04:45:09', '111.119.187.27'),
(10, NULL, '4', 'Abu bakker usman akram', 'abubkr.akram@gmail.com', NULL, '************4242', '12', '2021', '550', 'usd', 'txn_1HPTrIDlIKHarw4uVts0leQ3', 'succeeded', '2020-09-09 07:01:14', '111.119.187.27'),
(11, NULL, '3', 'Dinesh Gulati', 'dgulati2@gmail.com', NULL, '************4242', '11', '2021', '878.9', 'usd', 'txn_1HPULGDlIKHarw4uZtjGaOVZ', 'succeeded', '2020-09-09 07:32:10', '24.190.103.0'),
(12, 1005, '5', 'Abu bakker usman akram', 'abubkr.akram@gmail.com', NULL, '************4242', '12', '2021', '4.1', 'usd', 'txn_1HPqalDlIKHarw4uV38IBavV', 'succeeded', '2020-09-10 07:17:39', '111.119.187.36'),
(13, 1005, '2', 'Abu bakker usman akram', 'abubkr.akram@gmail.com', NULL, '************4242', '12', '2021', '750', 'usd', 'txn_1HQztnDlIKHarw4uwdncjo4s', 'succeeded', '2020-09-13 11:26:03', '39.45.10.178'),
(14, 1005, '2', 'Abu bakker usman akram', 'abubkr.akram@gmail.com', NULL, '************4242', '12', '2021', '750', 'usd', 'txn_1HQzzFDlIKHarw4uho4fgUBn', 'succeeded', '2020-09-13 11:31:41', '39.45.10.178'),
(15, 1074, '2', 'Abu bakker usman akram', 'abubkr.akram@gmail.com', NULL, '************4242', '12', '2021', '850', 'usd', 'txn_1HSSToDlIKHarw4uotrAf3Hy', 'succeeded', '2020-09-17 12:09:16', '39.45.7.102'),
(16, 1005, '3', 'Abu bakker usman akram', 'abubkr.akram@gmail.com', NULL, '************4242', '12', '2021', '1274.2', 'usd', 'txn_1HScwzDlIKHarw4u9UsZwy4j', 'succeeded', '2020-09-17 23:20:05', '39.45.7.102'),
(17, 1005, '6', 'Abu bakker usman akram', 'abubkr.akram@gmail.com', NULL, '************4242', '12', '2021', '950', 'usd', 'txn_1HTVqcDlIKHarw4uyxIidA7Y', 'succeeded', '2020-09-20 09:57:10', '39.45.183.161'),
(18, 1005, '2', 'Abu bakker usman akram', 'abubkr.akram@gmail.com', NULL, '************4242', '12', '2021', '1021.4', 'usd', 'txn_1HTVwrDlIKHarw4uluKfyo3R', 'succeeded', '2020-09-20 10:03:37', '39.45.183.161'),
(19, 1114, '0', '', '1114', NULL, '', '', '', '0', 'usd', '', 'No payment done', '2020-09-27 11:30:45', ''),
(20, 1122, '0', '', '', NULL, '', '', '', '0', 'usd', '', 'No payment done', '2020-09-28 07:56:22', ''),
(21, 1123, '0', '', 'abc121212@gmail.com', NULL, '', '', '', '0', 'usd', '', 'No payment done', '2020-09-28 11:54:04', ''),
(22, 1124, '0', '', '', NULL, '', '', '', '0', 'usd', '', 'No payment done', '2020-09-28 12:07:54', ''),
(24, 1126, '0', '', 'shaoor_test_1@gmail.com', NULL, '', '', '', '0', 'usd', '', 'No payment done', '2020-09-29 04:13:07', ''),
(25, 1131, '0', '', 'shaoor_whole1@gmail.com', NULL, '', '', '', '0', 'usd', '', 'No payment done', '2020-09-29 13:13:50', ''),
(26, 1132, '0', '', 'shaoor_admin2@gmail.com', NULL, '', '', '', '0', 'usd', '', 'No payment done', '2020-09-29 13:25:16', ''),
(27, 1131, '4', 'Shaoor SIddique', 'shaoor.mrf@gmail.com', NULL, '************4242', '12', '2020', '1831.4', 'usd', 'txn_1HWqAFDlIKHarw4uOO2ZSbqp', 'succeeded', '2020-09-29 14:15:10', '50.7.93.27'),
(28, 1133, '0', '', 'alpha_4@gmail.com', NULL, '', '', '', '0', 'usd', '', 'No payment done', '2020-09-29 15:55:04', ''),
(29, NULL, 'AK-1234', 'John', 'buyer@paypalsandbox.com', NULL, NULL, '', '', '12.34', 'USD', '621361318', 'Completed', '2020-10-09 11:25:52', '173.0.81.1'),
(30, 1005, '154', 'Junk Car Removal Mississauga', 'CarClunker@gmail.com', NULL, '************4242', '12', '2021', '2500', 'usd', 'txn_1HccF4DlIKHarw4u8hM8L1QL', 'succeeded', '2020-10-15 12:36:02', '39.45.40.100'),
(31, 1005, '154', 'Shaoor SIddique', 'shaoor.mrf@gmail.com', NULL, '************4242', '12', '2020', '1200', 'usd', 'txn_1HcciUDlIKHarw4uiXH5GNiL', 'succeeded', '2020-10-15 13:06:27', '198.16.66.195'),
(32, 1005, '154', 'Shaoor SIddique', 'shaoor.mrf@gmail.com', NULL, '************4242', '12', '2020', '1200', 'usd', 'txn_1HccjVDlIKHarw4uISn4biKt', 'succeeded', '2020-10-15 13:07:29', '198.16.66.195'),
(33, 1006, '0', '', 'abubkr.akram@gmail.com', NULL, '', '', '', '0', 'usd', '', 'No payment done', '2020-10-15 21:15:08', ''),
(34, 1005, '154', 'Abu bakker usman akram', 'abubkr.akram@gmail.com', NULL, '************4242', '12', '2021', '251', 'usd', 'txn_1HckUHDlIKHarw4uIFuqaWiP', 'succeeded', '2020-10-15 21:24:17', '39.45.26.185'),
(35, 1005, '3', 'Abu bakker usman akram', 'abubkr.akram@gmail.com', '10%', '************4242', '12', '2021', '223.2', 'usd', 'txn_1Hcu25DlIKHarw4uGiTvto7R', 'succeeded', '2020-10-16 07:35:49', '39.45.26.185'),
(36, 1005, '4', 'Abu bakker usman akram', 'abubkr.akram@gmail.com', '10%', '************4242', '12', '2021', '495', 'usd', 'txn_1HdAHLDlIKHarw4uGqKuMZui', 'succeeded', '2020-10-17 00:56:39', '39.45.26.185'),
(37, 1005, '154', 'Abu bakker usman akram', 'abubkr.akram@gmail.com', '', '************4242', '12', '2021', '35000', 'usd', 'txn_1HdBmhDlIKHarw4unpWG6bI0', 'succeeded', '2020-10-17 02:33:07', '39.45.26.185'),
(38, 1005, '154', 'Abu bakker usman akram', 'abubkr.akram@gmail.com', '', '************4242', '12', '2021', '35000', 'usd', 'txn_1HdBolDlIKHarw4uDslNNw6z', 'succeeded', '2020-10-17 02:35:16', '39.45.26.185'),
(39, 1005, '154', 'Abu bakker usman akram', 'abubkr.akram@gmail.com', '', '************4242', '12', '2021', '35000', 'usd', 'txn_1HdBqtDlIKHarw4uJajc5r0a', 'succeeded', '2020-10-17 02:37:27', '39.45.26.185'),
(40, 1005, '2', 'Scrap Car Removal 4 Cash', 'CarClunker@gmail.com', '', '************4242', '12', '2021', '1046.4', 'usd', 'txn_1HdBxKDlIKHarw4upjV38mTP', 'succeeded', '2020-10-17 02:44:06', '39.45.26.185'),
(41, 1008, '0', '', 'shaoor@gmail.com', NULL, '', '', '', '0', 'usd', '', 'No payment done', '2020-10-17 05:54:12', ''),
(42, 1009, '0', '', 'shaoor1@gmail.com', NULL, '', '', '', '0', 'usd', '', 'No payment done', '2020-10-17 07:01:21', ''),
(43, 1009, '2', 'shaoor', 'shaoor.mrf@gmail.com', NULL, '************4242', '12', '2020', '1022.4', 'usd', 'txn_1HdG2KDlIKHarw4uti7fD3M2', 'succeeded', '2020-10-17 07:05:32', '198.16.76.29'),
(44, 1010, '0', '', 'shaoor.mrf@gmail.com', NULL, '', '', '', '0', 'usd', '', 'No payment done', '2020-10-17 07:14:34', ''),
(45, 1010, '2', 'shaoor', 'shaoor.mrf@gmail.com', '', '************4242', '12', '2020', '1812', 'usd', 'txn_1HdGCJDlIKHarw4uUGHXz6W9', 'succeeded', '2020-10-17 07:15:51', '198.16.76.29'),
(46, 1010, '154', 'shaoor', 'shaoor.mrf@gmail.com', '', '************4242', '12', '2020', '1000', 'usd', 'txn_1HdGe5DlIKHarw4u9un9hHkd', 'succeeded', '2020-10-17 07:44:34', '198.16.76.29'),
(47, 1010, '154', 'Shaoor SIddique', 'shaoor.mrf@gmail.com', '', '************4242', '12', '2022', '1000', 'usd', 'txn_1HdGi1DlIKHarw4uj9yHhL1Y', 'succeeded', '2020-10-17 07:48:38', '198.16.76.29'),
(48, 1010, '154', 'Shaoor SIddique', 'shaoor.mrf@gmail.com', '', '************4242', '12', '2020', '1000', 'usd', 'txn_1HdGprDlIKHarw4utUkMqU7X', 'succeeded', '2020-10-17 07:56:43', '198.16.76.29'),
(49, 1010, '3', 'Shaoor SIddique', 'shaoor.mrf@gmail.com', '', '************4242', '12', '2020', '248', 'usd', 'txn_1HdGqbDlIKHarw4uPXSsHcmq', 'succeeded', '2020-10-17 07:57:30', '198.16.76.29'),
(50, 1010, '4', 'shaoor', 'shaoor.mrf@gmail.com', '', '************4242', '12', '2020', '550', 'usd', 'txn_1HdH0rDlIKHarw4uutCQN8dz', 'succeeded', '2020-10-17 08:08:05', '198.16.76.29'),
(51, 1015, '0', '', '', NULL, '', '', '', '0', 'usd', '', 'No payment done', '2020-10-25 00:51:27', ''),
(52, 1016, '0', '', '', NULL, '', '', '', '0', 'usd', '', 'No payment done', '2020-10-26 22:48:42', ''),
(53, 1017, '0', '', 'abubkr.akram@gmail.com', NULL, '', '', '', '0', 'usd', '', 'No payment done', '2020-12-01 10:41:45', ''),
(54, 1018, '0', '', 'abubkr.akram@gmail.com', NULL, '', '', '', '0', 'usd', '', 'No payment done', '2020-12-01 10:45:12', ''),
(55, 1019, '0', '', 'abubkr.akram@gmail.com', NULL, '', '', '', '0', 'usd', '', 'No payment done', '2020-12-01 11:12:06', ''),
(56, 1005, '4', 'Abu bakker usman akram', 'abubkr.akram@gmail.com', NULL, '************4242', '12', '2020', '550', 'usd', 'txn_1Hyx5WDlIKHarw4uonAtxd1c', 'succeeded', '2020-12-16 03:18:30', '39.45.16.93'),
(57, 1020, '0', '', 'sujandstc@gmail.com', NULL, '', '', '', '0', 'usd', '', 'No payment done', '2021-05-28 08:37:22', '');

-- --------------------------------------------------------

--
-- Table structure for table `payrolltable`
--

CREATE TABLE `payrolltable` (
  `payroll_id` int(11) NOT NULL,
  `cust_id` int(20) NOT NULL,
  `payroll_schedule` varchar(15) DEFAULT NULL,
  `payroll_begin_date` date DEFAULT NULL,
  `loan8_start` date DEFAULT NULL,
  `loan8_end` date DEFAULT NULL,
  `payroll8_start` date DEFAULT NULL,
  `payroll8_end` date DEFAULT NULL,
  `loan24_start` date DEFAULT NULL,
  `loan24_end` date DEFAULT NULL,
  `payroll24_start` date DEFAULT NULL,
  `payroll24_end` date DEFAULT NULL,
  `payroll_service` varchar(50) DEFAULT NULL,
  `Payroll_software` varchar(50) DEFAULT NULL,
  `covered8_cost` float DEFAULT 0,
  `alternate8_cost` float DEFAULT 0,
  `covered24_cost` float DEFAULT 0,
  `alternate24_cost` float DEFAULT 0,
  `unemp8_contributions` float DEFAULT 0,
  `state8_taxes` float DEFAULT 0,
  `tax8_description` varchar(250) DEFAULT NULL,
  `unemp24_contributions` float DEFAULT 0,
  `state24_taxes` float DEFAULT 0,
  `tax24_description` varchar(250) DEFAULT NULL,
  `health8_cost` float DEFAULT 0,
  `retirement8_cost` float DEFAULT 0,
  `health24_cost` float DEFAULT 0,
  `retirement24_cost` float DEFAULT 0,
  `covered8_opay` varchar(255) DEFAULT '0',
  `covered24_opay` varchar(255) DEFAULT '0',
  `alternate8_opay` varchar(255) DEFAULT '0',
  `alternate24_opay` varchar(255) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payrolltable`
--

INSERT INTO `payrolltable` (`payroll_id`, `cust_id`, `payroll_schedule`, `payroll_begin_date`, `loan8_start`, `loan8_end`, `payroll8_start`, `payroll8_end`, `loan24_start`, `loan24_end`, `payroll24_start`, `payroll24_end`, `payroll_service`, `Payroll_software`, `covered8_cost`, `alternate8_cost`, `covered24_cost`, `alternate24_cost`, `unemp8_contributions`, `state8_taxes`, `tax8_description`, `unemp24_contributions`, `state24_taxes`, `tax24_description`, `health8_cost`, `retirement8_cost`, `health24_cost`, `retirement24_cost`, `covered8_opay`, `covered24_opay`, `alternate8_opay`, `alternate24_opay`) VALUES
(13, 1005, 'BiWeekly', '2020-06-10', '2020-06-03', '2020-07-28', '2020-06-10', '2020-08-04', '2020-06-03', '2020-11-17', '2020-06-10', '2020-11-24', 'Accountant', 'Intuit', 0, 0, 30000, 30000, 0, 0, '', 0, 0, '', 0, 0, 0, 0, '', '5.00~3.00', '0', '0.00~0.00'),
(68, 1074, 'Daily', '2020-09-01', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '2020-08-01', '2020-12-31', '2020-09-01', '2020-12-31', '', '', 0, 0, 0, 0, 0, 0, '', 10, 400000000000, '', 0, 0, 222222, 1.11111e16, '0', '0', '0', '0'),
(69, 1075, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 0, NULL, 0, 0, NULL, 0, 0, 0, 0, '0', '0', '0', '0'),
(70, 1076, 'BiWeekly', '2020-09-25', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '2020-08-01', '2020-12-31', '2020-09-25', '2020-12-31', '', '', 0, 0, 100000, 0, 0, 0, '', 200, 0, '', 200, 0, 0, 0, '', '0', '', '0'),
(71, 1077, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 0, NULL, 0, 0, NULL, 0, 0, 0, 0, '0', '0', '0', '0'),
(72, 1078, 'Daily', '2020-09-01', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '2020-06-17', '2020-09-21', '2020-09-01', '2020-12-31', '', '', 0, 0, 0, 100, 0, 0, '', 100, 1000, 'djdjlkjfj alkjlkasd jzdjkl', 0, 0, 0, 0, '', '0', '', '5.00'),
(73, 1079, 'Daily', '2020-09-10', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '2020-08-07', '2020-12-31', '2020-09-10', '2020-12-31', '', '', 0, 0, 0, 0, 0, 0, '', 0, 0, '', 0, 0, 0, 0, '', 'NaN', '', 'NaN'),
(74, 1080, 'Monthly', '2020-09-08', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '2020-07-31', '2020-12-31', '2020-09-08', '2020-12-31', '', '', 0, 0, 1, 1, 0, 0, '', 1000, 1000, 'afas', 0, 0, 1000, 1000, '', '0.00~0.00', '', '20.00~0.00'),
(75, 1081, 'SemiMonthly', '2020-05-11', '2020-05-08', '2020-07-02', '2020-05-11', '2020-07-05', '2020-05-08', '2020-10-22', '2020-05-11', '2020-10-25', '', '', 20000, 21000, 30000, 31000, 0, 0, NULL, 0, 0, NULL, 0, 0, 0, 0, '11.00~33.00', '21000.00~41000.00', '22.00~44.00', '31000.00~51000.00'),
(76, 1086, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 0, NULL, 0, 0, NULL, 0, 0, 0, 0, '0', '0', '0', '0'),
(77, 1088, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 0, NULL, 0, 0, NULL, 0, 0, 0, 0, '0', '0', '0', '0'),
(78, 1109, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 0, NULL, 0, 0, NULL, 0, 0, 0, 0, '0', '0', '0', '0'),
(79, 1110, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 0, NULL, 0, 0, NULL, 0, 0, 0, 0, '0', '0', '0', '0'),
(80, 1111, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 0, NULL, 0, 0, NULL, 0, 0, 0, 0, '0', '0', '0', '0'),
(81, 1114, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 0, NULL, 0, 0, NULL, 0, 0, 0, 0, '0', '0', '0', '0'),
(82, 1116, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 0, NULL, 0, 0, NULL, 0, 0, 0, 0, '0', '0', '0', '0'),
(83, 1117, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 0, NULL, 0, 0, NULL, 0, 0, 0, 0, '0', '0', '0', '0'),
(84, 1123, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 0, NULL, 0, 0, NULL, 0, 0, 0, 0, '0', '0', '0', '0'),
(85, 1124, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 0, NULL, 0, 0, NULL, 0, 0, 0, 0, '0', '0', '0', '0'),
(87, 1126, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 0, NULL, 0, 0, NULL, 0, 0, 0, 0, '0', '0', '0', '0'),
(88, 1131, 'Qtrly', '2020-12-04', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '2020-06-16', '2020-12-31', '2020-12-04', '2020-12-31', 'Myself', '', 1000, 101011, 101010, 1010100000, 111, 111, '', 0, 1, '1111', 0, 0, 0, 0, '101010.00', '10101.00', '10101.00', '10101.00'),
(89, 1132, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 0, NULL, 0, 0, NULL, 0, 0, 0, 0, '0', '0', '0', '0'),
(90, 1133, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 0, NULL, 0, 0, NULL, 0, 0, 0, 0, '0', '0', '0', '0'),
(91, 1006, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 0, NULL, 0, 0, NULL, 0, 0, 0, 0, '0', '0', '0', '0'),
(92, 1008, 'Daily', '2020-10-01', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '2020-07-01', '2020-12-15', '2020-10-01', '2020-12-31', '', '', 0, 0, 0, 0, 0, 0, NULL, 0, 0, NULL, 0, 0, 0, 0, '0', '0', '0', '0'),
(93, 1009, 'BiWeekly', '2020-10-01', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '2020-08-07', '2020-12-31', '2020-10-01', '2020-12-31', '', '', 0, 0, 0, 0, 0, 0, NULL, 0, 0, NULL, 0, 0, 0, 0, '0', '0', '0', '0'),
(94, 1010, 'Weekly', '2020-10-02', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '2020-08-07', '2020-12-31', '2020-10-02', '2020-12-31', '', '', 0, 0, 0, 0, 0, 0, NULL, 0, 0, NULL, 0, 0, 0, 0, '0', '0', '0', '0'),
(95, 1015, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 0, NULL, 0, 0, NULL, 0, 0, 0, 0, '0', '0', '0', '0'),
(96, 1016, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 0, NULL, 0, 0, NULL, 0, 0, 0, 0, '0', '0', '0', '0'),
(97, 1017, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 0, NULL, 0, 0, NULL, 0, 0, 0, 0, '0', '0', '0', '0'),
(98, 1018, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 0, NULL, 0, 0, NULL, 0, 0, 0, 0, '0', '0', '0', '0'),
(99, 1019, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 0, NULL, 0, 0, NULL, 0, 0, 0, 0, '0', '0', '0', '0'),
(100, 1020, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 0, NULL, 0, 0, NULL, 0, 0, 0, 0, '0', '0', '0', '0');

-- --------------------------------------------------------

--
-- Table structure for table `pay_imp_employees_info`
--

CREATE TABLE `pay_imp_employees_info` (
  `id` int(11) NOT NULL,
  `employee_name` varchar(255) NOT NULL,
  `hire_date` date NOT NULL,
  `termination_date` date NOT NULL,
  `hire_as` varchar(255) DEFAULT NULL,
  `is_owner` varchar(255) DEFAULT NULL,
  `system_owner` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `customer_employee_id` varchar(255) NOT NULL,
  `customer_id` varchar(255) NOT NULL,
  `pay_freq` varchar(255) NOT NULL,
  `file_id` int(11) NOT NULL DEFAULT 0,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `created_by` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pay_imp_employees_info`
--

INSERT INTO `pay_imp_employees_info` (`id`, `employee_name`, `hire_date`, `termination_date`, `hire_as`, `is_owner`, `system_owner`, `status`, `customer_employee_id`, `customer_id`, `pay_freq`, `file_id`, `created_at`, `created_by`) VALUES
(733, 'Adams, Damon', '2016-09-19', '2020-06-18', 'Hourly', 'TRUE', '', 'Terminated', 'xxx-xx-xxxx', '1010', 'Biweekly', 72, '2020-10-27 20:18:19', 1),
(734, 'Allen-Ebron, Taneequa', '2020-03-20', '0000-00-00', 'Hourly', 'TRUE', '', 'Active', 'xxx-xx-xxxx', '1010', 'Biweekly', 72, '2020-10-27 20:18:19', 1),
(735, 'Baldomero, Alyssa', '2020-04-01', '0000-00-00', 'Hourly', 'FALSE', '', 'Active', 'xxx-xx-xxxx', '1010', 'Biweekly', 72, '2020-10-27 20:18:19', 1),
(736, 'Caba, Rosaoris', '2016-09-12', '0000-00-00', 'Hourly', 'FALSE', '', 'Active', 'xxx-xx-xxxx', '1010', 'Biweekly', 72, '2020-10-27 20:18:19', 1),
(737, 'Cabrera, Mardelyn', '2020-04-06', '0000-00-00', 'Hourly', 'FALSE', '', 'Active', 'xxx-xx-xxxx', '1010', 'Biweekly', 72, '2020-10-27 20:18:19', 1),
(738, 'Cyrille, Maxime', '2020-03-27', '2020-05-08', 'Hourly', 'FALSE', '', 'Terminated', 'xxx-xx-xxxx', '1010', 'Biweekly', 72, '2020-10-27 20:18:19', 1),
(739, 'Eckerson, Amanda', '2020-01-09', '2020-04-14', 'Hourly', 'FALSE', '', 'Terminated', 'xxx-xx-xxxx', '1010', 'Biweekly', 72, '2020-10-27 20:18:19', 1),
(740, 'Hall, Josephine', '2016-09-21', '0000-00-00', 'Hourly', 'FALSE', '', 'Active', 'xxx-xx-xxxx', '1010', 'Biweekly', 72, '2020-10-27 20:18:19', 1),
(741, 'Kemmer, Mary', '2020-03-23', '2020-03-26', 'Hourly', 'FALSE', '', 'Terminated', 'xxx-xx-xxxx', '1010', 'Biweekly', 72, '2020-10-27 20:18:19', 1),
(742, 'Linares, Gabriel', '2019-04-09', '0000-00-00', 'Hourly', 'FALSE', '', 'Active', 'xxx-xx-xxxx', '1010', 'Biweekly', 72, '2020-10-27 20:18:19', 1),
(743, 'Longtin, Susan', '2020-04-01', '0000-00-00', 'Hourly', 'FALSE', '', 'Active', 'xxx-xx-xxxx', '1010', 'Biweekly', 72, '2020-10-27 20:18:19', 1),
(744, 'Lukes, Daquan', '2020-04-01', '0000-00-00', 'Hourly', 'FALSE', '', 'Active', 'xxx-xx-xxxx', '1010', 'Biweekly', 72, '2020-10-27 20:18:19', 1),
(745, 'Marino, Joseph', '2020-03-26', '2020-08-11', 'Hourly', 'FALSE', '', 'Terminated', 'xxx-xx-xxxx', '1010', 'Biweekly', 72, '2020-10-27 20:18:19', 1),
(746, 'Palma, Luz', '2017-02-15', '2019-12-13', 'Hourly', 'FALSE', '', 'Terminated', 'xxx-xx-xxxx', '1010', 'Biweekly', 72, '2020-10-27 20:18:19', 1),
(747, 'Ragsdale, Timothy', '2020-03-18', '0000-00-00', 'Hourly', 'FALSE', '', 'Active', 'xxx-xx-xxxx', '1010', 'Biweekly', 72, '2020-10-27 20:18:19', 1),
(748, 'Rodriguez, Barbara', '2019-09-06', '0000-00-00', 'Hourly', 'FALSE', '', 'Active', 'xxx-xx-xxxx', '1010', 'Biweekly', 72, '2020-10-27 20:18:19', 1),
(749, 'Rosenburgh, Sherri', '2020-03-19', '0000-00-00', 'Hourly', 'FALSE', '', 'Active', 'xxx-xx-xxxx', '1010', 'Biweekly', 72, '2020-10-27 20:18:19', 1),
(750, 'Urdanoff, Alex', '2020-01-21', '0000-00-00', 'Hourly', 'FALSE', '', 'Active', 'xxx-xx-xxxx', '1010', 'Biweekly', 72, '2020-10-27 20:18:19', 1),
(751, 'Walker, Kaila', '2019-09-03', '2020-01-16', 'Hourly', 'FALSE', '', 'Terminated', 'xxx-xx-xxxx', '1010', 'Biweekly', 72, '2020-10-27 20:18:19', 1),
(752, 'Walton, Arnae', '2020-03-16', '2020-06-16', 'Hourly', 'FALSE', '', 'Terminated', 'xxx-xx-xxxx', '1010', 'Biweekly', 72, '2020-10-27 20:18:19', 1),
(753, 'Williams, Regina', '2019-11-13', '2019-12-31', 'Hourly', 'FALSE', '', 'Terminated', 'xxx-xx-xxxx', '1010', 'Biweekly', 72, '2020-10-27 20:18:19', 1),
(1247, 'Adams, Damon', '2016-09-19', '2020-06-18', 'Hourly', 'TRUE', 'Junk Car~user@gmail.com~Mississauga', 'Terminated', 'xxx-xx-xxxx', '1005', 'Biweekly', 96, '2020-11-08 12:04:23', 1),
(1248, 'Allen-Ebron, Taneequa', '2020-03-20', '0000-00-00', 'Hourly', 'FALSE', '', 'Active', 'xxx-xx-xxxx', '1005', 'Biweekly', 96, '2020-11-08 12:04:23', 1),
(1249, 'Baldomero, Alyssa', '2020-04-01', '0000-00-00', 'Hourly', 'FALSE', '', 'Active', 'xxx-xx-xxxx', '1005', 'Biweekly', 96, '2020-11-08 12:04:23', 1),
(1250, 'Caba, Rosaoris', '2016-09-12', '0000-00-00', 'Hourly', 'FALSE', '', 'Active', 'xxx-xx-xxxx', '1005', 'Biweekly', 96, '2020-11-08 12:04:23', 1),
(1251, 'Cabrera, Mardelyn', '2020-04-06', '0000-00-00', 'Hourly', 'FALSE', '', 'Active', 'xxx-xx-xxxx', '1005', 'Biweekly', 96, '2020-11-08 12:04:23', 1),
(1252, 'Cyrille, Maxime', '2020-03-27', '2020-05-08', 'Hourly', 'FALSE', '', 'Terminated', 'xxx-xx-xxxx', '1005', 'Biweekly', 96, '2020-11-08 12:04:23', 1),
(1253, 'Eckerson, Amanda', '2020-01-09', '2020-04-14', 'Hourly', 'FALSE', '', 'Terminated', 'xxx-xx-xxxx', '1005', 'Biweekly', 96, '2020-11-08 12:04:23', 1),
(1254, 'Hall, Josephine', '2016-09-21', '0000-00-00', 'Hourly', 'FALSE', '', 'Active', 'xxx-xx-xxxx', '1005', 'Biweekly', 96, '2020-11-08 12:04:23', 1),
(1255, 'Kemmer, Mary', '2020-03-23', '2020-03-26', 'Hourly', 'FALSE', '', 'Terminated', 'xxx-xx-xxxx', '1005', 'Biweekly', 96, '2020-11-08 12:04:23', 1),
(1256, 'Linares, Gabriel', '2019-04-09', '0000-00-00', 'Hourly', 'FALSE', '', 'Active', 'xxx-xx-xxxx', '1005', 'Biweekly', 96, '2020-11-08 12:04:23', 1),
(1257, 'Longtin, Susan', '2020-04-01', '0000-00-00', 'Hourly', 'FALSE', '', 'Active', 'xxx-xx-xxxx', '1005', 'Biweekly', 96, '2020-11-08 12:04:23', 1),
(1258, 'Lukes, Daquan', '2020-04-01', '0000-00-00', 'Hourly', 'FALSE', '', 'Active', 'xxx-xx-xxxx', '1005', 'Biweekly', 96, '2020-11-08 12:04:23', 1),
(1259, 'Marino, Joseph', '2020-03-26', '2020-08-11', 'Hourly', 'FALSE', '', 'Terminated', 'xxx-xx-xxxx', '1005', 'Biweekly', 96, '2020-11-08 12:04:23', 1),
(1260, 'Palma, Luz', '2017-02-15', '2019-12-13', 'Hourly', 'FALSE', '', 'Terminated', 'xxx-xx-xxxx', '1005', 'Biweekly', 96, '2020-11-08 12:04:23', 1),
(1261, 'Ragsdale, Timothy', '2020-03-18', '0000-00-00', 'Hourly', 'FALSE', '', 'Active', 'xxx-xx-xxxx', '1005', 'Biweekly', 96, '2020-11-08 12:04:23', 1),
(1262, 'Rodriguez, Barbara', '2019-09-06', '0000-00-00', 'Hourly', 'FALSE', '', 'Active', 'xxx-xx-xxxx', '1005', 'Biweekly', 96, '2020-11-08 12:04:23', 1),
(1263, 'Rosenburgh, Sherri', '2020-03-19', '0000-00-00', 'Hourly', 'FALSE', '', 'Active', 'xxx-xx-xxxx', '1005', 'Biweekly', 96, '2020-11-08 12:04:23', 1),
(1264, 'Urdanoff, Alex', '2020-01-21', '0000-00-00', 'Hourly', 'FALSE', '', 'Active', 'xxx-xx-xxxx', '1005', 'Biweekly', 96, '2020-11-08 12:04:23', 1),
(1265, 'Walker, Kaila', '2019-09-03', '2020-01-16', 'Hourly', 'FALSE', '', 'Terminated', 'xxx-xx-xxxx', '1005', 'Biweekly', 96, '2020-11-08 12:04:23', 1),
(1266, 'Walton, Arnae', '2020-03-16', '2020-06-16', 'Hourly', 'FALSE', '', 'Terminated', 'xxx-xx-xxxx', '1005', 'Biweekly', 96, '2020-11-08 12:04:23', 1),
(1267, 'Williams, Regina', '2019-11-13', '2019-12-31', 'Hourly', 'FALSE', '', 'Terminated', 'xxx-xx-xxxx', '1005', 'Biweekly', 96, '2020-11-08 12:04:23', 1);

-- --------------------------------------------------------

--
-- Table structure for table `pay_imp_import_record`
--

CREATE TABLE `pay_imp_import_record` (
  `id` int(11) NOT NULL,
  `customer_id` varchar(225) NOT NULL,
  `file_type` varchar(255) NOT NULL DEFAULT '0',
  `vendor_id` varchar(255) NOT NULL DEFAULT '0',
  `file_name` text NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `created_by` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pay_imp_import_record`
--

INSERT INTO `pay_imp_import_record` (`id`, `customer_id`, `file_type`, `vendor_id`, `file_name`, `created_at`, `created_by`) VALUES
(72, '1010', 'Employee Summary', 'ADP', '2020_10_28_03_18_18__U0FNUExFLUNvbXBhbnktTmFtZTFfMjAyMF9BRFBfRW1wbG95ZWVfU3VtbWFyeV8yMDIwX1EzX3dpdGhfQ0VOU1VTLnhsc3gSAMPLE-Company-Name1_2020_ADP_Employee_Summary_2020_Q3_with_CENSUS.xlsx', '2020-10-27 20:18:18', 1),
(73, '1010', 'Payroll Summary', 'ADP', '2020_10_28_03_18_33__U0FNUExFLUNvbXBhbnktTmFtZTFfMjAxOV9BRFBfUGF5cm9sbF9TdW1tYXJ5XzA5MjUueGxzeASAMPLE-Company-Name1_2019_ADP_Payroll_Summary_0925.xlsx', '2020-10-27 20:18:33', 1),
(74, '1010', 'Payroll Summary', 'ADP', '2020_10_28_03_18_48__U0FNUExFLUNvbXBhbnktTmFtZTFfMjAyMF9BRFBfUGF5cm9sbF9TdW1tYXJ5XzA5MjUueGxzeASAMPLE-Company-Name1_2020_ADP_Payroll_Summary_0925.xlsx', '2020-10-27 20:18:48', 1),
(96, '1005', 'Employee Summary', 'ADP', '2020_11_08_19_04_21__U0FNUExFLUNvbXBhbnktTmFtZTFfMjAyMF9BRFBfRW1wbG95ZWVfU3VtbWFyeV8yMDIwX1EzX3dpdGhfQ0VOU1VTLnhsc3gSAMPLE-Company-Name1_2020_ADP_Employee_Summary_2020_Q3_with_CENSUS.xlsx', '2020-11-08 12:04:21', 1),
(97, '1005', 'Payroll Summary', 'ADP', '2020_11_08_19_04_42__U0FNUExFLUNvbXBhbnktTmFtZTFfMjAxOV9BRFBfUGF5cm9sbF9TdW1tYXJ5XzA5MjUueGxzeASAMPLE-Company-Name1_2019_ADP_Payroll_Summary_0925.xlsx', '2020-11-08 12:04:42', 1);

-- --------------------------------------------------------

--
-- Table structure for table `pay_imp_ownerpayrollsummary`
--

CREATE TABLE `pay_imp_ownerpayrollsummary` (
  `id` int(11) NOT NULL,
  `emp_id` int(50) NOT NULL,
  `cust_id` int(50) NOT NULL,
  `empSSN4` varchar(255) NOT NULL,
  `OwnFname` varchar(25) NOT NULL,
  `ownPayLookbackPer` decimal(50,2) NOT NULL,
  `ownPayForgPer` decimal(50,2) NOT NULL,
  `ownPayForgPer24` decimal(50,2) NOT NULL,
  `ownPerOwnership` decimal(3,2) NOT NULL,
  `ownPPPApplicable` decimal(3,2) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pay_imp_ownerpayrollsummary`
--

INSERT INTO `pay_imp_ownerpayrollsummary` (`id`, `emp_id`, `cust_id`, `empSSN4`, `OwnFname`, `ownPayLookbackPer`, `ownPayForgPer`, `ownPayForgPer24`, `ownPerOwnership`, `ownPPPApplicable`, `created_at`) VALUES
(1, 733, 1010, 'xxx-xx-xxxx', 'Adams, Damon', '160944.00', '0.00', '0.00', '0.00', '0.00', '2020-10-27 20:19:06'),
(2, 734, 1010, 'xxx-xx-xxxx', 'Allen-Ebron, Taneequa', '10239.15', '0.00', '0.00', '0.00', '0.00', '2020-10-27 20:19:06'),
(9, 1247, 1005, 'xxx-xx-xxxx', 'Adams, Damon', '160944.00', '0.00', '0.00', '0.00', '0.00', '2020-11-08 12:06:57');

-- --------------------------------------------------------

--
-- Table structure for table `pay_imp_payroll_info`
--

CREATE TABLE `pay_imp_payroll_info` (
  `id` int(11) NOT NULL,
  `pay_date` date NOT NULL,
  `employee_id` varchar(255) NOT NULL,
  `employee_name` varchar(255) NOT NULL,
  `hours_worked` text NOT NULL,
  `gross_pay` varchar(255) NOT NULL,
  `health_benefits` text NOT NULL,
  `retirement_benefits` text NOT NULL,
  `pay_period_begin_date` varchar(255) NOT NULL,
  `pay_period_end_date` varchar(255) NOT NULL,
  `customer_id` varchar(255) NOT NULL,
  `file_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pay_imp_payroll_info`
--

INSERT INTO `pay_imp_payroll_info` (`id`, `pay_date`, `employee_id`, `employee_name`, `hours_worked`, `gross_pay`, `health_benefits`, `retirement_benefits`, `pay_period_begin_date`, `pay_period_end_date`, `customer_id`, `file_id`, `created_at`) VALUES
(10792, '2019-09-25', '737', 'Cabrera, Mardelyn', '56', '1580.00', '', '', '', '', '1010', 73, '2020-10-27 20:18:33'),
(10793, '2019-09-25', '748', 'Rodriguez, Barbara', '63', '1990.00', '', '', '', '', '1010', 73, '2020-10-27 20:18:33'),
(10794, '2019-09-11', '737', 'Cabrera, Mardelyn', '70', '2110.00', '', '', '', '', '1010', 73, '2020-10-27 20:18:33'),
(10795, '2019-09-11', '748', 'Rodriguez, Barbara', '70', '2110.00', '', '', '', '', '1010', 73, '2020-10-27 20:18:33'),
(10796, '2019-08-28', '737', 'Cabrera, Mardelyn', '63', '1990.00', '', '', '', '', '1010', 73, '2020-10-27 20:18:33'),
(10797, '2019-08-28', '748', 'Rodriguez, Barbara', '70', '2110.00', '', '', '', '', '1010', 73, '2020-10-27 20:18:33'),
(10798, '2019-08-14', '737', 'Cabrera, Mardelyn', '56', '1580.00', '', '', '', '', '1010', 73, '2020-10-27 20:18:33'),
(10799, '2019-08-14', '748', 'Rodriguez, Barbara', '70', '2110.00', '', '', '', '', '1010', 73, '2020-10-27 20:18:33'),
(10800, '2019-07-31', '736', 'Caba, Rosaoris', '56', '4524.00', '', '', '', '', '1010', 73, '2020-10-27 20:18:33'),
(10801, '2019-07-31', '737', 'Cabrera, Mardelyn', '70', '2110.00', '', '', '', '', '1010', 73, '2020-10-27 20:18:33'),
(10802, '2019-07-31', '748', 'Rodriguez, Barbara', '70', '2110.00', '', '', '', '', '1010', 73, '2020-10-27 20:18:33'),
(10803, '2019-07-17', '736', 'Caba, Rosaoris', '54', '4566.00', '', '', '', '', '1010', 73, '2020-10-27 20:18:33'),
(10804, '2019-07-17', '737', 'Cabrera, Mardelyn', '56', '1580.00', '', '', '', '', '1010', 73, '2020-10-27 20:18:33'),
(10805, '2019-07-17', '748', 'Rodriguez, Barbara', '63', '1990.00', '', '', '', '', '1010', 73, '2020-10-27 20:18:33'),
(10806, '2019-07-03', '733', 'Adams, Damon', '21', '6000', '', '', '', '', '1010', 73, '2020-10-27 20:18:33'),
(10807, '2019-07-03', '736', 'Caba, Rosaoris', '70', '2030.00', '', '', '', '', '1010', 73, '2020-10-27 20:18:33'),
(10808, '2019-07-03', '737', 'Cabrera, Mardelyn', '63', '1990.00', '', '', '', '', '1010', 73, '2020-10-27 20:18:33'),
(10809, '2019-07-03', '748', 'Rodriguez, Barbara', '70', '2110.00', '', '', '', '', '1010', 73, '2020-10-27 20:18:34'),
(10810, '2019-06-19', '733', 'Adams, Damon', '70', '12730.00', '', '', '', '', '1010', 73, '2020-10-27 20:18:34'),
(10811, '2019-06-19', '736', 'Caba, Rosaoris', '70', '2030.00', '', '', '', '', '1010', 73, '2020-10-27 20:18:34'),
(10812, '2019-06-19', '737', 'Cabrera, Mardelyn', '70', '2110.00', '', '', '', '', '1010', 73, '2020-10-27 20:18:34'),
(10813, '2019-06-19', '748', 'Rodriguez, Barbara', '70', '2110.00', '', '', '', '', '1010', 73, '2020-10-27 20:18:34'),
(10814, '2019-06-05', '733', 'Adams, Damon', '63', '12457.00', '', '', '', '', '1010', 73, '2020-10-27 20:18:34'),
(10815, '2019-06-05', '736', 'Caba, Rosaoris', '63', '4927.00', '', '', '', '', '1010', 73, '2020-10-27 20:18:34'),
(10816, '2019-06-05', '737', 'Cabrera, Mardelyn', '63', '1990.00', '', '', '', '', '1010', 73, '2020-10-27 20:18:34'),
(10817, '2019-06-05', '748', 'Rodriguez, Barbara', '63', '1990.00', '', '', '', '', '1010', 73, '2020-10-27 20:18:34'),
(10818, '2019-05-22', '733', 'Adams, Damon', '70', '12730.00', '', '', '', '', '1010', 73, '2020-10-27 20:18:34'),
(10819, '2019-05-22', '736', 'Caba, Rosaoris', '67.5', '4957.50', '', '', '', '', '1010', 73, '2020-10-27 20:18:34'),
(10820, '2019-05-22', '737', 'Cabrera, Mardelyn', '70', '2110.00', '', '', '', '', '1010', 73, '2020-10-27 20:18:34'),
(10821, '2019-05-22', '748', 'Rodriguez, Barbara', '70', '2110.00', '', '', '', '', '1010', 73, '2020-10-27 20:18:34'),
(10822, '2019-05-08', '733', 'Adams, Damon', '70', '12730.00', '', '', '', '', '1010', 73, '2020-10-27 20:18:34'),
(10823, '2019-05-08', '736', 'Caba, Rosaoris', '70', '2030.00', '', '', '', '', '1010', 73, '2020-10-27 20:18:34'),
(10824, '2019-05-08', '737', 'Cabrera, Mardelyn', '70', '2110.00', '', '', '', '', '1010', 73, '2020-10-27 20:18:34'),
(10825, '2019-05-08', '748', 'Rodriguez, Barbara', '70', '2110.00', '', '', '', '', '1010', 73, '2020-10-27 20:18:34'),
(10826, '2019-04-24', '733', 'Adams, Damon', '70', '12730.00', '', '', '', '', '1010', 73, '2020-10-27 20:18:34'),
(10827, '2019-04-24', '736', 'Caba, Rosaoris', '67.5', '4957.50', '', '', '', '', '1010', 73, '2020-10-27 20:18:34'),
(10828, '2019-04-24', '737', 'Cabrera, Mardelyn', '70', '2110.00', '', '', '', '', '1010', 73, '2020-10-27 20:18:34'),
(10829, '2019-04-24', '748', 'Rodriguez, Barbara', '112', '3360.00', '', '', '', '', '1010', 73, '2020-10-27 20:18:34'),
(10830, '2019-04-10', '733', 'Adams, Damon', '63', '12730.00', '', '', '', '', '1010', 73, '2020-10-27 20:18:34'),
(10831, '2019-04-10', '736', 'Caba, Rosaoris', '70', '2030.00', '', '', '', '', '1010', 73, '2020-10-27 20:18:34'),
(10832, '2019-04-10', '748', 'Rodriguez, Barbara', '35', '1150.00', '', '', '', '', '1010', 73, '2020-10-27 20:18:34'),
(10833, '2019-03-27', '733', 'Adams, Damon', '70', '12730.00', '', '', '', '', '1010', 73, '2020-10-27 20:18:34'),
(10834, '2019-03-27', '736', 'Caba, Rosaoris', '55', '4595.00', '', '', '', '', '1010', 73, '2020-10-27 20:18:34'),
(10835, '2019-03-27', '748', 'Rodriguez, Barbara', '34.5', '1135.00', '', '', '', '', '1010', 73, '2020-10-27 20:18:34'),
(10836, '2019-03-13', '733', 'Adams, Damon', '70', '12730.00', '', '', '', '', '1010', 73, '2020-10-27 20:18:34'),
(10837, '2019-03-13', '736', 'Caba, Rosaoris', '70', '2030.00', '', '', '', '', '1010', 73, '2020-10-27 20:18:34'),
(10838, '2019-03-13', '748', 'Rodriguez, Barbara', '62.25', '1967.50', '', '', '', '', '1010', 73, '2020-10-27 20:18:34'),
(10839, '2019-02-28', '733', 'Adams, Damon', '63', '12730.00', '', '', '', '', '1010', 73, '2020-10-27 20:18:34'),
(10840, '2019-02-28', '736', 'Caba, Rosaoris', '55.5', '4509.50', '', '', '', '', '1010', 73, '2020-10-27 20:18:34'),
(10841, '2019-02-28', '748', 'Rodriguez, Barbara', '47.75', '1332.50', '', '', '', '', '1010', 73, '2020-10-27 20:18:34'),
(10842, '2019-02-14', '733', 'Adams, Damon', '70', '12730.00', '', '', '', '', '1010', 73, '2020-10-27 20:18:34'),
(10843, '2019-02-14', '736', 'Caba, Rosaoris', '66.75', '4935.75', '', '', '', '', '1010', 73, '2020-10-27 20:18:34'),
(10844, '2019-02-14', '748', 'Rodriguez, Barbara', '63', '1990.00', '', '', '', '', '1010', 73, '2020-10-27 20:18:34'),
(10845, '2019-01-31', '733', 'Adams, Damon', '63', '12730.00', '', '', '', '', '1010', 73, '2020-10-27 20:18:34'),
(10846, '2019-01-31', '736', 'Caba, Rosaoris', '62', '1798.00', '', '', '', '', '1010', 73, '2020-10-27 20:18:34'),
(10847, '2019-01-31', '748', 'Rodriguez, Barbara', '61.75', '1952.50', '', '', '', '', '1010', 73, '2020-10-27 20:18:34'),
(10848, '2019-01-17', '733', 'Adams, Damon', '63', '12730.00', '', '', '', '', '1010', 73, '2020-10-27 20:18:34'),
(10849, '2019-01-17', '736', 'Caba, Rosaoris', '54.75', '4587.75', '', '', '', '', '1010', 73, '2020-10-27 20:18:34'),
(10850, '2019-01-17', '748', 'Rodriguez, Barbara', '48.5', '1355.00', '', '', '', '', '1010', 73, '2020-10-27 20:18:34'),
(10851, '2019-01-17', '753', 'Williams, Regina', '15.5', '697.5', '', '', '', '', '1010', 73, '2020-10-27 20:18:34'),
(10852, '2019-01-03', '733', 'Adams, Damon', '63', '2457.00', '', '', '', '', '1010', 73, '2020-10-27 20:18:34'),
(10853, '2019-01-03', '736', 'Caba, Rosaoris', '31.5', '913.5', '', '', '', '', '1010', 73, '2020-10-27 20:18:34'),
(10854, '2019-01-03', '746', 'Palma, Luz', '48.5', '1306.50', '', '', '', '', '1010', 73, '2020-10-27 20:18:34'),
(10855, '2019-01-03', '748', 'Rodriguez, Barbara', '34.5', '1135.00', '', '', '', '', '1010', 73, '2020-10-27 20:18:34'),
(10856, '2019-01-03', '753', 'Williams, Regina', '76', '3420.00', '', '', '', '', '1010', 73, '2020-10-27 20:18:34'),
(10857, '2019-09-25', '734', 'Allen-Ebron, Taneequa', '57.25', '675.55', '', '', '', '', '1010', 73, '2020-10-27 20:18:34'),
(10858, '2019-09-25', '735', 'Baldomero, Alyssa', '65.75', '854.75', '', '', '', '', '1010', 73, '2020-10-27 20:18:34'),
(10859, '2019-09-25', '740', 'Hall, Josephine', '67.5', '1315.25', '', '', '', '', '1010', 73, '2020-10-27 20:18:34'),
(10860, '2019-09-25', '743', 'Longtin, Susan', '72', '936', '', '', '', '', '1010', 73, '2020-10-27 20:18:34'),
(10861, '2019-09-25', '744', 'Lukes, Daquan', '65.25', '848.25', '', '', '', '', '1010', 73, '2020-10-27 20:18:34'),
(10862, '2019-09-25', '747', 'Ragsdale, Timothy', '72', '1213.00', '', '', '', '', '1010', 73, '2020-10-27 20:18:34'),
(10863, '2019-09-25', '749', 'Rosenburgh, Sherri', '67.5', '1112.50', '', '', '', '', '1010', 73, '2020-10-27 20:18:34'),
(10864, '2019-09-25', '750', 'Urdanoff, Alex', '67.75', '880.75', '', '', '', '', '1010', 73, '2020-10-27 20:18:34'),
(10865, '2019-09-11', '734', 'Allen-Ebron, Taneequa', '48.25', '569.35', '', '', '', '', '1010', 73, '2020-10-27 20:18:34'),
(10866, '2019-09-11', '735', 'Baldomero, Alyssa', '75', '975', '', '', '', '', '1010', 73, '2020-10-27 20:18:34'),
(10867, '2019-09-11', '740', 'Hall, Josephine', '75', '1362.50', '', '', '', '', '1010', 73, '2020-10-27 20:18:34'),
(10868, '2019-09-11', '743', 'Longtin, Susan', '77.25', '1104.25', '', '', '', '', '1010', 73, '2020-10-27 20:18:34'),
(10869, '2019-09-11', '744', 'Lukes, Daquan', '67.5', '877.5', '', '', '', '', '1010', 73, '2020-10-27 20:18:34'),
(10870, '2019-09-11', '747', 'Ragsdale, Timothy', '72', '1213.00', '', '', '', '', '1010', 73, '2020-10-27 20:18:34'),
(10871, '2019-09-11', '749', 'Rosenburgh, Sherri', '67.5', '1112.50', '', '', '', '', '1010', 73, '2020-10-27 20:18:34'),
(10872, '2019-09-11', '750', 'Urdanoff, Alex', '73.75', '958.75', '', '', '', '', '1010', 73, '2020-10-27 20:18:34'),
(10873, '2019-08-28', '734', 'Allen-Ebron, Taneequa', '75', '885', '', '', '', '', '1010', 73, '2020-10-27 20:18:34'),
(10874, '2019-08-28', '735', 'Baldomero, Alyssa', '67.5', '877.5', '', '', '', '', '1010', 73, '2020-10-27 20:18:34'),
(10875, '2019-08-28', '740', 'Hall, Josephine', '79', '1554.38', '', '', '', '', '1010', 73, '2020-10-27 20:18:34'),
(10876, '2019-08-28', '743', 'Longtin, Susan', '76.5', '994.5', '', '', '', '', '1010', 73, '2020-10-27 20:18:34'),
(10877, '2019-08-28', '744', 'Lukes, Daquan', '75', '975', '', '', '', '', '1010', 73, '2020-10-27 20:18:35'),
(10878, '2019-08-28', '745', 'Marino, Joseph', '7.5', '215', '', '', '', '', '1010', 73, '2020-10-27 20:18:35'),
(10879, '2019-08-28', '747', 'Ragsdale, Timothy', '72', '1213.00', '', '', '', '', '1010', 73, '2020-10-27 20:18:35'),
(10880, '2019-08-28', '749', 'Rosenburgh, Sherri', '62', '930', '', '', '', '', '1010', 73, '2020-10-27 20:18:35'),
(10881, '2019-08-28', '750', 'Urdanoff, Alex', '75.5', '981.5', '', '', '', '', '1010', 73, '2020-10-27 20:18:35'),
(10882, '2019-08-14', '734', 'Allen-Ebron, Taneequa', '64', '755.2', '', '', '', '', '1010', 73, '2020-10-27 20:18:35'),
(10883, '2019-08-14', '735', 'Baldomero, Alyssa', '67.5', '877.5', '', '', '', '', '1010', 73, '2020-10-27 20:18:35'),
(10884, '2019-08-14', '740', 'Hall, Josephine', '85', '1703.75', '', '', '', '', '1010', 73, '2020-10-27 20:18:35'),
(10885, '2019-08-14', '743', 'Longtin, Susan', '80', '1130.00', '', '', '', '', '1010', 73, '2020-10-27 20:18:35'),
(10886, '2019-08-14', '744', 'Lukes, Daquan', '41.75', '542.75', '', '', '', '', '1010', 73, '2020-10-27 20:18:35'),
(10887, '2019-08-14', '745', 'Marino, Joseph', '75', '2150.00', '', '', '', '', '1010', 73, '2020-10-27 20:18:35'),
(10888, '2019-08-14', '747', 'Ragsdale, Timothy', '80', '1360.00', '', '', '', '', '1010', 73, '2020-10-27 20:18:35'),
(10889, '2019-08-14', '749', 'Rosenburgh, Sherri', '72', '1180.00', '', '', '', '', '1010', 73, '2020-10-27 20:18:35'),
(10890, '2019-08-14', '750', 'Urdanoff, Alex', '75.25', '978.25', '', '', '', '', '1010', 73, '2020-10-27 20:18:35'),
(10891, '2019-07-31', '734', 'Allen-Ebron, Taneequa', '61.5', '725.7', '', '', '', '', '1010', 73, '2020-10-27 20:18:35'),
(10892, '2019-07-31', '735', 'Baldomero, Alyssa', '75', '975', '', '', '', '', '1010', 73, '2020-10-27 20:18:35'),
(10893, '2019-07-31', '740', 'Hall, Josephine', '79', '1554.38', '', '', '', '', '1010', 73, '2020-10-27 20:18:35'),
(10894, '2019-07-31', '743', 'Longtin, Susan', '80', '1130.00', '', '', '', '', '1010', 73, '2020-10-27 20:18:35'),
(10895, '2019-07-31', '744', 'Lukes, Daquan', '72.25', '939.25', '', '', '', '', '1010', 73, '2020-10-27 20:18:35'),
(10896, '2019-07-31', '745', 'Marino, Joseph', '75', '2150.00', '', '', '', '', '1010', 73, '2020-10-27 20:18:35'),
(10897, '2019-07-31', '747', 'Ragsdale, Timothy', '80', '1360.00', '', '', '', '', '1010', 73, '2020-10-27 20:18:35'),
(10898, '2019-07-31', '749', 'Rosenburgh, Sherri', '73', '1195.00', '', '', '', '', '1010', 73, '2020-10-27 20:18:35'),
(10899, '2019-07-31', '750', 'Urdanoff, Alex', '73.75', '958.75', '', '', '', '', '1010', 73, '2020-10-27 20:18:35'),
(10900, '2019-07-17', '734', 'Allen-Ebron, Taneequa', '54.5', '643.1', '', '', '', '', '1010', 73, '2020-10-27 20:18:35'),
(10901, '2019-07-17', '735', 'Baldomero, Alyssa', '75', '975', '', '', '', '', '1010', 73, '2020-10-27 20:18:35'),
(10902, '2019-07-17', '740', 'Hall, Josephine', '75', '1362.50', '', '', '', '', '1010', 73, '2020-10-27 20:18:35'),
(10903, '2019-07-17', '743', 'Longtin, Susan', '79', '1127.00', '', '', '', '', '1010', 73, '2020-10-27 20:18:35'),
(10904, '2019-07-17', '744', 'Lukes, Daquan', '75', '975', '', '', '', '', '1010', 73, '2020-10-27 20:18:35'),
(10905, '2019-07-17', '745', 'Marino, Joseph', '75', '2150.00', '', '', '', '', '1010', 73, '2020-10-27 20:18:35'),
(10906, '2019-07-17', '747', 'Ragsdale, Timothy', '72', '1213.00', '', '', '', '', '1010', 73, '2020-10-27 20:18:35'),
(10907, '2019-07-17', '749', 'Rosenburgh, Sherri', '67.5', '1112.50', '', '', '', '', '1010', 73, '2020-10-27 20:18:35'),
(10908, '2019-07-17', '750', 'Urdanoff, Alex', '76.5', '994.5', '', '', '', '', '1010', 73, '2020-10-27 20:18:35'),
(10909, '2019-07-03', '734', 'Allen-Ebron, Taneequa', '48.5', '572.3', '', '', '', '', '1010', 73, '2020-10-27 20:18:35'),
(10910, '2019-07-03', '735', 'Baldomero, Alyssa', '60', '780', '', '', '', '', '1010', 73, '2020-10-27 20:18:35'),
(10911, '2019-07-03', '740', 'Hall, Josephine', '67.5', '1315.25', '', '', '', '', '1010', 73, '2020-10-27 20:18:35'),
(10912, '2019-07-03', '743', 'Longtin, Susan', '71.5', '929.5', '', '', '', '', '1010', 73, '2020-10-27 20:18:35'),
(10913, '2019-07-03', '744', 'Lukes, Daquan', '56.25', '731.25', '', '', '', '', '1010', 73, '2020-10-27 20:18:35'),
(10914, '2019-07-03', '745', 'Marino, Joseph', '67.5', '2025.00', '', '', '', '', '1010', 73, '2020-10-27 20:18:35'),
(10915, '2019-07-03', '747', 'Ragsdale, Timothy', '78.5', '1334.50', '', '', '', '', '1010', 73, '2020-10-27 20:18:35'),
(10916, '2019-07-03', '749', 'Rosenburgh, Sherri', '67.5', '1112.50', '', '', '', '', '1010', 73, '2020-10-27 20:18:35'),
(10917, '2019-07-03', '750', 'Urdanoff, Alex', '69', '897', '', '', '', '', '1010', 73, '2020-10-27 20:18:35'),
(10918, '2019-07-03', '752', 'Walton, Arnae', '9.25', '120.25', '', '', '', '', '1010', 73, '2020-10-27 20:18:35'),
(10919, '2019-06-19', '734', 'Allen-Ebron, Taneequa', '67.5', '796.5', '', '', '', '', '1010', 73, '2020-10-27 20:18:35'),
(10920, '2019-06-19', '735', 'Baldomero, Alyssa', '75', '975', '', '', '', '', '1010', 73, '2020-10-27 20:18:35'),
(10921, '2019-06-19', '740', 'Hall, Josephine', '75', '1362.50', '', '', '', '', '1010', 73, '2020-10-27 20:18:35'),
(10922, '2019-06-19', '743', 'Longtin, Susan', '64', '832', '', '', '', '', '1010', 73, '2020-10-27 20:18:35'),
(10923, '2019-06-19', '744', 'Lukes, Daquan', '71.75', '932.75', '', '', '', '', '1010', 73, '2020-10-27 20:18:35'),
(10924, '2019-06-19', '745', 'Marino, Joseph', '75', '2150.00', '', '', '', '', '1010', 73, '2020-10-27 20:18:35'),
(10925, '2019-06-19', '747', 'Ragsdale, Timothy', '78', '1326.00', '', '', '', '', '1010', 73, '2020-10-27 20:18:35'),
(10926, '2019-06-19', '749', 'Rosenburgh, Sherri', '35.5', '532.5', '', '', '', '', '1010', 73, '2020-10-27 20:18:35'),
(10927, '2019-06-19', '750', 'Urdanoff, Alex', '77', '1101.00', '', '', '', '', '1010', 73, '2020-10-27 20:18:35'),
(10928, '2019-06-19', '752', 'Walton, Arnae', '62.25', '809.25', '', '', '', '', '1010', 73, '2020-10-27 20:18:35'),
(10929, '2019-06-05', '734', 'Allen-Ebron, Taneequa', '65.75', '775.85', '', '', '', '', '1010', 73, '2020-10-27 20:18:35'),
(10930, '2019-06-05', '735', 'Baldomero, Alyssa', '67.5', '877.5', '', '', '', '', '1010', 73, '2020-10-27 20:18:35'),
(10931, '2019-06-05', '740', 'Hall, Josephine', '75', '1362.50', '', '', '', '', '1010', 73, '2020-10-27 20:18:35'),
(10932, '2019-06-05', '743', 'Longtin, Susan', '64', '832', '', '', '', '', '1010', 73, '2020-10-27 20:18:35'),
(10933, '2019-06-05', '744', 'Lukes, Daquan', '60', '780', '', '', '', '', '1010', 73, '2020-10-27 20:18:35'),
(10934, '2019-06-05', '745', 'Marino, Joseph', '67.5', '2025.00', '', '', '', '', '1010', 73, '2020-10-27 20:18:35'),
(10935, '2019-06-05', '747', 'Ragsdale, Timothy', '72', '1213.00', '', '', '', '', '1010', 73, '2020-10-27 20:18:35'),
(10936, '2019-06-05', '749', 'Rosenburgh, Sherri', '67.5', '1112.50', '', '', '', '', '1010', 73, '2020-10-27 20:18:35'),
(10937, '2019-06-05', '750', 'Urdanoff, Alex', '53.75', '698.75', '', '', '', '', '1010', 73, '2020-10-27 20:18:35'),
(10938, '2019-06-05', '752', 'Walton, Arnae', '62', '806', '', '', '', '', '1010', 73, '2020-10-27 20:18:35'),
(10939, '2019-05-22', '734', 'Allen-Ebron, Taneequa', '79', '985.3', '', '', '', '', '1010', 73, '2020-10-27 20:18:35'),
(10940, '2019-05-22', '735', 'Baldomero, Alyssa', '75', '975', '', '', '', '', '1010', 73, '2020-10-27 20:18:35'),
(10941, '2019-05-22', '738', 'Cyrille, Maxime', '37.5', '937.5', '', '', '', '', '1010', 73, '2020-10-27 20:18:35'),
(10942, '2019-05-22', '740', 'Hall, Josephine', '75', '1362.50', '', '', '', '', '1010', 73, '2020-10-27 20:18:35'),
(10943, '2019-05-22', '743', 'Longtin, Susan', '80', '1130.00', '', '', '', '', '1010', 73, '2020-10-27 20:18:35'),
(10944, '2019-05-22', '744', 'Lukes, Daquan', '60', '780', '', '', '', '', '1010', 73, '2020-10-27 20:18:35'),
(10945, '2019-05-22', '745', 'Marino, Joseph', '75', '2150.00', '', '', '', '', '1010', 73, '2020-10-27 20:18:35'),
(10946, '2019-05-22', '747', 'Ragsdale, Timothy', '80', '1360.00', '', '', '', '', '1010', 73, '2020-10-27 20:18:35'),
(10947, '2019-05-22', '749', 'Rosenburgh, Sherri', '73.25', '1198.75', '', '', '', '', '1010', 73, '2020-10-27 20:18:35'),
(10948, '2019-05-22', '750', 'Urdanoff, Alex', '38', '494', '', '', '', '', '1010', 73, '2020-10-27 20:18:35'),
(10949, '2019-05-22', '752', 'Walton, Arnae', '55.25', '719.25', '', '', '', '', '1010', 73, '2020-10-27 20:18:35'),
(10950, '2019-05-08', '734', 'Allen-Ebron, Taneequa', '69', '813.2', '', '', '', '', '1010', 73, '2020-10-27 20:18:35'),
(10951, '2019-05-08', '735', 'Baldomero, Alyssa', '67.5', '877.5', '', '', '', '', '1010', 73, '2020-10-27 20:18:35'),
(10952, '2019-05-08', '738', 'Cyrille, Maxime', '75', '1975.00', '', '', '', '', '1010', 73, '2020-10-27 20:18:35'),
(10953, '2019-05-08', '740', 'Hall, Josephine', '75', '1362.50', '', '', '', '', '1010', 73, '2020-10-27 20:18:35'),
(10954, '2019-05-08', '743', 'Longtin, Susan', '78.5', '1120.50', '', '', '', '', '1010', 73, '2020-10-27 20:18:35'),
(10955, '2019-05-08', '744', 'Lukes, Daquan', '75', '975', '', '', '', '', '1010', 73, '2020-10-27 20:18:35'),
(10956, '2019-05-08', '745', 'Marino, Joseph', '75', '2150.00', '', '', '', '', '1010', 73, '2020-10-27 20:18:35'),
(10957, '2019-05-08', '747', 'Ragsdale, Timothy', '72', '1213.00', '', '', '', '', '1010', 73, '2020-10-27 20:18:35'),
(10958, '2019-05-08', '749', 'Rosenburgh, Sherri', '75', '1125.00', '', '', '', '', '1010', 73, '2020-10-27 20:18:35'),
(10959, '2019-05-08', '750', 'Urdanoff, Alex', '49.75', '646.75', '', '', '', '', '1010', 73, '2020-10-27 20:18:35'),
(10960, '2019-05-08', '752', 'Walton, Arnae', '58.75', '763.75', '', '', '', '', '1010', 73, '2020-10-27 20:18:35'),
(10961, '2019-04-24', '734', 'Allen-Ebron, Taneequa', '66.5', '784.7', '', '', '', '', '1010', 73, '2020-10-27 20:18:35'),
(10962, '2019-04-24', '735', 'Baldomero, Alyssa', '67.5', '877.5', '', '', '', '', '1010', 73, '2020-10-27 20:18:35'),
(10963, '2019-04-24', '738', 'Cyrille, Maxime', '58.5', '1362.50', '', '', '', '', '1010', 73, '2020-10-27 20:18:35'),
(10964, '2019-04-24', '740', 'Hall, Josephine', '75', '1362.50', '', '', '', '', '1010', 73, '2020-10-27 20:18:35'),
(10965, '2019-04-24', '743', 'Longtin, Susan', '56', '728', '', '', '', '', '1010', 73, '2020-10-27 20:18:35'),
(10966, '2019-04-24', '744', 'Lukes, Daquan', '75', '975', '', '', '', '', '1010', 73, '2020-10-27 20:18:35'),
(10967, '2019-04-24', '745', 'Marino, Joseph', '80', '2400.00', '', '', '', '', '1010', 73, '2020-10-27 20:18:35'),
(10968, '2019-04-24', '747', 'Ragsdale, Timothy', '80.25', '1364.25', '', '', '', '', '1010', 73, '2020-10-27 20:18:35'),
(10969, '2019-04-24', '749', 'Rosenburgh, Sherri', '66.5', '997.5', '', '', '', '', '1010', 73, '2020-10-27 20:18:35'),
(10970, '2019-04-24', '750', 'Urdanoff, Alex', '38.25', '497.25', '', '', '', '', '1010', 73, '2020-10-27 20:18:35'),
(10971, '2019-04-24', '752', 'Walton, Arnae', '61.75', '802.75', '', '', '', '', '1010', 73, '2020-10-27 20:18:35'),
(10972, '2019-04-10', '734', 'Allen-Ebron, Taneequa', '84.5', '1138.40', '', '', '', '', '1010', 73, '2020-10-27 20:18:35'),
(10973, '2019-04-10', '735', 'Baldomero, Alyssa', '22.5', '292.5', '', '', '', '', '1010', 73, '2020-10-27 20:18:35'),
(10974, '2019-04-10', '738', 'Cyrille, Maxime', '48', '1200.00', '', '', '', '', '1010', 73, '2020-10-27 20:18:35'),
(10975, '2019-04-10', '739', 'Eckerson, Amanda', '20', '300', '', '', '', '', '1010', 73, '2020-10-27 20:18:35'),
(10976, '2019-04-10', '740', 'Hall, Josephine', '74.25', '1347.88', '', '', '', '', '1010', 73, '2020-10-27 20:18:35'),
(10977, '2019-04-10', '741', 'Kemmer, Mary', '10', '119', '', '', '', '', '1010', 73, '2020-10-27 20:18:35'),
(10978, '2019-04-10', '744', 'Lukes, Daquan', '19.25', '250.25', '', '', '', '', '1010', 73, '2020-10-27 20:18:35'),
(10979, '2019-04-10', '745', 'Marino, Joseph', '52', '1560.00', '', '', '', '', '1010', 73, '2020-10-27 20:18:35'),
(10980, '2019-04-10', '747', 'Ragsdale, Timothy', '80', '1360.00', '', '', '', '', '1010', 73, '2020-10-27 20:18:35'),
(10981, '2019-04-10', '749', 'Rosenburgh, Sherri', '74.5', '1117.50', '', '', '', '', '1010', 73, '2020-10-27 20:18:35'),
(10982, '2019-04-10', '750', 'Urdanoff, Alex', '38.5', '500.5', '', '', '', '', '1010', 73, '2020-10-27 20:18:35'),
(10983, '2019-04-10', '752', 'Walton, Arnae', '61.5', '799.5', '', '', '', '', '1010', 73, '2020-10-27 20:18:35'),
(10984, '2019-03-27', '734', 'Allen-Ebron, Taneequa', '10', '119', '', '', '', '', '1010', 73, '2020-10-27 20:18:35'),
(10985, '2019-03-27', '739', 'Eckerson, Amanda', '59', '885', '', '', '', '', '1010', 73, '2020-10-27 20:18:35'),
(10986, '2019-03-27', '740', 'Hall, Josephine', '75', '1362.50', '', '', '', '', '1010', 73, '2020-10-27 20:18:35'),
(10987, '2019-03-27', '742', 'Linares, Gabriel', '54.25', '678.13', '', '', '', '', '1010', 73, '2020-10-27 20:18:35'),
(10988, '2019-03-27', '747', 'Ragsdale, Timothy', '16', '272', '', '', '', '', '1010', 73, '2020-10-27 20:18:35'),
(10989, '2019-03-27', '749', 'Rosenburgh, Sherri', '15', '215', '', '', '', '', '1010', 73, '2020-10-27 20:18:35'),
(10990, '2019-03-27', '750', 'Urdanoff, Alex', '76.5', '994.5', '', '', '', '', '1010', 73, '2020-10-27 20:18:35'),
(10991, '2019-03-27', '752', 'Walton, Arnae', '60.25', '913.88', '', '', '', '', '1010', 73, '2020-10-27 20:18:35'),
(10992, '2019-03-13', '739', 'Eckerson, Amanda', '46', '690', '', '', '', '', '1010', 73, '2020-10-27 20:18:35'),
(10993, '2019-03-13', '740', 'Hall, Josephine', '75', '1362.50', '', '', '', '', '1010', 73, '2020-10-27 20:18:35'),
(10994, '2019-03-13', '742', 'Linares, Gabriel', '37', '462.5', '', '', '', '', '1010', 73, '2020-10-27 20:18:35'),
(10995, '2019-03-13', '750', 'Urdanoff, Alex', '71.5', '929.5', '', '', '', '', '1010', 73, '2020-10-27 20:18:35'),
(10996, '2019-02-28', '739', 'Eckerson, Amanda', '67', '1105.00', '', '', '', '', '1010', 73, '2020-10-27 20:18:35'),
(10997, '2019-02-28', '740', 'Hall, Josephine', '69', '1345.50', '', '', '', '', '1010', 73, '2020-10-27 20:18:35'),
(10998, '2019-02-28', '742', 'Linares, Gabriel', '33.5', '419.75', '', '', '', '', '1010', 73, '2020-10-27 20:18:35'),
(10999, '2019-02-28', '750', 'Urdanoff, Alex', '68.25', '887.25', '', '', '', '', '1010', 73, '2020-10-27 20:18:35'),
(11000, '2019-02-14', '739', 'Eckerson, Amanda', '67', '1105.00', '', '', '', '', '1010', 73, '2020-10-27 20:18:35'),
(11001, '2019-02-14', '740', 'Hall, Josephine', '73', '1305.75', '', '', '', '', '1010', 73, '2020-10-27 20:18:35'),
(11002, '2019-02-14', '742', 'Linares, Gabriel', '79.75', '996.88', '', '', '', '', '1010', 73, '2020-10-27 20:18:35'),
(11003, '2019-02-14', '750', 'Urdanoff, Alex', '72', '936', '', '', '', '', '1010', 73, '2020-10-27 20:18:35'),
(11004, '2019-01-31', '739', 'Eckerson, Amanda', '58', '870', '', '', '', '', '1010', 73, '2020-10-27 20:18:35'),
(11005, '2019-01-31', '740', 'Hall, Josephine', '68.25', '1296.75', '', '', '', '', '1010', 73, '2020-10-27 20:18:35'),
(11006, '2019-01-31', '742', 'Linares, Gabriel', '71.5', '893.75', '', '', '', '', '1010', 73, '2020-10-27 20:18:35'),
(11007, '2019-01-31', '750', 'Urdanoff, Alex', '29.75', '386.75', '', '', '', '', '1010', 73, '2020-10-27 20:18:35'),
(11008, '2019-01-31', '751', 'Walker, Kaila', '30.5', '472.75', '', '', '', '', '1010', 73, '2020-10-27 20:18:35'),
(11009, '2019-01-17', '739', 'Eckerson, Amanda', '15', '215', '', '', '', '', '1010', 73, '2020-10-27 20:18:35'),
(11010, '2019-01-17', '740', 'Hall, Josephine', '68', '1292.00', '', '', '', '', '1010', 73, '2020-10-27 20:18:35'),
(11011, '2019-01-17', '742', 'Linares, Gabriel', '69.25', '865.63', '', '', '', '', '1010', 73, '2020-10-27 20:18:35'),
(11012, '2019-01-17', '751', 'Walker, Kaila', '53.25', '825.38', '', '', '', '', '1010', 73, '2020-10-27 20:18:35'),
(11013, '2019-01-03', '740', 'Hall, Josephine', '67.5', '1282.50', '', '', '', '', '1010', 73, '2020-10-27 20:18:35'),
(11014, '2019-01-03', '742', 'Linares, Gabriel', '73', '912.5', '', '', '', '', '1010', 73, '2020-10-27 20:18:35'),
(11015, '2019-01-03', '751', 'Walker, Kaila', '54.5', '844.75', '', '', '', '', '1010', 73, '2020-10-27 20:18:35'),
(11016, '2020-09-25', '737', 'Cabrera, Mardelyn', '56', '1680.00', '', '', '', '', '1010', 74, '2020-10-27 20:18:48'),
(11017, '2020-09-25', '748', 'Rodriguez, Barbara', '63', '1890.00', '', '', '', '', '1010', 74, '2020-10-27 20:18:48'),
(11018, '2020-09-11', '737', 'Cabrera, Mardelyn', '70', '2100.00', '', '', '', '', '1010', 74, '2020-10-27 20:18:48'),
(11019, '2020-09-11', '748', 'Rodriguez, Barbara', '70', '2100.00', '', '', '', '', '1010', 74, '2020-10-27 20:18:48'),
(11020, '2020-08-28', '737', 'Cabrera, Mardelyn', '63', '1890.00', '', '', '', '', '1010', 74, '2020-10-27 20:18:48'),
(11021, '2020-08-28', '748', 'Rodriguez, Barbara', '70', '2100.00', '', '', '', '', '1010', 74, '2020-10-27 20:18:48'),
(11022, '2020-08-14', '737', 'Cabrera, Mardelyn', '56', '1680.00', '', '', '', '', '1010', 74, '2020-10-27 20:18:48'),
(11023, '2020-08-14', '748', 'Rodriguez, Barbara', '70', '2100.00', '', '', '', '', '1010', 74, '2020-10-27 20:18:48'),
(11024, '2020-07-31', '736', 'Caba, Rosaoris', '56', '1624.00', '', '', '', '', '1010', 74, '2020-10-27 20:18:48'),
(11025, '2020-07-31', '737', 'Cabrera, Mardelyn', '70', '2100.00', '', '', '', '', '1010', 74, '2020-10-27 20:18:48'),
(11026, '2020-07-31', '748', 'Rodriguez, Barbara', '70', '2100.00', '', '', '', '', '1010', 74, '2020-10-27 20:18:48'),
(11027, '2020-07-17', '736', 'Caba, Rosaoris', '54', '1566.00', '', '', '', '', '1010', 74, '2020-10-27 20:18:48'),
(11028, '2020-07-17', '737', 'Cabrera, Mardelyn', '56', '1680.00', '', '', '', '', '1010', 74, '2020-10-27 20:18:48'),
(11029, '2020-07-17', '748', 'Rodriguez, Barbara', '63', '1890.00', '', '', '', '', '1010', 74, '2020-10-27 20:18:48'),
(11030, '2020-07-03', '733', 'Adams, Damon', '21', '819', '', '', '', '', '1010', 74, '2020-10-27 20:18:48'),
(11031, '2020-07-03', '736', 'Caba, Rosaoris', '70', '2030.00', '', '', '', '', '1010', 74, '2020-10-27 20:18:48'),
(11032, '2020-07-03', '737', 'Cabrera, Mardelyn', '63', '1890.00', '', '', '', '', '1010', 74, '2020-10-27 20:18:48'),
(11033, '2020-07-03', '748', 'Rodriguez, Barbara', '70', '2100.00', '', '', '', '', '1010', 74, '2020-10-27 20:18:48'),
(11034, '2020-06-19', '733', 'Adams, Damon', '70', '2730.00', '', '', '', '', '1010', 74, '2020-10-27 20:18:48'),
(11035, '2020-06-19', '736', 'Caba, Rosaoris', '70', '2030.00', '', '', '', '', '1010', 74, '2020-10-27 20:18:48'),
(11036, '2020-06-19', '737', 'Cabrera, Mardelyn', '70', '2100.00', '', '', '', '', '1010', 74, '2020-10-27 20:18:48'),
(11037, '2020-06-19', '748', 'Rodriguez, Barbara', '70', '2100.00', '', '', '', '', '1010', 74, '2020-10-27 20:18:48'),
(11038, '2020-06-05', '733', 'Adams, Damon', '63', '2457.00', '', '', '', '', '1010', 74, '2020-10-27 20:18:48'),
(11039, '2020-06-05', '736', 'Caba, Rosaoris', '63', '1827.00', '', '', '', '', '1010', 74, '2020-10-27 20:18:48'),
(11040, '2020-06-05', '737', 'Cabrera, Mardelyn', '63', '1890.00', '', '', '', '', '1010', 74, '2020-10-27 20:18:48'),
(11041, '2020-06-05', '748', 'Rodriguez, Barbara', '63', '1890.00', '', '', '', '', '1010', 74, '2020-10-27 20:18:48'),
(11042, '2020-05-22', '733', 'Adams, Damon', '70', '2730.00', '', '', '', '', '1010', 74, '2020-10-27 20:18:48'),
(11043, '2020-05-22', '736', 'Caba, Rosaoris', '67.5', '1957.50', '', '', '', '', '1010', 74, '2020-10-27 20:18:48'),
(11044, '2020-05-22', '737', 'Cabrera, Mardelyn', '70', '2100.00', '', '', '', '', '1010', 74, '2020-10-27 20:18:48'),
(11045, '2020-05-22', '748', 'Rodriguez, Barbara', '70', '2100.00', '', '', '', '', '1010', 74, '2020-10-27 20:18:48'),
(11046, '2020-05-08', '733', 'Adams, Damon', '70', '2730.00', '', '', '', '', '1010', 74, '2020-10-27 20:18:48'),
(11047, '2020-05-08', '736', 'Caba, Rosaoris', '70', '2030.00', '', '', '', '', '1010', 74, '2020-10-27 20:18:48'),
(11048, '2020-05-08', '737', 'Cabrera, Mardelyn', '70', '2100.00', '', '', '', '', '1010', 74, '2020-10-27 20:18:48'),
(11049, '2020-05-08', '748', 'Rodriguez, Barbara', '70', '2100.00', '', '', '', '', '1010', 74, '2020-10-27 20:18:48'),
(11050, '2020-04-24', '733', 'Adams, Damon', '70', '2730.00', '', '', '', '', '1010', 74, '2020-10-27 20:18:48'),
(11051, '2020-04-24', '736', 'Caba, Rosaoris', '67.5', '1957.50', '', '', '', '', '1010', 74, '2020-10-27 20:18:48'),
(11052, '2020-04-24', '737', 'Cabrera, Mardelyn', '70', '2100.00', '', '', '', '', '1010', 74, '2020-10-27 20:18:48'),
(11053, '2020-04-24', '748', 'Rodriguez, Barbara', '112', '3360.00', '', '', '', '', '1010', 74, '2020-10-27 20:18:48'),
(11054, '2020-04-10', '733', 'Adams, Damon', '63', '2457.00', '', '', '', '', '1010', 74, '2020-10-27 20:18:48'),
(11055, '2020-04-10', '736', 'Caba, Rosaoris', '70', '2030.00', '', '', '', '', '1010', 74, '2020-10-27 20:18:48'),
(11056, '2020-04-10', '748', 'Rodriguez, Barbara', '35', '1050.00', '', '', '', '', '1010', 74, '2020-10-27 20:18:48'),
(11057, '2020-03-27', '733', 'Adams, Damon', '70', '2730.00', '', '', '', '', '1010', 74, '2020-10-27 20:18:48'),
(11058, '2020-03-27', '736', 'Caba, Rosaoris', '55', '1595.00', '', '', '', '', '1010', 74, '2020-10-27 20:18:49'),
(11059, '2020-03-27', '748', 'Rodriguez, Barbara', '34.5', '1035.00', '', '', '', '', '1010', 74, '2020-10-27 20:18:49'),
(11060, '2020-03-13', '733', 'Adams, Damon', '70', '2730.00', '', '', '', '', '1010', 74, '2020-10-27 20:18:49'),
(11061, '2020-03-13', '736', 'Caba, Rosaoris', '70', '2030.00', '', '', '', '', '1010', 74, '2020-10-27 20:18:49'),
(11062, '2020-03-13', '748', 'Rodriguez, Barbara', '62.25', '1867.50', '', '', '', '', '1010', 74, '2020-10-27 20:18:49'),
(11063, '2020-02-28', '733', 'Adams, Damon', '63', '2457.00', '', '', '', '', '1010', 74, '2020-10-27 20:18:49'),
(11064, '2020-02-28', '736', 'Caba, Rosaoris', '55.5', '1609.50', '', '', '', '', '1010', 74, '2020-10-27 20:18:49'),
(11065, '2020-02-28', '748', 'Rodriguez, Barbara', '47.75', '1432.50', '', '', '', '', '1010', 74, '2020-10-27 20:18:49'),
(11066, '2020-02-14', '733', 'Adams, Damon', '70', '2730.00', '', '', '', '', '1010', 74, '2020-10-27 20:18:49'),
(11067, '2020-02-14', '736', 'Caba, Rosaoris', '66.75', '1935.75', '', '', '', '', '1010', 74, '2020-10-27 20:18:49'),
(11068, '2020-02-14', '748', 'Rodriguez, Barbara', '63', '1890.00', '', '', '', '', '1010', 74, '2020-10-27 20:18:49'),
(11069, '2020-01-31', '733', 'Adams, Damon', '63', '2457.00', '', '', '', '', '1010', 74, '2020-10-27 20:18:49'),
(11070, '2020-01-31', '736', 'Caba, Rosaoris', '62', '1798.00', '', '', '', '', '1010', 74, '2020-10-27 20:18:49'),
(11071, '2020-01-31', '748', 'Rodriguez, Barbara', '61.75', '1852.50', '', '', '', '', '1010', 74, '2020-10-27 20:18:49'),
(11072, '2020-01-17', '733', 'Adams, Damon', '63', '2457.00', '', '', '', '', '1010', 74, '2020-10-27 20:18:49'),
(11073, '2020-01-17', '736', 'Caba, Rosaoris', '54.75', '1587.75', '', '', '', '', '1010', 74, '2020-10-27 20:18:49'),
(11074, '2020-01-17', '748', 'Rodriguez, Barbara', '48.5', '1455.00', '', '', '', '', '1010', 74, '2020-10-27 20:18:49'),
(11075, '2020-01-17', '753', 'Williams, Regina', '15.5', '697.5', '', '', '', '', '1010', 74, '2020-10-27 20:18:49'),
(11076, '2020-01-03', '733', 'Adams, Damon', '63', '2457.00', '', '', '', '', '1010', 74, '2020-10-27 20:18:49'),
(11077, '2020-01-03', '736', 'Caba, Rosaoris', '31.5', '913.5', '', '', '', '', '1010', 74, '2020-10-27 20:18:49'),
(11078, '2020-01-03', '746', 'Palma, Luz', '48.5', '1406.50', '', '', '', '', '1010', 74, '2020-10-27 20:18:49'),
(11079, '2020-01-03', '748', 'Rodriguez, Barbara', '34.5', '1035.00', '', '', '', '', '1010', 74, '2020-10-27 20:18:49'),
(11080, '2020-01-03', '753', 'Williams, Regina', '76', '3420.00', '', '', '', '', '1010', 74, '2020-10-27 20:18:49'),
(11081, '2020-09-25', '734', 'Allen-Ebron, Taneequa', '57.25', '675.55', '', '', '', '', '1010', 74, '2020-10-27 20:18:49'),
(11082, '2020-09-25', '735', 'Baldomero, Alyssa', '65.75', '854.75', '', '', '', '', '1010', 74, '2020-10-27 20:18:49'),
(11083, '2020-09-25', '740', 'Hall, Josephine', '67.5', '1316.25', '', '', '', '', '1010', 74, '2020-10-27 20:18:49'),
(11084, '2020-09-25', '743', 'Longtin, Susan', '72', '936', '', '', '', '', '1010', 74, '2020-10-27 20:18:49'),
(11085, '2020-09-25', '744', 'Lukes, Daquan', '65.25', '848.25', '', '', '', '', '1010', 74, '2020-10-27 20:18:49'),
(11086, '2020-09-25', '747', 'Ragsdale, Timothy', '72', '1224.00', '', '', '', '', '1010', 74, '2020-10-27 20:18:49'),
(11087, '2020-09-25', '749', 'Rosenburgh, Sherri', '67.5', '1012.50', '', '', '', '', '1010', 74, '2020-10-27 20:18:49'),
(11088, '2020-09-25', '750', 'Urdanoff, Alex', '67.75', '880.75', '', '', '', '', '1010', 74, '2020-10-27 20:18:49'),
(11089, '2020-09-11', '734', 'Allen-Ebron, Taneequa', '48.25', '569.35', '', '', '', '', '1010', 74, '2020-10-27 20:18:49'),
(11090, '2020-09-11', '735', 'Baldomero, Alyssa', '75', '975', '', '', '', '', '1010', 74, '2020-10-27 20:18:49'),
(11091, '2020-09-11', '740', 'Hall, Josephine', '75', '1462.50', '', '', '', '', '1010', 74, '2020-10-27 20:18:49'),
(11092, '2020-09-11', '743', 'Longtin, Susan', '77.25', '1004.25', '', '', '', '', '1010', 74, '2020-10-27 20:18:49'),
(11093, '2020-09-11', '744', 'Lukes, Daquan', '67.5', '877.5', '', '', '', '', '1010', 74, '2020-10-27 20:18:49'),
(11094, '2020-09-11', '747', 'Ragsdale, Timothy', '72', '1224.00', '', '', '', '', '1010', 74, '2020-10-27 20:18:49'),
(11095, '2020-09-11', '749', 'Rosenburgh, Sherri', '67.5', '1012.50', '', '', '', '', '1010', 74, '2020-10-27 20:18:49'),
(11096, '2020-09-11', '750', 'Urdanoff, Alex', '73.75', '958.75', '', '', '', '', '1010', 74, '2020-10-27 20:18:49'),
(11097, '2020-08-28', '734', 'Allen-Ebron, Taneequa', '75', '885', '', '', '', '', '1010', 74, '2020-10-27 20:18:49'),
(11098, '2020-08-28', '735', 'Baldomero, Alyssa', '67.5', '877.5', '', '', '', '', '1010', 74, '2020-10-27 20:18:49'),
(11099, '2020-08-28', '740', 'Hall, Josephine', '79', '1554.38', '', '', '', '', '1010', 74, '2020-10-27 20:18:49'),
(11100, '2020-08-28', '743', 'Longtin, Susan', '76.5', '994.5', '', '', '', '', '1010', 74, '2020-10-27 20:18:49'),
(11101, '2020-08-28', '744', 'Lukes, Daquan', '75', '975', '', '', '', '', '1010', 74, '2020-10-27 20:18:49'),
(11102, '2020-08-28', '745', 'Marino, Joseph', '7.5', '225', '', '', '', '', '1010', 74, '2020-10-27 20:18:49'),
(11103, '2020-08-28', '747', 'Ragsdale, Timothy', '72', '1224.00', '', '', '', '', '1010', 74, '2020-10-27 20:18:49'),
(11104, '2020-08-28', '749', 'Rosenburgh, Sherri', '62', '930', '', '', '', '', '1010', 74, '2020-10-27 20:18:49'),
(11105, '2020-08-28', '750', 'Urdanoff, Alex', '75.5', '981.5', '', '', '', '', '1010', 74, '2020-10-27 20:18:49'),
(11106, '2020-08-14', '734', 'Allen-Ebron, Taneequa', '64', '755.2', '', '', '', '', '1010', 74, '2020-10-27 20:18:49'),
(11107, '2020-08-14', '735', 'Baldomero, Alyssa', '67.5', '877.5', '', '', '', '', '1010', 74, '2020-10-27 20:18:49'),
(11108, '2020-08-14', '740', 'Hall, Josephine', '85', '1703.75', '', '', '', '', '1010', 74, '2020-10-27 20:18:49'),
(11109, '2020-08-14', '743', 'Longtin, Susan', '80', '1040.00', '', '', '', '', '1010', 74, '2020-10-27 20:18:49'),
(11110, '2020-08-14', '744', 'Lukes, Daquan', '41.75', '542.75', '', '', '', '', '1010', 74, '2020-10-27 20:18:49'),
(11111, '2020-08-14', '745', 'Marino, Joseph', '75', '2250.00', '', '', '', '', '1010', 74, '2020-10-27 20:18:49'),
(11112, '2020-08-14', '747', 'Ragsdale, Timothy', '80', '1360.00', '', '', '', '', '1010', 74, '2020-10-27 20:18:49'),
(11113, '2020-08-14', '749', 'Rosenburgh, Sherri', '72', '1080.00', '', '', '', '', '1010', 74, '2020-10-27 20:18:49'),
(11114, '2020-08-14', '750', 'Urdanoff, Alex', '75.25', '978.25', '', '', '', '', '1010', 74, '2020-10-27 20:18:49'),
(11115, '2020-07-31', '734', 'Allen-Ebron, Taneequa', '61.5', '725.7', '', '', '', '', '1010', 74, '2020-10-27 20:18:49'),
(11116, '2020-07-31', '735', 'Baldomero, Alyssa', '75', '975', '', '', '', '', '1010', 74, '2020-10-27 20:18:49'),
(11117, '2020-07-31', '740', 'Hall, Josephine', '79', '1554.38', '', '', '', '', '1010', 74, '2020-10-27 20:18:49'),
(11118, '2020-07-31', '743', 'Longtin, Susan', '80', '1040.00', '', '', '', '', '1010', 74, '2020-10-27 20:18:49'),
(11119, '2020-07-31', '744', 'Lukes, Daquan', '72.25', '939.25', '', '', '', '', '1010', 74, '2020-10-27 20:18:49'),
(11120, '2020-07-31', '745', 'Marino, Joseph', '75', '2250.00', '', '', '', '', '1010', 74, '2020-10-27 20:18:49'),
(11121, '2020-07-31', '747', 'Ragsdale, Timothy', '80', '1360.00', '', '', '', '', '1010', 74, '2020-10-27 20:18:49'),
(11122, '2020-07-31', '749', 'Rosenburgh, Sherri', '73', '1095.00', '', '', '', '', '1010', 74, '2020-10-27 20:18:49'),
(11123, '2020-07-31', '750', 'Urdanoff, Alex', '73.75', '958.75', '', '', '', '', '1010', 74, '2020-10-27 20:18:49'),
(11124, '2020-07-17', '734', 'Allen-Ebron, Taneequa', '54.5', '643.1', '', '', '', '', '1010', 74, '2020-10-27 20:18:49'),
(11125, '2020-07-17', '735', 'Baldomero, Alyssa', '75', '975', '', '', '', '', '1010', 74, '2020-10-27 20:18:50'),
(11126, '2020-07-17', '740', 'Hall, Josephine', '75', '1462.50', '', '', '', '', '1010', 74, '2020-10-27 20:18:50'),
(11127, '2020-07-17', '743', 'Longtin, Susan', '79', '1027.00', '', '', '', '', '1010', 74, '2020-10-27 20:18:50'),
(11128, '2020-07-17', '744', 'Lukes, Daquan', '75', '975', '', '', '', '', '1010', 74, '2020-10-27 20:18:50'),
(11129, '2020-07-17', '745', 'Marino, Joseph', '75', '2250.00', '', '', '', '', '1010', 74, '2020-10-27 20:18:50'),
(11130, '2020-07-17', '747', 'Ragsdale, Timothy', '72', '1224.00', '', '', '', '', '1010', 74, '2020-10-27 20:18:50'),
(11131, '2020-07-17', '749', 'Rosenburgh, Sherri', '67.5', '1012.50', '', '', '', '', '1010', 74, '2020-10-27 20:18:50'),
(11132, '2020-07-17', '750', 'Urdanoff, Alex', '76.5', '994.5', '', '', '', '', '1010', 74, '2020-10-27 20:18:50'),
(11133, '2020-07-03', '734', 'Allen-Ebron, Taneequa', '48.5', '572.3', '', '', '', '', '1010', 74, '2020-10-27 20:18:50'),
(11134, '2020-07-03', '735', 'Baldomero, Alyssa', '60', '780', '', '', '', '', '1010', 74, '2020-10-27 20:18:50'),
(11135, '2020-07-03', '740', 'Hall, Josephine', '67.5', '1316.25', '', '', '', '', '1010', 74, '2020-10-27 20:18:50'),
(11136, '2020-07-03', '743', 'Longtin, Susan', '71.5', '929.5', '', '', '', '', '1010', 74, '2020-10-27 20:18:50'),
(11137, '2020-07-03', '744', 'Lukes, Daquan', '56.25', '731.25', '', '', '', '', '1010', 74, '2020-10-27 20:18:50'),
(11138, '2020-07-03', '745', 'Marino, Joseph', '67.5', '2025.00', '', '', '', '', '1010', 74, '2020-10-27 20:18:50'),
(11139, '2020-07-03', '747', 'Ragsdale, Timothy', '78.5', '1334.50', '', '', '', '', '1010', 74, '2020-10-27 20:18:50'),
(11140, '2020-07-03', '749', 'Rosenburgh, Sherri', '67.5', '1012.50', '', '', '', '', '1010', 74, '2020-10-27 20:18:50'),
(11141, '2020-07-03', '750', 'Urdanoff, Alex', '69', '897', '', '', '', '', '1010', 74, '2020-10-27 20:18:50'),
(11142, '2020-07-03', '752', 'Walton, Arnae', '9.25', '120.25', '', '', '', '', '1010', 74, '2020-10-27 20:18:50'),
(11143, '2020-06-19', '734', 'Allen-Ebron, Taneequa', '67.5', '796.5', '', '', '', '', '1010', 74, '2020-10-27 20:18:50'),
(11144, '2020-06-19', '735', 'Baldomero, Alyssa', '75', '975', '', '', '', '', '1010', 74, '2020-10-27 20:18:50'),
(11145, '2020-06-19', '740', 'Hall, Josephine', '75', '1462.50', '', '', '', '', '1010', 74, '2020-10-27 20:18:50'),
(11146, '2020-06-19', '743', 'Longtin, Susan', '64', '832', '', '', '', '', '1010', 74, '2020-10-27 20:18:50'),
(11147, '2020-06-19', '744', 'Lukes, Daquan', '71.75', '932.75', '', '', '', '', '1010', 74, '2020-10-27 20:18:50'),
(11148, '2020-06-19', '745', 'Marino, Joseph', '75', '2250.00', '', '', '', '', '1010', 74, '2020-10-27 20:18:50'),
(11149, '2020-06-19', '747', 'Ragsdale, Timothy', '78', '1326.00', '', '', '', '', '1010', 74, '2020-10-27 20:18:50'),
(11150, '2020-06-19', '749', 'Rosenburgh, Sherri', '35.5', '532.5', '', '', '', '', '1010', 74, '2020-10-27 20:18:50'),
(11151, '2020-06-19', '750', 'Urdanoff, Alex', '77', '1001.00', '', '', '', '', '1010', 74, '2020-10-27 20:18:50'),
(11152, '2020-06-19', '752', 'Walton, Arnae', '62.25', '809.25', '', '', '', '', '1010', 74, '2020-10-27 20:18:50'),
(11153, '2020-06-05', '734', 'Allen-Ebron, Taneequa', '65.75', '775.85', '', '', '', '', '1010', 74, '2020-10-27 20:18:50'),
(11154, '2020-06-05', '735', 'Baldomero, Alyssa', '67.5', '877.5', '', '', '', '', '1010', 74, '2020-10-27 20:18:50'),
(11155, '2020-06-05', '740', 'Hall, Josephine', '75', '1462.50', '', '', '', '', '1010', 74, '2020-10-27 20:18:50'),
(11156, '2020-06-05', '743', 'Longtin, Susan', '64', '832', '', '', '', '', '1010', 74, '2020-10-27 20:18:50'),
(11157, '2020-06-05', '744', 'Lukes, Daquan', '60', '780', '', '', '', '', '1010', 74, '2020-10-27 20:18:50'),
(11158, '2020-06-05', '745', 'Marino, Joseph', '67.5', '2025.00', '', '', '', '', '1010', 74, '2020-10-27 20:18:50'),
(11159, '2020-06-05', '747', 'Ragsdale, Timothy', '72', '1224.00', '', '', '', '', '1010', 74, '2020-10-27 20:18:50'),
(11160, '2020-06-05', '749', 'Rosenburgh, Sherri', '67.5', '1012.50', '', '', '', '', '1010', 74, '2020-10-27 20:18:50'),
(11161, '2020-06-05', '750', 'Urdanoff, Alex', '53.75', '698.75', '', '', '', '', '1010', 74, '2020-10-27 20:18:50'),
(11162, '2020-06-05', '752', 'Walton, Arnae', '62', '806', '', '', '', '', '1010', 74, '2020-10-27 20:18:50'),
(11163, '2020-05-22', '734', 'Allen-Ebron, Taneequa', '79', '985.3', '', '', '', '', '1010', 74, '2020-10-27 20:18:50'),
(11164, '2020-05-22', '735', 'Baldomero, Alyssa', '75', '975', '', '', '', '', '1010', 74, '2020-10-27 20:18:50'),
(11165, '2020-05-22', '738', 'Cyrille, Maxime', '37.5', '937.5', '', '', '', '', '1010', 74, '2020-10-27 20:18:50'),
(11166, '2020-05-22', '740', 'Hall, Josephine', '75', '1462.50', '', '', '', '', '1010', 74, '2020-10-27 20:18:50'),
(11167, '2020-05-22', '743', 'Longtin, Susan', '80', '1040.00', '', '', '', '', '1010', 74, '2020-10-27 20:18:50'),
(11168, '2020-05-22', '744', 'Lukes, Daquan', '60', '780', '', '', '', '', '1010', 74, '2020-10-27 20:18:50'),
(11169, '2020-05-22', '745', 'Marino, Joseph', '75', '2250.00', '', '', '', '', '1010', 74, '2020-10-27 20:18:50'),
(11170, '2020-05-22', '747', 'Ragsdale, Timothy', '80', '1360.00', '', '', '', '', '1010', 74, '2020-10-27 20:18:50'),
(11171, '2020-05-22', '749', 'Rosenburgh, Sherri', '73.25', '1098.75', '', '', '', '', '1010', 74, '2020-10-27 20:18:50'),
(11172, '2020-05-22', '750', 'Urdanoff, Alex', '38', '494', '', '', '', '', '1010', 74, '2020-10-27 20:18:50'),
(11173, '2020-05-22', '752', 'Walton, Arnae', '55.25', '718.25', '', '', '', '', '1010', 74, '2020-10-27 20:18:50'),
(11174, '2020-05-08', '734', 'Allen-Ebron, Taneequa', '69', '814.2', '', '', '', '', '1010', 74, '2020-10-27 20:18:50'),
(11175, '2020-05-08', '735', 'Baldomero, Alyssa', '67.5', '877.5', '', '', '', '', '1010', 74, '2020-10-27 20:18:50'),
(11176, '2020-05-08', '738', 'Cyrille, Maxime', '75', '1875.00', '', '', '', '', '1010', 74, '2020-10-27 20:18:50'),
(11177, '2020-05-08', '740', 'Hall, Josephine', '75', '1462.50', '', '', '', '', '1010', 74, '2020-10-27 20:18:50'),
(11178, '2020-05-08', '743', 'Longtin, Susan', '78.5', '1020.50', '', '', '', '', '1010', 74, '2020-10-27 20:18:50'),
(11179, '2020-05-08', '744', 'Lukes, Daquan', '75', '975', '', '', '', '', '1010', 74, '2020-10-27 20:18:50'),
(11180, '2020-05-08', '745', 'Marino, Joseph', '75', '2250.00', '', '', '', '', '1010', 74, '2020-10-27 20:18:50'),
(11181, '2020-05-08', '747', 'Ragsdale, Timothy', '72', '1224.00', '', '', '', '', '1010', 74, '2020-10-27 20:18:50'),
(11182, '2020-05-08', '749', 'Rosenburgh, Sherri', '75', '1125.00', '', '', '', '', '1010', 74, '2020-10-27 20:18:50'),
(11183, '2020-05-08', '750', 'Urdanoff, Alex', '49.75', '646.75', '', '', '', '', '1010', 74, '2020-10-27 20:18:50'),
(11184, '2020-05-08', '752', 'Walton, Arnae', '58.75', '763.75', '', '', '', '', '1010', 74, '2020-10-27 20:18:50'),
(11185, '2020-04-24', '734', 'Allen-Ebron, Taneequa', '66.5', '784.7', '', '', '', '', '1010', 74, '2020-10-27 20:18:50'),
(11186, '2020-04-24', '735', 'Baldomero, Alyssa', '67.5', '877.5', '', '', '', '', '1010', 74, '2020-10-27 20:18:50'),
(11187, '2020-04-24', '738', 'Cyrille, Maxime', '58.5', '1462.50', '', '', '', '', '1010', 74, '2020-10-27 20:18:50'),
(11188, '2020-04-24', '740', 'Hall, Josephine', '75', '1462.50', '', '', '', '', '1010', 74, '2020-10-27 20:18:50'),
(11189, '2020-04-24', '743', 'Longtin, Susan', '56', '728', '', '', '', '', '1010', 74, '2020-10-27 20:18:50'),
(11190, '2020-04-24', '744', 'Lukes, Daquan', '75', '975', '', '', '', '', '1010', 74, '2020-10-27 20:18:50'),
(11191, '2020-04-24', '745', 'Marino, Joseph', '80', '2400.00', '', '', '', '', '1010', 74, '2020-10-27 20:18:50'),
(11192, '2020-04-24', '747', 'Ragsdale, Timothy', '80.25', '1364.25', '', '', '', '', '1010', 74, '2020-10-27 20:18:50'),
(11193, '2020-04-24', '749', 'Rosenburgh, Sherri', '66.5', '997.5', '', '', '', '', '1010', 74, '2020-10-27 20:18:50'),
(11194, '2020-04-24', '750', 'Urdanoff, Alex', '38.25', '497.25', '', '', '', '', '1010', 74, '2020-10-27 20:18:50'),
(11195, '2020-04-24', '752', 'Walton, Arnae', '61.75', '802.75', '', '', '', '', '1010', 74, '2020-10-27 20:18:50'),
(11196, '2020-04-10', '734', 'Allen-Ebron, Taneequa', '84.5', '1038.40', '', '', '', '', '1010', 74, '2020-10-27 20:18:50'),
(11197, '2020-04-10', '735', 'Baldomero, Alyssa', '22.5', '292.5', '', '', '', '', '1010', 74, '2020-10-27 20:18:50'),
(11198, '2020-04-10', '738', 'Cyrille, Maxime', '48', '1200.00', '', '', '', '', '1010', 74, '2020-10-27 20:18:50'),
(11199, '2020-04-10', '739', 'Eckerson, Amanda', '20', '300', '', '', '', '', '1010', 74, '2020-10-27 20:18:50'),
(11200, '2020-04-10', '740', 'Hall, Josephine', '74.25', '1447.88', '', '', '', '', '1010', 74, '2020-10-27 20:18:50'),
(11201, '2020-04-10', '741', 'Kemmer, Mary', '10', '118', '', '', '', '', '1010', 74, '2020-10-27 20:18:50'),
(11202, '2020-04-10', '744', 'Lukes, Daquan', '19.25', '250.25', '', '', '', '', '1010', 74, '2020-10-27 20:18:50'),
(11203, '2020-04-10', '745', 'Marino, Joseph', '52', '1560.00', '', '', '', '', '1010', 74, '2020-10-27 20:18:50'),
(11204, '2020-04-10', '747', 'Ragsdale, Timothy', '80', '1360.00', '', '', '', '', '1010', 74, '2020-10-27 20:18:50'),
(11205, '2020-04-10', '749', 'Rosenburgh, Sherri', '74.5', '1117.50', '', '', '', '', '1010', 74, '2020-10-27 20:18:50'),
(11206, '2020-04-10', '750', 'Urdanoff, Alex', '38.5', '500.5', '', '', '', '', '1010', 74, '2020-10-27 20:18:50'),
(11207, '2020-04-10', '752', 'Walton, Arnae', '61.5', '799.5', '', '', '', '', '1010', 74, '2020-10-27 20:18:50'),
(11208, '2020-03-27', '734', 'Allen-Ebron, Taneequa', '10', '118', '', '', '', '', '1010', 74, '2020-10-27 20:18:50'),
(11209, '2020-03-27', '739', 'Eckerson, Amanda', '59', '885', '', '', '', '', '1010', 74, '2020-10-27 20:18:50'),
(11210, '2020-03-27', '740', 'Hall, Josephine', '75', '1462.50', '', '', '', '', '1010', 74, '2020-10-27 20:18:50'),
(11211, '2020-03-27', '742', 'Linares, Gabriel', '54.25', '678.13', '', '', '', '', '1010', 74, '2020-10-27 20:18:50'),
(11212, '2020-03-27', '747', 'Ragsdale, Timothy', '16', '272', '', '', '', '', '1010', 74, '2020-10-27 20:18:50'),
(11213, '2020-03-27', '749', 'Rosenburgh, Sherri', '15', '225', '', '', '', '', '1010', 74, '2020-10-27 20:18:50'),
(11214, '2020-03-27', '750', 'Urdanoff, Alex', '76.5', '994.5', '', '', '', '', '1010', 74, '2020-10-27 20:18:50'),
(11215, '2020-03-27', '752', 'Walton, Arnae', '60.25', '914.88', '', '', '', '', '1010', 74, '2020-10-27 20:18:50'),
(11216, '2020-03-13', '739', 'Eckerson, Amanda', '46', '690', '', '', '', '', '1010', 74, '2020-10-27 20:18:50'),
(11217, '2020-03-13', '740', 'Hall, Josephine', '75', '1462.50', '', '', '', '', '1010', 74, '2020-10-27 20:18:50'),
(11218, '2020-03-13', '742', 'Linares, Gabriel', '37', '462.5', '', '', '', '', '1010', 74, '2020-10-27 20:18:50'),
(11219, '2020-03-13', '750', 'Urdanoff, Alex', '71.5', '929.5', '', '', '', '', '1010', 74, '2020-10-27 20:18:50'),
(11220, '2020-02-28', '739', 'Eckerson, Amanda', '67', '1005.00', '', '', '', '', '1010', 74, '2020-10-27 20:18:50'),
(11221, '2020-02-28', '740', 'Hall, Josephine', '69', '1345.50', '', '', '', '', '1010', 74, '2020-10-27 20:18:50');
INSERT INTO `pay_imp_payroll_info` (`id`, `pay_date`, `employee_id`, `employee_name`, `hours_worked`, `gross_pay`, `health_benefits`, `retirement_benefits`, `pay_period_begin_date`, `pay_period_end_date`, `customer_id`, `file_id`, `created_at`) VALUES
(11222, '2020-02-28', '742', 'Linares, Gabriel', '33.5', '418.75', '', '', '', '', '1010', 74, '2020-10-27 20:18:50'),
(11223, '2020-02-28', '750', 'Urdanoff, Alex', '68.25', '887.25', '', '', '', '', '1010', 74, '2020-10-27 20:18:50'),
(11224, '2020-02-14', '739', 'Eckerson, Amanda', '67', '1005.00', '', '', '', '', '1010', 74, '2020-10-27 20:18:50'),
(11225, '2020-02-14', '740', 'Hall, Josephine', '73', '1405.75', '', '', '', '', '1010', 74, '2020-10-27 20:18:50'),
(11226, '2020-02-14', '742', 'Linares, Gabriel', '79.75', '996.88', '', '', '', '', '1010', 74, '2020-10-27 20:18:50'),
(11227, '2020-02-14', '750', 'Urdanoff, Alex', '72', '936', '', '', '', '', '1010', 74, '2020-10-27 20:18:50'),
(11228, '2020-01-31', '739', 'Eckerson, Amanda', '58', '870', '', '', '', '', '1010', 74, '2020-10-27 20:18:50'),
(11229, '2020-01-31', '740', 'Hall, Josephine', '68.25', '1296.75', '', '', '', '', '1010', 74, '2020-10-27 20:18:50'),
(11230, '2020-01-31', '742', 'Linares, Gabriel', '71.5', '893.75', '', '', '', '', '1010', 74, '2020-10-27 20:18:51'),
(11231, '2020-01-31', '750', 'Urdanoff, Alex', '29.75', '386.75', '', '', '', '', '1010', 74, '2020-10-27 20:18:51'),
(11232, '2020-01-31', '751', 'Walker, Kaila', '30.5', '472.75', '', '', '', '', '1010', 74, '2020-10-27 20:18:51'),
(11233, '2020-01-17', '739', 'Eckerson, Amanda', '15', '225', '', '', '', '', '1010', 74, '2020-10-27 20:18:51'),
(11234, '2020-01-17', '740', 'Hall, Josephine', '68', '1292.00', '', '', '', '', '1010', 74, '2020-10-27 20:18:51'),
(11235, '2020-01-17', '742', 'Linares, Gabriel', '69.25', '865.63', '', '', '', '', '1010', 74, '2020-10-27 20:18:51'),
(11236, '2020-01-17', '751', 'Walker, Kaila', '53.25', '825.38', '', '', '', '', '1010', 74, '2020-10-27 20:18:51'),
(11237, '2020-01-03', '740', 'Hall, Josephine', '67.5', '1282.50', '', '', '', '', '1010', 74, '2020-10-27 20:18:51'),
(11238, '2020-01-03', '742', 'Linares, Gabriel', '73', '912.5', '', '', '', '', '1010', 74, '2020-10-27 20:18:51'),
(11239, '2020-01-03', '751', 'Walker, Kaila', '54.5', '844.75', '', '', '', '', '1010', 74, '2020-10-27 20:18:51'),
(13691, '2019-09-25', '1251', 'Cabrera, Mardelyn', '56', '1580.00', '', '', '', '', '1005', 97, '2020-11-08 12:04:42'),
(13692, '2019-09-25', '1262', 'Rodriguez, Barbara', '63', '1990.00', '', '', '', '', '1005', 97, '2020-11-08 12:04:42'),
(13693, '2019-09-11', '1251', 'Cabrera, Mardelyn', '70', '2110.00', '', '', '', '', '1005', 97, '2020-11-08 12:04:42'),
(13694, '2019-09-11', '1262', 'Rodriguez, Barbara', '70', '2110.00', '', '', '', '', '1005', 97, '2020-11-08 12:04:42'),
(13695, '2019-08-28', '1251', 'Cabrera, Mardelyn', '63', '1990.00', '', '', '', '', '1005', 97, '2020-11-08 12:04:42'),
(13696, '2019-08-28', '1262', 'Rodriguez, Barbara', '70', '2110.00', '', '', '', '', '1005', 97, '2020-11-08 12:04:42'),
(13697, '2019-08-14', '1251', 'Cabrera, Mardelyn', '56', '1580.00', '', '', '', '', '1005', 97, '2020-11-08 12:04:42'),
(13698, '2019-08-14', '1262', 'Rodriguez, Barbara', '70', '2110.00', '', '', '', '', '1005', 97, '2020-11-08 12:04:42'),
(13699, '2019-07-31', '1250', 'Caba, Rosaoris', '56', '4524.00', '', '', '', '', '1005', 97, '2020-11-08 12:04:42'),
(13700, '2019-07-31', '1251', 'Cabrera, Mardelyn', '70', '2110.00', '', '', '', '', '1005', 97, '2020-11-08 12:04:42'),
(13701, '2019-07-31', '1262', 'Rodriguez, Barbara', '70', '2110.00', '', '', '', '', '1005', 97, '2020-11-08 12:04:42'),
(13702, '2019-07-17', '1250', 'Caba, Rosaoris', '54', '4566.00', '', '', '', '', '1005', 97, '2020-11-08 12:04:42'),
(13703, '2019-07-17', '1251', 'Cabrera, Mardelyn', '56', '1580.00', '', '', '', '', '1005', 97, '2020-11-08 12:04:42'),
(13704, '2019-07-17', '1262', 'Rodriguez, Barbara', '63', '1990.00', '', '', '', '', '1005', 97, '2020-11-08 12:04:42'),
(13705, '2019-07-03', '1247', 'Adams, Damon', '21', '6000', '', '', '', '', '1005', 97, '2020-11-08 12:04:42'),
(13706, '2019-07-03', '1250', 'Caba, Rosaoris', '70', '2030.00', '', '', '', '', '1005', 97, '2020-11-08 12:04:42'),
(13707, '2019-07-03', '1251', 'Cabrera, Mardelyn', '63', '1990.00', '', '', '', '', '1005', 97, '2020-11-08 12:04:42'),
(13708, '2019-07-03', '1262', 'Rodriguez, Barbara', '70', '2110.00', '', '', '', '', '1005', 97, '2020-11-08 12:04:42'),
(13709, '2019-06-19', '1247', 'Adams, Damon', '70', '12730.00', '', '', '', '', '1005', 97, '2020-11-08 12:04:42'),
(13710, '2019-06-19', '1250', 'Caba, Rosaoris', '70', '2030.00', '', '', '', '', '1005', 97, '2020-11-08 12:04:42'),
(13711, '2019-06-19', '1251', 'Cabrera, Mardelyn', '70', '2110.00', '', '', '', '', '1005', 97, '2020-11-08 12:04:42'),
(13712, '2019-06-19', '1262', 'Rodriguez, Barbara', '70', '2110.00', '', '', '', '', '1005', 97, '2020-11-08 12:04:42'),
(13713, '2019-06-05', '1247', 'Adams, Damon', '63', '12457.00', '', '', '', '', '1005', 97, '2020-11-08 12:04:42'),
(13714, '2019-06-05', '1250', 'Caba, Rosaoris', '63', '4927.00', '', '', '', '', '1005', 97, '2020-11-08 12:04:42'),
(13715, '2019-06-05', '1251', 'Cabrera, Mardelyn', '63', '1990.00', '', '', '', '', '1005', 97, '2020-11-08 12:04:42'),
(13716, '2019-06-05', '1262', 'Rodriguez, Barbara', '63', '1990.00', '', '', '', '', '1005', 97, '2020-11-08 12:04:42'),
(13717, '2019-05-22', '1247', 'Adams, Damon', '70', '12730.00', '', '', '', '', '1005', 97, '2020-11-08 12:04:42'),
(13718, '2019-05-22', '1250', 'Caba, Rosaoris', '67.5', '4957.50', '', '', '', '', '1005', 97, '2020-11-08 12:04:42'),
(13719, '2019-05-22', '1251', 'Cabrera, Mardelyn', '70', '2110.00', '', '', '', '', '1005', 97, '2020-11-08 12:04:42'),
(13720, '2019-05-22', '1262', 'Rodriguez, Barbara', '70', '2110.00', '', '', '', '', '1005', 97, '2020-11-08 12:04:42'),
(13721, '2019-05-08', '1247', 'Adams, Damon', '70', '12730.00', '', '', '', '', '1005', 97, '2020-11-08 12:04:42'),
(13722, '2019-05-08', '1250', 'Caba, Rosaoris', '70', '2030.00', '', '', '', '', '1005', 97, '2020-11-08 12:04:42'),
(13723, '2019-05-08', '1251', 'Cabrera, Mardelyn', '70', '2110.00', '', '', '', '', '1005', 97, '2020-11-08 12:04:42'),
(13724, '2019-05-08', '1262', 'Rodriguez, Barbara', '70', '2110.00', '', '', '', '', '1005', 97, '2020-11-08 12:04:42'),
(13725, '2019-04-24', '1247', 'Adams, Damon', '70', '12730.00', '', '', '', '', '1005', 97, '2020-11-08 12:04:42'),
(13726, '2019-04-24', '1250', 'Caba, Rosaoris', '67.5', '4957.50', '', '', '', '', '1005', 97, '2020-11-08 12:04:42'),
(13727, '2019-04-24', '1251', 'Cabrera, Mardelyn', '70', '2110.00', '', '', '', '', '1005', 97, '2020-11-08 12:04:42'),
(13728, '2019-04-24', '1262', 'Rodriguez, Barbara', '112', '3360.00', '', '', '', '', '1005', 97, '2020-11-08 12:04:42'),
(13729, '2019-04-10', '1247', 'Adams, Damon', '63', '12730.00', '', '', '', '', '1005', 97, '2020-11-08 12:04:42'),
(13730, '2019-04-10', '1250', 'Caba, Rosaoris', '70', '2030.00', '', '', '', '', '1005', 97, '2020-11-08 12:04:42'),
(13731, '2019-04-10', '1262', 'Rodriguez, Barbara', '35', '1150.00', '', '', '', '', '1005', 97, '2020-11-08 12:04:42'),
(13732, '2019-03-27', '1247', 'Adams, Damon', '70', '12730.00', '', '', '', '', '1005', 97, '2020-11-08 12:04:42'),
(13733, '2019-03-27', '1250', 'Caba, Rosaoris', '55', '4595.00', '', '', '', '', '1005', 97, '2020-11-08 12:04:42'),
(13734, '2019-03-27', '1262', 'Rodriguez, Barbara', '34.5', '1135.00', '', '', '', '', '1005', 97, '2020-11-08 12:04:42'),
(13735, '2019-03-13', '1247', 'Adams, Damon', '70', '12730.00', '', '', '', '', '1005', 97, '2020-11-08 12:04:42'),
(13736, '2019-03-13', '1250', 'Caba, Rosaoris', '70', '2030.00', '', '', '', '', '1005', 97, '2020-11-08 12:04:42'),
(13737, '2019-03-13', '1262', 'Rodriguez, Barbara', '62.25', '1967.50', '', '', '', '', '1005', 97, '2020-11-08 12:04:42'),
(13738, '2019-02-28', '1247', 'Adams, Damon', '63', '12730.00', '', '', '', '', '1005', 97, '2020-11-08 12:04:42'),
(13739, '2019-02-28', '1250', 'Caba, Rosaoris', '55.5', '4509.50', '', '', '', '', '1005', 97, '2020-11-08 12:04:42'),
(13740, '2019-02-28', '1262', 'Rodriguez, Barbara', '47.75', '1332.50', '', '', '', '', '1005', 97, '2020-11-08 12:04:42'),
(13741, '2019-02-14', '1247', 'Adams, Damon', '70', '12730.00', '', '', '', '', '1005', 97, '2020-11-08 12:04:42'),
(13742, '2019-02-14', '1250', 'Caba, Rosaoris', '66.75', '4935.75', '', '', '', '', '1005', 97, '2020-11-08 12:04:42'),
(13743, '2019-02-14', '1262', 'Rodriguez, Barbara', '63', '1990.00', '', '', '', '', '1005', 97, '2020-11-08 12:04:42'),
(13744, '2019-01-31', '1247', 'Adams, Damon', '63', '12730.00', '', '', '', '', '1005', 97, '2020-11-08 12:04:42'),
(13745, '2019-01-31', '1250', 'Caba, Rosaoris', '62', '1798.00', '', '', '', '', '1005', 97, '2020-11-08 12:04:42'),
(13746, '2019-01-31', '1262', 'Rodriguez, Barbara', '61.75', '1952.50', '', '', '', '', '1005', 97, '2020-11-08 12:04:42'),
(13747, '2019-01-17', '1247', 'Adams, Damon', '63', '12730.00', '', '', '', '', '1005', 97, '2020-11-08 12:04:42'),
(13748, '2019-01-17', '1250', 'Caba, Rosaoris', '54.75', '4587.75', '', '', '', '', '1005', 97, '2020-11-08 12:04:42'),
(13749, '2019-01-17', '1262', 'Rodriguez, Barbara', '48.5', '1355.00', '', '', '', '', '1005', 97, '2020-11-08 12:04:42'),
(13750, '2019-01-17', '1267', 'Williams, Regina', '15.5', '697.5', '', '', '', '', '1005', 97, '2020-11-08 12:04:42'),
(13751, '2019-01-03', '1247', 'Adams, Damon', '63', '2457.00', '', '', '', '', '1005', 97, '2020-11-08 12:04:42'),
(13752, '2019-01-03', '1250', 'Caba, Rosaoris', '31.5', '913.5', '', '', '', '', '1005', 97, '2020-11-08 12:04:42'),
(13753, '2019-01-03', '1260', 'Palma, Luz', '48.5', '1306.50', '', '', '', '', '1005', 97, '2020-11-08 12:04:42'),
(13754, '2019-01-03', '1262', 'Rodriguez, Barbara', '34.5', '1135.00', '', '', '', '', '1005', 97, '2020-11-08 12:04:42'),
(13755, '2019-01-03', '1267', 'Williams, Regina', '76', '3420.00', '', '', '', '', '1005', 97, '2020-11-08 12:04:42'),
(13756, '2019-09-25', '1248', 'Allen-Ebron, Taneequa', '57.25', '675.55', '', '', '', '', '1005', 97, '2020-11-08 12:04:42'),
(13757, '2019-09-25', '1249', 'Baldomero, Alyssa', '65.75', '854.75', '', '', '', '', '1005', 97, '2020-11-08 12:04:42'),
(13758, '2019-09-25', '1254', 'Hall, Josephine', '67.5', '1315.25', '', '', '', '', '1005', 97, '2020-11-08 12:04:42'),
(13759, '2019-09-25', '1257', 'Longtin, Susan', '72', '936', '', '', '', '', '1005', 97, '2020-11-08 12:04:42'),
(13760, '2019-09-25', '1258', 'Lukes, Daquan', '65.25', '848.25', '', '', '', '', '1005', 97, '2020-11-08 12:04:42'),
(13761, '2019-09-25', '1261', 'Ragsdale, Timothy', '72', '1213.00', '', '', '', '', '1005', 97, '2020-11-08 12:04:42'),
(13762, '2019-09-25', '1263', 'Rosenburgh, Sherri', '67.5', '1112.50', '', '', '', '', '1005', 97, '2020-11-08 12:04:42'),
(13763, '2019-09-25', '1264', 'Urdanoff, Alex', '67.75', '880.75', '', '', '', '', '1005', 97, '2020-11-08 12:04:42'),
(13764, '2019-09-11', '1248', 'Allen-Ebron, Taneequa', '48.25', '569.35', '', '', '', '', '1005', 97, '2020-11-08 12:04:42'),
(13765, '2019-09-11', '1249', 'Baldomero, Alyssa', '75', '975', '', '', '', '', '1005', 97, '2020-11-08 12:04:42'),
(13766, '2019-09-11', '1254', 'Hall, Josephine', '75', '1362.50', '', '', '', '', '1005', 97, '2020-11-08 12:04:42'),
(13767, '2019-09-11', '1257', 'Longtin, Susan', '77.25', '1104.25', '', '', '', '', '1005', 97, '2020-11-08 12:04:42'),
(13768, '2019-09-11', '1258', 'Lukes, Daquan', '67.5', '877.5', '', '', '', '', '1005', 97, '2020-11-08 12:04:42'),
(13769, '2019-09-11', '1261', 'Ragsdale, Timothy', '72', '1213.00', '', '', '', '', '1005', 97, '2020-11-08 12:04:42'),
(13770, '2019-09-11', '1263', 'Rosenburgh, Sherri', '67.5', '1112.50', '', '', '', '', '1005', 97, '2020-11-08 12:04:42'),
(13771, '2019-09-11', '1264', 'Urdanoff, Alex', '73.75', '958.75', '', '', '', '', '1005', 97, '2020-11-08 12:04:42'),
(13772, '2019-08-28', '1248', 'Allen-Ebron, Taneequa', '75', '885', '', '', '', '', '1005', 97, '2020-11-08 12:04:42'),
(13773, '2019-08-28', '1249', 'Baldomero, Alyssa', '67.5', '877.5', '', '', '', '', '1005', 97, '2020-11-08 12:04:42'),
(13774, '2019-08-28', '1254', 'Hall, Josephine', '79', '1554.38', '', '', '', '', '1005', 97, '2020-11-08 12:04:42'),
(13775, '2019-08-28', '1257', 'Longtin, Susan', '76.5', '994.5', '', '', '', '', '1005', 97, '2020-11-08 12:04:42'),
(13776, '2019-08-28', '1258', 'Lukes, Daquan', '75', '975', '', '', '', '', '1005', 97, '2020-11-08 12:04:42'),
(13777, '2019-08-28', '1259', 'Marino, Joseph', '7.5', '215', '', '', '', '', '1005', 97, '2020-11-08 12:04:42'),
(13778, '2019-08-28', '1261', 'Ragsdale, Timothy', '72', '1213.00', '', '', '', '', '1005', 97, '2020-11-08 12:04:42'),
(13779, '2019-08-28', '1263', 'Rosenburgh, Sherri', '62', '930', '', '', '', '', '1005', 97, '2020-11-08 12:04:42'),
(13780, '2019-08-28', '1264', 'Urdanoff, Alex', '75.5', '981.5', '', '', '', '', '1005', 97, '2020-11-08 12:04:42'),
(13781, '2019-08-14', '1248', 'Allen-Ebron, Taneequa', '64', '755.2', '', '', '', '', '1005', 97, '2020-11-08 12:04:42'),
(13782, '2019-08-14', '1249', 'Baldomero, Alyssa', '67.5', '877.5', '', '', '', '', '1005', 97, '2020-11-08 12:04:42'),
(13783, '2019-08-14', '1254', 'Hall, Josephine', '85', '1703.75', '', '', '', '', '1005', 97, '2020-11-08 12:04:42'),
(13784, '2019-08-14', '1257', 'Longtin, Susan', '80', '1130.00', '', '', '', '', '1005', 97, '2020-11-08 12:04:42'),
(13785, '2019-08-14', '1258', 'Lukes, Daquan', '41.75', '542.75', '', '', '', '', '1005', 97, '2020-11-08 12:04:42'),
(13786, '2019-08-14', '1259', 'Marino, Joseph', '75', '2150.00', '', '', '', '', '1005', 97, '2020-11-08 12:04:42'),
(13787, '2019-08-14', '1261', 'Ragsdale, Timothy', '80', '1360.00', '', '', '', '', '1005', 97, '2020-11-08 12:04:42'),
(13788, '2019-08-14', '1263', 'Rosenburgh, Sherri', '72', '1180.00', '', '', '', '', '1005', 97, '2020-11-08 12:04:42'),
(13789, '2019-08-14', '1264', 'Urdanoff, Alex', '75.25', '978.25', '', '', '', '', '1005', 97, '2020-11-08 12:04:42'),
(13790, '2019-07-31', '1248', 'Allen-Ebron, Taneequa', '61.5', '725.7', '', '', '', '', '1005', 97, '2020-11-08 12:04:42'),
(13791, '2019-07-31', '1249', 'Baldomero, Alyssa', '75', '975', '', '', '', '', '1005', 97, '2020-11-08 12:04:42'),
(13792, '2019-07-31', '1254', 'Hall, Josephine', '79', '1554.38', '', '', '', '', '1005', 97, '2020-11-08 12:04:42'),
(13793, '2019-07-31', '1257', 'Longtin, Susan', '80', '1130.00', '', '', '', '', '1005', 97, '2020-11-08 12:04:42'),
(13794, '2019-07-31', '1258', 'Lukes, Daquan', '72.25', '939.25', '', '', '', '', '1005', 97, '2020-11-08 12:04:42'),
(13795, '2019-07-31', '1259', 'Marino, Joseph', '75', '2150.00', '', '', '', '', '1005', 97, '2020-11-08 12:04:42'),
(13796, '2019-07-31', '1261', 'Ragsdale, Timothy', '80', '1360.00', '', '', '', '', '1005', 97, '2020-11-08 12:04:42'),
(13797, '2019-07-31', '1263', 'Rosenburgh, Sherri', '73', '1195.00', '', '', '', '', '1005', 97, '2020-11-08 12:04:42'),
(13798, '2019-07-31', '1264', 'Urdanoff, Alex', '73.75', '958.75', '', '', '', '', '1005', 97, '2020-11-08 12:04:42'),
(13799, '2019-07-17', '1248', 'Allen-Ebron, Taneequa', '54.5', '643.1', '', '', '', '', '1005', 97, '2020-11-08 12:04:42'),
(13800, '2019-07-17', '1249', 'Baldomero, Alyssa', '75', '975', '', '', '', '', '1005', 97, '2020-11-08 12:04:42'),
(13801, '2019-07-17', '1254', 'Hall, Josephine', '75', '1362.50', '', '', '', '', '1005', 97, '2020-11-08 12:04:42'),
(13802, '2019-07-17', '1257', 'Longtin, Susan', '79', '1127.00', '', '', '', '', '1005', 97, '2020-11-08 12:04:42'),
(13803, '2019-07-17', '1258', 'Lukes, Daquan', '75', '975', '', '', '', '', '1005', 97, '2020-11-08 12:04:42'),
(13804, '2019-07-17', '1259', 'Marino, Joseph', '75', '2150.00', '', '', '', '', '1005', 97, '2020-11-08 12:04:42'),
(13805, '2019-07-17', '1261', 'Ragsdale, Timothy', '72', '1213.00', '', '', '', '', '1005', 97, '2020-11-08 12:04:42'),
(13806, '2019-07-17', '1263', 'Rosenburgh, Sherri', '67.5', '1112.50', '', '', '', '', '1005', 97, '2020-11-08 12:04:42'),
(13807, '2019-07-17', '1264', 'Urdanoff, Alex', '76.5', '994.5', '', '', '', '', '1005', 97, '2020-11-08 12:04:42'),
(13808, '2019-07-03', '1248', 'Allen-Ebron, Taneequa', '48.5', '572.3', '', '', '', '', '1005', 97, '2020-11-08 12:04:42'),
(13809, '2019-07-03', '1249', 'Baldomero, Alyssa', '60', '780', '', '', '', '', '1005', 97, '2020-11-08 12:04:42'),
(13810, '2019-07-03', '1254', 'Hall, Josephine', '67.5', '1315.25', '', '', '', '', '1005', 97, '2020-11-08 12:04:42'),
(13811, '2019-07-03', '1257', 'Longtin, Susan', '71.5', '929.5', '', '', '', '', '1005', 97, '2020-11-08 12:04:42'),
(13812, '2019-07-03', '1258', 'Lukes, Daquan', '56.25', '731.25', '', '', '', '', '1005', 97, '2020-11-08 12:04:42'),
(13813, '2019-07-03', '1259', 'Marino, Joseph', '67.5', '2025.00', '', '', '', '', '1005', 97, '2020-11-08 12:04:42'),
(13814, '2019-07-03', '1261', 'Ragsdale, Timothy', '78.5', '1334.50', '', '', '', '', '1005', 97, '2020-11-08 12:04:42'),
(13815, '2019-07-03', '1263', 'Rosenburgh, Sherri', '67.5', '1112.50', '', '', '', '', '1005', 97, '2020-11-08 12:04:42'),
(13816, '2019-07-03', '1264', 'Urdanoff, Alex', '69', '897', '', '', '', '', '1005', 97, '2020-11-08 12:04:42'),
(13817, '2019-07-03', '1266', 'Walton, Arnae', '9.25', '120.25', '', '', '', '', '1005', 97, '2020-11-08 12:04:42'),
(13818, '2019-06-19', '1248', 'Allen-Ebron, Taneequa', '67.5', '796.5', '', '', '', '', '1005', 97, '2020-11-08 12:04:42'),
(13819, '2019-06-19', '1249', 'Baldomero, Alyssa', '75', '975', '', '', '', '', '1005', 97, '2020-11-08 12:04:42'),
(13820, '2019-06-19', '1254', 'Hall, Josephine', '75', '1362.50', '', '', '', '', '1005', 97, '2020-11-08 12:04:42'),
(13821, '2019-06-19', '1257', 'Longtin, Susan', '64', '832', '', '', '', '', '1005', 97, '2020-11-08 12:04:42'),
(13822, '2019-06-19', '1258', 'Lukes, Daquan', '71.75', '932.75', '', '', '', '', '1005', 97, '2020-11-08 12:04:42'),
(13823, '2019-06-19', '1259', 'Marino, Joseph', '75', '2150.00', '', '', '', '', '1005', 97, '2020-11-08 12:04:42'),
(13824, '2019-06-19', '1261', 'Ragsdale, Timothy', '78', '1326.00', '', '', '', '', '1005', 97, '2020-11-08 12:04:42'),
(13825, '2019-06-19', '1263', 'Rosenburgh, Sherri', '35.5', '532.5', '', '', '', '', '1005', 97, '2020-11-08 12:04:42'),
(13826, '2019-06-19', '1264', 'Urdanoff, Alex', '77', '1101.00', '', '', '', '', '1005', 97, '2020-11-08 12:04:42'),
(13827, '2019-06-19', '1266', 'Walton, Arnae', '62.25', '809.25', '', '', '', '', '1005', 97, '2020-11-08 12:04:42'),
(13828, '2019-06-05', '1248', 'Allen-Ebron, Taneequa', '65.75', '775.85', '', '', '', '', '1005', 97, '2020-11-08 12:04:42'),
(13829, '2019-06-05', '1249', 'Baldomero, Alyssa', '67.5', '877.5', '', '', '', '', '1005', 97, '2020-11-08 12:04:42'),
(13830, '2019-06-05', '1254', 'Hall, Josephine', '75', '1362.50', '', '', '', '', '1005', 97, '2020-11-08 12:04:42'),
(13831, '2019-06-05', '1257', 'Longtin, Susan', '64', '832', '', '', '', '', '1005', 97, '2020-11-08 12:04:42'),
(13832, '2019-06-05', '1258', 'Lukes, Daquan', '60', '780', '', '', '', '', '1005', 97, '2020-11-08 12:04:42'),
(13833, '2019-06-05', '1259', 'Marino, Joseph', '67.5', '2025.00', '', '', '', '', '1005', 97, '2020-11-08 12:04:42'),
(13834, '2019-06-05', '1261', 'Ragsdale, Timothy', '72', '1213.00', '', '', '', '', '1005', 97, '2020-11-08 12:04:42'),
(13835, '2019-06-05', '1263', 'Rosenburgh, Sherri', '67.5', '1112.50', '', '', '', '', '1005', 97, '2020-11-08 12:04:42'),
(13836, '2019-06-05', '1264', 'Urdanoff, Alex', '53.75', '698.75', '', '', '', '', '1005', 97, '2020-11-08 12:04:42'),
(13837, '2019-06-05', '1266', 'Walton, Arnae', '62', '806', '', '', '', '', '1005', 97, '2020-11-08 12:04:42'),
(13838, '2019-05-22', '1248', 'Allen-Ebron, Taneequa', '79', '985.3', '', '', '', '', '1005', 97, '2020-11-08 12:04:42'),
(13839, '2019-05-22', '1249', 'Baldomero, Alyssa', '75', '975', '', '', '', '', '1005', 97, '2020-11-08 12:04:42'),
(13840, '2019-05-22', '1252', 'Cyrille, Maxime', '37.5', '937.5', '', '', '', '', '1005', 97, '2020-11-08 12:04:42'),
(13841, '2019-05-22', '1254', 'Hall, Josephine', '75', '1362.50', '', '', '', '', '1005', 97, '2020-11-08 12:04:42'),
(13842, '2019-05-22', '1257', 'Longtin, Susan', '80', '1130.00', '', '', '', '', '1005', 97, '2020-11-08 12:04:42'),
(13843, '2019-05-22', '1258', 'Lukes, Daquan', '60', '780', '', '', '', '', '1005', 97, '2020-11-08 12:04:42'),
(13844, '2019-05-22', '1259', 'Marino, Joseph', '75', '2150.00', '', '', '', '', '1005', 97, '2020-11-08 12:04:42'),
(13845, '2019-05-22', '1261', 'Ragsdale, Timothy', '80', '1360.00', '', '', '', '', '1005', 97, '2020-11-08 12:04:42'),
(13846, '2019-05-22', '1263', 'Rosenburgh, Sherri', '73.25', '1198.75', '', '', '', '', '1005', 97, '2020-11-08 12:04:42'),
(13847, '2019-05-22', '1264', 'Urdanoff, Alex', '38', '494', '', '', '', '', '1005', 97, '2020-11-08 12:04:42'),
(13848, '2019-05-22', '1266', 'Walton, Arnae', '55.25', '719.25', '', '', '', '', '1005', 97, '2020-11-08 12:04:42'),
(13849, '2019-05-08', '1248', 'Allen-Ebron, Taneequa', '69', '813.2', '', '', '', '', '1005', 97, '2020-11-08 12:04:42'),
(13850, '2019-05-08', '1249', 'Baldomero, Alyssa', '67.5', '877.5', '', '', '', '', '1005', 97, '2020-11-08 12:04:42'),
(13851, '2019-05-08', '1252', 'Cyrille, Maxime', '75', '1975.00', '', '', '', '', '1005', 97, '2020-11-08 12:04:42'),
(13852, '2019-05-08', '1254', 'Hall, Josephine', '75', '1362.50', '', '', '', '', '1005', 97, '2020-11-08 12:04:42'),
(13853, '2019-05-08', '1257', 'Longtin, Susan', '78.5', '1120.50', '', '', '', '', '1005', 97, '2020-11-08 12:04:42'),
(13854, '2019-05-08', '1258', 'Lukes, Daquan', '75', '975', '', '', '', '', '1005', 97, '2020-11-08 12:04:42'),
(13855, '2019-05-08', '1259', 'Marino, Joseph', '75', '2150.00', '', '', '', '', '1005', 97, '2020-11-08 12:04:42'),
(13856, '2019-05-08', '1261', 'Ragsdale, Timothy', '72', '1213.00', '', '', '', '', '1005', 97, '2020-11-08 12:04:42'),
(13857, '2019-05-08', '1263', 'Rosenburgh, Sherri', '75', '1125.00', '', '', '', '', '1005', 97, '2020-11-08 12:04:42'),
(13858, '2019-05-08', '1264', 'Urdanoff, Alex', '49.75', '646.75', '', '', '', '', '1005', 97, '2020-11-08 12:04:42'),
(13859, '2019-05-08', '1266', 'Walton, Arnae', '58.75', '763.75', '', '', '', '', '1005', 97, '2020-11-08 12:04:42'),
(13860, '2019-04-24', '1248', 'Allen-Ebron, Taneequa', '66.5', '784.7', '', '', '', '', '1005', 97, '2020-11-08 12:04:42'),
(13861, '2019-04-24', '1249', 'Baldomero, Alyssa', '67.5', '877.5', '', '', '', '', '1005', 97, '2020-11-08 12:04:42'),
(13862, '2019-04-24', '1252', 'Cyrille, Maxime', '58.5', '1362.50', '', '', '', '', '1005', 97, '2020-11-08 12:04:42'),
(13863, '2019-04-24', '1254', 'Hall, Josephine', '75', '1362.50', '', '', '', '', '1005', 97, '2020-11-08 12:04:42'),
(13864, '2019-04-24', '1257', 'Longtin, Susan', '56', '728', '', '', '', '', '1005', 97, '2020-11-08 12:04:42'),
(13865, '2019-04-24', '1258', 'Lukes, Daquan', '75', '975', '', '', '', '', '1005', 97, '2020-11-08 12:04:42'),
(13866, '2019-04-24', '1259', 'Marino, Joseph', '80', '2400.00', '', '', '', '', '1005', 97, '2020-11-08 12:04:42'),
(13867, '2019-04-24', '1261', 'Ragsdale, Timothy', '80.25', '1364.25', '', '', '', '', '1005', 97, '2020-11-08 12:04:42'),
(13868, '2019-04-24', '1263', 'Rosenburgh, Sherri', '66.5', '997.5', '', '', '', '', '1005', 97, '2020-11-08 12:04:42'),
(13869, '2019-04-24', '1264', 'Urdanoff, Alex', '38.25', '497.25', '', '', '', '', '1005', 97, '2020-11-08 12:04:42'),
(13870, '2019-04-24', '1266', 'Walton, Arnae', '61.75', '802.75', '', '', '', '', '1005', 97, '2020-11-08 12:04:42'),
(13871, '2019-04-10', '1248', 'Allen-Ebron, Taneequa', '84.5', '1138.40', '', '', '', '', '1005', 97, '2020-11-08 12:04:42'),
(13872, '2019-04-10', '1249', 'Baldomero, Alyssa', '22.5', '292.5', '', '', '', '', '1005', 97, '2020-11-08 12:04:42'),
(13873, '2019-04-10', '1252', 'Cyrille, Maxime', '48', '1200.00', '', '', '', '', '1005', 97, '2020-11-08 12:04:42'),
(13874, '2019-04-10', '1253', 'Eckerson, Amanda', '20', '300', '', '', '', '', '1005', 97, '2020-11-08 12:04:42'),
(13875, '2019-04-10', '1254', 'Hall, Josephine', '74.25', '1347.88', '', '', '', '', '1005', 97, '2020-11-08 12:04:42'),
(13876, '2019-04-10', '1255', 'Kemmer, Mary', '10', '119', '', '', '', '', '1005', 97, '2020-11-08 12:04:42'),
(13877, '2019-04-10', '1258', 'Lukes, Daquan', '19.25', '250.25', '', '', '', '', '1005', 97, '2020-11-08 12:04:42'),
(13878, '2019-04-10', '1259', 'Marino, Joseph', '52', '1560.00', '', '', '', '', '1005', 97, '2020-11-08 12:04:42'),
(13879, '2019-04-10', '1261', 'Ragsdale, Timothy', '80', '1360.00', '', '', '', '', '1005', 97, '2020-11-08 12:04:42'),
(13880, '2019-04-10', '1263', 'Rosenburgh, Sherri', '74.5', '1117.50', '', '', '', '', '1005', 97, '2020-11-08 12:04:42'),
(13881, '2019-04-10', '1264', 'Urdanoff, Alex', '38.5', '500.5', '', '', '', '', '1005', 97, '2020-11-08 12:04:42'),
(13882, '2019-04-10', '1266', 'Walton, Arnae', '61.5', '799.5', '', '', '', '', '1005', 97, '2020-11-08 12:04:42'),
(13883, '2019-03-27', '1248', 'Allen-Ebron, Taneequa', '10', '119', '', '', '', '', '1005', 97, '2020-11-08 12:04:42'),
(13884, '2019-03-27', '1253', 'Eckerson, Amanda', '59', '885', '', '', '', '', '1005', 97, '2020-11-08 12:04:42'),
(13885, '2019-03-27', '1254', 'Hall, Josephine', '75', '1362.50', '', '', '', '', '1005', 97, '2020-11-08 12:04:42'),
(13886, '2019-03-27', '1256', 'Linares, Gabriel', '54.25', '678.13', '', '', '', '', '1005', 97, '2020-11-08 12:04:42'),
(13887, '2019-03-27', '1261', 'Ragsdale, Timothy', '16', '272', '', '', '', '', '1005', 97, '2020-11-08 12:04:42'),
(13888, '2019-03-27', '1263', 'Rosenburgh, Sherri', '15', '215', '', '', '', '', '1005', 97, '2020-11-08 12:04:42'),
(13889, '2019-03-27', '1264', 'Urdanoff, Alex', '76.5', '994.5', '', '', '', '', '1005', 97, '2020-11-08 12:04:42'),
(13890, '2019-03-27', '1266', 'Walton, Arnae', '60.25', '913.88', '', '', '', '', '1005', 97, '2020-11-08 12:04:42'),
(13891, '2019-03-13', '1253', 'Eckerson, Amanda', '46', '690', '', '', '', '', '1005', 97, '2020-11-08 12:04:42'),
(13892, '2019-03-13', '1254', 'Hall, Josephine', '75', '1362.50', '', '', '', '', '1005', 97, '2020-11-08 12:04:42'),
(13893, '2019-03-13', '1256', 'Linares, Gabriel', '37', '462.5', '', '', '', '', '1005', 97, '2020-11-08 12:04:42'),
(13894, '2019-03-13', '1264', 'Urdanoff, Alex', '71.5', '929.5', '', '', '', '', '1005', 97, '2020-11-08 12:04:42'),
(13895, '2019-02-28', '1253', 'Eckerson, Amanda', '67', '1105.00', '', '', '', '', '1005', 97, '2020-11-08 12:04:42'),
(13896, '2019-02-28', '1254', 'Hall, Josephine', '69', '1345.50', '', '', '', '', '1005', 97, '2020-11-08 12:04:42'),
(13897, '2019-02-28', '1256', 'Linares, Gabriel', '33.5', '419.75', '', '', '', '', '1005', 97, '2020-11-08 12:04:42'),
(13898, '2019-02-28', '1264', 'Urdanoff, Alex', '68.25', '887.25', '', '', '', '', '1005', 97, '2020-11-08 12:04:42'),
(13899, '2019-02-14', '1253', 'Eckerson, Amanda', '67', '1105.00', '', '', '', '', '1005', 97, '2020-11-08 12:04:42'),
(13900, '2019-02-14', '1254', 'Hall, Josephine', '73', '1305.75', '', '', '', '', '1005', 97, '2020-11-08 12:04:42'),
(13901, '2019-02-14', '1256', 'Linares, Gabriel', '79.75', '996.88', '', '', '', '', '1005', 97, '2020-11-08 12:04:42'),
(13902, '2019-02-14', '1264', 'Urdanoff, Alex', '72', '936', '', '', '', '', '1005', 97, '2020-11-08 12:04:42'),
(13903, '2019-01-31', '1253', 'Eckerson, Amanda', '58', '870', '', '', '', '', '1005', 97, '2020-11-08 12:04:42'),
(13904, '2019-01-31', '1254', 'Hall, Josephine', '68.25', '1296.75', '', '', '', '', '1005', 97, '2020-11-08 12:04:42'),
(13905, '2019-01-31', '1256', 'Linares, Gabriel', '71.5', '893.75', '', '', '', '', '1005', 97, '2020-11-08 12:04:42'),
(13906, '2019-01-31', '1264', 'Urdanoff, Alex', '29.75', '386.75', '', '', '', '', '1005', 97, '2020-11-08 12:04:42'),
(13907, '2019-01-31', '1265', 'Walker, Kaila', '30.5', '472.75', '', '', '', '', '1005', 97, '2020-11-08 12:04:42'),
(13908, '2019-01-17', '1253', 'Eckerson, Amanda', '15', '215', '', '', '', '', '1005', 97, '2020-11-08 12:04:42'),
(13909, '2019-01-17', '1254', 'Hall, Josephine', '68', '1292.00', '', '', '', '', '1005', 97, '2020-11-08 12:04:42'),
(13910, '2019-01-17', '1256', 'Linares, Gabriel', '69.25', '865.63', '', '', '', '', '1005', 97, '2020-11-08 12:04:42'),
(13911, '2019-01-17', '1265', 'Walker, Kaila', '53.25', '825.38', '', '', '', '', '1005', 97, '2020-11-08 12:04:42'),
(13912, '2019-01-03', '1254', 'Hall, Josephine', '67.5', '1282.50', '', '', '', '', '1005', 97, '2020-11-08 12:04:42'),
(13913, '2019-01-03', '1256', 'Linares, Gabriel', '73', '912.5', '', '', '', '', '1005', 97, '2020-11-08 12:04:42'),
(13914, '2019-01-03', '1265', 'Walker, Kaila', '54.5', '844.75', '', '', '', '', '1005', 97, '2020-11-08 12:04:42');

-- --------------------------------------------------------

--
-- Table structure for table `pay_imp_schemployeestable`
--

CREATE TABLE `pay_imp_schemployeestable` (
  `id` int(11) NOT NULL,
  `emp_id` int(50) NOT NULL,
  `cust_id` int(50) NOT NULL,
  `empFname` varchar(25) NOT NULL,
  `empHireDate` date DEFAULT NULL,
  `termination_date` date DEFAULT NULL,
  `empSalHrlyType` varchar(25) DEFAULT NULL,
  `emp2019_100Kplus` varchar(25) DEFAULT NULL,
  `empSalRateCurrent` decimal(50,2) DEFAULT 0.00,
  `empHrsFeb15` decimal(50,2) DEFAULT 0.00,
  `empPayFeb15` decimal(50,2) DEFAULT 0.00,
  `empHrsLookbackPer` decimal(50,2) DEFAULT 0.00,
  `empPayLookbackPer` decimal(50,2) DEFAULT 0.00,
  `empHrsLookbackPer2` decimal(50,2) DEFAULT 0.00,
  `empPayLookbackPer2` decimal(50,2) DEFAULT 0.00,
  `empHrsQ120` decimal(50,2) DEFAULT 0.00,
  `empPayQ120` decimal(50,2) DEFAULT 0.00,
  `empHrsSafeHarbor2` decimal(50,2) DEFAULT 0.00,
  `empPaySafeHarbor2` decimal(50,2) DEFAULT 0.00,
  `empHrsForgPer` decimal(50,2) DEFAULT 0.00,
  `empPayForgPer` decimal(50,2) DEFAULT 0.00,
  `empHrsForgPer24` decimal(50,2) DEFAULT 0.00,
  `empPayForgPer24` decimal(50,2) DEFAULT 0.00,
  `empSSN4` varchar(255) DEFAULT '0',
  `empPayCurrentPer` decimal(50,2) DEFAULT 0.00,
  `empHrsCurrentPer` decimal(50,2) DEFAULT 0.00,
  `empCurrentPerDate` date NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pay_imp_schemployeestable`
--

INSERT INTO `pay_imp_schemployeestable` (`id`, `emp_id`, `cust_id`, `empFname`, `empHireDate`, `termination_date`, `empSalHrlyType`, `emp2019_100Kplus`, `empSalRateCurrent`, `empHrsFeb15`, `empPayFeb15`, `empHrsLookbackPer`, `empPayLookbackPer`, `empHrsLookbackPer2`, `empPayLookbackPer2`, `empHrsQ120`, `empPayQ120`, `empHrsSafeHarbor2`, `empPaySafeHarbor2`, `empHrsForgPer`, `empPayForgPer`, `empHrsForgPer24`, `empPayForgPer24`, `empSSN4`, `empPayCurrentPer`, `empHrsCurrentPer`, `empCurrentPerDate`, `created_at`) VALUES
(1304, 1248, 1005, 'Allen-Ebron, Taneequa', '2020-03-20', '0000-00-00', 'Hourly', 'no', '11.80', '0.00', '0.00', '442.25', '5412.95', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', 'xxx-xx-xxxx', '0.00', '0.00', '0000-00-00', '2020-11-08 12:06:58'),
(1305, 1249, 1005, 'Baldomero, Alyssa', '2020-04-01', '0000-00-00', 'Hourly', 'no', '13.00', '0.00', '0.00', '375.00', '4875.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', 'xxx-xx-xxxx', '0.00', '0.00', '0000-00-00', '2020-11-08 12:06:58'),
(1306, 1250, 1005, 'Caba, Rosaoris', '2016-09-12', '0000-00-00', 'Hourly', 'no', '80.79', '0.00', '0.00', '588.50', '32066.50', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', 'xxx-xx-xxxx', '0.00', '0.00', '0000-00-00', '2020-11-08 12:06:58'),
(1307, 1251, 1005, 'Cabrera, Mardelyn', '2020-04-06', '0000-00-00', 'Hourly', 'no', '28.21', '0.00', '0.00', '343.00', '10430.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', 'xxx-xx-xxxx', '0.00', '0.00', '0000-00-00', '2020-11-08 12:06:58'),
(1308, 1252, 1005, 'Cyrille, Maxime', '2020-03-27', '2020-05-08', 'Hourly', 'no', '25.00', '0.00', '0.00', '219.00', '5475.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', 'xxx-xx-xxxx', '0.00', '0.00', '0000-00-00', '2020-11-08 12:06:58'),
(1309, 1253, 1005, 'Eckerson, Amanda', '2020-01-09', '2020-04-14', 'Hourly', 'no', '15.00', '0.00', '0.00', '192.00', '2980.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', 'xxx-xx-xxxx', '0.00', '0.00', '0000-00-00', '2020-11-08 12:06:58'),
(1310, 1254, 1005, 'Hall, Josephine', '2016-09-21', '0000-00-00', 'Hourly', 'no', '19.49', '0.00', '0.00', '668.25', '12230.88', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', 'xxx-xx-xxxx', '0.00', '0.00', '0000-00-00', '2020-11-08 12:06:58'),
(1311, 1255, 1005, 'Kemmer, Mary', '2020-03-23', '2020-03-26', 'Hourly', 'no', '11.90', '0.00', '0.00', '10.00', '119.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', 'xxx-xx-xxxx', '0.00', '0.00', '0000-00-00', '2020-11-08 12:06:58'),
(1312, 1256, 1005, 'Linares, Gabriel', '2019-04-09', '0000-00-00', 'Hourly', 'no', '12.50', '0.00', '0.00', '124.75', '1560.38', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', 'xxx-xx-xxxx', '0.00', '0.00', '0000-00-00', '2020-11-08 12:06:58'),
(1313, 1257, 1005, 'Longtin, Susan', '2020-04-01', '0000-00-00', 'Hourly', 'no', '13.00', '0.00', '0.00', '342.50', '4642.50', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', 'xxx-xx-xxxx', '0.00', '0.00', '0000-00-00', '2020-11-08 12:06:58'),
(1314, 1258, 1005, 'Lukes, Daquan', '2020-04-01', '0000-00-00', 'Hourly', 'no', '13.00', '0.00', '0.00', '361.00', '4693.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', 'xxx-xx-xxxx', '0.00', '0.00', '0000-00-00', '2020-11-08 12:06:58'),
(1315, 1259, 1005, 'Marino, Joseph', '2020-03-26', '2020-08-11', 'Hourly', 'no', '28.67', '0.00', '0.00', '424.50', '12435.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', 'xxx-xx-xxxx', '0.00', '0.00', '0000-00-00', '2020-11-08 12:06:58'),
(1316, 1260, 1005, 'Palma, Luz', '2017-02-15', '2019-12-13', 'Hourly', 'no', '26.94', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', 'xxx-xx-xxxx', '0.00', '0.00', '0000-00-00', '2020-11-08 12:06:58'),
(1317, 1261, 1005, 'Ragsdale, Timothy', '2020-03-18', '0000-00-00', 'Hourly', 'no', '16.85', '0.00', '0.00', '478.25', '8108.25', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', 'xxx-xx-xxxx', '0.00', '0.00', '0000-00-00', '2020-11-08 12:06:58'),
(1318, 1262, 1005, 'Rodriguez, Barbara', '2019-09-06', '0000-00-00', 'Hourly', 'no', '31.59', '0.00', '0.00', '564.50', '17265.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', 'xxx-xx-xxxx', '0.00', '0.00', '0000-00-00', '2020-11-08 12:06:58'),
(1319, 1263, 1005, 'Rosenburgh, Sherri', '2020-03-19', '0000-00-00', 'Hourly', 'no', '16.48', '0.00', '0.00', '407.25', '6298.75', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', 'xxx-xx-xxxx', '0.00', '0.00', '0000-00-00', '2020-11-08 12:06:58'),
(1320, 1264, 1005, 'Urdanoff, Alex', '2020-01-21', '0000-00-00', 'Hourly', 'no', '13.00', '0.00', '0.00', '511.50', '6749.50', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', 'xxx-xx-xxxx', '0.00', '0.00', '0000-00-00', '2020-11-08 12:06:58'),
(1321, 1265, 1005, 'Walker, Kaila', '2019-09-03', '2020-01-16', 'Hourly', 'no', '15.50', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', 'xxx-xx-xxxx', '0.00', '0.00', '0000-00-00', '2020-11-08 12:06:58'),
(1322, 1266, 1005, 'Walton, Arnae', '2020-03-16', '2020-06-16', 'Hourly', 'no', '13.00', '0.00', '0.00', '421.75', '5614.38', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', 'xxx-xx-xxxx', '0.00', '0.00', '0000-00-00', '2020-11-08 12:06:58'),
(1323, 1267, 1005, 'Williams, Regina', '2019-11-13', '2019-12-31', 'Hourly', 'no', '45.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', 'xxx-xx-xxxx', '0.00', '0.00', '0000-00-00', '2020-11-08 12:06:58');

-- --------------------------------------------------------

--
-- Table structure for table `priceplantable`
--

CREATE TABLE `priceplantable` (
  `plan_id` int(11) NOT NULL,
  `plan_group_id` int(11) DEFAULT NULL,
  `based_on` varchar(50) NOT NULL,
  `plan_name` varchar(15) DEFAULT NULL,
  `plan_cost` float DEFAULT NULL,
  `percent_loan` float NOT NULL,
  `per_employee_rate` float DEFAULT NULL,
  `view_header` varchar(255) DEFAULT NULL,
  `view_body` text DEFAULT NULL,
  `begin_condition` int(11) DEFAULT NULL,
  `end_condition` int(11) DEFAULT NULL,
  `show_guidance` varchar(11) DEFAULT NULL,
  `show_support` varchar(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `priceplantable`
--

INSERT INTO `priceplantable` (`plan_id`, `plan_group_id`, `based_on`, `plan_name`, `plan_cost`, `percent_loan`, `per_employee_rate`, `view_header`, `view_body`, `begin_condition`, `end_condition`, `show_guidance`, `show_support`) VALUES
(1, 1, 'fixed', 'free', 0, 0.001, 0, '$0', '\r\n                            <li>\r\n                            Save your data for 1 week \r\n                            </li>\r\n                            <li>\r\n                            Forgiveness Calculator\r\n                            </li>', 0, 0, NULL, NULL),
(2, 1, 'fixed', 'silver', 501, 0.001, 13.01, '$501 +<br>13.01/employee', '\r\n                            <li class=\"aligncenter\">Everything in Basic <br>\r\n                            PLUS</li>\r\n                            <li>Save your data for 12 months</li>\r\n                            <li>Unlimited Email Support</li>', NULL, NULL, NULL, NULL),
(3, 1, 'fixed', 'gold', 749, 0.001, 13.01, '$749', '\r\n                        <li class=\"aligncenter\">Everything in Silver <br> PLUS</li>\r\n                        <li>Unlimited Phone Support</li>\r\n                        <li>AI Based Software Guidance and recommendation on how to increase your forgiveness dollars </li>', NULL, NULL, 'yes', NULL),
(4, 1, 'fixed', 'white-glove', 1299, 0.001, 13.01, '$1299', '\r\n                    <li class=\"aligncenter\">Everything in Gold <br> PLUS</li>\r\n                        <li>You upload your documents and we enter all your Data</li>', NULL, NULL, 'yes', NULL),
(5, 2, 'loan_amount', 'free', 0, 0.01, 0, '$0', '\r\n                            <li>\r\n                            Save your data for 1 week \r\n                            </li>\r\n                            <li>\r\n                            Forgiveness Calculator\r\n                            </li>', 0, 0, NULL, NULL),
(6, 2, 'loan_amount', 'silver', 750, 0.02, 0, '$750 + 2% of loan amount', '\r\n                            <li class=\"aligncenter\">Everything in Basic <br>\r\n                            PLUS</li>\r\n                            <li>Save your data for 12 months</li>\r\n                            <li>Unlimited Email Support</li>', 0, 24999, 'yes', 'yes'),
(8, 2, 'loan_amount', 'gold', 2250, 0.01, NULL, '$2250 + 1% of loan amount', '\r\n                        <li class=\"aligncenter\">Everything in Silver <br> PLUS</li>\r\n                        <li>Unlimited Phone Support</li>\r\n                        <li>AI Based Software Guidance and recommendation on how to increase your forgiveness dollars </li>', 25000, 99999, NULL, NULL),
(9, 3, 'loan_amount', 'free', 0, 0, 0, '$0', '\r\n                            <li>\r\n                            Save your data for 1 week \r\n                            </li>\r\n                            <li>\r\n                            Forgiveness Calculator\r\n                            </li>', 0, 0, NULL, NULL),
(10, 3, 'loan_amount', 'silver', 750, 0, 0, 'Loam Amount = 0 - 24,999.99', '\r\n                            <li class=\"aligncenter\">Everything in Basic <br>\r\n                            PLUS</li>\r\n                            <li>Save your data for 12 months</li>\r\n                            <li>Unlimited Email Support</li>', 0, 24999, 'yes', 'yes'),
(11, 3, 'loan_amount', 'gold', 1500, 0, 0, 'Loan Amount = 25K - 99,999.99', '\r\n                            <li class=\"aligncenter\">Everything in Basic <br>\r\n                            PLUS</li>\r\n                            <li>Save your data for 12 months</li>\r\n                            <li>Unlimited Email Support</li>', 25000, 100000, 'yes', 'yes'),
(12, 3, 'loan_amount', 'diamond', 3000, 0, 0, 'Loan Amount = 100K - 500K', '\r\n                            <li class=\"aligncenter\">Everything in Basic <br>\r\n                            PLUS</li>\r\n                            <li>Save your data for 12 months</li>\r\n                            <li>Unlimited Email Support</li>', 100000, 500000, 'yes', 'yes'),
(13, 4, 'loan_amount', 'platinum', 5000, 0, 0, 'Loan Amount = 500K+', '\r\n                            <li class=\"aligncenter\">Everything in Basic <br>\r\n                            PLUS</li>\r\n                            <li>Save your data for 12 months</li>\r\n                            <li>Unlimited Email Support</li>', 500000, 100000000, 'yes', 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `promocodestable`
--

CREATE TABLE `promocodestable` (
  `promo_id` int(11) NOT NULL,
  `reference_id` int(11) NOT NULL,
  `reference_email` varchar(100) NOT NULL,
  `cust_id` int(11) DEFAULT NULL,
  `code` varchar(255) NOT NULL,
  `discount` int(11) NOT NULL,
  `status` varchar(50) NOT NULL,
  `based_on` varchar(30) NOT NULL,
  `current_date` date NOT NULL,
  `expiry_date` date DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `promocodestable`
--

INSERT INTO `promocodestable` (`promo_id`, `reference_id`, `reference_email`, `cust_id`, `code`, `discount`, `status`, `based_on`, `current_date`, `expiry_date`) VALUES
(3, 0, '', NULL, '42342', 433, 'inactive', 'dollars', '2020-10-15', '2020-10-28'),
(4, 0, '', NULL, '34242', 234124, 'inactive', 'percentage', '2020-10-15', '2020-10-27'),
(5, 0, '', NULL, 'abc', 25, 'inactive', 'percentage', '2020-10-15', '2020-10-23'),
(6, 0, '', NULL, '20pernctoff', 10, 'inactive', 'percentage', '2020-10-15', '2020-10-28'),
(7, 0, '', NULL, '20PERCENTOFF', 10, 'inactive', 'percentage', '2020-10-16', '2020-11-30'),
(8, 0, 'user@gmail.com', 1005, 'asdfa', 20, 'inactive', 'percentage', '2020-10-16', '2020-10-22'),
(9, 0, 'admin@gmail.com', 1010, 'SSSS', 30, 'inactive', 'percentage', '2020-10-17', '2020-10-31'),
(10, 0, 'admin@gmail.com', 1005, 'DSF3', 2342, 'inactive', 'dollars', '2020-10-27', '2020-10-31');

-- --------------------------------------------------------

--
-- Table structure for table `salestable`
--

CREATE TABLE `salestable` (
  `reference_id` int(11) NOT NULL,
  `sales_id` varchar(10) NOT NULL DEFAULT '',
  `sales_dis` varchar(255) NOT NULL,
  `salesEmailName` varchar(255) NOT NULL,
  `salesEmailAddress` varchar(255) NOT NULL,
  `salesEmailPhone` varchar(255) NOT NULL,
  `salesEmailTxt1` varchar(255) NOT NULL,
  `salesEmailTxt2` varchar(255) NOT NULL,
  `salesEmailTxt3` varchar(255) NOT NULL,
  `siteLoginURL` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `salestable`
--

INSERT INTO `salestable` (`reference_id`, `sales_id`, `sales_dis`, `salesEmailName`, `salesEmailAddress`, `salesEmailPhone`, `salesEmailTxt1`, `salesEmailTxt2`, `salesEmailTxt3`, `siteLoginURL`) VALUES
(-1, '1234', 'eeeeeeeeeee', '', '', '', '', '', '', ''),
(-1, '4343343', 'wewew', '', '', '', '', '', '', ''),
(-1, '676767', 'kkkkkkkkkkkkkk', '', '', '', '', '', '', ''),
(123, '1234', 'eewwwww', '', '', '', '', '', '', ''),
(-1, '4563', 'fffffff', '', '', '', '', '', '', ''),
(-1, '12343', 'a', 'c', 'd', 'e', 'f', 'g', 'h', 'b'),
(-1, '1212121212', '1111111113333', '22222', '2222222', '2222222', '222222', '2222222222', '22222222', '22222'),
(0, '12345678', 'adfa', 'asfdafd', 'asdfadsf', 'asdfaf', 'asdfa', 'asddfa', 'asdasdf', 'asdfasf'),
(0, 'asdfasfasf', 'adsfaf', 'asddfaf', 'adfafd', 'asdfaf', 'asdfafd', 'asdfasf', 'asdfasdf', 'adsfasf'),
(0, '123456234', 'asdfaaaaaaaaaa', 'asfd', 'asdfa', 'adfas', 'asfa', 'adsfa', 'adfsa', 'afda'),
(0, '3412412', 'dfasf', 'asdfa', 'asdffa', 'asdfa', 'adsfa', 'adsfa', 'asdfas', 'asfd'),
(0, '3412412121', 'dfasf', 'asdfa', 'asdffa', 'asdfa', 'adsfa', 'adsfa', 'asdfas', 'asfd'),
(0, '3412415452', 'dfasf', 'asdfa', 'asdffa', 'asdfa', 'adsfa', 'adsfa', 'asdfas', 'asfd'),
(0, '987654321', 'asdfasdf', 'asdfas', 'asfdasf', 'asddfasfd', 'asdfa', 'asdfasf', 'asfasfa', 'asfdas'),
(0, '12345', 'Sales', 'Shaoor_SIdd', 'shaoor@gmail.com', '0332', 'shaoor@C.com', '', '', 'alpha'),
(1127, '1233', 'sal', 'Shaoor_WholeSaler@gmail.c', 'U', '022', 'shsh', '', '', 'Shaoor_test'),
(1128, '1234321', 'sales', 'admin1_shaoor@', 'shshs', 'jsdhjksadhjwd', 'jbsdjkasjk', '', '', 'Shaoor_admin1_child'),
(0, '1234523', 'sales', 'sjsjsa', 'ajajaj', 'sjsjsj', 'sjsjsjk', 'sjsjs', 'sjsjs', 'aasaaa'),
(0, '12344', 'shsaa', 'Oliver', 'oliver@peachcapital.com', '575675685688', 'Hello', 'hsh', 'hsh', 'www.peachcapital.com'),
(1130, 'dhh', 'dw', '1234', 'dhdh', 'jdsj', 'jds', 'dj', 'js', 'jsjs'),
(1129, '123alpha', 'sjsja', 'jsjsjjsjs', 'DSSJSJ', 'ujjs', 'jdjsjs', 'djdjd', 'djdjd', 'wowowo');

-- --------------------------------------------------------

--
-- Table structure for table `scheduleatable`
--

CREATE TABLE `scheduleatable` (
  `schedule_id` int(255) NOT NULL,
  `cust_id` int(255) NOT NULL,
  `ppp_loan` varchar(255) DEFAULT NULL,
  `employees_change` varchar(255) DEFAULT NULL,
  `fte_harbor_1` varchar(255) DEFAULT NULL,
  `fte_harbor_2` varchar(255) DEFAULT NULL,
  `forgiveness_period` varchar(255) DEFAULT NULL,
  `fte_Count_method` varchar(255) DEFAULT NULL,
  `forgiveness_period_date` date DEFAULT NULL,
  `employee_type` varchar(255) DEFAULT NULL,
  `lookbackreference_periodfull` varchar(20) DEFAULT NULL,
  `lookbackreference_periodfraction` varchar(20) DEFAULT NULL,
  `ftemethod1` varchar(10) DEFAULT NULL,
  `ftemethod2` varchar(10) DEFAULT NULL,
  `ftemethod3` varchar(10) DEFAULT NULL,
  `ftemethod4` varchar(10) DEFAULT NULL,
  `ftemethod5` varchar(10) DEFAULT NULL,
  `ftemethod6` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `scheduleatable`
--

INSERT INTO `scheduleatable` (`schedule_id`, `cust_id`, `ppp_loan`, `employees_change`, `fte_harbor_1`, `fte_harbor_2`, `forgiveness_period`, `fte_Count_method`, `forgiveness_period_date`, `employee_type`, `lookbackreference_periodfull`, `lookbackreference_periodfraction`, `ftemethod1`, `ftemethod2`, `ftemethod3`, `ftemethod4`, `ftemethod5`, `ftemethod6`) VALUES
(19, 1005, 'Yes', 'Yes', 'Yes', 'Yes', '8 week Alternate( 2020-06-10 To 2020-08-04)', NULL, '2020-09-27', 'Hourly Only', '12.13', '13.14', '3.', '4.', '5.', '6.', '7.', '8.'),
(21, 1126, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(22, 1131, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(23, 1132, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(24, 1133, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(25, 1006, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26, 1008, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(27, 1009, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(28, 1010, 'Yes', 'Yes', 'Yes', 'Yes', '24 week Alternate( 2020-10-02 To 2020-12-31)', 'Both', '2020-10-29', 'Salaried Only', '12.13', '13.13', '1231.3', '2213.2', '132.3', '23.1', '32.2', '3212.2'),
(29, 1015, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(30, 1016, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(31, 1017, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(32, 1018, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(33, 1019, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(34, 1020, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `statustable`
--

CREATE TABLE `statustable` (
  `cust_id` int(11) NOT NULL,
  `companytable` varchar(15) NOT NULL DEFAULT 'fa-plus orange',
  `loantable` varchar(15) NOT NULL DEFAULT 'fa-plus orange',
  `nonpayrolltable` varchar(15) NOT NULL DEFAULT 'fa-plus orange',
  `ownertable` varchar(15) NOT NULL DEFAULT 'fa-plus orange',
  `payrollschedule` varchar(15) NOT NULL DEFAULT 'fa-plus orange',
  `payrollcost` varchar(15) NOT NULL DEFAULT 'fa-plus orange',
  `payrolltaxes` varchar(15) NOT NULL DEFAULT 'fa-plus orange',
  `payrollbenefits` varchar(15) NOT NULL DEFAULT 'fa-plus orange',
  `payrollinfo` varchar(15) NOT NULL DEFAULT 'fa-plus orange'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `statustable`
--

INSERT INTO `statustable` (`cust_id`, `companytable`, `loantable`, `nonpayrolltable`, `ownertable`, `payrollschedule`, `payrollcost`, `payrolltaxes`, `payrollbenefits`, `payrollinfo`) VALUES
(1005, 'fa-check green', 'fa-check green', 'fa-check green', 'fa-check green', 'fa-check green', 'fa-check green', 'fa-check green', 'fa-check green', 'fa-check green'),
(1006, 'fa-plus orange', 'fa-plus orange', 'fa-plus orange', 'fa-plus orange', 'fa-plus orange', 'fa-plus orange', 'fa-plus orange', 'fa-plus orange', 'fa-plus orange'),
(1008, 'fa-check green', 'fa-plus orange', 'fa-plus orange', 'fa-check green', 'fa-check green', 'fa-plus orange', 'fa-plus orange', 'fa-plus orange', 'fa-plus orange'),
(1009, 'fa-check green', 'fa-check green', 'fa-check green', 'fa-check green', 'fa-check green', 'fa-plus orange', 'fa-plus orange', 'fa-plus orange', 'fa-plus orange'),
(1010, 'fa-check green', 'fa-check green', 'fa-plus orange', 'fa-check green', 'fa-check green', 'fa-plus orange', 'fa-plus orange', 'fa-plus orange', 'fa-plus orange'),
(1015, 'fa-plus orange', 'fa-plus orange', 'fa-plus orange', 'fa-plus orange', 'fa-plus orange', 'fa-plus orange', 'fa-plus orange', 'fa-plus orange', 'fa-plus orange'),
(1016, 'fa-plus orange', 'fa-plus orange', 'fa-plus orange', 'fa-plus orange', 'fa-plus orange', 'fa-plus orange', 'fa-plus orange', 'fa-plus orange', 'fa-plus orange'),
(1017, 'fa-plus orange', 'fa-plus orange', 'fa-plus orange', 'fa-plus orange', 'fa-plus orange', 'fa-plus orange', 'fa-plus orange', 'fa-plus orange', 'fa-plus orange'),
(1018, 'fa-plus orange', 'fa-plus orange', 'fa-plus orange', 'fa-plus orange', 'fa-plus orange', 'fa-plus orange', 'fa-plus orange', 'fa-plus orange', 'fa-plus orange'),
(1019, 'fa-plus orange', 'fa-plus orange', 'fa-plus orange', 'fa-plus orange', 'fa-plus orange', 'fa-plus orange', 'fa-plus orange', 'fa-plus orange', 'fa-plus orange'),
(1020, 'fa-plus orange', 'fa-plus orange', 'fa-plus orange', 'fa-plus orange', 'fa-plus orange', 'fa-plus orange', 'fa-plus orange', 'fa-plus orange', 'fa-plus orange'),
(1074, 'fa-check green', 'fa-check green', 'fa-check green', 'fa-check green', 'fa-check green', 'fa-plus orange', 'fa-check green', 'fa-check green', 'fa-plus orange'),
(1075, 'fa-plus orange', 'fa-plus orange', 'fa-plus orange', 'fa-plus orange', 'fa-plus orange', 'fa-plus orange', 'fa-plus orange', 'fa-plus orange', 'fa-plus orange'),
(1076, 'fa-plus orange', 'fa-check green', 'fa-check green', 'fa-plus orange', 'fa-check green', 'fa-check green', 'fa-check green', 'fa-check green', 'fa-plus orange'),
(1077, 'fa-plus orange', 'fa-plus orange', 'fa-plus orange', 'fa-plus orange', 'fa-plus orange', 'fa-plus orange', 'fa-plus orange', 'fa-plus orange', 'fa-plus orange'),
(1078, 'fa-check green', 'fa-check green', 'fa-plus orange', 'fa-check green', 'fa-check green', 'fa-check green', 'fa-check green', 'fa-check green', 'fa-plus orange'),
(1079, 'fa-check green', 'fa-check green', 'fa-check green', 'fa-check green', 'fa-check green', 'fa-check green', 'fa-check green', 'fa-check green', 'fa-plus orange'),
(1080, 'fa-check green', 'fa-check green', 'fa-check green', 'fa-check green', 'fa-check green', 'fa-check green', 'fa-check green', 'fa-check green', 'fa-plus orange'),
(1081, 'fa-check green', 'fa-check green', 'fa-plus orange', 'fa-check green', 'fa-check green', 'fa-check green', 'fa-plus orange', 'fa-plus orange', 'fa-plus orange'),
(1086, 'fa-plus orange', 'fa-plus orange', 'fa-plus orange', 'fa-plus orange', 'fa-plus orange', 'fa-plus orange', 'fa-plus orange', 'fa-plus orange', 'fa-plus orange'),
(1088, 'fa-plus orange', 'fa-check green', 'fa-plus orange', 'fa-plus orange', 'fa-plus orange', 'fa-plus orange', 'fa-plus orange', 'fa-plus orange', 'fa-plus orange'),
(1109, 'fa-plus orange', 'fa-plus orange', 'fa-plus orange', 'fa-plus orange', 'fa-plus orange', 'fa-plus orange', 'fa-plus orange', 'fa-plus orange', 'fa-plus orange'),
(1110, 'fa-plus orange', 'fa-plus orange', 'fa-plus orange', 'fa-plus orange', 'fa-plus orange', 'fa-plus orange', 'fa-plus orange', 'fa-plus orange', 'fa-plus orange'),
(1111, 'fa-plus orange', 'fa-plus orange', 'fa-plus orange', 'fa-plus orange', 'fa-plus orange', 'fa-plus orange', 'fa-plus orange', 'fa-plus orange', 'fa-plus orange'),
(1114, 'fa-plus orange', 'fa-plus orange', 'fa-plus orange', 'fa-plus orange', 'fa-plus orange', 'fa-plus orange', 'fa-plus orange', 'fa-plus orange', 'fa-plus orange'),
(1116, 'fa-plus orange', 'fa-plus orange', 'fa-plus orange', 'fa-plus orange', 'fa-plus orange', 'fa-plus orange', 'fa-plus orange', 'fa-plus orange', 'fa-plus orange'),
(1117, 'fa-plus orange', 'fa-plus orange', 'fa-plus orange', 'fa-plus orange', 'fa-plus orange', 'fa-plus orange', 'fa-plus orange', 'fa-plus orange', 'fa-plus orange'),
(1123, 'fa-plus orange', 'fa-plus orange', 'fa-plus orange', 'fa-plus orange', 'fa-plus orange', 'fa-plus orange', 'fa-plus orange', 'fa-plus orange', 'fa-plus orange'),
(1124, 'fa-plus orange', 'fa-plus orange', 'fa-plus orange', 'fa-plus orange', 'fa-plus orange', 'fa-plus orange', 'fa-plus orange', 'fa-plus orange', 'fa-plus orange'),
(1126, 'fa-plus orange', 'fa-plus orange', 'fa-plus orange', 'fa-plus orange', 'fa-plus orange', 'fa-plus orange', 'fa-plus orange', 'fa-plus orange', 'fa-plus orange'),
(1131, 'fa-check green', 'fa-check green', 'fa-plus orange', 'fa-check green', 'fa-check green', 'fa-check green', 'fa-check green', 'fa-plus orange', 'fa-plus orange'),
(1132, 'fa-plus orange', 'fa-plus orange', 'fa-plus orange', 'fa-plus orange', 'fa-plus orange', 'fa-plus orange', 'fa-plus orange', 'fa-plus orange', 'fa-plus orange'),
(1133, 'fa-check green', 'fa-plus orange', 'fa-plus orange', 'fa-check green', 'fa-plus orange', 'fa-plus orange', 'fa-plus orange', 'fa-plus orange', 'fa-plus orange');

-- --------------------------------------------------------

--
-- Table structure for table `supportquestionstable`
--

CREATE TABLE `supportquestionstable` (
  `q_no` int(11) NOT NULL,
  `cust_id` int(15) NOT NULL,
  `q_date` datetime NOT NULL DEFAULT current_timestamp(),
  `business_name` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(150) DEFAULT NULL,
  `landline_phone` varchar(255) NOT NULL,
  `mobile_phone` varchar(255) NOT NULL,
  `q_text` text NOT NULL,
  `q_uploaddoclink` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supportquestionstable`
--

INSERT INTO `supportquestionstable` (`q_no`, `cust_id`, `q_date`, `business_name`, `first_name`, `last_name`, `email`, `landline_phone`, `mobile_phone`, `q_text`, `q_uploaddoclink`) VALUES
(7, 1077, '0000-00-00 00:00:00', 'fdad4534535', 'dfasfaf3535252#$%$#', 'fsgsdfg54345525dd$#', NULL, '444-444-4444', '444-444-4444', 'dsdf', ''),
(6, 1005, '0000-00-00 00:00:00', 'abk', 'user', 'Cash', NULL, '647-973-6534', '333-333-3323', 'dd', './assets/documents/1005/1599578486Process Flow- OCR.docx'),
(5, 1005, '0000-00-00 00:00:00', 'abk', 'user', 'Cash', NULL, '647-973-6534', '333-333-3323', 'sss', ''),
(8, 1077, '0000-00-00 00:00:00', 'fdad4534535', 'dfasfaf3535252#$%$#', 'fsgsdfg54345525dd$#', NULL, '444-444-4444', '444-444-4444', 'dfs', ''),
(9, 1077, '2020-09-08 09:10:33', 'fdad4534535', 'dfasfaf3535252#$%$#', 'fsgsdfg54345525dd$#', NULL, '444-444-4444', '444-444-4444', 'ddd', ''),
(10, 1005, '2020-09-09 00:10:29', 'abk', 'user', 'Cash', NULL, '647-973-6534', '333-333-3323', 'Hi how are you \r\nabubakker here', ''),
(11, 1080, '2020-09-09 04:18:57', 'XYZ', 'Sikandar', 'ali', 'jonicool80@gmail.com', '654-5__-____', '656-___-____', 'dfasddfasdf', ''),
(12, 1080, '2020-09-09 04:24:15', 'XYZ', 'Sikandar', 'ali', 'jonicool80@gmail.com', '654-5__-____', '656-___-____', 'dxcxc', ''),
(13, 1081, '2020-09-09 08:20:44', 'AB @ AB.com', 'Fn', 'Ln', 'ab@ab.com', '113-123-2132', '342-423-4324', 'test', ''),
(14, 1005, '2020-09-22 10:03:50', 'abk inc.', 'user', 'Cash', 'user@gmail.com', '647-973-6534', '333-333-3323', 'aa', ''),
(15, 1005, '2020-09-22 10:40:24', 'abk inc.', 'user', 'Cash', 'user@gmail.com', '647-973-6534', '333-333-3323', 'ddd', '');

-- --------------------------------------------------------

--
-- Table structure for table `usertable`
--

CREATE TABLE `usertable` (
  `cust_id` int(50) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `pswd` varchar(255) DEFAULT NULL,
  `role` varchar(255) NOT NULL,
  `access_level` varchar(5) NOT NULL DEFAULT 'RW',
  `reference_id` int(11) DEFAULT 0,
  `account_type` varchar(100) DEFAULT 'free',
  `first_name` varchar(100) DEFAULT NULL,
  `middle_initial` varchar(100) DEFAULT NULL,
  `last_name` varchar(100) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `landline_phone` varchar(15) DEFAULT NULL,
  `landline_extension` varchar(15) DEFAULT NULL,
  `mobile_phone` varchar(15) DEFAULT NULL,
  `mobile_carrier` varchar(15) DEFAULT NULL,
  `hear_about_us` varchar(255) DEFAULT NULL,
  `form_completed` varchar(7) DEFAULT NULL,
  `q_one` varchar(255) DEFAULT NULL,
  `a_one` varchar(255) DEFAULT NULL,
  `q_two` varchar(255) DEFAULT NULL,
  `a_two` varchar(255) DEFAULT NULL,
  `q_three` varchar(255) NOT NULL,
  `a_three` varchar(255) NOT NULL,
  `user_reg_date` datetime NOT NULL DEFAULT current_timestamp(),
  `user_last_act` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `usertable`
--

INSERT INTO `usertable` (`cust_id`, `email`, `pswd`, `role`, `access_level`, `reference_id`, `account_type`, `first_name`, `middle_initial`, `last_name`, `title`, `landline_phone`, `landline_extension`, `mobile_phone`, `mobile_carrier`, `hear_about_us`, `form_completed`, `q_one`, `a_one`, `q_two`, `a_two`, `q_three`, `a_three`, `user_reg_date`, `user_last_act`) VALUES
(0, 'admin@gmail.com', '25d55ad283aa400af464c76d713c07ad', 'admin', 'RW', -1, 'free', 'nisa', 'a', 'nisa', 'aaaa', '22222', '2222222', '222222', '22222222', '22222222', '2222222', 'What was your childhood nickname?', 'aa', 'What is your oldest cousin\'s first and last name?', 'bb', 'What is your favorite color?', 'cc', '2020-09-08 23:47:56', '2020-10-17 07:56:14'),
(1005, 'user@gmail.com', '25d55ad283aa400af464c76d713c07ad', 'user', 'RW', 1011, 'white-glove', 'user', 'u', 'Cash', 'Good Property', '647-973-6534', '32423', '333-333-3323', 'T-Mobile', 'Friend', 'true', 'What was your childhood nickname?', 'aa', 'What was the name of your first stuffed animal?', 'bb', 'What is your favorite color?', 'cc', '2020-09-08 23:47:56', '2020-12-16 03:18:30'),
(1007, 'abc@gmail.com', 'd7ba022864339a7abe12df8cc430dd00', 'whole_saler', 'RW', 0, 'free', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '2020-10-15 23:13:13', '2020-10-15 23:13:13'),
(1008, 'shaoor@gmail.com', '667eee95196576589029f48da26546e6', 'user', 'RW', 0, 'free', 'Shaoor', '', 'SIddique', 'CEO', '111-111-1111', '', '111-111-1111', '', 'Google', 'true', NULL, NULL, NULL, NULL, '', '', '2020-10-17 05:54:12', '2020-10-17 05:55:07'),
(1009, 'shaoor1@gmail.com', '15dd5d3f485eabea9aadce5f8eb584d3', 'user', 'RW', 0, 'silver', 'Shaoor', '', 'SIddique', 'CEO', '111-111-1111', '', '111-111-1111', '', 'Google', 'true', NULL, NULL, NULL, NULL, '', '', '2020-10-17 07:01:21', '2020-10-17 07:05:32'),
(1010, 'i171028@nu.edu.pk', 'dc7fcb6b624db97b7ac8eff0dcde752b', 'user', 'RW', 0, 'white-glove', 'Shaoor', '', 'SIddique', 'CEO', '111-111-1111', '11111', '222-222-2222', '', 'Facebook', 'true', 'What was your childhood nickname?', 'abc', 'What is your oldest cousin\'s first and last name?', 'abc', 'What is your favorite color?', 'abc', '2020-10-17 07:14:34', '2020-10-17 08:08:05'),
(1011, 'shaoor.mrf@gmail.com', '25d55ad283aa400af464c76d713c07ad', 'admin1', 'RW', 0, 'free', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '2020-10-17 07:28:43', '2020-10-21 21:20:49'),
(1012, 'admin3@gmail.com', '25d55ad283aa400af464c76d713c07ad', 'replica-Admin', 'RW', 0, 'free', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '2020-10-17 08:09:38', '2020-10-17 08:23:20'),
(1016, 'carclunker@gmail.com', 'a7c4b4e2c87d88c3c4237799d0379416', 'admin1', 'RW', 0, 'free', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '2020-10-26 22:48:42', '2020-10-26 22:48:42'),
(1019, 'abubkr.akram@gmail.com', 'd7ba022864339a7abe12df8cc430dd00', 'user', 'RW', 0, 'free', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '2020-12-01 11:12:06', '2020-12-01 11:12:06'),
(1020, 'sujandstc@gmail.com', 'bf4f42c5edc9efa6e0dd2000f68370c3', 'user', 'RW', 0, 'free', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '2021-05-28 08:37:22', '2021-05-28 08:37:22');

-- --------------------------------------------------------

--
-- Table structure for table `wholesalertable`
--

CREATE TABLE `wholesalertable` (
  `fk_wholesaler_id` int(11) NOT NULL,
  `ws_name` varchar(15) DEFAULT NULL,
  `support_email` varchar(255) DEFAULT NULL,
  `phone` varchar(11) DEFAULT NULL,
  `price_group` varchar(11) DEFAULT NULL,
  `web_url` varchar(255) NOT NULL,
  `terms_and_conditions` longtext DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wholesalertable`
--

INSERT INTO `wholesalertable` (`fk_wholesaler_id`, `ws_name`, `support_email`, `phone`, `price_group`, `web_url`, `terms_and_conditions`) VALUES
(0, 'PPPGuides', 'no-reply@gmail.com,abubkr.akram@gmail.com', NULL, '1', 'http://pppguides.digitalwebmark.com', '<p style=\'margin-top:0in;margin-right:0in;margin-bottom:0in;margin-left:0in;line-height:normal;font-size:15px;font-family:\"Calibri\",sans-serif;\'><strong><u><span style=\'font-size:13px;font-family:\"Quattrocento\",serif;background:white;\'><span style=\"text-decoration:none;\">&nbsp;</span></span></u></strong></p>\r\n<p style=\'margin-top:0in;margin-right:0in;margin-bottom:0in;margin-left:0in;line-height:normal;font-size:15px;font-family:\"Calibri\",sans-serif;text-align:center;\'><strong><u><span style=\'font-size:16px;font-family:\"Quattrocento\",serif;color:black;background:white;\'>CUSTOMER AGREEMENT / CONSENT TO TERMS / E-SIGN / PRIVACY POLICY</span></u></strong><strong><u><span style=\'font-size:13px;font-family:\"Quattrocento\",serif;color:black;background:white;\'><br>&nbsp;</span></u></strong><span style=\'font-size:13px;font-family:\"Quattrocento\",serif;color:black;background:white;\'>&nbsp;<br>&nbsp;</span></p>\r\n<p style=\'margin-top:0in;margin-right:0in;margin-bottom:0in;margin-left:0in;line-height:normal;font-size:15px;font-family:\"Calibri\",sans-serif;text-align:justify;\'><span style=\"font-size:13px;background:white;\">&nbsp;</span></p>\r\n<p style=\'margin-top:0in;margin-right:0in;margin-bottom:0in;margin-left:0in;line-height:normal;font-size:15px;font-family:\"Calibri\",sans-serif;text-align:justify;\'><strong><u><span style=\"font-size:13px;color:black;background:white;\">GENERAL TERMS</span></u></strong></p>\r\n<p style=\'margin-top:0in;margin-right:0in;margin-bottom:0in;margin-left:0in;line-height:normal;font-size:15px;font-family:\"Calibri\",sans-serif;text-align:justify;\'><span style=\"font-size:13px;background:white;\">&nbsp;</span></p>\r\n<p style=\'margin-top:0in;margin-right:0in;margin-bottom:10.0pt;margin-left:0in;line-height:115%;font-size:15px;font-family:\"Calibri\",sans-serif;text-align:justify;\'><span style=\"font-size:13px;line-height:115%;color:black;background:white;\">You, as the Customer, in consideration of receiving access to the platform and/or services provided by Aaroosh Inc. (d/b/a PPPGuides.com, PPPMasters.com, PPPRules.com) (hereinafter &quot;PPPGuides&quot;), hereby agree and understand that any such use is subject to the terms set forth herein.</span></p>\r\n<p style=\'margin-top:0in;margin-right:0in;margin-bottom:10.0pt;margin-left:0in;line-height:115%;font-size:15px;font-family:\"Calibri\",sans-serif;text-align:justify;\'><span style=\"font-size:13px;line-height:115%;color:black;background:white;\">PPPGuides is committed to helping Small Business Owners achieve maximum loan Forgiveness. Our intelligent PPP Loan Forgiveness Calculator, including analysis combined with support, assures that your process is smooth. Our goal is to help hard-working Americans by providing them an easy to use platform and peace of mind knowing they have us on their side.</span></p>\r\n<p style=\'margin-top:0in;margin-right:0in;margin-bottom:10.0pt;margin-left:0in;line-height:115%;font-size:15px;font-family:\"Calibri\",sans-serif;text-align:justify;\'><span style=\"font-size:13px;line-height:115%;color:black;background:white;\">If you opt to pay for the services of PPPGuides and obtain the additional benefits that come with the status of a paying customer, it is understood that you are paying PPPGuides primarily for assistance in filling out the PPP Forgiveness Application and/or, if eligible, to receive recommendations on the expenditure and/or use of PPP funds.</span></p>\r\n<p style=\'margin-top:0in;margin-right:0in;margin-bottom:10.0pt;margin-left:0in;line-height:115%;font-size:15px;font-family:\"Calibri\",sans-serif;text-align:justify;\'><span style=\"font-size:13px;line-height:115%;color:black;background:white;\">It is hereby understood that PPPGuides is not an accounting firm and is not being hired for or utilized for professional accounting advice and/or any other professional services. &nbsp;By agreeing to the terms herein, you understand that PPPGuides&#39; calculator/guidance/recommendations are to be treated by you as opinions and/or suggestions to assist you in connection with your PPP Loan Forgiveness Application. &nbsp;It is further understood that PPPGuides is not &ndash; and has not held itself out as &ndash; offering financial or accounting advice or any other service and/or advice that constitutes a substitute for professional accounting and/or financial services or advice. &nbsp;PPPGuides recommends that any customer utilizing its services consult an accounting and/or financial professional before making any final and/or consequential decisions.&nbsp;</span></p>\r\n<p style=\'margin-top:0in;margin-right:0in;margin-bottom:10.0pt;margin-left:0in;line-height:115%;font-size:15px;font-family:\"Calibri\",sans-serif;text-align:justify;\'><span style=\"font-size:13px;line-height:115%;color:black;background:white;\">It is further understood that all calculations, guidance and/or recommendations provided by PPPGuides and/or obtained through the use of PPPGuides&#39; services are based upon information you provide to PPPGuides and SBA. You therefore hereby agree to provide PPPGuides with information that is both complete and accurate, which includes providing all supporting documentation requested in the application and&nbsp;</span><a href=\"https://www.pppguides.com/blog/what-information-do-i-need-to-file-for-ppp-forgiveness\"><span style=\"font-size:13px;line-height:115%;background:white;\">here</span></a><span style=\"font-size:13px;line-height:115%;color:black;background:white;\">.&nbsp;</span></p>\r\n<p style=\'margin-top:0in;margin-right:0in;margin-bottom:10.0pt;margin-left:0in;line-height:115%;font-size:15px;font-family:\"Calibri\",sans-serif;text-align:justify;\'><span style=\"font-size:13px;line-height:115%;color:black;background:white;\">You agree to assume the risk of any and all inaccuracies in calculations and/or any other consequences that arise as a result of (1) information you provide to PPPGuides that is either incomplete or inaccurate or (2) your failure to provide all supporting documentation requested.</span></p>\r\n<p style=\'margin-top:0in;margin-right:0in;margin-bottom:10.0pt;margin-left:0in;line-height:115%;font-size:15px;font-family:\"Calibri\",sans-serif;text-align:justify;\'><span style=\"font-size:13px;line-height:115%;color:black;background:white;\">It is also understood that any representations and/or warranties that may be provided herein are null and void in the event that you either (1) fail to provide information that is both complete and accurate or (2) fail to provide all supporting documentation requested.</span></p>\r\n<p style=\'margin-top:0in;margin-right:0in;margin-bottom:10.0pt;margin-left:0in;line-height:115%;font-size:15px;font-family:\"Calibri\",sans-serif;text-align:justify;\'><strong><span style=\"font-size:13px;line-height:115%;color:black;background:white;\">CUSTOMER HEREBY UNDERSTANDS AND AGREES THAT, EXCEPT TO THE EXTENT REQUIRED BY LAW AND TO THE EXTENT SET FORTH HEREIN, THERE ARE NO WARRANTIES, EXPRESS OR IMPLIED, BEING MADE BY OR ON BEHALF OF PPPGUIDES IN CONNECTION WITH ANY OF ITS SERVICES.</span></strong></p>\r\n<p style=\'margin-top:0in;margin-right:0in;margin-bottom:10.0pt;margin-left:0in;line-height:115%;font-size:15px;font-family:\"Calibri\",sans-serif;text-align:justify;\'><span style=\"font-size:13px;line-height:115%;color:black;background:white;\">It is also understood and agreed that PPPGuides shall not be liable for any of customer&#39;s losses or damages caused directly or indirectly through the use of PPPGuides&#39; services and that, should PPPGuides be found liable for breach of contract or negligence, or any other theory of liability, its liability will be limited to the amount of any fee or deposit paid by customer to PPPGuides, unless said liability arises as a result of conduct on behalf of PPPGuides that is willful/grossly negligent or intentional.</span></p>\r\n<p style=\'margin-top:0in;margin-right:0in;margin-bottom:10.0pt;margin-left:0in;line-height:115%;font-size:15px;font-family:\"Calibri\",sans-serif;text-align:justify;\'><span style=\"font-size:13px;line-height:115%;color:black;background:white;\">By submitting a loan forgiveness application through PPPGuides, you understand that you are submitting the equivalent of the U.S. Small Business Administration (hereinafter &quot;SBA&quot;)&#39;s PPP loan forgiveness application and do not need to submit any other forms to your lender or to the SBA.</span></p>\r\n<p style=\'margin-top:0in;margin-right:0in;margin-bottom:10.0pt;margin-left:0in;line-height:115%;font-size:15px;font-family:\"Calibri\",sans-serif;text-align:justify;\'><span style=\"font-size:13px;line-height:115%;color:black;background:white;\">The application will take approximately one or more hours to complete. We save your progress as you go, and you may leave and come back to complete the application in multiple sessions before the due submission date(s), or before your subscription expires, whichever is earlier.</span></p>\r\n<p style=\'margin-top:0in;margin-right:0in;margin-bottom:10.0pt;margin-left:0in;line-height:115%;font-size:15px;font-family:\"Calibri\",sans-serif;text-align:justify;\'><span style=\"font-size:13px;line-height:115%;color:black;background:white;\">PPPGuides will keep you updated on the status of your application and reach out to you if we have any questions or require further information.</span></p>\r\n<p style=\'margin-top:0in;margin-right:0in;margin-bottom:0in;margin-left:0in;line-height:normal;font-size:15px;font-family:\"Calibri\",sans-serif;text-align:justify;\'><strong><u><span style=\"font-size:13px;background:white;\"><span style=\"text-decoration:none;\">&nbsp;</span></span></u></strong></p>\r\n<p style=\'margin-top:0in;margin-right:0in;margin-bottom:0in;margin-left:0in;line-height:normal;font-size:15px;font-family:\"Calibri\",sans-serif;text-align:justify;\'><strong><u><span style=\"font-size:13px;color:black;background:white;\">E-SIGN CONSENT</span></u></strong></p>\r\n<p style=\'margin-top:0in;margin-right:0in;margin-bottom:0in;margin-left:0in;line-height:normal;font-size:15px;font-family:\"Calibri\",sans-serif;text-align:justify;\'><span style=\"font-size:13px;background:white;\">&nbsp;</span></p>\r\n<p style=\'margin-top:0in;margin-right:0in;margin-bottom:0in;margin-left:0in;line-height:normal;font-size:15px;font-family:\"Calibri\",sans-serif;text-align:justify;\'><span style=\"font-size:13px;color:black;background:white;\">We may utilize e-Signature if necessary. You agree to consent to use electronic signatures and to receive disclosures &nbsp;and other information in an electronic form. &nbsp; We are required to provide you with certain disclosures in connection with your loan and our services. &nbsp;By accepting and agreeing to the Terms of Service electronically, you acknowledge and agree to the following:</span></p>\r\n<p style=\'margin-top:0in;margin-right:0in;margin-bottom:0in;margin-left:0in;line-height:normal;font-size:15px;font-family:\"Calibri\",sans-serif;text-align:justify;\'><span style=\"font-size:13px;color:black;background:white;\">&nbsp;</span></p>\r\n<p style=\'margin-top:0in;margin-right:0in;margin-bottom:0in;margin-left:0in;line-height:normal;font-size:15px;font-family:\"Calibri\",sans-serif;text-align:justify;\'><span style=\"font-size:13px;color:black;background:white;\">You have read and understand this consent and you agree to be bound by its terms.</span></p>\r\n<p style=\'margin-top:0in;margin-right:0in;margin-bottom:0in;margin-left:0in;line-height:normal;font-size:15px;font-family:\"Calibri\",sans-serif;text-align:justify;\'><span style=\"font-size:13px;color:black;background:white;\">&nbsp;</span></p>\r\n<p style=\'margin-top:0in;margin-right:0in;margin-bottom:0in;margin-left:0in;line-height:normal;font-size:15px;font-family:\"Calibri\",sans-serif;text-align:justify;\'><span style=\"font-size:13px;color:black;background:white;\">You are agreeing to receive disclosures and any other information about your account to you electronically. You agree that we will not be sending you any Disclosures in paper form.</span></p>\r\n<p style=\'margin-top:0in;margin-right:0in;margin-bottom:0in;margin-left:0in;line-height:normal;font-size:15px;font-family:\"Calibri\",sans-serif;text-align:justify;\'><span style=\"font-size:13px;color:black;background:white;\">&nbsp;</span></p>\r\n<p style=\'margin-top:0in;margin-right:0in;margin-bottom:0in;margin-left:0in;line-height:normal;font-size:15px;font-family:\"Calibri\",sans-serif;text-align:justify;\'><span style=\"font-size:13px;color:black;background:white;\">We may deliver any communications about your loan, our services, statements, bills, receipts, records, notices and any additional required disclosures (such as initial or future privacy notices and disclosures pursuant to federal, state or local laws or regulations) (collectively, &ldquo;Disclosures&rdquo;) to you electronically. Electronic communication may include information posted on our Website, emails we may send to you at the email address you have provided to us, and any text messages we may send to any mobile device whose number you have provided to us for receipt of text messages. You will be able to print or save Disclosures for your records.</span></p>\r\n<p style=\'margin-top:0in;margin-right:0in;margin-bottom:0in;margin-left:0in;line-height:normal;font-size:15px;font-family:\"Calibri\",sans-serif;text-align:justify;\'><span style=\"font-size:13px;color:black;background:white;\">&nbsp;<br> <strong>YOUR ELECTRONIC SUBMISSION OF YOUR SIGNATURE AND/OR E-SIGNATURE AND/OR ACCEPTING TERMS AND CONDITIONS WHEN SIGNING UP FOR OUR PRODUCT/SERVICES SHALL HAVE THE SAME EFFECT AS AN INK SIGNATURE AND CONSTITUTES YOUR AGREEMENT TO <u>ALL</u> TERMS AND PARTS HEREIN, INCLUDING THE GENERAL TERMS, THIS E-SIGN CONSENT AND THE PRIVACY POLICY.&nbsp;</strong></span></p>\r\n<p style=\'margin-top:0in;margin-right:0in;margin-bottom:0in;margin-left:0in;line-height:normal;font-size:15px;font-family:\"Calibri\",sans-serif;text-align:justify;\'><strong><span style=\"font-size:13px;color:black;background:white;\"><br>&nbsp;</span></strong><span style=\"font-size:13px;color:black;background:white;\">&nbsp;You represent that you satisfy the minimum hardware and software requirements, email, text message and electronic capabilities. You understand that, in order to view, save, or print the Disclosures, you must have (a) Internet access through a personal computer or mobile device, (b) a widely-used, recent version of a web browser (for example, Chrome), (c) a current version of a program that accurately displays PDF files (such as Adobe Reader 9 or higher), (d) a valid email address, (e) a mobile device that can receive text messages and (f) a printer, hard drive, or other storage capability.</span></p>\r\n<p style=\'margin-top:0in;margin-right:0in;margin-bottom:0in;margin-left:0in;line-height:normal;font-size:15px;font-family:\"Calibri\",sans-serif;text-align:justify;\'><span style=\"font-size:13px;color:black;background:white;\">&nbsp;</span></p>\r\n<p style=\'margin-top:0in;margin-right:0in;margin-bottom:0in;margin-left:0in;line-height:normal;font-size:15px;font-family:\"Calibri\",sans-serif;text-align:justify;\'><span style=\"font-size:13px;color:black;background:white;\">To ensure delivery of our emails, you should make sure that your spam filter is set to allow receipt of messages from all emails sent by PPPGuides.com. If your email address, mobile device number or other contact information changes, you must update your contact information by updating your profile on your account on our website.</span></p>\r\n<p style=\'margin-top:0in;margin-right:0in;margin-bottom:0in;margin-left:0in;line-height:normal;font-size:15px;font-family:\"Calibri\",sans-serif;text-align:justify;\'><span style=\"font-size:13px;color:black;background:white;\">&nbsp;</span></p>\r\n<p style=\'margin-top:0in;margin-right:0in;margin-bottom:0in;margin-left:0in;line-height:normal;font-size:15px;font-family:\"Calibri\",sans-serif;text-align:justify;\'><span style=\"font-size:13px;color:black;background:white;\">You may withdraw your consent to electronic signatures and communications at any time by contacting us via our website and indicating your withdrawal electronically. If you withdraw consent, the remaining provisions of these Terms will remain in full force and effect. Your withdrawal will apply only to your consent to receive electronic disclosures. Please be aware, however, that withdrawal of consent may result in the termination of your access to and use of our online services. Your withdrawal of consent will become effective only after we have had a reasonable opportunity to process your withdrawal, but no longer than a period of thirty days from your submission. There will be no fees or penalties for withdrawal of your consent. However, any fee paid for any of your subscribed plan will be forfeited.</span></p>\r\n<p style=\'margin-top:0in;margin-right:0in;margin-bottom:0in;margin-left:0in;line-height:normal;font-size:15px;font-family:\"Calibri\",sans-serif;text-align:justify;\'><span style=\"font-size:13px;background:white;\">&nbsp;</span></p>\r\n<p style=\'margin-top:0in;margin-right:0in;margin-bottom:0in;margin-left:0in;line-height:normal;font-size:15px;font-family:\"Calibri\",sans-serif;text-align:justify;\'><span style=\"font-size:13px;color:black;background:white;\">In addition, we reserve the right, in our sole discretion, to discontinue electronic communications or to terminate or change the terms and conditions on which we provide electronic communications. Should we exercise that right, you will be notified by e-mail or text, if authorized.</span></p>\r\n<p style=\'margin-top:0in;margin-right:0in;margin-bottom:0in;margin-left:0in;line-height:normal;font-size:15px;font-family:\"Calibri\",sans-serif;\'><span style=\"font-size:13px;background:white;\">&nbsp;</span></p>\r\n<p style=\'margin-top:0in;margin-right:0in;margin-bottom:0in;margin-left:0in;line-height:normal;font-size:15px;font-family:\"Calibri\",sans-serif;\'><span style=\"font-size:13px;color:black;background:white;\">&nbsp;<br> <strong><u>PRIVACY&nbsp;POLICY</u></strong></span></p>\r\n<p style=\'margin-top:0in;margin-right:0in;margin-bottom:0in;margin-left:0in;line-height:normal;font-size:15px;font-family:\"Calibri\",sans-serif;\'><strong><u><span style=\"font-size:13px;background:white;\"><span style=\"text-decoration:none;\">&nbsp;</span></span></u></strong></p>\r\n<p style=\'margin-top:0in;margin-right:0in;margin-bottom:0in;margin-left:0in;line-height:normal;font-size:15px;font-family:\"Calibri\",sans-serif;\'><strong><span style=\"font-size:13px;color:black;background:white;\">This Privacy Policy describes what Aaroosh Inc. and its affiliates (&quot;we,&quot; &quot;us&quot; or &quot;our&quot;) do with information we collect about you. We are committed to protecting your personal information and your right to privacy. If you have any questions or concerns about our policy, or our practices with regards to your personal information, please contact us via our website.</span></strong></p>\r\n<p style=\'margin-top:0in;margin-right:0in;margin-bottom:0in;margin-left:0in;line-height:normal;font-size:15px;font-family:\"Calibri\",sans-serif;\'><strong><span style=\"font-size:13px;background:white;\">&nbsp;</span></strong></p>\r\n<p style=\'margin-top:0in;margin-right:0in;margin-bottom:0in;margin-left:0in;line-height:normal;font-size:15px;font-family:\"Calibri\",sans-serif;\'><strong><span style=\"font-size:13px;color:black;background:white;\">&nbsp;The personal information and other information you type of upload on our website will be collected and may be utilized in accordance with the policies and terms below even if you decline (after entering said information) to agree to the terms and policies below and/or otherwise choose not to proceed further.</span></strong></p>\r\n<p style=\'margin-top:0in;margin-right:0in;margin-bottom:0in;margin-left:0in;line-height:normal;font-size:15px;font-family:\"Calibri\",sans-serif;\'><span style=\"font-size:13px;background:white;\">&nbsp;</span></p>\r\n<p style=\'margin-top:0in;margin-right:0in;margin-bottom:0in;margin-left:0in;line-height:normal;font-size:15px;font-family:\"Calibri\",sans-serif;\'><span style=\"font-size:13px;color:black;background:white;\">PPPGuides takes privacy and security of your personal information seriously. We maintain safeguards designed to protect your information&#39;s security, confidentiality and integrity. <strong>Please keep in mind that information you submit to us by email is not secure, so please do not send sensitive information in any email.</strong></span></p>\r\n<p style=\'margin-top:0in;margin-right:0in;margin-bottom:0in;margin-left:0in;line-height:normal;font-size:15px;font-family:\"Calibri\",sans-serif;\'><strong><span style=\"font-size:13px;color:black;background:white;\">&nbsp;</span></strong></p>\r\n<p style=\'margin-top:0in;margin-right:0in;margin-bottom:0in;margin-left:0in;line-height:normal;font-size:15px;font-family:\"Calibri\",sans-serif;\'><span style=\"font-size:13px;color:black;background:white;\">When you use our Website or our Services (which are both defined in our Terms of Service), you are agreeing to our Terms of Service and consenting to how we collect, share, use and store information about you as described in this Privacy Policy. Our goal is to explain to you in the clearest way possible what information we collect, how we use it, and what rights you have. We hope you take time to read through this policy carefully, as it is important. If there are any terms in this Privacy Policy that you do not agree with, please advise us on our website immediately and cease use of our Website and Services.</span></p>\r\n<p style=\'margin-top:0in;margin-right:0in;margin-bottom:0in;margin-left:0in;line-height:normal;font-size:15px;font-family:\"Calibri\",sans-serif;\'><span style=\"font-size:13px;color:black;background:white;\">&nbsp;</span></p>\r\n<p style=\'margin-top:0in;margin-right:0in;margin-bottom:0in;margin-left:0in;line-height:normal;font-size:15px;font-family:\"Calibri\",sans-serif;\'><span style=\"font-size:13px;color:black;background:white;\">This Privacy Policy applies to all information collected through our Website or our Services. Please read this Privacy Policy carefully as it will help you make informed decisions about sharing your personal information with us. In addition to the information you give us, we automatically collect certain information about how you access and interact with our Website and our Services.</span></p>\r\n<p style=\'margin-top:0in;margin-right:0in;margin-bottom:0in;margin-left:0in;line-height:normal;font-size:15px;font-family:\"Calibri\",sans-serif;\'><u><span style=\"font-size:13px;color:black;background:white;\">&nbsp;</span></u></p>\r\n<p style=\'margin-top:0in;margin-right:0in;margin-bottom:0in;margin-left:0in;line-height:normal;font-size:15px;font-family:\"Calibri\",sans-serif;\'><strong><span style=\"font-size:13px;color:black;background:white;\">1.&nbsp;Information&nbsp;We&nbsp;Collect&nbsp;About&nbsp;You</span></strong><span style=\"font-size:13px;color:black;background:white;\"><br>&nbsp;</span></p>\r\n<p style=\'margin-top:0in;margin-right:0in;margin-bottom:0in;margin-left:0in;line-height:normal;font-size:15px;font-family:\"Calibri\",sans-serif;\'><u><span style=\"font-size:13px;color:black;background:white;\">Personal information you give to us</span></u><span style=\"font-size:13px;color:black;background:white;\">. We collect personal information that you provide to us when you use our Website or our Services. The personal information that we collect depends on the context of your interactions with us and the Website or Services, the choices you make, and the products and features you use. By &quot;personal information,&quot; we mean information that specifically identifies you, such as the following:</span></p>\r\n<p style=\'margin-top:0in;margin-right:0in;margin-bottom:0in;margin-left:0in;line-height:normal;font-size:15px;font-family:\"Calibri\",sans-serif;\'><span style=\"font-size:13px;color:black;background:white;\">&nbsp;</span></p>\r\n<p style=\'margin-top:0in;margin-right:0in;margin-bottom:0in;margin-left:0in;line-height:normal;font-size:15px;font-family:\"Calibri\",sans-serif;\'><u><span style=\"font-size:13px;color:black;background:white;\">Name and contact data</span></u><span style=\"font-size:13px;color:black;background:white;\">. We collect your first and last name, contact information (address, telephone number, email address and payment information), and other similar contact data.</span></p>\r\n<p style=\'margin-top:0in;margin-right:0in;margin-bottom:0in;margin-left:0in;line-height:normal;font-size:15px;font-family:\"Calibri\",sans-serif;\'><span style=\"font-size:13px;color:black;background:white;\">&nbsp;</span></p>\r\n<p style=\'margin-top:0in;margin-right:0in;margin-bottom:0in;margin-left:0in;line-height:normal;font-size:15px;font-family:\"Calibri\",sans-serif;\'><u><span style=\"font-size:13px;color:black;background:white;\">Loan &nbsp; information</span></u><span style=\"font-size:13px;color:black;background:white;\">. &nbsp;We &nbsp; collect &nbsp;information related to &nbsp;your &nbsp; loan, &nbsp;such as &nbsp;promissory &nbsp; note, &nbsp;payment history, loan agreement, loan application details, disclosures, communications sent to and from you, and information related to the origination of your loan.</span></p>\r\n<p style=\'margin-top:0in;margin-right:0in;margin-bottom:0in;margin-left:0in;line-height:normal;font-size:15px;font-family:\"Calibri\",sans-serif;\'><span style=\"font-size:13px;color:black;background:white;\">&nbsp;</span></p>\r\n<p style=\'margin-top:0in;margin-right:0in;margin-bottom:0in;margin-left:0in;line-height:normal;font-size:15px;font-family:\"Calibri\",sans-serif;\'><u><span style=\"font-size:13px;color:black;background:white;\">Credentials</span></u><span style=\"font-size:13px;color:black;background:white;\">. We collect account numbers, account credentials, passwords, security data, password hints, and similar security information used for authentication and account access. This may include both credentials for our own Website and Services as well as those of third parties.</span></p>\r\n<p style=\'margin-top:0in;margin-right:0in;margin-bottom:0in;margin-left:0in;line-height:normal;font-size:15px;font-family:\"Calibri\",sans-serif;\'><span style=\"font-size:13px;background:white;\">&nbsp;</span></p>\r\n<p style=\'margin-top:0in;margin-right:0in;margin-bottom:0in;margin-left:0in;line-height:normal;font-size:15px;font-family:\"Calibri\",sans-serif;\'><u><span style=\"font-size:13px;color:black;background:white;\">Payroll Details</span></u><span style=\"font-size:13px;color:black;background:white;\">: We collect information about the payroll of you and your employees, including their names, addresses, contact details, phone numbers, email ids, locations, other credentials, social security details, etc. You hereby represent that you are authorized to provide such information to us. If you do not have authorization from your employees to submit this information you are required to notify us.</span></p>\r\n<p style=\'margin-top:0in;margin-right:0in;margin-bottom:0in;margin-left:0in;line-height:normal;font-size:15px;font-family:\"Calibri\",sans-serif;\'><span style=\"font-size:13px;color:black;background:white;\">&nbsp;</span></p>\r\n<p style=\'margin-top:0in;margin-right:0in;margin-bottom:0in;margin-left:0in;line-height:normal;font-size:15px;font-family:\"Calibri\",sans-serif;\'><u><span style=\"font-size:13px;color:black;background:white;\">Expenses Details</span></u><span style=\"font-size:13px;color:black;background:white;\">: We collect information about your expenses &nbsp;(e.g., rent, utilities like electricity, gas, water, transportation, telephone, or internet access etc) and mortgage interest payments for properties with mortgage agreements.</span></p>\r\n<p style=\'margin-top:0in;margin-right:0in;margin-bottom:0in;margin-left:0in;line-height:normal;font-size:15px;font-family:\"Calibri\",sans-serif;\'><span style=\"font-size:13px;color:black;background:white;\">&nbsp;</span></p>\r\n<p style=\'margin-top:0in;margin-right:0in;margin-bottom:0in;margin-left:0in;line-height:normal;font-size:15px;font-family:\"Calibri\",sans-serif;\'><u><span style=\"font-size:13px;color:black;background:white;\">Payment &nbsp; Data</span></u><span style=\"font-size:13px;color:black;background:white;\">. &nbsp;We &nbsp; collect &nbsp;data &nbsp;necessary &nbsp; to &nbsp;process &nbsp;your &nbsp; payment &nbsp;if &nbsp;you &nbsp; make &nbsp;purchases, &nbsp;using payment methods you selected. All payment data is securely stored by our payment processor.</span></p>\r\n<p style=\'margin-top:0in;margin-right:0in;margin-bottom:0in;margin-left:0in;line-height:normal;font-size:15px;font-family:\"Calibri\",sans-serif;\'><span style=\"font-size:13px;color:black;background:white;\">&nbsp;</span></p>\r\n<p style=\'margin-top:0in;margin-right:0in;margin-bottom:0in;margin-left:0in;line-height:normal;font-size:15px;font-family:\"Calibri\",sans-serif;\'><u><span style=\"font-size:13px;color:black;background:white;\">Demographic information</span></u><span style=\"font-size:13px;color:black;background:white;\">. We collect information such as your date of birth, employment and income information, &nbsp;school &nbsp; or &nbsp;program &nbsp;information &nbsp; and &nbsp;any &nbsp;other &nbsp; information &nbsp;you &nbsp;provide &nbsp; with &nbsp;your forgiveness application.</span></p>\r\n<p style=\'margin-top:0in;margin-right:0in;margin-bottom:0in;margin-left:0in;line-height:normal;font-size:15px;font-family:\"Calibri\",sans-serif;\'><span style=\"font-size:13px;color:black;background:white;\">&nbsp;</span></p>\r\n<p style=\'margin-top:0in;margin-right:0in;margin-bottom:0in;margin-left:0in;line-height:normal;font-size:15px;font-family:\"Calibri\",sans-serif;\'><span style=\"font-size:13px;color:black;background:white;\">To calculate forgiveness properly and provide you with guidance, all information that you provide to us must be true, complete, and accurate. Information that has been made anonymous and/or does not identify a specific person is not considered personal information.</span></p>\r\n<p style=\'margin-top:0in;margin-right:0in;margin-bottom:0in;margin-left:0in;line-height:normal;font-size:15px;font-family:\"Calibri\",sans-serif;\'><span style=\"font-size:13px;color:black;background:white;\">&nbsp;</span></p>\r\n<p style=\'margin-top:0in;margin-right:0in;margin-bottom:0in;margin-left:0in;line-height:normal;font-size:15px;font-family:\"Calibri\",sans-serif;\'><span style=\"font-size:13px;color:black;background:white;\">We &nbsp; collect &nbsp;personal &nbsp;information that &nbsp;you voluntarily &nbsp;provide &nbsp; to &nbsp;us &nbsp;when &nbsp; you &nbsp;use &nbsp;our &nbsp; Website or Services, express an interest in obtaining information about us or our products or services, use the Website or Services or otherwise contact us.</span></p>\r\n<p style=\'margin-top:0in;margin-right:0in;margin-bottom:0in;margin-left:0in;line-height:normal;font-size:15px;font-family:\"Calibri\",sans-serif;\'><span style=\"font-size:13px;color:black;background:white;\">&nbsp;</span></p>\r\n<p style=\'margin-top:0in;margin-right:0in;margin-bottom:0in;margin-left:0in;line-height:normal;font-size:15px;font-family:\"Calibri\",sans-serif;\'><u><span style=\"font-size:13px;color:black;background:white;\">Information &nbsp; automatically &nbsp; collected</span></u><span style=\"font-size:13px;color:black;background:white;\">: &nbsp; &nbsp;Some &nbsp; information &nbsp; &ndash; &nbsp; &nbsp;such &nbsp; as &nbsp; IP &nbsp; &nbsp;address &nbsp; and/or &nbsp; device characteristics &ndash; is collected automatically when you visit our Website or use our Services.</span></p>\r\n<p style=\'margin-top:0in;margin-right:0in;margin-bottom:0in;margin-left:0in;line-height:normal;font-size:15px;font-family:\"Calibri\",sans-serif;\'><span style=\"font-size:13px;color:black;background:white;\">&nbsp;</span></p>\r\n<p style=\'margin-top:0in;margin-right:0in;margin-bottom:0in;margin-left:0in;line-height:normal;font-size:15px;font-family:\"Calibri\",sans-serif;\'><span style=\"font-size:13px;color:black;background:white;\">We also automatically collect certain information when you access, visit, use, or navigate our Website or Services. Like many businesses, we also collect information through cookies, google analytics and other similar technologies.&nbsp;</span></p>\r\n<p style=\'margin-top:0in;margin-right:0in;margin-bottom:0in;margin-left:0in;line-height:normal;font-size:15px;font-family:\"Calibri\",sans-serif;\'><span style=\"font-size:13px;color:black;background:white;\">&nbsp;</span></p>\r\n<p style=\'margin-top:0in;margin-right:0in;margin-bottom:0in;margin-left:0in;line-height:normal;font-size:15px;font-family:\"Calibri\",sans-serif;\'><span style=\"font-size:13px;color:black;background:white;\">We may collect data such as your browser type, device type, device and usage information, device ID, internet service provider, IP address of your computer or device, browser and device characteristics, operating system, language preferences, referring URLs, device name, country, and other technical information.</span></p>\r\n<p style=\'margin-top:0in;margin-right:0in;margin-bottom:0in;margin-left:0in;line-height:normal;font-size:15px;font-family:\"Calibri\",sans-serif;\'><span style=\"font-size:13px;color:black;background:white;\">&nbsp;</span></p>\r\n<p style=\'margin-top:0in;margin-right:0in;margin-bottom:0in;margin-left:0in;line-height:normal;font-size:15px;font-family:\"Calibri\",sans-serif;\'><u><span style=\"font-size:13px;color:black;background:white;\">Interactions</span></u><span style=\"font-size:13px;color:black;background:white;\">. We may collect information about how you interact with our Website and our Services, such as data about which pages you view, which features you visit or click on, which support channel you use, which emails you open, number of clicks, clickstream information, data and time stamps, referring/exit pages, how you interact with links on the Website, and other information about how and when you use our Website or Services. This information is primarily needed to maintain the security and operation of our Website and Services, and for our internal analytics and reporting purposes.</span></p>\r\n<p style=\'margin-top:0in;margin-right:0in;margin-bottom:0in;margin-left:0in;line-height:normal;font-size:15px;font-family:\"Calibri\",sans-serif;\'><span style=\"font-size:13px;color:black;background:white;\">&nbsp;</span></p>\r\n<p style=\'margin-top:0in;margin-right:0in;margin-bottom:0in;margin-left:0in;line-height:normal;font-size:15px;font-family:\"Calibri\",sans-serif;\'><u><span style=\"font-size:13px;color:black;background:white;\">Cookies and similar technologies</span></u><span style=\"font-size:13px;color:black;background:white;\">. We may use cookies, web beacons and similar technologies to capture and retain certain information. We use these technologies to collect and store information when you use our Website and our Services--this may include sending one or more cookies or anonymous identifiers to your device. This information helps us improve your experience using our Website and our Services. Disabling cookies or similar technologies may affect the functionality of certain features of our Website and our Services. We do not process &quot;do not track&quot; signals.</span></p>\r\n<p style=\'margin-top:0in;margin-right:0in;margin-bottom:0in;margin-left:0in;line-height:normal;font-size:15px;font-family:\"Calibri\",sans-serif;\'><span style=\"font-size:13px;background:white;\">&nbsp;</span></p>\r\n<p style=\'margin-top:0in;margin-right:0in;margin-bottom:0in;margin-left:0in;line-height:normal;font-size:15px;font-family:\"Calibri\",sans-serif;\'><span style=\"font-size:13px;color:black;background:white;\">Information collected through our apps. We may collect information regarding your mobile device and we may use push notifications when you use our mobile apps.</span></p>\r\n<p style=\'margin-top:0in;margin-right:0in;margin-bottom:0in;margin-left:0in;line-height:normal;font-size:15px;font-family:\"Calibri\",sans-serif;\'><span style=\"font-size:13px;color:black;background:white;\">&nbsp;</span></p>\r\n<p style=\'margin-top:0in;margin-right:0in;margin-bottom:0in;margin-left:0in;line-height:normal;font-size:15px;font-family:\"Calibri\",sans-serif;\'><u><span style=\"font-size:13px;color:black;background:white;\">Mobile device access</span></u><span style=\"font-size:13px;color:black;background:white;\">. We may request access or permission to certain features from your mobile device, including your mobile device&#39;s calendar, reminders, SMS messages, WhatsApp, WeChat and other features. If you wish to change our access or permissions, you may do so in your device&#39;s settings.</span></p>\r\n<p style=\'margin-top:0in;margin-right:0in;margin-bottom:0in;margin-left:0in;line-height:normal;font-size:15px;font-family:\"Calibri\",sans-serif;\'><span style=\"font-size:13px;color:black;background:white;\">&nbsp;</span></p>\r\n<p style=\'margin-top:0in;margin-right:0in;margin-bottom:0in;margin-left:0in;line-height:normal;font-size:15px;font-family:\"Calibri\",sans-serif;\'><u><span style=\"font-size:13px;color:black;background:white;\">Mobile device data</span></u><span style=\"font-size:13px;color:black;background:white;\">. Mobile device data. We may automatically collect device information (such as your mobile device ID, model, and manufacturer), operating system, version information, and IP address.</span></p>\r\n<p style=\'margin-top:0in;margin-right:0in;margin-bottom:0in;margin-left:0in;line-height:normal;font-size:15px;font-family:\"Calibri\",sans-serif;\'><span style=\"font-size:13px;color:black;background:white;\">&nbsp;</span></p>\r\n<p style=\'margin-top:0in;margin-right:0in;margin-bottom:0in;margin-left:0in;line-height:normal;font-size:15px;font-family:\"Calibri\",sans-serif;\'><u><span style=\"font-size:13px;color:black;background:white;\">Push notifications</span></u><span style=\"font-size:13px;color:black;background:white;\">. We may request to send you push notifications regarding your account or the mobile application. If you wish to opt-out from receiving these types of communications, you may turn them off in your device&#39;s settings.</span></p>\r\n<p style=\'margin-top:0in;margin-right:0in;margin-bottom:0in;margin-left:0in;line-height:normal;font-size:15px;font-family:\"Calibri\",sans-serif;\'><span style=\"font-size:13px;color:black;background:white;\">&nbsp;</span></p>\r\n<p style=\'margin-top:0in;margin-right:0in;margin-bottom:0in;margin-left:0in;line-height:normal;font-size:15px;font-family:\"Calibri\",sans-serif;\'><u><span style=\"font-size:13px;color:black;background:white;\">Information collected from third parties</span></u><span style=\"font-size:13px;color:black;background:white;\">: We may collect data from public records, consumer reporting agencies, financial institutions, marketing partners, and other outside sources, where same is permitted under law.</span></p>\r\n<p style=\'margin-top:0in;margin-right:0in;margin-bottom:0in;margin-left:0in;line-height:normal;font-size:15px;font-family:\"Calibri\",sans-serif;\'><span style=\"font-size:13px;color:black;background:white;\">We may obtain information about you from third parties, such as public records or databases, joint marketing partners, consumer reporting agencies, financial institutions, information service providers, as well as from other third parties. We may work with third party data partners to supplement information we collect directly from you for account management, fraud, or identity verification purposes. Examples of the information we may receive from other sources include: marketing leads and search results and links, including paid listings, and other third party data sources.</span></p>\r\n<p style=\'margin-top:0in;margin-right:0in;margin-bottom:0in;margin-left:0in;line-height:normal;font-size:15px;font-family:\"Calibri\",sans-serif;\'><span style=\"font-size:13px;background:white;\">&nbsp;</span></p>\r\n<p style=\'margin-top:0in;margin-right:0in;margin-bottom:0in;margin-left:0in;line-height:normal;font-size:15px;font-family:\"Calibri\",sans-serif;\'><span style=\"font-size:13px;color:black;background:white;\">We may use a third party to gather your data from financial institutions. By using our Services, you grant us and third party we may engage the right, power, and authority to act on your behalf to access and transmit your personal and financial information from your financial institution. You agree to your personal and financial information being transferred, stored and processed by these third parties in accordance with their Privacy Policy.</span></p>\r\n<p style=\'margin-top:0in;margin-right:0in;margin-bottom:0in;margin-left:0in;line-height:normal;font-size:15px;font-family:\"Calibri\",sans-serif;\'><span style=\"font-size:13px;color:black;background:white;\">&nbsp;</span></p>\r\n<p style=\'margin-top:0in;margin-right:0in;margin-bottom:0in;margin-left:0in;line-height:normal;font-size:15px;font-family:\"Calibri\",sans-serif;\'><u><span style=\"font-size:13px;color:black;background:white;\">Information collected through monitoring</span></u><span style=\"font-size:13px;color:black;background:white;\">: We may collect information about you indirectly through monitoring or other means (for example, recording telephone calls, monitoring emails and information collected through your use of our Website and our Services). By communicating with us, you acknowledge that your communications with us may be overheard, monitored or recorded without further notice or warning.</span></p>\r\n<p style=\'margin-top:0in;margin-right:0in;margin-bottom:0in;margin-left:0in;line-height:normal;font-size:15px;font-family:\"Calibri\",sans-serif;\'><span style=\"font-size:13px;color:black;background:white;\"><br> <br> <strong>2.&nbsp;How&nbsp;We&nbsp;Use&nbsp;Your&nbsp;Information</strong><br> <br>&nbsp;We process your information for purposes based on legitimate business interest, the fulfillment of our contract with you, compliance with our legal obligations, and/or your consent.</span></p>\r\n<p style=\'margin-top:0in;margin-right:0in;margin-bottom:0in;margin-left:0in;line-height:normal;font-size:15px;font-family:\"Calibri\",sans-serif;\'><span style=\"font-size:13px;color:black;background:white;\">&nbsp;</span></p>\r\n<p style=\'margin-top:0in;margin-right:0in;margin-bottom:0in;margin-left:0in;line-height:normal;font-size:15px;font-family:\"Calibri\",sans-serif;\'><span style=\"font-size:13px;color:black;background:white;\">We use personal information to provide, maintain, develop and improve our Website and our Services, to authenticate your identity, to communicate with you, to respond to your requests, to administer, operate and manage your account with us, to provide you with personalized content and customize our Website and/or our Services, to conduct research and analysis, to optimize our business processes, to mitigate fraud and manage risk, to fulfill our contractual, legal and regulatory requirements, to support our &nbsp;internal &nbsp;business &nbsp; operations &nbsp;(including &nbsp;to &nbsp; perform &nbsp;accounting, &nbsp;auditing &nbsp; and &nbsp;other &nbsp;internal functions), for compliance with our legal obligations, and to provide investor reporting.</span></p>\r\n<p style=\'margin-top:0in;margin-right:0in;margin-bottom:0in;margin-left:0in;line-height:normal;font-size:15px;font-family:\"Calibri\",sans-serif;\'><span style=\"font-size:13px;background:white;\">&nbsp;</span></p>\r\n<p style=\'margin-top:0in;margin-right:0in;margin-bottom:0in;margin-left:0in;line-height:normal;font-size:15px;font-family:\"Calibri\",sans-serif;\'><span style=\"font-size:13px;color:black;background:white;\">We may also use personal information to deliver targeted communications and notices to you. We may also use all information to deliver targeted communications about the shortfalls in your application, any forgiveness increase opportunities which you need to evaluate.</span></p>\r\n<p style=\'margin-top:0in;margin-right:0in;margin-bottom:0in;margin-left:0in;line-height:normal;font-size:15px;font-family:\"Calibri\",sans-serif;\'><span style=\"font-size:13px;color:black;background:white;\">&nbsp;</span></p>\r\n<p style=\'margin-top:0in;margin-right:0in;margin-bottom:0in;margin-left:0in;line-height:normal;font-size:15px;font-family:\"Calibri\",sans-serif;\'><span style=\"font-size:13px;color:black;background:white;\">We may combine information that we collect offline or that we receive from third party sources (such as your credit report information) with your personal information in order to provide, improve and personalize our Website and our Services for you.</span></p>\r\n<p style=\'margin-top:0in;margin-right:0in;margin-bottom:0in;margin-left:0in;line-height:normal;font-size:15px;font-family:\"Calibri\",sans-serif;\'><span style=\"font-size:13px;color:black;background:white;\">&nbsp;</span></p>\r\n<p style=\'margin-top:0in;margin-right:0in;margin-bottom:0in;margin-left:0in;line-height:normal;font-size:15px;font-family:\"Calibri\",sans-serif;\'><span style=\"font-size:13px;color:black;background:white;\">Here are specific examples of how we may use the information we collect or receive:</span></p>\r\n<p style=\'margin-top:0in;margin-right:0in;margin-bottom:0in;margin-left:0in;line-height:normal;font-size:15px;font-family:\"Calibri\",sans-serif;\'><span style=\"font-size:13px;color:black;background:white;\">&nbsp;</span></p>\r\n<p style=\'margin-top:0in;margin-right:0in;margin-bottom:0in;margin-left:0in;line-height:normal;font-size:15px;font-family:\"Calibri\",sans-serif;\'><span style=\"font-size:13px;color:black;background:white;\">To facilitate account creation and the login process. If you choose to link your account with us to a third party account (such as your bank account), we use the information you allowed us to collect from those third parties to facilitate account creation and the login process.</span></p>\r\n<p style=\'margin-top:0in;margin-right:0in;margin-bottom:0in;margin-left:0in;line-height:normal;font-size:15px;font-family:\"Calibri\",sans-serif;\'><span style=\"font-size:13px;color:black;background:white;\">&nbsp;</span></p>\r\n<p style=\'margin-top:0in;margin-right:0in;margin-bottom:0in;margin-left:0in;line-height:normal;font-size:15px;font-family:\"Calibri\",sans-serif;\'><span style=\"font-size:13px;color:black;background:white;\">To send administrative information to you. We may use your personal information to send you product, service, and new feature information and/or information about changes to our terms, conditions, and policies.</span></p>\r\n<p style=\'margin-top:0in;margin-right:0in;margin-bottom:0in;margin-left:0in;line-height:normal;font-size:15px;font-family:\"Calibri\",sans-serif;\'><span style=\"font-size:13px;color:black;background:white;\">&nbsp;</span></p>\r\n<p style=\'margin-top:0in;margin-right:0in;margin-bottom:0in;margin-left:0in;line-height:normal;font-size:15px;font-family:\"Calibri\",sans-serif;\'><span style=\"font-size:13px;color:black;background:white;\">Request feedback. We may use your information to request feedback and to contact you about your use of our Services. And may also ask about information about from where you have heard about our site, company, etc</span></p>\r\n<p style=\'margin-top:0in;margin-right:0in;margin-bottom:0in;margin-left:0in;line-height:normal;font-size:15px;font-family:\"Calibri\",sans-serif;\'><span style=\"font-size:13px;color:black;background:white;\">&nbsp;</span></p>\r\n<p style=\'margin-top:0in;margin-right:0in;margin-bottom:0in;margin-left:0in;line-height:normal;font-size:15px;font-family:\"Calibri\",sans-serif;\'><span style=\"font-size:13px;color:black;background:white;\">To protect our Services. We may use your information as part of our efforts to keep our Services safe and secure (for example, for fraud monitoring and prevention).</span></p>\r\n<p style=\'margin-top:0in;margin-right:0in;margin-bottom:0in;margin-left:0in;line-height:normal;font-size:15px;font-family:\"Calibri\",sans-serif;\'><span style=\"font-size:13px;color:black;background:white;\">&nbsp;</span></p>\r\n<p style=\'margin-top:0in;margin-right:0in;margin-bottom:0in;margin-left:0in;line-height:normal;font-size:15px;font-family:\"Calibri\",sans-serif;\'><span style=\"font-size:13px;color:black;background:white;\">To enforce our terms, conditions, and policies.</span></p>\r\n<p style=\'margin-top:0in;margin-right:0in;margin-bottom:0in;margin-left:0in;line-height:normal;font-size:15px;font-family:\"Calibri\",sans-serif;\'><span style=\"font-size:13px;color:black;background:white;\">&nbsp;</span></p>\r\n<p style=\'margin-top:0in;margin-right:0in;margin-bottom:0in;margin-left:0in;line-height:normal;font-size:15px;font-family:\"Calibri\",sans-serif;\'><span style=\"font-size:13px;color:black;background:white;\">To respond to legal requests and prevent harm. If we receive a subpoena or other legal request, we may need to inspect the data we hold to determine how to respond. We may also be required to use data to respond to a subpoena or other request from a law enforcement agency or governmental agency.</span></p>\r\n<p style=\'margin-top:0in;margin-right:0in;margin-bottom:0in;margin-left:0in;line-height:normal;font-size:15px;font-family:\"Calibri\",sans-serif;\'><span style=\"font-size:13px;color:black;background:white;\">&nbsp;</span></p>\r\n<p style=\'margin-top:0in;margin-right:0in;margin-bottom:0in;margin-left:0in;line-height:normal;font-size:15px;font-family:\"Calibri\",sans-serif;\'><span style=\"font-size:13px;color:black;background:white;\">We will store and avail your information to you for a period, up to twelve months from the initial date you submit your application, beyond which we would not be able to provide any details about your application. It is recommended that you download all your information within twelve months period from the date of your initial submission.</span></p>\r\n<p style=\'margin-top:0in;margin-right:0in;margin-bottom:0in;margin-left:0in;line-height:normal;font-size:15px;font-family:\"Calibri\",sans-serif;\'><span style=\"font-size:13px;color:black;background:white;\">&nbsp;</span></p>\r\n<p style=\'margin-top:0in;margin-right:0in;margin-bottom:0in;margin-left:0in;line-height:normal;font-size:15px;font-family:\"Calibri\",sans-serif;\'><span style=\"font-size:13px;color:black;background:white;\">For other business purposes. We may use your information for other business purposes, such as data analysis, identifying usage trends, determining the effectiveness of our promotional campaigns and to evaluation and improve our Services and your experience. <strong>We may sell or rent your information with third parties. We may also use your information for additional promotions or benefit unrelated to your forgiveness application.</strong></span></p>\r\n<p style=\'margin-top:0in;margin-right:0in;margin-bottom:0in;margin-left:0in;line-height:normal;font-size:15px;font-family:\"Calibri\",sans-serif;\'><span style=\"font-size:13px;color:black;background:white;\">&nbsp;</span></p>\r\n<p style=\'margin-top:0in;margin-right:0in;margin-bottom:0in;margin-left:0in;line-height:normal;font-size:15px;font-family:\"Calibri\",sans-serif;\'><span style=\"font-size:13px;color:black;background:white;\">We may also aggregate information in a <strong>non-personally identifiable form to use in our business and to share with business partners.</strong> We may produce data analytics and reports containing anonymized summaries of personal information and other information and provide such information to third parties--this information may include personal information that has been aggregated and anonymized, and will not identify you.<br> <br> <strong>3.&nbsp;When&nbsp;We&nbsp;Share&nbsp;Your&nbsp;Personal&nbsp;Information</strong><br> <br>&nbsp;We &nbsp;may &nbsp; share &nbsp;information &nbsp;to &nbsp; comply &nbsp;with &nbsp;legal &nbsp; requirements, &nbsp;to &nbsp;protect &nbsp; your &nbsp;rights, &nbsp;or &nbsp; to &nbsp;fulfill business obligations. We share your personal information with third parties as described in this Privacy Policy and as required by law, as well as to cooperate with law enforcement and government agencies.</span></p>\r\n<p style=\'margin-top:0in;margin-right:0in;margin-bottom:0in;margin-left:0in;line-height:normal;font-size:15px;font-family:\"Calibri\",sans-serif;\'><span style=\"font-size:13px;color:black;background:white;\">&nbsp;</span></p>\r\n<p style=\'margin-top:0in;margin-right:0in;margin-bottom:0in;margin-left:0in;line-height:normal;font-size:15px;font-family:\"Calibri\",sans-serif;\'><span style=\"font-size:13px;color:black;background:white;\">We may process or share data based on the following:</span></p>\r\n<p style=\'margin-top:0in;margin-right:0in;margin-bottom:0in;margin-left:0in;line-height:normal;font-size:15px;font-family:\"Calibri\",sans-serif;\'><span style=\"font-size:13px;color:black;background:white;\">&nbsp;</span></p>\r\n<p style=\'margin-top:0in;margin-right:0in;margin-bottom:0in;margin-left:0in;line-height:normal;font-size:15px;font-family:\"Calibri\",sans-serif;\'><span style=\"font-size:13px;color:black;background:white;\">Consent: We may process your data if you have given us specific consent to use your personal information for a specific purpose.</span></p>\r\n<p style=\'margin-top:0in;margin-right:0in;margin-bottom:0in;margin-left:0in;line-height:normal;font-size:15px;font-family:\"Calibri\",sans-serif;\'><span style=\"font-size:13px;color:black;background:white;\">&nbsp;</span></p>\r\n<p style=\'margin-top:0in;margin-right:0in;margin-bottom:0in;margin-left:0in;line-height:normal;font-size:15px;font-family:\"Calibri\",sans-serif;\'><span style=\"font-size:13px;color:black;background:white;\">Legitimate &nbsp;interests: &nbsp; We &nbsp;may &nbsp;process &nbsp; your &nbsp;data &nbsp;when &nbsp; it &nbsp;is &nbsp;reasonably &nbsp; necessary &nbsp;to &nbsp;achieve &nbsp; our legitimate business interests.</span></p>\r\n<p style=\'margin-top:0in;margin-right:0in;margin-bottom:0in;margin-left:0in;line-height:normal;font-size:15px;font-family:\"Calibri\",sans-serif;\'><span style=\"font-size:13px;color:black;background:white;\">&nbsp;</span></p>\r\n<p style=\'margin-top:0in;margin-right:0in;margin-bottom:0in;margin-left:0in;line-height:normal;font-size:15px;font-family:\"Calibri\",sans-serif;\'><span style=\"font-size:13px;color:black;background:white;\">Performance of a contract: Where we have entered into a contract with you, we may process your personal information to fulfill the terms of our contract and for other reasons as set forth herein.</span></p>\r\n<p style=\'margin-top:0in;margin-right:0in;margin-bottom:0in;margin-left:0in;line-height:normal;font-size:15px;font-family:\"Calibri\",sans-serif;\'><span style=\"font-size:13px;color:black;background:white;\">&nbsp;</span></p>\r\n<p style=\'margin-top:0in;margin-right:0in;margin-bottom:0in;margin-left:0in;line-height:normal;font-size:15px;font-family:\"Calibri\",sans-serif;\'><span style=\"font-size:13px;color:black;background:white;\">Legal obligations: We may disclose your information when we are legally required to do so in order to comply with applicable law, governmental requests, a judicial proceeding, court order, or legal process, such as in response to a court order or subpoena (including in response to public authorities to meet national security or law enforcement requirements).</span></p>\r\n<p style=\'margin-top:0in;margin-right:0in;margin-bottom:0in;margin-left:0in;line-height:normal;font-size:15px;font-family:\"Calibri\",sans-serif;\'><span style=\"font-size:13px;color:black;background:white;\">&nbsp;</span></p>\r\n<p style=\'margin-top:0in;margin-right:0in;margin-bottom:0in;margin-left:0in;line-height:normal;font-size:15px;font-family:\"Calibri\",sans-serif;\'><span style=\"font-size:13px;color:black;background:white;\">Vital &nbsp; interests: &nbsp;We may &nbsp;disclose your &nbsp; information where we &nbsp;believe &nbsp;it &nbsp; is &nbsp;necessary &nbsp;to &nbsp; investigate, prevent, &nbsp;or &nbsp;take &nbsp; action &nbsp;regarding &nbsp;potential &nbsp; violations &nbsp;of &nbsp;our &nbsp; policies, &nbsp;suspected &nbsp;fraud, &nbsp; situations involving threats to the safety of any person or illegal activities, or as evidence in litigation in which we are involved.</span></p>\r\n<p style=\'margin-top:0in;margin-right:0in;margin-bottom:0in;margin-left:0in;line-height:normal;font-size:15px;font-family:\"Calibri\",sans-serif;\'><span style=\"font-size:13px;color:black;background:white;\">&nbsp;</span></p>\r\n<p style=\'margin-top:0in;margin-right:0in;margin-bottom:0in;margin-left:0in;line-height:normal;font-size:15px;font-family:\"Calibri\",sans-serif;\'><span style=\"font-size:13px;color:black;background:white;\">We share your personal information with employees, affiliates, and third party service providers as necessary to operate our business and to provide, maintain, develop and improve the Website and the Services.</span></p>\r\n<p style=\'margin-top:0in;margin-right:0in;margin-bottom:0in;margin-left:0in;line-height:normal;font-size:15px;font-family:\"Calibri\",sans-serif;\'><span style=\"font-size:13px;color:black;background:white;\">&nbsp;</span></p>\r\n<p style=\'margin-top:0in;margin-right:0in;margin-bottom:0in;margin-left:0in;line-height:normal;font-size:15px;font-family:\"Calibri\",sans-serif;\'><span style=\"font-size:13px;color:black;background:white;\">Some of the ways in which we may share your personal information include, but are not limited to: to process transactions, maintain records, provide customer service, communicate with you, resolve disputes, conduct research and store data; to conduct servicing and collections activities, to prevent fraud or illegal activity, to recover debts and to protect our or others&#39; rights, property or safety with consumer reporting agencies, as permitted by law to respond to court orders, subpoenas and other legal processes, to comply with external audits or other investigations and to respond to law enforcement, regulators or governmental requests in connection with a change of control, merger, acquisition, consolidation, sale or transfer of our assets, financing, acquisition or servicing transfer</span></p>\r\n<p style=\'margin-top:0in;margin-right:0in;margin-bottom:0in;margin-left:0in;line-height:normal;font-size:15px;font-family:\"Calibri\",sans-serif;\'><span style=\"font-size:13px;color:black;background:white;\">&nbsp;</span></p>\r\n<p style=\'margin-top:0in;margin-right:0in;margin-bottom:0in;margin-left:0in;line-height:normal;font-size:15px;font-family:\"Calibri\",sans-serif;\'><span style=\"font-size:13px;color:black;background:white;\">We &nbsp; may &nbsp;need &nbsp;to &nbsp; need &nbsp;to &nbsp;process &nbsp; your &nbsp;data &nbsp;or &nbsp; share &nbsp;your &nbsp;personal &nbsp; information &nbsp;in &nbsp;the &nbsp; following situations:</span></p>\r\n<p style=\'margin-top:0in;margin-right:0in;margin-bottom:0in;margin-left:0in;line-height:normal;font-size:15px;font-family:\"Calibri\",sans-serif;\'><span style=\"font-size:13px;color:black;background:white;\">&nbsp;</span></p>\r\n<p style=\'margin-top:0in;margin-right:0in;margin-bottom:0in;margin-left:0in;line-height:normal;font-size:15px;font-family:\"Calibri\",sans-serif;\'><span style=\"font-size:13px;color:black;background:white;\">Vendors, consultants, and other third party service providers. We may share your data with third party vendors, service providers, contractors, or agents who perform services for us on our behalf and request access to such information to do that work. Examples include: payment processing, data analysis, email delivery, hosting services, customer service, Auditors (for Audit Shield), Guarantee Shield (for Insurance) and marketing efforts and they in turn may share the same with the Vendors. We may allow selected third parties to use tracking technology on our Services, which will enable them to collect data about how you interact with our Services over time. This information may be used to, among other things, analyze &nbsp;and track &nbsp; data, &nbsp;determine &nbsp;the &nbsp; popularity of &nbsp;certain content &nbsp;and better &nbsp;understand online activity. We do not share, sell, rent, or trade any of your information with third parties for their promotional purposes.</span></p>\r\n<p style=\'margin-top:0in;margin-right:0in;margin-bottom:0in;margin-left:0in;line-height:normal;font-size:15px;font-family:\"Calibri\",sans-serif;\'><span style=\"font-size:13px;color:black;background:white;\">&nbsp;</span></p>\r\n<p style=\'margin-top:0in;margin-right:0in;margin-bottom:0in;margin-left:0in;line-height:normal;font-size:15px;font-family:\"Calibri\",sans-serif;\'><span style=\"font-size:13px;color:black;background:white;\">Business &nbsp; transfers. &nbsp;We &nbsp;may &nbsp; share &nbsp;or &nbsp;transfer &nbsp; your &nbsp;information &nbsp;in &nbsp;connection &nbsp;with, &nbsp; or &nbsp;during negotiations of, any merger, sale of company assets, financing, or acquisition of all or a portion of our business to another company.</span></p>\r\n<p style=\'margin-top:0in;margin-right:0in;margin-bottom:0in;margin-left:0in;line-height:normal;font-size:15px;font-family:\"Calibri\",sans-serif;\'><span style=\"font-size:13px;color:black;background:white;\">&nbsp;</span></p>\r\n<p style=\'margin-top:0in;margin-right:0in;margin-bottom:0in;margin-left:0in;line-height:normal;font-size:15px;font-family:\"Calibri\",sans-serif;\'><span style=\"font-size:13px;color:black;background:white;\">Affiliates. &nbsp;We may &nbsp; share your &nbsp;information with our &nbsp;affiliates, &nbsp;in which case we &nbsp;will &nbsp; require &nbsp;those affiliates to honor this privacy policy. Affiliates include our parent company and any subsidiaries, joint venture partners or other companies that we control or that are under common control with us.</span></p>\r\n<p style=\'margin-top:0in;margin-right:0in;margin-bottom:0in;margin-left:0in;line-height:normal;font-size:15px;font-family:\"Calibri\",sans-serif;\'><span style=\"font-size:13px;color:black;background:white;\">&nbsp;</span></p>\r\n<p style=\'margin-top:0in;margin-right:0in;margin-bottom:0in;margin-left:0in;line-height:normal;font-size:15px;font-family:\"Calibri\",sans-serif;\'><span style=\"font-size:13px;color:black;background:white;\">Business partners. We may share your information with our business partners to offer you certain products, services, or promotions.</span></p>\r\n<p style=\'margin-top:0in;margin-right:0in;margin-bottom:0in;margin-left:0in;line-height:normal;font-size:15px;font-family:\"Calibri\",sans-serif;\'><span style=\"font-size:13px;color:black;background:white;\">&nbsp;<br> <strong>4.&nbsp;Use&nbsp;of&nbsp;Cookies&nbsp;and&nbsp;Other&nbsp;Tracking&nbsp;Technologies</strong><br> <br>&nbsp;We may use cookies and other tracking technologies to collect and store your information.</span></p>\r\n<p style=\'margin-top:0in;margin-right:0in;margin-bottom:0in;margin-left:0in;line-height:normal;font-size:15px;font-family:\"Calibri\",sans-serif;\'><span style=\"font-size:13px;color:black;background:white;\">&nbsp;</span></p>\r\n<p style=\'margin-top:0in;margin-right:0in;margin-bottom:0in;margin-left:0in;line-height:normal;font-size:15px;font-family:\"Calibri\",sans-serif;\'><span style=\"font-size:13px;color:black;background:white;\">We may use cookies and similar tracking technologies (like web beacons and pixels) to access or store information. <strong>Specific information about how we use such technologies and how you can assert your right to opt out of certain cookies is available by contacting us.</strong></span></p>\r\n<p style=\'margin-top:0in;margin-right:0in;margin-bottom:0in;margin-left:0in;line-height:normal;font-size:15px;font-family:\"Calibri\",sans-serif;\'><span style=\"font-size:13px;color:black;background:white;\">&nbsp;<br> <strong>5.&nbsp;How&nbsp;Long&nbsp;We&nbsp;Keep&nbsp;Your&nbsp;Information</strong><br> <br>&nbsp;We keep your information for as long as necessary to fulfill the purposes outlined in this Privacy Policy unless otherwise required by law.</span></p>\r\n<p style=\'margin-top:0in;margin-right:0in;margin-bottom:0in;margin-left:0in;line-height:normal;font-size:15px;font-family:\"Calibri\",sans-serif;\'><span style=\"font-size:13px;color:black;background:white;\">&nbsp;</span></p>\r\n<p style=\'margin-top:0in;margin-right:0in;margin-bottom:0in;margin-left:0in;line-height:normal;font-size:15px;font-family:\"Calibri\",sans-serif;\'><span style=\"font-size:13px;color:black;background:white;\">We will only keep your personal information for as long as it is necessary for the purposes set out in this Privacy Policy, unless a longer retention period is required or permitted by law (such as tax, accounting, or other legal requirements).</span></p>\r\n<p style=\'margin-top:0in;margin-right:0in;margin-bottom:0in;margin-left:0in;line-height:normal;font-size:15px;font-family:\"Calibri\",sans-serif;\'><span style=\"font-size:13px;color:black;background:white;\">&nbsp;<br> <strong>6.&nbsp;How&nbsp;We&nbsp;Keep&nbsp;Your&nbsp;Information&nbsp;Safe</strong><br> <br>&nbsp;We have implemented reasonable security measures designed to protect the security of any personal information we process. However, please also remember that we cannot guarantee that the internet itself is secure. Although we will do our best to protect your personal information in accordance with the terms set forth herein, personal information sent through the internet comes with some amount of inherent risk of which you should be aware. Also ensure that you are not disclosing your details on our platforms with anyone except where the application needs to be filed.</span></p>\r\n<p style=\'margin-top:0in;margin-right:0in;margin-bottom:0in;margin-left:0in;line-height:normal;font-size:15px;font-family:\"Calibri\",sans-serif;\'><span style=\"font-size:13px;color:black;background:white;\">&nbsp;</span></p>\r\n<p style=\'margin-top:0in;margin-right:0in;margin-bottom:0in;margin-left:0in;line-height:normal;font-size:15px;font-family:\"Calibri\",sans-serif;\'><strong><span style=\"font-size:13px;color:black;background:white;\">7.&nbsp;Whether&nbsp;We&nbsp;Collect&nbsp;Information&nbsp;from&nbsp;Minors</span></strong><span style=\"font-size:13px;color:black;background:white;\"><br> <br>&nbsp;We do not knowingly solicit or collect data from or market to children under 18 years of age. We do not knowingly solicit data from or market to children under 18 years of age. By using the Services, you represent that you are at least 18 years of age or that you are the parent or guardian of such a minor and consent to such minor&#39;s use of the Services. The content of our Website and our Services is not directed at children under the age of 18. If we learn or are notified that we have collected personal information from a child under the age of 18, we will deactivate the account and take reasonable measures to promptly delete such data from our records. If you believe that we might have any information from a child under 18, please let us know by contacting us at support@PPPGuides.com.</span></p>\r\n<p style=\'margin-top:0in;margin-right:0in;margin-bottom:0in;margin-left:0in;line-height:normal;font-size:15px;font-family:\"Calibri\",sans-serif;\'><span style=\"font-size:13px;color:black;background:white;\"><br> <strong>8.&nbsp;Your&nbsp;Right&nbsp;to&nbsp;Opt-Out&nbsp;and/or&nbsp;Terminate</strong><br> <br>&nbsp;You may review, change, or terminate your account any time.</span></p>\r\n<p style=\'margin-top:0in;margin-right:0in;margin-bottom:0in;margin-left:0in;line-height:normal;font-size:15px;font-family:\"Calibri\",sans-serif;\'><span style=\"font-size:13px;color:black;background:white;\">&nbsp;</span></p>\r\n<p style=\'margin-top:0in;margin-right:0in;margin-bottom:0in;margin-left:0in;line-height:normal;font-size:15px;font-family:\"Calibri\",sans-serif;\'><u><span style=\"font-size:13px;color:black;background:white;\">Account information</span></u><span style=\"font-size:13px;color:black;background:white;\">. If you would at any time like to review or change the information in your account or terminate your account, you can:</span></p>\r\n<p style=\'margin-top:0in;margin-right:0in;margin-bottom:0in;margin-left:0in;line-height:normal;font-size:15px;font-family:\"Calibri\",sans-serif;\'><span style=\"font-size:13px;color:black;background:white;\">&bull;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; Log into your account settings and update your user account, or contact us</span></p>\r\n<p style=\'margin-top:0in;margin-right:0in;margin-bottom:0in;margin-left:0in;line-height:normal;font-size:15px;font-family:\"Calibri\",sans-serif;\'><span style=\"font-size:13px;color:black;background:white;\">&bull;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; Contact us using the contact information provided or via our website.</span></p>\r\n<p style=\'margin-top:0in;margin-right:0in;margin-bottom:0in;margin-left:0in;line-height:normal;font-size:15px;font-family:\"Calibri\",sans-serif;\'><span style=\"font-size:13px;color:black;background:white;\">Upon &nbsp; your &nbsp;request &nbsp;to &nbsp; terminate &nbsp;your &nbsp;account, &nbsp; we &nbsp;will &nbsp;deactivate &nbsp; or &nbsp;delete &nbsp;your &nbsp; account &nbsp;and information from our active databases. However, some information may be retained in our files to prevent fraud, troubleshoot problems, service your account, assist with investigations, enforce our Terms of Service and/or comply with legal requirements.</span></p>\r\n<p style=\'margin-top:0in;margin-right:0in;margin-bottom:0in;margin-left:0in;line-height:normal;font-size:15px;font-family:\"Calibri\",sans-serif;\'><span style=\"font-size:13px;color:black;background:white;\">&nbsp;</span></p>\r\n<p style=\'margin-top:0in;margin-right:0in;margin-bottom:0in;margin-left:0in;line-height:normal;font-size:15px;font-family:\"Calibri\",sans-serif;\'><u><span style=\"font-size:13px;color:black;background:white;\">Cookies and similar technologies</span></u><span style=\"font-size:13px;color:black;background:white;\">. Most Web browsers are set to accept cookies by default. If you prefer, you can usually choose to set your browser to remove cookies and to reject cookies. If you choose to remove cookies or reject cookies, this could affect certain features or services of our Services.</span></p>\r\n<p style=\'margin-top:0in;margin-right:0in;margin-bottom:0in;margin-left:0in;line-height:normal;font-size:15px;font-family:\"Calibri\",sans-serif;text-align:justify;\'><span style=\"font-size:13px;color:black;background:white;\"><br> <strong>9. Controls for Do-Not-Track Features</strong></span></p>\r\n<p style=\'margin-top:0in;margin-right:0in;margin-bottom:0in;margin-left:0in;line-height:normal;font-size:15px;font-family:\"Calibri\",sans-serif;text-align:justify;\'><span style=\"font-size:13px;color:black;background:white;\">&nbsp;<br>&nbsp;Several web browsers and some mobile operating systems and mobile applications include a &ldquo;Do Not Track&rdquo; (DNT) feature or setting you can activate to signal your privacy preference not to have data about your &nbsp;online &nbsp; browsing &nbsp;activities &nbsp;monitored &nbsp; and &nbsp;collected. &nbsp;No &nbsp; uniform &nbsp;technology &nbsp;standard &nbsp; for recognizing and implementing DNT signals has been finalized. As such, we do not currently respond to DNT browser signals or any other mechanism that automatically communicates your choice not to be tracked online. If a standard for online tracking is adopted that we must follow in the future, we will inform you about that practice in a revised version of this Privacy Policy.</span></p>\r\n<p style=\'margin-top:0in;margin-right:0in;margin-bottom:0in;margin-left:0in;line-height:normal;font-size:15px;font-family:\"Calibri\",sans-serif;text-align:justify;\'><span style=\"font-size:13px;color:black;background:white;\"><br> <br> <strong>10. &nbsp; Rights Under Federal Privacy Laws</strong></span></p>\r\n<p style=\'margin-top:0in;margin-right:0in;margin-bottom:0in;margin-left:0in;line-height:normal;font-size:15px;font-family:\"Calibri\",sans-serif;text-align:justify;\'><span style=\"font-size:13px;color:black;background:white;\">&nbsp;<br>&nbsp;You also have certain rights regarding disclosure of financial and/or personal information under federal privacy laws such as the Gramm-Leach-Bliley Act (&quot;GLBA&quot;), the Fair Credit Reporting Act (&quot;FCRA&quot;) and the Health Insurance Portability and Accountability Act (&quot;HIPAA&quot;).</span></p>\r\n<p style=\'margin-top:0in;margin-right:0in;margin-bottom:0in;margin-left:0in;line-height:normal;font-size:15px;font-family:\"Calibri\",sans-serif;text-align:justify;\'><span style=\"font-size:13px;color:black;background:white;\">&nbsp;</span></p>\r\n<p style=\'margin-top:0in;margin-right:0in;margin-bottom:0in;margin-left:0in;line-height:normal;font-size:15px;font-family:\"Calibri\",sans-serif;text-align:justify;\'><span style=\"font-size:13px;color:black;background:white;\">Personal Identifiers</span></p>\r\n<p style=\'margin-top:0in;margin-right:0in;margin-bottom:0in;margin-left:0in;line-height:normal;font-size:15px;font-family:\"Calibri\",sans-serif;text-align:justify;\'><span style=\"font-size:13px;color:black;background:white;\">&nbsp;We collect your name, phone number, and email address and contact information when you create an account or complete a transaction. We use this information to provide the Services, respond to your requests, and send information and advertisements to you.</span></p>\r\n<p style=\'margin-top:0in;margin-right:0in;margin-bottom:0in;margin-left:0in;line-height:normal;font-size:15px;font-family:\"Calibri\",sans-serif;text-align:justify;\'><span style=\"font-size:13px;color:black;background:white;\">&nbsp;</span></p>\r\n<p style=\'margin-top:0in;margin-right:0in;margin-bottom:0in;margin-left:0in;line-height:normal;font-size:15px;font-family:\"Calibri\",sans-serif;text-align:justify;\'><span style=\"font-size:13px;color:black;background:white;\">We collect payment information when you provide it to us, which may be your bank account, credit or debit card information, and you may store this information in your account to use for future payments, or to set up recurring transactions.</span></p>\r\n<p style=\'margin-top:0in;margin-right:0in;margin-bottom:0in;margin-left:0in;line-height:normal;font-size:15px;font-family:\"Calibri\",sans-serif;text-align:justify;\'><span style=\"font-size:13px;color:black;background:white;\">&nbsp;</span></p>\r\n<p style=\'margin-top:0in;margin-right:0in;margin-bottom:0in;margin-left:0in;line-height:normal;font-size:15px;font-family:\"Calibri\",sans-serif;text-align:justify;\'><span style=\"font-size:13px;color:black;background:white;\">We may collect your Social Security number or Driver&rsquo;s License number. We use this information to identify you, authenticate and collate information about you, prevent fraud, and conduct background checks or other screening activities. Social Security information is not shared.</span></p>\r\n<p style=\'margin-top:0in;margin-right:0in;margin-bottom:0in;margin-left:0in;line-height:normal;font-size:15px;font-family:\"Calibri\",sans-serif;text-align:justify;\'><span style=\"font-size:13px;color:black;background:white;\">&nbsp;</span></p>\r\n<p style=\'margin-top:0in;margin-right:0in;margin-bottom:0in;margin-left:0in;line-height:normal;font-size:15px;font-family:\"Calibri\",sans-serif;text-align:justify;\'><span style=\"font-size:13px;color:black;background:white;\">We collect your IP address automatically when you use our Services. We use this information to identify you, gauge online activity on our website, measure the effectiveness of online services, applications, and tools.</span></p>\r\n<p style=\'margin-top:0in;margin-right:0in;margin-bottom:0in;margin-left:0in;line-height:normal;font-size:15px;font-family:\"Calibri\",sans-serif;text-align:justify;\'><span style=\"font-size:13px;color:black;background:white;\">&nbsp;</span></p>\r\n<p style=\'margin-top:0in;margin-right:0in;margin-bottom:0in;margin-left:0in;line-height:normal;font-size:15px;font-family:\"Calibri\",sans-serif;text-align:justify;\'><span style=\"font-size:13px;color:black;background:white;\">We collect your Device ID automatically when you use our Services. We use this information to monitor your use, and the effectiveness of, our Services, and to identify you.</span></p>\r\n<p style=\'margin-top:0in;margin-right:0in;margin-bottom:0in;margin-left:0in;line-height:normal;font-size:15px;font-family:\"Calibri\",sans-serif;text-align:justify;\'><span style=\"font-size:13px;color:black;background:white;\">&nbsp;</span></p>\r\n<p style=\'margin-top:0in;margin-right:0in;margin-bottom:0in;margin-left:0in;line-height:normal;font-size:15px;font-family:\"Calibri\",sans-serif;text-align:justify;\'><u><span style=\"font-size:13px;color:black;background:white;\">Protected classifications</span></u><span style=\"font-size:13px;color:black;background:white;\">: We collect your age in order to comply with laws that restrict collection and disclosure of personal information belonging to minors.</span></p>\r\n<p style=\'margin-top:0in;margin-right:0in;margin-bottom:0in;margin-left:0in;line-height:normal;font-size:15px;font-family:\"Calibri\",sans-serif;text-align:justify;\'><span style=\"font-size:13px;color:black;background:white;\">&nbsp;</span></p>\r\n<p style=\'margin-top:0in;margin-right:0in;margin-bottom:0in;margin-left:0in;line-height:normal;font-size:15px;font-family:\"Calibri\",sans-serif;text-align:justify;\'><u><span style=\"font-size:13px;color:black;background:white;\">Internet or other electronic network activity information</span></u><span style=\"font-size:13px;color:black;background:white;\">: We collect information about your browsing history, &nbsp;search &nbsp;history, &nbsp; interaction with websites, and applications or advertisements automatically when you utilize our Services. We use this information to gauge online activity on our website, measure the effectiveness of online services, applications, and tools.</span></p>\r\n<p style=\'margin-top:0in;margin-right:0in;margin-bottom:0in;margin-left:0in;line-height:normal;font-size:15px;font-family:\"Calibri\",sans-serif;text-align:justify;\'><span style=\"font-size:13px;color:black;background:white;\">&nbsp;</span></p>\r\n<p style=\'margin-top:0in;margin-right:0in;margin-bottom:0in;margin-left:0in;line-height:normal;font-size:15px;font-family:\"Calibri\",sans-serif;text-align:justify;\'><u><span style=\"font-size:13px;color:black;background:white;\">Audio, electronic, visual, or similar information</span></u><span style=\"font-size:13px;color:black;background:white;\">: If you contact us by telephone, we may record the call. We will notify you if a call is being recorded at the beginning of the call. We may collect your photographic or video image, or similar information. We use this information to monitor our customer service, maintain the security of our systems and physical locations, and train employees.</span></p>\r\n<p style=\'margin-top:0in;margin-right:0in;margin-bottom:0in;margin-left:0in;line-height:normal;font-size:15px;font-family:\"Calibri\",sans-serif;text-align:justify;\'><span style=\"font-size:13px;color:black;background:white;\">&nbsp;</span></p>\r\n<p style=\'margin-top:0in;margin-right:0in;margin-bottom:0in;margin-left:0in;line-height:normal;font-size:15px;font-family:\"Calibri\",sans-serif;text-align:justify;\'><u><span style=\"font-size:13px;color:black;background:white;\">Professional or employment-related information</span></u><span style=\"font-size:13px;color:black;background:white;\">: We may collect information about your current employer and your employment history. We use this information to conduct background and other screening activities, and to promote our services to others.</span></p>\r\n<p style=\'margin-top:0in;margin-right:0in;margin-bottom:0in;margin-left:0in;line-height:normal;font-size:15px;font-family:\"Calibri\",sans-serif;text-align:justify;\'><span style=\"font-size:13px;color:black;background:white;\">&nbsp;</span></p>\r\n<p style=\'margin-top:0in;margin-right:0in;margin-bottom:0in;margin-left:0in;line-height:normal;font-size:15px;font-family:\"Calibri\",sans-serif;text-align:justify;\'><span style=\"font-size:13px;color:black;background:white;\">Inferences drawn to create a profile about a consumer reflecting the consumer&rsquo;s preferences or characteristics: &nbsp;We &nbsp;may &nbsp; analyze &nbsp;your &nbsp;actual &nbsp; or &nbsp;likely &nbsp;preferences &nbsp; through &nbsp;a &nbsp;series &nbsp; of &nbsp;computer processes. On some occasions, we may add our observations to your internal profile. We use this information to measure the appeal and effectiveness of our Services, applications, and tools.</span></p>\r\n<p style=\'margin-top:0in;margin-right:0in;margin-bottom:0in;margin-left:0in;line-height:normal;font-size:15px;font-family:\"Calibri\",sans-serif;text-align:justify;\'><span style=\"font-size:13px;background:white;\">&nbsp;</span></p>\r\n<p style=\'margin-top:0in;margin-right:0in;margin-bottom:0in;margin-left:0in;line-height:normal;font-size:15px;font-family:\"Calibri\",sans-serif;text-align:justify;\'><span style=\"font-size:13px;color:black;background:white;\">We may use any of these categories information listed above in this Privacy Policy for other business or operational purposes compatible with the context in which the Personal Information was collected.</span></p>\r\n<p style=\'margin-top:0in;margin-right:0in;margin-bottom:0in;margin-left:0in;line-height:normal;font-size:15px;font-family:\"Calibri\",sans-serif;text-align:justify;\'><span style=\"font-size:13px;color:black;background:white;\">&nbsp;</span></p>\r\n<p style=\'margin-top:0in;margin-right:0in;margin-bottom:0in;margin-left:0in;line-height:normal;font-size:15px;font-family:\"Calibri\",sans-serif;text-align:justify;\'><span style=\"font-size:13px;color:black;background:white;\">We may share any information listed above with our Service Providers engaged to conduct activities on our behalf. Service Providers are prohibited from using Personal Information for any purpose not related to our engagement with them. The categories of Service Providers we engage with are described in this Privacy Policy.</span></p>\r\n<p style=\'margin-top:0in;margin-right:0in;margin-bottom:0in;margin-left:0in;line-height:normal;font-size:15px;font-family:\"Calibri\",sans-serif;text-align:justify;\'><span style=\"font-size:13px;color:black;background:white;\">&nbsp;</span></p>\r\n<p style=\'margin-top:0in;margin-right:0in;margin-bottom:0in;margin-left:0in;line-height:normal;font-size:15px;font-family:\"Calibri\",sans-serif;text-align:justify;\'><span style=\"font-size:13px;color:black;background:white;\">Verification and Validation Procedures: To process your request to know about or to delete personal information, we must verify your request. To do this we may require the following:</span></p>\r\n<p style=\'margin-top:0in;margin-right:0in;margin-bottom:0in;margin-left:0in;line-height:normal;font-size:15px;font-family:\"Calibri\",sans-serif;text-align:justify;\'><span style=\"font-size:13px;color:black;background:white;\">&nbsp;</span></p>\r\n<p style=\'margin-top:0in;margin-right:0in;margin-bottom:0in;margin-left:0in;line-height:normal;font-size:15px;font-family:\"Calibri\",sans-serif;text-align:justify;\'><span style=\"font-size:13px;color:black;background:white;\">Requesting you to provide personal identifiers we can match against our information we have previously collected from you, and</span></p>\r\n<p style=\'margin-top:0in;margin-right:0in;margin-bottom:0in;margin-left:0in;line-height:normal;font-size:15px;font-family:\"Calibri\",sans-serif;text-align:justify;\'><span style=\"font-size:13px;color:black;background:white;\">&nbsp;</span></p>\r\n<p style=\'margin-top:0in;margin-right:0in;margin-bottom:0in;margin-left:0in;line-height:normal;font-size:15px;font-family:\"Calibri\",sans-serif;text-align:justify;\'><span style=\"font-size:13px;color:black;background:white;\">Asking for you to confirm your request using the email address or telephone number stated in your request.</span></p>\r\n<p style=\'margin-top:0in;margin-right:0in;margin-bottom:0in;margin-left:0in;line-height:normal;font-size:15px;font-family:\"Calibri\",sans-serif;text-align:justify;\'><span style=\"font-size:13px;color:black;background:white;\">&nbsp;</span></p>\r\n<p style=\'margin-top:0in;margin-right:0in;margin-bottom:0in;margin-left:0in;line-height:normal;font-size:15px;font-family:\"Calibri\",sans-serif;text-align:justify;\'><span style=\"font-size:13px;color:black;background:white;\">If you have authorized a third party to make requests on your behalf we may require that you provide a notarized statement confirming the identity and authority of that third party to request information on your behalf.</span></p>\r\n<p style=\'margin-top:0in;margin-right:0in;margin-bottom:0in;margin-left:0in;line-height:normal;font-size:15px;font-family:\"Calibri\",sans-serif;text-align:justify;\'><span style=\"font-size:13px;color:black;background:white;\"><br> <strong>11. &nbsp;Right to know about what personal information has been collected, disclosed, or sold.</strong></span></p>\r\n<p style=\'margin-top:0in;margin-right:0in;margin-bottom:0in;margin-left:0in;line-height:normal;font-size:15px;font-family:\"Calibri\",sans-serif;text-align:justify;\'><span style=\"font-size:13px;color:black;background:white;\">&nbsp;<br>&nbsp;You have the right to request Personal Information we collect, disclose, sell, or use. You also have the right to know the purposes for which we collect information, and the third parties and service providers with whom we may share it. To process your request we may ask you to take additional steps to verify your identity or validate your request.</span></p>\r\n<p style=\'margin-top:0in;margin-right:0in;margin-bottom:0in;margin-left:0in;line-height:normal;font-size:15px;font-family:\"Calibri\",sans-serif;text-align:justify;\'><span style=\"font-size:13px;color:black;background:white;\">&nbsp;<br> <strong>12. &nbsp;Right to request deletion of information</strong></span></p>\r\n<p style=\'margin-top:0in;margin-right:0in;margin-bottom:0in;margin-left:0in;line-height:normal;font-size:15px;font-family:\"Calibri\",sans-serif;text-align:justify;\'><span style=\"font-size:13px;color:black;background:white;\">&nbsp;<br>&nbsp;You have the right to request under certain circumstances that we delete any Personal Information that we collected directly from you. You may do so by filling out a form&nbsp;</span><a href=\"https://docs.google.com/forms/d/e/1FAIpQLScRRQxs3t_gg6zmoyn64YD7XtuyNdPESGJZVdrwgaL9ByS9Tg/viewform?vc=0&c=0&w=1&flr=0\"><span style=\"font-size:13px;background:white;\">at this link here</span></a><span style=\"font-size:13px;color:black;background:white;\">. We may have a reason under the law why we do not have to comply with &nbsp;your &nbsp; request, &nbsp;or &nbsp;why &nbsp;we &nbsp;may &nbsp; comply &nbsp;with &nbsp;it &nbsp; in &nbsp;a &nbsp;more &nbsp; limited &nbsp;way &nbsp;than &nbsp; you &nbsp;might &nbsp;have anticipated. If we do, we will explain that to you in our response to your request. To protect our consumers&rsquo; Personal Information we must verify your identity before we can act on your request.</span></p>\r\n<p style=\'margin-top:0in;margin-right:0in;margin-bottom:0in;margin-left:0in;line-height:normal;font-size:15px;font-family:\"Calibri\",sans-serif;text-align:justify;\'><span style=\"font-size:13px;color:black;background:white;\">&nbsp;<br> <strong>13. &nbsp;Right to opt out of sale of personal information to third parties</strong></span></p>\r\n<p style=\'margin-top:0in;margin-right:0in;margin-bottom:0in;margin-left:0in;line-height:normal;font-size:15px;font-family:\"Calibri\",sans-serif;text-align:justify;\'><span style=\"font-size:13px;color:black;background:white;\">&nbsp;<br>&nbsp;The law requires that we maintain a separate webpage and/or other readily available and accessible means to allow you to opt out of the use/sharing/sale of your Personal Information in the future, which can be accessed by visiting and submitting a form&nbsp;</span><a href=\"https://docs.google.com/forms/d/e/1FAIpQLScUFKduTEn-2SBnWJEqE6EdVn-J_hIddiVgyNmIjRYjsLT9NQ/viewform?usp=sf_link\"><span style=\"font-size:13px;background:white;\">at this link here</span></a><span style=\"font-size:13px;color:black;background:white;\">, or by calling us. Your request to opt out will not apply to our sharing of Personal Information with service providers engaged to perform a function on our behalf (e.g. our outsourced vendors and their staff providing specific function like service/support, software development, legal audits, accounting audits, marketing, data analytics, external software and services, website maintenance &nbsp;etc.). We may also disclose information to other entities when required by law, or to protect us or other persons as described in this Privacy Policy.</span></p>\r\n<p style=\'margin-top:0in;margin-right:0in;margin-bottom:0in;margin-left:0in;line-height:normal;font-size:15px;font-family:\"Calibri\",sans-serif;text-align:justify;\'><span style=\"font-size:13px;color:black;background:white;\"><br> <strong>14. &nbsp;Right to non-discrimination for exercising your privacy rights</strong></span></p>\r\n<p style=\'margin-top:0in;margin-right:0in;margin-bottom:0in;margin-left:0in;line-height:normal;font-size:15px;font-family:\"Calibri\",sans-serif;text-align:justify;\'><span style=\"font-size:13px;color:black;background:white;\">&nbsp;<br>&nbsp;We are prohibited from discriminating against you for exercising your privacy rights. This means that if you submit a valid request as described in this Privacy Policy, we may not provide any differing service to you than if you had not exercised your rights.</span></p>\r\n<p style=\'margin-top:0in;margin-right:0in;margin-bottom:0in;margin-left:0in;line-height:normal;font-size:15px;font-family:\"Calibri\",sans-serif;text-align:justify;\'><span style=\"font-size:13px;color:black;background:white;\">&nbsp;</span></p>\r\n<p style=\'margin-top:0in;margin-right:0in;margin-bottom:0in;margin-left:0in;line-height:normal;font-size:15px;font-family:\"Calibri\",sans-serif;text-align:justify;\'><span style=\"font-size:13px;color:black;background:white;\">How to submit a request: You may submit a request to exercise your rights by contacting us through the following channels: our website or by calling us.</span></p>\r\n<p style=\'margin-top:0in;margin-right:0in;margin-bottom:0in;margin-left:0in;line-height:normal;font-size:15px;font-family:\"Calibri\",sans-serif;text-align:justify;\'><span style=\"font-size:13px;color:black;background:white;\">&nbsp;</span></p>\r\n<p style=\'margin-top:0in;margin-right:0in;margin-bottom:0in;margin-left:0in;line-height:normal;font-size:15px;font-family:\"Calibri\",sans-serif;text-align:justify;\'><span style=\"font-size:13px;color:black;background:white;\">Authorized agent: You may authorize another individual or business registered with the Secretary of State to make a request on &nbsp; your &nbsp;behalf. &nbsp;We will require &nbsp;that &nbsp; the &nbsp;individual &nbsp;authorizing &nbsp; another &nbsp;submit &nbsp;a notarized affidavit to verify the identity of the authorized agent and confirm you have authorized them to act on your behalf.</span></p>\r\n<p style=\'margin-top:0in;margin-right:0in;margin-bottom:0in;margin-left:0in;line-height:normal;font-size:15px;font-family:\"Calibri\",sans-serif;text-align:justify;\'><span style=\"font-size:13px;color:black;background:white;\">&nbsp;</span></p>\r\n<p style=\'margin-top:0in;margin-right:0in;margin-bottom:0in;margin-left:0in;line-height:normal;font-size:15px;font-family:\"Calibri\",sans-serif;text-align:justify;\'><strong><span style=\"font-size:13px;color:black;background:white;\">15. Other Required Notices</span></strong></p>\r\n<p style=\'margin-top:0in;margin-right:0in;margin-bottom:0in;margin-left:0in;line-height:normal;font-size:15px;font-family:\"Calibri\",sans-serif;text-align:justify;\'><span style=\"font-size:13px;color:black;background:white;\">&nbsp;</span></p>\r\n<p style=\'margin-top:0in;margin-right:0in;margin-bottom:0in;margin-left:0in;line-height:normal;font-size:15px;font-family:\"Calibri\",sans-serif;text-align:justify;\'><span style=\"font-size:13px;color:black;background:white;\">If you reside outside of the United States, your information may be transferred to, and processed and stored in, the United States or other jurisdictions in accordance with applicable law in that jurisdiction. We do not store data outside of the United States. Upon termination or deactivation of your PPPGuides Account (as defined in the Terms of Service), we may retain your information for backup, archival or audit purposes.</span></p>\r\n<p style=\'margin-top:0in;margin-right:0in;margin-bottom:0in;margin-left:0in;line-height:normal;font-size:15px;font-family:\"Calibri\",sans-serif;text-align:justify;\'><span style=\"font-size:13px;color:black;background:white;\">&nbsp;</span></p>\r\n<p style=\'margin-top:0in;margin-right:0in;margin-bottom:0in;margin-left:0in;line-height:normal;font-size:15px;font-family:\"Calibri\",sans-serif;text-align:justify;\'><strong><span style=\"font-size:13px;color:black;background:white;\">16. How to Update Your Info</span></strong></p>\r\n<p style=\'margin-top:0in;margin-right:0in;margin-bottom:0in;margin-left:0in;line-height:normal;font-size:15px;font-family:\"Calibri\",sans-serif;text-align:justify;\'><span style=\"font-size:13px;color:black;background:white;\">&nbsp;</span></p>\r\n<p style=\'margin-top:0in;margin-right:0in;margin-bottom:0in;margin-left:0in;line-height:normal;font-size:15px;font-family:\"Calibri\",sans-serif;text-align:justify;\'><span style=\"font-size:13px;color:black;background:white;\">While using our application, it&#39;s important that you keep your contact information up to date (Company&rsquo;s Primary Contact). You can review and edit your contact information at any time by logging in to your account. If you need to change any other account information, please call us.</span></p>\r\n<p style=\'margin-top:0in;margin-right:0in;margin-bottom:0in;margin-left:0in;line-height:normal;font-size:15px;font-family:\"Calibri\",sans-serif;text-align:justify;\'><span style=\"font-size:13px;color:black;background:white;\">&nbsp;</span></p>\r\n<p style=\'margin-top:0in;margin-right:0in;margin-bottom:0in;margin-left:0in;line-height:normal;font-size:15px;font-family:\"Calibri\",sans-serif;text-align:justify;\'><strong><span style=\"font-size:13px;color:black;background:white;\">17. Notification Preferences</span></strong></p>\r\n<p style=\'margin-top:0in;margin-right:0in;margin-bottom:0in;margin-left:0in;line-height:normal;font-size:15px;font-family:\"Calibri\",sans-serif;text-align:justify;\'><span style=\"font-size:13px;color:black;background:white;\">&nbsp;</span></p>\r\n<p style=\'margin-top:0in;margin-right:0in;margin-bottom:0in;margin-left:0in;line-height:normal;font-size:15px;font-family:\"Calibri\",sans-serif;text-align:justify;\'><span style=\"font-size:13px;color:black;background:white;\">You can review and adjust your notification preferences by logging in to your account or by emailing us.</span></p>\r\n<p style=\'margin-top:0in;margin-right:0in;margin-bottom:0in;margin-left:0in;line-height:normal;font-size:15px;font-family:\"Calibri\",sans-serif;text-align:justify;\'><span style=\"font-size:13px;color:black;background:white;\">&nbsp;</span></p>\r\n<p style=\'margin-top:0in;margin-right:0in;margin-bottom:0in;margin-left:0in;line-height:normal;font-size:15px;font-family:\"Calibri\",sans-serif;text-align:justify;\'><strong><span style=\"font-size:13px;color:black;background:white;\">18. Updates to this Privacy Policy</span></strong></p>\r\n<p style=\'margin-top:0in;margin-right:0in;margin-bottom:0in;margin-left:0in;line-height:normal;font-size:15px;font-family:\"Calibri\",sans-serif;text-align:justify;\'><span style=\"font-size:13px;color:black;background:white;\">&nbsp;</span></p>\r\n<p style=\'margin-top:0in;margin-right:0in;margin-bottom:0in;margin-left:0in;line-height:normal;font-size:15px;font-family:\"Calibri\",sans-serif;text-align:justify;\'><span style=\"font-size:13px;color:black;background:white;\">This Privacy Policy is effective as of the date above. We may update this Privacy Policy from time to time. We will post any changes to the Privacy Policy on our Website. Your use of our Website and/or our Services following any update to the Privacy Policy means that you accept the updated policy.</span></p>\r\n<p style=\'margin-top:0in;margin-right:0in;margin-bottom:0in;margin-left:0in;line-height:normal;font-size:15px;font-family:\"Calibri\",sans-serif;text-align:justify;\'><span style=\"font-size:13px;color:black;background:white;\">&nbsp;</span></p>\r\n<p style=\'margin-top:0in;margin-right:0in;margin-bottom:0in;margin-left:0in;line-height:normal;font-size:15px;font-family:\"Calibri\",sans-serif;text-align:justify;\'><strong><span style=\"font-size:13px;color:black;background:white;\">19. Contacting Us About This Policy</span></strong></p>\r\n<p style=\'margin-top:0in;margin-right:0in;margin-bottom:0in;margin-left:0in;line-height:normal;font-size:15px;font-family:\"Calibri\",sans-serif;text-align:justify;\'><span style=\"font-size:13px;color:black;background:white;\">&nbsp;</span></p>\r\n<p style=\'margin-top:0in;margin-right:0in;margin-bottom:0in;margin-left:0in;line-height:normal;font-size:15px;font-family:\"Calibri\",sans-serif;text-align:justify;\'><span style=\"font-size:13px;color:black;background:white;\">If you have any questions, comments or suggestions for us, please let us know. You can visit our Help Center, contact us by email, or by phone. You may find our contact information after logging into your account, or on our website.</span></p>');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activitytable`
--
ALTER TABLE `activitytable`
  ADD PRIMARY KEY (`activity_id`);

--
-- Indexes for table `companytable`
--
ALTER TABLE `companytable`
  ADD PRIMARY KEY (`cust_id`);

--
-- Indexes for table `custominvoicetable`
--
ALTER TABLE `custominvoicetable`
  ADD PRIMARY KEY (`invoice_id`);

--
-- Indexes for table `filestable`
--
ALTER TABLE `filestable`
  ADD PRIMARY KEY (`file_id`);

--
-- Indexes for table `loantable`
--
ALTER TABLE `loantable`
  ADD PRIMARY KEY (`cust_id`);

--
-- Indexes for table `nonpayrolltable`
--
ALTER TABLE `nonpayrolltable`
  ADD PRIMARY KEY (`nonpayroll_id`);

--
-- Indexes for table `ownertable`
--
ALTER TABLE `ownertable`
  ADD PRIMARY KEY (`cust_id`);

--
-- Indexes for table `paymenttable`
--
ALTER TABLE `paymenttable`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payrolltable`
--
ALTER TABLE `payrolltable`
  ADD PRIMARY KEY (`payroll_id`);

--
-- Indexes for table `pay_imp_employees_info`
--
ALTER TABLE `pay_imp_employees_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pay_imp_import_record`
--
ALTER TABLE `pay_imp_import_record`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pay_imp_ownerpayrollsummary`
--
ALTER TABLE `pay_imp_ownerpayrollsummary`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pay_imp_payroll_info`
--
ALTER TABLE `pay_imp_payroll_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pay_imp_schemployeestable`
--
ALTER TABLE `pay_imp_schemployeestable`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `priceplantable`
--
ALTER TABLE `priceplantable`
  ADD PRIMARY KEY (`plan_id`);

--
-- Indexes for table `promocodestable`
--
ALTER TABLE `promocodestable`
  ADD PRIMARY KEY (`promo_id`);

--
-- Indexes for table `salestable`
--
ALTER TABLE `salestable`
  ADD PRIMARY KEY (`reference_id`,`sales_id`);

--
-- Indexes for table `scheduleatable`
--
ALTER TABLE `scheduleatable`
  ADD PRIMARY KEY (`schedule_id`);

--
-- Indexes for table `statustable`
--
ALTER TABLE `statustable`
  ADD PRIMARY KEY (`cust_id`);

--
-- Indexes for table `supportquestionstable`
--
ALTER TABLE `supportquestionstable`
  ADD PRIMARY KEY (`q_no`);

--
-- Indexes for table `usertable`
--
ALTER TABLE `usertable`
  ADD PRIMARY KEY (`cust_id`);

--
-- Indexes for table `wholesalertable`
--
ALTER TABLE `wholesalertable`
  ADD PRIMARY KEY (`fk_wholesaler_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activitytable`
--
ALTER TABLE `activitytable`
  MODIFY `activity_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=698;

--
-- AUTO_INCREMENT for table `custominvoicetable`
--
ALTER TABLE `custominvoicetable`
  MODIFY `invoice_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `filestable`
--
ALTER TABLE `filestable`
  MODIFY `file_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `nonpayrolltable`
--
ALTER TABLE `nonpayrolltable`
  MODIFY `nonpayroll_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;

--
-- AUTO_INCREMENT for table `paymenttable`
--
ALTER TABLE `paymenttable`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `payrolltable`
--
ALTER TABLE `payrolltable`
  MODIFY `payroll_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT for table `pay_imp_employees_info`
--
ALTER TABLE `pay_imp_employees_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1268;

--
-- AUTO_INCREMENT for table `pay_imp_import_record`
--
ALTER TABLE `pay_imp_import_record`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=98;

--
-- AUTO_INCREMENT for table `pay_imp_ownerpayrollsummary`
--
ALTER TABLE `pay_imp_ownerpayrollsummary`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `pay_imp_payroll_info`
--
ALTER TABLE `pay_imp_payroll_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13915;

--
-- AUTO_INCREMENT for table `pay_imp_schemployeestable`
--
ALTER TABLE `pay_imp_schemployeestable`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1324;

--
-- AUTO_INCREMENT for table `priceplantable`
--
ALTER TABLE `priceplantable`
  MODIFY `plan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `promocodestable`
--
ALTER TABLE `promocodestable`
  MODIFY `promo_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `scheduleatable`
--
ALTER TABLE `scheduleatable`
  MODIFY `schedule_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `supportquestionstable`
--
ALTER TABLE `supportquestionstable`
  MODIFY `q_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `usertable`
--
ALTER TABLE `usertable`
  MODIFY `cust_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1021;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
