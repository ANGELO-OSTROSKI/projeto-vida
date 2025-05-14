create database music;
use music;

-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 26/02/2025 às 18:28
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
-- Banco de dados: `music`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `artigos`
--

CREATE TABLE `artigos` (
  `id_musica` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `data_lancamento` timestamp NOT NULL DEFAULT current_timestamp(),
  `texto` varchar(500) NOT NULL,
  `assunto` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `quiz`
--

CREATE TABLE `quiz` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `tipo` varchar(9) NOT NULL,
  `texto_pergunta` text DEFAULT NULL,
  `resposta_certa` varchar(1) DEFAULT NULL,
  `opcao_1` varchar(255) DEFAULT NULL,
  `opcao_2` varchar(255) DEFAULT NULL,
  `opcao_3` varchar(255) DEFAULT NULL,
  `opcao_4` varchar(255) DEFAULT NULL,
  `total_perguntas` int(11) DEFAULT NULL,
  `pergunta_atual_id` int(11) DEFAULT NULL,
  `pontuacao_time_1` int(11) DEFAULT NULL,
  `perguntas_restantes` text DEFAULT NULL,
  `pontuacao_final_time_1` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Despejando dados para a tabela `quiz`
--

INSERT INTO `quiz` (`id`, `id_user`, `tipo`, `texto_pergunta`, `resposta_certa`, `opcao_1`, `opcao_2`, `opcao_3`, `opcao_4`, `total_perguntas`, `pergunta_atual_id`, `pontuacao_time_1`, `perguntas_restantes`, `pontuacao_final_time_1`) VALUES
(113, 20, 'pergunta', 'o', 'A', 'a', 'a', 'a', 'a', NULL, NULL, NULL, NULL, NULL),
(114, 20, 'pergunta', 'o', 'A', 'e', 'com certeza', 'q', 'apenas', NULL, NULL, NULL, NULL, NULL),
(115, 20, 'pergunta', 'asf', 'A', 'fa', 'asf', 'asf', 'fas', NULL, NULL, NULL, NULL, NULL),
(116, 20, 'pergunta', 'o', 'A', 'szdg', 'zdg', 'xzgd', 'zsgd', NULL, NULL, NULL, NULL, NULL),
(117, 20, 'pergunta', 'zvg', 'A', 'sdzg', 'szfdg', 'szdg', 'szdg', NULL, NULL, NULL, NULL, NULL),
(118, 20, 'pergunta', 'szdgszd', 'A', 'szdg', 'zsdgsdzg', 'szdgsz', 'szdg', NULL, NULL, NULL, NULL, NULL),
(119, 20, 'pergunta', 'szdgsdz', 'A', 'szdgs', 'zdszdg', 'sdzgsdz', 'szdgszdg', NULL, NULL, NULL, NULL, NULL),
(120, 20, 'pergunta', 'szdgszdg', 'A', 'sdzgsdzg', 'szdgsdzg', 'szdgsdzg', 'sdzgsdzg', NULL, NULL, NULL, NULL, NULL),
(121, 20, 'pergunta', 'syg', 'A', 'waetg', 'seayt', 'sry', 'syt', NULL, NULL, NULL, NULL, NULL),
(122, 20, 'pergunta', 'sag', 'A', 'sh', 'sgh', 'sags', 's', NULL, NULL, NULL, NULL, NULL),
(123, 20, 'pergunta', 's', 'A', 's', 's', 's', 's', NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id_user` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `data_criacao` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `usuarios`
--

INSERT INTO `usuarios` (`id_user`, `nome`, `email`, `senha`, `data_criacao`) VALUES
(20, '1', '1@gmail', '1', '2025-02-26 13:37:19');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `artigos`
--
ALTER TABLE `artigos`
  ADD PRIMARY KEY (`id_musica`),
  ADD KEY `fk_artigos_usuario` (`id_user`);

--
-- Índices de tabela `quiz`
--
ALTER TABLE `quiz`
  ADD PRIMARY KEY (`id`),
  ADD KEY `usuario_quiz` (`id_user`);

--
-- Índices de tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `artigos`
--
ALTER TABLE `artigos`
  MODIFY `id_musica` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT de tabela `quiz`
--
ALTER TABLE `quiz`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=171;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `artigos`
--
ALTER TABLE `artigos`
  ADD CONSTRAINT `fk_artigos_usuario` FOREIGN KEY (`id_user`) REFERENCES `usuarios` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Restrições para tabelas `quiz`
--
ALTER TABLE `quiz`
  ADD CONSTRAINT `usuario_quiz` FOREIGN KEY (`id_user`) REFERENCES `usuarios` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
