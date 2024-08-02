<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/headerFooter.css">
    <link rel="stylesheet" href="style/botoes.css">
    <link rel="stylesheet" href="style/topoPgs.css">
    <link rel="stylesheet" href="style/editais.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="icon" type="image/x-icon" href="imgs/icons/logo.png">
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
            <h1 id="topTit">Editais</h1>
            <h1 id="topTitDestacado">Oliveira</h1>
            <p id="topSlogan">Seja um azeite. Faça sua doação.</p>

            <button id="qroAjudarBtn" onclick="redirectWhatsapp()">QUERO AJUDAR</button>
        </div>

        <div class="topDir">
            <img id="topQuadradosDir" src="imgs/quadradosDir.png">
        </div>

    </div>

    <div class="breveDesc">
        <img id="breveDescLogo" src="imgs/icons/logo.png">
        <p>O <b>Instituto Oliveira</b> oferece apoio às crianças, adolescentes e suas famílias <br>
        que enfrentam o <b>tratamento do câncer infantojuvenil.</b></p>
    </div>

    <!-- ----------------------------------------------------------------------------------------------------------------- -->

    <!-- PÁGINA -->

    <div class="main">

        <h1 id="tit">Relatório Mensal</h1>

        <div class="editaisTxtBtns">
            <p id="download">Faça o download dos editais:</p>

            <div class="editais">
                <div class="editaisLin">
                    <button type="button" class="editaisBtn1" id="">Edital N° ?</button>
                    <button type="button" class="editaisBtn2" id="">Edital N° ?</button>
                    <button type="button" class="editaisBtn2" id="">Edital N° ?</button>
                    <button type="button" class="editaisBtn1" id="">Edital N° ?</button>
                </div>
                <div class="editaisLin">
                    <button type="button" class="editaisBtn1" id="">Edital N° ?</button>
                    <button type="button" class="editaisBtn2" id="">Edital N° ?</button>
                    <button type="button" class="editaisBtn2" id="">Edital N° ?</button>
                    <button type="button" class="editaisBtn1" id="">Edital N° ?</button>
                </div>
                <div class="editaisLin">
                    <button type="button" class="editaisBtn1" id="">Edital N° ?</button>
                    <button type="button" class="editaisBtn2" id="">Edital N° ?</button>
                    <button type="button" class="editaisBtn2" id="">Edital N° ?</button>
                    <button type="button" class="editaisBtn1" id="">Edital N° ?</button>
                </div>
            </div>
        </div>

    </div>

    <?php
        include("footer.php");
    ?>

</body>

<script>
    
</script>

</html>