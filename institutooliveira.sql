-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 20/06/2024 às 21:41
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
-- Banco de dados: `institutooliveira`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `blogs`
--

CREATE TABLE `blogs` (
  `id` int(11) NOT NULL,
  `dataCriacao` date NOT NULL,
  `titulo` varchar(100) NOT NULL,
  `breveDesc` varchar(200) NOT NULL,
  `texto` varchar(10000) NOT NULL,
  `img` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `blogs`
--

INSERT INTO `blogs` (`id`, `dataCriacao`, `titulo`, `breveDesc`, `texto`, `img`) VALUES
(12, '2024-06-16', 'aaaaaaaaaaaaaa', 'aaaaaaaaaaaaaaaaaaaaaaaaa<br />\r\n<br />\r\naaaaaaaaaaaaaaaaaaaaaaaaaaaa<br />\r\n<br />\r\naaaaaaaaaaaaaaa<br />\r\naaaaaaa', 'aaaaaaaaaaaaaaaaaaaaaaaaa aaaaaaaaaaaaaaaaaaaaaaaaa<br />\r\n<br />\r\naaaaaaaaaaaaaaaaaaaaaaaaaaaa<br />\r\n<br />\r\naaaaaaaaaaaaaaa<br />\r\n<br />\r\naaaaaaaaaaaaaaaaaaaaaaaaaa<br />\r\n<br />\r\naaaaaaaaaaaaaaa a aaaaaaaaaaaaaaaaaaaa<br />\r\n<br />\r\naaaaaaaaaaaaa<br />\r\n<br />\r\naaaaaaaaaaaaaaaaaaaaaaa<br />\r\n<br />\r\naaaaaaaaaaaaaaaaaaaaaaaaaaaa<br />\r\n<br />\r\naaaaaaaaaaaaaaa<br />\r\n<br />\r\naaaaaaaaaaaaaaaaaaaaaaaaaa<br />\r\n<br />\r\naaaaaaaaaaaaaaa a aaaaaaaaaaaaaaaaaaaa<br />\r\n<br />\r\naaaaaaaaaaaaa<br />\r\n<br />\r\naaaaaaaaaaaaaaaaaaaaaaa ', 'imgs/blogs/blog01.jfif');

-- --------------------------------------------------------

--
-- Estrutura para tabela `endereco`
--

CREATE TABLE `endereco` (
  `id` int(11) NOT NULL,
  `endereco` varchar(200) DEFAULT NULL,
  `cidade` varchar(50) DEFAULT NULL,
  `estado` varchar(50) DEFAULT NULL,
  `cep` varchar(9) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `endereco`
--

INSERT INTO `endereco` (`id`, `endereco`, `cidade`, `estado`, `cep`) VALUES
(1, 'R. Albano Schmidt, 3333 - Boa Vista', 'Joinville', 'Santa Catarina', '89227-753');

-- --------------------------------------------------------

--
-- Estrutura para tabela `numeros`
--

CREATE TABLE `numeros` (
  `id` int(11) NOT NULL,
  `atendimentos` int(11) DEFAULT NULL,
  `doadores` int(11) DEFAULT NULL,
  `familias` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `numeros`
--

INSERT INTO `numeros` (`id`, `atendimentos`, `doadores`, `familias`) VALUES
(1, 125, 456, 789);

-- --------------------------------------------------------

--
-- Estrutura para tabela `projetos`
--

CREATE TABLE `projetos` (
  `id` int(11) NOT NULL,
  `nome` varchar(75) DEFAULT NULL,
  `breveDesc` varchar(350) DEFAULT NULL,
  `secao01` varchar(1000) DEFAULT NULL,
  `secao02` varchar(1000) DEFAULT NULL,
  `img01` varchar(50) DEFAULT NULL,
  `img02` varchar(50) DEFAULT NULL,
  `dataCriacao` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `projetos`
--

INSERT INTO `projetos` (`id`, `nome`, `breveDesc`, `secao01`, `secao02`, `img01`, `img02`, `dataCriacao`) VALUES
(7, 'Brechó Oliveira', 'O Brechó Oliveira é um lindo movimento do voluntariado, ajudando na sustentabilidade do Instituto Oliveira e desenvolvendo a cultura de moda sustentável com estilo, proporcionando à comunidade participar de forma ativa com a construção do Projeto.', 'O Brechó Oliveira é um lindo movimento do voluntariado, ajudando na sustentabilidade do Instituto Oliveira e desenvolvendo a cultura de moda sustentável com estilo, proporcionando à comunidade participar de forma ativa com a construção do Projeto.<br><br>O Brechó Oliveira é um lindo movimento do voluntariado, ajudando na sustentabilidade do Instituto Oliveira e desenvolvendo a cultura de moda sustentável com estilo, proporcionando à comunidade participar de forma ativa com a construção do Projeto.', '', 'imgs/projetos/brecho.png', '', '2024-06-16'),
(8, 'Policlínica', ' A reforma e revitalização do prédio que estamos sediados, com o objetivo de ampliar o número de famílias atendidas, mais conexão com as famílias e também proporcionar o estágio dos profissionais de saúde recém formados.', ' A reforma e revitalização do prédio que estamos sediados, com o objetivo de ampliar o número de famílias atendidas, mais conexão com as famílias e também proporcionar o estágio dos profissionais de saúde recém formados.<br><br> A reforma e revitalização do prédio que estamos sediados, com o objetivo de ampliar o número de famílias atendidas, mais conexão com as famílias e também proporcionar o estágio dos profissionais de saúde recém formados.<br><br> A reforma e revitalização do prédio que estamos sediados, com o objetivo de ampliar o número de famílias atendidas, mais conexão com as famílias e também proporcionar o estágio dos profissionais de saúde recém formados.', ' A reforma e revitalização do prédio que estamos sediados, com o objetivo de ampliar o número de famílias atendidas, mais conexão com as famílias e também proporcionar o estágio dos profissionais de saúde recém formados.<br><br> A reforma e revitalização do prédio que estamos sediados, com o objetivo de ampliar o número de famílias atendidas, mais conexão com as famílias e também proporcionar o estágio dos profissionais de saúde recém formados.<br><br> A reforma e revitalização do prédio que estamos sediados, com o objetivo de ampliar o número de famílias atendidas, mais conexão com as famílias e também proporcionar o estágio dos profissionais de saúde recém formados.', 'imgs/projetos/policlinica.png', 'imgs/projetos/policlinica2.jpeg', '2024-06-16'),
(9, 'Cartilha', 'Material em formato de cartilha trazendo informações sobre os sinais e sintomas do câncer infantojuvenil de uma forma interativa e lúdica, para a distribuição nas escolas, empresas e comunidade em geral.', 'Material em formato de cartilha trazendo informações sobre os sinais e sintomas do câncer infanto juvenil de uma forma interativa e lúdica, para a distribuição nas escolas, empresas e comunidade em geral.', '', 'imgs/projetos/cartilha.png', '', '2024-06-16'),
(10, 'Palestras', ' Visa mobilizar a sociedade e oferecer informações sobre os sinais e sintomas do câncer infanto juvenil em prol do diagnóstico precoce e do enfrentamento à essa doença ameaçadora da vida.', ' Visa mobilizar a sociedade e oferecer informações sobre os sinais e sintomas do câncer infanto juvenil em prol do diagnóstico precoce e do enfrentamento à essa doença ameaçadora da vida.<br><br> Visa mobilizar a sociedade e oferecer informações sobre os sinais e sintomas do câncer infanto juvenil em prol do diagnóstico precoce e do enfrentamento à essa doença ameaçadora da vida.', '', 'imgs/projetos/palestras.png', '', '2024-06-16');

-- --------------------------------------------------------

--
-- Estrutura para tabela `redessociais`
--

CREATE TABLE `redessociais` (
  `id` int(11) NOT NULL,
  `icon` varchar(50) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `link` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `sobreoinstituto`
--

CREATE TABLE `sobreoinstituto` (
  `id` int(11) NOT NULL,
  `ordem` int(11) NOT NULL,
  `tiposecao` int(11) NOT NULL,
  `titulo01` varchar(70) DEFAULT NULL,
  `texto01` varchar(1000) DEFAULT NULL,
  `titulo02` varchar(70) DEFAULT NULL,
  `texto02` varchar(1000) DEFAULT NULL,
  `img` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `sobreoinstituto`
--

INSERT INTO `sobreoinstituto` (`id`, `ordem`, `tiposecao`, `titulo01`, `texto01`, `titulo02`, `texto02`, `img`) VALUES
(10, 1, 1, 'Quem somos', 'Somos uma Instituição que acolhe e cuida de crianças e adolescentes com câncer, junto a suas famílias, dando suporte físico, emocional e espiritual, complementando o tratamento do câncer com uma equipe multiprofissional.<br><br>O instituto busca, ainda, auxiliar no processo de ressignificação da doença na vida de cada membro do núcleo familiar.<br><br>Porque cuidar, é além da cura.', '', NULL, 'imgs/sobreOInstituto/sobreOInstituto.png'),
(11, 2, 2, 'O começo', 'Após ele mesmo passar por um tratamento para câncer, o dr. Hugo, médico e ser humano, compreendeu que não basta prescrever quimioterapia ou radioterapia ao paciente, sendo este um mero tratamento técnico e frio, mas cuidar das pessoas como elas merecem.<br><br>O Instituto Oliveira nasce a partir da necessidade de acolher o paciente e toda a sua família, ajudando-os a enfrentar esta situação da melhor forma possível e dando-lhes orientação sobre todo o processo, a fim de proporcionar-lhes a melhor qualidade de vida possível.', '', NULL, 'imgs/sobreOInstituto/oComeco.png'),
(12, 3, 3, 'Realidade do câncer', 'O câncer infantil é uma realidade dolorosa no Brasil , sendo a principal causa de morte entre crianças e jovens de 0 a 19 anos há décadas. Essa triste realidade é agravada pelas desigualdades, refletindo em taxas de sobrevivência que variam de 80% a 20%, dependendo do país, conforme dados da Organização Pan-Americana da Saúde (OPAS). Anualmente, mais de 400.000 crianças e adolescentes com menos de 20 anos são diagnosticados com câncer. A cada 3 minutos, uma criança perde a batalha para essa doença, ressaltando a urgência de diagnósticos precoces e do acesso a cuidados adequados, conforme Childhood Cancer International (CCI).', NULL, NULL, NULL),
(13, 4, 1, 'O que fazemos', 'Oferecemos apoio clínico com uma equipe multidisciplinar em 16 modalidades, emocional e espiritual às crianças e adolescentes com câncer e seus familiares, com base nos valores cristãos. Além disso, realizamos um trabalho de conscientização dos sinais e sintomas do câncer infanto-juvenil.', 'Resultados esperados', 'Oferecemos apoio clínico com uma equipe multidisciplinar em 16 modalidades, emocional e espiritual às crianças e adolescentes com câncer e seus familiares, com base nos valores cristãos. Além disso, realizamos um trabalho de conscientização dos sinais e sintomas do câncer infanto-juvenil.', 'imgs/sobreOInstituto/oQueFazemos.png'),
(14, 5, 2, 'Nosso diferencial', 'Acreditamos na transformação e evolução das pessoas, porque as pessoas não são definidas pela enfermidade e dificuldades que estão vivendo. O nosso olhar não é somente para o câncer, mas para a cura da família como um todo. Vemos valor e importância nas pessoas. Cremos que uma família “saudável e feliz” pode motivar e impulsionar outras famílias a serem saudáveis e felizes', '', NULL, 'imgs/sobreOInstituto/diferencial.png'),
(15, 6, 4, 'Nossas conquistas', 'Qualificação e Registros UTILIDADE PÚBLICA MUNICIPAL em 15 de setembro de 2023, através da Lei nº 9.467 foi declarado de Utilidade Pública pelo prefeito municipal Adriano Bornschein Silva.<br />\r\nInscrição no Conselho Municipal dos Direitos da Criança e do Adolescente - CMDCA de Joinville, registro sob nº 117, em 14 de dezembro de 2023.', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nome` varchar(30) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `senha` varchar(30) DEFAULT NULL,
  `tipoUsuario` char(3) DEFAULT NULL,
  `ultimoAcesso` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `email`, `senha`, `tipoUsuario`, `ultimoAcesso`) VALUES
(3, 'teste', 'teste@teste', 'teste', 'adm', '2024-06-18');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `endereco`
--
ALTER TABLE `endereco`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `numeros`
--
ALTER TABLE `numeros`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `projetos`
--
ALTER TABLE `projetos`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `redessociais`
--
ALTER TABLE `redessociais`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `sobreoinstituto`
--
ALTER TABLE `sobreoinstituto`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de tabela `endereco`
--
ALTER TABLE `endereco`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `numeros`
--
ALTER TABLE `numeros`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `projetos`
--
ALTER TABLE `projetos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de tabela `redessociais`
--
ALTER TABLE `redessociais`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de tabela `sobreoinstituto`
--
ALTER TABLE `sobreoinstituto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
