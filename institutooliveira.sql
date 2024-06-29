-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 29/06/2024 às 18:17
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
  `dataCriacao` datetime DEFAULT current_timestamp(),
  `titulo` varchar(100) NOT NULL,
  `breveDesc` varchar(400) DEFAULT NULL,
  `texto` varchar(10000) NOT NULL,
  `img` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `blogs`
--

INSERT INTO `blogs` (`id`, `dataCriacao`, `titulo`, `breveDesc`, `texto`, `img`) VALUES
(13, '2024-06-29 00:00:00', 'O temor do câncer', 'Encarando o medo: como o temor do câncer pode influenciar no processo de cura.<br />\r\n<br />\r\nAqui, você entenderá sobre o quanto é importante não deixar o medo tomar conta quando encarando um tratamento de câncer.<br />\r\n', 'O medo geralmente é causado por algo que ainda não conhecemos, e isso se dá por conta da nossa necessidade natural de controle sobre tudo, principalmente os pais das crianças. É justamente aqui que mora o perigo, e precisamos entender as causas, consequências e como combatê-los.<br />\r\n<br />\r\nAo receber o diagnóstico, é comum que os pais encarem a notícia como uma ‘sentença de morte’, quando na verdade é uma oportunidade de lutar pela vida. Neste momento, o medo de descobrir a doença faz com que os pais redobrem o cuidado, essa “superproteção”, resultado do medo dos pais, pode prejudicar e agravar algo que inicialmente poderia ser mais simples de tratar.<br />\r\n<br />\r\nA questão está no medo projetado pelos pais em seus filhos, e isso pode ser resultado de muitas feridas que os pais carregam por toda a vida e acabam projetando em seus filhos. O medo de perder o filho faz com que os pais evitem procurar um médico imediatamente quando é levantada a suspeita. É nesse momento que, geralmente, os pais passam a entender que o medo que sentem logo ao receber o diagnóstico vem de outras causas, até mesmo muito antes de terem filhos.<br />\r\n<br />\r\nE o que isso pode causar?<br />\r\n<br />\r\nO tratamento na hora certa. Como pais, é fundamental entender a natureza dos nossos medos para que não sejamos afetados pelo desespero e, consequentemente, acabarmos afetando nossos filhos. Quando eles observam que estamos com medo, eles também ficam inseguros, tristes, podem desenvolver problemas digestivos, intestinais e prejudicar o aprendizado. Mas o ponto alto é que, na maioria dos casos, se descoberto imediatamente, o tratamento tem mais chances de cura. No entanto, a presença do medo de perder o filho pode levar a evitar o contato com o profissional que possui as armas essenciais para enfrentar e combater a doença.<br />\r\n<br />\r\nAgora que entendi, como enfrentar tudo isso?<br />\r\n<br />\r\nPrimeiramente, é preciso entender que essa caminhada não se faz sozinha, é preciso estar acompanhado e amparado por uma equipe de profissionais que entendam e tratem a doença para que possam agir dentro da alçada que os pais não podem. É preciso entender a função de cada um neste processo e deixar o médico ser médico, os pais exercerem o papel de pais, mas o mais importante, deixar a criança ser criança. A inversão de papéis, ou a invasão de papéis, pode atrapalhar o processo. Cada um trabalhando em seu devido papel resultará na confiança mútua, assim os pais podem ter uma vida mais leve, entendendo que estão [agora sim] fazendo o melhor para o seu filho.<br />\r\n<br />\r\nO PAPEL DO INSTITUTO OLIVEIRA<br />\r\n<br />\r\nO Instituto Oliveira reconhece a importância de lidar com as emoções associadas ao câncer. Através de programas especializados, como sessões de aconselhamento e grupos de apoio emocional, a instituição busca oferecer um suporte abrangente, visando não apenas a cura física, mas também o bem-estar emocional. É importante também conhecer histórias reais de crianças e suas famílias que conseguiram superar o medo inicial, proporcionando inspiração. Essas narrativas destacam a resiliência e a força encontradas no enfrentamento do desconhecido, servindo como fonte de esperança para outros que estão no início dessa jornada.<br />\r\n<br />\r\nA comunicação transparente e a compreensão clara do câncer são essenciais para diminuir o medo. A vida em comunidade desempenha um papel vital na superação do medo. Iniciativas de apoio prático e emocional provenientes de amigos, familiares e voluntários podem criar um ambiente de compreensão e solidariedade, fortalecendo a resiliência das famílias.<br />\r\n<br />\r\nUm detalhe importante:<br />\r\n<br />\r\nA educação sobre a doença e o tratamento capacita as crianças a enfrentar o desconhecido com mais confiança. Enfrentar o medo de estar com câncer é uma parte crucial do processo de cura. Ao reconhecer, compreender e superar esse temor, as crianças e suas famílias podem não apenas enfrentar o tratamento com mais determinação, mas também construir uma base sólida para a recuperação e uma vida pós-tratamento plena.<br />\r\n<br />\r\nINSTITUTO OLIVEIRA, Joinville, Santa Catarina, 03 de março de 2024.<br />\r\n<br />\r\n<br />\r\n<br />\r\nTexto: Rony Degard – Voluntário do Instituto Oliveira', 'imgs/blogs/o_temor_do_cancer.jfif'),
(14, '2024-06-29 00:00:00', 'A vida não acaba quando o câncer começa!', 'Você já se perguntou: o que um pai e uma mãe sentem ao receber a notícia de que seu filho está com câncer? Que tipo de sentimento será esse? Neste blog, você entenderá que, ainda que seja difícil, estar com câncer não significa que a vida do seu filho acabou!', 'Você já se perguntou: o que um pai e uma mãe sentem ao receber a notícia de que seu filho está com câncer? Que tipo de sentimento será esse?<br />\r\n<br />\r\nÉ comum que, no momento em que recebem a notícia, os pais tenham o seguinte pensamento: A VIDA ACABOU AQUI! Neste momento, toda a família é tomada por uma sensação de medo e impotência. Tudo isso resulta em diversos sentimentos como a impotência, medo, angústia, raiva e, acima de tudo, a CULPA. E nesse momento, algo que não pode ser explicado passa a ser o motivo de culpa por parte dos pais em relação aos filhos. Logo vem a cobrança e a autocondenação, como se os pais pudessem fazer algo para evitar que seu filho tivesse tal diagnóstico. Essa visão desajustada faz com que toda a família tenha o seguinte pensamento ao receber a notícia: A VIDA DO MEU FILHO ACABOU, mas não é esse o caminho.<br />\r\n<br />\r\nA vida não acaba quando o tratamento do câncer começa; ao contrário, é neste exato momento que uma nova fase da vida da criança passa a iniciar. Essa nova fase deve ser respeitada por diversos fatores:<br />\r\n<br />\r\nPrimeiro: nenhum pai deve sentir-se culpado pelo fato de que seu filho está com câncer, isso está fora das nossas competências humanamente falando.<br />\r\n<br />\r\nSegundo: a criança deve continuar com uma rotina normal, mas é claro, seguindo todas as orientações médicas.<br />\r\n<br />\r\nTerceiro: é um direito da criança continuar vivendo. A doença não é o fim, tampouco deve ser vista como um veredito final sobre a sua história. No futuro, tudo isso servirá de combustível para que a criança seja impulsionada na sua própria missão. Os pais precisam ser capacitadores e fortalecedores na caminhada e missão de seus filhos, encorajá-los a se desenvolver fará com que os sonhos da criança não morram. Ela precisa sonhar, um dia se formar, casar, constituir uma família e viver uma vida normalmente como qualquer outra pessoa. Lembre-se, a vida não acaba quando a doença começa, para falar a verdade, uma nova vida se inicia junto com o tratamento.<br />\r\n<br />\r\nMas como os pais podem colocar tudo isso em prática?<br />\r\n<br />\r\nPrimeiramente, é preciso eliminar o desejo de ter controle sobre tudo. A criança precisa aprender a se desenvolver, conhecer suas habilidades, fazer amizades e continuar exercendo o seu direito de sonhar. Em segundo lugar, deve-se ter em mente que a equipe multidisciplinar está fazendo uso de todas as ferramentas para que o melhor tratamento seja empregado. Mas o mais importante é olhar para a criança e eliminar o sentimento de controle, superproteção, medo e deixar que ela se desenvolva dentro da sua missão.<br />\r\n<br />\r\nEntão, a partir de agora, que possamos colocar isso em prática. A vida não acaba quando o câncer começa, mas uma nova vida se inicia, e essa fase precisa ser respeitada, deixando a criança desenvolver-se e caminhar rumo à sua própria missão.<br />\r\n<br />\r\nINSTITUTO OLIVEIRA, Joinville, Santa Catarina, 10 de março de 2024. Por: Rony Degard – Voluntário do Instituto Oliveira', 'imgs/blogs/a_vida_nao_acaba.jfif'),
(15, '2024-06-29 00:00:00', 'Quanto tempo vai durar o tratamento de uma criança com câncer?', 'E agora, quanto tempo vai durar o tratamento? Essa talvez seja a primeira pergunta que um pai se faz ao receber o diagnóstico, diante de uma mistura tumultuada de choque, medo, angústia e sentimento de choque, medo, angústia e sentimento de impotência. Neste blog, explicamos um pouco sobre como lidar com estes sentimentos e ajudamos a entender que esta não é uma pergunta com resposta definitiva.', 'E agora, quanto tempo vai durar o tratamento? Essa talvez seja a primeira pergunta que um pai se faz ao receber o diagnóstico, diante de uma mistura tumultuada de choque, medo, angústia e sentimento de impotência. De repente, o futuro causa preocupação, e a única pergunta que a cabeça sabe fazer é:<br />\r\n<br />\r\n&quot;Quanto tempo vai durar o tratamento?&quot;<br />\r\n<br />\r\nEssa pergunta não é apenas uma busca por informações médicas, mas é também um grito de desespero em busca de segurança e esperança, tentando entender a magnitude do que está por vir. Os pais se sentem como se estivessem em uma corrida contra o tempo, desejando por uma resposta definitiva que possa acalmar seus temores e incertezas.<br />\r\n<br />\r\nMas a verdade é que não há uma resposta fácil ou definitiva para essa pergunta. Cada caso é único, e a duração do tratamento pode variar significativamente de uma criança para outra. De acordo com a Organização Mundial de Saúde (OMS), o câncer infantil é uma realidade trágica para muitas famílias em todo o mundo. Sabe-se que é uma das principais causas de morte em crianças em todo o mundo, com milhares de novos casos diagnosticados a cada ano. No entanto, as estatísticas também oferecem uma mensagem de esperança. Avanços significativos na pesquisa médica e no tratamento do câncer infantil vêm resultando em taxas de sobrevivência em constante aumento.<br />\r\n<br />\r\nHOJE, MAIS CRIANÇAS ESTÃO VENCENDO A BATALHA CONTRA O CÂNCER E VIVENDO VIDAS PLENAS E SAUDÁVEIS.<br />\r\n<br />\r\nÉ importante reconhecer que a duração do tratamento para o câncer infantil pode variar consideravelmente, dependendo de vários fatores, incluindo o tipo e o estágio do câncer, a resposta individual ao tratamento e a presença de quaisquer complicações. Em alguns casos, o tratamento pode ser relativamente curto e direto, enquanto em outros, pode se estender por meses ou mesmo anos. Por isso, a detecção precoce pode aumentar significativamente as chances de sucesso do tratamento e melhorar as perspectivas de longo prazo para as crianças afetadas pelo câncer.<br />\r\n<br />\r\nEmbora as estatísticas forneçam uma visão importante da escala e do impacto do câncer infantil, é fundamental lembrar que cada criança é única, e seu caminho para a recuperação será singular. Portanto, ao discutir a duração do tratamento, devemos fazê-lo com sensibilidade e empatia, reconhecendo a dor e a angústia que as famílias enfrentam enquanto lutam pela saúde e bem-estar de seus filhos.<br />\r\n<br />\r\nEm outras palavras, cada tipo de câncer é único, e isso significa que o tratamento também precisa ser adaptado para atacar o tipo específico de câncer que a criança tem. Isso pode envolver cirurgia, medicamentos chamados quimioterapia, radioterapia (um tipo de tratamento com raios-X) e outros tratamentos especializados. Depois, há fatores individuais de cada criança que influenciam o tratamento, como a idade dela, o quão avançado está o câncer e se há outras doenças junto com o câncer. Às vezes, o corpo da criança não tolera bem o tratamento, e isso pode atrasar as coisas. Além disso, o tratamento muitas vezes não é uma linha reta. Pode haver complicações no caminho, como infecções ou efeitos colaterais dos medicamentos, que exigem ajustes no plano de tratamento. Tudo isso pode prolongar o processo. Os médicos, enfermeiros e outros especialistas precisam colaborar para garantir que a criança receba o melhor cuidado possível.<br />\r\n<br />\r\nLEMBRE-SE: MAIS IMPORTANTE QUE A CHEGADA, É A CAMINHADA!<br />\r\n<br />\r\nO Instituto Oliveira enfatiza a importância de cuidados especializados e multidisciplinares para crianças com câncer. Isso inclui o acesso a centros de referência em oncologia pediátrica, onde equipes especializadas podem oferecer tratamento personalizado e suporte abrangente não apenas para a criança, mas também para sua família. Nesses momentos de desespero, é importante reconhecer a complexidade das emoções que os pais estão enfrentando.<br />\r\n<br />\r\nMais importante do que ficar se perguntando quando tempo irá durar o tratamento, é crucial deixar o desejo imediato de lado e passar buscar apoio emocional e empático durante esse período difícil, saiba que há uma comunidade de apoio pronta para ajudá-los a enfrentar os desafios que estão por vir.<br />\r\n<br />\r\nPortanto, enquanto nos esforçamos para fornecer respostas e informações médicas precisas, também devemos lembrar a importância de estar lá emocionalmente para os pais e suas famílias. Porque, no final das contas, é essa rede de apoio e compreensão que ajudará a sustentá-los durante os dias mais sombrios e a guiá-los em direção à luz no fim do túnel.<br />\r\n<br />\r\nINSTITUTO OLIVEIRA, Joinville, Santa Catarina, 17 de março de 2024. Rony Degard – Voluntário do Instituto Oliveira', 'imgs/blogs/quanto_tempo_dura_o_tratamento.png'),
(16, '2024-06-29 00:00:00', 'Cada vez mais crianças têm sobrevivido ao tratamento contra o câncer infantil', 'Uma boa notícia: cada vez mais crianças têm sobrevivido ao câncer infantil, mas o estado ainda é de alerta.', 'Com certeza, a maior preocupação dos pais é em relação ao tempo de vida que &quot;resta&quot; ao seu filho diagnosticado com câncer. Questionamentos como &quot;quanto tempo o meu filho ainda tem de vida?&quot; confundem e desequilibram as emoções dos pais e de toda a família.<br />\r\n<br />\r\nNo entanto, de acordo com um artigo publicado pela revista JAMA Oncology, especialistas apontam que a expectativa de vida de adultos sobreviventes de câncer infantil vem aumentando ao longo dos últimos trinta anos, mas ressaltam que o assunto ainda é de extrema urgência e mantém alerta para o diagnóstico. Mas, afinal, o que isso significa e como essa boa notícia deve ser vista com um olhar de atenção?<br />\r\n<br />\r\nDe acordo com os estudos feitos pelos autores, o número de sobreviventes tratados com quimioterapia subiu de 18% na década de oitenta para 54% de 1990 até o início dos anos dois mil. De um modo geral, 80% das crianças que foram submetidas ao tratamento com quimioterapia sobreviveram; no entanto, a taxa de sucesso não significa aumento da expectativa de vida, as duas coisas são opostas e uma não se relaciona com a outra (mas deveriam).<br />\r\n<br />\r\nSegundo o estudo, apenas o grupo de crianças de 14 a 18 anos apresentou alguma melhoria em relação à expectativa de vida, o que revela o cuidado que o adulto que teve câncer na infância deve ter na sua fase adulta. Corroborando com o estudo, pesquisadores brasileiros publicaram um estudo (2020) na Revista Brasileira de Cancerologia no qual atestam dificuldades de acesso ao tratamento quando se fala de classes mais baixas.<br />\r\n<br />\r\nMas... o que um estudo tem a ver com o outro? O aumento da taxa de sobrevivência/cura nada tem a ver com a qualidade e expectativa de vida da criança pós-tratamento, ambos são distintos. De nada adianta lutar pelo sucesso do tratamento, se não construir uma base sólida para que a criança se desenvolva em sua vida com saúde. O tratamento do câncer não se restringe apenas à quimioterapia dentro do ambiente hospitalar; os cuidados devem ser estendidos a toda a sua família, ambos se sintam acolhidos e tenham direcionamento estratégico para um planejamento e cuidado de vida.<br />\r\n<br />\r\nNo entanto, famílias em situações financeiras mais baixas têm encontrado dificuldades tanto em iniciar o tratamento quanto em manter uma vida saudável após a finalização das quimioterapias. É preciso que haja cura, mas também uma vida de qualidade após a cura, e que a criança possa crescer e desenvolver uma vida inteira, inclusive formar sua própria família.<br />\r\n<br />\r\nMas como resolver este problema? É justamente neste sentido que caminha o Instituto Oliveira. Entendemos que o tratamento não se resume ao hospital, e que mesmo após o tratamento ter terminado, esta fase da vida precisa ser planejada para<br />\r\n<br />\r\nque se construa um caminho saudável de modo que a criança, já adulta, possa administrar possíveis riscos à sua saúde, mas seguindo de forma independente a sua vida, sem as limitações impostas pelos pais quando iniciaram o tratamento.<br />\r\n<br />\r\nTudo é uma questão de ter as informações corretas, isso elimina o medo e proporciona uma vida mais saudável, entendendo os riscos, mas também as ferramentas para mitigá-los. Os autores ainda revelam que, mesmo com os avanços, este trabalho ainda está só no começo, em outras palavras, ainda está longe de estar completo.<br />\r\n<br />\r\nO Instituto Oliveira não enxerga apenas a doença em si, mas olha para a criança considerando toda a sua família no contexto do passado, presente e a parte mais importante, o futuro. A continuidade da vida é tão importante quanto o futuro, por isso é preciso pensar não apenas na cura, mas nas condições primordiais para que a criança tenha uma vida de qualidade. Em outras palavras, a batalha contra o câncer infantil não se encerra com a cura, mas continua na construção de uma vida saudável e plena para a criança e sua família. É fundamental que os avanços científicos sejam acompanhados por políticas e práticas que garantam não apenas a sobrevivência, mas também a qualidade de vida pós-tratamento.', 'imgs/blogs/mais_criancas_tem_sobrevivido.jpg'),
(17, '2024-06-29 00:00:00', 'Depois de curado, o câncer pode voltar.', 'É preocupante, pais de crianças ainda têm encontrado dificuldades em encontrar tratamento para o câncer.', 'Você já se perguntou o que qual o próximo passo, ou o que acontece logo depois que os pais e a criança recebem o diagnóstico confirmando positivo para câncer? Todos nós provavelmente pensamos que o tratamento é iniciado logo imediatamente, certo? Mas esta ainda não é a realidade, segundo estudos publicados recentemente.<br />\r\n<br />\r\nPesquisadores brasileiros observaram recentemente que mesmo após três meses da confirmação diagnóstica, os usuários não acessam os benefícios assistenciais e/ou previdenciários que são primordiais para garantir melhores condições à realização do tratamento oncológico. Os dados são de 2020, mas o assunto ainda é pertinente.<br />\r\n<br />\r\nO câncer infantojuvenil é a doença que mais mata crianças e adolescentes no Brasil (8% do total) e a segunda causa de óbito nesse grupo etário. Estima-se que esse tipo de câncer represente de 1% a 4% da incidência de todos os tumores malignos na maioria das populações, sendo que aproximadamente 80% dos cânceres pediátricos ocorrem em países com baixo Índice de Desenvolvimento Humano.<br />\r\n<br />\r\nOu seja, ao contrário do que muito de nós pensamos, o aceso ao tratamento ainda é passivo de dificuldades em relação ao acesso por parte daqueles que: ou estão muito distantes de um centro especializado (e) ou não possuem condições financeiras de arcar com o tratamento.<br />\r\n<br />\r\nE quando falamos em tratamento, não nos referimos apenas ao fator hospital, mas todo um complexo que engloba o processo como deslocamento, escola, recursos materiais, financeiros, medicamentos, cuidados especiais e até outros profissionais de apoio como psicólogos, pedagogos, enfermeiros e fisioterapeutas.<br />\r\n<br />\r\nEm outras palavras, o tratamento envolve uma equipe multidisciplinar que vai além da quimioterapia, isso é essencial para o desenvolvimento da criança, mas nem todos ainda têm conseguido acesso a estes recursos.<br />\r\n<br />\r\nSegundo os autores, uma descoberta notável da pesquisa revela que, após o diagnóstico confirmado, ocorre uma diminuição na renda familiar per capita. Cerca de 63,6% dos envolvidos são agora afetados pela extrema pobreza, vivendo com uma renda per capita inferior a um quarto do salário mínimo. Isso contrasta com os 25% que estavam nessas circunstâncias no momento da admissão.<br />\r\n<br />\r\nA fim de obtermos uma compreensão mais clara, ao examinar as taxas de incidência do câncer em crianças e adolescentes no Brasil, com foco no status socioeconômico das regiões para os tumores embrionários, como retinoblastoma, neuroblastoma e tumor de Wilms, notam-se variações regionais que estão diretamente ligadas às condições socioeconômicas. Isso é especialmente evidente nas taxas de neuroblastoma e retinoblastoma.<br />\r\n<br />\r\n&lt;b&gt;Isso é preocupante.&lt;/b&gt;<br />\r\n<br />\r\nDesde a detecção dos sintomas até o diagnóstico do câncer em crianças e adolescentes, diversos elementos estão envolvidos, tornando o processo bastante complexo. Muitas variáveis parecem exercer influência nesse processo. O contexto socioeconômico precário das famílias e a falta de apoio efetivo das políticas sociais são fatores que afetam o tratamento do câncer. Um estudo conduzido no Rio de Janeiro revelou que 20% das crianças diagnosticadas residem a mais de 100 quilômetros de distância de qualquer hospital de referência.<br />\r\n<br />\r\nO levantamento do perfil socioeconômico dos pais ou responsáveis das crianças e adolescentes no momento da inscrição no INCA revelou que os principais provedores financeiros do núcleo familiar foram predominantemente homens (pais, avôs e irmãos). Além disso, nota-se que, após três meses da confirmação do diagnóstico e durante o ápice do tratamento oncológico, as mulheres reduziram significativamente sua carga de trabalho. No que diz respeito à origem da renda, observa-se que o principal tipo de vínculo empregatício entre as mulheres que continuaram trabalhando após a confirmação do diagnóstico é informal.<br />\r\n<br />\r\nPor fim, para os autores, fica evidente que a ausência do Estado, nas responsabilidades constitucionalmente estabelecidas, implica diretamente nas condições socioeconômicas das famílias de crianças e adolescentes diagnosticados com tumores sólidos.<br />\r\n<br />\r\n&lt;b&gt;Mas e agora, o que fazer com tudo isso?&lt;/b&gt;<br />\r\n<br />\r\nPodemos entender que o câncer precisa de uma equipe multifatorial, envolvendo sociedade, estado, a família e instituições que estejam dispostas a driblar e mudar esta estatística.<br />\r\n<br />\r\nComo dito antes, o tratamento não se resume apenas ao hospital, a criança precisa e deve continuar exercendo o seu direito de ser criança, estudar e dando continuidade na sua jornada. Em relação as condições financeiras, alguns órgãos têm desenvolvido um papel desafiador na sociedade como é o Instituto Oliveira. Estas crianças precisam sim de suas famílias, do estado, das instituições, mas precisam de você e de suas doações, talvez não só financeiro, mas de tempo de qualidade. Muitos voluntários têm se doado como forma de amenizar essa distância, isso poderá proporcionar um acesso de qualidade, com profissionais capacitado, mas dentro das condições financeiras que as famílias dispõem.<br />\r\n<br />\r\nO câncer é urgente.', 'imgs/blogs/o_cancer_pode_voltar.jpg'),
(18, '2024-06-29 12:11:06', 'Muitas pessoas ainda têm medo de saber que têm câncer: isso é preocupante.', 'Pode parecer estranho essa afirmativa, mas o medo de “saber que tem câncer” ainda faz com que os pais evitem o contato com a realidade por conta do medo de estar com câncer, isso faz com que a doença possa ser agravada antes mesmo de iniciado o tratamento. ', 'Pode parecer estranho essa afirmativa, mas o medo de “saber que tem câncer” ainda faz com que os pais evitem o contato com a realidade por conta do medo de estar com câncer, isso faz com que a doença possa ser agravada antes mesmo de iniciado o tratamento. Outro detalhe muito preocupante, é que este fato não se restringe ao diagnóstico, mas afeta também o início do tratamento. Outro detalhe é que não basta saber que se está com câncer, é preciso iniciar o tratamento imediatamente. No entanto, mesmo após saber do diagnóstico, muitos têm medo de enfrentar este processo.<br />\r\n<br />\r\nMas, porque as pessoas têm tanto medo de saber que têm câncer, ou de enfrentar o tratamento para a doença? O medo do câncer e de seu tratamento tem múltiplas origens.<br />\r\n<br />\r\nEm primeiro lugar, o estigma associado à doença muitas vezes leva as pessoas a evitarem até mesmo mencionar a palavra &quot;câncer&quot;. Há uma noção generalizada de que o câncer é uma sentença de morte, o que pode levar a uma reação de negação e evitação por parte dos indivíduos e suas famílias. E estar no meio inadequado pode agravar mais ainda, é neste momento em que os pais correm o perigo de dar ouvidos a familiares e amigos e ignorar a orientação médica.<br />\r\n<br />\r\nAlém disso, a percepção comum de que o tratamento para o câncer, como a quimioterapia, é extremamente doloroso e debilitante, contribui para o medo e a relutância em buscá-lo. De acordo com o Instituto Nacional do Câncer, o INCA, grande parte dos casos sem sucesso, digo sem cura, se dão pelo fato de o tratamento ter sido iniciado tardiamente. Ainda não se sabe falar exatamente sobre o motivo, pois este envolve diversas facetas, dentre elas a própria dificuldade em identificar os sintomas.<br />\r\n<br />\r\nO fato é que, muitos casos de não sucesso no tratamento da doença se dão pelo estágio avançado que se encontra o paciente ao dar início a quimioterapia. Muitos casos de morte poderiam ser evitados se a ação médica fosse aplicada mais cedo.<br />\r\n<br />\r\nÉ difícil de acreditar, mas em pleno ano de 2024 ainda existem pessoas que hesitam em procurar o diagnóstico imediato por medo da doença.<br />\r\n<br />\r\nOutro ponto preocupante é que a detecção precoce pode significar a diferença entre a vida e a morte para uma criança com câncer. Quanto mais cedo a doença for diagnosticada, mais opções de tratamento estão disponíveis e maior é a chance de sucesso. Ignorar os sinais e sintomas do câncer infantil por medo ou negação pode resultar em atrasos significativos no diagnóstico, o que pode ter consequências devastadoras.<br />\r\n<br />\r\nMas quais as consequências de ignorar o início do tratamento?<br />\r\n<br />\r\nIgnorar os sintomas do câncer infantil e procurar assistência médica tarde pode resultar em consequências graves:<br />\r\n<br />\r\n1 - O câncer pode progredir para estágios avançados antes de ser detectado, tornando o tratamento mais difícil e reduzindo as opções de tratamento disponíveis.<br />\r\n<br />\r\n2 - A doença pode se espalhar para outras partes do corpo, aumentando o risco de complicações e reduzindo significativamente as chances de cura.<br />\r\n<br />\r\n3 - O atraso no diagnóstico e tratamento adequado pode aumentar o risco de mortalidade, reduzindo as chances de sobrevivência da criança.<br />\r\n<br />\r\n4 - A família pode enfrentar um aumento do estresse emocional e financeiro devido ao tratamento prolongado e às complicações associadas ao câncer infantil.<br />\r\n<br />\r\nPrecisamos ter cuidado!<br />\r\n<br />\r\nÉ compreensível que o tratamento para o câncer, como a quimioterapia, seja assustador para crianças e seus familiares. Isso pode acontecer também pela falta de conhecimento a respeito dos avanços da medicina que tornaram os tratamentos mais eficazes e toleráveis do que nunca.<br />\r\n<br />\r\nSaiba que as equipes médicas estão cada vez mais focadas em minimizar os efeitos colaterais e melhorar a qualidade de vida dos pacientes pediátricos durante o tratamento. Além disso, existem recursos e programas de apoio disponíveis para ajudar as famílias a lidar com os desafios emocionais e práticos associados ao tratamento do câncer infantil.<br />\r\n<br />\r\nUma dica é, procure ajuda de quem é capacitado para lidar com este problema que se dá pela falta de conhecimento, um diálogo que profissionais que lidam com esta questão, fará com que estes medos sejam eliminados e que o tratamento seja iniciado imediatamente. Neste momento a família e amigos servem de apoio emocional, mas a equipe médica é a mais adequada para direcionar o seu filho.<br />\r\n<br />\r\n&lt;i&gt;INSTITUTO OLIVEIRA, Joinville, Santa Catarina, 07 de abril de 2024. Rony Degard – Voluntário do Instituto Oliveira&lt;/i&gt;', 'imgs/blogs/medo_de_descobrir_que_tem_cancer.jfif');

-- --------------------------------------------------------

--
-- Estrutura para tabela `depoimentos`
--

CREATE TABLE `depoimentos` (
  `id_dep` int(11) NOT NULL,
  `nome` varchar(50) DEFAULT NULL,
  `ocupacao` varchar(50) DEFAULT NULL,
  `depoimento` varchar(400) DEFAULT NULL,
  `mostrarIndex` tinyint(1) DEFAULT 0,
  `img` varchar(100) DEFAULT NULL,
  `dataCriacao` date DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `depoimentos`
--

INSERT INTO `depoimentos` (`id_dep`, `nome`, `ocupacao`, `depoimento`, `mostrarIndex`, `img`, `dataCriacao`) VALUES
(2, 'Maria Ramos', 'Financeiro', 'Digite aqui o depoimento... Digite aqui o depoimento... Digite aqui o depoimento... Digite aqui o depoimento... Digite aqui o depoimento... Digite aqui o depoimento... ', 1, 'imgs/depoimentos/mariaRamos.png', '2024-06-29'),
(3, 'Beatriz Schmidt', 'Estudante', 'Digite aqui o depoimento...', 1, 'imgs/depoimentos/Captura de tela 2024-06-29 083827.png', '2024-06-29');

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
(16, 'Brechó Oliveira', 'Conheça a nossa lojinha oficial do Instituto. Além de se vestir bem e com peças de qualidade, tudo é revertido para manutenção de nossas estruturas e crianças.', 'O Brechó Oliveira é um lindo movimento do voluntariado, ajudando na sustentabilidade do Instituto Oliveira e desenvolvendo a cultura de moda sustentável com estilo, proporcionando à comunidade participar de forma ativa com a construção do Projeto.', '', 'imgs/projetos/brecho.png', '', '2024-06-29'),
(17, 'Atendimento Médico', 'Oferecemos atendimento médico de qualidade para todas as crianças atendidas pelo Instituto. O Dr. Hugo Oliveira é o nosso fundador e médico chefe que atende e coordena as equipes de consulta, triagem e acompanhamento.', 'Oferecemos atendimento médico de qualidade para todas as crianças atendidas pelo Instituto. O Dr. Hugo Oliveira é o nosso fundador e médico chefe que atende e coordena as equipes de consulta, triagem e acompanhamento.', '', 'imgs/projetos/policlinica.png', '', '2024-06-29'),
(18, 'Eventos', 'Não perca nenhum de nossos eventos e fique por dentro de todas datas importantes. Todos os eventos realizados são destinados a promoção da saúde da criança com câncer, bem como campanhas de prevenção do câncer infantojuvenil. Conheça!<br>', 'Não perca nenhum de nossos eventos e fique por dentro de todas datas importantes. Todos os eventos realizados são destinados a promoção da saúde da criança com câncer, bem como campanhas de prevenção do câncer infantojuvenil. Conheça!', '', 'imgs/projetos/palestras.png', '', '2024-06-29'),
(19, 'Voluntariado', 'Aqui você pode não apenas conhecer nossa equipe de voluntários como também de cadastrar para ser um. Que tal ser azeite na vida de nossas crianças?', 'Aqui você pode não apenas conhecer nossa equipe de voluntários como também de cadastrar para ser um. Que tal ser azeite na vida de nossas crianças?', '', 'imgs/projetos/voluntariado.png', '', '2024-06-29');

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
(16, 3, '057708c880da932d427b9610cb69e161684a67e29693e4b7bf9bd12bcebe6149', '2024-06-29 17:03:15'),
(17, 3, '18234e80adee68e2d1c047d0eba1ce9090951e6611ef7035179fc23086ba72f8', '2024-06-29 19:12:06');

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
(3, 'administrador', 'adm@adm', '$2y$10$vog5cnGOmRCxZblp0mtm/OM96qbM98nuAg2Igt86z5fvhF2Xr3wH2', 'adm', '2024-06-29'),
(6, 'usuário', 'usu@usu', '$2y$10$F9TcUu4iV97fZA1SiXX9Jel4WbDXoBcXB0gll63obYsrG5WfYO.52', 'usu', '0000-00-00');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de tabela `depoimentos`
--
ALTER TABLE `depoimentos`
  MODIFY `id_dep` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

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
