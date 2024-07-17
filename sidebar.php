<?php

    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    require_once('bd/connect.php');

    if (!isset($_SESSION['token'])) {
        header("Location: login.php");
        exit();
    }

    $token = $_SESSION['token'];
    $sql = "SELECT * FROM user_tokens WHERE token = ? AND expires_at > NOW() LIMIT 1";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "s", $token);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if (mysqli_num_rows($result) != 1) {
        session_unset();
        session_destroy();
        header("Location: login.php");
        exit();
    } else {
        // Atualizar a expiração do token
        $expires_at = date('Y-m-d H:i:s', strtotime('+1 hour'));
        $sql_update = "UPDATE user_tokens SET expires_at = ? WHERE token = ?";
        $stmt_update = mysqli_prepare($conn, $sql_update);
        mysqli_stmt_bind_param($stmt_update, "ss", $expires_at, $token);
        mysqli_stmt_execute($stmt_update);
    }

?>

<aside class="sidebar-container">

        <div class="sidebarLogo">
            <img src="imgs/icons/logo.png" id="logo">
            <img src="imgs/icons/logoTxtVerde.png" id="logoTxt">
        </div>
        
        <div class="sidebarContent">

            <button class="collapsible">
                Usuários cadastrados
            </button>
            <div class="content">
                <a href="admUsu.php">Usuários existentes</a> <br>
                <a href="criarUsu.php">Criar novo usuário</a>
            </div>

            <button class="collapsible">
                Alterar projetos
            </button>
            <div class="content">
                <a href="admProj.php">Projetos existentes</a> <br>
                <a href="criarProj.php">Criar projeto</a>
            </div>
            
            <button class="collapsible">
                Blog
            </button>
            <div class="content">
                <a href="admBlog.php">Postagens existentes</a> <br>
                <a href="criarBlog.php">Criar nova postagem</a>
            </div>
            <button class="collapsible">
                Sobre o Instituto
            </button>
            <div class="content">
                <a href="admSobre.php">Seções existentes</a> <br>
                <a href="criarSobre.php">Criar nova seção</a>
            </div>
            <button class="collapsible">
                Depoimentos
            </button>
            <div class="content">
                <a href="admDep.php">Depoimentos existentes</a> <br>
                <a href="criarDep.php">Criar novo depoimento</a>
            </div>
            <a href="admCtts.php"><button class="collapsible">
                Informações de contato
            </button></a>
            <a href="admNums.php"><button class="collapsible">
                Alterar números do Instituto
            </button></a>

        </div>

        <div class="logout-container">
            <button id="logout" onclick="logout()">Voltar ao site</button>
        </div>

        <div class="usuLogado">
            <img src="imgs/icons/usuLogadoIcon.png" id="usuLogadoIcon">
            <p id="usuLogadoTxt">Usuário logado:
            <?php 
                if(isset($_SESSION['nome'])) {
                    echo $_SESSION['nome'];
                } else {
                    header("Location: login.php");
                }
            ?></p>
        </div>
    </aside>

?>

<html>
    <script src="js/sidebar.js"></script>
    <script src="js/logout.js"></script>
</html>
