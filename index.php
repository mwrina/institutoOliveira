<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/index.css">
    <link rel="stylesheet" href="style/headerFooter.css">
    <link rel="stylesheet" href="style/botoes.css">
    <link rel="icon" type="image/x-icon" href="imgs/icons/logo.png">
    <script src="js/index.js"></script>
    <title>Instituto Oliveira</title>
</head>
<body>

    <?php
        include("navbar.php");
    ?>

    <div class="top">

        <img id="quadradosEsq" src="imgs/quadradosEsq.png">
        
        <div class="topCuidarAlemDaCura">

            <div id = "topCenterLin1">
                <p id="topCuidar">Cuidar</p>
                <img id="cuidarImg" src="imgs/icons/borboletinha.png">
            </div>
            
            <div class = "topCenterLin2">
                <p id="topEAlemDa">é além da</p>
                <p id="topCura">cura!</p>
            </div>

            <p id="topSlogan">Seja um azeite. Faça a sua doação.</p>

            <button id="qroAjudarBtn" onclick="redirectWhatsapp()">QUERO AJUDAR</button>

        </div>
        
        <img id="quadradosDir" src="imgs/quadradosDir.png">

    </div>

    <div class="breveDesc">
        <img id="breveDescLogo" src="imgs/icons/logo.png">
        <p>O <b>Instituto Oliveira</b> oferece apoio às <b>famílias</b> que lidam com <br>
        <b>crianças e adolescentes</b> enfrentando o câncer</p>
    </div>

    <div class="sobre">

        <div class="sobreGeral">

            <div class="sobreTxt">

                <div class="sobreTit">
                    <h1 id="sobreTitDestacado">Sobre</h1>
                    <h1 id="sobreTit">o Instituto</h1>
                </div>
    
            
                <p>Somos uma Instituição que acolhe e cuida de crianças e adolescentes com câncer, junto a <br>
                    suas famílias, dando suporte físico, emocional e espiritual, complementando o tratamento <br>
                    do câncer com uma equipe multiprofissional.

                    <br><br>                    
        
                    O instituto busca, ainda, auxiliar no processo de ressignificação da doença na vida de cada<br>
                    membro do núcleo familiar.
                    
                    <br><br>

                    Porque cuidar, é além da cura.

                </p>
    
            </div>
    
            <img id="sobreImg" src="imgs/sobreOInstituto.png">

        </div>

        <div class="btnContainer">
            <button onclick="redirectSobre()" class="btn" id="saibaMaisBtn">Saiba mais</button>
        </div>
                
    </div>

    <div class="nums">

        <div class="numsTit">
            <h1 id="numsTitDestacado">Números</h1>
            <h1 id="numsTit">do Instituto</h1>
        </div>

        <div class="numsDivs">

            <div class="numDiv">
                <p id="num"><?php
                    include("bd/nums.php");
                    getAtendimentos($conn);
                    echo isset($_SESSION['atendimentosAtual']) ? $_SESSION['atendimentosAtual'] : '';
                ?></p>
                <p id="descNum">Atendimentos</p>
            </div>
    
            <div class="numDiv">
                <p id="num"><?php
                    include("bd/nums.php");
                    getDoadores($conn);
                    echo isset($_SESSION['doadoresAtual']) ? $_SESSION['doadoresAtual'] : '';
                ?></p>
                <p id="descNum">Doadores ativos</p>
            </div>
    
            <div class="numDiv">
                <p id="num"><?php
                    include("bd/nums.php");
                    getFamilias($conn);
                    echo isset($_SESSION['familiasAtual']) ? $_SESSION['familiasAtual'] : '';
                ?></p>
                <p id="descNum">Famílias acolhidas</p>
            </div>
    
            <div class="numDiv">
                <img id="numInfinito" src="imgs/icons/infinito.png">
                <p id="descNum">Abraços dados</p>
            </div>

        </div>

    </div>

    <div class="projetos">
        
        <div class="projetosTit">
            <h1 id="projetosTit">Nossos</h1>
            <h1 id="projetosTitDestacado">projetos</h1>
        </div>

        <div class="projDivs">

            <div class="projDiv">
                <img id="projImg" src="imgs/brechoOliveira.jpg" alt="Imagem de cabide de roupas próximo a uma estante com plantas e um porta-retato">
                <p id="projTit">Brechó Oliveira</p>
                <p id="projDesc">O Brechó Oliveira é um lindo movimento <br>
                do voluntariado, ajudando na sustentabi- <br>
                lidade do Instituto Oliveira e desenvol- <br>
                vendo a cultura de moda sustentável <br>
                com estilo. Permitindo à comunidade <br>
                participar de forma ativa na <br>
                construção do Projeto.
                </p>
            </div>

            <div class="projDiv">
                <img id="projImg" src="imgs/atendimentoMedico.png" alt="Dr. Hugo Oliveira, fundador do Instituto Oliveira, vestindo seu jaleco de médico e sorrindo">
                <p id="projTit">Policlínica</p>
                <p id="projDesc">Fizemos uma reforma e revitalização <br>
                    do prédio em que estamos sediados, <br>
                    com o objetivo de ampliar o número de <br>
                    famílias atendidas, criar mais conexão <br>
                    com as famílias e também propor- <br>
                    cionar o estágio dos profissionais <br>
                    de saúde recém formados.
                </p>
            </div>
            
            <div class="projDiv">
                <img id="projImg" src="imgs/eventosInstituto.png" alt="Foto da equipe do Instituto Oliveira sorrindo em frente a banner de divulgação de nosso trabalho.">
                <p id="projTit">Cartilha</p>
                <p id="projDesc">Material em formato de cartilha <br>
                    trazendo informações sobre os sinais e <br>
                    sintomas do câncer infanto juvenil de <br>
                    uma forma interativa e lúdica, para a <br>
                    distribuição nas escolas, empresas e <br>
                    comunidade em geral. 
                </p>
            </div>

            <div class="projDiv">
                <img id="projImg" src="imgs/palestras.jpg" alt="Imagem de uma plateia assistindo a uma palestra de um homem de roupa social, desfocado ao fundo.">
                <p id="projTit">Palestras</p>
                <p id="projDesc">Nossas palestras visam mobilizar<br>
                    a sociedade e oferecer informações<br>
                    sobre os sinais e sintomas do câncer<br>
                    infanto juvenil em prol do diagnóstico<br>
                    precoce e do enfrentamento à essa<br>
                    doença ameaçadora da vida.
                </p>
            </div>

        </div>

        <div class="btnContainer">
            <button class="btn" onclick="redirectProjetos()">Conheça mais projetos</button>
        </div>
    </div>

    <div class="cuidarAlemDaCura">
        <div class="cuidarTit">
            <h1 id="cuidar">Cuidar</h1>
            <h1 id="eAlemDa">é além da</h1>
            <h1 id="cura">cura</h1>
        </div>
        
        <p id="slogan">Seja um azeite. Faça a sua doação!</p>

        <button id="qroAjudarBtn" onclick="redirectWhatsapp()">QUERO AJUDAR</button>

    </div>

    <div class="depoimentos">
        <div class="depTit">
            <h1 id="depTit">Depoimentos</h1>
            <p id="depDesc">Lorem ipsum dolor sit amet, consectetur adipiscing <br>
             elit. Donec id cursus neque, malesuada consectetur <br>
             lectus. Quisque nulla tortor, consectetur a urna a, <br>
             congue cursus enim. </p>
        </div>

        <div class="depDiv">

            <div class="depLin1">
                <img id="depImg" src="imgs/mariaRamos.png">
                <div class="depTxt">
                    <p id="depNome">Maria Ramos</p>
                    <p id="depOcupacao">Financeiro</p>
                </div>
                <img id="depIcon" src="imgs/icons/depIcon.png">
            </div>

            <p>Lorem ipsum dolor sit amet, consectetur <br>
            adipiscing elit. Donec id cursus neque, malesuada <br>
            consectetur lectus. Quisque nulla tortor, <br>
            consectetur a urna a, congue cursus enim. </p>

        </div>

        <div class="depDiv">
            
            <div class="depLin1">
                <img id="depImg" src="imgs/beatrizSchmidt.png">
                <dep class="depTxt">
                    <p id="depNome">Beatriz Schmidt</p>
                    <p id="depOcupacao">Estudante</p>   
                </dep>
                <img id="depIcon" src="imgs/icons/depIcon.png">
            </div>

            <p>Lorem ipsum dolor sit amet, consectetur <br>
            adipiscing elit. Donec id cursus neque, malesuada <br>
            consectetur lectus. Quisque nulla tortor, <br>
            consectetur a urna a, congue cursus enim. </p>

        </div>

    </div>

    <div class="blog">

        <div class="blogTit">
            <h1 id="blogTit">Blog do</h1>
            <h1 id="blogTitDestacado">instituto</h1>
        </div>

        <div class="blogDivs">

            <div class="blogDiv">
                <div class="blogImgs">
                    <img id="blogImg" src="imgs/blog01.png" alt="Criança com câncer usando um lenço na cabeça e abraçando sua mãe. Ambas sorrindo.">
                    <img id="coracaoBlog" src="imgs/icons/coracao.png">
                </div>
                <p id="blogNome">Lorem Ipsum</p>
                <p id="blogTxt">Lorem ipsum dolor sit amet, <br>
                    consectetur adipiscing elit. Nullam <br>
                    efficitur purus non dui ultricies, vel <br>
                    commodo quam feugiat. Etiam ac <br>
                    feugiat ante, pretium aliquet mi.</p>
            </div>

            <div class="blogDiv">
                <div class="blogImgs">
                    <img id="blogImg" src="imgs/blog02.png" alt="Criança com câncer usando um lenço na cabeça e abraçando sua mãe. Ambas sorrindo.">
                    <img id="coracaoBlog" src="imgs/icons/coracao.png">
                </div>
                <p id="blogNome">Lorem Ipsum</p>
                <p id="blogTxt">Lorem ipsum dolor sit amet, <br>
                    consectetur adipiscing elit. Nullam <br>
                    efficitur purus non dui ultricies, vel <br>
                    commodo quam feugiat. Etiam ac <br>
                    feugiat ante, pretium aliquet mi.</p>
            </div>

            <div class="blogDiv">
                <div class="blogImgs">
                    <img id="blogImg" src="imgs/blog03.png" alt="Criança com câncer usando um lenço na cabeça e abraçando sua mãe. Ambas sorrindo.">
                    <img id="coracaoBlog" src="imgs/icons/coracao.png">
                </div>
                <p id="blogNome">Lorem Ipsum</p>
                <p id="blogTxt">Lorem ipsum dolor sit amet, <br>
                    consectetur adipiscing elit. Nullam <br>
                    efficitur purus non dui ultricies, vel <br>
                    commodo quam feugiat. Etiam ac <br>
                    feugiat ante, pretium aliquet mi.</p>
            </div>

            <div class="blogDiv">
                <div class="blogImgs">
                    <img id="blogImg" src="imgs/blog04.png" alt="Criança com câncer usando um lenço na cabeça e abraçando sua mãe. Ambas sorrindo.">
                    <img id="coracaoBlog" src="imgs/icons/coracao.png">
                </div>
                <p id="blogNome">Lorem Ipsum</p>
                <p id="blogTxt">Lorem ipsum dolor sit amet, <br>
                    consectetur adipiscing elit. Nullam <br>
                    efficitur purus non dui ultricies, vel <br>
                    commodo quam feugiat. Etiam ac <br>
                    feugiat ante, pretium aliquet mi.</p>
            </div>

        </div>

        <div class="btnContainer">
            <button class="btn" onclick="redirectBlog()" id="blogBtn">Veja mais posts no nosso blog!</button>
        </div>

    </div>

    <?php
        include("footer.php");
    ?>
    
</body>
</html>