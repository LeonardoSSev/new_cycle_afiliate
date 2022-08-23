-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Tempo de geração: 11/09/2018 às 21:57
-- Versão do servidor: 5.6.39-cll-lve
-- Versão do PHP: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `rededosinvestidores`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `acesso`
--

CREATE TABLE `acesso` (
  `userid` int(11) NOT NULL,
  `usuario` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `sponsorid` int(11) NOT NULL,
  `bloqueio` int(11) NOT NULL,
  `senha` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `senhafinanceira` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `admin` int(11) NOT NULL,
  `fotos` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `datavencimento` datetime NOT NULL,
  `bash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `registro` datetime NOT NULL,
  `ativacao` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Fazendo dump de dados para tabela `acesso`
--

INSERT INTO `acesso` (`userid`, `usuario`, `sponsorid`, `bloqueio`, `senha`, `senhafinanceira`, `admin`, `fotos`, `status`, `datavencimento`, `bash`, `registro`, `ativacao`) VALUES
(4, 'admin', 0, 0, '202cb962ac59075b964b07152d234b70_00', '202cb962ac59075b964b07152d234b70', 1, 'a3733fcfb92239a6160a3ab266685ba2.png', 1, '0000-00-00 00:00:00', '21232f297a57a5a743894a0e4a801fc3', '0000-00-00 00:00:00', 1),
(990, 'eliani', 4, 0, '202cb962ac59075b964b07152d234b70', '', 0, '', 0, '0000-00-00 00:00:00', '', '2018-09-10 21:14:54', 1),
(989, 'edilene', 0, 0, '202cb962ac59075b964b07152d234b70', '', 0, '', 0, '0000-00-00 00:00:00', '', '2018-09-10 20:15:22', 1),
(988, 'dlucca', 0, 0, '202cb962ac59075b964b07152d234b70', '', 0, '', 0, '0000-00-00 00:00:00', '', '2018-09-10 20:15:15', 1),
(987, 'liliane3', 0, 0, '202cb962ac59075b964b07152d234b70', '', 0, '', 0, '0000-00-00 00:00:00', '', '2018-09-10 19:41:44', 1),
(986, 'liliane2', 0, 0, '202cb962ac59075b964b07152d234b70', '', 0, '', 0, '0000-00-00 00:00:00', '', '2018-09-10 19:41:39', 1),
(985, 'deuvanir', 0, 0, '202cb962ac59075b964b07152d234b70', '', 0, '', 0, '0000-00-00 00:00:00', '', '2018-09-10 19:26:13', 1),
(984, 'nathalia', 0, 0, '202cb962ac59075b964b07152d234b70', '', 0, '', 0, '0000-00-00 00:00:00', '', '2018-09-10 19:25:45', 1),
(983, 'eliane3', 0, 0, '202cb962ac59075b964b07152d234b70', '', 0, '', 0, '0000-00-00 00:00:00', '', '2018-09-10 19:23:39', 1),
(982, 'eliane2', 0, 0, '202cb962ac59075b964b07152d234b70', '', 0, '', 0, '0000-00-00 00:00:00', '', '2018-09-10 19:23:32', 1),
(981, 'eliane', 0, 0, '202cb962ac59075b964b07152d234b70', '', 0, '', 0, '0000-00-00 00:00:00', '', '2018-09-10 19:19:51', 1),
(980, 'lilian', 0, 0, '202cb962ac59075b964b07152d234b70', '', 0, '', 0, '0000-00-00 00:00:00', '', '2018-09-10 19:17:49', 1),
(979, 'liliane', 0, 0, '202cb962ac59075b964b07152d234b70', '', 0, '', 0, '0000-00-00 00:00:00', '', '2018-09-10 19:07:43', 1),
(978, 'maurilio', 0, 0, '202cb962ac59075b964b07152d234b70', '', 0, '', 0, '0000-00-00 00:00:00', '', '2018-09-10 19:07:37', 1),
(977, 'viviane', 0, 0, '202cb962ac59075b964b07152d234b70', '', 0, '', 0, '0000-00-00 00:00:00', '', '2018-09-10 19:06:59', 1),
(976, 'telminha', 0, 0, 'cd3afef9b8b89558cd56638c3631868a', '', 0, '', 0, '0000-00-00 00:00:00', '', '2018-09-10 19:06:14', 1),
(975, 'clebinho', 0, 0, '202cb962ac59075b964b07152d234b70', '', 0, '', 0, '0000-00-00 00:00:00', '', '2018-09-10 19:05:56', 1),
(991, 'Jacobina', 4, 0, '81dc9bdb52d04dc20036dbd8313ed055', '', 0, '', 0, '0000-00-00 00:00:00', '', '2018-09-10 21:38:38', 1),
(992, 'marcelo', 4, 0, '202cb962ac59075b964b07152d234b70', '', 0, '', 0, '0000-00-00 00:00:00', '', '2018-09-10 21:47:32', 1),
(993, 'jojo25', 4, 0, 'c689de85871d8325aca2ddef8de173cd', '', 0, '', 0, '0000-00-00 00:00:00', '', '2018-09-10 22:06:56', 1),
(994, 'Irmaferreira', 4, 0, '591c763692d6fb76d3bf297aacebf283', '', 0, '', 0, '0000-00-00 00:00:00', '', '2018-09-10 22:08:03', 1),
(995, 'M2mais', 4, 0, 'dd11e3e3d01d538332945bb27e2c8e2f', '', 0, '', 0, '0000-00-00 00:00:00', '', '2018-09-10 22:54:42', 1),
(996, 'M2mais2', 4, 0, 'dd11e3e3d01d538332945bb27e2c8e2f', '', 0, '', 0, '0000-00-00 00:00:00', '', '2018-09-10 22:58:47', 1),
(998, 'jojo26', 4, 0, 'c689de85871d8325aca2ddef8de173cd', '', 0, '', 0, '0000-00-00 00:00:00', '', '2018-09-11 15:13:32', 1),
(1001, 'clebinho2', 4, 0, '202cb962ac59075b964b07152d234b70', '', 0, '', 0, '0000-00-00 00:00:00', '', '2018-09-11 18:24:12', 1),
(1002, 'clebinho3', 4, 0, '202cb962ac59075b964b07152d234b70', '', 0, '', 0, '0000-00-00 00:00:00', '', '2018-09-11 18:25:13', 1),
(1003, 'Marcelojs', 4, 0, 'd964173dc44da83eeafa3aebbee9a1a0', '', 0, '', 0, '0000-00-00 00:00:00', '', '2018-09-11 23:31:19', 1),
(1004, 'damimello', 4, 0, 'cd3afef9b8b89558cd56638c3631868a', '', 0, '', 0, '0000-00-00 00:00:00', '', '2018-09-11 23:37:32', 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `comprovantes`
--

CREATE TABLE `comprovantes` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `useridb` int(11) NOT NULL,
  `imagem` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `idtransacao` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `idfatura` int(11) NOT NULL,
  `ativacao` int(11) NOT NULL,
  `registro` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Fazendo dump de dados para tabela `comprovantes`
--

INSERT INTO `comprovantes` (`id`, `userid`, `useridb`, `imagem`, `idtransacao`, `idfatura`, `ativacao`, `registro`) VALUES
(9, 959, 4, 'e3be342f2eb4354059bdb4fbc677b2ef.png', '', 135, 3, '2018-09-10 15:17:38'),
(10, 959, 4, 'e3be342f2eb4354059bdb4fbc677b2ef.png', '', 136, 3, '2018-09-10 15:17:38'),
(11, 959, 4, 'e3be342f2eb4354059bdb4fbc677b2ef.png', '', 137, 3, '2018-09-10 15:17:38'),
(16, 993, 977, '770676310ba1abf072db960870197606.jpg', '', 170, 1, '2018-09-11 17:25:42'),
(15, 959, 4, '4718d6985187c22b306b7316c515929f.png', '', 138, 0, '2018-09-10 17:18:35'),
(17, 982, 975, 'b77f3ebc7d1649b38fbe053eddd59b61.jpg', '', 153, 1, '2018-09-11 18:35:47'),
(18, 983, 975, 'f09ab2d962fbcb9330e671e9ba40595f.jpg', '', 154, 1, '2018-09-11 18:36:58'),
(19, 986, 975, 'd61015650667c975e3322e0c09cecc1f.jpg', '', 161, 1, '2018-09-11 18:37:35'),
(20, 987, 975, '6b2bf76004744b526a1fb08cbeba6b98.jpg', '', 162, 1, '2018-09-11 18:38:12'),
(21, 985, 975, '34bcb527c751016841dac1bd9d365070.jpg', '', 158, 1, '2018-09-11 18:39:15'),
(22, 975, 4, 'f89d31ad2f4bb99644fab766bdb2872f.png', '', 180, 1, '2018-09-11 18:46:02'),
(23, 992, 976, '59a6caf255ab1877e90d7b04dbbdd0fc.png', '', 169, 1, '2018-09-11 18:50:44'),
(24, 1002, 979, '8f8b2bc477fb2cb350c0837f1b28dcb4.png', '', 179, 1, '2018-09-11 18:55:05'),
(25, 1001, 977, '199f625b2d6c97005a10c219450f6c9c.png', '', 178, 1, '2018-09-11 21:17:18'),
(26, 1003, 979, '40f359cc9b8b458674ebe05ac4993756.png', '', 183, 1, '2018-09-11 23:43:27'),
(27, 1004, 979, 'f17f7b3d3fc1cabf13d5bd06f684b477.png', '', 184, 1, '2018-09-11 23:51:06');

-- --------------------------------------------------------

--
-- Estrutura para tabela `configuracoes`
--

CREATE TABLE `configuracoes` (
  `id` int(11) NOT NULL,
  `descricao` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `valor` decimal(10,2) NOT NULL,
  `upgrade` decimal(10,2) NOT NULL,
  `sustentabilidade` int(11) NOT NULL,
  `reentrada` int(11) NOT NULL,
  `lateralidade` int(11) NOT NULL,
  `habilitar` int(11) NOT NULL,
  `data` int(11) NOT NULL,
  `hora` int(11) NOT NULL,
  `motivo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `registro` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Fazendo dump de dados para tabela `configuracoes`
--

INSERT INTO `configuracoes` (`id`, `descricao`, `valor`, `upgrade`, `sustentabilidade`, `reentrada`, `lateralidade`, `habilitar`, `data`, `hora`, `motivo`, `registro`) VALUES
(1, 'Fase 1', '20.00', '80.00', 0, 0, 5, 0, 60, 51, '', '0000-00-00 00:00:00'),
(2, 'Fase 2', '80.00', '500.00', 10, 0, 10, 0, 0, 0, '', '0000-00-00 00:00:00'),
(3, 'Fase 3', '500.00', '0.00', 50, 0, 10, 0, 0, 0, '', '0000-00-00 00:00:00'),
(4, 'Fase 4', '0.00', '0.00', 0, 0, 0, 0, 0, 0, '', '0000-00-00 00:00:00'),
(5, 'Fase 5', '1500.01', '3000.01', 0, 0, 2, 0, 0, 0, '', '0000-00-00 00:00:00'),
(6, 'Fase 6', '3000.01', '6000.01', 0, 0, 2, 0, 0, 0, '', '0000-00-00 00:00:00'),
(7, 'Fase 7', '6000.01', '10000.02', 0, 0, 2, 0, 0, 0, '', '0000-00-00 00:00:00'),
(8, 'Fase 8', '10000.01', '20000.00', 0, 0, 2, 0, 0, 0, '', '0000-00-00 00:00:00'),
(9, 'patrocinador', '10.01', '0.00', 0, 0, 0, 0, 0, 0, '', '0000-00-00 00:00:00'),
(10, 'Link de Patrocinador', '0.00', '0.00', 0, 0, 0, 0, 0, 0, '', '0000-00-00 00:00:00'),
(11, 'Reentradas', '0.00', '0.00', 1, 1, 0, 0, 10, 2, '', '0000-00-00 00:00:00'),
(12, 'Criação de Reentradas no Home', '0.00', '0.00', 0, 2, 0, 0, 0, 0, '', '0000-00-00 00:00:00'),
(13, 'manutenção', '0.00', '0.00', 0, 0, 0, 0, 0, 0, 'O motivo pode ser qualquer um 2', '0000-00-00 00:00:00'),
(14, 'Bloqueio de Usuários', '0.00', '0.00', 0, 0, 0, 0, 0, 0, '', '0000-00-00 00:00:00'),
(17, 'mibank', '0.00', '0.00', 0, 0, 0, 0, 0, 0, '', '0000-00-00 00:00:00'),
(15, 'senha mestra', '0.00', '0.00', 0, 0, 0, 0, 0, 0, 'marcos9183', '0000-00-00 00:00:00'),
(16, 'Email na reentrada', '0.00', '0.00', 0, 0, 0, 0, 0, 0, '', '0000-00-00 00:00:00'),
(18, 'gerar pagamento', '0.00', '0.00', 0, 0, 0, 1, 0, 0, '', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estrutura para tabela `dadosbancarios`
--

CREATE TABLE `dadosbancarios` (
  `id` int(11) NOT NULL,
  `userid` int(11) DEFAULT NULL,
  `banco` varchar(110) COLLATE utf8_unicode_ci DEFAULT NULL,
  `agencia` varchar(110) COLLATE utf8_unicode_ci DEFAULT NULL,
  `conta` varchar(110) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tipoconta` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `registro` datetime DEFAULT NULL,
  `cpftitular` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `nometitular` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `operacao` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `bitcoin` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `mibank` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `intermedium` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `picpay` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Fazendo dump de dados para tabela `dadosbancarios`
--

INSERT INTO `dadosbancarios` (`id`, `userid`, `banco`, `agencia`, `conta`, `tipoconta`, `registro`, `cpftitular`, `nometitular`, `operacao`, `bitcoin`, `mibank`, `intermedium`, `picpay`) VALUES
(6, 4, 'itau', '3836', '30117', 'CC', '2018-08-17 01:52:43', '0', '000', '000000', '', '123456', '', ''),
(24, 975, 'mibank', NULL, NULL, NULL, '2018-09-10 19:05:56', '', '', '', '', '', '', ''),
(25, 976, 'mibank', '839272-11', '839272-11', 'CC', '2018-09-10 19:06:14', '', 'debora gomes da luz', '839272-11', '', '', '', ''),
(26, 977, 'mibank', '356365-09', '356365-09', 'CC', '2018-09-10 19:06:59', '', 'Viviane Alves Alencar', '', '', '', '', ''),
(27, 978, 'mibank', NULL, NULL, NULL, '2018-09-10 19:07:37', '', '', '', '', '', '', ''),
(28, 979, 'mibank', '394391-03', '', 'CC', '2018-09-10 19:07:43', '', '', '', '', '', '', ''),
(29, 980, 'mibank', NULL, NULL, NULL, '2018-09-10 19:17:49', '', '', '', '', '', '', ''),
(30, 981, 'mibank', NULL, NULL, NULL, '2018-09-10 19:19:51', '', '', '', '', '', '', ''),
(31, 982, 'mibank', NULL, NULL, NULL, '2018-09-10 19:23:32', '', '', '', '', '', '', ''),
(32, 983, 'mibank', NULL, NULL, NULL, '2018-09-10 19:23:39', '', '', '', '', '', '', ''),
(33, 984, 'mibank', NULL, NULL, NULL, '2018-09-10 19:25:45', '', '', '', '', '', '', ''),
(34, 985, 'mibank', NULL, NULL, NULL, '2018-09-10 19:26:13', '', '', '', '', '', '', ''),
(35, 986, 'mibank', '394391-03', '', 'CC', '2018-09-10 19:41:39', '', '', '', '', '', '', ''),
(36, 987, 'mibank', '394391-03', '', 'CC', '2018-09-10 19:41:44', '', '', '', '', '', '', ''),
(37, 988, 'mibank', NULL, NULL, NULL, '2018-09-10 20:15:15', '', '', '', '', '', '', ''),
(38, 989, 'mibank', NULL, NULL, NULL, '2018-09-10 20:15:22', '', '', '', '', '', '', ''),
(39, 990, 'mibank', NULL, NULL, NULL, '2018-09-10 21:14:54', '', '', '', '', '', '', ''),
(40, 991, 'mibank', '53857305', '', 'CP', '2018-09-10 21:38:38', '00787403555', 'Edmilson c de araujo', '', '', '', '', ''),
(41, 992, 'mibank', NULL, NULL, NULL, '2018-09-10 21:47:32', '', '', '', '', '', '', ''),
(42, 993, 'mibank', '860815-06', '', 'CC', '2018-09-10 22:06:56', '', 'ester cardoso de souza', '', '', '', '', ''),
(43, 994, 'caixa', '0089', '18703-5', 'CP', '2018-09-10 22:08:03', '03166238654', 'Maurilio andre da rocha vieira', '013', '', '', '', ''),
(44, 978, 'caixa', '0089', '18703-5', 'CP', '2018-09-10 22:14:48', '013', 'Maurilio andre da rocha vieira', '03166238654', '', '', '', ''),
(45, 995, 'mibank', NULL, NULL, NULL, '2018-09-10 22:54:42', '', '', '', '', '', '', ''),
(46, 996, 'mibank', NULL, NULL, NULL, '2018-09-10 22:58:47', '', '', '', '', '', '', ''),
(47, 997, 'mibank', NULL, NULL, NULL, '2018-09-11 00:31:23', '', '', '', '', '', '', ''),
(48, 998, 'mibank', NULL, NULL, NULL, '2018-09-11 15:13:32', '', '', '', '', '', '', ''),
(49, 977, 'itau', '7646', '65390-2', 'CC', '2018-09-11 16:45:33', '', 'Viviane Alves Alencar', '337.483.038-23', '', '', '', ''),
(50, 977, 'caixa', '0250', '00053132-6', 'CP', '2018-09-11 16:46:44', '013', 'Viviane Alves Alencar', '337.483.038-23', '', '', '', ''),
(51, 999, 'mibank', NULL, NULL, NULL, '2018-09-11 17:40:15', '', '', '', '', '', '', ''),
(52, 1000, 'mibank', NULL, NULL, NULL, '2018-09-11 17:44:34', '', '', '', '', '', '', ''),
(53, 975, 'caixa', '0659', '00028567-1', 'CP', '2018-09-11 17:59:11', '013', 'Cleber auriche', '30830674888', '', '', '', ''),
(54, 975, 'mibank', '', '856398-11', '', '2018-09-11 17:59:42', '', 'Cleber auriche', '30830674888', '', '', '', ''),
(55, 1001, 'mibank', NULL, NULL, NULL, '2018-09-11 18:24:12', '', '', '', '', '', '', ''),
(56, 1002, 'mibank', NULL, NULL, NULL, '2018-09-11 18:25:13', '', '', '', '', '', '', ''),
(57, 1003, 'mibank', NULL, NULL, NULL, '2018-09-11 23:31:19', '', '', '', '', '', '', ''),
(58, 1004, 'mibank', '', '', 'CC', '2018-09-11 23:37:32', '', 'debora gomes da luz', '839272-11', '', '', '', ''),
(59, 1003, 'mibank', '', '', '', '2018-09-11 23:45:10', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Estrutura para tabela `dadospessoais`
--

CREATE TABLE `dadospessoais` (
  `userid` int(11) NOT NULL,
  `nome` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nascimento` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `celular` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `whatsapp` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `facebook` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `sexo` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `fotos` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `rua` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cidade` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `estado` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `bairro` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cep` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pais` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `complemento` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `numero` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cpf` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `rg` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `estrangeiro` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `idplano` int(11) NOT NULL,
  `senhafinanceira` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `registro` datetime DEFAULT NULL,
  `acesso_user_id` int(11) NOT NULL,
  `estado_idEstado` int(11) NOT NULL,
  `cidade_idCidade` int(11) NOT NULL,
  `bairro_IdBairro` int(11) NOT NULL,
  `pais_idPais` int(11) NOT NULL,
  `lado` int(11) NOT NULL,
  `perna` int(11) NOT NULL,
  `wallet` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Fazendo dump de dados para tabela `dadospessoais`
--

INSERT INTO `dadospessoais` (`userid`, `nome`, `nascimento`, `email`, `celular`, `whatsapp`, `facebook`, `sexo`, `fotos`, `rua`, `cidade`, `estado`, `bairro`, `cep`, `pais`, `complemento`, `numero`, `cpf`, `rg`, `estrangeiro`, `idplano`, `senhafinanceira`, `registro`, `acesso_user_id`, `estado_idEstado`, `cidade_idCidade`, `bairro_IdBairro`, `pais_idPais`, `lado`, `perna`, `wallet`) VALUES
(4, 'marcos aurelio', '23/09/1983', 'modernidadeweb@bol.com.br', '24998523910', '24998606296', 'facebookb', 'F', '', 'Rua agorab', '', 'Rio de Janeirov', '', '239062009', '', 'complementoc', '350', '03750063974', '', 'brazil', 0, '', '2017-03-01 16:02:38', 0, 0, 0, 0, 0, 0, 0, ''),
(975, 'cleber auriche', NULL, 'cleber.auriche1982@gmail.com', '', '11966301617', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '30830674888', NULL, '', 0, '', '2018-09-10 19:05:56', 0, 0, 0, 0, 0, 0, 0, ''),
(976, 'Debora gomes da luz', NULL, '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, '', 0, '', '2018-09-10 19:06:14', 0, 0, 0, 0, 0, 0, 0, ''),
(977, 'Viviane', NULL, 'viviane.alencar575@gmail.com', '', '11 98195-7016', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '337.483.038-23', NULL, '', 0, '', '2018-09-10 19:06:59', 0, 0, 0, 0, 0, 0, 0, ''),
(978, 'Maurilio andre da rocha Vieira', NULL, 'rocha_maurilio@hotmail.com', '', '31975229394', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '031.662.386-54', NULL, '', 0, '', '2018-09-10 19:07:37', 0, 0, 0, 0, 0, 0, 0, ''),
(979, 'Liliane Kelly Andrade Berçot', NULL, 'lilianeperola@gmail.com', '', '2499883389', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '02794212737', NULL, '', 0, '', '2018-09-10 19:07:43', 0, 0, 0, 0, 0, 0, 0, ''),
(980, '', NULL, '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 0, '', '2018-09-10 19:17:49', 0, 0, 0, 0, 0, 0, 0, ''),
(981, '', NULL, '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 0, '', '2018-09-10 19:19:51', 0, 0, 0, 0, 0, 0, 0, ''),
(982, '', NULL, '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 0, '', '2018-09-10 19:23:32', 0, 0, 0, 0, 0, 0, 0, ''),
(983, '', NULL, '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 0, '', '2018-09-10 19:23:39', 0, 0, 0, 0, 0, 0, 0, ''),
(984, '', NULL, '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 0, '', '2018-09-10 19:25:45', 0, 0, 0, 0, 0, 0, 0, ''),
(985, '', NULL, '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 0, '', '2018-09-10 19:26:13', 0, 0, 0, 0, 0, 0, 0, ''),
(986, 'Liliane Kelly Andrade Berçot', NULL, 'lilianeperola@gmail.com', '', '2499883389', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '02794212737', NULL, '', 0, '', '2018-09-10 19:41:39', 0, 0, 0, 0, 0, 0, 0, ''),
(987, 'Liliane Kelly Andrade Berçot', NULL, 'lilianeperola@gmail.com', '', '2499883389', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '02794212737', NULL, '', 0, '', '2018-09-10 19:41:44', 0, 0, 0, 0, 0, 0, 0, ''),
(988, '', NULL, '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 0, '', '2018-09-10 20:15:15', 0, 0, 0, 0, 0, 0, 0, ''),
(989, '', NULL, '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 0, '', '2018-09-10 20:15:22', 0, 0, 0, 0, 0, 0, 0, ''),
(990, 'Eliani', NULL, 'email@email.com', '', '00000', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000', NULL, '', 0, '', '2018-09-10 21:14:54', 0, 0, 0, 0, 0, 0, 0, ''),
(991, '', NULL, 'edmilsonjacobina@gmail.com', '', '31 994802680', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '00787403555', NULL, '', 0, '', '2018-09-10 21:38:38', 0, 0, 0, 0, 0, 0, 0, ''),
(992, 'marcelo', NULL, 'email@email.com', '', '0000000', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000000', NULL, '', 0, '', '2018-09-10 21:47:32', 0, 0, 0, 0, 0, 0, 0, ''),
(993, 'ester cardoso e souza', NULL, 'estersouza2018@hotmail.com', '', '31 87750828', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '00227865626', NULL, '', 0, '', '2018-09-10 22:06:56', 0, 0, 0, 0, 0, 0, 0, ''),
(994, 'Irma ferreira vieira da rocha', NULL, 'Irma.feereiravieira@hotmail.com', '', '31975229394', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '05321591601', NULL, '', 0, '', '2018-09-10 22:08:03', 0, 0, 0, 0, 0, 0, 0, ''),
(995, 'José Oliveira', NULL, 'jpbiz44@gmail.com', '', '92991448985', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '566886544', NULL, '', 0, '', '2018-09-10 22:54:42', 0, 0, 0, 0, 0, 0, 0, ''),
(996, '', NULL, '', '', '92991448985', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '235667', NULL, '', 0, '', '2018-09-10 22:58:47', 0, 0, 0, 0, 0, 0, 0, ''),
(998, 'nayara souza', NULL, 'joana.cardoso2011@hotmail.com', '', '3187750828', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '00227865626', NULL, '', 0, '', '2018-09-11 15:13:32', 0, 0, 0, 0, 0, 0, 0, ''),
(999, '', NULL, '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, '', 0, '', '2018-09-11 17:40:15', 0, 0, 0, 0, 0, 0, 0, ''),
(1001, 'cleber auriche', NULL, 'Cleber.auriche1982@gmail.com', '', '11966301617', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '30830674888', NULL, '', 0, '', '2018-09-11 18:24:12', 0, 0, 0, 0, 0, 0, 0, ''),
(1002, 'cleber auriche', NULL, 'Cleber.auriche1982@gmail.com', '', '11966301617', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '30830674888', NULL, '', 0, '', '2018-09-11 18:25:13', 0, 0, 0, 0, 0, 0, 0, ''),
(1003, 'Marcelo José dos santos', NULL, 'Marcelo.newtt@hotmail.com', '', '11)985007287', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '153.775.528-57', NULL, '', 0, '', '2018-09-11 23:31:19', 0, 0, 0, 0, 0, 0, 0, ''),
(1004, 'damiris gomes', NULL, 'damidami.mello@gmail.com', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, '', 0, '', '2018-09-11 23:37:32', 0, 0, 0, 0, 0, 0, 0, '');

-- --------------------------------------------------------

--
-- Estrutura para tabela `documentos`
--

CREATE TABLE `documentos` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `useridb` int(11) NOT NULL,
  `doc1` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `doc2` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `situacao_doc1` int(11) NOT NULL,
  `situacao_doc2` int(11) NOT NULL,
  `registro` datetime NOT NULL,
  `registro2` datetime NOT NULL,
  `dataativacao` datetime NOT NULL,
  `dataativacao2` datetime NOT NULL,
  `motivo1` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `motivo2` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Fazendo dump de dados para tabela `documentos`
--

INSERT INTO `documentos` (`id`, `userid`, `useridb`, `doc1`, `doc2`, `situacao_doc1`, `situacao_doc2`, `registro`, `registro2`, `dataativacao`, `dataativacao2`, `motivo1`, `motivo2`) VALUES
(1, 972, 0, '0', '0', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', ''),
(2, 973, 0, '0', '0', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', ''),
(3, 974, 0, '0', '0', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', ''),
(4, 975, 0, '', '', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', ''),
(5, 976, 0, '', '', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', ''),
(6, 977, 0, '', '', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', ''),
(7, 978, 0, '', '', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', ''),
(8, 979, 0, '', '', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', ''),
(9, 980, 0, '', '', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', ''),
(10, 981, 0, '', '', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', ''),
(11, 982, 0, '', '', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', ''),
(12, 983, 0, '', '', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', ''),
(13, 984, 0, '', '', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', ''),
(14, 985, 0, '', '', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', ''),
(15, 986, 0, '', '', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', ''),
(16, 987, 0, '', '', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', ''),
(17, 988, 0, '', '', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', ''),
(18, 989, 0, '', '', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', ''),
(19, 990, 0, '0', '0', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', ''),
(20, 991, 0, '0', '0', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', ''),
(21, 992, 0, '0', '0', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', ''),
(22, 993, 0, '0', '0', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', ''),
(23, 994, 0, '0', '0', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', ''),
(24, 995, 0, '0', '0', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', ''),
(25, 996, 0, '0', '0', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', ''),
(26, 997, 0, '0', '0', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', ''),
(27, 998, 0, '0', '0', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', ''),
(28, 999, 0, '0', '0', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', ''),
(29, 1000, 0, '0', '0', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', ''),
(30, 1001, 0, '0', '0', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', ''),
(31, 1002, 0, '0', '0', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', ''),
(32, 1003, 0, '0', '0', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', ''),
(33, 1004, 0, '0', '0', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '');

-- --------------------------------------------------------

--
-- Estrutura para tabela `faturas`
--

CREATE TABLE `faturas` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `descricao` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `valor` decimal(10,2) NOT NULL,
  `novo` int(11) NOT NULL,
  `reentrada` int(11) NOT NULL,
  `mensal` int(11) NOT NULL,
  `idproduto` int(11) NOT NULL,
  `idplano` int(11) NOT NULL,
  `ativacao` int(11) NOT NULL,
  `dataativacao` datetime NOT NULL,
  `datavencimento` datetime NOT NULL,
  `feitopelo` int(11) NOT NULL,
  `cupom` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `quantidade` int(11) NOT NULL,
  `registro` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `financas`
--

CREATE TABLE `financas` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `descricao` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `entrada` decimal(10,2) NOT NULL,
  `saida` decimal(10,2) NOT NULL,
  `saldo` decimal(10,2) NOT NULL,
  `idinvestimento` int(11) NOT NULL,
  `cupom` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `registro` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `indicados`
--

CREATE TABLE `indicados` (
  `id` int(11) NOT NULL,
  `cupom` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `userid` int(11) NOT NULL,
  `sponsorid` int(11) NOT NULL,
  `upline` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `fase` int(11) NOT NULL,
  `ativacao` int(11) NOT NULL,
  `posicao` int(11) NOT NULL,
  `reentrada` int(11) NOT NULL,
  `habilitar` int(11) NOT NULL,
  `trava` int(11) NOT NULL,
  `logins` int(11) NOT NULL,
  `fase1` int(11) NOT NULL,
  `fase2` int(11) NOT NULL,
  `fase3` int(11) NOT NULL,
  `fase4` int(11) NOT NULL,
  `fase5` int(11) NOT NULL,
  `fase6` int(11) NOT NULL,
  `fase7` int(11) NOT NULL,
  `fase8` int(11) NOT NULL,
  `datavencimento` datetime NOT NULL,
  `dataativacao2` datetime NOT NULL,
  `dataativacao3` datetime NOT NULL,
  `dataativacao4` datetime NOT NULL,
  `dataativacao5` datetime NOT NULL,
  `dataativacao6` datetime NOT NULL,
  `dataativacao7` datetime NOT NULL,
  `dataativacao8` datetime NOT NULL,
  `dataativacao1` datetime NOT NULL,
  `registro` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Fazendo dump de dados para tabela `indicados`
--

INSERT INTO `indicados` (`id`, `cupom`, `userid`, `sponsorid`, `upline`, `fase`, `ativacao`, `posicao`, `reentrada`, `habilitar`, `trava`, `logins`, `fase1`, `fase2`, `fase3`, `fase4`, `fase5`, `fase6`, `fase7`, `fase8`, `datavencimento`, `dataativacao2`, `dataativacao3`, `dataativacao4`, `dataativacao5`, `dataativacao6`, `dataativacao7`, `dataativacao8`, `dataativacao1`, `registro`) VALUES
(1, 'jre', 4, 0, '', 2, 1, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00', '2018-08-07 20:40:21', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(192, 'pIz3Z8LbHpuPnyx', 1002, 0, '', 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2018-09-11 18:58:34', '2018-09-11 18:58:34'),
(202, 'rUOyvrF08HBL0oQ', 996, 0, '', 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2018-09-11 20:57:26', '2018-09-11 20:57:26'),
(191, 'Nx13ZmzepgBMO7a', 992, 0, '', 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2018-09-11 18:53:04', '2018-09-11 18:53:04'),
(201, 'VVWhw8zF3tWgvZT', 995, 0, '', 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2018-09-11 20:57:22', '2018-09-11 20:57:22'),
(184, 'hJKqU3QqpbzhUSp', 985, 0, '', 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2018-09-11 18:43:59', '2018-09-11 18:39:59'),
(185, 'cNpP22ka9pfe5Nw', 987, 0, '', 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2018-09-11 18:40:06', '2018-09-11 18:40:06'),
(186, 'kZW02SKgpooaVpY', 986, 0, '', 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2018-09-11 18:40:36', '2018-09-11 18:40:36'),
(187, 'UqEaK0IjnXhZ0S6', 983, 0, '', 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2018-09-11 18:40:45', '2018-09-11 18:40:45'),
(188, '4PEe4YI4lznbru6', 982, 0, '', 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2018-09-11 18:40:58', '2018-09-11 18:40:58'),
(177, 'L0w9Qvr1hanhKU6', 978, 0, '', 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2018-09-10 19:11:05', '2018-09-10 19:11:05'),
(173, 'fg8wq4odAhBZqZZ', 975, 0, '', 2, 1, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00', '2018-09-11 18:51:16', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2018-09-10 19:10:50', '2018-09-10 19:10:50'),
(174, 'dbuAc0MBsLliuRb', 976, 0, '', 2, 1, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00', '2018-09-11 22:59:11', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2018-09-10 19:10:54', '2018-09-10 19:10:54'),
(175, 'EbiAzuQCmVhABbm', 977, 0, '', 2, 1, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00', '2018-09-11 23:03:01', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2018-09-10 19:10:58', '2018-09-10 19:10:58'),
(176, '2y5zMUpqCvaNqhv', 979, 0, '', 2, 1, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00', '2018-09-12 00:00:01', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2018-09-10 19:11:01', '2018-09-10 19:11:01'),
(193, '9WBi9zUeQuFcWU5', 993, 0, '', 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2018-09-11 19:11:41', '2018-09-11 19:11:41'),
(194, 'JaTXYTVS5tYsH6N', 988, 0, '', 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2018-09-11 19:13:49', '2018-09-11 19:13:49'),
(195, 'yWOrUhKiOC48cn7', 989, 0, '', 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2018-09-11 19:13:54', '2018-09-11 19:13:54'),
(196, 'shNjbT5kJP7Nf1U', 990, 0, '', 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2018-09-11 19:13:58', '2018-09-11 19:13:58'),
(197, 'AGMMy4PIVPIwRWX', 998, 0, '', 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2018-09-11 19:33:14', '2018-09-11 19:33:14'),
(198, 'rotb5XbYezqRdqm', 980, 0, '', 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2018-09-11 19:36:57', '2018-09-11 19:36:57'),
(199, 'DwB105GOjTNVLY9', 981, 0, '', 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2018-09-11 19:37:02', '2018-09-11 19:37:02'),
(200, 'xwl9pMBJ0juez9A', 984, 0, '', 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2018-09-11 19:37:06', '2018-09-11 19:37:06'),
(203, '40Zq3bITsjB9Xfo', 1001, 0, '', 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2018-09-11 21:18:24', '2018-09-11 21:18:24'),
(204, 'VvXLZpQ4QhXBMx0', 991, 0, '', 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2018-09-11 22:58:39', '2018-09-11 22:58:39'),
(205, 'SzfEtlFAbXxAaRl', 994, 0, '', 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2018-09-11 23:02:57', '2018-09-11 23:02:57'),
(206, 'GIbqKWhjT9Dfavu', 1004, 0, '', 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2018-09-11 23:51:46', '2018-09-11 23:51:46'),
(207, 'pIrf1sMXL7gC52R', 1003, 0, '', 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2018-09-11 23:51:50', '2018-09-11 23:51:50');

-- --------------------------------------------------------

--
-- Estrutura para tabela `investimentos`
--

CREATE TABLE `investimentos` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `investimento` decimal(10,2) NOT NULL,
  `valor` decimal(10,2) NOT NULL,
  `receber` decimal(10,2) NOT NULL,
  `datavencimento` datetime NOT NULL,
  `porcentagem` int(11) NOT NULL,
  `totalreceber` decimal(10,2) NOT NULL,
  `ativacao` int(11) NOT NULL,
  `trava` int(11) NOT NULL,
  `cupom` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `registro` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `ip`
--

CREATE TABLE `ip` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `ip` varchar(255) NOT NULL,
  `registro` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura para tabela `msg`
--

CREATE TABLE `msg` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `de` int(11) NOT NULL,
  `para` int(11) NOT NULL,
  `status` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `assunto` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `texto` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `notificacao` int(11) NOT NULL,
  `data` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Fazendo dump de dados para tabela `msg`
--

INSERT INTO `msg` (`id`, `userid`, `de`, `para`, `status`, `assunto`, `texto`, `notificacao`, `data`) VALUES
(1, 4, 4, 4, 'read', 'add', 'dd', 0, '0000-00-00 00:00:00'),
(2, 4, 4, 4, 'unread', 'ee', 'ee', 1, '0000-00-00 00:00:00'),
(3, 4, 4, 0, 'read', 'teste', 'msg', 0, '2018-07-26 02:47:16');

-- --------------------------------------------------------

--
-- Estrutura para tabela `pagamentos`
--

CREATE TABLE `pagamentos` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `cupom` varchar(255) NOT NULL,
  `cupomb` varchar(255) NOT NULL,
  `useridb` int(11) NOT NULL,
  `valor` decimal(10,2) NOT NULL,
  `fase` int(11) NOT NULL,
  `posicao` int(11) NOT NULL,
  `ativacao` int(11) NOT NULL,
  `dataativacao` datetime NOT NULL,
  `datavencimento` datetime NOT NULL,
  `reentrada` int(11) NOT NULL,
  `sustentabilidade` int(11) NOT NULL,
  `patrocinador` int(11) NOT NULL,
  `ip` varchar(25) NOT NULL,
  `feitopelo` int(11) NOT NULL,
  `registro` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `pagamentos`
--

INSERT INTO `pagamentos` (`id`, `userid`, `cupom`, `cupomb`, `useridb`, `valor`, `fase`, `posicao`, `ativacao`, `dataativacao`, `datavencimento`, `reentrada`, `sustentabilidade`, `patrocinador`, `ip`, `feitopelo`, `registro`) VALUES
(142, 975, 'xxtaVixEUaG1dEM', 'jre', 4, '20.00', 1, 0, 1, '2018-09-10 19:10:50', '2018-09-14 19:10:05', 0, 0, 0, '', 0, '2018-09-10 19:10:05'),
(143, 976, 'dbuAc0MBsLliuRb', 'jre', 4, '20.00', 1, 0, 1, '2018-09-10 19:10:54', '2018-09-14 19:10:09', 0, 0, 0, '', 0, '2018-09-10 19:10:09'),
(144, 977, 'EbiAzuQCmVhABbm', 'jre', 4, '20.00', 1, 0, 1, '2018-09-10 19:10:58', '2018-09-14 19:10:13', 0, 0, 0, '', 0, '2018-09-10 19:10:13'),
(145, 979, '2y5zMUpqCvaNqhv', 'jre', 4, '20.00', 1, 0, 1, '2018-09-10 19:11:01', '2018-09-14 19:10:17', 0, 0, 0, '', 0, '2018-09-10 19:10:17'),
(146, 978, 'L0w9Qvr1hanhKU6', 'jre', 4, '20.00', 1, 0, 1, '2018-09-10 19:11:05', '2018-09-14 19:10:20', 0, 0, 0, '', 0, '2018-09-10 19:10:20'),
(148, 980, '1WddGfJWYEjuvcI', '2y5zMUpqCvaNqhv', 979, '20.00', 1, 0, 1, '2018-09-11 19:36:57', '2018-09-14 19:18:32', 0, 0, 0, '', 0, '2018-09-10 19:18:32'),
(150, 981, 'zoTbZCIiK8YkaIs', '2y5zMUpqCvaNqhv', 979, '20.00', 1, 0, 1, '2018-09-11 19:37:02', '2018-09-14 19:20:07', 0, 0, 0, '', 0, '2018-09-10 19:20:07'),
(153, 982, 'J4onfKVjDgFOZ4b', 'fg8wq4odAhBZqZZ', 975, '20.00', 1, 0, 1, '2018-09-11 18:41:25', '2018-09-14 19:24:06', 0, 0, 0, '', 0, '2018-09-10 19:24:06'),
(154, 983, 'wZrX67XzSgy9XMm', 'fg8wq4odAhBZqZZ', 975, '20.00', 1, 0, 1, '2018-09-11 18:40:45', '2018-09-14 19:24:09', 0, 0, 0, '', 0, '2018-09-10 19:24:09'),
(157, 984, 'F9BZLvqJTArAYa7', '2y5zMUpqCvaNqhv', 979, '20.00', 1, 0, 1, '2018-09-11 19:37:06', '2018-09-14 19:27:05', 0, 0, 0, '', 0, '2018-09-10 19:27:05'),
(158, 985, '9krKLnoTidMlQ6b', 'fg8wq4odAhBZqZZ', 975, '20.00', 1, 0, 1, '2018-09-11 18:39:59', '2018-09-14 19:27:12', 0, 0, 0, '', 0, '2018-09-10 19:27:12'),
(161, 986, 'yeDjPJe4VWh7pL5', 'fg8wq4odAhBZqZZ', 975, '20.00', 1, 0, 1, '2018-09-11 18:40:36', '2018-09-14 19:42:02', 0, 0, 0, '', 0, '2018-09-10 19:42:02'),
(162, 987, '34IxSfJHVMJebXs', 'fg8wq4odAhBZqZZ', 975, '20.00', 1, 0, 1, '2018-09-11 18:44:05', '2018-09-14 19:42:08', 0, 0, 0, '', 0, '2018-09-10 19:42:08'),
(165, 988, 'WTKatrMbGNoINYi', 'dbuAc0MBsLliuRb', 976, '20.00', 1, 0, 1, '2018-09-11 19:13:49', '2018-09-14 20:20:30', 0, 0, 0, '', 0, '2018-09-10 20:20:30'),
(166, 989, '2czND0kWuEQnqqZ', 'dbuAc0MBsLliuRb', 976, '20.00', 1, 0, 1, '2018-09-11 19:13:54', '2018-09-14 20:20:36', 0, 0, 0, '', 0, '2018-09-10 20:20:36'),
(167, 990, 'HPx5Z7440Fecv9o', 'dbuAc0MBsLliuRb', 976, '20.00', 1, 0, 1, '2018-09-11 19:13:58', '2018-09-14 21:14:54', 0, 0, 0, '', 0, '2018-09-10 21:14:54'),
(168, 991, '3SxhIJceghfTYck', 'dbuAc0MBsLliuRb', 976, '20.00', 1, 0, 1, '2018-09-11 22:58:39', '2018-09-14 21:38:38', 0, 0, 0, '', 0, '2018-09-10 21:38:38'),
(169, 992, 'bs0KQihOrbPaOpE', 'dbuAc0MBsLliuRb', 976, '20.00', 1, 0, 1, '2018-09-11 18:53:04', '2018-09-14 21:47:32', 0, 0, 0, '', 0, '2018-09-10 21:47:32'),
(170, 993, 'f5Zx4kM9XDENP4C', 'EbiAzuQCmVhABbm', 977, '20.00', 1, 0, 1, '2018-09-11 19:11:41', '2018-09-14 22:06:56', 0, 0, 0, '', 0, '2018-09-10 22:06:56'),
(171, 994, 'JzMJL9CXNArMO0N', 'EbiAzuQCmVhABbm', 977, '20.00', 1, 0, 1, '2018-09-11 23:02:57', '2018-09-14 22:08:03', 0, 0, 0, '', 0, '2018-09-10 22:08:03'),
(172, 995, 'OouMajjep0uYX1e', 'EbiAzuQCmVhABbm', 977, '20.00', 1, 0, 1, '2018-09-11 20:57:22', '2018-09-14 22:54:42', 0, 0, 0, '', 0, '2018-09-10 22:54:42'),
(173, 996, 'NRqJcdwwU6Zwjda', 'EbiAzuQCmVhABbm', 977, '20.00', 1, 0, 1, '2018-09-11 20:57:26', '2018-09-14 22:58:47', 0, 0, 0, '', 0, '2018-09-10 22:58:47'),
(175, 998, 'I7taCawahesjW4z', '2y5zMUpqCvaNqhv', 979, '20.00', 1, 0, 1, '2018-09-11 19:33:14', '2018-09-15 15:13:32', 0, 0, 0, '', 0, '2018-09-11 15:13:32'),
(178, 1001, 'Z6Ejfffh8QQyEoq', 'EbiAzuQCmVhABbm', 977, '20.00', 1, 0, 1, '2018-09-11 21:18:24', '2018-09-15 18:24:12', 0, 0, 0, '', 0, '2018-09-11 18:24:12'),
(179, 1002, '0gqRb9j292AMVHW', '2y5zMUpqCvaNqhv', 979, '20.00', 1, 0, 1, '2018-09-11 18:58:34', '2018-09-15 18:25:13', 0, 0, 0, '', 0, '2018-09-11 18:25:13'),
(180, 975, 'fg8wq4odAhBZqZZ', 'jre', 4, '80.00', 2, 0, 1, '2018-09-11 18:51:16', '2018-09-15 18:44:05', 0, 0, 0, '', 0, '2018-09-11 18:44:05'),
(181, 976, 'dbuAc0MBsLliuRb', 'jre', 4, '80.00', 2, 0, 1, '2018-09-11 22:59:11', '2018-09-15 22:58:39', 0, 0, 0, '', 0, '2018-09-11 22:58:39'),
(182, 977, 'EbiAzuQCmVhABbm', 'jre', 4, '80.00', 2, 0, 1, '2018-09-11 23:03:01', '2018-09-15 23:02:57', 0, 0, 0, '', 0, '2018-09-11 23:02:57'),
(183, 1003, 'BByf9xsqni7UcBG', '2y5zMUpqCvaNqhv', 979, '20.00', 1, 0, 1, '2018-09-11 23:51:50', '2018-09-15 23:31:19', 0, 0, 0, '', 0, '2018-09-11 23:31:19'),
(184, 1004, 'BJkp7LGWnLA3vFZ', '2y5zMUpqCvaNqhv', 979, '20.00', 1, 0, 1, '2018-09-11 23:51:46', '2018-09-15 23:37:32', 0, 0, 0, '', 0, '2018-09-11 23:37:32');

-- --------------------------------------------------------

--
-- Estrutura para tabela `planos`
--

CREATE TABLE `planos` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `nomeplano` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `descricao` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `valor` decimal(10,2) NOT NULL,
  `registro` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Fazendo dump de dados para tabela `planos`
--

INSERT INTO `planos` (`id`, `userid`, `nomeplano`, `descricao`, `valor`, `registro`) VALUES
(1, 0, 'plano AAB', '', '100.02', '0000-00-00 00:00:00'),
(3, 0, 'Plano C', '', '1001.00', '2018-07-26 03:35:32');

-- --------------------------------------------------------

--
-- Estrutura para tabela `planos_usuario`
--

CREATE TABLE `planos_usuario` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `idplano` int(11) NOT NULL,
  `cupom` varchar(255) NOT NULL,
  `registro` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `planos_usuario`
--

INSERT INTO `planos_usuario` (`id`, `userid`, `idplano`, `cupom`, `registro`) VALUES
(1, 4, 1, '12', '0000-00-00 00:00:00'),
(2, 4, 2, '13', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estrutura para tabela `saldo`
--

CREATE TABLE `saldo` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `saldo` decimal(10,2) NOT NULL,
  `saldo_antigo` decimal(10,2) NOT NULL,
  `cupom` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ganhos` decimal(10,2) NOT NULL,
  `registro` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Fazendo dump de dados para tabela `saldo`
--

INSERT INTO `saldo` (`id`, `userid`, `saldo`, `saldo_antigo`, `cupom`, `ganhos`, `registro`) VALUES
(1, 972, '0.00', '0.00', '', '0.00', '2018-09-10 14:53:06'),
(2, 973, '0.00', '0.00', '', '0.00', '2018-09-10 14:54:27'),
(3, 974, '0.00', '0.00', '', '0.00', '2018-09-10 14:55:14'),
(4, 975, '0.00', '0.00', '', '0.00', '2018-09-10 19:05:56'),
(5, 976, '0.00', '0.00', '', '0.00', '2018-09-10 19:06:14'),
(6, 977, '0.00', '0.00', '', '0.00', '2018-09-10 19:06:59'),
(7, 978, '0.00', '0.00', '', '0.00', '2018-09-10 19:07:37'),
(8, 979, '0.00', '0.00', '', '0.00', '2018-09-10 19:07:43'),
(9, 980, '0.00', '0.00', '', '0.00', '2018-09-10 19:17:49'),
(10, 981, '0.00', '0.00', '', '0.00', '2018-09-10 19:19:51'),
(11, 982, '0.00', '0.00', '', '0.00', '2018-09-10 19:23:32'),
(12, 983, '0.00', '0.00', '', '0.00', '2018-09-10 19:23:39'),
(13, 984, '0.00', '0.00', '', '0.00', '2018-09-10 19:25:45'),
(14, 985, '0.00', '0.00', '', '0.00', '2018-09-10 19:26:13'),
(15, 986, '0.00', '0.00', '', '0.00', '2018-09-10 19:41:39'),
(16, 987, '0.00', '0.00', '', '0.00', '2018-09-10 19:41:44'),
(17, 988, '0.00', '0.00', '', '0.00', '2018-09-10 20:15:15'),
(18, 989, '0.00', '0.00', '', '0.00', '2018-09-10 20:15:22'),
(19, 990, '0.00', '0.00', '', '0.00', '2018-09-10 21:14:54'),
(20, 991, '0.00', '0.00', '', '0.00', '2018-09-10 21:38:38'),
(21, 992, '0.00', '0.00', '', '0.00', '2018-09-10 21:47:32'),
(22, 993, '0.00', '0.00', '', '0.00', '2018-09-10 22:06:56'),
(23, 994, '0.00', '0.00', '', '0.00', '2018-09-10 22:08:03'),
(24, 995, '0.00', '0.00', '', '0.00', '2018-09-10 22:54:42'),
(25, 996, '0.00', '0.00', '', '0.00', '2018-09-10 22:58:47'),
(26, 997, '0.00', '0.00', '', '0.00', '2018-09-11 00:31:23'),
(27, 998, '0.00', '0.00', '', '0.00', '2018-09-11 15:13:32'),
(28, 999, '0.00', '0.00', '', '0.00', '2018-09-11 17:40:15'),
(29, 1000, '0.00', '0.00', '', '0.00', '2018-09-11 17:44:34'),
(30, 1001, '0.00', '0.00', '', '0.00', '2018-09-11 18:24:12'),
(31, 1002, '0.00', '0.00', '', '0.00', '2018-09-11 18:25:13'),
(32, 1003, '0.00', '0.00', '', '0.00', '2018-09-11 23:31:19'),
(33, 1004, '0.00', '0.00', '', '0.00', '2018-09-11 23:37:32');

-- --------------------------------------------------------

--
-- Estrutura para tabela `saldobloqueado`
--

CREATE TABLE `saldobloqueado` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `saldo` decimal(10,2) NOT NULL,
  `saldo_antigo` decimal(10,2) NOT NULL,
  `ganhos` decimal(10,2) NOT NULL,
  `idinvestimento` int(11) NOT NULL,
  `registro` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Fazendo dump de dados para tabela `saldobloqueado`
--

INSERT INTO `saldobloqueado` (`id`, `userid`, `saldo`, `saldo_antigo`, `ganhos`, `idinvestimento`, `registro`) VALUES
(1, 975, '0.00', '0.00', '0.00', 0, '2018-09-10 19:05:56'),
(2, 976, '0.00', '0.00', '0.00', 0, '2018-09-10 19:06:14'),
(3, 977, '0.00', '0.00', '0.00', 0, '2018-09-10 19:06:59'),
(4, 978, '0.00', '0.00', '0.00', 0, '2018-09-10 19:07:37'),
(5, 979, '0.00', '0.00', '0.00', 0, '2018-09-10 19:07:43'),
(6, 980, '0.00', '0.00', '0.00', 0, '2018-09-10 19:17:49'),
(7, 981, '0.00', '0.00', '0.00', 0, '2018-09-10 19:19:51'),
(8, 982, '0.00', '0.00', '0.00', 0, '2018-09-10 19:23:32'),
(9, 983, '0.00', '0.00', '0.00', 0, '2018-09-10 19:23:39'),
(10, 984, '0.00', '0.00', '0.00', 0, '2018-09-10 19:25:45'),
(11, 985, '0.00', '0.00', '0.00', 0, '2018-09-10 19:26:13'),
(12, 986, '0.00', '0.00', '0.00', 0, '2018-09-10 19:41:39'),
(13, 987, '0.00', '0.00', '0.00', 0, '2018-09-10 19:41:44'),
(14, 988, '0.00', '0.00', '0.00', 0, '2018-09-10 20:15:15'),
(15, 989, '0.00', '0.00', '0.00', 0, '2018-09-10 20:15:22');

-- --------------------------------------------------------

--
-- Estrutura para tabela `saques`
--

CREATE TABLE `saques` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `valor` decimal(10,2) NOT NULL,
  `datasaque` datetime NOT NULL,
  `datapago` datetime NOT NULL,
  `ativacao` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `transacao`
--

CREATE TABLE `transacao` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `transacao` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `registro` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Índices de tabelas apagadas
--

--
-- Índices de tabela `acesso`
--
ALTER TABLE `acesso`
  ADD PRIMARY KEY (`userid`);

--
-- Índices de tabela `comprovantes`
--
ALTER TABLE `comprovantes`
  ADD UNIQUE KEY `id_2` (`id`),
  ADD KEY `id` (`id`);

--
-- Índices de tabela `configuracoes`
--
ALTER TABLE `configuracoes`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `dadosbancarios`
--
ALTER TABLE `dadosbancarios`
  ADD PRIMARY KEY (`id`,`nometitular`);

--
-- Índices de tabela `dadospessoais`
--
ALTER TABLE `dadospessoais`
  ADD PRIMARY KEY (`userid`,`estado_idEstado`,`cidade_idCidade`,`bairro_IdBairro`,`pais_idPais`);

--
-- Índices de tabela `documentos`
--
ALTER TABLE `documentos`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `faturas`
--
ALTER TABLE `faturas`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `financas`
--
ALTER TABLE `financas`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `indicados`
--
ALTER TABLE `indicados`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `cupom` (`cupom`);

--
-- Índices de tabela `investimentos`
--
ALTER TABLE `investimentos`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_2` (`id`),
  ADD KEY `id` (`id`);

--
-- Índices de tabela `ip`
--
ALTER TABLE `ip`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `msg`
--
ALTER TABLE `msg`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `pagamentos`
--
ALTER TABLE `pagamentos`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `planos`
--
ALTER TABLE `planos`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `planos_usuario`
--
ALTER TABLE `planos_usuario`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `saldo`
--
ALTER TABLE `saldo`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `saldobloqueado`
--
ALTER TABLE `saldobloqueado`
  ADD UNIQUE KEY `id_2` (`id`),
  ADD KEY `id` (`id`);

--
-- Índices de tabela `saques`
--
ALTER TABLE `saques`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `transacao`
--
ALTER TABLE `transacao`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas apagadas
--

--
-- AUTO_INCREMENT de tabela `acesso`
--
ALTER TABLE `acesso`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1005;

--
-- AUTO_INCREMENT de tabela `comprovantes`
--
ALTER TABLE `comprovantes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT de tabela `configuracoes`
--
ALTER TABLE `configuracoes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de tabela `dadosbancarios`
--
ALTER TABLE `dadosbancarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT de tabela `dadospessoais`
--
ALTER TABLE `dadospessoais`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1005;

--
-- AUTO_INCREMENT de tabela `documentos`
--
ALTER TABLE `documentos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT de tabela `faturas`
--
ALTER TABLE `faturas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `financas`
--
ALTER TABLE `financas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `indicados`
--
ALTER TABLE `indicados`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=208;

--
-- AUTO_INCREMENT de tabela `investimentos`
--
ALTER TABLE `investimentos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `ip`
--
ALTER TABLE `ip`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `msg`
--
ALTER TABLE `msg`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `pagamentos`
--
ALTER TABLE `pagamentos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=185;

--
-- AUTO_INCREMENT de tabela `planos`
--
ALTER TABLE `planos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `planos_usuario`
--
ALTER TABLE `planos_usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `saldo`
--
ALTER TABLE `saldo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT de tabela `saldobloqueado`
--
ALTER TABLE `saldobloqueado`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de tabela `saques`
--
ALTER TABLE `saques`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `transacao`
--
ALTER TABLE `transacao`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
