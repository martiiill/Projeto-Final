-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 22-Jun-2018 às 13:55
-- Versão do servidor: 10.1.30-MariaDB
-- PHP Version: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vitial`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `adubo`
--

CREATE TABLE `adubo` (
  `id` int(11) NOT NULL,
  `nome` varchar(4000) DEFAULT NULL,
  `composicao` varchar(4000) DEFAULT NULL,
  `peso` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `adubo`
--

INSERT INTO `adubo` (`id`, `nome`, `composicao`, `peso`) VALUES
(1, 'MICROQUEL-AMIN TOPCAL - FERTINAGRO', 'líquido', '300gr'),
(2, 'SUPERBIA - FERTINAGRO', 'pó', '300gr');

-- --------------------------------------------------------

--
-- Estrutura da tabela `adubocampo`
--

CREATE TABLE `adubocampo` (
  `idadubocampo` int(11) NOT NULL,
  `idadubo` int(11) NOT NULL,
  `idcampo` int(11) NOT NULL,
  `idquinta` int(11) NOT NULL,
  `data` date NOT NULL,
  `descricao` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `campo`
--

CREATE TABLE `campo` (
  `id` int(11) NOT NULL,
  `nome` varchar(4000) DEFAULT NULL,
  `localizacao` text NOT NULL,
  `area` float DEFAULT NULL,
  `numero_linhas` int(11) DEFAULT NULL,
  `orientacao` varchar(4000) DEFAULT NULL,
  `quinta_id` int(11) NOT NULL,
  `utilizador_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `campo`
--

INSERT INTO `campo` (`id`, `nome`, `localizacao`, `area`, `numero_linhas`, `orientacao`, `quinta_id`, `utilizador_id`) VALUES
(1, 'Campo da Eira Velha', 'Porto', 1000, 10, 'SE', 1, 1),
(2, 'entre campos', 'Lisboa', 1000, 20, 'SN', 1, 1),
(3, 'Campo da Nevada 3', 'Ovar', 17, 20, 'SN', 1, 1),
(16, 'Campo Meu', 'Aveiro', 500, 20, 'SN', 1, 1),
(54, 'Campo Teste', 'Ermesinde', 10, 11, 'NS', 5, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `casta`
--

CREATE TABLE `casta` (
  `id` int(11) NOT NULL,
  `nome` varchar(4000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `casta`
--

INSERT INTO `casta` (`id`, `nome`) VALUES
(1, 'Loureiro\r\n'),
(2, 'Arinto\r\n'),
(3, 'Avesso\r\n'),
(4, 'Azal'),
(5, 'Alvarinho'),
(6, 'Trajadura'),
(7, 'Pedrená'),
(8, 'Espadeiro'),
(9, 'Padeiro'),
(10, 'Vinhão'),
(11, 'Tinta Roriz'),
(12, 'Borraçal');

-- --------------------------------------------------------

--
-- Estrutura da tabela `castacampo`
--

CREATE TABLE `castacampo` (
  `idcastacampo` int(11) NOT NULL,
  `iduva` int(11) NOT NULL,
  `idcasta` int(11) NOT NULL,
  `idcampo` int(11) NOT NULL,
  `idquinta` int(11) NOT NULL,
  `numero_vides` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `castacampo`
--

INSERT INTO `castacampo` (`idcastacampo`, `iduva`, `idcasta`, `idcampo`, `idquinta`, `numero_vides`) VALUES
(1, 1, 1, 1, 1, 5),
(8, 2, 4, 2, 1, 12),
(12, 1, 1, 3, 1, 19),
(14, 1, 1, 16, 1, 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `dadosmeteodia`
--

CREATE TABLE `dadosmeteodia` (
  `id` int(11) NOT NULL,
  `idcampo` int(11) NOT NULL,
  `tempMax` float NOT NULL,
  `tempMin` float NOT NULL,
  `humidade` float NOT NULL,
  `dia` int(31) NOT NULL,
  `mes` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `dadosmeteodia`
--

INSERT INTO `dadosmeteodia` (`id`, `idcampo`, `tempMax`, `tempMin`, `humidade`, `dia`, `mes`) VALUES
(1, 3, 21, 20, 68, 3, 5),
(2, 3, 21, 20, 68, 1, 5),
(3, 3, 21, 20, 68, 2, 5),
(4, 3, 21, 20, 68, 4, 5),
(6, 3, 21, 20, 68, 6, 5),
(7, 3, 21, 20, 68, 7, 5),
(8, 3, 21, 20, 68, 8, 5),
(9, 3, 21, 20, 68, 9, 5),
(11, 1, 30, 23, 48, 18, 6),
(21, 3, 21, 20, 68, 11, 5),
(22, 3, 21, 20, 68, 10, 5),
(24, 3, 21, 20, 68, 12, 5),
(25, 3, 21, 20, 68, 13, 5),
(26, 3, 21, 20, 68, 14, 5),
(33, 3, 21, 20, 68, 18, 5),
(35, 3, 21, 20, 68, 19, 5),
(36, 3, 21, 20, 68, 20, 5),
(37, 3, 21, 20, 68, 21, 5),
(38, 3, 21, 20, 68, 22, 5),
(39, 3, 21, 20, 68, 23, 5),
(50, 3, 21, 20, 68, 30, 5),
(51, 3, 21, 20, 68, 31, 5),
(56, 3, 21, 20, 68, 17, 5),
(57, 3, 21, 20, 68, 15, 5),
(59, 3, 21, 20, 68, 5, 5),
(60, 3, 21, 20, 68, 24, 5),
(65, 2, 23, 22, 64, 21, 6),
(66, 3, 21, 20, 68, 25, 5),
(75, 3, 21, 20, 68, 29, 5),
(77, 3, 21, 20, 68, 26, 5),
(82, 3, 21, 20, 68, 28, 5),
(88, 3, 21, 20, 68, 27, 5),
(99, 3, 21, 20, 68, 16, 5);

-- --------------------------------------------------------

--
-- Estrutura da tabela `dadosmeteomes`
--

CREATE TABLE `dadosmeteomes` (
  `id` int(11) NOT NULL,
  `idcampo` int(11) NOT NULL,
  `tempMedio` float NOT NULL,
  `humidadeMedia` float NOT NULL,
  `mes` int(12) NOT NULL,
  `ano` year(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `dadosmeteomes`
--

INSERT INTO `dadosmeteomes` (`id`, `idcampo`, `tempMedio`, `humidadeMedia`, `mes`, `ano`) VALUES
(1, 2, 23.5, 70.6, 4, 2018),
(2, 2, 22.4, 80.4, 3, 2018),
(3, 2, 24.4, 60.7, 5, 2018),
(4, 2, 16, 65, 5, 2013),
(5, 2, 14, 74, 3, 2017),
(6, 2, 17, 62, 4, 2017),
(7, 2, 19, 69, 5, 2017),
(8, 2, 22, 64, 6, 2017),
(9, 2, 12, 77, 3, 2016),
(10, 2, 14, 78, 4, 2016),
(12, 2, 16, 75, 5, 2016),
(13, 2, 20, 67, 6, 2016),
(14, 2, 13, 71, 3, 2015),
(15, 2, 16, 74, 4, 2015),
(16, 2, 19, 60, 5, 2015),
(17, 2, 21, 61, 6, 2015),
(18, 2, 13, 75, 3, 2014),
(19, 2, 15, 80, 4, 2014),
(20, 2, 18, 66, 5, 2014),
(21, 2, 20, 68, 6, 2014),
(22, 2, 13, 82, 3, 2013),
(23, 2, 14, 70, 4, 2013),
(24, 2, 16, 65, 5, 2013),
(25, 2, 20, 60, 6, 2013),
(93, 3, 20.5, 68, 5, 2018),
(99, 2, 17, 78, 6, 2018);

-- --------------------------------------------------------

--
-- Estrutura da tabela `doenca`
--

CREATE TABLE `doenca` (
  `id` int(11) NOT NULL,
  `nome` varchar(4000) DEFAULT NULL,
  `caracteristicas` varchar(4000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `doenca`
--

INSERT INTO `doenca` (`id`, `nome`, `caracteristicas`) VALUES
(1, 'Esca - Síndrome de Esca', 'Conjunto do fungos parasitários que destroem a lenhina dos tecidos mortos'),
(2, 'Escoriose', 'urge em manchas na vinha, quer pelo uso de varas infectadas na enxertia quer pela transmissão pelas tesouras de poda'),
(3, 'Eutipiose', 'Corte transversal do tronco ou bracos'),
(4, 'Flavescência Dourada', 'Manifesta-se nas partes aereas da videira'),
(5, 'Míldio', 'Principal doenca da videira na regiao, caracterizando-se com manchas'),
(6, 'Oídio', 'Manchas de controno irregular, sem aspeto \"oleoso\"'),
(7, 'Podrião Cinzenta', 'Lesões nos órgãos verdes, em particular nos bagos que exsudam algum suco, são excelentes portas de entrada para este fungo'),
(8, 'Pordrião Radicular', 'Dois fungos responsáveis pela podriao da raiz'),
(9, 'Vírus do Nó Curto ou Urticado', 'Vírus que contamina o solo');

-- --------------------------------------------------------

--
-- Estrutura da tabela `poda`
--

CREATE TABLE `poda` (
  `id` int(11) NOT NULL,
  `nome` varchar(4000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `poda`
--

INSERT INTO `poda` (`id`, `nome`) VALUES
(1, 'Poda Verde'),
(2, 'Poda Curta'),
(3, 'Poda Longa'),
(4, 'Poda Mista'),
(5, 'Poda de Frutificação');

-- --------------------------------------------------------

--
-- Estrutura da tabela `podacampo`
--

CREATE TABLE `podacampo` (
  `idpodacampo` int(11) NOT NULL,
  `idpoda` int(11) NOT NULL,
  `idcampo` int(11) NOT NULL,
  `idquinta` int(11) NOT NULL,
  `data` date NOT NULL,
  `descricao` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `podacampo`
--

INSERT INTO `podacampo` (`idpodacampo`, `idpoda`, `idcampo`, `idquinta`, `data`, `descricao`) VALUES
(25, 1, 1, 1, '2018-06-04', 'poda verde test'),
(42, 2, 1, 1, '2018-06-04', 'poda curta etse'),
(20, 4, 1, 1, '2018-05-07', 'teste alterar descricao poda');

-- --------------------------------------------------------

--
-- Estrutura da tabela `quinta`
--

CREATE TABLE `quinta` (
  `id` int(11) NOT NULL,
  `nome` varchar(4000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `quinta`
--

INSERT INTO `quinta` (`id`, `nome`) VALUES
(1, 'Escrita'),
(2, 'Oleiros'),
(3, 'Carvalheiras'),
(4, 'Balazar'),
(5, 'Alborrinha');

-- --------------------------------------------------------

--
-- Estrutura da tabela `rega`
--

CREATE TABLE `rega` (
  `id` int(11) NOT NULL,
  `nome` varchar(4000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `rega`
--

INSERT INTO `rega` (`id`, `nome`) VALUES
(1, 'Rega pé'),
(2, 'Rega Gota-a-gota');

-- --------------------------------------------------------

--
-- Estrutura da tabela `regacampo`
--

CREATE TABLE `regacampo` (
  `idregacampo` int(11) NOT NULL,
  `idcampo` int(11) NOT NULL,
  `idquinta` int(11) NOT NULL,
  `idrega` int(11) NOT NULL,
  `data` date NOT NULL,
  `descricao` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `regacampo`
--

INSERT INTO `regacampo` (`idregacampo`, `idcampo`, `idquinta`, `idrega`, `data`, `descricao`) VALUES
(44, 1, 1, 1, '2018-05-15', 'add tarefa 2'),
(26, 1, 1, 1, '2018-06-01', 'uno'),
(1, 1, 1, 1, '2018-06-04', 'dasdsad');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tratamento`
--

CREATE TABLE `tratamento` (
  `id` int(11) NOT NULL,
  `nome` varchar(4000) DEFAULT NULL,
  `funcao` varchar(4000) DEFAULT NULL,
  `dimensao` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tratamento`
--

INSERT INTO `tratamento` (`id`, `nome`, `funcao`, `dimensao`) VALUES
(1, 'Programa de eliminação do insecto vector', 'Limitar a sua dispersão', 300),
(2, 'Vindima', 'Fazer a vindima', 3000),
(3, 'Exnfore', 'Tratamento da doença oídio', 30),
(5, 'Cimoxanil', 'Combate o míldio', 180),
(6, 'Ciprodinil', 'Combate á prodrião cinzenta', 37.5),
(7, 'Folpete', 'Combate á escoriose. Dois tratamentos na Primavera.', 100);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tratamentocampo`
--

CREATE TABLE `tratamentocampo` (
  `idtratamentocampo` int(11) NOT NULL,
  `idcampo` int(11) NOT NULL,
  `idquinta` int(11) NOT NULL,
  `idtratamento` int(11) NOT NULL,
  `data` date NOT NULL,
  `descricao` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tratamentocampo`
--

INSERT INTO `tratamentocampo` (`idtratamentocampo`, `idcampo`, `idquinta`, `idtratamento`, `data`, `descricao`) VALUES
(1, 1, 1, 5, '2018-06-21', 'Tratamento efetuado por pessoa contratada');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tratamentodoenca`
--

CREATE TABLE `tratamentodoenca` (
  `idtratamento` int(11) NOT NULL,
  `iddoenca` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tratamentodoenca`
--

INSERT INTO `tratamentodoenca` (`idtratamento`, `iddoenca`) VALUES
(1, 1),
(3, 6),
(5, 5),
(6, 7),
(7, 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `utilizador`
--

CREATE TABLE `utilizador` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `palavrapasse` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `utilizador`
--

INSERT INTO `utilizador` (`id`, `nome`, `palavrapasse`) VALUES
(1, 'anamartins', 'anamartins');

-- --------------------------------------------------------

--
-- Estrutura da tabela `uva`
--

CREATE TABLE `uva` (
  `id` int(11) NOT NULL,
  `nome` varchar(4000) DEFAULT NULL,
  `descricao` varchar(50) NOT NULL,
  `idcasta` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `uva`
--

INSERT INTO `uva` (`id`, `nome`, `descricao`, `idcasta`) VALUES
(1, 'Uva 1', 'Branco', 1),
(2, 'Uva Nova Teste', 'Uma nova coisa', 4),
(3, 'Nova Uva', 'Um novo tipo', 4),
(54, 'Uva Dourada', 'Rara', 2),
(55, 'Uva Escura', 'É mais escura', 3),
(60, 'Uva Sessenta', 'Um novo tipo de uva sessenta', 5),
(70, 'Uva Branca e Preta', 'Contem duas cores', 6);

-- --------------------------------------------------------

--
-- Estrutura da tabela `vindimacampo`
--

CREATE TABLE `vindimacampo` (
  `id` int(11) NOT NULL,
  `idcampo` int(11) NOT NULL,
  `idquinta` int(11) NOT NULL,
  `quantidade` float NOT NULL,
  `ano` year(4) NOT NULL,
  `descricao` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `vindimacampo`
--

INSERT INTO `vindimacampo` (`id`, `idcampo`, `idquinta`, `quantidade`, `ano`, `descricao`) VALUES
(1, 1, 1, 9, 2014, 'Vindima Efetuada'),
(2, 1, 1, 9, 2013, 'Vindima Efetuada'),
(3, 1, 1, 9.9, 2015, 'Vindima Efetuada'),
(4, 1, 1, 10, 2016, 'Vindima Efetuada'),
(5, 1, 1, 12.5, 2017, 'Vindima Efetuada'),
(6, 2, 1, 9.4, 2013, 'Vindima Efetuada '),
(7, 2, 1, 9.2, 2014, 'Vindima Efetuada'),
(8, 2, 1, 9.5, 2015, 'Vindima Efetuada'),
(9, 2, 1, 10.5, 2016, 'Vindima Efetuada'),
(10, 2, 1, 12, 2017, 'Vindima Efetuada'),
(11, 3, 1, 9.3, 2013, 'Vindima Efetuada'),
(12, 3, 1, 9.1, 2014, 'Vindima Efetuada'),
(13, 3, 1, 9.3, 2015, 'Vindima Efetuada'),
(14, 3, 1, 9, 2016, 'Vindima Efetuada'),
(15, 3, 1, 12.4, 2017, 'Vindima Efetuada');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adubo`
--
ALTER TABLE `adubo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `adubocampo`
--
ALTER TABLE `adubocampo`
  ADD PRIMARY KEY (`idadubo`,`idadubocampo`) USING BTREE,
  ADD KEY `efetua_campo_fk` (`idcampo`,`idquinta`);

--
-- Indexes for table `campo`
--
ALTER TABLE `campo`
  ADD PRIMARY KEY (`id`,`quinta_id`) USING BTREE,
  ADD KEY `campo_quinta_fk` (`quinta_id`),
  ADD KEY `campo_utilizador_fk` (`utilizador_id`) USING BTREE;

--
-- Indexes for table `casta`
--
ALTER TABLE `casta`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `castacampo`
--
ALTER TABLE `castacampo`
  ADD PRIMARY KEY (`iduva`,`idcasta`,`numero_vides`,`idcastacampo`) USING BTREE,
  ADD UNIQUE KEY `idcastacampo` (`idcastacampo`),
  ADD KEY `contem_campo_fk` (`idcampo`,`idquinta`);

--
-- Indexes for table `dadosmeteodia`
--
ALTER TABLE `dadosmeteodia`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `ver_dados__FK` (`idcampo`);

--
-- Indexes for table `dadosmeteomes`
--
ALTER TABLE `dadosmeteomes`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `ver_dados_mes_FK` (`idcampo`);

--
-- Indexes for table `doenca`
--
ALTER TABLE `doenca`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `poda`
--
ALTER TABLE `poda`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `podacampo`
--
ALTER TABLE `podacampo`
  ADD PRIMARY KEY (`idpoda`,`idcampo`,`idquinta`,`data`),
  ADD KEY `executa_campo_fk` (`idcampo`,`idquinta`);

--
-- Indexes for table `quinta`
--
ALTER TABLE `quinta`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rega`
--
ALTER TABLE `rega`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `regacampo`
--
ALTER TABLE `regacampo`
  ADD PRIMARY KEY (`idcampo`,`idquinta`,`idrega`,`data`,`idregacampo`) USING BTREE,
  ADD UNIQUE KEY `idregacampo` (`idregacampo`),
  ADD KEY `realiza_rega_fk` (`idrega`);

--
-- Indexes for table `tratamento`
--
ALTER TABLE `tratamento`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tratamentocampo`
--
ALTER TABLE `tratamentocampo`
  ADD PRIMARY KEY (`idcampo`,`idquinta`,`idtratamento`,`data`,`idtratamentocampo`) USING BTREE,
  ADD KEY `ocorre_tratamento_fk` (`idtratamento`);

--
-- Indexes for table `tratamentodoenca`
--
ALTER TABLE `tratamentodoenca`
  ADD PRIMARY KEY (`idtratamento`,`iddoenca`),
  ADD KEY `trata_doenca_fk` (`iddoenca`);

--
-- Indexes for table `utilizador`
--
ALTER TABLE `utilizador`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `uva`
--
ALTER TABLE `uva`
  ADD PRIMARY KEY (`id`,`idcasta`),
  ADD KEY `uva_casta_fk` (`idcasta`);

--
-- Indexes for table `vindimacampo`
--
ALTER TABLE `vindimacampo`
  ADD PRIMARY KEY (`id`,`idcampo`,`ano`) USING BTREE,
  ADD KEY `realizar_vindima_FK` (`idcampo`,`idquinta`);

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `adubocampo`
--
ALTER TABLE `adubocampo`
  ADD CONSTRAINT `efetua_adubo_fk` FOREIGN KEY (`idadubo`) REFERENCES `adubo` (`id`),
  ADD CONSTRAINT `efetua_campo_fk` FOREIGN KEY (`idcampo`,`idquinta`) REFERENCES `campo` (`id`, `quinta_id`);

--
-- Limitadores para a tabela `campo`
--
ALTER TABLE `campo`
  ADD CONSTRAINT `campo_quinta_fk` FOREIGN KEY (`quinta_id`) REFERENCES `quinta` (`id`),
  ADD CONSTRAINT `campo_utilizador_fk` FOREIGN KEY (`utilizador_id`) REFERENCES `utilizador` (`id`);

--
-- Limitadores para a tabela `castacampo`
--
ALTER TABLE `castacampo`
  ADD CONSTRAINT `contem_campo_fk` FOREIGN KEY (`idcampo`,`idquinta`) REFERENCES `campo` (`id`, `quinta_id`),
  ADD CONSTRAINT `contem_uva_fk` FOREIGN KEY (`iduva`,`idcasta`) REFERENCES `uva` (`id`, `idcasta`);

--
-- Limitadores para a tabela `dadosmeteodia`
--
ALTER TABLE `dadosmeteodia`
  ADD CONSTRAINT `ver_dados__FK` FOREIGN KEY (`idcampo`) REFERENCES `campo` (`id`);

--
-- Limitadores para a tabela `dadosmeteomes`
--
ALTER TABLE `dadosmeteomes`
  ADD CONSTRAINT `ver_dados_mes_FK` FOREIGN KEY (`idcampo`) REFERENCES `campo` (`id`);

--
-- Limitadores para a tabela `podacampo`
--
ALTER TABLE `podacampo`
  ADD CONSTRAINT `executa_campo_fk` FOREIGN KEY (`idcampo`,`idquinta`) REFERENCES `campo` (`id`, `quinta_id`),
  ADD CONSTRAINT `executa_poda_fk` FOREIGN KEY (`idpoda`) REFERENCES `poda` (`id`);

--
-- Limitadores para a tabela `regacampo`
--
ALTER TABLE `regacampo`
  ADD CONSTRAINT `realiza_campo_fk` FOREIGN KEY (`idcampo`,`idquinta`) REFERENCES `campo` (`id`, `quinta_id`),
  ADD CONSTRAINT `realiza_rega_fk` FOREIGN KEY (`idrega`) REFERENCES `rega` (`id`);

--
-- Limitadores para a tabela `tratamentocampo`
--
ALTER TABLE `tratamentocampo`
  ADD CONSTRAINT `ocorre_campo_fk` FOREIGN KEY (`idcampo`,`idquinta`) REFERENCES `campo` (`id`, `quinta_id`),
  ADD CONSTRAINT `ocorre_tratamento_fk` FOREIGN KEY (`idtratamento`) REFERENCES `tratamento` (`id`);

--
-- Limitadores para a tabela `tratamentodoenca`
--
ALTER TABLE `tratamentodoenca`
  ADD CONSTRAINT `trata_doenca_fk` FOREIGN KEY (`iddoenca`) REFERENCES `doenca` (`id`),
  ADD CONSTRAINT `trata_tratamento_fk` FOREIGN KEY (`idtratamento`) REFERENCES `tratamento` (`id`);

--
-- Limitadores para a tabela `uva`
--
ALTER TABLE `uva`
  ADD CONSTRAINT `uva_casta_fk` FOREIGN KEY (`idcasta`) REFERENCES `casta` (`id`);

--
-- Limitadores para a tabela `vindimacampo`
--
ALTER TABLE `vindimacampo`
  ADD CONSTRAINT `realizar_vindima_FK` FOREIGN KEY (`idcampo`,`idquinta`) REFERENCES `campo` (`id`, `quinta_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
