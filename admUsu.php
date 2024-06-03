<?php
    include("bd/connect.php");

    function buscarUsuarios($conn) {

        $sql = "SELECT id, nome, ultimoAcesso, tipoUsuario FROM usuarios";

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

    function contUsuarios($conn) {
        $sql = "SELECT COUNT(id) AS total FROM usuarios";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        return $row['total'];
    }

    $qtdUsu = contUsuarios($conn);
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
                        <p id="nome">Nome: <?= $usuario['nome']; ?></p>

                        <p id="ultimoAcesso">Último acesso: <?= $usuario['ultimoAcesso']; ?></p>
                        
                        <div class="crudBtns">
                            <button onclick="editarUsuario(<?= $usuario['id']; ?>)" class="crudBtn" id="editar">Editar Usuário</button>
                            
                            <button onclick="confirmaExclusao(<?= $usuario['id']; ?>)" class="crudBtn" id="apagar">Apagar Usuário</button>
                        </div>

                    </span>
                    <span id="col2">
                        <p id="tipoUsu">Tipo: <?= $usuario['tipoUsuario']; ?></p>
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
            if (confirm("Tem certeza de que deseja editar este usuário?")) {
                window.location.href = "editarUsu.php?editIdUsu=" + id;
            }
        }

        function confirmaExclusao(id) {
                    
            if(confirm("Tem certeza de que deseja apagar este usuário?")) {
                if(<?php echo $qtdUsu; ?> > 1) {
                    var xhr = new XMLHttpRequest();
                    xhr.onreadystatechange = function() {
                        if (xhr.readyState == XMLHttpRequest.DONE) {
                            if (xhr.status == 200) {
                                console.log("Usuário excluído com sucesso.");
                                location.reload(); // Atualize a página após a exclusão do usuário
                            } else {
                                console.error('Ocorreu um erro na solicitação.');
                            }
                        }
                    };
                    xhr.open('POST', 'bd/usu.php', true); // Caminho para o arquivo usu.php
                    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
                    xhr.send('deleteIdUsu=' + id);
                } else {
                    alert("Impossível realizar exclusão. Só há um usuário cadastrado, se ele for eliminado não será possível fazer login no sistema posteriormente.");
                }
            }
            
        }
        
    </script>

</body>
