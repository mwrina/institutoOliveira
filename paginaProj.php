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
    <link rel="icon" type="image/x-icon" href="/imgs/icons/logo.png">
    <title>Projetos - Instituto Oliveira</title>
</head>

<body>

    <!-- PADRÃO HEADER -->

    <?php
        include("navbar.php");
    ?>

    <!-- PADRÃO TOPO DA PÁGINA -->

    <div class="top">
        
        <div class="topEsq">
            <h1 id="topTit">Projetos</h1>
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

