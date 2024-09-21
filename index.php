<?php

include("bd/nums.php");
$nums = getNums($conn);

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/index.css">
    <link rel="stylesheet" href="style/botoes.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="icon" type="image/x-icon" href="imgs/icons/logo.png">
    <script src="js/index.js"></script>
    <title>Instituto Oliveira</title>
</head>
<body>

    <?php
        include("navbar.php");
    ?>

    <div class="top">
        <div class="topEsq">
            <img id="quadradosEsq" src="imgs/quadradosEsq.png">
        </div>

        <div class="topCentro">

            <div class="topSlogan">

                <div class="topSlogan01">
                    <h1 id="topCuidar">Cuidar</h1>
                    <img id="topCuidarImg" src="imgs/icons/borboletinha.png">
                </div>
                <div class="topSlogan02">
                    <h1 id="topEAlemDa">é além da</h1>
                    <h1 id="topCura">cura</h1>
                </div>
                <div class="btnContainer">
                    <button type="button" id="qroAjudarBtn1">QUERO AJUDAR</button>
                </div>
            </div>

            

        </div>
    

        <div class="topDir">
            <img id="quadradosDir" src="imgs/quadradosDir.png">
        </div>

    </div>

    <div class="breveDesc">
        <img id="breveDescLogo" src="imgs/icons/logo.png">
        <p>O <b>Instituto Oliveira</b> oferece apoio às crianças, adolescentes e suas famílias
        que enfrentam o <b>tratamento do câncer infantojuvenil.</b></p>
    </div>

    <div class="sobre">

        <div class="sobreGeral">

            <div class="sobreTxt">

                <div class="sobreTit">
                    <h1 id="sobreTitDestacado">Sobre</h1>
                    <h1 id="sobreTit">o Instituto</h1>
                </div>
    
            
                <p><?php
                
                    include("bd/sobre.php");
                    $secaoSobre = buscarIndex($conn);

                    echo htmlspecialchars_decode($secaoSobre[0]["texto01"]);
                    
                    ?></p>
    
            </div>
    
            <img id="sobreImg" src="<?= $secaoSobre[0]["img"] ?>">

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
            <?php foreach($nums as $num): ?>
                <div class="numDiv">
                    <p class="num"><?php echo htmlspecialchars($num['valor'], ENT_QUOTES, 'UTF-8'); ?></p>
                    <p class="descNum"><?php echo htmlspecialchars($num['campo'], ENT_QUOTES, 'UTF-8'); ?></p>
                </div>
            <?php endforeach; ?>

            <div class="numDiv">
                <img class="numInfinito" src="imgs/icons/infinito.png">
                <p class="descNum">Abraços dados</p>
            </div>
        </div>


    </div>

    <div class="projetos">
        
        <div class="projetosTit">
            <h1 id="projetosTit">Nossos</h1>
            <h1 id="projetosTitDestacado">projetos</h1>
        </div>

        <div class="projDivs">

            <?php

                include('bd/proj.php');
                $projetos = buscar4Projetos($conn);

                if (!empty($projetos)):
                    foreach($projetos as $projeto):
            ?>

            <div class="projDiv">
                <button type="button" class="projBtn" data-projeto-id="<?= htmlspecialchars($projeto['id']) ?>">
                    <img id="projImg" src="<?= $projeto['img01']; ?>">
                    <p id="projTit"><?= $projeto['nome'] ?></p>
                    <p id="projDesc"><?= $projeto['breveDesc'] ?></p>
                </button>
            </div>

            <?php
                    endforeach;
                else:
            ?>
                <p>Nada para ver aqui ainda.</p>
            <?php
                endif;
            ?>

        </div>

        <div class="btnContainer">
            <button id="saibaMaisBtn" onclick="redirectProjetos()">Conheça mais projetos</button>
        </div>
    </div>

    <div class="cuidarAlemDaCura">
        <div class="cuidarTit">
            <h1 id="cuidar">Cuidar</h1>
            <h1 id="eAlemDa">é além da</h1>
            <h1 id="cura">cura</h1>
        </div>
        
        <p id="slogan">Seja um azeite. Faça a sua doação!</p>

        <div class="btnContainer">
            <button id="saibaMaisBtn" onclick="redirectWhatsapp()">QUERO AJUDAR</button>
        </div>

    </div>

    <?php 
        include("bd/deps.php");
        $depoimentos = buscarDepsExibidos($conn);
        if(!empty($depoimentos)): 
    ?>

    <div class="depoimentos">
        <div class="depTit">
            <h1 id="depTit">Depoimentos</h1>
            <p id="depDesc">Alguns depoimentos dados por pessoas envolvidas com o Instituto.</p>
        </div>

        <?php
            foreach($depoimentos as $depoimento):
        ?>

        <div class="depDiv">

            <div class="depLin1">
                <img id="depImg" src="<?= $depoimento['img'] ?>">
                <div class="depTxt">
                    <p id="depNome"><?= $depoimento['nome'] ?></p>
                    <p id="depOcupacao"><?= $depoimento['ocupacao'] ?></p>
                </div>
                <img id="depIcon" src="imgs/icons/depIcon.png">
            </div>

            <p id="depoimento"><?= $depoimento['depoimento'] ?></p>

        </div>

    <?php
            endforeach;
        endif;
    ?>

</div>

    <div class="blog">

        <div class="blogTit">
            <h1 id="blogTit">Blog do</h1>
            <h1 id="blogTitDestacado">instituto</h1>
        </div>

        <div class="blogDivs">

        <?php

            include('bd/blog.php');
            $blogs = buscar4Blogs($conn);

            if (!empty($blogs)):
                foreach($blogs as $blog):
        ?>

            <div class="blogDiv">
                <button type="button" class="blogBtn" data-blog-id="<?= htmlspecialchars($blog['id']) ?>">
                    <div class="blogImgs">
                        <img id="blogImg" src="<?= $blog['img'] ?>">
                        <img id="coracaoBlog" src="imgs/icons/coracao.png">
                    </div>
                    <p id="blogNome"><?= $blog['titulo'] ?></p>
                    <p id="blogTxt"><?= $blog['breveDesc'] ?></p>
                </button>
            </div>

        <?php
                endforeach;
            else:

        ?>

            <p>Nada para ver aqui ainda.</p>

        <?php
            endif;
        ?>

        </div>

        <div class="btnContainer">
            <button class="btn" onclick="redirectBlog()" id="blogBtn">Veja mais posts no nosso blog!</button>
        </div>

    </div>

    <?php
        include("footer.php");
    ?>
    
</body>

<script>
            document.addEventListener("DOMContentLoaded", function() {
                // Obtém todos os botões "Saiba Mais"
                var projBtn = document.querySelectorAll('.projBtn');

                // Adiciona um ouvinte de evento de clique a cada botão
                projBtn.forEach(function(btn) {
                    btn.addEventListener('click', function() {
                        // Obtém o ID do projeto do atributo data
                        var projetoId = this.getAttribute('data-projeto-id');
                        console.log("ID do Projeto para redirecionamento: " + projetoId);

                        // Redireciona para a página do projeto com o ID como parâmetro
                        window.location.href = 'paginaProj.php?projetoId=' + projetoId;
                    });
                });

                var blogBtn = document.querySelectorAll('.blogBtn');

                    blogBtn.forEach(function(btn) {
                        btn.addEventListener('click', function() {
                            var blogId = this.getAttribute('data-blog-id');
                            window.location.href = 'postBlog.php?blogId=' + blogId;
                        });
                    });

            });
        </script>
</html>