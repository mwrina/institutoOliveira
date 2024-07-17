
<?php

    include("bd/nums.php");
    $nums = getNums($conn);

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/sidebar.css">
    <link rel="stylesheet" href="style/admNums.css">
    <link rel="icon" type="image/x-icon" href="/imgs/icons/logo.png">
    <title>Instituto Oliveira - Administração</title>
</head>
<body>

    <!-- SIDEBAR -->

    <?php
        include("sidebar.php");
    ?>
        
    <main>

        <div class="container">

            <h1 id="containerTit">Números do Instituto</h1>

            <div class="forms">

                <?php foreach($nums as $num): ?>

                <form id="form" action="bd/nums.php" method="post">

                    <input type="hidden" name="id" value="<?= $num['id'] ?>">

                    <input type="text" id="altNumsCampo"  name="campo" value="<?= $num['campo'] ?>">

                    <input type="number" id="altNumsValor" name="valor" value="<?= $num['valor'] ?>">


                    <input type="submit" name="altNum" id="altNumsBtn" value="Salvar">

                </form>

                <?php endforeach; ?>

            </div>

            

        </div>

    </main>

</body>
