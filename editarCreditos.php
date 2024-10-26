<?php

    if(isset($_POST['editIdCreditos'])) {
        $id = $_POST['editIdCreditos'];
    } else {
        header("Location: admInfos.php?alert=2");
        exit;
    }

    $creditos = buscarCreditosPorId($conn, $id);

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/sidebar.css">
    <link rel="stylesheet" href="style/criarCreditos.css">
    <link rel="icon" type="image/x-icon" href="imgs/icons/logo.png">
    <title>Instituto Oliveira - Administração</title>
</head>
<body>

    <!-- SIDEBAR -->

    <?php
        include("sidebar.php");
    ?>
        
    <main>

        <div class="containerPaginaAdm">

            <h1 id="containerTit">Cadastro de Rede Social</h1>

            <form class="form" method="post" action="bd/contatos.php" enctype="multipart/form-data">

                <div class="formInputs">

                    <div class="lin">
                        <label for="nome">Nome do Creditado: </label> <br>

                        <input type="text" name="nome" id="nome" class="inputs" value="<?= $creditos['nome'] ?>" required>
                    </div>

                    <div class="lin">
                        <label for="breveDesc">Link do GitHub:</label> <br>

                        <input type="text" name="linkGitHub" id="link" class="inputs" value="<?= $creditos['github'] ?>" required>
                    </div>                   
                    
                    <div class="lin">
                        <label for="breveDesc">Link do LinkedIn:</label> <br>

                        <input type="text" name="linkLinkedIn" id="link" class="inputs" value="<?= $creditos['linkedin'] ?>" required>
                    </div>       
                    
                </div>  

                <div class="btn">
                    <input type="submit" id="submitBtn" name="editarCred" value="Salvar">
                </div>
                    
            </form>

        </div>
    
    </main>

    <script>
        document.addEventListener('DOMContentLoaded', (event) => {
        const params = new URLSearchParams(window.location.search);
            if (params.has('alert')) {
                const alertValue = params.get('alert');
                switch (alertValue) {
                    case '1':
                        alert("Erro ao inserir no banco de dados: ");
                        break;
                }
                window.history.replaceState(null, null, window.location.pathname); // Limpa a query string da URL
            }
        });
    </script>

</body>
