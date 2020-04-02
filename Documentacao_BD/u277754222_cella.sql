-- phpMyAdmin SQL Dump
-- version 4.9.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 20-Mar-2020 às 13:13
-- Versão do servidor: 10.2.30-MariaDB
-- versão do PHP: 7.2.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `u277754222_cella`
--
CREATE DATABASE IF NOT EXISTS `u277754222_cella` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE `u277754222_cella`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `casa`
--

DROP TABLE IF EXISTS `casa`;
CREATE TABLE `casa` (
  `id_casa` int(4) NOT NULL,
  `nome_casa` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `casa`
--

INSERT INTO `casa` (`id_casa`, `nome_casa`) VALUES
(1, 'SESI'),
(2, 'SENAI'),
(3, 'IEL');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_emprestimos`
--

DROP TABLE IF EXISTS `tb_emprestimos`;
CREATE TABLE `tb_emprestimos` (
  `id_emprestimo` int(4) NOT NULL,
  `fk_professor` int(4) NOT NULL,
  `fk_produto` int(4) NOT NULL,
  `data_hora_emprestimo` datetime DEFAULT NULL,
  `data_hora_devolucao` datetime DEFAULT NULL,
  `retornavel` int(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_gerente`
--

DROP TABLE IF EXISTS `tb_gerente`;
CREATE TABLE `tb_gerente` (
  `id_professor` int(4) DEFAULT NULL,
  `nome_gerente` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_produtos`
--

DROP TABLE IF EXISTS `tb_produtos`;
CREATE TABLE `tb_produtos` (
  `id_produto` int(4) NOT NULL,
  `nome` varchar(25) CHARACTER SET latin1 DEFAULT NULL,
  `medidas` varchar(60) CHARACTER SET latin1 DEFAULT NULL,
  `qntde` float DEFAULT NULL,
  `estoque_min` int(4) DEFAULT NULL,
  `retornavel` int(4) DEFAULT NULL,
  `obs` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `tipo` int(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `tb_produtos`
--

INSERT INTO `tb_produtos` (`id_produto`, `nome`, `medidas`, `qntde`, `estoque_min`, `retornavel`, `obs`, `tipo`) VALUES
(62, 'LAB Prototipagem - 118', '', 0, NULL, 1, '', 2),
(63, 'Lab Maq. Costura - 130', '', 0, NULL, 1, '', 2),
(64, 'Lab Notebooks - 131 (32)', '', 0, NULL, 1, '', 2),
(65, 'LAB CAD 132 (15)', '', 0, NULL, 1, '', 2),
(66, 'LAB 204 (15)', '', 0, NULL, 1, '', 2),
(67, 'LAB DESENHO (202) (33)', '', 0, NULL, 1, '', 2),
(68, 'LAB INFO 01 (23)', '', 0, NULL, 1, '', 2),
(69, 'LAB INFO 02 (22)', '', 0, NULL, 1, '', 2),
(70, 'REDES 01  (16)', '', 0, NULL, 1, '', 2),
(71, 'REDES 02  (16)', '', 0, NULL, 1, '', 2),
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
(82, 'Borracha', 'sal', 23, 10, 0, '-', 1),
(83, '24', '124', 0, 0, 1, '2.0', 3),
(84, '563453455', '563453455', 0, 0, 1, '2.0 ghz 2tb hd', 3),
(85, 'Régua', '30cm', 112, 22, 0, '-', 1),
(86, 'TELECOM 02 (15)', '', 0, NULL, 1, '', 2),
(87, '067', '12365478', 0, 0, 1, 'cocoricoco', 3),
(88, 'LAB CORTE', '', 0, 30, 1, '', 2),
(95, 'lápis de cor', '1B', 324, 234, 0, 'uni.', 1),
(101, '5', '2345112', 0, 0, 1, '1.0', 3),
(102, 'Churros', '20cmx10cm', 500, 30, 0, 'goiabada', 1),
(103, 'churros', '20cmx10cm', 500, 30, 0, 'chocolate', 1),
(114, 'lápis de cor ', '12 cores', 50, 5, 0, '1 caixa', 1),
(115, 'colas bastão', 'pequenas', 50, 15, 0, '1 caixa', 1),
(116, 'colas bastão', 'medio', 35, 10, 0, '1 caixa', 1),
(117, 'colas bastão', 'Grande', 35, 10, 0, '1 caixa', 1),
(118, 'colas líquidas', 'pequena', 65, 5, 0, '1 caixa', 1),
(119, 'colas líquidas', 'media', 50, 10, 0, '1 caixa', 1),
(120, 'colas líquidas', 'Grande', 35, 15, 0, '1 caixa', 1),
(121, 'caneta hidrográficas', '16 cores', 50, 5, 0, '1 kit', 1),
(122, 'lápis pretos', 'nº 2', 500, 25, 0, '3 caixas', 1),
(123, 'apontador com depósito', '10x10cm', 250, 20, 0, '-', 1),
(124, 'borracha macia', '15x15cm', 1500, 200, 0, 'pct 1kg', 1),
(125, 'régua', '60cm', 20, 5, 0, 'pct 1kg', 1),
(126, 'régua', '90cm', 15, 2, 0, '-', 1),
(127, 'tesoura sem ponta', '5cm', 450, 50, 0, '-', 1),
(128, 'Tesoura', '21cm', 500, 75, 0, 'com ponta', 1),
(129, 'Clipes Niquelados', 'pequenos', 500, 25, 0, 'com ponta', 1),
(130, 'Clipes Niquelados ', 'n. 2/0', 500, 25, 0, 'com ponta', 1),
(131, 'Clipes Niquelados', 'n. 04', 500, 25, 0, 'com ponta', 1),
(132, 'Clipes Niquelados ', 'n. 06', 500, 25, 0, 'com ponta', 1),
(133, 'Clipes Niquelados ', 'n. 08', 500, 25, 0, '5 caixas', 1),
(134, 'Marcador de Texto Amarelo', '--', 50, 10, 0, '5 caixas', 1),
(135, 'Papel A4 ', '75g/m2 ', 500, 10, 0, '1 caixa', 1),
(136, 'Caneta esferográfica azul', '0.08cm', 50, 2, 0, '1 caixa', 1),
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
(152, 'Bloco de notas colorido', 'medio', 5000, 250, 0, '1 caixa', 1),
(153, 'Grafite', '0,7mm', 500, 10, 0, '1 caixa', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_professores`
--

DROP TABLE IF EXISTS `tb_professores`;
CREATE TABLE `tb_professores` (
  `id_professor` int(4) NOT NULL,
  `nome_professor` varchar(20) DEFAULT NULL,
  `numero` int(4) DEFAULT NULL,
  `senha_professor` varchar(35) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `tipo_usuario` int(4) NOT NULL,
  `casa` int(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tb_professores`
--

INSERT INTO `tb_professores` (`id_professor`, `nome_professor`, `numero`, `senha_professor`, `email`, `tipo_usuario`, `casa`) VALUES
(76, 'Rafael', 22111, '38434727c7f68a96729f4eebdae54b4b', 'rafael12425@gmail.co', 2, NULL),
(79, 'Cris', 10238, 'edbce914409ab6a733e2e527fbe4349b', 'cris.com', 2, NULL),
(89, 'Thiago dos Santos', 1663, '8c278462dc2f486dd9697edc17eff391', 'Thiagodosantos315@gmail.com', 2, NULL),
(137, 'Frederico', 13372, '6645068e6f232fb2910d10c5b81c7d09', 'frederico.poy@sistemafiep.org.br', 1, NULL),
(140, 'Jenzura', 5555, '-', '-', 3, 2),
(156, 'João Pedro', 5678, '18ef3a5b6757c82198942c4482c27d2d', '345345345345345', 1, NULL),
(157, 'H Miamoto', 3913, '65c6e71999a55230c2b074ca0725503c', 'professor.miamoto@gmail.com', 2, NULL),
(160, 'Rafael', 234, '84945b940112f606bfbef8b380d9cec0', 'rafaelcsmah13@gmail.com', 2, NULL),
(168, 'Elena', 12343, '92f20dafc5e5ac1c66820903c492cc04', 'elena@gmail.com', 2, NULL),
(169, 'Lucas Eduardo', 13373, 'cb0439cff2a21c6940df49d0b1890599', 'fredu2008.edu@gmail.com', 2, NULL),
(174, 'Maria', 34344, '', '', 3, 1),
(175, 'João', 23423, '', '', 3, 1),
(176, 'Bernadete', 23232, '', '', 3, 2),
(177, 'Jorge', 3453, '', '', 3, 1),
(178, 'Diovana Vitoria dos ', 41101, '25d55ad283aa400af464c76d713c07ad', 'diovanavitoria@hotmail.com', 1, NULL),
(179, 'Matheus Becker', 80903, '25d55ad283aa400af464c76d713c07ad', 'matheusbecker@gmail.com', 2, NULL),
(180, 'Rafael Roocker', 12603, '25d55ad283aa400af464c76d713c07ad', 'rafael.roocker@gmail.com', 1, NULL),
(181, 'Dani', 6482, '25d55ad283aa400af464c76d713c07ad', 'danitesti15@gmail.com', 1, NULL),
(182, 'Nicolas Popovicz', 3179, '25d55ad283aa400af464c76d713c07ad', 'nicolaspopovicz@gmail.com', 1, NULL),
(183, 'Gustavo de Lima', 5319, '25d55ad283aa400af464c76d713c07ad', 'guflima@hotmail.com', 1, NULL),
(184, 'Estevam', 9301, '25d55ad283aa400af464c76d713c07ad', 'estevam.alvess@gmail.com', 1, NULL),
(185, 'Henrique', 2420, '25d55ad283aa400af464c76d713c07ad', 'hamaral158@gmail.com', 1, NULL),
(186, 'Endrik', 78415, '25d55ad283aa400af464c76d713c07ad', 'endrikmartins9@gmail.com', 1, NULL),
(187, 'Lucas Gabriel', 4563, '25d55ad283aa400af464c76d713c07ad', 'gabriellucas570@gmail.com', 1, NULL),
(188, 'Pedro', 2587, '25d55ad283aa400af464c76d713c07ad', 'pedro.machado@gmail.com', 1, NULL),
(189, ' Alberto', 7853, '25d55ad283aa400af464c76d713c07ad', 'albertocosta@yahoo.com', 1, NULL),
(190, 'Bianca', 3701, '25d55ad283aa400af464c76d713c07ad', 'biacasilva@gmail.com', 1, NULL),
(191, 'Bryan', 40155, '25d55ad283aa400af464c76d713c07ad', 'Bryan.santos3@hotmail.com', 1, NULL),
(192, 'Carol', 4028, '25d55ad283aa400af464c76d713c07ad', 'carol.pereirasilva@gmail.com', 1, NULL),
(193, 'Fernanda', 1670, '25d55ad283aa400af464c76d713c07ad', 'Fernandasantos@yahoo.com', 1, NULL),
(194, 'Gabriel', 8412, '25d55ad283aa400af464c76d713c07ad', 'gabrielpoyer@yahoo.com', 1, NULL),
(195, 'Gabriela', 4325, '25d55ad283aa400af464c76d713c07ad', 'Gabrieladsantos@gmail.com', 1, NULL),
(196, 'Ana Leticia', 31053, '25d55ad283aa400af464c76d713c07ad', 'analeticia@hotmail.com', 1, NULL),
(197, 'Helena ', 3672, '25d55ad283aa400af464c76d713c07ad', 'helena.machadosilva@yahoo.com', 1, NULL),
(198, 'Isa', 589, '25d55ad283aa400af464c76d713c07ad', 'isabela@gmail.com', 1, NULL),
(199, 'Igor', 6378, '25d55ad283aa400af464c76d713c07ad', 'Igor@yahoo.com', 1, NULL),
(200, 'Júlio César', 2486, '25f9e794323b453885f5181f1b624d0b', 'juliocesar.santos@gamil.com', 1, NULL),
(201, 'Jéssica', 1655, '25d55ad283aa400af464c76d713c07ad', 'jessicap@yahoo.com', 1, NULL),
(202, 'Keila', 20234, '25d55ad283aa400af464c76d713c07ad', 'Keilarog@gmail.com', 1, NULL),
(203, 'Kaique', 1044, '25d55ad283aa400af464c76d713c07ad', 'Kaique.diego@yahoo.com', 1, NULL),
(204, 'Luísa', 2564, '25d55ad283aa400af464c76d713c07ad', 'Luísa.silava@gmail.com', 1, NULL),
(205, 'Manuela', 3459, '25d55ad283aa400af464c76d713c07ad', 'Manuelasantos@hotmail.com', 1, NULL),
(206, 'Natália', 7516, '25d55ad283aa400af464c76d713c07ad', 'Natáliapereira@gmail.com', 1, NULL),
(207, 'Paula', 75158, '25d55ad283aa400af464c76d713c07ad', 'PaulaPoyer@yahoo.com', 1, NULL),
(208, 'Olívia', 78945, '25d55ad283aa400af464c76d713c07ad', 'Olíviasantos@gmail.com', 1, NULL),
(209, 'Oziel', 46725, '25d55ad283aa400af464c76d713c07ad', 'Ozielpoyer@hotmail.com', 1, NULL),
(210, 'Rafaela', 70396, '25d55ad283aa400af464c76d713c07ad', 'RafaelaSoares@gmail.com', 1, NULL),
(211, 'Sophia Peletier', 1002, '25d55ad283aa400af464c76d713c07ad', 'Sophiapeletier@gmail.com', 1, NULL),
(212, 'Samuel', 7518, '25d55ad283aa400af464c76d713c07ad', 'Samuelpedro@yahoo.com', 1, NULL),
(213, 'Ana Carolina', 1983, '25d55ad283aa400af464c76d713c07ad', 'Anacarolina@gmail.com', 1, NULL),
(214, 'Dafny Leithardt de O', 3618, '25d55ad283aa400af464c76d713c07ad', 'DafnyLeithardt.oliveira@gmail.com', 1, NULL),
(215, 'Thayná Soares', 85418, '25d55ad283aa400af464c76d713c07ad', 'ThaynáS@gmail.com', 1, NULL),
(216, 'Hades', 3675, '25d55ad283aa400af464c76d713c07ad', 'Hades.roger@gmail.com', 1, NULL),
(217, 'Henry', 6531, '25d55ad283aa400af464c76d713c07ad', 'Henrysantos@yahoo.com', 1, NULL),
(218, 'Perseo poyer', 78553, '25d55ad283aa400af464c76d713c07ad', 'PerseoP@hotmail.com', 1, NULL),
(219, 'Pietro henry', 16515, '25d55ad283aa400af464c76d713c07ad', 'PietroH63@hotmail.com', 1, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_tipos`
--

DROP TABLE IF EXISTS `tb_tipos`;
CREATE TABLE `tb_tipos` (
  `id_tipo` int(4) NOT NULL,
  `descricao` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `tb_tipos`
--

INSERT INTO `tb_tipos` (`id_tipo`, `descricao`) VALUES
(1, 'generico'),
(2, 'chave'),
(3, 'notebook');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipo_user`
--

DROP TABLE IF EXISTS `tipo_user`;
CREATE TABLE `tipo_user` (
  `tipo_usuario` int(4) NOT NULL,
  `nome_usuario` varchar(35) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tipo_user`
--

INSERT INTO `tipo_user` (`tipo_usuario`, `nome_usuario`) VALUES
(1, 'colaborador'),
(2, 'administrador'),
(3, 'professor');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `casa`
--
ALTER TABLE `casa`
  ADD PRIMARY KEY (`id_casa`);

--
-- Índices para tabela `tb_emprestimos`
--
ALTER TABLE `tb_emprestimos`
  ADD PRIMARY KEY (`id_emprestimo`),
  ADD KEY `fk_professor` (`fk_professor`),
  ADD KEY `fk_produtos_idx` (`fk_produto`);

--
-- Índices para tabela `tb_gerente`
--
ALTER TABLE `tb_gerente`
  ADD KEY `cod_gerentefk` (`id_professor`);

--
-- Índices para tabela `tb_produtos`
--
ALTER TABLE `tb_produtos`
  ADD PRIMARY KEY (`id_produto`),
  ADD KEY `id_tipofk` (`tipo`);

--
-- Índices para tabela `tb_professores`
--
ALTER TABLE `tb_professores`
  ADD PRIMARY KEY (`id_professor`),
  ADD KEY `FK_tipo` (`tipo_usuario`),
  ADD KEY `fk_casa_idx` (`casa`);

--
-- Índices para tabela `tb_tipos`
--
ALTER TABLE `tb_tipos`
  ADD PRIMARY KEY (`id_tipo`);

--
-- Índices para tabela `tipo_user`
--
ALTER TABLE `tipo_user`
  ADD PRIMARY KEY (`tipo_usuario`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `tb_produtos`
--
ALTER TABLE `tb_produtos`
  MODIFY `id_produto` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=154;

--
-- AUTO_INCREMENT de tabela `tb_professores`
--
ALTER TABLE `tb_professores`
  MODIFY `id_professor` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=220;

--
-- AUTO_INCREMENT de tabela `tb_tipos`
--
ALTER TABLE `tb_tipos`
  MODIFY `id_tipo` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `tipo_user`
--
ALTER TABLE `tipo_user`
  MODIFY `tipo_usuario` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `tb_emprestimos`
--
ALTER TABLE `tb_emprestimos`
  ADD CONSTRAINT `fk_produtos` FOREIGN KEY (`fk_produto`) REFERENCES `tb_produtos` (`id_produto`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `tb_emprestimos_ibfk_1` FOREIGN KEY (`fk_professor`) REFERENCES `tb_professores` (`id_professor`);

--
-- Limitadores para a tabela `tb_gerente`
--
ALTER TABLE `tb_gerente`
  ADD CONSTRAINT `cod_gerentefk` FOREIGN KEY (`id_professor`) REFERENCES `tb_professores` (`id_professor`);

--
-- Limitadores para a tabela `tb_produtos`
--
ALTER TABLE `tb_produtos`
  ADD CONSTRAINT `id_tipofk` FOREIGN KEY (`tipo`) REFERENCES `tb_tipos` (`id_tipo`);

--
-- Limitadores para a tabela `tb_professores`
--
ALTER TABLE `tb_professores`
  ADD CONSTRAINT `fk_casa` FOREIGN KEY (`casa`) REFERENCES `casa` (`id_casa`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_user` FOREIGN KEY (`tipo_usuario`) REFERENCES `tipo_user` (`tipo_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
