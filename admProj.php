
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/sidebar.css">
    <link rel="stylesheet" href="style/admProj.css">
    <link rel="icon" type="image/x-icon" href="/imgs/icons/logo.png">
    <title>Instituto Oliveira - Administração</title>
</head>
<>

    <!-- SIDEBAR -->

    <?php
        include("sidebar.php");
    ?>
        
    <main>

        <div class="container">
            <h1 id="containerTit">Lista de Projetos Cadastrados</h1>

            <div class="containerLista">
                <div class="listaLinha">
                        <p class="nome" id="nome1">Nome: </p>
                        <p class="dataCriacao" id="dataCriacao1">Data de criação: </p>
                        <div class="crudBtns">
                            <button class="crudBtn" id="editar">Editar Usuário</button>
                            <button class="crudBtn" id="apagar">Apagar Usuário</button>
                        </div>
                </div>
                <div class="listaLinha">
                        <p class="nome" id="nome1">Nome: </p>
                        <p class="dataCriacao" id="dataCriacao2">Data de criação: </p>
                        <div class="crudBtns">
                            <button class="crudBtn" id="editar">Editar Usuário</button>
                            <button class="crudBtn" id="apagar">Apagar Usuário</button>
                        </div>
                </div>
            </div>
        </div>

    </main>

</body>
