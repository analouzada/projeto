-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 06/09/2024 às 18:13
-- Versão do servidor: 10.4.27-MariaDB
-- Versão do PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `crud_esporte`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `competidor`
--

CREATE TABLE `competidor` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `idade` varchar(255) NOT NULL,
  `peso` varchar(255) NOT NULL,
  `altura` varchar(255) NOT NULL,
  `genero` varchar(255) NOT NULL,
  `cpf` varchar(255) NOT NULL,
  `rg` varchar(255) NOT NULL,
  `equipe` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Despejando dados para a tabela `competidor`
--

INSERT INTO `competidor` (`id`, `nome`, `idade`, `peso`, `altura`, `genero`, `cpf`, `rg`, `equipe`) VALUES
(3, 'Jp', '187', '1,63', '80', 'Masculino', '43278090802', '4', '12');

-- --------------------------------------------------------

--
-- Estrutura para tabela `esporte`
--

CREATE TABLE `esporte` (
  `id` int(11) NOT NULL,
  `modalidade` varchar(255) NOT NULL,
  `ano_olimpiada` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Despejando dados para a tabela `esporte`
--

INSERT INTO `esporte` (`id`, `modalidade`, `ano_olimpiada`) VALUES
(2, 'futebol', '2106');

-- --------------------------------------------------------

--
-- Estrutura para tabela `localidade`
--

CREATE TABLE `localidade` (
  `id` int(11) NOT NULL,
  `rua` varchar(255) NOT NULL,
  `bairro` varchar(255) NOT NULL,
  `numero` int(11) NOT NULL,
  `cep` int(11) NOT NULL,
  `cidade` varchar(11) NOT NULL,
  `estado` varchar(11) NOT NULL,
  `pais` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Despejando dados para a tabela `localidade`
--

INSERT INTO `localidade` (`id`, `rua`, `bairro`, `numero`, `cep`, `cidade`, `estado`, `pais`) VALUES
(5, 'Rua flor', 'dsfdsf', 232, 2147483647, 'qwqw', 'São Paulo', 'Brasil');

-- --------------------------------------------------------

--
-- Estrutura para tabela `treinador`
--

CREATE TABLE `treinador` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `idade` varchar(255) NOT NULL,
  `altura` varchar(255) NOT NULL,
  `peso` varchar(255) NOT NULL,
  `cpf` varchar(255) NOT NULL,
  `rg` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `competidor`
--
ALTER TABLE `competidor`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `esporte`
--
ALTER TABLE `esporte`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `localidade`
--
ALTER TABLE `localidade`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `treinador`
--
ALTER TABLE `treinador`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `competidor`
--
ALTER TABLE `competidor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `esporte`
--
ALTER TABLE `esporte`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `localidade`
--
ALTER TABLE `localidade`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `treinador`
--
ALTER TABLE `treinador`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
