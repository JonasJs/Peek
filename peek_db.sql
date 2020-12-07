-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Tempo de geração: 08-Dez-2020 às 00:40
-- Versão do servidor: 10.4.17-MariaDB
-- versão do PHP: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `peek_db`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `post`
--

CREATE TABLE `post` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `date_post` datetime DEFAULT NULL,
  `message` varchar(280) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `post`
--

INSERT INTO `post` (`id`, `date_post`, `message`, `user_id`) VALUES
(11, '2020-12-07 07:32:13', 'Hoje o Dia foi Corrido\r\n', 14),
(12, '2020-12-07 07:32:43', 'Hoje o Dia foi Corrido\r\n', 14),
(13, '2020-12-07 10:20:31', 'Policiais civis e militares capturam o assassino do policial militar Derinaldo Cardoso dos Santos, de 34 anos, morto tentando impedir um assalto em um estabelecimento na baixada fluminense.', 12),
(14, '2020-12-07 10:23:19', 'testando\r\n', 12),
(15, '2020-12-07 10:30:36', 'jonas\r\n', 12),
(16, '2020-12-07 10:30:46', 'Testando', 12),
(17, '2020-12-07 11:00:38', 'Testando 123', 12),
(18, '2020-12-07 15:42:29', 'jonas', 12),
(19, '2020-12-07 15:43:14', 'jonas', 12),
(20, '2020-12-07 20:29:16', 'Testando 123', 15);

-- --------------------------------------------------------

--
-- Estrutura da tabela `relationship`
--

CREATE TABLE `relationship` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `follower_id` int(11) DEFAULT NULL,
  `following_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `relationship`
--

INSERT INTO `relationship` (`id`, `follower_id`, `following_id`) VALUES
(1, 15, 12);

-- --------------------------------------------------------

--
-- Estrutura da tabela `user`
--

CREATE TABLE `user` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `email` text DEFAULT NULL,
  `password` varchar(32) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `password`) VALUES
(12, 'Jonas', 'joonasbalves@gmail.com', '123'),
(13, 'Joao', 'joao@gmailc.om', '123'),
(14, 'Pedro', 'pedro@gmail.com', 'pedro'),
(15, 'João', 'joao@admin.com', '123');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `relationship`
--
ALTER TABLE `relationship`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `post`
--
ALTER TABLE `post`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de tabela `relationship`
--
ALTER TABLE `relationship`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `user`
--
ALTER TABLE `user`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
