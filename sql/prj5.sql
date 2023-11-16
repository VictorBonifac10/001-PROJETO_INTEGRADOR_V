-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 16-Nov-2023 às 14:09
-- Versão do servidor: 10.4.25-MariaDB
-- versão do PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `prj5`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `clientes_prj5`
--

CREATE TABLE `clientes_prj5` (
  `id` int(11) NOT NULL,
  `nome` varchar(45) DEFAULT NULL,
  `email` varchar(110) DEFAULT NULL,
  `senha` varchar(15) DEFAULT NULL,
  `nomeEmpresa` varchar(110) DEFAULT NULL,
  `produtoEmpresa` varchar(110) DEFAULT NULL,
  `cnpj` varchar(14) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `clientes_prj5`
--

INSERT INTO `clientes_prj5` (`id`, `nome`, `email`, `senha`, `nomeEmpresa`, `produtoEmpresa`, `cnpj`) VALUES
(1, 'Victor', 'victorbonifacio@gmail.com', '993090225', 'prj5', NULL, '12345678901234'),
(2, 'Amanda', 'joaninhadastrevas@gmail.com', '998765431', 'prj5', NULL, '12345678901234'),
(3, 'Juliana Paes Mundial', 'joaninhadastrevas@gmail.com', 'hsgsnbsghakllo', 'prj5', NULL, '12345678901234'),
(4, 'teste4', 'teste4@gmail.com', 'teste4', 'teste4', NULL, 'teste4'),
(5, 'teste5teste', 'test@gmail.com', 'test6', 'teste', NULL, '12345678901230'),
(6, 'tal', 'crisloures@gmail.com', '123456', 'tal', NULL, '1234567890'),
(7, 'Victor', 'joaninhadastrevas@gmail.com', '123', 'prj5', NULL, '1234567890'),
(9, 'Lucas', 'crisloures@gmail.com', '123', 'ee', NULL, '12'),
(10, 'Victor', 'victorbonifacio@gmail.com', '123', 'ee', NULL, '12345678901230'),
(11, 'Lucas', 'teste@gmail.com', '000', 'tal', NULL, '12'),
(12, 'Kaio', 'kaio@gmail.com', 'kaio', 'kaio', NULL, '12345678910'),
(13, 'Laura', 'laura@gmail.com', 'laura', 'laura', NULL, '123456765490'),
(14, 'José', 'jose@gmail.com', 'jose', 'jose', NULL, '123123456456'),
(15, 'Eduardo', 'Eduardo@gmail.com', 'Eduardo', 'Eduardo', NULL, '12345664324'),
(16, 'kwj', 'kwj@gmai.com', '123', '123', 'Alface', '1234567789917'),
(17, 'Ze', 'Ze@gmail.com', '123', 'Ze', 'Repolho', '1234678911'),
(18, 'mariano', 'mariano@gmail.com', '123', 'marin', 'Alface', '1236789082');

-- --------------------------------------------------------

--
-- Estrutura da tabela `custos_prj5`
--

CREATE TABLE `custos_prj5` (
  `id` int(11) NOT NULL,
  `data_insercao` datetime NOT NULL DEFAULT current_timestamp(),
  `mes` varchar(100) DEFAULT NULL,
  `sementes` varchar(100) DEFAULT NULL,
  `fertilizante` varchar(100) DEFAULT NULL,
  `pesticida` varchar(100) DEFAULT NULL,
  `adubo` varchar(100) DEFAULT NULL,
  `irrigacao` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `custos_prj5`
--

INSERT INTO `custos_prj5` (`id`, `data_insercao`, `mes`, `sementes`, `fertilizante`, `pesticida`, `adubo`, `irrigacao`) VALUES
(19, '2023-11-12 16:44:34', 'Janeiro', '678,90', '345,65', '120,90', '213,10', '1110,90'),
(20, '2023-11-12 16:45:03', 'Fevereiro', '678,90', '578,45', '90,90', '2500,67', '1200,90'),
(21, '2023-11-12 16:45:31', 'Março', '678,90', '4567,89', '120,90', '263,10', '3235,97'),
(23, '2023-11-12 16:59:48', 'Abril', '678,90', '345,67', '120,90', '56,87', '3235,97'),
(24, '2023-11-12 17:01:48', 'Maio', '120,90', '4567,89', '2734,76', '2500,67', '2435,97'),
(25, '2023-11-12 17:02:18', 'Junho', '678,90', '120,90', '265,89', '56,87', '2435,97'),
(26, '2023-11-12 17:03:07', 'Julho', '120,90', '345,65', '67,90', '263,10', '1110,90'),
(27, '2023-11-12 17:03:33', 'Agosto', '845,76', '120,90', '2734,76', '263,10', '1200,90'),
(28, '2023-11-12 17:04:04', 'Setembro', '678,90', '578,45', '2734,76', '56,87', '1110,90'),
(29, '2023-11-12 17:05:17', 'Outubro', '678,90', '120,90', '120,90', '2500,67', '1110,90');

-- --------------------------------------------------------

--
-- Estrutura da tabela `produtos_prj5`
--

CREATE TABLE `produtos_prj5` (
  `id` int(11) NOT NULL,
  `solicitante` varchar(50) DEFAULT NULL,
  `produto` varchar(50) DEFAULT NULL,
  `quantidade` int(255) DEFAULT NULL,
  `valor` float DEFAULT NULL,
  `prazo` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `produtos_prj5`
--

INSERT INTO `produtos_prj5` (`id`, `solicitante`, `produto`, `quantidade`, `valor`, `prazo`) VALUES
(24, 'Mercado23', 'Tomate', 231, 231, '2022-12-12'),
(26, 'SupermercadoY', 'Pimenta', 18, 180, '2022-03-14'),
(27, 'SupermercadoO', 'Tomate', 1122, 122, '1212-12-12'),
(28, 'Mercado181', 'Tomate', 11, 11, '0011-11-11'),
(29, 'MerceariaZ11', 'Cenoura', 111, 111, '2022-02-20'),
(30, 'SupermercadoX', 'Tomate', 0, 88, '1111-11-11'),
(31, 'Mercado18jj', 'Café', 90, 90, '2011-11-11'),
(33, 'MerceariaZ', 'Cenoura', 19, 643, '2023-12-12'),
(34, 'MerceariaU', 'Algodão', 16, 500, '2023-10-14'),
(35, 'SupermercadoY', 'Cenoura', 14, 166, '2023-12-13'),
(36, 'SupermercadoQ', 'Laranja', 18, 198, '2023-12-13'),
(37, 'Mercado18', 'Algodão', 12, 155, '2023-11-15'),
(38, 'MerceariaZ', 'Laranja', 20, 2000, '2023-12-14'),
(39, 'SupermercadoY', 'Algodão', 10, 100, '2023-05-17'),
(40, 'MerceariaU', 'Tomate', 13, 300, '2023-12-19'),
(41, 'Mercado12', 'Café', 40, 4000, '2023-12-12'),
(42, 'MerceariaU', 'Milho', 12, 200, '2023-12-12'),
(43, 'Mercado12', 'Tomate', 12, 200, '2023-08-12'),
(44, 'Mercado12', 'Cenoura', 13, 300, '2023-10-10'),
(45, 'SupermercadoX', 'Alface', 15, 300, '2023-07-15'),
(46, 'Mercado12', 'Rabanete', 12, 300, '2023-10-20'),
(47, 'Mercado181', 'Alho', 13, 190, '2023-05-14'),
(48, 'SupermercadoY', 'Alface', 14, 400, '2023-12-14');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `clientes_prj5`
--
ALTER TABLE `clientes_prj5`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `custos_prj5`
--
ALTER TABLE `custos_prj5`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `produtos_prj5`
--
ALTER TABLE `produtos_prj5`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `clientes_prj5`
--
ALTER TABLE `clientes_prj5`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de tabela `custos_prj5`
--
ALTER TABLE `custos_prj5`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT de tabela `produtos_prj5`
--
ALTER TABLE `produtos_prj5`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
