
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/sidebar.css">
    <link rel="stylesheet" href="style/alterarNums.css">
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

                <form id="form" action="bd/nums.php" method="post">

                    <label for="atendimentos" id="altNumsLabel">Atendimentos</label> <br>

                    <input type="number" id="altNumsInput" name="atendimentos" placeholder="<?php
                        include("bd/nums.php");
                        getAtendimentos($conn);
                        echo isset($_SESSION['atendimentosAtual']) ? $_SESSION['atendimentosAtual'] : ''; // Corrigido
                    ?>"> <br>


                    <input type="submit" name="altAtendimentos" id="altNumsBtn" value="Salvar">

                </form>

                <form id="form" action="bd/nums.php" method="post">

                    <label for="doadores" id="altNumsLabel">Doadores</label> <br>

                    <input type="number" id="altNumsInput" name="doadores" placeholder="<?php
                        include("bd/nums.php");
                        getDoadores($conn);
                        echo isset($_SESSION['doadoresAtual']) ? $_SESSION['doadoresAtual'] : ''; // Corrigido
                    ?>"> <br>

                    <input type="submit" name="altDoadores" id="altNumsBtn" value="Salvar">

                </form>

                <form id="form" action="bd/nums.php" method="post">

                    <label for="familias" id="altNumsLabel">Famílias Acolhidas</label> <br>

                    <input type="number" id="altNumsInput" name="familias" placeholder="<?php
                        include("bd/nums.php");
                        getFamilias($conn);
                        echo isset($_SESSION['familiasAtual']) ? $_SESSION['familiasAtual'] : ''; // Corrigido
                    ?>"> <br>

                    <input type="submit" name="altFamilias" id="altNumsBtn" value="Salvar">

                </form>

            </div>

            

        </div>

    </main>

</body>
