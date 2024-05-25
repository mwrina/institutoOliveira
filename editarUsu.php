<?php
    include("bd/connect.php");

    // Verifica se o ID do usuário foi passado pela URL
    if(isset($_GET['idUsu'])) {
        $idUsu = $_GET['idUsu'];

        // Query para selecionar os dados do usuário com base no ID
        $sql = "SELECT nome, ultimoAcesso, tipoUsu FROM usuarios WHERE idUsu = $idUsu";

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
    <title>Instituto Oliveira - Editar Usuário</title>
</head>
<body>

    <!-- SIDEBAR -->

    <?php 
        include("sidebar.php")
    ?>
        
    <main>
        <div class="container">
            <h1 id="containerTit">Editar Usuário</h1>
            
            <form action="atualizarUsuario.php" method="post">
                <input type="hidden" name="idUsu" value="<?= $idUsu ?>">
                <div class="form-group">
                    <label for="nome">Nome:</label>
                    <input type="text" id="nome" name="nome" value="<?= $usuario['nome']; ?>">
                </div>
                <div class="form-group">
                    <label for="ultimoAcesso">Último Acesso:</label>
                    <input type="text" id="ultimoAcesso" name="ultimoAcesso" value="<?= $usuario['ultimoAcesso']; ?>">
                </div>
                <div class="form-group">
                    <label for="tipoUsu">Tipo:</label>
                    <input type="text" id="tipoUsu" name="tipoUsu" value="<?= $usuario['tipoUsu']; ?>">
                </div>
                <button type="submit">Salvar Alterações</button>
            </form>
        </div>
    </main>

</body>
</html>