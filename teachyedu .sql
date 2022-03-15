-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Tempo de geração: 14-Mar-2022 às 20:40
-- Versão do servidor: 8.0.27
-- versão do PHP: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `teachyedu`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `agendas`
--

CREATE TABLE `agendas` (
  `idAgenda` int NOT NULL,
  `tituloAgenda` varchar(255) DEFAULT NULL,
  `imagemAgenda` varchar(255) DEFAULT NULL,
  `dataHoraAgenda` timestamp NULL DEFAULT NULL,
  `descricaoAgenda` text,
  `autorAgenda` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Extraindo dados da tabela `agendas`
--

INSERT INTO `agendas` (`idAgenda`, `tituloAgenda`, `imagemAgenda`, `dataHoraAgenda`, `descricaoAgenda`, `autorAgenda`) VALUES
(1, 'Formação Yazigi - Dia 1', 'Agenda.png', '2022-03-13 14:29:19', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi imperdiet dictum mauris. Sed in dapibus felis. Donec pellentesque vestibulum lorem, nec ultrices ipsum tempus ac. Vestibulum fermentum ultricies lacinia. Fusce ultrices est posuere eros ultrices ultricies. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Etiam faucibus leo et justo sagittis aliquam. Sed tincidunt dui quis erat lacinia porttitor. Quisque a massa libero. Praesent vestibulum malesuada tortor iaculis congue. Fusce vel velit efficitur, luctus lectus in, consectetur dolor. Etiam commodo posuere lorem eget auctor. Sed bibendum lorem a condimentum fermentum.', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `assinantes`
--

CREATE TABLE `assinantes` (
  `idAssinante` int NOT NULL,
  `nomeAssinante` varchar(255) NOT NULL,
  `emailAssinante` varchar(255) NOT NULL,
  `telefoneAssinante` varchar(255) NOT NULL,
  `mensagemAssinante` text NOT NULL,
  `interesseAssinante` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Extraindo dados da tabela `assinantes`
--

INSERT INTO `assinantes` (`idAssinante`, `nomeAssinante`, `emailAssinante`, `telefoneAssinante`, `mensagemAssinante`, `interesseAssinante`) VALUES
(1, 'João Pedro Domingues', 'joaopedrodmg@gmail.com', '45999150841', 'Fiquei com uma duvida', NULL),
(2, 'Stephanie Lima Ho', 'stephanielimaho@gmail.com', '4598254408', '', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `cursosMentorias`
--

CREATE TABLE `cursosMentorias` (
  `idCursoMentoria` int NOT NULL,
  `tipoCursoMentoria` int NOT NULL,
  `imagemCursoMentoria` varchar(255) NOT NULL,
  `nomeCursoMentoria` varchar(255) NOT NULL,
  `descricaoCursoMentoria` text NOT NULL,
  `videoCursoMentoria` varchar(255) NOT NULL,
  `valorCursoMentoria` float NOT NULL,
  `autorCursoMentoria` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Extraindo dados da tabela `cursosMentorias`
--

INSERT INTO `cursosMentorias` (`idCursoMentoria`, `tipoCursoMentoria`, `imagemCursoMentoria`, `nomeCursoMentoria`, `descricaoCursoMentoria`, `videoCursoMentoria`, `valorCursoMentoria`, `autorCursoMentoria`) VALUES
(1, 1, '1644072284_close.png', 'A Magia das Metodologias Ativas', 'As Magia das Metodologias Ativas é o ponta pé inicial para fazer a diferença dentro de fora de sala de aula (na sua vida). Além de te ensinar a compreender o que elas são e como aplicá-las, eu te ensino o passo a passo de um projeto desenhado para usar metodologias ativas do início ao fim, sem contar o conteúdo sobre avaliação e os bônus. Ao passar a utilizar metodologias ativas, você será cada vez mais reconhecido e se sentirá mais confiante na sua profissão. \r\nVocê só precisa estudar e aplicar!', 'https://www.youtube.com/embed/KCk4O6EBXHw', 499.99, 1),
(2, 0, '1647097461_1645009566_bg.png', 'MENTORIA TEX30', 'Designed for people who want to become a teacher in 30 days and need to: \r\n<br>\r\n<br>\r\n- learn basic concepts and issues in English Language Teaching\r\n<br>\r\n- understand the importance of English teaching\r\n<br>\r\n- the views of language and their influence on instruction\r\n<br>\r\n-  explore the history of ELT, mainstream approaches and new trends\r\n<br>\r\n- learn how to make an effective planning\r\n<br>\r\n- understand evalution\r\n<br>\r\n- learn how to manage the classroom', '', 4000, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `modulos`
--

CREATE TABLE `modulos` (
  `idModulo` int NOT NULL,
  `nomeModulo` varchar(255) NOT NULL,
  `descricaoModulo` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `idCursoModulo` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Extraindo dados da tabela `modulos`
--

INSERT INTO `modulos` (`idModulo`, `nomeModulo`, `descricaoModulo`, `idCursoModulo`) VALUES
(1, '01 - Boas Vindas', 'Seja bem-vind@, Professor@ AlphaZ\r\n<br><br>\r\nEntenda como vai funcionar a oficina', 1),
(2, '02 Módulo 1 - Metodologias Ativas', 'Aula 1 (parte 1) - O que são Metodologias Ativas? \r\n<br><br>\r\nAula 1 (parte 2) -O que são Metodologias Ativas? \r\n<br><br>\r\nAula 2 (parte 1) -Sala de aula invertida (Flipped Classroom)\r\n<br><br>\r\nAula 2 (parte 2) -Sala de aula invertida (Flipped Classroom)\r\n<br><br>\r\nAula 3 (parte 1) - Aprendizagem baseada em problemas e em projetos\r\n<br><br>\r\nAula 4 (parte 1) - Rotação por estações\r\n<br><br>\r\nAula 5 (parte 1) - Aprendizagem baseada em jogos e gamificação\r\n<br><br>\r\nAula 6 - Aprendizagem Craitiva\r\n', 1),
(3, '03 - Módulo 2', 'E-book interativo: entenda o projeto mídiaeducação\r\n<br><br>\r\nAulas 1 e 2: Desenvolva um perfil com seus alunos.\r\n<br><br>\r\nAulas 3 e 4: Refletindo ativamente: como fazer bom uso de mídias?\r\n<br><br>\r\nAulas 5 e 6: Situações-problema - análise\r\n<br><br>\r\nAulas 7 e 8: Produzindo e editando vídeos\r\n<br><br>\r\nAulas 9 e 10: Análise e produção de podcasts\r\n<br><br>\r\nAulas 11 e 12: Produção de minidocumentário\r\n<br><br>\r\nAulas 13 e 14: Planejando um seminário\r\n<br><br>\r\nAulas 15 e 16: Seminário de Mídias Escolares', 1),
(4, '04 - Bônus', 'Aprendizagem Criativa e uso do Padlet\r\n<br><br>\r\nComo iniciar uma aula de forma dinâmica?\r\n<br><br>\r\nRealidade aumentada em sala de aula\r\n<br><br>\r\nEstratégia de ensino - entrance ticket\r\n<br><br>\r\nComo fazer um dado usando Scratch?\r\n<br><br>\r\nProgramação e Tynker: uma ferramenta incrível\r\n<br><br>\r\nComo criar um post usando o Canva?\r\n<br><br>\r\nAprenda a usar o Scrumblr\r\n<br><br>\r\nJamboard - estratégias de ensino\r\n<br><br>\r\nMapa mental: ferramenta', 1),
(5, 'Modulo 1', 'Descrição', 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `idUsuario` int NOT NULL,
  `nomeUsuario` varchar(255) NOT NULL,
  `emailUsuario` varchar(45) NOT NULL,
  `senhaUsuario` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `tipoUsuario` int NOT NULL,
  `tokenUsuario` varchar(45) NOT NULL,
  `validacaoTokenUsuario` tinyint NOT NULL,
  `validadeTokenUsuario` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`idUsuario`, `nomeUsuario`, `emailUsuario`, `senhaUsuario`, `tipoUsuario`, `tokenUsuario`, `validacaoTokenUsuario`, `validadeTokenUsuario`) VALUES
(1, 'TeachyEdu\r\n', 'teachyedu.pfc@gmail.com', '7751a23fa55170a57e90374df13a3ab78efe0e99', 1, 'X7IOLAOX74A4F74G', 1, '2022-03-12 00:24:09'),
(2, 'João Pedro', 'joaopedrodmg@gmail.com', '7751a23fa55170a57e90374df13a3ab78efe0e99', 0, 'X7IOLAOX74A4F74F', 1, '2022-03-12 00:24:09'),
(3, 'Stephanie', 'stephanielimaho@gmail.com', '7751a23fa55170a57e90374df13a3ab78efe0e99', 0, 'X7IOLAOX74A4F74Ç', 1, '2022-03-12 00:24:09');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `agendas`
--
ALTER TABLE `agendas`
  ADD PRIMARY KEY (`idAgenda`),
  ADD KEY `usuarioAgenda_idx` (`autorAgenda`);

--
-- Índices para tabela `assinantes`
--
ALTER TABLE `assinantes`
  ADD PRIMARY KEY (`idAssinante`),
  ADD KEY `interesseAssinante_idx` (`interesseAssinante`);

--
-- Índices para tabela `cursosMentorias`
--
ALTER TABLE `cursosMentorias`
  ADD PRIMARY KEY (`idCursoMentoria`),
  ADD KEY `idUsuario_idx` (`autorCursoMentoria`);

--
-- Índices para tabela `modulos`
--
ALTER TABLE `modulos`
  ADD PRIMARY KEY (`idModulo`),
  ADD KEY `idCursoModulo_idx` (`idCursoModulo`);

--
-- Índices para tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`idUsuario`),
  ADD UNIQUE KEY `emailAdministrador_UNIQUE` (`emailUsuario`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `agendas`
--
ALTER TABLE `agendas`
  MODIFY `idAgenda` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `assinantes`
--
ALTER TABLE `assinantes`
  MODIFY `idAssinante` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `cursosMentorias`
--
ALTER TABLE `cursosMentorias`
  MODIFY `idCursoMentoria` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `modulos`
--
ALTER TABLE `modulos`
  MODIFY `idModulo` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `idUsuario` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `agendas`
--
ALTER TABLE `agendas`
  ADD CONSTRAINT `usuarioAgenda` FOREIGN KEY (`autorAgenda`) REFERENCES `usuarios` (`idUsuario`);

--
-- Limitadores para a tabela `assinantes`
--
ALTER TABLE `assinantes`
  ADD CONSTRAINT `interesseAssinante` FOREIGN KEY (`interesseAssinante`) REFERENCES `cursosMentorias` (`idCursoMentoria`);

--
-- Limitadores para a tabela `cursosMentorias`
--
ALTER TABLE `cursosMentorias`
  ADD CONSTRAINT `usuarioCurso` FOREIGN KEY (`autorCursoMentoria`) REFERENCES `usuarios` (`idUsuario`);

--
-- Limitadores para a tabela `modulos`
--
ALTER TABLE `modulos`
  ADD CONSTRAINT `idCursoModulo` FOREIGN KEY (`idCursoModulo`) REFERENCES `cursosMentorias` (`idCursoMentoria`) ON DELETE CASCADE ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
