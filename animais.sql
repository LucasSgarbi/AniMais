-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 30-Maio-2023 às 02:19
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
-- Banco de dados: `animais`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `animal`
--

CREATE TABLE `animal` (
  `IdAnimal` int(11) NOT NULL,
  `NomeAnimal` varchar(50) NOT NULL,
  `NomeDono` varchar(80) NOT NULL,
  `Telefone` varchar(20) NOT NULL,
  `Raca` varchar(30) NOT NULL,
  `Tamanho` varchar(20) NOT NULL,
  `Cor` varchar(20) NOT NULL,
  `Observacao` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `animal`
--

INSERT INTO `animal` (`IdAnimal`, `NomeAnimal`, `NomeDono`, `Telefone`, `Raca`, `Tamanho`, `Cor`, `Observacao`) VALUES
(1, 'Malu', 'Isabela', '16997308448', 'Vira-lata', 'Media', 'Preta e branca', 'Espirro Reverso'),
(2, 'Tico', 'Lucas ', '16991266991', 'Vira-Lata', 'Pequêno', 'Preto e Branco', 'Assustado'),
(3, 'Costelinha', 'Johnny', '16991353907', 'Vira-Lata', 'Medio', 'Rajado', 'Bagunceiro'),
(4, 'Athena', 'Lilian', '16991988258', 'Vira-Lata', 'Medio', 'Siames', 'Brava '),
(5, 'Thor ', 'João ', '16991233552 ', 'PitBull ', 'Grande ', 'Marrom ', 'Agitado ');

-- --------------------------------------------------------

--
-- Estrutura da tabela `atividade`
--

CREATE TABLE `atividade` (
  `IdAtividade` int(11) NOT NULL,
  `NomeAtividade` varchar(30) NOT NULL,
  `Valor` decimal(15,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `atividade`
--

INSERT INTO `atividade` (`IdAtividade`, `NomeAtividade`, `Valor`) VALUES
(1, 'Tosa Higienica Pequena', '70.00'),
(2, 'Tosa Higienica Media', '120.00'),
(3, 'Tosa Higienica Grande', '200.00'),
(4, 'Banho Pequeno', '50.00'),
(5, 'Banho Medio', '100.00'),
(6, 'Banho Grande', '250.00'),
(7, 'Tosa e Banho Pequeno', '100.00'),
(8, 'Tosa e Banho Medio', '200.00'),
(9, 'Tosa e banho grande', '400.00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `fazer`
--

CREATE TABLE `fazer` (
  `IdFazer` int(11) NOT NULL,
  `IdAnimal` int(11) NOT NULL,
  `IdAtividade` int(11) NOT NULL,
  `Colaborador` varchar(80) NOT NULL,
  `Valor` decimal(10,2) NOT NULL,
  `DataAtividade` varchar(30) NOT NULL,
  `Horario` varchar(15) DEFAULT NULL,
  `Realizado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `fazer`
--

INSERT INTO `fazer` (`IdFazer`, `IdAnimal`, `IdAtividade`, `Colaborador`, `Valor`, `DataAtividade`, `Horario`, `Realizado`) VALUES
(1, 1, 8, 'Isabela', '200.00', '07/05/2023', '20:58:22', 1),
(3, 1, 5, 'Lucas', '100.00', '30/05/2023', NULL, 0),
(4, 2, 7, 'Lucas', '100.00', '30/05/2023', '21:04:44', 1),
(5, 2, 4, 'Jhonny', '50.00', '30/05/2023', NULL, 0),
(6, 3, 2, 'Jhonny', '120.00', '30/05/2023', '21:06:17', 1),
(7, 3, 8, 'Isabela', '200.00', '30/05/2023', NULL, 0),
(8, 4, 2, 'Lucas', '120.00', '30/05/2023', NULL, 0),
(9, 4, 5, 'Isabela', '100.00', '30/05/2023', '21:08:02', 1),
(10, 5, 3, 'Isabela', '200.00', '30/05/2023', '21:09:56', 1),
(11, 5, 9, 'Rodolfo', '400.00', '30/05/2023', NULL, 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `IdUsuario` int(11) NOT NULL,
  `Login` varchar(40) NOT NULL,
  `Senha` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`IdUsuario`, `Login`, `Senha`) VALUES
(1, 'Animais', '123456789');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `animal`
--
ALTER TABLE `animal`
  ADD PRIMARY KEY (`IdAnimal`);

--
-- Índices para tabela `atividade`
--
ALTER TABLE `atividade`
  ADD PRIMARY KEY (`IdAtividade`);

--
-- Índices para tabela `fazer`
--
ALTER TABLE `fazer`
  ADD PRIMARY KEY (`IdFazer`),
  ADD KEY `Fk_Animal` (`IdAnimal`),
  ADD KEY `Fk_Atividade` (`IdAtividade`);

--
-- Índices para tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`IdUsuario`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `animal`
--
ALTER TABLE `animal`
  MODIFY `IdAnimal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `atividade`
--
ALTER TABLE `atividade`
  MODIFY `IdAtividade` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de tabela `fazer`
--
ALTER TABLE `fazer`
  MODIFY `IdFazer` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `IdUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `fazer`
--
ALTER TABLE `fazer`
  ADD CONSTRAINT `Fk_Animal` FOREIGN KEY (`IdAnimal`) REFERENCES `animal` (`IdAnimal`),
  ADD CONSTRAINT `Fk_Atividade` FOREIGN KEY (`IdAtividade`) REFERENCES `atividade` (`IdAtividade`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
