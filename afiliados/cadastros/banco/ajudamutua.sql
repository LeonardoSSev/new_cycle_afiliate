-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 31-Jul-2018 às 22:03
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
-- Database: `doublecash`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `acesso`
--

CREATE TABLE `acesso` (
  `userid` int(11) NOT NULL,
  `usuario` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `sponsorid` int(11) NOT NULL,
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

INSERT INTO `acesso` (`userid`, `usuario`, `sponsorid`, `senha`, `senhafinanceira`, `admin`, `fotos`, `status`, `datavencimento`, `bash`, `registro`, `ativacao`) VALUES
(4, 'admin', 0, '202cb962ac59075b964b07152d234b70', '202cb962ac59075b964b07152d234b70', 1, '1a13f60a61aaa93a5cc1d89a0c9a84d6.png', 0, '0000-00-00 00:00:00', '21232f297a57a5a743894a0e4a801fc3', '0000-00-00 00:00:00', 1),
(868, 'teste', 0, '202cb962ac59075b964b07152d234b70', '', 0, '', 0, '0000-00-00 00:00:00', '', '2018-07-26 03:04:59', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `comprovantes`
--

CREATE TABLE `comprovantes` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `imagem` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
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
  `valor1` decimal(10,2) NOT NULL,
  `registro` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `configuracoes`
--

INSERT INTO `configuracoes` (`id`, `valor1`, `registro`) VALUES
(1, '0.85', '0000-00-00 00:00:00');

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
  `carteira` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `mibank` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `intermedium` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `contasuper` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `dadosbancarios`
--

INSERT INTO `dadosbancarios` (`id`, `userid`, `banco`, `agencia`, `conta`, `tipoconta`, `registro`, `cpftitular`, `nometitular`, `operacao`, `carteira`, `mibank`, `intermedium`, `contasuper`) VALUES
(34187, 4, 'itau', '0459sdfsd', '3011788', 'CC', '0000-00-00 00:00:00', '000gg', 'sdfsff', '0', '', '0', '', ''),
(34311, NULL, 'mibank', NULL, NULL, NULL, '2018-05-15 11:07:37', '', '', '', '', '368911-11', '', ''),
(34312, NULL, 'mibank', NULL, NULL, NULL, '2018-05-15 11:08:33', '', '', '', '', '368911-11', '', ''),
(34317, NULL, 'mibank', NULL, NULL, NULL, '2018-05-15 13:59:50', '', '', '', '', '368911-11', '', ''),
(34318, NULL, 'mibank', NULL, NULL, NULL, '2018-05-15 14:06:17', '', '', '', '', '368911-11', '', ''),
(34319, NULL, 'mibank', NULL, NULL, NULL, '2018-05-15 14:10:30', '', '', '', '', '368911-11', '', ''),
(34320, NULL, 'mibank', NULL, NULL, NULL, '2018-05-15 14:13:31', '', '', '', '', '36891111', '', ''),
(34387, NULL, 'mibank', NULL, NULL, NULL, '2018-05-28 02:34:12', '', '', '', '', '43623605', '', ''),
(34388, NULL, 'mibank', NULL, NULL, NULL, '2018-05-28 02:39:13', '', '', '', '', '43623605', '', ''),
(34389, NULL, 'mibank', NULL, NULL, NULL, '2018-05-28 02:42:31', '', '', '', '', '43623605', '', ''),
(34400, NULL, 'mibank', NULL, NULL, NULL, '2018-05-29 12:44:10', '', '', '', '', '60503502', '', ''),
(34401, NULL, 'mibank', NULL, NULL, NULL, '2018-05-29 12:45:17', '', '', '', '', '605035-02', '', ''),
(34402, NULL, 'mibank', NULL, NULL, NULL, '2018-05-29 12:46:05', '', '', '', '', '60503502', '', ''),
(34432, NULL, 'mibank', NULL, NULL, NULL, '2018-06-02 21:35:02', '', '', '', '', '56729011', '', ''),
(34433, NULL, 'mibank', NULL, NULL, NULL, '2018-06-02 21:36:02', '', '', '', '', '56729011', '', ''),
(34434, NULL, 'mibank', NULL, NULL, NULL, '2018-06-02 21:37:05', '', '', '', '', '56729011', '', ''),
(34435, NULL, 'mibank', NULL, NULL, NULL, '2018-06-02 21:38:29', '', '', '', '', '56729011', '', ''),
(34443, NULL, 'mibank', NULL, NULL, NULL, '2018-06-04 00:10:11', '', '', '', '', '813759-10', '', ''),
(34444, NULL, 'mibank', NULL, NULL, NULL, '2018-06-04 00:11:06', '', '', '', '', '813759-10', '', ''),
(34447, NULL, 'mibank', NULL, NULL, NULL, '2018-06-04 12:03:10', '', '', '', '', '44320705', '', ''),
(34448, NULL, 'mibank', NULL, NULL, NULL, '2018-06-04 12:04:49', '', '', '', '', '44320705', '', ''),
(34449, NULL, 'mibank', NULL, NULL, NULL, '2018-06-04 12:05:57', '', '', '', '', '44320705', '', ''),
(34700, NULL, 'mibank', NULL, NULL, NULL, '2018-06-26 19:51:33', '', '', '', '', '815690-04', '', ''),
(34701, NULL, 'mibank', NULL, NULL, NULL, '2018-06-26 19:52:31', '', '', '', '', '815690-04', '', ''),
(34702, NULL, 'mibank', NULL, NULL, NULL, '2018-06-26 19:53:45', '', '', '', '', '815690-04', '', ''),
(34703, NULL, 'mibank', NULL, NULL, NULL, '2018-06-26 19:54:30', '', '', '', '', '815690-04', '', ''),
(34730, NULL, 'mibank', NULL, NULL, NULL, '2018-06-28 14:13:09', '', '', '', '', '532571-01', '', ''),
(34780, NULL, 'mibank', NULL, NULL, NULL, '2018-07-02 14:57:36', '', '', '', '', '638918-07', '', ''),
(34781, NULL, 'mibank', NULL, NULL, NULL, '2018-07-02 14:58:36', '', '', '', '', '638918-07', '', ''),
(34830, NULL, 'mibank', NULL, NULL, NULL, '2018-07-06 20:38:17', '', '', '', '', '324245-07', '', ''),
(34831, NULL, 'mibank', NULL, NULL, NULL, '2018-07-06 20:39:43', '', '', '', '', '324245-07', '', ''),
(34832, NULL, 'mibank', NULL, NULL, NULL, '2018-07-06 20:40:52', '', '', '', '', '324245-07', '', ''),
(34857, NULL, 'mibank', NULL, NULL, NULL, '2018-07-09 15:40:47', '', '', '', '', '516182-02', '', ''),
(34858, NULL, 'mibank', NULL, NULL, NULL, '2018-07-09 15:42:23', '', '', '', '', '516182-02', '', ''),
(34859, NULL, 'mibank', NULL, NULL, NULL, '2018-07-09 15:56:27', '', '', '', '', '516182-02', '', ''),
(34860, NULL, 'mibank', NULL, NULL, NULL, '2018-07-09 15:58:17', '', '', '', '', '516182-02', '', ''),
(34861, NULL, 'mibank', NULL, NULL, NULL, '2018-07-09 15:58:48', '', '', '', '', '516182-02', '', ''),
(34885, NULL, 'mibank', NULL, NULL, NULL, '2018-07-19 23:41:36', '', '', '', '', '891612-07', '', ''),
(34886, NULL, 'mibank', NULL, NULL, NULL, '2018-07-19 23:44:34', '', '', '', '', '891612-07', '', ''),
(34887, 4, 'mibank', NULL, NULL, NULL, '2018-07-20 04:53:56', '', '', '', '', '891612-07', '', ''),
(34888, 4, 'mibank', NULL, NULL, NULL, '2018-07-20 04:56:51', '', '', '', '', '358474-03', '', ''),
(34892, 4, 'mibank', NULL, NULL, NULL, '2018-07-20 23:06:09', '', '', '', '', '605035-02', '', ''),
(34893, NULL, 'mibank', NULL, NULL, NULL, '2018-07-20 23:06:42', '', '', '', '', '605035-02', '', ''),
(34894, NULL, 'mibank', NULL, NULL, NULL, '2018-07-20 23:08:05', '', '', '', '', '856398-11', '', ''),
(34895, 4, 'mibank', NULL, NULL, NULL, '2018-07-20 23:08:54', '', '', '', '', '605035-02', '', ''),
(34911, 4, 'bradesco', 'sd', 'sd', 'CP', '2018-07-26 01:32:35', 'sde', 'sd', 'sd', '', '', '', ''),
(34912, 868, 'mibank', NULL, NULL, NULL, '2018-07-26 03:04:59', '', '', '', '', '', '', '');

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
(868, 'SANTOS', NULL, '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 0, '', '2018-07-26 03:04:59', 0, 0, 0, 0, 0, 0, 0, '');

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
(608, 868, 0, '', '', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '');

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
-- Estrutura da tabela `historico_saldobloqueado`
--

CREATE TABLE `historico_saldobloqueado` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `valor` decimal(10,2) NOT NULL,
  `investimento` int(11) NOT NULL,
  `registro` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

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
  `dataativacao` datetime NOT NULL,
  `registro` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `indicados`
--

INSERT INTO `indicados` (`id`, `cupom`, `userid`, `sponsorid`, `upline`, `fase`, `ativacao`, `posicao`, `reentrada`, `habilitar`, `trava`, `logins`, `fase1`, `fase2`, `fase3`, `fase4`, `fase5`, `fase6`, `fase7`, `fase8`, `datavencimento`, `dataativacao2`, `dataativacao3`, `dataativacao4`, `dataativacao5`, `dataativacao6`, `dataativacao7`, `dataativacao8`, `dataativacao`, `registro`) VALUES
(1, 'PIVsKhbJXiLhlX8', 4, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

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
-- Estrutura da tabela `percentual`
--

CREATE TABLE `percentual` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `percentual` decimal(10,2) NOT NULL,
  `registro` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

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
(2396, 868, '0.00', '0.00', '', '0.00', '2018-07-26 03:04:59');

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
(1, 868, '0.00', '0.00', '0.00', 0, '2018-07-26 03:04:59');

-- --------------------------------------------------------

--
-- Estrutura da tabela `saldoinvestimento`
--

CREATE TABLE `saldoinvestimento` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `saldo` decimal(10,2) NOT NULL,
  `registro` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

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
-- Indexes for table `historico_saldobloqueado`
--
ALTER TABLE `historico_saldobloqueado`
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `id_2` (`id`);

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
-- Indexes for table `percentual`
--
ALTER TABLE `percentual`
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
-- Indexes for table `saldoinvestimento`
--
ALTER TABLE `saldoinvestimento`
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
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=869;

--
-- AUTO_INCREMENT for table `comprovantes`
--
ALTER TABLE `comprovantes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `configuracoes`
--
ALTER TABLE `configuracoes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `dadosbancarios`
--
ALTER TABLE `dadosbancarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34913;

--
-- AUTO_INCREMENT for table `dadospessoais`
--
ALTER TABLE `dadospessoais`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=869;

--
-- AUTO_INCREMENT for table `documentos`
--
ALTER TABLE `documentos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=609;

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
-- AUTO_INCREMENT for table `historico_saldobloqueado`
--
ALTER TABLE `historico_saldobloqueado`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `indicados`
--
ALTER TABLE `indicados`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
-- AUTO_INCREMENT for table `percentual`
--
ALTER TABLE `percentual`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2397;

--
-- AUTO_INCREMENT for table `saldobloqueado`
--
ALTER TABLE `saldobloqueado`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `saldoinvestimento`
--
ALTER TABLE `saldoinvestimento`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

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
