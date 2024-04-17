-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 10-Jul-2019 às 17:52
-- Versão do servidor: 10.1.35-MariaDB
-- versão do PHP: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pizzaria`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tab_cliente`
--

CREATE TABLE `tab_cliente` (
  `cod_cliente` int(11) NOT NULL,
  `nome_cliente` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `cpf_cliente` varchar(11) CHARACTER SET utf8 DEFAULT NULL,
  `telefone` varchar(11) CHARACTER SET utf8 DEFAULT NULL,
  `data_nascimento` date DEFAULT NULL,
  `rua_cliente` varchar(60) CHARACTER SET utf8 DEFAULT NULL,
  `bairro_cliente` varchar(60) CHARACTER SET utf8 DEFAULT NULL,
  `numero` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tab_cliente`
--

INSERT INTO `tab_cliente` (`cod_cliente`, `nome_cliente`, `cpf_cliente`, `telefone`, `data_nascimento`, `rua_cliente`, `bairro_cliente`, `numero`) VALUES
(18, 'jÃ¡rdesson ribeiro dos Santos', '54585555555', '99568522223', '2019-06-24', 'Centro', 'Centro', 326),
(19, 'AugustoTadeu', '9666555555', '10005999999', '1998-06-25', 'centro', 'Centro', 125),
(20, 'MariÃ¡ Sousa Maos', '454655664', '9525785555', '1995-02-18', 'Sul', 'Sul', 123),
(21, 'Anne Frank ', '45456466464', '45464564564', '1999-11-17', 'Das Flores', 'SÃ£o Luiz', 225),
(22, 'Amadeu cardoso', '45788999999', '9457855555', '1988-05-05', 'Rua', 'Bairro', 215);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tab_fornecedor`
--

CREATE TABLE `tab_fornecedor` (
  `cod_fornecedor` int(11) NOT NULL,
  `nome_fornecedor` varchar(50) DEFAULT NULL,
  `razao_social` varchar(50) DEFAULT NULL,
  `cnpj_fornecedor` varchar(14) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `telefone` varchar(11) DEFAULT NULL,
  `bairro_fornecedor` varchar(50) DEFAULT NULL,
  `rua_fornecedor` varchar(50) DEFAULT NULL,
  `numero` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tab_fornecedor`
--

INSERT INTO `tab_fornecedor` (`cod_fornecedor`, `nome_fornecedor`, `razao_social`, `cnpj_fornecedor`, `email`, `telefone`, `bairro_fornecedor`, `rua_fornecedor`, `numero`) VALUES
(1, 'MiniDevsIfpi', 'MiniDevsIfpi Ltda', '1245784545', 'minidevsifpi@gmai.com', '99658999', 'Centro', 'Ubn', 4450),
(2, 'Dev-Supervisionado', 'Dv-Sp', '4254888', 'supervisionado@gmail.com', '95456558888', 'Bairro', 'Rua', 125);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tab_funcionario`
--

CREATE TABLE `tab_funcionario` (
  `cod_funcionario` int(11) NOT NULL,
  `nome_funcionario` varchar(50) DEFAULT NULL,
  `cargo` varchar(50) DEFAULT NULL,
  `data_nascimento` date DEFAULT NULL,
  `cpf_funcionario` varchar(11) DEFAULT NULL,
  `telefone1` varchar(11) DEFAULT NULL,
  `telefone2` varchar(11) NOT NULL,
  `data_admissao` date DEFAULT NULL,
  `rua_funci` varchar(60) DEFAULT NULL,
  `bairro_funci` varchar(60) DEFAULT NULL,
  `numero` int(11) DEFAULT NULL,
  `salario` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tab_funcionario`
--

INSERT INTO `tab_funcionario` (`cod_funcionario`, `nome_funcionario`, `cargo`, `data_nascimento`, `cpf_funcionario`, `telefone1`, `telefone2`, `data_admissao`, `rua_funci`, `bairro_funci`, `numero`, `salario`) VALUES
(1, 'Jardesson Ribeiro s', 'Administrador', '1999-11-17', '12457888888', '45458858885', '47888884588', '2019-05-01', 'Centro', 'Centro', 335, 1000),
(2, 'Jonatas', 'Contador', '1994-12-16', '9659888888', '65589999999', '965688999', '2019-06-05', 'Zona Rural', 'Zona Rural', 2458, 1500),
(3, 'JoÃ£o da Solova', 'vendedor', '2019-07-10', '12145458888', '956455884', '54586666666', '1985-02-02', 'Centro', 'Bairro', 125, 988);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tab_itempedido`
--

CREATE TABLE `tab_itempedido` (
  `cod_item` int(11) NOT NULL,
  `quantidade` int(11) DEFAULT NULL,
  `valor_item` double NOT NULL,
  `cod_produtovenda` int(11) DEFAULT NULL,
  `cod_pedido` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tab_itempedido`
--

INSERT INTO `tab_itempedido` (`cod_item`, `quantidade`, `valor_item`, `cod_produtovenda`, `cod_pedido`) VALUES
(1, 1, 0, 20, 128),
(2, 1, 0, 16, 128),
(3, 1, 0, 20, 129),
(4, 1, 0, 24, 129),
(5, 1, 0, 20, 129),
(6, 1, 0, 16, 129),
(7, 1, 33.5, 16, 129),
(8, 1, 5.5, 20, 129),
(9, 1, 5.5, 20, 130),
(10, 1, 33.5, 16, 131),
(11, 1, 33.5, 16, 134),
(12, 1, 33.5, 16, 135),
(13, 1, 33.5, 16, 137),
(14, 1, 5.2, 24, 138),
(15, 1, 5.2, 24, 139),
(16, 2, 35, 17, 139),
(17, 1, 33.5, 16, 140),
(18, 1, 33.5, 16, 141),
(19, 1, 5.2, 24, 141),
(20, 1, 33.5, 16, 142),
(21, 1, 33.5, 16, 142),
(22, 1, 33.5, 16, 143),
(23, 1, 5.2, 24, 143),
(24, 1, 5.2, 24, 144),
(25, 1, 33.5, 16, 145),
(26, 1, 35, 17, 146),
(27, 1, 33.5, 16, 147),
(28, 1, 5.2, 24, 147),
(29, 1, 33.5, 16, 148),
(30, 1, 5.2, 24, 148),
(31, 1, 5.2, 24, 149),
(32, 1, 5.2, 24, 150),
(33, 1, 33.5, 16, 151),
(34, 1, 33.5, 16, 152),
(35, 1, 33.5, 16, 153),
(36, 1, 33.5, 16, 154),
(38, 1, 33.5, 16, 155),
(39, 1, 33.5, 16, 157),
(40, 1, 33.5, 16, 160),
(41, 1, 33.5, 16, 161),
(42, 1, 5.5, 20, 164),
(43, 2, 5.5, 20, 164),
(44, 1, 33.5, 16, 165),
(45, 1, 5.5, 20, 166),
(46, 1, 33.5, 16, 166),
(47, 1, 33.5, 16, 167),
(48, 1, 33.5, 16, 168),
(49, 1, 33.5, 16, 168),
(50, 1, 33.5, 16, 169),
(51, 1, 33.5, 16, 171),
(52, 1, 5.5, 20, 172),
(53, 1, 33.5, 16, 173),
(54, 1, 5.5, 20, 173),
(55, 1, 33.5, 16, 178),
(56, 1, 5.5, 20, 179),
(57, 2, 33.5, 16, 179),
(58, 1, 5.5, 20, 180),
(59, 1, 5.5, 20, 181),
(60, 2, 5.5, 20, 182),
(61, 1, 33.5, 16, 183),
(62, 1, 5.5, 20, 183);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tab_itenscozinha`
--

CREATE TABLE `tab_itenscozinha` (
  `cod_itenscozinha` int(11) NOT NULL,
  `cod_fornecedor` int(11) DEFAULT NULL,
  `nome_item` varchar(50) DEFAULT NULL,
  `quantidade` int(11) DEFAULT NULL,
  `validade` date DEFAULT NULL,
  `valor_item` double DEFAULT NULL,
  `descricao_item` varchar(60) DEFAULT NULL,
  `categoria` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tab_itenscozinha`
--

INSERT INTO `tab_itenscozinha` (`cod_itenscozinha`, `cod_fornecedor`, `nome_item`, `quantidade`, `validade`, `valor_item`, `descricao_item`, `categoria`) VALUES
(1, 1, 'Arroz', 20, '2019-01-01', 10, 'Nada', 'Bebida'),
(2, 1, 'Teste  ', 20, '2019-07-12', 5.5, 'daddad', 'NPerecivel'),
(3, 1, 'Teste Pizzaria', 20, '2019-07-12', 2.5, 'asdafsd', 'Alimentar'),
(4, 2, 'SabÃ£o OMO', 30, '2020-07-13', 2.5, 'Nada', 'Limpeza');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tab_pedido`
--

CREATE TABLE `tab_pedido` (
  `cod_pedido` int(11) NOT NULL,
  `data_pedido` date DEFAULT NULL,
  `hora_pedido` time DEFAULT NULL,
  `valor_total` double DEFAULT NULL,
  `cod_cliente` int(11) DEFAULT NULL,
  `cod_funcionario` int(11) DEFAULT NULL,
  `status_pedido` varchar(50) NOT NULL DEFAULT 'Iniciado',
  `fechado` varchar(3) NOT NULL DEFAULT 'nao'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tab_pedido`
--

INSERT INTO `tab_pedido` (`cod_pedido`, `data_pedido`, `hora_pedido`, `valor_total`, `cod_cliente`, `cod_funcionario`, `status_pedido`, `fechado`) VALUES
(42, '2019-06-24', '16:32:15', 10, 18, 2, 'Entregue', 'nao'),
(43, '2019-06-24', '16:36:15', 10, 18, 2, 'Iniciado', 'nao'),
(44, '2019-06-24', '16:37:47', 10, 18, 2, 'Iniciado', 'nao'),
(45, '2019-06-24', '16:41:58', 10, 18, 2, 'Iniciado', 'nao'),
(46, '2019-06-24', '16:42:44', 10, 18, 2, 'Iniciado', 'nao'),
(47, '2019-06-24', '16:43:43', 10, 18, 2, 'Iniciado', 'nao'),
(48, '2019-06-24', '16:44:52', 10, 18, 2, 'Iniciado', 'nao'),
(49, '2019-06-24', '16:46:54', 10, 18, 2, 'Iniciado', 'nao'),
(50, '2019-06-24', '16:48:58', 10, 18, 2, 'Iniciado', 'nao'),
(51, '2019-06-24', '17:07:16', 10, 18, 2, 'Iniciado', 'nao'),
(53, '2019-06-25', '12:15:39', 10, 18, 2, 'Iniciado', 'nao'),
(54, '2019-06-25', '12:29:34', 10, 18, 2, 'Iniciado', 'nao'),
(56, '2019-06-25', '13:03:42', 10, 18, 2, 'Iniciado', 'nao'),
(57, '2019-06-25', '13:14:25', 10, 18, 2, 'Iniciado', 'nao'),
(58, '2019-06-25', '13:15:47', 10, 18, 2, 'Iniciado', 'nao'),
(59, '2019-06-25', '13:16:04', 10, 18, 2, 'Iniciado', 'nao'),
(60, '2019-06-25', '13:17:15', 10, 18, 2, 'Iniciado', 'nao'),
(61, '2019-06-25', '13:39:35', 10, 18, 2, 'Iniciado', 'nao'),
(64, '2019-06-25', '13:39:50', 10, 18, 2, 'Iniciado', 'nao'),
(65, '2019-06-25', '13:47:08', 10, 18, 2, 'Iniciado', 'nao'),
(66, '2019-06-25', '13:49:55', 10, 18, 2, 'Iniciado', 'nao'),
(67, '2019-06-25', '13:53:06', 10, 18, 2, 'Iniciado', 'nao'),
(68, '2019-06-25', '13:54:27', 10, 18, 2, 'Iniciado', 'nao'),
(69, '2019-06-25', '14:06:47', 10, 18, 2, 'Iniciado', 'nao'),
(70, '2019-06-25', '14:15:53', 10, 18, 2, 'Iniciado', 'nao'),
(71, '2019-06-25', '14:18:46', 10, 18, 2, 'Iniciado', 'nao'),
(72, '2019-06-25', '14:22:49', 10, 18, 2, 'Iniciado', 'nao'),
(73, '2019-06-25', '14:32:58', 10, 18, 2, 'Iniciado', 'nao'),
(74, '2019-06-25', '14:34:22', 10, 18, 2, 'Iniciado', 'nao'),
(75, '2019-06-25', '14:35:00', 10, 18, 2, 'Iniciado', 'nao'),
(76, '2019-06-25', '14:35:20', 10, 18, 2, 'Iniciado', 'nao'),
(77, '2019-06-25', '14:36:34', 10, 18, 2, 'Iniciado', 'nao'),
(78, '2019-06-25', '14:37:08', 10, 18, 2, 'Iniciado', 'nao'),
(79, '2019-06-25', '14:41:58', 10, 18, 2, 'Iniciado', 'nao'),
(80, '2019-06-25', '15:09:09', 10, 18, 2, 'Iniciado', 'nao'),
(81, '2019-06-25', '15:11:16', 10, 18, 2, 'Iniciado', 'nao'),
(82, '2019-06-25', '15:12:58', 10, 18, 2, 'Iniciado', 'nao'),
(83, '2019-06-25', '15:14:33', 10, 18, 2, 'Iniciado', 'nao'),
(84, '2019-06-25', '15:28:16', 10, 18, 2, 'Iniciado', 'nao'),
(85, '2019-06-25', '15:29:06', 10, 18, 2, 'Iniciado', 'nao'),
(86, '2019-06-25', '15:43:27', 10, 18, 2, 'Iniciado', 'nao'),
(87, '2019-06-25', '15:47:44', 10, 18, 2, 'Iniciado', 'nao'),
(88, '2019-06-25', '16:11:08', 10, 18, 2, 'Iniciado', 'nao'),
(89, '2019-06-25', '16:14:07', 10, 18, 2, 'Iniciado', 'nao'),
(90, '2019-06-25', '16:15:19', 10, 18, 2, 'Iniciado', 'nao'),
(91, '2019-06-25', '17:00:12', 10, 19, 2, 'Iniciado', 'nao'),
(92, '2019-06-26', '12:23:14', 10, 19, 2, 'Iniciado', 'nao'),
(95, '2019-06-26', '12:33:48', 10, 19, 2, 'Iniciado', 'nao'),
(96, '2019-06-26', '12:37:58', 10, 19, 2, 'Iniciado', 'nao'),
(99, '2019-06-26', '14:00:50', 10, 19, 2, 'Iniciado', 'nao'),
(100, '2019-06-26', '15:24:06', 10, 18, 2, 'Iniciado', 'nao'),
(101, '2019-06-26', '15:31:09', 10, 18, 2, 'Iniciado', 'nao'),
(102, '2019-06-26', '15:44:09', 10, 19, 2, 'Iniciado', 'nao'),
(103, '2019-06-26', '15:47:32', 10, 18, 2, 'Iniciado', 'nao'),
(104, '2019-06-26', '15:59:54', 10, 18, 2, 'Iniciado', 'nao'),
(105, '2019-06-26', '16:23:26', 10, 19, 2, 'Iniciado', 'nao'),
(106, '2019-06-26', '16:25:29', 10, 18, 2, 'Iniciado', 'nao'),
(107, '2019-06-26', '16:41:49', 10, 19, 2, 'Iniciado', 'nao'),
(108, '2019-06-26', '16:49:25', 10, 18, 2, 'Iniciado', 'nao'),
(109, '2019-06-27', '15:03:13', 10, 18, 2, 'Iniciado', 'nao'),
(110, '2019-06-27', '15:45:19', 10, 19, 2, 'Iniciado', 'nao'),
(111, '2019-07-01', '13:14:25', 10, 19, 2, 'Concluido', 'nao'),
(112, '2019-07-06', '12:09:51', 10, 19, 2, 'Iniciado', 'nao'),
(113, '2019-07-06', '23:34:22', 10, 19, 2, 'Concluido', 'nao'),
(114, '2019-07-06', '23:34:40', 10, 20, 2, 'Concluido', 'nao'),
(115, '2019-07-07', '18:38:11', 10, 19, 2, 'Concluido', 'nao'),
(116, '2019-07-07', '19:20:56', 10, 18, 2, 'Andamento', 'nao'),
(117, '2019-07-07', '19:30:07', 10, 18, 2, 'Concluido', 'nao'),
(118, '2019-07-08', '15:11:54', 10, 21, 2, 'Iniciado', 'nao'),
(119, '2019-07-08', '15:13:53', 10, 21, 2, 'Iniciado', 'nao'),
(120, '2019-07-08', '15:33:29', 10, 21, 2, 'Iniciado', 'sim'),
(121, '2019-07-08', '16:17:23', 10, 20, 2, 'Iniciado', 'nao'),
(122, '2019-07-08', '17:00:16', 10, 21, 2, 'Iniciado', 'nao'),
(123, '2019-07-09', '12:23:21', 10, 19, 2, 'Concluido', 'nao'),
(124, '2019-07-09', '12:59:12', 10, 21, 2, 'Concluido', 'nao'),
(125, '2019-07-09', '13:31:16', 10, 20, 2, 'Iniciado', 'nao'),
(126, '2019-07-09', '13:36:57', 10, 20, 2, 'Iniciado', 'nao'),
(127, '2019-07-09', '13:43:38', 10, 21, 2, 'Iniciado', 'nao'),
(128, '2019-07-09', '13:48:52', 10, 20, 2, 'Iniciado', 'nao'),
(129, '2019-07-09', '13:49:22', 10, 19, 2, 'Concluido', 'nao'),
(130, '2019-07-09', '14:03:34', 5.5, 20, 2, 'Iniciado', 'sim'),
(131, '2019-07-09', '14:21:55', 0, 18, 2, 'Iniciado', 'nao'),
(134, '2019-07-09', '14:29:58', 0, 19, 2, 'Iniciado', 'nao'),
(135, '2019-07-09', '14:30:11', 0, 18, 2, 'Iniciado', 'nao'),
(137, '2019-07-09', '14:30:25', 0, 18, 2, 'Iniciado', 'nao'),
(138, '2019-07-09', '14:30:43', 0, 19, 2, 'Iniciado', 'nao'),
(139, '2019-07-09', '14:31:26', 75.2, 18, 2, 'Iniciado', 'sim'),
(140, '2019-07-09', '14:34:36', 33.5, 18, 2, 'Iniciado', 'sim'),
(141, '2019-07-09', '14:41:05', 38.7, 19, 2, 'Iniciado', 'sim'),
(142, '2019-07-09', '14:44:30', 33.5, 19, 2, 'Iniciado', 'sim'),
(143, '2019-07-09', '14:45:44', 38.7, 19, 2, 'Iniciado', 'sim'),
(144, '2019-07-09', '14:55:16', 5.2, 19, 2, 'Concluido', 'sim'),
(145, '2019-07-09', '15:14:26', 33.5, 19, 2, 'Concluido', 'sim'),
(146, '2019-07-09', '15:15:03', 35, 19, 2, 'Concluido', 'sim'),
(147, '2019-07-09', '15:16:49', 38.7, 19, 2, 'Concluido', 'sim'),
(148, '2019-07-09', '16:25:06', 38.7, 21, 1, 'Iniciado', 'sim'),
(149, '2019-07-09', '16:30:02', 5.2, 21, 1, 'Iniciado', 'sim'),
(150, '2019-07-09', '17:11:53', 0, 21, 1, 'Iniciado', 'nao'),
(151, '2019-07-09', '17:13:38', 0, 19, 1, 'Iniciado', 'nao'),
(152, '2019-07-09', '17:15:34', 0, 20, 1, 'Iniciado', 'nao'),
(153, '2019-07-09', '17:18:03', 0, 20, 1, 'Iniciado', 'nao'),
(154, '2019-07-09', '17:18:39', 0, 19, 1, 'Iniciado', 'nao'),
(155, '2019-07-09', '17:23:21', 0, 21, 1, 'Iniciado', 'nao'),
(156, '2019-07-09', '17:27:16', 0, 18, 1, 'Iniciado', 'nao'),
(157, '2019-07-09', '17:27:33', 0, 18, 1, 'Iniciado', 'nao'),
(160, '2019-07-09', '17:33:09', 0, 19, 1, 'Iniciado', 'nao'),
(161, '2019-07-09', '17:34:18', 0, 18, 1, 'Iniciado', 'nao'),
(162, '2019-07-09', '17:35:36', 0, 20, 1, 'Iniciado', 'nao'),
(163, '2019-07-09', '17:35:55', 0, 18, 1, 'Iniciado', 'nao'),
(164, '2019-07-09', '17:36:03', 16.5, 18, 1, 'Iniciado', 'sim'),
(165, '2019-07-09', '17:36:42', 0, 19, 1, 'Iniciado', 'nao'),
(166, '2019-07-09', '17:37:23', 0, 20, 1, 'Iniciado', 'nao'),
(167, '2019-07-09', '17:38:02', 0, 19, 1, 'Iniciado', 'nao'),
(168, '2019-07-09', '17:38:41', 0, 20, 1, 'Iniciado', 'nao'),
(169, '2019-07-09', '17:39:25', 0, 19, 1, 'Iniciado', 'nao'),
(171, '2019-07-09', '17:41:44', 0, 19, 1, 'Iniciado', 'nao'),
(172, '2019-07-09', '17:42:58', 5.5, 18, 1, 'Iniciado', 'sim'),
(173, '2019-07-09', '17:45:30', 39, 19, 1, 'Iniciado', 'sim'),
(178, '2019-07-10', '16:43:14', 33.5, 19, 1, 'Concluido', 'sim'),
(179, '2019-07-10', '16:53:29', 72.5, 19, 3, 'Entregue', 'sim'),
(180, '2019-07-10', '17:22:30', 5.5, 20, 3, 'Entregue', 'sim'),
(181, '2019-07-10', '17:23:18', 5.5, 20, 1, 'Iniciado', 'sim'),
(182, '2019-07-10', '17:25:27', 11, 21, 1, 'Concluido', 'sim'),
(183, '2019-07-10', '17:47:35', 39, 22, 2, 'Iniciado', 'sim');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tab_produtovenda`
--

CREATE TABLE `tab_produtovenda` (
  `cod_produtovenda` int(11) NOT NULL,
  `nome_produto` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `valor_produto` double DEFAULT NULL,
  `descricao_produto` varchar(60) CHARACTER SET utf8 DEFAULT NULL,
  `decremento` varchar(3) NOT NULL DEFAULT 'nao',
  `qnt_produto` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tab_produtovenda`
--

INSERT INTO `tab_produtovenda` (`cod_produtovenda`, `nome_produto`, `valor_produto`, `descricao_produto`, `decremento`, `qnt_produto`) VALUES
(16, 'Pizza de Calabresa  Media ', 33.5, 'Quatro queijos .', 'nao', -45),
(17, 'Pizza Carne de Sol- Tam Grande', 35, 'Mais Pedida', 'nao', -3),
(19, 'Pizza Portuguêsa', 32.5, 'Boa', 'nao', 0),
(20, 'Coca-Cola', 5.5, '2 Litros', 'sim', 37),
(21, 'Ã  moda da familia', 20, 'Teste', 'nao', -1),
(22, 'Ã moda do chefe', 25, 'teste 2', 'nao', -2),
(23, 'Ã€ moda da casa', 35, 'Muito boa', 'nao', 0),
(24, 'Fanta Uva', 5.2, 'Boa', 'sim', 20),
(25, 'Fanta Uva', 5.15, 'Teste', 'sim', 4),
(27, 'Suco de Acerola', 4.5, 'SaudÃ¡vel', 'sim', 20);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tab_usuarios`
--

CREATE TABLE `tab_usuarios` (
  `cod_usuario` int(11) NOT NULL,
  `usuario` varchar(15) NOT NULL,
  `senha` varchar(20) NOT NULL,
  `nivel_acesso` int(11) NOT NULL,
  `cod_funcionario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tab_usuarios`
--

INSERT INTO `tab_usuarios` (`cod_usuario`, `usuario`, `senha`, `nivel_acesso`, `cod_funcionario`) VALUES
(2, 'admin', 'admin', 1, 1),
(3, 'jonatas', 'admin123', 3, 2),
(4, 'joao', '123456', 2, 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tab_cliente`
--
ALTER TABLE `tab_cliente`
  ADD PRIMARY KEY (`cod_cliente`);

--
-- Indexes for table `tab_fornecedor`
--
ALTER TABLE `tab_fornecedor`
  ADD PRIMARY KEY (`cod_fornecedor`);

--
-- Indexes for table `tab_funcionario`
--
ALTER TABLE `tab_funcionario`
  ADD PRIMARY KEY (`cod_funcionario`);

--
-- Indexes for table `tab_itempedido`
--
ALTER TABLE `tab_itempedido`
  ADD PRIMARY KEY (`cod_item`),
  ADD KEY `fk_itpedi` (`cod_pedido`),
  ADD KEY `fk_itpedi2` (`cod_produtovenda`);

--
-- Indexes for table `tab_itenscozinha`
--
ALTER TABLE `tab_itenscozinha`
  ADD PRIMARY KEY (`cod_itenscozinha`),
  ADD KEY `fk_itemCo` (`cod_fornecedor`);

--
-- Indexes for table `tab_pedido`
--
ALTER TABLE `tab_pedido`
  ADD PRIMARY KEY (`cod_pedido`),
  ADD KEY `fk_pefun` (`cod_funcionario`),
  ADD KEY `fk_vefun2` (`cod_cliente`);

--
-- Indexes for table `tab_produtovenda`
--
ALTER TABLE `tab_produtovenda`
  ADD PRIMARY KEY (`cod_produtovenda`);

--
-- Indexes for table `tab_usuarios`
--
ALTER TABLE `tab_usuarios`
  ADD PRIMARY KEY (`cod_usuario`),
  ADD KEY `fk_user` (`cod_funcionario`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tab_cliente`
--
ALTER TABLE `tab_cliente`
  MODIFY `cod_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `tab_fornecedor`
--
ALTER TABLE `tab_fornecedor`
  MODIFY `cod_fornecedor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tab_funcionario`
--
ALTER TABLE `tab_funcionario`
  MODIFY `cod_funcionario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tab_itempedido`
--
ALTER TABLE `tab_itempedido`
  MODIFY `cod_item` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `tab_itenscozinha`
--
ALTER TABLE `tab_itenscozinha`
  MODIFY `cod_itenscozinha` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tab_pedido`
--
ALTER TABLE `tab_pedido`
  MODIFY `cod_pedido` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=184;

--
-- AUTO_INCREMENT for table `tab_produtovenda`
--
ALTER TABLE `tab_produtovenda`
  MODIFY `cod_produtovenda` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `tab_usuarios`
--
ALTER TABLE `tab_usuarios`
  MODIFY `cod_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `tab_itempedido`
--
ALTER TABLE `tab_itempedido`
  ADD CONSTRAINT `fk_itpedi` FOREIGN KEY (`cod_pedido`) REFERENCES `tab_pedido` (`cod_pedido`),
  ADD CONSTRAINT `fk_itpedi2` FOREIGN KEY (`cod_produtovenda`) REFERENCES `tab_produtovenda` (`cod_produtovenda`);

--
-- Limitadores para a tabela `tab_itenscozinha`
--
ALTER TABLE `tab_itenscozinha`
  ADD CONSTRAINT `fk_itemCo` FOREIGN KEY (`cod_fornecedor`) REFERENCES `tab_fornecedor` (`cod_fornecedor`);

--
-- Limitadores para a tabela `tab_pedido`
--
ALTER TABLE `tab_pedido`
  ADD CONSTRAINT `fk_pefun` FOREIGN KEY (`cod_funcionario`) REFERENCES `tab_funcionario` (`cod_funcionario`),
  ADD CONSTRAINT `fk_vefun2` FOREIGN KEY (`cod_cliente`) REFERENCES `tab_cliente` (`cod_cliente`);

--
-- Limitadores para a tabela `tab_usuarios`
--
ALTER TABLE `tab_usuarios`
  ADD CONSTRAINT `fk_user` FOREIGN KEY (`cod_funcionario`) REFERENCES `tab_funcionario` (`cod_funcionario`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
