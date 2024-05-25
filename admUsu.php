<?php
    include("bd/connect.php");

    function buscarUsuarios($conn) {

        $sql = "SELECT idUsu, nome, ultimoAcesso, tipoUsu FROM usuarios";

        $result = mysqli_query($conn, $sql);

        if ($result) {
            while ($row = mysqli_fetch_assoc($result)) {
                $usuarios[] = $row;
            }
        } else {
            echo "Erro ao buscar os usuários: " . mysqli_error($conn);
        }

        return $usuarios;
    }

    $usuarios = buscarUsuarios($conn);
?>

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
                
                <?php
                    foreach ($usuarios as $usuario): 
                ?>

                <div class="listaLinha">
                    <span id="col1">
                        <p class="nome">Nome: <?= $usuario['nome']; ?></p>
                        <p class="ultimoAcesso">Último acesso: <?= $usuario['ultimoAcesso']; ?></p>
                        <div class="crudBtns">
                        <a href="editarUsuarios.php?id=<?= $usuario['idUsu']; ?>">
                            <button class="crudBtn">Editar Usuário></button>
                        </a>
                            <button class="crudBtn" id="apagar">Apagar Usuário</button>
                        </div>
                    </span>
                    <span id="col2">
                        <p class="tipoUsu">Tipo: <?= $usuario['tipoUsu']; ?></p>
                    </span>
                </div>

                <?php 
                    endforeach;
                ?>

            </div>
        </div>

    </main>
    
    <script>
        function editarUsuario(id) {
            window.location.href = "editarUsu.php?id=" + id;
        }
    </script>

</body>
