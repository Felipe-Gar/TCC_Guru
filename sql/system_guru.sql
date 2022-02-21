-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 21-Fev-2022 às 18:51
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `grupo_usuarios`
--

CREATE TABLE `grupo_usuarios` (
  `id_grupo_usuarios` int(11) NOT NULL,
  `nome_grupo` varchar(45) NOT NULL,
  `nivel` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `grupo_usuarios`
--

INSERT INTO `grupo_usuarios` (`id_grupo_usuarios`, `nome_grupo`, `nivel`) VALUES
(1, 'Administrador', '1'),
(2, 'Colaborador', '2');

-- --------------------------------------------------------

--
-- Estrutura da tabela `produto`
--

CREATE TABLE `produto` (
  `id_produto` int(11) NOT NULL,
  `nome` varchar(225) NOT NULL,
  `descricao` varchar(225) NOT NULL,
  `quant_estoque` int(4) NOT NULL,
  `quant_minima` int(3) NOT NULL,
  `numero_caixa` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `produto`
--

INSERT INTO `produto` (`id_produto`, `nome`, `descricao`, `quant_estoque`, `quant_minima`, `numero_caixa`) VALUES
(2, 'papel', 'Branco a4 ', 34, 6, 65),
(14, 'caneta', 'bic azul', 55, 8, 45),
(15, 'lapiseira', 'bic sem refil ', 29, 5, 56),
(16, 'refil lapiseira', 'tamanho 0.7', 55, 12, 56),
(17, 'pasta ', 'transparente  ', 45, 6, 89);

-- --------------------------------------------------------

--
-- Estrutura da tabela `produto_emprestimo`
--

CREATE TABLE `produto_emprestimo` (
  `id_emprestimos` int(11) DEFAULT NULL,
  `emprestimos_id_produto` varchar(45) DEFAULT NULL,
  `produto_idproduto` int(11) NOT NULL,
  `quant` int(4) DEFAULT NULL,
  `id` int(8) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuarios` int(11) NOT NULL,
  `nivel` int(45) NOT NULL,
  `nome` varchar(220) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `senha` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id_usuarios`, `nivel`, `nome`, `email`, `senha`) VALUES
(4, 1, 'Fel', 'felipesgarcia10@gmail.com', '202cb962ac59075b964b07152d234b70'),
(5, 2, 're', 'mariocesartrindade@gmail.com', '202cb962ac59075b964b07152d234b70'),
(6, 2, 'Emilly', 'mariocesartrindade@gmail.com', '202cb962ac59075b964b07152d234b70');

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
-- Índices para tabela `produto_emprestimo`
--
ALTER TABLE `produto_emprestimo`
  ADD KEY `fk_emprestimos_has_produto_produto1_idx` (`produto_idproduto`),
  ADD KEY `fk_emprestimos_has_produto_emprestimos1_idx` (`id_emprestimos`,`emprestimos_id_produto`);

--
-- Índices para tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuarios`) USING BTREE;

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `emprestimos`
--
ALTER TABLE `emprestimos`
  MODIFY `id_emprestimos` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `grupo_usuarios`
--
ALTER TABLE `grupo_usuarios`
  MODIFY `id_grupo_usuarios` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `produto`
--
ALTER TABLE `produto`
  MODIFY `id_produto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuarios` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `emprestimos`
--
ALTER TABLE `emprestimos`
  ADD CONSTRAINT `fk_emprestimos_usuarios1` FOREIGN KEY (`id_usuarios`) REFERENCES `usuarios` (`id_usuarios`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `produto_emprestimo`
--
ALTER TABLE `produto_emprestimo`
  ADD CONSTRAINT `fk_emprestimos_has_produto_emprestimos1` FOREIGN KEY (`id_emprestimos`) REFERENCES `emprestimos` (`id_emprestimos`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_emprestimos_has_produto_produto1` FOREIGN KEY (`produto_idproduto`) REFERENCES `produto` (`id_produto`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `fk_usuarios_grupo_usuarios1` FOREIGN KEY (`grupo_usuarios_id_grupo_usuarios`) REFERENCES `grupo_usuarios` (`id_grupo_usuarios`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
