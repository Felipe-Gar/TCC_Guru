-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 24-Fev-2022 às 21:42
-- Versão do servidor: 10.4.21-MariaDB
-- versão do PHP: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `system_guru`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `emprestimos`
--

CREATE TABLE `emprestimos` (
  `id_emprestimos` int(11) NOT NULL,
  `id_usuarios` int(11) NOT NULL,
  `data_retirada` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `emprestimos`
--

INSERT INTO `emprestimos` (`id_emprestimos`, `id_usuarios`, `data_retirada`) VALUES
(9, 6, '2022-02-24 15:00:41'),
(10, 6, '2022-02-24 15:00:41'),
(11, 11, '2022-02-24 15:03:08');

-- --------------------------------------------------------

--
-- Estrutura da tabela `emprestimos_produto`
--

CREATE TABLE `emprestimos_produto` (
  `id_emprestimos` int(11) NOT NULL,
  `id_usuarios` int(11) NOT NULL,
  `id_produto` int(11) NOT NULL,
  `quant` int(11) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `emprestimos_produto`
--

INSERT INTO `emprestimos_produto` (`id_emprestimos`, `id_usuarios`, `id_produto`, `quant`, `id`) VALUES
(9, 6, 1, 4, 10),
(9, 6, 12, 6, 11),
(11, 11, 20, 4, 12);

-- --------------------------------------------------------

--
-- Estrutura da tabela `grupo_usuarios`
--

CREATE TABLE `grupo_usuarios` (
  `id_grupo_usuarios` int(11) NOT NULL,
  `nome_grupo` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `grupo_usuarios`
--

INSERT INTO `grupo_usuarios` (`id_grupo_usuarios`, `nome_grupo`) VALUES
(1, 'Administrador'),
(2, 'Colaborador');

-- --------------------------------------------------------

--
-- Estrutura da tabela `produto`
--

CREATE TABLE `produto` (
  `id_produto` int(11) NOT NULL,
  `nome` varchar(225) NOT NULL,
  `descricao` varchar(225) NOT NULL,
  `quant_estoque` int(4) NOT NULL,
  `numero_caixa` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `produto`
--

INSERT INTO `produto` (`id_produto`, `nome`, `descricao`, `quant_estoque`, `numero_caixa`) VALUES
(1, 'papel', ' A4', 34, 34),
(11, 'canetao', ' cor vermelho', 34, 56),
(12, 'pasta', 'grande amarelo', 26, 78),
(16, 'cartolina', 'verde, amarela', 50, 20),
(20, 'lapis', 'grafite', 32, 56);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuarios` int(11) NOT NULL,
  `nome` varchar(220) NOT NULL,
  `email` varchar(50) NOT NULL,
  `senha` varchar(55) NOT NULL,
  `id_grupo_usuarios` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id_usuarios`, `nome`, `email`, `senha`, `id_grupo_usuarios`) VALUES
(5, 'kkk', 'sffsefsf@awdas.com', '202cb962ac59075b964b07152d234b70', 2),
(6, 're', 'felipesgarcia10@gmail.com', '202cb962ac59075b964b07152d234b70', 2),
(10, 'fel', 'fel@123.com', '202cb962ac59075b964b07152d234b70', 1),
(11, 'cenoura', 'cenoura@gmail.com', '202cb962ac59075b964b07152d234b70', 2);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `emprestimos`
--
ALTER TABLE `emprestimos`
  ADD PRIMARY KEY (`id_emprestimos`,`id_usuarios`),
  ADD KEY `fk_emprestimos_usuarios1_idx` (`id_usuarios`);

--
-- Índices para tabela `emprestimos_produto`
--
ALTER TABLE `emprestimos_produto`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_emprestimos_has_produto_produto1_idx` (`id_produto`),
  ADD KEY `fk_emprestimos_has_produto_emprestimos1_idx` (`id_emprestimos`,`id_usuarios`);

--
-- Índices para tabela `grupo_usuarios`
--
ALTER TABLE `grupo_usuarios`
  ADD PRIMARY KEY (`id_grupo_usuarios`);

--
-- Índices para tabela `produto`
--
ALTER TABLE `produto`
  ADD PRIMARY KEY (`id_produto`);

--
-- Índices para tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuarios`),
  ADD KEY `fk_usuarios_grupo_usuarios1_idx` (`id_grupo_usuarios`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `emprestimos`
--
ALTER TABLE `emprestimos`
  MODIFY `id_emprestimos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de tabela `emprestimos_produto`
--
ALTER TABLE `emprestimos_produto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de tabela `grupo_usuarios`
--
ALTER TABLE `grupo_usuarios`
  MODIFY `id_grupo_usuarios` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `produto`
--
ALTER TABLE `produto`
  MODIFY `id_produto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuarios` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `emprestimos`
--
ALTER TABLE `emprestimos`
  ADD CONSTRAINT `fk_emprestimos_usuarios1` FOREIGN KEY (`id_usuarios`) REFERENCES `usuarios` (`id_usuarios`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `emprestimos_produto`
--
ALTER TABLE `emprestimos_produto`
  ADD CONSTRAINT `fk_emprestimos_has_produto_emprestimos1` FOREIGN KEY (`id_emprestimos`,`id_usuarios`) REFERENCES `emprestimos` (`id_emprestimos`, `id_usuarios`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_emprestimos_has_produto_produto1` FOREIGN KEY (`id_produto`) REFERENCES `produto` (`id_produto`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `fk_usuarios_grupo_usuarios1` FOREIGN KEY (`id_grupo_usuarios`) REFERENCES `grupo_usuarios` (`id_grupo_usuarios`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
