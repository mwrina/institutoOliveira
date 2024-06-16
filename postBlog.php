<?php
    include("bd/connect.php");
    include("bd/proj.php");

    // Inicia o buffer de saída
    ob_start();

    if (isset($_GET['blogId'])) {
        $idBlog = intval($_GET['blogId']);


        $sql = "SELECT dataCriacao, titulo, breveDesc, texto, img FROM blogs WHERE id = ?";
        
        $stmt = mysqli_prepare($conn, $sql);
        if (!$stmt) {
            echo "Erro ao preparar a consulta: " . mysqli_error($conn) . "<br>";
            exit();
        }

        mysqli_stmt_bind_param($stmt, "i", $idBlog);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        if ($result) {
            if (mysqli_num_rows($result) > 0) {
                $blog = mysqli_fetch_assoc($result);
            } else {
                ob_end_flush();
                header("Location: blog.php");
                exit();
            }
        } else {
            echo "Erro ao buscar o projeto: " . mysqli_error($conn) . "<br>";
        }

        mysqli_stmt_close($stmt);
    } else {
        ob_end_flush();
        header("Location: blog.php");
        exit();
    }

    // Envia os dados do buffer de saída
    ob_end_flush();
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
    <link rel="icon" type="image/x-icon" href="/imgs/icons/logo.png">
    <title>Projetos - Instituto Oliveira</title>
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

            <div class="imgProj">
                <img id="imgProj" src="<?= $blog['img'] ?>">
            </div>

            <div class="txt">
                <p id="txt"><?= $blog['texto'] ?></p>
            </div>

        </div>

        <div class="botaoVoltarContainer">
            <button class="voltar">
                <i class="material-icons" id="voltarIcon">arrow_back_ios</i>
                <p id="btnTxt">Voltar</p>
            </button>
        </div>

    </main>

    <?php
        include('footer.php');
    ?>
