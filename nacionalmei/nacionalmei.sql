-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 12-Jun-2017 às 06:52
-- Versão do servidor: 10.1.21-MariaDB
-- PHP Version: 7.0.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nacionalmei`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `clientes`
--

CREATE TABLE `clientes` (
  `id` int(11) NOT NULL,
  `nome` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `senha` varchar(200) NOT NULL,
  `cadastro` datetime NOT NULL,
  `vazio` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `pedidos`
--

CREATE TABLE `pedidos` (
  `id` int(11) NOT NULL,
  `cliente` int(11) NOT NULL,
  `data_compra` datetime NOT NULL,
  `data_pagamento` datetime DEFAULT NULL,
  `data_processamento` datetime DEFAULT NULL,
  `data_fim` datetime DEFAULT NULL,
  `nome` varchar(200) NOT NULL,
  `cpf` varchar(20) NOT NULL,
  `email1` varchar(200) NOT NULL,
  `email2` varchar(200) DEFAULT NULL,
  `data_nasc` date NOT NULL,
  `telefone` varchar(30) DEFAULT NULL,
  `celular` varchar(30) NOT NULL,
  `rg` varchar(30) NOT NULL,
  `rg_orgao` varchar(30) NOT NULL,
  `rg_uf` varchar(2) NOT NULL,
  `estado` varchar(50) NOT NULL,
  `cidade` varchar(100) NOT NULL,
  `oc_principal` varchar(300) NOT NULL,
  `oc_secundaria` varchar(300) DEFAULT NULL,
  `capital_social` varchar(100) DEFAULT NULL,
  `nome_fantasia` varchar(300) DEFAULT NULL,
  `end_logradouro` varchar(200) DEFAULT NULL,
  `end_numero` varchar(20) DEFAULT NULL,
  `end_complemento` varchar(300) DEFAULT NULL,
  `end_bairro` varchar(200) DEFAULT NULL,
  `end_cidade` varchar(200) DEFAULT NULL,
  `end_estado` varchar(100) DEFAULT NULL,
  `end_cep` varchar(100) DEFAULT NULL,
  `imp_renda_status` int(11) NOT NULL DEFAULT '0',
  `imp_renda_doc` varchar(100) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `cond_pag` varchar(200) DEFAULT NULL,
  `statussys` int(11) NOT NULL DEFAULT '0',
  `tipo` int(11) NOT NULL DEFAULT '0',
  `statuspg` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `pedidos`
--

INSERT INTO `pedidos` (`id`, `cliente`, `data_compra`, `data_pagamento`, `data_processamento`, `data_fim`, `nome`, `cpf`, `email1`, `email2`, `data_nasc`, `telefone`, `celular`, `rg`, `rg_orgao`, `rg_uf`, `estado`, `cidade`, `oc_principal`, `oc_secundaria`, `capital_social`, `nome_fantasia`, `end_logradouro`, `end_numero`, `end_complemento`, `end_bairro`, `end_cidade`, `end_estado`, `end_cep`, `imp_renda_status`, `imp_renda_doc`, `status`, `cond_pag`, `statussys`, `tipo`, `statuspg`) VALUES
(1, 2, '2017-06-11 12:35:20', NULL, NULL, NULL, 'José da Silva', '056.050.211-76', 'samu.rcosta@gmail.com', 'samuel@halfpet.com.br', '1998-01-27', '(62) 3514-1803', '(62) 98536-7212', '6132163', 'SSP-GP', 'GO', 'Goiás', 'Inhumas', 'Agente de Viagens', 'Agente de Modelos', '100000', 'Nome Fantasia Avantasia', 'Rua Manoel Vila Verde Martins', 'S/N', 'Qd. 05 Lt. 03', 'Residencial Ana Brandão', 'Inhumas', 'Goiás', '75400-000', 1, '12345678910', 0, 'Boleto', 0, 0, 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nome` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `senha` varchar(200) NOT NULL,
  `funcao` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `email`, `senha`, `funcao`) VALUES
(1, 'Samuel', 'samuel.rcosta@hotmail.com.br', 'costa123', 'Administrador');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
