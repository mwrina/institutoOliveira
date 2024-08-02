
<?php

    include("bd/editais.php");
    $editais = getEditais($conn);

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/sidebar.css">
    <link rel="stylesheet" href="style/admEditais.css">
    <link rel="stylesheet" href="style/containerAdm.css">
    <link rel="icon" type="image/x-icon" href="imgs/icons/logo.png">
    <title>Instituto Oliveira - Administração</title>
</head>
<body>

    <!-- SIDEBAR -->

    <?php
        include("sidebar.php");
    ?>
        
    <main>

    <div class="container">
            <h1 id="containerTit">Lista de Seções - Sobre o Instituto</h1>

            <div class="containerLista">

                <?php
                    if(!empty($editais)) {
                        foreach($editais as $edital):
                ?>

                <div class="listaLinha">

                    <div class="infos">
                        <p id="id">ID: <?= $edital['id'] ?></p>
                        <p id="posicao">Nome: <?= $edital['edital'] ?> </p>
                    </div>
                        
                    <div class="crudBtns">                        
                        <button onclick="confirmaExclusao()" class="crudBtn" id="apagar">Apagar Seção</button>
                    </div>
                </div>

                <?php endforeach; ?>
                <?php
                    } else {
                        echo("<p>Você ainda não cadastrou editais.</p>");
                    }
                ?>

            </div>
        </div>


    </main>

</body>
