<?php
    include("bd/connect.php");
    include("bd/proj.php");

    $projetos = buscarProjetos($conn);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/projetos.css">
    <link rel="stylesheet" href="style/headerFooter.css">
    <link rel="stylesheet" href="style/botoes.css">
    <link rel="stylesheet" href="style/topoPgs.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="icon" type="image/x-icon" href="imgs/icons/logo.png">
    <script src="js/redirects.js"></script>
    <title>Projetos - Instituto Oliveira</title>
</head>

<body>

    <?php include("navbar.php"); ?>

    <div class="top">
        <div class="topEsq">
            <h1 id="topTit">Projetos</h1>
            <h1 id="topTitDestacado">Oliveira</h1>
            <p id="topSlogan">Seja um azeite. Faça sua doação.</p>
            <button class="btnPadrao" id="qroAjudarBtn1" onclick="redirectWhatsApp()">QUERO AJUDAR</button>
        </div>
        <div class="topDir">
            <img id="topQuadradosDir" src="imgs/quadradosDir.png">
        </div>
    </div>

    <div class="breveDesc">
        <img id="breveDescLogo" src="imgs/icons/logo.png">
        <p>O <b>Instituto Oliveira</b> é um empreendimento social sem fins lucrativos, que <br>
        <b>apoia famílias</b> com histórico de <b>câncer infantojuvenil</b></p>
    </div>

    <div class="projetosDivTxtImg">
        <?php if (!empty($projetos)): ?>
            <?php foreach ($projetos as $projeto): ?>
                <div class="divTxtImg">
                    
                    <img src="<?= htmlspecialchars($projeto['img01']) ?>" id="img">

                    <div class="txtBtnProj">
                        <div class="txtProj">
                            <h1 id="projTit"><?= htmlspecialchars($projeto['nome']) ?></h1>
                            <p id="descProj"><?= $projeto['breveDesc'] ?></p>
                        </div>
                        <div class="btn">
                            <button type="button" class="projBtn" data-projeto-id="<?= htmlspecialchars($projeto['id']) ?>">
                                <p>Saiba Mais</p>
                                <i class="material-icons" id="saibaMaisIcon">open_in_new</i>
                            </button>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p>Nenhum projeto encontrado.</p>
        <?php endif; ?>
    </div>

    <?php include("footer.php"); ?>
</body>

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

</html>