
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/sidebar.css">
    <link rel="stylesheet" href="style/criarProj.css">
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

            <h1 id="containerTit">Cadastro de Projeto</h1>

            <form class="cadastroUsu">
                
                <div class="lin1">
                    <label for="nome">Nome do projeto:</label> <br>
                    <input type="text" id="nome" placeholder="Digite o nome do projeto...">
                </div>

                <div class="lin2">
                    <label for="desc">Descrição do projeto:</label> <br>
                    <input type="text" id="desc" placeholder="Digite a descrição do projeto...">
                </div>

                <div class="btn">
                    <input type="submit" id="confirmBtn" value="Confirmar cadastro">
                </div>
                
            </form>

        </div>
    </main>

    <script src="js/sidebar.js"></script>

</body>
