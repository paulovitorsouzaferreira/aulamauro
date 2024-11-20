-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 20/11/2024 às 01:32
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `sch`
--
CREATE DATABASE IF NOT EXISTS `sch` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `sch`;

-- --------------------------------------------------------

--
-- Estrutura para tabela `chamados`
--

DROP TABLE IF EXISTS `chamados`;
CREATE TABLE `chamados` (
  `id` int(11) NOT NULL,
  `criador_id` int(11) NOT NULL,
  `departamento` varchar(100) NOT NULL,
  `descricao` text NOT NULL,
  `prioridade` varchar(20) NOT NULL,
  `responsavel` varchar(100) NOT NULL,
  `data_hora_limite` datetime NOT NULL,
  `data_criacao` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `chamados`
--

INSERT INTO `chamados` (`id`, `criador_id`, `departamento`, `descricao`, `prioridade`, `responsavel`, `data_hora_limite`, `data_criacao`) VALUES
(1, 6, 'teste', 'teste', 'Baixa', 'teste', '0000-00-00 00:00:00', '2024-11-20 00:21:57');

-- --------------------------------------------------------

--
-- Estrutura para tabela `departamentos`
--

DROP TABLE IF EXISTS `departamentos`;
CREATE TABLE `departamentos` (
  `id` int(11) NOT NULL,
  `nome` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `departamentos`
--

INSERT INTO `departamentos` (`id`, `nome`) VALUES
(1, 'teste'),
(2, 'RH');

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `senha` varchar(300) NOT NULL,
  `tecnico` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `email`, `senha`, `tecnico`) VALUES
(2, 'paulo', 'paulo@gmail', '$2y$10$9Efofzuj/aIJeTehb6zP9OFpjPBnTKSxxtrSJrKuz17u.YCfBEfJS', 0),
(3, 'teste', 'teste@agag', '$2y$10$s2xq9QJbuE2Fim3WmetnUu7VI7wvytQ8FIaW9PhhmcyeD1P2JHBza', 0),
(4, 'adaw', 'adwad@adaw', '$2y$10$4tPBsJoZtCAV4cC19EXk/.pNDvbbN/Z8braEi6Dpr2rdqJvGPEWPu', 0),
(5, 'a64566', '456456@fa', '$2y$10$.DIWAVFHhnFLGxL1ot.5cu./GyevGYDOXN2m0BV65gTGePTHc7jBi', 0),
(6, '123', '123@123', '$2y$10$6Pf0fzWpA1ljXzTawaZBputJUclF56oYLw1fCjJVnynSI4TUC9bR6', 0),
(7, '123', '123@123', '$2y$10$1D/Np5sfp8VYCQoh.AhBIeUUEzTHnCGLmodxSh/ZiTPwiT7y1YrPW', 0),
(8, 'tecnico', 'tecnico@tecnico', '$2y$10$hR5XdWv97CMiNXbwFU91Aeqq3ovX4CnWnEc0Q51HMrIFEcX.injyC', 1);

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `chamados`
--
ALTER TABLE `chamados`
  ADD PRIMARY KEY (`id`),
  ADD KEY `criador_id` (`criador_id`);

--
-- Índices de tabela `departamentos`
--
ALTER TABLE `departamentos`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `chamados`
--
ALTER TABLE `chamados`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `departamentos`
--
ALTER TABLE `departamentos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `chamados`
--
ALTER TABLE `chamados`
  ADD CONSTRAINT `chamados_ibfk_1` FOREIGN KEY (`criador_id`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
