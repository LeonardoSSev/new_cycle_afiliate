-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 10-Set-2018 às 07:25
-- Versão do servidor: 10.1.34-MariaDB
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ajudamanual`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `acesso`
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
-- Extraindo dados da tabela `acesso`
--

INSERT INTO `acesso` (`userid`, `usuario`, `sponsorid`, `bloqueio`, `senha`, `senhafinanceira`, `admin`, `fotos`, `status`, `datavencimento`, `bash`, `registro`, `ativacao`) VALUES
(4, 'admin', 0, 0, '202cb962ac59075b964b07152d234b70', '202cb962ac59075b964b07152d234b70', 1, 'a3733fcfb92239a6160a3ab266685ba2.png', 1, '0000-00-00 00:00:00', '21232f297a57a5a743894a0e4a801fc3', '0000-00-00 00:00:00', 1),
(958, 'teste', 4, 0, '202cb962ac59075b964b07152d234b70', '', 1, '', 0, '0000-00-00 00:00:00', '', '2018-08-30 01:07:17', 1),
(959, 'teste2', 4, 0, '202cb962ac59075b964b07152d234b70', '', 0, '', 0, '0000-00-00 00:00:00', '', '2018-08-30 02:22:59', 1),
(960, 'teste3', 4, 0, '202cb962ac59075b964b07152d234b70', '', 0, '', 0, '0000-00-00 00:00:00', '', '2018-08-31 01:14:26', 1),
(961, 'teste4', 4, 0, '202cb962ac59075b964b07152d234b70', '', 0, '', 0, '0000-00-00 00:00:00', '', '2018-08-31 01:15:33', 1),
(962, 'teste5', 4, 0, '202cb962ac59075b964b07152d234b70', '', 0, '', 0, '0000-00-00 00:00:00', '', '2018-08-31 01:17:10', 1),
(963, 'teste6', 4, 0, '202cb962ac59075b964b07152d234b70', '', 0, '', 0, '0000-00-00 00:00:00', '', '2018-08-31 01:18:53', 1),
(964, 'teste7', 4, 0, '202cb962ac59075b964b07152d234b70', '', 0, '', 0, '0000-00-00 00:00:00', '', '2018-08-31 01:19:39', 1),
(965, 'teste8', 4, 0, '202cb962ac59075b964b07152d234b70', '', 0, '', 0, '0000-00-00 00:00:00', '', '2018-08-31 01:20:13', 1),
(966, 'vellox', 4, 0, '202cb962ac59075b964b07152d234b70', '', 0, '', 0, '0000-00-00 00:00:00', '', '2018-09-04 19:12:04', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `comprovantes`
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

-- --------------------------------------------------------

--
-- Estrutura da tabela `configuracoes`
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
-- Extraindo dados da tabela `configuracoes`
--

INSERT INTO `configuracoes` (`id`, `descricao`, `valor`, `upgrade`, `sustentabilidade`, `reentrada`, `lateralidade`, `habilitar`, `data`, `hora`, `motivo`, `registro`) VALUES
(1, 'Fase 1', '20.00', '80.00', 0, 0, 5, 0, 60, 51, '', '0000-00-00 00:00:00'),
(2, 'Fase 2', '80.00', '500.00', 0, 0, 10, 0, 0, 0, '', '0000-00-00 00:00:00'),
(3, 'Fase 3', '500.00', '0.00', 0, 0, 10, 0, 0, 0, '', '0000-00-00 00:00:00'),
(4, 'Fase 4', '0.00', '0.00', 0, 0, 0, 0, 0, 0, '', '0000-00-00 00:00:00'),
(5, 'Fase 5', '1500.01', '3000.01', 0, 0, 2, 0, 0, 0, '', '0000-00-00 00:00:00'),
(6, 'Fase 6', '3000.01', '6000.01', 0, 0, 2, 0, 0, 0, '', '0000-00-00 00:00:00'),
(7, 'Fase 7', '6000.01', '10000.02', 0, 0, 2, 0, 0, 0, '', '0000-00-00 00:00:00'),
(8, 'Fase 8', '10000.01', '20000.00', 0, 0, 2, 0, 0, 0, '', '0000-00-00 00:00:00'),
(9, 'patrocinador', '10.01', '0.00', 0, 0, 0, 0, 0, 0, '', '0000-00-00 00:00:00'),
(10, 'Link de Patrocinador', '0.00', '0.00', 0, 0, 0, 1, 0, 0, '', '0000-00-00 00:00:00'),
(11, 'Reentradas', '0.00', '0.00', 1, 1, 0, 0, 10, 2, '', '0000-00-00 00:00:00'),
(12, 'Criação de Reentradas no Home', '0.00', '0.00', 0, 2, 0, 1, 0, 0, '', '0000-00-00 00:00:00'),
(13, 'manutenção', '0.00', '0.00', 0, 0, 0, 0, 0, 0, 'O motivo pode ser qualquer um 2', '0000-00-00 00:00:00'),
(14, 'Bloqueio de Usuários', '0.00', '0.00', 0, 0, 0, 0, 0, 0, '', '0000-00-00 00:00:00'),
(17, 'mibank', '0.00', '0.00', 0, 0, 0, 0, 0, 0, '', '0000-00-00 00:00:00'),
(15, 'senha mestra', '0.00', '0.00', 0, 0, 0, 0, 0, 0, '@ajudamutua123', '0000-00-00 00:00:00'),
(16, 'Email na reentrada', '0.00', '0.00', 0, 0, 0, 0, 0, 0, '', '0000-00-00 00:00:00'),
(18, 'gerar pagamento', '0.00', '0.00', 0, 0, 0, 1, 0, 0, '', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `dadosbancarios`
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
-- Extraindo dados da tabela `dadosbancarios`
--

INSERT INTO `dadosbancarios` (`id`, `userid`, `banco`, `agencia`, `conta`, `tipoconta`, `registro`, `cpftitular`, `nometitular`, `operacao`, `bitcoin`, `mibank`, `intermedium`, `picpay`) VALUES
(6, 4, 'itau', '3836', '30117', 'CC', '2018-08-17 01:52:43', '0', '000', '000000', '', '123456', '', ''),
(7, 958, 'mibank', NULL, NULL, NULL, '2018-08-30 01:07:17', '', '', '', '', '100', '', ''),
(8, 959, 'mibank', NULL, NULL, NULL, '2018-08-30 02:22:59', '', '', '', '', '', '', ''),
(9, NULL, 'mibank', NULL, NULL, NULL, '2018-08-31 01:13:51', '', '', '', '', '', '', ''),
(10, 960, 'mibank', NULL, NULL, NULL, '2018-08-31 01:14:26', '', '', '', '', '', '', ''),
(11, 961, 'mibank', NULL, NULL, NULL, '2018-08-31 01:15:33', '', '', '', '', '', '', ''),
(12, 962, 'mibank', NULL, NULL, NULL, '2018-08-31 01:17:10', '', '', '', '', '', '', ''),
(13, 963, 'mibank', NULL, NULL, NULL, '2018-08-31 01:18:53', '', '', '', '', '', '', ''),
(14, 964, 'mibank', NULL, NULL, NULL, '2018-08-31 01:19:39', '', '', '', '', '', '', ''),
(15, 965, 'mibank', NULL, NULL, NULL, '2018-08-31 01:20:13', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `dadospessoais`
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
-- Extraindo dados da tabela `dadospessoais`
--

INSERT INTO `dadospessoais` (`userid`, `nome`, `nascimento`, `email`, `celular`, `whatsapp`, `facebook`, `sexo`, `fotos`, `rua`, `cidade`, `estado`, `bairro`, `cep`, `pais`, `complemento`, `numero`, `cpf`, `rg`, `estrangeiro`, `idplano`, `senhafinanceira`, `registro`, `acesso_user_id`, `estado_idEstado`, `cidade_idCidade`, `bairro_IdBairro`, `pais_idPais`, `lado`, `perna`, `wallet`) VALUES
(4, 'marcos aurelioc', '23/09/1983', 'modernidadeweb@bol.com.brbc', '24998523910', '24998606296bc', 'facebookb', 'F', '', 'Rua agorab', '', 'Rio de Janeirov', '', '239062009', '', 'complementoc', '350', '03750063974bc', '', 'brazil', 0, '', '2017-03-01 16:02:38', 0, 0, 0, 0, 0, 0, 0, ''),
(958, 'MARCOS AURÉLIO FRANCO DOS SANTOS', NULL, 'modernidadeweb@bol.com.br', '', '24998606296', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '03750063974', NULL, '', 0, '', '2018-08-30 01:07:17', 0, 0, 0, 0, 0, 0, 0, ''),
(959, 'MARCOS AURÉLIO FRANCO DOS SANTOS', NULL, 'modernidadeweb1@bol.com.br', '', '24998606296', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '03750063974', NULL, '', 0, '', '2018-08-30 02:22:59', 0, 0, 0, 0, 0, 0, 0, ''),
(960, 'MARCOS AURÉLIO FRANCO DOS SANTOS', NULL, 'modernidadeweb@bol.com.br', '', '24998606296', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '03750063974', NULL, '', 0, '', '2018-08-31 01:13:51', 0, 0, 0, 0, 0, 0, 0, ''),
(961, 'MARCOS AURÉLIO FRANCO DOS SANTOS', NULL, 'modernidadeweb@bol.com.br', '', '24998606296', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '03750063974', NULL, '', 0, '', '2018-08-31 01:15:33', 0, 0, 0, 0, 0, 0, 0, ''),
(962, 'MARCOS AURÉLIO FRANCO DOS SANTOS', NULL, 'modernidadeweb@bol.com.br', '', '24998606296', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '03750063974', NULL, '', 0, '', '2018-08-31 01:17:10', 0, 0, 0, 0, 0, 0, 0, ''),
(963, 'MARCOS AURÉLIO FRANCO DOS SANTOS', NULL, 'modernidadeweb@bol.com.br', '', '24998606296', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '03750063974', NULL, '', 0, '', '2018-08-31 01:18:53', 0, 0, 0, 0, 0, 0, 0, ''),
(964, 'MARCOS AURÉLIO FRANCO DOS SANTOS', NULL, 'modernidadeweb@bol.com.br', '', '24998606296', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '03750063974', NULL, '', 0, '', '2018-08-31 01:19:39', 0, 0, 0, 0, 0, 0, 0, ''),
(965, 'MARCOS AURÉLIO FRANCO DOS SANTOS', NULL, 'modernidadeweb@bol.com.br', '', '24998606296', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '03750063974', NULL, '', 0, '', '2018-08-31 01:20:13', 0, 0, 0, 0, 0, 0, 0, ''),
(966, 'MARCOS AURÉLIO FRANCO DOS SANTOS', NULL, 'modernidadeweb@bol.com.br', '', '24998606296', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '03750063974', NULL, '', 0, '', '2018-09-04 19:12:04', 0, 0, 0, 0, 0, 0, 0, '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `documentos`
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
-- Extraindo dados da tabela `documentos`
--

INSERT INTO `documentos` (`id`, `userid`, `useridb`, `doc1`, `doc2`, `situacao_doc1`, `situacao_doc2`, `registro`, `registro2`, `dataativacao`, `dataativacao2`, `motivo1`, `motivo2`) VALUES
(4, 4, 0, '', '', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', ''),
(9, 4, 0, '', '', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', ''),
(608, 868, 0, '', '', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', ''),
(609, 869, 0, '', '', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', ''),
(610, 870, 0, '', '', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', ''),
(611, 871, 0, '', '', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', ''),
(612, 872, 0, '', '', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', ''),
(613, 873, 0, '', '', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', ''),
(614, 874, 0, '', '', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', ''),
(615, 875, 0, '', '', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', ''),
(616, 876, 0, '', '', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', ''),
(617, 877, 0, '', '', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', ''),
(618, 878, 0, '', '', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', ''),
(619, 879, 0, '', '', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', ''),
(620, 880, 0, '', '', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', ''),
(621, 881, 0, '', '', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', ''),
(622, 882, 0, '', '', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', ''),
(623, 883, 0, '', '', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', ''),
(624, 884, 0, '', '', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', ''),
(625, 885, 0, '', '', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', ''),
(626, 886, 0, '', '', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', ''),
(627, 887, 0, '', '', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', ''),
(628, 888, 0, '', '', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', ''),
(629, 889, 0, '', '', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', ''),
(630, 890, 0, '', '', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', ''),
(631, 891, 0, '', '', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', ''),
(632, 892, 0, '', '', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', ''),
(633, 893, 0, '', '', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', ''),
(634, 894, 0, '', '', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', ''),
(635, 895, 0, '', '', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', ''),
(636, 896, 0, '', '', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', ''),
(637, 897, 0, '', '', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', ''),
(638, 898, 0, '', '', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', ''),
(639, 899, 0, '', '', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', ''),
(640, 900, 0, '', '', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', ''),
(641, 901, 0, '', '', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', ''),
(642, 902, 0, '', '', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', ''),
(643, 903, 0, '', '', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', ''),
(644, 904, 0, '', '', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', ''),
(645, 905, 0, '', '', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', ''),
(646, 906, 0, '', '', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', ''),
(647, 907, 0, '', '', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', ''),
(648, 908, 0, '', '', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', ''),
(649, 909, 0, '', '', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', ''),
(650, 910, 0, '', '', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', ''),
(651, 911, 0, '', '', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', ''),
(652, 912, 0, '', '', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', ''),
(653, 913, 0, '', '', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', ''),
(654, 914, 0, '', '', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', ''),
(655, 915, 0, '', '', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', ''),
(656, 916, 0, '', '', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', ''),
(657, 917, 0, '', '', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', ''),
(658, 918, 0, '', '', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', ''),
(659, 919, 0, '', '', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', ''),
(660, 920, 0, '', '', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', ''),
(661, 921, 0, '', '', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', ''),
(662, 922, 0, '', '', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', ''),
(663, 923, 0, '', '', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', ''),
(664, 924, 0, '', '', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', ''),
(665, 925, 0, '', '', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', ''),
(666, 926, 0, '', '', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', ''),
(667, 927, 0, '', '', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', ''),
(668, 928, 0, '', '', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', ''),
(669, 929, 0, '', '', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', ''),
(670, 930, 0, '', '', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', ''),
(671, 931, 0, '', '', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', ''),
(672, 932, 0, '', '', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', ''),
(673, 933, 0, '', '', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', ''),
(674, 934, 0, '', '', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', ''),
(675, 935, 0, '', '', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', ''),
(676, 936, 0, '', '', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', ''),
(677, 937, 0, '', '', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', ''),
(678, 938, 0, '', '', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', ''),
(679, 939, 0, '', '', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', ''),
(680, 940, 0, '', '', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', ''),
(681, 941, 0, '', '', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', ''),
(682, 942, 0, '', '', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', ''),
(683, 943, 0, '', '', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', ''),
(684, 944, 0, '', '', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', ''),
(685, 945, 0, '', '', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', ''),
(686, 946, 0, '', '', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', ''),
(687, 947, 0, '', '', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', ''),
(688, 948, 0, '', '', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', ''),
(689, 949, 0, '', '', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', ''),
(690, 950, 0, '', '', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', ''),
(691, 951, 0, '', '', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', ''),
(692, 952, 0, '', '', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', ''),
(693, 953, 0, '', '', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', ''),
(694, 954, 0, '', '', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', ''),
(695, 955, 0, '', '', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', ''),
(696, 956, 0, '', '', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', ''),
(697, 957, 0, '', '', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', ''),
(698, 958, 0, '0', '0', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', ''),
(699, 959, 0, '0', '0', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', ''),
(700, 960, 0, '0', '0', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', ''),
(701, 961, 0, '0', '0', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', ''),
(702, 962, 0, '0', '0', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', ''),
(703, 963, 0, '0', '0', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', ''),
(704, 964, 0, '0', '0', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', ''),
(705, 965, 0, '0', '0', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', ''),
(706, 966, 0, '0', '0', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `faturas`
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
-- Estrutura da tabela `financas`
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
-- Estrutura da tabela `indicados`
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
-- Extraindo dados da tabela `indicados`
--

INSERT INTO `indicados` (`id`, `cupom`, `userid`, `sponsorid`, `upline`, `fase`, `ativacao`, `posicao`, `reentrada`, `habilitar`, `trava`, `logins`, `fase1`, `fase2`, `fase3`, `fase4`, `fase5`, `fase6`, `fase7`, `fase8`, `datavencimento`, `dataativacao2`, `dataativacao3`, `dataativacao4`, `dataativacao5`, `dataativacao6`, `dataativacao7`, `dataativacao8`, `dataativacao1`, `registro`) VALUES
(1, 'jre', 4, 0, '', 2, 1, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00', '2018-08-07 20:40:21', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(121, 'Xb0G7tOG5uqfyIM', 958, 0, '', 2, 1, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00', '2018-09-10 01:12:25', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2018-09-10 01:06:54', '2018-09-10 01:06:54'),
(122, '7oJoTDGj9j5C55Z', 959, 0, '', 1, 1, 0, 0, 0, 0, 0, 2, 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2018-09-10 01:06:57', '2018-09-10 01:06:57'),
(123, 'AJHKdtMUJkcUqoh', 960, 0, '', 1, 1, 0, 0, 0, 0, 0, 2, 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2018-09-10 01:07:12', '2018-09-10 01:07:12'),
(124, 'y5scESYtagQZDe5', 961, 0, '', 1, 1, 0, 0, 0, 0, 0, 2, 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2018-09-10 01:07:15', '2018-09-10 01:07:15');

-- --------------------------------------------------------

--
-- Estrutura da tabela `investimentos`
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
-- Estrutura da tabela `ip`
--

CREATE TABLE `ip` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `ip` varchar(255) NOT NULL,
  `registro` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `msg`
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
-- Extraindo dados da tabela `msg`
--

INSERT INTO `msg` (`id`, `userid`, `de`, `para`, `status`, `assunto`, `texto`, `notificacao`, `data`) VALUES
(1, 4, 4, 4, 'read', 'add', 'dd', 0, '0000-00-00 00:00:00'),
(2, 4, 4, 4, 'unread', 'ee', 'ee', 1, '0000-00-00 00:00:00'),
(3, 4, 4, 0, 'read', 'teste', 'msg', 0, '2018-07-26 02:47:16');

-- --------------------------------------------------------

--
-- Estrutura da tabela `pagamentos`
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
-- Extraindo dados da tabela `pagamentos`
--

INSERT INTO `pagamentos` (`id`, `userid`, `cupom`, `cupomb`, `useridb`, `valor`, `fase`, `posicao`, `ativacao`, `dataativacao`, `datavencimento`, `reentrada`, `sustentabilidade`, `patrocinador`, `ip`, `feitopelo`, `registro`) VALUES
(57, 958, 'g6yqBZPTLT4J0Ns', 'jre', 4, '15.01', 1, 0, 1, '2018-09-10 01:06:54', '2018-09-14 01:06:44', 0, 0, 0, '', 0, '2018-09-10 01:06:44'),
(58, 959, '0ggDjOos0b7yYxV', 'jre', 4, '15.01', 1, 0, 1, '2018-09-10 01:06:57', '2018-09-14 01:06:48', 0, 0, 0, '', 0, '2018-09-10 01:06:48'),
(59, 960, 'TfrciixTFhauSpp', 'Xb0G7tOG5uqfyIM', 958, '15.01', 1, 0, 1, '2018-09-10 01:07:12', '2018-09-14 01:07:03', 0, 0, 0, '', 0, '2018-09-10 01:07:03'),
(60, 961, 'iAHBU8WK8sR1KzL', 'Xb0G7tOG5uqfyIM', 958, '15.01', 1, 0, 1, '2018-09-10 01:07:15', '2018-09-14 01:07:07', 0, 0, 0, '', 0, '2018-09-10 01:07:07'),
(61, 958, 'Xb0G7tOG5uqfyIM', 'jre', 4, '60.01', 2, 0, 1, '2018-09-10 01:12:25', '2018-09-14 01:07:15', 0, 0, 0, '', 0, '2018-09-10 01:07:15'),
(62, 4, 'eFahcciUp4IBXcP', '7oJoTDGj9j5C55Z', 959, '20.00', 1, 0, 0, '0000-00-00 00:00:00', '2018-09-14 01:50:06', 1, 0, 0, '', 0, '2018-09-10 01:50:06'),
(63, 4, 'gWZRvTkqeysEqdV', '7oJoTDGj9j5C55Z', 959, '20.00', 1, 0, 0, '0000-00-00 00:00:00', '2018-09-14 01:50:06', 0, 1, 0, '', 0, '2018-09-10 01:50:06'),
(64, 4, 'ukebRkWNnI7TWDz', '7oJoTDGj9j5C55Z', 959, '20.00', 1, 0, 0, '0000-00-00 00:00:00', '2018-09-14 01:55:29', 1, 0, 0, '', 0, '2018-09-10 01:55:29'),
(65, 4, 'KGYWR5m7kvKt6YW', '7oJoTDGj9j5C55Z', 959, '20.00', 1, 0, 0, '0000-00-00 00:00:00', '2018-09-14 01:55:29', 0, 1, 0, '', 0, '2018-09-10 01:55:29'),
(66, 4, 'noE54ekUswSkgnp', '7oJoTDGj9j5C55Z', 959, '20.00', 1, 0, 0, '0000-00-00 00:00:00', '2018-09-14 02:09:08', 1, 0, 0, '', 0, '2018-09-10 02:09:08'),
(67, 4, 'xwETNSb4dZ6lmwr', 'AJHKdtMUJkcUqoh', 960, '20.00', 1, 0, 0, '0000-00-00 00:00:00', '2018-09-14 02:09:09', 0, 1, 0, '', 0, '2018-09-10 02:09:09'),
(68, 4, 'cOj7gKRIfa66tEM', 'AJHKdtMUJkcUqoh', 960, '20.00', 1, 0, 0, '0000-00-00 00:00:00', '2018-09-14 02:09:36', 1, 0, 0, '', 0, '2018-09-10 02:09:36'),
(69, 4, 'ZSdbdUlUdNDawq6', 'AJHKdtMUJkcUqoh', 960, '20.00', 1, 0, 0, '0000-00-00 00:00:00', '2018-09-14 02:09:36', 0, 1, 0, '', 0, '2018-09-10 02:09:36'),
(70, 4, 'm3QJMzyo9X4wTbG', 'AJHKdtMUJkcUqoh', 960, '20.00', 1, 0, 0, '0000-00-00 00:00:00', '2018-09-14 02:10:16', 1, 0, 0, '', 0, '2018-09-10 02:10:16'),
(71, 4, 'aJ9RB2rI99DOq7L', 'AJHKdtMUJkcUqoh', 960, '20.00', 1, 0, 0, '0000-00-00 00:00:00', '2018-09-14 02:10:16', 0, 1, 0, '', 0, '2018-09-10 02:10:16'),
(72, 4, 'jsRtH1yik11k7GY', 'y5scESYtagQZDe5', 961, '20.00', 1, 0, 0, '0000-00-00 00:00:00', '2018-09-14 02:10:21', 1, 0, 0, '', 0, '2018-09-10 02:10:21'),
(73, 4, 'a4uAsnofo2bsHda', 'y5scESYtagQZDe5', 961, '20.00', 1, 0, 0, '0000-00-00 00:00:00', '2018-09-14 02:10:21', 0, 1, 0, '', 0, '2018-09-10 02:10:21'),
(74, 4, 'ivMyW4lYSfru2JE', 'y5scESYtagQZDe5', 961, '20.00', 1, 0, 0, '0000-00-00 00:00:00', '2018-09-14 02:10:36', 1, 0, 0, '', 0, '2018-09-10 02:10:36'),
(75, 4, '852ZdGphYBsMvRv', 'y5scESYtagQZDe5', 961, '20.00', 1, 0, 0, '0000-00-00 00:00:00', '2018-09-14 02:10:36', 0, 1, 0, '', 0, '2018-09-10 02:10:36');

-- --------------------------------------------------------

--
-- Estrutura da tabela `planos`
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
-- Extraindo dados da tabela `planos`
--

INSERT INTO `planos` (`id`, `userid`, `nomeplano`, `descricao`, `valor`, `registro`) VALUES
(1, 0, 'plano AAB', '', '100.02', '0000-00-00 00:00:00'),
(3, 0, 'Plano C', '', '1001.00', '2018-07-26 03:35:32');

-- --------------------------------------------------------

--
-- Estrutura da tabela `planos_usuario`
--

CREATE TABLE `planos_usuario` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `idplano` int(11) NOT NULL,
  `cupom` varchar(255) NOT NULL,
  `registro` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `planos_usuario`
--

INSERT INTO `planos_usuario` (`id`, `userid`, `idplano`, `cupom`, `registro`) VALUES
(1, 4, 1, '12', '0000-00-00 00:00:00'),
(2, 4, 2, '13', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `saldo`
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
-- Extraindo dados da tabela `saldo`
--

INSERT INTO `saldo` (`id`, `userid`, `saldo`, `saldo_antigo`, `cupom`, `ganhos`, `registro`) VALUES
(8, 4, '0.00', '0.00', '', '0.00', '2018-07-13 17:44:12'),
(4, 4, '0.00', '0.00', '', '0.00', '2018-07-13 17:43:05'),
(5, 4, '0.00', '0.00', '', '0.00', '2018-07-13 17:43:07'),
(6, 4, '0.00', '0.00', '', '0.00', '2018-07-13 17:43:13'),
(7, 4, '0.00', '0.00', '', '0.00', '2018-07-13 17:43:42'),
(539, 4, '0.00', '0.00', '', '0.00', '2018-07-13 17:44:15'),
(1070, 4, '0.00', '0.00', '', '0.00', '2018-07-13 17:44:18'),
(1601, 4, '10000.00', '0.00', '', '0.00', '2018-07-13 17:44:22'),
(2396, 868, '0.00', '0.00', '', '0.00', '2018-07-26 03:04:59'),
(2397, 869, '0.00', '0.00', '', '0.00', '2018-08-02 20:23:36'),
(2398, 870, '0.00', '0.00', '', '0.00', '2018-08-02 20:28:21'),
(2399, 871, '0.00', '0.00', '', '0.00', '2018-08-02 20:29:17'),
(2400, 872, '0.00', '0.00', '', '0.00', '2018-08-02 20:30:30'),
(2401, 873, '0.00', '0.00', '', '0.00', '2018-08-02 20:31:34'),
(2402, 874, '0.00', '0.00', '', '0.00', '2018-08-02 20:32:29'),
(2403, 875, '0.00', '0.00', '', '0.00', '2018-08-02 20:32:45'),
(2404, 876, '0.00', '0.00', '', '0.00', '2018-08-02 20:33:35'),
(2405, 877, '0.00', '0.00', '', '0.00', '2018-08-02 20:35:14'),
(2406, 878, '0.00', '0.00', '', '0.00', '2018-08-02 20:36:55'),
(2407, 879, '0.00', '0.00', '', '0.00', '2018-08-02 20:37:03'),
(2408, 880, '0.00', '0.00', '', '0.00', '2018-08-02 20:37:10'),
(2409, 881, '0.00', '0.00', '', '0.00', '2018-08-02 20:38:03'),
(2410, 882, '0.00', '0.00', '', '0.00', '2018-08-02 20:40:47'),
(2411, 883, '0.00', '0.00', '', '0.00', '2018-08-02 21:06:33'),
(2412, 884, '0.00', '0.00', '', '0.00', '2018-08-02 21:07:55'),
(2413, 885, '0.00', '0.00', '', '0.00', '2018-08-02 21:08:45'),
(2414, 886, '0.00', '0.00', '', '0.00', '2018-08-02 21:08:59'),
(2415, 887, '0.00', '0.00', '', '0.00', '2018-08-02 21:26:45'),
(2416, 888, '0.00', '0.00', '', '0.00', '2018-08-02 21:27:24'),
(2417, 889, '0.00', '0.00', '', '0.00', '2018-08-02 21:28:07'),
(2418, 890, '0.00', '0.00', '', '0.00', '2018-08-02 21:28:22'),
(2419, 891, '0.00', '0.00', '', '0.00', '2018-08-02 21:28:36'),
(2420, 892, '0.00', '0.00', '', '0.00', '2018-08-02 21:46:43'),
(2421, 893, '0.00', '0.00', '', '0.00', '2018-08-02 21:47:41'),
(2422, 894, '0.00', '0.00', '', '0.00', '2018-08-02 21:47:48'),
(2423, 895, '0.00', '0.00', '', '0.00', '2018-08-02 21:47:58'),
(2424, 896, '0.00', '0.00', '', '0.00', '2018-08-02 21:48:18'),
(2425, 897, '0.00', '0.00', '', '0.00', '2018-08-07 19:30:57'),
(2426, 898, '0.00', '0.00', '', '0.00', '2018-08-07 19:33:35'),
(2427, 899, '0.00', '0.00', '', '0.00', '2018-08-07 19:33:50'),
(2428, 900, '0.00', '0.00', '', '0.00', '2018-08-07 19:33:57'),
(2429, 901, '0.00', '0.00', '', '0.00', '2018-08-07 19:34:03'),
(2430, 902, '0.00', '0.00', '', '0.00', '2018-08-07 19:34:42'),
(2431, 903, '0.00', '0.00', '', '0.00', '2018-08-07 19:43:52'),
(2432, 904, '0.00', '0.00', '', '0.00', '2018-08-07 19:44:00'),
(2433, 905, '0.00', '0.00', '', '0.00', '2018-08-07 19:44:15'),
(2434, 906, '0.00', '0.00', '', '0.00', '2018-08-07 19:44:21'),
(2435, 907, '0.00', '0.00', '', '0.00', '2018-08-07 19:44:28'),
(2436, 908, '0.00', '0.00', '', '0.00', '2018-08-07 20:07:06'),
(2437, 909, '0.00', '0.00', '', '0.00', '2018-08-07 20:07:13'),
(2438, 910, '0.00', '0.00', '', '0.00', '2018-08-07 20:07:19'),
(2439, 911, '0.00', '0.00', '', '0.00', '2018-08-07 20:07:25'),
(2440, 912, '0.00', '0.00', '', '0.00', '2018-08-07 20:07:31'),
(2441, 913, '0.00', '0.00', '', '0.00', '2018-08-07 20:08:01'),
(2442, 914, '0.00', '0.00', '', '0.00', '2018-08-07 20:08:08'),
(2443, 915, '0.00', '0.00', '', '0.00', '2018-08-07 20:08:13'),
(2444, 916, '0.00', '0.00', '', '0.00', '2018-08-07 20:08:20'),
(2445, 917, '0.00', '0.00', '', '0.00', '2018-08-07 20:08:27'),
(2446, 918, '0.00', '0.00', '', '0.00', '2018-08-07 20:31:23'),
(2447, 919, '0.00', '0.00', '', '0.00', '2018-08-07 20:31:29'),
(2448, 920, '0.00', '0.00', '', '0.00', '2018-08-07 20:31:34'),
(2449, 921, '0.00', '0.00', '', '0.00', '2018-08-07 20:31:42'),
(2450, 922, '0.00', '0.00', '', '0.00', '2018-08-07 20:31:50'),
(2451, 923, '0.00', '0.00', '', '0.00', '2018-08-07 20:34:52'),
(2452, 924, '0.00', '0.00', '', '0.00', '2018-08-07 20:34:57'),
(2453, 925, '0.00', '0.00', '', '0.00', '2018-08-07 20:35:03'),
(2454, 926, '0.00', '0.00', '', '0.00', '2018-08-07 20:35:08'),
(2455, 927, '0.00', '0.00', '', '0.00', '2018-08-07 20:35:14'),
(2456, 928, '0.00', '0.00', '', '0.00', '2018-08-07 20:36:29'),
(2457, 929, '0.00', '0.00', '', '0.00', '2018-08-07 20:36:35'),
(2458, 930, '0.00', '0.00', '', '0.00', '2018-08-07 20:36:41'),
(2459, 931, '0.00', '0.00', '', '0.00', '2018-08-07 20:36:53'),
(2460, 932, '0.00', '0.00', '', '0.00', '2018-08-07 20:36:58'),
(2461, 933, '0.00', '0.00', '', '0.00', '2018-08-07 20:37:24'),
(2462, 934, '0.00', '0.00', '', '0.00', '2018-08-07 20:37:29'),
(2463, 935, '0.00', '0.00', '', '0.00', '2018-08-07 20:37:35'),
(2464, 936, '0.00', '0.00', '', '0.00', '2018-08-07 20:37:41'),
(2465, 937, '0.00', '0.00', '', '0.00', '2018-08-07 20:39:48'),
(2466, 938, '0.00', '0.00', '', '0.00', '2018-08-07 20:39:53'),
(2467, 939, '0.00', '0.00', '', '0.00', '2018-08-07 20:39:58'),
(2468, 940, '0.00', '0.00', '', '0.00', '2018-08-07 20:40:04'),
(2469, 941, '0.00', '0.00', '', '0.00', '2018-08-07 20:40:10'),
(2470, 942, '0.00', '0.00', '', '0.00', '2018-08-07 20:44:47'),
(2471, 943, '0.00', '0.00', '', '0.00', '2018-08-07 20:45:16'),
(2472, 944, '0.00', '0.00', '', '0.00', '2018-08-07 20:45:33'),
(2473, 945, '0.00', '0.00', '', '0.00', '2018-08-07 20:45:38'),
(2474, 946, '0.00', '0.00', '', '0.00', '2018-08-07 20:45:43'),
(2475, 947, '0.00', '0.00', '', '0.00', '2018-08-07 20:46:50'),
(2476, 948, '0.00', '0.00', '', '0.00', '2018-08-07 20:47:03'),
(2477, 949, '0.00', '0.00', '', '0.00', '2018-08-07 20:47:09'),
(2478, 950, '0.00', '0.00', '', '0.00', '2018-08-07 20:47:17'),
(2479, 951, '0.00', '0.00', '', '0.00', '2018-08-07 20:47:22'),
(2480, 952, '0.00', '0.00', '', '0.00', '2018-08-07 20:47:28'),
(2481, 953, '0.00', '0.00', '', '0.00', '2018-08-08 14:58:45'),
(2482, 954, '0.00', '0.00', '', '0.00', '2018-08-08 14:59:41'),
(2483, 955, '0.00', '0.00', '', '0.00', '2018-08-08 15:00:54'),
(2484, 956, '0.00', '0.00', '', '0.00', '2018-08-08 15:02:03'),
(2485, 957, '0.00', '0.00', '', '0.00', '2018-08-08 15:08:20'),
(2486, 958, '0.00', '0.00', '', '0.00', '2018-08-30 01:07:17'),
(2487, 959, '0.00', '0.00', '', '0.00', '2018-08-30 02:22:59'),
(2488, 960, '0.00', '0.00', '', '0.00', '2018-08-31 01:14:26'),
(2489, 961, '0.00', '0.00', '', '0.00', '2018-08-31 01:15:33'),
(2490, 962, '0.00', '0.00', '', '0.00', '2018-08-31 01:17:10'),
(2491, 963, '0.00', '0.00', '', '0.00', '2018-08-31 01:18:53'),
(2492, 964, '0.00', '0.00', '', '0.00', '2018-08-31 01:19:39'),
(2493, 965, '0.00', '0.00', '', '0.00', '2018-08-31 01:20:13'),
(2494, 966, '0.00', '0.00', '', '0.00', '2018-09-04 19:12:04');

-- --------------------------------------------------------

--
-- Estrutura da tabela `saldobloqueado`
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
-- Extraindo dados da tabela `saldobloqueado`
--

INSERT INTO `saldobloqueado` (`id`, `userid`, `saldo`, `saldo_antigo`, `ganhos`, `idinvestimento`, `registro`) VALUES
(1, 868, '0.00', '0.00', '0.00', 0, '2018-07-26 03:04:59'),
(2, 869, '0.00', '0.00', '0.00', 0, '2018-08-02 20:23:36'),
(3, 870, '0.00', '0.00', '0.00', 0, '2018-08-02 20:28:21'),
(4, 871, '0.00', '0.00', '0.00', 0, '2018-08-02 20:29:17'),
(5, 872, '0.00', '0.00', '0.00', 0, '2018-08-02 20:30:30'),
(6, 873, '0.00', '0.00', '0.00', 0, '2018-08-02 20:31:34'),
(7, 874, '0.00', '0.00', '0.00', 0, '2018-08-02 20:32:29'),
(8, 875, '0.00', '0.00', '0.00', 0, '2018-08-02 20:32:45'),
(9, 876, '0.00', '0.00', '0.00', 0, '2018-08-02 20:33:35'),
(10, 877, '0.00', '0.00', '0.00', 0, '2018-08-02 20:35:14'),
(11, 878, '0.00', '0.00', '0.00', 0, '2018-08-02 20:36:55'),
(12, 879, '0.00', '0.00', '0.00', 0, '2018-08-02 20:37:03'),
(13, 880, '0.00', '0.00', '0.00', 0, '2018-08-02 20:37:10'),
(14, 881, '0.00', '0.00', '0.00', 0, '2018-08-02 20:38:03'),
(15, 882, '0.00', '0.00', '0.00', 0, '2018-08-02 20:40:47'),
(16, 883, '0.00', '0.00', '0.00', 0, '2018-08-02 21:06:33'),
(17, 884, '0.00', '0.00', '0.00', 0, '2018-08-02 21:07:55'),
(18, 885, '0.00', '0.00', '0.00', 0, '2018-08-02 21:08:45'),
(19, 886, '0.00', '0.00', '0.00', 0, '2018-08-02 21:08:59'),
(20, 887, '0.00', '0.00', '0.00', 0, '2018-08-02 21:26:45'),
(21, 888, '0.00', '0.00', '0.00', 0, '2018-08-02 21:27:24'),
(22, 889, '0.00', '0.00', '0.00', 0, '2018-08-02 21:28:07'),
(23, 890, '0.00', '0.00', '0.00', 0, '2018-08-02 21:28:22'),
(24, 891, '0.00', '0.00', '0.00', 0, '2018-08-02 21:28:36'),
(25, 892, '0.00', '0.00', '0.00', 0, '2018-08-02 21:46:43'),
(26, 893, '0.00', '0.00', '0.00', 0, '2018-08-02 21:47:41'),
(27, 894, '0.00', '0.00', '0.00', 0, '2018-08-02 21:47:48'),
(28, 895, '0.00', '0.00', '0.00', 0, '2018-08-02 21:47:58'),
(29, 896, '0.00', '0.00', '0.00', 0, '2018-08-02 21:48:18'),
(30, 897, '0.00', '0.00', '0.00', 0, '2018-08-07 19:30:57'),
(31, 898, '0.00', '0.00', '0.00', 0, '2018-08-07 19:33:35'),
(32, 899, '0.00', '0.00', '0.00', 0, '2018-08-07 19:33:50'),
(33, 900, '0.00', '0.00', '0.00', 0, '2018-08-07 19:33:57'),
(34, 901, '0.00', '0.00', '0.00', 0, '2018-08-07 19:34:03'),
(35, 902, '0.00', '0.00', '0.00', 0, '2018-08-07 19:34:42'),
(36, 903, '0.00', '0.00', '0.00', 0, '2018-08-07 19:43:52'),
(37, 904, '0.00', '0.00', '0.00', 0, '2018-08-07 19:44:00'),
(38, 905, '0.00', '0.00', '0.00', 0, '2018-08-07 19:44:15'),
(39, 906, '0.00', '0.00', '0.00', 0, '2018-08-07 19:44:21'),
(40, 907, '0.00', '0.00', '0.00', 0, '2018-08-07 19:44:28'),
(41, 908, '0.00', '0.00', '0.00', 0, '2018-08-07 20:07:06'),
(42, 909, '0.00', '0.00', '0.00', 0, '2018-08-07 20:07:13'),
(43, 910, '0.00', '0.00', '0.00', 0, '2018-08-07 20:07:19'),
(44, 911, '0.00', '0.00', '0.00', 0, '2018-08-07 20:07:25'),
(45, 912, '0.00', '0.00', '0.00', 0, '2018-08-07 20:07:31'),
(46, 913, '0.00', '0.00', '0.00', 0, '2018-08-07 20:08:01'),
(47, 914, '0.00', '0.00', '0.00', 0, '2018-08-07 20:08:08'),
(48, 915, '0.00', '0.00', '0.00', 0, '2018-08-07 20:08:13'),
(49, 916, '0.00', '0.00', '0.00', 0, '2018-08-07 20:08:20'),
(50, 917, '0.00', '0.00', '0.00', 0, '2018-08-07 20:08:27'),
(51, 918, '0.00', '0.00', '0.00', 0, '2018-08-07 20:31:23'),
(52, 919, '0.00', '0.00', '0.00', 0, '2018-08-07 20:31:29'),
(53, 920, '0.00', '0.00', '0.00', 0, '2018-08-07 20:31:34'),
(54, 921, '0.00', '0.00', '0.00', 0, '2018-08-07 20:31:42'),
(55, 922, '0.00', '0.00', '0.00', 0, '2018-08-07 20:31:50'),
(56, 923, '0.00', '0.00', '0.00', 0, '2018-08-07 20:34:52'),
(57, 924, '0.00', '0.00', '0.00', 0, '2018-08-07 20:34:57'),
(58, 925, '0.00', '0.00', '0.00', 0, '2018-08-07 20:35:03'),
(59, 926, '0.00', '0.00', '0.00', 0, '2018-08-07 20:35:08'),
(60, 927, '0.00', '0.00', '0.00', 0, '2018-08-07 20:35:14'),
(61, 928, '0.00', '0.00', '0.00', 0, '2018-08-07 20:36:29'),
(62, 929, '0.00', '0.00', '0.00', 0, '2018-08-07 20:36:35'),
(63, 930, '0.00', '0.00', '0.00', 0, '2018-08-07 20:36:41'),
(64, 931, '0.00', '0.00', '0.00', 0, '2018-08-07 20:36:53'),
(65, 932, '0.00', '0.00', '0.00', 0, '2018-08-07 20:36:58'),
(66, 933, '0.00', '0.00', '0.00', 0, '2018-08-07 20:37:24'),
(67, 934, '0.00', '0.00', '0.00', 0, '2018-08-07 20:37:29'),
(68, 935, '0.00', '0.00', '0.00', 0, '2018-08-07 20:37:35'),
(69, 936, '0.00', '0.00', '0.00', 0, '2018-08-07 20:37:41'),
(70, 937, '0.00', '0.00', '0.00', 0, '2018-08-07 20:39:48'),
(71, 938, '0.00', '0.00', '0.00', 0, '2018-08-07 20:39:53'),
(72, 939, '0.00', '0.00', '0.00', 0, '2018-08-07 20:39:58'),
(73, 940, '0.00', '0.00', '0.00', 0, '2018-08-07 20:40:04'),
(74, 941, '0.00', '0.00', '0.00', 0, '2018-08-07 20:40:10'),
(75, 942, '0.00', '0.00', '0.00', 0, '2018-08-07 20:44:47'),
(76, 943, '0.00', '0.00', '0.00', 0, '2018-08-07 20:45:16'),
(77, 944, '0.00', '0.00', '0.00', 0, '2018-08-07 20:45:33'),
(78, 945, '0.00', '0.00', '0.00', 0, '2018-08-07 20:45:38'),
(79, 946, '0.00', '0.00', '0.00', 0, '2018-08-07 20:45:43'),
(80, 947, '0.00', '0.00', '0.00', 0, '2018-08-07 20:46:50'),
(81, 948, '0.00', '0.00', '0.00', 0, '2018-08-07 20:47:03'),
(82, 949, '0.00', '0.00', '0.00', 0, '2018-08-07 20:47:09'),
(83, 950, '0.00', '0.00', '0.00', 0, '2018-08-07 20:47:17'),
(84, 951, '0.00', '0.00', '0.00', 0, '2018-08-07 20:47:22'),
(85, 952, '0.00', '0.00', '0.00', 0, '2018-08-07 20:47:28'),
(86, 953, '0.00', '0.00', '0.00', 0, '2018-08-08 14:58:45'),
(87, 954, '0.00', '0.00', '0.00', 0, '2018-08-08 14:59:41'),
(88, 955, '0.00', '0.00', '0.00', 0, '2018-08-08 15:00:54'),
(89, 956, '0.00', '0.00', '0.00', 0, '2018-08-08 15:02:03'),
(90, 957, '0.00', '0.00', '0.00', 0, '2018-08-08 15:08:20');

-- --------------------------------------------------------

--
-- Estrutura da tabela `saques`
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
-- Estrutura da tabela `transacao`
--

CREATE TABLE `transacao` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `transacao` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `registro` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `acesso`
--
ALTER TABLE `acesso`
  ADD PRIMARY KEY (`userid`);

--
-- Indexes for table `comprovantes`
--
ALTER TABLE `comprovantes`
  ADD UNIQUE KEY `id_2` (`id`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `configuracoes`
--
ALTER TABLE `configuracoes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dadosbancarios`
--
ALTER TABLE `dadosbancarios`
  ADD PRIMARY KEY (`id`,`nometitular`);

--
-- Indexes for table `dadospessoais`
--
ALTER TABLE `dadospessoais`
  ADD PRIMARY KEY (`userid`,`estado_idEstado`,`cidade_idCidade`,`bairro_IdBairro`,`pais_idPais`);

--
-- Indexes for table `documentos`
--
ALTER TABLE `documentos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faturas`
--
ALTER TABLE `faturas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `financas`
--
ALTER TABLE `financas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `indicados`
--
ALTER TABLE `indicados`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `cupom` (`cupom`);

--
-- Indexes for table `investimentos`
--
ALTER TABLE `investimentos`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_2` (`id`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `ip`
--
ALTER TABLE `ip`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `msg`
--
ALTER TABLE `msg`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pagamentos`
--
ALTER TABLE `pagamentos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `planos`
--
ALTER TABLE `planos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `planos_usuario`
--
ALTER TABLE `planos_usuario`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `saldo`
--
ALTER TABLE `saldo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `saldobloqueado`
--
ALTER TABLE `saldobloqueado`
  ADD UNIQUE KEY `id_2` (`id`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `saques`
--
ALTER TABLE `saques`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transacao`
--
ALTER TABLE `transacao`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `acesso`
--
ALTER TABLE `acesso`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=967;

--
-- AUTO_INCREMENT for table `comprovantes`
--
ALTER TABLE `comprovantes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `configuracoes`
--
ALTER TABLE `configuracoes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `dadosbancarios`
--
ALTER TABLE `dadosbancarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `dadospessoais`
--
ALTER TABLE `dadospessoais`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=967;

--
-- AUTO_INCREMENT for table `documentos`
--
ALTER TABLE `documentos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=707;

--
-- AUTO_INCREMENT for table `faturas`
--
ALTER TABLE `faturas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `financas`
--
ALTER TABLE `financas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `indicados`
--
ALTER TABLE `indicados`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=125;

--
-- AUTO_INCREMENT for table `investimentos`
--
ALTER TABLE `investimentos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ip`
--
ALTER TABLE `ip`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `msg`
--
ALTER TABLE `msg`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pagamentos`
--
ALTER TABLE `pagamentos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT for table `planos`
--
ALTER TABLE `planos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `planos_usuario`
--
ALTER TABLE `planos_usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `saldo`
--
ALTER TABLE `saldo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2495;

--
-- AUTO_INCREMENT for table `saldobloqueado`
--
ALTER TABLE `saldobloqueado`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT for table `saques`
--
ALTER TABLE `saques`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transacao`
--
ALTER TABLE `transacao`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
