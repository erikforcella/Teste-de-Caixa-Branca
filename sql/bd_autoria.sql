-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 23-Nov-2023 às 15:44
-- Versão do servidor: 10.4.27-MariaDB
-- versão do PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `bd_autoria`
--
create database `bd_autoria`;
use `bd_autoria`;
-- --------------------------------------------------------

--
-- Estrutura da tabela `autor`
--

CREATE TABLE `autor` (
  `cod_autor` int(11) NOT NULL,
  `nomeautor` varchar(30) NOT NULL,
  `sobrenome` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `nasc` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `autor`
--

INSERT INTO `autor` (`cod_autor`, `nomeautor`, `sobrenome`, `email`, `nasc`) VALUES
(1, 'joao', 'silva', 'joaosilva54823@gmail.com', '1976-11-09'),
(2, 'samuel', 'santos', 'samuelsantos213@gmail.com', '1971-03-08'),
(3, 'ayrton', 'diniz', 'ayrtondiniz@outlook.com', '1985-06-20'),
(4, 'maria', 'joaquina', 'maria.joaquina2347@bol.com.br', '1985-01-09'),
(5, 'jobson', 'alves', 'jobsonalves327@gmail.com', '1971-09-11'),
(6, 'daniel', 'berier', 'danielberies823@outlook.com.br', '1989-06-10'),
(7, 'joao', 'lucas', 'joaolucas3156@gmail.com', '1978-09-14');

-- --------------------------------------------------------

--
-- Estrutura da tabela `autoria`
--

CREATE TABLE `autoria` (
  `cod_autor` int(11) NOT NULL,
  `cod_livro` int(11) NOT NULL,
  `datalancamento` date NOT NULL,
  `editora` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `autoria`
--

INSERT INTO `autoria` (`cod_autor`, `cod_livro`, `datalancamento`, `editora`) VALUES
(1, 1, '2018-10-18', 'maka'),
(3, 5, '2014-03-12', 'jovim'),
(6, 4, '2010-11-19', 'terme'),
(7, 3, '2013-09-09', 'origi'),
(4, 2, '2017-08-23', 'garma'),
(5, 4, '2010-11-19', 'terme'),
(2, 1, '2018-10-18', 'maka'),
(6, 2, '2017-08-23', 'garma');

-- --------------------------------------------------------

--
-- Estrutura da tabela `livro`
--

CREATE TABLE `livro` (
  `cod_livro` int(11) NOT NULL,
  `titulo` varchar(30) NOT NULL,
  `categoria` varchar(30) NOT NULL,
  `ISBN` varchar(50) NOT NULL,
  `idioma` varchar(30) NOT NULL,
  `qtdepag` int(225) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `livro`
--

INSERT INTO `livro` (`cod_livro`, `titulo`, `categoria`, `ISBN`, `idioma`, `qtdepag`) VALUES
(1, 'porquinhos', 'infantil', '978-3-16-148410-0', 'portugues', 200),
(2, 'feijaozinho', 'infantil', '978-0-79-396283-5', 'portugues', 150),
(3, 'chapeuzinho', 'infantil', '978-1-62-147901-2', 'portugues', 100),
(4, 'moranguinho', 'infantil', '978-2-74-530672-6', 'portugues', 50),
(5, 'cinderelazinha', 'infantil', '978-1-43-920846-4', 'portugues', 110);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `Login` varchar(5) NOT NULL,
  `Senha` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`Login`, `Senha`) VALUES
('a', 123),
('b', 456);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `autor`
--
ALTER TABLE `autor`
  ADD PRIMARY KEY (`cod_autor`);

--
-- Índices para tabela `livro`
--
ALTER TABLE `livro`
  ADD PRIMARY KEY (`cod_livro`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `autor`
--
ALTER TABLE `autor`
  MODIFY `cod_autor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `livro`
--
ALTER TABLE `livro`
  MODIFY `cod_livro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
