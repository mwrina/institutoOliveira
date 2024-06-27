-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 27/06/2024 às 23:04
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

-- --------------------------------------------------------

--
-- Estrutura para tabela `depoimentos`
--

CREATE TABLE `depoimentos` (
  `id_dep` int(11) NOT NULL,
  `nome` varchar(50) DEFAULT NULL,
  `ocupacao` varchar(50) DEFAULT NULL,
  `depoimento` varchar(400) DEFAULT NULL,
  `mostrarIndex` char(1) DEFAULT 'n',
  `img` varchar(100) DEFAULT NULL,
  `dataCriacao` date DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
(10, 1, 5, 'Sobre o Instituto', 'Somos uma Instituição que acolhe e cuida de crianças e adolescentes com câncer, junto a suas famílias, dando suporte físico, emocional e espiritual, complementando o tratamento do câncer com uma equipe multiprofissional.&lt;br&gt;&lt;br&gt;O instituto busca, ainda, auxiliar no processo de ressignificação da doença na vida de cada membro do núcleo familiar.&lt;br&gt;&lt;br&gt;Porque cuidar, é além da cura.', '', NULL, 'imgs/sobreOInstituto/sobreOInstituto.png'),
(11, 4, 2, 'O começo', 'Após ele mesmo passar por um tratamento para câncer, o dr. Hugo, médico e ser humano, compreendeu que não basta prescrever quimioterapia ou radioterapia ao paciente, sendo este um mero tratamento técnico e frio, mas cuidar das pessoas como elas merecem.<br />\r\n<br />\r\nO Instituto Oliveira nasce a partir da necessidade de acolher o paciente e toda a sua família, ajudando-os a enfrentar esta situação da melhor forma possível e dando-lhes orientação sobre todo o processo, a fim de proporcionar-lhes a melhor qualidade de vida possível.', '', NULL, 'imgs/sobreoinstituto/oComeco.png'),
(12, 7, 3, 'Realidade do câncer', 'O câncer infantil é uma realidade dolorosa no Brasil , sendo a principal causa de morte entre crianças e jovens de 0 a 19 anos há décadas. Essa triste realidade é agravada pelas desigualdades, refletindo em taxas de sobrevivência que variam de 80% a 20%, dependendo do país, conforme dados da Organização Pan-Americana da Saúde (OPAS). Anualmente, mais de 400.000 crianças e adolescentes com menos de 20 anos são diagnosticados com câncer. A cada 3 minutos, uma criança perde a batalha para essa doença, ressaltando a urgência de diagnósticos precoces e do acesso a cuidados adequados, conforme Childhood Cancer International (CCI).', NULL, NULL, NULL),
(13, 8, 1, 'O que fazemos', 'Oferecemos apoio clínico com uma equipe multidisciplinar em 16 modalidades, emocional e espiritual às crianças e adolescentes com câncer e seus familiares, com base nos valores cristãos. Além disso, realizamos um trabalho de conscientização dos sinais e sintomas do câncer infanto-juvenil.', 'Resultados esperados', 'Oferecemos apoio clínico com uma equipe multidisciplinar em 16 modalidades, emocional e espiritual às crianças e adolescentes com câncer e seus familiares, com base nos valores cristãos. Além disso, realizamos um trabalho de conscientização dos sinais e sintomas do câncer infanto-juvenil.', 'imgs/sobreOInstituto/oQueFazemos.png'),
(14, 9, 2, 'Nosso diferencial', 'Acreditamos na transformação e evolução das pessoas, porque as pessoas não são definidas pela enfermidade e dificuldades que estão vivendo. O nosso olhar não é somente para o câncer, mas para a cura da família como um todo. Vemos valor e importância nas pessoas. Cremos que uma família “saudável e feliz” pode motivar e impulsionar outras famílias a serem saudáveis e felizes', '', NULL, 'imgs/sobreOInstituto/diferencial.png'),
(15, 10, 4, 'Nossas conquistas', 'Qualificação e Registros UTILIDADE PÚBLICA MUNICIPAL em 15 de setembro de 2023, através da Lei nº 9.467 foi declarado de Utilidade Pública pelo prefeito municipal Adriano Bornschein Silva.<br />\r\nInscrição no Conselho Municipal dos Direitos da Criança e do Adolescente - CMDCA de Joinville, registro sob nº 117, em 14 de dezembro de 2023.', NULL, NULL, NULL),
(16, 3, 1, 'Quem somos', 'O Instituto Oliveira é uma organização que cuida de crianças e adolescentes diagnosticados com câncer infantil, como também de suas famílias que precisam de ajuda emocional e estratégica nesse momento tão difícil. O Instituto Oliveira primeiramente nasceu do coração de Deus e frutificou no coração do Dr. Hugo de Oliveira, um médico oncologista pediátrico que foi curado de um câncer na adolescência e hoje retribui possibilitando que as crianças e suas famílias que enfrentam a doença, tenham acesso à recursos que necessitam. Suas atividades iniciaram-se oficialmente em agosto de 2022 por entender que o tratamento no hospital não é o suficiente. Quem dará assistência às crianças precisam de assistência por completo, um lugar para dormir, médicos especialistas, gerenciamento emocional, familiar, profissional e espiritual para continuar vivendo de forma completa enquanto enfrenta o tratamento no hospital? Nossa missão é cuidar da criança e de sua família, pois a vida não acaba quando a doen', '', NULL, 'imgs/sobreOInstituto/sobreOInstituto.png'),
(17, 12, 4, 'Nosso local', 'Agora você nos encontra na Rua Albano Schmidt, nº 333, bloco J – Campus Park da UNISOCIESC no bairro Boa Vista em Joinville, Santa Catarina. Nossas acomodações estão melhorando a cada dia mais, mesmo com muitos desafios pela frente. Venha tomar um café e nos conhecer.', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura para tabela `tipossecao`
--

CREATE TABLE `tipossecao` (
  `id` int(11) NOT NULL,
  `tipoSecao` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tipossecao`
--

INSERT INTO `tipossecao` (`id`, `tipoSecao`) VALUES
(1, '01. Texto à esquerda, imagem à direita. Até 2 partes.'),
(2, '02. Texto à direita, imagem à esquerda. Até 2 partes.'),
(3, '03. Sem imagem, pouca decoração. Somente uma parte.'),
(4, '04. Sem imagem, texto relativamente decorado.'),
(5, '05. Seção para a página inicial.');

-- --------------------------------------------------------

--
-- Estrutura para tabela `user_tokens`
--

CREATE TABLE `user_tokens` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `token` varchar(255) NOT NULL,
  `expires_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `user_tokens`
--

INSERT INTO `user_tokens` (`id`, `user_id`, `token`, `expires_at`) VALUES
(3, 3, '343c35847383052174d0eec81247e5948dd1bd43941b6d50553a63d685d20e1e', '2024-06-27 21:21:32'),
(4, 3, '2534669fa3495344f2e1e72ab3dc399a3d88619835e4978920dadb16bffd42b2', '2024-06-27 21:21:39'),
(5, 3, '20b5673a5099de33d02543bf8a3d4f554eeffb75fdeffdc5c07f33a6589315f9', '2024-06-27 21:21:44'),
(6, 3, 'deeb3ac66d36256908f6f8d07ebce877789297725ce51fef1da0555ef323fe40', '2024-06-27 21:21:49'),
(7, 3, '3d38465204b6f5f8d8b711a30f4328adb1811d7bc7f9d2ef6a93afbb69a961cf', '2024-06-27 21:22:36'),
(8, 3, 'dd1dce45ff70d7da4bc5b62490424d0d8d0cb82dbea5818e4469de242bb705e8', '2024-06-27 21:22:46'),
(13, 3, '21788364b70f1bb6d7d1a1082aad3df2584908eb9bb3322032054e2753e96f27', '2024-06-28 00:00:33');

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nome` varchar(30) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `senha` varchar(60) DEFAULT NULL,
  `tipoUsuario` char(3) DEFAULT NULL,
  `ultimoAcesso` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `email`, `senha`, `tipoUsuario`, `ultimoAcesso`) VALUES
(3, 'teste', 'teste@teste', '$2y$10$6SBJM/CZ.nKlc.qlesTI5Oss0FIrwi55o3wRi5pGdkesNMwC4jAcu', 'adm', '2024-06-27');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `depoimentos`
--
ALTER TABLE `depoimentos`
  ADD PRIMARY KEY (`id_dep`);

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
-- Índices de tabela `tipossecao`
--
ALTER TABLE `tipossecao`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `user_tokens`
--
ALTER TABLE `user_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

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
-- AUTO_INCREMENT de tabela `depoimentos`
--
ALTER TABLE `depoimentos`
  MODIFY `id_dep` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de tabela `redessociais`
--
ALTER TABLE `redessociais`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de tabela `sobreoinstituto`
--
ALTER TABLE `sobreoinstituto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de tabela `user_tokens`
--
ALTER TABLE `user_tokens`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `user_tokens`
--
ALTER TABLE `user_tokens`
  ADD CONSTRAINT `user_tokens_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `usuarios` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
