<?php
    include("bd/connect.php");
    include("bd/blog.php");

    // Inicia o buffer de saída
    ob_start();

    if (isset($_GET['blogId'])) {
        $id = intval($_GET['blogId']);
    } else {
        header("Location: admBlog.php");
        exit();
    }

    $blog = buscarBlogPorId($conn, $id);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/postBlog.css">
    <link rel="stylesheet" href="style/headerFooter.css">
    <link rel="stylesheet" href="style/botoes.css">
    <link rel="stylesheet" href="style/topoPgs.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="icon" type="image/x-icon" href="imgs/icons/logo.png">
    <title>Blog - Instituto Oliveira</title>
</head>

<body>

    <?php
        include("navbar.php");
    ?>

    <!-- PADRÃO TOPO DA PÁGINA -->

    <div class="top">
        
        <div class="topEsq">
            <h1 id="topTit">Blog</h1>
            <h1 id="topTitDestacado">Oliveira</h1>
            <p id="topSlogan">Seja um azeite. Faça sua doação.</p>

            <button id="qroAjudarBtn1" onclick="redirectWhatsapp()">QUERO AJUDAR</button>
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

<!-- Página -->

    <main>

        <div class="titContainer">
            <div class="tit">
                <h1 id="titBlog"><?= $blog['titulo'] ?></h1>
                <h5 id="descBlog"><?= $blog['breveDesc'] ?></h5>
            </div>
        </div>

        <div class="imgTxt">

            <div class="img">
                <img id="img" src="<?= $blog['img'] ?>">
            </div>

            <div class="txt">
                <p id="txt"><?= $blog['texto'] ?></p>
            </div>

        </div>

        <div class="botaoVoltarContainer">
            <button type="button" class="voltar">
                <i class="material-icons" id="voltarIcon">arrow_back_ios</i>
                <p id="btnTxt">Voltar</p>
            </button>
        </div>

    </main>

    <?php
        include('footer.php');
    ?>

</body>

<script>
    document.querySelector(".voltar").addEventListener('click', () => {
        window.location.href = "blog.php";
    })
</script>

</html>