<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/login.css">
    <link rel="stylesheet" href="style/headerFooter.css">
    <link rel="icon" type="image/x-icon" href="/imgs/icons/logo.png">
    <title>Instituto Oliveira</title>
</head>
<body>
    
    <!-- PADRÃO HEADER -->

    <?php
        include("navbar.php");
    ?>
        
    <!-- PÁGINA -->

    <main>

        <div class="loginContainer">

            <form class="loginForm" method="post" action="bd/efetuarLogin.php">

                <h1 id="loginTit">Login</h1>

                <div class="loginCampos">
                    <div class="loginLin">
                        <label for="email" id="nomeCampo">E-mail</label>
                        <input type="email" class="loginCampo" id="email" name="email">
                    </div>
                    
                    <div class="loginLin">
                        <label for="senha" id="nomeCampo">Senha</label>
                        <input type="password" class="loginCampo" id="senha" name="senha">
                        <a href="#" id="esqueceuSenha">Esqueceu sua senha?</a>
                    </div>
                    
                </div>

                <div class="btn">
                    <input type="submit"  id="loginBtn" value="ENTRAR">
                </div>

            </form>

        </div>
        

    </main>

    <script src="js/login.js"></script>

</body>