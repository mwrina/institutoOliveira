<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/headerFooter.css">
    <link rel="stylesheet" href="style/botoes.css">
    <link rel="stylesheet" href="style/topoPgs.css">
    <link rel="stylesheet" href="style/transparencia.css">
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

        <div class="transp">
            <h1 id="tit">Relatório Mensal</h1>

            <div class="transpTxtBtns">
                <p id="download">Faça o download agora mesmo:</p>

                <div class="transparencia">
                    <div class="editaisCol">
                        <button type="button" class="editaisBtn1" id="">JAN/24</button>
                        <button type="button" class="editaisBtn1" id="">FEV/24</button>
                        <button type="button" class="editaisBtn1" id="">MAR/24</button>
                        <button type="button" class="editaisBtn1" id="">ABR/24</button>
                    </div>
                    <div class="editaisCol">
                        <button type="button" class="editaisBtn2" id="">MAI/24</button>
                        <button type="button" class="editaisBtn2" id="">JUN/24</button>
                        <button type="button" class="editaisBtn2" id="">JUL/24</button>
                        <button type="button" class="editaisBtn2" id="">AGO/24</button>
                    </div>
                    <div class="editaisCol">
                        <button type="button" class="editaisBtn2" id="">SET/24</button>
                        <button type="button" class="editaisBtn2" id="">OUT/24</button>
                        <button type="button" class="editaisBtn2" id="">NOV/24</button>
                        <button type="button" class="editaisBtn2" id="">DEZ/24</button>
                    </div>
                    <div class="editaisCol">
                        <button type="button" class="editaisBtn1" id="">2023</button>
                        <button type="button" class="editaisBtn1" id="">2022</button>
                        <button type="button" class="editaisBtn1" id="">2021</button>
                        <button type="button" class="editaisBtn1" id="">2020</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="agradecimentosDiv">

            <h1 id="tit">Agradecimentos</h1>

            <div class="agradecimentos">
                <div class="agradecimento">
                    <img src="imgs/transparencia/quadrado-preto.png" id="img">
                    <p id="descAgrad">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec id cursus neque, malesuada consectetur lectus. Quisque nulla tortor, consectetur a urna a, congue cursus enim. </p>
                </div>
                <div class="agradecimento">
                    <img src="imgs/transparencia/quadrado-preto.png" id="img">
                    <p id="descAgrad">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec id cursus neque, malesuada consectetur lectus. Quisque nulla tortor, consectetur a urna a, congue cursus enim. </p>
                </div>
                <div class="agradecimento">
                    <img src="imgs/transparencia/quadrado-preto.png" id="img">
                    <p id="descAgrad">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec id cursus neque, malesuada consectetur lectus. Quisque nulla tortor, consectetur a urna a, congue cursus enim. </p>
                </div>
                <div class="agradecimento">
                    <img src="imgs/transparencia/quadrado-preto.png" id="img">
                    <p id="descAgrad">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec id cursus neque, malesuada consectetur lectus. Quisque nulla tortor, consectetur a urna a, congue cursus enim. </p>
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