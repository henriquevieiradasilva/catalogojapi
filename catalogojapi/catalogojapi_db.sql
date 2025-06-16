-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 16/06/2025 às 10:41
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
-- Banco de dados: `catalogojapi_db`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `comments`
--

CREATE TABLE `comments` (
  `CommentID` int(11) NOT NULL,
  `UserID` varchar(30) DEFAULT NULL,
  `PostID` int(11) NOT NULL,
  `Species` varchar(100) DEFAULT NULL,
  `Classification` enum('Mammals','Birds','Reptiles','Amphibians','Fish','Invertebrates','Angiosperms','Gymnosperms','Ferns','Lycophytes','Bryophytes','Algae','Undetermined') DEFAULT NULL,
  `Sex` enum('Male','Female','Undetermined') DEFAULT NULL,
  `Age` enum('Adult','Young','Cub','Undetermined') DEFAULT NULL,
  `Notes` text DEFAULT NULL,
  `CommentDate` date NOT NULL,
  `CommentTime` time NOT NULL,
  `ParentCommentID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `expertspecialization`
--

CREATE TABLE `expertspecialization` (
  `UserID` varchar(30) NOT NULL,
  `LattesCV` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `expertspecialization`
--

INSERT INTO `expertspecialization` (`UserID`, `LattesCV`) VALUES
('especialista', 'http://lattes.cnpq.br/3812608000050957'),
('especialista2', 'http://lattes.cnpq.br/5813544566163539');

-- --------------------------------------------------------

--
-- Estrutura para tabela `photos`
--

CREATE TABLE `photos` (
  `PostID` int(11) NOT NULL,
  `ImageName` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `photos`
--

INSERT INTO `photos` (`PostID`, `ImageName`) VALUES
(1, 'Post_1_684fbee8e6df31.81781760.png'),
(2, 'Post_2_684fc158c84e18.75988070.png');

-- --------------------------------------------------------

--
-- Estrutura para tabela `posts`
--

CREATE TABLE `posts` (
  `PostID` int(11) NOT NULL,
  `UserID` varchar(30) DEFAULT NULL,
  `Classification` enum('Mammals','Birds','Reptiles','Amphibians','Fish','Invertebrates','Angiosperms','Gymnosperms','Ferns','Lycophytes','Bryophytes','Algae','Undetermined') NOT NULL,
  `Species` varchar(100) NOT NULL,
  `VerificationStatus` enum('ExpertVerified','ExpertDiscussion','CommunityVerified','CommunityDiscussion','Unidentified') NOT NULL,
  `Sex` enum('Male','Female','Undetermined') NOT NULL,
  `Age` enum('Adult','Young','Cub','Undetermined') NOT NULL,
  `SensitiveContent` tinyint(1) DEFAULT 0,
  `Notes` text DEFAULT NULL,
  `RecordDate` date NOT NULL,
  `RecordTime` time NOT NULL,
  `Location` text NOT NULL,
  `PublishDate` date NOT NULL,
  `PublishTime` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `posts`
--

INSERT INTO `posts` (`PostID`, `UserID`, `Classification`, `Species`, `VerificationStatus`, `Sex`, `Age`, `SensitiveContent`, `Notes`, `RecordDate`, `RecordTime`, `Location`, `PublishDate`, `PublishTime`) VALUES
(1, 'especialista', 'Undetermined', 'Indeterminado', 'Unidentified', 'Undetermined', 'Undetermined', 0, 'Encontrei vagando perto da serra e não sei o que é, parece um lobo só que menor.', '2025-06-16', '12:29:00', '-23.238573, -46.984491', '2025-06-16', '03:51:00'),
(2, 'especialista', 'Undetermined', 'Indeterminado', 'Unidentified', 'Male', 'Young', 0, 'Encontrei esse lobinho ferido, não consegui me aproximar muito mas consegui tirar uma foto', '2025-06-14', '07:08:00', '-23.220657, -46.912823', '2025-06-16', '04:01:00');

-- --------------------------------------------------------

--
-- Estrutura para tabela `users`
--

CREATE TABLE `users` (
  `UserID` varchar(30) NOT NULL,
  `Name` varchar(120) NOT NULL,
  `ProfilePhoto` varchar(100) NOT NULL DEFAULT 'default.png',
  `Email` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `users`
--

INSERT INTO `users` (`UserID`, `Name`, `ProfilePhoto`, `Email`, `Password`) VALUES
('especialista', 'Especialista Exemplo Neto', '2.png', 'especialista@exemplo.com', '$2y$10$cIz9hs1xuSiOvZsTBiA4vOAxYSvs8Nw4u6kIheNDpDXvG2agNq0PC'),
('especialista2', 'Especialista Exemplo Neto 2', 'default.png', 'especialista2@exemplo.com', '$2y$10$FjaAHXhjBwJkuQQIqArCBeT0ASSeRpAeWhwmWx9o2WCoZywk1nGiC'),
('usuario', 'Usuario Exemplo Junior', '1.png', 'usuario@exemplo.com', '$2y$10$Lsjc3KN.XD8VZHj8Y/qHReh82VXWLoKqnnTkI8pBJuNJM01bPEMbG'),
('usuario2', 'Usuario Exemplo Junior 2', 'default.png', 'usuario2@exemplo.com', '$2y$10$QrW68DeoaLKGeKBNgfalL.Cw1PLgU4T5KeBIx7rEmCifPh95DY7Ve');

-- --------------------------------------------------------

--
-- Estrutura para tabela `videos`
--

CREATE TABLE `videos` (
  `PostID` int(11) NOT NULL,
  `VideoName` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`CommentID`),
  ADD UNIQUE KEY `CommentID` (`CommentID`),
  ADD KEY `PostID` (`PostID`),
  ADD KEY `ParentCommentID` (`ParentCommentID`),
  ADD KEY `UserID` (`UserID`);

--
-- Índices de tabela `expertspecialization`
--
ALTER TABLE `expertspecialization`
  ADD PRIMARY KEY (`UserID`),
  ADD UNIQUE KEY `UserID` (`UserID`),
  ADD UNIQUE KEY `LattesCV` (`LattesCV`) USING HASH;

--
-- Índices de tabela `photos`
--
ALTER TABLE `photos`
  ADD PRIMARY KEY (`PostID`,`ImageName`),
  ADD UNIQUE KEY `ImageName` (`ImageName`);

--
-- Índices de tabela `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`PostID`),
  ADD UNIQUE KEY `PostID` (`PostID`),
  ADD KEY `UserID` (`UserID`);

--
-- Índices de tabela `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`UserID`),
  ADD UNIQUE KEY `UserID` (`UserID`),
  ADD UNIQUE KEY `Email` (`Email`);

--
-- Índices de tabela `videos`
--
ALTER TABLE `videos`
  ADD PRIMARY KEY (`PostID`,`VideoName`),
  ADD UNIQUE KEY `VideoName` (`VideoName`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `comments`
--
ALTER TABLE `comments`
  MODIFY `CommentID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `posts`
--
ALTER TABLE `posts`
  MODIFY `PostID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`PostID`) REFERENCES `posts` (`PostID`) ON DELETE CASCADE,
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`ParentCommentID`) REFERENCES `comments` (`CommentID`) ON DELETE CASCADE,
  ADD CONSTRAINT `comments_ibfk_3` FOREIGN KEY (`UserID`) REFERENCES `users` (`UserID`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Restrições para tabelas `expertspecialization`
--
ALTER TABLE `expertspecialization`
  ADD CONSTRAINT `expertspecialization_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `users` (`UserID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Restrições para tabelas `photos`
--
ALTER TABLE `photos`
  ADD CONSTRAINT `photos_ibfk_1` FOREIGN KEY (`PostID`) REFERENCES `posts` (`PostID`) ON DELETE CASCADE;

--
-- Restrições para tabelas `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `users` (`UserID`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Restrições para tabelas `videos`
--
ALTER TABLE `videos`
  ADD CONSTRAINT `videos_ibfk_1` FOREIGN KEY (`PostID`) REFERENCES `posts` (`PostID`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
