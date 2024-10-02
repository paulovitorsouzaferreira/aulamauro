-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 02/10/2024 às 02:47
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
-- Banco de dados: `produto`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `produtos`
--

DROP TABLE IF EXISTS `produtos`;
CREATE TABLE `produtos` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `url_foto` varchar(500) NOT NULL,
  `descricao` varchar(100) NOT NULL,
  `preco` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `produtos`
--

INSERT INTO `produtos` (`id`, `nome`, `url_foto`, `descricao`, `preco`) VALUES
(1, 'adrian', 'data:image/jpeg;base64,/9j/4AAQSkZJRgABAQAAAQABAAD/2wCEAAkGBxMSEhUTEhMWFRMVFxgTFxgYGBUYHxobGBgXHRgYFxodHSggGB4lGxUXIjIhJSkrLi4uGR81ODYsNygtLisBCgoKDg0OGxAQGy0lHSUtLy0tLS0tLS0rLSstLS0rLS0tLy0tLS0tLS0vLS0tLS0tLS0vLS8tKy0vLS0tLSsrLf/AABEIAL8BBwMBIgACEQEDEQH/xAAcAAEAAgMBAQEAAAAAAAAAAAAABgcDBAUCAQj/xABDEAABBAADBAgEAgYIBwEAAAABAAIDEQQSIQUGMUEHEyJRYXGBkTKhscEUQiNSYnLR4TNDgpKissLwNERzk7PS8ST/xAAZAQEAAwEBAAAAAAAAAAAAAAAAAQIDBAX/xAAmEQEAAgIBAwMFAQEAAAAAAAAAAQIDETESIUEEUWETIjLB8HEF/9oADAMBAAIRAxEAPwC8UREBE', 'adrian', '1'),
(2, 'teste', 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAOEAAADhCAMAAAAJbSJIAAAA81BMVEX////4wJ0AAAD0oWzZ2dn8pnD1qntqRi//xqL7wp/wupj/x6NWVlb4vpr5wJ34vZj09PTOzs54eHigoKDs7OyOjo6YmJjf39+urq5sVERNTU25ubnExMTy8vIwMDDNn4Lns5JiYmKwiG8+Pj5ubm59YU/96t+CgoI6LSX5yasgICDXpohSPzSTcl2deWNlTkD3to0eFxM3NzcWFha7kXb60blKOS8qIBqrhGz/3cj97+f84tMnJycYEw+JaldaRTnitJd6WkbEknJoTTtKNSfcrpH2r4KfaUfhlGPJhVlRNSSHWTyuc03Si102IxhkQi17UTbj4DUtAAANPUlEQVR4nN1dbUPb1g6uQ29rx4SkZC2kLyQEyningUAKHaXdum5dt977/3/NTcDSOXZiWzrv2fPREEeKjqVHR9Lxo0', 'testeeee', '2');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `produtos`
--
ALTER TABLE `produtos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `produtos`
--
ALTER TABLE `produtos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
