-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 16, 2022 at 11:55 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bom_dgarfo`
--

-- --------------------------------------------------------

--
-- Table structure for table `chefes`
--

CREATE TABLE `chefes` (
  `IDChefe` int(11) NOT NULL,
  `nome` varchar(45) NOT NULL,
  `descricao` varchar(500) NOT NULL,
  `Especialidade` varchar(45) NOT NULL,
  `foto` varchar(200) NOT NULL,
  `dt_nascimento` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `chefes`
--

INSERT INTO `chefes` (`IDChefe`, `nome`, `descricao`, `Especialidade`, `foto`, `dt_nascimento`) VALUES
(1, 'Henrique Sá Pessoa', 'https://www.almalisboa.pt/pt', 'Cozinheiro', 'henriqueSa.jpg', '2002-08-23'),
(2, 'Rui pino', 'https://www.ruipaula.pt/', 'Cozinheiro', 'rui_paula.jpeg', '2002-09-27'),
(3, 'Kiko Martins', 'https://www.otalho.pt/', 'Cozinheiro', 'kiko.jpg', '2002-08-23'),
(4, 'Chef Cordeiro', 'https://theblini.com/', 'Cozinheiro', 'cordeiro.jpg', '2002-08-23'),
(5, 'José Avillez', 'https://www.joseavillez.pt/pt/', 'Cozinheiro', 'jose_avillez.jpg', '2002-08-23'),
(7, 'Duarte', 'http://localhost/Bom%20de%20Garfo/HTML/chefs.php', 'cozinheiro', 'thibaud-pourplanche-2020-hollowknight.jpg', '2022-07-04');

-- --------------------------------------------------------

--
-- Table structure for table `contactos`
--

CREATE TABLE `contactos` (
  `IDContacto` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `fotos` varchar(50) NOT NULL,
  `descricao` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contactos`
--

INSERT INTO `contactos` (`IDContacto`, `nome`, `fotos`, `descricao`) VALUES
(1, 'Duarte Santos', 'Duarte.jpg', 'teste'),
(3, 'Roman Kalyuzhnov', 'Roman_Kal.jpg', '123'),
(4, 'Miguel Mendes', 'Miguel_Mendes.jpg', '12345'),
(5, 'Bárbara Rodrigues', 'Barbara.jpg', 'teste123'),
(7, 'Estágio', 'estagio.png', '');

-- --------------------------------------------------------

--
-- Table structure for table `dicas_semanais`
--

CREATE TABLE `dicas_semanais` (
  `IDDS` int(11) NOT NULL,
  `titulo` varchar(45) NOT NULL,
  `descricao` varchar(500) NOT NULL,
  `foto` longblob NOT NULL,
  `dt_dica` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `eventos`
--

CREATE TABLE `eventos` (
  `IDEvento` int(11) NOT NULL,
  `titulo` varchar(45) NOT NULL,
  `categoria` varchar(45) NOT NULL,
  `descricao` varchar(500) NOT NULL,
  `foto` longblob NOT NULL,
  `dt_evento` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `faq`
--

CREATE TABLE `faq` (
  `id_pergunta` int(11) NOT NULL,
  `data` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `email` varchar(100) NOT NULL,
  `pergunta` varchar(75) NOT NULL,
  `respostas` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `faq`
--

INSERT INTO `faq` (`id_pergunta`, `data`, `email`, `pergunta`, `respostas`) VALUES
(1, '2022-06-30 15:23:11', '', 'ola ola', 'sim sim'),
(2, '2022-06-30 09:21:26', '', 'Esta facil ', 'Ez clap'),
(3, '2022-07-01 09:04:00', '', 'asdsadas', 'Informacao obtida'),
(4, '2022-05-24 23:00:00', '', 'Onde posso aprender a cozinhar comida mais saborosa?', 'Existem varios workshops e mini cursos onde pode melhorar os seus cozinhados, nao esquecendo que na internet pode encontrar toda a informacao necessaria para fazer cozinhados mais saborosos.'),
(5, '2022-06-30 23:12:39', '', 'Queijo para massas', 'Queijo mozarela ralado, ou parmesao, ha varios tipos que funcionam'),
(6, '2022-05-24 23:00:00', '', 'Esta e a ultima pergunta por agora ?', 'Sim, por agora ficamos por aqui, so falta adicionar mais perguntas a BD ');

-- --------------------------------------------------------

--
-- Table structure for table `livros`
--

CREATE TABLE `livros` (
  `IDLivro` int(11) NOT NULL,
  `titulo` varchar(45) NOT NULL,
  `foto` varchar(50) NOT NULL,
  `descricao` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `livros`
--

INSERT INTO `livros` (`IDLivro`, `titulo`, `foto`, `descricao`) VALUES
(1, 'ComTradição', 'ComTradicao.jpg', 'Do desafio lançado pelo canal 24Kitchen, nasceu o ComTradição, um programa de cozinha portuguesa e regional, de aproximação ao que é nosso. Agora, em um livro, o chef Henrique Sá Pessoa e o canal 24Kitchen levam até sua casa as mesmas receitas. Descubra como é fácil confecionar um Bacalhau à Zé do Pipo, uma Bola de Presunto, Rojões, Amêijoas à Bulhão Pato, Peixinhos da Horta, Pão-de-Ló ou mesmo até uns Papos de Anjo, e qual a região de onde provêm.'),
(2, 'Na Cozinha com Henrique Sá Pessoa', 'NaCozinhaComHSP.jpg', 'Agora que tem nas suas mãos este livro, deixe-se perder pelas mais saborosas receitas e descubra os maravilhosos encantos da cozinha do Chef Henrique Sá Pessoa. Aqui serão revelados novos aromas e novos sabores que, certamente, vão aprimorar o seu dia-a-dia. O quarto livro da série «Ingrediente Secreto», convida o leitor a experimentar 78 receitas simples e saborosas. Neste livro, o chefe dá dicas infalíveis para que as suas receitas sejam um sucesso.'),
(3, 'Ingrediente Secreto', 'IngredienteSecreto.jpg', 'Ingrediente Secreto é uma obra singular em Portugal, pelos seus 13 ingredientes e 6 receitas em torno de cada um. Este é o primeiro volume de receitas do afamado programa «Ingrediente Secreto», do Chef Henrique Sá Pessoa. São 78 receitas inesperadas e imprevisíveis que cortam com a rotina e estimulam a imaginação gastronómica. Uma aventura culinária para apimentar o dia-a-dia e dar asas à fantasia. '),
(4, 'Um Bolo por Semana', 'Umboloporsemana.png', 'É díficil começar a semana? Sente que o fim de semana passa a correr e a semana super devagar? Isso é falta de vitamina B - B de bolo! Quem não se lembra com nostalgia do bolo acabadinho de sair do forno? Com as receitas e dicas de Rita Nascimento, esta tarefa torna-se bastante fácil. Um Bolo por Semana oferece receitas de bolos para todos os apetites e ocasiões: bolos básicos, simples, para dias de festa e muito mais.'),
(5, 'Uma Pastelaria em Casa', 'PastelariaemCasa.png', 'Hoje em dia, temos as mais variadas pastelarias em cada esquina, mas o melhor da boa pastelaria portuguesa vai passar a estar em sua casa! Nestas páginas, vai encontrar receitas para fazer os mais deliciosos da pastelaria. Com as suas próprias mãos e na sua cozinha poderá fazer: pastéis de nata, mil-folhas, brioches, pães-de-leite, croissants, bolas-de-berlim, guardanapos, churros, molotofs, bolos de arroz e muito mais.'),
(6, '7 Ideias', '7ideias.png', 'Receitas fáceis e deliciosas para todos os dias da semana. À procura de inspiração? Deseja inovar a sua ementa? Jamie Oliver tem a solução. Mais de 120 receitas irresistíveis, usando os seus 18 ingredientes favoritos. Dê uma surpresa ao seu paladar. Sucessos mais que garantidos na sua mesa, com o máximo sabor e o mínimo esforço.'),
(7, 'Refeições em 15 Minutos', '15Min.jpg', 'A criação destas receitas foi toda uma nova experiência. Jamie procurou que fossem metódicas, criativas, informais e divertidas. Uma explosão de sabores! Foi buscar inspiração à cozinha dos quatro cantos do mundo, introduzindo sabores de que todos gostam dando importância às saladas e outros acompanhamentos. Com este livro, tentou apresentar uma variedade de cozinhas que estão a conquistar cada vez mais pessoas. Estas foram as refeições mais rápidas e fáceis que fez até hoje.'),
(8, 'Gordon Ramsay`s Ultimate Cookery Course', 'GordonRamsayCookeryCourse.jpg', '\"Eu quero te ensinar como cozinhar uma boa comida em casa. Eliminando toda a complexidade, qualquer um pode fazer receitas de dar água na boca.\" Este livro de Gordon Ramsay é sobre dar aos cozinheiros domésticos a inspiração para começar a cozinhar, com várias receitas modernas, simples e acessíveis. Aprenda a cozinhar pratos saborosos em apenas dez minutos com Ramsay.'),
(9, 'Gordon Ramsay`s Ultimate Home Cooking', 'GordonRamsayUltimateCooking.jpg', '\"As minhas regras são básicas e simples. A comida caseira tem de ser rápida e deliciosa. Se acha que não tem tempo para isso, está muito enganado: vou ajudá-lo a preparar pratos magníficos.\" Ao longo de multiplas novas receitas, este livro traz-nos de volta o prazer de cozinhar o melhor da comida caseira. Desde os pequenos-almoços aos jantares de sábado, tudo vai ser uma alegria com as m elhores receitas na rua mesa.'),
(10, 'Gordon Ramsay Quick & Delicious', 'GordonRamsayQuickDelicious.jpg', 'Crie comida com qualidade de chef fácil e rápida. Receitas criadas por um chef conhecido mundialmente que sempre oferece a melhor comida. Durante a sua carreira, Gordon aprendeu truques para criar pratos que com um sabor extraordinário e que podem ser reproduzidos sem erros, mesmo sob pressão. Com esse conhecimento, escreveu uma coleção inspirada de receitas rápidas para todos que não queiram comprometer o sabor das suas refeições.');

-- --------------------------------------------------------

--
-- Table structure for table `noticias`
--

CREATE TABLE `noticias` (
  `IDNoticia` int(11) NOT NULL,
  `titulo` varchar(45) NOT NULL,
  `fotos` varchar(50) NOT NULL,
  `descricao` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `noticias`
--

INSERT INTO `noticias` (`IDNoticia`, `titulo`, `fotos`, `descricao`) VALUES
(11, 'Azeite Virgem', '67f72fa2aaab9f1db32850cf8fbc8584d49ab7c8.jpg', 'A dieta mediterrânea, cujo o Azeite extra Virgem aparece com destaque, é conhecida na proteção contra as doenças cardiovasculares. Um grande estudo constatou que a dieta mediterrânica auxilia na redução dos ataques cardíacos, acidente vascular cerebral e morte em 30%. Por que não começar hoje? Consuma uma deliciosa salada de folhas verdes, tomates e uma proteína magra, como peixe ou frango. Termine a sua refeição com uma garoa saborosa de azeite! Você está no seu caminho para um coração saudável'),
(12, 'Futuro da cebola pode estar compremetido', 'cebolafood.jpg', 'As cebolas podem ser cultivadas a partir de sementes, aparas ou plantas. As sementes desenvolvem-se no Verão, depois de as flores terem parado de florir. As sementes podem ser semeadas directamente no jardim no início da Primavera, e as plantas de cebola estão prontas para a colheita no final do Verão ou no início do Outono.\r\n\r\nAs cebolas, que são cultivadas a partir da semente do ano anterior, têm normalmente o tamanho de toros quando colhidas e armazenadas até à Primavera seguinte.'),
(13, 'Tradiçoes Muçulmanas da cozinha', 'chafood.jpg', 'A primeira curiosidade sobre a alimentação dos muçulmanos é que os alimentos ingeridos por eles são separados através de três aspectos importantes: “Halal”, “Haram” e “Mushbooh”.\r\n\r\nA palavra “Halal” significa “permitido”, ou melhor, o que se pode consumir. Essa palavra não é somente usada para a comida, mas para tudo. Assim, quando falamos em “Halal”, sempre será o que se pode fazer, o que se pode ler, o que se pode vestir e entre outras coisas.'),
(14, 'Bananas podem correr risco de extinção?', 'chattingfood.jpg', 'Uma banana selvagem que pode ser crucial para a proteção das plantações de banana comestível foi posta na lista de espécies ameaçadas de extinção.\r\nEla só existe em Madagascar, na África, onde ficam os últimos cinco pés adultos da planta na natureza.\r\nCientistas dizem que a espécie precisa ser preservada, pois pode conter o segredo para manter as bananas em segurança no futuro.\r\nA maioria das bananas consumidas pelo mundo são do tipo Cavendish, grupo da banana nanica. '),
(15, 'Citros: exportação de suco cai em volume!', 'laranjafood.jpg', 'As exportações brasileiras de suco de laranja (FCOJ Equivalente a 66º Brix) no período de julho de 2021 a abril de 2022, os dez meses da safra 2021/2022, somaram 813.696 toneladas, 5,21% menos que em igual período da safra passada. A receita foi de US$ 1,330 bilhão, 5% acima dos US$ 1,266 bilhão de 20/21, informa a CitrusBR, que compilou dados divulgados pela Secretaria de Comércio Exterior (Secex).'),
(16, 'Manga ajuda quem tem intestino preso!', '28fa796d2f247a7a71c7c20c13bd34629acf0971.jpg', 'A manga é uma fruta de origem asiática e estima-se que esse alimento seja cultivado há mais de 4 mil anos. Por ter se adaptado rapidamente ao clima tropical do país, ela é bastante consumida pelos brasileiros. Geralmente, possui um formato oval, é um fruto carnudo com casca fina e tem uma semente grande no meio. Por ter um sabor doce e refrescante, a manga é usada em diversas receitas tanto doces quanto salgadas e o suco da fruta também é popular. A casca não é comestível.'),
(17, 'Mirtilo e o seu uso no bem-estar!', '6b3d58cfb6905a3329a68f5233fb760f1c984c2b.jpg', 'Os frutos do mirtilo têm efeitos adstringentes e protetores de vasos no nosso corpo, enquanto as folhas têm efeitos adstringentes, anti-sépticos e hipoglicemiantes. As propriedades contidas nas folhas são importantes para doenças relacionadas ao diabetes, isso se deve à presença do cromo que é um fator de tolerância à glicose. Os frutos secos, ou bagas, têm uma excelente ação adstringente. Eles são freqüentemente usados ​​para combater a diarreia em crianças e idosos.'),
(18, 'Desporto a acompanhar.. mas também há comida!', '557f25aa1a548b0d6300d1428b78f53fc1137aa1.jpg', 'O prato principal que temos para servir no Record Challenge Park é o desporto, mas está preparada uma sobremesa bem saborosa. Os Amor Electro prometem um espetáculo inesquecível naquele que será um dos momentos altos do evento de sábado no Parque de Jogos 1º de Maio, em Lisboa.\r\n\r\nMas há algo que não pode mesmo esquecer: inscrever-se! Poderá fazê-lo no site do evento - recordchallengepark.pt – ou no secretariado, que abre às 8 horas, duas horas antes do arranque das competições e da animação.'),
(19, 'Propaganda enganosa', 'd3ef8b10a86dfd8be8b7c904c4e9522e58135952.jpg', 'As redes de fast food norte-americanas McDonald\'s e Wendy\'s estão envolvidas em um processo judicial em que são acusadas de propaganda enganosa. A ação foi protocolada ontem na Corte Distrital Americana para o Distrito Leste de Nova York, nos Estados Unidos. De acordo com o processo, os sanduíches das cadeias de restaurantes são muitos maiores nas campanhas e recebem uma quantidade maior de ingredientes.');

-- --------------------------------------------------------

--
-- Table structure for table `receitas`
--

CREATE TABLE `receitas` (
  `IDReceita` int(11) NOT NULL,
  `cozinheiro` varchar(45) NOT NULL,
  `titulo` varchar(45) NOT NULL,
  `descricao` varchar(500) NOT NULL,
  `ingredientes` varchar(200) NOT NULL,
  `fotos` varchar(200) NOT NULL,
  `tempo_preparacao` time DEFAULT NULL,
  `grau_dificuldade` enum('Difícil','Medio','Facil') NOT NULL,
  `doses` int(11) NOT NULL,
  `categoria` enum('Sopa','Carne','Peixe','Vegan','Sobremesa','Bolo','Outra') NOT NULL,
  `epoca` varchar(45) NOT NULL,
  `classificacao` enum('1','2','3','4','5') DEFAULT NULL,
  `user` enum('sim','nao') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `receitas`
--

INSERT INTO `receitas` (`IDReceita`, `cozinheiro`, `titulo`, `descricao`, `ingredientes`, `fotos`, `tempo_preparacao`, `grau_dificuldade`, `doses`, `categoria`, `epoca`, `classificacao`, `user`) VALUES
(1, 'Duarte Ferreira', 'Serradura', 'Doce de bolacha e natas', '1 pacote de bolacha maria\r\n2 embalagens de Natas LONGA VIDA\r\n1 lata de Leite Condensado Tradicional NESTLÉ', 'seradura.jpeg', '01:00:00', 'Facil', 15, 'Sobremesa', 'Qualquer época', '5', NULL),
(6, 'Duarte Ferreira', 'Caldo Verde', 'Sopa Caldo Verde', '600 g de batatas\r\n400 g de couves cortada para caldo verde\r\n1 cebola\r\nazeite q.b.\r\nsal q.b.\r\n3 fatias de presunto\r\n1 dente de alho', 'caldoverde.jpg', '01:00:00', 'Facil', 12, 'Sopa', 'Qualquer época', '5', NULL),
(7, 'Chef Roman', 'Bacalhau com Broa', 'Aqueça o forno a 200º.\r\nPara preparar o bacalhau com broa, comece pelas batatas: lave-as e coloque-as numa assadeira. Salpique com sal grosso, envolva-as e leve ao forno por 30 minutos ou até estarem assadas.\r\nColoque o bacalhau numa assadeira e leve ao forno por 10 minutos (ou até os lombos lascarem). Retire e deixe arrefecer.\r\nCoza os grelos (cortados em pedaços) com água e sal até estarem cozidos. Escorra-os num pano de cozinha e esprema bem quando estiverem frios. Aqueça azeite num tacho, ju', '800 g de bacalhau demolhado\r\n1 kg de batatinhas para assar\r\n500 g de grelos\r\ndentes de alho q.b.\r\nazeite q.b.\r\nsal q.b.\r\n2 folhas de louro\r\n500 g de broa', 'bacalhaucombroa.jpg', '02:00:00', 'Medio', 6, 'Peixe', 'Natal', '5', NULL),
(8, 'Chef Roman', 'Bacalhau com Broa', 'Aqueça o forno a 200º.\r\nPara preparar o bacalhau com broa, comece pelas batatas: lave-as e coloque-as numa assadeira. Salpique com sal grosso, envolva-as e leve ao forno por 30 minutos ou até estarem assadas.\r\nColoque o bacalhau numa assadeira e leve ao forno por 10 minutos (ou até os lombos lascarem). Retire e deixe arrefecer.\r\nCoza os grelos (cortados em pedaços) com água e sal até estarem cozidos. Escorra-os num pano de cozinha e esprema bem quando estiverem frios. Aqueça azeite num tacho, ju', '800 g de bacalhau demolhado\r\n1 kg de batatinhas para assar\r\n500 g de grelos\r\ndentes de alho q.b.\r\nazeite q.b.\r\nsal q.b.\r\n2 folhas de louro\r\n500 g de broa', 'bacalhaucombroa.jpg', '02:00:00', 'Medio', 6, 'Peixe', 'Natal', '5', NULL),
(9, 'Chef Roman', 'Carne à Alentejana', 'Corte a carne em cubos e tempere-a com os dentes de alho picados, o vinho branco, a massa de pimentão, sal e pimenta. Deixe marinar, durante 20 minutos, e depois escorra.\r\nDescasque as batatas, corte-as em cubos e leve-os a fritar em óleo quente. Retire e escorra, sobre papel absorvente.\r\nAqueça o azeite num tacho, junte a carne e deixe saltear. Adicione as amêijoas, regue com a marinada e deixe cozinhar, até a carne ficar douradinha, mas com molho. Se necessário, regue com um pouco de água.\r\nJu', '800 g de carne de porco sem osso\r\n800 g de batatas\r\n400 g de amêijoas\r\n60 g de pickles\r\n4 dentes de alho\r\n300 ml de vinho branco\r\n50 ml de azeite\r\n3 colheres (sopa) de massa de pimentão\r\nAzeitonas pre', 'carnedeporco.jpg', '01:00:00', 'Medio', 4, 'Carne', 'Qualquer época', '4', NULL),
(11, 'Chef Miguel', 'Bolo de Noz', 'Ligue o forno a 180ºc. Barre uma forma de buraco com manteiga e polvilhe-a com farinha. Reserve.\r\nNuma tigela, bata a manteiga com o açúcar, até obter um creme liso. Adicione os ovos, um a um e batendo sempre, depois junte a farinha misturada com o fermento e bata. Acrescente a noz moída e misture bem.\r\nDeite a massa anterior na forma e leve ao forno durante 45 minutos. Verifique a cozedura com um palito, retire, deixe arrefecer um pouco, desenforme e deixe arrefecer totalmente.', '300 g de açúcar\r\n200 g de manteiga amolecida\r\n200 g de miolo de noz moído\r\n150 g de farinha\r\n6 Ovos\r\n1 colher (chá) de fermento em pó\r\nManteiga para untar', 'bolonoz.jpg', '01:00:00', 'Facil', 12, 'Bolo', 'Qualquer época', '5', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `utilizador`
--

CREATE TABLE `utilizador` (
  `idUtl` int(11) NOT NULL,
  `email` varchar(30) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `pass` varchar(150) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `utilizador`
--

INSERT INTO `utilizador` (`idUtl`, `email`, `nome`, `pass`) VALUES
(1, 'admin@gmail.com', 'Administrador', '3c9909afec25354d551dae21590bb26e38d53f2173b8d3dc3eee4c047e7ab1c1eb8b85103e3be7ba613b31bb5c9c36214dc9f14a42fd7a2fdb84856bca5c44c2'),
(2, 'ze@gmail.com', 'Jose', 'abc123'),
(3, 'aa@gmail.com', 'aamigo', 'qwe456'),
(4, 'joao@gmail.com', 'Joao', 'rty'),
(5, 'rodrigo@gmail.com', 'Rodrigo', 'uio'),
(6, 'mimi@gmail.com', 'Mimicas', 'asd'),
(7, 'lara@gmail.com', 'Larita', 'fgh'),
(8, 'rute@gmail.com', 'Rute', 'jkl'),
(9, 'sissi@gmail.com', 'Silvia', 'zxc'),
(10, 'mia@gmail.com', 'Myriam', 'vbnm');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chefes`
--
ALTER TABLE `chefes`
  ADD PRIMARY KEY (`IDChefe`);

--
-- Indexes for table `contactos`
--
ALTER TABLE `contactos`
  ADD PRIMARY KEY (`IDContacto`);

--
-- Indexes for table `dicas_semanais`
--
ALTER TABLE `dicas_semanais`
  ADD PRIMARY KEY (`IDDS`);

--
-- Indexes for table `eventos`
--
ALTER TABLE `eventos`
  ADD PRIMARY KEY (`IDEvento`);

--
-- Indexes for table `faq`
--
ALTER TABLE `faq`
  ADD PRIMARY KEY (`id_pergunta`);

--
-- Indexes for table `livros`
--
ALTER TABLE `livros`
  ADD PRIMARY KEY (`IDLivro`);

--
-- Indexes for table `noticias`
--
ALTER TABLE `noticias`
  ADD PRIMARY KEY (`IDNoticia`);

--
-- Indexes for table `receitas`
--
ALTER TABLE `receitas`
  ADD PRIMARY KEY (`IDReceita`);

--
-- Indexes for table `utilizador`
--
ALTER TABLE `utilizador`
  ADD PRIMARY KEY (`idUtl`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chefes`
--
ALTER TABLE `chefes`
  MODIFY `IDChefe` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `contactos`
--
ALTER TABLE `contactos`
  MODIFY `IDContacto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `dicas_semanais`
--
ALTER TABLE `dicas_semanais`
  MODIFY `IDDS` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `eventos`
--
ALTER TABLE `eventos`
  MODIFY `IDEvento` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `faq`
--
ALTER TABLE `faq`
  MODIFY `id_pergunta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=170;

--
-- AUTO_INCREMENT for table `noticias`
--
ALTER TABLE `noticias`
  MODIFY `IDNoticia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `receitas`
--
ALTER TABLE `receitas`
  MODIFY `IDReceita` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
