-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 30/10/2024 às 01:53
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
-- Banco de dados: `hospital`
--
CREATE DATABASE IF NOT EXISTS `hospital` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `hospital`;

-- --------------------------------------------------------

--
-- Estrutura para tabela `administracao`
--

DROP TABLE IF EXISTS `administracao`;
CREATE TABLE `administracao` (
  `id` int(11) NOT NULL,
  `paciente` varchar(100) NOT NULL,
  `medicamento` varchar(100) NOT NULL,
  `Data` date NOT NULL,
  `Hora` time NOT NULL,
  `Dose` varchar(100) NOT NULL,
  `DataeHora` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `administracao`
--

INSERT INTO `administracao` (`id`, `paciente`, `medicamento`, `Data`, `Hora`, `Dose`, `DataeHora`) VALUES
(1, 'teste', 'teste', '0000-00-00', '07:57:00', 'teste', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estrutura para tabela `enfermeiros`
--

DROP TABLE IF EXISTS `enfermeiros`;
CREATE TABLE `enfermeiros` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) DEFAULT NULL,
  `coren` varchar(20) DEFAULT NULL,
  `usuario` varchar(50) DEFAULT NULL,
  `senha` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `medicos`
--

DROP TABLE IF EXISTS `medicos`;
CREATE TABLE `medicos` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) DEFAULT NULL,
  `especialidade` varchar(100) DEFAULT NULL,
  `crm` varchar(20) DEFAULT NULL,
  `usuario` varchar(50) DEFAULT NULL,
  `senha` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `medicos`
--

INSERT INTO `medicos` (`id`, `nome`, `especialidade`, `crm`, `usuario`, `senha`) VALUES
(1, 'teste', 'teste', 'teste', 'teste', '$2y$10$401wjeQvflocS2zXyEYuGOusTXkcLyzahNolegduZEq06mfp7qIy.'),
(2, 'teste1', 'teste1', 'teste1', 'teste1', '$2y$10$O6SQXoOLeGrEjAdMYGcuaeHbDjJxXJ7D/j1v.AdA5gpDNAa.5scvG'),
(3, 'teste2', 'teste2', 'teste2', 'teste2', 'teste2');

-- --------------------------------------------------------

--
-- Estrutura para tabela `pacientes`
--

DROP TABLE IF EXISTS `pacientes`;
CREATE TABLE `pacientes` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) DEFAULT NULL,
  `leito` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `pacientes`
--

INSERT INTO `pacientes` (`id`, `nome`, `leito`) VALUES
(1, 'nome', 'leito');

-- --------------------------------------------------------

--
-- Estrutura para tabela `receitas`
--

DROP TABLE IF EXISTS `receitas`;
CREATE TABLE `receitas` (
  `id` int(11) NOT NULL,
  `paciente_id` int(11) DEFAULT NULL,
  `medicamento` varchar(100) DEFAULT NULL,
  `data_administracao` date DEFAULT NULL,
  `hora_administracao` time DEFAULT NULL,
  `dose` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `receitas`
--

INSERT INTO `receitas` (`id`, `paciente_id`, `medicamento`, `data_administracao`, `hora_administracao`, `dose`) VALUES
(4, NULL, 'teste', '0000-00-00', '00:00:00', 'teste'),
(5, 1, 'teste2', '2024-05-05', '17:50:00', 'que');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `administracao`
--
ALTER TABLE `administracao`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `enfermeiros`
--
ALTER TABLE `enfermeiros`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `medicos`
--
ALTER TABLE `medicos`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `pacientes`
--
ALTER TABLE `pacientes`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `receitas`
--
ALTER TABLE `receitas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `paciente_id` (`paciente_id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `administracao`
--
ALTER TABLE `administracao`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `enfermeiros`
--
ALTER TABLE `enfermeiros`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `medicos`
--
ALTER TABLE `medicos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `pacientes`
--
ALTER TABLE `pacientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `receitas`
--
ALTER TABLE `receitas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `receitas`
--
ALTER TABLE `receitas`
  ADD CONSTRAINT `receitas_ibfk_1` FOREIGN KEY (`paciente_id`) REFERENCES `pacientes` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
