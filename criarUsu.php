<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if ($_SESSION['tipoUsuario'] !== 'adm') {
    header('Location: adm.php?alert=1');
    exit();
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/sidebar.css">
    <link rel="stylesheet" href="style/criarUsu.css">
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

            <h1 id="containerTit">Cadastro de Usuário</h1>

            <form class="cadastroUsu" method="post" action="bd/usu.php">
                
                <div class="lin">
                    <label for="nome">Nome de usuário:</label> <br>
                    <input type="text" id="nome" name="nome" placeholder="Digite seu usuário...">
                </div>

                <div class="lin">
                    <label for="email">E-mail:</label> <br>
                    <input type="email" id="email" name="email" placeholder="Digite seu e-mail...">
                </div>
                
                <div class="lin">
                    <label for="senha">Senha:</label> <br>
                    <input type="password" id="senha" name="senha" placeholder="Digite sua senha...">
                </div>

                <div class="lin">
                    <label for="confirmaSenha">Confirme sua senha:</label> <br>
                    <input type="password" id="confirmaSenha" name="confirmaSenha" placeholder="Digite sua senha novamente...">
                </div>

                <div class="lin">
                    <label for="tipoUsu">Tipo de Usuário:</label> <br>
                    <select id="tipoUsu" name="tipoUsuario">
                        <option value="adm">Administrador</option>
                        <option value="usu">Usuário</option>
                    </select>

                </div>

                <div class="btn">
                    <input type="submit" id="confirmBtn" name="criarUsuario" value="Confirmar cadastro">
                </div>
      
            </form>

        </div>
    </main>

</body>
</html>