<?php
    include("bd/connect.php");
    include("bd/blog.php");

    $blogs = buscarBlogs($conn);
?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/sobreOInstituto.css">
    <link rel="stylesheet" href="style/headerFooter.css">
    <link rel="stylesheet" href="style/botoes.css">
    <link rel="stylesheet" href="style/topoPgs.css">
    <link rel="stylesheet" href="style/pageBlog.css">
    <link rel="icon" type="image/x-icon" href="/imgs/icons/logo.png">
    <title>Sobre o Instituto - Instituto Oliveira</title>
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
            <h1 id="topTit">Sobre o</h1>
            <h1 id="topTitDestacado">Instituto</h1>
            <p id="topSlogan">Seja um azeite. Faça sua doação.</p>

            <button id="qroAjudarBtn" onclick="redirectWhatsapp()">QUERO AJUDAR</button>
        </div>

        <div class="topCentro">
            <img id="topLogoBranca" src="../private/imgs/icons/logoBranca.png">
        </div>

        <div class="topDir">
            <img id="topQuadradosDir" src="../private/imgs/quadradosDir.png">
        </div>

    </div>

    <div class="breveDesc">
        <img id="breveDescLogo" src="../private/imgs/icons/logo.png">
        <p>Últimas postagens</p>
    </div>
<!-- ----------------------------------------------------------------------------------------------------------------- -->

    <!-- PÁGINA -->

    <div class="pageBlogDivTxtImg">

    <div class="blogDivTxtImg">
        <?php if (!empty($blogs)): ?>
            <?php foreach ($blogs as $blog): ?>
                <div class="divTxtImg">
                    <div class="img">
                        <img src="<?= htmlspecialchars($projeto['imgBlog']) ?>" id="img">
                    </div>
                    <div class="txtProj">
                        <h1 id="projTit"><?= htmlspecialchars($projeto['nomeProj']) ?></h1>
                        <p id="descProj"><?= $projeto['breveDescProj'] ?></p>
                        <button type="button" class="projBtn" data-projeto-id="<?= htmlspecialchars($projeto['idProj']) ?>">
                            <div class="txtBtn">Saiba Mais</div>
                            <i class="material-icons" id="saibaMaisIcon">open_in_new</i>
                        </button>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p>Nenhum blog encontrado.</p>
        <?php endif; ?>
    </div>
        
        <!-- POST 2 -->
        <div class="imgPost2">

            <img src="imgs/blog02.png" id="imgPost2">
            
            <div class="txt">

                <div class="tit">
                    <h1 id="postTit2">Lorem ipsum</h1>
                </div>

                <p id="txt">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec id cursus neque, malesuada consectetur lectus. 
                    Quisque nulla tortor, consectetur a urna a, congue cursus enim.
                </p>
                
                <div class="saibaMais">
                    <button id="saibaMaisBtn" onclick="redirectSaibaVoluntarios()">Saiba Mais <img src="imgs/icons/shareButton.png"></button>
                </div>

            </div>
        </div>

         <!-- POST 3 -->
         <div class="imgPost3">

            <img src="imgs/blog03.png" id="imgPost3">
            
            <div class="txt">

                <div class="tit">
                    <h1 id="postTit3">Lorem ipsum</h1>
                </div>

                <p id="txt">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec id cursus neque, malesuada consectetur lectus. 
                    Quisque nulla tortor, consectetur a urna a, congue cursus enim.
                </p>
                
                <div class="saibaMais">
                    <button id="saibaMaisBtn" onclick="redirectSaibaVoluntarios()">Saiba Mais <img src="imgs/icons/shareButton.png"></button>
                </div>

            </div>
        </div>

        <!-- POST 4 -->
        <div class="imgPost4">

            <img src="imgs/blog04.png" id="imgPost4">
            
            <div class="txt">

                <div class="tit">
                    <h1 id="postTit4">Lorem ipsum</h1>
                </div>

                <p id="txt">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec id cursus neque, malesuada consectetur lectus. 
                    Quisque nulla tortor, consectetur a urna a, congue cursus enim.
                </p>
                
                <div class="saibaMais">
                    <button id="saibaMaisBtn" onclick="redirectSaibaVoluntarios()">Saiba Mais <img src="imgs/icons/shareButton.png"></button>
                </div>

            </div>
        </div>
    </div>

    <?php
        include("footer.php");
    ?>

<script>
        document.addEventListener("DOMContentLoaded", function() {
            // Obtém todos os botões "Saiba Mais"
            var saibaMaisBtns = document.querySelectorAll('.projBtn');

            // Adiciona um ouvinte de evento de clique a cada botão
            saibaMaisBtns.forEach(function(btn) {
                btn.addEventListener('click', function() {
                    // Obtém o ID do projeto do atributo data
                    var projetoId = this.getAttribute('data-projeto-id');
                    console.log("ID do Projeto para redirecionamento: " + projetoId);

                    // Redireciona para a página do projeto com o ID como parâmetro
                    window.location.href = 'paginaProj.php?projetoId=' + projetoId;
                });
            });
        });
    </script>

</body>
