-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 03-Set-2019 às 13:39
-- Versão do servidor: 10.1.38-MariaDB
-- versão do PHP: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pv`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `conversa`
--

CREATE TABLE `conversa` (
  `id_conv` int(11) NOT NULL,
  `nick1` varchar(60) DEFAULT NULL,
  `nick2` varchar(60) DEFAULT NULL,
  `id1` int(11) NOT NULL,
  `id2` int(11) NOT NULL,
  `online` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `conversa`
--

INSERT INTO `conversa` (`id_conv`, `nick1`, `nick2`, `id1`, `id2`, `online`) VALUES
(5, 'Vi', 'La', 2, 1, 0),
(6, 'aa', 'bb', 2, 1, 0),
(7, 'oi', 'oi', 2, 1, 0),
(8, 'laura', 'mari', 2, 1, 0),
(9, 'cobrinha', 'luccas', 2, 1, 0),
(10, 'bb', 'aa', 2, 1, 0),
(11, 'a', 'a', 2, 1, 0),
(12, 'Atum', 'Pamonha', 2, 1, 0),
(13, 'oi', 'Oi', 2, 1, 0),
(14, 'Erina', 'JoJo', 1, 4, 0),
(15, 'aa', 'aa', 1, 2, 0),
(16, 'vick', 'laura', 2, 1, 0),
(17, 'Lau', 'mari', 1, 5, 0),
(18, 'Jaq', 'MARI', 3, 5, 0),
(19, 'jAQ', 'mari', 3, 5, 0),
(20, 'jAQ', 'luccas', 3, 6, 0),
(21, 'OLAAA', NULL, 1, 6, 0),
(22, 'Lau2', NULL, 4, 6, 0),
(23, 'Lau2', 'luccas', 4, 6, 0),
(24, 'oizÃ£o', 'mari', 3, 5, 0),
(25, 'oi', 'aaa', 1, 3, 0),
(26, 'Bolinho', 'arroz', 7, 1, 0),
(27, 'oi', 'oi', 1, 2, 0),
(28, 'oi', 'oi', 1, 2, 0),
(29, 'a', 'la', 3, 1, 0),
(30, 'aa', 'po', 3, 1, 0),
(31, 'aaa', 'laura', 3, 1, 0),
(32, 'aaa', 'lau', 3, 1, 0),
(33, 'a', 'lau', 3, 1, 0),
(34, 'a', 'lau', 3, 1, 0),
(35, 'aaa', 'lau', 3, 1, 0),
(36, 'a', 'lau', 3, 1, 0),
(37, 'La', 'mari', 1, 8, 0),
(38, 'vick', 'Jaq', 2, 7, 0),
(39, 'mari', 'vick', 8, 2, 0),
(40, 'Jaq', 'oi', 7, 1, 0),
(41, 'luc', 'mari', 6, 8, 0),
(42, 'luc', 'mari', 6, 8, 0),
(43, 'ai sabe cansei', 'mar', 6, 8, 0),
(44, 'lau', 'aaaa', 1, 8, 0),
(45, 'vi', 'la', 3, 1, 0),
(46, 'utabs triste', 'utabs', 3, 1, 0),
(47, 'utabs triste', 'utabs', 3, 1, 0),
(48, 'lau', 'aaa', 1, 3, 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `denuncias`
--

CREATE TABLE `denuncias` (
  `id_denun` int(11) NOT NULL,
  `id_conv` int(11) NOT NULL,
  `id_denunciado` int(11) NOT NULL,
  `descricao` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `denuncias`
--

INSERT INTO `denuncias` (`id_denun`, `id_conv`, `id_denunciado`, `descricao`) VALUES
(12, 48, 3, 'heeeeeee'),
(13, 48, 1, 'okkkk');

-- --------------------------------------------------------

--
-- Estrutura da tabela `mensagens`
--

CREATE TABLE `mensagens` (
  `id_msg` int(11) NOT NULL,
  `texto` text NOT NULL,
  `dt_hr` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `id_conv` int(11) NOT NULL,
  `id_remetente` int(11) NOT NULL,
  `nick_remetente` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `mensagens`
--

INSERT INTO `mensagens` (`id_msg`, `texto`, `dt_hr`, `id_conv`, `id_remetente`, `nick_remetente`) VALUES
(1, 'aaaa', '2019-07-24 11:45:26', 8, 0, 'mari'),
(2, 'aaaa', '2019-07-24 11:45:26', 0, 0, 'mari'),
(3, 'aaaa', '2019-07-24 11:47:47', 0, 0, 'mari'),
(4, 'aaaa', '2019-07-24 11:47:47', 0, 0, 'mari'),
(5, 'aaa', '2019-07-24 11:48:10', 0, 0, 'mari'),
(6, 'aaa', '2019-07-24 11:48:10', 0, 0, 'mari'),
(7, 'aa', '2019-07-24 11:48:24', 0, 0, 'mari'),
(8, 'aa', '2019-07-24 11:48:25', 0, 0, 'mari'),
(9, 'oi', '2019-07-24 12:00:47', 8, 0, 'mari'),
(10, 'oi', '2019-07-24 12:00:47', 8, 0, 'mari'),
(11, 'oi', '2019-07-24 12:01:00', 8, 0, 'laura'),
(12, 'oi', '2019-07-24 12:01:01', 8, 0, 'laura'),
(13, 'oi', '2019-07-24 13:43:01', 9, 0, 'luccas'),
(14, 'oi', '2019-07-24 13:43:01', 9, 0, 'luccas'),
(15, 'oi', '2019-07-24 13:43:13', 9, 0, 'cobrinha'),
(16, 'oi', '2019-07-24 13:43:13', 9, 0, 'cobrinha'),
(17, 'a', '2019-07-24 13:55:44', 9, 0, 'luccas'),
(18, 'a', '2019-07-24 13:55:44', 9, 0, 'luccas'),
(19, 'a', '2019-07-24 13:55:52', 9, 0, 'luccas'),
(20, 'a', '2019-07-24 13:55:52', 9, 0, 'luccas'),
(21, 'o', '2019-07-24 13:55:57', 9, 0, 'luccas'),
(22, 'o', '2019-07-24 13:55:57', 9, 0, 'luccas'),
(23, 'a', '2019-07-24 13:57:49', 9, 0, 'luccas'),
(24, 'a', '2019-07-24 13:57:51', 9, 0, 'luccas'),
(25, 'a', '2019-07-24 13:57:51', 9, 0, 'luccas'),
(26, 'a', '2019-07-24 13:57:53', 9, 0, 'luccas'),
(27, 'a', '2019-07-24 13:57:53', 9, 0, 'luccas'),
(28, 'a', '2019-07-24 13:57:53', 9, 0, 'luccas'),
(29, '', '2019-07-24 13:57:54', 9, 0, 'luccas'),
(30, '', '2019-07-24 13:57:54', 9, 0, 'luccas'),
(31, '', '2019-07-24 13:57:54', 9, 0, 'luccas'),
(32, '', '2019-07-24 13:57:54', 9, 0, 'luccas'),
(33, 'o', '2019-07-24 13:57:57', 9, 0, 'luccas'),
(34, 'o', '2019-07-24 13:57:57', 9, 0, 'luccas'),
(35, 'o', '2019-07-24 13:57:57', 9, 0, 'luccas'),
(36, 'o', '2019-07-24 13:57:57', 9, 0, 'luccas'),
(37, 'o', '2019-07-24 13:57:57', 9, 0, 'luccas'),
(38, 'i', '2019-07-24 13:58:08', 9, 0, 'luccas'),
(39, 'i', '2019-07-24 13:58:08', 9, 0, 'luccas'),
(40, 'i', '2019-07-24 13:58:08', 9, 0, 'luccas'),
(41, 'i', '2019-07-24 13:58:08', 9, 0, 'luccas'),
(42, 'i', '2019-07-24 13:58:08', 9, 0, 'luccas'),
(43, 'i', '2019-07-24 13:58:08', 9, 0, 'luccas'),
(44, 'k', '2019-07-24 13:58:55', 9, 0, 'luccas'),
(45, 'k', '2019-07-24 13:58:55', 9, 0, 'luccas'),
(46, 'k', '2019-07-24 13:58:58', 9, 0, 'luccas'),
(47, 'k', '2019-07-24 13:58:58', 9, 0, 'luccas'),
(48, 'll', '2019-07-24 13:59:02', 9, 0, 'luccas'),
(49, 'll', '2019-07-24 13:59:02', 9, 0, 'luccas'),
(50, '', '2019-07-24 13:59:03', 9, 0, 'luccas'),
(51, '', '2019-07-24 13:59:03', 9, 0, 'luccas'),
(52, '', '2019-07-24 13:59:03', 9, 0, 'luccas'),
(53, '', '2019-07-24 13:59:03', 9, 0, 'luccas'),
(54, 'a', '2019-07-24 14:00:02', 9, 0, 'luccas'),
(55, 'a', '2019-07-24 14:00:04', 9, 0, 'luccas'),
(56, 'a', '2019-07-24 14:00:04', 9, 0, 'luccas'),
(57, 'a', '2019-07-24 14:00:06', 9, 0, 'luccas'),
(58, 'a', '2019-07-24 14:00:06', 9, 0, 'luccas'),
(59, 'a', '2019-07-24 14:00:06', 9, 0, 'luccas'),
(60, 'a', '2019-07-24 14:00:08', 9, 0, 'luccas'),
(61, 'a', '2019-07-24 14:00:08', 9, 0, 'luccas'),
(62, 'a', '2019-07-24 14:00:08', 9, 0, 'luccas'),
(63, 'a', '2019-07-24 14:00:08', 9, 0, 'luccas'),
(64, 'b', '2019-07-24 14:00:21', 9, 0, 'luccas'),
(65, 'b', '2019-07-24 14:00:21', 9, 0, 'luccas'),
(66, '', '2019-07-24 14:00:21', 9, 0, 'luccas'),
(67, '', '2019-07-24 14:00:21', 9, 0, 'luccas'),
(68, 'oi', '2019-07-24 14:02:47', 9, 0, 'cobrinha'),
(69, 'oi', '2019-07-24 14:02:47', 9, 0, 'cobrinha'),
(70, 'a', '2019-07-24 14:14:54', 9, 0, 'luccas'),
(71, 'a', '2019-07-24 14:14:54', 9, 0, 'luccas'),
(72, 'a', '2019-07-24 14:15:13', 9, 0, 'luccas'),
(73, 'a', '2019-07-24 14:15:13', 9, 0, 'luccas'),
(74, 'b', '2019-07-24 14:24:32', 9, 0, 'luccas'),
(75, 'b', '2019-07-24 14:24:33', 9, 0, 'luccas'),
(76, 'aa', '2019-07-24 14:24:35', 9, 0, 'luccas'),
(77, 'aa', '2019-07-24 14:24:35', 9, 0, 'luccas'),
(78, 'c', '2019-07-24 14:26:27', 9, 0, 'luccas'),
(79, 'c', '2019-07-24 14:26:28', 9, 0, 'luccas'),
(80, 'c', '2019-07-24 14:26:30', 9, 0, 'luccas'),
(81, '', '2019-07-24 14:26:31', 9, 0, 'luccas'),
(82, 'a', '2019-07-24 14:26:33', 9, 0, 'luccas'),
(83, 's', '2019-07-24 14:26:35', 9, 0, 'luccas'),
(84, 'aa', '2019-07-24 14:26:39', 9, 0, 'cobrinha'),
(85, 'aa', '2019-07-24 14:26:39', 9, 0, 'cobrinha'),
(86, 'aa', '2019-07-24 14:26:43', 9, 0, 'cobrinha'),
(87, 'z', '2019-07-24 14:26:46', 9, 0, 'cobrinha'),
(88, 'a', '2019-07-24 14:34:06', 9, 0, 'luccas'),
(89, 'aaaaa', '2019-07-24 15:03:32', 10, 0, 'aa'),
(90, 'aaaa', '2019-07-24 15:03:36', 10, 0, 'bb'),
(91, 'a', '2019-07-24 15:06:47', 11, 0, 'a'),
(92, 'd', '2019-07-24 15:06:52', 11, 0, 'a'),
(93, 'Oi atum', '2019-07-24 15:12:02', 12, 0, 'Pamonha'),
(94, 'Oi pamonha', '2019-07-24 15:12:10', 12, 0, 'Atum'),
(95, 'aa', '2019-07-25 14:38:56', 13, 0, 'Oi'),
(96, '', '2019-07-25 14:38:57', 13, 0, 'Oi'),
(97, 'aa', '2019-07-25 14:39:01', 13, 0, 'oi'),
(98, '\\', '2019-07-25 14:49:37', 13, 0, 'Oi'),
(99, 'a', '2019-07-25 14:49:42', 13, 0, 'Oi'),
(100, 'a', '2019-07-25 14:50:57', 13, 0, 'Oi'),
(101, 'aa', '2019-07-25 14:51:02', 13, 0, 'Oi'),
(102, 'a', '2019-07-25 14:51:03', 13, 0, 'Oi'),
(103, 'a', '2019-07-25 14:51:05', 13, 0, 'Oi'),
(104, 'poooo', '2019-07-25 15:37:34', 14, 0, 'JoJo'),
(105, '', '2019-07-25 15:37:35', 14, 0, 'JoJo'),
(106, 'ioo', '2019-07-25 15:37:51', 14, 0, 'Erina'),
(107, '', '2019-07-25 15:37:51', 14, 0, 'Erina'),
(108, '', '2019-07-25 15:38:00', 14, 0, 'Erina'),
(109, 'oi', '2019-07-25 15:38:03', 14, 0, 'Erina'),
(110, '', '2019-07-25 15:38:16', 14, 0, 'JoJo'),
(111, '', '2019-07-25 15:38:16', 14, 0, 'JoJo'),
(112, '', '2019-07-25 15:38:17', 14, 0, 'JoJo'),
(113, '', '2019-07-25 15:38:17', 14, 0, 'JoJo'),
(114, '', '2019-07-25 15:38:17', 14, 0, 'JoJo'),
(115, '', '2019-07-25 15:38:17', 14, 0, 'JoJo'),
(116, '', '2019-07-25 15:38:17', 14, 0, 'JoJo'),
(117, '', '2019-07-25 15:38:17', 14, 0, 'JoJo'),
(118, '', '2019-07-25 15:38:17', 14, 0, 'JoJo'),
(119, '', '2019-07-25 15:38:18', 14, 0, 'JoJo'),
(120, '', '2019-07-25 15:38:18', 14, 0, 'JoJo'),
(121, '', '2019-07-25 15:38:18', 14, 0, 'JoJo'),
(122, '', '2019-07-25 15:38:18', 14, 0, 'JoJo'),
(123, '', '2019-07-25 15:38:18', 14, 0, 'JoJo'),
(124, '', '2019-07-25 15:38:18', 14, 0, 'JoJo'),
(125, '', '2019-07-25 15:38:18', 14, 0, 'JoJo'),
(126, '', '2019-07-25 15:38:19', 14, 0, 'JoJo'),
(127, '', '2019-07-25 15:38:19', 14, 0, 'JoJo'),
(128, '', '2019-07-25 15:38:19', 14, 0, 'JoJo'),
(129, '', '2019-07-25 15:38:19', 14, 0, 'JoJo'),
(130, '', '2019-07-25 15:38:19', 14, 0, 'JoJo'),
(131, '', '2019-07-25 15:38:19', 14, 0, 'JoJo'),
(132, '', '2019-07-25 15:38:20', 14, 0, 'JoJo'),
(133, '', '2019-07-25 15:38:20', 14, 0, 'JoJo'),
(134, '', '2019-07-25 15:38:20', 14, 0, 'JoJo'),
(135, '', '2019-07-25 15:38:20', 14, 0, 'JoJo'),
(136, '', '2019-07-25 15:38:21', 14, 0, 'JoJo'),
(137, 'morre', '2019-07-25 15:38:27', 14, 0, 'JoJo'),
(138, 'oi?', '2019-07-29 14:15:19', 15, 0, 'aa'),
(139, 'oi', '2019-07-29 14:17:57', 16, 0, 'vick'),
(140, 'oi', '2019-07-29 14:20:16', 16, 0, 'vick'),
(141, 'oie', '2019-07-29 14:20:25', 16, 0, 'laura'),
(142, 'oi', '2019-07-29 14:35:00', 16, 2, 'vick'),
(143, '', '2019-07-29 14:35:00', 16, 2, 'vick'),
(144, 'oie', '2019-07-29 14:35:17', 16, 1, 'laura'),
(145, 'oi', '2019-07-30 09:26:28', 17, 1, 'Lau'),
(146, 'oieeee', '2019-07-30 09:26:30', 17, 5, 'mari'),
(147, 'posso ajudar?', '2019-07-30 09:26:43', 17, 5, 'mari'),
(148, 'EEEEEEEEEEEEEEE CARALHOOOOOOOOOOOOOO', '2019-07-30 09:26:49', 17, 5, 'mari'),
(149, 'AAAAAA', '2019-07-30 09:26:52', 17, 1, 'Lau'),
(150, 'SAIU SAPORRAAAAAAAAAAAAAAAAAAAAAAAAAAAA', '2019-07-30 09:26:54', 17, 5, 'mari'),
(151, 'AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA', '2019-07-30 09:26:58', 17, 5, 'mari'),
(152, 'taaaa funcionanaaaaaaado', '2019-07-30 09:26:59', 17, 1, 'Lau'),
(153, 'AAAAAAAAAAAAAAA', '2019-07-30 09:27:04', 17, 1, 'Lau'),
(154, 'AAA', '2019-07-30 09:27:42', 17, 1, 'Lau'),
(155, 'oieeeeeeeeeeee', '2019-07-30 09:28:57', 18, 5, 'MARI'),
(156, 'OIZÃƒOOOOO', '2019-07-30 09:29:09', 18, 3, 'Jaq'),
(157, '=D', '2019-07-30 09:29:16', 18, 5, 'MARI'),
(158, '<3', '2019-07-30 09:29:25', 18, 3, 'Jaq'),
(159, 'kkkkkkkkkkkkkkk', '2019-07-30 09:36:02', 19, 5, 'mari'),
(160, 'OIIII', '2019-07-30 09:36:16', 20, 3, 'Jaq'),
(161, 'klk', '2019-07-30 09:36:22', 23, 6, 'luccas'),
(162, 'oi', '2019-07-30 09:36:36', 23, 4, 'Lau2'),
(163, 'lkkkkkkkkkkkkkk', '2019-07-30 09:43:40', 24, 5, 'mari'),
(164, 'aaaa', '2019-07-30 09:43:54', 24, 5, 'mari'),
(165, 'kkkkkkkkkkkkkkk', '2019-07-30 10:00:10', 25, 1, 'oi'),
(166, 'OizÃ£ooo', '2019-07-30 10:00:10', 25, 3, 'aaa'),
(167, 'aaaaaaaaaaaaaaaa', '2019-07-30 10:04:02', 26, 1, 'arroz'),
(168, 'oi', '2019-08-01 14:26:51', 29, 3, 'a'),
(169, 'oi', '2019-08-01 14:26:57', 29, 1, 'la'),
(170, 'o', '2019-08-01 14:35:34', 30, 1, 'po'),
(171, 'oi', '2019-08-01 14:39:25', 30, 3, 'aa'),
(172, 'oi', '2019-08-01 14:39:27', 30, 3, 'aa'),
(173, 'oi', '2019-08-01 14:39:56', 30, 1, 'po'),
(174, 'oiiii', '2019-08-01 14:40:19', 30, 1, 'po'),
(175, 'aaa', '2019-08-07 14:01:07', 32, 1, 'lau'),
(176, 'oi', '2019-08-07 14:08:34', 33, 1, 'lau'),
(177, 'a', '2019-08-07 14:08:44', 33, 3, 'a'),
(178, 'oi', '2019-08-07 14:24:39', 34, 1, 'lau'),
(179, 'oi', '2019-08-07 15:24:48', 35, 1, 'lau'),
(180, 'oi', '2019-08-07 15:24:53', 35, 3, 'aaa'),
(181, 'oi', '2019-08-08 14:42:31', 36, 1, 'lau'),
(182, 'ooi', '2019-08-08 14:42:36', 36, 1, 'lau'),
(183, 'oi', '2019-08-08 14:42:43', 36, 3, 'a'),
(184, 'oi', '2019-08-15 15:27:23', 37, 1, 'La'),
(185, 'oieeee', '2019-08-15 15:27:53', 37, 8, 'mari'),
(186, 'oi', '2019-08-15 15:28:01', 37, 1, 'La'),
(187, 'blablabla', '2019-08-15 15:28:17', 37, 8, 'mari'),
(188, 'oi vibora', '2019-08-15 15:28:26', 38, 2, 'vick'),
(189, 'oi, demo', '2019-08-15 15:28:50', 38, 7, 'Jaq'),
(190, 'eu nao aguento mais', '2019-08-15 15:30:38', 39, 8, 'mari'),
(191, 'socorrrrr', '2019-08-15 15:30:42', 39, 8, 'mari'),
(192, 'eu tambem nÃ£o', '2019-08-15 15:30:49', 39, 2, 'vick'),
(193, 'min ajuda', '2019-08-15 15:30:54', 39, 8, 'mari'),
(194, 'como assim????', '2019-08-15 15:31:00', 39, 8, 'mari'),
(195, 'isso nao vai dar certo', '2019-08-15 15:31:05', 39, 8, 'mari'),
(196, 'aaaaaaaaaaaaa', '2019-08-15 15:33:57', 41, 8, 'mari'),
(197, 'aaaaaaaaaaaaaaaaaaaaaaaaaaaa', '2019-08-15 15:34:00', 41, 8, 'mari'),
(198, 'ai moÃ§a, cheguei no meu limite', '2019-08-15 15:34:07', 41, 6, 'luc'),
(199, 'aaaaaaaaaaa', '2019-08-15 15:34:57', 43, 8, 'mar'),
(200, 'oi', '2019-08-24 12:42:56', 47, 1, 'utabs'),
(201, '', '2019-08-24 12:42:56', 47, 1, 'utabs'),
(202, '', '2019-08-24 12:43:05', 47, 1, 'utabs'),
(203, 'oi', '2019-08-24 12:43:18', 47, 3, 'utabs triste');

-- --------------------------------------------------------

--
-- Estrutura da tabela `sala_ajudante`
--

CREATE TABLE `sala_ajudante` (
  `senha_ajudante` int(11) NOT NULL,
  `id_usuario_ajudante` int(11) DEFAULT NULL,
  `nick_ajudante` varchar(80) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `sala_busca_ajuda`
--

CREATE TABLE `sala_busca_ajuda` (
  `senha_busca_ajuda` int(11) NOT NULL,
  `id_usuario_busca_ajuda` int(11) DEFAULT NULL,
  `nick_busca_ajuda` varchar(80) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id_user` int(11) NOT NULL,
  `nome` varchar(60) NOT NULL,
  `email` varchar(70) NOT NULL,
  `senha` varchar(50) NOT NULL,
  `qtd_denuncias` int(11) DEFAULT NULL,
  `CEP` int(11) NOT NULL,
  `tel` int(11) NOT NULL,
  `data_nasc` date NOT NULL,
  `RG` int(11) NOT NULL,
  `selecionado` int(1) DEFAULT NULL,
  `id_conv` int(11) DEFAULT NULL,
  `nick_atual` varchar(80) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id_user`, `nome`, `email`, `senha`, `qtd_denuncias`, `CEP`, `tel`, `data_nasc`, `RG`, `selecionado`, `id_conv`, `nick_atual`) VALUES
(1, 'laura', 'laura@laura.com', '123', 2, 0, 32514586, '2002-01-05', 0, 0, 0, NULL),
(2, 'vick', 'vick@vick.com', '123', 3, 0, 32653265, '2002-01-05', 0, 0, 0, NULL),
(3, 'ahaushas', 'aaa@aaa.com', 'aaa', 9, 12345678, 2265232, '1996-02-03', 51555626, 0, 0, NULL),
(4, 'Jonathan Joestar', 'affs@gmail.com', 'Diooo', NULL, 13032425, 2147483647, '2000-02-13', 373492510, 0, 0, NULL),
(5, 'mari', 'marianarduini@gmail.com', 'mari', NULL, 111111, 111111, '1988-02-26', 111111, NULL, 0, NULL),
(6, 'Luccas', 'luccasbuenorabelo@gmail.com', '123', 3, 13481005, 995852251, '2001-10-20', 2147483647, 0, 0, NULL),
(7, 'Jaq', 'line@line.com', '123', NULL, 13045585, 2147483647, '2001-03-24', 572133662, 0, 0, 'Jaq'),
(8, 'mariana', 'mari@gmail.com', '123456', NULL, 11111111, 11111111, '1988-02-26', 11111111, 0, 0, NULL),
(10, 'a', 'laura@laura.com', 'a', NULL, 1, 1, '0000-00-00', 1, NULL, NULL, NULL),
(11, 'la', 'laura@laura.com', '1', NULL, 1, 1, '2019-08-16', 1, NULL, NULL, NULL),
(12, 'a', 'laura@laura.com', '1', NULL, 1, 1, '2019-08-16', 1, NULL, NULL, NULL),
(13, 'la', 'laura@laura.com', '1', NULL, 1, 1, '2019-08-15', 1, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `conversa`
--
ALTER TABLE `conversa`
  ADD PRIMARY KEY (`id_conv`);

--
-- Indexes for table `denuncias`
--
ALTER TABLE `denuncias`
  ADD PRIMARY KEY (`id_denun`);

--
-- Indexes for table `mensagens`
--
ALTER TABLE `mensagens`
  ADD PRIMARY KEY (`id_msg`);

--
-- Indexes for table `sala_ajudante`
--
ALTER TABLE `sala_ajudante`
  ADD PRIMARY KEY (`senha_ajudante`);

--
-- Indexes for table `sala_busca_ajuda`
--
ALTER TABLE `sala_busca_ajuda`
  ADD PRIMARY KEY (`senha_busca_ajuda`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `conversa`
--
ALTER TABLE `conversa`
  MODIFY `id_conv` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `denuncias`
--
ALTER TABLE `denuncias`
  MODIFY `id_denun` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `mensagens`
--
ALTER TABLE `mensagens`
  MODIFY `id_msg` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=204;

--
-- AUTO_INCREMENT for table `sala_ajudante`
--
ALTER TABLE `sala_ajudante`
  MODIFY `senha_ajudante` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sala_busca_ajuda`
--
ALTER TABLE `sala_busca_ajuda`
  MODIFY `senha_busca_ajuda` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
