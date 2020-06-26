-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 26/06/2020 às 01:20
-- Versão do servidor: 10.4.11-MariaDB
-- Versão do PHP: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `cella`
--
-- --------------------------------------------------------

--
-- Estrutura para tabela `casa`
--

CREATE TABLE `casa` (
  `id_casa` int(4) NOT NULL,
  `nome_casa` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Despejando dados para a tabela `casa`
--

INSERT INTO `casa` (`id_casa`, `nome_casa`) VALUES
(1, 'SESI'),
(2, 'SENAI'),
(3, 'IEL');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_demanda`
--

CREATE TABLE `tb_demanda` (
  `id_demanda` int(4) NOT NULL,
  `descricao` varchar(1000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `prioridade` int(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `tb_demanda`
--

INSERT INTO `tb_demanda` (`id_demanda`, `descricao`, `prioridade`) VALUES
(1, 'Material não está sendo cadastrado ou algum erro é gerado na ação.', 3),
(2, 'Não sei como fazer empréstimos, ou estou como dificuldade para saber se o empréstimo foi realmente registrado.', 2),
(3, 'Como fazer a retirada de materiais, ou não sei onde visualizar o registro da retirada feita.', 2),
(4, 'Estou com dificuldade para preencher o campo de cadastro de chaves.', 1),
(5, 'Estou com dificuldade para preencher os campos de cadastro de notebooks.', 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_emprestimos`
--

CREATE TABLE `tb_emprestimos` (
  `id_emprestimo` int(4) NOT NULL,
  `fk_professor` int(4) NOT NULL,
  `fk_produto` int(4) NOT NULL,
  `data_hora_emprestimo` datetime DEFAULT NULL,
  `data_hora_devolucao` datetime DEFAULT NULL,
  `retornavel` int(4) DEFAULT NULL,
  `tipo_prod` int(4) DEFAULT NULL,
  `casa` int(4) DEFAULT NULL,
  `qntde_emp` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `tb_emprestimos`
--

INSERT INTO `tb_emprestimos` (`id_emprestimo`, `fk_professor`, `fk_produto`, `data_hora_emprestimo`, `data_hora_devolucao`, `retornavel`, `tipo_prod`, `casa`, `qntde_emp`) VALUES
(32, 177, 70, '2020-04-03 23:26:35', NULL, 1, 2, 1, NULL),
(42, 177, 66, '2020-04-09 11:48:26', NULL, 1, 2, 1, NULL),
(51, 223, 72, '2020-04-09 17:14:04', NULL, 1, 2, 2, NULL),
(56, 177, 192, '2020-05-08 14:21:35', NULL, 1, 2, 1, NULL),
(83, 140, 167, '2020-05-20 16:24:55', NULL, 1, 3, 3, NULL),
(90, 177, 68, '2020-06-02 17:26:53', NULL, 1, 2, 1, NULL),
(94, 140, 165, '2020-06-05 21:54:20', NULL, 1, 3, 3, NULL),
(95, 140, 166, '2020-06-05 21:55:09', NULL, 1, 3, 3, NULL),
(98, 140, 239, '2020-06-05 22:02:37', NULL, 1, 3, 3, NULL),
(99, 140, 244, '2020-06-05 22:04:36', NULL, 1, 3, 3, NULL),
(100, 140, 160, '2020-06-05 22:07:50', NULL, 1, 3, 3, NULL),
(102, 229, 65, '2020-06-07 22:37:46', NULL, 1, 2, 3, NULL);

--
-- Gatilhos `tb_emprestimos`
--
DELIMITER $$
CREATE TRIGGER `tg_historico` AFTER DELETE ON `tb_emprestimos` FOR EACH ROW BEGIN INSERT INTO tb_historico_emp VALUES (OLD.id_emprestimo,
 OLD.fk_professor, OLD.fk_produto, OLD.`data_hora_emprestimo`,now(),OLD.retornavel,OLD.tipo_prod,OLD.casa,OLD.qntde_emp); END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_historico_emp`
--

CREATE TABLE `tb_historico_emp` (
  `id_emprestimo` int(4) NOT NULL,
  `fk_professor` int(4) NOT NULL,
  `fk_produto` int(4) NOT NULL,
  `data_hora_emprestimo` datetime DEFAULT NULL,
  `data_hora_devolucao` datetime DEFAULT NULL,
  `retornavel` int(4) DEFAULT NULL,
  `tipo_prod` int(4) DEFAULT NULL,
  `casa` int(4) NOT NULL,
  `qntde_emp` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `tb_historico_emp`
--

INSERT INTO `tb_historico_emp` (`id_emprestimo`, `fk_professor`, `fk_produto`, `data_hora_emprestimo`, `data_hora_devolucao`, `retornavel`, `tipo_prod`, `casa`, `qntde_emp`) VALUES
(12, 177, 66, '2020-03-29 19:10:39', '2020-03-29 19:14:20', 1, 2, 1, NULL),
(13, 140, 160, '2020-03-29 19:48:41', '2020-03-29 19:49:10', 1, 3, 2, NULL),
(14, 140, 160, '2020-03-29 19:49:20', '2020-03-29 19:49:47', 1, 3, 2, NULL),
(15, 140, 160, '2020-03-29 19:49:54', '2020-03-29 19:51:18', 1, 3, 2, NULL),
(16, 140, 160, '2020-03-29 19:52:06', '2020-03-29 20:43:20', 1, 3, 2, NULL),
(17, 223, 66, '2020-03-29 19:53:07', '2020-03-29 20:43:23', 1, 2, 2, NULL),
(18, 177, 88, '2020-03-29 20:42:55', '2020-03-29 20:43:26', 1, 2, 1, NULL),
(19, 221, 67, '2020-03-29 20:43:03', '2020-03-29 20:43:28', 1, 2, 2, NULL),
(20, 176, 64, '2020-03-29 20:43:12', '2020-03-29 20:43:31', 1, 2, 2, NULL),
(21, 177, 64, '2020-03-30 17:18:34', '2020-03-30 17:19:14', 1, 2, 1, NULL),
(22, 140, 75, '2020-03-30 17:20:11', '2020-03-30 17:20:36', 1, 2, 2, NULL),
(23, 223, 69, '2020-03-30 17:20:19', '2020-04-07 16:54:32', 1, 2, 2, NULL),
(24, 175, 68, '2020-03-30 17:23:46', '2020-05-08 16:29:07', 1, 2, 1, NULL),
(25, 221, 88, '2020-03-30 17:24:46', '2020-03-31 01:35:41', 1, 2, 2, NULL),
(26, 176, 66, '2020-03-30 17:27:21', '2020-04-07 15:06:21', 1, 2, 2, NULL),
(27, 177, 161, '2020-03-30 18:42:56', '2020-03-30 18:43:17', 1, 3, 1, NULL),
(28, 229, 76, '2020-03-31 01:33:57', '2020-03-31 01:35:13', 1, 2, 3, NULL),
(29, 176, 76, '2020-04-02 15:08:40', '2020-04-07 16:53:52', 1, 2, 2, NULL),
(30, 223, 67, '2020-04-02 19:56:38', '2020-05-12 13:58:46', 1, 2, 2, NULL),
(31, 175, 64, '2020-04-03 23:26:05', '2020-05-08 16:02:40', 1, 2, 1, NULL),
(33, 229, 62, '2020-04-04 11:31:56', '2020-04-07 15:06:17', 1, 2, 3, NULL),
(34, 229, 160, '2020-04-07 15:04:11', '2020-04-07 15:06:13', 1, 3, 3, NULL),
(35, 176, 167, '2020-04-07 15:24:14', '2020-04-07 15:25:52', 1, 3, 3, NULL),
(36, 177, 167, '2020-04-07 15:40:16', '2020-04-09 08:53:30', 1, 3, 1, NULL),
(37, 176, 166, '2020-04-07 15:40:22', '2020-05-08 15:42:02', 1, 3, 3, NULL),
(38, 175, 161, '2020-04-07 15:40:28', '2020-04-09 15:51:34', 1, 3, 1, NULL),
(39, 223, 165, '2020-04-07 15:40:37', '2020-04-09 14:34:34', 1, 3, 2, NULL),
(40, 177, 167, '2020-04-09 11:37:18', '2020-04-09 14:34:37', 1, 3, 1, NULL),
(41, 177, 160, '2020-04-09 11:38:29', '2020-05-08 15:40:27', 1, 3, 1, NULL),
(45, 140, 165, '2020-04-09 15:18:25', '2020-04-09 15:18:54', 1, 3, 2, NULL),
(46, 223, 165, '2020-04-09 15:50:03', '2020-04-09 15:51:12', 1, 3, 2, NULL),
(47, 140, 165, '2020-04-09 15:50:47', '2020-04-09 15:51:25', 1, 3, 2, NULL),
(48, 177, 165, '2020-04-09 15:51:53', '2020-04-09 15:52:07', 1, 3, 1, NULL),
(49, 176, 88, '2020-04-09 15:52:23', '2020-05-12 14:20:55', 1, 2, 3, NULL),
(50, 177, 165, '2020-04-09 17:13:28', '2020-04-09 17:13:50', 1, 3, 1, NULL),
(52, 223, 62, '2020-04-09 17:14:36', '2020-04-22 19:30:07', 1, 2, 2, NULL),
(53, 176, 161, '2020-04-09 17:31:04', '2020-04-22 10:26:30', 1, 3, 2, NULL),
(54, 140, 161, '2020-04-22 17:36:03', '2020-05-08 15:03:29', 1, 3, 3, NULL),
(55, 140, 165, '2020-04-22 17:36:47', '2020-05-08 15:03:22', 1, 3, 3, NULL),
(56, 177, 65, '2020-04-30 14:35:10', '2020-04-30 14:35:32', 1, 2, 1, NULL),
(57, 140, 167, '2020-05-08 15:03:07', '2020-05-12 14:30:16', 1, 3, 3, NULL),
(58, 177, 194, '2020-05-08 15:55:15', '2020-05-12 14:30:42', 1, 3, 1, NULL),
(59, 176, 165, '2020-05-08 17:06:20', '2020-05-08 17:06:52', 1, 3, 2, NULL),
(60, 176, 193, '2020-05-08 17:07:06', '2020-05-08 17:07:34', 1, 3, 2, NULL),
(61, 140, 161, '2020-05-12 13:59:40', '2020-05-12 14:00:08', 1, 3, 3, NULL),
(62, 246, 160, '2020-05-12 14:19:50', '2020-05-12 14:21:29', 1, 3, 3, NULL),
(63, 140, 194, '2020-05-12 14:31:02', '2020-05-12 14:31:16', 1, 3, 3, NULL),
(64, 176, 167, '2020-05-12 14:33:24', '2020-05-12 14:33:36', 1, 3, 2, NULL),
(65, 176, 161, '2020-05-12 14:34:08', '2020-05-12 14:35:35', 1, 3, 2, NULL),
(66, 140, 167, '2020-05-12 14:34:17', '2020-05-12 14:34:35', 1, 3, 3, NULL),
(67, 234, 160, '2020-05-12 15:03:13', '2020-05-20 16:08:04', 1, 3, 2, NULL),
(75, 175, 165, '2020-05-20 16:07:43', '2020-05-20 16:25:38', 1, 3, 1, NULL),
(76, 177, 167, '2020-05-20 16:08:21', '2020-05-20 16:08:37', 1, 3, 1, NULL),
(77, 140, 65, '2020-05-20 16:19:02', '2020-06-07 22:35:49', 1, 2, 3, NULL),
(78, 140, 65, '2020-05-20 16:19:04', '2020-06-07 22:36:01', 1, 2, 3, NULL),
(79, 140, 65, '2020-05-20 16:19:40', '2020-06-07 22:36:12', 1, 2, 3, NULL),
(80, 140, 65, '2020-05-20 16:19:43', '2020-06-07 22:35:38', 1, 2, 3, NULL),
(81, 140, 161, '2020-05-20 16:19:51', '2020-05-20 16:25:30', 1, 3, 3, NULL),
(82, 140, 194, '2020-05-20 16:24:44', '2020-05-20 16:26:13', 1, 3, 3, NULL),
(84, 140, 193, '2020-05-20 16:25:00', '2020-05-20 16:26:26', 1, 3, 3, NULL),
(85, 140, 160, '2020-05-20 16:25:04', '2020-05-20 16:25:57', 1, 3, 3, NULL),
(86, 140, 166, '2020-05-20 16:25:09', '2020-05-20 16:25:48', 1, 3, 3, NULL),
(87, 140, 88, '2020-05-27 15:46:07', '2020-05-27 15:46:47', 1, 2, 3, NULL),
(88, 140, 160, '2020-05-29 14:58:59', '2020-05-29 14:59:22', 1, 3, 3, NULL),
(89, 177, 259, '2020-06-02 17:26:30', '2020-06-05 21:59:34', 1, 3, 1, NULL),
(91, 140, 160, '2020-06-05 21:20:14', '2020-06-05 21:22:45', 1, 3, 3, NULL),
(92, 140, 160, '2020-06-05 21:31:10', '2020-06-05 22:07:00', 1, 3, 3, NULL),
(93, 140, 161, '2020-06-05 21:46:14', '2020-06-05 22:09:28', 1, 3, 3, NULL),
(96, 140, 193, '2020-06-05 21:58:39', '2020-06-09 18:40:14', 1, 3, 3, NULL),
(97, 140, 194, '2020-06-05 22:00:44', '2020-06-09 18:40:24', 1, 3, 3, NULL),
(107, 223, 260, '2020-06-09 18:40:38', '2020-06-09 18:41:16', 1, 2, 2, NULL),
(108, 140, 270, '2020-06-09 21:49:23', '2020-06-09 21:49:23', 0, 1, 3, 14),
(109, 177, 263, '2020-06-10 11:33:05', '2020-06-10 11:33:05', 0, 1, 1, 6);

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_historico_entrd`
--

CREATE TABLE `tb_historico_entrd` (
  `id_entrada` int(4) NOT NULL,
  `fk_produto` int(4) NOT NULL,
  `qntde_ent` int(4) NOT NULL,
  `fk_professor` int(4) NOT NULL,
  `data_hora` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `tb_historico_entrd`
--

INSERT INTO `tb_historico_entrd` (`id_entrada`, `fk_produto`, `qntde_ent`, `fk_professor`, `data_hora`) VALUES
(3, 263, 6, 79, '2020-06-03 12:30:14'),
(4, 264, 12, 79, '2020-06-03 16:55:08'),
(5, 262, 20, 79, '2020-06-03 16:56:21'),
(6, 265, 30, 79, '2020-06-03 18:16:36'),
(7, 266, 30, 89, '2020-06-04 15:13:16'),
(8, 267, 21, 79, '2020-06-04 15:13:58'),
(9, 268, 50, 89, '2020-06-05 15:28:14'),
(10, 269, 50, 89, '2020-06-05 15:32:38'),
(11, 270, 30, 89, '2020-06-05 15:34:34'),
(12, 270, 30, 89, '2020-06-05 15:35:22'),
(13, 271, 50, 89, '2020-06-05 15:38:17'),
(14, 271, 50, 89, '2020-06-05 15:40:58'),
(15, 271, 50, 89, '2020-06-05 16:33:18'),
(16, 271, 50, 89, '2020-06-05 16:52:46'),
(17, 285, 10, 76, '2020-06-09 13:49:16');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_mensagem`
--

CREATE TABLE `tb_mensagem` (
  `fk_usuario` int(4) DEFAULT NULL,
  `acumulo` int(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `tb_mensagem`
--

INSERT INTO `tb_mensagem` (`fk_usuario`, `acumulo`) VALUES
(89, 0);

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_pedidos`
--

CREATE TABLE `tb_pedidos` (
  `id_pedido` int(4) NOT NULL,
  `data_hora_pedido` datetime DEFAULT NULL,
  `data_hora_resolvido` datetime DEFAULT NULL,
  `fk_usuario` int(4) DEFAULT NULL,
  `fk_demanda` int(4) DEFAULT NULL,
  `status` int(4) DEFAULT NULL,
  `fk_responsavel` int(4) DEFAULT NULL,
  `obs_pedido` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `tb_pedidos`
--

INSERT INTO `tb_pedidos` (`id_pedido`, `data_hora_pedido`, `data_hora_resolvido`, `fk_usuario`, `fk_demanda`, `status`, `fk_responsavel`, `obs_pedido`) VALUES
(18, '2020-06-18 14:29:29', '2020-06-22 19:07:20', 89, 2, 1, 79, 'Help'),
(19, '2020-06-18 14:30:01', '2020-06-18 17:38:08', 89, 1, 1, 79, ''),
(20, '2020-06-18 15:24:41', '2020-06-22 18:56:41', 89, 2, 1, 79, 'Socorro, ajuda'),
(21, '2020-06-18 16:10:49', '2020-06-25 15:06:34', 89, 4, 2, 79, ''),
(22, '2020-06-18 16:30:53', '2020-06-18 18:09:46', 89, 5, 1, 79, 'Help me!!!!!!!!!!!!!!!!!!!!!!!!!!'),
(23, '2020-06-22 14:09:42', '2020-06-22 14:10:31', 89, 2, 1, 79, 'Urgente'),
(24, '2020-06-22 14:49:10', '2020-06-22 17:01:06', 89, 1, 2, 79, ''),
(25, '2020-06-22 18:09:35', NULL, 89, 4, 0, 79, ''),
(26, '2020-06-22 18:30:02', NULL, 89, 3, 0, 79, ''),
(27, '2020-06-22 18:31:01', NULL, 89, 3, 0, 79, ''),
(28, '2020-06-22 18:52:38', '2020-06-22 18:52:56', 89, 4, 1, 79, 'Teste'),
(29, '2020-06-25 14:05:05', '2020-06-25 14:22:33', 89, 1, 1, 79, 'Urgente, preciso de ajuda.');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_produtos`
--

CREATE TABLE `tb_produtos` (
  `id_produto` int(4) NOT NULL,
  `nome` varchar(65) CHARACTER SET latin1 DEFAULT NULL,
  `medidas` varchar(60) CHARACTER SET latin1 DEFAULT NULL,
  `qntde` float DEFAULT NULL,
  `estoque_min` int(4) DEFAULT NULL,
  `retornavel` int(4) DEFAULT NULL,
  `obs` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `tipo` int(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Despejando dados para a tabela `tb_produtos`
--

INSERT INTO `tb_produtos` (`id_produto`, `nome`, `medidas`, `qntde`, `estoque_min`, `retornavel`, `obs`, `tipo`) VALUES
(62, 'LAB Prototipagem - 118', '', 0, NULL, 1, '', 2),
(64, 'Lab Notebooks - 131 (32)', '', 0, NULL, 1, '', 2),
(65, 'LAB CAD', '', 0, NULL, 1, '', 2),
(66, 'LAB 204 (15)', '', 0, NULL, 1, '', 2),
(67, 'LAB DESENHO (202) (33)', '', 0, NULL, 1, '', 2),
(68, 'LAB INFO 01 (23)', '', 0, NULL, 1, '', 2),
(69, 'LAB INFO 02 ', '', 0, NULL, 1, '', 2),
(70, 'REDES 01  (16)', '', 0, NULL, 1, '', 2),
(71, 'REDES 02', '', 0, NULL, 1, '', 2),
(72, 'TELECOM 01 (15)', '', 0, NULL, 1, '', 2),
(73, 'MODELAGEM 01', '', 0, NULL, 1, '', 2),
(74, 'MODELAGEM 02', '', 0, NULL, 1, '', 2),
(75, 'LAB COSTURA 01', '', 0, NULL, 1, '', 2),
(76, 'LAB COSTURA 02', '', 0, NULL, 1, '', 2),
(77, 'Borracha', '30mmx30mm', 22125, 2786, 0, 'pct 1kg', 1),
(78, 'Fita Adesiva Transparente', '45x50', 20, 5, 0, '', 1),
(79, 'Fita Crepe', '47x50', 20, 3, 0, '-', 1),
(80, 'Lápis de cor', '1B', 23, 43, 0, '-', 1),
(81, 'churro', 'A-G-30', 100, 31, 0, 'azul', 1),
(82, 'Borracha', 'sal', 23, 10, 0, '-', 4),
(83, '2489', '124', 0, 0, 1, '2.0', 4),
(85, 'Régua', '30cm', 112, 22, 0, '-', 1),
(86, 'TELECOM 02 (15)', '', 0, NULL, 1, '', 2),
(88, 'LAB CORTE', '', 0, 30, 1, '', 2),
(95, 'lápis de cor', '1B', 324, 234, 0, 'uni.', 1),
(102, 'Churros', '20cmx10cm', 500, 30, 0, 'goiabada', 4),
(103, 'churros', '20cmx10cm', 500, 30, 0, 'chocolate', 1),
(114, 'lápis de cor ', '12 cores', 50, 5, 0, '1 caixa', 1),
(115, 'colas bastão', 'pequenas', 50, 15, 0, '1 caixa', 1),
(116, 'colas bastão', 'medio', 35, 10, 0, '1 caixa', 1),
(117, 'colas bastão', 'Grande', 35, 10, 0, '1 caixa', 1),
(118, 'colas líquidas', 'pequena', 65, 5, 0, '1 caixa', 1),
(119, 'colas líquidas', 'media', 50, 10, 0, '1 caixa', 1),
(120, 'colas líquidas', 'Grande', 35, 15, 0, '1 caixa', 1),
(121, 'caneta hidrográficas', '16 cores', 50, 5, 0, '1 kit', 4),
(122, 'lápis pretos', 'nº 2', 500, 25, 0, '3 caixas', 1),
(124, 'borracha macia', '15x15cm', 1499, 200, 0, 'pct 1kg', 1),
(125, 'régua', '60cm', 20, 5, 0, 'pct 1kg', 1),
(126, 'régua', '90cm', 15, 2, 0, '-', 1),
(127, 'tesoura sem ponta', '5cm', 450, 50, 0, '-', 1),
(128, 'Tesoura', '21cm', 503, 75, 0, 'com ponta', 1),
(129, 'Clipes Niquelados', 'pequenos', 500, 25, 0, 'com ponta', 1),
(130, 'Clipes Niquelados ', 'n. 2/0', 500, 25, 0, 'com ponta', 1),
(131, 'Clipes Niquelados', 'n. 04', 500, 25, 0, 'com ponta', 1),
(132, 'Clipes Niquelados ', 'n. 06', 500, 25, 0, 'com ponta', 1),
(133, 'Clipes Niquelados ', 'n. 08', 500, 25, 0, '5 caixas', 1),
(134, 'Marcador de Texto Amarelo', '--', 50, 10, 0, '5 caixas', 1),
(135, 'Papel A4 ', '75g/m2 ', 500, 10, 0, '1 caixa', 1),
(136, 'Caneta esferográfica azul', '0.08cm', 50, 2, 0, 'caixa', 1),
(137, 'Caneta esferográfica pret', '0.08cm', 50, 2, 0, '1 caixa', 1),
(138, 'Caneta esferográfica verm', '0.08cm', 50, 2, 0, '1 caixa', 1),
(139, 'Estilete', '9mm', 10, 2, 0, '1 caixa', 1),
(140, 'Grampeador de mesa', '20cm', 10, 2, 0, '1 caixa', 1),
(141, 'Cartolina', '50cm', 200, 2, 0, '1 caixa', 1),
(142, 'Lápis preto', '6B', 200, 15, 0, '1 caixa', 1),
(143, 'Cola branca liquida ', '90 gramas', 50, 15, 0, '1 caixa', 1),
(144, 'Lápis Borracha', 'formato do corpo cilíndrico', 50, 10, 0, '1 caixa', 1),
(145, 'inta para carimbo', '40 ml', 25, 5, 0, '1 caixa', 1),
(146, 'Caneta marca texto laranj', '0.09cm', 50, 5, 0, '1 caixa', 1),
(147, 'Caneta marca texto verde', '0.09cm', 50, 5, 0, '1 caixa', 1),
(148, 'Caneta marca texto vermel', '0.09', 50, 10, 0, '1 caixa', 1),
(149, 'Lapiseira', '0,5mm', 10, 1, 0, '1 caixa', 1),
(150, 'Corretivo líquido ', 'pequeno', 250, 15, 0, '1 caixa', 1),
(151, 'Bloco de notas', 'pequeno', 500, 10, 0, '1 caixa', 1),
(152, 'Bloco de notas azul', 'medio', 550, 251, 0, '1 caixa', 4),
(153, 'Grafite', '0,7mm', 500, 10, 0, '1 caixa', 1),
(155, 'Papel A3', '297 x 420 mm	11,7 x 16,5 pol', 1000, 50, 0, '100 resmas', 1),
(156, 'Apagador', '12cm', 1500, 5, 0, 'Plástico', 4),
(160, 'Notebook-7', '1234', 0, 0, 1, 'Lenovo ThinkPad', 3),
(161, 'Notebook-4', '24234', 0, 0, 1, '2.2', 3),
(162, 'd', 'd', 3, 3, 0, '-', 4),
(163, 'e', 'e', 2, 1, 0, '-', 4),
(164, '', '', 0, 0, 1, '', 4),
(165, 'Notebook-2', '1322', 0, 0, 1, '2.0.1', 3),
(166, 'Notebook-5', '6867', 0, 0, 1, '1.1.2', 3),
(167, 'Notebook-6', '3540', 0, 0, 1, '2.0.1', 3),
(168, 'ala teste', '', 0, 0, 1, '', 4),
(169, 'ala teste', '', 0, 0, 1, '', 4),
(170, 'Caneta esferográfica azul', '0.08mm', 60, 25, 0, 'caixa fechada', 1),
(171, 'Giz de cera 12 cores ', '20 unidades', 200, 40, 0, ' Faber Castell PT 1 UN', 1),
(172, 'Notebook-10', '3423', 0, 0, 1, '1.3.2', 4),
(173, 'Grampeador', 'pequeno', 15, 5, 0, 'Pct de 3', 4),
(174, 'Granpeador', '24/6 &26/6', 19, 20, 0, '-', 4),
(175, 'Grampeador', '24/6&26/6', 19, 2, 0, '-', 1),
(176, 'Grampeador', '24/6&28/6', 15, 1, 0, '-', 1),
(177, 'Grampeador', 'Pequeno', 10, 2, 0, 'Pacote de 3', 1),
(178, 'Notebook-10', '543654', 0, 0, 1, '2.9', 4),
(179, 'Papel cartotlina da cor v', '66x44', 200, 10, 0, '-', 4),
(180, 'Cola quente', '7,5mm', 11, 0, 0, 'pct 1kg', 1),
(181, 'ala teste', '', 0, 0, 1, '', 4),
(182, 'Notebook-51234', '51246', 0, 0, 1, '4534534.1', 4),
(183, 'Notebook-35454', '34534', 0, 0, 1, '3453453', 4),
(184, 'Notebook-434', '3454', 0, 0, 1, '345', 4),
(185, 'ala teste2', '', 0, 0, 1, '', 4),
(186, 'ala teste', '', 0, 0, 1, '', 4),
(187, 'Notebook-354', '345345', 0, 0, 1, '345345', 4),
(188, 'Caneta marca texto alaran', '0.09cm', 101, 0, 0, 'caixa', 4),
(189, 'lapis', '5cm', 57, 30, 0, '-', 1),
(190, 'Borracha azul', '20mmx30mm', 10, 1, 0, '-', 1),
(191, 'Corretivo pritt', '100ml', 20, 0, 0, '-', 1),
(192, 'sala_teste', '', 0, 0, 1, '', 2),
(193, 'Notebook-10', '300234', 0, 0, 1, '2.1.9', 3),
(194, 'Notebook-11', '432444', 0, 0, 1, '2.4', 3),
(195, 'Notebook-1', '432654', 0, 0, 1, '2.7.4', 4),
(196, 'Notebook-1', '343324', 0, 0, 1, '2.9', 4),
(197, 'Caneta Marca Texto Grifpen', '3,5mm', 30, 2, 0, 'Caixas', 1),
(198, 'Caneta Marca Texto Grifpen', '3.5mm', 10, 2, 0, 'Caixas', 1),
(199, 'Caneta Marca Texto Grifpen', '3,5mmm', 10, 2, 0, 'Caixas', 1),
(200, 'Apontador Azul BRW', '3cm', 76, 11, NULL, 'Com Depósito', 1),
(201, 'AAAAAAAAAAAAAAAAAAAAAAAAteste', '324234234', 23, 23, NULL, 'TEste', 4),
(202, 'AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAoutroteste', 'dfgd43535', 243234, 234234, NULL, 'oi', 4),
(203, 'AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAteste', 'we45345', 45345, 345345, NULL, '-', 4),
(204, 'AAAAAAAAAAAAAAAAAAAAAAAoutro', '3545fs', 23423500, 0, NULL, '34234', 4),
(205, 'AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAMAis uka', '3534', 3434, 34535, NULL, '-', 4),
(206, 'AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA', '34534534', 345, 34, NULL, '-', 4),
(207, 'AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA', '45', 345, 345, NULL, '-', 4),
(208, 'Agua doce', '34234', 234, 342, NULL, '-', 4),
(209, '', '', 0, 0, NULL, '-', 4),
(210, 'AAAAAAAAAAAAAAAAAAAAAAAA', '35345345', 1036040, 0, NULL, '-', 4),
(211, 'AAAAAAAAAAAAAAAAAAAA', '', 0, 0, NULL, '-', 4),
(212, 'AAAAAAAAAAAAAAAAAAAAAAA', '', 0, 0, NULL, '-', 4),
(213, 'AAAAAAAAAAAAAAAAAAAAAAAAAAAAA', '324444444444444', 23, 0, NULL, '-', 4),
(214, 'AAAAAAAAAAAAAAAAAAAAAAAAA', '63463345345', 345345, 0, NULL, '-', 4),
(215, 'SEMENTE', '100G', 2000, 250, NULL, '98987', 4),
(216, 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA', '3423dfsrhbrthdght', 9357, 345, NULL, '-', 4),
(217, 'AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA', '534vdfrdgbfg', 345, 453, NULL, '-', 4),
(218, 'AAAAAAAAAAAAAAAAAA', '4324gwvg', 369, 345, NULL, '-', 4),
(219, 'AAAAAAAAAAAAAAAAAAA', '4gjmg', 35, 899, NULL, '-', 4),
(220, 'AAAAAAAAAAAAAAAAAA', '546', 656, 654, NULL, 'da df', 4),
(221, 'AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA', '45', 345, 345, NULL, 'O meu', 4),
(222, 'AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA', '1235', 1234, 1234, NULL, '123', 4),
(223, 'AAAAAAAAAAAAAAAAAAAAAAAAAAAA', '453', 345, 6, NULL, '-', 4),
(224, 'AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA', '345', 43, 34, NULL, '-', 4),
(225, 'AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA', '4345', 345, 434, NULL, '-', 4),
(226, 'AAAAAAAAAAAAAAA', '435', 3, 3, NULL, '-', 4),
(227, 'AAAAAAAAAAAAAAAAAAAAAAAAAAAAAA', '43243sdf', 231, 23, NULL, '-', 4),
(228, 'AAAAAAAAAAAAAAAAAAAAAA', '1023', 12, 12, NULL, '-', 4),
(229, 'AAAAAAAAAAAteste', '354', 354, 543, NULL, 'e', 4),
(230, 'AAAAAAAAAAAAAAAAAAAAAAAAtesteloco', '423r', 234, 234, NULL, '-', 4),
(231, 'AAAAAAAAAAAAAAAAAAAAAAAAAATestekhdksc', '345345', 43, 4, NULL, '-', 4),
(232, 'AAAAAAAAAAAAAAAAAAAAAAAAAAAAoutroteste', '4 g', 768, 56, NULL, '-', 4),
(233, 'canetaA', '20cm', 30, 2, NULL, '0', 1),
(234, 'Notebook-12', '200394', 0, 0, 1, '3.3.6', 4),
(235, 'Notebook-13', '343424', 0, 0, 1, '2.9', 4),
(236, 'ala teste', '', 0, 0, 1, '', 4),
(237, 'ala teste', '', 0, 0, 1, '', 4),
(239, 'Notebook-14', '223212321232', 0, 0, 1, '3.3.6', 3),
(240, 'Notebook-13', '223210361232', 0, 0, 1, '3.4', 4),
(241, 'Notebook-13', '223212351034', 0, 0, 1, '2.9', 4),
(242, 'Notebook-13', '2312132', 0, 0, 1, '1.0', 4),
(243, 'Notebook-13', '33453', 0, 0, 1, '1.0', 4),
(244, 'Notebook-17', '546456', 0, 0, 1, '2.9', 3),
(245, 'Notebook-13', '923210361232', 0, 0, 1, '1.2', 3),
(246, 'Notebook-15', '54645609', 0, 0, 1, '2.1', 3),
(247, 'Notebook-20', '23423433', 0, 0, 1, '2.0', 3),
(248, 'Rodrigo Maia', '330kg', 0, 0, NULL, '-', 4),
(249, 'Rodrigo Maia', '300kg', 0, 0, NULL, '-', 4),
(250, 'Notebook-28', '123456678767', 0, 0, 1, '1.0', 4),
(251, 'Notebook-28', '123456789101', 0, 0, 1, '2.0.2', 4),
(252, 'borrachas', '3 cm', 10, 5, NULL, 'pequena', 4),
(253, 'Pão de Açúcar', '300g', 0, 0, NULL, '-', 1),
(254, 'sssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssss', '20', 10, 5, NULL, '0', 4),
(255, 'Sala teste', '', 0, 0, 1, '', 4),
(256, 'teste', '222', 222, 22, NULL, '231', 4),
(257, 'chamequinho', '15cm x 28cm', 100, 20, NULL, '-', 1),
(258, 'medalha 1 lugar', '16cm', 10, 0, NULL, 'premiação olimpiadas', 1),
(259, 'Notebook-21', '02925002995', 0, 0, 1, 'acer 3.1 i3 2.4ghz', 3),
(260, 'CAD Costura', '', 0, 0, 1, '', 2),
(261, 'pasta suspensa documento', '48cm x 12cm', 200, 20, 0, 'arquivar documentos armário ', 1),
(262, 'Caneta em Gel Faber Castell', '0.8mm', 80, 1, NULL, '3 UN', 1),
(263, 'Caneta em GEL Trigel', '1,0mm', 0, 2, NULL, '10 UN', 1),
(264, 'Caneta em Gel Tricolor', '20', 12, 0, NULL, '-', 1),
(265, 'Cola Bastão Leonora', '10g', 30, 12, NULL, 'Unidades', 1),
(266, 'Lapis B2', '5cm', 30, 20, NULL, 'branco', 1),
(267, 'Bloco de notas', '12x6', 21, 2, NULL, '-', 1),
(268, 'Caneta ? ', '6cm', 50, 15, NULL, '1 caixa', 4),
(269, 'Caneta ?', '6cm', 50, 15, NULL, '1 caixa', 4),
(270, 'Caneta', '5cm', 46, 20, NULL, '-', 1),
(271, 'Caneta', '6cm', 200, 15, NULL, '1 caixa', 1),
(272, 'Notebook-59', '90456', 0, 0, 1, 'acer 3.1 i9', 3),
(273, 'Cantin', '', 0, 0, 1, '', 4),
(274, 'Cantin', '', 0, 0, 1, '', 4),
(275, 'Cantina', '', 0, 0, 1, '', 4),
(276, 'ala teste', '', 0, 0, 1, '', 4),
(277, 'ala teste', '', 0, 0, 1, '', 4),
(278, 'ala teste', '', 0, 0, 1, '', 4),
(279, 'ala teste', '', 0, 0, 1, '', 4),
(280, 'ala teste', '', 0, 0, 1, '', 4),
(281, 'ala teste', '', 0, 0, 1, '', 4),
(282, 'ala teste', '', 0, 0, 1, '', 4),
(283, 'teste', '', 0, 0, 1, '', 4),
(284, 'ala teste', '', 0, 0, 1, '', 4),
(285, 'Régua', '15cm', 10, 5, NULL, 'Pct de 2', 4);

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_professores`
--

CREATE TABLE `tb_professores` (
  `id_professor` int(4) NOT NULL,
  `nome_professor` varchar(120) DEFAULT NULL,
  `numero` int(4) DEFAULT NULL,
  `senha_professor` varchar(35) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `tipo_usuario` int(4) NOT NULL,
  `casa` int(4) DEFAULT NULL,
  `img` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Despejando dados para a tabela `tb_professores`
--

INSERT INTO `tb_professores` (`id_professor`, `nome_professor`, `numero`, `senha_professor`, `email`, `tipo_usuario`, `casa`, `img`) VALUES
(76, 'Rafael', 22111, '38434727c7f68a96729f4eebdae54b4b', 'rafael12425@gmail.com', 2, NULL, '5ecea625b8939.jpg'),
(79, 'Maria Eduarda Negrelli de Araujo', 10238, '5e8667a439c68f5145dd2fcbecf02209', 'mariaenegrelli@gmail.com', 2, NULL, '5ede68c45aa7f.jpeg'),
(89, 'Thiago dos santos', 1663, '2709492b695b0bee2d57550e978716b0', 'Thiagodosantos315@gmail.com', 1, NULL, '5eb46ec518108.jpg'),
(140, 'Jenzura', 5555, '-', '-', 3, 3, NULL),
(156, 'João Pedro', 5678, '18ef3a5b6757c82198942c4482c27d2d', '345345345345345', 1, NULL, NULL),
(157, 'H Miamoto', 3913, '65c6e71999a55230c2b074ca0725503c', 'professor.miamoto@gmail.com', 2, NULL, NULL),
(160, 'Rafael', 234, '84945b940112f606bfbef8b380d9cec0', 'rafaelcsmah13@gmail.com', 2, NULL, NULL),
(168, 'Elena', 12343, '92f20dafc5e5ac1c66820903c492cc04', 'elena@gmail.com', 2, NULL, NULL),
(169, 'Lucas Eduardo', 13373, 'cb0439cff2a21c6940df49d0b1890599', 'fredu2008.edu@gmail.com', 2, NULL, NULL),
(174, 'Maria', 34344, '', '', 5, 1, NULL),
(175, 'João', 33333, '', '', 3, 1, NULL),
(176, 'Hilosi', 22222, '', '', 3, 2, NULL),
(177, 'Jorge', 3453, '', '', 3, 1, NULL),
(178, 'Diovana Vitoria dos ', 41101, '25d55ad283aa400af464c76d713c07ad', 'diovanavitoria@hotmail.com', 1, NULL, NULL),
(179, 'Matheus Becker', 80903, '25d55ad283aa400af464c76d713c07ad', 'matheusbecker@gmail.com', 2, NULL, NULL),
(180, 'Rafael Roocker', 12603, '25d55ad283aa400af464c76d713c07ad', 'rafael.roocker@gmail.com', 1, NULL, NULL),
(181, 'Dani', 6482, '25d55ad283aa400af464c76d713c07ad', 'danitesti15@gmail.com', 1, NULL, NULL),
(182, 'Alberto Mendes', 51991, '25d55ad283aa400af464c76d713c07ad', 'mariaenegrelli@gmail.com', 2, NULL, NULL),
(184, 'Estevam', 9301, '25d55ad283aa400af464c76d713c07ad', 'estevam.alvess@gmail.com', 1, NULL, NULL),
(185, 'Henrique', 2420, '25d55ad283aa400af464c76d713c07ad', 'hamaral158@gmail.com', 1, NULL, NULL),
(186, 'Endrik', 78415, '25d55ad283aa400af464c76d713c07ad', 'endrikmartins9@gmail.com', 1, NULL, NULL),
(187, 'Lucas Gabriel', 4563, '25d55ad283aa400af464c76d713c07ad', 'gabriellucas570@gmail.com', 1, NULL, NULL),
(188, 'Pedro', 2587, '25d55ad283aa400af464c76d713c07ad', 'pedro.machado@gmail.com', 1, NULL, NULL),
(189, 'Albert', 78534, '25d55ad283aa400af464c76d713c07ad', 'albertocosta@yahoo.com', 1, NULL, NULL),
(190, 'Bianca', 3701, '25d55ad283aa400af464c76d713c07ad', 'biacasilva@gmail.com', 1, NULL, NULL),
(191, 'Bryan', 40155, '25d55ad283aa400af464c76d713c07ad', 'Bryan.santos3@hotmail.com', 1, NULL, NULL),
(193, 'Fernanda', 1670, '25d55ad283aa400af464c76d713c07ad', 'Fernandasantos@yahoo.com', 1, NULL, NULL),
(194, 'Gabriel', 8412, '25d55ad283aa400af464c76d713c07ad', 'gabrielpoyer@yahoo.com', 1, NULL, NULL),
(195, 'Gabriela', 4325, '25d55ad283aa400af464c76d713c07ad', 'Gabrieladsantos@gmail.com', 1, NULL, NULL),
(196, 'Ana Leticia', 31053, '25d55ad283aa400af464c76d713c07ad', 'analeticia@hotmail.com', 1, NULL, NULL),
(197, 'Helena ', 3672, '25d55ad283aa400af464c76d713c07ad', 'helena.machadosilva@yahoo.com', 1, NULL, NULL),
(198, 'Isa', 589, '25d55ad283aa400af464c76d713c07ad', 'isabela@gmail.com', 1, NULL, NULL),
(199, 'Igor', 6378, '25d55ad283aa400af464c76d713c07ad', 'Igor@yahoo.com', 1, NULL, NULL),
(200, 'Júlio César', 2486, '25f9e794323b453885f5181f1b624d0b', 'juliocesar.santos@gamil.com', 1, NULL, NULL),
(201, 'Jéssica', 1655, '25d55ad283aa400af464c76d713c07ad', 'jessicap@yahoo.com', 1, NULL, NULL),
(202, 'Keila', 20234, '25d55ad283aa400af464c76d713c07ad', 'Keilarog@gmail.com', 1, NULL, NULL),
(203, 'Kaique', 1044, '25d55ad283aa400af464c76d713c07ad', 'Kaique.diego@yahoo.com', 1, NULL, NULL),
(204, 'Luísa', 2564, '25d55ad283aa400af464c76d713c07ad', 'Luísa.silava@gmail.com', 1, NULL, NULL),
(205, 'Manuela', 3459, '25d55ad283aa400af464c76d713c07ad', 'Manuelasantos@hotmail.com', 1, NULL, NULL),
(206, 'Natália', 7516, '25d55ad283aa400af464c76d713c07ad', 'Natáliapereira@gmail.com', 1, NULL, NULL),
(207, 'Paula', 75158, '25d55ad283aa400af464c76d713c07ad', 'PaulaPoyer@yahoo.com', 1, NULL, NULL),
(208, 'Olívia', 78945, '25d55ad283aa400af464c76d713c07ad', 'Olíviasantos@gmail.com', 1, NULL, NULL),
(209, 'Oziel', 46725, '25d55ad283aa400af464c76d713c07ad', 'Ozielpoyer@hotmail.com', 1, NULL, NULL),
(210, 'Rafaela', 70396, '25d55ad283aa400af464c76d713c07ad', 'RafaelaSoares@gmail.com', 1, NULL, NULL),
(211, 'Sophia Peletier', 1002, '25d55ad283aa400af464c76d713c07ad', 'Sophiapeletier@gmail.com', 1, NULL, NULL),
(213, 'Ana Carolina', 1982, '25d55ad283aa400af464c76d713c07ad', 'Anacarolina@gmail.com', 2, NULL, NULL),
(216, 'Hades', 3675, '25d55ad283aa400af464c76d713c07ad', 'Hades.roger@gmail.com', 1, NULL, NULL),
(218, 'Perseo poyer', 78553, '25d55ad283aa400af464c76d713c07ad', 'PerseoP@hotmail.com', 1, NULL, NULL),
(219, 'Pietro henry', 16515, '25d55ad283aa400af464c76d713c07ad', 'PietroH63@hotmail.com', 1, NULL, NULL),
(220, 'Rafael', 444, '550a141f12de6341fba65b0ad0433500', 'rafaelcsmah@gmail.com', 2, NULL, NULL),
(221, 'Susana Andrade', 5789, '', '', 5, 2, NULL),
(222, 'Cesar Stati', 5535, '93bc5fd246df8aadefa6d6ab43205041', 'professor.cesar.senai@gmail.com', 2, NULL, NULL),
(223, 'Stati', 5535, '', '', 3, 2, NULL),
(224, 'Hilosi', 3113, '', '', 5, 2, NULL),
(227, 'Jorge Ciffoni', 6466, '912f858554d850926ec34abc0d240566', 'ciffoni@gmail.com', 2, NULL, NULL),
(228, 'Link', 3661, '729aecbedb7c3e0de3b361d77df703c7', 'thiagodossantos315@gmail.com', 2, NULL, NULL),
(229, 'Jessica', 2343, '', '', 3, 3, NULL),
(233, 'Rafael', 45362, '', '', 5, 2, NULL),
(234, 'Danillo', 11111, '', '', 3, 2, NULL),
(238, 'Ana Clara', 3453453, '', '', 5, 1, NULL),
(239, 'Ana Clara', 24234, '', '', 5, 1, NULL),
(240, 'Sandra', 23120, '', '', 5, 1, NULL),
(241, 'Sandra', 32340, '', '', 5, 1, NULL),
(242, 'Henry', 26601, '23147c0f7e611ad867560a51586a4381', 'Henrysantos@yahoo.com', 2, NULL, NULL),
(244, 'Sandro Alvar', 20021, '', '', 3, 2, NULL),
(245, 'Brenda', 21002, '', '', 3, 1, NULL),
(246, 'Juscelino Kubitschek', 19610, '', '', 3, 3, NULL),
(247, 'Anlize', 3423, '3a18d5a61710b2e2c072519b178a9f84', 'ana@gmail.com', 2, NULL, NULL),
(248, 'Danilo Gabriel', 21948, '114e9c8b2d8dadb3a08e1f25b98826a5', 'danigab@gmail.com', 1, NULL, NULL),
(249, 'Ber', 0, '', '', 5, 1, NULL),
(251, 'Kin', 345345, '', '', 5, 1, NULL),
(252, 'lorenzo almeida', 16023, '9e11b9d4794d5a5c04d7d62005fc0a7f', 'Maria@gmail.teste', 2, NULL, NULL),
(253, 'Sarah Eduarda Cordei', 20239, '306f538b933f4739fd60d29d972720db', 'saraheduarda@gmail.com', 1, NULL, NULL),
(256, 'Cezar Jenzura', 12345, 'd11e5848962dc05fbc954dfb72e01944', 'cezarjenzura@gmail.com', 2, NULL, NULL),
(257, 'Rodrigo', 55777, '', '', 5, 3, NULL),
(258, 'josefina fabris', 20046, '2bd950f3d18ae5465220bd587a57af19', 'pcbr4in@hotmail.com', 1, NULL, NULL),
(262, 'Diego', 7618, '7efa81c19c8bed799c2d39ecebcbc59f', 'diegofernado@hotmail.com', 1, NULL, NULL),
(263, 'Henrique', 3049, '80a49cd55e95bda9ffe27d6373f3c9dd', 'henriquediego@gmail.com', 1, NULL, NULL),
(264, 'Henrique', 30495286, 'c8c4efb529877bebbc183f22dedf173b', 'henriquediego@gmail.com', 1, NULL, NULL),
(265, 'Henrique', 3048, 'f04c0ecb74b0bcd79d14583d64d83497', 'henriquepedro@gmail.com', 1, NULL, NULL),
(266, 'Hilosi', 3906, '', '', 5, 2, NULL),
(267, 'Denis', 90834, '', '', 3, 1, NULL),
(268, 'Frederico', 66991, 'e05ae65f35842e98535c30913c8653b7', 'Ffredpoy@gmail.com', 2, NULL, NULL),
(269, 'Umberto', 23233, '21261f7ee9153dce8f16eebacaeea2b9', 'mariaenegrelli@gmail.com', 2, NULL, NULL),
(270, 'Umbert', 12332, 'aa5811518cdb5a4c5e786dfde4462a59', 'mariaenegrelli@gmail.com', 2, NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_tipos`
--

CREATE TABLE `tb_tipos` (
  `id_tipo` int(4) NOT NULL,
  `descricao` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `tb_tipos`
--

INSERT INTO `tb_tipos` (`id_tipo`, `descricao`) VALUES
(1, 'generico'),
(2, 'chave'),
(3, 'notebook'),
(4, 'inativo');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tipo_user`
--

CREATE TABLE `tipo_user` (
  `tipo_usuario` int(4) NOT NULL,
  `nome_usuario` varchar(35) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Despejando dados para a tabela `tipo_user`
--

INSERT INTO `tipo_user` (`tipo_usuario`, `nome_usuario`) VALUES
(1, 'Colaborador'),
(2, 'Administrador'),
(3, 'professor'),
(5, 'inativo');

--
-- Índices de tabelas apagadas
--

--
-- Índices de tabela `casa`
--
ALTER TABLE `casa`
  ADD PRIMARY KEY (`id_casa`);

--
-- Índices de tabela `tb_demanda`
--
ALTER TABLE `tb_demanda`
  ADD PRIMARY KEY (`id_demanda`);

--
-- Índices de tabela `tb_emprestimos`
--
ALTER TABLE `tb_emprestimos`
  ADD PRIMARY KEY (`id_emprestimo`),
  ADD KEY `fk_professor` (`fk_professor`),
  ADD KEY `fk_produtos_idx` (`fk_produto`),
  ADD KEY `casafk` (`casa`),
  ADD KEY `tipo_emp_fk` (`tipo_prod`);

--
-- Índices de tabela `tb_historico_emp`
--
ALTER TABLE `tb_historico_emp`
  ADD PRIMARY KEY (`id_emprestimo`),
  ADD KEY `fk_professor` (`fk_professor`),
  ADD KEY `fk_produto` (`fk_produto`),
  ADD KEY `casa` (`casa`),
  ADD KEY `tipo_hist_fk` (`tipo_prod`);

--
-- Índices de tabela `tb_historico_entrd`
--
ALTER TABLE `tb_historico_entrd`
  ADD PRIMARY KEY (`id_entrada`),
  ADD KEY `produto_fk` (`fk_produto`),
  ADD KEY `professor_fk` (`fk_professor`);

--
-- Índices de tabela `tb_pedidos`
--
ALTER TABLE `tb_pedidos`
  ADD PRIMARY KEY (`id_pedido`),
  ADD KEY `fk_usuario` (`fk_usuario`),
  ADD KEY `FKdemanda` (`fk_demanda`);

--
-- Índices de tabela `tb_produtos`
--
ALTER TABLE `tb_produtos`
  ADD PRIMARY KEY (`id_produto`),
  ADD KEY `id_tipofk` (`tipo`);

--
-- Índices de tabela `tb_professores`
--
ALTER TABLE `tb_professores`
  ADD PRIMARY KEY (`id_professor`),
  ADD KEY `FK_tipo` (`tipo_usuario`),
  ADD KEY `fk_casa_idx` (`casa`);

--
-- Índices de tabela `tb_tipos`
--
ALTER TABLE `tb_tipos`
  ADD PRIMARY KEY (`id_tipo`);

--
-- Índices de tabela `tipo_user`
--
ALTER TABLE `tipo_user`
  ADD PRIMARY KEY (`tipo_usuario`);

--
-- AUTO_INCREMENT de tabelas apagadas
--

--
-- AUTO_INCREMENT de tabela `tb_demanda`
--
ALTER TABLE `tb_demanda`
  MODIFY `id_demanda` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `tb_emprestimos`
--
ALTER TABLE `tb_emprestimos`
  MODIFY `id_emprestimo` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=110;

--
-- AUTO_INCREMENT de tabela `tb_historico_entrd`
--
ALTER TABLE `tb_historico_entrd`
  MODIFY `id_entrada` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de tabela `tb_pedidos`
--
ALTER TABLE `tb_pedidos`
  MODIFY `id_pedido` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT de tabela `tb_produtos`
--
ALTER TABLE `tb_produtos`
  MODIFY `id_produto` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=286;

--
-- AUTO_INCREMENT de tabela `tb_professores`
--
ALTER TABLE `tb_professores`
  MODIFY `id_professor` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=271;

--
-- AUTO_INCREMENT de tabela `tb_tipos`
--
ALTER TABLE `tb_tipos`
  MODIFY `id_tipo` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `tipo_user`
--
ALTER TABLE `tipo_user`
  MODIFY `tipo_usuario` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Restrições para dumps de tabelas
--

--
-- Restrições para tabelas `tb_emprestimos`
--
ALTER TABLE `tb_emprestimos`
  ADD CONSTRAINT `casafk` FOREIGN KEY (`casa`) REFERENCES `casa` (`id_casa`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_produtos` FOREIGN KEY (`fk_produto`) REFERENCES `tb_produtos` (`id_produto`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `tb_emprestimos_ibfk_1` FOREIGN KEY (`fk_professor`) REFERENCES `tb_professores` (`id_professor`),
  ADD CONSTRAINT `tipo_emp_fk` FOREIGN KEY (`tipo_prod`) REFERENCES `tb_tipos` (`id_tipo`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restrições para tabelas `tb_historico_emp`
--
ALTER TABLE `tb_historico_emp`
  ADD CONSTRAINT `tb_historico_emp_ibfk_1` FOREIGN KEY (`fk_professor`) REFERENCES `tb_professores` (`id_professor`),
  ADD CONSTRAINT `tb_historico_emp_ibfk_2` FOREIGN KEY (`fk_produto`) REFERENCES `tb_produtos` (`id_produto`),
  ADD CONSTRAINT `tb_historico_emp_ibfk_3` FOREIGN KEY (`casa`) REFERENCES `casa` (`id_casa`),
  ADD CONSTRAINT `tipo_hist_fk` FOREIGN KEY (`tipo_prod`) REFERENCES `tb_tipos` (`id_tipo`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restrições para tabelas `tb_historico_entrd`
--
ALTER TABLE `tb_historico_entrd`
  ADD CONSTRAINT `produto_fk` FOREIGN KEY (`fk_produto`) REFERENCES `tb_produtos` (`id_produto`),
  ADD CONSTRAINT `professor_fk` FOREIGN KEY (`fk_professor`) REFERENCES `tb_professores` (`id_professor`);

--
-- Restrições para tabelas `tb_pedidos`
--
ALTER TABLE `tb_pedidos`
  ADD CONSTRAINT `FKdemanda` FOREIGN KEY (`fk_demanda`) REFERENCES `tb_demanda` (`id_demanda`),
  ADD CONSTRAINT `tb_pedidos_ibfk_1` FOREIGN KEY (`fk_usuario`) REFERENCES `tb_professores` (`id_professor`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restrições para tabelas `tb_produtos`
--
ALTER TABLE `tb_produtos`
  ADD CONSTRAINT `id_tipofk` FOREIGN KEY (`tipo`) REFERENCES `tb_tipos` (`id_tipo`);

--
-- Restrições para tabelas `tb_professores`
--
ALTER TABLE `tb_professores`
  ADD CONSTRAINT `fk_casa` FOREIGN KEY (`casa`) REFERENCES `casa` (`id_casa`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_user` FOREIGN KEY (`tipo_usuario`) REFERENCES `tipo_user` (`tipo_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

