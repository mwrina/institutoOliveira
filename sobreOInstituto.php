<?php

    include("bd/sobre.php");

    $secoes = buscarSecoes($conn);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/sobreOInstituto.css">
    <link rel="stylesheet" href="style/headerFooter.css">
    <link rel="stylesheet" href="style/botoes.css">
    <link rel="stylesheet" href="style/topoPgs.css">
    <link rel="icon" type="image/x-icon" href="imgs/icons/logo.png">
    <title>Sobre o Instituto - Instituto Oliveira</title>
</head>

<body>

    <?php
        include("navbar.php");
    ?>

    <!-- PADRÃO TOPO DA PÁGINA -->

    <div class="top">
        
        <div class="topEsq">
            <h1 id="topTit">Sobre o</h1>
            <h1 id="topTitDestacado">instituto</h1>
            <p id="topSlogan">Seja um azeite. Faça sua doação.</p>

            <button id="qroAjudarBtn" onclick="redirectWhatsapp()">QUERO AJUDAR</button>
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

    <!-- PÁGINA -->

    <?php if(!empty($secoes)): ?>
        <?php foreach($secoes as $secao): ?>

            <?php if($secao['idTipo'] == 1): ?>

                <div class="sobreDivTxtImg">
                    <div class="txt">

                        <div class="tit">
                            <h1 id="titDestacado"><?php
                                echo substr($secao['titulo01'], 0, strpos($secao['titulo01'], ' '));
                            ?></h1>
                            <h1 id="tit"><?php
                                echo substr($secao['titulo01'], strpos($secao['titulo01'], ' ') + 1);
                            ?></h1>
                        </div>

                        <p id="txt"><?= htmlspecialchars_decode($secao['texto01']) ?></p>
                
                        <?php
                            if(!empty($secao['titulo02']) && !empty($secao['texto02'])):
                        ?>

                        <div class="tit">
                            <h1 id="titulo02Tit"><?php
                                echo substr($secao['titulo02'], 0, strpos($secao['titulo02'], ' '));
                            ?></h1>
                            <h1 id="titulo02TitDestacado"><?php
                                echo substr($secao['titulo02'], strpos($secao['titulo02'], ' ') + 1);
                            ?></h1>
                        </div>

                        <p id="txt"><?= htmlspecialchars_decode($secao['texto02']) ?></p>
                        
                        <?php endif; ?>

                    </div>
                    
                    <img src="<?= $secao['img'] ?>" id="img">

                </div>

            <?php elseif($secao['idTipo'] == 2): ?>

                <div class="sobreDivTxtImg">

                    <img src="<?= $secao['img'] ?>" id="img">

                    <div class="txt">

                        <div class="tit">
                            <h1 id="titDestacado"><?php
                                echo substr($secao['titulo01'], 0, strpos($secao['titulo01'], ' '));
                            ?></h1>
                            <h1 id="tit"><?php
                                echo substr($secao['titulo01'], strpos($secao['titulo01'], ' ') + 1);
                            ?></h1>
                        </div>

                        <p id="txt"><?= htmlspecialchars_decode($secao['texto01']) ?></p>

                        <?php
                            if(!empty($secao['titulo02']) && !empty($secao['texto02'])):
                        ?>

                        <div class="tit">
                            <h1 id="titulo02Tit"><?php
                                echo substr($secao['titulo02'], 0, strpos($secao['titulo02'], ' '));
                            ?></h1>
                            <h1 id="titulo02TitDestacado"><?php
                                echo substr($secao['titulo02'], strpos($secao['titulo02'], ' ') + 1);
                            ?></h1>
                        </div>

                        <p id="txt"><?= htmlspecialchars_decode($secao['texto02']) ?></p>
                        
                        <?php endif; ?>

                    </div>

                </div>

            <?php elseif( $secao['idTipo'] == 3): ?>

                <div class="realidadeDiv">
                    <div class="tit">
                        <h1 id="realidadeTit"><?= $secao['titulo01'] ?></h1>
                    </div>

                    <p id="txt"><?= htmlspecialchars_decode($secao['texto01']) ?></p>
                </div>

            <?php elseif( $secao['idTipo'] == 4): ?>

                <div class="sobreDiv">

                <div class="tit">
                    <h1 id="titulo02Tit"><?php
                        echo substr($secao['titulo01'], 0, strpos($secao['titulo01'], ' '));
                    ?></h1>
                    <h1 id="titulo02TitDestacado"><?php
                        echo substr($secao['titulo01'], strpos($secao['titulo01'], ' ') + 1);
                    ?></h1>
                </div>

                <p id="txt"><?= htmlspecialchars_decode($secao['texto01']) ?></p>

        </div>

            <?php endif; ?>
        <?php endforeach; ?>
    <?php endif; ?>


    <?php
        include("footer.php");
    ?>
 
</body>
