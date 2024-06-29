<?php
    include("bd/connect.php");

    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    
    if ($_SESSION['tipoUsuario'] !== 'adm') {
        header('Location: adm.php?alert=1');
        exit();
    }

    if(isset($_GET['editIdUsu'])) {
        $id = $_GET['editIdUsu'];

        $sql = "SELECT nome, email, senha, tipoUsuario, ultimoAcesso FROM usuarios WHERE id = $id";

        $result = mysqli_query($conn, $sql);

        if ($result) {
            if(mysqli_num_rows($result) > 0) {
                $usuario = mysqli_fetch_assoc($result);
            } else {
                header("Location: admUsu.php");
                exit();
            }
        } else {
            echo "Erro ao buscar o usuário: " . mysqli_error($conn);
        }
    } else {
        header("Location: admUsu.php");
        exit();
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/sidebar.css">
    <link rel="stylesheet" href="style/editarUsu.css">
    <link rel="icon" type="image/x-icon" href="imgs/icons/logo.png">
    <title>Instituto Oliveira - Administração</title>
</head>
<body>

    <!-- SIDEBAR -->

    <?php 
        include("sidebar.php")
    ?>
        
    <main>
        <div class="container">
            <h1 id="containerTit">Editar Usuário</h1>
            
            <form class="form" action="bd/usu.php" method="post">
                <input type="hidden" name="editIdUsu" value="<?= $id ?>">
                <div class="lin">
                    <label for="nome">Nome:</label> <br>
                    <input type="text" id="nome" name="nome" value="<?= $usuario['nome']; ?>">
                </div>
                <div class="lin">
                    <label for="nome">E-mail:</label> <br>
                    <input type="email" id="email" name="email" value="<?= $usuario['email']; ?>">
                </div>
                <div class="lin">
                    <label for="nome">Senha:</label> <br>
                    <input type="text" id="senha" name="senha">
                </div>
                <div class="lin">
                    <label for="nome">Confirmar senha:</label> <br>
                    <input type="text" id="senha" name="confirmSenha">
                </div>
                <div class="lin">
                    <label for="tipoUsu">Tipo:</label> <br>
                    <select id="tipoUsu" name="tipoUsu" value="<?= $usuario['tipoUsuario']; ?>">
                        <option value="adm">Administrador</option>
                        <option value="usu">Usuário</option>
                    </select>
                </div>
                <div class="btn">
                    <input type="submit" id="confirmBtn" name="editarUsuario" value="Salvar alterações">
                </div>
            </form>
        </div>
    </main>

</body>
</html>