<?php
    include("bd/connect.php");

    // Verifica se o ID do usuário foi passado pela URL
    if(isset($_GET['editIdUsu'])) {
        $idUsu = $_GET['editIdUsu'];

        // Query para selecionar os dados do usuário com base no ID
        $sql = "SELECT nome, email, senha, tipoUsu, ultimoAcesso FROM usuarios WHERE idUsu = $idUsu";

        // Executa a query
        $result = mysqli_query($conn, $sql);

        // Verifica se a query retornou resultados
        if ($result) {
            // Verifica se encontrou o usuário
            if(mysqli_num_rows($result) > 0) {
                // Extrai os dados do usuário
                $usuario = mysqli_fetch_assoc($result);
            } else {
                // Se o usuário não for encontrado, redireciona de volta para a página anterior
                header("Location: admUsu.php");
                exit();
            }
        } else {
            // Se houver um erro na query, exibe uma mensagem de erro
            echo "Erro ao buscar o usuário: " . mysqli_error($conn);
        }
    } else {
        // Se o ID do usuário não foi passado pela URL, redireciona de volta para a página anterior
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
            <h1 id="containerTit">Editar Usuário</h1>
            
            <form class="form" action="bd/usu.php" method="post">
                <input type="hidden" name="idUsu" value="<?= $idUsu ?>">
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
                    <input type="text" id="senha" name="senha" value="<?= $usuario['senha']; ?>">
                </div>
                <div class="lin">
                    <label for="nome">Confirmar senha:</label> <br>
                    <input type="text" id="senha" name="confirmSenha">
                </div>
                <div class="lin">
                    <label for="tipoUsu">Tipo:</label> <br>
                    <select id="tipoUsu" name="tipoUsu" value="<?= $usuario['tipoUsu']; ?>">
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