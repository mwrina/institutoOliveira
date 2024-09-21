<?php
include("bd/editais.php");
$editais = getEditais($conn);
?>


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
            <h1 id="topTit">Editais</h1>
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
                <?php
                $classToggle = true; // Usado para alternar entre as classes
                foreach($editais as $index => $edital) {
                    if ($index % 4 == 0) {
                        echo '<div class="editaisLin">';
                    }

                    $class = $classToggle ? "editaisBtn1" : "editaisBtn2";
                    $caminho = htmlspecialchars(string: $edital['caminho']);
                    $nome = htmlspecialchars(string: $edital['edital']);

                    echo '<a href="' . $caminho . '" class="' . $class . '" download>' . $nome . '</a>';

                    $classToggle = !$classToggle; // Alterna a classe

                    if ($index % 4 == 3) {
                        echo '</div>';
                    }
                }

                // Fechar a última linha se não estiver completa
                if ($index % 4 != 3) {
                    echo '</div>';
                }
                ?>
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