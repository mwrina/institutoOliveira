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
    <link rel="stylesheet" href="style/headerFooter.css">
    <link rel="stylesheet" href="style/botoes.css">
    <link rel="stylesheet" href="style/topoPgs.css">
    <link rel="stylesheet" href="style/blogs.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="icon" type="image/x-icon" href="imgs/icons/logo.png">
    <script src="js/redirects.js"></script>
    <title>Sobre o Instituto - Instituto Oliveira</title>
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

            <button id="qroAjudarBtn1" onclick="redirectWhatsApp()">QUERO AJUDAR</button>
        </div>

        <div class="topDir">
            <img id="topQuadradosDir" src="imgs/quadradosDir.png">
        </div>

    </div>

    <div class="breveDesc">
        <img id="breveDescLogo" src="imgs/icons/logo.png">
        <p>Últimas postagens</p>
    </div>

    <!-- ----------------------------------------------------------------------------------------------------------------- -->

    <!-- PÁGINA -->

    <div class="blogDivTxtImg">
        
        <?php if (!empty($blogs)): ?>
        
            <?php foreach ($blogs as $blog): ?>

                <div class="divTxtImg">
                    <div class="img">
                        <img src="<?= $blog['img'] ?>" id="img">
                    </div>
                    <div class="txtBtnBlog">
                        <div class="txtBlog">
                            <h1 id="blogTit"><?= $blog['titulo'] ?></h1>
                                <p id="criadoEm">Criado em: <?= $blog['dataCriacao'] ?></p>
                                <p id="blogDesc"><?= $blog['breveDesc'] ?></p>
                            </div>
                        <div class="btn">
                            <button type="button" class="blogBtn" data-blog-id="<?= htmlspecialchars($blog['id']) ?>">
                                <p>Saiba Mais</p>
                                <i class="material-icons" id="saibaMaisIcon">open_in_new</i>
                            </button>
                        </div>
                    </div>
                </div>

            <?php endforeach; ?>
        
        <?php else: ?>
        
            <p>Nenhum blog encontrado.</p>
        
        <?php endif; ?>
    </div>

    <?php
        include("footer.php");
    ?>

</body>

<script>
    document.addEventListener("DOMContentLoaded", function() {
    var saibaMaisBtns = document.querySelectorAll('.blogBtn');

        saibaMaisBtns.forEach(function(btn) {
            btn.addEventListener('click', function() {
                var blogId = this.getAttribute('data-blog-id');
                window.location.href = 'postBlog.php?blogId=' + blogId;
            });
        });
    });
</script>
</html>
