-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 17/08/2025 às 23:54
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
-- Banco de dados: `gabriel_ecommerce`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `categorias`
--

CREATE TABLE `categorias` (
  `idCategoria` int(11) NOT NULL,
  `nome` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `categorias`
--

INSERT INTO `categorias` (`idCategoria`, `nome`) VALUES
(2, 'Romance'),
(3, 'Comédia'),
(4, 'Aventura'),
(6, 'romance'),
(7, 'drama');

-- --------------------------------------------------------

--
-- Estrutura para tabela `clientes`
--

CREATE TABLE `clientes` (
  `idCliente` int(11) NOT NULL,
  `nome` varchar(200) NOT NULL,
  `cpf` varchar(200) NOT NULL,
  `contato` varchar(200) NOT NULL,
  `usuario` varchar(200) NOT NULL,
  `senha` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `clientes`
--

INSERT INTO `clientes` (`idCliente`, `nome`, `cpf`, `contato`, `usuario`, `senha`) VALUES
(9, 'corno ', '', '', '', 0),
(10, 'Gabriel De Souza Machado', '031245', '12345', 'gabrieldesouzamachado18@gmail.com', 1234);

-- --------------------------------------------------------

--
-- Estrutura para tabela `filmes`
--

CREATE TABLE `filmes` (
  `idFilme` int(11) NOT NULL,
  `nome` varchar(200) NOT NULL,
  `preco` varchar(10) NOT NULL,
  `genero` int(11) NOT NULL,
  `classificacaoEtaria` int(11) NOT NULL,
  `anoLancamento` int(11) NOT NULL,
  `descricao` text NOT NULL,
  `duracao` int(11) NOT NULL,
  `trilhaSonora` varchar(200) NOT NULL,
  `ofertar` int(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `filmes`
--

INSERT INTO `filmes` (`idFilme`, `nome`, `preco`, `genero`, `classificacaoEtaria`, `anoLancamento`, `descricao`, `duracao`, `trilhaSonora`, `ofertar`) VALUES
(7, 'asmstico', '200', 3, 3333, 2222, '', 0, 'pinba', 12),
(200, 'classificaçao_etaria', '200', 3, 200, 200, 'ano_lançamento', 200, 'duraçao', 0),
(202, '22', '22', 2, 2, 22, '22', 22, '2', 0),
(203, '3', '3', 4, 3, 3, '3', 3, '3', 0),
(204, '3', '3', 2, 3, 3, '3', 3, '3', 0),
(205, 'vdsvidjvdsvdsvdsjvdvsd', '', 2, 0, 232323232, 'scssc', 2, 'xcscds', 0),
(206, 'dvdvld', '', 2, 0, 3333, '333', 0, 'dddv', 0),
(207, 'hhjjj', '', 2, 0, 77, 'hhh', 0, 'hjjj', 0),
(208, 'lucas sugo', '', 7, 20, 2004, 'cumbia music', 2000, 'uruguay', 2);

-- --------------------------------------------------------

--
-- Estrutura para tabela `filmes_has_vendas`
--

CREATE TABLE `filmes_has_vendas` (
  `idFilme` int(11) NOT NULL,
  `idVenda` int(11) NOT NULL,
  `preco` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `imagem`
--

CREATE TABLE `imagem` (
  `idImagem` int(11) NOT NULL,
  `nome` varchar(200) NOT NULL,
  `idFilme` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `imagem`
--

INSERT INTO `imagem` (`idImagem`, `nome`, `idFilme`) VALUES
(1, 'tictanic.png', 205),
(2, 'panico.png', 206),
(3, 'jumanji.png', 207);

-- --------------------------------------------------------

--
-- Estrutura para tabela `vendas`
--

CREATE TABLE `vendas` (
  `dataVenda` date NOT NULL,
  `statusVenda` tinyint(1) NOT NULL,
  `idVenda` int(11) NOT NULL,
  `pagamento` tinyint(1) NOT NULL,
  `entrega` varchar(254) NOT NULL,
  `idCliente` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `vendas`
--

INSERT INTO `vendas` (`dataVenda`, `statusVenda`, `idVenda`, `pagamento`, `entrega`, `idCliente`) VALUES
('2025-08-17', 0, 1, 0, 'silveira martins', 0);

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`idCategoria`);

--
-- Índices de tabela `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`idCliente`);

--
-- Índices de tabela `filmes`
--
ALTER TABLE `filmes`
  ADD PRIMARY KEY (`idFilme`),
  ADD KEY `id_categoria` (`genero`);

--
-- Índices de tabela `filmes_has_vendas`
--
ALTER TABLE `filmes_has_vendas`
  ADD PRIMARY KEY (`idFilme`),
  ADD KEY `idVenda` (`idVenda`);

--
-- Índices de tabela `imagem`
--
ALTER TABLE `imagem`
  ADD PRIMARY KEY (`idImagem`);

--
-- Índices de tabela `vendas`
--
ALTER TABLE `vendas`
  ADD PRIMARY KEY (`idVenda`),
  ADD KEY `idCliente` (`idCliente`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `categorias`
--
ALTER TABLE `categorias`
  MODIFY `idCategoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `clientes`
--
ALTER TABLE `clientes`
  MODIFY `idCliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `filmes`
--
ALTER TABLE `filmes`
  MODIFY `idFilme` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=209;

--
-- AUTO_INCREMENT de tabela `filmes_has_vendas`
--
ALTER TABLE `filmes_has_vendas`
  MODIFY `idFilme` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `imagem`
--
ALTER TABLE `imagem`
  MODIFY `idImagem` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `vendas`
--
ALTER TABLE `vendas`
  MODIFY `idVenda` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `filmes`
--
ALTER TABLE `filmes`
  ADD CONSTRAINT `filmes_ibfk_1` FOREIGN KEY (`genero`) REFERENCES `categorias` (`idCategoria`);

--
-- Restrições para tabelas `filmes_has_vendas`
--
ALTER TABLE `filmes_has_vendas`
  ADD CONSTRAINT `idVenda` FOREIGN KEY (`idVenda`) REFERENCES `vendas` (`idVenda`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
