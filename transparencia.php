<?php
    include("bd/transp.php");
    $agradecimentos = getAgrads($conn);
    $relatorios = getTransp($conn);
?>

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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="icon" type="image/x-icon" href="imgs/icons/logo.png">
    <title>Transparência - Instituto Oliveira</title>
</head>

<body>

    <!-- PADRÃO HEADER -->

    <?php
        include("navbar.php");
    ?>

    <!-- PADRÃO TOPO DA PÁGINA -->

    <div class="top">
        
        <div class="topEsq">
            <h1 id="topTit">Transparência</h1>
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
                <p id="download">Faça o download dos relatórios agora mesmo:</p>
                <div class="transp">
                <?php
                $classToggle = true; // Usado para alternar entre as classes
                foreach($relatorios as $index => $relatorio) {
                    if ($index % 4 == 0) {
                        echo '<div class="transpLin">';
                    }

                    $class = $classToggle ? "transpBtn1" : "transpBtn2";
                    $caminho = htmlspecialchars($relatorio['caminho']);
                    $nome = htmlspecialchars($relatorio['relatorio']);

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

        <?php if (!empty($agradecimentos)) ?>
        
        <div class="agradecimentosDiv">
            <h1 id="tit">Agradecimentos</h1>
            <div class="carousel-wrap">
                <div class="owl-carousel owl-theme">

                    <?php foreach($agradecimentos as $agradecimento): ?>

                    <div class="item">
                        <img src="<?= $agradecimento['img'] ?>" id="img">
                        <p id="descAgrad"><?= $agradecimento['agradecimento'] ?></p>
                    </div>
                   
                    <?php endforeach; ?>
                </div>
            </div>
        </div>

    </div>

    <?php
        include("footer.php");
    ?>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <script>
        $(document).ready(function(){
            $('.owl-carousel').owlCarousel({
                loop: true,
                margin: 10,
                nav: true,
                navText: [
                    "<i class='fa fa-caret-left'></i>",
                    "<i class='fa fa-caret-right'></i>"
                ],
                autoplay: true,
                autoplayHoverPause: true,
                responsive: {
                    0: {
                        items: 1
                    },
                    600: {
                        items: 2
                    },
                    1000: {
                        items: 3
                    }
                }
            });
        });
    </script>

</body>

</html>