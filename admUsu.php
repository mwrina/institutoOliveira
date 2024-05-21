
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/sidebar.css">
    <link rel="stylesheet" href="style/admUsu.css">
    <link rel="icon" type="image/x-icon" href="/imgs/icons/logo.png">
    <title>Instituto Oliveira - Administração</title>
</head>
<body>

    <!-- SIDEBAR -->

    <?php 
        include("sidebar.php")
    ?>
        
    <main>

        <div class="container">
            <h1 id="containerTit">Lista de Usuários Cadastrados</h1>

            <div class="containerLista">
                <div class="listaLinha">
                    <span id="col1">
                        <p class="nome" id="nome1">Nome: </p>
                        <p class="ultimoAcesso" id="ultimoAcesso1">Último acesso: </p>
                        <div class="crudBtns">
                            <button class="crudBtn" id="editar">Editar Usuário</button>
                            <button class="crudBtn" id="apagar">Apagar Usuário</button>
                        </div>
                    </span>
                    <span id="col2">
                        <p class="tipoUsu" id="tipoUsu1">Administrador</p>
                    </span>
                </div>
                <div class="listaLinha">
                    <span id="col1">
                        <p class="nome" id="nome2">Nome: </p>
                        <p class="ultimoAcesso" id="ultimoAcesso2">Último acesso: </p>
                        <div class="crudBtns">
                            <button class="crudBtn" id="editar">Editar Usuário</button>
                            <button class="crudBtn" id="apagar">Apagar Usuário</button>
                        </div>
                    </span>
                    <span id="col2">
                        <p class="tipoUsu" id="tipoUsu2">Usuário</p>
                    </span>
                </div>
            </div>
        </div>

    </main>

    <script src="js/sidebar.js"></script>

</body>
