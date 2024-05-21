<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/headerFooter.css">
    <link rel="stylesheet" href="style/botoes.css">
    <link rel="stylesheet" href="style/topoPgs.css">
    <link rel="stylesheet" href="style/postBlog.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="icon" type="image/x-icon" href="/imgs/icons/logo.png">
    <title>Blog - Instituto Oliveira</title>
    <link rel="shortcut icon" href="ico/logo.ico" type="image/x-icon">
</head>

<body>
    <!-- PADRÃO HEADER -->

    <?php
        include("navbar.php");
    ?>

    <!-- PADRÃO TOPO DA PÁGINA -->

    <div class="top">
        
        <div class="topEsq">
            <h1 id="topTit">Blog</h1>
            <h1 id="topTitDestacado">Oliveira</h1>
            <p id="topSlogan">Seja um azeite. Faça sua doação.</p>

            <button id="qroAjudarBtn" onclick="redirectWhatsapp()">QUERO AJUDAR</button>
        </div>

        <div class="topCentro">
            <img id="topLogoBranca" src="imgs/icons/logoBranca.png">
        </div>

        <div class="topDir">
            <img id="topQuadradosDir" src="imgs/quadradosDir.png">
        </div>

    </div>

    <div class="breveDesc">
        <img id="breveDescLogo" src="imgs/icons/logo.png">
        <p>Últimas postagens</p>
    </div>
    
    <!-- PÁGINA -->

    <div class="post1">

        <div class="txt">

            <div class="titPost1">

                <h1 id="titPost1">Como falar de câncer com crianças?</h1>

            </div>

            <p id="txt1Post1">

                Lorem ipsum dolor sit amet consectetur adipisicing elit. Minima natus aliquid nobis, explicabo officiis praesentium non animi assumenda unde ipsa debitis earum obcaecati, vitae minus. Vel quasi ut maxime dolorum!
                
                <br><br>

                Lorem ipsum dolor sit amet, consectetur adipisicing elit. At laborum explicabo, provident laboriosam incidunt dolor vitae odit, sint mollitia iste, commodi ab beatae quidem rerum. Magni ipsa sequi veritatis tenetur.

            </p>
            
            <br>

        </div> 
    
    </div> 

    <img id="imgPost1" src="imgs/blog01.png" alt="Imagem 01">

    <br><br>

    <button id="voltar"> <img src="ico/share.ico" alt="share"> Voltar </button>

    <br><br><br>
   
    <?php
        include("footer.php");
    ?>

</body>